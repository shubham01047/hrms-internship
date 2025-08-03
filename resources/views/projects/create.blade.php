<x-app-layout>
    <x-slot name="header">
        <h1>Create Project</h1>
    </x-slot>
    <form method="POST" action="{{ route('projects.store') }}">
        @csrf
        <label>Name:</label>
        <input type="text" name="title" required><br>

        <label>Client:</label>
        <input type="text" name="client_name"><br>

        <label>Budget:</label>
        <input type="number" name="budget" step="0.01"><br>

        <label>Deadline:</label>
        <input type="date" name="deadline"><br>

        <label>Description:</label><br>
        <textarea name="description"></textarea><br>

        <label>Assign Employees:</label><br>
        @foreach ($users as $user)
            <input type="checkbox" name="members[]" value="{{ $user->id }}"> {{ $user->name }}<br>
        @endforeach

        <button type="submit">Submit</button>
        <a href="{{ route('projects.index') }}">Cancel</a>
    </form>
</x-app-layout>