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
       $static = static::observe(EmpresaObserver::class);

       if ($static != null) {
            $static = static::addGlobalScope(new EmpresaScope);
       }
    }
}
