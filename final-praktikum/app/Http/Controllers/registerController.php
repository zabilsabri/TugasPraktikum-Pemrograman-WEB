<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class registerController extends Controller
{

    public function showRegister(){
        return view('register');
    }

    public function register(Request $request){
        $request->validate([
            'fullName' => 'required',
            'email'=>'required|email|unique:users',
            'password'=>'required'
        ]);

        $query = DB::table('users')->insert([
            'name'=>$request->input('fullName'),
            'level'=> 'admin',
            'email'=>$request->input('email'),
            'password'=>bcrypt($request->input('password'))
        ]);

        if($query){
            return redirect()->to('login')->send();
        } else {
            return view('register');
        }
    }
}