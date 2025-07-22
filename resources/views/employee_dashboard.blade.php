<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    {{-- Custom styles for this page --}}
    <style>
        /* Poppins font is assumed to be loaded by x-app-layout or globally */
        body {
            font-family: 'Poppins', sans-serif;
        }
        /* Custom gradient for the header */
        .header-gradient {
            background: linear-gradient(135deg, #ff2626, #ff6969); /* Dark blue to light blue */
        }

        /* Fade-in animation */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-fade-in {
            animation: fadeIn 0.8s ease-out forwards;
            opacity: 0; /* Start invisible */
        }
        /* Staggered delays for sections */
        .animate-delay-100 { animation-delay: 0.1s; }
        .animate-delay-200 { animation-delay: 0.2s; }
        .animate-delay-300 { animation-delay: 0.3s; }
        .animate-delay-400 { animation-delay: 0.4s; }
        .animate-delay-500 { animation-delay: 0.5s; }
        .animate-delay-600 { animation-delay: 0.6s; }
        .animate-delay-700 { animation-delay: 0.7s; }
        .animate-delay-800 { animation-delay: 0.8s; }
        .animate-delay-900 { animation-delay: 0.9s; }
        .animate-delay-1000 { animation-delay: 1.0s; }
    </style>

    <div class="py-12 bg-gray-100 min-h-screen"> {{-- Set overall background to gray-100 and ensure min-height --}}
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8"> {{-- Consistent vertical spacing between sections --}}

            <!-- First Row: Header with Gradient and Real-time Clock -->
            <div class="header-gradient text-white p-6 rounded-xl shadow-lg flex flex-col sm:flex-row justify-between items-center animate-fade-in">
                <h2 class="text-2xl font-bold">Employee Dashboard</h2>
                <div id="clock" class="text-xl font-semibold mt-2 sm:mt-0"></div>
            </div>

            <!-- Second Row: Punch In/Out + Attendance Summary -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <!-- Punch In / Punch Out Section (Existing) -->
                <div class="bg-white shadow-lg rounded-xl p-6 border border-gray-200 animate-fade-in animate-delay-100">
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
                                    class="w-full md:w-80 px-10 py-8 text-3xl font-extrabold text-white rounded-full shadow-xl active:scale-95 transition-all duration-300 ease-in-out focus:outline-none focus:ring-4">
                                    Punch In
                                </button>
                        </div>
                    </div>
                </div>

                <!-- Attendance Summary Card (New) -->
                <div class="bg-white p-6 shadow-lg rounded-xl border border-gray-200 animate-fade-in animate-delay-200">
                    <h2 class="text-lg font-semibold text-gray-800 mb-4">Attendance Summary</h2>
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 text-center">
                        <div class="p-3 bg-blue-50 rounded-lg border border-blue-100">
                            <i class="bi bi-person-check-fill text-blue-600 text-3xl mb-2"></i>
                            <h3 class="font-semibold text-gray-700">Today's Status</h3>
                            <p class="text-xl font-bold text-blue-600">Present</p>
                        </div>
                        <div class="p-3 bg-green-50 rounded-lg border border-green-100">
                            <i class="bi bi-clock-fill text-green-600 text-3xl mb-2"></i>
                            <h3 class="font-semibold text-gray-700">Total Hours Worked</h3>
                            <p class="text-xl font-bold text-green-600">8h 15m</p>
                        </div>
                        <div class="p-3 bg-yellow-50 rounded-lg border border-yellow-100">
                            <i class="bi bi-arrow-right-circle-fill text-yellow-600 text-3xl mb-2"></i>
                            <h3 class="font-semibold text-gray-700">Last Punch Time</h3>
                            <p class="text-xl font-bold text-yellow-600">05:30 PM</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Manage Breaks (Existing - now a full-width section) -->
            <div class="bg-white shadow-lg rounded-xl p-6 border border-gray-200 animate-fade-in animate-delay-300">
                <h2 class="text-lg font-semibold mb-4 text-gray-800">Manage Breaks</h2>
                <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-4 gap-4">
                    <!-- Morning Tea Break -->
                    <button data-break="Morning Tea" class="bg-gradient-to-r from-yellow-400 to-yellow-600 text-white px-4 py-3 rounded-lg shadow-md font-semibold break-btn hover:from-yellow-500 hover:to-yellow-700 transition-all duration-200">
                        Start Morning Tea Break
                    </button>
                    <!-- Lunch Break -->
                    <button data-break="Lunch" class="bg-gradient-to-r from-pink-400 to-pink-600 text-white px-4 py-3 rounded-lg shadow-md font-semibold break-btn hover:from-pink-500 hover:to-pink-700 transition-all duration-200">
                        Start Lunch Break
                    </button>
                    <!-- Evening Tea Break -->
                    <button data-break="Evening Tea" class="bg-gradient-to-r from-purple-400 to-purple-600 text-white px-4 py-3 rounded-lg shadow-md font-semibold break-btn hover:from-purple-500 hover:to-purple-700 transition-all duration-200">
                        Start Evening Tea Break
                    </button>
                    <!-- Custom Break -->
                    <button data-break="Custom" class="bg-gradient-to-r from-gray-500 to-gray-700 text-white px-4 py-3 rounded-lg shadow-md font-semibold break-btn hover:from-gray-600 hover:to-gray-800 transition-all duration-200">
                        Start Custom Break
                    </button>
                </div>
                <!-- Break Status & Timer -->
                <div id="breakStatus" class="mt-6 text-gray-800 font-semibold text-lg">
                    No break active
                </div>
                <div id="breakTimer" class="text-2xl text-blue-600 font-bold mt-2">00:00:00</div>
            </div>

            <!-- Third Row: Leave Overview + Quick Actions -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <!-- Leave Overview Card (New) -->
                <div class="bg-white p-6 shadow-lg rounded-xl border border-gray-200 animate-fade-in animate-delay-400">
                    <h2 class="text-lg font-semibold text-gray-800 mb-4">Leave Overview</h2>
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 text-center">
                        <div class="p-3 bg-purple-50 rounded-lg border border-purple-100">
                            <i class="bi bi-calendar-minus-fill text-purple-600 text-3xl mb-2"></i>
                            <h3 class="font-semibold text-gray-700">Remaining Leaves</h3>
                            <p class="text-xl font-bold text-purple-600">12</p>
                        </div>
                        <div class="p-3 bg-red-50 rounded-lg border border-red-100">
                            <i class="bi bi-hourglass-split text-red-600 text-3xl mb-2"></i>
                            <h3 class="font-semibold text-gray-700">Pending Requests</h3>
                            <p class="text-xl font-bold text-red-600">2</p>
                        </div>
                        <div class="p-3 bg-blue-50 rounded-lg border border-blue-100">
                            <i class="bi bi-calendar-event-fill text-blue-600 text-3xl mb-2"></i>
                            <h3 class="font-semibold text-gray-700">Upcoming Holidays</h3>
                            <ul class="text-sm text-gray-600 mt-2 space-y-1">
                                <li>July 25: Company Picnic</li>
                                <li>Aug 15: Independence Day</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Quick Actions (New) -->
                <div class="bg-white p-6 shadow-lg rounded-xl border border-gray-200 animate-fade-in animate-delay-500">
                    <h2 class="text-lg font-semibold text-gray-800 mb-4">Quick Actions</h2>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                        <a href="#" class="flex items-center justify-center p-4 rounded-lg bg-gradient-to-r from-blue-500 to-blue-700 text-white font-semibold shadow-md hover:from-blue-600 hover:to-blue-800 transition-all duration-200 hover:scale-105">
                            <i class="bi bi-calendar-plus-fill text-2xl mr-2"></i>
                            Apply for Leave
                        </a>
                        <a href="#" class="flex items-center justify-center p-4 rounded-lg bg-gradient-to-r from-green-500 to-green-700 text-white font-semibold shadow-md hover:from-green-600 hover:to-green-800 transition-all duration-200 hover:scale-105">
                            <i class="bi bi-file-earmark-text-fill text-2xl mr-2"></i>
                            View Payslip
                        </a>
                        <a href="#" class="flex items-center justify-center p-4 rounded-lg bg-gradient-to-r from-purple-500 to-purple-700 text-white font-semibold shadow-md hover:from-purple-600 hover:to-purple-800 transition-all duration-200 hover:scale-105">
                            <i class="bi bi-person-circle text-2xl mr-2"></i>
                            Update Profile
                        </a>
                    </div>
                </div>
            </div>

            <!-- Fourth Row: Upcoming Events / Holidays + Announcements -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <!-- Upcoming Events / Holidays (New) -->
                <div class="bg-white p-6 shadow-lg rounded-xl border border-gray-200 animate-fade-in animate-delay-600">
                    <h2 class="text-lg font-semibold text-gray-800 mb-4">Upcoming Events</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="flex items-center gap-4 p-3 bg-gray-50 rounded-lg border border-gray-100">
                            <div class="flex-shrink-0 text-center">
                                <div class="text-xl font-bold text-blue-600">25</div>
                                <div class="text-xs text-gray-500">JUL</div>
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-800">Annual Company Picnic</h3>
                                <p class="text-sm text-gray-600">Central Park, 10:00 AM - 4:00 PM</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-4 p-3 bg-gray-50 rounded-lg border border-gray-100">
                            <div class="flex-shrink-0 text-center">
                                <div class="text-xl font-bold text-green-600">01</div>
                                <div class="text-xs text-gray-500">AUG</div>
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-800">Team Building Workshop</h3>
                                <p class="text-sm text-gray-600">Conference Room A, 09:00 AM</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Announcements (New) -->
                <div class="bg-white p-6 shadow-lg rounded-xl border border-gray-200 animate-fade-in animate-delay-700">
                    <h2 class="text-lg font-semibold text-gray-800 mb-4">Company Announcements</h2>
                    <ul class="space-y-3 text-gray-700">
                        <li class="flex items-start gap-3">
                            <i class="bi bi-megaphone-fill text-blue-500 text-xl flex-shrink-0 mt-1"></i>
                            <div>
                                <p class="font-semibold">New HR Policy Update</p>
                                <p class="text-sm">Please review the updated HR policy document in the shared drive by end of week.</p>
                            </div>
                        </li>
                        <li class="flex items-start gap-3">
                            <i class="bi bi-gift-fill text-green-500 text-xl flex-shrink-0 mt-1"></i>
                            <div>
                                <p class="font-semibold">Employee of the Month!</p>
                                <p class="text-sm">Congratulations to Jane Doe for being recognized as Employee of the Month!</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Statistics Cards (Existing - below the main grid rows) -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 animate-fade-in animate-delay-800">
                <div class="bg-white p-6 shadow-lg rounded-xl text-center hover:shadow-xl transition-all duration-200 hover:scale-105">
                    <div class="text-blue-600 mb-3">
                        <i class="bi bi-list-task text-4xl"></i> {{-- Icon for Tasks --}}
                    </div>
                    <h3 class="text-gray-600 text-lg font-semibold mb-2">Tasks</h3>
                    <p class="text-3xl font-bold text-blue-600">12</p>
                </div>
                <div class="bg-white p-6 shadow-lg rounded-xl text-center hover:shadow-xl transition-all duration-200 hover:scale-105">
                    <div class="text-purple-600 mb-3">
                        <i class="bi bi-folder text-4xl"></i> {{-- Icon for Projects --}}
                    </div>
                    <h3 class="text-gray-600 text-lg font-semibold mb-2">Projects</h3>
                    <p class="text-3xl font-bold text-purple-600">4</p>
                </div>
                <div class="bg-white p-6 shadow-lg rounded-xl text-center hover:shadow-xl transition-all duration-200 hover:scale-105">
                    <div class="text-yellow-600 mb-3">
                        <i class="bi bi-hourglass-split text-4xl"></i> {{-- Icon for Pending Tasks --}}
                    </div>
                    <h3 class="text-gray-600 text-lg font-semibold mb-2">Pending Tasks</h3>
                    <p class="text-3xl font-bold text-yellow-600">3</p>
                </div>
                <div class="bg-white p-6 shadow-lg rounded-xl text-center hover:shadow-xl transition-all duration-200 hover:scale-105">
                    <div class="text-green-600 mb-3">
                        <i class="bi bi-check-circle text-4xl"></i> {{-- Icon for Completed --}}
                    </div>
                    <h3 class="text-gray-600 text-lg font-semibold mb-2">Completed</h3>
                    <p class="text-3xl font-bold text-green-600">9</p>
                </div>
            </div>

            <!-- Recent Activities / Notifications (Existing - now a full-width section) -->
            <div class="bg-white p-6 shadow-lg rounded-xl border border-gray-200 animate-fade-in animate-delay-900">
                <h2 class="text-lg font-semibold text-gray-800 mb-4">Recent Activities</h2>
                <ul class="space-y-3">
                    <li class="flex items-center gap-3 text-gray-700">
                        <i class="bi bi-bell-fill text-blue-500 text-xl"></i>
                        <span>You punched in at 09:00 AM.</span>
                        <span class="ml-auto text-sm text-gray-500">Just now</span>
                    </li>
                    <li class="flex items-center gap-3 text-gray-700">
                        <i class="bi bi-check-circle-fill text-green-500 text-xl"></i>
                        <span>Task "Update HRMS UI" marked as complete.</span>
                        <span class="ml-auto text-sm text-gray-500">1 hour ago</span>
                    </li>
                    <li class="flex items-center gap-3 text-gray-700">
                        <i class="bi bi-calendar-event-fill text-purple-500 text-xl"></i>
                        <span>New company event: Annual Picnic on July 25th.</span>
                        <span class="ml-auto text-sm text-gray-500">Yesterday</span>
                    </li>
                </ul>
            </div>

            <!-- Current Tasks Table (Existing - below all other sections) -->
            <div class="bg-white p-6 shadow-lg rounded-xl border border-gray-200 overflow-x-auto animate-fade-in animate-delay-1000">
                <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-4 gap-2">
                    <h2 class="text-lg font-semibold text-gray-800">Current Tasks</h2>
                    <button class="text-blue-600 hover:underline font-medium text-sm">View All</button>
                </div>
                <table class="w-full text-left border-collapse">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="p-3 text-sm font-semibold text-gray-600 uppercase tracking-wider border-b border-gray-200">Task</th>
                            <th class="p-3 text-sm font-semibold text-gray-600 uppercase tracking-wider border-b border-gray-200">Deadline</th>
                            <th class="p-3 text-sm font-semibold text-gray-600 uppercase tracking-wider border-b border-gray-200">Status</th>
                            <th class="p-3 text-sm font-semibold text-gray-600 uppercase tracking-wider border-b border-gray-200">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-b border-gray-100 hover:bg-gray-50 transition-colors duration-150">
                            <td class="p-3 text-gray-700">Update HRMS UI</td>
                            <td class="p-3 text-gray-700">20 July 2025</td>
                            <td class="p-3 text-green-600 font-medium">In Progress</td>
                            <td class="p-3">
                                <button class="bg-gradient-to-r from-blue-500 to-blue-700 text-white px-3 py-1 rounded-md text-sm hover:from-blue-600 hover:to-blue-800 transition-all duration-200">Complete</button>
                            </td>
                        </tr>
                        <tr class="border-b border-gray-100 hover:bg-gray-50 transition-colors duration-150">
                            <td class="p-3 text-gray-700">Fix Punch In Bug</td>
                            <td class="p-3 text-gray-700">18 July 2025</td>
                            <td class="p-3 text-yellow-600 font-medium">Pending</td>
                            <td class="p-3">
                                <button class="bg-gradient-to-r from-blue-500 to-blue-700 text-white px-3 py-1 rounded-md text-sm hover:from-blue-600 hover:to-blue-800 transition-all duration-200">Complete</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </div>

    <!-- JavaScript -->
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const punchButton = document.getElementById("punchButton");
            const breakButtons = document.querySelectorAll(".break-btn");
            const breakStatus = document.getElementById("breakStatus");
            const workTimeEl = document.getElementById("workTime");
            const breakTimerEl = document.getElementById("breakTimer");
            let isPunchedIn = false;
            let workSeconds = 0;
            let workTimer;
            let breakTimer, breakSeconds = 0;

            // Punch In / Out Logic
            const punchInClasses =
                "w-full md:w-80 px-10 py-8 text-3xl font-extrabold text-white bg-gradient-to-r from-green-500 to-green-700 rounded-full shadow-xl hover:from-green-600 hover:to-green-800 active:scale-95 transition-all duration-300 ease-in-out focus:outline-none focus:ring-4 focus:ring-green-400";
            const punchOutClasses =
                "w-full md:w-80 px-10 py-8 text-3xl font-extrabold text-white bg-gradient-to-r from-red-500 to-red-700 rounded-full shadow-xl hover:from-red-600 hover:to-red-800 active:scale-95 transition-all duration-300 ease-in-out focus:outline-none focus:ring-4 focus:ring-red-400";

            if (punchButton) {
                punchButton.addEventListener("click", () => {
                    isPunchedIn = !isPunchedIn;
                    punchButton.textContent = isPunchedIn ? "Punch Out" : "Punch In";

                    // Toggle full class strings for gradients
                    if (isPunchedIn) {
                        punchButton.className = punchOutClasses;
                        startWorkTimer();
                    } else {
                        punchButton.className = punchInClasses;
                        stopWorkTimer();
                    }
                });
                // Set initial class for punch button
                punchButton.className = punchInClasses;
            }

            function startWorkTimer() {
                workTimer = setInterval(() => {
                    workSeconds++;
                    if (workTimeEl) workTimeEl.textContent = formatTime(workSeconds);
                }, 1000);
            }
            function stopWorkTimer() {
                clearInterval(workTimer);
            }
            function formatTime(sec) {
                const h = Math.floor(sec / 3600);
                const m = Math.floor((sec % 3600) / 60);
                const s = sec % 60;
                return [h, m, s].map((v) => String(v).padStart(2, "0")).join(":");
            }
            // Break Timer Functions
            function startBreakTimer() {
                clearInterval(breakTimer);
                breakSeconds = 0;
                breakTimer = setInterval(() => {
                    breakSeconds++;
                    if (breakTimerEl) breakTimerEl.textContent = formatTime(breakSeconds);
                }, 1000);
            }
            function stopBreakTimer() {
                clearInterval(breakTimer);
            }
            // Break Buttons Logic
            breakButtons.forEach((btn) => {
                btn.addEventListener("click", () => {
                    const breakName = btn.dataset.break;
                    if (btn.textContent.startsWith("Start")) {
                        btn.textContent = `End ${breakName} Break`;
                        if (breakStatus) breakStatus.textContent = `${breakName} started at ${new Date().toLocaleTimeString()}`;
                        startBreakTimer();
                        btn.classList.add("opacity-80");
                    } else {
                        btn.textContent = `Start ${breakName} Break`;
                        if (breakStatus) breakStatus.textContent = `${breakName} ended at ${new Date().toLocaleTimeString()}`;
                        stopBreakTimer();
                        if (breakTimerEl) breakTimerEl.textContent = "00:00:00";
                        btn.classList.remove("opacity-80");
                    }
                });
            });
            // Real-Time Clock
            function updateClock() {
                const clockElement = document.getElementById("clock");
                if (clockElement) {
                    clockElement.textContent = new Date().toLocaleTimeString();
                }
            }
            setInterval(updateClock, 1000);
            updateClock();
        });
    </script>
</x-app-layout>