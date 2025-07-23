<x-app-layout>
    @can('approve leave')

        <h2>Pending Leave Requests</h2>

        <table>
            <thead>
                <tr>
                    <th>Employee</th>
                    <th>Type</th>
                    <th>Start</th>
                    <th>End</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($leaves as $leave)
                    <tr>
                        <td>{{ $leave->user->name }}</td>
                        <td>{{ $leave->leaveType->name }}</td>
                        <td>{{ \Carbon\Carbon::parse($leave->start_date)->format('d M, Y') }}</td>
                        <td>{{ \Carbon\Carbon::parse($leave->end_date)->format('d M, Y') }}</td>
                        <td>
                            <form method="POST" action="{{ route('leaves.approve', $leave->id) }}">
                                @csrf
                                <button type="submit">Approve</button>
                            </form>
                            <form method="POST" action="{{ route('leaves.reject', $leave->id) }}">
                                @csrf
                                <button type="submit">Reject</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endcan
</x-app-layout>
