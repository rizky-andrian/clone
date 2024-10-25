<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class ServisBannerPages extends Component
{
    public $servisPages;

    public function mount()
    {
        $this->servisPages = DB::table('static_pages')->where('id', 3)->get();
    }
    public function render()
    {
        return view('livewire.servis-banner-pages');
    }
}
