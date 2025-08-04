<x-app-layout>
    @can('attendance report')
        <x-slot name="header">
            <div class="bg-gradient-to-r from-blue-600 to-purple-600 rounded-lg shadow-lg p-6 mb-6">
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

        <div class="bg-white rounded-xl shadow-xl overflow-hidden border border-gray-200">
            <!-- Stats Header -->
            <div class="bg-gray-50 px-6 py-4 border-b border-gray-200">
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-4">
                        <div class="bg-green-100 p-3 rounded-lg">
                            <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-2.239">
                                </path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900">Today's Attendance</h3>
                            <p class="text-sm text-gray-600">{{ date('F j, Y') }}</p>
                        </div>
                    </div>
                    <div class="bg-blue-100 px-4 py-2 rounded-full">
                        <span class="text-blue-800 font-medium">{{ count($attendances) }} Records</span>
                    </div>
                </div>
            </div>

            <!-- Attendance Cards Layout -->
            <div class="p-6">
                @forelse ($attendances as $index => $attendance)
                    <div
                        class="mb-6 bg-white border border-gray-200 rounded-xl shadow-sm hover:shadow-md transition-shadow duration-200">
                        <!-- Employee Header -->
                        <div class="p-6 border-b border-gray-100">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center space-x-4">
                                    <div class="flex-shrink-0 h-12 w-12">
                                        <div
                                            class="h-12 w-12 rounded-full bg-gradient-to-r from-purple-400 to-pink-400 flex items-center justify-center">
                                            <span class="text-white font-bold text-lg">
                                                {{ strtoupper(substr($attendance['name'], 0, 2)) }}
                                            </span>
                                        </div>
                                    </div>
                                    <div>
                                        <h3 class="text-xl font-semibold text-gray-900">{{ $attendance['name'] }}</h3>
                                        <p class="text-sm text-gray-500">Employee ID:
                                            EMP{{ str_pad($index + 1, 3, '0', STR_PAD_LEFT) }}</p>
                                    </div>
                                </div>

                                <!-- Status Badge -->
                                <div class="flex items-center space-x-2">
                                    @if ($attendance['punch_out'])
                                        <span
                                            class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-red-100 text-red-800">
                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                                                </path>
                                            </svg>
                                            Checked Out
                                        </span>
                                    @else
                                        <span
                                            class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800">
                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                            Active
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- Time Information Grid -->
                        <div class="p-6">
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                                <!-- Punch In -->
                                <div class="bg-green-50 p-4 rounded-lg border border-green-200">
                                    <div class="flex items-center space-x-3">
                                        <div class="bg-green-100 p-2 rounded-lg">
                                            <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1">
                                                </path>
                                            </svg>
                                        </div>
                                        <div>
                                            <p class="text-sm font-medium text-green-800">Punch In</p>
                                            <p class="text-lg font-bold text-green-900">{{ $attendance['punch_in'] }}</p>
                                            <p class="text-lg font-bold text-green-900">
                                            <p class="text-sm font-medium text-green-800">Remark:</p>
                                            {{ $attendance['punch_in_remarks'] ?? '-' }}
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Punch Out -->
                                <div class="bg-red-50 p-4 rounded-lg border border-red-200">
                                    <div class="flex items-center space-x-3">
                                        <div class="bg-red-100 p-2 rounded-lg">
                                            <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                                                </path>
                                            </svg>
                                        </div>
                                        <div>
                                            <p class="text-sm font-medium text-red-800">Punch Out</p>
                                            <p class="text-lg font-bold text-red-900">
                                                {{ $attendance['punch_out'] ?: 'Not punched out' }}</p>
                                            <p>
                                            <p class="text-sm font-medium text-red-800">Remark:</p>
                                            {{ $attendance['punch_out_remarks'] ?? '-' }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <!-- Total Hours -->
                                <div class="bg-blue-50 p-4 rounded-lg border border-blue-200">
                                    <div class="flex items-center space-x-3">
                                        <div class="bg-blue-100 p-2 rounded-lg">
                                            <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                        </div>
                                        <div>
                                            <p class="text-sm font-medium text-blue-800">Total Hours</p>
                                            <p class="text-lg font-bold text-blue-900">
                                                {{ $attendance['total_working_hours'] }}</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- Punch In Again -->
                                <div class="bg-yellow-50 p-4 rounded-lg border border-yellow-200">
                                    <div class="flex items-center space-x-3">
                                        <div class="bg-yellow-100 p-2 rounded-lg">
                                            <svg class="w-5 h-5 text-yellow-600" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M11 16l-4-4m0 0l4-4m-4 4h14"></path>
                                            </svg>
                                        </div>
                                        <div>
                                            <p class="text-sm font-medium text-yellow-800">Punch In Again</p>
                                            <p class="text-lg font-bold text-yellow-900">
                                                {{ $attendance['punch_in_again'] ?? 'Not punched in again' }}
                                            </p>
                                            <p class="text-sm font-medium text-yellow-800">Remark:</p>
                                            <p>{{ $attendance['punch_in_again_remarks'] ?? '-' }}</p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Punch Out Again -->
                                <div class="bg-purple-50 p-4 rounded-lg border border-purple-200">
                                    <div class="flex items-center space-x-3">
                                        <div class="bg-purple-100 p-2 rounded-lg">
                                            <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M17 16l4-4m0 0l-4-4m4 4H7"></path>
                                            </svg>
                                        </div>
                                        <div>
                                            <p class="text-sm font-medium text-purple-800">Punch Out Again</p>
                                            <p class="text-lg font-bold text-purple-900">
                                                {{ $attendance['punch_out_again'] ?? 'Not punched out again' }}
                                            </p>
                                            <p class="text-sm font-medium text-purple-800">Remark:</p>
                                            <p>{{ $attendance['punch_out_again_remarks'] ?? '-' }}</p>
                                        </div>
                                    </div>
                                </div>



                                <!-- Total Hours -->
                                <div class="bg-blue-50 p-4 rounded-lg border border-blue-200">
                                    <div class="flex items-center space-x-3">
                                        <div class="bg-blue-100 p-2 rounded-lg">
                                            <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                        </div>
                                        <div>
                                            <p class="text-sm font-medium text-blue-800">Total Overtime Hours</p>
                                            <p class="text-lg font-bold text-blue-900">
                                                {{ $attendance['overtime_working_hours'] }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Breaks Section -->
                        <div class="px-6 pb-6">
                            <div class="bg-gray-50 rounded-lg p-4 border border-gray-200">
                                <div class="flex items-center justify-between mb-4">
                                    <h4 class="text-lg font-semibold text-gray-900 flex items-center">
                                        <svg class="w-5 h-5 mr-2 text-gray-600" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4">
                                            </path>
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
                                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                                        @foreach ($attendance['breaks'] as $break)
                                            @php
                                                $breakType = strtolower($break['type'] ?? 'break');
                                                $breakConfig = [
                                                    'morning tea' => [
                                                        'bg' => 'bg-amber-50',
                                                        'border' => 'border-amber-200',
                                                        'text' => 'text-amber-800',
                                                        'icon' => 'text-amber-600',
                                                        'badge' => 'bg-amber-100',
                                                        'emoji' => '☕',
                                                    ],
                                                    'lunch' => [
                                                        'bg' => 'bg-green-50',
                                                        'border' => 'border-green-200',
                                                        'text' => 'text-green-800',
                                                        'icon' => 'text-green-600',
                                                        'badge' => 'bg-green-100',
                                                        'emoji' => '🍽️',
                                                    ],
                                                    'evening tea' => [
                                                        'bg' => 'bg-purple-50',
                                                        'border' => 'border-purple-200',
                                                        'text' => 'text-purple-800',
                                                        'icon' => 'text-purple-600',
                                                        'badge' => 'bg-purple-100',
                                                        'emoji' => '🫖',
                                                    ],
                                                    'coffee break' => [
                                                        'bg' => 'bg-orange-50',
                                                        'border' => 'border-orange-200',
                                                        'text' => 'text-orange-800',
                                                        'icon' => 'text-orange-600',
                                                        'badge' => 'bg-orange-100',
                                                        'emoji' => '☕',
                                                    ],
                                                    'prayer' => [
                                                        'bg' => 'bg-blue-50',
                                                        'border' => 'border-blue-200',
                                                        'text' => 'text-blue-800',
                                                        'icon' => 'text-blue-600',
                                                        'badge' => 'bg-blue-100',
                                                        'emoji' => '🙏',
                                                    ],
                                                    'smoking' => [
                                                        'bg' => 'bg-gray-50',
                                                        'border' => 'border-gray-200',
                                                        'text' => 'text-gray-800',
                                                        'icon' => 'text-gray-600',
                                                        'badge' => 'bg-gray-100',
                                                        'emoji' => '🚬',
                                                    ],
                                                    'personal' => [
                                                        'bg' => 'bg-pink-50',
                                                        'border' => 'border-pink-200',
                                                        'text' => 'text-pink-800',
                                                        'icon' => 'text-pink-600',
                                                        'badge' => 'bg-pink-100',
                                                        'emoji' => '👤',
                                                    ],
                                                ];
                                                $config = $breakConfig[$breakType] ?? $breakConfig['personal'];
                                            @endphp

                                            <div
                                                class="p-3 rounded-lg border {{ $config['bg'] }} {{ $config['border'] }} hover:shadow-sm transition-all duration-200">
                                                <div class="flex items-center justify-between">
                                                    <div class="flex items-center space-x-2">
                                                        <span class="text-lg">{{ $config['emoji'] }}</span>
                                                        <div>
                                                            <p
                                                                class="text-sm font-semibold {{ $config['text'] }} capitalize">
                                                                {{ $break['type'] ?? 'Break' }}</p>
                                                            <p class="text-xs {{ $config['text'] }} opacity-75">Duration
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="text-right">
                                                        <span
                                                            class="inline-flex items-center px-2 py-1 rounded-full text-xs font-bold {{ $config['badge'] }} {{ $config['text'] }}">
                                                            {{ is_numeric($break['duration']) ? gmdate('H:i:s', $break['duration']) : $break['duration'] }}
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @else
                                    <div class="text-center py-8">
                                        <div class="bg-gray-100 p-3 rounded-full mx-auto mb-3 w-fit">
                                            <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                        </div>
                                        <h4 class="text-sm font-medium text-gray-900 mb-1">No Breaks Taken</h4>
                                        <p class="text-xs text-gray-500">Employee worked continuously today</p>
                                        <span
                                            class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800 mt-2">
                                            Continuous Work
                                        </span>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="text-center py-12">
                        <div class="bg-gray-100 p-4 rounded-full mx-auto mb-4 w-fit">
                            <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2">
                                </path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-medium text-gray-900 mb-2">No Attendance Records</h3>
                        <p class="text-gray-500">No attendance records found for today.</p>
                    </div>
                @endforelse
            </div>

            <!-- Footer -->
            <div class="bg-gray-50 px-6 py-4 border-t border-gray-200">
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-6 text-sm text-gray-600">
                        <div class="flex items-center space-x-2">
                            <div class="w-3 h-3 bg-green-400 rounded-full"></div>
                            <span>Active</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <div class="w-3 h-3 bg-red-400 rounded-full"></div>
                            <span>Checked Out</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <div class="w-3 h-3 bg-blue-400 rounded-full"></div>
                            <span>Total Hours</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <div class="w-3 h-3 bg-orange-400 rounded-full"></div>
                            <span>Breaks</span>
                        </div>
                    </div>
                    <div class="text-sm text-gray-500">
                        Last updated: {{ now()->format('g:i A') }}
                    </div>
                </div>
            </div>
        </div>
    @endcan
</x-app-layout>
