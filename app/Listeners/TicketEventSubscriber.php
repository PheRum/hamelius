<?php

namespace App\Listeners;

use App\Events\Ticket\TicketClose;
use App\Events\Ticket\TicketCompleted;
use App\Events\Ticket\TicketNew;
use App\Mail\Ticket\MailTicketClose;
use App\Mail\Ticket\MailTicketCompleted;
use App\Mail\Ticket\MailTicketCreated;
use Mail;

class TicketEventSubscriber
{
    /**
     * Handle user login events.
     *
     * @param $event
     */
    public function onTicketNew($event)
    {
        /** @var \App\Models\Ticket $ticket */
        $ticket = $event->ticket;

        Mail::to($ticket->user)->send(new MailTicketCreated($ticket));
    }

    /**
     * Handle user logout events.
     *
     * @param $event
     */
    public function onTicketCompleted($event)
    {
        /** @var \App\Models\Ticket $ticket */
        $ticket = $event->ticket;

        Mail::to($ticket->user)->send(new MailTicketCompleted($ticket));
    }

    /**
     * Handle user registered events.
     *
     * @param $event
     */
    public function onTicketClose($event)
    {
        /** @var \App\Models\Ticket $ticket */
        $ticket = $event->ticket;

        Mail::to($ticket->user)->send(new MailTicketClose($ticket));
    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param  \Illuminate\Events\Dispatcher $events
     */
    public function subscribe($events)
    {
        $events->listen(TicketNew::class, 'App\Listeners\TicketEventSubscriber@onTicketNew');

        $events->listen(TicketCompleted::class, 'App\Listeners\TicketEventSubscriber@onTicketCompleted');

        $events->listen(TicketClose::class, 'App\Listeners\TicketEventSubscriber@onTicketClose');
    }
}
