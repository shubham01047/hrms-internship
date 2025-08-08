@component('mail::message')
# Leave Rejected ❌

Hi {{ $leave->user->name }},

Your leave from **{{ $leave->start_date }}** to **{{ $leave->end_date }}** has been **Rejected**.

**Reason:** You don't have enough leave balance.

Thanks,  
{{ config('app.name') }}
@endcomponent
