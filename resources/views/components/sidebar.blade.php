@php
    $isActive = fn($route) => request()->routeIs($route)
        ? 'flex items-center gap-2 px-4 py-2 rounded bg-primary border-l-4 border-white hover:scale-105 hover:bg-hover transition-all duration-300 ease-in-out'
        : 'flex items-center gap-2 px-4 py-2 rounded hover:scale-105 hover:bg-hover transition-all duration-300 ease-in-out';

    $role = Auth::check() ? Auth::user()->roles->pluck('name')->first() : null;

    if ($role === true) {
        return redirect()->route('default.dashboard');
    }

@endphp


<!-- Font Awesome CDN -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<aside id="app-sidebar"
    class="bg-secondary-gradient fixed top-0 left-0 w-64 h-screen overflow-y-auto hide-scrollbar shadow-md z-30
           bg-gradient-to-br from-[var(--primary-bg)] to-[var(--primary-bg-light)] text-primary
           transition-transform duration-300 ease-in-out
           md:translate-x-0 transform"
    :class="{ '-translate-x-full': !sidebarOpen }" x-show="sidebarOpen"
    x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform -translate-x-full"
    x-transition:enter-end="opacity-100 transform translate-x-0" x-transition:leave="transition ease-in duration-300"
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
            <a href="{{ route('default.dashboard') }}" class="{{ $isActive('default.dashboard') }}">
                <i class="fas fa-home"></i> Dashboard
            </a>

        </div>

        {{-- Company Management --}}
        @can('edit company')
            <div class="border-b border-primary pb-2 mb-2">
                <div class="font-semibold uppercase tracking-wide text-xs mb-2 text-primary/70">
                    <i class="fas fa-users"></i> Company Management
                </div>
                <a href="{{ route('company.edit', $company->id) }}" class="{{ $isActive('company.edit') }}">
                    <i class="fas fa-user-tag"></i> Edit Company Details
                </a>
            </div>
        @endcan

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
            @can('view user')
                <a href="{{ route('users.index') }}" class="{{ $isActive('users.index') }}">
                    <i class="fas fa-user-friends w-4 h-4 mr-3"></i> Users
                </a>
            @endcan
        </div>

        <!-- Attendance -->
        <div class="border-b border-primary pb-2 mb-2">
            <div class="font-semibold uppercase tracking-wide text-xs mb-2 text-primary/70">Attendance</div>
            <a href="{{ route('employee.dashboard') }}" class="{{ $isActive('employee.dashboard') }}"><i
                    class="fas fa-user-clock"></i> Punch-In/Punch-Out
            </a>
            @can('attendance report')
                <a href="{{ route('admin.attendance.report') }}" class="{{ $isActive('admin.attendance.report') }}"><i
                        class="fas fa-user-clock"></i> Attendance Reports
                </a>
            @endcan

            <a href="{{ route('reports.report') }}" class="{{ $isActive('reports.report') }}">
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
                    <i class="fas fa-tasks"></i>
                    Manage Leaves
                </a>
            @endcan
            @can('view leave type')
                <a href="{{ route('leave-types.index') }}" class="{{ $isActive('leave-types.index') }}"><i
                        class="fas fa-calendar-check"></i> Manage Leave Type</a>
            @endcan
        </div>

        <!-- Holidays -->
        <div class="border-b border-primary pb-2 mb-2">
            <div class="font-semibold uppercase tracking-wide text-xs mb-2 text-primary/70">
                <i class="fas fa-calendar-day"></i> Holidays
            </div>
            <a href="{{ route('holidays.index') }}" class="{{ $isActive('holidays.index') }}">
                <i class="fas fa-calendar"></i> View Holidays
            </a>
        </div>

        <!-- Projects -->
        @can('view project')
            <div class="border-b border-primary pb-2 mb-2">
                <div class="font-semibold uppercase tracking-wide text-xs mb-2 text-primary/70">
                    <i class="fas fa-project-diagram"></i> Projects
                </div>
                <a href="{{ route('projects.index') }}" class="{{ $isActive('projects.index') }}">
                    <i class="fas fa-folder-open"></i> View Projects
                </a>
            </div>
        @endcan



        <!-- Payroll -->
        <div class="border-b border-primary pb-2 mb-2">
            <div class="font-semibold uppercase tracking-wide text-xs mb-2 text-primary/70">
                <i class="fas fa-money-bill-wave"></i> Salary & Payroll
            </div>
            @can('view salary structure')
                <a href="{{ route('salary.index') }}" class="{{ $isActive('salary.index') }}">
                    <i class="fas fa-dollar-sign"></i> Salary Structures
                </a>
            @endcan
            <a href="{{ route('payrolls.index') }}" class="{{ $isActive('payrolls.index') }}">
                <i class="fas fa-file-invoice-dollar"></i> Payrolls
            </a>
        </div>
        {{-- Install PWA --}}
        <div class="border-b border-primary pb-2 mb-2">
            <div class="font-semibold uppercase tracking-wide text-xs mb-2 text-primary/70">
               <i class="fa-brands fa-google-play"></i> Progressive Web App
            </div>
            <a href="javascript:void(0)" id="installPWA" class="{{ $isActive('pwa.install') }}">
                <i class="fas fa-download mr-1"></i> Install HRMS App
            </a>
        </div>
        <!-- Notifications -->
        {{-- <div class="border-b border-primary pb-2 mb-2">
            <div class="font-semibold uppercase tracking-wide text-xs mb-2 text-primary/70">
                <i class="fas fa-bell"></i> Notifications
            </div>
            <a href="#"
                class="flex items-center gap-2 px-4 py-2 rounded hover:bg-hover hover:scale-105 transition-all duration-300">
                <i class="fas fa-bell"></i> Alerts
            </a>
        </div> --}}

        <!-- AI Tools -->
        <div class="border-b border-primary pb-2 mb-2">
            <div class="font-semibold uppercase tracking-wide text-xs mb-2 text-primary/70">
                <i class="fas fa-robot"></i> AI Tools
            </div>
            <a href="#"
                class="flex items-center gap-2 px-4 py-2 rounded hover:bg-hover hover:scale-105 transition-all duration-300">
                <i class="fas fa-brain"></i> SkillLens
            </a>
            <a href="#"
                class="flex items-center gap-2 px-4 py-2 rounded hover:bg-hover hover:scale-105 transition-all duration-300">
                <i class="fas fa-magic"></i> RootCauseX
            </a>
        </div>
    </nav>
</aside>
<script>
    let deferredPrompt;
    const installBtn = document.getElementById("installPWA");

    // Listen for the "beforeinstallprompt" event
    window.addEventListener("beforeinstallprompt", (e) => {
        e.preventDefault();
        deferredPrompt = e;
        installBtn.style.display = "block"; // Show button
    });

    // Handle button click
    installBtn.addEventListener("click", async () => {
        if (deferredPrompt) {
            deferredPrompt.prompt(); // Show install prompt
            const {
                outcome
            } = await deferredPrompt.userChoice;
            console.log("User response:", outcome);
            deferredPrompt = null;
        }
    });

    // Optional: detect if already installed
    window.addEventListener("appinstalled", () => {
        console.log("PWA was installed");
        installBtn.style.display = "none";
    });
</script>

<script>
    (() => {
        const KEY = 'sidebar-scroll-top';

        function getSidebar() {
            return document.getElementById('app-sidebar');
        }

        function restoreScroll() {
            const el = getSidebar();
            if (!el) return;
            const saved = sessionStorage.getItem(KEY);
            if (saved !== null) {
                const y = parseInt(saved, 10);
                if (!Number.isNaN(y)) {
                    // Defer to ensure layout/transitions are applied
                    requestAnimationFrame(() => {
                        el.scrollTop = y;
                    });
                }
            }
            // Save on scroll (passive for perf)
            el.addEventListener('scroll', () => {
                try {
                    sessionStorage.setItem(KEY, String(el.scrollTop));
                } catch (_) {}
            }, {
                passive: true
            });

            // Also save right before navigating away via sidebar links
            const links = el.querySelectorAll('a[href]');
            links.forEach((a) => {
                a.addEventListener('click', () => {
                    try {
                        sessionStorage.setItem(KEY, String(el.scrollTop));
                    } catch (_) {}
                });
            });
        }

        window.addEventListener('DOMContentLoaded', restoreScroll);

        // Fallback: ensure we persist on page unload too
        window.addEventListener('beforeunload', () => {
            const el = getSidebar();
            if (!el) return;
            try {
                sessionStorage.setItem(KEY, String(el.scrollTop));
            } catch (_) {}
        });
    })();
</script>
