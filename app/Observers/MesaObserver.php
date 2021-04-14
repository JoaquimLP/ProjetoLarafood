<?php

namespace App\Observers;

use App\Models\Mesa;
use Illuminate\Support\Str;

class MesaObserver
{
    /**
     * Handle the mesa "created" event.
     *
     * @param  \App\Models\Mesa  $mesa
     * @return void
     */
    public function creating(Mesa $mesa)
    {
        $mesa->url = Str::kebab($mesa->nome);
    }

    /**
     * Handle the mesa "updated" event.
     *
     * @param  \App\Models\Mesa  $mesa
     * @return void
     */
    public function updating(Mesa $mesa)
    {
        $mesa->url = Str::kebab($mesa->nome);
    }

    /**
     * Handle the mesa "deleted" event.
     *
     * @param  \App\Models\Mesa  $mesa
     * @return void
     */
    public function deleted(Mesa $mesa)
    {
        //
    }

    /**
     * Handle the mesa "restored" event.
     *
     * @param  \App\Models\Mesa  $mesa
     * @return void
     */
    public function restored(Mesa $mesa)
    {
        //
    }

    /**
     * Handle the mesa "force deleted" event.
     *
     * @param  \App\Models\Mesa  $mesa
     * @return void
     */
    public function forceDeleted(Mesa $mesa)
    {
        //
    }
}
