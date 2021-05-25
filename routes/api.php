<?php

use Illuminate\Http\Request;

Route::post('login', 'Auth\LoginController@Login')->name('login');

Route::middleware('auth:api')->group(function () {
    Route::post('/emails/upload', 'EmailController@handleUpload');
    Route::post('/emails/search', 'EmailController@search');
    Route::post('/emails/files/delete', 'EmailController@deleteFiles');
    Route::apiResource('users', 'UsersController');
    Route::apiResource('emails', 'EmailController');
    Route::get('/home', 'CovidController@index');
//    Route::get('/example/job', function () {
//    });
});
Route::get('/example/job', function () {
    $user = \App\Models\User::first();
   \App\Jobs\ExampleJob::dispatch($user);
});
