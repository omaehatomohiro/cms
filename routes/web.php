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

Route::get('/', 'ArticleTypeController@index')->name('home');

Route::group(['prefix' => 'articletype'], function(){

    // article type
    Route::get('/create','ArticleTypeController@create');
    Route::post('/store','ArticleTypeController@store');
    Route::get('/{articleType}/edit','ArticleTypeController@edit');
    Route::patch('/{articleType}/update','ArticleTypeController@update');
    Route::delete('/{articleType}/delte','ArticleTypeController@delete');


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

});


// Route::group(['prefix' => 'post'], function(){
//     // Route::get('/{articleType}','PostController@index');
//     Route::post('/{articleType}/store','PostController@store');
//     Route::get('/{articleType}','PostController@index');
//     Route::get('/{articleType}/create/{post}','PostController@show');
//     Route::get('/{articleType}/create','PostController@create');
// });


// Route::group(['prefix' => 'category'], function(){
    // Route::get('/create','CategoryController@create');
    // Route::get('/{category}','CategoryController@edit');
    // Route::post('/store','CategoryController@store');
    // Route::patch('/update/{category}','CategoryController@update');
    // Route::delete('/delete/{category}','CategoryController@delete');
// });

// Route::group(['prefix' => 'tag'], function(){
//     // Route::get('/create','TagController@create');
//     // Route::get('/show/{tag}','TagController@show');
//     // Route::post('/store','TagController@store');
//     // Route::patch('/update/{category}','CategoryController@update');
//     // Route::delete('/delete/{category}','CategoryController@delete');
// });



//Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

// Route::group(['prefix' => 'article'], function(){

//     // Route::get('/',function(){

//     // });

//     // Route::get('/{id}',function(){

//     // });

//     Route::get('/create','ArticleTypeController@create');
//     Route::post('/store','ArticleTypeController@store');
    

// });
