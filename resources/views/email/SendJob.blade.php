@component('mail::message')
    Hi, {{$data['friend_name']}} , {{$data['your_name']}} is
    Send You a Job Patahise.
@component('mail::button', ['url' => $data['jobUrl']])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
