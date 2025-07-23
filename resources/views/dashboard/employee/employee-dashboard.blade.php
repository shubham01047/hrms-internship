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
                  
                    {{-- employee code --}}
                

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
                <div class="p-6 text-black">

<main class="p-6 space-y-8 bg-gray-100 min-h-screen">

    <!-- Header with Real-time Clock -->
    <div class="bg-gradient-to-r from-blue-600 to-indigo-700 text-white p-6 rounded-lg shadow flex justify-between items-center">
        <h2 class="text-2xl font-bold">Employee Dashboard</h2>
        <div id="clock" class="text-xl font-semibold"></div>
    </div>

    <!-- Punch In / Punch Out Section -->
    <div class="bg-white shadow rounded-lg p-6 border border-gray-200">
        <div class="flex flex-col md:flex-row justify-between items-center gap-6">
            <div>
                <h2 class="text-lg font-semibold text-gray-800">Work Status</h2>
                <p class="text-gray-500">Track your work hours easily</p>
                <div class="mt-4 text-gray-700 font-medium">
                    Total Working Time:
                    <span id="workTime" class="font-bold text-blue-600 text-lg">00:00:00</span>
                </div>
            </div>
            <div>
               <button id="punchButton" 
                    class="w-80 px-10 py-8 text-3xl font-extrabold text-white bg-green-600 rounded-full shadow-2xl hover:bg-green-700 active:scale-95 transition-transform duration-300 ease-in-out focus:outline-none focus:ring-4 focus:ring-green-400">
                    Punch In
                </button>





            </div>
        </div>
    </div>

    <!-- Manage Breaks -->
    <div class="bg-white shadow rounded-lg p-6">
        <h2 class="text-lg font-semibold mb-4 text-gray-800">Manage Breaks</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
            <!-- Morning Tea Break -->
            <button data-break="Morning Tea" style="background-color:#FACC15;" class="text-white px-4 py-3 rounded-lg shadow font-semibold break-btn">
                Start Morning Tea Break
            </button>

            <!-- Lunch Break -->
            <button data-break="Lunch" style="background-color:#EC4899;" class="text-white px-4 py-3 rounded-lg shadow font-semibold break-btn">
                Start Lunch Break
            </button>

            <!-- Evening Tea Break -->
            <button data-break="Evening Tea" style="background-color:#8B5CF6;" class="text-white px-4 py-3 rounded-lg shadow font-semibold break-btn">
                Start Evening Tea Break
            </button>

            <!-- Custom Break -->
            <button data-break="Custom" style="background-color:#6B7280;" class="text-white px-4 py-3 rounded-lg shadow font-semibold break-btn">
                Start Custom Break
            </button>
        </div>

        <!-- Break Status & Timer -->
        <div id="breakStatus" class="mt-6 text-gray-800 font-semibold text-lg">
            No break active
        </div>
        <div id="breakTimer" class="text-2xl text-blue-600 font-bold mt-2">00:00:00</div>
    </div>

    <div class="p-4 bg-gray-100 rounded-lg">
    <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
        <div class="bg-white p-6 shadow rounded-lg text-center hover:shadow-lg transition m-2">
            <h3 class="text-gray-600 text-lg font-semibold mb-2">Tasks</h3>
            <p class="text-3xl font-bold text-blue-600">12</p>
        </div>
        <div class="bg-white p-6 shadow rounded-lg text-center hover:shadow-lg transition m-2">
            <h3 class="text-gray-600 text-lg font-semibold mb-2">Projects</h3>
            <p class="text-3xl font-bold text-purple-600">4</p>
        </div>
        <div class="bg-white p-6 shadow rounded-lg text-center hover:shadow-lg transition m-2">
            <h3 class="text-gray-600 text-lg font-semibold mb-2">Pending Tasks</h3>
            <p class="text-3xl font-bold text-yellow-600">3</p>
        </div>
        <div class="bg-white p-6 shadow rounded-lg text-center hover:shadow-lg transition m-2">
            <h3 class="text-gray-600 text-lg font-semibold mb-2">Completed</h3>
            <p class="text-3xl font-bold text-green-600">9</p>
        </div>
    </div>
</div>

    <!-- Current Tasks Table -->
    <div class="bg-white p-6 shadow rounded-lg border border-gray-200">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-lg font-semibold text-gray-800">Current Tasks</h2>
            <button class="text-blue-600 hover:underline font-medium">View All</button>
        </div>
        <table class="w-full text-left border-collapse">
            <thead class="bg-gray-100">
                <tr>
                    <th class="p-3">Task</th>
                    <th class="p-3">Deadline</th>
                    <th class="p-3">Status</th>
                    <th class="p-3">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr class="border-t hover:bg-gray-50">
                    <td class="p-3">Update HRMS UI</td>
                    <td class="p-3">20 July 2025</td>
                    <td class="p-3 text-green-600">In Progress</td>
                    <td class="p-3">
                        <button class="bg-blue-600 text-white px-3 py-1 rounded hover:bg-blue-700">Complete</button>
                    </td>
                </tr>
                <tr class="border-t hover:bg-gray-50">
                    <td class="p-3">Fix Punch In Bug</td>
                    <td class="p-3">18 July 2025</td>
                    <td class="p-3 text-yellow-600">Pending</td>
                    <td class="p-3">
                        <button class="bg-blue-600 text-white px-3 py-1 rounded hover:bg-blue-700">Complete</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

</main>

<!-- JavaScript -->
<script>
    const punchButton = document.getElementById('punchButton');
    const breakButtons = document.querySelectorAll('.break-btn');
    const breakStatus = document.getElementById('breakStatus');
    const workTimeEl = document.getElementById('workTime');
    const breakTimerEl = document.getElementById('breakTimer');
    let isPunchedIn = false;
    let workSeconds = 0;
    let workTimer;
    let breakTimer, breakSeconds = 0;

    // Punch In / Out Logic
    punchButton.addEventListener('click', () => {
        isPunchedIn = !isPunchedIn;
        punchButton.textContent = isPunchedIn ? 'Punch Out' : 'Punch In';
        punchButton.classList.toggle('bg-green-600', !isPunchedIn);
        punchButton.classList.toggle('hover:bg-green-700', !isPunchedIn);
        punchButton.classList.toggle('bg-red-600', isPunchedIn);
        punchButton.classList.toggle('hover:bg-red-700', isPunchedIn);

        if (isPunchedIn) {
            startWorkTimer();
        } else {
            stopWorkTimer();
        }
    });

    function startWorkTimer() {
        workTimer = setInterval(() => {
            workSeconds++;
            workTimeEl.textContent = formatTime(workSeconds);
        }, 1000);
    }

    function stopWorkTimer() {
        clearInterval(workTimer);
    }

    function formatTime(sec) {
        let h = Math.floor(sec / 3600);
        let m = Math.floor((sec % 3600) / 60);
        let s = sec % 60;
        return [h, m, s].map(v => String(v).padStart(2, '0')).join(':');
    }

    // Break Timer Functions
    function startBreakTimer() {
        clearInterval(breakTimer);
        breakSeconds = 0;
        breakTimer = setInterval(() => {
            breakSeconds++;
            breakTimerEl.textContent = formatTime(breakSeconds);
        }, 1000);
    }

    function stopBreakTimer() {
        clearInterval(breakTimer);
    }

    // Break Buttons Logic
    breakButtons.forEach(btn => {
        btn.addEventListener('click', () => {
            const breakName = btn.dataset.break;
            if (btn.textContent.startsWith('Start')) {
                btn.textContent = `End ${breakName} Break`;
                breakStatus.textContent = `${breakName} started at ${new Date().toLocaleTimeString()}`;
                startBreakTimer();
                btn.classList.add('opacity-80');
            } else {
                btn.textContent = `Start ${breakName} Break`;
                breakStatus.textContent = `${breakName} ended at ${new Date().toLocaleTimeString()}`;
                stopBreakTimer();
                breakTimerEl.textContent = '00:00:00';
                btn.classList.remove('opacity-80');
            }
        });
    });

    // Real-Time Clock
    function updateClock() {
        document.getElementById('clock').textContent = new Date().toLocaleTimeString();
    }
    setInterval(updateClock, 1000);
    updateClock();
</script>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
