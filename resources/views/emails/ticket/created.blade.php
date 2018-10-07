@component('mail::message')
# Ticket {{ $ticket->id }} status new

@component('mail::button', compact('url'))
see ticket
@endcomponent

{{ config('app.name') }}
@endcomponent
