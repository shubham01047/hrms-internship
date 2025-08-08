<x-app-layout>
    <style>
        /* Custom animations */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-fade-in { animation: fadeIn 0.6s ease-out forwards; }
        .animate-delay-100 { animation-delay: 0.1s; }
        .animate-delay-200 { animation-delay: 0.2s; }
        .animate-delay-300 { animation-delay: 0.3s; }
        .animate-delay-400 { animation-delay: 0.4s; }
        .animate-delay-500 { animation-delay: 0.5s; }
        .animate-delay-600 { animation-delay: 0.6s; }
        .animate-delay-700 { animation-delay: 0.7s; }
        .animate-delay-800 { animation-delay: 0.8s; }
        .animate-delay-900 { animation-delay: 0.9s; }
        .animate-delay-1000 { animation-delay: 1s; }

        /* Specific colors for this attendance report, derived from the image */
        :root {
            --header-bg-from: #4a469f; /* Darker blue/purple */
            --header-bg-to: #6a5acd;   /* Lighter blue/purple */
            --card-bg: #ffffff;
            --card-border: #e0e0e0;
            --text-dark: #333333;
            --text-medium: #666666;
            --text-light: #999999;

            /* Punch In / Green */
            --punch-in-bg: #e6ffe6; /* Light green */
            --punch-in-border: #a3e6a3; /* Medium green */
            --punch-in-text: #1a7a1a; /* Dark green */
            --punch-in-icon: #28a745; /* Bootstrap success green */

            /* Punch Out / Red */
            --punch-out-bg: #ffe6e6; /* Light red */
            --punch-out-border: #e6a3a3; /* Medium red */
            --punch-out-text: #a71a1a; /* Dark red */
            --punch-out-icon: #dc3545; /* Bootstrap danger red */

            /* Total Hours / Blue */
            --total-hours-bg: #e6f2ff; /* Light blue */
            --total-hours-border: #a3cce6; /* Medium blue */
            --total-hours-text: #1a4a7a; /* Dark blue */
            --total-hours-icon: #007bff; /* Bootstrap primary blue */

            /* Punch In Again / Yellow */
            --punch-in-again-bg: #fffbe6; /* Light yellow */
            --punch-in-again-border: #e6d9a3; /* Medium yellow */
            --punch-in-again-text: #7a6a1a; /* Dark yellow */
            --punch-in-again-icon: #ffc107; /* Bootstrap warning yellow */

            /* Punch Out Again / Purple */
            --punch-out-again-bg: #f2e6ff; /* Light purple */
            --punch-out-again-border: #cca3e6; /* Medium purple */
            --punch-out-again-text: #4a1a7a; /* Dark purple */
            --punch-out-again-icon: #6f42c1; /* Bootstrap purple */

            /* Break Details Section */
            --break-section-bg: #f8f8f8; /* Light gray for break section background */
            --break-section-border: #e0e0e0; /* Light gray border */
            --break-section-text: #333333; /* Dark text */
            --break-section-icon: #666666; /* Medium gray icon */

            /* Break Cards */
            --break-card-morning-tea-bg: #fffbe6; /* Yellow */
            --break-card-morning-tea-border: #e6d9a3;
            --break-card-morning-tea-text: #7a6a1a;

            --break-card-lunch-bg: #e6ffe6; /* Green */
            --break-card-lunch-border: #a3e6a3;
            --break-card-lunch-text: #1a7a1a;

            --break-card-evening-tea-bg: #f2e6ff; /* Purple */
            --break-card-evening-tea-border: #cca3e6;
            --break-card-evening-tea-text: #4a1a7a;

            --break-card-custom-bg: #e6f2ff; /* Light Blue */
            --break-card-custom-border: #a3cce6;
            --break-card-custom-text: #1a4a7a;
        }

        /* Dark mode adjustments */
        .dark {
            --header-bg-from: #2a275c;
            --header-bg-to: #3a357a;
            --card-bg: #2a2a2a;
            --card-border: #444444;
            --text-dark: #ffffff;
            --text-medium: #cccccc;
            --text-light: #aaaaaa;

            --punch-in-bg: #1a3a1a;
            --punch-in-border: #3a6a3a;
            --punch-in-text: #a3e6a3;
            --punch-in-icon: #28a745;

            --punch-out-bg: #3a1a1a;
            --punch-out-border: #6a3a3a;
            --punch-out-text: #e6a3a3;
            --punch-out-icon: #dc3545;

            --total-hours-bg: #1a2a3a;
            --total-hours-border: #3a5a6a;
            --total-hours-text: #a3cce6;
            --total-hours-icon: #007bff;

            --punch-in-again-bg: #3a3a1a;
            --punch-in-again-border: #6a6a3a;
            --punch-in-again-text: #e6d9a3;
            --punch-in-again-icon: #ffc107;

            --punch-out-again-bg: #3a1a3a;
            --punch-out-again-border: #6a3a6a;
            --punch-out-again-text: #cca3e6;
            --punch-out-again-icon: #6f42c1;

            --break-section-bg: #222222;
            --break-section-border: #333333;
            --break-section-text: #ffffff;
            --break-section-icon: #cccccc;

            --break-card-morning-tea-bg: #3a3a1a;
            --break-card-morning-tea-border: #6a6a3a;
            --break-card-morning-tea-text: #e6d9a3;

            --break-card-lunch-bg: #1a3a1a;
            --break-card-lunch-border: #3a6a3a;
            --break-card-lunch-text: #a3e6a3;

            --break-card-evening-tea-bg: #3a1a3a;
            --break-card-evening-tea-border: #6a3a6a;
            --break-card-evening-tea-text: #cca3e6;

            --break-card-custom-bg: #1a2a3a;
            --break-card-custom-border: #3a5a6a;
            --break-card-custom-text: #a3cce6;
        }

        /* General card styling */
        .attendance-card {
            background: var(--card-bg);
            border: 1px solid var(--card-border);
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease-in-out;
        }
        .attendance-card:hover {
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            transform: translateY(-2px);
        }

        /* Inner grid item styling */
        .grid-item {
            padding: 1.25rem;
            border-radius: 8px;
            border: 1px solid;
            transition: all 0.2s ease-in-out;
        }
        .grid-item:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.08);
        }

        /* Avatar styling */
        .avatar-circle {
            width: 48px;
            height: 48px;
            border-radius: 50%;
            background: linear-gradient(135deg, #6a5acd, #4a469f); /* Blue/purple gradient */
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            color: white;
            font-size: 1.25rem;
            flex-shrink: 0;
        }
        .dark .avatar-circle {
            background: linear-gradient(135deg, #3a357a, #2a275c);
        }

        /* Status badge styling */
        .status-badge {
            padding: 0.3rem 0.75rem;
            border-radius: 9999px; /* Full rounded */
            font-size: 0.875rem;
            font-weight: 500;
            display: inline-flex;
            align-items: center;
            gap: 0.25rem;
        }
        .status-badge.checked-out {
            background-color: #fef2f2; /* Light red */
            color: #dc2626; /* Red-600 */
            border: 1px solid #fca5a5; /* Red-300 */
        }
        .dark .status-badge.checked-out {
            background-color: #4a1a1a;
            color: #e6a3a3;
            border-color: #6a3a3a;
        }
        .status-badge.active {
            background-color: #f0fdf4; /* Light green */
            color: #16a34a; /* Green-600 */
            border: 1px solid #86efac; /* Green-300 */
        }
        .dark .status-badge.active {
            background-color: #1a3a1a;
            color: #a3e6a3;
            border-color: #3a6a3a;
        }

        /* Break card styling */
        .break-card {
            padding: 0.75rem;
            border-radius: 8px;
            border: 1px solid;
            display: flex;
            align-items: center;
            justify-content: space-between;
            transition: all 0.2s ease-in-out;
        }
        .break-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        }
        .break-card .duration-badge {
            padding: 0.25rem 0.6rem;
            border-radius: 9999px;
            font-weight: bold;
            font-size: 0.75rem;
        }
    </style>

    @can('attendance report')
        <x-slot name="header">
            {{-- Header section matching the image --}}
            <div class="bg-gradient-to-r from-[var(--header-bg-from)] to-[var(--header-bg-to)] rounded-lg shadow-lg p-6 mb-6 animate-fade-in">
                <h2 class="text-3xl font-bold text-white flex items-center">
                    <svg class="w-8 h-8 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01">
                        </path>
                    </svg>
                    Attendance Report
                </h2>
                <p class="text-blue-100 mt-2">Daily attendance tracking and break management</p>
            </div>
        </x-slot>

        <div class="py-8 sm:px-6 lg:px-8 bg-gray-100 min-h-[calc(100vh-64px)] theme-app">
            <div class="w-full max-w-6xl mx-auto space-y-8">
                <!-- Today's Attendance Header Card -->
                <div class="attendance-card p-6 animate-fade-in animate-delay-100">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-4">
                            <div class="bg-blue-100 p-3 rounded-lg">
                                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Today's Attendance</h3>
                                <p class="text-sm text-gray-600 dark:text-gray-400">{{ date('F j, Y') }}</p>
                            </div>
                        </div>
                        <div class="bg-blue-100 px-4 py-2 rounded-full">
                            <span class="text-blue-800 font-medium">{{ count($attendances) }} Records</span>
                        </div>
                    </div>
                </div>

                <!-- Attendance Cards Layout -->
                @forelse ($attendances as $index => $attendance)
                    <div class="attendance-card animate-fade-in animate-delay-200">
                        <!-- Employee Header -->
                        <div class="p-6 border-b border-gray-100 dark:border-gray-700">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center space-x-4">
                                    <div class="avatar-circle">
                                        <span>{{ strtoupper(substr($attendance['name'], 0, 2)) }}</span>
                                    </div>
                                    <div>
                                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">{{ $attendance['name'] }}</h3>
                                        <p class="text-sm text-gray-500 dark:text-gray-400">Employee ID: EMP{{ str_pad($index + 1, 3, '0', STR_PAD_LEFT) }}</p>
                                    </div>
                                </div>

                                <!-- Status Badge -->
                                <div class="flex items-center space-x-2">
                                    @if ($attendance['punch_out'])
                                        <span class="status-badge checked-out">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                                            </svg>
                                            Checked Out
                                        </span>
                                    @else
                                        <span class="status-badge active">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                            Active
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- Time Information Grid -->
                        <div class="p-6 grid grid-cols-1 md:grid-cols-3 gap-6">
                            <!-- Punch In -->
                            <div class="grid-item bg-[var(--punch-in-bg)] border-[var(--punch-in-border)] animate-fade-in animate-delay-300">
                                <div class="flex items-center space-x-3 mb-2">
                                    <div class="bg-[var(--punch-in-icon)]/10 p-2 rounded-lg">
                                        <svg class="w-5 h-5 text-[var(--punch-in-icon)]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>
                                        </svg>
                                    </div>
                                    <p class="text-sm font-medium text-[var(--punch-in-text)]">Punch In</p>
                                </div>
                                <p class="text-2xl font-bold text-[var(--punch-in-text)]">{{ \Carbon\Carbon::parse($attendance['punch_in'])->format('h:i A') }}</p>
                                <p class="text-xs text-[var(--punch-in-text)] opacity-80 mt-1">Remark: {{ $attendance['punch_in_remarks'] ?? '-' }}</p>
                            </div>

                            <!-- Punch Out -->
                            <div class="grid-item bg-[var(--punch-out-bg)] border-[var(--punch-out-border)] animate-fade-in animate-delay-400">
                                <div class="flex items-center space-x-3 mb-2">
                                    <div class="bg-[var(--punch-out-icon)]/10 p-2 rounded-lg">
                                        <svg class="w-5 h-5 text-[var(--punch-out-icon)]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                                        </svg>
                                    </div>
                                    <p class="text-sm font-medium text-[var(--punch-out-text)]">Punch Out</p>
                                </div>
                                <p class="text-2xl font-bold text-[var(--punch-out-text)]">{{ $attendance['punch_out'] ? \Carbon\Carbon::parse($attendance['punch_out'])->format('h:i A') : 'Not punched out' }}</p>
                                <p class="text-xs text-[var(--punch-out-text)] opacity-80 mt-1">Remark: {{ $attendance['punch_out_remarks'] ?? '-' }}</p>
                            </div>

                            <!-- Total Hours -->
                            <div class="grid-item bg-[var(--total-hours-bg)] border-[var(--total-hours-border)] animate-fade-in animate-delay-500">
                                <div class="flex items-center space-x-3 mb-2">
                                    <div class="bg-[var(--total-hours-icon)]/10 p-2 rounded-lg">
                                        <svg class="w-5 h-5 text-[var(--total-hours-icon)]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                    </div>
                                    <p class="text-sm font-medium text-[var(--total-hours-text)]">Total Hours</p>
                                </div>
                                <p class="text-2xl font-bold text-[var(--total-hours-text)]">{{ $attendance['total_working_hours'] }}</p>
                                <p class="text-xs text-[var(--total-hours-text)] opacity-80 mt-1">Daily total work duration</p>
                            </div>

                            <!-- Punch In Again -->
                            <div class="grid-item bg-[var(--punch-in-again-bg)] border-[var(--punch-in-again-border)] animate-fade-in animate-delay-600">
                                <div class="flex items-center space-x-3 mb-2">
                                    <div class="bg-[var(--punch-in-again-icon)]/10 p-2 rounded-lg">
                                        <svg class="w-5 h-5 text-[var(--punch-in-again-icon)]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14"></path>
                                        </svg>
                                    </div>
                                    <p class="text-sm font-medium text-[var(--punch-in-again-text)]">Punch In Again</p>
                                </div>
                                <p class="text-2xl font-bold text-[var(--punch-in-again-text)]">{{ $attendance['punch_in_again'] ? \Carbon\Carbon::parse($attendance['punch_in_again'])->format('h:i A') : 'Not punched in again' }}</p>
                                <p class="text-xs text-[var(--punch-in-again-text)] opacity-80 mt-1">Remark: {{ $attendance['punch_in_again_remarks'] ?? '-' }}</p>
                            </div>

                            <!-- Punch Out Again -->
                            <div class="grid-item bg-[var(--punch-out-again-bg)] border-[var(--punch-out-again-border)] animate-fade-in animate-delay-700">
                                <div class="flex items-center space-x-3 mb-2">
                                    <div class="bg-[var(--punch-out-again-icon)]/10 p-2 rounded-lg">
                                        <svg class="w-5 h-5 text-[var(--punch-out-again-icon)]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7"></path>
                                        </svg>
                                    </div>
                                    <p class="text-sm font-medium text-[var(--punch-out-again-text)]">Punch Out Again</p>
                                </div>
                                <p class="text-2xl font-bold text-[var(--punch-out-again-text)]">{{ $attendance['punch_out_again'] ? \Carbon\Carbon::parse($attendance['punch_out_again'])->format('h:i A') : 'Not punched out again' }}</p>
                                <p class="text-xs text-[var(--punch-out-again-text)] opacity-80 mt-1">Remark: {{ $attendance['punch_out_again_remarks'] ?? '-' }}</p>
                            </div>

                            <!-- Total Overtime Hours -->
                            <div class="grid-item bg-[var(--total-hours-bg)] border-[var(--total-hours-border)] animate-fade-in animate-delay-800">
                                <div class="flex items-center space-x-3 mb-2">
                                    <div class="bg-[var(--total-hours-icon)]/10 p-2 rounded-lg">
                                        <svg class="w-5 h-5 text-[var(--total-hours-icon)]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                    </div>
                                    <p class="text-sm font-medium text-[var(--total-hours-text)]">Total Overtime Hours</p>
                                </div>
                                <p class="text-2xl font-bold text-[var(--total-hours-text)]">{{ $attendance['overtime_working_hours'] }}</p>
                                <p class="text-xs text-[var(--total-hours-text)] opacity-80 mt-1">Additional hours worked</p>
                            </div>
                        </div>

                        <!-- Breaks Section -->
                        <div class="px-6 pb-6 animate-fade-in animate-delay-900">
                            <div class="bg-[var(--break-section-bg)] rounded-lg p-4 border-[var(--break-section-border)]">
                                <div class="flex items-center justify-between mb-4">
                                    <h4 class="text-lg font-semibold text-[var(--break-section-text)] flex items-center">
                                        <svg class="w-5 h-5 mr-2 text-[var(--break-section-icon)]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                                        </svg>
                                        Break Details
                                    </h4>
                                    @if (!empty($attendance['breaks']) && count($attendance['breaks']) > 0)
                                        <span class="bg-gray-200 dark:bg-gray-700 px-3 py-1 rounded-full text-sm font-medium text-gray-700 dark:text-gray-300">
                                            {{ count($attendance['breaks']) }}
                                            Break{{ count($attendance['breaks']) > 1 ? 's' : '' }}
                                        </span>
                                    @endif
                                </div>

                                @if (!empty($attendance['breaks']) && count($attendance['breaks']) > 0)
                                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                                        @foreach ($attendance['breaks'] as $break)
                                            @php
                                                $breakType = strtolower($break['type'] ?? 'custom');
                                                $config = [
                                                    'morning tea' => ['bg' => 'var(--break-card-morning-tea-bg)', 'border' => 'var(--break-card-morning-tea-border)', 'text' => 'var(--break-card-morning-tea-text)', 'emoji' => '☕ Morning Tea'],
                                                    'lunch' => ['bg' => 'var(--break-card-lunch-bg)', 'border' => 'var(--break-card-lunch-border)', 'text' => 'var(--break-card-lunch-text)', 'emoji' => '🍽️ Lunch'],
                                                    'evening tea' => ['bg' => 'var(--break-card-evening-tea-bg)', 'border' => 'var(--break-card-evening-tea-border)', 'text' => 'var(--break-card-evening-tea-text)', 'emoji' => '🫖 Evening Tea'],
                                                    'custom' => ['bg' => 'var(--break-card-custom-bg)', 'border' => 'var(--break-card-custom-border)', 'text' => 'var(--break-card-custom-text)', 'emoji' => '💼 Custom'],
                                                ];
                                                $currentBreakConfig = $config[$breakType] ?? $config['custom'];
                                            @endphp

                                            <div class="break-card bg-[{{ $currentBreakConfig['bg'] }}] border-[{{ $currentBreakConfig['border'] }}] animate-fade-in animate-delay-1000">
                                                <div class="flex items-center space-x-2">
                                                    <span class="text-lg">{{ $currentBreakConfig['emoji'] }}</span>
                                                </div>
                                                <div class="text-right">
                                                    <span class="duration-badge text-[{{ $currentBreakConfig['text'] }}]">
                                                        {{ is_numeric($break['duration']) ? gmdate('H:i:s', $break['duration']) : $break['duration'] }}
                                                    </span>
                                                    <p class="text-xs text-[{{ $currentBreakConfig['text'] }}] opacity-75">Duration</p>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @else
                                    <div class="text-center py-8">
                                        <div class="bg-gray-100 dark:bg-gray-700 p-3 rounded-full mx-auto mb-3 w-fit">
                                            <svg class="w-6 h-6 text-gray-400 dark:text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                        </div>
                                        <h4 class="text-sm font-medium text-gray-900 dark:text-white mb-1">No Breaks Taken</h4>
                                        <p class="text-xs text-gray-500 dark:text-gray-400">Employee worked continuously today</p>
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800 dark:bg-green-700 dark:text-green-200 mt-2">
                                            Continuous Work
                                        </span>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="text-center py-12 attendance-card animate-fade-in animate-delay-200">
                        <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded-full mx-auto mb-4 w-fit">
                            <svg class="w-8 h-8 text-gray-400 dark:text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-2">No Attendance Records</h3>
                        <p class="text-gray-500 dark:text-gray-400">No attendance records found for today.</p>
                    </div>
                @endforelse
            </div>
        </div>
    @endcan
</x-app-layout>