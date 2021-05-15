<?php

use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => 'v1',
    'namespace' => 'Api'
], function () {
    Route::get('/my-orders', 'Auth\OrderEmpresaController@index')->middleware(['auth']);
    Route::patch('/my-orders', 'Auth\OrderEmpresaController@update')->middleware(['auth']);
});
