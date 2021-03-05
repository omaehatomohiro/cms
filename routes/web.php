<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', 'ArticleTypeController@index')->name('home');

Route::get('/', function () {
    return view('home'); //←追加
});

Route::group(['middleware' => ['auth'],'prefix' => 'articletype'], function(){

    // article type
    Route::get('/', 'ArticleTypeController@index')->name('articletype.index');
    Route::get('/create','ArticleTypeController@create')->name('articletype.create');
    Route::post('/store','ArticleTypeController@store')->name('articletype.store');
    Route::get('/{articleType}/edit','ArticleTypeController@edit')->name('articletype.edit');
    Route::patch('/{articleType}/update','ArticleTypeController@update')->name('articletype.update');
    Route::delete('/{articleType}/delte','ArticleTypeController@delete')->name('articletype.delete');


    // post
    Route::get('/{articleType}/posts/','PostController@index');
    Route::get('/{articleType}/post/{post}','PostController@show')->where('post', '[0-9]+');
    Route::get('/{articleType}/post/create','PostController@create');
    Route::post('/{articleType}/post/store','PostController@store')->where('articleType', '[0-9]+');
    Route::get('/{articleType}/post/{post}/edit','PostController@edit')->where('post', '[0-9]+');
    Route::patch('/{articleType}/post/{post}/update','PostController@update')->where('post', '[0-9]+');
    Route::delete('/{articleType}/post/{post}/delete','PostController@delete')->where('post', '[0-9]+');
    

    // tag
    Route::get('/{articleType}/tags','TagController@index');
    Route::get('/{articleType}/tag/{tag}','TagController@show')->where('tag', '[0-9]+');
    Route::get('/{articleType}/tag/create','TagController@create');
    Route::post('/{articleType}/tag/store','TagController@store');
    Route::get('/{articleType}/tag/{tag}/edit','TagController@edit');
    Route::patch('/{articleType}/tag/{tag}/update','TagController@update');
    Route::delete('/{articleType}/tag/{tag}/delete','TagController@delete');


    // category
    Route::get('/{articleType}/categories','CategoryController@index');
    Route::get('/{articleType}/category/{category}','CategoryController@show')->where('category', '[0-9]+');
    Route::get('/{articleType}/category/create','CategoryController@create');
    Route::get('/{articleType}/category/{category}/edit','CategoryController@edit');
    Route::post('/{articleType}/category/store','CategoryController@store');
    Route::patch('/{articleType}/category/{category}/update','CategoryController@update');
    Route::delete('/{articleType}/category/delete/{category}','CategoryController@delete');

    // author
    Route::get('/{articleType}/authors','AuthorController@index');
    Route::get('/{articleType}/author/{author}','AuthorController@show')->where('author', '[0-9]+');
    Route::get('/{articleType}/author/create','AuthorController@create');
    Route::get('/{articleType}/author/{author}/edit','AuthorController@edit');
    Route::post('/{articleType}/author/store','AuthorController@store');
    Route::patch('/{articleType}/author/{author}/update','AuthorController@update');
    Route::delete('/{articleType}/author/delete/{author}','AuthorController@delete');
});

Auth::routes();
