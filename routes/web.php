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


Auth::routes();

Route::get('/', 'AlbumController@index'); //TODO: make a landing

Route::group(['prefix' => 'web'], function(){
	Route::group(['prefix' => 'album'], function(){
		Route::post('/create', 'AlbumController@create');
		Route::put('/{album}', 'AlbumController@update');
		Route::delete('/{album}', 'AlbumController@delete');
	});
});

//Route::get('/web/albums', 'AlbumController@index');


//Route::auth();