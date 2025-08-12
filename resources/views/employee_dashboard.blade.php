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
        .main-dashboard-container {
            padding-top: 1.5rem;
            margin-top: 0.5rem;
            background: #ffffff;
            min-height: 100vh;
        }

        .analog-clock {
            width: 80px;
            height: 80px;
            border: 3px solid rgba(30, 58, 95, 0.3);
            border-radius: 50%;
            position: relative;
            background: #ffffff;
            backdrop-filter: blur(10px);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .clock-center {
            position: absolute;
            top: 50%;
            left: 50%;
            width: 6px;
            height: 6px;
            background: #1e3a5f;
            border-radius: 50%;
            transform: translate(-50%, -50%);
            z-index: 10;
        }

        .clock-hand {
            position: absolute;
            background: #1e3a5f;
            transform-origin: bottom center;
            border-radius: 2px;
        }

        .hour-hand {
            width: 2px;
            height: 20px;
            top: 25%;
            left: 50%;
            margin-left: -1px;
            transition: transform 0.5s ease-in-out;
        }

        .minute-hand {
            width: 1.5px;
            height: 25px;
            top: 20%;
            left: 50%;
            margin-left: -0.75px;
            transition: transform 0.5s ease-in-out;
        }

        .second-hand {
            width: 1px;
            height: 30px;
            top: 17.5%;
            left: 50%;
            margin-left: -0.5px;
            background: #ef4444;
            transition: transform 0.1s ease-in-out;
        }

        .clock-number {
            position: absolute;
            color: #1e3a5f;
            font-size: 10px;
            font-weight: bold;
            transform: translate(-50%, -50%);
        }

        .corporate-card {
            background: #ffffff;
            border: 1px solid rgba(30, 58, 95, 0.15);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
        }

        .break-morning {
            background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
            border: none;
            box-shadow: 0 3px 10px rgba(245, 158, 11, 0.3);
        }

        .break-morning:hover {
            background: linear-gradient(135deg, #d97706 0%, #b45309 100%);
            transform: translateY(-1px);
            box-shadow: 0 5px 15px rgba(245, 158, 11, 0.4);
        }

        .break-lunch {
            background: linear-gradient(135deg, #8b5cf6 0%, #7c3aed 100%);
            border: none;
            box-shadow: 0 3px 10px rgba(139, 92, 246, 0.3);
        }

        .break-lunch:hover {
            background: linear-gradient(135deg, #7c3aed 0%, #6d28d9 100%);
            transform: translateY(-1px);
            box-shadow: 0 5px 15px rgba(139, 92, 246, 0.4);
        }

        .break-evening {
            background: linear-gradient(135deg, #06b6d4 0%, #0891b2 100%);
            border: none;
            box-shadow: 0 3px 10px rgba(6, 182, 212, 0.3);
        }

        .break-evening:hover {
            background: linear-gradient(135deg, #0891b2 0%, #0e7490 100%);
            transform: translateY(-1px);
            box-shadow: 0 5px 15px rgba(6, 182, 212, 0.4);
        }

        .break-custom {
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            border: none;
            box-shadow: 0 3px 10px rgba(16, 185, 129, 0.3);
        }

        .break-custom:hover {
            background: linear-gradient(135deg, #059669 0%, #047857 100%);
            transform: translateY(-1px);
            box-shadow: 0 5px 15px rgba(16, 185, 129, 0.4);
        }

        .punch-button {
            transition: all 0.3s ease;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.15);
        }

        .punch-button:hover {
            transform: translateY(-1px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .animate-fade-in {
            animation: fadeIn 0.6s ease-out;
        }

        .animate-delay-100 {
            animation-delay: 0.1s;
        }

        .animate-delay-200 {
            animation-delay: 0.2s;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(15px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @media (max-width: 640px) {
            .main-dashboard-container {
                padding-top: 1rem;
                margin-top: 0.25rem;
            }

            .analog-clock {
                width: 60px;
                height: 60px;
            }

            .hour-hand {
                height: 15px;
                top: 30%;
            }

            .minute-hand {
                height: 18px;
                top: 25%;
            }

            .second-hand {
                height: 22px;
                top: 22%;
            }

            .clock-number {
                font-size: 8px;
            }
        }
    </style>

    <div class="theme-app main-dashboard-container py-3 sm:py-4 lg:py-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 gap-3 sm:gap-4">

            <div class="bg-secondary-gradient text-primary p-3 sm:p-4 lg:p-5 rounded-lg shadow-lg animate-fade-in">
                <div class="text-center mb-3 sm:mb-4">
                    <h1 class="text-lg sm:text-xl lg:text-2xl font-bold mb-1 text-primary">Welcome,
                        {{ Auth::user()->name }}!</h1>
                    <p class="text-sm sm:text-base text-secondary">Track your work hours professionally</p>
                </div>

                <div class="flex flex-row items-center justify-center gap-4 sm:gap-6">
                    <div class="text-center">
                        <div class="analog-clock mx-auto" id="analog-clock">
                            <div class="clock-number" style="top: 6px; left: 50%;">12</div>
                            <div class="clock-number" style="top: 50%; right: 6px;">3</div>
                            <div class="clock-number" style="bottom: 6px; left: 50%;">6</div>
                            <div class="clock-number" style="top: 50%; left: 6px;">9</div>

                            <div class="clock-hand hour-hand" id="hour-hand"></div>
                            <div class="clock-hand minute-hand" id="minute-hand"></div>
                            <div class="clock-hand second-hand" id="second-hand"></div>
                            <div class="clock-center"></div>
                        </div>
                        <p class="text-xs text-secondary mt-1">Analog</p>
                    </div>

                    <div class="text-center">
                        <div id="digital-time" class="text-xl sm:text-2xl lg:text-3xl font-bold mb-1 text-primary">
                            00:00:00</div>
                        <div id="digital-date" class="text-xs sm:text-sm text-secondary">Loading...</div>
                        <div id="digital-ampm" class="text-xs text-secondary">AM</div>
                        <p class="text-xs text-secondary mt-1">Digital</p>
                    </div>

                    <div class="text-center">
                        <div
                            class="bg-white bg-opacity-20 rounded-md p-2 sm:p-3 backdrop-filter backdrop-blur-sm border border-primary">
                            <div class="text-xs text-secondary mb-1">Time Zone</div>
                            <div id="timezone" class="font-semibold text-xs sm:text-sm text-primary">Loading...</div>
                            <div id="utc-offset" class="text-xs text-secondary mt-1">UTC+0</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="corporate-card rounded-lg shadow-lg p-3 sm:p-4 animate-fade-in animate-delay-100">
                <div class="theme-app bg-primary-light p-2 sm:p-3 rounded-t-lg mb-3">
                    <h2 class="text-base sm:text-lg font-semibold text-primary flex items-center gap-2">
                        <span class="text-lg">⏰</span> Work Status
                    </h2>
                </div>

                @if (session('success'))
                    <div
                        class="p-3 mb-3 text-sm text-green-800 rounded-lg bg-green-50 border border-green-200 flex items-center gap-2">
                        <svg width="16" height="16" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                clip-rule="evenodd" />
                        </svg>
                        Success! {{ session('success') }}
                    </div>
                @endif
                @if (session('error'))
                    <div
                        class="p-3 mb-3 text-sm text-red-800 rounded-lg bg-red-50 border border-red-200 flex items-center gap-2">
                        <svg width="16" height="16" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                clip-rule="evenodd" />
                        </svg>
                        Error! {{ session('error') }}
                    </div>
                @endif

                <div class="theme-app bg-secondary-gradient text-primary p-4 rounded-lg mb-4 text-center">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <div class="text-sm font-medium text-secondary mb-1">Total Working Time</div>
                            <div id="workTime" class="text-2xl sm:text-3xl font-bold text-primary">
                                @if ($attendanceToday && $attendanceToday->punch_out)
                                    {{ $attendanceToday->total_working_hours ?? '00:00:00' }}
                                @elseif ($attendanceToday && $attendanceToday->punch_in && !$attendanceToday->punch_out)
                                    00:00:00
                                @else
                                    00:00:00
                                @endif
                            </div>
                        </div>
                        <div>
                            <div class="text-sm font-medium text-secondary mb-1">Extra Working Time</div>
                            @if ($attendanceToday && $attendanceToday->punch_out_again)
                                <div class="text-2xl sm:text-3xl font-bold text-primary">
                                    {{ $attendanceToday->overtime_working_hours ?? '00:00:00' }}</div>
                            @else
                                <div id="extraWorkTime" class="text-2xl sm:text-3xl font-bold text-primary">00:00:00
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                @if (!$attendanceToday)
                    
                        <button type="submit" id="punchInBtn"
                            class="punch-button px-5 py-2 bg-green-600 hover:bg-green-700 text-white font-semibold rounded-lg flex-shrink-0">
                            🚀 Punch In
                        </button>
                        <form method="POST" id="punchInForm" action="{{ route('attendance.punchIn') }}"
                        class="flex flex-col sm:flex-row gap-3 items-end">
                        @csrf
                        <div class="flex-1">
                            <label for="punch_in_remarks" class="block text-sm font-medium text-gray-700 mb-1">Remarks
                                (optional)</label>
                            <input type="text" name="punch_in_remarks" id="punch_in_remarks"
                                class="w-80 px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-sm"
                                placeholder="Late due to traffic...">
                            <label for="geo">Select loc:*</label>
                            <input type="hidden" name="latitude" id="latitude">
                            <input type="hidden" name="longitude" id="longitude">
                            <select name="location_type" id="location_type" required>
                                <option value="">Select Location</option>
                                <option value="Home">Home</option>
                                <option value="Company">Company</option>
                            </select>
                        </div>
                    </form>
                @elseif (!$attendanceToday->punch_out)
                    <form method="POST" action="{{ route('attendance.punchOut') }}"
                        class="flex flex-col sm:flex-row gap-3 items-end">
                        @csrf
                        <button type="submit"
                            class="punch-button px-5 py-2 bg-red-600 hover:bg-red-700 text-white font-semibold rounded-lg flex-shrink-0">
                            🏁 Punch Out
                        </button>
                        <div class="flex-1">
                            <label for="punch_out_remarks"
                                class="block text-sm font-medium text-gray-700 mb-1">Remarks
                                (optional)</label>
                            <input type="text" name="punch_out_remarks" id="punch_out_remarks"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-sm"
                                placeholder="Leaving early for appointment...">
                        </div>
                    </form>
                @elseif ($attendanceToday->punch_in_again && !$attendanceToday->punch_out_again)
                    <form method="POST" action="{{ route('attendance.punchOutAgain') }}"
                        class="flex flex-col sm:flex-row gap-3 items-end" id="punchOutAgainForm">
                        @csrf
                        <button type="submit"
                            class="punch-button px-5 py-2 bg-red-600 hover:bg-red-700 text-white font-semibold rounded-lg flex-shrink-0"
                            id="btnPunchOutAgain">
                            🏁 Punch Out Again
                        </button>
                        <div class="flex-1">
                            <label for="punch_out_again_remarks"
                                class="block text-sm font-medium text-gray-700 mb-1">Remarks (optional)</label>
                            <input type="text" name="punch_out_again_remarks" id="punch_out_again_remarks"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-sm"
                                placeholder="Finished extra work...">
                        </div>
                    </form>
                @else
                    <form method="POST" action="{{ route('attendance.punchInAgain') }}"
                        class="flex flex-col sm:flex-row gap-3 items-end" id="punchInAgainForm">
                        @csrf
                        <button type="submit"
                            class="punch-button px-5 py-2 bg-green-600 hover:bg-green-700 text-white font-semibold rounded-lg flex-shrink-0"
                            id="btnPunchInAgain">
                            🚀 Punch In Again
                        </button>
                        <div class="flex-1">
                            <label for="punch_in_again_remarks"
                                class="block text-sm font-medium text-gray-700 mb-1">Remarks (optional)</label>
                            <input type="text" name="punch_in_again_remarks" id="punch_in_again_remarks"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-sm"
                                placeholder="Some extra work...">
                        </div>
                    </form>
                @endif
            </div>

            @if ($attendanceToday && !$attendanceToday->punch_out)
                <div class="corporate-card rounded-lg shadow-lg p-3 sm:p-4 animate-fade-in animate-delay-200">
                    <div class="theme-app bg-primary-light p-2 sm:p-3 rounded-t-lg mb-3">
                        <h2 class="text-base sm:text-lg font-semibold text-primary flex items-center gap-2">
                            <span class="text-lg">☕</span> Manage Breaks
                        </h2>
                    </div>

                    @if (!$activeBreak)
                        <form method="POST" action="{{ route('attendance.startBreak') }}">
                            @csrf
                            <div class="grid grid-cols-2 lg:grid-cols-4 gap-2 sm:gap-3 mb-4">
                                <button type="submit" name="break_type" value="Morning Tea"
                                    class="break-morning px-3 py-2 text-white font-medium rounded-lg transition-all duration-300 text-sm {{ in_array('Morning Tea', $completedBreaks) ? 'opacity-50 cursor-not-allowed' : '' }}"
                                    {{ in_array('Morning Tea', $completedBreaks) ? 'disabled' : '' }}>
                                    🌅 Morning Tea
                                </button>
                                <button type="submit" name="break_type" value="Lunch"
                                    class="break-lunch px-3 py-2 text-white font-medium rounded-lg transition-all duration-300 text-sm {{ in_array('Lunch', $completedBreaks) ? 'opacity-50 cursor-not-allowed' : '' }}"
                                    {{ in_array('Lunch', $completedBreaks) ? 'disabled' : '' }}>
                                    🍽️ Lunch Break
                                </button>
                                <button type="submit" name="break_type" value="Evening Tea"
                                    class="break-evening px-3 py-2 text-white font-medium rounded-lg transition-all duration-300 text-sm {{ in_array('Evening Tea', $completedBreaks) ? 'opacity-50 cursor-not-allowed' : '' }}"
                                    {{ in_array('Evening Tea', $completedBreaks) ? 'disabled' : '' }}>
                                    🌆 Evening Tea
                                </button>
                                <button type="submit" name="break_type" value="Custom"
                                    class="break-custom px-3 py-2 text-white font-medium rounded-lg transition-all duration-300 text-sm {{ in_array('Custom', $completedBreaks) ? 'opacity-50 cursor-not-allowed' : '' }}"
                                    {{ in_array('Custom', $completedBreaks) ? 'disabled' : '' }}>
                                    ⚡ Custom Break
                                </button>
                            </div>
                        </form>
                    @else
                        <div class="theme-app bg-secondary-gradient text-primary p-4 rounded-lg text-center mb-4">
                            <div class="text-lg font-bold mb-3 text-primary">
                                🔄 On {{ $activeBreak->break_type }} break since
                                {{ \Carbon\Carbon::parse($activeBreak->break_start)->format('h:i A') }}
                            </div>
                            <form method="POST" action="{{ route('attendance.endBreak') }}">
                                @csrf
                                <button type="submit"
                                    class="punch-button px-5 py-2 bg-red-600 hover:bg-red-700 text-white font-semibold rounded-lg">
                                    ⏹️ End Break
                                </button>
                            </form>
                        </div>
                    @endif

                    <div class="bg-gray-50 p-4 rounded-lg border text-center">
                        <div class="text-sm font-semibold text-gray-700 mb-1">Break Timer</div>
                        <div id="breakTimer" class="text-xl font-bold text-blue-600">00:00:00</div>
                    </div>
                </div>
            @endif
        </div>
    </div>

    <script>
        function updateClocks() {
            const now = new Date();

            let hours = now.getHours();
            let minutes = now.getMinutes();
            let seconds = now.getSeconds();
            const ampm = hours >= 12 ? 'PM' : 'AM';

            const displayHours = hours % 12 || 12;

            const formattedTime =
                displayHours.toString().padStart(2, '0') + ':' +
                minutes.toString().padStart(2, '0') + ':' +
                seconds.toString().padStart(2, '0');

            document.getElementById('digital-time').textContent = formattedTime;
            document.getElementById('digital-ampm').textContent = ampm;

            const options = {
                weekday: 'long',
                year: 'numeric',
                month: 'long',
                day: 'numeric'
            };
            document.getElementById('digital-date').textContent = now.toLocaleDateString('en-US', options);

            const timezone = Intl.DateTimeFormat().resolvedOptions().timeZone;
            document.getElementById('timezone').textContent = timezone;

            const offset = -now.getTimezoneOffset() / 60;
            const offsetString = `UTC${offset >= 0 ? '+' : ''}${offset}`;
            document.getElementById('utc-offset').textContent = offsetString;

            const hourAngle = (hours % 12) * 30 + minutes * 0.5;
            const minuteAngle = minutes * 6;
            const secondAngle = seconds * 6;

            document.getElementById('hour-hand').style.transform = `rotate(${hourAngle}deg)`;
            document.getElementById('minute-hand').style.transform = `rotate(${minuteAngle}deg)`;
            document.getElementById('second-hand').style.transform = `rotate(${secondAngle}deg)`;
        }

        document.addEventListener('DOMContentLoaded', function() {
            updateClocks();
            setInterval(updateClocks, 1000);
        });
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
    <script>
        document.getElementById('punchInBtn').addEventListener('click', function(e) {
            const locationType = document.getElementById('location_type').value;

            if (!locationType) {
                alert("Please select your location (Home or Company).");
                return;
            }

            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    document.getElementById('latitude').value = position.coords.latitude;
                    document.getElementById('longitude').value = position.coords.longitude;
                    document.getElementById('punchInForm').submit();
                }, function(error) {
                    alert("Unable to get your location. Please enable GPS.");
                });
            } else {
                alert("Geolocation is not supported by this browser.");
            }
        });
    </script>
</x-app-layout>
