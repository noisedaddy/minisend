<?php

use Illuminate\Http\Request;

Route::post('login', 'Auth\LoginController@Login')->name('login');


Route::middleware('auth:api')->group(function () {
    /**
     * Users Resource
     */
//    Route::prefix('users')->group(function () {
//        Route::get('/', 'UsersController@index');
//        Route::post('/', 'UsersController@create');
//        Route::get('/{userId}', 'UsersController@read');
//        Route::put('/{userId}', 'UsersController@update');
//        Route::delete('/{userId}', 'UsersController@delete');
//    });
    Route::apiResource('users', 'UsersController');
});
