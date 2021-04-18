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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/empresa', 'Api\EmpresaApiController@index');
Route::get('/empresa/{uuid}', 'Api\EmpresaApiController@show');

Route::get('/categoria', 'Api\CategoriaApiController@getCategoriaByEmpresa');
