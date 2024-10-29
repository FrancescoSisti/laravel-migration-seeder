<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Trains extends Controller
{
    public function index()
    {
        return view('pages.home');
    }
}