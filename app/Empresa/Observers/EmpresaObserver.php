<?php

namespace App\Empresa\Observers;

use App\Empresa\ManagerEmpresa;
use Illuminate\Database\Eloquent\Model;

class EmpresaObserver
{

    /**
     * Handle the categoria "created" event.
     *
     * @param  \App\Model
     * @return void
     */
    public function creating(Model $model)
    {
        $managerEmpresa = app(ManagerEmpresa::class);
        $empresa = $managerEmpresa->getEmpresaIdentify();
        if($empresa)
            $model->empresa_id = $empresa;
    }


}
