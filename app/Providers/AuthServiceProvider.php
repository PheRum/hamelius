<?php

namespace App\Providers;

use App\Models\Furniture;
use App\Models\User;
use App\Policies\FurniturePolicy;
use App\Policies\TicketPolicy;
use App\Models\Ticket;
use Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Ticket::class => TicketPolicy::class,
        Furniture::class => FurniturePolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::before(function ($user) {
            /** @var \App\Models\User $user */
            return $user->isAdmin() ? true : null;
        });

        Gate::resource('ticket', TicketPolicy::class);
        Gate::resource('furniture', FurniturePolicy::class);
    }
}
