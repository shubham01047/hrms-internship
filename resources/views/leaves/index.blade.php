<x-app-layout>
    @can('view all leaves')
        <!-- Professional Header -->
        <div class="theme-app px-6 py-8" style="background: linear-gradient(to right, var(--primary-bg), var(--secondary-bg));">
            <div class="flex items-center justify-between" style="color: var(--primary-text);">
                <div class="flex items-center space-x-4">
                    <div class="p-3 rounded-lg shadow-md" style="background-color: var(--hover-bg);">
                        <i class="fas fa-calendar-alt text-2xl"></i>
                    </div>
                    <div>
                        <h1 class="text-3xl font-bold">My Leave Applications</h1>
                        <p class="mt-1" style="color: var(--secondary-text);">Track and manage your leave requests</p>
                    </div>
                </div>
                <div class="mr-24 hidden md:block">
                    <a href="{{ route('leaves.create') }}"
                        class="inline-flex items-center px-6 py-3 font-semibold rounded-lg shadow-lg hover:scale-105 transform transition-all duration-300 ease-in-out focus:outline-none focus:ring-4"
                        style="background-color: var(--hover-bg); color: var(--primary-text);"
                        onmouseover="this.style.backgroundColor='var(--primary-bg-light)'"
                        onmouseout="this.style.backgroundColor='var(--hover-bg)'">
                        <i class="fas fa-plus mr-2"></i>
                        Apply for Leave
                    </a>
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
                <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
                    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 hover:shadow-md transition-shadow duration-200">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-600 uppercase tracking-wide">Total Applications</p>
                                <p class="text-3xl font-bold text-gray-900 mt-2">{{ $leaves->count() }}</p>
                            </div>
                            <div class="p-3 bg-blue-100 rounded-lg">
                                <i class="fas fa-file-alt text-blue-600 text-xl"></i>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 hover:shadow-md transition-shadow duration-200">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-600 uppercase tracking-wide">Approved</p>
                                <p class="text-3xl font-bold text-gray-900 mt-2">{{ $leaves->where('status', 'approved')->count() }}</p>
                            </div>
                            <div class="p-3 bg-green-100 rounded-lg">
                                <i class="fas fa-check-circle text-green-600 text-xl"></i>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 hover:shadow-md transition-shadow duration-200">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-600 uppercase tracking-wide">Pending</p>
                                <p class="text-3xl font-bold text-gray-900 mt-2">{{ $leaves->where('status', 'pending')->count() }}</p>
                            </div>
                            <div class="p-3 bg-yellow-100 rounded-lg">
                                <i class="fas fa-clock text-yellow-600 text-xl"></i>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 hover:shadow-md transition-shadow duration-200">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-600 uppercase tracking-wide">Rejected</p>
                                <p class="text-3xl font-bold text-gray-900 mt-2">{{ $leaves->where('status', 'rejected')->count() }}</p>
                            </div>
                            <div class="p-3 bg-red-100 rounded-lg">
                                <i class="fas fa-times-circle text-red-600 text-xl"></i>
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
                                <h2 class="text-xl font-bold" style="color: var(--primary-text);">Leave Applications History</h2>
                                <p class="text-sm mt-1" style="color: var(--secondary-text);">Total: {{ $leaves->count() }} applications</p>
                            </div>
                            <div class="md:hidden">
                                <a href="{{ route('leaves.create') }}"
                                    class="inline-flex items-center px-4 py-2 font-medium rounded-lg transition-all duration-300 ease-in-out text-sm hover:scale-105 transform"
                                    style="background-color: var(--hover-bg); color: var(--primary-text);"
                                    onmouseover="this.style.backgroundColor='var(--primary-bg-light)'"
                                    onmouseout="this.style.backgroundColor='var(--hover-bg)'">
                                    <i class="fas fa-plus mr-1"></i>
                                    Apply
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Table -->
                    @if (!$leaves->isEmpty())
                        <div class="overflow-x-auto">
                            <!-- Table Header -->
                            <div class="theme-app" style="background: linear-gradient(to right, var(--primary-bg), var(--secondary-bg)); color: var(--primary-text);">
                                <div class="grid grid-cols-4 gap-4 px-6 py-4 text-xs font-semibold uppercase tracking-wider">
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
                                        <i class="fas fa-info-circle"></i>
                                        <span>Status</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Table Body -->
                            <div class="bg-white divide-y divide-gray-200">
                                @foreach ($leaves as $index => $leave)
                                    <div class="grid grid-cols-4 gap-4 px-6 py-4 hover:bg-gray-50 transition-colors duration-150 {{ $index % 2 == 0 ? 'bg-white' : 'bg-gray-25' }}">
                                        <!-- Leave Type -->
                                        <div class="flex items-center space-x-3">
                                            <div class="flex-shrink-0 h-10 w-10">
                                                <div class="h-10 w-10 rounded-lg bg-blue-100 flex items-center justify-center">
                                                    <i class="fas fa-tag text-blue-600"></i>
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

                                        <!-- Status -->
                                        <div class="flex items-center">
                                            @php
                                                $statusConfig = [
                                                    'pending' => ['bg' => 'bg-yellow-100', 'text' => 'text-yellow-800', 'icon' => 'fas fa-clock'],
                                                    'approved' => ['bg' => 'bg-green-100', 'text' => 'text-green-800', 'icon' => 'fas fa-check-circle'],
                                                    'rejected' => ['bg' => 'bg-red-100', 'text' => 'text-red-800', 'icon' => 'fas fa-times-circle']
                                                ];
                                                $config = $statusConfig[strtolower($leave->status)] ?? $statusConfig['pending'];
                                            @endphp
                                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium {{ $config['bg'] }} {{ $config['text'] }}">
                                                <i class="{{ $config['icon'] }} mr-1"></i>
                                                {{ ucfirst($leave->status) }}
                                            </span>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @else
                        <!-- Empty State -->
                        <div class="text-center py-16">
                            <div class="bg-gray-100 p-4 rounded-full mx-auto mb-4 w-fit">
                                <i class="fas fa-file-alt text-4xl text-gray-400"></i>
                            </div>
                            <h3 class="text-xl font-semibold text-gray-900 mb-2">No Leave Applications</h3>
                            <p class="text-gray-500 mb-6 max-w-sm mx-auto">You haven't submitted any leave applications yet. Get started by applying for your first leave.</p>
                            <a href="{{ route('leaves.create') }}"
                                class="theme-app inline-flex items-center px-6 py-3 font-semibold rounded-lg shadow-lg hover:scale-105 transform transition-all duration-300 ease-in-out focus:outline-none focus:ring-4"
                                style="background-color: var(--hover-bg); color: var(--primary-text);"
                                onmouseover="this.style.backgroundColor='var(--primary-bg-light)'"
                                onmouseout="this.style.backgroundColor='var(--hover-bg)'">
                                <i class="fas fa-plus mr-2"></i>
                                Apply for Leave
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    @endcan
</x-app-layout>