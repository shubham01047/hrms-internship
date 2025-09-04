@component('mail::message')
# Daily Report Reminder

Hi {{ $user->name }},

This is a reminder to submit your **daily report** for today.

Please send a mail and update your progress.

Thanks,  
{{ config('app.name') }}
@endcomponent
