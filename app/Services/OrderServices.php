<?php

namespace App\Services;

use App\Models\Produto;
use App\Repositories\Contracts\ClienteRepositoryInterface;
use App\Repositories\Contracts\ProdutoRepositoryInterface;
use App\Repositories\Contracts\EmpresaRepositoryInterface;
use App\Repositories\Contracts\MesaRepositoryInterface;
use App\Repositories\EmpresaRepository;
use App\Repositories\OrderRepository;

class OrderServices
{
    protected $order, $empresa, $mesa, $cliente, $produto;

    public function __construct(
        OrderRepository $order, EmpresaRepositoryInterface $empresa, MesaRepositoryInterface $mesa,
        ClienteRepositoryInterface $cliente, ProdutoRepositoryInterface $produto
    )
    {
        $this->order = $order;
        $this->empresa = $empresa;
        $this->mesa = $mesa;
        $this->cliente = $cliente;
        $this->produto = $produto;
    }

    public function createNewOrder($order = [])
    {
        $produtoOrder = $this->getProduto($order['produto'] ?? []);
        $identify = $this->getIdentifyOder(8);
        $total = $this->calcTotalOrder($produtoOrder);
        $status = 'open';
        $empresa_id = $this->getEmpresa($order['token']);
        $cliente_id = $this->getClienteId();
        $mesa_id = $this->getMesa($order['mesa'] ?? null);
        $comentario = $order['comentario'] ?? null;

        $order = $this->order->createNewOrder($identify, $total, $status, $empresa_id, $cliente_id , $mesa_id, $comentario );
        $this->order->registerProdutoOrder($order->id, $produtoOrder);
        return $order;


    }


    private function getIdentifyOder($qtyCaraceters = 8)
    {
        $smallLetters = str_shuffle('abcdefghijklmnopqrstuvwxyz');

        $numbers = (((date('Ymd') / 12) * 24) + mt_rand(800, 9999));
        $numbers .= 1234567890;

        // $specialCharacters = str_shuffle('!@#$%*-');

        // $characters = $smallLetters.$numbers.$specialCharacters;
        $characters = $smallLetters.$numbers;

        $identify = substr(str_shuffle($characters), 0, $qtyCaraceters);
        $existIdentify = $this->order->getOrderByIdentify($identify);
        if($existIdentify){
            $this->getIdentifyOder($qtyCaraceters + 1);
        }
        return $identify;

    }

    public function calcTotalOrder($produtos = []): float
    {
        $total = 0;
        foreach ($produtos as $produto) {
           $total += ($produto['preco'] * $produto['qtd']);
        }
        return (float) $total;
    }

    private function getEmpresa($uuid)
    {
        $empresa = $this->empresa->getEmpresaByUuid($uuid);

        return $empresa->id;
    }

    private function getMesa($uuid = "")
    {
        if($uuid){
            $mesa = $this->mesa->getMesaByUuid($uuid);
            return $mesa->id;
        }

        return null;
    }

    private function getClienteId()
    {
        return auth()->check() ? auth()->user()->id : null;
    }

    private function getProduto($produto = []): array
    {
        $dadosProduto = [];
        foreach ($produto as $value) {
            $uuid = $value['identify'];
            $qtd = $value['qtd'];
            $produto = $this->produto->getProdutoByUuid($uuid);
            array_push($dadosProduto,
                [
                    'produto_id' => $produto->id,
                    'preco' => $produto->preco,
                    'qtd' => $qtd
                ]);
        }
        return $dadosProduto;
    }
}
