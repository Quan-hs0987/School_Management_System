@component('mail::message')
    Hello {{ $user->name }},
    <p>We understandit happens</p>
    @component('mail::button', ['url' => url('reset/' . $user->remember_token)])
        Reset Your Password
    @endcomponent
    {{ config('app.name') }}
@endcomponent
