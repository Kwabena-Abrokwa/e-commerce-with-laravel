@component('mail::message')

Thank you for your purchase {{Auth::user()->name}}

@component('mail::button', ['url' => 'https://valovov.com/ordered-product'])
Check your order process
@endcomponent

Thanks, Valovov Shop
@endcomponent
