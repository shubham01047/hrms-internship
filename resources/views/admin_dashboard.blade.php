<x-app-layout>
<x-slot name="header">
<h2 class="font-semibold text-xl text-black leading-tight">
{{ __('Admin Dashboard') }}
</h2>
</x-slot>

<div class="py-12 theme-app">
<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
<div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
    <div class="p-6 text-black">

        {{-- Custom styles for this page --}}
        <style>
            /* Poppins font is assumed to be loaded by x-app-layout or globally */
            body {
                font-family: 'Poppins', sans-serif;
            }

            /* Fade-in animation */
            @keyframes fadeIn {
                from { opacity: 0; transform: translateY(20px); }
                to { opacity: 1; transform: translateY(0); }
            }
            .animate-fade-in {
                animation: fadeIn 0.8s ease-out forwards;
                opacity: 0;
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
            .animate-delay-1100 { animation-delay: 1.1s; }
            .animate-delay-1200 { animation-delay: 1.2s; }
            .animate-delay-1300 { animation-delay: 1.3s; }
            .animate-delay-1400 { animation-delay: 1.4s; }
            .animate-delay-1500 { animation-delay: 1.5s; }

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

            .gantt-view-toggle button:not(.active) {
                color: #6b7280;
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
            .analog-clock {
                width: 120px;
                height: 120px;
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
                height: 30px;
                top: 20%;
                left: 50%;
                margin-left: -1.5px;
                transition: transform 0.5s ease-in-out;
            }

            .minute-hand {
                width: 2px;
                height: 40px;
                top: 15%;
                left: 50%;
                margin-left: -1px;
                transition: transform 0.5s ease-in-out;
            }

            .second-hand {
                width: 1px;
                height: 45px;
                top: 12.5%;
                left: 50%;
                margin-left: -0.5px;
                background: #ef4444;
                transition: transform 0.1s ease-in-out;
            }

            /* Clock Numbers */
            .clock-number {
                position: absolute;
                color: white;
                font-size: 12px;
                font-weight: bold;
                transform: translate(-50%, -50%);
            }

            /* Digital Clock Animation */
            @keyframes pulse {
                0%, 100% { opacity: 1; }
                50% { opacity: 0.7; }
            }

            .digital-clock {
                animation: pulse 2s ease-in-out infinite;
            }

            /* Clock Container Animation */
            @keyframes clockFloat {
                0%, 100% { transform: translateY(0px); }
                50% { transform: translateY(-5px); }
            }

            .clock-container {
                animation: clockFloat 3s ease-in-out infinite;
            }

            /* Welcome Text Animation */
            @keyframes welcomeGlow {
                0%, 100% { text-shadow: 0 0 10px rgba(255, 255, 255, 0.3); }
                50% { text-shadow: 0 0 20px rgba(255, 255, 255, 0.6); }
            }

            .welcome-text {
                animation: welcomeGlow 2s ease-in-out infinite;
            }

            /* Responsive Design */
            @media (max-width: 640px) {
                .analog-clock {
                    width: 80px;
                    height: 80px;
                }
                
                .hour-hand {
                    height: 20px;
                    top: 25%;
                }
                
                .minute-hand {
                    height: 25px;
                    top: 20%;
                }
                
                .second-hand {
                    height: 30px;
                    top: 17.5%;
                }
                
                .clock-number {
                    font-size: 10px;
                }

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
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 gap-4 sm:gap-6">

                <!-- Welcome Header with Clocks -->
                <div class="bg-secondary-gradient text-primary p-4 sm:p-6 lg:p-8 rounded-xl shadow-lg animate-fade-in relative overflow-hidden">
                    <!-- Background Pattern -->
                    <div class="absolute inset-0 opacity-10">
                        <div class="absolute top-0 left-0 w-32 h-32 bg-white rounded-full -translate-x-16 -translate-y-16"></div>
                        <div class="absolute bottom-0 right-0 w-24 h-24 bg-white rounded-full translate-x-12 translate-y-12"></div>
                    </div>
                    
                    <div class="relative z-10">
                        <!-- Welcome Message -->
                        <div class="text-center mb-6 sm:mb-8">
                            <h1 class="text-2xl sm:text-3xl lg:text-4xl font-bold mb-2 welcome-text">Welcome, {{ Auth::user()->name }}!</h1>
                            <p class="text-base sm:text-lg lg:text-xl opacity-90">Here's your quick overview for today</p>
                        </div>

                        <!-- Clocks Section -->
                        <div class="flex flex-col sm:flex-row lg:flex-row items-center justify-center gap-4 sm:gap-6 lg:gap-8">
                            <!-- Analog Clock -->
                            <div class="clock-container">
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
                            <div class="text-center">
                                <div class="digital-clock">
                                    <div id="digital-time" class="text-3xl sm:text-4xl lg:text-5xl font-bold mb-2">00:00:00</div>
                                    <div id="digital-date" class="text-sm sm:text-base lg:text-lg opacity-90">Loading...</div>
                                    <div id="digital-ampm" class="text-xs sm:text-sm opacity-75 mt-1">AM</div>
                                </div>
                                <p class="text-center mt-2 text-sm opacity-75">Digital</p>
                            </div>

                            <!-- Time Zone Info -->
                            <div class="text-center">
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
                <div class="bg-gradient-to-br from-white to-blue-50 rounded-xl shadow p-4 sm:p-6 border border-gray-200 animate-fade-in animate-delay-100">
                    <div class="bg-primary p-3 sm:p-4 rounded-t-xl mb-4">
                        <h2 class="text-lg sm:text-xl font-semibold text-primary">Recent Activities / Updates</h2>
                    </div>
                    <div class="max-h-60 overflow-y-auto space-y-3 pr-2">
                        <div class="flex items-start gap-3 p-3 bg-gray-50 rounded-lg border border-gray-100 hover:shadow-md transition-all duration-200 hover:scale-[1.01]">
                            <i class="bi bi-person-check-fill text-blue-500 text-xl flex-shrink-0 mt-1"></i>
                            <div>
                                <p class="font-semibold text-gray-800 text-sm sm:text-base">User 'Admin' logged in from IP 192.168.1.10.</p>
                                <p class="text-xs text-gray-500 mt-1">5 minutes ago</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-3 p-3 bg-gray-50 rounded-lg border border-gray-100 hover:shadow-md transition-all duration-200 hover:scale-[1.01]">
                            <i class="bi bi-check-circle-fill text-green-500 text-xl flex-shrink-0 mt-1"></i>
                            <div>
                                <p class="font-semibold text-gray-800 text-sm sm:text-base">Approved leave request for John Doe.</p>
                                <p class="text-xs text-gray-500 mt-1">2 minutes ago</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-3 p-3 bg-gray-50 rounded-lg border border-gray-100 hover:shadow-md transition-all duration-200 hover:scale-[1.01]">
                            <i class="bi bi-folder-fill text-purple-500 text-xl flex-shrink-0 mt-1"></i>
                            <div>
                                <p class="font-semibold text-gray-800 text-sm sm:text-base">Project "New Dashboard UI" updated by Alice Johnson.</p>
                                <p class="text-xs text-gray-500 mt-1">1 hour ago</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-3 p-3 bg-gray-50 rounded-lg border border-gray-100 hover:shadow-md transition-all duration-200 hover:scale-[1.01]">
                            <i class="bi bi-exclamation-triangle-fill text-yellow-500 text-xl flex-shrink-0 mt-1"></i>
                            <div>
                                <p class="font-semibold text-gray-800 text-sm sm:text-base">2 pending expense report approvals.</p>
                                <p class="text-xs text-gray-500 mt-1">Yesterday</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Quick Stats -->
                <div class="overflow-x-auto pb-4 animate-fade-in animate-delay-300">
                    <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 gap-3 sm:gap-4 lg:gap-6 min-w-[600px] lg:min-w-0">
                        <a href="{{ route('employees.index') }}" class="p-4 sm:p-5 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 ease-in-out hover:scale-[1.01]
                            bg-white border-primary border
                            flex flex-col items-start gap-2 sm:gap-3 cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 sm:h-7 sm:w-7 text-red-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                            <h3 class="text-xs sm:text-sm text-gray-500">Total Employees</h3>
                            <p class="text-2xl sm:text-3xl font-bold">120</p>
                        </a>
                        <div class="p-4 sm:p-5 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 ease-in-out hover:scale-[1.01]
                            bg-white text-green-600 border-primary border
                            flex flex-col items-start gap-2 sm:gap-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 sm:h-7 sm:w-7 text-green-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="18" height="18" x="3" y="4" rx="2" ry="2"/><line x1="16" x2="16" y1="2" y2="6"/><line x1="8" x2="8" y1="2" y2="6"/><line x1="3" x2="21" y1="10" y2="10"/></svg>
                            <h3 class="text-xs sm:text-sm text-gray-500">Present Today</h3>
                            <p class="text-2xl sm:text-3xl font-bold">98</p>
                        </div>
                        <div class="p-4 sm:p-5 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 ease-in-out hover:scale-[1.01]
                            bg-white text-purple-600 border-primary border
                            flex flex-col items-start gap-2 sm:gap-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 sm:h-7 sm:w-7 text-purple-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/><path d="M12 22c4.4 0 8-3.6 8-8V7h-4V3H8v4H4v7c0 4.4 3.6 8 8 8z"/></svg>
                            <h3 class="text-xs sm:text-sm text-gray-500">Punch-In Users</h3>
                            <p class="text-2xl sm:text-3xl font-bold">65</p>
                        </div>
                        <div class="p-4 sm:p-5 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 ease-in-out hover:scale-[1.01]
                            bg-white text-yellow-500 border-primary border
                            flex flex-col items-start gap-2 sm:gap-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 sm:h-7 sm:w-7 text-yellow-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"/><polyline points="14 2 14 8 20 8"/><line x1="16" x2="8" y1="13" y2="13"/><line x1="16" x2="8" y1="17" y2="17"/><line x1="10" x2="8" y1="9" y2="9"/></svg>
                            <h3 class="text-xs sm:text-sm text-gray-500">Pending Leaves</h3>
                            <p class="text-2xl sm:text-3xl font-bold">12</p>
                        </div>
                        <div class="p-4 sm:p-5 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 ease-in-out hover:scale-[1.01]
                            bg-white text-pink-600 border-primary border
                            flex flex-col items-start gap-2 sm:gap-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 sm:h-7 sm:w-7 text-pink-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 20h16a2 2 0 0 0 2-2V8a2 2 0 0 0-2-2h-7.93a2 2 0 0 1-1.66-.9l-.82-1.2A2 2 0 0 0 4.32 2H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2z"/></svg>
                            <h3 class="text-xs sm:text-sm text-gray-500">Active Projects</h3>
                            <p class="text-2xl sm:text-3xl font-bold">08</p>
                        </div>
                    </div>
                </div>

                <!-- Notifications and Quick Actions Wrapper -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 sm:gap-6 animate-fade-in animate-delay-400">
                    <!-- Notifications Section -->
                    <div class="bg-white p-4 sm:p-6 rounded-xl shadow-lg border-primary border">
                        <h2 class="text-xl sm:text-2xl font-bold text-gray-800 mb-4">Notifications</h2>
                        <ul class="space-y-3">
                            <li class="flex items-center gap-3 text-gray-700">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 sm:h-6 sm:w-6 text-green-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                                <span class="text-sm sm:text-base">Leave approved for John Doe.</span>
                            </li>
                            <li class="flex items-center gap-3 text-gray-700">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 sm:h-6 sm:w-6 text-yellow-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"/><line x1="12" x2="12" y1="9" y2="13"/><line x1="12" x2="12.01" y1="17" y2="17"/></svg>
                                <span class="text-sm sm:text-base">Task "Website Redesign" deadline is tomorrow.</span>
                            </li>
                            <li class="flex items-center gap-3 text-gray-700">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 sm:h-6 sm:w-6 text-green-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                                <span class="text-sm sm:text-base">New employee, Jane Smith, has joined the team.</span>
                            </li>
                        </ul>
                    </div>

                    <!-- Quick Actions Section -->
                    <div class="bg-white p-4 sm:p-6 rounded-xl shadow-lg border-primary border animate-fade-in animate-delay-500">
                        <h2 class="text-xl sm:text-2xl font-bold text-gray-800 mb-4">Quick Actions</h2>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 sm:gap-4">
                            <a href="#" class="flex flex-col items-center justify-center p-3 sm:p-4 rounded-xl text-primary text-center
                                              bg-secondary-gradient shadow-md
                                              hover:scale-105 hover:shadow-xl transition-all duration-300 ease-in-out">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 sm:h-8 sm:w-8 mb-2" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><line x1="19" x2="19" y1="8" y2="14"/><line x1="22" x2="16" y1="11" y2="11"/></svg>
                                <span class="font-semibold text-sm sm:text-base">Add Employee</span>
                            </a>
                            <a href="#" class="flex flex-col items-center justify-center p-3 sm:p-4 rounded-xl text-primary text-center
                                              bg-secondary-gradient shadow-md
                                              hover:scale-105 hover:shadow-xl transition-all duration-300 ease-in-out">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 sm:h-8 sm:w-8 mb-2" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M8 2v4"/><path d="M16 2v4"/><path d="M21 13V7a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h8"/><path d="M3 10h18"/><path d="M19 16v6"/><path d="M22 19h-6"/></svg>
                                <span class="font-semibold text-sm sm:text-base">Add Holiday</span>
                            </a>
                            <a href="#" class="flex flex-col items-center justify-center p-3 sm:p-4 rounded-xl text-primary text-center
                                              bg-secondary-gradient shadow-md
                                              hover:scale-105 hover:shadow-xl transition-all duration-300 ease-in-out">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 sm:h-8 sm:w-8 mb-2" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 20h16a2 2 0 0 0 2-2V8a2 2 0 0 0-2-2h-7.93a2 2 0 0 1-1.66-.9l-.82-1.2A2 2 0 0 0 4.32 2H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2z"/><line x1="12" x2="12" y1="10" y2="16"/><line x1="9" x2="15" y1="13" y2="13"/></svg>
                                <span class="font-semibold text-sm sm:text-base">Create Project</span>
                            </a>
                            <a href="#" class="flex flex-col items-center justify-center p-3 sm:p-4 rounded-xl text-primary text-center
                                              bg-secondary-gradient shadow-md
                                              hover:scale-105 hover:shadow-xl transition-all duration-300 ease-in-out">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 sm:h-8 sm:w-8 mb-2" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"/><polyline points="14 2 14 8 20 8"/><line x1="16" x2="8" y1="13" y2="13"/><line x1="16" x2="8" y1="17" y2="17"/><line x1="10" x2="8" y1="9" y2="9"/></svg>
                                <span class="font-semibold text-sm sm:text-base">Generate Report</span>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Dynamic Gantt Chart Section -->
                <div class="bg-gradient-to-br from-white to-blue-50 rounded-xl shadow p-4 sm:p-6 border-primary border animate-fade-in animate-delay-600">
                    <div class="gantt-container">
                        <!-- Gantt Header -->
                        <div class="gantt-header">
                            <div>
                                <h2 class="text-lg sm:text-xl font-semibold text-gray-800">Project Timeline</h2>
                                <p class="text-sm text-gray-600">Track project progress and deadlines</p>
                            </div>
                            <div class="flex items-center gap-4">
                                <div class="gantt-view-toggle">
                                    <button class="active" onclick="setTimelineView('weeks')">Weeks</button>
                                    <button onclick="setTimelineView('months')">Months</button>
                                    <button onclick="setTimelineView('days')">Days</button>
                                </div>
                                <button class="px-3 py-1 bg-primary text-primary text-sm font-medium rounded hover:bg-hover transition-colors">
                                    Add Task
                                </button>
                            </div>
                        </div>

                        <!-- Project Statistics -->
                        <div class="p-4 bg-gray-50 border-b border-gray-200">
                            <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
                                <div class="text-center">
                                    <div class="text-lg font-bold text-green-600">3</div>
                                    <div class="text-xs text-gray-600">Completed</div>
                                </div>
                                <div class="text-center">
                                    <div class="text-lg font-bold" style="color: var(--primary-bg);">5</div>
                                    <div class="text-xs text-gray-600">In Progress</div>
                                </div>
                                <div class="text-center">
                                    <div class="text-lg font-bold text-yellow-600">2</div>
                                    <div class="text-xs text-gray-600">Planning</div>
                                </div>
                                <div class="text-center">
                                    <div class="text-lg font-bold text-red-600">1</div>
                                    <div class="text-xs text-gray-600">On Hold</div>
                                </div>
                            </div>
                        </div>

                        <!-- Gantt Main Content -->
                        <div class="gantt-main">
                            <!-- Task List -->
                            <div class="gantt-task-list">
                                <div class="gantt-task-list-header">
                                    Task Name
                                </div>
                                <div class="gantt-task-item" data-task="1">
                                    <div class="status-dot completed"></div>
                                    <div class="flex-1 min-w-0">
                                        <div class="text-sm font-medium text-gray-800 truncate">E-Commerce Platform</div>
                                        <div class="text-xs text-gray-500">Alice Johnson</div>
                                    </div>
                                </div>
                                <div class="gantt-task-item" data-task="2">
                                    <div class="status-dot completed"></div>
                                    <div class="flex-1 min-w-0">
                                        <div class="text-sm font-medium text-gray-800 truncate">Mobile App Redesign</div>
                                        <div class="text-xs text-gray-500">Bob Williams</div>
                                    </div>
                                </div>
                                <div class="gantt-task-item" data-task="3">
                                    <div class="status-dot planning"></div>
                                    <div class="flex-1 min-w-0">
                                        <div class="text-sm font-medium text-gray-800 truncate">CRM Integration</div>
                                        <div class="text-xs text-gray-500">Charlie Brown</div>
                                    </div>
                                </div>
                                <div class="gantt-task-item" data-task="4">
                                    <div class="status-dot in-progress"></div>
                                    <div class="flex-1 min-w-0">
                                        <div class="text-sm font-medium text-gray-800 truncate">Data Analytics Dashboard</div>
                                        <div class="text-xs text-gray-500">Diana Prince</div>
                                    </div>
                                </div>
                                <div class="gantt-task-item" data-task="5">
                                    <div class="status-dot on-hold"></div>
                                    <div class="flex-1 min-w-0">
                                        <div class="text-sm font-medium text-gray-800 truncate">Security Audit</div>
                                        <div class="text-xs text-gray-500">Eve Adams</div>
                                    </div>
                                </div>
                                <div class="gantt-task-item" data-task="6">
                                    <div class="status-dot in-progress"></div>
                                    <div class="flex-1 min-w-0">
                                        <div class="text-sm font-medium text-gray-800 truncate">API Documentation</div>
                                        <div class="text-xs text-gray-500">Frank Miller</div>
                                    </div>
                                </div>
                            </div>

                            <!-- Timeline -->
                            <div class="gantt-timeline">
                                <div class="gantt-timeline-header" id="timeline-header">
                                    <!-- Timeline headers will be generated by JavaScript -->
                                </div>
                                <div class="gantt-timeline-body" id="timeline-body">
                                    <!-- Timeline content will be generated by JavaScript -->
                                </div>
                            </div>
                        </div>

                        <!-- Task Details Panel -->
                        <div class="gantt-task-details" id="task-details" style="display: none;">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-4">
                                    <div class="status-dot" id="detail-status-dot"></div>
                                    <div>
                                        <h4 class="font-semibold text-gray-800" id="detail-task-name"></h4>
                                        <p class="text-sm text-gray-600" id="detail-task-dates"></p>
                                    </div>
                                </div>
                                <div class="flex items-center gap-4">
                                    <div class="text-sm text-gray-600">
                                        <span class="font-medium">Assignee:</span> <span id="detail-assignee"></span>
                                    </div>
                                    <div class="text-sm text-gray-600">
                                        <span class="font-medium">Progress:</span> <span id="detail-progress"></span>%
                                    </div>
                                    <button class="px-3 py-1 bg-primary text-primary text-sm rounded hover:bg-hover transition-colors">
                                        Edit
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Attendance Overview -->
                <div class="bg-gradient-to-br from-white to-blue-50 rounded-xl shadow p-4 sm:p-6 border-primary border animate-fade-in animate-delay-700">
                    <div class="bg-primary p-3 sm:p-4 rounded-t-xl mb-4">
                        <h2 class="text-lg sm:text-xl font-semibold text-primary">Attendance Overview</h2>
                    </div>
                    <div class="grid grid-cols-2 sm:grid-cols-4 gap-3 sm:gap-4">
                        <div class="p-3 sm:p-4 bg-blue-100 rounded-lg text-center hover:shadow-md transition-all duration-200 hover:scale-[1.01]">
                            <h3 class="text-gray-700 text-xs sm:text-sm">Punch-in Today</h3>
                            <p class="text-xl sm:text-2xl font-bold" style="color: var(--primary-bg);">98</p>
                        </div>
                        <div class="p-3 sm:p-4 bg-yellow-100 rounded-lg text-center hover:shadow-md transition-all duration-200 hover:scale-[1.01]">
                            <h3 class="text-gray-700 text-xs sm:text-sm">Late Comers</h3>
                            <p class="text-xl sm:text-2xl font-bold text-yellow-600">12</p>
                        </div>
                        <div class="p-3 sm:p-4 bg-red-100 rounded-lg text-center hover:shadow-md transition-all duration-200 hover:scale-[1.01]">
                            <h3 class="text-gray-700 text-xs sm:text-sm">Absent</h3>
                            <p class="text-xl sm:text-2xl font-bold text-red-500">10</p>
                        </div>
                        <div class="p-3 sm:p-4 bg-green-100 rounded-lg text-center hover:shadow-md transition-all duration-200 hover:scale-[1.01]">
                            <h3 class="text-gray-700 text-xs sm:text-sm">Compliance</h3>
                            <p class="text-xl sm:text-2xl font-bold text-green-600">92%</p>
                        </div>
                    </div>
                </div>

                <!-- Recruitment Status Panel -->
                <div class="bg-gradient-to-br from-white to-blue-50 rounded-xl shadow p-4 sm:p-6 border-primary border animate-fade-in animate-delay-800">
                    <div class="bg-primary p-3 sm:p-4 rounded-t-xl mb-4">
                        <h2 class="text-lg sm:text-xl font-semibold text-primary">Recruitment Status</h2>
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
                <div class="bg-gradient-to-br from-white to-blue-50 rounded-xl shadow p-4 sm:p-6 border-primary border animate-fade-in animate-delay-900 text-center">
                    <h2 class="text-lg sm:text-xl font-semibold text-gray-800 mb-4">Top Performer of the Month</h2>
                    <div class="flex flex-col items-center justify-center gap-3">
                        <img src="/placeholder.svg?height=80&width=80" alt="Top Performer" class="w-16 h-16 sm:w-20 sm:h-20 rounded-full object-cover border-4 border-green-400 shadow-md">
                        <p class="text-xl sm:text-2xl font-bold text-green-600">Deepan Gain</p>
                        <p class="text-base sm:text-lg text-gray-700">Productivity Score: <span class="font-bold">92%</span></p>
                    </div>
                </div>

                <!-- Upcoming Deadlines Section -->
                <div class="bg-gradient-to-br from-white to-blue-50 rounded-xl shadow p-4 sm:p-6 border-primary border animate-fade-in animate-delay-1000">
                    <div class="bg-primary p-3 sm:p-4 rounded-t-xl mb-4">
                        <h2 class="text-lg sm:text-xl font-semibold text-primary">Upcoming Deadlines</h2>
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
                                <p class="text-xs sm:text-sm text-gray-600">Deadline: September 10, 2025</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Upcoming Birthdays & Anniversaries Section -->
                <div class="bg-gradient-to-br from-white to-blue-50 rounded-xl shadow p-4 sm:p-6 border-primary border animate-fade-in animate-delay-1100">
                    <div class="bg-primary p-3 sm:p-4 rounded-t-xl mb-4">
                        <h2 class="text-lg sm:text-xl font-semibold text-primary">Upcoming Birthdays & Anniversaries</h2>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3 sm:gap-4">
                        <!-- Example Card 1: Birthday -->
                        <div class="flex items-center gap-3 sm:gap-4 p-3 sm:p-4 bg-gray-50 rounded-lg border border-gray-100 hover:shadow-md transition-all duration-200 hover:scale-[1.01]">
                            <img src="/placeholder.svg?height=64&width=64" alt="Employee Photo" class="w-12 h-12 sm:w-16 sm:h-16 rounded-full object-cover border-2 border-primary">
                            <div>
                                <h3 class="font-semibold text-gray-800 text-sm sm:text-base">Jane Doe</h3>
                                <p class="text-xs sm:text-sm text-gray-600">Birthday: August 10th</p>
                            </div>
                        </div>
                        <!-- Example Card 2: Anniversary -->
                        <div class="flex items-center gap-3 sm:gap-4 p-3 sm:p-4 bg-gray-50 rounded-lg border border-gray-100 hover:shadow-md transition-all duration-200 hover:scale-[1.01]">
                            <img src="/placeholder.svg?height=64&width=64" alt="Employee Photo" class="w-12 h-12 sm:w-16 sm:h-16 rounded-full object-cover border-2 border-green-300">
                            <div>
                                <h3 class="font-semibold text-gray-800 text-sm sm:text-base">Michael Brown</h3>
                                <p class="text-xs sm:text-sm text-gray-600">Anniversary: September 5th</p>
                            </div>
                        </div>
                        <!-- Example Card 3: Birthday -->
                        <div class="flex items-center gap-3 sm:gap-4 p-3 sm:p-4 bg-gray-50 rounded-lg border border-gray-100 hover:shadow-md transition-all duration-200 hover:scale-[1.01]">
                            <img src="/placeholder.svg?height=64&width=64" alt="Employee Photo" class="w-12 h-12 sm:w-16 sm:h-16 rounded-full object-cover border-2 border-purple-300">
                            <div>
                                <h3 class="font-semibold text-gray-800 text-sm sm:text-base">Sarah Lee</h3>
                                <p class="text-xs sm:text-sm text-gray-600">Birthday: October 22nd</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Announcements & Notices Section -->
                <div class="bg-gradient-to-br from-white to-blue-50 rounded-xl shadow p-4 sm:p-6 border-primary border animate-fade-in animate-delay-1200">
                    <div class="bg-primary p-3 sm:p-4 rounded-t-xl mb-4">
                        <h2 class="text-lg sm:text-xl font-semibold text-primary">Announcements & Notices</h2>
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
                <div class="bg-gradient-to-br from-white to-blue-50 rounded-xl shadow p-4 sm:p-6 border-primary border animate-fade-in animate-delay-1300">
                    <div class="bg-primary p-3 sm:p-4 rounded-t-xl mb-4">
                        <h2 class="text-lg sm:text-xl font-semibold text-primary">HR Policies</h2>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 sm:gap-4">
                        <button class="flex items-center justify-center p-3 sm:p-4 rounded-lg bg-secondary-gradient text-primary font-semibold shadow-md hover:bg-hover transition-all duration-200 hover:scale-105">
                            <i class="bi bi-file-earmark-text-fill text-xl sm:text-2xl mr-2"></i>
                            <span class="text-sm sm:text-base">Download Policies</span>
                        </button>
                        <button class="flex items-center justify-center p-3 sm:p-4 rounded-lg bg-secondary-gradient text-primary font-semibold shadow-md hover:bg-hover transition-all duration-200 hover:scale-105">
                            <i class="bi bi-book-fill text-xl sm:text-2xl mr-2"></i>
                            <span class="text-sm sm:text-base">View Guidelines</span>
                        </button>
                    </div>
                </div>

                <!-- Motivational Quote Section -->
                <div class="bg-gradient-to-br from-white to-blue-50 rounded-xl shadow p-4 sm:p-6 border-primary border animate-fade-in animate-delay-1400 hover:shadow-xl transition-all duration-200 hover:scale-[1.01]">
                    <p class="text-lg sm:text-xl font-semibold text-gray-800 italic">
                        "The only way to do great work is to love what you do."
                    </p>
                    <p class="text-sm text-gray-600 mt-2">- Steve Jobs</p>
                </div>
            </div>
        </div>

        <script>
            // Sample project data
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
                const hourAngle = (hours % 12) * 30 + minutes * 0.5; // 30 degrees per hour + minute adjustment
                const minuteAngle = minutes * 6; // 6 degrees per minute
                const secondAngle = seconds * 6; // 6 degrees per second

                document.getElementById('hour-hand').style.transform = `rotate(${hourAngle}deg)`;
                document.getElementById('minute-hand').style.transform = `rotate(${minuteAngle}deg)`;
                document.getElementById('second-hand').style.transform = `rotate(${secondAngle}deg)`;
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
                timelineHeader.innerHTML = '';
                timelineBody.innerHTML = '';

                // Render timeline header
                timeScale.forEach(date => {
                    const cell = document.createElement('div');
                    cell.className = 'gantt-timeline-cell';
                    cell.textContent = formatTimeScale(date);
                    timelineHeader.appendChild(cell);
                });

                // Render timeline body
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

            function selectTask(project) {
                selectedTask = project;
                
                // Update task list selection
                document.querySelectorAll('.gantt-task-item').forEach(item => {
                    item.classList.remove('selected');
                });
                document.querySelector(`[data-task="${project.id}"]`).classList.add('selected');
                
                // Show task details
                const detailsPanel = document.getElementById('task-details');
                const statusDot = document.getElementById('detail-status-dot');
                const taskName = document.getElementById('detail-task-name');
                const taskDates = document.getElementById('detail-task-dates');
                const assignee = document.getElementById('detail-assignee');
                const progress = document.getElementById('detail-progress');
                
                statusDot.className = `status-dot ${project.status}`;
                taskName.textContent = project.name;
                taskDates.textContent = `${project.startDate.toLocaleDateString()} - ${project.endDate.toLocaleDateString()}`;
                assignee.textContent = project.assignee;
                progress.textContent = project.progress;
                
                detailsPanel.style.display = 'block';
            }

            function setTimelineView(view) {
                currentView = view;
                
                // Update button states
                document.querySelectorAll('.gantt-view-toggle button').forEach(btn => {
                    btn.classList.remove('active');
                });
                event.target.classList.add('active');
                
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
                renderGanttChart();
                
                // Update clocks every second
                setInterval(updateClocks, 1000);
            });
        </script>

    </div>
</div>
</div>
</div>
</x-app-layout>
