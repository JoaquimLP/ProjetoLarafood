<?php

namespace App\Models;

use App\Empresa\Traits\EmpresaTraits;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory, EmpresaTraits;


    protected $fillable = [
        'empresa_id', 'uuid', 'identify', 'cliente_id', 'mesa_id', 'total', 'status', 'comentario',
    ];

    public function empresa(){
        // dd($this->hasOne(Empresa::class,  'empresa_id'));
         return $this->belongsTo(Empresa::class,  'id', 'empresa_id');
    }

    public function cliente(){
        // dd($this->hasOne(Empresa::class,  'cliente_id'));
         return $this->belongsTo(Cliente::class,  'id', 'cliente_id');
    }
    public function mesa(){
        // dd($this->hasOne(Empresa::class,  'mesa_id'));
         return $this->belongsTo(Mesa::class,  'id', 'mesa_id');
    }

    public function produtos()
    {
        return $this->belongsToMany(Produto::class, 'orders_produto');
    }
}
