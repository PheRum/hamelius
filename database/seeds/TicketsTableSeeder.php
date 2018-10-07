<?php

use App\Models\Furniture;
use App\Models\Ticket;
use Illuminate\Database\Seeder;

class TicketsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Ticket::class, 20)->create()->each(function (Ticket $ticket) {
            $furniture = Furniture::all()->random(2)->pluck('id')->toArray();

            $ticket->furniture()->attach($furniture);
        });
    }
}
