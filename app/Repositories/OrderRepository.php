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

    public function createNewOrder($identify, $total, $status, $empresa_id, $cliente_id = "", $mesa_id = "", $comentario = null)
    {
        $dados = [
            'identify' => $identify,
            'empresa_id' => $empresa_id,
            'cliente_id' => $cliente_id,
            'mesa_id' => $mesa_id,
            'total' => $total,
            'status' => $status,
            'comentario' => $comentario,
        ];

        $order = $this->entity->create($dados);

        return $order;
    }

    public function getOrderByIdentify($identify)
    {
        return $this->entity->where('identify', $identify)->first();
    }

    public function registerProdutoOrder($order_id, $produtos = [])
    {
        $orderProduto = [];
        $order = $this->entity->find($order_id);

        foreach ($produtos as $produto) {
            $orderProduto[$produto['produto_id']] =
            [
                "qtd" => $produto['qtd'],
                "preco" => $produto['preco'],
            ];
        }

        return $order->produtos()->attach($orderProduto);
        /*foreach ($produtos as $produto) {
            array_push($orderProduto, [
                "order_id" => $order_id,
                "produto_id" => $produto['produto_id'],
                "qtd" => $produto['qtd'],
                "preco" => $produto['preco'],
            ]);
        }
        return DB::table('orders_produto')->insert($orderProduto); */
    }

    public function getOrderByEmpresa($empresa_id, $status = null, $date = null)
    {
        $orders = $this->entity
            ->where('empresa_id', $empresa_id)
            ->where(function ($query) use ($status) {
                if ($status != 'all') {
                    return $query->where('status', $status);
                }
            })
            ->where(function ($query) use ($date) {
                if ($date) {
                    return $query->whereDate('created_at', $date);
                }
            })
            ->get();

        return $orders;

    }

    public function updateStatusOrder($identify, $status)
    {
        $this->entity->where('identify', $identify)->update(['status' => $status]);

        return $this->entity->where('identify', $identify)->first();
    }

    public function orderByCliente($cliente_id)
    {
        $cliente = $this->entity->where("cliente_id", $cliente_id)->paginate();
        return $cliente;
    }

}
