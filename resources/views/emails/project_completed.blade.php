@component('mail::message')
# Project Completed 

Hello,

The following Project has been marked as **Completed**:

- **Project:** {{ $project->title ?? 'N/A' }}
- **Due Date:** {{ $project->deadline ? \Carbon\Carbon::parse($project->deadline)->format('d M Y') : 'N/A' }}

@component('mail::button', ['url' => url('https://hrms.demeraudit.in/')])
Login to HRMS
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
