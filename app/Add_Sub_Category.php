<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Add_Sub_Category extends Model
{
    protected $table = 'add_sub_category';
    protected $fillable = [
        'sc_name', 'sc_desc',
    ];
    protected $primaryKey = 'sc_id';
}
