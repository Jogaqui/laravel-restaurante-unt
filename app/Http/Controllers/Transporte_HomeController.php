<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Transporte_HomeController extends Controller
{
    public function index()
    {
        return view('transporte.inicio');
    }

    public function landing()
    {
        return view('landing');
    }
}
