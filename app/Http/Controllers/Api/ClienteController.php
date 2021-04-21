<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreClienteRequest;
use App\Http\Resources\ClienteResource;
use App\Services\ClienteServices;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    protected $cliente;

    public function __construct(ClienteServices $cliente)
    {
        $this->cliente = $cliente;
    }

    public function store(StoreClienteRequest $request)
    {
        $cliente = $this->cliente->createNewClient($request->all());
        return new ClienteResource($cliente);
    }
}
