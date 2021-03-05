<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Author extends Model
{
    public function posts(){
        return $this->hasMany('App\Post','author_id','id');
    }
}
