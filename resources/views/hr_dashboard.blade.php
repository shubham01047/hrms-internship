<x-app-layout>
<x-slot name="header">
<h2 class="font-semibold text-xl text-black leading-tight">
    {{ __('HR Dashboard') }}
</h2>
</x-slot>

<div class="py-12">
<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
        <div class="p-6 text-black">

            {{-- Custom styles for this page --}}
            <style>
                /* Poppins font is assumed to be loaded by x-app-layout or globally */
                body {
                    font-family: 'Poppins', sans-serif;
                }
                /* Custom gradient for the main dashboard header */
                .header-gradient {
                    background: linear-gradient(135deg, #ef4444, #f87171); /* Updated: Red-500 to Red-400 */
                }
                /* Custom gradient for section headers */
                .section-header-gradient {
                    background: linear-gradient(135deg, #ef4444, #f87171); /* Updated: Red-500 to Red-400 */
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
                .animate-delay-1100 { animation-delay: 1.1s; }
                .animate-delay-1200 { animation-delay: 1.2s; }
                .animate-delay-1300 { animation-delay: 1.3s; }
                .animate-delay-1400 { animation-delay: 1.4s; }
                .animate-delay-1500 { animation-delay: 1.5s; }

                /* Fix for notification dropdown z-index */
                .notification-dropdown {
                    z-index: 9999 !important;
                    position: absolute !important;
                }

                /* Dynamic Progress Bar Styles */
                .progress-bar {
                    width: 0%;
                    transition: all 1.5s ease-in-out;
                    border-radius: 9999px;
                    height: 10px;
                }
                
                .progress-bar.green {
                    background-color: #16a34a !important; /* Green for 100% */
                }
                
                .progress-bar.blue {
                    background-color: #2563eb !important; /* Blue for 50-99% */
                }
                
                .progress-bar.yellow {
                    background-color: #eab308 !important; /* Yellow for 0-49% */
                }

                /* Status Badge Styles */
                .status-badge {
                    transition: all 0.3s ease-in-out;
                }

                /* Chart Container Styles */
                .chart-container {
                    position: relative;
                    height: 300px;
                    width: 100%;
                }

                .chart-container canvas {
                    max-height: 300px;
                }

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
            </style>

            <div class="py-12 bg-gray-100 min-h-screen"> {{-- Set overall background to gray-100 and ensure min-height --}}
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 grid grid-cols-1 gap-6"> {{-- Consistent vertical spacing between sections --}}

                    <!-- Header -->
                    <div class="header-gradient text-white p-8 rounded-xl shadow-lg animate-fade-in relative overflow-hidden">
    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-10">
        <div class="absolute top-0 left-0 w-32 h-32 bg-white rounded-full -translate-x-16 -translate-y-16"></div>
        <div class="absolute bottom-0 right-0 w-24 h-24 bg-white rounded-full translate-x-12 translate-y-12"></div>
    </div>
    
    <div class="relative z-10">
        <!-- Welcome Message -->
        <div class="text-center mb-8">
            <h1 class="text-4xl font-bold mb-2 welcome-text">Welcome, {{ Auth::user()->name }}!</h1>
            <p class="text-xl opacity-90">Here's your quick overview for today</p>
        </div>

        <!-- Clocks Section -->
        <div class="flex flex-col lg:flex-row items-center justify-center gap-8">
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
                    <div id="digital-time" class="text-5xl font-bold mb-2">00:00:00</div>
                    <div id="digital-date" class="text-lg opacity-90">Loading...</div>
                    <div id="digital-ampm" class="text-sm opacity-75 mt-1">AM</div>
                </div>
                <p class="text-center mt-2 text-sm opacity-75">Digital</p>
            </div>

            <!-- Time Zone Info -->
            <div class="text-center">
                <div class="bg-white bg-opacity-20 rounded-lg p-4 backdrop-filter backdrop-blur-sm">
                    <div class="text-sm opacity-75 mb-1">Current Time Zone</div>
                    <div id="timezone" class="font-semibold">Loading...</div>
                    <div class="text-xs opacity-60 mt-2">
                        <div id="utc-offset">UTC+0</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Notifications and Profile in top right corner -->
        <div class="absolute top-4 right-4 flex items-center gap-4">
            <!-- Notifications Bell icon and dropdown -->
            <div x-data="{ notificationsOpen: false }" class="relative">
                <button @click="notificationsOpen = !notificationsOpen" class="p-2 rounded-full hover:bg-white hover:bg-opacity-30 transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-white focus:ring-opacity-50 relative">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M6 8a6 6 0 0 1 12 0c0 7 3 9 3 9H3s3-2 3-9"/><path d="M10.36 14H13.64a2 2 0 0 1-.97 3.5c-.93.47-2.09.47-3.02 0a2 2 0 0 1-.97-3.5Z"/></svg>
                    <span class="absolute top-1 right-1 h-2 w-2 rounded-full bg-red-500 animate-pulse"></span>
                </button>

                <!-- Notification Dropdown -->
                <div x-show="notificationsOpen" 
                     @click.away="notificationsOpen = false"
                     x-transition:enter="transition ease-out duration-200"
                     x-transition:enter-start="opacity-0 scale-95"
                     x-transition:enter-end="opacity-100 scale-100"
                     x-transition:leave="transition ease-in duration-150"
                     x-transition:leave-start="opacity-100 scale-100"
                     x-transition:leave-end="opacity-0 scale-95"
                     class="notification-dropdown right-0 mt-2 w-80 bg-white rounded-lg shadow-2xl overflow-hidden border border-gray-200"
                     style="position: absolute; z-index: 9999;">
                    <div class="py-2">
                        <div class="px-4 py-3 bg-gray-50 border-b border-gray-100">
                            <h3 class="text-sm font-semibold text-gray-800">Notifications</h3>
                        </div>
                        <a href="#" class="block px-4 py-3 text-sm text-gray-700 hover:bg-gray-50 transition-colors duration-150 border-b border-gray-100">
                            <div class="flex items-start gap-3">
                                <div class="flex-shrink-0 w-2 h-2 bg-red-500 rounded-full mt-2"></div>
                                <div>
                                    <span class="font-semibold text-gray-800">2 Pending Leave Requests</span>
                                    <p class="text-xs text-gray-500 mt-1">Review required for John Doe and Sarah Wilson</p>
                                    <p class="text-xs text-gray-400 mt-1">5 minutes ago</p>
                                </div>
                            </div>
                        </a>
                        <a href="#" class="block px-4 py-3 text-sm text-gray-700 hover:bg-gray-50 transition-colors duration-150 border-b border-gray-100">
                            <div class="flex items-start gap-3">
                                <div class="flex-shrink-0 w-2 h-2 bg-blue-500 rounded-full mt-2"></div>
                                <div>
                                    <span class="font-semibold text-gray-800">New Policy Update</span>
                                    <p class="text-xs text-gray-500 mt-1">Updated remote work policy available</p>
                                    <p class="text-xs text-gray-400 mt-1">1 hour ago</p>
                                </div>
                            </div>
                        </a>
                        <a href="#" class="block px-4 py-3 text-sm text-gray-700 hover:bg-gray-50 transition-colors duration-150 border-b border-gray-100">
                            <div class="flex items-start gap-3">
                                <div class="flex-shrink-0 w-2 h-2 bg-yellow-500 rounded-full mt-2"></div>
                                <div>
                                    <span class="font-semibold text-gray-800">System Maintenance Tonight</span>
                                    <p class="text-xs text-gray-500 mt-1">Expected downtime 1-3 AM</p>
                                    <p class="text-xs text-gray-400 mt-1">2 hours ago</p>
                                </div>
                            </div>
                        </a>
                        <a href="#" class="block px-4 py-3 text-sm text-gray-700 hover:bg-gray-50 transition-colors duration-150">
                            <div class="flex items-start gap-3">
                                <div class="flex-shrink-0 w-2 h-2 bg-green-500 rounded-full mt-2"></div>
                                <div>
                                    <span class="font-semibold text-gray-800">New Employee Onboarded</span>
                                    <p class="text-xs text-gray-500 mt-1">Welcome Alice Johnson to the team</p>
                                    <p class="text-xs text-gray-400 mt-1">Yesterday</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="border-t border-gray-100 bg-gray-50">
                        <a href="#" class="block px-4 py-3 text-sm text-red-600 hover:bg-red-50 text-center transition-colors duration-150 font-medium">
                            View All Notifications
                        </a>
                    </div>
                </div>
            </div>

            <!-- Profile Icon with dropdown -->
            <div class="flex items-center">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button
                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-white bg-opacity-20 hover:text-red-100 hover:bg-opacity-30 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>
                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')" class="text-gray-700 hover:bg-red-50 hover:text-red-800">
                            {{ __('Profile') }}
                        </x-dropdown-link>
                        <x-dropdown-link href="#" class="text-gray-700 hover:bg-red-50 hover:text-red-800">
                            {{ __('Settings') }}
                        </x-dropdown-link>
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault(); this.closest('form').submit();"
                                class="text-gray-700 hover:bg-red-50 hover:text-red-800">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>
        </div>
    </div>
</div>

                    <!-- Recent Activities / Updates Section -->
                    <div class="bg-gradient-to-br from-white to-blue-50 rounded-xl shadow p-6 border border-gray-200 animate-fade-in animate-delay-100 mt-8">
                        <div class="section-header-gradient p-4 rounded-t-xl mb-4">
                            <h2 class="text-xl font-semibold text-white">Recent Activities / Updates</h2>
                        </div>
                        <div class="max-h-60 overflow-y-auto space-y-3 pr-2">
                            <div class="flex items-start gap-3 p-3 bg-gray-50 rounded-lg border border-gray-100 hover:shadow-md transition-all duration-200 hover:scale-[1.01]">
                                <i class="bi bi-person-check-fill text-blue-500 text-xl flex-shrink-0 mt-1"></i>
                                <div>
                                    <p class="font-semibold text-gray-800">User 'Admin' logged in from IP 192.168.1.10.</p>
                                    <p class="text-xs text-gray-500 mt-1">5 minutes ago</p>
                                </div>
                            </div>
                            <div class="flex items-start gap-3 p-3 bg-gray-50 rounded-lg border border-gray-100 hover:shadow-md transition-all duration-200 hover:scale-[1.01]">
                                <i class="bi bi-check-circle-fill text-green-500 text-xl flex-shrink-0 mt-1"></i>
                                <div>
                                    <p class="font-semibold text-gray-800">Approved leave request for John Doe.</p>
                                    <p class="text-xs text-gray-500 mt-1">2 minutes ago</p>
                                </div>
                            </div>
                            <div class="flex items-start gap-3 p-3 bg-gray-50 rounded-lg border border-gray-100 hover:shadow-md transition-all duration-200 hover:scale-[1.01]">
                                <i class="bi bi-folder-fill text-purple-500 text-xl flex-shrink-0 mt-1"></i>
                                <div>
                                    <p class="font-semibold text-gray-800">Project "New Dashboard UI" updated by Alice Johnson.</p>
                                    <p class="text-xs text-gray-500 mt-1">1 hour ago</p>
                                </div>
                            </div>
                            <div class="flex items-start gap-3 p-3 bg-gray-50 rounded-lg border border-gray-100 hover:shadow-md transition-all duration-200 hover:scale-[1.01]">
                                <i class="bi bi-exclamation-triangle-fill text-yellow-500 text-xl flex-shrink-0 mt-1"></i>
                                <div>
                                    <p class="font-semibold text-gray-800">2 pending expense report approvals.</p>
                                    <p class="text-xs text-gray-500 mt-1">Yesterday</p>
                                </div>
                            </div>
                            <div class="p-3 bg-gray-50 rounded-lg border border-gray-100 flex items-start gap-3 hover:shadow-md transition-all duration-200 hover:scale-[1.01]">
                                <i class="bi bi-clipboard-check-fill text-purple-500 text-xl flex-shrink-0 mt-1"></i>
                                <div>
                                    <p class="font-semibold text-gray-800">Approved expense report for Sarah Lee.</p>
                                    <p class="text-xs text-gray-500 mt-1">2 days ago</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Quick Stats -->
                    <div class="overflow-x-auto hide-scrollbar pb-4 animate-fade-in animate-delay-300">
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 min-w-[700px]"> {{-- Updated for responsiveness --}}
                            <a href="{{ route('employees.index') }}" class="p-5 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 ease-in-out hover:scale-[1.01]
                                bg-white text-red-600 border border-gray-200
                                flex flex-col items-start gap-3 cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-red-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                                <h3 class="text-sm text-gray-500">Total Employees</h3>
                                <p class="text-3xl font-bold">120</p>
                            </a>
                            <div class="p-5 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 ease-in-out hover:scale-[1.01]
                                bg-white text-green-600 border border-gray-200
                                flex flex-col items-start gap-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-green-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="18" height="18" x="3" y="4" rx="2" ry="2"/><line x1="16" x2="16" y1="2" y2="6"/><line x1="8" x2="8" y1="2" y2="6"/><line x1="3" x2="21" y1="10" y2="10"/></svg>
                                <h3 class="text-sm text-gray-500">Present Today</h3>
                                <p class="text-3xl font-bold">98</p>
                            </div>
                            <div class="p-5 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 ease-in-out hover:scale-[1.01]
                                bg-white text-purple-600 border border-gray-200
                                flex flex-col items-start gap-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-purple-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/><path d="M12 22c4.4 0 8-3.6 8-8V7h-4V3H8v4H4v7c0 4.4 3.6 8 8 8z"/></svg>
                                <h3 class="text-sm text-gray-500">Punch-In Users</h3>
                                <p class="text-3xl font-bold">65</p>
                            </div>
                            <div class="p-5 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 ease-in-out hover:scale-[1.01]
                                bg-white text-yellow-500 border border-gray-200
                                flex flex-col items-start gap-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-yellow-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"/><polyline points="14 2 14 8 20 8"/><line x1="16" x2="8" y1="13" y2="13"/><line x1="16" x2="8" y1="17" y2="17"/><line x1="10" x2="8" y1="9" y2="9"/></svg>
                                <h3 class="text-sm text-gray-500">Pending Leaves</h3>
                                <p class="text-3xl font-bold">12</p>
                            </div>
                            <div class="p-5 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 ease-in-out hover:scale-[1.01]
                                bg-white text-pink-600 border border-gray-200
                                flex flex-col items-start gap-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-pink-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 20h16a2 2 0 0 0 2-2V8a2 2 0 0 0-2-2h-7.93a2 2 0 0 1-1.66-.9l-.82-1.2A2 2 0 0 0 4.32 2H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2z"/></svg>
                                <h3 class="text-sm text-gray-500">Active Projects</h3>
                                <p class="text-3xl font-bold">08</p>
                            </div>
                        </div>
                    </div>

                    <!-- Charts Section -->
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 animate-fade-in animate-delay-400">
                        <!-- Task Completion Rate Pie Chart -->
                        <div class="bg-gradient-to-br from-white to-blue-50 rounded-xl shadow p-6 border border-gray-200">
                            <div class="section-header-gradient p-4 rounded-t-xl mb-4">
                                <h2 class="text-xl font-semibold text-white">Task Completion Rate</h2>
                            </div>
                            <div class="chart-container">
                                <canvas id="taskCompletionChart"></canvas>
                            </div>
                            <div class="mt-4 grid grid-cols-3 gap-4 text-center">
                                <div class="p-2">
                                    <div class="flex items-center justify-center gap-2">
                                        <div class="w-3 h-3 bg-green-500 rounded-full"></div>
                                        <span class="text-sm text-gray-600">Completed</span>
                                    </div>
                                    <p class="text-lg font-bold text-green-600">75%</p>
                                </div>
                                <div class="p-2">
                                    <div class="flex items-center justify-center gap-2">
                                        <div class="w-3 h-3 bg-yellow-500 rounded-full"></div>
                                        <span class="text-sm text-gray-600">In Progress</span>
                                    </div>
                                    <p class="text-lg font-bold text-yellow-600">20%</p>
                                </div>
                                <div class="p-2">
                                    <div class="flex items-center justify-center gap-2">
                                        <div class="w-3 h-3 bg-red-500 rounded-full"></div>
                                        <span class="text-sm text-gray-600">Pending</span>
                                    </div>
                                    <p class="text-lg font-bold text-red-600">5%</p>
                                </div>
                            </div>
                        </div>

                        <!-- Monthly Attendance Bar Graph -->
                        <div class="bg-gradient-to-br from-white to-blue-50 rounded-xl shadow p-6 border border-gray-200">
                            <div class="section-header-gradient p-4 rounded-t-xl mb-4">
                                <h2 class="text-xl font-semibold text-white">Monthly Attendance - <span id="currentYear">2025</span></h2>
                            </div>
                            <div class="chart-container">
                                <canvas id="attendanceChart"></canvas>
                            </div>
                        </div>
                    </div>

                    <!-- Notifications and Quick Actions Wrapper -->
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 animate-fade-in animate-delay-500"> {{-- New wrapper for 2-column layout on desktop --}}
                        <!-- Notifications Section -->
                        <div class="bg-white p-6 rounded-xl shadow-lg">
                            <h2 class="text-2xl font-bold text-gray-800 mb-4">Notifications</h2>
                            <ul class="space-y-3">
                                <li class="flex items-center gap-3 text-gray-700">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                                    <span>Leave approved for John Doe.</span>
                                </li>
                                <li class="flex items-center gap-3 text-gray-700">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-yellow-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"/><line x1="12" x2="12" y1="9" y2="13"/><line x1="12" x2="12.01" y1="17" y2="17"/></svg>
                                    <span>Task "Website Redesign" deadline is tomorrow.</span>
                                </li>
                                <li class="flex items-center gap-3 text-gray-700">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                                    <span>New employee, Jane Smith, has joined the team.</span>
                                </li>
                            </ul>
                        </div>

                        <!-- Quick Actions Section -->
                        <div class="bg-white p-6 rounded-xl shadow-lg animate-fade-in animate-delay-600">
                            <h2 class="text-2xl font-bold text-gray-800 mb-4">Quick Actions</h2>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4"> {{-- Adjusted for responsiveness within its column --}}
                                <a href="#" class="flex flex-col items-center justify-center p-4 rounded-xl text-white text-center
                                                  bg-gradient-to-br from-[#ef4444] to-[#f87171] shadow-md
                                                  hover:scale-105 hover:shadow-xl transition-all duration-300 ease-in-out">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 mb-2" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><line x1="19" x2="19" y1="8" y2="14"/><line x1="22" x2="16" y1="11" y2="11"/></svg>
                                    <span class="font-semibold">Add Employee</span>
                                </a>
                                <a href="#" class="flex flex-col items-center justify-center p-4 rounded-xl text-white text-center
                                                  bg-gradient-to-br from-green-500 to-green-700 shadow-md
                                                  hover:scale-105 hover:shadow-xl transition-all duration-300 ease-in-out">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 mb-2" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M8 2v4"/><path d="M16 2v4"/><path d="M21 13V7a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h8"/><path d="M3 10h18"/><path d="M19 16v6"/><path d="M22 19h-6"/></svg>
                                    <span class="font-semibold">Add Holiday</span>
                                </a>
                                <a href="#" class="flex flex-col items-center justify-center p-4 rounded-xl text-white text-center
                                                  bg-gradient-to-br from-purple-500 to-purple-700 shadow-md
                                                  hover:scale-105 hover:shadow-xl transition-all duration-300 ease-in-out">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 mb-2" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 20h16a2 2 0 0 0 2-2V8a2 2 0 0 0-2-2h-7.93a2 2 0 0 1-1.66-.9l-.82-1.2A2 2 0 0 0 4.32 2H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2z"/><line x1="12" x2="12" y1="10" y2="16"/><line x1="9" x2="15" y1="13" y2="13"/></svg>
                                    <span class="font-semibold">Create Project</span>
                                </a>
                                <a href="#" class="flex flex-col items-center justify-center p-4 rounded-xl text-white text-center
                                                  bg-gradient-to-br from-yellow-500 to-yellow-700 shadow-md
                                                  hover:scale-105 hover:shadow-xl transition-all duration-300 ease-in-out">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 mb-2" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"/><polyline points="14 2 14 8 20 8"/><line x1="16" x2="8" y1="13" y2="13"/><line x1="16" x2="8" y1="17" y2="17"/><line x1="10" x2="8" y1="9" y2="9"/></svg>
                                    <span class="font-semibold">Generate Report</span>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Attendance Overview -->
                    <div class="bg-gradient-to-br from-white to-blue-50 rounded-xl shadow p-6 border border-gray-200 animate-fade-in animate-delay-700 mt-8">
                        <div class="section-header-gradient p-4 rounded-t-xl mb-4">
                            <h2 class="text-xl font-semibold text-white">Attendance Overview</h2>
                        </div>
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                            <div class="p-4 bg-blue-100 rounded-lg text-center hover:shadow-md transition-all duration-200 hover:scale-[1.01]">
                                <h3 class="text-gray-700">Punch-in Today</h3>
                                <p class="text-2xl font-bold text-blue-600">98</p>
                            </div>
                            <div class="p-4 bg-yellow-100 rounded-lg text-center hover:shadow-md transition-all duration-200 hover:scale-[1.01]">
                                <h3 class="text-gray-700">Late Comers</h3>
                                <p class="text-2xl font-bold text-yellow-600">12</p>
                            </div>
                            <div class="p-4 bg-red-100 rounded-lg text-center hover:shadow-md transition-all duration-200 hover:scale-[1.01]">
                                <h3 class="text-gray-700">Absent</h3>
                                <p class="text-2xl font-bold text-red-500">10</p>
                            </div>
                            <div class="p-4 bg-green-100 rounded-lg text-center hover:shadow-md transition-all duration-200 hover:scale-[1.01]">
                                <h3 class="text-gray-700">Compliance</h3>
                                <p class="text-2xl font-bold text-green-600">92%</p>
                            </div>
                        </div>
                    </div>

                    <!-- Recruitment Status Panel -->
                    <div class="bg-gradient-to-br from-white to-blue-50 rounded-xl shadow p-6 border border-gray-200 animate-fade-in animate-delay-800 mt-8">
                        <div class="section-header-gradient p-4 rounded-t-xl mb-4">
                            <h2 class="text-xl font-semibold text-white">Recruitment Status</h2>
                        </div>
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                            <div class="p-4 bg-blue-100 rounded-lg text-center flex flex-col items-center gap-2 hover:shadow-md transition-all duration-200 hover:scale-[1.01]">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-blue-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                                <h3 class="text-gray-700 text-lg font-semibold">Open Positions</h3>
                                <p class="text-4xl font-extrabold text-blue-600">15</p>
                            </div>
                            <div class="p-4 bg-green-100 rounded-lg text-center flex flex-col items-center gap-2 hover:shadow-md transition-all duration-200 hover:scale-[1.01]">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-green-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><path d="m9 12 2 2 4-4"/></svg>
                                <h3 class="text-gray-700 text-lg font-semibold">Candidates in Interview</h3>
                                <p class="text-4xl font-extrabold text-green-600">25</p>
                            </div>
                            <div class="p-4 bg-purple-100 rounded-lg text-center flex flex-col items-center gap-2 hover:shadow-md transition-all duration-200 hover:scale-[1.01]">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-purple-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"/><polyline points="14 2 14 8 20 8"/><line x1="16" x2="8" y1="13" y2="13"/><line x1="16" x2="8" y1="17" y2="17"/><line x1="10" x2="8" y1="9" y2="9"/></svg>
                                <h3 class="text-gray-700 text-lg font-semibold">Offers Released</h3>
                                <p class="text-4xl font-extrabold text-purple-600">07</p>
                            </div>
                        </div>
                    </div>

                    <!-- Team Performance Table -->
                    <div class="bg-gradient-to-br from-white to-blue-50 rounded-xl shadow p-6 border border-gray-200 animate-fade-in animate-delay-1000 mt-8">
                        <div class="section-header-gradient p-4 rounded-t-xl mb-4">
                            <h2 class="text-xl font-semibold text-white">Team Performance</h2>
                        </div>
                        <div class="flex flex-col sm:flex-row justify-between items-center mb-4 gap-4">
                            <div class="relative w-full sm:w-auto flex-1">
                                <input type="text" placeholder="Search employees..." class="w-full pl-10 pr-4 py-2 rounded-full bg-gray-100 text-gray-700 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-300">
                                <i class="bi bi-search absolute left-3 top-1/2 -translate-y-1/2 text-gray-500 h-5 w-5"></i>
                            </div>
                            <div x-data="{ filterOpen: false }" class="relative">
                                <button @click="filterOpen = !filterOpen" class="flex items-center gap-2 px-4 py-2 rounded-full bg-gray-100 text-gray-700 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-300">
                                    Filter by Status
                                    <i class="bi bi-chevron-down"></i>
                                </button>
                                <div x-show="filterOpen" @click.away="filterOpen = false"
                                     x-transition:enter="transition ease-out duration-200"
                                     x-transition:enter-start="opacity-0 scale-95"
                                     x-transition:enter-end="opacity-100 scale-100"
                                     x-transition:leave="transition ease-in duration-150"
                                     x-transition:leave-start="opacity-100 scale-100"
                                     x-transition:leave-end="opacity-0 scale-95"
                                     class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-xl z-10 overflow-hidden border border-gray-200">
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">All</a>
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">In Progress</a>
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Completed</a>
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Pending</a>
                                </div>
                            </div>
                        </div>
                        <table class="w-full border-collapse text-left">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="p-3 text-gray-800">Employee Name</th>
                                    <th class="p-3 text-gray-800">Current Task</th>
                                    <th class="p-3 text-gray-800">Progress</th>
                                    <th class="p-3 text-gray-800">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="border-t border-gray-200 hover:bg-gray-50 transition-colors duration-150" data-row="1">
                                    <td class="p-3 text-gray-700">Alice Johnson</td>
                                    <td class="p-3 text-gray-700">Develop new API endpoint</td>
                                    <td class="p-3">
                                        <div class="w-full bg-gray-200 rounded-full h-2.5">
                                            <div class="progress-bar h-2.5 rounded-full" data-progress="80"></div>
                                        </div>
                                    </td>
                                    <td class="p-3"><span class="status-badge px-2 py-1 text-xs font-semibold rounded-full">In Progress</span></td>
                                </tr>
                                <tr class="border-t border-gray-200 hover:bg-gray-50 transition-colors duration-150" data-row="2">
                                    <td class="p-3 text-gray-700">Bob Williams</td>
                                    <td class="p-3 text-gray-700">Design UI for dashboard</td>
                                    <td class="p-3">
                                        <div class="w-full bg-gray-200 rounded-full h-2.5">
                                            <div class="progress-bar h-2.5 rounded-full" data-progress="100"></div>
                                        </div>
                                    </td>
                                    <td class="p-3"><span class="status-badge px-2 py-1 text-xs font-semibold rounded-full">Completed</span></td>
                                </tr>
                                <tr class="border-t border-gray-200 hover:bg-gray-50 transition-colors duration-150" data-row="3">
                                    <td class="p-3 text-gray-700">Charlie Brown</td>
                                    <td class="p-3 text-gray-700">Review code for module X</td>
                                    <td class="p-3">
                                        <div class="w-full bg-gray-200 rounded-full h-2.5">
                                            <div class="progress-bar h-2.5 rounded-full" data-progress="30"></div>
                                        </div>
                                    </td>
                                    <td class="p-3"><span class="status-badge px-2 py-1 text-xs font-semibold rounded-full">Pending</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- Top Performer of the Month Box -->
                    <div class="bg-gradient-to-br from-white to-blue-50 rounded-xl shadow p-6 border border-gray-200 animate-fade-in animate-delay-1100 mt-8 text-center">
                        <h2 class="text-xl font-semibold text-gray-800 mb-4">Top Performer of the Month</h2>
                        <div class="flex flex-col items-center justify-center gap-3">
                            <img src="/placeholder.svg?height=80&width=80" alt="Top Performer" class="w-20 h-20 rounded-full object-cover border-4 border-green-400 shadow-md">
                            <p class="text-2xl font-bold text-green-600">Deepan Gain</p>
                            <p class="text-lg text-gray-700">Productivity Score: <span class="font-bold">92%</span></p>
                        </div>
                    </div>

                    <!-- Upcoming Deadlines Section -->
                    <div class="bg-gradient-to-br from-white to-blue-50 rounded-xl shadow p-6 border border-gray-200 animate-fade-in animate-delay-1200 mt-8">
                        <div class="section-header-gradient p-4 rounded-t-xl mb-4">
                            <h2 class="text-xl font-semibold text-white">Upcoming Deadlines</h2>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="p-4 bg-gray-50 rounded-lg border border-gray-100 flex items-center gap-4 hover:shadow-md transition-all duration-200 hover:scale-[1.01]">
                                <i class="bi bi-calendar-x-fill text-red-500 text-3xl"></i>
                                <div>
                                    <h3 class="font-semibold text-gray-800">Project Alpha Final Review</h3>
                                    <p class="text-sm text-gray-600">Deadline: July 28, 2025</p>
                                </div>
                            </div>
                            <div class="p-4 bg-gray-50 rounded-lg border border-gray-100 flex items-center gap-4 hover:shadow-md transition-all duration-200 hover:scale-[1.01]">
                                <i class="bi bi-calendar-x-fill text-red-500 text-3xl"></i>
                                <div>
                                    <h3 class="font-semibold text-gray-800">Marketing Campaign Launch</h3>
                                    <p class="text-sm text-gray-600">Deadline: August 5, 2025</p>
                                </div>
                            </div>
                            <div class="p-4 bg-gray-50 rounded-lg border border-gray-100 flex items-center gap-4 hover:shadow-md transition-all duration-200 hover:scale-[1.01]">
                                <i class="bi bi-calendar-x-fill text-red-500 text-3xl"></i>
                                <div>
                                    <h3 class="font-semibold text-gray-800">Q3 Financial Report</h3>
                                    <p class="text-sm text-gray-600">Deadline: September 10, 2025</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Upcoming Birthdays & Anniversaries Section -->
                    <div class="bg-gradient-to-br from-white to-blue-50 rounded-xl shadow p-6 border border-gray-200 animate-fade-in animate-delay-1300 mt-8">
                        <div class="section-header-gradient p-4 rounded-t-xl mb-4">
                            <h2 class="text-xl font-semibold text-white">Upcoming Birthdays & Anniversaries</h2>
                        </div>
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                            <!-- Example Card 1: Birthday -->
                            <div class="flex items-center gap-4 p-4 bg-gray-50 rounded-lg border border-gray-100 hover:shadow-md transition-all duration-200 hover:scale-[1.01]">
                                <img src="/placeholder.svg?height=64&width=64" alt="Employee Photo" class="w-16 h-16 rounded-full object-cover border-2 border-blue-300">
                                <div>
                                    <h3 class="font-semibold text-gray-800">Jane Doe</h3>
                                    <p class="text-sm text-gray-600">Birthday: August 10th</p>
                                </div>
                            </div>
                            <!-- Example Card 2: Anniversary -->
                            <div class="flex items-center gap-4 p-4 bg-gray-50 rounded-lg border border-gray-100 hover:shadow-md transition-all duration-200 hover:scale-[1.01]">
                                <img src="/placeholder.svg?height=64&width=64" alt="Employee Photo" class="w-16 h-16 rounded-full object-cover border-2 border-green-300">
                                <div>
                                    <h3 class="font-semibold text-gray-800">Michael Brown</h3>
                                    <p class="text-sm text-gray-600">Anniversary: September 5th</p>
                                </div>
                            </div>
                            <!-- Example Card 3: Birthday -->
                            <div class="flex items-center gap-4 p-4 bg-gray-50 rounded-lg border border-gray-100 hover:shadow-md transition-all duration-200 hover:scale-[1.01]">
                                <img src="/placeholder.svg?height=64&width=64" alt="Employee Photo" class="w-16 h-16 rounded-full object-cover border-2 border-purple-300">
                                <div>
                                    <h3 class="font-semibold text-gray-800">Sarah Lee</h3>
                                    <p class="text-sm text-gray-600">Birthday: October 22nd</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Announcements & Notices Section -->
                    <div class="bg-gradient-to-br from-white to-blue-50 rounded-xl shadow p-6 border border-gray-200 animate-fade-in animate-delay-1400 mt-8">
                        <div class="section-header-gradient p-4 rounded-t-xl mb-4">
                            <h2 class="text-xl font-semibold text-white">Announcements & Notices</h2>
                        </div>
                        <div class="max-h-60 overflow-y-auto space-y-4 pr-2">
                            <div class="p-3 bg-gray-50 rounded-lg border border-gray-100 hover:shadow-md transition-all duration-200 hover:scale-[1.01]">
                                <h3 class="font-semibold text-gray-800">Company Holiday on July 4th</h3>
                                <p class="text-sm text-gray-600 mt-1">Please note that the office will be closed on July 4th in observance of Independence Day.</p>
                                <p class="text-xs text-gray-500 mt-2">Posted: July 1, 2025</p>
                            </div>
                            <div class="p-3 bg-gray-50 rounded-lg border border-gray-100 hover:shadow-md transition-all duration-200 hover:scale-[1.01]">
                                <h3 class="font-semibold text-gray-800">New Employee Onboarding Session</h3>
                                <p class="text-sm text-gray-600 mt-1">A mandatory onboarding session for all new employees will be held on July 15th at 10 AM in Conference Room B.</p>
                                <p class="text-xs text-gray-500 mt-2">Posted: June 28, 2025</p>
                            </div>
                            <div class="p-3 bg-gray-50 rounded-lg border border-gray-100 hover:shadow-md transition-all duration-200 hover:scale-[1.01]">
                                <h3 class="font-semibold text-gray-800">IT System Maintenance</h3>
                                <p class="text-sm text-gray-600 mt-1">Scheduled IT system maintenance will occur on July 20th from 1 AM to 5 AM. Services may be temporarily interrupted.</p>
                                <p class="text-xs text-gray-500 mt-2">Posted: June 25, 2025</p>
                            </div>
                            <div class="p-3 bg-gray-50 rounded-lg border border-gray-100 flex items-start gap-3 hover:shadow-md transition-all duration-200 hover:scale-[1.01]">
                                <h3 class="font-semibold text-gray-800">Employee Wellness Program Launch</h3>
                                <p class="text-sm text-gray-600 mt-1">Join our new employee wellness program starting August 1st! Details on activities and benefits will be shared soon.</p>
                                <p class="text-xs text-gray-500 mt-2">Posted: June 20, 2025</p>
                            </div>
                        </div>
                    </div>

                    <!-- HR Policies Section -->
                    <div class="bg-gradient-to-br from-white to-blue-50 rounded-xl shadow p-6 border border-gray-200 animate-fade-in animate-delay-1500 mt-8">
                        <div class="section-header-gradient p-4 rounded-t-xl mb-4">
                            <h2 class="text-xl font-semibold text-white">HR Policies</h2>
                        </div>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <button class="flex items-center justify-center p-4 rounded-lg bg-gradient-to-r from-blue-500 to-blue-700 text-white font-semibold shadow-md hover:from-blue-600 hover:to-blue-800 transition-all duration-200 hover:scale-105">
                                <i class="bi bi-file-earmark-text-fill text-2xl mr-2"></i>
                                Download Policies
                            </button>
                            <button class="flex items-center justify-center p-4 rounded-lg bg-gradient-to-r from-green-500 to-green-700 text-white font-semibold shadow-md hover:from-green-600 hover:to-green-800 transition-all duration-200 hover:scale-105">
                                <i class="bi bi-book-fill text-2xl mr-2"></i>
                                View Guidelines
                            </button>
                        </div>
                    </div>

                    <!-- Motivational Quote Section -->
                    <div class="bg-gradient-to-br from-white to-blue-50 rounded-xl shadow p-6 border border-gray-200 animate-fade-in animate-delay-1600 mt-8 hover:shadow-xl transition-all duration-200 hover:scale-[1.01]">
                        <p class="text-xl font-semibold text-gray-800 italic">
                            "The only way to do great work is to love what you do."
                        </p>
                        <p class="text-sm text-gray-600 mt-2">- Steve Jobs</p>
                    </div>
                </div>
            </div>

            <!-- Chart.js CDN -->
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

            <script>
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

                function updateClock() {
                    const now = new Date();
                    let hours = now.getHours();
                    let minutes = now.getMinutes();
                    let seconds = now.getSeconds();
                    const ampm = hours >= 12 ? 'PM' : 'AM';

                    hours = hours % 12;
                    hours = hours ? hours : 12; // the hour '0' should be '12'
                    minutes = minutes < 10 ? '0'+minutes : minutes;
                    seconds = seconds < 10 ? '0'+seconds : seconds;

                    const time = hours + ':' + minutes + ':' + seconds + ' ' + ampm;
                    document.getElementById('clock-time').textContent = time;
                    setTimeout(updateClock, 1000);
                }

                // Initialize progress bars with dynamic colors and animations
                function initializeProgressBars() {
                    const progressBars = document.querySelectorAll('.progress-bar');
                    
                    progressBars.forEach(bar => {
                        const progress = parseInt(bar.getAttribute('data-progress'));
                        
                        // Remove any existing color classes
                        bar.classList.remove('green', 'blue', 'yellow');
                        
                        // Determine color based on progress value
                        let colorClass = '';
                        if (progress === 100) {
                            colorClass = 'green';
                        } else if (progress >= 50) {
                            colorClass = 'blue';
                        } else {
                            colorClass = 'yellow';
                        }
                        
                        // Add the appropriate color class
                        bar.classList.add(colorClass);
                        
                        // Animate the progress bar after a delay
                        setTimeout(() => {
                            bar.style.width = progress + '%';
                        }, 500);
                    });
                }

                // Update status badges based on progress values
                function updateStatusBadges() {
                    const rows = document.querySelectorAll('[data-row]');
                    
                    rows.forEach(row => {
                        const progressBar = row.querySelector('.progress-bar');
                        const statusBadge = row.querySelector('.status-badge');
                        
                        if (progressBar && statusBadge) {
                            const progress = parseInt(progressBar.getAttribute('data-progress'));
                            
                            // Remove existing classes
                            statusBadge.className = 'status-badge px-2 py-1 text-xs font-semibold rounded-full';
                            
                            // Update status text and styling based on progress
                            if (progress === 100) {
                                statusBadge.textContent = 'Completed';
                                statusBadge.classList.add('text-green-800', 'bg-green-200');
                            } else if (progress >= 50) {
                                statusBadge.textContent = 'In Progress';
                                statusBadge.classList.add('text-blue-800', 'bg-blue-200');
                            } else {
                                statusBadge.textContent = 'Pending';
                                statusBadge.classList.add('text-yellow-800', 'bg-yellow-200');
                            }
                        }
                    });
                }

                // Function to handle dynamic updates when data-progress changes
                function updateProgressAndStatus() {
                    initializeProgressBars();
                    updateStatusBadges();
                }

                // Initialize Task Completion Pie Chart
                function initializeTaskCompletionChart() {
                    const ctx = document.getElementById('taskCompletionChart').getContext('2d');
                    new Chart(ctx, {
                        type: 'pie',
                        data: {
                            labels: ['Completed', 'In Progress', 'Pending'],
                            datasets: [{
                                data: [75, 20, 5],
                                backgroundColor: [
                                    '#10b981', // Green
                                    '#f59e0b', // Yellow
                                    '#ef4444'  // Red
                                ],
                                borderWidth: 2,
                                borderColor: '#ffffff'
                            }]
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            plugins: {
                                legend: {
                                    display: false
                                },
                                tooltip: {
                                    callbacks: {
                                        label: function(context) {
                                            return context.label + ': ' + context.parsed + '%';
                                        }
                                    }
                                }
                            }
                        }
                    });
                }

                // Initialize Monthly Attendance Bar Chart
                function initializeAttendanceChart() {
                    const ctx = document.getElementById('attendanceChart').getContext('2d');
                    const currentYear = new Date().getFullYear();
                    document.getElementById('currentYear').textContent = currentYear;
                    
                    new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                            datasets: [{
                                label: 'Total Present',
                                data: [2180, 1950, 2200, 2100, 2250, 2150, 2300, 2180, 2120, 2200, 2050, 2100],
                                backgroundColor: '#3b82f6',
                                borderColor: '#1d4ed8',
                                borderWidth: 1,
                                borderRadius: 4
                            }]
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            plugins: {
                                legend: {
                                    display: false
                                }
                            },
                            scales: {
                                y: {
                                    beginAtZero: true,
                                    title: {
                                        display: true,
                                        text: 'Total Present'
                                    }
                                },
                                x: {
                                    title: {
                                        display: true,
                                        text: 'Months'
                                    }
                                }
                            }
                        }
                    });
                }

                // Initialize everything when the page loads
                document.addEventListener('DOMContentLoaded', function() {
                    updateClocks();
                    updateProgressAndStatus();
                    initializeTaskCompletionChart();
                    initializeAttendanceChart();
                    
                    // Update clocks every second
                    setInterval(updateClocks, 1000);
                    
                    // Optional: Add mutation observer to detect changes in data-progress attributes
                    const observer = new MutationObserver(function(mutations) {
                        mutations.forEach(function(mutation) {
                            if (mutation.type === 'attributes' && mutation.attributeName === 'data-progress') {
                                updateProgressAndStatus();
                            }
                        });
                    });
                    
                    // Observe all progress bars for attribute changes
                    document.querySelectorAll('.progress-bar').forEach(bar => {
                        observer.observe(bar, { attributes: true });
                    });
                });

                // For testing: Function to manually update progress (you can call this from console)
                function setProgress(rowNumber, newProgress) {
                    const row = document.querySelector(`[data-row="${rowNumber}"]`);
                    if (row) {
                        const progressBar = row.querySelector('.progress-bar');
                        if (progressBar) {
                            progressBar.setAttribute('data-progress', newProgress);
                            updateProgressAndStatus();
                        }
                    }
                }
            </script>

        </div>
    </div>
</div>
</div>
</x-app-layout>