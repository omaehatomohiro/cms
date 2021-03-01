<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Post extends Model
{
    public function article_type(){
        return $this->belongsTo('App\ArticleType');
    }

    public function category(){
        return $this->belongsTo('App\Category','category_id');
    }

    public function tags(){
        return $this->belongsToMany('App\Tag', 'post_tag_relation');
    }

}
