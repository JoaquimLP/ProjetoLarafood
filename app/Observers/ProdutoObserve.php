<?php

namespace App\Observers;

use App\Models\Produto;
use Illuminate\Support\Str;

class ProdutoObserve
{
    /**
     * Handle the produto "created" event.
     *
     * @param  \App\Models\Produto  $produto
     * @return void
     */
    public function creating(Produto $produto)
    {
        $produto->flag = Str::kebab($produto->titulo);
    }

    /**
     * Handle the produto "updated" event.
     *
     * @param  \App\Models\Produto  $produto
     * @return void
     */
    public function updating(Produto $produto)
    {
        $produto->flag = Str::kebab($produto->titulo);
    }

    /**
     * Handle the produto "deleted" event.
     *
     * @param  \App\Models\Produto  $produto
     * @return void
     */
    public function deleted(Produto $produto)
    {
        //
    }

    /**
     * Handle the produto "restored" event.
     *
     * @param  \App\Models\Produto  $produto
     * @return void
     */
    public function restored(Produto $produto)
    {
        //
    }

    /**
     * Handle the produto "force deleted" event.
     *
     * @param  \App\Models\Produto  $produto
     * @return void
     */
    public function forceDeleted(Produto $produto)
    {
        //
    }
}
