@php
    $isActive = fn($route) => request()->routeIs($route)
        ? 'flex items-center gap-2 px-4 py-2 rounded bg-primary border-l-4 border-white hover:scale-105 hover:bg-hover transition-all duration-300 ease-in-out'
        : 'flex items-center gap-2 px-4 py-2 rounded hover:scale-105 hover:bg-hover transition-all duration-300 ease-in-out';

    $role = Auth::user()->roles->pluck('name')->first();
    $routeName = $role === 'Human Resource' ? 'hr.dashboard' : strtolower($role) . '.dashboard';
@endphp

<!-- Font Awesome CDN -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<aside class="bg-secondary-gradient fixed top-0 left-0 w-64 h-screen overflow-y-auto hide-scrollbar shadow-md z-30
           bg-gradient-to-br from-[var(--primary-bg)] to-[var(--primary-bg-light)] text-primary
           transition-transform duration-300 ease-in-out
           md:translate-x-0 transform"
       :class="{ '-translate-x-full': !sidebarOpen }"
       x-show="sidebarOpen"
       x-transition:enter="transition ease-out duration-300"
       x-transition:enter-start="opacity-0 transform -translate-x-full"
       x-transition:enter-end="opacity-100 transform translate-x-0"
       x-transition:leave="transition ease-in duration-300"
       x-transition:leave-start="opacity-100 transform translate-x-0"
       x-transition:leave-end="opacity-0 transform -translate-x-full">

    <!-- Mobile Toggle -->
    <button @click="sidebarOpen = !sidebarOpen"
        class="md:hidden px-4 py-2 focus:outline-none sticky top-0 z-40 text-primary">
        <i class="fas fa-bars h-6 w-6"></i>
    </button>

    <!-- Sidebar Header -->
    <div class="p-4 text-center font-bold text-2xl bg-primary/50 text-primary">
        {{ $company->system_title }}
    </div>

    <!-- Navigation Menu -->
    <nav class="p-4 space-y-2 text-sm text-primary">

        <!-- Dashboard -->
        <div class="border-b border-primary pb-2 mb-2">
            <a href="{{ route($routeName) }}" class="{{ $isActive('*.dashboard') }}">
                <i class="fas fa-home"></i> Dashboard
            </a>
        </div>

        <!-- User Management -->
        <div class="border-b border-primary pb-2 mb-2">
            <div class="font-semibold uppercase tracking-wide text-xs mb-2 text-primary/70">
                <i class="fas fa-users"></i> User Management
            </div>
            <a href="{{ route('profile.edit') }}" class="{{ $isActive('profile.edit') }}">
                <i class="fas fa-user-circle"></i> Profiles
            </a>
            @can('create roles')
                <a href="{{ route('roles.index') }}" class="{{ $isActive('roles.index') }}">
                    <i class="fas fa-user-tag"></i> Roles
                </a>
            @endcan
            @can('create permissions')
                <a href="{{ route('permissions.index') }}" class="{{ $isActive('permissions.index') }}">
                    <i class="fas fa-key"></i> Permissions
                </a>
            @endcan
        </div>

        <!-- Attendance -->
        <div class="border-b border-primary pb-2 mb-2">
            <div class="font-semibold uppercase tracking-wide text-xs mb-2 text-primary/70">
                <i class="fas fa-clock"></i> Reports
            </div>
            
            @can('attendance report')
                <a href="{{ route('admin.attendance.report') }}" class="flex items-center gap-2 px-4 py-2 rounded hover:bg-hover hover:scale-105 transition-all duration-300">
                    <i class="fas fa-chart-bar"></i> Attendance Reports
                </a>
            @endcan

             <a href="{{ route('reports.report') }}" class="flex items-center gap-2 px-4 py-2 rounded hover:bg-hover hover:scale-105 transition-all duration-300">
                <i class="fas fa-clipboard-list"></i> Summary Reports
            </a>
            
        </div>

        <!-- Leave -->
        <div class="border-b border-primary pb-2 mb-2">
            <div class="font-semibold uppercase tracking-wide text-xs mb-2 text-primary/70">
                <i class="fas fa-calendar-alt"></i> Leave
            </div>
            @can('apply leave')
                <a href="{{ route('leaves.create') }}" class="{{ $isActive('leaves.create') }}">
                    <i class="fas fa-plus-circle"></i> Apply for Leave
                </a>
            @endcan
            @can('view all leaves')
                <a href="{{ route('leaves.index') }}" class="{{ $isActive('leaves.index') }}">
                    <i class="fas fa-list-alt"></i> Leave Status
                </a>
            @endcan
            @can('approve leave')
                <a href="{{ route('leaves.manage') }}" class="{{ $isActive('leaves.manage') }}">
                    <i class="fas fa-tasks"></i> Manage Leave
                </a>
            @endcan
        </div>

        <!-- Holidays -->
        <div class="border-b border-primary pb-2 mb-2">
            <div class="font-semibold uppercase tracking-wide text-xs mb-2 text-primary/70">
                <i class="fas fa-calendar-day"></i> Holidays
            </div>
            <a href="{{ route('holidays.index') }}" class="{{ $isActive('holidays.index')}}">
                <i class="fas fa-calendar"></i> View Holidays
            </a>
        </div>

        <!-- Projects -->
        @can('view project')
            <div class="border-b border-primary pb-2 mb-2">
                <div class="font-semibold uppercase tracking-wide text-xs mb-2 text-primary/70">
                    <i class="fas fa-project-diagram"></i> Projects
                </div>
                <a href="{{ route('projects.index') }}"
                    class="{{ $isActive('projects.index') }}">
                    <i class="fas fa-folder-open"></i> View Projects
                </a>
            </div>
        @endcan

     

        <!-- Payroll -->
        <div class="border-b border-primary pb-2 mb-2">
            <div class="font-semibold uppercase tracking-wide text-xs mb-2 text-primary/70">
                <i class="fas fa-money-bill-wave"></i> Payroll
            </div>
            <a href="#" class="flex items-center gap-2 px-4 py-2 rounded hover:bg-hover hover:scale-105 transition-all duration-300">
                <i class="fas fa-file-invoice-dollar"></i> Salary Slips
            </a>
            <a href="#" class="flex items-center gap-2 px-4 py-2 rounded hover:bg-hover hover:scale-105 transition-all duration-300">
                <i class="fas fa-cogs"></i> Process Payroll
            </a>
        </div>

        <!-- Notifications -->
        <div class="border-b border-primary pb-2 mb-2">
            <div class="font-semibold uppercase tracking-wide text-xs mb-2 text-primary/70">
                <i class="fas fa-bell"></i> Notifications
            </div>
            <a href="#" class="flex items-center gap-2 px-4 py-2 rounded hover:bg-hover hover:scale-105 transition-all duration-300">
                <i class="fas fa-bell"></i> Alerts
            </a>
        </div>
    </nav>
</aside>