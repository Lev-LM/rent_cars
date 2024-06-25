<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Car;

class Cars extends Component
{


    public $car;
    public $cars;
    public $edit;
    public $editedCar;
    public $alertStatus = false;

    public $message;
    public $buttonActive;
    public $typeId;

    public $sign;
    public $selectedType;

    public $userNumber;
    public $userName;

    public function showAlert($message)
    {
    $this->message = $message;
    }

    public function editCar($carId)
    {
        $this->edit = $carId;
        $this->editedCar = $this->getCar($carId)->car;
    }

    public function selectType($typeId)
    {
        if ($typeId != 0) {
            $this->selectedType = Car::where('type_id', $typeId)->get();
            $this->buttonActive = $typeId;
        } else {
            $this->selectedType = Car::all();
            $this->buttonActive = $typeId;
        }
        // dd($this->selectedType);

    }

    public function mount()
   {
        $this->selectedType = Car::all();
   }

    public function getCar($carId)
    {
        return Car::find($carId);
    }

    public function updateCar($carId)
    {
        $car = $this->getCar($carId);
        // $car->update([
        //     'cost_per_day' => $this->editedCar
        // ]);
        if (!empty($this->editedCar)) {
            $car->update([
                'cost_per_day' => $this->editedCar
            ]);
            $this->cancelEdit();
            return redirect()->to('/cars');
        } else {
            // $this->showAlert('Ваше сообщение здесь');
            $this->dispatch(
                'alertUpdate'
             );
        }


    }

    public function application()
    {
        $this->dispatch(
            'alertApplication'
         );
    }

    public function prompt()
    {
        $this->userNumber = $this->showPrompt("Введите номер:");
        $this->userName = $this->showPrompt("Введите имя:");
    }

    public function showPrompt($message)
    {
        return <<<JS
            <script>
                return prompt('$message');
            </script>
        JS;
    }

    public function deleteCar($carId)
    {
        $this->getCar($carId)->delete();
        return redirect()->to('/cars');
        // $this->refresh();
    }

    public function cancelEdit()
    {
        $this->edit = '';
    }

    public function render()
    {
        return view('livewire.cars');
    }
}
