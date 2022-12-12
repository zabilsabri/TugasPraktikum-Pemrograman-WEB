<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class memberListController extends Controller
{
    public function showMemberList()
    {
        return view('memberList');
    }
}
