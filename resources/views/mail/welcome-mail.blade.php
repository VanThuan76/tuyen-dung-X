@component("mail::message")

# {{ __('Verify register', ['name' => $name]) }}!!

@component('mail::button', ['url' => route('verification.verify', $id)])
Click here
@endcomponent

@component('mail::panel')
This is a verify mail from EmployingX
@endcomponent

@component('mail::subcopy')
This is a subcopy component
@endcomponent

Thanks, <br>
{{ config('app.name') }}

@endcomponent