<x-app-layout>
    <div class="container mx-auto p-4 sm:p-5 lg:p-6">
        <div class="theme-app">
            <div class="rounded-xl bg-secondary-gradient border border-primary p-4 sm:p-5 mb-4 sm:mb-6 shadow-sm">
                <div class="flex flex-col gap-3 md:flex-row md:items-center md:justify-between">
                    <h2 class="text-lg sm:text-xl md:text-2xl font-semibold text-primary">
                        Monthly Attendance Percentage - {{ $selectedYear }}
                    </h2>
                    <!-- Improved mobile form layout with better stacking -->
                    <form method="GET" action="{{ route('reports.report') }}" class="w-full md:w-auto flex flex-col sm:flex-row items-start sm:items-center gap-2 sm:gap-3 lg:mr-24">
                        <label for="year" class="text-secondary text-xs sm:text-sm font-medium whitespace-nowrap">Select Year</label>
                        <div class="relative w-full sm:w-auto min-w-[120px]">
                            <select
                                name="year"
                                id="year"
                                onchange="this.form.submit()"
                                class="w-full sm:w-[140px] md:w-[160px] bg-primary-light text-primary border border-primary rounded-lg pl-3 pr-8 py-1.5 sm:py-2 text-sm shadow-sm focus:outline-none"
                            >
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
                <canvas id="attendanceChart" class="max-w-full h-auto" height="80"></canvas>
            </div>
        </div>

        <div class="theme-app">
            <div class="rounded-lg bg-secondary-gradient border border-primary px-3 py-2 sm:px-4 sm:py-2.5 mb-3 sm:mb-4 shadow-sm">
                <h3 class="text-sm sm:text-base font-semibold text-primary">Today’s Summary</h3>
            </div>
        </div>

        <!-- Better mobile grid with improved spacing -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-4 mb-4 sm:mb-6">
            <a href="{{ route('employees.index') }}"
               class="min-w-0 rounded-xl bg-white border border-gray-200 hover:shadow-sm transition-shadow p-4 sm:p-5 flex items-start gap-3">
                <div class="shrink-0 h-9 w-9 rounded-lg bg-emerald-50 text-emerald-600 flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/>
                        <path d="M22 21v-2a4 4 0 0 0-3-3.87M16 3.13a4 4 0 0 1 0 7.75"/>
                    </svg>
                </div>
                <div class="min-w-0">
                    <p class="text-xs text-gray-500">Total Employees</p>
                    <p class="text-xl sm:text-2xl font-semibold text-gray-900 truncate">{{ $employees->count() }}</p>
                </div>
            </a>

            <div class="min-w-0 rounded-xl bg-white border border-gray-200 hover:shadow-sm transition-shadow p-4 sm:p-5 flex items-start gap-3">
                <div class="shrink-0 h-9 w-9 rounded-lg bg-purple-50 text-purple-600 flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="20 6 9 17 4 12"/><path d="M12 22c4.4 0 8-3.6 8-8V7h-4V3H8v4H4v7c0 4.4 3.6 8 8 8z"/>
                    </svg>
                </div>
                <div class="min-w-0">
                    <p class="text-xs text-gray-500">Punch-in Users</p>
                    <p class="text-xl sm:text-2xl font-semibold text-gray-900 truncate">{{ $todayPunchInCount }}</p>
                </div>
            </div>

            <div class="min-w-0 rounded-xl bg-white border border-gray-200 hover:shadow-sm transition-shadow p-4 sm:p-5 flex items-start gap-3">
                <div class="shrink-0 h-9 w-9 rounded-lg bg-amber-50 text-amber-600 flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"/>
                        <polyline points="14 2 14 8 20 8"/><line x1="16" x2="8" y1="13" y2="13"/>
                        <line x1="16" x2="8" y1="17" y2="17"/><line x1="10" x2="8" y1="9" y2="9"/>
                    </svg>
                </div>
                <div class="min-w-0">
                    <p class="text-xs text-gray-500">Pending Leaves</p>
                    <p class="text-xl sm:text-2xl font-semibold text-gray-900 truncate">{{ $pendingLeaves }}</p>
                </div>
            </div>

            <div class="min-w-0 rounded-xl bg-white border border-gray-200 hover:shadow-sm transition-shadow p-4 sm:p-5 flex items-start gap-3">
                <div class="shrink-0 h-9 w-9 rounded-lg bg-teal-50 text-teal-600 flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M4 20h16a2 2 0 0 0 2-2V8a2 2 0 0 0-2-2h-7.93a2 2 0 0 1-1.66-.9l-.82-1.2A2 2 0 0 0 4.32 2H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2z"/>
                        <line x1="12" x2="12" y1="10" y2="16"/><line x1="9" x2="15" y1="13" y2="13"/>
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
                    <div class="h-full bg-emerald-500 rounded-full" style="width: {{ min(100, max(0, (int) $attendancePercentage)) }}%;"></div>
                </div>
            </div>
        </div>

        <div class="theme-app">
            <div class="rounded-lg bg-secondary-gradient border border-primary px-3 py-2 sm:px-4 sm:py-2.5 mb-3 sm:mb-4 shadow-sm">
                <h3 class="text-sm sm:text-base font-semibold text-primary">Reports</h3>
            </div>
        </div>

        <!-- Enhanced mobile table with better responsive design -->
        <div class="overflow-x-auto rounded-xl bg-white border border-gray-200 p-3 sm:p-4 lg:p-5 shadow-sm">
            <h2 class="text-base sm:text-lg lg:text-xl font-semibold text-gray-900 mb-3">Project Timeline</h2>
            <div class="min-w-[800px]">
                <table class="w-full border-collapse text-xs sm:text-sm">
                    <thead>
                        <tr class="bg-gray-50 text-gray-600 uppercase text-[10px] sm:text-xs leading-normal border-b border-gray-200">
                            <th class="py-2.5 sm:py-3 px-3 sm:px-4 text-left font-medium">Project</th>
                            <th class="py-2.5 sm:py-3 px-3 sm:px-4 text-left font-medium">Task</th>
                            <th class="py-2.5 sm:py-3 px-3 sm:px-4 text-left font-medium">Assigned To</th>
                            <th class="py-2.5 sm:py-3 px-3 sm:px-4 text-left font-medium">Priority</th>
                            <th class="py-2.5 sm:py-3 px-3 sm:px-4 text-left font-medium">Status</th>
                            <th class="py-2.5 sm:py-3 px-3 sm:px-4 text-left font-medium min-w-[260px] sm:min-w-[300px] lg:min-w-[320px]">Timeline</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        @forelse($projects as $project)
                            @foreach($project->tasks as $task)
                                @php
                                    $start = \Carbon\Carbon::parse($task->created_at);
                                    $end = \Carbon\Carbon::parse($task->due_date ?? now()->addDays(1));
                                    $today = \Carbon\Carbon::now();

                                    $totalDuration = $start->diffInSeconds($end);
                                    $elapsedDuration = $start->diffInSeconds(min($today, $end));
                                    $progressPercent = $totalDuration > 0 ? min(100, round(($elapsedDuration / $totalDuration) * 100)) : 0;

                                    $isOverdue = $today->gt($end) && $task->status !== 'Done';

                                    $statusColors = [
                                        'To-Do' => '#2563eb',
                                        'In Progress' => '#f59e0b',
                                        'Done' => '#22c55e',
                                        'On Hold' => '#a855f7',
                                        'Blocked' => '#ef4444',
                                    ];
                                    $barColor = $isOverdue ? '#dc2626' : ($statusColors[$task->status] ?? '#6b7280');

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
                                        @foreach($task->assignedUsers as $user)
                                            <span class="inline-block bg-blue-50 text-blue-700 text-[10px] sm:text-[11px] font-semibold mr-1 mb-1 px-1.5 py-0.5 rounded-full border border-blue-100">
                                                {{ $user->name }}
                                            </span>
                                        @endforeach
                                    </td>
                                    <td class="py-3 px-3 sm:px-4 align-top">
                                        <span class="text-[10px] sm:text-[11px] font-medium px-1.5 py-0.5 rounded-full {{ $priorityClass }}">
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
                                            <div class="flex-1 h-1.5 sm:h-2 bg-gray-100 rounded-full overflow-hidden min-w-[60px]">
                                                <div class="h-full rounded-full" style="width: {{ $progressPercent }}%; background-color: {{ $barColor }};"></div>
                                            </div>
                                            <div class="shrink-0 whitespace-nowrap text-[10px] sm:text-[11px] text-gray-500">
                                                {{ $start->format('d M') }} - {{ $end->format('d M') }} ({{ $progressPercent }}%)
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-6 text-gray-500">No projects or tasks available.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('attendanceChart').getContext('2d');
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
