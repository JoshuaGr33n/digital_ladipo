<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    protected $table = 'users';
    protected $fillable = [
       'fname', 'lname', 'email', 'phone', 'address', 'gender'
    ];


   
}