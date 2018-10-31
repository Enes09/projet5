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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::resource('post', 'PostController');

Route::get('comment/alert/{comment}', ['as' => 'comment.alert', 'uses'=> 'CommentController@alert']);

Route::get('comment/like/{comment}', ['as' => 'comment.like', 'uses'=> 'CommentController@like']);

Route::get('comment/dislike/{comment}', ['as' => 'comment.dislike', 'uses'=> 'CommentController@dislike']);

Route::get('comment/allow/{comment}', ['as' => 'comment.allow', 'uses'=> 'CommentController@allow']);

Route::get('comment/{post_id}', ['as' => 'comment.index', 'uses' => 'CommentController@index'])->where('post_id','^[1-9]\d*$');

Route::resource('comment', 'CommentController', ['except'=>['index']] );


//['except' => ['index']