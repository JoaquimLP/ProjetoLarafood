<?php

namespace App\Observers;

use App\Models\Cliente;
use Illuminate\Support\Str;

class ClienteObserver
{
    /**
     * Handle the cliente "created" event.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return void
     */
    public function creating(Cliente $cliente)
    {
        $cliente->uuid = Str::uuid();
    }

    /**
     * Handle the cliente "updated" event.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return void
     */
    public function updating(Cliente $cliente)
    {
        $cliente->flag = Str::kebab($cliente->titulo);
        $cliente->uuid = Str::uuid();
    }
}
