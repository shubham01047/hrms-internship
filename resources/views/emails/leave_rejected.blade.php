@component('mail::message')
# Leave Rejected ❌

Hi {{ $leave->user->name }},

Your leave from **{{ $leave->start_date }}** to **{{ $leave->end_date }}** has been **Rejected**.

**Reason:** You don't have enough leave balance.

@component('mail::button', ['url' => url('https://hrms.demeraudit.in/')])
Login to HRMS
@endcomponent

Thanks,  
{{ config('app.name') }}
@endcomponent
