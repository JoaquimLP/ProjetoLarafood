<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plano extends Model
{
    use HasFactory;
    protected $fillable = ['nome', 'url', 'preco', 'descricao'];

    public function detalhes(){
        return $this->hasMany(DetalhesPlano::class);
    }

    public function empresas(){
        return $this->hasMany(Empresa::class);
    }

    public function search($filtro = null){

        $result = $this->where('nome', 'LIKE', "%{$filtro}%")
                ->orWhere('descricao', 'LIKE', "%{$filtro}%")->paginate(10);
        return $result;
    }

    /**
     * Get Perfils
     */

    public function perfils(){
        return $this->belongsToMany(Perfil::class, 'plano_perfil');
    }
}
