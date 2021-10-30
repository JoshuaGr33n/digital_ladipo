<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{

   protected $fillable = [
     'name','main_category_id','second_category_id','third_category_id','price','old_price','quantity','description','pic_1','pic_2','item_status', 'car_brand_id','part_brand_id','slider','slider_pic','featured','special_offer','banner', 'view_count'
   ];
   protected $attributes = [
    'item_status' => 'Available', 'pic_1' => '','pic_2' => '','second_category_id' => '','third_category_id' => '','slider_pic' => '', 'view_count' => 0
];
}