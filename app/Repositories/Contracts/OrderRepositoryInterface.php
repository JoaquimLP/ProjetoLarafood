<?php

namespace App\Repositories\Contracts;

interface OrderRepositoryInterface
{
    public function createNewOrder(
        $identify, $total, $status, $empresa_id, $cliente_id = "", $mesa_id = ""
    );
    public function getOrderByIdentify($identify);
}
