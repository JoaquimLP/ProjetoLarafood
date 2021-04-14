<?php

namespace App\Models\Traits;

use GuzzleHttp\RetryMiddleware;

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
               array_push($permissions, $permissao->nome);
            }
        }
        return $permissions;
    }

    public function hsPermissions(string $permissionName): bool
    {
        return in_array($permissionName, $this->permissions());
    }

    public function isAdmin(): bool
    {
        return in_array($this->email, config('acl.admins'));
    }

    public function isTenat(): bool
    {
        return !in_array($this->email, config('acl.admins'));
    }

}

