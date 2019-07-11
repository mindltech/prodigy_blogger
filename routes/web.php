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

Route::get('/', 'PostController@index');
Route::get('/create/post', 'PostController@create');

Auth::routes(['verify' => true]);

ft-user-functionality
Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');
// Route::get('/dimola', 'PostController@index');
// Route::get('/create_post', 'PostController@create');  
Route::post('/store/post', 'PostController@store');
Route::get('/posts/{post}/show', 'PostController@show');
Route::get('/edit/post/{id}', 'PostController@edit');
Route::patch('/', 'PostController@update');
Route::delete('/', 'PostController@destroy');
