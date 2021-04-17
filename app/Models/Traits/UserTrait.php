<?php

namespace App\Models\Traits;

use App\Models\Empresa;
use GuzzleHttp\RetryMiddleware;

trait UserTrait
{
    public function permissions()
    {
        $permissionsPlano = $this->permissionsPlanos();
        $permissionsRoles = $this->permissionsRole();
        $permissions = [];

        foreach ($permissionsRoles as $permissionsRole) {
            if (in_array($permissionsRole, $permissionsPlano))
            {
                array_push($permissions, $permissionsRole);
           }
        }
        return $permissions;
    }

    public function permissionsPlanos(): array
    {
       /*  $empresa = $this->empresa()->first();
        $plano = $empresa->planos()->first(); */

        $empresa = Empresa::with('planos.perfils.permissaos')->where('id', $this->empresa_id)->first();
        $perfils = $empresa->planos->perfils;
        $permissions = [];
        foreach ($perfils as $perfil) {
            foreach($perfil->permissaos as $permissao) {
               array_push($permissions, $permissao->nome);
            }
        }
        return $permissions;
    }

    public function permissionsRole(): array
    {
        $roles = $this->roles()->with('permissaos')->get();
        $permissions = [];
        foreach($roles as $role) {
            foreach($role->permissaos as $permissao) {
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

