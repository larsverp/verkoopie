<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\cat_pro;
use App\Products;
use App\Categories;

class CategoriesController extends Controller
{
    public function index($id){
        return view('category', ['products'=>Products::find(cat_pro::where('category_id', $id)->pluck('product_id')->all()), 'category'=>Categories::find($id)]);
    }
}
