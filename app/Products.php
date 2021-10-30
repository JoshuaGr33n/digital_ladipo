<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
  protected $table = 'products';
  
   protected $fillable = [
    'id', 'name','main_category_id','second_category_id','third_category_id','price','old_price','description','pic_1','pic_2','item_status', 'slider','featured','special_offer','banner', 'view_count'
   ];
   protected $attributes = [
    'item_status' => 'Available', 'pic_1' => '','pic_2' => '', 'view_count' => 0
];


}