<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mesa extends Model
{
    protected $fillable = ['empresa_id', 'nome', 'url', 'descricao'];
}