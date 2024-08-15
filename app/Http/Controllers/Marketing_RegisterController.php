<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Marketing_RegisterController extends Controller
{
    public function show()
    {
        if (Auth::check()) {
            return redirect()->route('marketing.home');
        }
        return view('marketing.register');
    }
    public function register(RegisterRequest $request)
    {
        $user = User::create($request->validated());
        Auth::login($user);
        return redirect()->route('marketing.home')->with('success', "Account successfully registered.");
    }
}
