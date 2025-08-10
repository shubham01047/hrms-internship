<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Timesheet Report</title>
    <style>
        body { font-family: DejaVu Sans, Arial, Helvetica, sans-serif; font-size: 12px; color: #111827; }
        .header { margin-bottom: 16px; }
        .title { font-size: 18px; font-weight: 700; margin: 0 0 6px; }
        .meta { font-size: 12px; color: #4B5563; margin: 0 0 12px; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #E5E7EB; padding: 8px; text-align: left; }
        thead th { background: #F3F4F6; font-weight: 700; }
        tbody tr:nth-child(even) { background: #F9FAFB; }
        .empty { text-align: center; color: #6B7280; }
    </style>
</head>
<body>
    <div class="header">
        <div class="title">Timesheet Report</div>
        <div class="meta">Project: {{ $project->title }}</div>
        <div class="meta">Task: {{ $task->title }}</div>
        <div class="meta">Date Range: {{ $from }} to {{ $to }}</div>
    </div>

    <table>
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
                    <td class="empty" colspan="3">No records found for selected range.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>
