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

    public function getCategoriaByEmpresaUuid($uuid)
    {

        return $this->entity
            ->join('empresas', 'empresa.id', '=', 'categorias.empresa_id')
            ->where('uuid', $uuid)
            ->select('categorias.*')
            ->get();

    }

    public function getCategoriaByEmpresaId($empresa_id)
    {

        return $this->entity
            ->where('empresa_id', $empresa_id)
            ->get();

    }
}
