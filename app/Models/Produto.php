<?php

namespace App\Models;

use App\Empresa\Observers\EmpresaObserver;
use App\Empresa\Traits\EmpresaTraits;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory, EmpresaTraits;
    protected $fillable = ['titulo', 'flag', 'uuid', 'preco', 'descricao', 'image'];

    /**
     * Get Categorias
     */

    public function categorias(){

        return $this->belongsToMany(Categoria::class, 'categoria_produto');
    }

    /**
     * Permissão não vinculada a esse categoria
     */
    public function createCategoria(){

        $categoria = Categoria::whereNotIn('id', function($query){
            $query->select('categoria_produto.categoria_id');
            $query->from('categoria_produto');
            $query->whereRaw("categoria_produto.produto_id={$this->id}");
        })->paginate(10);

        return $categoria;
    }


    /**
     * Pesquisa Permissão não vinculada a esse categoria
     */
    public function searchCategoria($filtro = null){

        $categoria = Categoria::where(function ($queryFilter) use ($filtro){
                $queryFilter->where('categorias.nome', 'LIKE', "%{$filtro}%");
            })->whereNotIn('id', function($query){
                $query->select('produto_categoria.produto_id');
                $query->from('produto_categoria');
                $query->whereRaw("produto_categoria.categoria_id={$this->id}");
            })
            ->paginate(10);
        return $categoria;
    }
}
