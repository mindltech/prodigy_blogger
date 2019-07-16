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
Route::patch('/', 'PostController@update');
Route::delete('/', 'PostController@destroy');
Route::get('/profile', 'ProfileController@index')->name('profile');
Route::get('/edit-profile', 'ProfileController@edit')->name('edit-profile');
Route::post('/profile/{profile}/update', 'ProfileController@update');
// Route::get('/my_post', 'PostController@mypost');
Route::get('/my_post', 'PostController@getpost')->name('my_post');
