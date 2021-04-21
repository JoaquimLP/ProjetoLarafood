<?php

namespace App\Services;

use App\Repositories\Contracts\ProdutoRepositoryInterface;
use App\Repositories\Contracts\EmpresaRepositoryInterface;
use App\Repositories\EmpresaRepository;
use App\Repositories\OrderRepository;

class OrderServices
{
    protected $order;

    public function __construct(OrderRepository $order)
    {
        $this->order = $order;
    }

    public function createNewOrder($order = [])
    {
        //return $this->order->createNewOrder();
    }
}
