<x-app-layout>
    <x-slot name="header">
         <div class="theme-app rounded-lg " style="background: linear-gradient(to right, var(--secondary-bg), var(--primary-bg)); padding: 1.5rem 1rem; sm:padding: 3rem 2rem">
            <div class="max-w-7xl mx-auto">
                <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 sm:gap-0">
                <div class="flex items-center gap-3">
                    <div class="p-2 rounded-lg shadow-md" style="background-color: var(--hover-bg);">
                        <svg class="w-6 h-6" style="color: var(--primary-text);" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div>
                        <h2 class="font-bold text-2xl leading-tight" style="color: var(--primary-text);">
                            Worklogs for Task: {{ $task->title }}
                        </h2>
                        <p class="text-sm" style="color: var(--secondary-text);">
                            All recorded timesheet entries for this task
                        </p>
                    </div>
                </div>

                <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-2 sm:gap-3 w-full sm:w-auto sm:ml-auto">
                    @can('create timesheet')
                        <a href="{{ route('tasks.timesheets.create', [$task->project_id, $task->id]) }}"
                            class="inline-flex items-center justify-center px-5 py-2.5 font-semibold rounded-lg shadow-lg ring-1 ring-white/20 transition-all duration-300 hover:scale-[1.02] focus:outline-none focus:ring-2 focus:ring-white/40"
                            style="background-color: var(--hover-bg); color: var(--primary-text);"
                            onmouseover="this.style.backgroundColor='var(--primary-bg-light)'"
                            onmouseout="this.style.backgroundColor='var(--hover-bg)'">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                            Create Timesheet
                        </a>
                    @endcan
                    <a href="{{ route('projects.show', ['project' => $task->project_id]) }}"
                        class="inline-flex items-center justify-center px-5 py-2.5 font-semibold rounded-lg shadow-md transition-all duration-300 hover:scale-[1.02] focus:outline-none focus:ring-2 focus:ring-white/40 border"
                        style="background: white; color: var(--secondary-bg); border-color: var(--primary-border);">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        Back to Tasks
                    </a>
                    <a href="{{ route('timesheets.report.form', [$projectId, $task->id]) }}"
                        class="inline-flex items-center justify-center px-5 py-2.5 font-semibold rounded-lg shadow-md transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-white/40 border"
                        style="color: var(--primary-text); border-color: rgba(255,255,255,0.35); background: rgba(255,255,255,0.08);"
                        onmouseover="this.style.background='rgba(255,255,255,0.16)'"
                        onmouseout="this.style.background='rgba(255,255,255,0.08)'">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v14m7-7H5">
                            </path>
                        </svg>
                        Download Report
                    </a>
                </div>
            </div>
        </div>
    </x-slot>

    <div class="py-8 bg-gradient-to-br from-gray-50 to-blue-50 min-h-screen">
        <style>
            @keyframes fadeIn {
                from {
                    opacity: 0;
                    transform: translateY(20px);
                }

                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            .animate-fade-in {
                animation: fadeIn 0.6s ease-out forwards;
            }

            .animate-delay-100 {
                animation-delay: .1s;
            }

            .animate-delay-200 {
                animation-delay: .2s;
            }

            .animate-delay-300 {
                animation-delay: .3s;
            }

            .table-row-hover:hover {
                background-color: #f8fafc !important;
            }
        </style>

        <div class="w-full px-4 sm:px-6 lg:px-8 space-y-8">
            @if (session('success'))
                <div class="bg-green-50 border-l-4 border-green-400 p-4 rounded-lg animate-fade-in animate-delay-100">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-green-400" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm text-green-700 font-medium">{{ session('success') }}</p>
                        </div>
                    </div>
                </div>
            @endif

            @if (session('error'))
                <div class="bg-red-50 border-l-4 border-red-400 p-4 rounded-lg animate-fade-in animate-delay-100">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-red-400" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 001.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm text-red-700 font-medium">{{ session('error') }}</p>
                        </div>
                    </div>
                </div>
            @endif

            <div
                class="bg-white rounded-xl shadow-xl overflow-hidden border border-gray-200 animate-fade-in animate-delay-200">
                <div class="theme-app px-6 py-4 border-b border-gray-200"
                    style="background: linear-gradient(to right, var(--secondary-bg), var(--primary-bg));">
                    <div class="flex items-center space-x-3">
                        <div class="p-2 rounded-lg shadow-sm" style="background-color: var(--hover-bg);">
                            <svg class="w-5 h-5" style="color: var(--primary-text);" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2v2M7 9h10">
                                </path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold" style="color: var(--primary-text);">
                                Timesheet Entries ({{ $timesheets->count() }})
                            </h3>
                            <p class="text-sm" style="color: var(--secondary-text);">All recorded worklogs for this task
                            </p>
                        </div>
                    </div>
                </div>

                @if ($timesheets->count() > 0)
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="theme-app"
                                style="background: linear-gradient(to right, var(--primary-bg), var(--secondary-bg));">
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider"
                                        style="color: var(--primary-text);">#</th>
                                    <th scope="col"
                                        class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider"
                                        style="color: var(--primary-text);">User</th>
                                    <th scope="col"
                                        class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider"
                                        style="color: var(--primary-text);">Date</th>
                                    <th scope="col"
                                        class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider"
                                        style="color: var(--primary-text);">Hours Worked</th>
                                    <th scope="col"
                                        class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider"
                                        style="color: var(--primary-text);">Description</th>
                                    <th scope="col"
                                        class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider"
                                        style="color: var(--primary-text);">Status</th>
                                    <th scope="col"
                                        class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider"
                                        style="color: var(--primary-text);">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($timesheets as $index => $timesheet)
                                    <tr
                                        class="table-row-hover transition-all duration-200 {{ $index % 2 == 0 ? 'bg-white' : 'bg-gray-50' }}">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                            <div class="theme-app w-8 h-8 rounded-full flex items-center justify-center text-sm font-semibold" style="background-color: var(--hover-bg); color: var(--primary-text);">
                                                {{ $loop->iteration }}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                            {{ $timesheet->user->name }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                            {{ \Carbon\Carbon::parse($timesheet->date)->format('M d, Y') }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                            {{ $timesheet->hours_worked }} Hours</td>
                                        <td class="px-6 py-4 text-sm text-gray-600 max-w-xs">
                                            <div class="truncate" title="{{ $timesheet->description }}">
                                                {{ $timesheet->description ?: 'No description provided' }}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <span
                                                class="px-3 py-1 rounded-full text-xs font-semibold
                                                @if ($timesheet->status === 'Approved') bg-green-100 text-green-800
                                                @elseif($timesheet->status === 'Rejected') bg-red-100 text-red-800
                                                @else bg-yellow-100 text-yellow-800 @endif">
                                                {{ ucfirst($timesheet->status) }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <div class="flex flex-wrap gap-2">
                                                @can('approve timesheet')
                                                    @if ($timesheet->status !== 'Approved')
                                                        <button type="button" onclick="approveTimesheet({{ $timesheet->id }}, '{{ $timesheet->user->name }}', '{{ \Carbon\Carbon::parse($timesheet->date)->format('M d, Y') }}')"
                                                                class="inline-flex items-center px-3 py-1 text-xs font-medium rounded-md text-white"
                                                                style="background-color: #16a34a;"
                                                                onmouseover="this.style.backgroundColor='#22c55e'"
                                                                onmouseout="this.style.backgroundColor='#16a34a'">
                                                            <svg class="w-3 h-3 mr-1" fill="none"
                                                                stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2" d="M5 13l4 4L19 7"></path>
                                                            </svg>
                                                            Approve
                                                        </button>
                                                    @endif
                                                @endcan
                                                @can('reject timesheet')
                                                    @if ($timesheet->status !== 'Rejected')
                                                        <button type="button" onclick="rejectTimesheet({{ $timesheet->id }}, '{{ $timesheet->user->name }}', '{{ \Carbon\Carbon::parse($timesheet->date)->format('M d, Y') }}')"
                                                                class="inline-flex items-center px-3 py-1 text-xs font-medium rounded-md text-white bg-red-600 hover:bg-red-700 transition-all duration-200">
                                                            <svg class="w-3 h-3 mr-1" fill="none"
                                                                stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                                            </svg>
                                                            Reject
                                                        </button>
                                                    @endif
                                                @endcan
                                                @can('edit timesheet')
                                                    <a href="{{ route('tasks.timesheets.edit', [$task->project_id, $task->id, $timesheet->id]) }}"
                                                        class="inline-flex items-center px-3 py-1 text-xs font-medium rounded-md text-white"
                                                        style="background-color: var(--hover-bg);"
                                                        onmouseover="this.style.backgroundColor='var(--primary-bg-light)'"
                                                        onmouseout="this.style.backgroundColor='var(--hover-bg)'">
                                                        <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor"
                                                            viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2v2M7 9h10">
                                                            </path>
                                                        </svg>
                                                        Edit
                                                    </a>
                                                @endcan
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="text-center py-12">
                        <div class="bg-gray-100 p-4 rounded-full mx-auto mb-4 w-fit">
                            <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-medium text-gray-900 mb-2">No Timesheet Entries</h3>
                        <p class="text-gray-500 mb-4">No timesheet entries have been recorded for this task yet.</p>
                        @can('create timesheet')
                            <a href="{{ route('tasks.timesheets.create', [$task->project_id, $task->id]) }}"
                                class="theme-app inline-flex items-center px-6 py-3 font-semibold rounded-lg shadow-lg hover:scale-105 transform transition-all duration-300 ease-in-out focus:outline-none focus:ring-4"
                                style="background-color: var(--hover-bg); color: var(--primary-text);"
                                onmouseover="this.style.backgroundColor='var(--primary-bg-light)'"
                                onmouseout="this.style.backgroundColor='var(--hover-bg)'">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                                Add First Timesheet
                            </a>
                        @endcan
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Approve Confirmation Modal -->
    <div id="approveModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-50" style="display: none;">
        <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
            <div class="mt-3 text-center">
                <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-green-100">
                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-medium text-gray-900 mt-4">Approve Timesheet</h3>
                <div class="mt-2 px-7 py-3">
                    <p class="text-sm text-gray-500">
                        Are you sure you want to approve the timesheet for "<span id="approveUserName" class="font-semibold text-green-600"></span>" on <span id="approveDate" class="font-semibold text-green-600"></span>?
                    </p>
                    <p class="text-xs text-green-400 mt-2">This will mark the timesheet as approved and may affect payroll calculations.</p>
                </div>
                <div class="items-center px-4 py-3">
                    <button id="confirmApprove" class="px-4 py-2 bg-green-500 text-white text-base font-medium rounded-md w-24 mr-2 hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-300">
                        <span class="approve-text">Approve</span>
                        <div class="approve-spinner" style="display: none;">
                            <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                        </div>
                    </button>
                    <button id="cancelApprove" class="px-4 py-2 bg-gray-500 text-white text-base font-medium rounded-md w-24 hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-300">Cancel</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Reject Confirmation Modal -->
    <div id="rejectModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-50" style="display: none;">
        <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
            <div class="mt-3 text-center">
                <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-red-100">
                    <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-medium text-gray-900 mt-4">Reject Timesheet</h3>
                <div class="mt-2 px-7 py-3">
                    <p class="text-sm text-gray-500">
                        Are you sure you want to reject the timesheet for "<span id="rejectUserName" class="font-semibold text-red-600"></span>" on <span id="rejectDate" class="font-semibold text-red-600"></span>?
                    </p>
                    <p class="text-xs text-red-400 mt-2">This will mark the timesheet as rejected and may require the user to resubmit.</p>
                </div>
                <div class="items-center px-4 py-3">
                    <button id="confirmReject" class="px-4 py-2 bg-red-500 text-white text-base font-medium rounded-md w-24 mr-2 hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-300">
                        <span class="reject-text">Reject</span>
                        <div class="reject-spinner" style="display: none;">
                            <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                        </div>
                    </button>
                    <button id="cancelReject" class="px-4 py-2 bg-gray-500 text-white text-base font-medium rounded-md w-24 hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-300">Cancel</button>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        let currentTimesheetId = null;
        let currentAction = null;

        function approveTimesheet(timesheetId, userName, date) {
            currentTimesheetId = timesheetId;
            currentAction = 'approve';
            $('#approveUserName').text(userName);
            $('#approveDate').text(date);
            $('#approveModal').fadeIn(300);
            $('body').css('overflow', 'hidden');
        }

        function rejectTimesheet(timesheetId, userName, date) {
            currentTimesheetId = timesheetId;
            currentAction = 'reject';
            $('#rejectUserName').text(userName);
            $('#rejectDate').text(date);
            $('#rejectModal').fadeIn(300);
            $('body').css('overflow', 'hidden');
        }

        // Approve modal handlers
        $('#confirmApprove').click(function() {
            if (currentTimesheetId && currentAction === 'approve') {
                // Show loading state
                $('.approve-text').hide();
                $('.approve-spinner').show();
                $(this).prop('disabled', true);
                $('#cancelApprove').prop('disabled', true);

                // Create and submit form
                const form = $('<form>', {
                    'method': 'POST',
                    'action': '{{ route("timesheets.approve", ":id") }}'.replace(':id', currentTimesheetId)
                });
                form.append('@csrf');
                form.append('@method("PUT")');
                $('body').append(form);
                form.submit();
            }
        });

        $('#cancelApprove').click(function() {
            $('#approveModal').fadeOut(300);
            $('body').css('overflow', 'auto');
            currentTimesheetId = null;
            currentAction = null;
        });

        // Reject modal handlers
        $('#confirmReject').click(function() {
            if (currentTimesheetId && currentAction === 'reject') {
                // Show loading state
                $('.reject-text').hide();
                $('.reject-spinner').show();
                $(this).prop('disabled', true);
                $('#cancelReject').prop('disabled', true);

                // Create and submit form
                const form = $('<form>', {
                    'method': 'POST',
                    'action': '{{ route("timesheets.reject", ":id") }}'.replace(':id', currentTimesheetId)
                });
                form.append('@csrf');
                form.append('@method("PUT")');
                $('body').append(form);
                form.submit();
            }
        });

        $('#cancelReject').click(function() {
            $('#rejectModal').fadeOut(300);
            $('body').css('overflow', 'auto');
            currentTimesheetId = null;
            currentAction = null;
        });

        // Close modals on background click
        $('#approveModal, #rejectModal').click(function(e) {
            if (e.target === this) {
                $(this).fadeOut(300);
                $('body').css('overflow', 'auto');
                currentTimesheetId = null;
                currentAction = null;
            }
        });

        // Close modals on ESC key
        $(document).keydown(function(e) {
            if (e.keyCode === 27) {
                $('#approveModal, #rejectModal').fadeOut(300);
                $('body').css('overflow', 'auto');
                currentTimesheetId = null;
                currentAction = null;
            }
        });
    </script>

    <style>
        .animate-spin {
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>
</x-app-layout>
