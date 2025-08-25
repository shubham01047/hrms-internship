<x-app-layout>
    <x-slot name="header">
        <div class="theme-app rounded-lg shadow-sm p-4 sm:p-6 bg-gradient-to-r from-[var(--secondary-bg)] to-[var(--primary-bg)]">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                <div class="flex items-center gap-3">
                    <div class="p-2 rounded-lg shadow-md" style="background-color: var(--hover-bg);">
                        <svg class="w-6 h-6" style="color: var(--primary-text);" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <div>
                        <h1 class="font-bold text-2xl leading-tight text-primary">Leave Types</h1>
                        <p class="text-sm text-secondary">Manage organization leave type definitions</p>
                    </div>
                </div>
                <div class="flex items-center gap-2 lg:mr-24">
                    @can('create leave type')
                        <a href="{{ route('leave-types.create') }}"
                           class="inline-flex items-center px-5 py-2.5 font-semibold rounded-lg shadow-lg transition-all duration-200 hover:scale-[1.02] hover:bg-hover"
                           style="background-color: var(--hover-bg); color: var(--primary-text);">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v12M6 12h12"></path>
                            </svg>
                            Add New Leave Type
                        </a>
                    @endcan
                </div>
            </div>
        </div>
    </x-slot>

    <div class="theme-app py-8 sm:px-6 lg:px-8 bg-gray-50 min-h-screen">
        <div class="w-full max-w-6xl mx-auto space-y-6">
            @if (session('success'))
                <div class="flex items-start gap-3 rounded-lg border border-green-200 bg-green-50 px-4 py-3 text-green-800">
                    <svg class="w-5 h-5 mt-0.5 text-green-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <p class="text-sm font-medium">{{ session('success') }}</p>
                </div>
            @endif

            @if (session('error'))
                <div class="flex items-start gap-3 rounded-lg border border-red-200 bg-red-50 px-4 py-3 text-red-800">
                    <svg class="w-5 h-5 mt-0.5 text-red-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <p class="text-sm font-medium">{{ session('error') }}</p>
                </div>
            @endif

            <div class="bg-white rounded-xl shadow-xl overflow-hidden border border-primary">
                <div class="px-6 py-4 bg-secondary-gradient">
                    <div class="flex items-center gap-2">
                        <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2"></path>
                        </svg>
                        <h2 class="text-sm font-semibold text-primary">Leave Types ({{ $leaveTypes->count() }})</h2>
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gradient-to-r from-[var(--primary-bg)] to-[var(--secondary-bg)]">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-bold uppercase tracking-wider text-primary">ID</th>
                                <th class="px-6 py-3 text-left text-xs font-bold uppercase tracking-wider text-primary">Name</th>
                                <th class="px-6 py-3 text-left text-xs font-bold uppercase tracking-wider text-primary">Description</th>
                                <th class="px-6 py-3 text-left text-xs font-bold uppercase tracking-wider text-primary">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-100">
                            @forelse ($leaveTypes as $leaveType)
                                <tr class="{{ $loop->odd ? 'bg-white' : 'bg-gray-50' }} hover:bg-gray-100 transition-colors">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $loop->iteration }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $leaveType->name }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-700">{{ $leaveType->description }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm">
                                        <div class="flex flex-wrap gap-2">
                                            @can('edit leave type')
                                                <a href="{{ route('leave-types.edit', $leaveType) }}"
                                                   class="inline-flex items-center px-3 py-1.5 text-xs font-medium rounded-md text-white hover:bg-hover"
                                                   style="background-color: var(--hover-bg);">
                                                    <svg class="w-3.5 h-3.5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 20h9M16.5 3.5a2.121 2.121 0 013 3L7 19l-4 1 1-4 12.5-12.5z"/>
                                                    </svg>
                                                    Edit
                                                </a>
                                            @endcan
                                            @can('delete leave type')
                                                <button type="button" onclick="deleteLeaveType({{ $leaveType->id }}, '{{ $leaveType->name }}')"
                                                        class="inline-flex items-center px-3 py-1.5 text-xs font-medium rounded-md text-white bg-red-600 hover:bg-red-700">
                                                    <svg class="w-3.5 h-3.5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6M9 7h6m-7 0V5a2 2 0 012-2h3a2 2 0 012 2v2"/>
                                                    </svg>
                                                    Delete
                                                </button>
                                            @endcan
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="px-6 py-10">
                                        <div class="flex flex-col items-center justify-center text-center">
                                            <div class="bg-gray-100 p-3 rounded-full mb-3">
                                                <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2"></path>
                                                </svg>
                                            </div>
                                            <p class="text-sm text-gray-600">No leave types found.</p>
                                            @can('create leave type')
                                                <a href="{{ route('leave-types.create') }}"
                                                   class="mt-3 inline-flex items-center px-4 py-2 text-sm font-semibold rounded-md shadow hover:bg-hover"
                                                   style="background-color: var(--hover-bg); color: var(--primary-text);">
                                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v12M6 12h12"></path>
                                                    </svg>
                                                    Add First Leave Type
                                                </a>
                                            @endcan
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div id="deleteModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-50" style="display: none;">
        <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
            <div class="mt-3 text-center">
                <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-red-100">
                    <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6M9 7h6m-7 0V5a2 2 0 012-2h3a2 2 0 012 2v2"/>
                    </svg>
                </div>
                <h3 class="text-lg font-medium text-gray-900 mt-4">Delete Leave Type</h3>
                <div class="mt-2 px-7 py-3">
                    <p class="text-sm text-gray-500">
                        Are you sure you want to delete the leave type "<span id="leaveTypeName" class="font-semibold text-red-600"></span>"?
                    </p>
                    <p class="text-xs text-red-400 mt-2">This action cannot be undone and may affect existing leave records.</p>
                </div>
                <div class="items-center px-4 py-3">
                    <button id="confirmDelete" class="px-4 py-2 bg-red-500 text-white text-base font-medium rounded-md w-24 mr-2 hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-300">
                        <span class="delete-text">Delete</span>
                        <div class="delete-spinner" style="display: none;">
                            <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                        </div>
                    </button>
                    <button id="cancelDelete" class="px-4 py-2 bg-gray-500 text-white text-base font-medium rounded-md w-24 hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-300">Cancel</button>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        let currentLeaveTypeId = null;

        function deleteLeaveType(leaveTypeId, leaveTypeName) {
            currentLeaveTypeId = leaveTypeId;
            $('#leaveTypeName').text(leaveTypeName);
            $('#deleteModal').fadeIn(300);
            $('body').css('overflow', 'hidden');
        }

        // Delete modal handlers
        $('#confirmDelete').click(function() {
            if (currentLeaveTypeId) {
                // Show loading state
                $('.delete-text').hide();
                $('.delete-spinner').show();
                $(this).prop('disabled', true);
                $('#cancelDelete').prop('disabled', true);

                // Create and submit form
                const form = $('<form>', {
                    'method': 'POST',
                    'action': '{{ route("leave-types.destroy", ":id") }}'.replace(':id', currentLeaveTypeId)
                });
                form.append('@csrf');
                form.append('@method("DELETE")');
                $('body').append(form);
                form.submit();
            }
        });

        $('#cancelDelete').click(function() {
            $('#deleteModal').fadeOut(300);
            $('body').css('overflow', 'auto');
            currentLeaveTypeId = null;
        });

        // Close modal on background click
        $('#deleteModal').click(function(e) {
            if (e.target === this) {
                $(this).fadeOut(300);
                $('body').css('overflow', 'auto');
                currentLeaveTypeId = null;
            }
        });

        // Close modal on ESC key
        $(document).keydown(function(e) {
            if (e.keyCode === 27) {
                $('#deleteModal').fadeOut(300);
                $('body').css('overflow', 'auto');
                currentLeaveTypeId = null;
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
