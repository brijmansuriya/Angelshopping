<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Login extends Model
{
    protected $table = 'register';
    protected $fillable = [
       'firstname', 'lastname', 'gender', 'mobileno', 'email', 'password',
    ];
    protected $primaryKey = 'user_id';
}
