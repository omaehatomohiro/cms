<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\ArticleType;
use App\Category;
use App\Post;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    public function index(ArticleType $articleType){
        $categories = Category::where('article_type_id',$articleType->id)->get();
        return view('category.index',compact('articleType','categories'));
    }

    public function show(ArticleType $articleType,Category $category){
        $posts = Post::where('article_type_id', $articleType->id)->where('category_id', $category->id)->get();
        return view('post.show',compact('articleType','posts'));
    }

    public function create(ArticleType $articleType){
        $categories = Category::all();
        return view('category.create',compact('articleType','categories'));
    }
    
    public function store(ArticleType $articleType,CategoryRequest $request){
        $category = new Category;
        $category->article_type_id = $articleType->id;
        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->description = $request->description;
        $category->save();
        return redirect()->action('CategoryController@index',$articleType);
    }

    public function edit(ArticleType $articleType, Category $category){
        return view('category.edit',compact('articleType','category'));
    }

    
    public function update(ArticleType $articleType, Category $category, CategoryRequest $request){
        Category::where('id',$category->id)->where('article_type_id',$articleType->id)
                ->update([
                    'name' => $request->name,
                    'slug' => $request->slug,
                    'description' => $request->description
                ]);
        return redirect()->action('CategoryController@index',$articleType);
    }

    public function delete(ArticleType $articleType,Category $category){

        DB::beginTransaction();
        try{
            if(isset($category->posts[0])){
                $category->posts[0]->category_id = null;
                $category->push();
            }
            $category->delete();
            DB::commit();
        } catch (Exception $exception) {
            DB::rollBack();
            throw $exception;
        }
        return redirect()->action('CategoryController@index',$articleType);
    }

}
