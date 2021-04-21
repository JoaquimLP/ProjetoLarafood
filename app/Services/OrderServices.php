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
    protected $order, $empresa, $mesa, $cliente;

    public function __construct(
        OrderRepository $order, EmpresaRepositoryInterface $empresa, MesaRepositoryInterface $mesa,
        ClienteRepositoryInterface $cliente
    )
    {
        $this->order = $order;
        $this->empresa = $empresa;
        $this->mesa = $mesa;
        $this->cliente = $cliente;
    }

    public function createNewOrder($order = [])
    {
        $identify = $this->getIdentifyOder(8);
        $total = $this->calcTotalOrder([]);
        $status = 'open';
        $empresa_id = $this->getEmpresa($order['token']);
        $cliente_id = $this->getClienteId();
        $mesa_id = $this->getMesa($order['mesa']);

        $order = $this->order->createNewOrder($identify, $total, $status, $empresa_id, $cliente_id , $mesa_id);

        //return $this->order->createNewOrder();


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

        return $identify;

    }

    public function calcTotalOrder($produto = []): float
    {
        return (float) 90;
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

        return "";
    }

    private function getClienteId()
    {
        return auth()->check() ? auth()->user()->id : "";
    }
}
