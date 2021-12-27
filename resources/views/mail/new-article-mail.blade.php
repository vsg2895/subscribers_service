@component('mail::message')
{{ $name }}

{{ $description }}

@component('mail::button', ['url' => ''])
Success Button
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
