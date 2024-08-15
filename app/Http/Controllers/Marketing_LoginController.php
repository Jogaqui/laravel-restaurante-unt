<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Marketing_LoginController extends Controller
{
    public function show()
    {
        if (Auth::check()) {
            return redirect()->route('marketing.home');
        }

        return view('marketing.login');
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->getCredentials();

        if (!Auth::validate($credentials)) {
            return redirect()->route('marketing.login.show')->withErrors('Cuenta incorrecta');
        }

        $user = Auth::getProvider()->retrieveByCredentials($credentials);
        Auth::login($user);

        return redirect()->route('marketing.home');
    }
}
