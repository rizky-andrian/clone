<?php

namespace App\Http\Livewire;

use App\Models\Produk;
use Livewire\Component;

class ProdukShowcase extends Component
{
    public $produk;

    public function mount()
    {
        $this->produk = Produk::orderBy('created_at', 'desc')->with('imagesProduk')->take(3)->get();
    }

    public function render()
    {
        return view('livewire.produk-showcase');
    }
}
