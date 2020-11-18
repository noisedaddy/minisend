<?php

use Illuminate\Http\Request;

Route::post('login', 'Auth\LoginController@Login')->name('login');

Route::middleware('auth:api')->group(function () {
//    Route::put('/users/{id}/avatar', 'UsersController@uploadAvatar');
    Route::put('/emails/{id}', 'EmailController@uploadAttachment');
    Route::post('/emails/search', 'EmailController@search');
    Route::apiResource('users', 'UsersController');
    Route::apiResource('emails', 'EmailController');

});
