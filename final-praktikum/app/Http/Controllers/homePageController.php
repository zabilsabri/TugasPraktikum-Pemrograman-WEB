<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class homePageController extends Controller
{
    public function showHomePage()
    {
        return view('homepage');
    }
}
