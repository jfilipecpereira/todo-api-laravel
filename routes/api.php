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
Route::post('/login', 'loginController@login')->name('login');
//Route to create an user
Route::post('/register', 'userController@store')->name('createuser');


 //Route for get all users
 Route::get('/get_users', 'userController@showusers');

Route::middleware('auth:api')->name('SuperUser')->group(function(){
  
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
//Route for create note
Route::post('/notas/post', 'apiController@createnote')->name('createnote');
Route::group(['prefix' => 'notas', 'as' => 'notas.'], function () {
    //Route for get all notes (by user)
    Route::get('/{id}', 'apiController@shownotes')->name('shownotes');

    //Route for get all notes (by user)
    Route::post('/{id}', 'apiController@deletenote')->name('deletenote');

    
});









