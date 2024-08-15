<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    //
    public function showLogin()
    {
        return view('login');
    }

    public function verificaLogin(Request $request)
    {
        //return dd($request->all());
        $data=request()->validate([            
            'dni'=>'required', 
            'pword'=>'required' 
        ], 
        [  
            'dni.required'=>'Ingrese DNI', 
            'pword.required'=>'Ingrese contraseña', 
        ]);
        
        /*
        if (Auth::attempt($data))
        { 
            $con='OK'; 
        } 
        */

        $dni=$request->get('dni'); 
        $query=Usuario::where('dni','=',$dni)->get(); 
        if ($query->count()!=0) 
        { 
            $hashp=$query[0]->pword; 
            $password=$request->get('pword'); 
            if ($password == $hashp) 
            { 
                return redirect()->route('home');
            } 
            else 
            { 
                return back()->withErrors(['pword'=>'Contraseña no válida']) ->withInput(request(['dni', 'pword'])); 
            } 
        } 
        else 
        { 
            return back()->withErrors(['dni'=>'Usuario no válido']) ->withInput(request(['dni'])); 
        } 
    } 
    
    public function salir()
    { 
        Auth::logout(); 
        return redirect('/'); 
    }
    
}
