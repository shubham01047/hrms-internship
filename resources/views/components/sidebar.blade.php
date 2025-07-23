<aside
    class="fixed top-0 left-0 w-64 h-screen overflow-y-auto hide-scrollbar shadow-md z-30
           bg-gradient-to-br from-[#ff2626] to-[#ff6969] text-white {{-- Updated gradient background --}}
           transform -translate-x-full md:translate-x-0 transition-transform duration-300 ease-in-out"
    x-show="sidebarOpen" {{-- Alpine.js directive for showing/hiding on small screens --}}
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0 transform -translate-x-full"
    x-transition:enter-end="opacity-100 transform translate-x-0"
    x-transition:leave="transition ease-in duration-300"
    x-transition:leave-start="opacity-100 transform translate-x-0"
    x-transition:leave-end="opacity-0 transform -translate-x-full"
>
    {{-- Mobile Toggle Button --}}
    <button @click="sidebarOpen = !sidebarOpen" class="md:hidden px-4 py-2 focus:outline-none sticky top-0 z-40 text-white">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
    </button>

    <!-- Sidebar Header -->
    <div class="p-4 text-center font-bold text-2xl bg-[#ff2626]/50"> {{-- Adjusted header background to match new gradient --}}
        {{$company->system_title}}
    </div>

    <!-- Navigation Menu -->
    <nav class="p-4 space-y-2 text-sm text-white">

        <!-- Dashboard -->
        <div class="border-b border-[#ff6969] pb-2 mb-2"> {{-- Adjusted border color --}}
            {{-- Example of an active menu item --}}
            <a href="#" class="flex items-center gap-2 px-4 py-2 rounded
                                bg-[#ff6969] border-l-4 border-white {{-- Adjusted active background color --}}
                                hover:scale-105 hover:bg-[#ff2626] transition-all duration-300 ease-in-out"> {{-- Adjusted hover background color --}}
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
                <span>Dashboard</span>
            </a>
        </div>

        <!-- User Management -->
        <div class="border-b border-[#ff6969] pb-2 mb-2"> {{-- Adjusted border color --}}
            <div class="font-semibold uppercase tracking-wide text-xs mb-2 text-red-200">User Management</div> {{-- Adjusted text color --}}
            <a href="#" class="flex items-center gap-2 px-4 py-2 rounded hover:bg-[#ff2626] hover:scale-105 transition-all duration-300 ease-in-out"> {{-- Adjusted hover background color --}}
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                <span>Employee Profiles</span>
            </a>
            <a href="#" class="flex items-center gap-2 px-4 py-2 rounded hover:bg-[#ff2626] hover:scale-105 transition-all duration-300 ease-in-out"> {{-- Adjusted hover background color --}}
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="18" height="11" x="3" y="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                <span>Roles & Permissions</span>
            </a>
            <a href="#" class="flex items-center gap-2 px-4 py-2 rounded hover:bg-[#ff2626] hover:scale-105 transition-all duration-300 ease-in-out"> {{-- Adjusted hover background color --}}
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="20" height="14" x="2" y="6" rx="2"/><path d="M6 10h.01"/><path d="M10 10h.01"/><path d="M14 10h.01"/><path d="M18 10h.01"/></svg>
                <span>Departments & Designations</span>
            </a>
        </div>

        <!-- Attendance -->
        <div class="border-b border-[#ff6969] pb-2 mb-2"> {{-- Adjusted border color --}}
            <div class="font-semibold uppercase tracking-wide text-xs mb-2 text-red-200">Attendance</div> {{-- Adjusted text color --}}
            <a href="#" class="flex items-center gap-2 px-4 py-2 rounded hover:bg-[#ff2626] hover:scale-105 transition-all duration-300 ease-in-out"> {{-- Adjusted hover background color --}}
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="18" height="18" x="3" y="4" rx="2" ry="2"/><line x1="16" x2="16" y1="2" y2="6"/><line x1="8" x2="8" y1="2" y2="6"/><line x1="3" x2="21" y1="10" y2="10"/></svg>
                <span>Mark Attendance</span>
            </a>
            <a href="#" class="flex items-center gap-2 px-4 py-2 rounded hover:bg-[#ff2626] hover:scale-105 transition-all duration-300 ease-in-out"> {{-- Adjusted hover background color --}}
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 3v18h18"/><path d="M18.7 8.3L12 15l-3.4-3.4"/><path d="M14 14h6v6"/></svg>
                <span>Attendance Reports</span>
            </a>
        </div>

        <!-- Leave -->
        <div class="border-b border-[#ff6969] pb-2 mb-2"> {{-- Adjusted border color --}}
            <div class="font-semibold uppercase tracking-wide text-xs mb-2 text-red-200">Leave</div> {{-- Adjusted text color --}}
            <a href="#" class="flex items-center gap-2 px-4 py-2 rounded hover:bg-[#ff2626] hover:scale-105 transition-all duration-300 ease-in-out"> {{-- Adjusted hover background color --}}
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"/><polyline points="14 2 14 8 20 8"/><line x1="16" x2="8" y1="13" y2="13"/><line x1="16" x2="8" y1="17" y2="17"/><line x1="10" x2="8" y1="9" y2="9"/></svg>
                <span>Apply Leave</span>
            </a>
            <a href="#" class="flex items-center gap-2 px-4 py-2 rounded hover:bg-[#ff2626] hover:scale-105 transition-all duration-300 ease-in-out"> {{-- Adjusted hover background color --}}
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 11 12 14 22 4"/><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"/></svg>
                <span>Leave Status</span>
            </a>
        </div>

        <!-- Projects -->
        <div class="border-b border-[#ff6969] pb-2 mb-2"> {{-- Adjusted border color --}}
            <div class="font-semibold uppercase tracking-wide text-xs mb-2 text-red-200">Projects</div> {{-- Adjusted text color --}}
            <a href="#" class="flex items-center gap-2 px-4 py-2 rounded hover:bg-[#ff2626] hover:scale-105 transition-all duration-300 ease-in-out"> {{-- Adjusted hover background color --}}
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 20h16a2 2 0 0 0 2-2V8a2 2 0 0 0-2-2h-7.93a2 2 0 0 1-1.66-.9l-.82-1.2A2 2 0 0 0 4.32 2H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2z"/></svg>
                <span>View Projects</span>
            </a>
            <a href="#" class="flex items-center gap-2 px-4 py-2 rounded hover:bg-[#ff2626] hover:scale-105 transition-all duration-300 ease-in-out"> {{-- Adjusted hover background color --}}
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 17.5v-11M18 13.5v-7M6 21.5v-11"/></svg>
                <span>Tasks & Assignments</span>
            </a>
        </div>

        <!-- Timesheets -->
        <div class="border-b border-[#ff6969] pb-2 mb-2"> {{-- Adjusted border color --}}
            <div class="font-semibold uppercase tracking-wide text-xs mb-2 text-red-200">Timesheets</div> {{-- Adjusted text color --}}
            <a href="#" class="flex items-center gap-2 px-4 py-2 rounded hover:bg-[#ff2626] hover:scale-105 transition-all duration-300 ease-in-out"> {{-- Adjusted hover background color --}}
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                <span>Log Work</span>
            </a>
            <a href="#" class="flex items-center gap-2 px-4 py-2 rounded hover:bg-[#ff2626] hover:scale-105 transition-all duration-300 ease-in-out"> {{-- Adjusted hover background color --}}
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21.2 14.8A8 8 0 1 1 10.2 2.9M22 12v6h-6"/><path d="M22 22 16 16"/></svg>
                <span>Timesheet Reports</span>
            </a>
        </div>

        <!-- Payroll -->
        <div class="border-b border-[#ff6969] pb-2 mb-2"> {{-- Adjusted border color --}}
            <div class="font-semibold uppercase tracking-wide text-xs mb-2 text-red-200">Payroll</div> {{-- Adjusted text color --}}
            <a href="#" class="flex items-center gap-2 px-4 py-2 rounded hover:bg-[#ff2626] hover:scale-105 transition-all duration-300 ease-in-out"> {{-- Adjusted hover background color --}}
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" x2="12" y1="2" y2="22"/><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg>
                <span>Salary Slips</span>
            </a>
            <a href="#" class="flex items-center gap-2 px-4 py-2 rounded hover:bg-[#ff2626] hover:scale-105 transition-all duration-300 ease-in-out"> {{-- Adjusted hover background color --}}
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 20V10"/><path d="M18 20V4"/><path d="M6 20v-4"/></svg>
                <span>Process Payroll</span>
            </a>
        </div>

        <!-- Notifications -->
        <div class="border-b border-[#ff6969] pb-2 mb-2"> {{-- Adjusted border color --}}
            <div class="font-semibold uppercase tracking-wide text-xs mb-2 text-red-200">Notifications</div> {{-- Adjusted text color --}}
            <a href="#" class="flex items-center gap-2 px-4 py-2 rounded hover:bg-[#ff2626] hover:scale-105 transition-all duration-300 ease-in-out"> {{-- Adjusted hover background color --}}
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M6 8a6 6 0 0 1 12 0c0 7 3 9 3 9H3s3-2 3-9"/><path d="M10.36 14H13.64a2 2 0 0 1-.97 3.5c-.93.47-2.09.47-3.02 0a2 2 0 0 1-.97-3.5Z"/></svg>
                <span>Alerts</span>
            </a>
        </div>

        <!-- Reports -->
        <div>
            <div class="font-semibold uppercase tracking-wide text-xs mb-2 text-red-200">Reports</div> {{-- Adjusted text color --}}
            <a href="#" class="flex items-center gap-2 px-4 py-2 rounded hover:bg-[#ff2626] hover:scale-105 transition-all duration-300 ease-in-out"> {{-- Adjusted hover background color --}}
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"/><polyline points="14 2 14 8 20 8"/><line x1="16" x2="8" y1="13" y2="13"/><line x1="16" x2="8" y1="17" y2="17"/><line x1="10" x2="8" y1="9" y2="9"/></svg>
                <span>Summary Reports</span>
            </a>
        </div>

    </nav>
</aside>
