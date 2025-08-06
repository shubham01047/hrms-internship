<x-app-layout>
    @can('approve leave')
        <!-- Professional Header -->
        <div class="bg-gradient-to-r from-blue-800 to-blue-900 px-6 py-8">
            <div class="flex items-center justify-between text-white">
                <div class="flex items-center space-x-4">
                    <div class="p-3 bg-white/20 rounded-lg">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z">
                            </path>
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-3xl font-bold">Pending Leave Requests</h1>
                        <p class="text-blue-100 mt-1">Review and manage employee leave applications</p>
                    </div>
                </div>
                <div class="hidden md:flex items-center space-x-4">
                    <div class="text-right">
                        <div class="text-3xl font-bold">{{ $leaves->count() }}</div>
                        <div class="text-sm text-blue-100">Pending Requests</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Success/Error Messages -->
        @if (session('success'))
            <div class="mx-6 mt-6 bg-green-50 border-l-4 border-green-400 p-4 rounded-r-lg shadow-sm">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-green-400" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
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
                        <svg class="h-5 w-5 text-red-400" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm font-medium text-red-800">{{ session('error') }}</p>
                    </div>
                </div>
            </div>
        @endif

        <!-- Main Content -->
        <div class="min-h-screen bg-gray-50 p-6">
            <div class="max-w-7xl mx-auto">
                <!-- Statistics Cards -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 hover:shadow-md transition-shadow duration-200">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-600 uppercase tracking-wide">Pending Review</p>
                                <p class="text-3xl font-bold text-gray-900 mt-2">{{ $leaves->count() }}</p>
                            </div>
                            <div class="p-3 bg-yellow-100 rounded-lg">
                                <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 hover:shadow-md transition-shadow duration-200">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-600 uppercase tracking-wide">Urgent Reviews</p>
                                <p class="text-3xl font-bold text-gray-900 mt-2">{{ $leaves->where('created_at', '>=', now()->subDays(3))->count() }}</p>
                            </div>
                            <div class="p-3 bg-red-100 rounded-lg">
                                <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 hover:shadow-md transition-shadow duration-200">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-600 uppercase tracking-wide">This Week</p>
                                <p class="text-3xl font-bold text-gray-900 mt-2">{{ $leaves->where('created_at', '>=', now()->startOfWeek())->count() }}</p>
                            </div>
                            <div class="p-3 bg-blue-100 rounded-lg">
                                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3a2 2 0 012-2h4a2 2 0 012 2v4m-6 0V6a2 2 0 012-2h4a2 2 0 012 2v1m-6 0h6m-6 0l-1 1m7-1l1 1m-1-1v4a2 2 0 01-2 2H9a2 2 0 01-2-2V8m8 0V9a2 2 0 01-2 2H9a2 2 0 01-2-2V8"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Main Content Card -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                    <!-- Header Section -->
                    <div class="bg-gradient-to-r from-gray-50 to-blue-50 px-6 py-6 border-b border-gray-200">
                        <div class="flex items-center justify-between">
                            <div>
                                <h2 class="text-xl font-bold text-gray-900">Leave Requests Awaiting Approval</h2>
                                <p class="text-sm text-gray-600 mt-1">{{ $leaves->count() }} pending reviews</p>
                            </div>
                            <div class="p-2 bg-blue-600 rounded-lg">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- Table -->
                    @if (!$leaves->isEmpty())
                        <div class="overflow-x-auto">
                            <!-- Table Header -->
                            <div class="bg-gradient-to-r from-gray-800 to-gray-900 text-white">
                                <div class="grid grid-cols-5 gap-4 px-6 py-4 text-xs font-semibold uppercase tracking-wider">
                                    <div class="flex items-center space-x-2">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                        </svg>
                                        <span>Employee</span>
                                    </div>
                                    <div class="flex items-center space-x-2">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                                        </svg>
                                        <span>Leave Type</span>
                                    </div>
                                    <div class="flex items-center space-x-2">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3a2 2 0 012-2h4a2 2 0 012 2v4m-6 0V6a2 2 0 012-2h4a2 2 0 012 2v1m-6 0h6m-6 0l-1 1m7-1l1 1m-1-1v4a2 2 0 01-2 2H9a2 2 0 01-2-2V8m8 0V9a2 2 0 01-2 2H9a2 2 0 01-2-2V8"></path>
                                        </svg>
                                        <span>Start Date</span>
                                    </div>
                                    <div class="flex items-center space-x-2">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3a2 2 0 012-2h4a2 2 0 012 2v4m-6 0V6a2 2 0 012-2h4a2 2 0 012 2v1m-6 0h6m-6 0l-1 1m7-1l1 1m-1-1v4a2 2 0 01-2 2H9a2 2 0 01-2-2V8m8 0V9a2 2 0 01-2 2H9a2 2 0 01-2-2V8"></path>
                                        </svg>
                                        <span>End Date</span>
                                    </div>
                                    <div class="flex items-center space-x-2">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 100 4m0-4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 100 4m0-4v2m0-6V4"></path>
                                        </svg>
                                        <span>Actions</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Table Body -->
                            <div class="bg-white divide-y divide-gray-200">
                                @foreach ($leaves as $index => $leave)
                                    <div class="grid grid-cols-5 gap-4 px-6 py-4 hover:bg-gray-50 transition-colors duration-150 {{ $index % 2 == 0 ? 'bg-white' : 'bg-gray-25' }}">
                                        <!-- Employee -->
                                        <div class="flex items-center space-x-3">
                                            <div class="flex-shrink-0 h-10 w-10">
                                                <div class="h-10 w-10 rounded-full bg-blue-600 flex items-center justify-center text-white font-semibold text-sm">
                                                    {{ substr($leave->user->name, 0, 1) }}
                                                </div>
                                            </div>
                                            <div class="min-w-0 flex-1">
                                                <div class="text-sm font-semibold text-gray-900 truncate">{{ $leave->user->name }}</div>
                                                <div class="text-sm text-gray-500">ID: #{{ $leave->user->id }}</div>
                                            </div>
                                        </div>

                                        <!-- Leave Type -->
                                        <div class="flex items-center space-x-3">
                                            <div class="flex-shrink-0 h-10 w-10">
                                                <div class="h-10 w-10 rounded-lg bg-purple-100 flex items-center justify-center">
                                                    <svg class="h-5 w-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                                                    </svg>
                                                </div>
                                            </div>
                                            <div class="min-w-0 flex-1">
                                                <div class="text-sm font-semibold text-gray-900 truncate">{{ $leave->leaveType->name }}</div>
                                                <div class="text-sm text-gray-500">Leave Request</div>
                                            </div>
                                        </div>

                                        <!-- Start Date -->
                                        <div class="flex items-center">
                                            <div>
                                                <div class="text-sm font-medium text-gray-900">{{ \Carbon\Carbon::parse($leave->start_date)->format('d M, Y') }}</div>
                                                <div class="text-sm text-gray-500">{{ \Carbon\Carbon::parse($leave->start_date)->format('l') }}</div>
                                            </div>
                                        </div>

                                        <!-- End Date -->
                                        <div class="flex items-center">
                                            <div>
                                                <div class="text-sm font-medium text-gray-900">{{ \Carbon\Carbon::parse($leave->end_date)->format('d M, Y') }}</div>
                                                <div class="text-sm text-gray-500">{{ \Carbon\Carbon::parse($leave->end_date)->format('l') }}</div>
                                            </div>
                                        </div>

                                        <!-- Actions -->
                                        <div class="flex items-center space-x-2">
                                            <form method="POST" action="{{ route('leaves.approve', $leave->id) }}" class="inline">
                                                @csrf
                                                <button type="submit"
                                                    class="inline-flex items-center px-3 py-2 bg-green-600 hover:bg-green-700 text-white text-sm font-medium rounded-lg focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition-colors">
                                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                                    </svg>
                                                    Approve
                                                </button>
                                            </form>
                                            <form method="POST" action="{{ route('leaves.reject', $leave->id) }}" class="inline">
                                                @csrf
                                                <button type="submit"
                                                    class="inline-flex items-center px-3 py-2 bg-red-600 hover:bg-red-700 text-white text-sm font-medium rounded-lg focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition-colors">
                                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                                    </svg>
                                                    Reject
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @else
                        <!-- Empty State -->
                        <div class="text-center py-16">
                            <div class="bg-gray-100 p-4 rounded-full mx-auto mb-4 w-fit">
                                <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <h3 class="text-xl font-semibold text-gray-900 mb-2">No Pending Requests</h3>
                            <p class="text-gray-500 max-w-sm mx-auto">All leave requests have been processed. New requests will appear here for your review.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    @endcan
</x-app-layout>