<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{   
    protected $fillable = [
        'first_name', 'last_name', 'email', 'postal_code', 'house_number', 'password', 'token'
    ];
}
