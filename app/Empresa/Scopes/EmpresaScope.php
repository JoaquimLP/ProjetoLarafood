<?php

namespace  App\Empresa\Scopes;

use App\Empresa\ManagerEmpresa;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class EmpresaScope implements Scope
{
    /**
     * Apply the scope to a given Eloquent query builder.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $builder
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @return void
     */
    public function apply(Builder $builder, Model $model)
    {
        $empresa = app(ManagerEmpresa::class)->getEmpresaIdentify();

        if($empresa)
            $builder->where('empresa_id', $empresa);
    }
}
