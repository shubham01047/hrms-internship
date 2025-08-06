<x-app-layout>
    <x-slot name="header">
        <div class="theme-app flex justify-between items-center p-6 rounded-lg shadow-sm" style="background: linear-gradient(to right, var(--secondary-bg), var(--primary-bg));">
            <div class="flex items-center space-x-3">
                <div class="p-2 rounded-lg shadow-md" style="background-color: var(--hover-bg);">
                    <svg class="w-6 h-6" style="color: var(--primary-text);" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                        </path>
                    </svg>
                </div>
                <div>
                    <h2 class="font-bold text-2xl leading-tight" style="color: var(--primary-text);">
                        Holiday Management
                    </h2>
                    <p class="text-sm" style="color: var(--secondary-text);">Manage company holidays and special events</p>
                </div>
            </div>
            @can('create holiday')
                <a href="{{ route('holidays.create') }}" 
                   class="inline-flex items-center px-6 py-3 font-semibold rounded-lg shadow-lg hover:scale-105 transform transition-all duration-300 ease-in-out focus:outline-none focus:ring-4"
                   style="background-color: var(--hover-bg); color: var(--primary-text);"
                   onmouseover="this.style.backgroundColor='var(--primary-bg-light)'"
                   onmouseout="this.style.backgroundColor='var(--hover-bg)'">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    Add Holiday
                </a>
            @endcan
        </div>
    </x-slot>

    <!-- Success/Error Messages -->
    @if (session('success'))
        <div class="mx-4 sm:mx-6 lg:mx-8 mt-6 bg-green-50 border-l-4 border-green-400 p-4 rounded-lg">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-green-400" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                    </svg>
                </div>
                <div class="ml-3">
                    <p class="text-sm text-green-700 font-medium">{{ session('success') }}</p>
                </div>
            </div>
        </div>
    @endif

    @if (session('error'))
        <div class="mx-4 sm:mx-6 lg:mx-8 mt-6 bg-red-50 border-l-4 border-red-400 p-4 rounded-lg">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-red-400" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                    </svg>
                </div>
                <div class="ml-3">
                    <p class="text-sm text-red-700 font-medium">{{ session('error') }}</p>
                </div>
            </div>
        </div>
    @endif

    <!-- Main Content -->
    <div class="py-8 bg-gradient-to-br from-gray-50 to-blue-50 min-h-screen">
        <div class="w-full px-4 sm:px-6 lg:px-8">
            <div class="bg-white rounded-xl shadow-xl overflow-hidden border border-gray-200">
                <!-- All Holidays Header -->
                <div class="theme-app p-6 border-b border-gray-200" style="background: linear-gradient(to right, var(--secondary-bg), var(--primary-bg));">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-4">
                            <div class="p-3 rounded-lg shadow-sm" style="background-color: var(--hover-bg);">
                                <svg class="w-6 h-6" style="color: var(--primary-text);" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                    </path>
                                </svg>
                            </div>
                            <div>
                                <h2 class="text-xl font-bold" style="color: var(--primary-text);">All Holidays</h2>
                                <p class="text-sm" style="color: var(--secondary-text);">{{ count($holidays) }} holidays registered</p>
                            </div>
                        </div>
                        <div class="px-4 py-2 rounded-full shadow-sm" style="background-color: var(--hover-bg);">
                            <span class="font-medium" style="color: var(--primary-text);">{{ count($holidays) }} Records</span>
                        </div>
                    </div>
                </div>

                <!-- Table -->
                @if (count($holidays) > 0)
                    <div class="overflow-x-auto">
                        <!-- Table Header -->
                        <div class="theme-app" style="background: linear-gradient(to right, var(--primary-bg), var(--secondary-bg));">
                            <div class="grid grid-cols-12 gap-4 px-6 py-4 text-xs font-semibold uppercase tracking-wider">
                                <div class="col-span-3 flex items-center space-x-2" style="color: var(--primary-text);">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                    <span>Holiday Title</span>
                                </div>
                                <div class="col-span-2 flex items-center space-x-2" style="color: var(--primary-text);">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                    <span>Date</span>
                                </div>
                                <div class="col-span-2 flex items-center space-x-2" style="color: var(--primary-text);">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                                    </svg>
                                    <span>Type</span>
                                </div>
                                <div class="col-span-3" style="color: var(--primary-text);">Description</div>
                                <div class="col-span-2" style="color: var(--primary-text);">Actions</div>
                            </div>
                        </div>

                        <!-- Table Body -->
                        <div class="bg-white">
                            @foreach ($holidays as $holiday)
                                <div class="grid grid-cols-12 gap-4 px-6 py-4 border-b border-gray-100 hover:bg-gray-50 transition-colors">
                                    <!-- Holiday Title -->
                                    <div class="col-span-3 flex items-center space-x-3">
                                        <div class="theme-app p-2 rounded-lg shadow-sm" style="background-color: var(--hover-bg);">
                                            <svg class="w-5 h-5" style="color: var(--primary-text);" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                            </svg>
                                        </div>
                                        <div>
                                            <div class="font-semibold text-gray-900">{{ $holiday->title }}</div>
                                            <div class="text-sm text-gray-500">Holiday Event</div>
                                        </div>
                                    </div>

                                    <!-- Date -->
                                    <div class="col-span-2 flex items-center space-x-3">
                                        <div class="p-2 bg-blue-100 rounded-lg">
                                            <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                            </svg>
                                        </div>
                                        <div>
                                            <div class="font-medium text-gray-900">{{ \Carbon\Carbon::parse($holiday->date)->format('M d, Y') }}</div>
                                            <div class="text-sm text-blue-600">{{ \Carbon\Carbon::parse($holiday->date)->format('l') }}</div>
                                        </div>
                                    </div>

                                    <!-- Type -->
                                    <div class="col-span-2 flex items-center">
                                        @php
                                            $typeConfig = [
                                                'national' => ['bg' => 'bg-gray-100', 'text' => 'text-gray-800', 'icon' => '🏛️'],
                                                'company' => ['bg' => 'bg-blue-100', 'text' => 'text-blue-800', 'icon' => '🏢'],
                                                'festival' => ['bg' => 'bg-purple-100', 'text' => 'text-purple-800', 'icon' => '🎉'],
                                                'event' => ['bg' => 'bg-green-100', 'text' => 'text-green-800', 'icon' => '📅'],
                                            ];
                                            $config = $typeConfig[$holiday->type] ?? ['bg' => 'bg-gray-100', 'text' => 'text-gray-800', 'icon' => '📋'];
                                        @endphp
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium {{ $config['bg'] }} {{ $config['text'] }}">
                                            <span class="mr-1">{{ $config['icon'] }}</span>
                                            {{ ucfirst($holiday->type ?: 'General') }}
                                        </span>
                                    </div>

                                    <!-- Description -->
                                    <div class="col-span-3 flex items-center">
                                        <span class="text-gray-900">{{ $holiday->description ?: 'No description provided' }}</span>
                                    </div>

                                    <!-- Actions -->
                                    <div class="col-span-2 flex items-center">
                                        @can('delete holiday')
                                            <form action="{{ route('holidays.destroy', $holiday->id) }}" method="POST" 
                                                  onsubmit="return confirm('Are you sure you want to delete this holiday?')" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" 
                                                        class="inline-flex items-center px-3 py-1 bg-red-100 hover:bg-red-200 text-red-700 text-sm font-medium rounded-full transition-colors hover:scale-105 transform">
                                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                    </svg>
                                                    Delete
                                                </button>
                                            </form>
                                        @endcan
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @else
                    <!-- Empty State -->
                    <div class="text-center py-12">
                        <div class="bg-gray-100 p-4 rounded-full mx-auto mb-4 w-fit">
                            <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                </path>
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
                                <svg class="h-4 w-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                                Add Your First Holiday
                            </a>
                        @endcan
                    </div>
                @endif

                <!-- Footer -->
                <div class="bg-white px-6 py-4 border-t border-gray-200">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-6 text-sm text-gray-600">
                            @php
                                $nationalCount = $holidays->where('type', 'national')->count();
                                $companyCount = $holidays->where('type', 'company')->count();
                                $festivalCount = $holidays->where('type', 'festival')->count();
                                $eventCount = $holidays->where('type', 'event')->count();
                            @endphp
                            
                            <div class="flex items-center space-x-2">
                                <div class="w-3 h-3 bg-gray-400 rounded-full"></div>
                                <span>NATIONAL ({{ $nationalCount }})</span>
                            </div>
                            <div class="flex items-center space-x-2">
                                <div class="w-3 h-3 bg-blue-400 rounded-full"></div>
                                <span>COMPANY ({{ $companyCount }})</span>
                            </div>
                            <div class="flex items-center space-x-2">
                                <div class="w-3 h-3 bg-purple-400 rounded-full"></div>
                                <span>FESTIVAL ({{ $festivalCount }})</span>
                            </div>
                            <div class="flex items-center space-x-2">
                                <div class="w-3 h-3 bg-green-400 rounded-full"></div>
                                <span>EVENT ({{ $eventCount }})</span>
                            </div>
                        </div>
                        <div class="text-sm text-gray-500">
                            LAST UPDATED: {{ now()->format('g:i A') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>