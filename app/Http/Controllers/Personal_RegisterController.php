<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class Personal_RegisterController extends Controller
{
    public function show(){
        if(Auth::check()){
            return redirect('/homePer');
        }
        return view('personal.register');
    }
    public function register(RegisterRequest $request){
        $user = User::create($request->validated());
        return redirect('/loginPer')->with('success', "Account successfully registered.");
    }
}
