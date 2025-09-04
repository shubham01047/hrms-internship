<x-app-layout>
    <div class="container mx-auto p-4 sm:p-5 lg:p-6">
        <div class="theme-app">
            <h2 class="">
                All Reports of Attendance ,Holiday, Leave, Task, Projects
            </h2>
            <!-- Added professional GUI styling to chart grid sections -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
                <!-- Attendance Chart -->
                <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-8 h-8 bg-green-100 rounded-lg flex items-center justify-center">
                            <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z">
                                </path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900">Weekly Attendance Report</h3>
                        <span class="text-sm text-gray-500">(Mon → Sun)</span>
                    </div>
                    <div style="width:100%; max-width:500px; height:300px;">
                        <canvas id="attendanceChart"></canvas>
                    </div>
                </div>

                <!-- Holiday Chart -->
                <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-8 h-8 bg-purple-100 rounded-lg flex items-center justify-center">
                            <svg class="w-4 h-4 text-purple-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z">
                                </path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900">Monthly Holidays Report</h3>
                        <span class="text-sm text-gray-500">(For this Month)</span>
                    </div>
                    <div style="width:100%; max-width:500px; height:300px;">
                        <canvas id="holidayChart"></canvas>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
                <!-- Leave Chart -->
                <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-8 h-8 bg-orange-100 rounded-lg flex items-center justify-center">
                            <svg class="w-4 h-4 text-orange-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2
0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900">Weekly Leaves Report</h3>
                        <span class="text-sm text-gray-500">(Mon → Sun)</span>
                    </div>
                    <div style="width:100%; max-width:500px; height:300px;">
                        <canvas id="leaveChart"></canvas>
                    </div>
                </div>

                <!-- Task Chart -->
                <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center">
                            <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4">
                                </path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900">Tasks Report</h3>
                        <span class="text-sm text-gray-500">(For this Month)</span>
                    </div>
                    <div style="width:100%; max-width:500px; height:300px;">
                        <canvas id="taskChart"></canvas>
                    </div>
                </div>
            </div>

            <!-- Added professional GUI styling to projects chart section -->
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6 mb-6">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-8 h-8 bg-indigo-100 rounded-lg flex items-center justify-center">
                        <svg class="w-4 h-4 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2-2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900">Projects Report</h3>
                    <span class="text-sm text-gray-500">(Next 6 Months)</span>
                </div>
                <div style="width:100%; max-width:89%; height:400px;">
                    <canvas id="projectChart"></canvas>
                </div>
            </div>
            <div class="rounded-xl bg-secondary-gradient border border-primary p-4 sm:p-5 mb-4 sm:mb-6 shadow-sm">
                <div class="flex flex-col gap-3 md:flex-row md:items-center md:justify-between">
                    <h2 class="text-lg sm:text-xl md:text-2xl font-semibold text-primary">
                        Monthly Attendance Percentage - {{ $selectedYear }}
                    </h2>
                    <!-- Improved mobile form layout with better stacking -->
                    <form method="GET" action="{{ route('reports.report') }}"
                        class="w-full md:w-auto flex flex-col sm:flex-row items-start sm:items-center gap-2 sm:gap-3 lg:mr-24">
                        <label for="year"
                            class="text-secondary text-xs sm:text-sm font-medium whitespace-nowrap">Select Year</label>
                        <div class="relative w-full sm:w-auto min-w-[120px]">
                            <select name="year" id="year" onchange="this.form.submit()"
                                class="w-full sm:w-[140px] md:w-[160px] bg-primary-light text-primary border border-primary rounded-lg pl-3 pr-8 py-1.5 sm:py-2 text-sm shadow-sm focus:outline-none">
                                @foreach ($years as $year)
                                    <option value="{{ $year }}" {{ $year == $selectedYear ? 'selected' : '' }}>
                                        {{ $year }}
                                    </option>
                                @endforeach
                            </select>
                            <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                class="pointer-events-none absolute right-2 sm:right-3 top-1/2 -translate-y-1/2 h-3 w-3 sm:h-4 sm:w-4 text-secondary"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="6 9 12 15 18 9" />
                            </svg>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Improved chart container for mobile -->
        <div class="rounded-xl bg-white border border-gray-200 p-3 sm:p-4 lg:p-5 mb-4 sm:mb-5 lg:mb-6 shadow-sm">
            <div class="w-full overflow-hidden">
                <canvas id="attendanceChartyear" class="max-w-full h-auto" height="80"></canvas>
            </div>
        </div>

        <div class="theme-app">
            <div
                class="rounded-lg bg-secondary-gradient border border-primary px-3 py-2 sm:px-4 sm:py-2.5 mb-3 sm:mb-4 shadow-sm">
                <h3 class="text-sm sm:text-base font-semibold text-primary">Today’s Summary</h3>
            </div>
        </div>

        <!-- Better mobile grid with improved spacing -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-4 mb-4 sm:mb-6">
            <a href="{{ route('users.index') }}"
                class="min-w-0 rounded-xl bg-white border border-gray-200 hover:shadow-sm transition-shadow p-4 sm:p-5 flex items-start gap-3">
                <div
                    class="shrink-0 h-9 w-9 rounded-lg bg-emerald-50 text-emerald-600 flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
                        <circle cx="9" cy="7" r="4" />
                        <path d="M22 21v-2a4 4 0 0 0-3-3.87M16 3.13a4 4 0 0 1 0 7.75" />
                    </svg>
                </div>
                <div class="min-w-0">
                    <p class="text-xs text-gray-500">Total Employees</p>
                    <p class="text-xl sm:text-2xl font-semibold text-gray-900 truncate">{{ $employees->count() }}</p>
                </div>
            </a>

            <div
                class="min-w-0 rounded-xl bg-white border border-gray-200 hover:shadow-sm transition-shadow p-4 sm:p-5 flex items-start gap-3">
                <div class="shrink-0 h-9 w-9 rounded-lg bg-purple-50 text-purple-600 flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="20 6 9 17 4 12" />
                        <path d="M12 22c4.4 0 8-3.6 8-8V7h-4V3H8v4H4v7c0 4.4 3.6 8 8 8z" />
                    </svg>
                </div>
                <div class="min-w-0">
                    <p class="text-xs text-gray-500">Punch-in Users</p>
                    <p class="text-xl sm:text-2xl font-semibold text-gray-900 truncate">{{ $todayPunchInCount }}</p>
                </div>
            </div>

            <div
                class="min-w-0 rounded-xl bg-white border border-gray-200 hover:shadow-sm transition-shadow p-4 sm:p-5 flex items-start gap-3">
                <div class="shrink-0 h-9 w-9 rounded-lg bg-amber-50 text-amber-600 flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z" />
                        <polyline points="14 2 14 8 20 8" />
                        <line x1="16" x2="8" y1="13" y2="13" />
                        <line x1="16" x2="8" y1="17" y2="17" />
                        <line x1="10" x2="8" y1="9" y2="9" />
                    </svg>
                </div>
                <div class="min-w-0">
                    <p class="text-xs text-gray-500">Pending Leaves</p>
                    <p class="text-xl sm:text-2xl font-semibold text-gray-900 truncate">{{ $pendingLeaves }}</p>
                </div>
            </div>

            <div
                class="min-w-0 rounded-xl bg-white border border-gray-200 hover:shadow-sm transition-shadow p-4 sm:p-5 flex items-start gap-3">
                <div class="shrink-0 h-9 w-9 rounded-lg bg-teal-50 text-teal-600 flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path
                            d="M4 20h16a2 2 0 0 0 2-2V8a2 2 0 0 0-2-2h-7.93a2 2 0 0 1-1.66-.9l-.82-1.2A2 2 0 0 0 4.32 2H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2z" />
                        <line x1="12" x2="12" y1="10" y2="16" />
                        <line x1="9" x2="15" y1="13" y2="13" />
                    </svg>
                </div>
                <div class="min-w-0">
                    <p class="text-xs text-gray-500">Active Projects</p>
                    <p class="text-xl sm:text-2xl font-semibold text-gray-900 truncate">{{ $projectCount }}</p>
                </div>
            </div>
        </div>

        <!-- Better mobile layout for compliance cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 sm:gap-4 mb-4 sm:mb-5 lg:mb-6">
            <div class="rounded-xl bg-white border border-rose-200 p-4 sm:p-5">
                <p class="text-xs text-rose-600 mb-1.5">Absent</p>
                <p class="text-2xl sm:text-3xl font-semibold text-rose-700">{{ $absentees }}</p>
            </div>

            <div class="rounded-xl bg-white border border-emerald-200 p-4 sm:p-5">
                <p class="text-xs text-emerald-600 mb-1.5">Compliance</p>
                <div class="flex items-center gap-2 mb-2">
                    <span class="text-lg sm:text-xl font-semibold text-gray-900">{{ $attendancePercentage }}%</span>
                </div>
                <div class="h-2 rounded-full bg-gray-100 overflow-hidden">
                    <div class="h-full bg-emerald-500 rounded-full"
                        style="width: {{ min(100, max(0, (int) $attendancePercentage)) }}%;"></div>
                </div>
            </div>
        </div>

        <div class="theme-app">
            <div
                class="rounded-lg bg-secondary-gradient border border-primary px-3 py-2 sm:px-4 sm:py-2.5 mb-3 sm:mb-4 shadow-sm">
                <h3 class="text-sm sm:text-base font-semibold text-primary">Reports</h3>
            </div>
        </div>

        <!-- Enhanced mobile table with better responsive design -->
        <div class="overflow-x-auto rounded-xl bg-white border border-gray-200 p-3 sm:p-4 lg:p-5 shadow-sm">
            <h2 class="text-base sm:text-lg lg:text-xl font-semibold text-gray-900 mb-3">Project Timeline</h2>
            <div class="min-w-[800px]">
                <table class="w-full border-collapse text-xs sm:text-sm">
                    <thead>
                        <tr
                            class="bg-gray-50 text-gray-600 uppercase text-[10px] sm:text-xs leading-normal border-b border-gray-200">
                            <th class="py-2.5 sm:py-3 px-3 sm:px-4 text-left font-medium">Project</th>
                            <th class="py-2.5 sm:py-3 px-3 sm:px-4 text-left font-medium">Task</th>
                            <th class="py-2.5 sm:py-3 px-3 sm:px-4 text-left font-medium">Assigned To</th>
                            <th class="py-2.5 sm:py-3 px-3 sm:px-4 text-left font-medium">Priority</th>
                            <th class="py-2.5 sm:py-3 px-3 sm:px-4 text-left font-medium">Status</th>
                            <th
                                class="py-2.5 sm:py-3 px-3 sm:px-4 text-left font-medium min-w-[260px] sm:min-w-[300px] lg:min-w-[320px]">
                                Timeline</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        @forelse($projects as $project)
                            @foreach ($project->tasks as $task)
                                @php
                                    $start = \Carbon\Carbon::parse($task->created_at);
                                    $end = \Carbon\Carbon::parse($task->due_date ?? now()->addDays(1));
                                    $today = \Carbon\Carbon::now();

                                    $totalDuration = $start->diffInSeconds($end);
                                    $elapsedDuration = $start->diffInSeconds(min($today, $end));
                                    $progressPercent =
                                        $totalDuration > 0
                                            ? min(100, round(($elapsedDuration / $totalDuration) * 100))
                                            : 0;

                                    $isOverdue = $today->gt($end) && $task->status !== 'Done';

                                    $statusColors = [
                                        'To-Do' => '#2563eb',
                                        'In Progress' => '#f59e0b',
                                        'Done' => '#22c55e',
                                        'On Hold' => '#a855f7',
                                        'Blocked' => '#ef4444',
                                    ];
                                    $barColor = $isOverdue ? '#dc2626' : $statusColors[$task->status] ?? '#6b7280';

                                    $priorityColors = [
                                        'Low' => 'bg-green-100 text-green-800',
                                        'Medium' => 'bg-yellow-100 text-yellow-800',
                                        'High' => 'bg-red-100 text-red-800',
                                        'Urgent' => 'bg-rose-100 text-rose-800',
                                    ];
                                    $priorityClass = $priorityColors[$task->priority] ?? 'bg-gray-100 text-gray-800';
                                @endphp

                                <tr class="border-b border-gray-100 hover:bg-gray-50/60 transition-colors">
                                    <td class="py-3 px-3 sm:px-4 align-top text-xs">{{ $project->title }}</td>
                                    <td class="py-3 px-3 sm:px-4 align-top text-xs">{{ $task->title }}</td>
                                    <td class="py-3 px-3 sm:px-4 align-top">
                                        @foreach ($task->assignedUsers as $user)
                                            <span
                                                class="inline-block bg-blue-50 text-blue-700 text-[10px] sm:text-[11px] font-semibold mr-1 mb-1 px-1.5 py-0.5 rounded-full border border-blue-100">
                                                {{ $user->name }}
                                            </span>
                                        @endforeach
                                    </td>
                                    <td class="py-3 px-3 sm:px-4 align-top">
                                        <span
                                            class="text-[10px] sm:text-[11px] font-medium px-1.5 py-0.5 rounded-full {{ $priorityClass }}">
                                            {{ $task->priority }}
                                        </span>
                                    </td>
                                    <td class="py-3 px-3 sm:px-4 align-top">
                                        <span class="text-[10px] sm:text-[11px] font-medium px-1.5 py-0.5 rounded-full"
                                            style="background-color: {{ $barColor }}20; color: {{ $barColor }}">
                                            {{ $task->status }}
                                        </span>
                                    </td>
                                    <td class="py-3 px-3 sm:px-4 align-top">
                                        <div class="flex items-center gap-1 sm:gap-2">
                                            <div
                                                class="flex-1 h-1.5 sm:h-2 bg-gray-100 rounded-full overflow-hidden min-w-[60px]">
                                                <div class="h-full rounded-full"
                                                    style="width: {{ $progressPercent }}%; background-color: {{ $barColor }};">
                                                </div>
                                            </div>
                                            <div
                                                class="shrink-0 whitespace-nowrap text-[10px] sm:text-[11px] text-gray-500">
                                                {{ $start->format('d M') }} - {{ $end->format('d M') }}
                                                ({{ $progressPercent }}%)
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-6 text-gray-500">No projects or tasks
                                    available.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const dayGroups = [{
                    label: "1-5",
                    start: 1,
                    end: 5
                },
                {
                    label: "6-10",
                    start: 6,
                    end: 10
                },
                {
                    label: "11-15",
                    start: 11,
                    end: 15
                },
                {
                    label: "16-20",
                    start: 16,
                    end: 20
                },
                {
                    label: "21-25",
                    start: 21,
                    end: 25
                },
                {
                    label: "26-31",
                    start: 26,
                    end: 31
                }
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
            const dayGroups = [{
                    label: "1-5",
                    start: 1,
                    end: 5
                },
                {
                    label: "6-10",
                    start: 6,
                    end: 10
                },
                {
                    label: "11-15",
                    start: 11,
                    end: 15
                },
                {
                    label: "16-20",
                    start: 16,
                    end: 20
                },
                {
                    label: "21-25",
                    start: 21,
                    end: 25
                },
                {
                    label: "26-31",
                    start: 26,
                    end: 31
                }
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

                                            return holidaysInGroup.length > 0 ?
                                                holidaysInGroup :
                                                "No Holiday";
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
document.addEventListener("DOMContentLoaded", function () {
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
                const dayInfo = data[ds] || { status: 0, punch: null, hours: 0 };
                const isFuture = new Date(ds) > today;
                let color = 'green';
                let hours = Math.min(dayInfo.hours, MAX_HOURS);

                if (dayInfo.status === 0 && !isFuture) {
                    // Absent
                    color = 'red';
                    hours = MAX_HOURS;
                } else if ((dayInfo.status === 1 || dayInfo.status === 2) && dayInfo.punch && dayInfo.punch.in) {
                    const punchIn = new Date(dayInfo.punch.in);
                    const nineThirty = new Date(punchIn);
                    nineThirty.setHours(9, 30, 0, 0);

                    // Late check
                    color = punchIn > nineThirty ? '#FF8C00' : 'green';

                    // Show at least a small bar if only punch-in (hours = 0)
                    if (hours === 0) {
                        hours = 0.5;
                    }
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
                                stepSize: 2,
                                callback: v => v + " hr"
                            }
                        }
                    },
                    plugins: {
                        legend: {
                            display: true,
                            labels: {
                                generateLabels: function () {
                                    return [
                                        { text: 'Present', fillStyle: 'green', strokeStyle: 'transparent' },
                                        { text: 'Late Punch-In', fillStyle: '#FF8C00', strokeStyle: 'transparent' },
                                        { text: 'Absent', fillStyle: 'red', strokeStyle: 'transparent' }
                                    ];
                                }
                            },
                            position: 'top'
                        },
                        tooltip: {
                            callbacks: {
                                label: function (context) {
                                    const idx = context.dataIndex;
                                    const ds = dateKeys[idx];
                                    const dayInfo = data[ds] || { status: 0, punch: null, hours: 0 };

                                    let status = 'Absent';
                                    if (dayInfo.status === 1) status = 'Present';
                                    if (dayInfo.status === 2) status = 'Late Punch-In';

                                    let punchText = '';
                                    if (dayInfo.punch) {
                                        punchText = ` | In: ${formatTime(dayInfo.punch.in)}`
                                            + (dayInfo.punch.in_again ? ' / ' + formatTime(dayInfo.punch.in_again) : '')
                                            + ` Out: ${formatTime(dayInfo.punch.out)}`
                                            + (dayInfo.punch.out_again ? ' / ' + formatTime(dayInfo.punch.out_again) : '');
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
        const ctx = document.getElementById('attendanceChartyear').getContext('2d');
        const attendanceChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: [
                    'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
                    'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'
                ],
                datasets: [{
                    label: 'Attendance Percentage',
                    data: @json($monthlyAttendance),
                    backgroundColor: 'rgba(54, 162, 235, 0.6)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1,
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        max: 100,
                        ticks: {
                            callback: function(value) {
                                return value + "%";
                            }
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: true
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                return context.parsed.y + "%";
                            }
                        }
                    }
                }
            }
        });
    </script>
</x-app-layout>
