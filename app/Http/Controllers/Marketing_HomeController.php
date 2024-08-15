<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Marketing_HomeController extends Controller
{
    public function index()
    {
        return view('marketing.inicio');
    }

    public function landing()
    {
        return view('landing');
    }
}
