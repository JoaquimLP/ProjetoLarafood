<?php

namespace App\Repositories;

use App\Models\Mesa;
use App\Repositories\Contracts\MesaRepositoryInterface;
use Illuminate\Support\Facades\DB;

class MesaRepository implements MesaRepositoryInterface
{
    protected $table;

    public function __construct()
    {
        $this->table = 'mesas';
    }

    public function getMesaByEmpresaUuid($uuid)
    {

        return DB::table($this->table)
            ->join('empresas', 'empresa.id', '=', 'mesas.empresa_id')
            ->where('uuid', $uuid)
            ->select('mesas.*')
            ->get();

    }

    public function getMesaByEmpresaId($empresa_id)
    {
        return DB::table($this->table)
            ->where('empresa_id', $empresa_id)
            ->get();

    }
    public function getMesaByUuid($uuid)
    {
        return DB::table($this->table)
            ->where('uuid', $uuid)
            ->first();

    }
}
