<x-app-layout>
    @can('view all leaves')
      <div class="theme-app flex flex-col sm:flex-row justify-between items-center p-4 sm:p-6 rounded-lg shadow-sm" 
     style="background: linear-gradient(to right, var(--secondary-bg), var(--primary-bg));">
    
    <div class="flex flex-col sm:flex-row items-center justify-between gap-4 sm:gap-0 w-full lg:mr-24">
        <div class="flex items-center space-x-2 sm:space-x-3 mb-4 sm:mb-0">
            <div class="p-2 rounded-lg shadow-md" style="background-color: var(--hover-bg);">
                <i class="fas fa-calendar-alt text-base sm:text-lg" style="color: var(--primary-text);"></i>
            </div>
            <div>
                <h1 class="font-bold text-xl sm:text-xl lg:text-2xl leading-tight" style="color: var(--primary-text);">
                    My Leave Applications
                </h1>
                <p class="mt-1 text-sm sm:text-base" style="color: var(--secondary-text);">
                    Track and manage your leave requests
                </p>
            </div>
        </div>

        <div class="w-full sm:w-auto">
            <a href="{{ route('leaves.create') }}"
               class="inline-flex items-center justify-center w-full px-4 py-2 sm:px-6 sm:py-3 text-sm sm:text-base font-semibold rounded-lg shadow-lg hover:scale-105 transform transition-all duration-300 ease-in-out focus:outline-none focus:ring-4"
               style="background-color: var(--hover-bg); color: var(--primary-text);"
               onmouseover="this.style.backgroundColor='var(--primary-bg-light)'"
               onmouseout="this.style.backgroundColor='var(--hover-bg)'">
                <i class="fas fa-plus mr-2"></i>
                Apply for Leave
            </a>
        </div>
    </div>
</div>

        @if (session('success'))
            <div class="mx-4 mt-4 sm:mx-6 sm:mt-6 bg-green-50 border-l-4 border-green-400 p-3 sm:p-4 rounded-r-lg shadow-sm">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <i class="fas fa-check-circle text-green-400 text-base sm:text-lg"></i>
                    </div>
                    <div class="ml-2 sm:ml-3">
                        <p class="text-sm sm:text-base font-medium text-green-800">{{ session('success') }}</p>
                    </div>
                </div>
            </div>
        @endif

        @if (session('error'))
            <div class="mx-4 mt-4 sm:mx-6 sm:mt-6 bg-red-50 border-l-4 border-red-400 p-3 sm:p-4 rounded-r-lg shadow-sm">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <i class="fas fa-times-circle text-red-400 text-base sm:text-lg"></i>
                    </div>
                    <div class="ml-2 sm:ml-3">
                        <p class="text-sm sm:text-base font-medium text-red-800">{{ session('error') }}</p>
                    </div>
                </div>
            </div>
        @endif

        <div class="min-h-screen bg-gradient-to-br from-gray-50 to-blue-50 p-4 sm:p-6">
            <div class="max-w-7xl mx-auto">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6 mb-6 sm:mb-8">
                    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-4 sm:p-6 hover:shadow-md transition-shadow duration-200">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-xs sm:text-sm font-medium text-gray-600 uppercase tracking-wide">Total Applications</p>
                                <p class="text-2xl sm:text-3xl font-bold text-gray-900 mt-1 sm:mt-2">{{ $leaves->count() }}</p>
                            </div>
                            <div class="p-2 sm:p-3 bg-blue-100 rounded-lg">
                                <i class="fas fa-file-alt text-lg sm:text-xl"></i>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-4 sm:p-6 hover:shadow-md transition-shadow duration-200">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-xs sm:text-sm font-medium text-gray-600 uppercase tracking-wide">Approved</p>
                                <p class="text-2xl sm:text-3xl font-bold text-gray-900 mt-1 sm:mt-2">{{ $leaves->where('status', 'approved')->count() }}</p>
                            </div>
                            <div class="p-2 sm:p-3 bg-green-100 rounded-lg">
                                <i class="fas fa-check-circle text-lg sm:text-xl"></i>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-4 sm:p-6 hover:shadow-md transition-shadow duration-200">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-xs sm:text-sm font-medium text-gray-600 uppercase tracking-wide">Pending</p>
                                <p class="text-2xl sm:text-3xl font-bold text-gray-900 mt-1 sm:mt-2">{{ $leaves->where('status', 'pending')->count() }}</p>
                            </div>
                            <div class="p-2 sm:p-3 bg-yellow-100 rounded-lg">
                                <i class="fas fa-clock text-lg sm:text-xl"></i>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-4 sm:p-6 hover:shadow-md transition-shadow duration-200">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-xs sm:text-sm font-medium text-gray-600 uppercase tracking-wide">Rejected</p>
                                <p class="text-2xl sm:text-3xl font-bold text-gray-900 mt-1 sm:mt-2">{{ $leaves->where('status', 'rejected')->count() }}</p>
                            </div>
                            <div class="p-2 sm:p-3 bg-red-100 rounded-lg">
                                <i class="fas fa-times-circle text-lg sm:text-xl"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-xl border border-gray-200 overflow-hidden">
                    <div class="theme-app px-4 py-3 sm:px-6 sm:py-4 border-b border-gray-200" style="background: linear-gradient(to right, var(--secondary-bg), var(--primary-bg));">
                        <div class="flex items-center justify-between">
                            <div>
                                <h2 class="text-lg sm:text-xl font-bold" style="color: var(--primary-text);">Leave Applications History</h2>
                                <p class="text-xs sm:text-sm mt-0.5 sm:mt-1" style="color: var(--secondary-text);">Total: {{ $leaves->count() }} applications</p>
                            </div>
                            <div class="block sm:hidden">
                                <a href="{{ route('leaves.create') }}"
                                    class="inline-flex items-center px-3 py-1.5 font-medium rounded-lg transition-all duration-300 ease-in-out text-xs hover:scale-105 transform"
                                    style="background-color: var(--hover-bg); color: var(--primary-text);"
                                    onmouseover="this.style.backgroundColor='var(--primary-bg-light)'"
                                    onmouseout="this.style.backgroundColor='var(--hover-bg)'">
                                    <i class="fas fa-plus mr-1"></i>
                                    Apply
                                </a>
                            </div>
                        </div>
                    </div>

                    @if (!$leaves->isEmpty())
                        <div class="overflow-x-auto">
                            <div class="theme-app" style="background: linear-gradient(to right, var(--primary-bg), var(--secondary-bg)); color: var(--primary-text);">
                                <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 px-4 py-3 sm:px-6 sm:py-4 text-xs sm:text-sm font-semibold uppercase tracking-wider">
                                    <div class="flex items-center space-x-1.5 sm:space-x-2">
                                        <i class="fas fa-tag text-sm sm:text-base"></i>
                                        <span>Leave Type</span>
                                    </div>
                                    <div class="flex items-center space-x-1.5 sm:space-x-2">
                                        <i class="fas fa-calendar-day text-sm sm:text-base"></i>
                                        <span>Start Date</span>
                                    </div>
                                    <div class="flex items-center space-x-1.5 sm:space-x-2">
                                        <i class="fas fa-calendar-day text-sm sm:text-base"></i>
                                        <span>End Date</span>
                                    </div>
                                    <div class="flex items-center space-x-1.5 sm:space-x-2">
                                        <i class="fas fa-info-circle text-sm sm:text-base"></i>
                                        <span>Status</span>
                                    </div>
                                </div>
                            </div>

                            <div class="bg-white divide-y divide-gray-200">
                                @foreach ($leaves as $index => $leave)
                                    <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 px-4 py-3 sm:px-6 sm:py-4 hover:bg-gray-50 transition-colors duration-150 {{ $index % 2 == 0 ? 'bg-white' : 'bg-gray-25' }}">
                                        <div class="flex items-center space-x-2 sm:space-x-3">
                                            <div class="flex-shrink-0 h-8 w-8 sm:h-10 sm:w-10">
                                                <div class="h-8 w-8 sm:h-10 sm:w-10 rounded-lg bg-blue-100 flex items-center justify-center">
                                                    <i class="fas fa-tag text-base sm:text-lg text-blue-600"></i>
                                                </div>
                                            </div>
                                            <div class="min-w-0 flex-1">
                                                <div class="text-sm sm:text-base font-semibold text-gray-900 truncate">{{ $leave->leaveType->name }}</div>
                                                <div class="text-xs sm:text-sm text-gray-500">Leave Request</div>
                                            </div>
                                        </div>

                                        <div class="flex items-center">
                                            <div>
                                                <div class="text-sm sm:text-base font-medium text-gray-900">{{ \Carbon\Carbon::parse($leave->start_date)->format('d M, Y') }}</div>
                                                <div class="text-xs sm:text-sm text-gray-500">{{ \Carbon\Carbon::parse($leave->start_date)->format('l') }}</div>
                                            </div>
                                        </div>

                                        <div class="flex items-center">
                                            <div>
                                                <div class="text-sm sm:text-base font-medium text-gray-900">{{ \Carbon\Carbon::parse($leave->end_date)->format('d M, Y') }}</div>
                                                <div class="text-xs sm:text-sm text-gray-500">{{ \Carbon\Carbon::parse($leave->end_date)->format('l') }}</div>
                                            </div>
                                        </div>

                                        <div class="flex items-center">
                                            @php
                                                $statusConfig = [
                                                    'pending' => ['bg' => 'bg-yellow-100', 'text' => 'text-yellow-800', 'icon' => 'fas fa-clock'],
                                                    'approved' => ['bg' => 'bg-green-100', 'text' => 'text-green-800', 'icon' => 'fas fa-check-circle'],
                                                    'rejected' => ['bg' => 'bg-red-100', 'text' => 'text-red-800', 'icon' => 'fas fa-times-circle']
                                                ];
                                                $config = $statusConfig[strtolower($leave->status)] ?? $statusConfig['pending'];
                                            @endphp
                                            <span class="inline-flex items-center px-2.5 py-0.5 sm:px-3 sm:py-1 rounded-full text-xs sm:text-sm font-medium {{ $config['bg'] }} {{ $config['text'] }}">
                                                <i class="{{ $config['icon'] }} mr-1 text-xs sm:text-sm"></i>
                                                {{ ucfirst($leave->status) }}
                                            </span>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @else
                        <div class="text-center py-8 sm:py-16 px-4">
                            <div class="bg-gray-100 p-3 sm:p-4 rounded-full mx-auto mb-3 sm:mb-4 w-fit">
                                <i class="fas fa-file-alt text-3xl sm:text-4xl text-gray-400"></i>
                            </div>
                            <h3 class="text-lg sm:text-xl font-semibold text-gray-900 mb-1 sm:mb-2">No Leave Applications</h3>
                            <p class="text-sm sm:text-base text-gray-500 mb-4 sm:mb-6 max-w-sm mx-auto">You haven't submitted any leave applications yet. Get started by applying for your first leave.</p>
                            <a href="{{ route('leaves.create') }}"
                                class="theme-app inline-flex items-center px-4 py-2 sm:px-6 sm:py-3 font-semibold rounded-lg shadow-lg hover:scale-105 transform transition-all duration-300 ease-in-out focus:outline-none focus:ring-4 text-sm sm:text-base"
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
