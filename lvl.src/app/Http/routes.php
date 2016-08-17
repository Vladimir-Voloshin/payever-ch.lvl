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

/**
 * Add New Album
 */
Route::post('/album', function (Request $request) {
    $validator = Validator::make($request->all(), [
        'album_name' => 'required|max:255',
    ]);

    if ($validator->fails()) {
        return redirect('/')
            ->withInput()
            ->withErrors($validator);
    }

    $album = new Album;
    $album->album_name = $request->album_name;
    $album->save();

    return redirect('/');
});


Route::delete('/album/{album}', 'AlbumController@delete');

/**
 * Delete Album
 */
Route::delete('/album/{album}', function (Album $album) {
    $album->delete();
    return redirect('/');
});

Route::auth();