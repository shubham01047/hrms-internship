<x-app-layout>
    <x-slot name="header">
        <div class="bg-gradient-to-r from-blue-600 to-purple-600 rounded-lg shadow-lg p-6 mb-6">
            <h2 class="text-3xl font-bold text-white flex items-center">
                <svg class="w-8 h-8 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                    </path>
                </svg>
                Holiday Management
            </h2>
            <p class="text-blue-100 mt-2">Manage company holidays and special events</p>
        </div>
    </x-slot>
    @if (session('success'))
        <div>
            <p>Success! {{ session('success') }}</p>
        </div>
    @endif
    @if (session('error'))
        <div>
            <p>Error! {{ session('error') }}</p>
        </div>
    @endif
    <div class="bg-white rounded-xl shadow-xl overflow-hidden border border-gray-200">
        <!-- Header Section -->
        <div class="bg-gray-50 px-6 py-4 border-b border-gray-200">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-4">
                    <div class="bg-blue-100 p-3 rounded-lg">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                            </path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900">All Holidays</h3>
                        <p class="text-sm text-gray-600">{{ count($holidays) }}
                            holiday{{ count($holidays) !== 1 ? 's' : '' }} registered</p>
                    </div>
                </div>

                @can('create holiday')
                    <a href="{{ route('holidays.create') }}"
                        class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-green-600 to-blue-600 text-white text-sm font-semibold rounded-lg hover:from-green-700 hover:to-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 shadow-lg">
                        <svg class="h-4 w-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                        Add Holiday
                    </a>
                @endcan
            </div>
        </div>

        <!-- Table Container -->
        <div class="overflow-x-auto">
            @if (count($holidays) > 0)
                <table class="w-full">
                    <thead class="bg-gradient-to-r from-gray-800 to-gray-900">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-white uppercase tracking-wider">
                                <div class="flex items-center space-x-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z">
                                        </path>
                                    </svg>
                                    <span>Holiday Title</span>
                                </div>
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-white uppercase tracking-wider">
                                <div class="flex items-center space-x-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                    <span>Date</span>
                                </div>
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-white uppercase tracking-wider">
                                <div class="flex items-center space-x-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z">
                                        </path>
                                    </svg>
                                    <span>Type</span>
                                </div>
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-white uppercase tracking-wider">
                                <div class="flex items-center space-x-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                        </path>
                                    </svg>
                                    <span>Description</span>
                                </div>
                            </th>
                            @can('delete holiday')
                                <th class="px-6 py-4 text-left text-xs font-semibold text-white uppercase tracking-wider">
                                    <div class="flex items-center space-x-2">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z">
                                            </path>
                                        </svg>
                                        <span>Actions</span>
                                    </div>
                                </th>
                            @endcan
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($holidays as $index => $holiday)
                            <tr
                                class="hover:bg-gray-50 transition-colors duration-200 {{ $index % 2 == 0 ? 'bg-white' : 'bg-gray-25' }}">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10">
                                            <div
                                                class="h-10 w-10 rounded-full bg-gradient-to-r from-blue-400 to-purple-400 flex items-center justify-center">
                                                <svg class="h-5 w-5 text-white" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                                    </path>
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-semibold text-gray-900">{{ $holiday->title }}</div>
                                            <div class="text-sm text-gray-500">Holiday Event</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="bg-blue-100 p-2 rounded-lg mr-3">
                                            <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                                </path>
                                            </svg>
                                        </div>
                                        <div>
                                            <div class="text-sm font-medium text-gray-900">
                                                {{ \Carbon\Carbon::parse($holiday->date)->format('M d, Y') }}</div>
                                            <div class="text-xs text-blue-600 font-medium">
                                                {{ \Carbon\Carbon::parse($holiday->date)->format('l') }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @php
                                        $typeConfig = [
                                            'national' => [
                                                'bg' => 'bg-red-100',
                                                'text' => 'text-red-800',
                                                'emoji' => '🏛️',
                                            ],
                                            'company' => [
                                                'bg' => 'bg-blue-100',
                                                'text' => 'text-blue-800',
                                                'emoji' => '🏢',
                                            ],
                                            'festival' => [
                                                'bg' => 'bg-purple-100',
                                                'text' => 'text-purple-800',
                                                'emoji' => '🎉',
                                            ],
                                            'event' => [
                                                'bg' => 'bg-green-100',
                                                'text' => 'text-green-800',
                                                'emoji' => '📅',
                                            ],
                                        ];
                                        $config = $typeConfig[$holiday->type] ?? [
                                            'bg' => 'bg-gray-100',
                                            'text' => 'text-gray-800',
                                            'emoji' => '📋',
                                        ];
                                    @endphp
                                    <span
                                        class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium {{ $config['bg'] }} {{ $config['text'] }}">
                                        <span class="mr-1">{{ $config['emoji'] }}</span>
                                        {{ ucfirst($holiday->type ?: 'General') }}
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-gray-900 max-w-xs">
                                        {{ $holiday->description ?: 'No description provided' }}
                                    </div>
                                </td>
                                @can('delete holiday')
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <form action="{{ route('holidays.destroy', $holiday->id) }}" method="POST"
                                            onsubmit="return confirm('Are you sure you want to delete this holiday? This action cannot be undone.')"
                                            class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="inline-flex items-center px-3 py-2 border border-red-300 text-sm font-medium rounded-lg text-red-700 bg-red-50 hover:bg-red-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                                                <svg class="h-4 w-4 mr-1" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                                    </path>
                                                </svg>
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                @endcan
                            </tr>
                        @endforeach
                    </tbody>
                </table>
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
                            class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-green-600 to-blue-600 text-white text-sm font-semibold rounded-lg hover:from-green-700 hover:to-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 shadow-lg">
                            <svg class="h-4 w-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                            Add Your First Holiday
                        </a>
                    @endcan
                </div>
            @endif
        </div>

        <!-- Footer -->
        <div class="bg-gray-50 px-6 py-4 border-t border-gray-200">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-6 text-sm text-gray-600">
                    <div class="flex items-center space-x-2">
                        <div class="w-3 h-3 bg-red-400 rounded-full"></div>
                        <span>National</span>
                    </div>
                    <div class="flex items-center space-x-2">
                        <div class="w-3 h-3 bg-blue-400 rounded-full"></div>
                        <span>Company</span>
                    </div>
                    <div class="flex items-center space-x-2">
                        <div class="w-3 h-3 bg-purple-400 rounded-full"></div>
                        <span>Festival</span>
                    </div>
                    <div class="flex items-center space-x-2">
                        <div class="w-3 h-3 bg-green-400 rounded-full"></div>
                        <span>Event</span>
                    </div>
                </div>
                <div class="text-sm text-gray-500">
                    Last updated: {{ now()->format('g:i A') }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
