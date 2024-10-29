<?php

namespace App\Http\Controllers;

use App\Models\Trains;
use Illuminate\Http\Request;

class TrainController extends Controller
{


    public function index(){
        $trains = Trains::all();
        return view("trains.index", compact("trains"));
    }

    public function todayIndex(){
        $trains = Trains::where("departure_date", now()->toDateString())->get();
        return view("trains.index", compact("trains"));
    }
}