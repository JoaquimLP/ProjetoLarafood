<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permissao extends Model
{
    protected $table = "permissaos";

    protected $fillable = ['nome', 'descricao'];

    public function search($filtro = null){
        $dados = $this->where('nome', 'LIKE', "%{$filtro}%")
                    ->orWhere('descricao', 'LIKE', "%{$filtro}%")->paginate(10);

        return $dados;
    }

    /**
     * Get Perfil
     */

    public function perfil(){
        return $this->belongsToMany(Perfil::class);
    }
}
