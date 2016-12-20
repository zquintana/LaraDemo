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

Route::get('/', 'BandsController@index')->name('home');
Route::resource('band', 'BandsController', [
    'only' => ['index', 'edit', 'update', 'destroy'],
]);
Route::resource('album', 'AlbumsController', [
    'only' => ['index', 'edit', 'update', 'destroy'],
]);