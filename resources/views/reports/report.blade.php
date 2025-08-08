<x-app-layout>
    <div class="container mx-auto p-4">
        <h2 class="text-2xl font-bold mb-4">Monthly Attendance Percentage - {{ $selectedYear }}</h2>

        {{-- Year Dropdown --}}
        <form method="GET" action="{{ route('reports.report') }}" class="mb-6">
            <label for="year" class="mr-2 font-semibold">Select Year:</label>
            <select name="year" id="year" onchange="this.form.submit()" class="border rounded px-2 py-1">
                @foreach ($years as $year)
                    <option value="{{ $year }}" {{ $year == $selectedYear ? 'selected' : '' }}>
                        {{ $year }}
                    </option>
                @endforeach
            </select>
        </form>

        

        {{-- Chart Canvas --}}
        <canvas id="attendanceChart" height="100"></canvas>
    </div>

    <h2 class="text-2xl font-bold mb-4">todays summary</h2>
    <div class="overflow-x-auto pb-4">
                            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-3 sm:gap-4 lg:gap-6">
                                <a href="{{ route('employees.index') }}" class="p-4 sm:p-5 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 ease-in-out hover:scale-[1.01]
                                    bg-white border border-gray-200
                                    flex flex-col items-start gap-2 sm:gap-3 cursor-pointer">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 sm:h-7 sm:w-7 text-red-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                                    <h3 class="text-xs sm:text-sm text-gray-500">Total Employees</h3>
                                    <p class="text-2xl sm:text-3xl font-bold text-red-600">{{$employees->count()}}</p>
                                </a>
                                
                                <div class="p-4 sm:p-5 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 ease-in-out hover:scale-[1.01]
                                    bg-white border border-gray-200 text-purple-600
                                    flex flex-col items-start gap-2 sm:gap-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 sm:h-7 sm:w-7 text-purple-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/><path d="M12 22c4.4 0 8-3.6 8-8V7h-4V3H8v4H4v7c0 4.4 3.6 8 8 8z"/></svg>
                                    <h3 class="text-xs sm:text-sm text-gray-500">Punch-In Users</h3>
                                    <p class="text-2xl sm:text-3xl font-bold text-purple-600">{{ $todayPunchInCount }}</p>
                                </div>
                                <div class="p-4 sm:p-5 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 ease-in-out hover:scale-[1.01]
                                    bg-white border border-gray-200 text-orange-500
                                    flex flex-col items-start gap-2 sm:gap-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 sm:h-7 sm:w-7 text-orange-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"/><polyline points="14 2 14 8 20 8"/><line x1="16" x2="8" y1="13" y2="13"/><line x1="16" x2="8" y1="17" y2="17"/><line x1="10" x2="8" y1="9" y2="9"/></svg>
                                    <h3 class="text-xs sm:text-sm text-gray-500">Pending Leaves</h3>
                                    <p class="text-2xl sm:text-3xl font-bold text-orange-500">{{$pendingLeaves}}</p>
                                </div>
                                <div class="p-4 sm:p-5 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 ease-in-out hover:scale-[1.01]
                                    bg-white border border-gray-200 text-green-600
                                    flex flex-col items-start gap-2 sm:gap-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 sm:h-7 sm:w-7 text-green-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 20h16a2 2 0 0 0 2-2V8a2 2 0 0 0-2-2h-7.93a2 2 0 0 1-1.66-.9l-.82-1.2A2 2 0 0 0 4.32 2H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2z"/><line x1="12" x2="12" y1="10" y2="16"/><line x1="9" x2="15" y1="13" y2="13"/></svg>
                                    <h3 class="text-xs sm:text-sm text-gray-500">Active Projects</h3>
                                    <p class="text-2xl sm:text-3xl font-bold text-green-600">{{ $projectCount }}</p>
                                </div>
                            </div>
                             <div class="p-3 sm:p-4 bg-red-100 rounded-lg text-center hover:shadow-md transition-all duration-200 hover:scale-[1.01]">
                                    <h3 class="text-gray-700 text-xs sm:text-sm">Absent</h3>
                                    <p class="text-xl sm:text-2xl font-bold text-red-500">{{ $absentees }}</p>
                                </div>
                                <div class="p-3 sm:p-4 bg-green-100 rounded-lg text-center hover:shadow-md transition-all duration-200 hover:scale-[1.01]">
                                    <h3 class="text-gray-700 text-xs sm:text-sm">Compliance</h3>
                                    <p class="text-xl sm:text-2xl font-bold text-green-600">{{ $attendancePercentage }}%</p>
                                </div>
                        </div>

        <h2>Reports</h2> 
         <!-- Dynamic Gantt Chart Section -->
                        <div class="overflow-x-auto bg-white rounded-xl shadow border border-gray-200 p-4 sm:p-6">
                            <h2 class="text-xl sm:text-2xl font-bold text-gray-800 mb-4">Project Timeline</h2>
                            <table class="min-w-full bg-white border-collapse text-sm">
                                <thead>
                                    <tr class="bg-gray-100 text-gray-600 uppercase text-xs leading-normal border-b border-gray-200">
                                        <th class="py-3 px-4 text-left font-medium">Project</th>
                                        <th class="py-3 px-4 text-left font-medium">Task</th>
                                        <th class="py-3 px-4 text-left font-medium">Assigned To</th>
                                        <th class="py-3 px-4 text-left font-medium">Priority</th>
                                        <th class="py-3 px-4 text-left font-medium">Status</th>
                                        <th class="py-3 px-4 text-left font-medium min-w-[250px]">Timeline</th>
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
                                                    'In Progress' => '#facc15',
                                                    'Done' => '#22c55e',
                                                    'On Hold' => '#a855f7',
                                                    'Blocked' => '#ef4444',
                                                ];
                                                $barColor = $isOverdue ? '#dc2626' : ($statusColors[$task->status] ?? '#6b7280');

                                                $priorityColors = [
                                                    'Low' => 'bg-green-100 text-green-800',
                                                    'Medium' => 'bg-yellow-100 text-yellow-800',
                                                    'High' => 'bg-red-100 text-red-800',
                                                ];
                                                $priorityClass = $priorityColors[$task->priority] ?? 'bg-gray-100 text-gray-800';
                                            @endphp

                                            <tr class="border-b border-gray-100 hover:bg-gray-50 transition-colors">
                                                <td class="py-3 px-4 border-r border-gray-100">{{ $project->title }}</td>
                                                <td class="py-3 px-4 border-r border-gray-100">{{ $task->title }}</td>
                                                <td class="py-3 px-4 border-r border-gray-100">
                                                    @foreach($task->assignedUsers as $user)
                                                        <span class="inline-block bg-blue-100 text-blue-800 text-xs font-semibold mr-1 px-2 py-0.5 rounded-full">
                                                            {{ $user->name }}
                                                        </span>
                                                    @endforeach
                                                </td>
                                                <td class="py-3 px-4 border-r border-gray-100">
                                                    <span class="text-xs font-semibold px-2 py-0.5 rounded-full {{ $priorityClass }}">
                                                        {{ $task->priority }}
                                                    </span>
                                                </td>
                                                <td class="py-3 px-4 border-r border-gray-100">
                                                    <span class="text-xs font-semibold px-2 py-0.5 rounded-full"
                                                        style="background-color: {{ $barColor }}20; color: {{ $barColor }}">
                                                        {{ $task->status }}
                                                    </span>
                                                </td>
                                                <td class="py-3 px-4">
                                                    <div class="relative w-full h-6 bg-gray-200 rounded-full overflow-hidden shadow-inner">
                                                        <div class="h-full rounded-full transition-all duration-500"
                                                            style="width: {{ $progressPercent }}%; background-color: {{ $barColor }};">
                                                        </div>
                                                        <div class="absolute inset-0 flex justify-center items-center text-[11px] text-gray-800 font-medium">
                                                            {{ $start->format('d M') }} - {{ $end->format('d M') }}
                                                            ({{ $progressPercent }}%)
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

    {{-- Chart.js CDN --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    {{-- Render Chart --}}
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
