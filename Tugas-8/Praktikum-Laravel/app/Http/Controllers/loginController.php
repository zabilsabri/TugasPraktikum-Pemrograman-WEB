<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class loginController extends Controller
{

    public function login(Request $request){
        $credentials = $request->validate([
            'Email'=>'required|Email:users',
            'password'=>'required'
        ]);
        return $request->input();
    }

    public function index()
    {
     return view('login');
    } 
}
