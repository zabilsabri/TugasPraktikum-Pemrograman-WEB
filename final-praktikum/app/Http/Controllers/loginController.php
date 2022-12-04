<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class loginController extends Controller
{

    public function showLogin()
    {
        return view('/login');
    }

    public function login(Request $request)
    {
        // dd($request->all());
        if(Auth::attempt($request->only('email', 'password'))){
            return redirect('home');
        }else{
            dd($request->all());
        }
    }

    public function logout()
    {
        Auth::Logout(); 
        return \redirect('');
    }
}
