<?php

namespace App\Empresa\Observers;

use App\Empresa\ManagerEmpresa;
use App\Models\Categoria;
use Illuminate\Database\Eloquent\Model;

class EmpresaObserver
{
    /**
     * Handle the categoria "created" event.
     *
     * @param  \App\Model  $categoria
     * @return void
     */
    public function creating(Model $model)
    {
        $managerEmpresa = app(ManagerEmpresa::class);
        $model->empresa_id = $managerEmpresa->getEmpresaIdentify();
    }


}