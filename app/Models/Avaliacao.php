<?php

namespace App\Models;

use App\Empresa\Traits\EmpresaTraits;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Avaliacao extends Model
{
    use HasFactory, EmpresaTraits;

    protected $fillable = ['order_id', 'cliente_id', 'stars', 'comentario'];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }
}
