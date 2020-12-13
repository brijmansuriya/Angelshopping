<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Register extends Model
{
    protected $table = 'register';
    protected $fillable = [
        'firstname', 'lastname', 'gender', 'email', 'mobileno',  'password','image',
    ];
     protected $primaryKey = 'user_id';

}