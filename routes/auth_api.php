<?php

use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => 'v1',
    'namespace' => 'Api'
], function () {
    Route::get('/my-orders', 'Auth\OrderController@index')->middleware(['auth']);
    Route::patch('/my-orders', 'Auth\OrderController@update')->middleware(['auth']);
});
