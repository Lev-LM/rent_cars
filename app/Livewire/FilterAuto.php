<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Car;
use App\Models\Rent;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class FilterAuto extends Component
{
    public $typeId;
    public $cars;
    public $transmission;
    public $selectedCar;
    public $data_in;
    public $data_out;
    public $daysDifference;
    public $rentCar;
    public $userData;

    public $email;
    public $name;
    public $number;
    public $password;
    public $isRegisteredUser = false;

    public $userId;
    public $user;
    public $userRegisterStatus = false;

    public $rent;
    public $carId;

    public $car;
    public $rentStatus = false;
    public $availableCars;


    public function creatingUser()
    {
        if (auth()->check()) {
            // Пользователь зарегистрирован
            $this->isRegisteredUser = true;
        } else {
            // Пользователь не зарегистрирован, необходимо заполнить данные
            $this->validate([
                'email' => 'required|email',
                'name' => 'required',
                'password' => 'required|min:6',
            ]);

            // Создание нового пользователя
            $user = new User();
            $user->name = $this->name;
            $user->email = $this->email;
            $user->number = $this->number;
            $user->password = bcrypt($this->password);
            $user->save();

            // Вход пользователя после создания
            auth()->login($user);


            // Перенаправление на нужную страницу
            // return redirect('/dashboard'); // Замените на нужный URL
        }
    }




    public function login()
    {
        $credentials = [
            'email' => $this->email,
            'password' => $this->password,
        ];

        if (Auth::attempt($credentials)) {
            // Аутентификация прошла успешно
            // return redirect()->to('/dashboard');
            $user = Auth::user();
            if ($user) {
                // Получение и использование данных пользователя
                $name = $user->name;
                $email = $user->email;
            }
        } else {
            // Аутентификация не удалась
            session()->flash('error', 'Неверные учетные данные. Попробуйте снова.');
        }
    }

    public function selectCar($carId)
    {
        $this->selectedCar = Car::find($carId);
    }

    public function rentSave()
    {
        $rent = new Rent();
        $rent->receiving = $this->data_in;
        $rent->return_date = $this->data_out;
        $rent->user_id = Auth::user()->id;
        $rent->car_id = $this->selectedCar->id;
        $rent->price = $this->daysDifference * $this->selectedCar->cost_per_day;
        $rent->days = $this->daysDifference;
        // dd($this->selectedCar->cost_per_day);
        $rent->save();
        // // Тест
        // dd($daysDifference, $totalRentalPrice);

        $this->rentStatus = true;

        // return redirect('/dashboard');
    }

    public function confirmation()
    {
        if (auth()->check()) {
            $this->userId = Auth()->user()->id;
            $this->userData = User::find($this->userId);
        } else {
            $this->userData = 1;
        }
    }

    public function userRegister()
    {
        if ($this->userRegisterStatus == true) {
            $this->userRegisterStatus = false;
        } else {
            $this->userRegisterStatus = true;
        }
    }

    // public function filterAvailableCars($data_in, $data_out)
    // {
    // $this->availableCars = Car::whereNotIn('id', function($query) use ($data_in, $data_out) {
    //     $query->select('car_id')
    //         ->from('rents')
    //         ->where('start_time', '<=', $data_in) // Сравнение с датой возврата
    //         ->where('end_time', '>=', $data_out); // Сравнение с датой получения
    // })->get();
    // }

    public function filterAvailableCars($query, $data_in, $data_out)
    {
        return $query->whereNotIn('id', function($subQuery) use ($data_in, $data_out) {
            $subQuery->select('car_id')
                ->from('rents')
                ->where('receiving', '<=', $data_out)
                ->where('return_date', '>=', $data_in);
        });
    }

    public function render()
    {
        $query = Car::query();

        if ($this->typeId) {
            $query->where('type_id', 'like', '%' . $this->typeId . '%');
        }
        if ($this->transmission) {
            $query->where('transmission', 'like', '%' . $this->transmission . '%');
        }

        $this->cars = $this->filterAvailableCars($query, $this->data_in, $this->data_out);


        $this->cars = $query->get();

        return view('livewire.filter-auto');
    }
}
