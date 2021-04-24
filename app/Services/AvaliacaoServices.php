<?php

namespace App\Services;

use App\Repositories\Contracts\AvaliacaoRepositoryInterface;
use App\Repositories\Contracts\OrderRepositoryInterface;

class AvaliacaoServices
{
    protected $avaliacao;
    protected $order;

    public function __construct(AvaliacaoRepositoryInterface $avaliacao, OrderRepositoryInterface $order)
    {
        $this->avaliacao = $avaliacao;
        $this->order = $order;
    }

    public function newAvaliacaoOrder($identify, $data = [])
    {
        $order = $this->order->getOrderByIdentify($identify);
        $cliente_id = $this->getClienteId();

        return $this->avaliacao->newAvaliacaoOrder($order->id, $cliente_id, $data);
    }

    public function getAvaliacaoByOrder($order_id)
    {
        return $this->avaliacao->getAvaliacaoByOrder($order_id);
    }

    public function getAvaliacaoByCliente($cliente_id)
    {
        return $this->avaliacao->getAvaliacaoByCliente($cliente_id);
    }

    private function getClienteId()
    {
        return auth()->user()->id;
    }

}

