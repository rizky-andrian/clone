<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BrandProduk extends Model
{
    use HasFactory;

    protected $table = 'brand_produk';


    public function produk()
    {
        return $this->hasMany(Produk::class, 'id_brand', 'id')->paginate(10);
    }
}
