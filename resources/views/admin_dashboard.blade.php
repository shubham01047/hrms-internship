<x-app-layout>
<x-slot name="header">
<h2 class="font-semibold text-xl text-black leading-tight">
    {{ __('Admin Dashboard') }}
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

                /* Dynamic Leave Status Styles */
                .leave-status-badge {
                    transition: all 0.3s ease-in-out;
                    transform: scale(1);
                }

                .leave-status-badge:hover {
                    transform: scale(1.05);
                }

                /* Status-specific styles - Only 3 statuses as requested */
                .status-pending {
                    background-color: #fef3c7 !important;
                    color: #92400e !important;
                    border: 1px solid #f59e0b;
                }

                .status-approved {
                    background-color: #d1fae5 !important;
                    color: #065f46 !important;
                    border: 1px solid #10b981;
                }

                .status-rejected {
                    background-color: #fee2e2 !important;
                    color: #991b1b !important;
                    border: 1px solid #ef4444;
                }
            </style>

            <div class="py-12 bg-gray-100 min-h-screen"> {{-- Set overall background to gray-100 and ensure min-height --}}
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 grid grid-cols-1 gap-6"> {{-- Consistent vertical spacing between sections --}}

                    <!-- Header -->
                    <div class="header-gradient text-white p-6 rounded-xl shadow-lg flex justify-center items-center animate-fade-in relative">
                        <!-- Centered: Search, Clock -->
                        <div class="flex flex-col sm:flex-row items-center gap-4 w-full max-w-4xl justify-center">
                            <!-- Search Bar -->
                            <div class="relative flex-1 w-full sm:w-auto max-w-md">
                                <input type="text" placeholder="Search employees..." class="w-full pl-10 pr-4 py-2 rounded-full bg-white bg-opacity-20 text-white placeholder-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-opacity-50">
                                <svg class="absolute left-3 top-1/2 -translate-y-1/2 text-white h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                            </div>
                            
                            <!-- Live Clock -->
                            <div id="live-clock" class="text-lg font-medium whitespace-nowrap">
                                <span id="clock-time"></span>
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

                    <!-- Welcome Section -->
                    <div class="bg-white p-6 rounded-xl shadow-lg border border-gray-200 animate-fade-in animate-delay-200">
                        <h2 class="text-2xl font-bold text-gray-800 mb-2">Welcome, {{ Auth::user()->name }}!</h2>
                        <p class="text-gray-600 text-lg">Here's your quick overview for today.</p>
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

                    <!-- Notifications and Quick Actions Wrapper -->
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 animate-fade-in animate-delay-400"> {{-- New wrapper for 2-column layout on desktop --}}
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
                        <div class="bg-white p-6 rounded-xl shadow-lg animate-fade-in animate-delay-500">
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
                    <div class="bg-gradient-to-br from-white to-blue-50 rounded-xl shadow p-6 border border-gray-200 animate-fade-in animate-delay-600 mt-8">
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

                    <!-- Employee Directory Table and Recruitment Status Panel Wrapper -->
                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 animate-fade-in animate-delay-700 mt-8">
                        <!-- Employee Directory Table -->
                        <div class="lg:col-span-2 bg-gradient-to-br from-white to-blue-50 rounded-xl shadow p-6 border border-gray-200">
                            <div class="section-header-gradient p-4 rounded-t-xl mb-4">
                                <h2 class="text-xl font-semibold text-white">Employee Directory</h2>
                            </div>
                            <div class="overflow-x-auto">
                                <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gradient-to-r from-red-600 to-red-700">
                                <tr>
                                    <th class="px-6 py-4 text-left text-xs font-bold text-white uppercase tracking-wider rounded-tl-lg">
                                        <div class="flex items-center space-x-2">
                                            <span>#</span>
                                        </div>
                                    </th>
                                    <th class="px-6 py-4 text-left text-xs font-bold text-white uppercase tracking-wider">
                                        <div class="flex items-center space-x-2">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                            </svg>
                                            <span>Employee</span>
                                        </div>
                                    </th>
                                    <th class="px-6 py-4 text-left text-xs font-bold text-white uppercase tracking-wider">
                                        <div class="flex items-center space-x-2">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                            </svg>
                                            <span>Email</span>
                                        </div>
                                    </th>
                                    <th class="px-6 py-4 text-left text-xs font-bold text-white uppercase tracking-wider">
                                        <div class="flex items-center space-x-2">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3a4 4 0 118 0v4m-4 6v6m-4-6h8"></path>
                                            </svg>
                                            <span>Joined</span>
                                        </div>
                                    </th>
                                    <th class="px-6 py-4 text-left text-xs font-bold text-white uppercase tracking-wider rounded-tr-lg hidden">
                                        <div class="flex items-center space-x-2">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"></path>
                                            </svg>
                                            <span>Actions</span>
                                        </div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @if ($employees->isNotEmpty())
                                    @foreach ($employees as $index => $employee)
                                        <tr class="hover:bg-gradient-to-r hover:from-gray-50 hover:to-gray-100 transition-all duration-300 ease-in-out transform hover:scale-[1.01]">
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center justify-center w-8 h-8 bg-gradient-to-r from-gray-100 to-gray-200 rounded-full text-sm font-semibold text-gray-700">
                                                    {{ $index + 1 }}
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div class="flex-shrink-0 h-12 w-12">
                                                        <div class="h-12 w-12 rounded-full bg-gradient-to-r from-indigo-400 to-indigo-600 flex items-center justify-center shadow-lg">
                                                            <span class="text-white font-semibold text-lg">
                                                                {{ strtoupper(substr($employee->first_name, 0, 1) . substr($employee->last_name, 0, 1)) }}
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="ml-4">
                                                        <div class="text-sm font-semibold text-gray-900">
                                                            {{ $employee->first_name . ' ' . $employee->last_name }}
                                                        </div>
                                                        <div class="text-sm text-gray-500">Employee</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <svg class="w-4 h-4 text-gray-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                                    </svg>
                                                    <span class="text-sm text-gray-900">{{ $employee->email }}</span>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <svg class="w-4 h-4 text-gray-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3a4 4 0 118 0v4m-4 6v6m-4-6h8"></path>
                                                    </svg>
                                                    <span class="text-sm text-gray-900 font-medium">
                                                        {{ \Carbon\Carbon::parse($employee->created_at)->format('d M, Y') }}
                                                    </span>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap hidden">
                                                <div class="flex items-center space-x-3">
                                                    @can('edit employee')
                                                        <a href="{{ route('employees.edit', $employee->id) }}"
                                                           class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-blue-500 to-blue-600 text-white text-xs font-semibold rounded-lg shadow-md hover:from-blue-600 hover:to-blue-700 hover:scale-105 transform transition-all duration-300 ease-in-out focus:outline-none focus:ring-4 focus:ring-blue-300">
                                                            <x-pencil class="w-3 h-3 mr-1"/>
                                                            Edit
                                                        </a>
                                                    @endcan
                                                    @can('delete employee')
                                                        <a href="javascript:void(0);" onclick="deleteEmployee({{ $employee->id }})"
                                                           class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-red-500 to-red-600 text-white text-xs font-semibold rounded-lg shadow-md hover:from-red-600 hover:to-red-700 hover:scale-105 transform transition-all duration-300 ease-in-out focus:outline-none focus:ring-4 focus:ring-red-300">
                                                            <x-trashcan class="w-3 h-3 mr-1"/>
                                                            Delete
                                                        </a>
                                                    @endcan
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="5" class="px-6 py-12 text-center">
                                            <div class="flex flex-col items-center justify-center space-y-4">
                                                <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center">
                                                    <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                                                    </svg>
                                                </div>
                                                <div class="text-lg font-medium text-gray-900">No employees found</div>
                                                <div class="text-sm text-gray-500">Get started by adding your first employee.</div>
                                            </div>
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                            </div>
                        </div>

                        <!-- Recruitment Status Panel -->
                        <div class="bg-gradient-to-br from-white to-blue-50 rounded-xl shadow p-6 border border-gray-200">
                            <div class="section-header-gradient p-4 rounded-t-xl mb-4">
                                <h2 class="text-xl font-semibold text-white">Recruitment Status</h2>
                            </div>
                            <div class="space-y-4">
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
                    </div>


                    <!-- Leave Management -->
                    <div class="bg-gradient-to-br from-white to-blue-50 rounded-xl shadow p-6 border border-gray-200 animate-fade-in animate-delay-800 mt-8">
                        <div class="section-header-gradient p-4 rounded-t-xl mb-4">
                            <h2 class="text-xl font-semibold text-white">Recent Leave Requests Table</h2>
                        </div>
                        <div class="flex flex-col sm:flex-row justify-between items-center mb-4 gap-4">
                            <div class="relative w-full sm:w-auto flex-1">
                                <input type="text" placeholder="Search leaves..." class="w-full pl-10 pr-4 py-2 rounded-full bg-gray-100 text-gray-700 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-300">
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
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Pending</a>
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Approved</a>
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Rejected</a>
                                </div>
                            </div>
                        </div>

                        <table class="w-full border-collapse text-left">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="p-3 text-gray-800">Employee Name</th>
                                    <th class="p-3 text-gray-800">Leave Type</th>
                                    <th class="p-3 text-gray-800">From Date</th>
                                    <th class="p-3 text-gray-800">To Date</th>
                                    <th class="p-3 text-gray-800">Status</th>
                                    <th class="p-3 text-gray-800">Action Buttons</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="border-t border-gray-200 hover:bg-gray-50 transition-colors duration-150" data-leave-row="1">
                                    <td class="p-3 text-gray-700">John Doe</td>
                                    <td class="p-3 text-gray-700">Sick Leave</td>
                                    <td class="p-3 text-gray-700">20 Jul</td>
                                    <td class="p-3 text-gray-700">22 Jul</td>
                                    <td class="p-3">
                                        <span class="leave-status-badge px-3 py-1 text-xs font-semibold rounded-full" data-status="pending">
                                            Pending
                                        </span>
                                    </td>
                                    <td class="p-3">
                                        <button onclick="updateLeaveStatus(1, 'approved')" class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600 transition-colors duration-200">Approve</button>
                                        <button onclick="updateLeaveStatus(1, 'rejected')" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 ml-2 transition-colors duration-200">Reject</button>
                                    </td>
                                </tr>
                                <tr class="border-t border-gray-200 hover:bg-gray-50 transition-colors duration-150" data-leave-row="2">
                                    <td class="p-3 text-gray-700">Alice Smith</td>
                                    <td class="p-3 text-gray-700">Casual Leave</td>
                                    <td class="p-3 text-gray-700">23 Jul</td>
                                    <td class="p-3 text-gray-700">24 Jul</td>
                                    <td class="p-3">
                                        <span class="leave-status-badge px-3 py-1 text-xs font-semibold rounded-full" data-status="approved">
                                            Approved
                                        </span>
                                    </td>
                                    <td class="p-3">
                                        <button onclick="updateLeaveStatus(2, 'approved')" class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600 transition-colors duration-200">Approve</button>
                                        <button onclick="updateLeaveStatus(2, 'rejected')" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 ml-2 transition-colors duration-200">Reject</button>
                                    </td>
                                </tr>
                                <tr class="border-t border-gray-200 hover:bg-gray-50 transition-colors duration-150" data-leave-row="3">
                                    <td class="p-3 text-gray-700">Bob Johnson</td>
                                    <td class="p-3 text-gray-700">Annual Leave</td>
                                    <td class="p-3 text-gray-700">15 Aug</td>
                                    <td class="p-3 text-gray-700">20 Aug</td>
                                    <td class="p-3">
                                        <span class="leave-status-badge px-3 py-1 text-xs font-semibold rounded-full" data-status="pending">
                                            Pending
                                        </span>
                                    </td>
                                    <td class="p-3">
                                        <button onclick="updateLeaveStatus(3, 'approved')" class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600 transition-colors duration-200">Approve</button>
                                        <button onclick="updateLeaveStatus(3, 'rejected')" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 ml-2 transition-colors duration-200">Reject</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>



                    <!-- Team Performance Table -->
                    <div class="bg-gradient-to-br from-white to-blue-50 rounded-xl shadow p-6 border border-gray-200 animate-fade-in animate-delay-900 mt-8">
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
                    <div class="bg-gradient-to-br from-white to-blue-50 rounded-xl shadow p-6 border border-gray-200 animate-fade-in animate-delay-1000 mt-8 text-center">
                        <h2 class="text-xl font-semibold text-gray-800 mb-4">Top Performer of the Month</h2>
                        <div class="flex flex-col items-center justify-center gap-3">
                            <img src="/placeholder.svg?height=80&width=80" alt="Top Performer" class="w-20 h-20 rounded-full object-cover border-4 border-green-400 shadow-md">
                            <p class="text-2xl font-bold text-green-600">Deepan Gain</p>
                            <p class="text-lg text-gray-700">Productivity Score: <span class="font-bold">92%</span></p>
                        </div>
                    </div>

                    <!-- Upcoming Deadlines Section -->
                    <div class="bg-gradient-to-br from-white to-blue-50 rounded-xl shadow p-6 border border-gray-200 animate-fade-in animate-delay-1100 mt-8">
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
                    <div class="bg-gradient-to-br from-white to-blue-50 rounded-xl shadow p-6 border border-gray-200 animate-fade-in animate-delay-1200 mt-8">
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
                    <div class="bg-gradient-to-br from-white to-blue-50 rounded-xl shadow p-6 border border-gray-200 animate-fade-in animate-delay-1300 mt-8">
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
                    <div class="bg-gradient-to-br from-white to-blue-50 rounded-xl shadow p-6 border border-gray-200 animate-fade-in animate-delay-1400 mt-8">
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
                    <div class="bg-gradient-to-br from-white to-blue-50 rounded-xl shadow p-6 border border-gray-200 animate-fade-in animate-delay-1500 mt-8 hover:shadow-xl transition-all duration-200 hover:scale-[1.01]">
                        <p class="text-xl font-semibold text-gray-800 italic">
                            "The only way to do great work is to love what you do."
                        </p>
                        <p class="text-sm text-gray-600 mt-2">- Steve Jobs</p>
                    </div>
                </div>
            </div>

            <script>
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

                // Dynamic Leave Status Update Function
                function updateLeaveStatus(rowNumber, newStatus) {
                    const row = document.querySelector(`[data-leave-row="${rowNumber}"]`);
                    if (!row) return;

                    const statusBadge = row.querySelector('.leave-status-badge');
                    if (!statusBadge) return;

                    // Remove all existing status classes
                    statusBadge.classList.remove('status-pending', 'status-approved', 'status-rejected');
                    
                    // Update the data-status attribute
                    statusBadge.setAttribute('data-status', newStatus);
                    
                    // Define status configurations - only 3 statuses as requested
                    const statusConfig = {
                        'pending': {
                            text: 'Pending',
                            class: 'status-pending'
                        },
                        'approved': {
                            text: 'Approved',
                            class: 'status-approved'
                        },
                        'rejected': {
                            text: 'Rejected',
                            class: 'status-rejected'
                        }
                    };

                    // Apply new status
                    const config = statusConfig[newStatus];
                    if (config) {
                        statusBadge.textContent = config.text;
                        statusBadge.classList.add(config.class);
                        
                        // Add a subtle animation effect
                        statusBadge.style.transform = 'scale(1.1)';
                        setTimeout(() => {
                            statusBadge.style.transform = 'scale(1)';
                        }, 200);
                    }
                }

                // Initialize leave status badges on page load
                function initializeLeaveStatusBadges() {
                    const statusBadges = document.querySelectorAll('.leave-status-badge');
                    
                    statusBadges.forEach(badge => {
                        const currentStatus = badge.getAttribute('data-status');
                        if (currentStatus) {
                            // Remove any existing status classes
                            badge.classList.remove('status-pending', 'status-approved', 'status-rejected');
                            
                            // Apply the appropriate class based on current status
                            switch(currentStatus) {
                                case 'pending':
                                    badge.classList.add('status-pending');
                                    break;
                                case 'approved':
                                    badge.classList.add('status-approved');
                                    break;
                                case 'rejected':
                                    badge.classList.add('status-rejected');
                                    break;
                            }
                        }
                    });
                }

                // Function to handle dynamic updates when data-progress changes
                function updateProgressAndStatus() {
                    initializeProgressBars();
                    updateStatusBadges();
                }

                // Initialize everything when the page loads
                document.addEventListener('DOMContentLoaded', function() {
                    updateClock();
                    updateProgressAndStatus();
                    initializeLeaveStatusBadges();
                    
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