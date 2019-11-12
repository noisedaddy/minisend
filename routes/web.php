<?php

Route::get('{catchall}', function () {
    return view('index');
})->where('catchall', '.*');
