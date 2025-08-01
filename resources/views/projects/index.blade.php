<x-app-layout>
    <x-slot name="header">
        <h1>Project Management</h1>
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
    @can('create project')
        <a href="{{ route('projects.create') }}">Create New Project</a>
    @endcan
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Client</th>
                <th>Description</th>
                <th>Deadline</th>
                <th>Members</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($projects as $index => $project)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $project->title }}</td>
                    <td>{{ $project->client_name }}</td>
                    <td>{{ $project->description }}</td>
                    <td>{{ \Carbon\Carbon::parse($project->deadline)->format('M d, Y') }}</td>
                    <td>
                        <ul>
                            @foreach ($project->members as $member)
                                <li>{{ $member->name }}</li>
                            @endforeach
                        </ul>
                    </td>
                    <td>
                        @can('edit project')
                            <a href="{{ route('projects.edit', $project->id) }}">Edit</a><br>
                        @endcan
                        <a href="{{ route('projects.show', ['project' => $project]) }}">View Tasks</a><br>
                        @can('delete project')
                            <form action="{{ route('projects.destroy', $project->id) }}" method="POST"
                                onsubmit="return confirm('Are you sure you want to delete this project?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit"> Delete</button>
                            </form>
                        @endcan
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-app-layout>