<?php

namespace App\Models;

use App\Empresa\Traits\EmpresaTraits;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mesa extends Model
{
    use HasFactory, EmpresaTraits;
    protected $fillable = ['empresa_id', 'uuid', 'nome', 'url', 'descricao'];
}
