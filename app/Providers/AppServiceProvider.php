<?php

namespace App\Providers;

use App\Models\Categoria;
use App\Models\Cliente;
use App\Models\Empresa;
use App\Models\Mesa;
use Illuminate\Support\ServiceProvider;
use App\Models\Plano;
use App\Models\Produto;
use App\Observers\PlanoObserver;
use App\Observers\EmpresaObserver;
use App\Observers\CategoriaObserver;
use App\Observers\ClienteObserver;
use App\Observers\MesaObserver;
use App\Observers\ProdutoObserve;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Plano::observe(PlanoObserver::class);
        Empresa::observe(EmpresaObserver::class);
        Categoria::observe(CategoriaObserver::class);
        Produto::observe(ProdutoObserve::class);
        Mesa::observe(MesaObserver::class);
        Cliente::observe(ClienteObserver::class);
    }
}
