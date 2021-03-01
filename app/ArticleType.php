<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArticleType extends Model
{

  public function posts(){
    $this->hasMany('App\Post');
  }
 
}
