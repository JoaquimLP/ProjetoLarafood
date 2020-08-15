<?php

namespace App\Models;

use App\Empresa\Observers\EmpresaObserver;
use App\Empresa\Traits\EmpresaTraits;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{ 
    use EmpresaTraits;
    protected $fillable = ['titulo', 'flag', 'preco', 'descricao', 'image'];

    /**
     * Get Categorias
     */

    public function categorias(){
        
        return $this->belongsToMany(Categoria::class, 'categoria_produto');
    }
}
