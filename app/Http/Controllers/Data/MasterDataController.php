<?php

namespace App\Http\Controllers\Data;

use App\Http\Controllers\Controller;
use App\Models\KategoriProduk;
use Illuminate\Http\Request;
use App\Http\Utils\FileProcess;
use App\Models\BlogNews;
use App\Models\BrandProduk;
use App\Models\CompanyHistory;
use App\Models\Customer;
use App\Models\DownloadCenter;
use App\Models\ImagesProduk;
use App\Models\PanelUtama;
use App\Models\Produk;
use App\Models\Project;
use App\Models\Servis;
use App\Models\Slider;
use App\Models\Sosmed;
use App\Models\StaticPages;
use App\Models\WhyChooseUs;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class MasterDataController extends Controller
{
    // METHOD GET DATA
    public static function ambilSemuaData(Model $dataModel, array $relation = [])
    {
        if ($relation != []) {
            $data = $dataModel->with($relation)->paginate(10);
        } else {
            $data = $dataModel->paginate(10);
        }
        return $data;
    }

    // CREATE KATEGORI PRODUK
    public function createKategoriData(Request $createDataKategori)
    {
        //   dd($createDataKategori);
        $createDataKategori->validate([
            'nama_kategori' => 'required|string',
            'gambar_produk' => 'file|max:4000|mimes:png,jpg'
        ]);
        $kategoriProduk = new KategoriProduk();
        $photoKategoriProduk = new FileProcess($createDataKategori->file('gambar_produk'), $createDataKategori['nama_kategori'], 'kategori-produk');
        $kategoriProduk->nama_kategori = $createDataKategori['nama_kategori'];
        $kategoriProduk->slugs = Str::slug($createDataKategori['nama_kategori']);
        $kategoriProduk->deskripsi_kategori = $createDataKategori['deskripsi_kategori'];
        $kategoriProduk->gambar_produk = $photoKategoriProduk->uploadFoto();
        $kategoriProduk->save();

        return redirect()->back()->with('message', 'Berhasil Menambahkan File Data');
    }


    //   delete
    public function deleteKategoriData(Request $request)
    {
        // $katProduk = KategoriProduk::where('id', $request->all())->delete();
        DB::table("kategori_produk")->whereIn('id', $request->all())->delete();
        // dd($request->all());
    }

    public function updateDataKategoriData(Request $request, $id = null)
    {
        $request->validate([
            'nama_kategori' => 'string',
        ]);

        $data = KategoriProduk::find($id);
        $data->nama_kategori = $request['nama_kategori'];
        $data->slugs = Str::slug($request['nama_kategori']);
        $data->deskripsi_kategori = $request['deskripsi_kategori'];
        if ($request->file('gambar_produk')) {
            FileProcess::deleteFoto($data->gambar_produk, 'kategori-produk');
            $photoKategoriProduk = new FileProcess($request->file('gambar_produk'), $request['nama_kategori'], 'kategori-produk');
            $data->gambar_produk = $photoKategoriProduk->uploadFoto();
        }
        $data->update();
        return redirect()->back()->with('message', 'Berhasil Memperbaharui Katgeori Produk Data');
    }

    public function deleteSingleKategoriData($id = null)
    {
        $data = KategoriProduk::find($id);
        FileProcess::deleteFoto($data->gambar_produk, 'kategori-produk');
        $data->delete();
        return redirect()->back()->with('message', 'Berhasil Menghapus Kategori Produk Data');
    }


    // Brand Produk
    public function createBrandData(Request $createDataBrand)
    {
        $createDataBrand->validate([
            'nama_brand' => 'required|string',
            'gambar_brand' => 'file|max:4000|mimes:png,jpg'
        ]);
        $brandProduk = new BrandProduk();
        $photoBrandProduk = new FileProcess($createDataBrand->file('gambar_brand'), $createDataBrand['nama_brand'], 'brand-produk');
        $brandProduk->nama_brand = $createDataBrand['nama_brand'];
        $brandProduk->slugs = Str::slug($createDataBrand['nama_brand']);
        $brandProduk->deskripsi_brand = $createDataBrand['deskripsi_brand'];
        $brandProduk->gambar_brand = $photoBrandProduk->uploadFoto();
        $brandProduk->save();

        return redirect()->back()->with('message', 'Berhasil Menambahkan Brand Produk');
    }


    public function deleteBrandData(Request $request)
    {
        DB::table("brand_produk")->whereIn('id', $request->all())->delete();
        return redirect()->back()->with('message', 'Berhasil Menghapus Brand Produk');
    }


    public function updateDataBrandData(Request $request, $id = null)
    {
        $request->validate([
            'nama_brand' => 'string',
            'gambar_brand' => 'mimes:png,jpg|nullable'

        ]);

        $data = BrandProduk::find($id);
        $data->nama_brand = $request['nama_brand'];
        $data->slugs = Str::slug($request['nama_brand']);
        $data->deskripsi_brand = $request['deskripsi_brand'];
        if ($request->file('gambar_brand')) {
            FileProcess::deleteFoto($data->gambar_brand, 'brand-produk');
            $photoBrandProduk = new FileProcess($request->file('gambar_brand'), $request['nama_brand'], 'brand-produk');
            $data->gambar_brand = $photoBrandProduk->uploadFoto();
        }
        $data->update();
        return redirect()->back()->with('message', 'Berhasil Memperbaharui Brand Produk');
    }

    public function deleteSingleBrandData($id)
    {
        $data = BrandProduk::find($id);
        FileProcess::deleteFoto($data->gambar_brand, 'brand-produk');
        $data->delete();
        return redirect()->back()->with('message', 'Berhasil Menghapus Brand Data');
    }

    // Produk
    public function createProdukData(Request $createProduk)
    {
        $createProduk->validate([
            'nama_produk' => 'required|string|min:4',
            'id_kategori' => 'required',
            'id_brand' => 'required',
            'satuan_produk' => 'required',
            'kondisi_produk' => 'required',
            'harga_produk' => 'required|numeric',
            'stok_produk' => 'required|numeric',
            'deskripsi_produk' => 'required',
        ]);

        $produk = new Produk();
        $produk->nama_produk = $createProduk['nama_produk'];
        $produk->slugs = Str::slug($createProduk['nama_produk']);
        $produk->id_kategori = $createProduk['id_kategori'];
        $produk->id_brand = $createProduk['id_brand'];
        $produk->satuan_produk = $createProduk['satuan_produk'];
        $produk->kondisi_produk = $createProduk['kondisi_produk'];
        $produk->harga_produk = $createProduk['harga_produk'];
        $produk->stok_produk = $createProduk['stok_produk'];
        $produk->deskripsi_produk = $createProduk['deskripsi_produk'];
        $produk->save();
        $uploadFotoProduk = new FileProcess($createProduk->file('gambar_produk'), Str::slug($createProduk['nama_produk']), 'produk');
        $uploadFotoProduk->multipleUploadFoto($createProduk, 'gambar_produk', $produk->id, 'ImagesProduk');
        return redirect()->back()->with('message', 'Berhasil Menyimpan Data Produk');
    }

    // delete images produk
    public function deleteImagesProduk($id)
    {
        $images = ImagesProduk::find($id);
        FileProcess::deleteFoto($images->gambar_produk, 'produk');
        $images->delete();
        return redirect()->back()->with('message', 'Berhasil Menghapus Images Produk');
    }

    public function updateProdukData(Request $request, $id = null)
    {
        $produk = Produk::find($id);
        $produk->nama_produk = $request['nama_produk'];
        $produk->slugs = Str::slug($request['nama_produk']);
        $produk->id_kategori = $request['id_kategori'];
        $produk->id_brand = $request['id_brand'];
        $produk->satuan_produk = $request['satuan_produk'];
        $produk->kondisi_produk = $request['kondisi_produk'];
        $produk->harga_produk = $request['harga_produk'];
        $produk->stok_produk = $request['stok_produk'];
        $produk->deskripsi_produk = $request['deskripsi_produk'];
        $produk->update();
        $uploadFotoProduk = new FileProcess($request->file('gambar_produk'), Str::slug($request['nama_produk']), 'produk');
        $uploadFotoProduk->multipleUploadFoto($request, 'gambar_produk', $produk->id, 'ImagesProduk');
        return redirect()->back()->with('message', 'Berhasil Update Data Produk');
    }

    public function deleteMultipleProdukData(Request $request)
    {
        DB::table("produks")->whereIn('id', $request->all())->delete();
        DB::table("images_produk")->whereIn('id_produk', $request->all())->delete();

        return redirect()->back()->with('message', 'Berhasil Menghapus Produk Data');
    }

    public function deleteProduk($id = null)
    {
        $produk = Produk::find($id);
        FileProcess::deleteFoto($produk->gambar_produk, 'produk');
        $produk->delete();
        return redirect()->back()->with('message', 'Berhasil Menghapus Produk Data');
    }


    // create servis data
    public function createServisData(Request $request)
    {
        $request->validate([
            'judul_servis' => 'required|string',
            'gambar_servis' => 'required|mimes:png,jpg',
            'deskripsi_servis' => 'required'
        ]);

        $data = $request->all();
        $servis = new Servis();
        $servis->judul_servis = $data['judul_servis'];
        $servis->slug = Str::slug($data['judul_servis']);
        $images = new FileProcess($request->file('gambar_servis'), Str::slug($data['gambar_servis']), 'servis');
        $servis->gambar_servis = $images->uploadFoto();
        $servis->deskripsi_servis = $data['deskripsi_servis'];
        $servis->save();
        return redirect()->back()->with('message', 'Berhasil Membuat Data Servis');
    }


    public function updateServisData(Request $request, $id = null)
    {

        $data = $request->all();
        $servis = Servis::find($id);
        $servis->judul_servis = $data['judul_servis'];
        $servis->slug = Str::slug($data['judul_servis']);
        if ($request->file('gambar_servis')) {
            FileProcess::deleteFoto($servis->gambar_servis, 'servis');
            $images = new FileProcess($request->file('gambar_servis'), Str::slug($data['gambar_servis']), 'servis');
            $servis->gambar_servis = $images->uploadFoto();
        }
        $servis->deskripsi_servis = $data['deskripsi_servis'];
        $servis->update();
        return redirect()->back()->with('message', 'Berhasil Update Data Servis');
    }


    public function deleteMultipleServisData(Request $request)
    {
        DB::table("servis")->whereIn('id', $request->all())->delete();
        return redirect()->back()->with('message', 'Berhasil Menghapus Servis Data');
    }

    public function deleteServisData($id = null)
    {
        $servis = Servis::find($id);
        FileProcess::deleteFoto($servis->gambar_servis, 'servis');
        $servis->delete();
        return redirect()->back()->with('message', 'Berhasil Menghapus Servis Data');
    }

    public function createCustomerData(Request $request)
    {
        $request->validate([
            'customer_name' => 'required',
            'customer_address' => 'nullable|string',
            'customer_link' => 'nullable|url',
            'customer_job_desc' => 'nullable|string',
            'customer_logo' => 'nullable|mimes:png,jpg',
            'customer_type' => 'required'
        ]);
        $data = $request->all();

        $customer = new Customer();
        $customer->customer_name = $data['customer_name'];
        $customer->type  = $data['customer_type'];
        $customer->customer_slug = Str::slug($data['customer_name']);
        if ($request->file('customer_logo')) {
            $images = new FileProcess($request->file('customer_logo'), Str::slug($data['customer_name']), 'customer');
            $customer->customer_logo = $images->uploadFoto();
        }
        $customer->customer_link = $data['customer_link'];
        $customer->customer_address = $data['customer_address'];
        $customer->customer_job_desc = $data['customer_job_desc'];
        $customer->save();
        return redirect()->back()->with('message', 'Berhasil Membuat Data Customer');
    }

    public function updateCustomerData(Request $request, $id = null)
    {
        $request->validate([
            'customer_name' => 'nullable|string',
            'customer_address' => 'nullable|string',
            'customer_link' => 'nullable|url',
            'customer_job_desc' => 'nullable|string',
            'customer_logo' => 'nullable|mimes:png,jpg',
            'customer_type' => 'required'
        ]);
        $data = $request->all();

        $customer = Customer::find($id);
        $customer->customer_name = $data['customer_name'];
        $customer->type = $data['customer_type'];
        $customer->customer_slug = Str::slug($data['customer_name']);
        if ($request->file('customer_logo')) {
            FileProcess::deleteFoto($customer->customer_logo, 'customer');
            $images = new FileProcess($request->file('customer_logo'), Str::slug($data['customer_name']), 'customer');
            $customer->customer_logo = $images->uploadFoto();
        }
        $customer->customer_link = $data['customer_link'];
        $customer->customer_address = $data['customer_address'];
        $customer->customer_job_desc = $data['customer_job_desc'];
        $customer->update();
        return redirect()->back()->with('message', 'Berhasil Update Data Customer');
    }

    public function deleteCustomerData($id = null)
    {
        $customer = Customer::find($id);
        FileProcess::deleteFoto($customer->customer_logo, 'customer');
        $customer->delete();
        return redirect()->back()->with('message', 'Data Customer Berhasil Dihapus');
    }

    public function deleteMultipleCustomerData(Request $request)
    {
        DB::table("customers")->whereIn('id', $request->all())->delete();
        return redirect()->back()->with('message', 'Berhasil Menghapus Customer Data');
    }
    public function createStaticPages(Request $request)
    {
        $request->validate([
            'title' => 'string|required',
            'image' => 'required|mimes:png,jpg',
            'content' => 'string|required',
            'type' => 'required|string',
        ]);
        $data = $request->all();
        $staticContent = new StaticPages();
        $staticContent->title = $data['title'];
        $staticContent->slug = Str::slug($data['title']);
        $staticContent->type = $data['type'];
        $staticContent->content = $data['content'];
        $imageStatic = new FileProcess($request->file('image'), Str::slug($data['title']), 'static-pages');
        $staticContent->image = $imageStatic->uploadFoto();
        $staticContent->save();
        return redirect()->back()->with('message', 'Berhasil Membuat Static Data');
    }
    public function updateStaticPages(Request $request, $id = null)
    {
        $request->validate([
            'title' => 'string|nullable',
            'image' => 'nullable|mimes:png,jpg',
            'content' => 'string|nullable',
            'type' => 'nullable|string',
        ]);

        $data = $request->all();
        $staticContent = StaticPages::find($id);
        $staticContent->title = $data['title'];
        $staticContent->slug = Str::slug($data['title']);
        $staticContent->type = $data['type'];
        $staticContent->content = $data['content'];
        if ($request->file('image')) {
            FileProcess::deleteFoto($staticContent->image, 'static-pages');
            $imageStatic = new FileProcess($request->file('image'), Str::slug($data['title']), 'static-pages');
            $staticContent->image = $imageStatic->uploadFoto();
        }
        $staticContent->update();
        return redirect()->back()->with('message', 'Berhasil Update Static Data');
    }

    public function deleteStaticData($id = null)
    {
        $staticContent = StaticPages::find($id);
        FileProcess::deleteFoto($staticContent->image, 'static-pages');
        $staticContent->delete();
        return redirect()->back()->with('message', 'Data Berhasil Dihapus');
    }

    public function createBlogNews(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:100',
            'content' => 'required',
            'image' => 'required|mimes:png,jpg|max:5000'
        ]);

        $data = $request->all();

        $post = new BlogNews();
        $post->title = $data['title'];
        $post->slug = Str::slug($data['title']);
        $post->content = $data['content'];
        $images = new FileProcess($request->file('image'), 'blog-news', 'blog-news');
        $post->image = $images->uploadFoto();
        $post->save();
        return redirect()->back()->with('message', 'Berhasil Membuat Data Baru');
    }

    public function updateBlogNews(Request $request, $id = null)
    {
        $request->validate([
            'title' => 'nullable|string|max:100',
            'content' => 'nullable',
            'image' => 'nullable|mimes:png,jpg|max:5000'
        ]);

        $data = $request->all();

        $post = BlogNews::find($id);
        $post->title = $data['title'];
        $post->slug = Str::slug($data['title']);
        $post->content = $data['content'];
        if ($request->file('image')) {
            FileProcess::deleteFoto($post->image, 'blog-news');
            $images = new FileProcess($request->file('image'), 'blog-news', 'blog-news');
            $post->image = $images->uploadFoto();
        }
        $post->update();
        return redirect()->back()->with('message', 'Berhasil Update Data ' . $post->title);
    }

    public function deleteBlogNews($id)
    {
        $post = BlogNews::find($id);
        FileProcess::deleteFoto($post->image, 'blog-news');
        $post->delete();
        return redirect()->back()->with('message', 'Berhasil Hapus Data ' . $post->title);
    }

    // sosmed
    public function createSosmed(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'link' => 'required|url',
            'image' => 'required|file|mimes:png,jpg',
        ]);

        $data = $request->all();

        $sosmed = new Sosmed();
        $sosmed->title = $data['title'];
        $sosmed->link = $data['link'];
        $logo = new FileProcess($request->file('image'), Str::slug($data['title']), 'sosmed');
        $sosmed->image = $logo->uploadFoto();
        $sosmed->save();
        return redirect()->back()->with('message', 'Berhasil Menyimpan Data ' . $data['title']);
    }

    public function updateSosmed(Request $request, $id = null)
    {
        $request->validate([
            'title' => 'nullable|string',
            'link' => 'nullable|url',
            'image' => 'nullable|file|mimes:png,jpg',
        ]);

        $data = $request->all();

        $sosmed = Sosmed::find($id);
        $sosmed->title = $data['title'];
        $sosmed->link = $data['link'];
        if ($request->file('image')) {
            FileProcess::deleteFoto($sosmed->image, 'sosmed');
            $logo = new FileProcess($request->file('image'), Str::slug($data['title']), 'sosmed');
            $sosmed->image = $logo->uploadFoto();
        }
        $sosmed->update();
        return redirect()->back()->with('message', 'Berhasil Rubah Data ' . $sosmed->title);
    }

    public function deleteSosmed($id)
    {
        $sosmed = Sosmed::find($id);
        FileProcess::deleteFoto($sosmed->image, 'sosmed');
        $sosmed->delete();
        return redirect()->back()->with('message', 'Berhasil Hapus Data ' . $sosmed->title);
    }

    // slider
    public function createSlider(Request $request)
    {

        $request->validate([
            'slider_title' => 'nullable|string|max:100',
            'slider_desc' => 'nullable|string|max:255',
            'slider_image' => 'required|file|mimes:png,jpg',
        ]);
        $data = $request->all();
        // dd($data);
        $slider = new Slider();
        $slider->slider_title = $data['slider_title'];
        $slider->slider_desc = $data['slider_desc'];
        $slider->slider_product = $data['slider_product'];
        $image = new FileProcess($request->file('slider_image'), 'sliders', 'sliders');
        $slider->slider_image = $image->uploadFoto();
        $slider->save();
        return redirect()->back()->with('message', 'Berhasil Buat Data Slider');
    }

    public function updateSlider(Request $request, $id = null)
    {
        $request->validate([
            'slider_title' => 'nullable|string|max:100',
            'slider_desc' => 'nullable|string|max:255',
            // 'slider_image' => 'required|file|mimes:png,jpg',
        ]);
        $data = $request->all();
        // dd($data);
        $slider = Slider::find($id);
        $slider->slider_title = $data['slider_title'];
        $slider->slider_desc = $data['slider_desc'];
        $slider->slider_product = $data['slider_product'];
        if ($request->file('slider_image')) {
            FileProcess::deleteFoto($slider->slider_image, 'sliders');
            $image = new FileProcess($request->file('slider_image'), 'sliders', 'sliders');
            $slider->slider_image = $image->uploadFoto();
        }
        $slider->update();
        return redirect()->back()->with('message', 'Berhasil Update Data Slider');
    }

    public function deleteSlider($id)
    {
        $slider = Slider::find($id);
        FileProcess::deleteFoto($slider->slider_image, 'sliders');
        $slider->delete();
        return redirect()->back()->with('message', 'Berhasil Delete Data Slider');
    }

    public function createPanelUtama(Request $request)
    {

        $request->validate([
            'title' => 'required|string|max:50',
            'description' => 'required',
            'image' => 'required|file|mimes:png,jpg',
        ]);
        $data = $request->all();
        $panelUtama = new PanelUtama();

        $panelUtama->title = $data['title'];
        $panelUtama->description = $data['description'];
        $image_panel = new FileProcess($request->file('image'), Str::slug($data['title']), 'panel');
        $panelUtama->image = $image_panel->uploadFoto();
        $panelUtama->save();
        return redirect()->back()->with('message', 'Berhasil Mmebuat Data Panel');
    }

    public function updatePanelUtama(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:50',
            'description' => 'required',
            'image' => 'nullable|file|mimes:png,jpg',
        ]);
        $data = $request->all();
        $panelUtama = PanelUtama::find($id);

        $panelUtama->title = $data['title'];
        $panelUtama->description = $data['description'];
        if ($request->file('image')) {
            FileProcess::deleteFoto($panelUtama->image, 'panel');
            $image_panel = new FileProcess($request->file('image'), Str::slug($data['title']), 'panel');
            $panelUtama->image = $image_panel->uploadFoto();
        }
        $panelUtama->update();
        return redirect()->back()->with('message', 'Berhasil update Data Panel');
    }

    public function deletePanel($id)
    {
        $panelUtama = PanelUtama::find($id);
        FileProcess::deleteFoto($panelUtama->image, 'panel');
        $panelUtama->delete();
        return redirect()->back()->with('message', 'Berhasil Delete Data Panel');
    }

    public function createHistory(Request $request)
    {
        $request->validate([
            'tahun' => 'required',
            'description' => 'required',
        ]);
        $data = $request->all();
        $historyCompany = new CompanyHistory();
        $historyCompany->tahun = $data['tahun'];
        $historyCompany->descripiton = $data['description'];
        $historyCompany->icon = $data['image'];
        $historyCompany->save();
        return redirect()->back()->with('message', 'Berhasil Mmebuat History Company');
    }

    public function updateHistory(Request $request, $id = null)
    {
        $request->validate([
            'tahun' => 'required',
            'description' => 'required',
        ]);
        $data = $request->all();
        $historyCompany = CompanyHistory::find($id);
        $historyCompany->tahun = $data['tahun'];
        $historyCompany->descripiton = $data['description'];
        $historyCompany->icon = $data['image'];
        $historyCompany->update();
        return redirect()->back()->with('message', 'Berhasil Update History Company');
    }

    public function createWcu(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required'
        ]);
        $data = $request->all();
        $wCU = new WhyChooseUs();
        $wCU->title = $data['title'];
        $wCU->content = $data['description'];
        $wCU->save();
        return redirect()->back()->with('message', 'Berhasil Buat Why Choose Us');
    }

    public function updateWcu(Request $request, $id = null)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required'
        ]);
        $data = $request->all();
        $wCU = WhyChooseUs::find($id);
        $wCU->title = $data['title'];
        $wCU->content = $data['description'];
        $wCU->update();
        return redirect()->back()->with('message', 'Berhasil Update Why Choose Us');
    }

    public function createDokumen(Request $request)
    {
        $request->validate([
            'dokumen_title' => 'required',
            'dokumen_desc' => 'required',
            'dokumen_file' => 'required'
        ]);
        $data = $request->all();
        $dokumen = new DownloadCenter();
        $dokumen->title = $data['dokumen_title'];
        $dokumen->desc = $data['dokumen_desc'];
        $dokumenFile = new FileProcess($request->file('dokumen_file'), Str::slug($dokumen->title), 'download-center');
        $dokumen->file_dokumen = $dokumenFile->uploadDokumen();
        $dokumen->save();
        return redirect()->back()->with('message', 'Berhasil Menambahkan Dokumen');
    }

    public function updateDokumen(Request $request, $id = null)
    {
        $request->validate([
            'dokumen_title' => 'required',
            'dokumen_desc' => 'required',
        ]);
        $data = $request->all();
        $dokumen = DownloadCenter::find($id);
        $dokumen->title = $data['dokumen_title'];
        $dokumen->desc = $data['dokumen_desc'];
        if ($request->file('dokumen_file')) {
            $dokumenFile = new FileProcess($request->file('dokumen_file'), Str::slug($dokumen->title), 'download-center');
            $dokumenFile->updateDokumen($dokumen->file_dokumen);
            $dokumen->file_dokumen = $dokumenFile->uploadDokumen();
        }
        $dokumen->update();
        return redirect()->back()->with('message', 'Berhasil Update Dokumen');
    }

    // project
    public function createProject(Request $request)
    {
        $data = $request->all();

        $request->validate([
            'project_name' => 'required',
            'id_customer' => 'required',
            'project_desc' => 'required',
            'project_year' => 'required',
        ]);

        $project = new Project();
        $project->project_name = $data['project_name'];
        $project->id_customer = $data['id_customer'];
        $project->project_desc = $data['project_desc'];
        $project->project_year = $data['project_year'];
        $project->status = $data['status'];
        $project->save();
        return redirect()->back()->with('message', 'Berhasil Create Project Baru');
    }

    // update
    public function updateProject(Request $request, $id = null)
    {
        $data = $request->all();

        $request->validate([
            'project_name' => 'required',
            'id_customer' => 'required',
            'project_desc' => 'required',
        ]);

        $project = Project::find($id);
        $project->project_name = $data['project_name'];
        $project->id_customer = $data['id_customer'];
        $project->project_desc = $data['project_desc'];
        $project->project_year = $data['project_year'];
        $project->status = $data['status'];
        $project->update();
        return redirect()->back()->with('message', 'Berhasil Update Project');
    }

    // delete
    public function deleteProject($id = null)
    {
        $project = Project::find($id);
        $project->delete();
        return redirect()->back()->with('message', 'Berhasil Hapus Project');
    }
}
