<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Add_Cart extends Model
{
    protected $table = 'cart';
    protected $fillable = [
        'c_id', 'cartItem', 'cartsitemqty', 'user_id',
    ];
    protected $primaryKey = 'c_id';
}
