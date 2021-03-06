<?php

namespace App\Repositories;

use App\Models\Categoria;
use App\Repositories\Contracts\CategoriaRepositoryInterface;
use Illuminate\Support\Facades\DB;

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
    public function getCategoriaByUuid($uuid)
    {
        return DB::table($this->table)
            ->where('uuid', $uuid)
            ->first();

    }
}
