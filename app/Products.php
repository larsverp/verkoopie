<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
}
