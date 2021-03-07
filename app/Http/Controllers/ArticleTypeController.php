<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\ArticleType;

class ArticleTypeController extends Controller
{

    public function index(Request $request){
        $articleTypes = ArticleType::all();
        return view('articletype.index',compact('articleTypes')); 
    }

    public function create(){
        $articleTypes = ArticleType::all();
        return view('articletype.create',compact('articleTypes'));
    }

    
    public function store(Request $request){
        $articleType = new ArticleType;
        $articleType->name = $request->name;
        $articleType->slug = $request->slug;
        $articleType->description = $request->description;
        $articleType->save();
        return redirect('/articletype/create');
    }



    public function edit(ArticleType $articleType){
        $modelType = "articleType";
        $articletype = $articleType;
        return view('articletype.edit',compact('modelType','articletype'));
    }
    
    public function update(ArticleType $articleType, Request $request){
        $articleType = articleType::find($articleType->id);
        $articleType->name = $request->name;
        $articleType->slug = $request->slug;
        $articleType->description = $request->description;
        $articleType->save();
        return redirect('/articletype/create');
    }

    public function delete(ArticleType $articleType){
        $articleType = articleType::find($articleType->id);
        $articleType->delete();
        return redirect('/articleyype/create');
    }



}
