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
}
