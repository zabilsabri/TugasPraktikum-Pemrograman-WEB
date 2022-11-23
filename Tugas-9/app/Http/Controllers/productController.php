<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;
use Illuminate\Support\Facades\DB;


class productController extends Controller
{

    public function showProduct(){
        return view('product', [
            'data' => DB::table('products')->paginate(10)
        ]);
    }

    public function saveProductUseEloquent(Request $request){
        $request->validate([
            'name'=>'required',
            'seller_id'=>'required',
            'category_id'=>'required',
            'price'=>'required',
            'status'=>'required',
        ]);
        
        $product = new product;
        $product->name = $request->name;
        $product->seller_id = $request->seller_id;
        $product->category_id = $request->category_id;
        $product->price = $request->price;
        $product->status = $request->status;

        $product->save();

        return redirect()->to('products')->send()->with('success', 'Data mahasiswa berhasil di tambahkan!');
    }

    public function saveProductUseQueryBuilder(Request $request){
        $request->validate([
            'name'=>'required',
            'seller_id'=>'required',
            'category_id'=>'required',
            'price'=>'required',
            'status'=>'required'
        ]);
        
        $query = DB::table('products')->insert([
            'name'=>$request->input('name'),
            'seller_id'=>$request->input('seller_id'),
            'category_id'=>$request->input('category_id'),
            'price'=>$request->input('price'),
            'status'=>$request->input('status')
        ]);

        if($query){
            return redirect()->to('products')->send()->with('success', 'Data mahasiswa berhasil di tambahkan!');
        } 
    }

    public function editProductUseEloquent(Request $request, $id){
        $request->validate([
            'name'=>'required',
            'seller_id'=>'required',
            'category_id'=>'required',
            'price'=>'required',
            'status'=>'required',
        ]);
        
        $product = product::find($id);
        $product->name = $request->name;
        $product->seller_id = $request->seller_id;
        $product->category_id = $request->category_id;
        $product->price = $request->price;
        $product->status = $request->status;

        $product->save();

        return redirect()->to('products')->send()->with('success', 'Data berhasil di edit!');
    }

    public function editProductUseQueryBuilder(Request $request, $id){
        
        $request->validate([
            'name'=>'required',
            'seller_id'=>'required',
            'category_id'=>'required',
            'price'=>'required',
            'status'=>'required'
        ]);

        $query = DB::table('products')->where('id', $id)->update([
            'name'=>$request->input('name'),
            'seller_id'=>$request->input('seller_id'),
            'category_id'=>$request->input('category_id'),
            'price'=>$request->input('price'),
            'status'=>$request->input('status')
        ]);
        if($query){
            return redirect()->to('products')->send()->with('success', 'Data berhasil di edit!');
        }
    }

    public function deleteUseEloquent($id){
        $product = product::where('id',$id)->delete();
        return redirect()->to('products')->send()->with('success', 'Data berhasil di hapus!');
    }

    public function deleteUseQueryBuilder($id){
        $deleted = DB::table('products')->where('id','=', $id)->delete();
        return redirect()->to('products')->send()->with('success', 'Data berhasil di hapus!');
    }
}
