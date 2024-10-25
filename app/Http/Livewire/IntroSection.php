<?php

namespace App\Http\Livewire;

use App\Models\StaticPages;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Livewire\Component;

class IntroSection extends Component
{
    
    public Model $staticData;

    public function mount()
    {
        $this->staticData = StaticPages::find(1);
    }


    public function render()
    {
        return view('livewire.intro-section');
    }
}
