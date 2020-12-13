<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Add_Category extends Model
{
    protected $table = 'add_category';
    protected $fillable = [
        'category_name', 'category_desc',
    ];
}
