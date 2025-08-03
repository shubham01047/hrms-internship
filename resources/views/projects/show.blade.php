<x-app-layout>
    <x-slot name="header">
        <h1>Project: {{ $project->title }}</h1>
    </x-slot>
    @if (session('success'))
        <div>
            <p>Success! {{ session('success') }}</p>
        </div>
    @endif
    @if (session('error'))
        <div>
            <p>Error! {{ session('error') }}</p>
        </div>
    @endif
    <div>
        <strong>Client:</strong> {{ $project->client_name }}<br>
        <strong>Deadline:</strong> {{ \Carbon\Carbon::parse($project->deadline)->format('M d, Y') }}<br>
        <strong>Description:</strong> {{ $project->description }}
    </div>
    <div>
        @can('create task')
            <a href="{{ route('projects.tasks.create', $project->id) }}">
                Add Task
            </a>
        @endcan
        <a href="{{ route('projects.index') }}">
            Back to Projects
        </a>
    </div>
    <h1>Tasks</h1>
    @if($project->tasks->count() > 0)
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Assigned To</th>
                    <th>Priority</th>
                    <th>Status</th>
                    <th>Due Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($project->tasks as $index => $task)
                    <tr class="text-center">
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $task->title }}</td>
                        <td>
                            <ul>
                                @forelse ($task->assignedUsers as $user)
                                    <li>{{ $user->name }}</li>
                                @empty
                                    <li>No users assigned</li>
                                @endforelse
                            </ul>
                        </td>
                        <td>
                            <span @if($task->priority === 'Urgent') @elseif($task->priority === 'High')
                            @elseif($task->priority === 'Medium') @else @endif>
                                {{ ucfirst($task->priority) }}
                            </span>
                        </td>
                        <td>{{ ucfirst($task->status) }}</td>
                        <td>{{ \Carbon\Carbon::parse($task->due_date)->format('M d, Y') }}</td>
                        <td>
                            @can('edit task')
                                <a href="{{ route('projects.tasks.edit', [$project->id, $task->id]) }}">
                                    Edit
                                </a>
                            @endcan
                            @can('delete task')
                                <form action="{{ route('projects.tasks.destroy', [$project->id, $task->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            @endcan
                            @can('view timesheet')
                                <a href="{{ route('tasks.timesheets.index', ['project' => $project->id, 'task' => $task->id]) }}">
                                    View Timesheet
                                </a><br>
                            @endcan
                            <a href="{{ route('tasks.comments.index', ['project' => $project->id, 'task' => $task->id]) }}">
                                View Comments
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No tasks assigned to this project yet.</p>
    @endif
</x-app-layout>