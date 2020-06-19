<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products;
use App\User;
use App\Http\Requests;
use App\Categories;
use App\Services\ProductService;
use App\Services\SortProductService;
use PhpParser\Node\Stmt\Catch_;

class ProductsController extends Controller
{
    public $productService;
    public $productSort;

    public function __construct()
    {
        $this->middleware('auth');
        $this->productService = new ProductService();
        $this->productSort = new SortProductService();
    }

    public function show(Request $request)
    {
        return view('home', ['products' => $this->productSort->sort($request->input('sort'))]);
    }

    public function index($id)
    {
        $product = Products::findOrFail($id);
        return view('product', ['product' => $product, 'user' => User::where('id', $product->seller)->first()]);
    }

    public function create(Requests\CreateProductRequest $request)
    {
        $this->productService->make($request);
        return redirect('/home');
    }

    public function remove($id, Request $request)
    {
        $product = Products::where('id', $id)->first();
        if ($product->belongsToMe()) {
            $product->delete();
            return redirect()->route('my_products');
        } else if ($request->user()->isAdmin) {
            $product->delete();
            return redirect('/home');
        }
    }

    public function get_update($id, Request $request)
    {
        $product = Products::findOrFail($id);
        if ($product->belongsToMe()) {
            return view('update', ['product' => $product]);
        } else {
            return view('home');
        }
    }

    public function update(Requests\UpdateProductRequest $request)
    {
        $this->productService->update($request);
        return redirect('/user/product');
    }
}
