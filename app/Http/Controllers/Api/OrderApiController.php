<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\ApiStoreOrder;
use App\Http\Resources\OrderResouce;
use App\Services\OrderServices;
use Illuminate\Http\Request;

class OrderApiController extends Controller
{
    protected $order;

    public function __construct(OrderServices $order)
    {
        $this->order = $order;
    }

    public function store(ApiStoreOrder $resquest)
    {
        $order = $this->order->createNewOrder($resquest->all());
        return new OrderResouce($order);
    }
}
