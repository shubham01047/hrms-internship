<x-app-layout>
    <h2>Worklogs for Task: {{ $task->title }}</h2>
    @if (session('success'))
        <div>
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div>
            {{ session('error') }}
        </div>
    @endif
    @can('create timesheet')
        <a href="{{ route('tasks.timesheets.create', [$task->project_id, $task->id]) }}">Create timesheet</a>
    @endcan
    <a href="{{ route('projects.show', ['project' => $projectId]) }}">Back to Task</a>
    <table>
        <thead>
            <tr>
                <th>User</th>
                <th>Date</th>
                <th>Hours Worked</th>
                <th>Description</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($timesheets as $timesheet)
                <tr>
                    <td>{{ $timesheet->user->name }}</td>
                    <td>{{ \Carbon\Carbon::parse($timesheet->date)->format('M d, Y') }}</td>
                    <td>{{ $timesheet->hours_worked }} Hours</td>
                    <td>{{ $timesheet->description }}</td>
                    <td>{{ ucfirst($timesheet->status) }}</td>
                    <td>
                        @can('approve timesheet')
                            <form method="POST" action="{{ route('timesheets.approve', $timesheet->id) }}">
                                @csrf
                                @method('PUT')
                                <button type="submit">Approve</button>
                            </form>
                        @endcan
                        @can('reject timesheet')
                            <form method="POST" action="{{ route('timesheets.reject', $timesheet->id) }}">
                                @csrf
                                @method('PUT')
                                <button type="submit">Reject</button>
                            </form>
                        @endcan
                        @can('edit timesheet')
                            <a href="{{ route('tasks.timesheets.edit', [$projectId, $task->id, $timesheet->id]) }}">Edit</a>
                        @endcan
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-app-layout>