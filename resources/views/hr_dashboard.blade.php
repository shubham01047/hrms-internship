<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-black leading-tight">
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
            background: linear-gradient(135deg, #ff2626, #ff6969); /* Red gradient for main header */
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
        .animate-delay-900 { animation-delay: 0.9s; } /* New delay for motivational quote */

        .section-header-gradient {
            background: linear-gradient(135deg, #ff2626, #ff6969); /* Updated red gradient for sections */
        }
    </style>

    <div class="py-12 bg-gray-100 min-h-screen"> {{-- Set overall background to gray-100 and ensure min-height --}}
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8"> {{-- Consistent vertical spacing between sections --}}

            <!-- Header -->
            <div class="header-gradient text-white p-6 rounded-xl shadow-lg flex flex-col sm:flex-row justify-between items-center animate-fade-in">
                <h1 class="text-3xl font-bold mb-4 sm:mb-0">HR Dashboard</h1>
                <div class="flex flex-col sm:flex-row items-center gap-4 w-full sm:w-auto">
                    <!-- Search Bar -->
                    <div class="relative flex-1 w-full sm:w-auto">
                        <input type="text" placeholder="Search employees..." class="w-full pl-10 pr-4 py-2 rounded-full bg-white bg-opacity-20 text-white placeholder-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-opacity-50">
                        <svg class="absolute left-3 top-1/2 -translate-y-1/2 text-white h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </div>
                    <!-- Live Clock -->
                    <div id="clock" class="text-lg font-medium whitespace-nowrap mt-2 sm:mt-0"></div>
                </div>
            </div>

            <!-- Top Summary Widgets -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 animate-fade-in animate-delay-100">
                <div class="bg-gradient-to-br from-white to-blue-50 p-6 rounded-xl shadow text-center hover:shadow-xl transition-all duration-200 hover:scale-[1.01] border border-gray-200">
                    <h3 class="text-gray-500 text-sm">Total Employees</h3>
                    <p class="text-3xl font-bold text-blue-600">120</p>
                </div>
                <div class="bg-gradient-to-br from-white to-blue-50 p-6 rounded-xl shadow text-center hover:shadow-xl transition-all duration-200 hover:scale-[1.01] border border-gray-200">
                    <h3 class="text-gray-500 text-sm">New Joinees This Month</h3>
                    <p class="text-3xl font-bold text-green-600">5</p>
                </div>
                <div class="bg-gradient-to-br from-white to-blue-50 p-6 rounded-xl shadow text-center hover:shadow-xl transition-all duration-200 hover:scale-[1.01] border border-gray-200">
                    <h3 class="text-gray-500 text-sm">Employees on Leave Today</h3>
                    <p class="text-3xl font-bold text-yellow-500">8</p>
                </div>
                <div class="bg-gradient-to-br from-white to-blue-50 p-6 rounded-xl shadow text-center hover:shadow-xl transition-all duration-200 hover:scale-[1.01] border border-gray-200">
                    <h3 class="text-gray-500 text-sm">Pending Leave Requests</h3>
                    <p class="text-3xl font-bold text-red-500">4</p>
                </div>
            </div>

            <!-- Quick Actions Buttons -->
            <div class="bg-gradient-to-br from-white to-blue-50 rounded-xl shadow p-6 border border-gray-200 animate-fade-in animate-delay-200">
                <h2 class="text-xl font-semibold mb-4 text-gray-800">Quick Actions</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                    <button class="flex items-center justify-center p-4 rounded-lg bg-gradient-to-r from-blue-500 to-blue-700 text-white font-semibold shadow-md hover:from-blue-600 hover:to-blue-800 transition-all duration-200 hover:scale-105">
                        Add Employee
                    </button>
                    <button class="flex items-center justify-center p-4 rounded-lg bg-gradient-to-r from-green-500 to-green-700 text-white font-semibold shadow-md hover:from-green-600 hover:to-green-800 transition-all duration-200 hover:scale-105">
                        Approve Leaves
                    </button>
                    <button class="flex items-center justify-center p-4 rounded-lg bg-gradient-to-r from-purple-500 to-purple-700 text-white font-semibold shadow-md hover:from-purple-600 hover:to-purple-800 transition-all duration-200 hover:scale-105">
                        View Employees
                    </button>
                    <button class="flex items-center justify-center p-4 rounded-lg bg-gradient-to-r from-red-500 to-red-700 text-white font-semibold shadow-md hover:from-red-600 hover:to-red-800 transition-all duration-200 hover:scale-105">
                        Generate Reports
                    </button>
                </div>
            </div>

            <!-- Attendance Overview -->
            <div class="bg-gradient-to-br from-white to-blue-50 rounded-xl shadow p-6 border border-gray-200 animate-fade-in animate-delay-300">
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
            <div class="bg-gradient-to-br from-white to-blue-50 rounded-xl shadow p-6 border border-gray-200 animate-fade-in animate-delay-400">
                <h2 class="text-xl font-semibold mb-4 text-gray-800">Recent Leave Requests Table</h2>
                <table class="w-full border-collapse text-left">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="p-3">Employee Name</th>
                            <th class="p-3">Leave Type</th>
                            <th class="p-3">From Date</th>
                            <th class="p-3">To Date</th>
                            <th class="p-3">Status</th>
                            <th class="p-3">Action Buttons</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-t hover:bg-gray-50">
                            <td class="p-3">John Doe</td>
                            <td class="p-3">Sick Leave</td>
                            <td class="p-3">20 Jul</td>
                            <td class="p-3">22 Jul</td>
                            <td class="p-3"><span class="px-2 py-1 text-xs font-semibold text-yellow-800 bg-yellow-200 rounded-full">Pending</span></td>
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
                            <td class="p-3"><span class="px-2 py-1 text-xs font-semibold text-green-800 bg-green-200 rounded-full">Approved</span></td>
                            <td class="p-3">
                                <button class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600">Approve</button>
                                <button class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 ml-2">Reject</button>
                            </td>
                        </tr>
                        <tr class="border-t hover:bg-gray-50">
                            <td class="p-3">Bob Johnson</td>
                            <td class="p-3">Annual Leave</td>
                            <td class="p-3">15 Aug</td>
                            <td class="p-3">20 Aug</td>
                            <td class="p-3"><span class="px-2 py-1 text-xs font-semibold text-yellow-800 bg-yellow-200 rounded-full">Pending</span></td>
                            <td class="p-3">
                                <button class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600">Approve</button>
                                <button class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 ml-2">Reject</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Upcoming Birthdays & Anniversaries Section -->
            <div class="bg-gradient-to-br from-white to-blue-50 rounded-xl shadow p-6 border border-gray-200 animate-fade-in animate-delay-600">
                <h2 class="text-xl font-semibold mb-4 text-gray-800">Upcoming Birthdays & Anniversaries</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                    <!-- Example Card 1: Birthday -->
                    <div class="flex items-center gap-4 p-4 bg-gray-50 rounded-lg border border-gray-100">
                        <img src="/placeholder.svg?height=64&width=64" alt="Employee Photo" class="w-16 h-16 rounded-full object-cover border-2 border-blue-300">
                        <div>
                            <h3 class="font-semibold text-gray-800">Jane Doe</h3>
                            <p class="text-sm text-gray-600">Birthday: August 10th</p>
                        </div>
                    </div>
                    <!-- Example Card 2: Anniversary -->
                    <div class="flex items-center gap-4 p-4 bg-gray-50 rounded-lg border border-gray-100">
                        <img src="/placeholder.svg?height=64&width=64" alt="Employee Photo" class="w-16 h-16 rounded-full object-cover border-2 border-green-300">
                        <div>
                            <h3 class="font-semibold text-gray-800">Michael Brown</h3>
                            <p class="text-sm text-gray-600">Anniversary: September 5th</p>
                        </div>
                    </div>
                    <!-- Example Card 3: Birthday -->
                    <div class="flex items-center gap-4 p-4 bg-gray-50 rounded-lg border border-gray-100">
                        <img src="/placeholder.svg?height=64&width=64" alt="Employee Photo" class="w-16 h-16 rounded-full object-cover border-2 border-purple-300">
                        <div>
                            <h3 class="font-semibold text-gray-800">Sarah Lee</h3>
                            <p class="text-sm text-gray-600">Birthday: October 22nd</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Performance Overview / KPI Section -->
            <div class="bg-gradient-to-br from-white to-blue-50 rounded-xl shadow p-6 border border-gray-200 animate-fade-in animate-delay-700">
                <h2 class="text-xl font-semibold mb-4 text-gray-800">Performance Overview</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="p-4 bg-blue-50 rounded-lg border border-blue-100">
                        <h3 class="text-lg font-semibold text-gray-700 mb-2">Attendance Compliance</h3>
                        <div class="w-full bg-gray-200 rounded-full h-4">
                            <div class="bg-blue-600 h-4 rounded-full transition-all duration-500 ease-out" style="width: 92%;"></div>
                        </div>
                        <p class="text-right text-blue-600 font-bold mt-2">92%</p>
                    </div>
                    <div class="p-4 bg-green-50 rounded-lg border border-green-100">
                        <h3 class="text-lg font-semibold text-gray-700 mb-2">Project Completion</h3>
                        <div class="w-full bg-gray-200 rounded-full h-4">
                            <div class="bg-green-600 h-4 rounded-full transition-all duration-500 ease-out" style="width: 75%;"></div>
                        </div>
                        <p class="text-right text-green-600 font-bold mt-2">75%</p>
                    </div>
                </div>
            </div>

            <!-- Announcements & Notices Section -->
            <div class="bg-gradient-to-br from-white to-blue-50 rounded-xl shadow p-6 border border-gray-200 animate-fade-in animate-delay-800">
                <h2 class="text-xl font-semibold mb-4 text-gray-800">Announcements & Notices</h2>
                <div class="max-h-60 overflow-y-auto space-y-4 pr-2">
                    <div class="p-3 bg-gray-50 rounded-lg border border-gray-100">
                        <h3 class="font-semibold text-gray-800">Company Holiday on July 4th</h3>
                        <p class="text-sm text-gray-600 mt-1">Please note that the office will be closed on July 4th in observance of Independence Day.</p>
                        <p class="text-xs text-gray-500 mt-2">Posted: July 1, 2025</p>
                    </div>
                    <div class="p-3 bg-gray-50 rounded-lg border border-gray-100">
                        <h3 class="font-semibold text-gray-800">New Employee Onboarding Session</h3>
                        <p class="text-sm text-gray-600 mt-1">A mandatory onboarding session for all new employees will be held on July 15th at 10 AM in Conference Room B.</p>
                        <p class="text-xs text-gray-500 mt-2">Posted: June 28, 2025</p>
                    </div>
                    <div class="p-3 bg-gray-50 rounded-lg border border-gray-100">
                        <h3 class="font-semibold text-gray-800">IT System Maintenance</h3>
                        <p class="text-sm text-gray-600 mt-1">Scheduled IT system maintenance will occur on July 20th from 1 AM to 5 AM. Services may be temporarily interrupted.</p>
                        <p class="text-xs text-gray-500 mt-2">Posted: June 25, 2025</p>
                    </div>
                    <div class="p-3 bg-gray-50 rounded-lg border border-gray-100">
                        <h3 class="font-semibold text-gray-800">Employee Wellness Program Launch</h3>
                        <p class="text-sm text-gray-600 mt-1">Join our new employee wellness program starting August 1st! Details on activities and benefits will be shared soon.</p>
                        <p class="text-xs text-gray-500 mt-2">Posted: June 20, 2025</p>
                    </div>
                </div>
            </div>

            <!-- Motivational Quote Section -->
            <div class="bg-gradient-to-br from-white to-blue-50 rounded-xl shadow p-6 border border-gray-200 text-center animate-fade-in animate-delay-900">
                <p class="text-xl font-semibold text-gray-800 italic">
                    "The only way to do great work is to love what you do."
                </p>
                <p class="text-sm text-gray-600 mt-2">- Steve Jobs</p>
            </div>
        </div>
    </div>

    <!-- Include Chart.js for graphs -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
