<?php

namespace App\Models;

use App\Empresa\Observers\EmpresaObserver;
use Illuminate\Database\Eloquent\Model;
use App\Empresa\Traits\EmpresaTraits;

class Categoria extends Model
{
    use EmpresaTraits;
    protected $fillable = ['empresa_id', 'nome', 'url', 'descricao'];

}
