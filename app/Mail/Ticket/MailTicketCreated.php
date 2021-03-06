<?php

namespace App\Mail\Ticket;

use App\Models\Ticket;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailTicketCreated extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var \App\Models\Ticket
     */
    public $ticket;

    /**
     * Create a new event instance.
     *
     * @param \App\Models\Ticket $ticket
     */
    public function __construct(Ticket $ticket)
    {
        $this->ticket = $ticket;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->subject('New Ticket # ' . $this->ticket->id);

        $this->markdown('emails.ticket.created', [
            'url' => route('ticket.show', $this->ticket->id),
            'ticket' => $this->ticket,
        ]);

        return $this;
    }
}
