<x-app-layout>
    <style>
        @keyframes fadeIn { from { opacity: 0; transform: translateY(10px); } to { opacity: 1; transform: translateY(0); } }
        .animate-fade-in { animation: fadeIn .5s ease-out both; }

        /* Corporate surface + components (use your theme tokens) */
        .card {
            background: #ffffff;
            border: 1px solid var(--primary-border);
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(2, 6, 23, .04);
            transition: box-shadow .2s ease, transform .2s ease;
        }
        .card:hover { box-shadow: 0 8px 24px rgba(2, 6, 23, .08); transform: translateY(-1px); }

        .avatar-circle {
            width: 48px; height: 48px; border-radius: 9999px;
            background-image: linear-gradient(to bottom right, var(--secondary-bg), var(--primary-bg-light));
            color: var(--primary-text); display: inline-flex; align-items: center; justify-content: center;
            font-weight: 700;
        }

        .status-badge {
            display: inline-flex; align-items: center; gap: .375rem;
            padding: .25rem .625rem; border-radius: 9999px; font-weight: 600; font-size: .8125rem;
            border: 1px solid transparent;
        }
        .status-badge.active { background: #f0fdf4; color: #16a34a; border-color: #86efac; }
        .status-badge.checked-out { background: #fef2f2; color: #dc2626; border-color: #fecaca; }

        .info-tile { padding: 1rem; border-radius: 10px; border: 1px solid; transition: transform .15s ease; }
        .info-tile:hover { transform: translateY(-2px); }

        .break-card {
            padding: .75rem; border-radius: 10px; border: 1px solid;
            display: flex; align-items: center; justify-content: space-between;
        }
        .break-badge { padding: .25rem .6rem; border-radius: 9999px; font-weight: 700; font-size: .75rem; }

        /* Form */
        .input {
            width: 100%; background: #fff; color: #0b1f3a;
            border: 1px solid var(--primary-border); border-radius: .5rem;
            padding: .5rem .75rem; font-size: .875rem;
            outline: none;
        }
        .input:focus { box-shadow: 0 0 0 2px rgba(37, 99, 235, .25); border-color: var(--hover-bg); }

        .btn {
            display: inline-flex; align-items: center; justify-content: center;
            padding: .5rem 1rem; border-radius: .5rem; font-weight: 600; font-size: .875rem;
            transition: background-color .15s ease, color .15s ease, border-color .15s ease;
            border: 1px solid transparent;
        }
        .btn-primary { background: var(--primary-bg-light); color: var(--primary-text); border-color: var(--primary-border); }
        .btn-primary:hover { background: var(--hover-bg); }
        .btn-ghost { background: #fff; color: var(--primary-bg); border-color: var(--primary-border); }
        .btn-ghost:hover { background: var(--primary-bg-light); color: var(--primary-text); }

        /* Section headings */
        .section-title {
            color: var(--primary-bg);
            font-weight: 700;
            letter-spacing: .2px;
        }
    </style>

    @can('attendance report')
       <x-slot name="header">
    <div
        class="theme-app flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between p-4 sm:p-6 rounded-lg shadow-sm"
        style="background: linear-gradient(to right, var(--secondary-bg), var(--primary-bg));">
        
        <div class="flex items-center space-x-3">
            <div class="p-2 rounded-lg shadow-md" style="background-color: var(--hover-bg);">
                <svg class="w-6 h-6" style="color: var(--primary-text);" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2" />
                </svg>
            </div>
            <div class="min-w-0">
                <h2 class="font-bold text-xl sm:text-2xl leading-tight truncate" style="color: var(--primary-text);">
                    Attendance Report
                </h2>
                <p class="text-xs sm:text-sm" style="color: var(--secondary-text);">
                    Daily attendance tracking and break management
                </p>
            </div>
        </div>
    </div>
</x-slot>

        <div class="theme-app py-6 sm:px-4 lg:px-8 bg-white">
            <div class="w-full max-w-6xl mx-auto space-y-6">
                <div class="card p-4 sm:p-6 animate-fade-in">
                    <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                        <div class="flex items-start sm:items-center gap-3">
                            <div class="p-3 rounded-lg bg-primary-light border border-primary">
                                <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="section-title text-base sm:text-lg">Showing Attendance</h3>
                                <p class="text-secondary text-sm">
                                    <strong>{{ \Carbon\Carbon::parse($fromDate)->format('M j, Y') }}</strong>
                                    to
                                    <strong>{{ \Carbon\Carbon::parse($toDate)->format('M j, Y') }}</strong>
                                </p>
                            </div>
                        </div>

                        <div class="px-4 py-1.5 rounded-full bg-primary-light border border-primary self-start md:self-auto">
                            <span class="text-primary font-medium">{{ count($attendances) }} Records</span>
                        </div>
                    </div>

                    <form method="GET" action="{{ route('admin.attendance.report') }}"
                          class="mt-4 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-3">
                        <div>
                            <label for="from_date" class="block text-secondary text-xs mb-1">From date</label>
                            <input type="date" id="from_date" name="from_date" value="{{ $fromDate }}" class="input">
                        </div>
                        <div>
                            <label for="to_date" class="block text-secondary text-xs mb-1">To date</label>
                            <input type="date" id="to_date" name="to_date" value="{{ $toDate }}" class="input">
                        </div>
                        <div class="lg:col-span-3 flex items-end gap-2">
                            <button type="submit" class="btn btn-primary">Apply Filters</button>
                            <a href="{{ route('admin.attendance.report') }}" class="btn btn-ghost">Reset</a>
                        </div>
                    </form>
                </div>

                @forelse ($attendances as $index => $attendance)
                    <div class="card animate-fade-in">
                        <div class="p-4 sm:p-6 border-b border-primary">
                            <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                                <div class="flex items-center gap-4">
                                    <div class="avatar-circle">
                                        <span>{{ strtoupper(substr($attendance['name'], 0, 2)) }}</span>
                                    </div>
                                    <div class="min-w-0">
                                        <h3 class="text-[var(--primary-bg)] text-lg sm:text-xl font-semibold break-words">
                                            {{ $attendance['name'] }}
                                        </h3>
                                        <p class="text-secondary text-sm">Employee ID: EMP{{ str_pad($index + 1, 3, '0', STR_PAD_LEFT) }}</p>
                                    </div>
                                </div>
                                <div class="flex items-center gap-2">
                                    @if ($attendance['punch_out'])
                                        <span class="status-badge checked-out">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                      d="M17 16l4-4m0 0l-4-4m4 4H7"/>
                                            </svg>
                                            Checked Out
                                        </span>
                                    @else
                                        <span class="status-badge active">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                      d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                            </svg>
                                            Active
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="p-4 sm:p-6 grid grid-cols-1 md:grid-cols-3 gap-4 sm:gap-6">
                            <div class="info-tile" style="background:#e6ffe6;border-color:#a3e6a3">
                                <div class="flex items-center gap-3 mb-2">
                                    <div class="p-2 rounded-lg" style="background:#28a7451a">
                                        <svg class="w-5 h-5" style="color:#28a745" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/>
                                        </svg>
                                    </div>
                                    <p class="font-medium text-sm" style="color:#1a7a1a">Punch In</p>
                                </div>
                                <p class="text-2xl font-bold" style="color:#1a7a1a">{{ \Carbon\Carbon::parse($attendance['punch_in'])->format('h:i A') }}</p>
                                <p class="text-xs mt-1" style="color:#1a7a1acc">Remark: {{ $attendance['punch_in_remarks'] ?? '-' }}</p>
                            </div>

                            <div class="info-tile" style="background:#ffe6e6;border-color:#e6a3a3">
                                <div class="flex items-center gap-3 mb-2">
                                    <div class="p-2 rounded-lg" style="background:#dc35451a">
                                        <svg class="w-5 h-5" style="color:#dc3545" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                                        </svg>
                                    </div>
                                    <p class="font-medium text-sm" style="color:#a71a1a">Punch Out</p>
                                </div>
                                <p class="text-2xl font-bold" style="color:#a71a1a">
                                    {{ $attendance['punch_out'] ? \Carbon\Carbon::parse($attendance['punch_out'])->format('h:i A') : 'Not punched out' }}
                                </p>
                                <p class="text-xs mt-1" style="color:#a71a1acc">Remark: {{ $attendance['punch_out_remarks'] ?? '-' }}</p>
                            </div>

                            <div class="info-tile" style="background:#e6f2ff;border-color:#a3cce6">
                                <div class="flex items-center gap-3 mb-2">
                                    <div class="p-2 rounded-lg" style="background:#007bff1a">
                                        <svg class="w-5 h-5" style="color:#007bff" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                    </div>
                                    <p class="font-medium text-sm" style="color:#1a4a7a">Total Hours</p>
                                </div>
                                <p class="text-2xl font-bold" style="color:#1a4a7a">{{ $attendance['total_working_hours'] }}</p>
                                <p class="text-xs mt-1" style="color:#1a4a7acc">Daily total work duration</p>
                            </div>

                            <div class="info-tile" style="background:#fffbe6;border-color:#e6d9a3">
                                <div class="flex items-center gap-3 mb-2">
                                    <div class="p-2 rounded-lg" style="background:#ffc1071a">
                                        <svg class="w-5 h-5" style="color:#ffc107" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M11 16l-4-4m0 0l4-4m-4 4h14"/>
                                        </svg>
                                    </div>
                                    <p class="font-medium text-sm" style="color:#7a6a1a">Punch In Again</p>
                                </div>
                                <p class="text-2xl font-bold" style="color:#7a6a1a">
                                    {{ $attendance['punch_in_again'] ? \Carbon\Carbon::parse($attendance['punch_in_again'])->format('h:i A') : 'Not punched in again' }}
                                </p>
                                <p class="text-xs mt-1" style="color:#7a6a1acc">Remark: {{ $attendance['punch_in_again_remarks'] ?? '-' }}</p>
                            </div>

                            <div class="info-tile" style="background:#f2e6ff;border-color:#cca3e6">
                                <div class="flex items-center gap-3 mb-2">
                                    <div class="p-2 rounded-lg" style="background:#6f42c11a">
                                        <svg class="w-5 h-5" style="color:#6f42c1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M17 16l4-4m0 0l-4-4m4 4H7"/>
                                        </svg>
                                    </div>
                                    <p class="font-medium text-sm" style="color:#4a1a7a">Punch Out Again</p>
                                </div>
                                <p class="text-2xl font-bold" style="color:#4a1a7a">
                                    {{ $attendance['punch_out_again'] ? \Carbon\Carbon::parse($attendance['punch_out_again'])->format('h:i A') : 'Not punched out again' }}
                                </p>
                                <p class="text-xs mt-1" style="color:#4a1a7acc">Remark: {{ $attendance['punch_out_again_remarks'] ?? '-' }}</p>
                            </div>

                            <div class="info-tile" style="background:#e6f2ff;border-color:#a3cce6">
                                <div class="flex items-center gap-3 mb-2">
                                    <div class="p-2 rounded-lg" style="background:#007bff1a">
                                        <svg class="w-5 h-5" style="color:#007bff" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                    </div>
                                    <p class="font-medium text-sm" style="color:#1a4a7a">Total Overtime Hours</p>
                                </div>
                                <p class="text-2xl font-bold" style="color:#1a4a7a">{{ $attendance['overtime_working_hours'] }}</p>
                                <p class="text-xs mt-1" style="color:#1a4a7acc">Additional hours worked</p>
                            </div>
                        </div>

                        <div class="px-4 sm:px-6 pb-5">
                            <div class="card p-4">
                                <div class="flex items-center justify-between mb-4">
                                    <h4 class="section-title text-base sm:text-lg flex items-center gap-2">
                                        <svg class="w-5 h-5 text-[var(--primary-bg)]/70" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/>
                                        </svg>
                                        Break Details
                                    </h4>
                                    @if (!empty($attendance['breaks']) && count($attendance['breaks']) > 0)
                                        <span class="px-3 py-1 rounded-full text-sm font-medium bg-primary-light border border-primary text-primary">
                                            {{ count($attendance['breaks']) }} Break{{ count($attendance['breaks']) > 1 ? 's' : '' }}
                                        </span>
                                    @endif
                                </div>

                                @if (!empty($attendance['breaks']) && count($attendance['breaks']) > 0)
                                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-4">
                                        @foreach ($attendance['breaks'] as $break)
                                            @php
                                                $breakType = strtolower($break['type'] ?? 'custom');
                                                $config = [
                                                    'morning tea' => ['bg' => '#fffbe6', 'border' => '#e6d9a3', 'text' => '#7a6a1a', 'emoji' => '☕ Morning Tea'],
                                                    'lunch' => ['bg' => '#e6ffe6', 'border' => '#a3e6a3', 'text' => '#1a7a1a', 'emoji' => '🍽️ Lunch'],
                                                    'evening tea' => ['bg' => '#f2e6ff', 'border' => '#cca3e6', 'text' => '#4a1a7a', 'emoji' => '🫖 Evening Tea'],
                                                    'custom' => ['bg' => '#e6f2ff', 'border' => '#a3cce6', 'text' => '#1a4a7a', 'emoji' => '💼 Custom'],
                                                ];
                                                $current = $config[$breakType] ?? $config['custom'];
                                            @endphp

                                            <div class="break-card" style="background: {{ $current['bg'] }}; border-color: {{ $current['border'] }};">
                                                <div class="flex items-center gap-2">
                                                    <span class="text-lg">{{ $current['emoji'] }}</span>
                                                </div>
                                                <div class="text-right">
                                                    <span class="break-badge" style="color: {{ $current['text'] }};">
                                                        {{ is_numeric($break['duration']) ? gmdate('H:i:s', $break['duration']) : $break['duration'] }}
                                                    </span>
                                                    <p class="text-xs" style="color: {{ $current['text'] }}; opacity:.75">Duration</p>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @else
                                    <div class="text-center py-8">
                                        <div class="p-3 rounded-full mx-auto mb-3 w-fit bg-primary-light border border-primary">
                                            <svg class="w-6 h-6 text-[var(--primary-bg)]/60" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                      d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                            </svg>
                                        </div>
                                        <h4 class="text-sm font-medium text-[var(--primary-bg)] mb-1">No Breaks Taken</h4>
                                        <p class="text-xs text-secondary">Employee worked continuously today</p>
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-[#f0fdf4] text-[#16a34a] border border-[#86efac] mt-2">
                                            Continuous Work
                                        </span>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="text-center py-12 card animate-fade-in">
                        <div class="p-4 rounded-full mx-auto mb-4 w-fit bg-primary-light border border-primary">
                            <svg class="w-8 h-8 text-[var(--primary-bg)]/60" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2"/>
                            </svg>
                        </div>
                        <h3 class="text-lg font-medium text-[var(--primary-bg)] mb-2">No Attendance Records</h3>
                        <p class="text-secondary">No attendance records found for the selected range.</p>
                    </div>
                @endforelse
            </div>
        </div>
    @endcan
</x-app-layout>