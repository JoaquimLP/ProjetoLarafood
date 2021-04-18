<?php

namespace App\Repositories;

use App\Models\Categoria;
use App\Repositories\Contracts\CategoriaRepositoryInterface;
use DB;

class CategoriaRepository implements CategoriaRepositoryInterface
{
    protected $table;

    public function __construct()
    {
        $this->table = 'categorias';
    }

    public function getCategoriaByEmpresaUuid($uuid)
    {

        return DB::table($this->table)
            ->join('empresas', 'empresa.id', '=', 'categorias.empresa_id')
            ->where('uuid', $uuid)
            ->select('categorias.*')
            ->get();

    }

    public function getCategoriaByEmpresaId($empresa_id)
    {
        return DB::table($this->table)
            ->where('empresa_id', $empresa_id)
            ->get();

    }
    public function getCategoriaByUrl($url)
    {
        return DB::table($this->table)
            ->where('url', $url)
            ->first();

    }
}
