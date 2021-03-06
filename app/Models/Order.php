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

    /**
     * Options status
     */
    public $statusOptions = [
        'open' => 'Aberto',
        'done' => 'Completo',
        'rejected' => 'Rejeitado',
        'working' => 'Andamento',
        'canceled' => 'Cancelado',
        'delivering' => 'Em transito',
    ];

    public function empresa(){
        return $this->belongsTo(Empresa::class);
    }

    public function cliente(){
        // dd($this->hasOne(Empresa::class,  'cliente_id'));
         return $this->belongsTo(Cliente::class);
    }
    public function mesa(){
        // dd($this->hasOne(Empresa::class,  'mesa_id'));
         return $this->belongsTo(Mesa::class);
    }

    public function produtos()
    {
        return $this->belongsToMany(Produto::class, 'orders_produto');
    }

    public function avaliacao()
    {
        return $this->hasMany(Avaliacao::class, 'order_id', 'id');
    }
}
