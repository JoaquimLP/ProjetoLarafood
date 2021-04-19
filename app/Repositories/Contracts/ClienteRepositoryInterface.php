<?php

namespace App\Repositories\Contracts;

interface ClienteRepositoryInterface
{
    public function createNewClient($dado);
    public function getClient($id);
}
