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

Route::get('/string', function () {
    return 'Hello Word';
});

Route::get('/json', function () {
    return ['name' => 'Ivan Iglesias'];
});

/*
 * Nuevo en PHP 7.4.
 * Los short closures solo pueden ser usados con una linea.
 */
Route::get('/short-closure', fn() => view('welcome'));
