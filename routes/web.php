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
// Route::post('/contact/complete', 'OrderController@ship');

Route::get('sample/mailable/preview', function () {
  return new App\Mail\OrderShipped();
});
//all user
// Route::group(['middleware' => ['auth', 'can:user-higher']]) function() {
//   Route::get('/post', 'PostsController@index')->name('post.index');
// }
//
// //admin user
// Route::

Route::group(['middleware' => 'owner_auth'], function() {
  Route::get('/owner/home', 'Owner\HomeController@index');
});

// Route::group('middleware' => 'auth') , function() {
//
// }


Route::prefix('admin')->group(function() {
  Route::get('/home', 'Admin\HomeController@index')->name('admin.dashboard');
  Route::get('/login', 'Admin\LoginController@showLoginForm')->name('admin.login');
  Route::post('/login', 'Admin\LoginController@login')->name('admin.login.submit');
  Route::get('/logout', 'Admin\LoginController@logout')->name('admin.logout');
  Route::get('/contact', 'AdminContactsController@index')->name('admin.contact');
  Route::get('/contact/{contact}','AdminContactsController@show')->name('admin.showcontact');
});
