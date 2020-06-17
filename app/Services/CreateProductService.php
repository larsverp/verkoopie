<?php

namespace App\Services;

use App\Http\Requests\CreateProductRequest;
use App\Products;
use App\cat_pro;

class CreateProductService
{
    public function make(CreateProductRequest $request){
        $product = Products::create([
            'name' => $request->get('name'),
            'description' => $request->get('description'),
            'thumbnail' => $request->get('thumbnail'),
            'price' => number_format((float)$request->get('price'), 2, '.', ''),
            'seller' => $request->user()->id
        ]);

        foreach($request->get('categories') as $category){
            cat_pro::create([
                'product_id' => $product->id,
                'category_id' => $category
            ]);
        }

        return $product;
    }
}