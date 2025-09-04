@component('mail::message')
# Timesheet Rejected

Hello {{ $timesheet->user->name }},

Your timesheet has been **Rejected**.

- **Project:** {{ $timesheet->task->project->title }}
- **Task:** {{ $timesheet->task->title }}
- **Date:** {{ \Carbon\Carbon::parse($timesheet->date)->format('d M Y') }}
- **Hours Worked:** {{ $timesheet->hours_worked }}
- **Description / Worklog:** {{ $timesheet->description ?? 'N/A' }}

@component('mail::button', ['url' => url('https://hrms.demeraudit.in/')])
Login to HRMS
@endcomponent

Thanks,  
{{ config('app.name') }}
@endcomponent
