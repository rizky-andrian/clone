<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\KategoriProduk;

class KatgegoriProdukCircularCard extends Component
{
    public $kategoriProduk;

    public function mount()
    {
        $this->kategoriProduk = KategoriProduk::get(['nama_kategori', 'slugs', 'gambar_produk']);
    }

    public function render()
    {
        return view('livewire.katgegori-produk-circular-card');
    }
}
