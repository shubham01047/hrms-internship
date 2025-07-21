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

<main class="p-6 bg-gray-100 min-h-screen space-y-8">
    <!-- Header -->
    <div class="bg-gradient-to-r from-blue-700 to-indigo-800 text-white p-6 rounded-lg shadow flex justify-between items-center">
        <h1 class="text-3xl font-bold">HR Dashboard</h1>
        <div id="clock" class="text-lg font-medium"></div>
    </div>

    <!-- Top Summary Widgets -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <div class="bg-white p-6 rounded-lg shadow text-center hover:shadow-xl transition">
            <h3 class="text-gray-500 text-sm">Total Employees</h3>
            <p class="text-3xl font-bold text-blue-600">120</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow text-center hover:shadow-xl transition">
            <h3 class="text-gray-500 text-sm">New Joinees</h3>
            <p class="text-3xl font-bold text-green-600">5</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow text-center hover:shadow-xl transition">
            <h3 class="text-gray-500 text-sm">Pending Leaves</h3>
            <p class="text-3xl font-bold text-yellow-500">8</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow text-center hover:shadow-xl transition">
            <h3 class="text-gray-500 text-sm">Attrition Rate</h3>
            <p class="text-3xl font-bold text-red-500">4%</p>
        </div>
    </div>

    <!-- Attendance Overview -->
    <div class="bg-white rounded-lg shadow p-6">
        <h2 class="text-xl font-semibold mb-4 text-gray-800">Attendance Overview</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
            <div class="p-4 bg-blue-100 rounded-lg text-center">
                <h3 class="text-gray-700">Punch-in Today</h3>
                <p class="text-2xl font-bold text-blue-600">98</p>
            </div>
            <div class="p-4 bg-yellow-100 rounded-lg text-center">
                <h3 class="text-gray-700">Late Comers</h3>
                <p class="text-2xl font-bold text-yellow-600">12</p>
            </div>
            <div class="p-4 bg-red-100 rounded-lg text-center">
                <h3 class="text-gray-700">Absent</h3>
                <p class="text-2xl font-bold text-red-500">10</p>
            </div>
            <div class="p-4 bg-green-100 rounded-lg text-center">
                <h3 class="text-gray-700">Compliance</h3>
                <p class="text-2xl font-bold text-green-600">92%</p>
            </div>
        </div>
    </div>

    <!-- Leave Management -->
    <div class="bg-white rounded-lg shadow p-6">
        <h2 class="text-xl font-semibold mb-4 text-gray-800">Pending Leave Requests</h2>
        <table class="w-full border-collapse text-left">
            <thead class="bg-gray-100">
                <tr>
                    <th class="p-3">Employee</th>
                    <th class="p-3">Type</th>
                    <th class="p-3">From</th>
                    <th class="p-3">To</th>
                    <th class="p-3">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr class="border-t hover:bg-gray-50">
                    <td class="p-3">John Doe</td>
                    <td class="p-3">Sick Leave</td>
                    <td class="p-3">20 Jul</td>
                    <td class="p-3">22 Jul</td>
                    <td class="p-3">
                        <button class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600">Approve</button>
                        <button class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 ml-2">Reject</button>
                    </td>
                </tr>
                <tr class="border-t hover:bg-gray-50">
                    <td class="p-3">Alice Smith</td>
                    <td class="p-3">Casual Leave</td>
                    <td class="p-3">23 Jul</td>
                    <td class="p-3">24 Jul</td>
                    <td class="p-3">
                        <button class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600">Approve</button>
                        <button class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 ml-2">Reject</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Reports & Analytics -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <div class="bg-white rounded-lg shadow p-6">
            <h2 class="text-xl font-semibold mb-4 text-gray-800">Attendance Trend</h2>
            <canvas id="attendanceChart" class="w-full h-64"></canvas>
        </div>
        <div class="bg-white rounded-lg shadow p-6">
            <h2 class="text-xl font-semibold mb-4 text-gray-800">Leave Distribution</h2>
            <canvas id="leaveChart" class="w-full h-64"></canvas>
        </div>
    </div>
</main>

<!-- Include Chart.js for graphs -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Real-Time Clock
    function updateClock() {
        document.getElementById('clock').textContent = new Date().toLocaleTimeString();
    }
    setInterval(updateClock, 1000);
    updateClock();

    // Charts
    const ctx1 = document.getElementById('attendanceChart').getContext('2d');
    new Chart(ctx1, {
        type: 'line',
        data: {
            labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri'],
            datasets: [{
                label: 'Attendance %',
                data: [90, 92, 95, 88, 94],
                borderColor: '#2563EB',
                backgroundColor: 'rgba(37,99,235,0.2)',
                fill: true
            }]
        }
    });

    const ctx2 = document.getElementById('leaveChart').getContext('2d');
    new Chart(ctx2, {
        type: 'pie',
        data: {
            labels: ['Sick', 'Casual', 'Annual'],
            datasets: [{
                data: [10, 15, 20],
                backgroundColor: ['#EF4444', '#F59E0B', '#10B981']
            }]
        }
    });
</script>





                </div>
            </div>
        </div>
    </div>
</x-app-layout>
