<x-app-layout>
    <form method="POST" action="{{ route('tasks.timesheets.update', [$projectId, $task->id, $timesheet->id]) }}">
        @csrf
        @method('PUT')
        <label>Date:</label>
        <input type="date" name="date" value="{{ old('date', $timesheet->date) }}" required>
        <label>Hours Worked:</label>
        <input type="number" name="hours_worked" step="0.01" min="0.1" max="24"
            value="{{ old('hours_worked', $timesheet->hours_worked) }}" required>
        <label>Description:</label>
        <textarea name="description">{{ old('description', $timesheet->description) }}</textarea>
        <button type="submit">Update Timesheet</button>
        <a href="{{ route('tasks.timesheets.index', [$projectId, 'task' => $task->id]) }}">
            Back to Timesheet
        </a><br>
    </form>
</x-app-layout>