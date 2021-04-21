<?php

namespace App\Repositories\Contracts;

interface CategoriaRepositoryInterface
{
    public function getCategoriaByEmpresaUuid($uuid);
    public function getCategoriaByEmpresaId($empresa_id);
    public function getCategoriaByUuid($uuid);
}
