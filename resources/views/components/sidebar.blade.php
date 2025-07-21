<aside class="fixed top-0 left-0 w-64 h-screen overflow-y-auto hide-scrollbar bg-white border-r border-red-200 shadow-md z-30">
<button @click="sidebarOpen = !sidebarOpen" class="md:hidden px-4 py-2 focus:outline-none sticky top-0 ">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white-600" fill="none" viewBox="0 0 24 24"
        stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M4 6h16M4 12h16M4 18h16" />
    </svg>
</button>
    <!-- Sidebar Header -->
    <div class="p-4 text-center font-bold text-2xl text-white bg-red-600">
        

        {{$company->system_title}}
        
    </div>

    <!-- Navigation Menu -->
    <nav class="p-4 space-y-2 text-sm text-gray-800">

        <!-- Dashboard -->
        <div class="border-b border-red-100 pb-2 mb-2">
            <div class="px-4 py-2 rounded hover:bg-red-100 cursor-pointer text-red-700 font-medium">
                🏠 Dashboard
            </div>
        </div>

        <!-- User Management -->
        <div class="border-b border-red-100 pb-2 mb-2">
            <div class="font-semibold text-red-600 uppercase tracking-wide text-xs mb-2">User Management</div>
            <div class="px-4 py-2 rounded hover:bg-red-100 cursor-pointer">👥 Employee Profiles</div>
            <div class="px-4 py-2 rounded hover:bg-red-100 cursor-pointer">🔐 Roles & Permissions</div>
            <div class="px-4 py-2 rounded hover:bg-red-100 cursor-pointer">🏢 Departments & Designations</div>
        </div>

        <!-- Attendance -->
        <div class="border-b border-red-100 pb-2 mb-2">
            <div class="font-semibold text-red-600 uppercase tracking-wide text-xs mb-2">Attendance</div>
            <div class="px-4 py-2 rounded hover:bg-red-100 cursor-pointer">📅 Mark Attendance</div>
            <div class="px-4 py-2 rounded hover:bg-red-100 cursor-pointer">📊 Attendance Reports</div>
        </div>

        <!-- Leave -->
        <div class="border-b border-red-100 pb-2 mb-2">
            <div class="font-semibold text-red-600 uppercase tracking-wide text-xs mb-2">Leave</div>
            <div class="px-4 py-2 rounded hover:bg-red-100 cursor-pointer">📝 Apply Leave</div>
            <div class="px-4 py-2 rounded hover:bg-red-100 cursor-pointer">✅ Leave Status</div>
        </div>

        <!-- Projects -->
        <div class="border-b border-red-100 pb-2 mb-2">
            <div class="font-semibold text-red-600 uppercase tracking-wide text-xs mb-2">Projects</div>
            <div class="px-4 py-2 rounded hover:bg-red-100 cursor-pointer">📁 View Projects</div>
            <div class="px-4 py-2 rounded hover:bg-red-100 cursor-pointer">🧩 Tasks & Assignments</div>
        </div>

        <!-- Timesheets -->
        <div class="border-b border-red-100 pb-2 mb-2">
            <div class="font-semibold text-red-600 uppercase tracking-wide text-xs mb-2">Timesheets</div>
            <div class="px-4 py-2 rounded hover:bg-red-100 cursor-pointer">🕒 Log Work</div>
            <div class="px-4 py-2 rounded hover:bg-red-100 cursor-pointer">📈 Timesheet Reports</div>
        </div>

        <!-- Payroll -->
        <div class="border-b border-red-100 pb-2 mb-2">
            <div class="font-semibold text-red-600 uppercase tracking-wide text-xs mb-2">Payroll</div>
            <div class="px-4 py-2 rounded hover:bg-red-100 cursor-pointer">💸 Salary Slips</div>
            <div class="px-4 py-2 rounded hover:bg-red-100 cursor-pointer">⚙️ Process Payroll</div>
        </div>

        <!-- Notifications -->
        <div class="border-b border-red-100 pb-2 mb-2">
            <div class="font-semibold text-red-600 uppercase tracking-wide text-xs mb-2">Notifications</div>
            <div class="px-4 py-2 rounded hover:bg-red-100 cursor-pointer">🔔 Alerts</div>
        </div>

        <!-- Reports -->
        <div>
            <div class="font-semibold text-red-600 uppercase tracking-wide text-xs mb-2">Reports</div>
            <div class="px-4 py-2 rounded hover:bg-red-100 cursor-pointer">📋 Summary Reports</div>
        </div>

    </nav>
</aside>