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
    .animate-delay-900 { animation-delay: 0.9s; }
    .animate-delay-1000 { animation-delay: 1.0s; } /* Delay for the new combined section */
    .animate-delay-1100 { animation-delay: 1.1s; } /* New delay for recent activity log */


    .section-header-gradient {
        background: linear-gradient(135deg, #ff2626, #ff6969); /* Updated red gradient for sections */
    }
</style>

<div class="py-12 bg-gray-100 min-h-screen"> {{-- Set overall background to gray-100 and ensure min-height --}}
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-10"> {{-- Consistent vertical spacing between sections --}}

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

                <!-- Add the Notifications Bell icon and dropdown -->
                <div x-data="{ notificationsOpen: false }" class="relative">
                    <button @click="notificationsOpen = !notificationsOpen" class="p-2 rounded-full hover:bg-white hover:bg-opacity-30 transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-white focus:ring-opacity-50">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M6 8a6 6 0 0 1 12 0c0 7 3 9 3 9H3s3-2 3-9"/><path d="M10.36 14H13.64a2 2 0 0 1-.97 3.5c-.93.47-2.09.47-3.02 0a2 2 0 0 1-.97-3.5Z"/></svg>
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
                                <span class="font-semibold">2 Pending Leave Requests</span>
                                <p class="text-xs text-gray-500">Review required</p>
                            </a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition-colors duration-150">
                                <span class="font-semibold">New Policy Update</span>
                                <p class="text-xs text-gray-500">Mandatory reading</p>
                            </a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition-colors duration-150">
                                <span class="font-semibold">System Maintenance Tonight</span>
                                <p class="text-xs text-gray-500">Expected downtime 1-3 AM</p>
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
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5 gap-6 animate-fade-in animate-delay-100"> {{-- Adjusted grid for 5 cards, reduced gap --}}
            <div class="bg-gradient-to-br from-white to-blue-50 p-4 rounded-xl shadow text-center hover:shadow-xl transition-all duration-200 hover:scale-[1.01] border border-gray-200"> {{-- Reduced padding --}}
                <h3 class="text-gray-500 text-xs">Total Employees</h3> {{-- Reduced font size --}}
                <p class="text-2xl font-bold text-blue-600">120</p> {{-- Reduced font size --}}
            </div>
            <div class="bg-gradient-to-br from-white to-blue-50 p-4 rounded-xl shadow text-center hover:shadow-xl transition-all duration-200 hover:scale-[1.01] border border-gray-200"> {{-- Reduced padding --}}
                <h3 class="text-gray-500 text-xs">New Joinees This Month</h3> {{-- Reduced font size --}}
                <p class="text-2xl font-bold text-green-600">5</p> {{-- Reduced font size --}}
            </div>
            <div class="bg-gradient-to-br from-white to-blue-50 p-4 rounded-xl shadow text-center hover:shadow-xl transition-all duration-200 hover:scale-[1.01] border border-gray-200"> {{-- Reduced padding --}}
                <h3 class="text-gray-500 text-xs">Employees on Leave Today</h3> {{-- Reduced font size --}}
                <p class="text-2xl font-bold text-yellow-500">8</p> {{-- Reduced font size --}}
            </div>
            <div class="bg-gradient-to-br from-white to-blue-50 p-4 rounded-xl shadow text-center hover:shadow-xl transition-all duration-200 hover:scale-[1.01] border border-gray-200"> {{-- Reduced padding --}}
                <h3 class="text-gray-500 text-xs">Pending Leave Requests</h3> {{-- Reduced font size --}}
                <p class="text-2xl font-bold text-red-500">4</p> {{-- Reduced font size --}}
            </div>
            <!-- New Payroll Summary Card -->
            <div class="bg-gradient-to-br from-white to-blue-50 p-4 rounded-xl shadow text-center hover:shadow-xl transition-all duration-200 hover:scale-[1.01] border border-gray-200"> {{-- Reduced padding --}}
                <h3 class="text-gray-500 text-xs">Payroll Summary</h3> {{-- Reduced font size --}}
                <div class="mt-2 space-y-1">
                    <p class="text-sm font-semibold text-gray-700">Total Salary Expense: <span class="text-blue-600 font-bold">$150,000</span></p> {{-- Reduced font size --}}
                    <p class="text-sm font-semibold text-gray-700">Pending Payroll: <span class="text-yellow-600 font-bold">5</span></p> {{-- Reduced font size --}}
                    <p class="text-sm font-semibold text-gray-700">Next Pay Date: <span class="text-green-600 font-bold">Aug 1, 2025</span></p> {{-- Reduced font size --}}
                </div>
            </div>
        </div>

        <!-- Employee Directory Table and Recruitment Status Panel Wrapper -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 animate-fade-in animate-delay-1000">
            <!-- Employee Directory Table -->
            <div class="lg:col-span-2 bg-gradient-to-br from-white to-blue-50 rounded-xl shadow p-6 border border-gray-200">
                <div class="flex flex-col sm:flex-row justify-between items-center mb-4 gap-4">
                    <h2 class="text-xl font-semibold text-gray-800">Employee Directory</h2>
                    <div class="relative w-full sm:w-auto">
                        <input type="text" placeholder="Search employees in directory..." class="w-full pl-10 pr-4 py-2 rounded-full bg-gray-100 text-gray-700 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-300">
                        <svg class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-500 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </div>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead class="bg-gray-100 rounded-lg">
                            <tr>
                                <th class="p-3 text-sm font-semibold text-gray-700 uppercase tracking-wider rounded-tl-lg">Name</th>
                                <th class="p-3 text-sm font-semibold text-gray-700 uppercase tracking-wider">Designation</th>
                                <th class="p-3 text-sm font-semibold text-gray-700 uppercase tracking-wider">Department</th>
                                <th class="p-3 text-sm font-semibold text-gray-700 uppercase tracking-wider">Contact</th>
                                <th class="p-3 text-sm font-semibold text-gray-700 uppercase tracking-wider rounded-tr-lg">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="border-t border-gray-200 hover:bg-gray-50 transition-colors duration-200">
                                <td class="p-3 text-gray-800">Jane Doe</td>
                                <td class="p-3 text-gray-600">HR Manager</td>
                                <td class="p-3 text-gray-600">Human Resources</td>
                                <td class="p-3 text-gray-600">jane.doe@example.com</td>
                                <td class="p-3 flex items-center gap-2">
                                    <button class="bg-gradient-to-r from-[#ff2626] to-[#ff6969] text-white px-3 py-1 rounded-md hover:from-[#ff6969] hover:to-[#ff2626] transition-all duration-200 text-sm shadow-sm">View</button>
                                    <button class="bg-gray-600 text-white px-3 py-1 rounded-md hover:bg-gray-700 transition-colors duration-200 text-sm shadow-sm">Edit</button>
                                </td>
                            </tr>
                            <tr class="border-t border-gray-200 hover:bg-gray-50 transition-colors duration-200">
                                <td class="p-3 text-gray-800">John Smith</td>
                                <td class="p-3 text-gray-600">Software Engineer</td>
                                <td class="p-3 text-gray-600">Engineering</td>
                                <td class="p-3 text-gray-600">john.smith@example.com</td>
                                <td class="p-3 flex items-center gap-2">
                                    <button class="bg-gradient-to-r from-[#ff2626] to-[#ff6969] text-white px-3 py-1 rounded-md hover:from-[#ff6969] hover:to-[#ff2626] transition-all duration-200 text-sm shadow-sm">View</button>
                                    <button class="bg-gray-600 text-white px-3 py-1 rounded-md hover:bg-gray-700 transition-colors duration-200 text-sm shadow-sm">Edit</button>
                                </td>
                            </tr>
                            <tr class="border-t border-gray-200 hover:bg-gray-50 transition-colors duration-200">
                                <td class="p-3 text-gray-800">Emily White</td>
                                <td class="p-3 text-gray-600">Marketing Specialist</td>
                                <td class="p-3 text-gray-600">Marketing</td>
                                <td class="p-3 text-gray-600">emily.white@example.com</td>
                                <td class="p-3 flex items-center gap-2">
                                    <button class="bg-gradient-to-r from-[#ff2626] to-[#ff6969] text-white px-3 py-1 rounded-md hover:from-[#ff6969] hover:to-[#ff2626] transition-all duration-200 text-sm shadow-sm">View</button>
                                    <button class="bg-gray-600 text-white px-3 py-1 rounded-md hover:bg-gray-700 transition-colors duration-200 text-sm shadow-sm">Edit</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Recruitment Status Panel -->
            <div class="bg-gradient-to-br from-white to-blue-50 rounded-xl shadow p-6 border border-gray-200">
                <h2 class="text-xl font-semibold mb-4 text-gray-800">Recruitment Status</h2>
                <div class="space-y-4">
                    <div class="p-4 bg-blue-100 rounded-lg text-center flex flex-col items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-blue-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                        <h3 class="text-gray-700 text-lg font-semibold">Open Positions</h3>
                        <p class="text-4xl font-extrabold text-blue-600">15</p>
                    </div>
                    <div class="p-4 bg-green-100 rounded-lg text-center flex flex-col items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-green-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><path d="m9 12 2 2 4-4"/></svg>
                        <h3 class="text-gray-700 text-lg font-semibold">Candidates in Interview</h3>
                        <p class="text-4xl font-extrabold text-green-600">25</p>
                    </div>
                    <div class="p-4 bg-purple-100 rounded-lg text-center flex flex-col items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-purple-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"/><polyline points="14 2 14 8 20 8"/><line x1="16" x2="8" y1="13" y2="13"/><line x1="16" x2="8" y1="17" y2="17"/><line x1="10" x2="8" y1="9" y2="9"/></svg>
                        <h3 class="text-gray-700 text-lg font-semibold">Offers Released</h3>
                        <p class="text-4xl font-extrabold text-purple-600">07</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Activity Log -->
        <div class="bg-gradient-to-br from-white to-blue-50 rounded-xl shadow p-6 border border-gray-200 animate-fade-in animate-delay-1100">
            <h2 class="text-xl font-semibold mb-4 text-gray-800">Recent Activity Log</h2>
            <div class="max-h-60 overflow-y-auto space-y-4 pr-2">
                <div class="flex items-start gap-3 p-3 bg-gray-50 rounded-lg border border-gray-100">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-500 mt-1 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                    <div>
                        <p class="text-gray-800 font-medium">New employee <span class="font-semibold">Sarah Johnson</span> added.</p>
                        <p class="text-xs text-gray-500 mt-1">July 22, 2025 at 10:30 AM</p>
                    </div>
                </div>
                <div class="flex items-start gap-3 p-3 bg-gray-50 rounded-lg border border-gray-100">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500 mt-1 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                    <div>
                        <p class="text-gray-800 font-medium">Leave request for <span class="font-semibold">Michael Brown</span> approved.</p>
                        <p class="text-xs text-gray-500 mt-1">July 21, 2025 at 03:15 PM</p>
                    </div>
                </div>
                <div class="flex items-start gap-3 p-3 bg-gray-50 rounded-lg border border-gray-100">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-500 mt-1 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"/><line x1="12" x2="12" y1="9" y2="13"/><line x1="12" x2="12.01" y1="17" y2="17"/></svg>
                    <div>
                        <p class="text-gray-800 font-medium">Reminder: <span class="font-semibold">Performance Review</span> for Q2 due soon.</p>
                        <p class="text-xs text-gray-500 mt-1">July 20, 2025 at 09:00 AM</p>
                    </div>
                </div>
                <div class="flex items-start gap-3 p-3 bg-gray-50 rounded-lg border border-gray-100">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-purple-500 mt-1 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 20h16a2 2 0 0 0 2-2V8a2 2 0 0 0-2-2h-7.93a2 2 0 0 1-1.66-.9l-.82-1.2A2 2 0 0 0 4.32 2H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2z"/><line x1="12" x2="12" y1="10" y2="16"/><line x1="9" x2="15" y1="13" y2="13"/></svg>
                    <div>
                        <p class="text-gray-800 font-medium">New project <span class="font-semibold">"Mobile App Redesign"</span> initiated.</p>
                        <p class="text-xs text-gray-500 mt-1">July 19, 2025 at 02:00 PM</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Actions Buttons -->
        <div class="bg-gradient-to-br from-white to-blue-50 rounded-xl shadow p-6 border border-gray-200 animate-fade-in animate-delay-200">
            <h2 class="text-xl font-semibold mb-4 text-gray-800">Quick Actions</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
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
                <!-- New Buttons -->
                <button class="flex items-center justify-center p-4 rounded-lg bg-gradient-to-r from-orange-500 to-orange-700 text-white font-semibold shadow-md hover:from-orange-600 hover:to-orange-800 transition-all duration-200 hover:scale-105">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"/><polyline points="14 2 14 8 20 8"/><line x1="16" x2="8" y1="13" y2="13"/><line x1="16" x2="8" y1="17" y2="17"/><line x1="10" x2="8" y1="9" y2="9"/></svg>
                    Export Employee Data
                </button>
                <button class="flex items-center justify-center p-4 rounded-lg bg-gradient-to-r from-teal-500 to-teal-700 text-white font-semibold shadow-md hover:from-teal-600 hover:to-teal-800 transition-all duration-200 hover:scale-105">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 6 2 18 2 18 9"/><path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"/><rect width="12" height="8" x="6" y="14" rx="2"/></svg>
                    Generate Reports (PDF)
                </button>
            </div>
        </div>

        <!-- Attendance Overview -->
        <div class="bg-gradient-to-br from-white to-blue-50 rounded-xl shadow p-6 border border-gray-200 animate-fade-in animate-delay-300">
            <h2 class="text-xl font-semibold mb-4 text-gray-800">Attendance Overview</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
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
                    <h3 class="text-700">Compliance</h3>
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
            <div class="max-h-60 overflow-y-auto space-y-5 pr-2">
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
