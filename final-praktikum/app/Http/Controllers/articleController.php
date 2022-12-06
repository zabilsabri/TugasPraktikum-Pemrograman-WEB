<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\article;


class articleController extends Controller
{

    public function showArticles()
    {
        $data = article::paginate(10);
        return view('member/article')->with(compact('data'));
    }

    public function create(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description'=>'required',
            'body'=>'required', 
        ]);

        $article = new article();
        $article->title = $request->title;
        $article->description = $request->description;
        $article->body = $request->body;

        $article->save();

        return redirect()->to('/articles')->send()->with('success', 'Your Articles Successfully Uploaded!');
    }
}
