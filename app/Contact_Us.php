<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact_Us extends Model
{
    protected $table = 'contact_us';
    protected $fillable = [
        'name', 'email', 'mobileno','message',
    ];
}
