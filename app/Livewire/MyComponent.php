<?php

namespace App\Livewire;

use Livewire\Component;
use Carbon\Carbon;

class MyComponent extends Component
{
    public $pickupDate;
    public $returnDate;
    public $date;
    public $dateOut;
    public $typeId;

    public function updatedPickupDate($value)
    {
        // Преобразуйте дату получения в объект Carbon
        $pickupDate = \Carbon\Carbon::parse($value);

        // Добавьте один день к дате получения
        $returnDate = $pickupDate->copy()->addDay();

        $dateOut = $pickupDate->copy()->addDay();

        // Установите дату возврата для отображения
        $this->returnDate = $returnDate->format('Y-m-d');
        $this->$dateOut = $dateOut->format('Y-m-d');
    }
    public function __construct()
    {
        $this->pickupDate = Carbon::today()->format('Y-m-d');
        $this->date = Carbon::today()->format('Y-m-d');
        $this->dateOut = Carbon::today()->addDay()->format('Y-m-d');
        $this->returnDate = Carbon::today()->addDay()->format('Y-m-d');
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
            'dateOut' => 'required|date|after:pickupDate',
        ];
    }

    public function render()
    {
        return view('livewire.my-component');
    }
}
