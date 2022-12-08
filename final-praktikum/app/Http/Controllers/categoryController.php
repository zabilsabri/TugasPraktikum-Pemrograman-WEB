<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;
use Auth;

class categoryController extends Controller
{
    public function showCategory()
    {
        $data = category::where('author_id', Auth::id())->paginate(10);
        return view('member/category')->with(compact('data'));
    }

    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $category = new category();
        $category->name = $request->name;
        $category->author_id = Auth::id();
        $category->save();

        return redirect()->to('/category')->send()->with('success', 'Your Category Successfully Uploaded!');
    }

    public function edit(Request $request, $id){
        $request->validate([
            'name'=>'required',
        ]);
        
        $category = category::find($id);
        $category->name = $request->name;

        $category->save();

        return redirect()->to('/category')->send()->with('success', 'Data berhasil di edit!');
    }
}