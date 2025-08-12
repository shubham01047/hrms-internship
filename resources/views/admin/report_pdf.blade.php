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
    <table>
        <thead>
            <tr>
                <th>Date</th>
                <th>User</th>
                <th>Punch-In</th>
                <th>Punch-Out</th>
                <th>Total Working Hours</th>
                <th>Punch-In-Again</th>
                <th>Punch-Out-Again</th>
                <th>Total Overtime Working Hours</th>
                <th>Location</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($attendance as $att)
                <tr>
                    <td>{{ $att->date ? $att->date->format('Y-m-d') : '' }}</td>
                    <td>{{ $att->user->name ? $att->user->name : 'N/A' }}</td>
                    <td>{{ $att->punch_in ? $att->punch_in->format('H:i:s') : '' }}</td>
                    <td>{{ $att->punch_out ? $att->punch_out->format('H:i:s') : '' }}</td>
                    <td>{{ $att->total_working_hours ? $att->total_working_hours : 'N/A' }}</td>
                    <td>{{ $att->punch_in_again ? $att->punch_in_again->format('H:i:s') : 'N/A' }}</td>
                    <td>{{ $att->punch_out_again ? $att->punch_out_again->format('H:i:s') : 'N/a' }}</td>
                    <td>{{ $att->overtime_working_hours ? $att->overtime_working_hours : 'N/A' }}</td>
                    <td>{{ $att->location_type ? $att->location_type : 'N/A' }}</td>
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
