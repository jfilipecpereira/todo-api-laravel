<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['prefix' => 'users', 'as' => 'users.'], function () {
    //Route for get all users
    Route::get('/', 'userController@showusers')->name('showusers');

    //Route for get an user by id
    Route::get('/{id}', 'userController@showuser')->name('showuser');
    
	//Route to create an user
    Route::post('/', 'userController@store')->name('createuser');

    //Route to update an user
    Route::put('/{id}', 'userController@update')->name('updateuser');

    //Route to delete an user
    Route::delete('/{id}', 'userController@delete')->name('deleteuser');
});

Route::group(['prefix' => 'notas', 'as' => 'notas.'], function () {
    //Route for get all notes (by user)
    Route::get('/{id}', 'apiController@shownotes')->name('shownotes');

    //Route for create note
    Route::post('/post', 'apiController@createnote')->name('createnote');
});



