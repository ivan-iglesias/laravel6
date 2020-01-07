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
    return view('welcome');
});

/*
 * http://localhost:8080/posts/my-first-post
 * http://localhost:8080/posts/my-third-post
 */
Route::get('/posts/{post}', function ($post) {
    $posts = [
        'my-first-post' => 'Hello, this is my first post!',
        'my-second-post' => 'This is my second post.'
    ];

    // return view('post', ['post' => $posts[$post] ?? 'Nothing here yet.']);

    if (! array_key_exists($post, $posts)) {
        abort(404, 'Sorry, that post was not found.');
    }

    return view('post', ['post' => $posts[$post]]);
});
