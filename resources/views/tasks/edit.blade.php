<x-app-layout>
    <h2>Edit Task: {{ $task->title }}</h2>
    <form method="POST" action="{{ route('projects.tasks.update', [$task->project_id, $task->id]) }}">
        @csrf
        @method('PUT')
        <label>Title:</label>
        <input type="text" name="title" value="{{ $task->title }}"><br>
        <label>Description:</label>
        <textarea name="description">{{ $task->description }}</textarea><br>
        <label>Priority:</label>
        <select name="priority">
            @foreach (['Low', 'Medium', 'High', 'Urgent'] as $priority)
                <option value="{{ $priority }}" {{ $task->priority === $priority ? 'selected' : '' }}>{{ $priority }}</option>
            @endforeach
        </select><br>
        <label>Status:</label>
        <select name="status">
            @foreach (['To-Do', 'In Progress', 'On Hold', 'Done'] as $status)
                <option value="{{ $status }}" {{ $task->status === $status ? 'selected' : '' }}>{{ $status }}</option>
            @endforeach
        </select><br>
        <label>Due Date:</label>
        <input type="date" name="due_date" value="{{ $task->due_date }}"><br>
        <label>Assign to:</label><br>
        @foreach ($project->users as $user)
            <label>
                <input type="checkbox" name="assigned_user_ids[]" value="{{ $user->id }}" {{ isset($task) && $task->assignedUsers->contains($user->id) ? 'checked' : '' }}>
                {{ $user->name }}
            </label><br>
        @endforeach
        <br>
        <button type="submit">Update</button>
        <a href="{{ route('projects.show', ['project' => $project]) }}">Cancel</a>
    </form>
</x-app-layout>