<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Resources\OrderResouce;
use App\Services\OrderServices;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    protected $orderService;

    public function __construct(OrderServices $orderService)
    {
        $this->orderService = $orderService;
    }

    public function index(Request $request)
    {
        $empresa = auth()->guard('web')->user()->empresa;
        $date = $request->date ?? date('Y-m-d');
        $status = $request->status ?? 'all';
        $orders = $this->orderService->getOrderByEmpresa($empresa->id, $status, $date);
        return OrderResouce::collection($orders);
    }

    public function update(Request $request)
    {
        $order = $this->orderService->updateStatusOrder($request->identify, $request->status);

        return new OrderResouce($order);
    }
}
