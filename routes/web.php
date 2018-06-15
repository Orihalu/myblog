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

Route::get('/', 'PostsController@index');
Route::get('/posts/{post}', 'PostsController@show')->where('post','[0-9]+');
Route::get('/posts/create', 'PostsController@create');
Route::post('/posts', 'PostsController@store');
Route::get('/posts/{post}/edit', 'PostsController@edit');
Route::patch('/posts/{post}', 'PostsController@update');
Route::delete('/posts/{post}', 'PostsController@destroy');
Route::post('/posts/{post}', 'CommentsController@store');
Route::delete('/posts/{post}/comments/{comment}', 'CommentsController@destroy');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('users', 'UserController');

Route::get('/contact', 'ContactsController@index');
Route::post('/contact/confirm', 'ContactsController@confirm');
// Route::get('/contact/confirm', 'ContactsController@confirm');
// Route::post('/contact/complete', 'OrderController@ship');
Route::post('/contact/complete', 'ContactsController@complete');
Route::post('/contact/complete', 'OrderController@ship');

Route::get('sample/mailable/preview', function () {
  return new App\Mail\OrderShipped();
});

// Route::group('middleware' => 'auth') , function() {
//
// }
