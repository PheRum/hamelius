@component('mail::message')
# Ticket {{ $ticket->id }} status close

@component('mail::button', compact('url'))
see ticket
@endcomponent

{{ config('app.name') }}
@endcomponent
