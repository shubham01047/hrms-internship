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

        /* General card styling */
        .attendance-card {
            background: white;
            border: 1px solid #e5e7eb;
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
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            color: white;
            font-size: 1.25rem;
            flex-shrink: 0;
        }

        /* Status badge styling */
        .status-badge {
            padding: 0.3rem 0.75rem;
            border-radius: 9999px;
            font-size: 0.875rem;
            font-weight: 500;
            display: inline-flex;
            align-items: center;
            gap: 0.25rem;
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
            <div class="theme-app flex justify-between items-center p-6 rounded-lg shadow-sm" style="background: linear-gradient(to right, var(--secondary-bg), var(--primary-bg));">
                <div class="flex items-center space-x-3">
                    <div class="p-2 rounded-lg shadow-md" style="background-color: var(--hover-bg);">
                        <svg class="w-6 h-6" style="color: var(--primary-text);" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01">
                            </path>
                        </svg>
                    </div>
                    <div>
                        <h2 class="font-bold text-2xl leading-tight" style="color: var(--primary-text);">
                            Attendance Report
                        </h2>
                        <p class="text-sm" style="color: var(--secondary-text);">Daily attendance tracking and break management</p>
                    </div>
                </div>
                <div class="flex items-center space-x-2">
                    <div class="text-right">
                        <div class="text-sm" style="color: var(--secondary-text);">{{ date('F j, Y') }}</div>
                        <div class="font-semibold" style="color: var(--primary-text);">{{ count($attendances) }} Records</div>
                    </div>
                </div>
            </div>
        </x-slot>

        <div class="py-8 bg-gradient-to-br from-gray-50 to-blue-50 min-h-screen">
            <div class="w-full px-4 sm:px-6 lg:px-8 space-y-8">
                <!-- Today's Attendance Header Card -->
                <div class="attendance-card p-6 animate-fade-in animate-delay-100">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-4">
                            <div class="theme-app p-3 rounded-lg shadow-sm" style="background-color: var(--hover-bg);">
                                <svg class="w-6 h-6" style="color: var(--primary-text);" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900">Today's Attendance Overview</h3>
                                <p class="text-sm text-gray-600">Complete attendance tracking for all employees</p>
                            </div>
                        </div>
                        <div class="theme-app px-4 py-2 rounded-full shadow-sm" style="background-color: var(--hover-bg);">
                            <span class="font-medium" style="color: var(--primary-text);">{{ count($attendances) }} Active Records</span>
                        </div>
                    </div>
                </div>

                <!-- Attendance Cards Layout -->
                @forelse ($attendances as $index => $attendance)
                    <div class="attendance-card animate-fade-in animate-delay-200">
                        <!-- Employee Header -->
                        <div class="theme-app p-6 border-b border-gray-100" style="background: linear-gradient(to right, var(--secondary-bg), var(--primary-bg));">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center space-x-4">
                                    <div class="avatar-circle" style="background: linear-gradient(135deg, var(--hover-bg), var(--primary-bg));">
                                        <span>{{ strtoupper(substr($attendance['name'], 0, 2)) }}</span>
                                    </div>
                                    <div>
                                        <h3 class="text-xl font-semibold" style="color: var(--primary-text);">{{ $attendance['name'] }}</h3>
                                        <p class="text-sm" style="color: var(--secondary-text);">Employee ID: EMP{{ str_pad($index + 1, 3, '0', STR_PAD_LEFT) }}</p>
                                    </div>
                                </div>

                                <!-- Status Badge -->
                                <div class="flex items-center space-x-2">
                                    @if ($attendance['punch_out'])
                                        <span class="status-badge bg-red-100 text-red-600 border border-red-300">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                                            </svg>
                                            Checked Out
                                        </span>
                                    @else
                                        <span class="status-badge bg-green-100 text-green-600 border border-green-300">
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
                            <div class="grid-item bg-green-50 border-green-200 animate-fade-in animate-delay-300">
                                <div class="flex items-center space-x-3 mb-2">
                                    <div class="bg-green-100 p-2 rounded-lg">
                                        <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>
                                        </svg>
                                    </div>
                                    <p class="text-sm font-medium text-green-700">Punch In</p>
                                </div>
                                <p class="text-2xl font-bold text-green-800">{{ \Carbon\Carbon::parse($attendance['punch_in'])->format('h:i A') }}</p>
                                <p class="text-xs text-green-600 mt-1">Remark: {{ $attendance['punch_in_remarks'] ?? '-' }}</p>
                            </div>

                            <!-- Punch Out -->
                            <div class="grid-item bg-red-50 border-red-200 animate-fade-in animate-delay-400">
                                <div class="flex items-center space-x-3 mb-2">
                                    <div class="bg-red-100 p-2 rounded-lg">
                                        <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                                        </svg>
                                    </div>
                                    <p class="text-sm font-medium text-red-700">Punch Out</p>
                                </div>
                                <p class="text-2xl font-bold text-red-800">{{ $attendance['punch_out'] ? \Carbon\Carbon::parse($attendance['punch_out'])->format('h:i A') : 'Not punched out' }}</p>
                                <p class="text-xs text-red-600 mt-1">Remark: {{ $attendance['punch_out_remarks'] ?? '-' }}</p>
                            </div>

                            <!-- Total Hours -->
                            <div class="grid-item bg-blue-50 border-blue-200 animate-fade-in animate-delay-500">
                                <div class="flex items-center space-x-3 mb-2">
                                    <div class="bg-blue-100 p-2 rounded-lg">
                                        <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                    </div>
                                    <p class="text-sm font-medium text-blue-700">Total Hours</p>
                                </div>
                                <p class="text-2xl font-bold text-blue-800">{{ $attendance['total_working_hours'] }}</p>
                                <p class="text-xs text-blue-600 mt-1">Daily total work duration</p>
                            </div>

                            <!-- Punch In Again -->
                            <div class="grid-item bg-yellow-50 border-yellow-200 animate-fade-in animate-delay-600">
                                <div class="flex items-center space-x-3 mb-2">
                                    <div class="bg-yellow-100 p-2 rounded-lg">
                                        <svg class="w-5 h-5 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14"></path>
                                        </svg>
                                    </div>
                                    <p class="text-sm font-medium text-yellow-700">Punch In Again</p>
                                </div>
                                <p class="text-2xl font-bold text-yellow-800">{{ $attendance['punch_in_again'] ? \Carbon\Carbon::parse($attendance['punch_in_again'])->format('h:i A') : 'Not punched in again' }}</p>
                                <p class="text-xs text-yellow-600 mt-1">Remark: {{ $attendance['punch_in_again_remarks'] ?? '-' }}</p>
                            </div>

                            <!-- Punch Out Again -->
                            <div class="grid-item bg-purple-50 border-purple-200 animate-fade-in animate-delay-700">
                                <div class="flex items-center space-x-3 mb-2">
                                    <div class="bg-purple-100 p-2 rounded-lg">
                                        <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7"></path>
                                        </svg>
                                    </div>
                                    <p class="text-sm font-medium text-purple-700">Punch Out Again</p>
                                </div>
                                <p class="text-2xl font-bold text-purple-800">{{ $attendance['punch_out_again'] ? \Carbon\Carbon::parse($attendance['punch_out_again'])->format('h:i A') : 'Not punched out again' }}</p>
                                <p class="text-xs text-purple-600 mt-1">Remark: {{ $attendance['punch_out_again_remarks'] ?? '-' }}</p>
                            </div>

                            <!-- Total Overtime Hours -->
                            <div class="grid-item bg-indigo-50 border-indigo-200 animate-fade-in animate-delay-800">
                                <div class="flex items-center space-x-3 mb-2">
                                    <div class="bg-indigo-100 p-2 rounded-lg">
                                        <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                    </div>
                                    <p class="text-sm font-medium text-indigo-700">Total Overtime Hours</p>
                                </div>
                                <p class="text-2xl font-bold text-indigo-800">{{ $attendance['overtime_working_hours'] }}</p>
                                <p class="text-xs text-indigo-600 mt-1">Additional hours worked</p>
                            </div>
                        </div>

                        <!-- Breaks Section -->
                        <div class="px-6 pb-6 animate-fade-in animate-delay-900">
                            <div class="bg-gray-50 rounded-lg p-4 border border-gray-200">
                                <div class="flex items-center justify-between mb-4">
                                    <h4 class="text-lg font-semibold text-gray-900 flex items-center">
                                        <svg class="w-5 h-5 mr-2 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                                        </svg>
                                        Break Details
                                    </h4>
                                    @if (!empty($attendance['breaks']) && count($attendance['breaks']) > 0)
                                        <span class="bg-gray-200 px-3 py-1 rounded-full text-sm font-medium text-gray-700">
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
                                                    'morning tea' => ['bg' => 'bg-yellow-50', 'border' => 'border-yellow-200', 'text' => 'text-yellow-700', 'emoji' => '☕ Morning Tea'],
                                                    'lunch' => ['bg' => 'bg-green-50', 'border' => 'border-green-200', 'text' => 'text-green-700', 'emoji' => '🍽️ Lunch'],
                                                    'evening tea' => ['bg' => 'bg-purple-50', 'border' => 'border-purple-200', 'text' => 'text-purple-700', 'emoji' => '🫖 Evening Tea'],
                                                    'custom' => ['bg' => 'bg-blue-50', 'border' => 'border-blue-200', 'text' => 'text-blue-700', 'emoji' => '💼 Custom'],
                                                ];
                                                $currentBreakConfig = $config[$breakType] ?? $config['custom'];
                                            @endphp

                                            <div class="break-card {{ $currentBreakConfig['bg'] }} {{ $currentBreakConfig['border'] }} animate-fade-in animate-delay-1000">
                                                <div class="flex items-center space-x-2">
                                                    <span class="text-lg">{{ explode(' ', $currentBreakConfig['emoji'])[0] }}</span>
                                                    <span class="text-sm font-medium {{ $currentBreakConfig['text'] }}">{{ substr($currentBreakConfig['emoji'], 2) }}</span>
                                                </div>
                                                <div class="text-right">
                                                    <span class="duration-badge {{ $currentBreakConfig['text'] }} bg-white/50">
                                                        {{ is_numeric($break['duration']) ? gmdate('H:i:s', $break['duration']) : $break['duration'] }}
                                                    </span>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @else
                                    <div class="text-center py-8">
                                        <div class="bg-gray-100 p-3 rounded-full mx-auto mb-3 w-fit">
                                            <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                        </div>
                                        <h4 class="text-sm font-medium text-gray-900 mb-1">No Breaks Taken</h4>
                                        <p class="text-xs text-gray-500">Employee worked continuously today</p>
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800 mt-2">
                                            Continuous Work
                                        </span>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="text-center py-12 attendance-card animate-fade-in animate-delay-200">
                        <div class="bg-gray-100 p-4 rounded-full mx-auto mb-4 w-fit">
                            <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
            </svg>
                        </div>
                        <h3 class="text-lg font-medium text-gray-900 mb-2">No Attendance Records</h3>
                        <p class="text-gray-500">No attendance records found for today.</p>
                    </div>
                @endforelse
            </div>
        </div>
    @endcan
</x-app-layout>