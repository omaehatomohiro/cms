<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\ArticleType;
use App\Author;
use App\Post;
use App\Http\Requests\AuthorRequest;

class AuthorController extends Controller
{

    public function index(ArticleType $articleType){
        $authors = Author::where('article_type_id',$articleType->id)->get();
        return view('author.index',compact('articleType','authors'));
    }

    public function show(ArticleType $articleType,Author $author){
        $posts = Post::where('article_type_id', $articleType->id)->where('author_id', $author->id)->get();
        return view('post.show',compact('articleType','posts'));
    }

    public function create(ArticleType $articleType){
        $authors = Author::all();
        return view('author.create',compact('articleType','authors'));
    }
    
    public function store(ArticleType $articleType,AuthorRequest $request){
        $author = new Author;
        $author->article_type_id = $articleType->id;
        $author->name = $request->name;
        $author->slug = $request->slug;
        $author->description = $request->description;
        $author->save();
        return redirect()->action('AuthorController@index',$articleType);
    }

    public function edit(ArticleType $articleType, Author $author){
        return view('author.edit',compact('articleType','author'));
    }

    
    public function update(ArticleType $articleType, Author $author, AuthorRequest $request){
        Author::where('id',$author->id)->where('article_type_id',$articleType->id)
                ->update([
                    'name' => $request->name,
                    'slug' => $request->slug,
                    'description' => $request->description
                ]);
        return redirect()->action('AuthorController@index',$articleType);
    }

    public function delete(ArticleType $articleType,Author $author){

        DB::beginTransaction();
        try{
            if(isset($author->posts[0])){
                $author->posts[0]->author_id = null;
                $author->push();
            }
            $author->delete();
            DB::commit();
        } catch (Exception $exception) {
            DB::rollBack();
            throw $exception;
        }
        return redirect()->action('AuthorController@index',$articleType);
    }
}
