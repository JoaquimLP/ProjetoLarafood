<?php

namespace App\Repositories;

use App\Models\Order;
use App\Repositories\Contracts\OrderRepositoryInterface;
use Illuminate\Support\Facades\DB;

class OrderRepository implements OrderRepositoryInterface
{
    protected $entity;

    public function __construct(Order $order)
    {
        $this->entity = $order;
    }

    public function createNewOrder($identify, $total, $status, $empresa_id, $cliente_id = "", $mesa_id = "")
    {

    }

    public function getOrderByIdentify($identify)
    {

    }


}
