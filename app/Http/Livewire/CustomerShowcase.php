<?php

namespace App\Http\Livewire;

use App\Models\Customer;
use Livewire\Component;

class CustomerShowcase extends Component
{
    public $customers;

    public function mount()
    {
        $this->customers = Customer::get();
    }

    public function render()
    {
        return view('livewire.customer-showcase');
    }
}
