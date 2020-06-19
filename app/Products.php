<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\cat_pro;
use App\Categories;

class Products extends Model
{   
    protected $fillable = [
        'name', 'description', 'thumbnail', 'price', 'seller'
    ];
    
    public function belongsToMe(){
        if($this->seller == auth()->user()->id){
            return true;
        }
        else{
            return false;
        }
    }

    public function getCategories(){
        return Categories::find(cat_pro::where('product_id', $this->id)->pluck('category_id'))->all();
    }

    public function hasThisCategory($id){
        return count(cat_pro::where('product_id', $this->id)
                ->where('category_id', $id)
                ->get());
    }
}
