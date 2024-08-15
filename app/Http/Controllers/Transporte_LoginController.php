<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
class Transporte_LoginController extends Controller
{
    public function show()
    {
        if(Auth::check()){
            return redirect('/homeT');
        }
        return view('transporte.login');
    }
    public function login(LoginRequest $request)
    {
        $credentials = $request->getCredentials();
        
        if(!Auth::validate($credentials)){
            //dd('error');
            return redirect()->to('loginTr')->withErrors('Cuenta incorrecta');
        }
        $user = Auth::getProvider()->retrieveByCredentials($credentials);
        Auth::login($user);
        return redirect()->route('homeT');
    }
}
