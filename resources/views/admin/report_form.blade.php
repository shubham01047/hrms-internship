<x-app-layout>
    <h2>Download Attendance Report</h2>
    <form method="POST" action="{{ route('attendance.report.download') }}">
        @csrf
        <label>From:</label>
        <input type="date" name="from" required>
        <label>To:</label>
        <input type="date" name="to" required>
        <label>Export Type:</label>
        <select name="type" required>
            <option value="">Select File Type</option>
            <option value="pdf">PDF</option>
            <option value="excel">Excel</option>
        </select>
        <button type="submit">Download</button>
        <a href="{{ url()->previous() }}">Cancel</a>
    </form>
</x-app-layout>