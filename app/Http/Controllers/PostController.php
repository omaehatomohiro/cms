<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\ArticleType;
use App\Post;
use App\Category;
use App\Author;
use App\Tag;
use App\Http\Requests\PostRequest;


class PostController extends Controller
{
    public function index(ArticleType $articleType){
        $posts = Post::where('article_type_id',$articleType->id)->orderBy('id','desc')->get();
        return view('post.index',compact('posts','articleType'));
    }

    public function show(ArticleType $articleType, Post $post){
        return view('post.show',compact('articleType','posts'));
    }

    public function create(ArticleType $articleType){
        $categories = Category::where('article_type_id',$articleType->id)->get();
        $authors    = Author::where('article_type_id',$articleType->id)->get();
        $tags       = Tag::where('article_type_id',$articleType->id)->get();
        return view('post.create',compact('articleType','categories','authors','tags'));
    }

    public function store(ArticleType $articleType, PostRequest $request){

        DB::beginTransaction();
        try{
            $post = new Post;
            $post->author_id = $request->author_id ?? null;
            $post->article_type_id = $articleType->id;
            $post->category_id = $request->category_id ?? null;
            $post->post_status = $request->post_status;
            $post->post_slug = $request->post_slug;
            $post->post_title = $request->post_title;
            $post->post_description = $request->post_description;
            $post->post_content = str_replace( '&', '&amp;',$request->post_content);

            
            $image_data = $request->file("post_thumbnail");
            $filename = $image_data->getClientOriginalName();
            $post->post_thumbnail = $filename;
            $image_data->storeAs('public/thumbnails',$filename);

            $post->save();

            // 空でなければ
            if( isset($request->selected_tags) ){
                $post->tags()->sync($request->selected_tags);
            }
            
            DB::commit();

            return redirect()->action('PostController@index',$articleType);

        } catch (Exception $exception) {
            DB::rollBack();
            throw $exception;
        }
    }


    public function edit(ArticleType $articleType, Post $post){
        $categories = Category::where('article_type_id',$articleType->id)->get();
        $authors    = Author::where('article_type_id',$articleType->id)->get();
        $tags = Tag::where('article_type_id',$articleType->id)->get();
        return view('post.edit',compact('articleType','categories','authors','tags','post'));
    }

    public function update(ArticleType $articleType,Post $post, PostRequest $request){

        DB::beginTransaction();
        try{

            $post->author_id = $request->author_id ?? null;
            $post->article_type_id = $articleType->id;
            $post->category_id = $request->category_id ?? null;
            $post->post_status = $request->post_status;
            $post->post_slug = $request->post_slug;
            $post->post_title = $request->post_title;
            $post->post_description = $request->post_description;
            $post->post_content = str_replace( '&', '&amp;',$request->post_content);

            if(!is_null($request->file("post_thumbnail"))){
                $image_data = $request->file("post_thumbnail");
                $filename = $image_data->getClientOriginalName();
                $post->post_thumbnail = $filename;
                $image_data->storeAs('public/thumbnails',$filename);
            }

            $post->save();

            // 空でなければ 中間テーブルの更新
            if( isset($request->selected_tags) ){
                $post->tags()->sync($request->selected_tags);
            }
            
            DB::commit();

            return redirect()->action('PostController@index',$articleType);

        } catch (Exception $exception) {
            DB::rollBack();
            throw $exception;
        }
        return redirect('/');
    }

    public function delete(ArticleType $articleType, Post $post){
        $post->tags()->detach();
        $post->delete();
        return redirect()->action('PostController@index',$articleType);
    }

    private function check_duplicate_slug($current_slug,$slugs){
        $flag = false;
        foreach($slugs as $slug){
            if( $current_slug === $slug ){
                $flag == true;
                return;
            }
        }
        return $flag;
    }

    
}