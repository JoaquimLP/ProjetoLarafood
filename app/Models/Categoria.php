<?php

namespace App\Models;

use App\Empresa\Observers\EmpresaObserver;
use Illuminate\Database\Eloquent\Model;
use App\Empresa\Traits\EmpresaTraits;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Categoria extends Model
{
    use HasFactory, EmpresaTraits;
    protected $fillable = ['empresa_id', 'uuid', 'nome', 'url', 'descricao'];

     /**
     * Get Categorias
     */

    public function produtos(){

        return $this->belongsToMany(Produto::class, 'categoria_produto');
    }
}
