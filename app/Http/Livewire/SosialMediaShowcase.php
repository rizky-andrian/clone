<?php

namespace App\Http\Livewire;

use App\Models\Sosmed;
use Livewire\Component;

class SosialMediaShowcase extends Component
{
    public $sosmed;

    public function mount()
    {
        $this->sosmed = Sosmed::get();
    }


    public function render()
    {
        return view('livewire.sosial-media-showcase');
    }
}
