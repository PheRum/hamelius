<?php

namespace App\Providers;

use App\Models\Furniture;
use App\Models\Ticket;
use App\Observers\FurnitureObserver;
use App\Observers\TicketObserver;
use Illuminate\Support\ServiceProvider;

class ObserverServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Furniture::observe(FurnitureObserver::class);
        Ticket::observe(TicketObserver::class);
    }
}
