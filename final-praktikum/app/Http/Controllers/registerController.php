<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\register;

class registerController extends Controller
{

    public function showRegister(){
        return view('register');
    }

    public function register(Request $request){
        $request->validate([
            'fullName' => 'required',
            'email'=>'required|email|unique:users',
            'password'=>'required', 
        ]);

        $register = new register();
        $register->name = $request->fullName;
        $register->email = $request->email;
        $register->level = $request->level;
        $register->password = bcrypt($request->password);

        $register->save();

        return redirect()->to('/')->send()->with('success', 'Data berhasil di tambahkan!');
    }
}