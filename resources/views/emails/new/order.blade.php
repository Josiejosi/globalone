@component('mail::message')
# New Order

{{ $user->name }} {{ $user->surname }}, Your order for level 1 was created.


Thanks,<br>
{{ config('app.name') }}
@endcomponent
