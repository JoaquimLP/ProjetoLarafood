<?php

namespace App\Services;

use App\Repositories\Contracts\CategoriaRepositoryInterface;
use App\Repositories\Contracts\EmpresaRepositoryInterface;
use App\Repositories\EmpresaRepository;

class CategoriaServices
{
    protected $empresa;
    protected $categoria;
    public function __construct(EmpresaRepositoryInterface $empresa, CategoriaRepositoryInterface $categoria)
    {
        $this->empresa = $empresa;
        $this->categoria = $categoria;
    }

    public function getCategoriaByEmpresaUuid($uuid)
    {
        $empresa = $this->empresa->getEmpresaByUuid($uuid);

        return $this->categoria->getCategoriaByEmpresaId($empresa->id);
    }

    public function getCategoriaByUrl($url)
    {
        //$empresa = $this->empresa->getEmpresaByUuid($uuid);

        return $this->categoria->getCategoriaByUrl($url);
    }
}
