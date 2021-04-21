<?php

namespace App\Repositories\Contracts;

interface AvaliacaoRepositoryInterface
{
    public function newAvaliacaoOrder($order_id, $cliente_id);
    public function getAvaliacaoByOrder($order_id);
    public function getAvaliacaoByCliente($cliente_id);
}
