<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Attendance Report</title>
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
        <div class="title">Attendance Report</div>
    </div>
    <table border="1" cellspacing="0" cellpadding="5">
    <thead>
        <tr>
            <th>Date</th>
            <th>User</th>
            <th>Punch In</th>
            <th>Punch Out</th>
            <th>Total Hours</th>
            <th>Punch-In Again</th>
            <th>Punch-Out Again</th>
            <th>Overtime Hours</th>
            <th>Location</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($attendance as $att)
            <tr>
                <td>{{ \Carbon\Carbon::parse($att->date)->format('Y-m-d') }}</td>
                <td>{{ optional($att->user)->name ?? 'N/A' }}</td>
                <td>{{ $att->punch_in ? \Carbon\Carbon::parse($att->punch_in)->format('H:i:s') : 'N/A' }}</td>
                <td>{{ $att->punch_out ? \Carbon\Carbon::parse($att->punch_out)->format('H:i:s') : 'N/A' }}</td>
                <td>{{ $att->total_working_hours ?? 'N/A' }}</td>
                <td>{{ $att->punch_in_again ? \Carbon\Carbon::parse($att->punch_in_again)->format('H:i:s') : 'N/A' }}</td>
                <td>{{ $att->punch_out_again ? \Carbon\Carbon::parse($att->punch_out_again)->format('H:i:s') : 'N/A' }}</td>
                <td>{{ $att->overtime_working_hours ?? 'N/A' }}</td>
                <td>{{ $att->location_type ?? 'N/A' }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

</body>
</html>
