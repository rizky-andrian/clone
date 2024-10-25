<?php

namespace App\Http\Livewire;

use App\Models\BlogNews;
use Livewire\Component;

class BlogNewsShowcase extends Component
{
    public $blogs;

    public function mount()
    {
        $this->blogs = BlogNews::take(2)->get();
    }

    public function render()
    {
        return view('livewire.blog-news-showcase');
    }
}
