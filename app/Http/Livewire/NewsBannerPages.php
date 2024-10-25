<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class NewsBannerPages extends Component
{

    public $news;

    public function mount()
    {
        $this->news = DB::table('static_pages')->where('id', 4)->get();
    }

    public function render()
    {
        return view('livewire.news-banner-pages');
    }
}
