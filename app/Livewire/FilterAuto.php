<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Car;

class FilterAuto extends Component
{
    public $typeId;
    public $cars;
    public $transmission;
    public $selectedCar;
    public $data_in;
    public $data_out;

    // public function __construct()
    // {
    //     $this->typeId = 0;
    // }
    public function mount()
    {
        // $this->cars = Car::all(); // Инициализация вывода всех автомобилей при открытии страницы
        // $this->typeId = $typeId;
        $this->data_in;
        $this->data_out;
        if ($this->typeId == 0) {
            $this->cars = Car::all();
        }else {
         $this->cars = Car::where('type_id', $this->typeId)
         ->orwhere('transmission', $this->transmission)
         ->get(); // Фильтрация автомобилей по введенному type_id
        }

    }
    public function selectCar($carId)
    {
        $this->selectedCar = Car::find($carId);
    }

    // public function updatedTypeId()
    // {
    //     if ($this->typeId == 0) {
    //         $this->cars = Car::all();
    //     }else {
    //     $this->cars = Car::where('type_id', $this->typeId)->get(); // Фильтрация автомобилей по введенному type_id
    //     }
    // }
    // public function updatedTransmission()
    // {
    //     if ($this->transmission == 0) {
    //         $this->cars = Car::all();
    //     }else {
    //         $this->cars = Car::where('transmission', $this->transmission)->get(); // Фильтрация автомобилей по введенному transmission
    //     }
    // }


    public function render()
    {
        $query = Car::query();

        if ($this->typeId) {
            $query->where('type_id', 'like', '%' . $this->typeId . '%');
        }
        if ($this->transmission) {
            $query->where('transmission', 'like', '%' . $this->transmission . '%');
        }

        $this->cars = $query->get();

        return view('livewire.filter-auto');
    }
}
