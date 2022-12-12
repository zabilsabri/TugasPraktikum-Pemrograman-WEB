<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class articleListController extends Controller
{
    public function showArticleList()
    {
        return view('articleList');
    }
}
