<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;
    protected $table = 'produks';

    public function kategoriProduk()
    {
        return $this->hasOne(KategoriProduk::class, 'id', 'id_kategori');
    }

    public function brandProduk()
    {
        return $this->hasOne(BrandProduk::class, 'id', 'id_brand');
    }

    public function imagesProduk()
    {
        return $this->hasMany(ImagesProduk::class, 'id_produk');
    }
}
