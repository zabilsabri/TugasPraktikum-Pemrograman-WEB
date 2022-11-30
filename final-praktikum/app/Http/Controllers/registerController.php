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
            'email'=>'required|Email|unique:userblogs',
            'password'=>'required'
        ]);

        $password = bcrypt($request->input('password'));

        $query = DB::table('users')->insert([
            'full_name'=>$request->input('fullName'),
            'level'=> 'admin',
            'email'=>$request->input('email'),
            'password'=>$password
        ]);

        if($query){
            return redirect()->to('login')->send();
        } else {
            return view('register');
        }
    }
}