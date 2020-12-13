<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Add_Brand extends Model
{
    protected $table = 'add_brand';
    protected $fillable = [
        'brand_name', 'brand_desc',
    ];
}
