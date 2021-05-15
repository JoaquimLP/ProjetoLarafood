<?php

namespace App\Providers;

use App\Events\{
    EmpresaCreated,
    OrderCreated
};
use App\Listeners\{
    AddRoleEmpresa,
    NotifyUsersNewOrderCreated
};
use App\Models\{
    Order
};
use App\Observers\{
    OrderObserver
};
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        EmpresaCreated::class => [
            AddRoleEmpresa::class,
        ],
        OrderCreated::class => [
            NotifyUsersNewOrderCreated::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        Order::observe(OrderObserver::class);
    }
}
