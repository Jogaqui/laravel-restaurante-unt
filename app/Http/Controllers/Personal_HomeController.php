<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Personal_HomeController extends Controller
{
    public function index()
    {
        return view('personal.inicio');
    }

    public function landing()
    {
        return view('landing');
    }
}
