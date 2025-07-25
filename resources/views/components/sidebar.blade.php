<!-- Gradient Sidebar with Laravel Dynamic Leave Logic -->
@php
    $isActive = fn($route) => request()->routeIs($route)
        ? 'flex items-center gap-2 px-4 py-2 rounded bg-[#ff7d7d] border-l-4 border-white hover:scale-105 hover:bg-[#ff2626] transition-all duration-300 ease-in-out'
        : 'flex items-center gap-2 px-4 py-2 rounded bg-[#ff696900]  hover:scale-105 hover:bg-[#ff2626] transition-all duration-300 ease-in-out';

    $role = Auth::user()->roles->pluck('name')->first();
    $routeName = $role === 'Human Resource' ? 'hr.dashboard' : strtolower($role) . '.dashboard';
@endphp

<aside
    class="fixed top-0 left-0 w-64 h-screen overflow-y-auto hide-scrollbar shadow-md z-30
           bg-gradient-to-br from-[#ff2626] to-[#ff6969] text-white
           transition-transform duration-300 ease-in-out
           md:translate-x-0 transform"
    :class="{ '-translate-x-full': !sidebarOpen }" x-show="sidebarOpen"
    x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform -translate-x-full"
    x-transition:enter-end="opacity-100 transform translate-x-0" x-transition:leave="transition ease-in duration-300"
    x-transition:leave-start="opacity-100 transform translate-x-0"
    x-transition:leave-end="opacity-0 transform -translate-x-full">
    <!-- Mobile Toggle Button -->
    <button @click="sidebarOpen = !sidebarOpen"
        class="md:hidden px-4 py-2 focus:outline-none sticky top-0 z-40 text-white">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
    </button>

    <!-- Sidebar Header -->
    <div class="p-4 text-center font-bold text-2xl bg-[#ff2626]/50">
        {{ $company->system_title }}
    </div>

    <!-- Navigation Menu -->
    <nav class="p-4 space-y-2 text-sm text-white">

        <!-- Dashboard -->
        <div class="border-b border-[#ff6969] pb-2 mb-2">
            <a href="{{ route($routeName) }}" class="sidebar-link {{ $isActive('*.dashboard') }}">
                🏠 Dashboard
            </a>
        </div>

        <!-- User Management -->
        <div class="border-b border-[#ff6969] pb-2 mb-2">
            <div class="font-semibold uppercase tracking-wide text-xs mb-2 text-red-200">User Management</div>
            <a href="{{route('profile.edit')}}"
                class="flex items-center gap-2 px-4 py-2 rounded hover:bg-[#ff2626] hover:scale-105 transition-all duration-300">👥
                 Profiles</a>

                 @can('create roles')
                        <a href="{{route('roles.index')}}"
                class="flex items-center gap-2 px-4 py-2 rounded hover:bg-[#ff2626] hover:scale-105 transition-all duration-300 {{ $isActive('roles.index') }}">🔐
                Roles</a>
                 @endcan

                  @can('create permissions')
                        <a href="{{route('permissions.index')}}"
                class="flex items-center gap-2 px-4 py-2 rounded hover:bg-[#ff2626] hover:scale-105 transition-all duration-300 {{ $isActive('permissions.index') }}">🔐
                 Permission</a>
                 @endcan

            
            <a href="#"
                class="flex items-center gap-2 px-4 py-2 rounded hover:bg-[#ff2626] hover:scale-105 transition-all duration-300">🏢
                Departments & Designations</a>
        </div>

        <!-- Attendance -->
        <div class="border-b border-[#ff6969] pb-2 mb-2">
            <div class="font-semibold uppercase tracking-wide text-xs mb-2 text-red-200">Attendance</div>
            <a href="#"
                class="flex items-center gap-2 px-4 py-2 rounded hover:bg-[#ff2626] hover:scale-105 transition-all duration-300">📅
                Mark Attendance</a>
            <a href="#"
                class="flex items-center gap-2 px-4 py-2 rounded hover:bg-[#ff2626] hover:scale-105 transition-all duration-300">📊
                Attendance Reports</a>
        </div>

        <!-- ✅ Leave (Dynamic with Blade Directives) -->
        <div class="border-b border-[#ff6969] pb-2 mb-2 ">
            
            @can('apply leave')
                <div class="font-semibold uppercase tracking-wide text-xs mb-2 text-red-200">Leave</div>
                <a href="{{ route('leaves.create') }}" class="{{ $isActive('leaves.create') }}">
                    📝 Apply for Leave
                </a>
            @endcan

            @can('view all leaves')
                <a href="{{ route('leaves.index') }}" class="{{ $isActive('leaves.index') }}">
                    ✅ Leave Status
                </a>
            @endcan

            @can('approve leave')
                <a href="{{ route('leaves.manage') }}" class="{{ $isActive('leaves.manage') }}">
                    📊 Manage Leave
                </a>
            @endcan
        </div>

        <!-- Projects -->
        <div class="border-b border-[#ff6969] pb-2 mb-2">
            <div class="font-semibold uppercase tracking-wide text-xs mb-2 text-red-200">Projects</div>
            <a href="#"
                class="flex items-center gap-2 px-4 py-2 rounded hover:bg-[#ff2626] hover:scale-105 transition-all duration-300">📁
                View Projects</a>
            <a href="#"
                class="flex items-center gap-2 px-4 py-2 rounded hover:bg-[#ff2626] hover:scale-105 transition-all duration-300">🧩
                Tasks & Assignments</a>
        </div>

        <!-- Timesheets -->
        <div class="border-b border-[#ff6969] pb-2 mb-2">
            <div class="font-semibold uppercase tracking-wide text-xs mb-2 text-red-200">Timesheets</div>
            <a href="#"
                class="flex items-center gap-2 px-4 py-2 rounded hover:bg-[#ff2626] hover:scale-105 transition-all duration-300">🕒
                Log Work</a>
            <a href="#"
                class="flex items-center gap-2 px-4 py-2 rounded hover:bg-[#ff2626] hover:scale-105 transition-all duration-300">📈
                Timesheet Reports</a>
        </div>

        <!-- Payroll -->
        <div class="border-b border-[#ff6969] pb-2 mb-2">
            <div class="font-semibold uppercase tracking-wide text-xs mb-2 text-red-200">Payroll</div>
            <a href="#"
                class="flex items-center gap-2 px-4 py-2 rounded hover:bg-[#ff2626] hover:scale-105 transition-all duration-300">💸
                Salary Slips</a>
            <a href="#"
                class="flex items-center gap-2 px-4 py-2 rounded hover:bg-[#ff2626] hover:scale-105 transition-all duration-300">⚙️
                Process Payroll</a>
        </div>

        <!-- Notifications -->
        <div class="border-b border-[#ff6969] pb-2 mb-2">
            <div class="font-semibold uppercase tracking-wide text-xs mb-2 text-red-200">Notifications</div>
            <a href="#"
                class="flex items-center gap-2 px-4 py-2 rounded hover:bg-[#ff2626] hover:scale-105 transition-all duration-300">🔔
                Alerts</a>
        </div>

        <!-- Reports -->
        <div>
            <div class="font-semibold uppercase tracking-wide text-xs mb-2 text-red-200">Reports</div>
            <a href="#"
                class="flex items-center gap-2 px-4 py-2 rounded hover:bg-[#ff2626] hover:scale-105 transition-all duration-300">📋
                Summary Reports</a>
        </div>

    </nav>
</aside>