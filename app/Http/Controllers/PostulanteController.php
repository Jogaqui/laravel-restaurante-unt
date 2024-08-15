<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Postulante;

class PostulanteController extends Controller
{
    const PAGINATION = 10;
    public function index(Request $request)
 {

    $buscarpor=$request->get('buscarpor');
    $postulante=Postulante::where('estado','=','1')->where('dni','like','%'.$buscarpor.'%')->paginate($this::PAGINATION);
 return view('personal.index',compact('postulante','buscarpor'));


 }
 public function create()
 {
 return view('personal.create');
 }
 public function store(Request $request)
 {

$postulante=new Postulante();
$postulante->nombre;
$postulante->edad;
$postulante->dni=$request->dni;
$postulante->puntaje;
$postulante->estado;

$postulante->save();
return redirect()->route('personal.index')->with('datos','Registro Nuevo Guardado...!');
}


}
