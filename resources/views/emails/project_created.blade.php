@component('mail::message')
# New Project Assigned

Hello,

You have been assigned to a new project.

**Project:** {{ $project->title }}  
**Client:** {{ $project->client_name ?? 'N/A' }}  
**Deadline:** {{ \Carbon\Carbon::parse($project->deadline)->format('d M Y') }}

Please log in to the HRMS system for more details.

@component('mail::button', ['url' => url('https://hrms.demeraudit.in/')])
Login to HRMS
@endcomponent

Thanks,  
{{ config('app.name') }}
@endcomponent
