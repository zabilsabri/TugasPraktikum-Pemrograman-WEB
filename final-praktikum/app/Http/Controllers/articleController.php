<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\article;
use App\Models\articleTag;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Auth;


class articleController extends Controller
{

    public function showArticleDetail($id, $id2)
    {
        $data = article::find($id)->categorys;
        $data2 = article::find($id2)->author;
        $data1 = DB::table('articles')->find($id);
        return view('member/articleDetail')
            -> with(compact('data'))
            -> with(compact('data2'))
            -> with(compact('data1'));
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
            'category' => 'required',
            'subCategory' => 'required',
        ]);

        $article = new article();
        $article->title = $request->title;
        $article->description = $request->description;
        $article->body = $request->body;
        $article->member_id = Auth::id();
        $article->category_id = $request->category;
        $article->sub_category_id = $request->subCategory;

        $article->save();

        # $article_tag = new articleTag();
        # $article_tag->tag_id = $request->tags;
        # $article_tag->article_id = Auth::id();

        # $article_tag->save();

        return redirect()->to('/articles')->send()->with('success', 'Your Articles Successfully Uploaded!');
    }

    public function showCreateArticles()
    {
        $data = DB::table('categories')->where('author_id', Auth::id())->get();
        $data2 = DB::table('tags')->where('author_id', Auth::id())->get();
        return view('member/createArticle')
            ->with(compact('data'))
            ->with(compact('data2'));
    }
}
