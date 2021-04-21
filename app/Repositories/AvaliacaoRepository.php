<?php

namespace App\Repositories;

use App\Models\Avaliacao;
use App\Repositories\Contracts\AvaliacaoRepositoryInterface;
use Illuminate\Support\Facades\DB;

class AvaliacaoRepository implements AvaliacaoRepositoryInterface
{
    protected $entity;

    public function __construct(Avaliacao $avaliacao)
    {
        $this->entity = $avaliacao;
    }

    public function newAvaliacaoOrder($order_id, $cliente_id)
    {

    }

    public function getAvaliacaoByOrder($order_id)
    {

    }

    public function getAvaliacaoByCliente($cliente_id)
    {
        
    }
}
