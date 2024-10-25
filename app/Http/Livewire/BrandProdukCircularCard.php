<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\BrandProduk;

class BrandProdukCircularCard extends Component
{
    public $brandData;

    public function mount()
    {
        $this->brandData = BrandProduk::get(['nama_brand', 'slugs', 'gambar_brand']);
    }


    public function render()
    {
        return view('livewire.brand-produk-circular-card');
    }
}
