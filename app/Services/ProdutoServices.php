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

    public function getProdutoByEmpresaUuid($uuid)
    {
        $empresa = $this->empresa->getEmpresaByUuid($uuid);

        return $this->produto->getProdutoByEmpresaId($empresa->id);
    }

  /*   public function getProdutoByUrl($url)
    {
        //$empresa = $this->empresa->getEmpresaByUuid($uuid);

        return $this->produto->getProdutoByUrl($url);
    } */
}
