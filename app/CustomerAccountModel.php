<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerAccountModel extends Model
{
    protected $table = 'users';
    protected $fillable = [
       'fname', 'lname', 'phone', 'email', 'address', 'password','created_at'
    ];

    protected $attributes = [
          'address' => '',
    ];

//    public function setPasswordAttribute($password)
// {
//     $this->attributes['password'] = \Hash::make($password);
// }
    
}