<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permissao extends Model
{
    use HasFactory;

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
        return $this->belongsToMany(Perfil::class,  'permissao_perfil');
    }

     /**
     * Permissão não vinculada a esse perfil
     */
    public function createPerfil(){

        $perfil = Perfil::whereNotIn('id', function($query){
            $query->select('permissao_perfil.perfil_id');
            $query->from('permissao_perfil');
            $query->whereRaw("permissao_perfil.permissao_id={$this->id}");
        })->paginate(10);

        return $perfil;
    }


    /**
     * Pesquisa Permissão não vinculada a esse perfil
     */
    public function searchPerfil($filtro = null){

        $perfil = Perfil::where(function ($queryFilter) use ($filtro){
                $queryFilter->where('perfils.nome', 'LIKE', "%{$filtro}%");
            })->whereNotIn('id', function($query){
                $query->select('permissao_perfil.permissao_id');
                $query->from('permissao_perfil');
                $query->whereRaw("permissao_perfil.perfil_id={$this->id}");
            })
            ->paginate(10);
        return $perfil;
    }
}
