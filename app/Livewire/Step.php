<?php

namespace App\Livewire;

use Livewire\Component;

class Step extends Component
{
    public $data_in;
    public $data_out;

    

    public function render()
    {
        return view('livewire.step');
    }
}
