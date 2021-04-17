<?php

namespace App\Services;

use App\Models\Plano;
use App\Repositories\Contracts\EmpresaRepositoryInterface;

Class EmpresaServices
{
    private $plano, $repository, $data = [];

    public function __construct(EmpresaRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function getAllEmpresa(int $page)
    {
        return $this->repository->getAllEmpresa($page);
    }

    public function getEmpresaByUuuid(string $uuid)
    {
        return $this->repository->getEmpresaByUuuid($uuid);
    }

    public function make(Plano $plano, array $data)
    {
        $this->plano = $plano;
        $this->data = $data;

        $data = $this->data;
        $data['cnpj'] = str_replace(['.', '/','-'], '', $data['cnpj']);


        $empresa = $this->storeEmpresas();

        $user = $this->storeUser($empresa);

        return $user;
    }

    public function storeEmpresas(){
        $data = $this->data;
        return $this->plano->empresas()->create([
            'cnpj' => $data['cnpj'],
            'nome' => $data['empresa'],
            'email' => $data['email'],
            'data_inscriacao' => now(),
            'data_expiracao' => now()->addDays(7),
        ]);

    }


    public function storeUser($empresa){
        $data = $this->data;
       $user = $empresa->usuarios()->create([
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'password' => bcrypt($data['password']),
                ]);
        return $user;
    }
}
