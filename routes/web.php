<?php

use App\Models\Cliente;
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
/*
Route::get('teste', function ()
{
    $client = Cliente::first();
    $token = $client->createToken("Token-teste");
    dd($token->plainTextToken);
});
 */
Auth::routes();
//Route::get('/', 'Admin\PlanoController@home')->name('admin.home');
Route::get('/', 'Site\HomeController@index')->name('site');
Route::get('/plano/{url}', 'Site\HomeController@plano')->name('plano.cadastrar');

Route::get('admin', 'HomeController@index')->name('admin.home');


Route::prefix('admin')
        ->namespace('Admin')
        ->middleware('auth')
        ->group(function(){

        /* Route::get('/teste', function () {
            auth()->user()->permissionsPlanos();
        }); */

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

    // Rotas de Perfil
    Route::any('/perfil/search', 'PerfilController@search')->name('perfil.search');
    Route::resource('/perfil', 'PerfilController');

    // Rotas de Permissao
    Route::any('/permissao/search', 'PermissaoController@search')->name('permissao.search');
    Route::resource('/permissao', 'PermissaoController');

    //Rotas de permissão e perfil
    Route::get('perfil/{id}/permissao', 'PermissaoPerfilController@listaPermissao')->name('perfil.permissao');
    Route::get('perfil/{id}/permissao/create_permissao', 'PermissaoPerfilController@createPermissao')->name('perfil.permissao.createPermissao');
    Route::post('perfil/{id}/permissao/store_permissao', 'PermissaoPerfilController@storePermissao')->name('perfil.permissao.storePermissao');
    Route::any('perfil/{id}/permissao/search_permissao', 'PermissaoPerfilController@searchPermissao')->name('perfil.permissao.searchPermissao');
    Route::get('perfil/{id}/permissao/{idPermissao}/detach_permissao', 'PermissaoPerfilController@detachPermissao')->name('perfil.permissao.detachPermissao');
    //Rotas de permissão e perfil
    Route::get('permissao/{id}/perfil', 'PerfilPermissaoController@listaPerfil')->name('permissao.perfil');
    Route::get('permissao/{id}/perfil/create_perfil', 'PerfilPermissaoController@createPerfil')->name('permissao.perfil.createperfil');
    Route::post('permissao/{id}/perfil/store_perfil', 'PerfilPermissaoController@storePerfil')->name('permissao.perfil.storeperfil');
    Route::any('permissao/{id}/perfil/search_perfil', 'PerfilPermissaoController@searchPerfil')->name('permissao.perfil.searchperfil');
    Route::get('permissao/{id}/perfil/{idperfil}/detach_perfil', 'PerfilPermissaoController@detachPerfil')->name('permissao.perfil.detachperfil');

    //Planos Perfil
    Route::get('perfil/{id}/planos', 'PlanoPerfilController@indexPlano')->name('perfil.plano');
    Route::get('perfil/{id}/planos/create', 'PlanoPerfilController@createPlano')->name('perfil.plano.create');
    Route::post('perfil/{id}/planos/store', 'PlanoPerfilController@storePlano')->name('perfil.plano.store');
    Route::get('perfil/{id}/planos/{idplanol}/detach', 'PlanoPerfilController@sdetachPlano')->name('perfil.plano.detach');

    /**
     * Rotas de usuário
     */
    Route::any('/usuario/search', 'UsuarioController@search')->name('usuario.search');
    Route::resource('/usuario', 'UsuarioController');

    /**
     * Rotas de Categoria
     */
    Route::any('/categoria/search', 'CategoriaController@search')->name('categoria.search');
    Route::resource('/categoria', 'CategoriaController');

    /**
     * Rotas de Produto
     */
    Route::any('/produto/search', 'ProdutoController@search')->name('produto.search');
    Route::resource('/produto', 'ProdutoController');

    //Rotas de Categoria e Produto
    Route::get('produto/{id}/categoria', 'CategoriaProdutoController@listaCategoria')->name('produto.categoria');
    Route::get('produto/{id}/categoria/create_categoria', 'CategoriaProdutoController@createCategoria')->name('produto.categoria.createcategoria');
    Route::post('produto/{id}/categoria/store_categoria', 'CategoriaProdutoController@storeCategoria')->name('produto.categoria.storecategoria');
    Route::any('produto/{id}/categoria/search_categoria', 'CategoriaProdutoController@searchCategoria')->name('produto.categoria.searchcategoria');
    Route::get('produto/{id}/categoria/{idCategoria}/detach_categoria', 'CategoriaProdutoController@detachCategoria')->name('produto.categoria.detachcategoria');

    /**
     * Rotas de Mesa
     */
    Route::any('/mesa/search', 'MesaController@search')->name('mesa.search');
    Route::get('/mesa/qrcode/{id}/teste', 'MesaController@qrcode')->name('mesa.qrcode');
    Route::resource('/mesa', 'MesaController');

    /**
     * Rotas de Empresa
     */
    Route::any('/empresa/search', 'EmpresaController@search')->name('empresa.search');
    Route::resource('/empresa', 'EmpresaController');

    /**
     * Rotas de Role
     */
    Route::any('/role/search', 'Acl\RoleController@search')->name('role.search');
    Route::resource('/role', 'Acl\RoleController');

    Route::get('/pedido', 'OrderController@index')->name('orders.index');

    //Rotas de permissão e role
    Route::get('role/{id}/permissao', 'Acl\PermissaoRoleController@listaPermissao')->name('role.permissao');
    Route::get('role/{id}/permissao/create_permissao', 'Acl\PermissaoRoleController@createPermissao')->name('role.permissao.createPermissao');
    Route::post('role/{id}/permissao/store_permissao', 'Acl\PermissaoRoleController@storePermissao')->name('role.permissao.storePermissao');
    Route::any('role/{id}/permissao/search_permissao', 'Acl\PermissaoRoleController@searchPermissao')->name('role.permissao.searchPermissao');
    Route::get('role/{id}/permissao/{idPermissao}/detach_permissao', 'Acl\PermissaoRoleController@detachPermissao')->name('role.permissao.detachPermissao');

    //Rotas de fuções e user
    Route::get('user/{id}/role', 'Acl\UserRoleController@listaUser')->name('user.role');
    Route::get('user/{id}/role/create_role', 'Acl\UserRoleController@createUser')->name('user.role.create');
    Route::post('user/{id}/role/store_role', 'Acl\UserRoleController@storeUser')->name('user.role.store');
    Route::any('user/{id}/role/search_role', 'Acl\UserRoleController@searchUser')->name('user.role.search');
    Route::get('user/{id}/role/{idUser}/detach_role', 'Acl\UserRoleController@detachUser')->name('user.role.detach');

});
