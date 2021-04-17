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
    public function getAllEmpresa(int $page)
    {
        return $this->entity->paginate($page);

    }

    public function getEmpresaByUuuid(string $uuid)
    {

        return $this->entity->where('uuid', $uuid)->first();

    }
}
