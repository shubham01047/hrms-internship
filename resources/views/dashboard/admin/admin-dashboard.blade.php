<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-black leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
                <div class="p-6 text-black">

<main class="p-8 bg-gray-100 min-h-screen space-y-10">

    <!-- Header -->
    <div class="flex flex-col sm:flex-row justify-between items-center bg-gradient-to-r from-indigo-500 to-purple-600 text-white p-6 rounded-2xl shadow-xl
                opacity-0 translate-y-4 transition-all duration-700 ease-out"
         x-init="setTimeout(() => $el.classList.remove('opacity-0', 'translate-y-4'), 100)">
        <h2 class="text-2xl font-bold mb-4 sm:mb-0">Admin Dashboard</h2> {{-- Adjusted for mobile stacking --}}
        <div class="flex items-center gap-6">
            <div id="clock" class="text-lg font-semibold"></div>
            <button class="bg-purple-400 hover:bg-purple-500 text-white px-4 py-2 rounded-lg font-semibold
                           hover:scale-105 transition-all duration-300 ease-in-out shadow-md hover:shadow-lg">Notifications</button>
        </div>
    </div>

    <!-- Quick Stats -->
    <div class="overflow-x-auto hide-scrollbar pb-4"> {{-- Added horizontal scroll for small screens --}}
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 xl:grid-cols-5 gap-8 min-w-[700px]"> {{-- Ensured min-width for horizontal scroll --}}
            <div class="p-5 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 ease-in-out hover:scale-105
                        bg-gradient-to-br from-blue-500 to-cyan-500 text-white
                        opacity-0 translate-y-4 flex flex-col items-start gap-3"
                 x-init="setTimeout(() => $el.classList.remove('opacity-0', 'translate-y-4'), 200)">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-blue-100" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                <h3 class="text-sm text-blue-100">Total Employees</h3>
                <p class="text-3xl font-bold">120</p>
            </div>
            <div class="p-5 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 ease-in-out hover:scale-105
                        bg-gradient-to-br from-green-500 to-green-600 text-white
                        opacity-0 translate-y-4 flex flex-col items-start gap-3"
                 x-init="setTimeout(() => $el.classList.remove('opacity-0', 'translate-y-4'), 300)">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-green-100" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="18" height="18" x="3" y="4" rx="2" ry="2"/><line x1="16" x2="16" y1="2" y2="6"/><line x1="8" x2="8" y1="2" y2="6"/><line x1="3" x2="21" y1="10" y2="10"/></svg>
                <h3 class="text-sm text-green-100">Present Today</h3>
                <p class="text-3xl font-bold">98</p>
            </div>
            <div class="p-5 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 ease-in-out hover:scale-105
                        bg-gradient-to-br from-purple-500 to-pink-600 text-white
                        opacity-0 translate-y-4 flex flex-col items-start gap-3"
                 x-init="setTimeout(() => $el.classList.remove('opacity-0', 'translate-y-4'), 400)">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-purple-100" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/><path d="M12 22c4.4 0 8-3.6 8-8V7h-4V3H8v4H4v7c0 4.4 3.6 8 8 8z"/></svg>
                <h3 class="text-sm text-purple-100">Punch-In Now</h3>
                <p class="text-3xl font-bold">65</p>
            </div>
            <div class="p-5 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 ease-in-out hover:scale-105
                        bg-gradient-to-br from-yellow-500 to-orange-500 text-white
                        opacity-0 translate-y-4 flex flex-col items-start gap-3"
                 x-init="setTimeout(() => $el.classList.remove('opacity-0', 'translate-y-4'), 500)">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-yellow-100" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"/><polyline points="14 2 14 8 20 8"/><line x1="16" x2="8" y1="13" y2="13"/><line x1="16" x2="8" y1="17" y2="17"/><line x1="10" x2="8" y1="9" y2="9"/></svg>
                <h3 class="text-sm text-yellow-100">Pending Leaves</h3>
                <p class="text-3xl font-bold">12</p>
            </div>
            <div class="p-5 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 ease-in-out hover:scale-105
                        bg-gradient-to-br from-teal-500 to-emerald-600 text-white
                        opacity-0 translate-y-4 flex flex-col items-start gap-3"
                 x-init="setTimeout(() => $el.classList.remove('opacity-0', 'translate-y-4'), 600)">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-teal-100" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 20h16a2 2 0 0 0 2-2V8a2 2 0 0 0-2-2h-7.93a2 2 0 0 1-1.66-.9l-.82-1.2A2 2 0 0 0 4.32 2H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2z"/></svg>
                <h3 class="text-sm text-teal-100">Active Projects</h3>
                <p class="text-3xl font-bold">08</p>
            </div>
            <div class="p-5 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 ease-in-out hover:scale-105
                        bg-gradient-to-br from-red-600 to-red-700 text-white
                        opacity-0 translate-y-4 flex flex-col items-start gap-3"
                 x-init="setTimeout(() => $el.classList.remove('opacity-0', 'translate-y-4'), 700)">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-red-100" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 17.5v-11M18 13.5v-7M6 21.5v-11"/></svg>
                <h3 class="text-sm text-red-100">Pending Tasks</h3>
                <p class="text-3xl font-bold">24</p>
            </div>
            {{-- New Quick Stats Widgets --}}
            <div class="p-5 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 ease-in-out hover:scale-105
                        bg-gradient-to-br from-gray-600 to-gray-700 text-white
                        opacity-0 translate-y-4 flex flex-col items-start gap-3"
                 x-init="setTimeout(() => $el.classList.remove('opacity-0', 'translate-y-4'), 800)">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-gray-100" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22c4.4 0 8-3.6 8-8V7h-4V3H8v4H4v7c0 4.4 3.6 8 8 8z"/><path d="M12 14V3"/><path d="M15 7H9"/></svg>
                <h3 class="text-sm text-gray-100">Roles Created</h3>
                <p class="text-3xl font-bold">05</p>
            </div>
            <div class="p-5 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 ease-in-out hover:scale-105
                        bg-gradient-to-br from-lime-500 to-lime-600 text-white
                        opacity-0 translate-y-4 flex flex-col items-start gap-3"
                 x-init="setTimeout(() => $el.classList.remove('opacity-0', 'translate-y-4'), 900)">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-lime-100" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                <h3 class="text-sm text-lime-100">Logged-in Users</h3>
                <p class="text-3xl font-bold">45</p>
            </div>
            <div class="p-5 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 ease-in-out hover:scale-105
                        bg-gradient-to-br from-orange-600 to-orange-700 text-white
                        opacity-0 translate-y-4 flex flex-col items-start gap-3"
                 x-init="setTimeout(() => $el.classList.remove('opacity-0', 'translate-y-4'), 1000)">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-orange-100" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="20" height="14" x="2" y="6" rx="2"/><path d="M6 10h.01"/><path d="M10 10h.01"/><path d="M14 10h.01"/><path d="M18 10h.01"/></svg>
                <h3 class="text-sm text-orange-100">Departments</h3>
                <p class="text-3xl font-bold">07</p>
            </div>
            <div class="p-5 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 ease-in-out hover:scale-105
                        bg-gradient-to-br from-sky-500 to-sky-600 text-white
                        opacity-0 translate-y-4 flex flex-col items-start gap-3"
                 x-init="setTimeout(() => $el.classList.remove('opacity-0', 'translate-y-4'), 1100)">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-sky-100" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                <h3 class="text-sm text-sky-100">System Uptime</h3>
                <p class="text-3xl font-bold">99.9%</p>
            </div>
        </div>
    </div>

    <!-- Attendance & Analytics Section -->
    <div class="overflow-x-auto hide-scrollbar pb-4"> {{-- Added horizontal scroll for small screens --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 min-w-[600px]"> {{-- Adjusted grid for responsiveness and min-width --}}
            <!-- Attendance Overview -->
            <div class="bg-white p-6 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 ease-in-out
                        opacity-0 translate-y-4"
                 x-init="setTimeout(() => $el.classList.remove('opacity-0', 'translate-y-4'), 1200)">
                <h3 class="text-lg font-semibold mb-4 text-gray-700">Today's Attendance</h3>
                <canvas id="attendanceChart" class="w-full h-56"></canvas>
            </div>

            <!-- Leave Summary -->
            <div class="bg-white p-6 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 ease-in-out
                        opacity-0 translate-y-4"
                 x-init="setTimeout(() => $el.classList.remove('opacity-0', 'translate-y-4'), 1300)">
                <h3 class="text-lg font-semibold mb-4 text-gray-700">Leave Summary</h3>
                <canvas id="leaveChart" class="w-full h-56"></canvas>
            </div>

            <!-- Project Status -->
            <div class="bg-white p-6 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 ease-in-out
                        opacity-0 translate-y-4"
                 x-init="setTimeout(() => $el.classList.remove('opacity-0', 'translate-y-4'), 1400)">
                <h3 class="text-lg font-semibold mb-4 text-gray-700">Project Progress</h3>
                <canvas id="projectChart" class="w-full h-56"></canvas>
            </div>
        </div>
    </div>

    <!-- Quick Reports Section -->
    <div class="opacity-0 translate-y-4 transition-all duration-700 ease-out"
         x-init="setTimeout(() => $el.classList.remove('opacity-0', 'translate-y-4'), 1500)"> {{-- Adjusted delay --}}
        <h3 class="text-2xl font-bold mb-6 text-gray-800">Quick Reports</h3>
        <div class="flex overflow-x-auto pb-4 space-x-6 hide-scrollbar">
            <div class="flex-shrink-0 w-64 p-5 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 ease-in-out hover:scale-105
                        bg-gradient-to-br from-indigo-600 to-blue-600 text-white flex flex-col items-start gap-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-indigo-100" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"/><polyline points="14 2 14 8 20 8"/><line x1="16" x2="8" y1="13" y2="13"/><line x1="16" x2="8" y1="17" y2="17"/><line x1="10" x2="8" y1="9" y2="9"/></svg>
                <h4 class="text-lg font-semibold">Monthly Attendance Report</h4>
                <p class="text-sm text-indigo-100">View detailed attendance for the month.</p>
                <button class="mt-auto bg-white text-indigo-700 px-4 py-2 rounded-lg font-semibold hover:bg-gray-100 transition-colors duration-200">View Report</button>
            </div>
            <div class="flex-shrink-0 w-64 p-5 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 ease-in-out hover:scale-105
                        bg-gradient-to-br from-purple-600 to-pink-600 text-white flex flex-col items-start gap-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-purple-100" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"/><polyline points="17 3 21 7 10 18"/><line x1="16" x2="22" y1="14" y2="8"/></svg>
                <h4 class="text-lg font-semibold">Leave Summary Report</h4>
                <p class="text-sm text-purple-100">Overview of all leave requests and statuses.</p>
                <button class="mt-auto bg-white text-purple-700 px-4 py-2 rounded-lg font-semibold hover:bg-gray-100 transition-colors duration-200">View Report</button>
            </div>
            <div class="flex-shrink-0 w-64 p-5 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 ease-in-out hover:scale-105
                        bg-gradient-to-br from-green-600 to-teal-600 text-white flex flex-col items-start gap-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-green-100" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                <h4 class="text-lg font-semibold">Punch Timing Analytics</h4>
                <p class="text-sm text-green-100">Analyze employee punch-in/out patterns.</p>
                <button class="mt-auto bg-white text-green-700 px-4 py-2 rounded-lg font-semibold hover:bg-gray-100 transition-colors duration-200">View Report</button>
            </div>
            <div class="flex-shrink-0 w-64 p-5 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 ease-in-out hover:scale-105
                        bg-gradient-to-br from-orange-600 to-red-600 text-white flex flex-col items-start gap-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-orange-100" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 3v18h18"/><path d="M18.7 8.3L12 15l-3.4-3.4"/><path d="M14 14h6v6"/></svg>
                <h4 class="text-lg font-semibold">Employee Work Hours Graph</h4>
                <p class="text-sm text-orange-100">Visualize total work hours per employee.</p>
                <button class="mt-auto bg-white text-orange-700 px-4 py-2 rounded-lg font-semibold hover:bg-gray-100 transition-colors duration-200">View Report</button>
            </div>
        </div>
    </div>

    <!-- Notifications & Quick Actions -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8
                opacity-0 translate-y-4 transition-all duration-700 ease-out"
         x-init="setTimeout(() => $el.classList.remove('opacity-0', 'translate-y-4'), 1600)"> {{-- Adjusted delay --}}
        <!-- Notifications -->
        <div class="bg-white p-6 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 ease-in-out">
            <h3 class="text-lg font-semibold mb-4 text-gray-700">Recent Notifications</h3>
            <ul class="space-y-3 text-gray-600">
                <li>✅ Leave request approved for John Doe</li>
                <li>⚠️ Task deadline approaching for Project X</li>
                <li>✅ 5 new employees added this week</li>
            </ul>
        </div>

        <!-- Quick Actions -->
        <div class="bg-white p-6 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 ease-in-out">
            <h3 class="text-lg font-semibold mb-4 text-gray-700">Quick Actions</h3>
            <div class="flex flex-wrap gap-4">
                <button class="bg-blue-600 text-white px-4 py-3 rounded-lg shadow hover:bg-blue-700
                               hover:scale-105 transition-all duration-300 ease-in-out">Add Employee</button>
                <button class="bg-green-600 text-white px-4 py-3 rounded-lg shadow hover:bg-green-700
                               hover:scale-105 transition-all duration-300 ease-in-out">Add Holiday</button>
                <button class="bg-purple-600 text-white px-4 py-3 rounded-lg shadow hover:bg-purple-700
                               hover:scale-105 transition-all duration-300 ease-in-out">Create Project</button>
                <button class="bg-orange-500 text-white px-4 py-3 rounded-lg shadow hover:bg-orange-600
                               hover:scale-105 transition-all duration-300 ease-in-out">Generate Report</button>
            </div>
        </div>
    </div>
</main>

<!-- Include Chart.js for Graphs -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Real-Time Clock
    function updateClock() {
        document.getElementById('clock').textContent = new Date().toLocaleTimeString();
    }
    setInterval(updateClock, 1000);
    updateClock();

    // Charts Example
    const ctx1 = document.getElementById('attendanceChart');
    const ctx2 = document.getElementById('leaveChart');
    const ctx3 = document.getElementById('projectChart');

    new Chart(ctx1, {
        type: 'doughnut',
        data: {
            labels: ['Present', 'Absent', 'On Leave'],
            datasets: [{
                data: [98, 15, 7],
                backgroundColor: ['#16A34A', '#EF4444', '#FACC15'] // Green for present, Red for absent, Yellow for on leave
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            animation: {
                duration: 1000 // Animation duration
            },
            plugins: {
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            let label = context.label || '';
                            if (label) {
                                label += ': ';
                            }
                            if (context.parsed !== null) {
                                label += context.parsed + '%'; // Assuming data is already percentage or convert
                            }
                            return label;
                        }
                    }
                }
            }
        }
    });

    new Chart(ctx2, {
        type: 'pie',
        data: {
            labels: ['Sick', 'Casual', 'Annual'],
            datasets: [{
                data: [10, 5, 7],
                backgroundColor: ['#3B82F6', '#F59E0B', '#8B5CF6'] // Blue, Orange, Purple for leave types
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            animation: {
                duration: 1000 // Animation duration
            },
            plugins: {
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            let label = context.label || '';
                            if (label) {
                                label += ': ';
                            }
                            if (context.parsed !== null) {
                                const total = context.dataset.data.reduce((sum, val) => sum + val, 0);
                                const percentage = ((context.parsed / total) * 100).toFixed(1);
                                label += context.parsed + ' (' + percentage + '%)';
                            }
                            return label;
                        }
                    }
                }
            }
        }
    });

    new Chart(ctx3, {
        type: 'bar',
        data: {
            labels: ['Project A', 'Project B', 'Project C'],
            datasets: [{
                label: 'Completion %',
                data: [70, 45, 90],
                backgroundColor: ['#0EA5E9', '#EC4899', '#22C55E'] // Cyan, Pink, Green for project completion
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            animation: {
                duration: 1000 // Animation duration
            },
            plugins: {
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            let label = context.dataset.label || '';
                            if (label) {
                                label += ': ';
                            }
                            if (context.parsed.y !== null) {
                                label += context.parsed.y + '%';
                            }
                            return label;
                        }
                    }
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    max: 100
                }
            }
        }
    });
</script>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
