<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products;
use App\User;

class UsersController extends Controller
{
    public function list(Request $request) {
        return view('userproducts', ['products'=>Products::where('seller', $request->user()->id)->get()]);
    }

    public function listUser($id) {
        return view('user_products', ['products'=>Products::where('seller', $id)->get(), 'user'=>User::where('id', $id)->first()]);
    }

    public function products($id, Request $request) {
        $product = Products::where('id', $id)->first();
        if($product->belongsToMe()){
            return view('update', ['product'=>$product]);
        }
    }
}
