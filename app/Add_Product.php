<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Add_Product extends Model
{
    protected $table = 'product';
    protected $fillable = [
        'p_name', 'p_qty', 'p_listprice', 'p_op', 'p_suggesion', 'p_desc', 'p_image', 'p_add_date', 'p_gw', 'p_gw_desc',
    ];
    protected $primaryKey = 'p_id';
}
