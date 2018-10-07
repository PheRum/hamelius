@component('mail::message')
# Ticket {{ $ticket->id }} status completed

@component('mail::button', compact('url'))
see ticket
@endcomponent

{{ config('app.name') }}
@endcomponent
