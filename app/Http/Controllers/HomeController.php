<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;

class HomeController extends Controller
{
    public function index()
    {
        $popularCar = Car::where('popular', 1)->get();
        return view('welcome', compact('popularCar'));
    }
}
