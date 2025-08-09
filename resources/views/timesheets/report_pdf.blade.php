<h3>Timesheet Report</h3>
<p>Project: {{ $project->title }}</p>
<p>Task: {{ $task->title }}</p>
<p>Date Range: {{ $from }} to {{ $to }}</p>
<table border="1" cellspacing="0" cellpadding="5">
    <thead>
        <tr>
            <th>Date</th>
            <th>User</th>
            <th>Hours Worked</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($timesheets as $timesheet)
            <tr>
                <td>{{ $timesheet->date }}</td>
                <td>{{ $timesheet->user->name ?? 'N/A' }}</td>
                <td>{{ $timesheet->hours_worked }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="3">No records found for selected range.</td>
            </tr>
        @endforelse
    </tbody>
</table>
