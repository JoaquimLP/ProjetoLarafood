<?php

namespace App\Providers;

use App\Repositories\CategoriaRepository;
use App\Repositories\ClienteRepository;
use App\Repositories\Contracts\CategoriaRepositoryInterface;
use App\Repositories\Contracts\ClienteRepositoryInterface;
use App\Repositories\Contracts\EmpresaRepositoryInterface;
use App\Repositories\Contracts\MesaRepositoryInterface;
use App\Repositories\Contracts\ProdutoRepositoryInterface;
use App\Repositories\EmpresaRepository;
use App\Repositories\MesaRepository;
use App\Repositories\ProdutoRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            EmpresaRepositoryInterface::class,
            EmpresaRepository::class
        );
        $this->app->bind(
           CategoriaRepositoryInterface::class,
           CategoriaRepository::class
        );
        $this->app->bind(
           MesaRepositoryInterface::class,
           MesaRepository::class
        );
        $this->app->bind(
           ProdutoRepositoryInterface::class,
           ProdutoRepository::class
        );
        $this->app->bind(
           ClienteRepositoryInterface::class,
           ClienteRepository::class
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
