<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Almacen_Insumo;

class Almacen_HomeController extends Controller
{
    public function index()
    {
        $insumos= Almacen_Insumo::where('estado','=',1)->get();
        return view('almacen.inicio', compact('insumos'));
    }

    public function landing()
    {
        return view('landing');
    }
}
