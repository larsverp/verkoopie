<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cat_pro extends Model
{
    protected $fillable = [
        'product_id', 'category_id'
    ];
}
