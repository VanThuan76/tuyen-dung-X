@component("mail::message")

# {{ __('Apply job', ['name' => $name]) }}!!

@component('mail::button', ['url' => route('home')])
Thank you {{$user}} for applying this job {{$name}} {{$address}}
@endcomponent

@component('mail::panel')
This is a mail from EmployingX
@endcomponent

@component('mail::subcopy')
This is a subcopy component
@endcomponent

Thanks, <br>
{{ config('app.name') }}

@endcomponent