@component('mail::message')
# Task Completed 

Hello,

The following task has been marked as **Completed**:

- **Task:** {{ $task->title }}
- **Project:** {{ $task->project->title ?? 'N/A' }}
- **Due Date:** {{ $task->due_date ? \Carbon\Carbon::parse($task->due_date)->format('d M Y') : 'N/A' }}

@component('mail::button', ['url' => url('https://hrms.demeraudit.in/')])
Login to HRMS
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
