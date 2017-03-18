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

Route::get('/partner',['middleware'=>'auth','uses' => 'PartnerController@index'])->name('partner');
Route::get('/partner/detail/{id}',['middleware'=>'auth','uses' => 'PartnerController@show'])->name('partner.detail');

Route::get('/users',['middleware'=>'auth','uses' => 'UsersController@index','as'=>'users']);
Route::get('/users/edit/{$user}',['middleware'=>'auth','uses' => 'UsersController@edit','as'=>'users.edit']);
Route::get('/users/destroy/{$user}',['middleware'=>'auth','uses' => 'UsersController@destroy','as'=>'users.destroy']);
Route::get('/users/create',['middleware'=>'auth','uses' => 'UsersController@create','as'=>'users.create']);

Auth::routes();

Route::get('/', 'IndexController@index')->name('home');

Route::post('/comment',['uses'=>'CommentController@store','as'=>'comment-store']);
Route::post('/comment/edit/{comment}',['uses'=>'CommentController@update','as'=>'comment-update']);
Route::get('/comment/delete/{comment}',['uses'=>'CommentController@destroy','as'=>'comment-delete']);

Route::post('/partner/payStatus/update/{id}',['uses'=>'PaymentController@updateStatus','as'=>'updateStatus']);

