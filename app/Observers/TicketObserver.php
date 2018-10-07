<?php

namespace App\Observers;

use App\Models\Ticket;

class TicketObserver
{
    /**
     * Handle the ticket "deleted" event.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return void
     */
    public function deleted(Ticket $ticket)
    {
        $ticket->furniture()->detach();
    }
}
