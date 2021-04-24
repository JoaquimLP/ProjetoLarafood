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

    public function newAvaliacaoOrder($order_id, $cliente_id, $data = [])
    {
        //dd($data);
        $dados = [
            'order_id' => $order_id,
            'cliente_id' => $cliente_id,
            'stars' => $data['stars'],
            'comentario' => $data['comentario'] ?? null,
        ];

        return $this->entity->create($dados);
    }

    public function getAvaliacaoByOrder($order_id)
    {
        return $this->entity->where('order_id', $order_id)->get();
    }

    public function getAvaliacaoByCliente($cliente_id)
    {
        return $this->entity->where('cliente_id', $cliente_id)->get();
    }

    public function getAvaliacaoById($avaliacao_id)
    {
        return $this->entity->find($avaliacao_id);
    }

    public function getAvaliacao($order_id, $cliente_id)
    {
        return $this->entity->where('cliente_id', $cliente_id)->where('order_id', $order_id)->first();
    }
}
