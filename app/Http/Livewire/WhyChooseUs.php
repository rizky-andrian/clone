<?php

namespace App\Http\Livewire;

use App\Models\StaticPages;
use Livewire\Component;

class WhyChooseUs extends Component
{
    public $dataStatic;

    public function mount()
    {
        $this->dataStatic = StaticPages::find([6, 7, 8]);
    }
    public function render()
    {
        return view('livewire.why-choose-us');
    }
}
