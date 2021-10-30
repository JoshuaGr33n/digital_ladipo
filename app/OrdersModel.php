<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrdersModel extends Model
{
    protected $table = 'orders';
    protected $fillable = [
       'customer_id', 'phone', 'email', 'address', 'order','item_id','order_id','quantity','price','payment_method','payment_status','delivery_status','created_at'
    ];

    protected $attributes = [
         'delivery_status' => 'Pending', 'pic' => ' ', 'note' => ' '
    ];

    
}