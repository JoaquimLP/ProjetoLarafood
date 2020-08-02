<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permissao extends Model
{
    protected $fillable = ['nome', 'descricao'];

    public function search($filtro = null){
        $dados = $this->where('nome', 'LIKE', "%{$filtro}%")
                    ->orWhere('descricao', 'LIKE', "%{$filtro}%")->paginate(4);

        return $dados;
    }
}
