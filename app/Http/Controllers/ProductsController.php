<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products;
use App\Http\Requests;
use App\Services\CreateProductService as CreateProductService;

class ProductsController extends Controller
{
    public $productService;

    public function __construct() {
        $this->middleware('auth');
        $this->productService = new CreateProductService();
    }

    public function show() {
        return view('home', ['products'=>Products::all()]);
    }

    public function index($id) {
        return view('product', ['product'=>Products::findOrFail($id)]);
    }

    public function create(Requests\CreateProductRequest $request) {
        $this->productService->make($request);
        return redirect('/home');
    }

    public function userlist(Request $request) {
        return view('userproducts', ['products'=>Products::where('seller', $request->user()->id)->get()]);
    }

    public function userproduct($id, Request $request) {
        $product = Products::where('id', $id)->first();
        if($product->belongsToMe()){
            return view('update', ['product'=>$product]);
        }
    }

    public function remove($id, Request $request) {
        $product = Products::where('id', $id)->first();
        if($product->belongsToMe()){
            $product->delete();
            return redirect()->route('my_products');
        }
        else if($request->user()->isAdmin){
            $product->delete();
            return redirect('/home');
        }
    }

    public function get_update($id, Request $request) {
        $product = Products::findOrFail($id);
        if($product->belongsToMe()){
            return view('update', ['product'=>$product]);
        }
        else{
            return view('home');
        }
        
    }

    public function update(Requests\UpdateProductRequest $request){
        $product = Products::findOrFail($request->get('id'));
        if($product->belongsToMe()){
            $product->update($request->all());
            return redirect()->route('my_products');
        }
    }
}
