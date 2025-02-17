@component('mail::message')
# Bonjour {{ $name }},

Votre inscription a été approuvée !

Merci,<br>
{{ config('app.name') }}
@endcomponent
