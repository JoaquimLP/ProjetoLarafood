<?php

namespace App\Repositories;

use App\Models\Categoria;
use App\Repositories\Contracts\CategoriaRepositoryInterface;

class CategoriaRepository implements CategoriaRepositoryInterface
{
    protected $entity;

    public function __construct(Categoria $Categoria)
    {
        $this->entity = $Categoria;
    }
    public function getAllCategoria(int $page)
    {
        return $this->entity->paginate($page);

    }

    public function getCategoriaByUuuid(getCategoriaByEmpresaUuid)
    {

        return $this->entity->where('uuid', $uuid)->first();

    }
}
