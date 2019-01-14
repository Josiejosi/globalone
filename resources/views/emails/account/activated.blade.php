@component('mail::message')
# Account Activated

{{ $user->name }} {{ $user->surname }}, We received your proof of activation, and your account is active now.

@component( 'mail::button', [ 'url' => $url ])
Login
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
