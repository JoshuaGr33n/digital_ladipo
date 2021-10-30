<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommentReview extends Model
{
  protected $table = 'comments_reviews';
  
   protected $fillable = [
    'id', 'user_id','product_id','comment'
   ];
  


}