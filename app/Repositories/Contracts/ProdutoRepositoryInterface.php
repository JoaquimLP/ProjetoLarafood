<?php

namespace App\Repositories\Contracts;

interface ProdutoRepositoryInterface
{
    //public function getProdutoByEmpresaUuid($uuid);
    public function getProdutoByEmpresaId($empresa_id, $categoria = []);
    public function getProdutoByUuid($produto_id);
}
