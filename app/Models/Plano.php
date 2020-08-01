<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plano extends Model
{
    protected $fillable = ['nome', 'url', 'preco', 'descricao'];

    public function detalhes(){
        return $this->hasMany(DetalhesPlano::class);
    }

    public function search($filtro = null){

        $result = $this->where('nome', 'LIKE', "%{$filtro}%")
                ->orWhere('descricao', 'LIKE', "%{$filtro}%")->paginate(4);
        return $result;
    }
}
