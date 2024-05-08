<?php

namespace App\Livewire;

use Livewire\Component;

class MyComponent extends Component
{
    public $pickupDate;
    public $returnDate;
    public $date;
    public $typeId;

    public function __construct()
    {
        $this->pickupDate = date("Y-m-d");
        $this->date = date("Y-m-d");
        $this->returnDate = date("Y-m-d");
    }

    public function updatedReturnDate($value)
    {
        $this->validate();
    }

    protected function rules()
    {
        return [
            'pickupDate' => 'required|date',
            'returnDate' => 'required|date|after:pickupDate',
        ];
    }

    public function render()
    {
        return view('livewire.my-component');
    }
}
