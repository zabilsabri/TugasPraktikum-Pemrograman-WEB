<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class registerController extends Controller
{
    public function register(Request $request){
        $request->validate([
            'Nama'=>'required',
            'Email'=>'required|Email|unique:users',
            'Password'=>'required'
        ]);
        $query = DB::table('users')->insert([
            'Nama'=>$request->input('Nama'),
            'Email'=>$request->input('Email'),
            'Password'=>$request->input('Password')
        ]);

        if($query){
            return redirect()->to('login')->send();
        } else {
            
        }
    }

    public function index()
    {
     return view('signUp');
    } 

}
