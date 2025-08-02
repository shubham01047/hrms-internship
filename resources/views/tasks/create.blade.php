<x-app-layout>
    <h2>Create Task for Project: {{ $project->name }}</h2>
    <form method="POST" action="{{ route('projects.tasks.store', $project->id) }}">
        @csrf
        <label>Title:</label>
        <input type="text" name="title"><br>
        <label>Description:</label>
        <textarea name="description"></textarea><br>
        <label>Priority:</label>
        <select name="priority">
            <option value="">---Select Priority---</option>
            <option value="Low">Low</option>
            <option value="Medium">Medium</option>
            <option value="High">High</option>
            <option value="Urgent">Urgent</option>
        </select><br>
        <label>Status:</label>
        <select name="status">
            <option value="">---Select Status---</option>
            <option value="To-Do">To-Do</option>
            <option value="In Progress">In Progress</option>
            <option value="On Hold">On Hold</option>
            <option value="Done">Done</option>
        </select><br>
        <label>Due Date:</label>
        <input type="date" name="due_date"><br>
        <label>Assign Employees:</label><br>
        @foreach ($project->users as $user)
            <label>
                <input type="checkbox" name="assigned_user_ids[]" value="{{ $user->id }}" {{ isset($task) && $task->assignedUsers->contains($user->id) ? 'checked' : '' }}>
                {{ $user->name }}
            </label><br>
        @endforeach
        <button type="submit">Create Task</button>
        <a href="{{ route('projects.show', ['project' => $project]) }}">Cancel</a>
    </form>
</x-app-layout>