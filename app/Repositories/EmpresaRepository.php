<?php

namespace App\Repositories;

use App\Models\Empresa;
use App\Repositories\Contracts\EmpresaRepositoryInterface;

class EmpresaRepository implements EmpresaRepositoryInterface
{
    protected $entity;

    public function __construct(Empresa $empresa)
    {
        $this->entity = $empresa;
    }
    public function getAllEmpresa()
    {
        return $this->entity->all();

    }
}
