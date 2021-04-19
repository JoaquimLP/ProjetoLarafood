<?php

namespace App\Repositories;

use App\Models\Cliente;
use App\Repositories\Contracts\ClienteRepositoryInterface;
use Illuminate\Support\Facades\DB;

class ClienteRepository implements ClienteRepositoryInterface
{
    protected $entity;

    public function __construct(Cliente $cliente)
    {
        $this->entity = $cliente;
    }

    public function createNewClient($dado)
    {
        return $this->entity->create($dado);
    }

    public function getClient($id)
    {



    }
}
