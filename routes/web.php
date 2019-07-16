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

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');
// Route::get('/dimola', 'PostController@index');
// Route::get('/create_post', 'PostController@create');
Route::post('/store/post', 'PostController@store');
Route::get('/post/{post}/show', 'PostController@show');
Route::get('/post/{post}/edit', 'PostController@edit');
Route::patch('/post/{post}', 'PostController@update');

Route::get('post/{id}/delete', 'PostController@destroy');
