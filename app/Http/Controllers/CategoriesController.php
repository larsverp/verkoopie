<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\cat_pro;
use App\Products;
use App\Categories;
use App\Http\Requests;


class CategoriesController extends Controller
{
    public function show(Request $request){
        if($request->user()->isAdmin){
            return view('admincategories', ['categories' => Categories::orderBy('name', 'ASC')->get()]);
        }
    }

    public function index($id){
        return view('category', ['products'=>Products::find(cat_pro::where('category_id', $id)->pluck('product_id')->all()), 'category'=>Categories::find($id)]);
    }

    public function get_update($id){
        return view('update_category', ['category' => Categories::where('id', $id)->first()]);
    }

    public function update(Requests\UpdateCategoryRequest $request, $id){
        $category = Categories::where('id', $id)->first();
        $category->update([
            "name" => $request->get('name')
        ]);
        return redirect('/categories');
    }

    public function create(Requests\UpdateCategoryRequest $request){
        Categories::create([
            "name" => $request->get('name')
        ]);
        return redirect('/categories');
    }

    public function remove(Request $request, $id){
        if($request->user()->isAdmin){
            $category = Categories::where('id', $id)->first();
            $category->delete();
        }
        return redirect('/categories');
    }
}
