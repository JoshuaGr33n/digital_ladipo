<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrdersModel extends Model
{
    protected $table = 'orders';
    protected $fillable = [
       'customer_id', 'email', 'phone', 'address', 'order','order_id','item_id', 'quantity', 'price', 'payment_status','delivery_status','pic'
    ];


   
}