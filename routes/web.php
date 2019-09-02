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

Route::get('/welcome', 'HomeController@index')->name('welcome')->middleware('verified');
// Route::get('try',function(){
//     return App\post::with('user','likes')->get();
// });
Route::post('/store/post', 'PostController@store');
Route::get('/post/{post}/show', 'PostController@show');
Route::get('/post/{post}/edit', 'PostController@edit');
Route::patch('/post/{post}', 'PostController@update');
Route::get('/profile', 'ProfileController@index')->name('profile');
Route::get('/edit-profile', 'ProfileController@edit')->name('edit-profile');
Route::post('/profile/{profile}/update', 'ProfileController@update');
// Route::get('/my_post', 'PostController@mypost');
Route::get('/my_post', 'PostController@getpost')->name('my_post');

Route::get('users/{user}/@{username}', 'ProfileController@author');

Route::get('post/{post}/delete', 'PostController@destroy');
Route::any('/search', 'HomeController@search');
Route::get('/posts/{post}/like', 'LikeController@like');
Route::post('/posts/{post}/comment', 'CommentController@store');
Route::get('/posts/{post}/delete', 'CommentController@destroy');

// Route::get('/error', 'HomeController@error');
// Route::get('drop', function() {
//     return Illuminate\Support\Facades\Schema::dropIfExists('tags');
// });

Route::get('tag/{tag}/tag_post', 'TagController@tagpost');
Route::get('/dashboard', 'HomeController@dashboard');
Route::get('/users/{user}', 'HomeController@role');
Route::post('/users/{user}', 'HomeController@update');
