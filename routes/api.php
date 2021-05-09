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

Route::group([
    'prefix' => 'v1',
    'namespace' => 'Api'
    ],function () {
            Route::get('/empresa', 'EmpresaApiController@index');
            Route::get('/empresa/{uuid}', 'EmpresaApiController@show');

            Route::get('/categoria', 'CategoriaApiController@getCategoriaByEmpresa');
            Route::get('/categoria/{categoria_id}', 'CategoriaApiController@show');

            Route::get('/mesa/{mesa_id}', 'MesaApiController@show');
            Route::get('/mesa', 'MesaApiController@getMesaByEmpresa');

            Route::get('/produto/{produto_id}', 'ProdutoApiController@show');
            Route::get('/produto', 'ProdutoApiController@produtoByEmpresa');

            Route::post('/cliente', 'ClienteController@store');
            Route::post('/sanctum/token', 'Auth\AuthClienteController@auth');

            Route::get('/orders/{identfy}', 'OrderApiController@show');
            Route::post('/create-orders', 'OrderApiController@store');

    });

Route::group(
[
    'middleware' => ['auth:sanctum'],
    'prefix' => 'v1',
    'namespace' => 'Api'
], function(){
    Route::get('/auth/me', 'Auth\AuthClienteController@me');
    Route::post('/auth/logout', 'Auth\AuthClienteController@logout');

    Route::post('/auth/create-orders', 'OrderApiController@store');
    Route::get('/auth/orders/my-orders', 'OrderApiController@myOrders');

    Route::post('/auth/{identify}/avaliacao', 'AvaliacaoController@store');
});
