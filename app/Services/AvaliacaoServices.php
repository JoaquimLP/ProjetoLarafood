<?php

namespace App\Services;

use App\Repositories\AvaliacaoRepository;
use App\Repositories\Contracts\OrderRepositoryInterface;
use GuzzleHttp\Psr7\Request;

class AvaliacaoServices
{
    protected $avaliacao;
    protected $order;

    public function __construct(AvaliacaoRepository $avaliacao, OrderRepositoryInterface $order)
    {
        $this->avaliacao = $avaliacao;
        $this->order = $order;
    }

    public function newAvaliacaoOrder($identify)
    {
        $order_id = $this->order->getOrderByIdentify($identify);
        $cliente_id = $this->getClienteId();

        return $this->avaliacao->newAvaliacaoOrder($order_id, $cliente_id);
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

