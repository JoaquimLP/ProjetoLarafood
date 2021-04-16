<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $fillable = ['uuid', 'cnpj', 'plano_id', 'nome', 'url','email', 'logo', 'data_inscriacao', 'data_expiracao'];

    public function usuarios(){
        return $this->hasMany(User::class);
    }

    public function planos(){
        return $this->hasOne(Plano::class, 'id', 'plano_id');
    }
}
