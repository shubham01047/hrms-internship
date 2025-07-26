@php
    use App\Models\Attendance;
    use App\Models\BreakModel;
    use Carbon\Carbon;

    $attendanceToday = Attendance::where('user_id', auth()->id())
        ->whereDate('date', now())
        ->first();

    $activeBreak = null;
    $completedBreaks = [];
    $netWorkTime = null;

    if ($attendanceToday) {
        $activeBreak = BreakModel::where('attendance_id', $attendanceToday->id)
            ->whereNull('break_end')
            ->latest()
            ->first();

        $completedBreaks = BreakModel::where('attendance_id', $attendanceToday->id)
            ->whereNotNull('break_end')
            ->pluck('break_type')
            ->toArray();
    }
@endphp
<x-app-layout>
<!-- Work Status Section -->
<div>
    <h2>Work Status</h2>
    <p>Track your work hours easily</p>
    <div>Total Working Time:<span id="workTime">
            @if ($attendanceToday && $attendanceToday->punch_out)
                {{ $attendanceToday->total_working_hours ?? '00:00:00' }}
            @elseif ($attendanceToday && $attendanceToday->punch_in && !$attendanceToday->punch_out)
                00:00:00 {{-- This will be updated live by JavaScript --}}
            @else
                00:00:00
            @endif
        </span>
    </div>

    @if (!$attendanceToday)
        <form method="POST" action="{{ route('attendance.punchIn') }}">
            @csrf
            <button type="submit">Punch In</button>
        </form>
    @elseif (!$attendanceToday->punch_out)
        <form method="POST" action="{{ route('attendance.punchOut') }}">
            @csrf
            <button type="submit">Punch Out</button>
        </form>
    @else
        <div>Day Completed</div>
    @endif
</div>

<!-- Break Management -->
@if ($attendanceToday && !$attendanceToday->punch_out)
    <div>
        <h2>Manage Breaks</h2>

        @if (!$activeBreak)
            <form method="POST" action="{{ route('attendance.startBreak') }}">
                @csrf
                <div>
                    @foreach (['Morning Tea', 'Lunch', 'Evening Tea', 'Custom'] as $break)
                        <button type="submit" name="break_type" value="{{ $break }}"
                            {{ in_array($break, $completedBreaks) ? 'disabled' : '' }}>
                            Start {{ $break }} Break
                        </button>
                    @endforeach
                </div>
            </form>
        @else
            <div>
                On {{ $activeBreak->break_type }} break since
                {{ \Carbon\Carbon::parse($activeBreak->break_start)->format('h:i A') }}
            </div>
            <form method="POST" action="{{ route('attendance.endBreak') }}">
                @csrf
                <button type="submit">End Break</button>
            </form>
        @endif

        <div>Break Timer: <span id="breakTimer">00:00:00</span></div>
    </div>
@endif

@if ($attendanceToday && $attendanceToday->punch_in && !$attendanceToday->punch_out)
    @php
        $punchInTimestamp = \Carbon\Carbon::parse($attendanceToday->punch_in)->timestamp;

        $breakSeconds = \App\Models\BreakModel::where('attendance_id', $attendanceToday->id)
            ->whereNotNull('break_start')
            ->whereNotNull('break_end')
            ->get()
            ->sum(
                fn($b) => \Carbon\Carbon::parse($b->break_end)->diffInSeconds(\Carbon\Carbon::parse($b->break_start)),
            );
    @endphp

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const punchInTime = new Date({{ $punchInTimestamp * 1000 }}); // convert to JS timestamp
            const totalBreakSeconds = {{ $breakSeconds }};
            const workTimerEl = document.getElementById('workTime');

            function updateWorkTimer() {
                const now = new Date();
                let diff = Math.floor((now - punchInTime) / 1000);

                diff -= totalBreakSeconds;

                // ✅ Clamp to zero to avoid negative values
                diff = Math.max(diff, 0);

                const hrs = String(Math.floor(diff / 3600)).padStart(2, '0');
                const mins = String(Math.floor((diff % 3600) / 60)).padStart(2, '0');
                const secs = String(diff % 60).padStart(2, '0');

                if (workTimerEl) {
                    workTimerEl.textContent = `${hrs}:${mins}:${secs}`;
                }
            }

            updateWorkTimer(); // Initial run
            setInterval(updateWorkTimer, 1000); // Update every second
        });
    </script>
@endif

<!-- JS for Break Timer -->
@if ($activeBreak)
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const breakStart = new Date(
                "{{ \Carbon\Carbon::parse($activeBreak->break_start)->format('Y-m-d H:i:s') }}");
            const breakTimerEl = document.getElementById('breakTimer');

            function updateBreakTimer() {
                const now = new Date();
                const diff = Math.floor((now - breakStart) / 1000);
                const hrs = String(Math.floor(diff / 3600)).padStart(2, '0');
                const mins = String(Math.floor((diff % 3600) / 60)).padStart(2, '0');
                const secs = String(diff % 60).padStart(2, '0');
                breakTimerEl.textContent = `${hrs}:${mins}:${secs}`;
            }

            updateBreakTimer();
            setInterval(updateBreakTimer, 1000);
        });
    </script>
@endif
</x-app-layout>
