<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Almacen_LoginController extends Controller
{
    public function show()
    {
        if(Auth::check()){
            return redirect('/homeA');
        }
        return view('almacen.login');
    }
    public function login(LoginRequest $request)
    {
        $credentials = $request->getCredentials();
        
        if(!Auth::validate($credentials)){
            //dd('error');
            return redirect()->to('loginAlm')->withErrors('Cuenta incorrecta');
        }
        $user = Auth::getProvider()->retrieveByCredentials($credentials);
        Auth::login($user);
        return redirect()->route('homeA');
    }
}
