<x-app-layout>
    <x-slot name="header">
        <div
            class="theme-app flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between p-4 sm:p-6 rounded-lg shadow-sm"
            style="background: linear-gradient(to right, var(--secondary-bg), var(--primary-bg));"
        >
            <div class="flex items-center space-x-3">
                <div class="p-2 rounded-lg shadow-md" style="background-color: var(--hover-bg);">
                    <svg class="w-6 h-6" style="color: var(--primary-text);" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                </div>
                <div class="min-w-0">
                    <h2 class="font-bold text-xl sm:text-2xl leading-tight truncate" style="color: var(--primary-text);">
                        Holiday Management
                    </h2>
                    <p class="text-xs sm:text-sm" style="color: var(--secondary-text);">
                        Manage company holidays and special events
                    </p>
                </div>
            </div>

            @can('create holiday')
                <a href="{{ route('holidays.create') }}"
                   class="inline-flex items-center justify-center w-full sm:w-auto px-5 sm:px-6 py-2.5 sm:py-3 font-semibold rounded-lg shadow-lg hover:scale-105 transform transition-all duration-300 ease-in-out focus:outline-none focus:ring-4 lg:mr-24"
                   style="background-color: var(--hover-bg); color: var(--primary-text);"
                   onmouseover="this.style.backgroundColor='var(--primary-bg-light)'"
                   onmouseout="this.style.backgroundColor='var(--hover-bg)'"
                   aria-label="Add Holiday">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                    </svg>
                    Add Holiday
                </a>
            @endcan
        </div>
    </x-slot>

    @if (session('success'))
        <div class="mx-3 sm:mx-6 lg:mx-8 mt-4 sm:mt-6 bg-green-50 border-l-4 border-green-400 p-4 rounded-lg">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-green-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                </div>
                <div class="ml-3">
                    <p class="text-sm text-green-700 font-medium">{{ session('success') }}</p>
                </div>
            </div>
        </div>
    @endif

    @if (session('error'))
        <div class="mx-3 sm:mx-6 lg:mx-8 mt-4 sm:mt-6 bg-red-50 border-l-4 border-red-400 p-4 rounded-lg">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-red-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                    </svg>
                </div>
                <div class="ml-3">
                    <p class="text-sm text-red-700 font-medium">{{ session('error') }}</p>
                </div>
            </div>
        </div>
    @endif

    <div class="py-6 sm:py-8 bg-gradient-to-br from-gray-50 to-blue-50 min-h-screen">
        <div class="w-full px-3 sm:px-6 lg:px-8">
            <div class="bg-white rounded-xl shadow-xl overflow-hidden border border-gray-200">
                <div class="theme-app p-4 sm:p-6 border-b border-gray-200"
                     style="background: linear-gradient(to right, var(--secondary-bg), var(--primary-bg));">
                    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-3">
                        <div class="flex items-center space-x-3">
                            <div class="p-2.5 sm:p-3 rounded-lg shadow-sm" style="background-color: var(--hover-bg);">
                                <svg class="w-5 h-5 sm:w-6 sm:h-6" style="color: var(--primary-text);" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                            </div>
                            <div>
                                <h2 class="text-lg sm:text-xl font-bold" style="color: var(--primary-text);">All Holidays</h2>
                                <p class="text-xs sm:text-sm" style="color: var(--secondary-text);">{{ count($holidays) }} holidays registered</p>
                            </div>
                        </div>
                        <div class="px-3 sm:px-4 py-1.5 sm:py-2 rounded-full shadow-sm w-fit"
                             style="background-color: var(--hover-bg);">
                            <span class="text-xs sm:text-sm font-medium" style="color: var(--primary-text);">
                                {{ count($holidays) }} Records
                            </span>
                        </div>
                    </div>
                </div>

                @if (count($holidays) > 0)
                    <div class="overflow-x-auto">
                        <!-- Reduced minimum width and made table more mobile friendly -->
                        <div class="theme-app min-w-[320px] sm:min-w-[640px] lg:min-w-[880px]" style="background: linear-gradient(to right, var(--primary-bg), var(--secondary-bg));">
                            <!-- Made grid responsive - fewer columns on mobile -->
                            <div class="grid grid-cols-8 sm:grid-cols-10 lg:grid-cols-12 gap-2 sm:gap-4 px-3 sm:px-6 py-3 sm:py-4 text-[10px] sm:text-xs font-semibold uppercase tracking-wider">
                               
                                <div class="col-span-1 flex items-center space-x-1 sm:space-x-2" style="color: var(--primary-text);">
                                    <i class="fas fa-hashtag text-xs sm:text-sm lg:text-base"></i>
                                    <span class="hidden sm:inline">No.</span>
                                </div>
                                <div class="col-span-3 sm:col-span-3 lg:col-span-3 flex items-center space-x-1 sm:space-x-2" style="color: var(--primary-text);">
                                    <svg class="w-3 h-3 sm:w-4 sm:h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                    <span>Holiday</span>
                                </div>
                                <div class="col-span-2 flex items-center space-x-1 sm:space-x-2" style="color: var(--primary-text);">
                                    <svg class="w-3 h-3 sm:w-4 sm:h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                    <span>Date</span>
                                </div>
                                <!-- Hide Type column on mobile, show on sm and up -->
                                <div class="hidden sm:col-span-2 sm:flex items-center space-x-2" style="color: var(--primary-text);">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                                    </svg>
                                    <span>Type</span>
                                </div>
                                <!-- Hide Description column on mobile and sm, show on lg and up -->
                                <div class="hidden lg:col-span-2 lg:block" style="color: var(--primary-text);">Description</div>
                                <div class="col-span-2" style="color: var(--primary-text);">Actions</div>
                            </div>
                        </div>

                        <div class="bg-white">
                            @foreach ($holidays as $index => $holiday)
                                <!-- Made grid responsive to match header -->
                                <div class="grid grid-cols-8 sm:grid-cols-10 lg:grid-cols-12 gap-2 sm:gap-4 px-3 sm:px-6 py-3 sm:py-4 border-b border-gray-100 hover:bg-gray-50 transition-colors">
                                    {{-- Added numbering column to match the header --}}
                                    <div class="col-span-1 flex items-center">
                                        <!-- Made number circle smaller on mobile -->
                                        <div class="theme-app w-6 h-6 sm:w-8 sm:h-8 rounded-full flex items-center justify-center text-xs sm:text-sm font-semibold" style="background-color: var(--hover-bg); color: var(--primary-text);">
                                            {{ $index + 1 }}
                                        </div>
                                    </div>

                                    <div class="col-span-3 flex items-center space-x-2 sm:space-x-3">
                                        <!-- Made icon smaller on mobile -->
                                        <div class="theme-app p-1.5 sm:p-2 rounded-lg shadow-sm" style="background-color: var(--hover-bg);">
                                            <svg class="w-4 h-4 sm:w-5 sm:h-5" style="color: var(--primary-text);" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                            </svg>
                                        </div>
                                        <div class="min-w-0">
                                            <!-- Made text smaller and truncated on mobile -->
                                            <div class="font-semibold text-sm sm:text-base text-gray-900 truncate">{{ $holiday->title }}</div>
                                            <div class="text-xs text-gray-500 hidden sm:block">Holiday Event</div>
                                        </div>
                                    </div>

                                    <div class="col-span-2 flex items-center space-x-2 sm:space-x-3">
                                        <!-- Made date icon smaller on mobile -->
                                        <div class="p-1.5 sm:p-2 bg-blue-100 rounded-lg">
                                            <svg class="w-4 h-4 sm:w-5 sm:h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                            </svg>
                                        </div>
                                        <div class="min-w-0">
                                            <!-- Responsive date format - shorter on mobile -->
                                            <div class="font-medium text-gray-900 text-xs sm:text-sm">
                                                <span class="sm:hidden">{{ \Carbon\Carbon::parse($holiday->date)->format('M d') }}</span>
                                                <span class="hidden sm:inline">{{ \Carbon\Carbon::parse($holiday->date)->format('M d, Y') }}</span>
                                            </div>
                                            <div class="text-xs text-blue-600 hidden sm:block">{{ \Carbon\Carbon::parse($holiday->date)->format('l') }}</div>
                                        </div>
                                    </div>

                                    <!-- Hide Type column on mobile, show on sm and up -->
                                    <div class="hidden sm:col-span-2 sm:flex items-center">
                                        @php
                                            $typeConfig = [
                                                'national' => ['bg' => 'bg-gray-100', 'text' => 'text-gray-800', 'icon' => '🏛️'],
                                                'company' => ['bg' => 'bg-blue-100', 'text' => 'text-blue-800', 'icon' => '🏢'],
                                                'festival' => ['bg' => 'bg-purple-100', 'text' => 'text-purple-800', 'icon' => '🎉'],
                                                'event' => ['bg' => 'bg-green-100', 'text' => 'text-green-800', 'icon' => '📅'],
                                            ];
                                            $config = $typeConfig[$holiday->type] ?? ['bg' => 'bg-gray-100', 'text' => 'text-gray-800', 'icon' => '📋'];
                                        @endphp
                                        <span class="inline-flex items-center px-2 sm:px-3 py-1 rounded-full text-xs sm:text-sm font-medium {{ $config['bg'] }} {{ $config['text'] }}">
                                            <span class="mr-1">{{ $config['icon'] }}</span>
                                            <span class="hidden sm:inline">{{ ucfirst($holiday->type ?: 'General') }}</span>
                                            <span class="sm:hidden">{{ substr(ucfirst($holiday->type ?: 'General'), 0, 3) }}</span>
                                        </span>
                                    </div>

                                    <!-- Hide Description column on mobile and sm, show on lg and up -->
                                    <div class="hidden lg:col-span-2 lg:flex items-center">
                                        <span class="text-gray-900 text-sm truncate">{{ $holiday->description ?: 'No description provided' }}</span>
                                    </div>

                                    <div class="col-span-2 flex items-center">
                                        @can('delete holiday')
                                            <!-- Updated delete button to use jQuery confirmation modal -->
                                            <button type="button" onclick="deleteHoliday({{ $holiday->id }}, '{{ $holiday->title }}')"
                                                    class="inline-flex items-center justify-center px-2 py-1 bg-red-600 hover:bg-red-700 text-white text-xs font-medium rounded hover:scale-105 transform transition-all duration-200 ease-in-out focus:outline-none">
                                                <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6M9 7h6m-7 0V5a2 2 0 012-2h3a2 2 0 012 2v2"/>
                                                </svg>
                                                Delete
                                            </button>
                                        @endcan
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @else
                    <div class="text-center py-10 sm:py-12">
                        <div class="bg-gray-100 p-4 rounded-full mx-auto mb-4 w-fit">
                            <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <h3 class="text-lg font-medium text-gray-900 mb-2">No Holidays Found</h3>
                        <p class="text-gray-500 mb-4">Get started by adding your first holiday.</p>
                        @can('create holiday')
                            <a href="{{ route('holidays.create') }}"
                               class="inline-flex items-center px-6 py-3 font-semibold rounded-lg shadow-lg hover:scale-105 transform transition-all duration-300 ease-in-out focus:outline-none focus:ring-4"
                               style="background-color: var(--hover-bg); color: var(--primary-text);"
                               onmouseover="this.style.backgroundColor='var(--primary-bg-light)'"
                               onmouseout="this.style.backgroundColor='var(--hover-bg)'">
                                <svg class="h-4 w-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                                </svg>
                                Add Your First Holiday
                            </a>
                        @endcan
                    </div>
                @endif

                <div class="bg-white px-4 sm:px-6 py-4 border-t border-gray-200">
                    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-3 text-sm text-gray-600">
                        @php
                            $nationalCount = $holidays->where('type', 'national')->count();
                            $companyCount = $holidays->where('type', 'company')->count();
                            $festivalCount = $holidays->where('type', 'festival')->count();
                            $eventCount = $holidays->where('type', 'event')->count();
                        @endphp

                        <div class="flex flex-wrap items-center gap-x-6 gap-y-2">
                            <div class="flex items-center gap-2">
                                <div class="w-3 h-3 bg-gray-400 rounded-full"></div>
                                <span>NATIONAL ({{ $nationalCount }})</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <div class="w-3 h-3 bg-blue-400 rounded-full"></div>
                                <span>COMPANY ({{ $companyCount }})</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <div class="w-3 h-3 bg-purple-400 rounded-full"></div>
                                <span>FESTIVAL ({{ $festivalCount }})</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <div class="w-3 h-3 bg-green-400 rounded-full"></div>
                                <span>EVENT ({{ $eventCount }})</span>
                            </div>
                        </div>
                        <div class="text-gray-500">
                            LAST UPDATED: {{ now()->format('g:i A') }}
                        </div>
                    </div>
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
                <h3 class="text-lg font-medium text-gray-900 mt-4">Delete Holiday</h3>
                <div class="mt-2 px-7 py-3">
                    <p class="text-sm text-gray-500">
                        Are you sure you want to delete the holiday "<span id="holidayName" class="font-semibold text-red-600"></span>"?
                    </p>
                    <p class="text-xs text-red-400 mt-2">This action cannot be undone and will permanently remove this holiday.</p>
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
        let currentHolidayId = null;

        function deleteHoliday(holidayId, holidayName) {
            currentHolidayId = holidayId;
            $('#holidayName').text(holidayName);
            $('#deleteModal').fadeIn(300);
            $('body').css('overflow', 'hidden');
        }

        // Delete modal handlers
        $('#confirmDelete').click(function() {
            if (currentHolidayId) {
                // Show loading state
                $('.delete-text').hide();
                $('.delete-spinner').show();
                $(this).prop('disabled', true);
                $('#cancelDelete').prop('disabled', true);

                // Create and submit form
                const form = $('<form>', {
                    'method': 'POST',
                    'action': '{{ route("holidays.destroy", ":id") }}'.replace(':id', currentHolidayId)
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
            currentHolidayId = null;
        });

        // Close modal on background click
        $('#deleteModal').click(function(e) {
            if (e.target === this) {
                $(this).fadeOut(300);
                $('body').css('overflow', 'auto');
                currentHolidayId = null;
            }
        });

        // Close modal on ESC key
        $(document).keydown(function(e) {
            if (e.keyCode === 27) {
                $('#deleteModal').fadeOut(300);
                $('body').css('overflow', 'auto');
                currentHolidayId = null;
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
