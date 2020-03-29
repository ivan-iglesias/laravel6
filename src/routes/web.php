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
    return redirect('/posts');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/about', fn() => view('about'));

Route::post('/vote/{post}', 'PostVoteController@store');

Route::get('/posts', 'PostsController@index')->name('posts.index');
Route::post('/posts', 'PostsController@store')->middleware(['auth']);
Route::get('/posts/create', 'PostsController@create');
Route::get('/posts/{post}', 'PostsController@show')->name('posts.show');
Route::get('/posts/{post}/edit', 'PostsController@edit');
Route::put('/posts/{post}', 'PostsController@update')->middleware(['auth']);

Route::get('/contact', 'ContactController@show');
Route::post('/contact', 'ContactController@store');

Route::get('payments/create', 'PaymentsController@create')->middleware('auth');
Route::post('payments', 'PaymentsController@store')->middleware('auth');
Route::get('notifications', 'UserNotificationsController@show')->middleware('auth');

Route::get('/example/collection', 'ExampleController@collection');
Route::get('/example/facade1', 'ExampleController@facade1');
Route::get('/example/facade2', 'ExampleController@facade2');
Route::get('/example/facade3', 'ExampleController@facade3');
Route::get('/example/service-container', 'ExampleController@serviceContainer');
