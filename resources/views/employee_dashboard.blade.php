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
    <link rel="stylesheet" href="{{ asset('css/cal-heatmap.css') }}">

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
                    <form method="POST" id="punchInForm" action="{{ route('attendance.punchIn') }}" class="space-y-4">
                        @csrf

                        <!-- Enhanced remarks and location selection GUI -->
                        <div class="bg-gray-50 p-4 rounded-lg border space-y-4">
                            <h3 class="text-sm font-semibold text-gray-700 flex items-center gap-2">
                                <span class="text-blue-500">📝</span> Punch In Details
                            </h3>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <!-- Remarks Section -->
                                <div class="space-y-2">
                                    <label for="punch_in_remarks"
                                        class="block text-sm font-medium text-gray-700 flex items-center gap-2">
                                        <span class="text-orange-500">💬</span> Remarks (Optional)
                                    </label>
                                    <textarea name="punch_in_remarks" id="punch_in_remarks" rows="3"
                                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-sm resize-none"
                                        placeholder="Enter any remarks (e.g., Late due to traffic, Working from home today...)"></textarea>
                                </div>

                                <!-- Location Selection -->
                                <div class="space-y-2">
                                    <label for="location_type"
                                        class="block text-sm font-medium text-gray-700 flex items-center gap-2">
                                        <span class="text-green-500">📍</span> Work Location <span
                                            class="text-red-500">*</span>
                                    </label>
                                    <select name="location_type" id="location_type" required
                                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-sm">
                                        <option value="">🏢 Select Your Location</option>
                                        <option value="Home">🏠 Home</option>
                                        <option value="Company">🏢 Company Office</option>
                                    </select>

                                    <!-- GPS Status Indicator -->
                                    <div class="flex items-center gap-2 text-xs text-gray-500">
                                        <span class="text-blue-500">🌐</span>
                                        <span id="gps-status">GPS location will be captured automatically</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="flex justify-center">
                            <button type="button" id="punchInBtn"
                                class="punch-button px-6 py-3 bg-green-600 hover:bg-green-700 text-white font-semibold rounded-lg flex items-center gap-2 transition-all duration-300">
                                <span class="text-lg">🚀</span> Punch In
                            </button>
                        </div>

                        <input type="hidden" name="latitude" id="latitude">
                        <input type="hidden" name="longitude" id="longitude">
                    </form>
                @elseif (!$attendanceToday->punch_out)
                    <form method="POST" action="{{ route('attendance.punchOut') }}" class="space-y-4">
                        @csrf

                        <!-- Enhanced punch out remarks GUI -->
                        <div class="bg-gray-50 p-4 rounded-lg border space-y-3">
                            <h3 class="text-sm font-semibold text-gray-700 flex items-center gap-2">
                                <span class="text-red-500">🏁</span> Punch Out Details
                            </h3>

                            <div class="space-y-2">
                                <label for="punch_out_remarks"
                                    class="block text-sm font-medium text-gray-700 flex items-center gap-2">
                                    <span class="text-orange-500">💬</span> Remarks (Optional)
                                </label>
                                <textarea name="punch_out_remarks" id="punch_out_remarks" rows="3"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-sm resize-none"
                                    placeholder="Enter any remarks (e.g., Leaving early for appointment, Completed all tasks...)"></textarea>
                            </div>
                        </div>

                        <div class="flex justify-center">
                            <button type="submit"
                                class="punch-button px-6 py-3 bg-red-600 hover:bg-red-700 text-white font-semibold rounded-lg flex items-center gap-2 transition-all duration-300">
                                <span class="text-lg">🏁</span> Punch Out
                            </button>
                        </div>
                    </form>
                @elseif ($attendanceToday->punch_in_again && !$attendanceToday->punch_out_again)
                    <form method="POST" action="{{ route('attendance.punchOutAgain') }}" class="space-y-4"
                        id="punchOutAgainForm">
                        @csrf

                        <!-- Enhanced punch out again remarks GUI -->
                        <div class="bg-gray-50 p-4 rounded-lg border space-y-3">
                            <h3 class="text-sm font-semibold text-gray-700 flex items-center gap-2">
                                <span class="text-red-500">🏁</span> End Extra Work Details
                            </h3>

                            <div class="space-y-2">
                                <label for="punch_out_again_remarks"
                                    class="block text-sm font-medium text-gray-700 flex items-center gap-2">
                                    <span class="text-orange-500">💬</span> Remarks (Optional)
                                </label>
                                <textarea name="punch_out_again_remarks" id="punch_out_again_remarks" rows="3"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-sm resize-none"
                                    placeholder="Enter any remarks (e.g., Finished extra work, Completed urgent task...)"></textarea>
                            </div>
                        </div>

                        <div class="flex justify-center">
                            <button type="submit"
                                class="punch-button px-6 py-3 bg-red-600 hover:bg-red-700 text-white font-semibold rounded-lg flex items-center gap-2 transition-all duration-300"
                                id="btnPunchOutAgain">
                                <span class="text-lg">🏁</span> Punch Out Again
                            </button>
                        </div>
                    </form>
                @else
                    <form method="POST" action="{{ route('attendance.punchInAgain') }}" class="space-y-4"
                        id="punchInAgainForm">
                        @csrf

                        <!-- Enhanced punch in again remarks GUI -->
                        <div class="bg-gray-50 p-4 rounded-lg border space-y-3">
                            <h3 class="text-sm font-semibold text-gray-700 flex items-center gap-2">
                                <span class="text-green-500">🚀</span> Extra Work Details
                            </h3>

                            <div class="space-y-2">
                                <label for="punch_in_again_remarks"
                                    class="block text-sm font-medium text-gray-700 flex items-center gap-2">
                                    <span class="text-orange-500">💬</span> Remarks (Optional)
                                </label>
                                <textarea name="punch_in_again_remarks" id="punch_in_again_remarks" rows="3"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-sm resize-none"
                                    placeholder="Enter any remarks (e.g., Some extra work, Urgent project completion...)"></textarea>
                            </div>
                        </div>

                        <div class="flex justify-center">
                            <button type="submit"
                                class="punch-button px-6 py-3 bg-green-600 hover:bg-green-700 text-white font-semibold rounded-lg flex items-center gap-2 transition-all duration-300"
                                id="btnPunchInAgain">
                                <span class="text-lg">🚀</span> Punch In Again
                            </button>
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

    <h1>Attendance Calander</h1>
    <div id="attendance-calendar" style="width:100%; height:200px; border: black solid 5px;"></div>

    <div class="grid grid-cols-2 gap-4">
        <!-- Attendance Chart -->
        <div class="p-4">
            <h3>Weekly Attendance Report (Mon → Sun)</h3>
            <div style="width:100%; max-width:500px; height:300px;">
                <canvas id="attendanceChart"></canvas>
            </div>
        </div>

        <!-- Holiday Chart -->
        <div class="p-4">
            <h3>Monthly Holidays Report (For this Month)</h3>
            <div style="width:100%; max-width:500px; height:300px;">
                <canvas id="holidayChart"></canvas>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-2 gap-4">
        <!-- Attendance Chart -->
        <div class="p-4">
            <h3>Weekly Leaves Report (Mon → Sun)</h3>
            <div style="width:100%; max-width:500px; height:300px;">
                <canvas id="leaveChart"></canvas>
            </div>
        </div>

        <!-- Holiday Chart -->
        <div class="p-4">
            <h3>Tasks Report (For this Month)</h3>
            <div style="width:100%; max-width:500px; height:300px;">
                <canvas id="taskChart"></canvas>
            </div>
        </div>
    </div>
    <h3>Projects Report (Next 6 Months)</h3>
    <div style="width:100%; max-width:89%; height:400px;">
        <canvas id="projectChart"></canvas>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
      document.addEventListener("DOMContentLoaded", function() {
    const dayGroups = [
        { label: "1-5", start: 1, end: 5 },
        { label: "6-10", start: 6, end: 10 },
        { label: "11-15", start: 11, end: 15 },
        { label: "16-20", start: 16, end: 20 },
        { label: "21-25", start: 21, end: 25 },
        { label: "26-31", start: 26, end: 31 }
    ];

    const priorityColors = {
        "Low": "#4db6ac",
        "Medium": "#f57c00",
        "High": "#e53935",
        "Urgent": "#8e24aa"
    };

    fetch("/tasks-month")
        .then(res => res.json())
        .then(tasksByDate => {
            // 🔥 Grouped datasets by priority
            const datasetsByPriority = {};

            for (const dateStr in tasksByDate) {
                const taskArray = tasksByDate[dateStr];
                const day = new Date(dateStr).getDate();

                // Find which group this day belongs to
                const groupIdx = dayGroups.findIndex(g => day >= g.start && day <= g.end);
                if (groupIdx === -1) continue;

                taskArray.forEach(task => {
                    // If priority dataset doesn’t exist, create it
                    if (!datasetsByPriority[task.priority]) {
                        datasetsByPriority[task.priority] = {
                            label: task.priority,
                            data: dayGroups.map(() => 0),
                            backgroundColor: priorityColors[task.priority] || "#999",
                            borderColor: "transparent",
                            borderWidth: 1,
                            // 🔥 keep tasks grouped by dayGroup index
                            tasksByGroup: dayGroups.map(() => [])
                        };
                    }

                    // Add task hours to the correct day group
                    datasetsByPriority[task.priority].data[groupIdx] += task.hours_assigned;

                    // Store task details for tooltip
                    datasetsByPriority[task.priority].tasksByGroup[groupIdx].push({
                        title: task.title,
                        status: task.status,
                        dueDate: dateStr
                    });
                });
            }

            const datasets = Object.values(datasetsByPriority); // Convert to array

            const ctx = document.getElementById("taskChart").getContext("2d");
            new Chart(ctx, {
                type: "bar",
                data: {
                    labels: dayGroups.map(g => g.label), // X-axis = day groups
                    datasets: datasets
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        tooltip: {
                            mode: 'nearest',
                            intersect: true,
                            callbacks: {
                                label: function(context) {
                                    const ds = context.dataset;
                                    const groupIdx = context.dataIndex;
                                    const tasks = ds.tasksByGroup[groupIdx] || [];

                                    // Show each task inside this bar
                                    return tasks.map(t => {
                                        const date = new Date(t.dueDate);
                                        const formattedDate =
                                            `${date.getDate()}-${date.toLocaleString('default',{month:'short'})}-${date.getFullYear()}`;
                                        return `${t.title} | Status: ${t.status} | Due: ${formattedDate}`;
                                    });
                                }
                            }
                        },
                        legend: {
                            display: true,
                            position: 'top',
                            labels: {
                                boxWidth: 25,
                                padding: 10,
                                font: {
                                    size: 12
                                }
                            }
                        }
                    },
                    scales: {
                        x: {
                            stacked: true
                        },
                        y: {
                            stacked: true,
                            beginAtZero: true,
                            max: 30,
                            ticks: {
                                stepSize: 3,
                                callback: v => `${v} hr`
                            },
                            title: {
                                display: true,
                                text: "Hours Assigned"
                            }
                        }
                    }
                }
            });

        })
        .catch(err => console.error("Tasks fetch error:", err));
});

    </script>


    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const now = new Date();
            const start = new Date(now.getFullYear(), now.getMonth(), 1);

            const monthKeys = [];
            const monthLabels = [];
            for (let i = 0; i < 6; i++) {
                const d = new Date(start.getFullYear(), start.getMonth() + i, 1);
                const key = d.toLocaleDateString('en-CA').slice(0, 7); // YYYY-MM
                monthKeys.push(key);
                monthLabels.push(d.toLocaleString('default', {
                    month: 'short',
                    year: 'numeric'
                }));
            }

            fetch("/projects-six-months")
                .then(res => res.json())
                .then(projectsByDate => {
                    const datasets = [];
                    const colors = [
                        "#4a148c", "#6a1b9a", "#7b1fa2", "#8e24aa", "#9c27b0",
                        "#ab47bc", "#ba68c8", "#ce93d8", "#d1c4e9", "#b39ddb",
                        "#6a1b9a", "#7b1fa2", "#8e24aa", "#9c27b0", "#ab47bc",
                        "#7b1fa2", "#8e24aa", "#9c27b0", "#6a1b9a", "#4a148c"
                    ];
                    let colorIdx = 0;

                    // Create one dataset per project
                    for (const dateStr in projectsByDate) {
                        projectsByDate[dateStr].forEach(p => {
                            const dataArr = monthKeys.map(() => 0);
                            const monthIdx = monthKeys.findIndex(mk => dateStr.startsWith(mk));
                            if (monthIdx !== -1) dataArr[monthIdx] = 1;

                            datasets.push({
                                label: `Title: ${p.title} (${p.client_name || "Client N/A"})`,
                                data: dataArr,
                                backgroundColor: colors[colorIdx % colors.length],
                                borderColor: "transparent",
                                borderWidth: 1,
                                projectDate: dateStr // store exact date
                            });

                            colorIdx++;
                        });
                    }

                    const ctx = document.getElementById("projectChart").getContext("2d");
                    new Chart(ctx, {
                        type: "bar",
                        data: {
                            labels: monthLabels,
                            datasets: datasets
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            plugins: {
                                tooltip: {
                                    mode: 'nearest',
                                    intersect: true,
                                    callbacks: {
                                        label: function(context) {
                                            const dataset = context.dataset;
                                            const date = new Date(dataset.projectDate);
                                            const formattedDate =
                                                `${date.getDate()}-${date.toLocaleString('default',{month:'short'})}-${date.getFullYear()}`;
                                            return `${dataset.label} | Deadline: ${formattedDate}`;
                                        }
                                    }
                                },
                                legend: {
                                    display: true
                                }
                            },
                            scales: {
                                x: {
                                    stacked: true,
                                    barPercentage: 0.1, // narrower bars
                                    categoryPercentage: 0.6
                                },
                                y: {
                                    stacked: true,
                                    beginAtZero: true,
                                    title: {
                                        display: true,
                                        text: "Projects"
                                    },
                                    ticks: {
                                        stepSize: 1,
                                        precision: 0
                                    }
                                }
                            }
                        }
                    });
                })
                .catch(err => console.error("Project fetch error:", err));
        });
    </script>



    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const monday = new Date();
            monday.setDate(monday.getDate() - ((monday.getDay() + 6) % 7));
            const weekdays = [];
            const dateKeys = [];
            for (let i = 0; i < 7; i++) {
                const d = new Date(monday);
                d.setDate(monday.getDate() + i);
                dateKeys.push(d.toISOString().slice(0, 10));
                weekdays.push(`${d.getDate()}-${d.toLocaleString('default',{month:'short'})}`);
            }

            fetch("/leaves-week")
                .then(res => res.json())
                .then(leaves => {
                    console.log("Leaves JSON:", leaves);

                    const barValues = [];
                    const barColors = [];

                    dateKeys.forEach(ds => {
                        if (leaves[ds]) {
                            barValues.push(1);
                            barColors.push('orange'); // leave color
                        } else {
                            barValues.push(0);
                            barColors.push('transparent');
                        }
                    });

                    const ctx = document.getElementById('leaveChart').getContext('2d');
                    new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: weekdays,
                            datasets: [{
                                label: 'Leave', // for legend
                                data: barValues,
                                backgroundColor: 'orange', // single color for legend
                                borderColor: "transparent",
                                borderWidth: 1
                            }]
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            scales: {
                                y: {
                                    beginAtZero: true,
                                    max: 1,
                                    ticks: {
                                        stepSize: 1,
                                        callback: v => v ? 'Leave' : ''
                                    }
                                }
                            },
                            plugins: {
                                legend: {
                                    display: true,
                                    position: 'top',
                                    labels: {
                                        boxWidth: 20,
                                        padding: 10,
                                        font: {
                                            size: 12
                                        }
                                    }
                                },
                                tooltip: {
                                    callbacks: {
                                        label: function(context) {
                                            const idx = context.dataIndex;
                                            const ds = dateKeys[idx];
                                            if (leaves[ds]) {
                                                return `Leave Type: ${leaves[ds].type}\nReason: ${leaves[ds].reason}`;
                                            }
                                            return '';
                                        }
                                    }
                                }
                            }
                        }
                    });
                })
                .catch(err => console.error('Leave fetch error:', err));
        });
    </script>



    <script>
        document.addEventListener("DOMContentLoaded", function() {
    // Define monthly groups
    const dayGroups = [
        { label: "1-5", start: 1, end: 5 },
        { label: "6-10", start: 6, end: 10 },
        { label: "11-15", start: 11, end: 15 },
        { label: "16-20", start: 16, end: 20 },
        { label: "21-25", start: 21, end: 25 },
        { label: "26-31", start: 26, end: 31 }
    ];

    // Current month
    const now = new Date();
    const year = now.getFullYear();
    const month = now.getMonth(); // 0-based

    function formatLocalDate(d) {
        const yyyy = d.getFullYear();
        const mm = (d.getMonth() + 1).toString().padStart(2, '0');
        const dd = d.getDate().toString().padStart(2, '0');
        return `${yyyy}-${mm}-${dd}`;
    }

    // All days in current month
    const dateKeys = [];
    const firstDay = new Date(year, month, 1);
    const lastDay = new Date(year, month + 1, 0);

    for (let d = new Date(firstDay); d <= lastDay; d.setDate(d.getDate() + 1)) {
        dateKeys.push(formatLocalDate(new Date(d)));
    }

    fetch("/holidays-month")
        .then(res => res.json())
        .then(holidays => {
            console.log("Holidays JSON from server:", holidays);

            const barValues = dayGroups.map(() => 0);

            // Count holidays per group
            dateKeys.forEach(ds => {
                if (holidays[ds] && holidays[ds].title) {
                    const day = new Date(ds).getDate();
                    const groupIdx = dayGroups.findIndex(g => day >= g.start && day <= g.end);
                    if (groupIdx !== -1) {
                        barValues[groupIdx] = 1; // mark holiday exists in this range
                    }
                }
            });

            const ctx = document.getElementById('holidayChart').getContext('2d');
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: dayGroups.map(g => g.label),
                    datasets: [{
                        label: 'Holiday',
                        data: barValues,
                        backgroundColor: 'blue',
                        borderColor: "transparent",
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: true,
                            max: 1,
                            ticks: {
                                stepSize: 1,
                                callback: v => v === 1 ? 'Holiday' : ''
                            }
                        }
                    },
                    plugins: {
                        legend: {
                            display: true,
                            position: 'top',
                            labels: {
                                boxWidth: 20,
                                padding: 10,
                                font: {
                                    size: 12
                                }
                            }
                        },
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    const groupIdx = context.dataIndex;
                                    const group = dayGroups[groupIdx];
                                    const holidaysInGroup = [];

                                    // Collect holidays for this group
                                    for (let d = group.start; d <= group.end; d++) {
                                        const dateObj = new Date(year, month, d);
                                        if (dateObj.getMonth() !== month) continue;
                                        const ds = formatLocalDate(dateObj);
                                        if (holidays[ds] && holidays[ds].title) {
                                            holidaysInGroup.push(
                                                `${d}-${now.toLocaleString('default',{month:'short'})}: ${holidays[ds].title}`
                                            );
                                        }
                                    }

                                    return holidaysInGroup.length > 0
                                        ? holidaysInGroup
                                        : "No Holiday";
                                }
                            }
                        }
                    }
                }
            });

        })
        .catch(err => console.error('Holiday fetch error:', err));
});

    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {

            function formatTime(datetime) {
                if (!datetime) return '-';
                const d = new Date(datetime);
                if (isNaN(d)) return '-';
                let h = d.getHours();
                const m = d.getMinutes().toString().padStart(2, '0');
                const ampm = h >= 12 ? 'PM' : 'AM';
                h = h % 12;
                if (h === 0) h = 12;
                return `${h}:${m} ${ampm}`;
            }

            const weekdays = ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'];
            const monday = new Date();
            monday.setDate(monday.getDate() - ((monday.getDay() + 6) % 7));
            const dateKeys = [];
            for (let i = 0; i < 7; i++) {
                const d = new Date(monday);
                d.setDate(monday.getDate() + i);
                dateKeys.push(d.toISOString().slice(0, 10));
            }

            fetch("/attendance-calendar")
                .then(res => res.json())
                .then(data => {
                    const barColors = [];
                    const barValues = [];
                    const MAX_HOURS = 12;
                    const today = new Date();

                    dateKeys.forEach(ds => {
                        const dayInfo = data[ds] || {
                            status: 0,
                            punch: null,
                            hours: 0
                        };
                        const isFuture = new Date(ds) > today;
                        let color = 'green';
                        let hours = Math.min(dayInfo.hours, MAX_HOURS);

                        if (dayInfo.status === 0 && !isFuture) {
                            color = 'red';
                            hours = MAX_HOURS;
                        } else if (dayInfo.status === 1 && dayInfo.punch && dayInfo.punch.in) {
                            const punchIn = new Date(dayInfo.punch.in);
                            const nineThirty = new Date(punchIn);
                            nineThirty.setHours(9, 30, 0, 0);
                            if (punchIn > nineThirty) color = '#FF8C00';
                        }

                        if (isFuture) {
                            color = 'transparent';
                            hours = 0;
                        }

                        barColors.push(color);
                        barValues.push(hours);
                    });

                    const ctx = document.getElementById('attendanceChart').getContext('2d');
                    new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: weekdays,
                            datasets: [{
                                data: barValues,
                                backgroundColor: barColors,
                                borderColor: "transparent",
                                borderWidth: 1,
                                barPercentage: 0.7,
                                categoryPercentage: 0.7
                            }]
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            scales: {
                                y: {
                                    beginAtZero: true,
                                    max: MAX_HOURS,
                                    title: {
                                        display: true,
                                        text: 'Hours Worked'
                                    },
                                    ticks: {
                                        stepSize: 2, // <-- 2 hours per box
                                        callback: v => v + " hr"
                                    }
                                }
                            },
                            plugins: {
                                legend: {
                                    display: true,
                                    labels: {
                                        generateLabels: function(chart) {
                                            return [{
                                                    text: 'Present',
                                                    fillStyle: 'green',
                                                    strokeStyle: 'transparent'
                                                },
                                                {
                                                    text: 'Late Punch-In',
                                                    fillStyle: '#FF8C00',
                                                    strokeStyle: 'transparent'
                                                },
                                                {
                                                    text: 'Absent',
                                                    fillStyle: 'red',
                                                    strokeStyle: 'transparent'
                                                }
                                            ];
                                        }
                                    },
                                    position: 'top'
                                },
                                tooltip: {
                                    callbacks: {
                                        label: function(context) {
                                            const idx = context.dataIndex;
                                            const ds = dateKeys[idx];
                                            const dayInfo = data[ds] || {
                                                status: 0,
                                                punch: null,
                                                hours: 0
                                            };
                                            let status = dayInfo.status === 1 ? 'Present' :
                                            'Absent';
                                            if (dayInfo.status === 1 && dayInfo.punch &&
                                                new Date(dayInfo.punch.in) > new Date(new Date(
                                                    dayInfo.punch.in).setHours(9, 30, 0, 0))) {
                                                status = 'Late Punch-In';
                                            }
                                            let punchText = '';
                                            if (dayInfo.punch) {
                                                punchText =
                                                    ` | In: ${formatTime(dayInfo.punch.in)}${dayInfo.punch.in_again ? ' / ' + formatTime(dayInfo.punch.in_again) : ''} Out: ${formatTime(dayInfo.punch.out)}${dayInfo.punch.out_again ? ' / ' + formatTime(dayInfo.punch.out_again) : ''}`;
                                            }
                                            return `${status}${punchText} | Hours: ${dayInfo.hours}`;
                                        }
                                    }
                                }
                            }
                        }
                    });

                })
                .catch(err => console.error(err));
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            fetch("/attendance-calendar")
                .then(res => res.json())
                .then(dateData => {
                    console.log("Date-based data:", dateData);
                    const cal = new window.CalHeatMap();
                    cal.init({
                        itemSelector: "#attendance-calendar",
                        domain: "month",
                        subDomain: "day",
                        start: new Date(new Date().setFullYear(new Date().getFullYear() - 1)),
                        data: dateData,
                        cellSize: 25,
                        range: 3,
                        tooltip: true,
                        legend: [0, 1, 3],
                        legendColors: {
                            min: "#ebedf0",
                            max: "#216e39",
                            empty: "#eeeeee",
                            data: ["#ebedf0", "#8cc665", "#f39c12"]
                        },
                        dateFormat: "YYYY-MM-DD"
                    });
                })
                .catch(err => console.error(err));
        });
    </script>


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
            const gpsStatus = document.getElementById('gps-status');

            if (!locationType) {
                alert("Please select your work location (Home or Company).");
                document.getElementById('location_type').focus();
                return;
            }

            gpsStatus.innerHTML = '<span class="text-blue-500">🔄</span> Getting your location...';
            gpsStatus.className = 'flex items-center gap-2 text-xs text-blue-600';

            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    document.getElementById('latitude').value = position.coords.latitude;
                    document.getElementById('longitude').value = position.coords.longitude;

                    gpsStatus.innerHTML =
                        '<span class="text-green-500">✅</span> Location captured successfully!';
                    gpsStatus.className = 'flex items-center gap-2 text-xs text-green-600';

                    setTimeout(() => {
                        document.getElementById('punchInForm').submit();
                    }, 500);
                }, function(error) {
                    gpsStatus.innerHTML =
                        '<span class="text-red-500">❌</span> Unable to get location. Please enable GPS.';
                    gpsStatus.className = 'flex items-center gap-2 text-xs text-red-600';
                    alert("Unable to get your location. Please enable GPS and try again.");
                });
            } else {
                gpsStatus.innerHTML = '<span class="text-red-500">❌</span> Geolocation not supported.';
                gpsStatus.className = 'flex items-center gap-2 text-xs text-red-600';
                alert("Geolocation is not supported by this browser.");
            }
        });
    </script>
</x-app-layout>
