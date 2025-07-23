@component('mail::message')
# Leave Approved ✅

Hi {{ $leave->user->name }},

Your leave from **{{ $leave->start_date }}** to **{{ $leave->end_date }}** has been **approved**.

**Reason:** {{ $leave->reason }}

Thanks,  
{{ config('app.name') }}
@endcomponent
