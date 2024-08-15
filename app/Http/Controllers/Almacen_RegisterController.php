<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Almacen_RegisterController extends Controller
{
    public function show(){
        if(Auth::check()){
            return redirect('/homeAlm');
        }
        return view('almacen.register');
    }
    public function register(RegisterRequest $request){
        $user = User::create($request->validated());
        return redirect('/loginAlm')->with('success', "Account successfully registered.");
    }
}
