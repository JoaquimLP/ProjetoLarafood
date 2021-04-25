<?php

namespace App\Http\Controllers;

use App\Models\{
    Categoria,
    Empresa,
    Mesa,
    Order,
    Perfil,
    Permissao,
    Plano,
    Produto,
    Role,
    User
};
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $empresa = auth()->user()->empresa;

        $totUsers = User::where('empresa_id', $empresa->id)->count();
        $totMesa = Mesa::count();
        $totCategoria = Categoria::count();
        $totProduto = Produto::count();
        $totEmpresa = Empresa::count();
        $totPlano = Plano::count();
        $totRole = Role::count();
        $totPerfis = Perfil::count();
        $totPermissao = Permissao::count();
        $totPedido = Order::count();
        //$users = User::where('empresa_id', $empresa->id)->count();
        return view('home', compact(
            'totUsers', 'totMesa', 'totCategoria', 'totProduto', 'totEmpresa', 'totPlano', 'totRole',
            'totPerfis', 'totPermissao', 'totPedido'
        ));
    }
}
