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
    <div class="flex justify-between items-center bg-gradient-to-r from-indigo-600 to-blue-500 text-white p-6 rounded-lg shadow">
        <h2 class="text-2xl font-bold">Admin Dashboard</h2>
        <div class="flex items-center gap-6">
            <div id="clock" class="text-lg font-semibold"></div>
            <button class="bg-yellow-400 hover:bg-yellow-500 text-black px-4 py-2 rounded-lg font-semibold">Notifications</button>
        </div>
    </div>

    <!-- Quick Stats -->
    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-6">
        <div class="bg-white p-4 rounded-xl shadow hover:shadow-lg transition">
            <h3 class="text-gray-600 text-sm">Total Employees</h3>
            <p class="text-3xl font-bold text-blue-600">120</p>
        </div>
        <div class="bg-white p-4 rounded-xl shadow hover:shadow-lg transition">
            <h3 class="text-gray-600 text-sm">Present Today</h3>
            <p class="text-3xl font-bold text-green-600">98</p>
        </div>
        <div class="bg-white p-4 rounded-xl shadow hover:shadow-lg transition">
            <h3 class="text-gray-600 text-sm">Punch-In Now</h3>
            <p class="text-3xl font-bold text-purple-600">65</p>
        </div>
        <div class="bg-white p-4 rounded-xl shadow hover:shadow-lg transition">
            <h3 class="text-gray-600 text-sm">Pending Leaves</h3>
            <p class="text-3xl font-bold text-yellow-500">12</p>
        </div>
        <div class="bg-white p-4 rounded-xl shadow hover:shadow-lg transition">
            <h3 class="text-gray-600 text-sm">Active Projects</h3>
            <p class="text-3xl font-bold text-pink-600">08</p>
        </div>
        <div class="bg-white p-4 rounded-xl shadow hover:shadow-lg transition">
            <h3 class="text-gray-600 text-sm">Pending Tasks</h3>
            <p class="text-3xl font-bold text-red-500">24</p>
        </div>
    </div>

    <!-- Attendance & Analytics Section -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Attendance Overview -->
        <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition">
            <h3 class="text-lg font-semibold mb-4 text-gray-700">Today's Attendance</h3>
            <canvas id="attendanceChart" class="w-full h-56"></canvas>
        </div>

        <!-- Leave Summary -->
        <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition">
            <h3 class="text-lg font-semibold mb-4 text-gray-700">Leave Summary</h3>
            <canvas id="leaveChart" class="w-full h-56"></canvas>
        </div>

        <!-- Project Status -->
        <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition">
            <h3 class="text-lg font-semibold mb-4 text-gray-700">Project Progress</h3>
            <canvas id="projectChart" class="w-full h-56"></canvas>
        </div>
    </div>

    <!-- Notifications & Quick Actions -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Notifications -->
        <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition">
            <h3 class="text-lg font-semibold mb-4 text-gray-700">Recent Notifications</h3>
            <ul class="space-y-3 text-gray-600">
                <li>✅ Leave request approved for John Doe</li>
                <li>⚠️ Task deadline approaching for Project X</li>
                <li>✅ 5 new employees added this week</li>
            </ul>
        </div>

        <!-- Quick Actions -->
        <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition">
            <h3 class="text-lg font-semibold mb-4 text-gray-700">Quick Actions</h3>
            <div class="flex flex-wrap gap-4">
                <button class="bg-blue-600 text-white px-4 py-3 rounded-lg shadow hover:bg-blue-700">Add Employee</button>
                <button class="bg-green-600 text-white px-4 py-3 rounded-lg shadow hover:bg-green-700">Add Holiday</button>
                <button class="bg-purple-600 text-white px-4 py-3 rounded-lg shadow hover:bg-purple-700">Create Project</button>
                <button class="bg-yellow-500 text-white px-4 py-3 rounded-lg shadow hover:bg-yellow-600">Generate Report</button>
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
                backgroundColor: ['#16A34A', '#EF4444', '#FACC15']
            }]
        }
    });

    new Chart(ctx2, {
        type: 'pie',
        data: {
            labels: ['Sick', 'Casual', 'Annual'],
            datasets: [{
                data: [10, 5, 7],
                backgroundColor: ['#06B6D4', '#F59E0B', '#8B5CF6']
            }]
        }
    });

    new Chart(ctx3, {
        type: 'bar',
        data: {
            labels: ['Project A', 'Project B', 'Project C'],
            datasets: [{
                label: 'Completion %',
                data: [70, 45, 90],
                backgroundColor: ['#3B82F6', '#EC4899', '#22C55E']
            }]
        }
    });
</script>



                </div>
            </div>
        </div>
    </div>
</x-app-layout>
