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


Route::get('/',function () {return view('home');} );

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('legal', function () { return view('legalMentions'); });

Route::resource('post', 'PostController');

Route::get('comment/alert/{comment}', ['as' => 'comment.alert', 'uses'=> 'CommentController@alert']);

Route::get('comment/like/{comment}', ['as' => 'comment.like', 'uses'=> 'CommentController@like']);

Route::get('comment/dislike/{comment}', ['as' => 'comment.dislike', 'uses'=> 'CommentController@dislike']);

Route::get('comment/allow/{comment}', ['as' => 'comment.allow', 'uses'=> 'CommentController@allow']);

Route::get('comment/{post_id}', ['as' => 'comment.index', 'uses' => 'CommentController@index'])->where('post_id','^[1-9]\d*$');

Route::get('alerted', 'CommentController@alerted');

Route::resource('comment', 'CommentController', ['except'=>['index']] );

Route::resource('user', 'UserController');

Route::get('contact/{id}', ['as'=>'user.contact','uses'=> 'UserController@contact']);

Route::post('contactUser', 'ContactController@contactUser');

Route::get('contactSite', 'ContactController@contactSite');

Route::post('contactToSite', 'ContactController@contactSiteSend');

Route::get('promote/{id}',  ['as'=>'user.promote', 'uses'=> 'UserController@promote'])->where('id','^[1-9]\d*$');

Route::get('demote/{id}',  ['as'=>'user.demote', 'uses'=> 'UserController@demote'])->where('id','^[1-9]\d*$');