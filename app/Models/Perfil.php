<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    protected $fillable = ['nome', 'descricao'];

    public function  search($filtro = null){
        $resultado = $this->where('nome', 'LIKE', "%{$filtro}%")
            ->orWhere('descricao', 'LIKE', "%{$filtro}%")->paginate(4);
        return $resultado;
    }
}
