<?php

namespace App\Services;

use App\Repositories\Contracts\MesaRepositoryInterface;
use App\Repositories\Contracts\EmpresaRepositoryInterface;
use App\Repositories\EmpresaRepository;

class MesaServices
{
    protected $empresa;
    protected $mesa;
    public function __construct(EmpresaRepositoryInterface $empresa, MesaRepositoryInterface $mesa)
    {
        $this->empresa = $empresa;
        $this->mesa = $mesa;
    }

    public function getMesaByEmpresaUuid($uuid)
    {
        $empresa = $this->empresa->getEmpresaByUuid($uuid);

        return $this->mesa->getMesaByEmpresaId($empresa->id);
    }

    public function getMesaByUuid($uuid)
    {
        //$empresa = $this->empresa->getEmpresaByUuid($uuid);

        return $this->mesa->getMesaByUuid($uuid);
    }
}
