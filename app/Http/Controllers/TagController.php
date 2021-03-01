<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\ArticleType;
use App\Tag;
use App\Http\Requests\TagRequest;

class TagController extends Controller
{

    public function index(ArticleType $articleType){
        $tags = Tag::where('article_type_id',$articleType->id)->get();
        return view('tag.index',compact('articleType','tags'));
    }
    
    public function create(ArticleType $articleType){
        $tags = Tag::where('article_type_id',$articleType->id);
        return view('tag.create',compact('articleType','tags'));
    }

    public function store(ArticleType $articleType,TagRequest $request){
        $tag = new Tag;
        $tag->article_type_id = $articleType->id;
        $tag->name = $request->name;
        $tag->slug = $request->slug;
        $tag->save();
        return redirect()->action('TagController@index',$articleType);
    }

    public function edit(ArticleType $articleType, Tag $tag){
        return view('tag.edit',compact('articleType','tag'));
    }

    public function update(ArticleType $articleType, Tag $tag, TagRequest $request){
        Tag::where('id',$tag->id)->where('article_type_id',$articleType->id)
                ->update([
                    'name' => $request->name,
                    'slug' => $request->slug,
                ]);
        return redirect()->action('TagController@index',$articleType);
    }

    public function delete(ArticleType $articleType,Tag $tag) {
        $tag = Tag::where('id',$tag->id)->where('article_type_id',$articleType->id)->first();
        $tag->posts()->detach();
        $tag->delete();
        return redirect()->action('TagController@index',$articleType);
    }
}
