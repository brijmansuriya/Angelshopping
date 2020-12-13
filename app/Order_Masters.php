<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order_Masters extends Model
{
    protected $table = 'ordermasters';
    protected $fillable = [
        'firstname', 'lastname', 'mobile_no', 'email', 'house_no', 'street', 'city', 'district', 'state', 'pincode', 'user_id', 'ordertotalprice', 'orderstatus', 'order_date',
    ];
    
    protected $primaryKey = 'orderid';
}
