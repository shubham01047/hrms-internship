<x-app-layout>
    <h2>Log Timesheet for Task: {{ $task->title }}</h2>
    <form action="{{ route('tasks.timesheets.store', [$projectId, $task->id]) }}" method="POST">
        @csrf
        <input type="hidden" name="task_id" value="{{ $task->id }}">
        <label class="block font-medium">Date</label>
        <input type="date" name="date" value="{{ $today }}" readonly>
        @if ($attendance)
            <p>Attendance for:  {{ \Carbon\Carbon::parse($today)->format('d M, Y') }}:</p>
            <p><strong>Punch In:</strong> {{ \Carbon\Carbon::parse($attendance->punch_in)->format('d M, Y h:i A') }}</p>
            <p><strong>Punch Out:</strong> {{ $attendance->punch_out?\Carbon\Carbon::parse($attendance->punch_out)->format('d M, Y h:i A') : 'Not yet punched out.' }}</p>
            <p><strong>Total Attendance Hours:</strong> {{ $attendance->total_working_hours ?? 'N/A' }}</p>
        @else
            <p>No attendance record found for today.</p>
        @endif
        <label for="hours_worked">Hours Worked</label>
        <input type="number" name="hours_worked" id="hours_worked" step="0.01" min="0.01"
            value="{{ old('hours_worked', $hoursWorked) }}" required />
        <label>Work Description</label>
        <textarea name="description" rows="4"></textarea>
        <button type="submit">
            Submit Timesheet
        </button>
        <a href="{{ route('tasks.timesheets.index', [$projectId, 'task' => $task->id]) }}">
            Back to Timesheet
        </a><br>
    </form>
</x-app-layout>