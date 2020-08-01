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

/* Route::get('/', function () {
    return view('welcome');
}); */
Route::redirect('/', '/home');
Route::get('/', 'Admin\PlanoController@home')->name('admin.home');
Route::prefix('admin')->namespace('Admin')->group(function(){
    
    /**
    * Plano
    */
    Route::get('/planos', 'PlanoController@index')->name('plano.index');
    Route::get('/planos/create', 'PlanoController@create')->name('plano.create');
    Route::post('/planos/store', 'PlanoController@store')->name('plano.store');
    Route::get('/planos/{url}/show', 'PlanoController@show')->name('plano.show');
    Route::get('/planos/{id}/edit', 'PlanoController@edit')->name('plano.edit');
    Route::put('/planos/{id}/update', 'PlanoController@update')->name('plano.update');
    Route::delete('/planos/{url}/destroy', 'PlanoController@destroy')->name('plano.destroy');
    Route::any('/planos/search', 'PlanoController@search')->name('plano.search');

    /**
     * Detalhes do plano
     */

    Route::get('planos/{url}/detalhes', 'DetalhesPlanoController@index')->name('detalhes.index');
    Route::get('planos/{url}/detalhes/create', 'DetalhesPlanoController@create')->name('detalhes.create');
    Route::post('planos/{url}/detalhes/store', 'DetalhesPlanoController@store')->name('detalhes.store');
    Route::get('planos/{url}/detalhes/edit', 'DetalhesPlanoController@edit')->name('detalhes.edit');
    Route::put('planos/{id}/detalhes/update', 'DetalhesPlanoController@update')->name('detalhes.update');
    Route::get('planos/{url}/detalhes/{id}/show', 'DetalhesPlanoController@show')->name('detalhes.show');
    Route::delete('planos/{url}/detalhes/{id}/delete', 'DetalhesPlanoController@destroy')->name('detalhes.destroy');

});

