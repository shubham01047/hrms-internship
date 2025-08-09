<x-app-layout>
    <div class="theme-app">
        <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
            <div class="px-4 sm:px-6 lg:px-8 py-6 text-black">

                {{-- Custom styles for this page --}}
                <style>
                    /* Poppins font is assumed to be loaded by x-app-layout or globally */
                    body {
                        font-family: 'Poppins', sans-serif;
                    }

                    /* Gantt Chart Styles */
                    .gantt-container {
                        background: white;
                        border-radius: 8px;
                        border: 1px solid #e5e7eb;
                        overflow: hidden;
                    }

                    .gantt-header {
                        background: #f9fafb;
                        border-bottom: 1px solid #e5e7eb;
                        padding: 1rem;
                        display: flex;
                        justify-content: space-between;
                        align-items: center;
                    }

                    .gantt-view-toggle {
                        display: flex;
                        background: white;
                        border-radius: 6px;
                        border: 1px solid #d1d5db;
                        overflow: hidden;
                    }

                    .gantt-view-toggle button {
                        padding: 0.5rem 1rem;
                        font-size: 0.875rem;
                        font-weight: 500;
                        border: none;
                        background: transparent;
                        cursor: pointer;
                        transition: all 0.2s;
                    }

                    .gantt-view-toggle button.active {
                        background-color: var(--primary-bg);
                        color: var(--primary-text);
                    }

                    .gantt-view-toggle button:not(.active):hover {
                        background: #f3f4f6;
                    }

                    .gantt-main {
                        display: flex;
                    }

                    .gantt-task-list {
                        width: 320px;
                        border-right: 1px solid #e5e7eb;
                        background: #f9fafb;
                    }

                    .gantt-task-list-header {
                        height: 48px;
                        border-bottom: 1px solid #e5e7eb;
                        background: #f3f4f6;
                        display: flex;
                        align-items: center;
                        padding: 0 1rem;
                        font-weight: 600;
                        color: #374151;
                        font-size: 0.875rem;
                    }

                    .gantt-task-item {
                        height: 48px;
                        border-bottom: 1px solid #e5e7eb;
                        display: flex;
                        align-items: center;
                        padding: 0 1rem;
                        cursor: pointer;
                        transition: background-color 0.2s;
                    }

                    .gantt-task-item:hover {
                        background: #f3f4f6;
                    }

                    .gantt-task-item.selected {
                        background: #dbeafe;
                    }

                    .gantt-timeline {
                        flex: 1;
                        overflow-x: auto;
                    }

                    .gantt-timeline-header {
                        height: 48px;
                        border-bottom: 1px solid #e5e7eb;
                        background: #f3f4f6;
                        display: flex;
                    }

                    .gantt-timeline-cell {
                        border-right: 1px solid #e5e7eb;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        font-size: 0.75rem;
                        font-weight: 500;
                        color: #6b7280;
                        min-width: 120px;
                    }

                    .gantt-timeline-body {
                        position: relative;
                    }

                    .gantt-timeline-row {
                        height: 48px;
                        border-bottom: 1px solid #e5e7eb;
                        position: relative;
                    }

                    .gantt-timeline-row:nth-child(even) {
                        background: #fafafa;
                    }

                    .gantt-timeline-grid {
                        position: absolute;
                        top: 0;
                        bottom: 0;
                        border-right: 1px solid #e5e7eb;
                        min-width: 120px;
                    }

                    .gantt-task-bar {
                        position: absolute;
                        top: 8px;
                        bottom: 8px;
                        border-radius: 4px;
                        cursor: pointer;
                        transition: all 0.2s;
                        display: flex;
                        align-items: center;
                        padding: 0 8px;
                        color: white;
                        font-size: 0.75rem;
                        font-weight: 500;
                        min-width: 20px;
                    }

                    .gantt-task-bar:hover {
                        transform: translateY(-1px);
                        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
                    }

                    .gantt-task-bar.completed {
                        background: linear-gradient(90deg, #10b981, #059669);
                    }

                    .gantt-task-bar.in-progress {
                        background-color: var(--primary-bg);
                    }

                    .gantt-task-bar.planning {
                        background: linear-gradient(90deg, #f59e0b, #d97706);
                    }

                    .gantt-task-bar.on-hold {
                        background: linear-gradient(90deg, #ef4444, #dc2626);
                    }

                    .gantt-progress-bar {
                        position: absolute;
                        top: 0;
                        left: 0;
                        bottom: 0;
                        background: rgba(0, 0, 0, 0.2);
                        border-radius: 4px 0 0 4px;
                        transition: width 1.5s ease-in-out;
                    }

                    .gantt-task-details {
                        border-top: 1px solid #e5e7eb;
                        background: #f9fafb;
                        padding: 1rem;
                    }

                    .status-dot {
                        width: 12px;
                        height: 12px;
                        border-radius: 50%;
                        margin-right: 12px;
                        flex-shrink: 0;
                    }

                    .status-dot.completed { background: #10b981; }
                    .status-dot.in-progress { background-color: var(--primary-bg); }
                    .status-dot.planning { background: #f59e0b; }
                    .status-dot.on-hold { background: #ef4444; }

                    /* Analog Clock Styles */
                    .analog-clock-wrapper {
                        width: 80px; /* Default for mobile */
                        height: 100px; /* Default for mobile, adjusted for text */
                        flex-shrink: 0;
                        display: flex;
                        flex-direction: column;
                        align-items: center;
                        justify-content: center;
                    }

                    .analog-clock {
                        width: 80px; /* Default for mobile */
                        height: 80px; /* Default for mobile */
                        border: 4px solid rgba(255, 255, 255, 0.3);
                        border-radius: 50%;
                        position: relative;
                        background: rgba(255, 255, 255, 0.1);
                        backdrop-filter: blur(10px);
                    }

                    .clock-center {
                        position: absolute;
                        top: 50%;
                        left: 50%;
                        width: 8px;
                        height: 8px;
                        background: white;
                        border-radius: 50%;
                        transform: translate(-50%, -50%);
                        z-index: 10;
                    }

                    .clock-hand {
                        position: absolute;
                        background: white;
                        transform-origin: bottom center;
                        border-radius: 2px;
                    }

                    .hour-hand {
                        width: 3px;
                        height: 20px; /* Adjusted for mobile size */
                        top: 25%; /* Adjusted for mobile size */
                        left: 50%;
                        margin-left: -1.5px;
                    }

                    .minute-hand {
                        width: 2px;
                        height: 25px; /* Adjusted for mobile size */
                        top: 20%; /* Adjusted for mobile size */
                        left: 50%;
                        margin-left: -1px;
                    }

                    .second-hand {
                        width: 1px;
                        height: 30px; /* Adjusted for mobile size */
                        top: 17.5%; /* Adjusted for mobile size */
                        left: 50%;
                        margin-left: -0.5px;
                        background: #ef4444;
                    }

                    /* Clock Numbers */
                    .clock-number {
                        position: absolute;
                        color: white;
                        font-size: 10px; /* Adjusted for mobile size */
                        font-weight: bold;
                        transform: translate(-50%, -50%);
                    }

                    /* Responsive Design for Clocks */
                    @media (min-width: 640px) { /* sm breakpoint */
                        .analog-clock-wrapper {
                            width: 120px;
                            height: 150px;
                        }
                        .analog-clock {
                            width: 120px;
                            height: 120px;
                        }
                        .hour-hand {
                            height: 30px;
                            top: 20%;
                        }
                        .minute-hand {
                            height: 40px;
                            top: 15%;
                        }
                        .second-hand {
                            height: 45px;
                            top: 12.5%;
                        }
                        .clock-number {
                            font-size: 12px;
                        }
                    }

                    /* General Responsive Adjustments */
                    @media (max-width: 640px) {
                        .gantt-task-list {
                            width: 250px;
                        }

                        .gantt-timeline-cell {
                            min-width: 80px;
                        }

                        .gantt-timeline-grid {
                            min-width: 80px;
                        }
                    }
                </style>

                <div class="py-4 sm:py-8 lg:py-12 bg-gray-100 min-h-screen">
                    <div class="grid grid-cols-1 gap-4 sm:gap-6">

                        <!-- Welcome Header with Clocks -->
                        <div class="theme-app text-white p-4 sm:p-6 lg:p-8 rounded-xl shadow-lg relative overflow-hidden"
                            style="background: linear-gradient(135deg, var(--primary-bg), var(--secondary-bg));">
                            
                            <div class="relative z-10 flex flex-col lg:flex-row items-center justify-between gap-4 sm:gap-6 lg:gap-8">
                                <!-- Welcome Message -->
                                <div class="text-left mb-6 sm:mb-8 lg:mb-0 flex-1">
                                    <h1 class="text-2xl sm:text-3xl lg:text-4xl font-bold mb-2">Welcome, {{ Auth::user()->name }}!</h1>
                                    <p class="text-base sm:text-lg lg:text-xl opacity-90">Here's your quick overview for today</p>
                                </div>

                                <!-- Clocks Section - Now using Grid for stability -->
                                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 sm:gap-6 lg:gap-8 items-center justify-items-center w-full lg:w-auto">
                                    <!-- Analog Clock Wrapper -->
                                    <div class="analog-clock-wrapper">
                                        <div class="analog-clock" id="analog-clock">
                                            <!-- Clock Numbers -->
                                            <div class="clock-number" style="top: 8px; left: 50%;">12</div>
                                            <div class="clock-number" style="top: 50%; right: 8px;">3</div>
                                            <div class="clock-number" style="bottom: 8px; left: 50%;">6</div>
                                            <div class="clock-number" style="top: 50%; left: 8px;">9</div>
                                            
                                            <!-- Clock Hands -->
                                            <div class="clock-hand hour-hand" id="hour-hand"></div>
                                            <div class="clock-hand minute-hand" id="minute-hand"></div>
                                            <div class="clock-hand second-hand" id="second-hand"></div>
                                            <div class="clock-center"></div>
                                        </div>
                                        <p class="text-center mt-2 text-sm opacity-75">Analog</p>
                                    </div>

                                    <!-- Digital Clock -->
                                    <div class="text-center flex-shrink-0 w-full sm:w-auto">
                                        <div id="digital-time" class="text-4xl sm:text-5xl lg:text-7xl font-bold mb-2">00:00:00</div>
                                        <div id="digital-date" class="text-sm sm:text-base lg:text-lg opacity-90">Loading...</div>
                                        <div id="digital-ampm" class="text-xs sm:text-sm opacity-75 mt-1">AM</div>
                                        <p class="text-center mt-2 text-sm opacity-75">Digital</p>
                                    </div>

                                    <!-- Time Zone Info -->
                                    <div class="text-center flex-shrink-0 w-full sm:w-auto">
                                        <div class="bg-white bg-opacity-20 rounded-lg p-3 sm:p-4 backdrop-filter backdrop-blur-sm">
                                            <div class="text-xs sm:text-sm opacity-75 mb-1">Current Time Zone</div>
                                            <div id="timezone" class="font-semibold text-sm sm:text-base">Loading...</div>
                                            <div class="text-xs opacity-60 mt-2">
                                                <div id="utc-offset">UTC+0</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Recent Activities / Updates Section -->
                        <div class="bg-white rounded-xl shadow p-4 sm:p-6 border border-gray-200">
                            <div class="p-3 sm:p-4 rounded-t-xl mb-4 text-white" style="background: linear-gradient(135deg, var(--primary-bg), var(--secondary-bg));">
                                <h2 class="text-lg sm:text-xl font-semibold">Recent Activities / Updates</h2>
                            </div>
                            <div class="max-h-60 overflow-y-auto space-y-3 pr-2">
                                <div class="flex items-start gap-3 p-3 bg-gray-50 rounded-lg border border-gray-100">
                                    <div>
                                        <p class="text-xs text-gray-500">5 minutes ago</p>
                                        <p class="font-semibold text-gray-800 text-sm sm:text-base">New user 'Alice Johnson' registered.</p>
                                    </div>
                                </div>
                                <div class="flex items-start gap-3 p-3 bg-gray-50 rounded-lg border border-gray-100">
                                    <div>
                                        <p class="text-xs text-gray-500">2 minutes ago</p>
                                        <p class="font-semibold text-gray-800 text-sm sm:text-base">Approved leave request for John Doe.</p>
                                    </div>
                                </div>
                                <div class="flex items-start gap-3 p-3 bg-gray-50 rounded-lg border border-gray-100">
                                    <div>
                                        <p class="text-xs text-gray-500">1 hour ago</p>
                                        <p class="font-semibold text-gray-800 text-sm sm:text-base">Project "New Dashboard UI" updated by Alice Johnson.</p>
                                    </div>
                                </div>
                                <div class="flex items-start gap-3 p-3 bg-gray-50 rounded-lg border border-gray-100">
                                    <div>
                                        <p class="text-xs text-gray-500">Yesterday</p>
                                        <p class="font-semibold text-gray-800 text-sm sm:text-base">2 pending expense report approvals.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Quick Stats -->
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
                        </div>

                        <!-- Notifications and Quick Actions Wrapper -->
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 sm:gap-6">
                            <!-- Notifications Section -->
                            <div class="bg-white p-4 sm:p-6 rounded-xl shadow-lg border-gray-200 border">
                                <h2 class="text-xl sm:text-2xl font-bold text-gray-800 mb-4">Notifications</h2>
                                <ul class="space-y-3">
                                    <li class="flex items-center gap-3 text-gray-700 p-2 rounded-md hover:bg-gray-50 transition-colors">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 sm:h-6 sm:w-6 text-green-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                                        <span class="text-sm sm:text-base">Leave approved for John Doe.</span>
                                    </li>
                                    <li class="flex items-center gap-3 text-gray-700 p-2 rounded-md hover:bg-gray-50 transition-colors">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 sm:h-6 sm:w-6 text-yellow-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"/><line x1="12" x2="12" y1="9" y2="13"/><line x1="12" x2="12.01" y1="17" y2="17"/></svg>
                                        <span class="text-sm sm:text-base">Task "Website Redesign" deadline is tomorrow.</span>
                                    </li>
                                    <li class="flex items-center gap-3 text-gray-700 p-2 rounded-md hover:bg-gray-50 transition-colors">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 sm:h-6 sm:w-6 text-green-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                                        <span class="text-sm sm:text-base">New employee, Jane Smith, has joined the team.</span>
                                    </li>
                                </ul>
                            </div>

                            <!-- Quick Actions Section -->
                            <div class="bg-white p-4 sm:p-6 rounded-xl shadow-lg border-gray-200 border">
                                <div class="p-3 sm:p-4 rounded-t-xl mb-4 text-white" style="background: linear-gradient(135deg, var(--primary-bg), var(--secondary-bg));">
                                    <h2 class="text-lg sm:text-xl font-semibold">Quick Actions</h2>
                                </div>
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 sm:gap-4">
                                    <a href="#" class="flex flex-col items-center justify-center p-3 sm:p-4 rounded-xl text-white text-center
                                                      shadow-md
                                                      hover:scale-105 hover:shadow-xl transition-all duration-300 ease-in-out" style="background: linear-gradient(135deg, var(--primary-bg), var(--secondary-bg)); color: var(--primary-text);">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 sm:h-8 sm:w-8 mb-2" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><line x1="19" x2="19" y1="8" y2="14"/><line x1="22" x2="16" y1="11" y2="11"/></svg>
                                        <span class="font-semibold text-sm sm:text-base">Add Employee</span>
                                    </a>
                                    <a href="#" class="flex flex-col items-center justify-center p-3 sm:p-4 rounded-xl text-white text-center
                                                      shadow-md
                                                      hover:scale-105 hover:shadow-xl transition-all duration-300 ease-in-out" style="background: linear-gradient(135deg, var(--primary-bg), var(--secondary-bg)); color: var(--primary-text);">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 sm:h-8 sm:w-8 mb-2" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M8 2v4"/><path d="M16 2v4"/><path d="M21 13V7a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h8"/><path d="M3 10h18"/><path d="M19 16v6"/><path d="M22 19h-6"/></svg>
                                        <span class="font-semibold text-sm sm:text-base">Add Holiday</span>
                                    </a>
                                    <a href="#" class="flex flex-col items-center justify-center p-3 sm:p-4 rounded-xl text-white text-center
                                                      shadow-md
                                                      hover:scale-105 hover:shadow-xl transition-all duration-300 ease-in-out" style="background: linear-gradient(135deg, var(--primary-bg), var(--secondary-bg)); color: var(--primary-text);">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 sm:h-8 sm:w-8 mb-2" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 20h16a2 2 0 0 0 2-2V8a2 2 0 0 0-2-2h-7.93a2 2 0 0 1-1.66-.9l-.82-1.2A2 2 0 0 0 4.32 2H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2z"/><line x1="12" x2="12" y1="10" y2="16"/><line x1="9" x2="15" y1="13" y2="13"/></svg>
                                        <span class="font-semibold text-sm sm:text-base">Create Project</span>
                                    </a>
                                    <a href="#" class="flex flex-col items-center justify-center p-3 sm:p-4 rounded-xl text-white text-center
                                                      shadow-md
                                                      hover:scale-105 hover:shadow-xl transition-all duration-300 ease-in-out" style="background: linear-gradient(135deg, var(--primary-bg), var(--secondary-bg)); color: var(--primary-text);">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 sm:h-8 sm:w-8 mb-2" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"/><polyline points="14 2 14 8 20 8"/><line x1="16" x2="8" y1="13" y2="13"/><line x1="16" x2="8" y1="17" y2="17"/><line x1="10" x2="8" y1="9" y2="9"/></svg>
                                        <span class="font-semibold text-sm sm:text-base">Generate Report</span>
                                    </a>
                                </div>
                            </div>
                        </div>

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

                        <!-- Attendance Overview -->
                        <div class="bg-white rounded-xl shadow p-4 sm:p-6 border-gray-200 border">
                            <div class="p-3 sm:p-4 rounded-t-xl mb-4 text-white" style="background: linear-gradient(135deg, var(--primary-bg), var(--secondary-bg));">
                                <h2 class="text-lg sm:text-xl font-semibold">Attendance Overview</h2>
                            </div>
                            <div class="grid grid-cols-2 sm:grid-cols-4 gap-3 sm:gap-4">
                                <div class="p-3 sm:p-4 bg-blue-100 rounded-lg text-center hover:shadow-md transition-all duration-200 hover:scale-[1.01]">
                                    <h3 class="text-gray-700 text-xs sm:text-sm">Punch-in Today</h3>
                                    <p class="text-xl sm:text-2xl font-bold" style="color: var(--primary-bg);">{{ $todayPunchInCount }}</p>
                                </div>
                                <div class="p-3 sm:p-4 bg-yellow-100 rounded-lg text-center hover:shadow-md transition-all duration-200 hover:scale-[1.01]">
                                    <h3 class="text-gray-700 text-xs sm:text-sm">Late Comers</h3>
                                    <p class="text-xl sm:text-2xl font-bold text-yellow-600">12</p>
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
                        </div>

                        <!-- Recruitment Status Panel -->
                        <div class="bg-white rounded-xl shadow p-4 sm:p-6 border-gray-200 border">
                            <div class="p-3 sm:p-4 rounded-t-xl mb-4 text-white" style="background: linear-gradient(135deg, var(--primary-bg), var(--secondary-bg));">
                                <h2 class="text-lg sm:text-xl font-semibold">Recruitment Status</h2>
                            </div>
                            <div class="grid grid-cols-1 sm:grid-cols-3 gap-3 sm:gap-4">
                                <div class="p-3 sm:p-4 bg-blue-100 rounded-lg text-center flex flex-col items-center gap-2 hover:shadow-md transition-all duration-200 hover:scale-[1.01]">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 sm:h-7 sm:w-7" style="color: var(--primary-bg);" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                                    <h3 class="text-gray-700 text-sm sm:text-lg font-semibold">Open Positions</h3>
                                    <p class="text-2xl sm:text-4xl font-extrabold" style="color: var(--primary-bg);">15</p>
                                </div>
                                <div class="p-3 sm:p-4 bg-green-100 rounded-lg text-center flex flex-col items-center gap-2 hover:shadow-md transition-all duration-200 hover:scale-[1.01]">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 sm:h-7 sm:w-7 text-green-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><path d="m9 12 2 2 4-4"/></svg>
                                    <h3 class="text-gray-700 text-sm sm:text-lg font-semibold">Candidates in Interview</h3>
                                    <p class="text-2xl sm:text-4xl font-extrabold text-green-600">25</p>
                                </div>
                                <div class="p-3 sm:p-4 bg-purple-100 rounded-lg text-center flex flex-col items-center gap-2 hover:shadow-md transition-all duration-200 hover:scale-[1.01]">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 sm:h-7 sm:w-7 text-purple-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"/><polyline points="14 2 14 8 20 8"/><line x1="16" x2="8" y1="13" y2="13"/><line x1="16" x2="8" y1="17" y2="17"/><line x1="10" x2="8" y1="9" y2="9"/></svg>
                                    <h3 class="text-gray-700 text-sm sm:text-lg font-semibold">Offers Released</h3>
                                    <p class="text-2xl sm:text-4xl font-extrabold text-purple-600">07</p>
                                </div>
                            </div>
                        </div>

                     <!-- Top Performer of the Month Box -->
@if($topPerformer && $topPerformer->user)
    <div class="bg-white rounded-xl shadow p-4 sm:p-6 border-gray-200 border hover:shadow-xl transition-all duration-200 hover:scale-[1.01] text-center">
        <h2 class="text-lg sm:text-xl font-semibold text-gray-800 mb-4">Top Performer of the Month</h2>
        <div class="flex flex-col items-center justify-center gap-3">
            <div id="initials-circle" class="w-16 h-16 sm:w-20 sm:h-20 rounded-full bg-green-100 text-green-700 font-bold text-xl sm:text-2xl flex items-center justify-center shadow-md">
                <!-- Initials will be injected by JS -->
            </div>
            <p class="text-xl sm:text-2xl font-bold text-green-600">{{ $topPerformer->user->name }}</p>
            <p class="text-base sm:text-lg text-gray-700">
                Total Hours:
                <span class="font-bold">{{ $topPerformer->total_hours }}</span>
            </p>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const fullName = @json($topPerformer->user->name);
            const initials = fullName
                .split(' ')
                .map(word => word.charAt(0).toUpperCase())
                .join('')
                .slice(0, 2); // only first 2 letters

            document.getElementById('initials-circle').textContent = initials;
        });
    </script>
@else
    <div class="bg-white rounded-xl shadow p-4 sm:p-6 border-gray-200 border text-center">
        <p class="text-gray-500">No top performer data available.</p>
    </div>
@endif

                        <!-- Upcoming Deadlines Section -->
                        <div class="bg-white rounded-xl shadow p-4 sm:p-6 border-gray-200 border">
                            <div class="p-3 sm:p-4 rounded-t-xl mb-4 text-white" style="background: linear-gradient(135deg, var(--primary-bg), var(--secondary-bg));">
                                <h2 class="text-lg sm:text-xl font-semibold">Upcoming Deadlines</h2>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-3 sm:gap-4">
                                <div class="p-3 sm:p-4 bg-gray-50 rounded-lg border border-gray-100 flex items-center gap-3 sm:gap-4 hover:shadow-md transition-all duration-200 hover:scale-[1.01]">
                                    <i class="bi bi-calendar-x-fill text-red-500 text-2xl sm:text-3xl"></i>
                                    <div>
                                        <h3 class="font-semibold text-gray-800 text-sm sm:text-base">Project Alpha Final Review</h3>
                                        <p class="text-xs sm:text-sm text-gray-600">Deadline: July 28, 2025</p>
                                    </div>
                                </div>
                                <div class="p-3 sm:p-4 bg-gray-50 rounded-lg border border-gray-100 flex items-center gap-3 sm:gap-4 hover:shadow-md transition-all duration-200 hover:scale-[1.01]">
                                    <i class="bi bi-calendar-x-fill text-red-500 text-2xl sm:text-3xl"></i>
                                    <div>
                                        <h3 class="font-semibold text-gray-800 text-sm sm:text-base">Marketing Campaign Launch</h3>
                                        <p class="text-xs sm:text-sm text-gray-600">Deadline: August 5, 2025</p>
                                    </div>
                                </div>
                                <div class="p-3 sm:p-4 bg-gray-50 rounded-lg border border-gray-100 flex items-center gap-3 sm:gap-4 hover:shadow-md transition-all duration-200 hover:scale-[1.01]">
                                    <i class="bi bi-calendar-x-fill text-red-500 text-2xl sm:text-3xl"></i>
                                    <div>
                                        <h3 class="font-semibold text-gray-800 text-sm sm:text-base">Q3 Financial Report</h3>
                                        <p class="text-xs sm:text-sm text-gray-600 mt-1">Deadline: September 10, 2025</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Upcoming Birthdays & Anniversaries Section -->
                        <div class="bg-white rounded-xl shadow p-4 sm:p-6 border-gray-200 border">
                            <div class="p-3 sm:p-4 rounded-t-xl mb-4 text-white" style="background: linear-gradient(135deg, var(--primary-bg), var(--secondary-bg));">
                                <h2 class="text-lg sm:text-xl font-semibold">Upcoming Birthdays</h2>
                            </div>

                            @if($employeesWithBirthdayTomorrow->count())
                                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3 sm:gap-4">
                                    @foreach($employeesWithBirthdayTomorrow as $employee)
                                        <div class="flex items-center gap-3 sm:gap-4 p-3 sm:p-4 bg-gray-50 rounded-lg border border-gray-100 hover:shadow-md transition-all duration-200 hover:scale-[1.01]">
                                            <img src="{{ $employee->profile_photo ? asset('storage/' . $employee->profile_photo) : '/placeholder.svg?height=64&width=64' }}" alt="Employee Photo" class="w-12 h-12 sm:w-16 sm:h-16 rounded-full object-cover border-2" style="border-color: var(--primary-bg);">
                                            <div>
                                                <h3 class="font-semibold text-gray-800 text-sm sm:text-base">
                                                    {{ $employee->first_name }} {{ $employee->last_name }}
                                                </h3>
                                                <p class="text-xs sm:text-sm text-gray-600">
                                                    Birthday: {{ \Carbon\Carbon::parse($employee->date_of_birth)->format('F jS') }}
                                                </p>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <div class="text-center text-sm sm:text-base text-gray-600 py-6">
                                    🎉 No birthdays tomorrow.
                                </div>
                            @endif
                        </div>

                        <!-- Announcements & Notices Section -->
                        <div class="bg-white rounded-xl shadow p-4 sm:p-6 border-gray-200 border">
                            <div class="p-3 sm:p-4 rounded-t-xl mb-4 text-white" style="background: linear-gradient(135deg, var(--primary-bg), var(--secondary-bg));">
                                <h2 class="text-lg sm:text-xl font-semibold">Announcements & Notices</h2>
                            </div>
                            <div class="max-h-60 overflow-y-auto space-y-3 sm:space-y-4 pr-2">
                                <div class="p-3 bg-gray-50 rounded-lg border border-gray-100 hover:shadow-md transition-all duration-200 hover:scale-[1.01]">
                                    <h3 class="font-semibold text-gray-800 text-sm sm:text-base">Company Holiday on July 4th</h3>
                                    <p class="text-xs sm:text-sm text-gray-600 mt-1">Please note that the office will be closed on July 4th in observance of Independence Day.</p>
                                    <p class="text-xs text-gray-500 mt-2">Posted: July 1, 2025</p>
                                </div>
                                <div class="p-3 bg-gray-50 rounded-lg border border-gray-100 hover:shadow-md transition-all duration-200 hover:scale-[1.01]">
                                    <h3 class="font-semibold text-gray-800 text-sm sm:text-base">New Employee Onboarding Session</h3>
                                    <p class="text-xs sm:text-sm text-gray-600 mt-1">A mandatory onboarding session for all new employees will be held on July 15th at 10 AM in Conference Room B.</p>
                                    <p class="text-xs text-gray-500 mt-2">Posted: June 28, 2025</p>
                                </div>
                                <div class="p-3 bg-gray-50 rounded-lg border border-gray-100 hover:shadow-md transition-all duration-200 hover:scale-[1.01]">
                                    <h3 class="font-semibold text-gray-800 text-sm sm:text-base">IT System Maintenance</h3>
                                    <p class="text-xs sm:text-sm text-gray-600 mt-1">Scheduled IT system maintenance will occur on July 20th from 1 AM to 5 AM. Services may be temporarily interrupted.</p>
                                    <p class="text-xs text-gray-500 mt-2">Posted: June 25, 2025</p>
                                </div>
                            </div>
                        </div>

                        <!-- HR Policies Section -->
                        <div class="bg-white rounded-xl shadow p-4 sm:p-6 border-gray-200 border">
                            <div class="p-3 sm:p-4 rounded-t-xl mb-4 text-white" style="background: linear-gradient(135deg, var(--primary-bg), var(--secondary-bg));">
                                <h2 class="text-lg sm:text-xl font-semibold">HR Policies</h2>
                            </div>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 sm:gap-4">
                                <button class="flex items-center justify-center p-3 sm:p-4 rounded-lg text-white font-semibold shadow-md hover:scale-105 transition-all duration-200" style="background: linear-gradient(135deg, var(--primary-bg), var(--secondary-bg)); color: var(--primary-text);">
                                    <i class="bi bi-file-earmark-text-fill text-xl sm:text-2xl mr-2"></i>
                                    <span class="text-sm sm:text-base">Download Policies</span>
                                </button>
                                <button class="flex items-center justify-center p-3 sm:p-4 rounded-lg text-white font-semibold shadow-md hover:scale-105 transition-all duration-200" style="background: linear-gradient(135deg, var(--primary-bg), var(--secondary-bg)); color: var(--primary-text);">
                                    <i class="bi bi-book-fill text-xl sm:text-2xl mr-2"></i>
                                    <span class="text-sm sm:text-base">View Guidelines</span>
                                </button>
                            </div>
                        </div>

                        <!-- Motivational Quote Section -->
                        <div class="bg-white rounded-xl shadow p-4 sm:p-6 border-gray-200 border hover:shadow-xl transition-all duration-200 hover:scale-[1.01]">
                            <p class="text-lg sm:text-xl font-semibold text-gray-800 italic">
                                "The only way to do great work is to love what you do."
                            </p>
                            <p class="text-sm text-gray-600 mt-2">- Steve Jobs</p>
                        </div>
                    </div>
                </div>

                <script>
                    // Sample project data (kept for Gantt chart JS logic, though PHP table is used)
                    const projects = [
                        {
                            id: 1,
                            name: 'E-Commerce Platform',
                            assignee: 'Alice Johnson',
                            status: 'completed',
                            progress: 100,
                            startDate: new Date('2025-07-01'),
                            endDate: new Date('2025-08-15')
                        },
                        {
                            id: 2,
                            name: 'Mobile App Redesign',
                            assignee: 'Bob Williams',
                            status: 'completed',
                            progress: 100,
                            startDate: new Date('2025-06-15'),
                            endDate: new Date('2025-07-20')
                        },
                        {
                            id: 3,
                            name: 'CRM Integration',
                            assignee: 'Charlie Brown',
                            status: 'planning',
                            progress: 15,
                            startDate: new Date('2025-09-01'),
                            endDate: new Date('2025-10-30')
                        },
                        {
                            id: 4,
                            name: 'Data Analytics Dashboard',
                            assignee: 'Diana Prince',
                            status: 'in-progress',
                            progress: 60,
                            startDate: new Date('2025-07-15'),
                            endDate: new Date('2025-10-10')
                        },
                        {
                            id: 5,
                            name: 'Security Audit',
                            assignee: 'Eve Adams',
                            status: 'on-hold',
                            progress: 25,
                            startDate: new Date('2025-07-01'),
                            endDate: new Date('2025-08-01')
                        },
                        {
                            id: 6,
                            name: 'API Documentation',
                            assignee: 'Frank Miller',
                            status: 'in-progress',
                            progress: 90,
                            startDate: new Date('2025-07-20'),
                            endDate: new Date('2025-08-05')
                        }
                    ];

                    let currentView = 'weeks';
                    let selectedTask = null;

                    function updateClocks() {
                        const now = new Date();
                        
                        // Digital Clock
                        let hours = now.getHours();
                        let minutes = now.getMinutes();
                        let seconds = now.getSeconds();
                        const ampm = hours >= 12 ? 'PM' : 'AM';

                        // Convert to 12-hour format
                        const displayHours = hours % 12 || 12;
                        
                        // Format with leading zeros
                        const formattedTime = 
                            displayHours.toString().padStart(2, '0') + ':' +
                            minutes.toString().padStart(2, '0') + ':' +
                            seconds.toString().padStart(2, '0');
                        
                        document.getElementById('digital-time').textContent = formattedTime;
                        document.getElementById('digital-ampm').textContent = ampm;
                        
                        // Date
                        const options = { 
                            weekday: 'long', 
                            year: 'numeric', 
                            month: 'long', 
                            day: 'numeric' 
                        };
                        document.getElementById('digital-date').textContent = now.toLocaleDateString('en-US', options);
                        
                        // Timezone
                        const timezone = Intl.DateTimeFormat().resolvedOptions().timeZone;
                        document.getElementById('timezone').textContent = timezone;
                        
                        const offset = -now.getTimezoneOffset() / 60;
                        const offsetString = `UTC${offset >= 0 ? '+' : ''}${offset}`;
                        document.getElementById('utc-offset').textContent = offsetString;

                        // Analog Clock
                        const hourHand = document.getElementById('hour-hand');
                        const minuteHand = document.getElementById('minute-hand');
                        const secondHand = document.getElementById('second-hand');

                        if (hourHand && minuteHand && secondHand) {
                            const hourAngle = (hours % 12) * 30 + minutes * 0.5; // 30 degrees per hour + minute adjustment
                            const minuteAngle = minutes * 6 + seconds * 0.1; // 6 degrees per minute + second adjustment
                            const secondAngle = seconds * 6; // 6 degrees per second

                            hourHand.style.transform = `rotate(${hourAngle}deg)`;
                            minuteHand.style.transform = `rotate(${minuteAngle}deg)`;
                            secondHand.style.transform = `rotate(${secondAngle}deg)`;
                        }
                    }

                    function generateTimeScale() {
                        const startDate = new Date('2025-06-01');
                        const endDate = new Date('2025-11-30');
                        const scale = [];
                        const current = new Date(startDate);

                        while (current <= endDate) {
                            scale.push(new Date(current));
                            
                            if (currentView === 'days') {
                                current.setDate(current.getDate() + 1);
                            } else if (currentView === 'weeks') {
                                current.setDate(current.getDate() + 7);
                            } else {
                                current.setMonth(current.getMonth() + 1);
                            }
                        }

                        return scale;
                    }

                    function formatTimeScale(date) {
                        if (currentView === 'days') {
                            return date.toLocaleDateString('en-US', { month: 'short', day: 'numeric' });
                        } else if (currentView === 'weeks') {
                            const weekNum = Math.ceil(date.getDate() / 7);
                            return `Week ${weekNum}, ${date.toLocaleDateString('en-US', { month: 'short' })}`;
                        } else {
                            return date.toLocaleDateString('en-US', { month: 'short', year: 'numeric' });
                        }
                    }

                    function calculateTaskPosition(project, timeScale) {
                        const startDate = new Date('2025-06-01');
                        const endDate = new Date('2025-11-30');
                        const totalDays = (endDate - startDate) / (1000 * 60 * 60 * 24);
                        
                        const taskStart = Math.max(project.startDate.getTime(), startDate.getTime());
                        const taskEnd = Math.min(project.endDate.getTime(), endDate.getTime());
                        
                        const startOffset = (taskStart - startDate.getTime()) / (1000 * 60 * 60 * 24);
                        const duration = (taskEnd - taskStart) / (1000 * 60 * 60 * 24);
                        
                        const cellWidth = 120;
                        
                        return {
                            left: (startOffset / totalDays) * (timeScale.length * cellWidth),
                            width: Math.max((duration / totalDays) * (timeScale.length * cellWidth), 20)
                        };
                    }

                    function renderGanttChart() {
                        const timeScale = generateTimeScale();
                        const timelineHeader = document.getElementById('timeline-header');
                        const timelineBody = document.getElementById('timeline-body');

                        // Clear existing content
                        if (timelineHeader) timelineHeader.innerHTML = '';
                        if (timelineBody) timelineBody.innerHTML = '';

                        // Render timeline header
                        if (timelineHeader) {
                            timeScale.forEach(date => {
                                const cell = document.createElement('div');
                                cell.className = 'gantt-timeline-cell';
                                cell.textContent = formatTimeScale(date);
                                timelineHeader.appendChild(cell);
                            });
                        }

                        // Render timeline body
                        if (timelineBody) {
                            projects.forEach((project, index) => {
                                const row = document.createElement('div');
                                row.className = 'gantt-timeline-row';
                                
                                // Add grid lines
                                timeScale.forEach((_, gridIndex) => {
                                    const gridLine = document.createElement('div');
                                    gridLine.className = 'gantt-timeline-grid';
                                    gridLine.style.left = `${gridIndex * 120}px`;
                                    row.appendChild(gridLine);
                                });

                                // Add task bar
                                const position = calculateTaskPosition(project, timeScale);
                                const taskBar = document.createElement('div');
                                taskBar.className = `gantt-task-bar ${project.status}`;
                                taskBar.style.left = `${position.left}px`;
                                taskBar.style.width = `${position.width}px`;
                                taskBar.dataset.taskId = project.id;
                                
                                // Progress bar
                                const progressBar = document.createElement('div');
                                progressBar.className = 'gantt-progress-bar';
                                progressBar.style.width = `${project.progress}%`;
                                taskBar.appendChild(progressBar);
                                
                                // Task label
                                if (position.width > 60) {
                                    const label = document.createElement('span');
                                    label.textContent = project.name;
                                    label.style.position = 'relative';
                                    label.style.zIndex = '1';
                                    taskBar.appendChild(label);
                                }

                                // Click handler
                                taskBar.addEventListener('click', () => selectTask(project));
                                
                                row.appendChild(taskBar);
                                timelineBody.appendChild(row);
                            });
                        }
                    }

                    function selectTask(project) {
                        selectedTask = project;
                        
                        // Update task list selection
                        document.querySelectorAll('.gantt-task-item').forEach(item => {
                            item.classList.remove('selected');
                        });
                        const selectedItem = document.querySelector(`[data-task="${project.id}"]`);
                        if (selectedItem) {
                            selectedItem.classList.add('selected');
                        }
                        
                        // Show task details
                        const detailsPanel = document.getElementById('task-details');
                        const statusDot = document.getElementById('detail-status-dot');
                        const taskName = document.getElementById('detail-task-name');
                        const taskDates = document.getElementById('detail-task-dates');
                        const assignee = document.getElementById('detail-assignee');
                        const progress = document.getElementById('detail-progress');
                        
                        if (detailsPanel && statusDot && taskName && taskDates && assignee && progress) {
                            statusDot.className = `status-dot ${project.status}`;
                            taskName.textContent = project.name;
                            taskDates.textContent = `${project.startDate.toLocaleDateString()} - ${project.endDate.toLocaleDateString()}`;
                            assignee.textContent = project.assignee;
                            progress.textContent = project.progress;
                            
                            detailsPanel.style.display = 'block';
                        }
                    }

                    function setTimelineView(view) {
                        currentView = view;
                        
                        // Update button states
                        document.querySelectorAll('.gantt-view-toggle button').forEach(btn => {
                            btn.classList.remove('active');
                        });
                        // event.target is not available here, assuming this is called from a button click
                        // For now, this function is not directly used in the provided PHP, but kept for completeness
                        // If buttons are added, they would need to pass 'event' or target the active class differently.
                        
                        // Re-render chart
                        renderGanttChart();
                    }

                    // Task list click handlers
                    document.querySelectorAll('.gantt-task-item').forEach(item => {
                        item.addEventListener('click', () => {
                            const taskId = parseInt(item.dataset.task);
                            const project = projects.find(p => p.id === taskId);
                            if (project) {
                                selectTask(project);
                            }
                        });
                    });

                    // Initialize everything when the page loads
                    document.addEventListener('DOMContentLoaded', function() {
                        updateClocks();
                        // renderGanttChart(); // This is for the JS-driven Gantt, currently PHP table is used.
                        
                        // Update clocks every second
                        setInterval(updateClocks, 1000);
                    });
                </script>

            </div>
        </div>
    </div>
</x-app-layout>
