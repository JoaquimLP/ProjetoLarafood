<?php

namespace App\Repositories\Contracts;

interface EmpresaRepositoryInterface
{
    public function getAllEmpresa(int $page);
    public function getCategoriaByUuid(string $uuid);
}
