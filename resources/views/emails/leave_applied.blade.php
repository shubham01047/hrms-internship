@component('mail::message')
# Leave Application

Hello {{ $admin->name ?? 'Sir' }},

A new leave application has been submitted.

- **Employee:** {{ $leave->user->name }}
- **Leave Type:** {{ $leave->leaveType->name }}
- **Dates:** {{ \Carbon\Carbon::parse($leave->start_date)->format('d M Y') }} to {{ \Carbon\Carbon::parse($leave->end_date)->format('d M Y') }}
- **Reason:** {{ $leave->reason }}

Please log in to the HRMS system to review and take action.

@component('mail::button', ['url' => url('https://hrms.demeraudit.in/')])
Login to HRMS
@endcomponent

Thanks,  
{{ config('app.name') }}
@endcomponent
