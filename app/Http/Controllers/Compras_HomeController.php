<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class Compras_HomeController extends Controller
{
    public function index()
    {
        return view('compras.inicio');
    }

    public function landing()
    {
        return view('landing');
    }
}
