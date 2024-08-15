<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class Personal_LoginController extends Controller
{
    public function show()
    {
        if(Auth::check()){
            return redirect('/homePer');
        }
        return view('personal.login');
    }
    public function login(LoginRequest $request)
    {
        $credentials = $request->getCredentials();
        
        if(!Auth::validate($credentials)){
            //dd('error');
            return redirect()->to('loginPer')->withErrors('Cuenta incorrecta');
        }
        $user = Auth::getProvider()->retrieveByCredentials($credentials);
        Auth::login($user);
        return redirect()->route('homePer');
    }
}
