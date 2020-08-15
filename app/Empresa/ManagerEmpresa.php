<?php
namespace App\Empresa;

use App\Models\Empresa;
use phpDocumentor\Reflection\Types\Boolean;

class ManagerEmpresa
{
    public function getEmpresaIdentify(){
        return auth()->user()->empresa_id;

    }

    public function getEmpresa(): Empresa
    {
        return auth()->user()->empresa;
    }

    public function idAmin(): bool
    {
        return in_array(auth()->user()->email, config('empresa.admins'));
    }
}