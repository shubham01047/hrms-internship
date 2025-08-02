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
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #ff6b6b 0%, #ffffff 50%, #ff4757 100%);
            min-height: 100vh;
        }

        .dashboard-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem;
        }

        .card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 2rem;
            margin-bottom: 2rem;
            box-shadow: 0 20px 40px rgba(255, 75, 87, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: all 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 30px 60px rgba(255, 75, 87, 0.15);
        }

        .header-gradient {
            background: linear-gradient(135deg, #ff2626, #ff6969);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .card h2 {
            color: #ff4757;
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }

        .card h2.header-gradient {
            background: linear-gradient(135deg, #ff2626, #ff6969);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .work-time-display {
            text-align: center;
            padding: 2rem;
            background: linear-gradient(135deg, #ff4757, #ff6b6b);
            border-radius: 15px;
            margin: 1rem 0;
            color: white;
        }

        #workTime {
            font-size: 3rem;
            font-weight: 700;
            font-family: 'Courier New', monospace;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
        }

        /* Different colored buttons */
        .btn-punch-in {
            background: linear-gradient(45deg, #2ecc71, #27ae60);
            color: white;
            border: none;
            padding: 1rem 2rem;
            border-radius: 50px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 10px 30px rgba(46, 204, 113, 0.3);
            margin: 0.5rem;
        }

        .btn-punch-in:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 35px rgba(46, 204, 113, 0.4);
            background: linear-gradient(45deg, #27ae60, #2ecc71);
        }

        .btn-punch-out {
            background: linear-gradient(45deg, #e74c3c, #c0392b);
            color: white;
            border: none;
            padding: 1rem 2rem;
            border-radius: 50px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 10px 30px rgba(231, 76, 60, 0.3);
            margin: 0.5rem;
        }

        .btn-punch-out:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 35px rgba(231, 76, 60, 0.4);
            background: linear-gradient(45deg, #c0392b, #e74c3c);
        }

        .btn-morning-tea {
            background: linear-gradient(45deg, #f39c12, #e67e22);
            color: white;
            border: none;
            padding: 1rem 2rem;
            border-radius: 50px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 10px 30px rgba(243, 156, 18, 0.3);
            margin: 0.5rem;
        }

        .btn-morning-tea:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 35px rgba(243, 156, 18, 0.4);
        }

        .btn-lunch {
            background: linear-gradient(45deg, #9b59b6, #8e44ad);
            color: white;
            border: none;
            padding: 1rem 2rem;
            border-radius: 50px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 10px 30px rgba(155, 89, 182, 0.3);
            margin: 0.5rem;
        }

        .btn-lunch:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 35px rgba(155, 89, 182, 0.4);
        }

        .btn-evening-tea {
            background: linear-gradient(45deg, #3498db, #2980b9);
            color: white;
            border: none;
            padding: 1rem 2rem;
            border-radius: 50px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 10px 30px rgba(52, 152, 219, 0.3);
            margin: 0.5rem;
        }

        .btn-evening-tea:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 35px rgba(52, 152, 219, 0.4);
        }

        .btn-custom {
            background: linear-gradient(45deg, #1abc9c, #16a085);
            color: white;
            border: none;
            padding: 1rem 2rem;
            border-radius: 50px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 10px 30px rgba(26, 188, 156, 0.3);
            margin: 0.5rem;
        }

        .btn-custom:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 35px rgba(26, 188, 156, 0.4);
        }

        .btn-end-break {
            background: linear-gradient(45deg, #ff4757, #ff6b6b);
            color: white;
            border: none;
            padding: 1rem 2rem;
            border-radius: 50px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 10px 30px rgba(255, 75, 87, 0.3);
            margin: 0.5rem;
        }

        .btn-end-break:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 35px rgba(255, 75, 87, 0.4);
        }

        .btn:disabled {
            background: #95a5a6 !important;
            cursor: not-allowed;
            opacity: 0.6;
        }

        .btn:disabled:hover {
            transform: none;
            box-shadow: none;
        }

        .break-buttons {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1rem;
            margin: 1rem 0;
        }

        .break-timer {
            background: linear-gradient(135deg, #ffffff, #ffe6e6);
            padding: 1.5rem;
            border-radius: 15px;
            text-align: center;
            border: 2px solid #ff4757;
        }

        #breakTimer {
            font-size: 2rem;
            font-weight: 700;
            color: #ff4757;
            font-family: 'Courier New', monospace;
        }

        .active-break {
            background: linear-gradient(135deg, #ff4757, #ff6b6b);
            color: white;
            padding: 1.5rem;
            border-radius: 15px;
            text-align: center;
        }

        .day-completed {
            background: linear-gradient(135deg, #2ecc71, #27ae60);
            color: white;
            padding: 1rem 2rem;
            border-radius: 50px;
            font-size: 1.2rem;
            font-weight: 600;
            display: inline-block;
        }

        /* Clock Styles */
        .clock-container {
            display: flex;
            justify-content: space-around;
            align-items: center;
            margin: 2rem 0;
            flex-wrap: wrap;
            gap: 2rem;
        }

        .analog-clock {
            width: 200px;
            height: 200px;
            border: 8px solid #ff4757;
            border-radius: 50%;
            position: relative;
            background: linear-gradient(135deg, #ffffff, #ffe6e6);
            box-shadow: 0 10px 30px rgba(255, 75, 87, 0.3);
        }

        .clock-center {
            position: absolute;
            top: 50%;
            left: 50%;
            width: 12px;
            height: 12px;
            background: #ff4757;
            border-radius: 50%;
            transform: translate(-50%, -50%);
            z-index: 10;
        }

        .clock-hand {
            position: absolute;
            background: #ff4757;
            transform-origin: bottom center;
            border-radius: 2px;
            transition: transform 0.1s ease-in-out;
        }

        .hour-hand {
            width: 4px;
            height: 60px;
            top: 40px;
            left: 50%;
            margin-left: -2px;
        }

        .minute-hand {
            width: 3px;
            height: 80px;
            top: 20px;
            left: 50%;
            margin-left: -1.5px;
        }

        .second-hand {
            width: 1px;
            height: 90px;
            top: 10px;
            left: 50%;
            margin-left: -0.5px;
            background: #ff6b6b;
        }

        .digital-clock {
            background: linear-gradient(135deg, #ff4757, #ff6b6b);
            color: white;
            padding: 2rem;
            border-radius: 15px;
            text-align: center;
            box-shadow: 0 10px 30px rgba(255, 75, 87, 0.3);
        }

        .digital-time {
            font-size: 2.5rem;
            font-weight: 700;
            font-family: 'Courier New', monospace;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
        }

        .digital-date {
            font-size: 1.2rem;
            margin-top: 0.5rem;
            opacity: 0.9;
        }

        @media (max-width: 768px) {
            .clock-container {
                flex-direction: column;
            }

            .analog-clock {
                width: 150px;
                height: 150px;
            }

            .digital-time {
                font-size: 2rem;
            }

            #workTime {
                font-size: 2rem;
            }
        }
    </style>

    <div class="dashboard-container">
        <!-- Clock Section -->
        <div class="card">
            <h2 class="header-gradient">Current Time</h2>
            <div class="clock-container">
                <div class="analog-clock" id="analogClock">
                    <div class="clock-center"></div>
                    <div class="clock-hand hour-hand" id="hourHand"></div>
                    <div class="clock-hand minute-hand" id="minuteHand"></div>
                    <div class="clock-hand second-hand" id="secondHand"></div>
                </div>
                <div class="digital-clock">
                    <div class="digital-time" id="digitalTime">00:00:00</div>
                    <div class="digital-date" id="digitalDate">Loading...</div>
                </div>
            </div>
        </div>

        <!-- Work Status Section -->
        <div class="card">
            <h2 class="header-gradient">Work Status</h2>
            <p>Track your work hours easily</p>
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
            <div class="work-time-display">
                <div>Total Working Time:</div>
                <div id="workTime">
                    @if ($attendanceToday && $attendanceToday->punch_out)
                        {{ $attendanceToday->total_working_hours ?? '00:00:00' }}
                    @elseif ($attendanceToday && $attendanceToday->punch_in && !$attendanceToday->punch_out)
                        00:00:00 {{-- This will be updated live by JavaScript --}}
                    @else
                        00:00:00
                    @endif
                </div>
                <div>Total Extra Working Time:</div>
                @if ($attendanceToday && $attendanceToday->punch_out_again)
                    {{ $attendanceToday->overtime_working_hours ?? '00:00:00' }}
                @else
                    <div id="extraWorkTime"> 00:00:00 </div>
                @endif
            </div>
            @if (!$attendanceToday)
                {{-- First Punch In --}}
                <form method="POST" action="{{ route('attendance.punchIn') }}" class="flex gap-4">
                    @csrf
                    <button type="submit" class="btn-punch-in w-48 flex-none">Punch In</button>
                    <div class="w-32 flex-1">
                        <label for="punch_in_remarks" class="block text-sm font-medium">Remarks (optional):</label>
                        <input type="text" name="punch_in_remarks" id="punch_in_remarks" class="form-control w-64"
                            placeholder="Late due to traffic.">
                    </div>
                </form>
            @elseif (!$attendanceToday->punch_out)
                {{-- First Punch Out --}}
                <form method="POST" action="{{ route('attendance.punchOut') }}" class="flex gap-4">
                    @csrf
                    <button type="submit" class="btn-punch-out w-48 flex-none">Punch Out</button>
                    <div class="w-64 flex-1">
                        <label for="punch_out_remarks" class="block text-sm font-medium">Remarks (optional):</label>
                        <input type="text" name="punch_out_remarks" id="punch_out_remarks" class="form-control w-64"
                            placeholder="Leaving early for appointment.">
                    </div>
                </form>
            @elseif ($attendanceToday->punch_in_again && !$attendanceToday->punch_out_again)
                {{-- Punch Out Again --}}
                <form method="POST" action="{{ route('attendance.punchOutAgain') }}" class="flex gap-4"
                    id="punchOutAgainForm">
                    @csrf
                    <button type="submit" class="btn-punch-out w-48 flex-none" id="btnPunchOutAgain">Punch Out
                        Again</button>
                    <div>
                        <label for="punch_out_again_remarks" class="block text-sm font-medium">Remarks
                            (optional):</label>
                        <input type="text" name="punch_out_again_remarks" id="punch_out_again_remarks"
                            class="form-control w-64 mt-1" placeholder="Finished extra work.">
                    </div>
                </form>
            @else
                {{-- Punch In Again --}}
                <form method="POST" action="{{ route('attendance.punchInAgain') }}" class="flex gap-4"
                    id="punchInAgainForm">
                    @csrf
                    <button type="submit" class="btn-punch-in w-48 flex-none" id="btnPunchInAgain">Punch In
                        Again</button>
                    <div>
                        <label for="punch_in_again_remarks" class="block text-sm font-medium">Remarks
                            (optional):</label>
                        <input type="text" name="punch_in_again_remarks" id="punch_in_again_remarks"
                            class="form-control w-64 mt-1" placeholder="Some extra work.">
                    </div>
                </form>
            @endif


        </div>
        <!-- Break Management -->
        @if ($attendanceToday && !$attendanceToday->punch_out)
            <div class="card">
                <h2 class="header-gradient">Manage Breaks</h2>

                @if (!$activeBreak)
                    <form method="POST" action="{{ route('attendance.startBreak') }}">
                        @csrf
                        <div class="break-buttons">
                            <button type="submit" name="break_type" value="Morning Tea"
                                class="btn-morning-tea {{ in_array('Morning Tea', $completedBreaks) ? 'btn' : '' }}"
                                {{ in_array('Morning Tea', $completedBreaks) ? 'disabled' : '' }}>
                                Start Morning Tea Break
                            </button>
                            <button type="submit" name="break_type" value="Lunch"
                                class="btn-lunch {{ in_array('Lunch', $completedBreaks) ? 'btn' : '' }}"
                                {{ in_array('Lunch', $completedBreaks) ? 'disabled' : '' }}>
                                Start Lunch Break
                            </button>
                            <button type="submit" name="break_type" value="Evening Tea"
                                class="btn-evening-tea {{ in_array('Evening Tea', $completedBreaks) ? 'btn' : '' }}"
                                {{ in_array('Evening Tea', $completedBreaks) ? 'disabled' : '' }}>
                                Start Evening Tea Break
                            </button>
                            <button type="submit" name="break_type" value="Custom"
                                class="btn-custom {{ in_array('Custom', $completedBreaks) ? 'btn' : '' }}"
                                {{ in_array('Custom', $completedBreaks) ? 'disabled' : '' }}>
                                Start Custom Break
                            </button>
                        </div>
                    </form>
                @else
                    <div class="active-break">
                        <div>On {{ $activeBreak->break_type }} break since
                            {{ \Carbon\Carbon::parse($activeBreak->break_start)->format('h:i A') }}
                        </div>
                        <form method="POST" action="{{ route('attendance.endBreak') }}" style="margin-top: 1rem;">
                            @csrf
                            <button type="submit" class="btn-end-break">End Break</button>
                        </form>
                    </div>
                @endif

                <div class="break-timer">
                    <div>Break Timer:</div>
                    <div id="breakTimer">00:00:00</div>
                </div>
            </div>
        @endif
    </div>

    <!-- Clock JavaScript -->
    <script>
        function updateClocks() {
            const now = new Date();
            const digitalTime = document.getElementById('digitalTime');
            const digitalDate = document.getElementById('digitalDate');
            const timeString = now.toLocaleTimeString('en-US', {
                hour12: false,
                hour: '2-digit',
                minute: '2-digit',
                second: '2-digit'
            });
            const dateString = now.toLocaleDateString('en-US', {
                weekday: 'long',
                year: 'numeric',
                month: 'long',
                day: 'numeric'
            });
            if (digitalTime) digitalTime.textContent = timeString;
            if (digitalDate) digitalDate.textContent = dateString;
            // Analog Clock
            const hourHand = document.getElementById('hourHand');
            const minuteHand = document.getElementById('minuteHand');
            const secondHand = document.getElementById('secondHand');

            const hours = now.getHours() % 12;
            const minutes = now.getMinutes();
            const seconds = now.getSeconds();

            const hourDegree = (hours * 30) + (minutes * 0.5);
            const minuteDegree = minutes * 6;
            const secondDegree = seconds * 6;

            if (hourHand) hourHand.style.transform = `rotate(${hourDegree}deg)`;
            if (minuteHand) minuteHand.style.transform = `rotate(${minuteDegree}deg)`;
            if (secondHand) secondHand.style.transform = `rotate(${secondDegree}deg)`;
        }
        // Update clocks immediately and then every second
        updateClocks();
        setInterval(updateClocks, 1000);
    </script>
    @if ($attendanceToday && $attendanceToday->punch_in && !$attendanceToday->punch_out)
        @php
            $completedBreakSeconds = $attendanceToday->breaks
                ->whereNotNull('break_end')
                ->sum(
                    fn($b) => \Carbon\Carbon::parse($b->break_end)->diffInSeconds(
                        \Carbon\Carbon::parse($b->break_start),
                    ),
                );
            $activeBreakStart = $activeBreak
                ? \Carbon\Carbon::parse($activeBreak->break_start)->format('Y-m-d H:i:s')
                : null;
        @endphp
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const punchIn = new Date("{{ $attendanceToday->punch_in }}");
                const punchOut =
                    {{ $attendanceToday->punch_out ? "new Date('{$attendanceToday->punch_out}')" : 'null' }};
                const activeBreakStart = {{ $activeBreakStart ? "new Date('{$activeBreakStart}')" : 'null' }};
                const workTimeEl = document.getElementById("workTime");
                function updateWorkTimer() {
                    const now = new Date();
                    let activeBreakSeconds = 0;
                    if (activeBreakStart) {
                        activeBreakSeconds = Math.floor((now - activeBreakStart) / 1000);
                    }
                    let diffSeconds = ((punchOut ?? now) - punchIn) / 1000 - activeBreakSeconds;
                    diffSeconds = Math.max(diffSeconds, 0);
                    const hrs = String(Math.floor(diffSeconds / 3600)).padStart(2, '0');
                    const mins = String(Math.floor((diffSeconds % 3600) / 60)).padStart(2, '0');
                    const secs = String(Math.floor(diffSeconds % 60)).padStart(2, '0');
                    if (workTimeEl) {
                        workTimeEl.textContent = `${hrs}:${mins}:${secs}`;
                    }
                }
                if (!punchOut) {
                    setInterval(updateWorkTimer, 1000);
                }
                updateWorkTimer();
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
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const punchInAgainStr = {!! json_encode(
                $attendanceToday?->punch_in_again
                    ? \Carbon\Carbon::parse($attendanceToday->punch_in_again)->toIso8601String()
                    : null,
            ) !!};
            const punchOutAgainStr = {!! json_encode(
                $attendanceToday?->punch_out_again
                    ? \Carbon\Carbon::parse($attendanceToday->punch_out_again)->toIso8601String()
                    : null,
            ) !!};
            const punchInDate = punchInAgainStr ? new Date(punchInAgainStr) : null;
            const punchOutDate = punchOutAgainStr ? new Date(punchOutAgainStr) : null;
            const extraWorkTimeEl = document.getElementById("extraWorkTime");
            function updateExtraWorkTimer() {
                const now = new Date();
                const effectiveEnd = punchOutDate ?? now;
                if (!punchInDate) return;
                let diffSeconds = (effectiveEnd - punchInDate) / 1000;
                diffSeconds = Math.max(diffSeconds, 0);
                const hrs = String(Math.floor(diffSeconds / 3600)).padStart(2, '0');
                const mins = String(Math.floor((diffSeconds % 3600) / 60)).padStart(2, '0');
                const secs = String(Math.floor(diffSeconds % 60)).padStart(2, '0');
                if (extraWorkTimeEl) {
                    extraWorkTimeEl.textContent = `${hrs}:${mins}:${secs}`;
                }
            }
            if (punchInDate && !punchOutDate) {
                updateExtraWorkTimer(); 
                setInterval(updateExtraWorkTimer, 1000); 
            } else if (punchInDate && punchOutDate) {
                updateExtraWorkTimer(); 
            }
        });
    </script>
</x-app-layout>
