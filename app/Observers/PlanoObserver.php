<?php

namespace App\Observers;

use App\Models\Plano;
use Illuminate\Support\Str;

class PlanoObserver
{
    /**
     * Handle the plano "creating" event.
     *
     * @param  \App\Models\Plano  $plano
     * @return void
     */
    public function creating(Plano $plano)
    {
        $plano->url = Str::kebab($plano->nome);
    }

    /**
     * Handle the plano "updating" event.
     *
     * @param  \App\Models\Plano  $plano
     * @return void
     */
    public function updating(Plano $plano)
    {
        $plano->url = Str::kebab($plano->nome);
    }

    
}
