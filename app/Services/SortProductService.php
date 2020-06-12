<?php

namespace App\Services;

use App\Products;

class SortProductService
{
    public function sort($sort){
        switch ($sort){
            case "plh":
                return Products::orderBy('price', 'asc')->get();
            case "phl":
                return Products::orderBy('price', 'desc')->get();
            case "pno":
                return Products::orderBy('created_at', 'desc')->get();
            case "pon":
                return Products::orderBy('created_at', 'asc')->get();
            default:
                return Products::orderBy('created_at', 'desc')->get();
        }
    }
}