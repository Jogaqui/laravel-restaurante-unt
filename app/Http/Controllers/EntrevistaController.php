<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Entrevista;
use App\Models\Postulante;
use Illuminate\Http\Request;

class EntrevistaController extends Controller
{
     
    const PAGINATION = 10;
    public function index(Request $request){

    $buscarpor=$request->get('buscarpor');
    $entrevistas=Entrevista::where('estado','=','1')->where('identrevista','like','%'.$buscarpor.'%')->paginate($this::PAGINATION);
    $postulante= Postulante::where('estado','=','1')->get();
 return view('personal.entrevista.index',compact('entrevistas','buscarpor','postulante'));
    }

}
