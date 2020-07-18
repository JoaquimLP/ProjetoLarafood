<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('admin/planos', 'Admin\PlanoController@index')->name('plano.index');
Route::get('admin/planos/create', 'Admin\PlanoController@create')->name('plano.create');
Route::post('admin/planos/store', 'Admin\PlanoController@store')->name('plano.store');
Route::get('/', function () {
    return view('welcome');
});
