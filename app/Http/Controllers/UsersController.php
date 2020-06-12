<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products;

class UsersController extends Controller
{
    public function list(Request $request) {
        return view('userproducts', ['products'=>Products::where('seller', $request->user()->id)->get()]);
    }

    public function products($id, Request $request) {
        $product = Products::where('id', $id)->first();
        if($product->belongsToMe()){
            return view('update', ['product'=>$product]);
        }
    }
}
