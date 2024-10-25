<?php

namespace App\Http\Utils;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Http\UploadedFile;
use App\Models\ImagesProduk;

class FileProcess
{
    // properties
    protected $fileData;
    protected string $namaFile;
    protected string $dirFile;

    // constructor
    public function __construct($fileData, string $namaFile, string $dirFile)
    {
        $this->fileData = $fileData;
        $this->namaFile = $namaFile;
        $this->dirFile = $dirFile;
    }

    // uploadFilePhoto
    public function uploadFoto(UploadedFile $mutlipleImages = null)
    {
        // aapbila tidak ada yang di upload tidak melakukan apa apa
        if (is_null($this->fileData)) {
            return;
        }
        if ($mutlipleImages !== null) {
            $namaFoto = time() . '-' . Str::slug($this->namaFile) . '.' . $mutlipleImages->getClientOriginalName();
            Storage::putFileAs('public/img/' . $this->dirFile, $mutlipleImages, $namaFoto);
            return $namaFoto;
        } else {
            $namaFoto = time() . '-' . Str::slug($this->namaFile) . '.' . $this->fileData->getClientOriginalExtension();
            Storage::putFileAs('public/img/' . $this->dirFile, $this->fileData, $namaFoto);
            return $namaFoto;
        }
    }

    // UpdateFileDokumen
    public function uploadDokumen()
    {
        $namaDokumen = time() . '-' . Str::slug($this->namaFile) . '.' . $this->fileData->getClientOriginalExtension();
        Storage::putFileAs('public/dokumen/' . $this->dirFile, $this->fileData, $namaDokumen);
        return $namaDokumen;
    }

    // UpdateDokumen
    public function updateDokumen(string $fileSebelumnya)
    {
        // dd(file_exists(storage_path('app\public\img\\' . $this->dirFile . '\\' . $fileSebelumnya)));
        if (file_exists(storage_path('app\public\dokumen\\' . $this->dirFile . '\\' . $fileSebelumnya))) {
            unlink(storage_path('app\public\dokumen\\' . $this->dirFile . '\\' . $fileSebelumnya));
        } else {
            self::uploadDokumen();
        }
        if ($this->fileData != null) {
            return self::uploadDokumen();
        } else {
            return;
        }
    }

    // update foto
    public function updateFoto(string $fileSebelumnya)
    {
        // dd(file_exists(storage_path('app\public\img\\' . $this->dirFile . '\\' . $fileSebelumnya)));
        if (file_exists(storage_path('app\public\img\\' . $this->dirFile . '\\' . $fileSebelumnya))) {
            unlink(storage_path('app\public\img\\' . $this->dirFile . '\\' . $fileSebelumnya));
        } else {
            self::uploadFoto();
        }
        if ($this->fileData != null) {
            return self::uploadFoto();
        } else {
            return;
        }
    }

    // delete foto
    public static function deleteFoto($fileSebelumnya, string $dirFile)
    {


        if ($fileSebelumnya !== null && $fileSebelumnya !== "") {
            if (file_exists(storage_path('app\public\img\\' . $dirFile . '\\' . $fileSebelumnya))) {
                unlink(storage_path('app\public\img\\' . $dirFile . '\\' . $fileSebelumnya));
            } else {
                return;
            }
        } else {
            return;
        }
    }

    // upload multiple produk
    public function multipleUploadFoto(Request $request, string $fileUploadName, string $idrelation = null, string $modelTable)
    {

        $filesFoto = [];
        if ($request->file($fileUploadName)) {
            foreach ($request->file($fileUploadName) as $foto) {
                $filesFoto[] = [
                    'id_produk' => $idrelation,
                    'gambar_produk' => self::uploadFoto($foto),
                ];
            }
            ImagesProduk::insert($filesFoto);
        } else {
            return;
        }
    }
}
