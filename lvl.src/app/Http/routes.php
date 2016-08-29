<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use App\Album;
use Illuminate\Http\Request;

Route::get('/', 'AlbumController@index');

Route::post('/album', 'AlbumController@create');

Route::put('/album/{album}', 'AlbumController@update');

Route::delete('/album/{album}', 'AlbumController@delete');

Route::auth();