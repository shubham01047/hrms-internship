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
        /* Only essential spacing and layout styles - using your existing theme */
        .main-dashboard-container {
            padding-top: 2rem;
            margin-top: 1rem;
        }

        /* Clock specific styles that aren't in your theme */
        .analog-clock {
            width: 120px;
            height: 120px;
            border: 4px solid rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            position: relative;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
        }

        .clock-center {
            position: absolute;
            top: 50%;
            left: 50%;
            width: 8px;
            height: 8px;
            background: white;
            border-radius: 50%;
            transform: translate(-50%, -50%);
            z-index: 10;
        }

        .clock-hand {
            position: absolute;
            background: white;
            transform-origin: bottom center;
            border-radius: 2px;
        }

        .hour-hand {
            width: 3px;
            height: 30px;
            top: 20%;
            left: 50%;
            margin-left: -1.5px;
            transition: transform 0.5s ease-in-out;
        }

        .minute-hand {
            width: 2px;
            height: 40px;
            top: 15%;
            left: 50%;
            margin-left: -1px;
            transition: transform 0.5s ease-in-out;
        }

        .second-hand {
            width: 1px;
            height: 45px;
            top: 12.5%;
            left: 50%;
            margin-left: -0.5px;
            background: #ef4444;
            transition: transform 0.1s ease-in-out;
        }

        .clock-number {
            position: absolute;
            color: white;
            font-size: 12px;
            font-weight: bold;
            transform: translate(-50%, -50%);
        }

        /* Responsive spacing */
        @media (max-width: 640px) {
            .main-dashboard-container {
                padding-top: 1.5rem;
                margin-top: 0.5rem;
            }
            
            .analog-clock {
                width: 80px;
                height: 80px;
            }
            
            .hour-hand { height: 20px; top: 25%; }
            .minute-hand { height: 25px; top: 20%; }
            .second-hand { height: 30px; top: 17.5%; }
            .clock-number { font-size: 10px; }
        }

        @media (min-width: 1024px) {
            .main-dashboard-container {
                padding-top: 3rem;
                margin-top: 1.5rem;
            }
        }
    </style>

    <!-- Main Dashboard Container with proper spacing -->
    <div class="main-dashboard-container py-4 sm:py-6 lg:py-8 bg-gray-100 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 gap-4 sm:gap-6">

            <!-- Welcome Header with Clocks -->
            <div class="bg-secondary-gradient text-primary p-4 sm:p-6 lg:p-8 rounded-xl shadow-lg animate-fade-in relative overflow-hidden">
                <!-- Background Pattern -->
                <div class="absolute inset-0 opacity-10">
                    <div class="absolute top-0 left-0 w-32 h-32 bg-white rounded-full -translate-x-16 -translate-y-16"></div>
                    <div class="absolute bottom-0 right-0 w-24 h-24 bg-white rounded-full translate-x-12 translate-y-12"></div>
                </div>
                
                <div class="relative z-10">
                    <!-- Welcome Message -->
                    <div class="text-center mb-6 sm:mb-8">
                        <h1 class="text-2xl sm:text-3xl lg:text-4xl font-bold mb-2 welcome-text">Welcome, {{ Auth::user()->name }}!</h1>
                        <p class="text-base sm:text-lg lg:text-xl opacity-90">Track your work hours and manage your day</p>
                    </div>

                    <!-- Clocks Section -->
                    <div class="flex flex-col sm:flex-row lg:flex-row items-center justify-center gap-4 sm:gap-6 lg:gap-8">
                        <!-- Analog Clock -->
                        <div class="clock-container">
                            <div class="analog-clock" id="analog-clock">
                                <!-- Clock Numbers -->
                                <div class="clock-number" style="top: 8px; left: 50%;">12</div>
                                <div class="clock-number" style="top: 50%; right: 8px;">3</div>
                                <div class="clock-number" style="bottom: 8px; left: 50%;">6</div>
                                <div class="clock-number" style="top: 50%; left: 8px;">9</div>
                                
                                <!-- Clock Hands -->
                                <div class="clock-hand hour-hand" id="hour-hand"></div>
                                <div class="clock-hand minute-hand" id="minute-hand"></div>
                                <div class="clock-hand second-hand" id="second-hand"></div>
                                <div class="clock-center"></div>
                            </div>
                            <p class="text-center mt-2 text-sm opacity-75">Analog</p>
                        </div>

                        <!-- Digital Clock -->
                        <div class="text-center">
                            <div class="digital-clock">
                                <div id="digital-time" class="text-3xl sm:text-4xl lg:text-5xl font-bold mb-2">00:00:00</div>
                                <div id="digital-date" class="text-sm sm:text-base lg:text-lg opacity-90">Loading...</div>
                                <div id="digital-ampm" class="text-xs sm:text-sm opacity-75 mt-1">AM</div>
                            </div>
                            <p class="text-center mt-2 text-sm opacity-75">Digital</p>
                        </div>

                        <!-- Time Zone Info -->
                        <div class="text-center">
                            <div class="bg-white bg-opacity-20 rounded-lg p-3 sm:p-4 backdrop-filter backdrop-blur-sm">
                                <div class="text-xs sm:text-sm opacity-75 mb-1">Current Time Zone</div>
                                <div id="timezone" class="font-semibold text-sm sm:text-base">Loading...</div>
                                <div class="text-xs opacity-60 mt-2">
                                    <div id="utc-offset">UTC+0</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Work Status Section -->
            <div class="bg-gradient-to-br from-white to-blue-50 rounded-xl shadow p-4 sm:p-6 border-primary border animate-fade-in animate-delay-100">
                <div class="bg-primary p-3 sm:p-4 rounded-t-xl mb-4">
                    <h2 class="text-lg sm:text-xl font-semibold text-primary">⏰ Work Status</h2>
                </div>
                
                @if (session('success'))
                    <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 border border-green-200 flex items-center gap-3">
                        <svg width="20" height="20" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        Success! {{ session('success') }}
                    </div>
                @endif
                @if (session('error'))
                    <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 border border-red-200 flex items-center gap-3">
                        <svg width="20" height="20" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                        </svg>
                        Error! {{ session('error') }}
                    </div>
                @endif

                <!-- Work Time Display -->
                <div class="bg-secondary-gradient text-primary p-6 rounded-xl mb-6 text-center">
                    <div class="text-lg font-semibold mb-2 opacity-90">Total Working Time</div>
                    <div id="workTime" class="text-4xl sm:text-5xl font-bold mb-4">
                        @if ($attendanceToday && $attendanceToday->punch_out)
                            {{ $attendanceToday->total_working_hours ?? '00:00:00' }}
                        @elseif ($attendanceToday && $attendanceToday->punch_in && !$attendanceToday->punch_out)
                            00:00:00 {{-- This will be updated live by JavaScript --}}
                        @else
                            00:00:00
                        @endif
                    </div>
                    <div class="text-lg font-semibold mb-2 opacity-90">Total Extra Working Time</div>
                    @if ($attendanceToday && $attendanceToday->punch_out_again)
                        <div class="text-2xl font-bold">{{ $attendanceToday->overtime_working_hours ?? '00:00:00' }}</div>
                    @else
                        <div id="extraWorkTime" class="text-2xl font-bold">00:00:00</div>
                    @endif
                </div>

                <!-- Punch Actions -->
                @if (!$attendanceToday)
                    {{-- First Punch In --}}
                    <form method="POST" action="{{ route('attendance.punchIn') }}" class="flex flex-col sm:flex-row gap-4 items-end">
                        @csrf
                        <button type="submit" class="px-6 py-3 bg-green-600 hover:bg-green-700 text-white font-semibold rounded-full shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-1 flex-shrink-0">
                            🚀 Punch In
                        </button>
                        <div class="flex-1">
                            <label for="punch_in_remarks" class="block text-sm font-medium text-gray-700 mb-1">Remarks (optional)</label>
                            <input type="text" name="punch_in_remarks" id="punch_in_remarks" 
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                placeholder="Late due to traffic...">
                        </div>
                    </form>
                @elseif (!$attendanceToday->punch_out)
                    {{-- First Punch Out --}}
                    <form method="POST" action="{{ route('attendance.punchOut') }}" class="flex flex-col sm:flex-row gap-4 items-end">
                        @csrf
                        <button type="submit" class="px-6 py-3 bg-red-600 hover:bg-red-700 text-white font-semibold rounded-full shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-1 flex-shrink-0">
                            🏁 Punch Out
                        </button>
                        <div class="flex-1">
                            <label for="punch_out_remarks" class="block text-sm font-medium text-gray-700 mb-1">Remarks (optional)</label>
                            <input type="text" name="punch_out_remarks" id="punch_out_remarks" 
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                placeholder="Leaving early for appointment...">
                        </div>
                    </form>
                @elseif ($attendanceToday->punch_in_again && !$attendanceToday->punch_out_again)
                    {{-- Punch Out Again --}}
                    <form method="POST" action="{{ route('attendance.punchOutAgain') }}" class="flex flex-col sm:flex-row gap-4 items-end" id="punchOutAgainForm">
                        @csrf
                        <button type="submit" class="px-6 py-3 bg-red-600 hover:bg-red-700 text-white font-semibold rounded-full shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-1 flex-shrink-0" id="btnPunchOutAgain">
                            🏁 Punch Out Again
                        </button>
                        <div class="flex-1">
                            <label for="punch_out_again_remarks" class="block text-sm font-medium text-gray-700 mb-1">Remarks (optional)</label>
                            <input type="text" name="punch_out_again_remarks" id="punch_out_again_remarks"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" 
                                placeholder="Finished extra work...">
                        </div>
                    </form>
                @else
                    {{-- Punch In Again --}}
                    <form method="POST" action="{{ route('attendance.punchInAgain') }}" class="flex flex-col sm:flex-row gap-4 items-end" id="punchInAgainForm">
                        @csrf
                        <button type="submit" class="px-6 py-3 bg-green-600 hover:bg-green-700 text-white font-semibold rounded-full shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-1 flex-shrink-0" id="btnPunchInAgain">
                            🚀 Punch In Again
                        </button>
                        <div class="flex-1">
                            <label for="punch_in_again_remarks" class="block text-sm font-medium text-gray-700 mb-1">Remarks (optional)</label>
                            <input type="text" name="punch_in_again_remarks" id="punch_in_again_remarks"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" 
                                placeholder="Some extra work...">
                        </div>
                    </form>
                @endif
            </div>

            <!-- Break Management -->
            @if ($attendanceToday && !$attendanceToday->punch_out)
                <div class="bg-gradient-to-br from-white to-blue-50 rounded-xl shadow p-4 sm:p-6 border-primary border animate-fade-in animate-delay-200">
                    <div class="bg-primary p-3 sm:p-4 rounded-t-xl mb-4">
                        <h2 class="text-lg sm:text-xl font-semibold text-primary">☕ Manage Breaks</h2>
                    </div>

                    @if (!$activeBreak)
                        <form method="POST" action="{{ route('attendance.startBreak') }}">
                            @csrf
                            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
                                <button type="submit" name="break_type" value="Morning Tea"
                                    class="px-6 py-3 bg-orange-500 hover:bg-orange-600 text-white font-semibold rounded-full shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-1 {{ in_array('Morning Tea', $completedBreaks) ? 'opacity-50 cursor-not-allowed' : '' }}"
                                    {{ in_array('Morning Tea', $completedBreaks) ? 'disabled' : '' }}>
                                    🌅 Morning Tea
                                </button>
                                <button type="submit" name="break_type" value="Lunch"
                                    class="px-6 py-3 bg-purple-600 hover:bg-purple-700 text-white font-semibold rounded-full shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-1 {{ in_array('Lunch', $completedBreaks) ? 'opacity-50 cursor-not-allowed' : '' }}"
                                    {{ in_array('Lunch', $completedBreaks) ? 'disabled' : '' }}>
                                    🍽️ Lunch Break
                                </button>
                                <button type="submit" name="break_type" value="Evening Tea"
                                    class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-full shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-1 {{ in_array('Evening Tea', $completedBreaks) ? 'opacity-50 cursor-not-allowed' : '' }}"
                                    {{ in_array('Evening Tea', $completedBreaks) ? 'disabled' : '' }}>
                                    🌆 Evening Tea
                                </button>
                                <button type="submit" name="break_type" value="Custom"
                                    class="px-6 py-3 bg-teal-600 hover:bg-teal-700 text-white font-semibold rounded-full shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-1 {{ in_array('Custom', $completedBreaks) ? 'opacity-50 cursor-not-allowed' : '' }}"
                                    {{ in_array('Custom', $completedBreaks) ? 'disabled' : '' }}>
                                    ⚡ Custom Break
                                </button>
                            </div>
                        </form>
                    @else
                        <div class="bg-secondary-gradient text-primary p-6 rounded-xl text-center mb-6">
                            <div class="text-xl font-bold mb-4">
                                🔄 On {{ $activeBreak->break_type }} break since
                                {{ \Carbon\Carbon::parse($activeBreak->break_start)->format('h:i A') }}
                            </div>
                            <form method="POST" action="{{ route('attendance.endBreak') }}">
                                @csrf
                                <button type="submit" class="px-6 py-3 bg-red-600 hover:bg-red-700 text-white font-semibold rounded-full shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                                    ⏹️ End Break
                                </button>
                            </form>
                        </div>
                    @endif

                    <div class="bg-white p-6 rounded-xl border border-gray-200 text-center">
                        <div class="text-lg font-semibold text-gray-700 mb-2">Break Timer</div>
                        <div id="breakTimer" class="text-3xl font-bold text-blue-600">00:00:00</div>
                    </div>
                </div>
            @endif
        </div>
    </div>

    <!-- Clock JavaScript -->
    <script>
        function updateClocks() {
            const now = new Date();
            
            // Digital Clock
            let hours = now.getHours();
            let minutes = now.getMinutes();
            let seconds = now.getSeconds();
            const ampm = hours >= 12 ? 'PM' : 'AM';

            // Convert to 12-hour format
            const displayHours = hours % 12 || 12;
            
            // Format with leading zeros
            const formattedTime = 
                displayHours.toString().padStart(2, '0') + ':' +
                minutes.toString().padStart(2, '0') + ':' +
                seconds.toString().padStart(2, '0');
            
            document.getElementById('digital-time').textContent = formattedTime;
            document.getElementById('digital-ampm').textContent = ampm;
            
            // Date
            const options = { 
                weekday: 'long', 
                year: 'numeric', 
                month: 'long', 
                day: 'numeric' 
            };
            document.getElementById('digital-date').textContent = now.toLocaleDateString('en-US', options);
            
            // Timezone
            const timezone = Intl.DateTimeFormat().resolvedOptions().timeZone;
            document.getElementById('timezone').textContent = timezone;
            
            const offset = -now.getTimezoneOffset() / 60;
            const offsetString = `UTC${offset >= 0 ? '+' : ''}${offset}`;
            document.getElementById('utc-offset').textContent = offsetString;

            // Analog Clock
            const hourAngle = (hours % 12) * 30 + minutes * 0.5;
            const minuteAngle = minutes * 6;
            const secondAngle = seconds * 6;

            document.getElementById('hour-hand').style.transform = `rotate(${hourAngle}deg)`;
            document.getElementById('minute-hand').style.transform = `rotate(${minuteAngle}deg)`;
            document.getElementById('second-hand').style.transform = `rotate(${secondAngle}deg)`;
        }

        // Initialize everything when the page loads
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
                const punchOut = {{ $attendanceToday->punch_out ? "new Date('{$attendanceToday->punch_out}')" : 'null' }};
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
                const breakStart = new Date("{{ \Carbon\Carbon::parse($activeBreak->break_start)->format('Y-m-d H:i:s') }}");
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