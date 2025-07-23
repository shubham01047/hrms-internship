<x-app-layout>
    @can('view all leaves')
        <h2>My Leave Applications</h2>
        <table>
            <thead>
                <tr>
                    <th>Type</th>
                    <th>Start</th>
                    <th>End</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($leaves as $leave)
                    <tr>
                        <td>{{ $leave->leaveType->name }}</td>
                        <td>{{ \Carbon\Carbon::parse($leave->start_date)->format('d M, Y') }}</td>
                        <td>{{ \Carbon\Carbon::parse($leave->end_date)->format('d M, Y') }}</td>
                        <td>{{ ucfirst($leave->status) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endcan
</x-app-layout>
