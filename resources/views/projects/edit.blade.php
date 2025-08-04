<x-app-layout>
    <x-slot name="header">
        <h1>Edit Project</h1>
    </x-slot>

    <form method="POST" action="{{ route('projects.update', $project->id) }}">
        @csrf
        @method('PUT')

        <label>Name:</label>
        <input type="text" name="title" value="{{ $project->title }}" required><br>

        <label>Client:</label>
        <input type="text" name="client_name" value="{{ $project->client_name }}"><br>

        <label>Budget:</label>
        <input type="number" name="budget" value="{{ $project->budget }}" step="0.01"><br>

        <label>Deadline:</label>
        <input type="date" name="deadline" value="{{ $project->deadline }}"><br>

        <label>Description:</label><br>
        <textarea name="description">{{ $project->description }}</textarea><br>

        <label>Assign Employees:</label><br>
        @foreach ($users as $user)
            <input type="checkbox" name="members[]" value="{{ $user->id }}"
                {{ $project->members->contains($user->id) ? 'checked' : '' }}>
            {{ $user->employee->name }}<br>
        @endforeach

        <button type="submit">Update</button>
        <a href="{{ route('projects.index') }}">Cancel</a>
    </form>
</x-app-layout>
