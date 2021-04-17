<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ['nome', 'descricao'];

    /**
     * Get Permissao
     */

    public function permissaos(){

        return $this->belongsToMany(Permissao::class, 'permissao_role');
    }

    /**
     * Get User
     */

    public function users(){

        return $this->belongsToMany(User::class, 'user_role');
    }

    /**
     * Permissão não vinculada a esse role
     */
    public function createPermissao(){

        $permissao = Permissao::whereNotIn('id', function($query){
            $query->select('permissao_role.permissao_id');
            $query->from('permissao_role');
            $query->whereRaw("permissao_role.role_id={$this->id}");
        })->paginate(10);

        return $permissao;
    }

    /**
     * User não vinculada a esse role
     */
    public function createUser(){

        $user = User::whereNotIn('id', function($query){
            $query->select('user_role.user_id');
            $query->from('user_role');
            $query->whereRaw("user_role.role_id={$this->id}");
        })->empresaUsuario()->paginate(10);

        return $user;
    }

}
