<?php

namespace  App\Empresa\Traits;

use App\Empresa\Observers\EmpresaObserver;
use App\Empresa\Scopes\EmpresaScope;

trait EmpresaTraits
{


     /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        parent::boot();
        static::observe(EmpresaObserver::class);
        static::addGlobalScope(new EmpresaScope);
    }
}
