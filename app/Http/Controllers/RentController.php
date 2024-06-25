<?php

namespace App\Http\Controllers;

use App\Models\Rent;
use App\Models\Car;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */

    public function brone(Request $request)
    {
        $user = Auth()->user();
        $userId = $user->id;
        $receivedData = $request->input('carId');
        dd($receivedData);
    }
    public function store(Request $request)
    {
        $typeId = $request->input('type');

        $data_in = $request->input('data-start');
        $data_out = $request->input('data-out');
        $receivedDate = Carbon::parse($data_in);
        $returnedDate = Carbon::parse($data_out);
        $daysDifference = $returnedDate->diffInDays($receivedDate);

        // $rent = new Rent();
        // $rent->receiving = $data_in;
        // $rent->return_date = $data_out;
        // $user = Auth()->user();
        // $rent->user_id = $user->id;
        // $rent->car_id = 1;
        // $rent->price = 1222;
        // $rent->days = $daysDifference;

        // $rentalPricePerDay = 1200; // Цена за день аренды
        // $totalRentalPrice = $daysDifference * $rentalPricePerDay;
        // $rent->save();
        // // Тест
        // dd($daysDifference, $totalRentalPrice);



        $cars = Car::where('type_id', $typeId)->where('status', 'free')->get();

        // dd($cars);
        return view('steps.step-2', compact('cars', 'data_in', 'data_out', 'typeId', 'daysDifference'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Rent $rent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rent $rent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Rent $rent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rent $rent)
    {
        //
    }
}
