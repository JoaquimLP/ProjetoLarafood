<?php

namespace App\Observers;

use App\Models\Empresa;
use Illuminate\Support\Str;

class EmpresaObserver
{
    /**
     * Handle the empresa "created" event.
     *
     * @param  \App\Models\Empresa  $empresa
     * @return void
     */
    public function creating(Empresa $empresa)
    {
        $empresa->url = Str::kebab($empresa->nome);
        $empresa->uuid = Str::uuid();
    }

    /**
     * Handle the empresa "updated" event.
     *
     * @param  \App\Models\Empresa  $empresa
     * @return void
     */
    public function updating(Empresa $empresa)
    {
        $empresa->url = Str::kebab($empresa->nome);
    }

    /**
     * Handle the empresa "deleted" event.
     *
     * @param  \App\Models\Empresa  $empresa
     * @return void
     */
    public function deleted(Empresa $empresa)
    {
        //
    }

    /**
     * Handle the empresa "restored" event.
     *
     * @param  \App\Models\Empresa  $empresa
     * @return void
     */
    public function restored(Empresa $empresa)
    {
        //
    }

    /**
     * Handle the empresa "force deleted" event.
     *
     * @param  \App\Models\Empresa  $empresa
     * @return void
     */
    public function forceDeleted(Empresa $empresa)
    {
        //
    }
}
