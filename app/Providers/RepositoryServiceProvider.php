<?php

namespace App\Providers;

use App\Repositories\CategoriaRepository;
use App\Repositories\Contracts\CategoriaRepositoryInterface;
use App\Repositories\Contracts\EmpresaRepositoryInterface;
use App\Repositories\Contracts\MesaRepositoryInterface;
use App\Repositories\EmpresaRepository;
use App\Repositories\MesaRepository;
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
