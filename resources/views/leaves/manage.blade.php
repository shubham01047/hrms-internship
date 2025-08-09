<x-app-layout>
    @can('approve leave')
        <!-- Font Awesome CDN -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

        <!-- Professional Header -->
        <div class="theme-app px-6 py-8" style="background: linear-gradient(to right, var(--primary-bg), var(--secondary-bg));">
            <div class="flex items-center justify-between" style="color: var(--primary-text);">
                <div class="flex items-center space-x-4">
                    <div class="p-3 rounded-lg shadow-md" style="background-color: var(--hover-bg);">
                        <i class="fas fa-tasks text-2xl"></i>
                    </div>
                    <div>
                        <h1 class="text-3xl font-bold">Pending Leave Requests</h1>
                        <p class="mt-1" style="color: var(--secondary-text);">Review and manage employee leave applications</p>
                    </div>
                </div>
                <div class="hidden md:flex items-center space-x-4">
                    <div class="text-right">
                        <div class="text-3xl font-bold">{{ $leaves->count() }}</div>
                        <div class="text-sm" style="color: var(--secondary-text);">Pending Requests</div>
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
        <div class="min-h-screen bg-gradient-to-br from-gray-50 to-blue-50 p-6">
            <div class="max-w-7xl mx-auto">
                <!-- Statistics Cards -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
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
                    <div class="theme-app px-6 py-6 border-b border-gray-200" style="background: linear-gradient(to right, var(--secondary-bg), var(--primary-bg));">
                        <div class="flex items-center justify-between">
                            <div>
                                <h2 class="text-xl font-bold" style="color: var(--primary-text);">Leave Requests Awaiting Approval</h2>
                                <p class="text-sm mt-1" style="color: var(--secondary-text);">{{ $leaves->count() }} pending reviews</p>
                            </div>
                            <div class="p-2 rounded-lg shadow-sm" style="background-color: var(--hover-bg);">
                                <i class="fas fa-check-circle text-white"></i>
                            </div>
                        </div>
                    </div>

                    <!-- Table -->
                    @if (!$leaves->isEmpty())
                        <div class="overflow-x-auto">
                            <!-- Table Header -->
                            <div class="theme-app" style="background: linear-gradient(to right, var(--primary-bg), var(--secondary-bg)); color: var(--primary-text);">
                                <div class="grid grid-cols-5 gap-4 px-6 py-4 text-xs font-semibold uppercase tracking-wider">
                                    <div class="flex items-center space-x-2">
                                        <i class="fas fa-user"></i>
                                        <span>Employee</span>
                                    </div>
                                    <div class="flex items-center space-x-2">
                                        <i class="fas fa-tag"></i>
                                        <span>Leave Type</span>
                                    </div>
                                    <div class="flex items-center space-x-2">
                                        <i class="fas fa-calendar-day"></i>
                                        <span>Start Date</span>
                                    </div>
                                    <div class="flex items-center space-x-2">
                                        <i class="fas fa-calendar-day"></i>
                                        <span>End Date</span>
                                    </div>
                                    <div class="flex items-center space-x-2">
                                        <i class="fas fa-cogs"></i>
                                        <span>Actions</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Table Body -->
                            <div class="bg-white divide-y divide-gray-200">
                                @foreach ($leaves as $index => $leave)
                                    <div
                                        class="grid grid-cols-5 gap-4 px-6 py-4 hover:bg-gray-50 transition-colors duration-150 {{ $index % 2 == 0 ? 'bg-white' : 'bg-gray-25' }}">
                                        <!-- Employee -->
                                        <div class="flex items-center space-x-3">
                                            <div class="flex-shrink-0 h-10 w-10">
                                                <div
                                                    class="h-10 w-10 rounded-full bg-blue-600 flex items-center justify-center text-white font-semibold text-sm">
                                                    {{ substr($leave->user->name, 0, 1) }}
                                                </div>
                                            </div>
                                            <div class="min-w-0 flex-1">
                                                <div class="text-sm font-semibold text-gray-900 truncate">
                                                    {{ $leave->user->name }}</div>
                                                <div class="text-sm text-gray-500">ID: #{{ $leave->user->id }}</div>
                                            </div>
                                        </div>

                                        <!-- Leave Type -->
                                        <div class="flex items-center space-x-3">
                                            <div class="flex-shrink-0 h-10 w-10">
                                                <div class="h-10 w-10 rounded-lg bg-purple-100 flex items-center justify-center">
                                                    <i class="fas fa-tag text-purple-600"></i>
                                                </div>
                                            </div>
                                            <div class="min-w-0 flex-1">
                                                <div class="text-sm font-semibold text-gray-900 truncate">
                                                    {{ $leave->leaveType->name }}</div>
                                                <div class="text-sm text-gray-500">Leave Request</div>
                                            </div>
                                        </div>

                                        <!-- Start Date -->
                                        <div class="flex items-center">
                                            <div>
                                                <div class="text-sm font-medium text-gray-900">
                                                    {{ \Carbon\Carbon::parse($leave->start_date)->format('d M, Y') }}</div>
                                                <div class="text-sm text-gray-500">
                                                    {{ \Carbon\Carbon::parse($leave->start_date)->format('l') }}</div>
                                            </div>
                                        </div>

                                        <!-- End Date -->
                                        <div class="flex items-center">
                                            <div>
                                                <div class="text-sm font-medium text-gray-900">
                                                    {{ \Carbon\Carbon::parse($leave->end_date)->format('d M, Y') }}</div>
                                                <div class="text-sm text-gray-500">
                                                    {{ \Carbon\Carbon::parse($leave->end_date)->format('l') }}</div>
                                            </div>
                                        </div>

                                        <!-- Actions -->
                                        <div class="flex items-center space-x-2">
                                            <form method="POST" action="{{ route('leaves.approve', $leave->id) }}"
                                                class="inline">
                                                @csrf
                                                <button type="submit"
                                                    class="inline-flex items-center px-3 py-2 bg-green-600 hover:bg-green-700 text-white text-sm font-medium rounded-lg focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition-all duration-300 hover:scale-105 transform">
                                                    <i class="fas fa-check mr-1"></i>
                                                    Approve
                                                </button>
                                            </form>
                                            <form method="POST" action="{{ route('leaves.reject', $leave->id) }}"
                                                class="inline">
                                                @csrf
                                                <button type="submit"
                                                    class="inline-flex items-center px-3 py-2 bg-red-600 hover:bg-red-700 text-white text-sm font-medium rounded-lg focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition-all duration-300 hover:scale-105 transform">
                                                    <i class="fas fa-times mr-1"></i>
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
    @endcan
</x-app-layout>
