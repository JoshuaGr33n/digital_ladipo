<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoriesModel extends Model {

    protected $table = 'categories';
    protected $fillable = [
        'id','main_category','second_category','third_category','main_category_id', 'second_category_id'
    ];

    protected $attributes = [
        'main_category' => '','main_category_id' => '',  'second_category_id' => '', 'third_category'=> '', 'second_category' => ''
    ];
}