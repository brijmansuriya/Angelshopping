<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminLogin extends Model
{
    protected $table = 'admin_login';
    protected $fillable = [
        'email', 'password',
    ];
}
