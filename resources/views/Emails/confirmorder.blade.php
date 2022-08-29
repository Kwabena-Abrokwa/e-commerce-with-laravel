@component('mail::message')
# Confirm order placed

There has been an order placed on Valovov from Username: {{Auth::user()->name}} Email:  {{Auth::user()->email}}

@component('mail::button', ['url' => 'https://harmonious-dust-hpctgj8q3wbq.vapor-farm-c1.com/'])
Go to admin
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
