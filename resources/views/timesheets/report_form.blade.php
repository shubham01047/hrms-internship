<x-app-layout>
    <h2>Download Timesheet Report</h2>
    <form method="POST" action="{{ route('timesheets.report.download', [$project->id, $task->id]) }}">
        @csrf
        <label>From:</label>
        <input type="date" name="from" required>
        <label>To:</label>
        <input type="date" name="to" required>
        <label>Export Type:</label>
        <select name="type" required>
            <option value="pdf">PDF</option>
            <option value="excel">Excel</option>
        </select>
        <button type="submit">Download</button>
        <a href="{{ url()->previous() }}">Cancel</a>
    </form>
</x-app-layout>
