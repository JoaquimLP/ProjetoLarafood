<?php

namespace App\Services;

use App\Repositories\Contracts\ProdutoRepositoryInterface;
use App\Repositories\Contracts\EmpresaRepositoryInterface;
use App\Repositories\EmpresaRepository;

class ProdutoServices
{
    protected $empresa;
    protected $produto;
    public function __construct(EmpresaRepositoryInterface $empresa, ProdutoRepositoryInterface $produto)
    {
        $this->empresa = $empresa;
        $this->produto = $produto;
    }

    public function getProdutoByEmpresaUuid($uuid, $categoria)
    {
        $empresa = $this->empresa->getEmpresaByUuid($uuid);

        return $this->produto->getProdutoByEmpresaId($empresa->id, $categoria);
    }

    public function getProdutoByFlag($flag)
    {
        //$empresa = $this->empresa->getEmpresaByUuid($uuid);

        return $this->produto->getProdutoByFlag($flag);
    }
}
