<?php

namespace App\Services;

use App\Http\Requests\CreateProductRequest;
use App\Products;

class CreateProductService
{
    public function remove(CreateProductRequest $request){
        $product = Products::create([
            'name' => $request->get('name'),
            'description' => $request->get('description'),
            'thumbnail' => $request->get('thumbnail'),
            'price' => number_format((float)$request->get('price'), 2, '.', ''),
            'seller' => $request->user()->id
        ]);

        return $product;
    }
}