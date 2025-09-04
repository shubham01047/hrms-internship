@component('mail::message')
# Timesheet Submission

Hello {{ $admin->name ?? 'Sir' }},

A new timesheet has been submitted.

- **Employee:** {{ $timesheet->user->name }}
- **Project:** {{ $timesheet->task->project->title }}
- **Task:** {{ $timesheet->task->title }}
- **Date:** {{ \Carbon\Carbon::parse($timesheet->date)->format('d M Y') }}
- **Hours Worked:** {{ $timesheet->hours_worked }}
- **Description / Worklog:** {{ $timesheet->description ?? 'N/A' }}

Please log in to the HRMS system to review and take action.

@component('mail::button', ['url' => url('https://hrms.demeraudit.in/')])
Login to HRMS
@endcomponent

Thanks,  
{{ config('app.name') }}
@endcomponent
