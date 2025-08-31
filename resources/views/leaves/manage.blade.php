<x-app-layout>
    @can('approve leave')
        <!-- Font Awesome CDN -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        
        <!-- jQuery CDN -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <!-- Professional Header -->
        <div class="theme-app px-4 sm:px-6 py-6 sm:py-8"
            style="background: linear-gradient(to right, var(--primary-bg), var(--secondary-bg));">
            <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between space-y-4 sm:space-y-0" style="color: var(--primary-text);">
                <div class="flex items-center space-x-3 sm:space-x-4">
                    <div class="p-2 sm:p-3 rounded-lg shadow-md" style="background-color: var(--hover-bg);">
                        <i class="fas fa-tasks text-xl sm:text-2xl"></i>
                    </div>
                    <div>
                        <h1 class="text-2xl sm:text-3xl font-bold">Pending Leave Requests</h1>
                        <p class="mt-1 text-sm sm:text-base" style="color: var(--secondary-text);">Review and manage employee leave applications</p>
                    </div>
                </div>
                <div class="flex sm:hidden md:flex items-center space-x-4 w-full sm:w-auto justify-end">
                    <div class="text-right">
                        <div class="text-2xl sm:text-3xl font-bold">{{ $leaves->count() }}</div>
                        <div class="text-xs sm:text-sm" style="color: var(--secondary-text);">Pending Requests</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Success/Error Messages -->
        @if (session('success'))
            <div class="mx-6 mt-6 bg-green-50 border-l-4 border-green-400 p-4 rounded-r-lg shadow-sm">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <i class="fas fa-check-circle text-green-400"></i>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm font-medium text-green-800">{{ session('success') }}</p>
                    </div>
                </div>
            </div>
        @endif

        @if (session('error'))
            <div class="mx-6 mt-6 bg-red-50 border-l-4 border-red-400 p-4 rounded-r-lg shadow-sm">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <i class="fas fa-times-circle text-red-400"></i>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm font-medium text-red-800">{{ session('error') }}</p>
                    </div>
                </div>
            </div>
        @endif

        <!-- Main Content -->
        <div class="min-h-screen bg-gradient-to-br from-gray-50 to-blue-50 p-4 sm:p-6">
            <div class="max-w-7xl mx-auto">
                <!-- Statistics Cards -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6 mb-6 sm:mb-8">
                    <div
                        class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 hover:shadow-md transition-shadow duration-200">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-600 uppercase tracking-wide">Pending Review</p>
                                <p class="text-3xl font-bold text-gray-900 mt-2">{{ $leaves->count() }}</p>
                            </div>
                            <div class="p-3 bg-yellow-100 rounded-lg">
                                <i class="fas fa-clock text-yellow-600 text-xl"></i>
                            </div>
                        </div>
                    </div>

                    <div
                        class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 hover:shadow-md transition-shadow duration-200">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-600 uppercase tracking-wide">Urgent Reviews</p>
                                <p class="text-3xl font-bold text-gray-900 mt-2">
                                    {{ $leaves->where('created_at', '>=', now()->subDays(3))->count() }}</p>
                            </div>
                            <div class="p-3 bg-red-100 rounded-lg">
                                <i class="fas fa-exclamation-triangle text-red-600 text-xl"></i>
                            </div>
                        </div>
                    </div>

                    <div
                        class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 hover:shadow-md transition-shadow duration-200">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-600 uppercase tracking-wide">This Week</p>
                                <p class="text-3xl font-bold text-gray-900 mt-2">
                                    {{ $leaves->where('created_at', '>=', now()->startOfWeek())->count() }}</p>
                            </div>
                            <div class="p-3 bg-blue-100 rounded-lg">
                                <i class="fas fa-calendar-week text-blue-600 text-xl"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Main Content Card -->
                <div class="bg-white rounded-xl shadow-xl border border-gray-200 overflow-hidden">
                    <!-- Header Section -->
                    <div class="theme-app px-4 sm:px-6 py-4 sm:py-6 border-b border-gray-200"
                        style="background: linear-gradient(to right, var(--secondary-bg), var(--primary-bg));">
                        <div class="flex items-center justify-between">
                            <div>
                                <h2 class="text-lg sm:text-xl font-bold" style="color: var(--primary-text);">Leave Requests Awaiting Approval</h2>
                                <p class="text-xs sm:text-sm mt-1" style="color: var(--secondary-text);">{{ $leaves->count() }} pending reviews</p>
                            </div>
                            <div class="p-2 rounded-lg shadow-sm" style="background-color: var(--hover-bg);">
                                <i class="fas fa-check-circle text-white text-sm sm:text-base"></i>
                            </div>
                        </div>
                    </div>

                    <!-- Table -->
                    @if (!$leaves->isEmpty())
                        <div class="overflow-x-auto">
                            <!-- Table Header -->
                            <div class="theme-app"
                                style="background: linear-gradient(to right, var(--primary-bg), var(--secondary-bg)); color: var(--primary-text);">
                                <div class="grid grid-cols-3 sm:grid-cols-4 lg:grid-cols-6 gap-2 sm:gap-4 px-4 sm:px-6 py-3 sm:py-4 text-xs font-semibold uppercase tracking-wider">
                                    <div class="flex items-center space-x-1 sm:space-x-2">
                                        <i class="fas fa-user text-xs sm:text-sm"></i>
                                        <span class="hidden sm:inline">Employee</span>
                                        <span class="sm:hidden">Emp</span>
                                    </div>
                                    <div class="flex items-center space-x-1 sm:space-x-2">
                                        <i class="fas fa-tag text-xs sm:text-sm"></i>
                                        <span class="hidden sm:inline">Leave Type</span>
                                        <span class="sm:hidden">Type</span>
                                    </div>
                                    <div class="hidden lg:flex items-center space-x-2">
                                        <i class="fas fa-file-medical text-xs sm:text-sm"></i>
                                        <span>Medical Certificate</span>
                                    </div>
                                    <div class="hidden sm:flex items-center space-x-2">
                                        <i class="fas fa-calendar-day text-xs sm:text-sm"></i>
                                        <span class="hidden lg:inline">Start Date</span>
                                        <span class="lg:hidden">Start</span>
                                    </div>
                                    <div class="hidden sm:flex items-center space-x-2">
                                        <i class="fas fa-calendar-day text-xs sm:text-sm"></i>
                                        <span class="hidden lg:inline">End Date</span>
                                        <span class="lg:hidden">End</span>
                                    </div>
                                    <div class="flex items-center space-x-1 sm:space-x-2">
                                        <i class="fas fa-cogs text-xs sm:text-sm"></i>
                                        <span class="hidden sm:inline">Actions</span>
                                        <span class="sm:hidden">Act</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Table Body -->
                            <div class="bg-white divide-y divide-gray-200">
                                @foreach ($leaves as $index => $leave)
                                    <div class="grid grid-cols-3 sm:grid-cols-4 lg:grid-cols-6 gap-2 sm:gap-4 px-4 sm:px-6 py-3 sm:py-4 hover:bg-gray-50 transition-colors duration-150 {{ $index % 2 == 0 ? 'bg-white' : 'bg-gray-25' }}" id="leave-row-{{ $leave->id }}">
                                        <!-- Employee -->
                                        <div class="flex items-center space-x-2 sm:space-x-3">
                                            <div class="flex-shrink-0 h-8 w-8 sm:h-10 sm:w-10">
                                                <div class="h-8 w-8 sm:h-10 sm:w-10 rounded-full bg-blue-600 flex items-center justify-center text-white font-semibold text-xs sm:text-sm">
                                                    {{ substr($leave->user->name, 0, 1) }}
                                                </div>
                                            </div>
                                            <div class="min-w-0 flex-1">
                                                <div class="text-xs sm:text-sm font-semibold text-gray-900 truncate">
                                                    {{ $leave->user->name }}</div>
                                                <div class="text-xs text-gray-500 hidden sm:block">ID: #{{ $leave->user->id }}</div>
                                            </div>
                                        </div>

                                        <!-- Leave Type -->
                                        <div class="flex items-center space-x-2 sm:space-x-3">
                                            <div class="flex-shrink-0 h-8 w-8 sm:h-10 sm:w-10">
                                                <div class="h-8 w-8 sm:h-10 sm:w-10 rounded-lg bg-purple-100 flex items-center justify-center">
                                                    <i class="fas fa-tag text-purple-600 text-xs sm:text-base"></i>
                                                </div>
                                            </div>
                                            <div class="min-w-0 flex-1">
                                                <div class="text-xs sm:text-sm font-semibold text-gray-900 truncate">
                                                    {{ $leave->leaveType->name }}</div>
                                                <div class="text-xs text-gray-500 hidden sm:block">Leave Request</div>
                                            </div>
                                        </div>

                                        <!-- Medical Certificate - Hidden on mobile -->
                                        <div class="hidden lg:flex items-center space-x-3">
                                            <div class="min-w-0 flex-1">
                                                <div class="text-sm font-semibold text-gray-900 truncate">
                                                    @if ($leave->proof_sick)
                                                    <a href="{{ route('files.leave.view', [
                                                        'filename' => str_replace('sick_proofs/', '', $leave->proof_sick),
                                                    ]) }}"
                                                        target="_blank" class="btn btn-sm btn-primary text-xs">
                                                        View Certificate
                                                    </a>
                                                @else
                                                    <span class="text-gray-400">No File</span>
                                                @endif
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Start Date - Hidden on mobile -->
                                        <div class="hidden sm:flex items-center">
                                            <div>
                                                <div class="text-xs sm:text-sm font-medium text-gray-900">
                                                    {{ \Carbon\Carbon::parse($leave->start_date)->format('d M, Y') }}
                                                </div>
                                                <div class="text-xs text-gray-500 hidden lg:block">
                                                    {{ \Carbon\Carbon::parse($leave->start_date)->format('l') }}</div>
                                            </div>
                                        </div>

                                        <!-- End Date - Hidden on mobile -->
                                        <div class="hidden sm:flex items-center">
                                            <div>
                                                <div class="text-xs sm:text-sm font-medium text-gray-900">
                                                    {{ \Carbon\Carbon::parse($leave->end_date)->format('d M, Y') }}
                                                </div>
                                                <div class="text-xs text-gray-500 hidden lg:block">
                                                    {{ \Carbon\Carbon::parse($leave->end_date)->format('l') }}</div>
                                            </div>
                                        </div>

                                        <!-- Actions -->
                                        <div class="flex flex-col sm:flex-row items-stretch sm:items-center space-y-1 sm:space-y-0 sm:space-x-2">
                                            <button type="button" onclick="approveLeave({{ $leave->id }}, '{{ $leave->user->name }}', '{{ $leave->leaveType->name }}')"
                                                class="w-full sm:w-auto inline-flex items-center justify-center px-2 sm:px-3 py-1 sm:py-2 bg-green-600 hover:bg-green-700 text-white text-xs sm:text-sm font-medium rounded-lg focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition-all duration-300 hover:scale-105 transform">
                                                <i class="fas fa-check mr-1"></i>
                                                <span class="hidden sm:inline">Approve</span>
                                                <span class="sm:hidden">✓</span>
                                            </button>
                                            <button type="button" onclick="rejectLeave({{ $leave->id }}, '{{ $leave->user->name }}', '{{ $leave->leaveType->name }}')"
                                                class="w-full sm:w-auto inline-flex items-center justify-center px-2 sm:px-3 py-1 sm:py-2 bg-red-600 hover:bg-red-700 text-white text-xs sm:text-sm font-medium rounded-lg focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition-all duration-300 hover:scale-105 transform">
                                                <i class="fas fa-times mr-1"></i>
                                                <span class="hidden sm:inline">Reject</span>
                                                <span class="sm:hidden">✗</span>
                                            </button>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @else
                        <!-- Empty State -->
                        <div class="text-center py-16">
                            <div class="bg-gray-100 p-4 rounded-full mx-auto mb-4 w-fit">
                                <i class="fas fa-check-circle text-4xl text-gray-400"></i>
                            </div>
                            <h3 class="text-xl font-semibold text-gray-900 mb-2">No Pending Requests</h3>
                            <p class="text-gray-500 max-w-sm mx-auto">All leave requests have been processed. New requests
                                will appear here for your review.</p>
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
                        <i class="fas fa-check text-green-600 text-xl"></i>
                    </div>
                    <h3 class="text-lg leading-6 font-medium text-gray-900 mt-4">Approve Leave Request</h3>
                    <div class="mt-2 px-7 py-3">
                        <p class="text-sm text-gray-500">
                            Are you sure you want to approve the <strong id="approveLeaveType"></strong> leave request for <strong id="approveEmployeeName"></strong>?
                        </p>
                        <p class="text-xs text-gray-400 mt-2">
                            This action will notify the employee and update their leave balance.
                        </p>
                    </div>
                    <div class="items-center px-4 py-3">
                        <button id="confirmApprove" class="px-4 py-2 bg-green-500 text-white text-base font-medium rounded-md w-24 mr-2 hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-300">
                            <span class="approve-text">Approve</span>
                            <div class="approve-spinner" style="display: none;">
                                <div class="spinner"></div>
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
                        <i class="fas fa-times text-red-600 text-xl"></i>
                    </div>
                    <h3 class="text-lg leading-6 font-medium text-gray-900 mt-4">Reject Leave Request</h3>
                    <div class="mt-2 px-7 py-3">
                        <p class="text-sm text-gray-500">
                            Are you sure you want to reject the <strong id="rejectLeaveType"></strong> leave request for <strong id="rejectEmployeeName"></strong>?
                        </p>
                        <p class="text-xs text-red-500 mt-2">
                            This action will notify the employee that their request has been denied.
                        </p>
                    </div>
                    <div class="items-center px-4 py-3">
                        <button id="confirmReject" class="px-4 py-2 bg-red-500 text-white text-base font-medium rounded-md w-24 mr-2 hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-300">
                            <span class="reject-text">Reject</span>
                            <div class="reject-spinner" style="display: none;">
                                <div class="spinner"></div>
                            </div>
                        </button>
                        <button id="cancelReject" class="px-4 py-2 bg-gray-500 text-white text-base font-medium rounded-md w-24 hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-300">Cancel</button>
                    </div>
                </div>
            </div>
        </div>

        <style>
            .spinner {
                border: 2px solid #f3f3f3;
                border-top: 2px solid #ffffff;
                border-radius: 50%;
                width: 16px;
                height: 16px;
                animation: spin 1s linear infinite;
                margin: 0 auto;
            }

            @keyframes spin {
                0% { transform: rotate(0deg); }
                100% { transform: rotate(360deg); }
            }

            body.modal-open {
                overflow: hidden;
            }
        </style>

        <script type="text/javascript">
            let currentLeaveId = null;

            function approveLeave(leaveId, employeeName, leaveType) {
                currentLeaveId = leaveId;
                $('#approveEmployeeName').text(employeeName);
                $('#approveLeaveType').text(leaveType);
                $('#approveModal').fadeIn(300);
                $('body').addClass('modal-open');
            }

            function rejectLeave(leaveId, employeeName, leaveType) {
                currentLeaveId = leaveId;
                $('#rejectEmployeeName').text(employeeName);
                $('#rejectLeaveType').text(leaveType);
                $('#rejectModal').fadeIn(300);
                $('body').addClass('modal-open');
            }

            // Approve confirmation
            $('#confirmApprove').click(function() {
                if (currentLeaveId) {
                    // Show loading state
                    $('.approve-text').hide();
                    $('.approve-spinner').show();
                    $(this).prop('disabled', true);

                    // Create and submit form
                    const form = $('<form>', {
                        'method': 'POST',
                        'action': '{{ route("leaves.approve", ":id") }}'.replace(':id', currentLeaveId)
                    });
                    
                    form.append($('<input>', {
                        'type': 'hidden',
                        'name': '_token',
                        'value': '{{ csrf_token() }}'
                    }));

                    $('body').append(form);
                    form.submit();
                }
            });

            // Reject confirmation
            $('#confirmReject').click(function() {
                if (currentLeaveId) {
                    // Show loading state
                    $('.reject-text').hide();
                    $('.reject-spinner').show();
                    $(this).prop('disabled', true);

                    // Create and submit form
                    const form = $('<form>', {
                        'method': 'POST',
                        'action': '{{ route("leaves.reject", ":id") }}'.replace(':id', currentLeaveId)
                    });
                    
                    form.append($('<input>', {
                        'type': 'hidden',
                        'name': '_token',
                        'value': '{{ csrf_token() }}'
                    }));

                    $('body').append(form);
                    form.submit();
                }
            });

            // Cancel approve
            $('#cancelApprove').click(function() {
                $('#approveModal').fadeOut(300);
                $('body').removeClass('modal-open');
                currentLeaveId = null;
                // Reset loading state
                $('.approve-text').show();
                $('.approve-spinner').hide();
                $('#confirmApprove').prop('disabled', false);
            });

            // Cancel reject
            $('#cancelReject').click(function() {
                $('#rejectModal').fadeOut(300);
                $('body').removeClass('modal-open');
                currentLeaveId = null;
                // Reset loading state
                $('.reject-text').show();
                $('.reject-spinner').hide();
                $('#confirmReject').prop('disabled', false);
            });

            // Close modal when clicking outside
            $(document).click(function(event) {
                if ($(event.target).is('#approveModal')) {
                    $('#cancelApprove').click();
                }
                if ($(event.target).is('#rejectModal')) {
                    $('#cancelReject').click();
                }
            });

            // Close modal on ESC key
            $(document).keydown(function(event) {
                if (event.keyCode === 27) { // ESC key
                    if ($('#approveModal').is(':visible')) {
                        $('#cancelApprove').click();
                    }
                    if ($('#rejectModal').is(':visible')) {
                        $('#cancelReject').click();
                    }
                }
            });
        </script>
    @endcan
</x-app-layout>
