<?php

namespace App\Repositories;

use App\Repositories\Contracts\ProdutoRepositoryInterface;
use Illuminate\Support\Facades\DB;

class ProdutoRepository implements ProdutoRepositoryInterface
{
    protected $table;

    public function __construct()
    {
        $this->table = 'produtos';
    }

    public function getProdutoByEmpresaId($empresa_id)
    {
        return DB::table($this->table)
        ->where('empresa_id', $empresa_id)
        ->get();
    }
}
