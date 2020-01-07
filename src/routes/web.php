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
 * http://localhost:8080/test?name=Ivan
 * http://localhost:8080/test?name=<script>alert('Hello!')</script>
 */
Route::get('/test', function () {
    $name = request('name');

    return view('test', [
        'name' => $name
    ]);
});
