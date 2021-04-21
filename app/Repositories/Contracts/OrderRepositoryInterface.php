<?php

namespace App\Repositories\Contracts;

interface OrderRepositoryInterface
{
    public function createNewOrder(
        $identify, $total, $status, $empresa_id, $cliente_id = "", $mesa_id = "", $comentario = null
    );
    public function getOrderByIdentify($identify);
    public function registerProdutoOrder($order_id, $produtos = []);
}
