@component('mail::message')
# Introduction

Thanks a lot for registering

@component('mail::button', ['url' => 'http://google.com'])
Start Browsing
@endcomponent

@component('mail::panel', ['url' => 'http://google.com'])
    Go change the world!!!
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
