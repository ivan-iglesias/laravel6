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

Route::get('/posts', 'PostsController@index')->name('posts.index');
Route::post('/posts', 'PostsController@store')->middleware(['auth']);
Route::get('/posts/create', 'PostsController@create');
Route::get('/posts/{post}', 'PostsController@show')->name('posts.show');
Route::get('/posts/{post}/edit', 'PostsController@edit');
Route::put('/posts/{post}', 'PostsController@update')->middleware(['auth']);

Route::get('/example/collection', 'ExampleController@collection');

/*
app()->bind('example', function() {
    return new \App\Example();
});
*/

Route::get('/service-container', function() {
    /*
     * resolve('example');
     * resolve(App\Example::class);
     * app()->make(App\Example::class);
     */
    $example = resolve(App\Example::class);

    $example->go();
});
