<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\article;
use Auth;


class articleController extends Controller
{

    public function showArticleDetail($id)
    {
        $data = article::find($id);
        return view('member/articleDetail' ,compact('data'));
    }

    public function showArticles()
    {
        $data = article::where('member_id', Auth::id())->paginate(10);
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
        $article->member_id = Auth::id();

        $article->save();

        return redirect()->to('/articles')->send()->with('success', 'Your Articles Successfully Uploaded!');
    }
}
