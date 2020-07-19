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
Route::get('admin', 'Admin\PlanoController@home')->name('adimin.home');

Route::get('admin/planos', 'Admin\PlanoController@index')->name('plano.index');
Route::get('admin/planos/create', 'Admin\PlanoController@create')->name('plano.create');
Route::post('admin/planos/store', 'Admin\PlanoController@store')->name('plano.store');
Route::get('admin/planos/{url}/show', 'Admin\PlanoController@show')->name('plano.show');
Route::get('admin/planos/{id}/edit', 'Admin\PlanoController@edit')->name('plano.edit');
Route::put('admin/planos/{id}/update', 'Admin\PlanoController@update')->name('plano.update');
Route::delete('admin/planos/{url}/destroy', 'Admin\PlanoController@destroy')->name('plano.destroy');
Route::any('admin/planos/search', 'Admin\PlanoController@search')->name('plano.search');
Route::get('/', function () {
    return view('welcome');
});
