<?php

namespace App\Repositories\Contracts;

interface MesaRepositoryInterface
{
    public function getMesaByEmpresaUuid($uuid);
    public function getMesaByEmpresaId($empresa_id);
    public function getMesaByUuid($uuid);
}
