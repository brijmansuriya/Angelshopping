<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orders_Detail extends Model
{
   
    protected $table = 'ordersdetail';
    protected $fillable = [
        'itemid', 'itemqtys', 'itemprice',
    ];
}
