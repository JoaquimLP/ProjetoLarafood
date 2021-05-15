<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    private $dadosOrder;

    public function __construct(Order $order)
    {
        $this->dadosOrder = $order;
        $this->middleware('can:Pedidos');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /* $orders = $this->dadosOrder->paginate();
        dd($orders); */
        return view('admin.order.index');
    }
}
