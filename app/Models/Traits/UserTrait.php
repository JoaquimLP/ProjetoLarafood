<?php

namespace App\Models\Traits;


trait UserTrait
{
    public function permissions()
    {
        $empresa = $this->empresa()->first();
        $plano = $empresa->planos()->first();
        $perfils = $plano->perfils;

        $permissions = [];
        foreach ($perfils as $perfil) {
            foreach($perfil->permissaos as $permissao) {
               array_push($permissions, $permissao);
            }
        }
        return $permissions;
    }

}

