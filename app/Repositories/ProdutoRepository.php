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

    public function getProdutoByEmpresaId($empresa_id, $categoria = [])
    {
        return DB::table($this->table)
        ->join('categoria_produto', 'categoria_produto.produto_id', '=', 'produtos.id')
        ->join('categorias', 'categoria_produto.categoria_id', '=', 'categorias.id')
        ->where('produtos.empresa_id', $empresa_id)
        ->where('categorias.empresa_id', $empresa_id)
        ->where(function ($query) use ($categoria){
            if ($categoria != []) {
                $query->whereIn('categorias.url', $categoria);
            }
        })
        ->get();
    }

    public function getProdutoByFlag($flag)
    {
        return DB::table($this->table)
            ->where('flag', $flag)
            ->first();
    }
}
