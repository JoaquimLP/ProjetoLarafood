<?php

namespace App\Observers;

use App\Models\Categoria;
use Illuminate\Support\Str;

class CategoriaObserver
{
    /**
     * Handle the categoria "created" event.
     *
     * @param  \App\Models\Categoria  $categoria
     * @return void
     */
    public function creating(Categoria $categoria)
    {
        $categoria->url = Str::kebab($categoria->nome);
        $categoria->uuid = Str::uuid();
    }

    /**
     * Handle the categoria "updated" event.
     *
     * @param  \App\Models\Categoria  $categoria
     * @return void
     */
    public function updating(Categoria $categoria)
    {
        $categoria->url = Str::kebab($categoria->nome);
    }

    /**
     * Handle the categoria "deleted" event.
     *
     * @param  \App\Models\Categoria  $categoria
     * @return void
     */
    public function deleted(Categoria $categoria)
    {
        //
    }

    /**
     * Handle the categoria "restored" event.
     *
     * @param  \App\Models\Categoria  $categoria
     * @return void
     */
    public function restored(Categoria $categoria)
    {
        //
    }

    /**
     * Handle the categoria "force deleted" event.
     *
     * @param  \App\Models\Categoria  $categoria
     * @return void
     */
    public function forceDeleted(Categoria $categoria)
    {
        //
    }
}
