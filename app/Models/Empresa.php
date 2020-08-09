<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $filablel = ['plano_id', 'cnpj', 'nome', 'url','email'];

    public function usuarios(){
        return $this->hasMany(User::class);
    }

    public function planos(){
        return $this->belongsTo(Plano::class);
    }
}
