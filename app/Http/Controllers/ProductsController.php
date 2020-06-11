<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products;
use App\Http\Requests;
use App\Services\CreateProductService;
use App\Services\SortProductService;

class ProductsController extends Controller
{
    public $productService;
    public $productSort;

    public function __construct() {
        $this->middleware('auth');
        $this->productService = new CreateProductService();
        $this->productSort = new SortProductService();
    }

    public function show(Request $request) {
        return view('home', ['products'=>$this->productSort->sort($request->input('sort'))]);
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
