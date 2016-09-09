<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();

Route::get('/', 'AlbumController@index');

Route::post('/album', 'AlbumController@create');

Route::put('/album/{album}', 'AlbumController@update');

Route::delete('/album/{album}', 'AlbumController@delete');

//Route::auth();