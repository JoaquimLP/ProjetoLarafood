<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    protected $fillable = ['nome', 'descricao'];

    public function  search($filtro = null){
        $resultado = $this->where('nome', 'LIKE', "%{$filtro}%")
            ->orWhere('descricao', 'LIKE', "%{$filtro}%")->paginate(10);
        return $resultado;
    }

     /**
     * Get Permissao
     */

    public function permissaos(){
        
        return $this->belongsToMany(Permissao::class, 'permissao_perfil');
    }

    /**
     * Permissão não vinculada a esse perfil
     */
    public function createPermissao(){
        
        $permissao = Permissao::whereNotIn('id', function($query){
            $query->select('permissao_perfil.permissao_id');
            $query->from('permissao_perfil');
            $query->whereRaw("permissao_perfil.perfil_id={$this->id}");
        })->paginate(10);

        return $permissao;
    }


    /**
     * Pesquisa Permissão não vinculada a esse perfil
     */
    public function searchPermissao($filtro = null){
        
        $permissao = Permissao::where(function ($queryFilter) use ($filtro){
                $queryFilter->where('permissaos.nome', 'LIKE', "%{$filtro}%");
            })->whereNotIn('id', function($query){
                $query->select('permissao_perfil.permissao_id');
                $query->from('permissao_perfil');
                $query->whereRaw("permissao_perfil.perfil_id={$this->id}");
            })
            ->paginate(10);
        return $permissao;
    }
}
