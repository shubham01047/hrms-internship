<x-app-layout>
<x-slot name="header">
    <h2 class="font-semibold text-xl text-black leading-tight">
        {{ __('Manager Dashboard') }}
    </h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
            <div class="p-6 text-black">

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

                    /* Hide scrollbar for specific elements */
                    .hide-scrollbar::-webkit-scrollbar {
                        display: none;
                    }
                    .hide-scrollbar {
                        -ms-overflow-style: none;  /* IE and Edge */
                        scrollbar-width: none;  /* Firefox */
                    }
                </style>

                <div class="py-12 bg-gray-100 min-h-screen"> {{-- Set overall background to gray-100 and ensure min-height --}}
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 grid grid-cols-1 gap-6"> {{-- Consistent vertical spacing between sections --}}

                        <!-- Header -->
                        <div class="header-gradient text-white p-6 rounded-xl shadow-lg flex flex-col sm:flex-row justify-between items-center animate-fade-in">
                            <h1 class="text-3xl font-bold mb-4 sm:mb-0">Manager Dashboard</h1>
                            <div class="flex flex-col sm:flex-row items-center gap-4 w-full sm:w-auto">
                                <!-- Search Bar -->
                                <div class="relative flex-1 w-full sm:w-auto">
                                    <input type="text" placeholder="Search employees..." class="w-full pl-10 pr-4 py-2 rounded-full bg-white bg-opacity-20 text-white placeholder-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-opacity-50">
                                    <svg class="absolute left-3 top-1/2 -translate-y-1/2 text-white h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                                </div>
                                <!-- Live Clock -->
                                <div id="live-clock" class="text-lg font-medium whitespace-nowrap mt-2 sm:mt-0">
                                    <span id="clock-time"></span>
                                </div>

                                <!-- Notifications Bell icon and dropdown -->
                                <div x-data="{ notificationsOpen: false }" class="relative">
                                    <button @click="notificationsOpen = !notificationsOpen" class="p-2 rounded-full hover:bg-white hover:bg-opacity-30 transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-white focus:ring-opacity-50">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M6 8a6 6 0 0 1 12 0c0 7 3 9 3 9H3s3-2 3-9"/><path d="M10.36 14H13.64a2 2 0 0 1-.97 3.5c-.93.47-2.09.47-3.02 0a2 2 0 0 1-.97-3.5Z"/></svg>
                                        <span class="absolute top-1 right-1 h-2 w-2 rounded-full bg-red-500 animate-pulse"></span> <!-- Red dot badge -->
                                    </button>

                                    <div x-show="notificationsOpen" @click.away="notificationsOpen = false"
                                         x-transition:enter="transition ease-out duration-200"
                                         x-transition:enter-start="opacity-0 scale-95"
                                         x-transition:enter-end="opacity-100 scale-100"
                                         x-transition:leave="transition ease-in duration-150"
                                         x-transition:leave-start="opacity-100 scale-100"
                                         x-transition:leave-end="opacity-0 scale-95"
                                         class="absolute right-0 mt-2 w-64 bg-white rounded-lg shadow-xl z-[99] overflow-hidden border border-gray-200">
                                        <div class="py-2">
                                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition-colors duration-150">
                                                <span class="font-semibold">3 Pending Leave Approvals</span>
                                                <p class="text-xs text-gray-500">Review required</p>
                                            </a>
                                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition-colors duration-150">
                                                <span class="font-semibold">New Project "Alpha" Assigned</span>
                                                <p class="text-xs text-gray-500">Check details</p>
                                            </a>
                                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition-colors duration-150">
                                                <span class="font-semibold">Performance Review Due</span>
                                                <p class="text-xs text-gray-500">For John Doe</p>
                                            </a>
                                        </div>
                                        <div class="border-t border-gray-100">
                                            <a href="#" class="block px-4 py-2 text-sm text-red-600 hover:bg-red-50 text-center transition-colors duration-150">
                                                View All Notifications
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Top Summary Widgets -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 xl:grid-cols-5 gap-6 animate-fade-in animate-delay-100">
                            <div class="bg-gradient-to-br from-white to-blue-50 p-6 rounded-xl shadow text-center hover:shadow-xl transition-all duration-200 hover:scale-[1.01] border border-gray-200">
                                <div class="text-blue-600 mb-3">
                                    <i class="bi bi-people-fill text-4xl"></i>
                                </div>
                                <h3 class="text-gray-500 text-sm">Team Size</h3>
                                <p class="text-3xl font-bold text-blue-600">45</p>
                            </div>
                            <div class="bg-gradient-to-br from-white to-blue-50 p-6 rounded-xl shadow text-center hover:shadow-xl transition-all duration-200 hover:scale-[1.01] border border-gray-200">
                                <div class="text-green-600 mb-3">
                                    <i class="bi bi-folder-fill text-4xl"></i>
                                </div>
                                <h3 class="text-gray-500 text-sm">Active Projects</h3>
                                <p class="text-3xl font-bold text-green-600">12</p>
                            </div>
                            <div class="bg-gradient-to-br from-white to-blue-50 p-6 rounded-xl shadow text-center hover:shadow-xl transition-all duration-200 hover:scale-[1.01] border border-gray-200">
                                <div class="text-yellow-500 mb-3">
                                    <i class="bi bi-check2-square text-4xl"></i>
                                </div>
                                <h3 class="text-gray-500 text-sm">Pending Approvals</h3>
                                <p class="text-3xl font-bold text-yellow-500">7</p>
                            </div>
                            <div class="bg-gradient-to-br from-white to-blue-50 p-6 rounded-xl shadow text-center hover:shadow-xl transition-all duration-200 hover:scale-[1.01] border border-gray-200">
                                <div class="text-red-500 mb-3">
                                    <i class="bi bi-calendar-x-fill text-4xl"></i>
                                </div>
                                <h3 class="text-gray-500 text-sm">Upcoming Deadlines</h3>
                                <p class="text-3xl font-bold text-red-500">3</p>
                            </div>
                            <!-- New Payroll Summary Card -->
                            <div class="bg-gradient-to-br from-white to-blue-50 p-6 rounded-xl shadow text-center hover:shadow-xl transition-all duration-200 hover:scale-[1.01] border border-gray-200">
                                <div class="text-green-600 mb-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 mx-auto" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 20V10"/><path d="M18 20V4"/><path d="M6 20v-4"/></svg>
                                </div>
                                <h3 class="text-gray-500 text-sm">Payroll</h3>
                                <p class="text-3xl font-bold text-green-600">₹12.5L</p>
                            </div>
                        </div>

                        <!-- Quick Actions Buttons -->
                        <div class="bg-gradient-to-br from-white to-blue-50 rounded-xl shadow p-6 border border-gray-200 animate-fade-in animate-delay-200 mt-8">
                            <div class="section-header-gradient p-4 rounded-t-xl mb-4">
                                <h2 class="text-xl font-semibold text-white">Quick Actions</h2>
                            </div>
                            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                                <button class="flex items-center justify-center p-4 rounded-lg bg-gradient-to-r from-blue-500 to-blue-700 text-white font-semibold shadow-md hover:from-blue-600 hover:to-blue-800 transition-all duration-200 hover:scale-105">
                                    <i class="bi bi-check-circle-fill text-2xl mr-2"></i>
                                    Approve Leave Requests
                                </button>
                                <button class="flex items-center justify-center p-4 rounded-lg bg-gradient-to-r from-green-500 to-green-700 text-white font-semibold shadow-md hover:from-green-600 hover:to-green-800 transition-all duration-200 hover:scale-105">
                                    <i class="bi bi-graph-up text-2xl mr-2"></i>
                                    View Team Performance
                                </button>
                                <button class="flex items-center justify-center p-4 rounded-lg bg-gradient-to-r from-purple-500 to-purple-700 text-white font-semibold shadow-md hover:from-purple-600 hover:to-purple-800 transition-all duration-200 hover:scale-105">
                                    <i class="bi bi-list-task text-2xl mr-2"></i>
                                    Assign Tasks
                                </button>
                                <!-- New Buttons -->
                                <button class="flex items-center justify-center p-4 rounded-lg bg-gradient-to-r from-orange-500 to-orange-700 text-white font-semibold shadow-md hover:from-orange-600 hover:to-orange-800 transition-all duration-200 hover:scale-105">
                                    <i class="bi bi-file-earmark-arrow-down-fill text-2xl mr-2"></i>
                                    Export Employee Data
                                </button>
                                <button class="flex items-center justify-center p-4 rounded-lg bg-gradient-to-r from-teal-500 to-teal-700 text-white font-semibold shadow-md hover:from-teal-600 hover:to-teal-800 transition-all duration-200 hover:scale-105">
                                    <i class="bi bi-file-earmark-bar-graph-fill text-2xl mr-2"></i>
                                    Generate Reports
                                </button>
                            </div>
                        </div>

                        <!-- Attendance Overview -->
                        <div class="bg-gradient-to-br from-white to-blue-50 rounded-xl shadow p-6 border border-gray-200 animate-fade-in animate-delay-300 mt-8">
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
                        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 animate-fade-in animate-delay-400 mt-8">
                            <!-- Employee Directory Table -->
                            <div class="lg:col-span-2 bg-gradient-to-br from-white to-blue-50 rounded-xl shadow p-6 border border-gray-200">
                                <div class="section-header-gradient p-4 rounded-t-xl mb-4">
                                    <h2 class="text-xl font-semibold text-white">Employee Directory</h2>
                                </div>
                                <div class="overflow-x-auto">
                                    <table class="w-full border-collapse text-left">
                                        <thead class="bg-gray-100">
                                            <tr>
                                                <th class="p-3">Name</th>
                                                <th class="p-3">Designation</th>
                                                <th class="p-3">Department</th>
                                                <th class="p-3">Contact</th>
                                                <th class="p-3">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="border-t hover:bg-gray-50 transition-colors duration-150">
                                                <td class="p-3">Jane Doe</td>
                                                <td class="p-3">Software Engineer</td>
                                                <td class="p-3">Engineering</td>
                                                <td class="p-3">jane.doe@example.com</td>
                                                <td class="p-3 flex items-center gap-2">
                                                    <button class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600 transition-colors duration-200 text-sm shadow-sm">View</button>
                                                    <button class="bg-gray-500 text-white px-3 py-1 rounded hover:bg-gray-600 transition-colors duration-200 text-sm shadow-sm">Edit</button>
                                                </td>
                                            </tr>
                                            <tr class="border-t hover:bg-gray-50 transition-colors duration-150">
                                                <td class="p-3">John Smith</td>
                                                <td class="p-3">HR Manager</td>
                                                <td class="p-3">Human Resources</td>
                                                <td class="p-3">john.smith@example.com</td>
                                                <td class="p-3 flex items-center gap-2">
                                                    <button class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600 transition-colors duration-200 text-sm shadow-sm">View</button>
                                                    <button class="bg-gray-500 text-white px-3 py-1 rounded hover:bg-gray-600 transition-colors duration-200 text-sm shadow-sm">Edit</button>
                                                </td>
                                            </tr>
                                            <tr class="border-t hover:bg-gray-50 transition-colors duration-150">
                                                <td class="p-3">Emily White</td>
                                                <td class="p-3">Marketing Specialist</td>
                                                <td class="p-3">Marketing</td>
                                                <td class="p-3">emily.white@example.com</td>
                                                <td class="p-3 flex items-center gap-2">
                                                    <button class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600 transition-colors duration-200 text-sm shadow-sm">View</button>
                                                    <button class="bg-gray-500 text-white px-3 py-1 rounded hover:bg-gray-600 transition-colors duration-200 text-sm shadow-sm">Edit</button>
                                                </td>
                                            </tr>
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
                        <div class="bg-gradient-to-br from-white to-blue-50 rounded-xl shadow p-6 border border-gray-200 animate-fade-in animate-delay-500 mt-8">
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
                                        <th class="p-3">Employee Name</th>
                                        <th class="p-3">Leave Type</th>
                                        <th class="p-3">From Date</th>
                                        <th class="p-3">To Date</th>
                                        <th class="p-3">Status</th>
                                        <th class="p-3">Action Buttons</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="border-t hover:bg-gray-50 transition-colors duration-150">
                                        <td class="p-3">John Doe</td>
                                        <td class="p-3">Sick Leave</td>
                                        <td class="p-3">20 Jul</td>
                                        <td class="p-3">22 Jul</td>
                                        <td class="p-3"><span class="px-2 py-1 text-xs font-semibold text-yellow-800 bg-yellow-200 rounded-full">Pending</span></td>
                                        <td class="p-3">
                                            <button class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600 transition-colors duration-200">Approve</button>
                                            <button class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 ml-2 transition-colors duration-200">Reject</button>
                                        </td>
                                    </tr>
                                    <tr class="border-t hover:bg-gray-50 transition-colors duration-150">
                                        <td class="p-3">Alice Smith</td>
                                        <td class="p-3">Casual Leave</td>
                                        <td class="p-3">23 Jul</td>
                                        <td class="p-3">24 Jul</td>
                                        <td class="p-3"><span class="px-2 py-1 text-xs font-semibold text-green-800 bg-green-200 rounded-full">Approved</span></td>
                                        <td class="p-3">
                                            <button class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600 transition-colors duration-200">Approve</button>
                                            <button class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 ml-2 transition-colors duration-200">Reject</button>
                                        </td>
                                    </tr>
                                    <tr class="border-t hover:bg-gray-50 transition-colors duration-150">
                                        <td class="p-3">Bob Johnson</td>
                                        <td class="p-3">Annual Leave</td>
                                        <td class="p-3">15 Aug</td>
                                        <td class="p-3">20 Aug</td>
                                        <td class="p-3"><span class="px-2 py-1 text-xs font-semibold text-yellow-800 bg-yellow-200 rounded-full">Pending</span></td>
                                        <td class="p-3">
                                            <button class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600 transition-colors duration-200">Approve</button>
                                            <button class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 ml-2 transition-colors duration-200">Reject</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <!-- Team Performance Table -->
                        <div class="bg-gradient-to-br from-white to-blue-50 rounded-xl shadow p-6 border border-gray-200 animate-fade-in animate-delay-600 mt-8">
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
                                        <th class="p-3">Employee Name</th>
                                        <th class="p-3">Current Task</th>
                                        <th class="p-3">Progress</th>
                                        <th class="p-3">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="border-t hover:bg-gray-50 transition-colors duration-150">
                                        <td class="p-3">Alice Johnson</td>
                                        <td class="p-3">Develop new API endpoint</td>
                                        <td class="p-3">
                                            <div class="w-full bg-gray-200 rounded-full h-2.5">
                                                <div class="bg-blue-600 h-2.5 rounded-full transition-all duration-500 ease-out" style="width: 80%;"></div>
                                            </div>
                                        </td>
                                        <td class="p-3"><span class="px-2 py-1 text-xs font-semibold text-blue-800 bg-blue-200 rounded-full">In Progress</span></td>
                                    </tr>
                                    <tr class="border-t hover:bg-gray-50 transition-colors duration-150">
                                        <td class="p-3">Bob Williams</td>
                                        <td class="p-3">Design UI for dashboard</td>
                                        <td class="p-3">
                                            <div class="w-full bg-gray-200 rounded-full h-2.5">
                                                <div class="bg-green-600 h-2.5 rounded-full transition-all duration-500 ease-out" style="width: 100%;"></div>
                                            </div>
                                        </td>
                                        <td class="p-3"><span class="px-2 py-1 text-xs font-semibold text-green-800 bg-green-200 rounded-full">Completed</span></td>
                                    </tr>
                                    <tr class="border-t hover:bg-gray-50 transition-colors duration-150">
                                        <td class="p-3">Charlie Brown</td>
                                        <td class="p-3">Review code for module X</td>
                                        <td class="p-3">
                                            <div class="w-full bg-gray-200 rounded-full h-2.5">
                                                <div class="bg-yellow-500 h-2.5 rounded-full transition-all duration-500 ease-out" style="width: 50%;"></div>
                                            </div>
                                        </td>
                                        <td class="p-3"><span class="px-2 py-1 text-xs font-semibold text-yellow-800 bg-yellow-200 rounded-full">Pending</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <!-- Top Performer of the Month Box -->
                        <div class="bg-gradient-to-br from-white to-blue-50 rounded-xl shadow p-6 border border-gray-200 animate-fade-in animate-delay-700 mt-8 text-center">
                            <h2 class="text-xl font-semibold text-gray-800 mb-4">Top Performer of the Month</h2>
                            <div class="flex flex-col items-center justify-center gap-3">
                                <img src="/placeholder.svg?height=80&width=80" alt="Top Performer" class="w-20 h-20 rounded-full object-cover border-4 border-green-400 shadow-md">
                                <p class="text-2xl font-bold text-green-600">Deepan Gain</p>
                                <p class="text-lg text-gray-700">Productivity Score: <span class="font-bold">92%</span></p>
                            </div>
                        </div>

                        <!-- Upcoming Deadlines Section -->
                        <div class="bg-gradient-to-br from-white to-blue-50 rounded-xl shadow p-6 border border-gray-200 animate-fade-in animate-delay-800 mt-8">
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

                        <!-- Recent Activity Feed -->
                        <div class="bg-gradient-to-br from-white to-blue-50 rounded-xl shadow p-6 border border-gray-200 animate-fade-in animate-delay-900 mt-8">
                            <div class="section-header-gradient p-4 rounded-t-xl mb-4">
                                <h2 class="text-xl font-semibold text-white">Recent Activity</h2>
                            </div>
                            <div class="max-h-60 overflow-y-auto space-y-3 pr-2">
                                <div class="flex items-start gap-3 p-3 bg-gray-50 rounded-lg border border-gray-100 hover:shadow-md transition-all duration-200 hover:scale-[1.01]">
                                    <i class="bi bi-check-circle-fill text-green-500 text-xl flex-shrink-0 mt-1"></i>
                                    <div>
                                        <p class="font-semibold text-gray-800">Approved leave request for John Doe.</p>
                                        <p class="text-xs text-gray-500 mt-1">2 minutes ago</p>
                                    </div>
                                </div>
                                <div class="flex items-start gap-3 p-3 bg-gray-50 rounded-lg border border-gray-100 hover:shadow-md transition-all duration-200 hover:scale-[1.01]">
                                    <i class="bi bi-person-plus-fill text-blue-500 text-xl flex-shrink-0 mt-1"></i>
                                    <div>
                                        <p class="font-semibold text-gray-800">Assigned "Project X" to Alice Johnson.</p>
                                        <p class="text-xs text-gray-500 mt-1">1 hour ago</p>
                                    </div>
                                </div>
                                <div class="flex items-start gap-3 p-3 bg-gray-50 rounded-lg border border-gray-100 hover:shadow-md transition-all duration-200 hover:scale-[1.01]">
                                    <i class="bi bi-x-circle-fill text-red-500 text-xl flex-shrink-0 mt-1"></i>
                                    <div>
                                        <p class="font-semibold text-gray-800">Rejected leave request for Bob Williams.</p>
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

                        <!-- Upcoming Birthdays & Anniversaries Section -->
                        <div class="bg-gradient-to-br from-white to-blue-50 rounded-xl shadow p-6 border border-gray-200 animate-fade-in animate-delay-1000 mt-8">
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
                        <div class="bg-gradient-to-br from-white to-blue-50 rounded-xl shadow p-6 border border-gray-200 animate-fade-in animate-delay-1200 mt-8">
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
                                <div class="p-3 bg-gray-50 rounded-lg border border-gray-100 hover:shadow-md transition-all duration-200 hover:scale-[1.01]">
                                    <h3 class="font-semibold text-gray-800">Employee Wellness Program Launch</h3>
                                    <p class="text-sm text-gray-600 mt-1">Join our new employee wellness program starting August 1st! Details on activities and benefits will be shared soon.</p>
                                    <p class="text-xs text-gray-500 mt-2">Posted: June 20, 2025</p>
                                </div>
                            </div>
                        </div>

                        <!-- HR Policies Section -->
                        <div class="bg-gradient-to-br from-white to-blue-50 rounded-xl shadow p-6 border border-gray-200 animate-fade-in animate-delay-1300 mt-8">
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
                        <div class="bg-gradient-to-br from-white to-blue-50 rounded-xl shadow p-6 border border-gray-200 animate-fade-in animate-delay-1400 mt-8 hover:shadow-xl transition-all duration-200 hover:scale-[1.01]">
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

                    updateClock();
                </script>

            </div>
        </div>
    </div>
</div>
</x-app-layout>
