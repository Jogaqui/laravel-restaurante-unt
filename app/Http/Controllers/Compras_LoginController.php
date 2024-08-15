<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Compras_LoginController extends Controller
{
    public function show()
    {
        if (Auth::check()) {
            return redirect()->route('compras.home');
        }

        return view('compras.login');
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->getCredentials();

        if (!Auth::validate($credentials)) {
            return redirect()->route('compras.login.show')->withErrors('Cuenta incorrecta');
        }

        $user = Auth::getProvider()->retrieveByCredentials($credentials);
        Auth::login($user);

        return redirect()->route('compras.home');
    }
}
