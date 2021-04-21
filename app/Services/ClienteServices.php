<?php

namespace App\Services;

use App\Repositories\Contracts\ClienteRepositoryInterface;
use App\Repositories\EmpresaRepository;

class ClienteServices
{
    protected $empresa;
    protected $cliente;
    public function __construct(ClienteRepositoryInterface $cliente)
    {
        $this->cliente = $cliente;
    }

    public function createNewClient($dado)
    {
        return $this->cliente->createNewClient($dado);
    }
}
