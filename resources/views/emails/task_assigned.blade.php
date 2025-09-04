@component('mail::message')
# Task Assigned

Hi {{ $user->name }},

You have been assigned a new task:

**Title:** {{ $task->title }}  
**Description:** {{ $task->description ?? 'No description provided' }}  
**Due Date:** {{ \Carbon\Carbon::parse($task->due_date)->format('d M Y') }}  
**Priority:** {{ $task->priority }}  
**Status:** {{ $task->status }}

@component('mail::button', ['url' => url('https://hrms.demeraudit.in/')])
Login to HRMS
@endcomponent

Thanks,  
{{ config('app.name') }}
@endcomponent
