<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products;

class ProductsController extends Controller
{
    public function __construct()
    {

        $this->middleware('auth');

    }

    public function show(){
        $products = Products::all();
        return view('home', ['products'=>$products]);
    }

    public function index($id){
        $product = Products::findOrFail($id);
        return view('product', ['product'=>$product]);
    }

    public function create(Request $request){
        $ValidateAttributes = request()->validate([
            'name' => 'required|max:191|string',
            'description' => 'required',
            'thumbnail' => 'required|string',
            'price' => 'required',
        ]);

        $ValidateAttributes["seller"] = $request->user()->id;

        Products::create($ValidateAttributes);
        return redirect('/home');
    }

    public function userlist(Request $request){
        $products = Products::where('seller', $request->user()->id)->get();
        return view('userproducts', ['products'=>$products]);
    }

    public function remove($id, Request $request){
        $product = Products::where('id', $id)->first();
        if($product->seller == $request->user()->id){
            $product->delete();
            return redirect()->route('my_products');
        }
    }

    public function get_update($id, Request $request){
        $product = Products::findOrFail($id);
        if($request->user()->id == $product->seller){
            return view('update', ['product'=>$product]);
        }
        else{
            return view('home');
        }
        
    }

    public function update(){
        
    }
}
