<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class Transporte_RegisterController extends Controller
{
    public function show(){
        if(Auth::check()){
            return redirect('/homeTr');
        }
        return view('transporte.register');
    }
    public function register(RegisterRequest $request){
        $user = User::create($request->validated());
        return redirect('/loginTr')->with('success', "Account successfully registered.");
    }
}
