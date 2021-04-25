<?php

namespace App\Providers;

use App\Models\Permissao;
use App\Models\Produto;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        if($this->app->runningInConsole())
        return;
        $permissions = Permissao::all();
        foreach ($permissions as $permission) {
            Gate::define($permission->nome, function (User $user) use ($permission) {
                return $user->hsPermissions($permission->nome);
            });
        }


        Gate::define('owner', function (User $user, $object) {
            return $user->id == $object->user_id;
        });

        Gate::before(function (User $user) {
            if ($user->isAdmin()) {
                return true;
            }

        });
    }
}
