<?php

namespace App\Http\Livewire;

use App\Models\StaticPages;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class ProdukBannerPages extends Component
{

    public $produkPages;

    public function mount()
    {
        $this->produkPages = DB::table('static_pages')->where('id', 2)->get();
    }

    public function render()
    {
        return view('livewire.produk-banner-pages');
    }
}
