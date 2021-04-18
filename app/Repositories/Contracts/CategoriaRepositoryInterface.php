<?php

namespace App\Repositories\Contracts;

interface CategoriaRepositoryInterface
{
    public function getAllCategoria(int $page);
    public function getCategoriaByEmpresaUuid($uuid);
}
