<?php

namespace App\Repositories\Contracts;

interface EmpresaRepositoryInterface
{
    public function getAllEmpresa();
    public function getEmpresaByUuuid(string $uuid);
}
