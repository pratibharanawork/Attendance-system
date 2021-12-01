@component('mail::message')


Here is your Password .
@php $maildata['password'];@endphp
@component('mail::button', ['url' => $maildata['password']])

Verify
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent