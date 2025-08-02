<x-app-layout>
    @can('create holiday')
        <x-slot name="header">
            <div class="bg-gradient-to-r from-green-600 to-blue-600 rounded-lg shadow-lg p-6 mb-6">
                <h2 class="text-3xl font-bold text-white flex items-center">
                    <svg class="w-8 h-8 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                        </path>
                    </svg>
                    Add New Holiday
                </h2>
                <p class="text-green-100 mt-2">Create a new holiday entry for your organization</p>
            </div>
        </x-slot>

        <div class="max-w-4xl mx-auto">
            <!-- Main Form Card -->
            <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden">
                <!-- Card Header -->
                <div class="bg-gradient-to-r from-gray-50 to-green-50 px-8 py-6 border-b border-gray-200">
                    <div class="flex items-center justify-between">
                        <div>
                            <h3 class="text-xl font-semibold text-gray-900">Holiday Information</h3>
                            <p class="text-sm text-gray-600 mt-1">Fill in the details below to add a new holiday</p>
                        </div>
                        <div class="bg-green-100 p-3 rounded-lg">
                            <svg class="h-6 w-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Form Content -->
                <div class="p-8">
                    <form action="{{ route('holidays.store') }}" method="POST" class="space-y-8">
                        @csrf
                        <!-- Form Grid -->
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                            <!-- Left Column -->
                            <div class="space-y-6">
                                <!-- Holiday Title -->
                                <div class="space-y-2">
                                    <label for="title" class="flex items-center text-sm font-semibold text-gray-700">
                                        <svg class="h-4 w-4 mr-2 text-gray-500" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z">
                                            </path>
                                        </svg>
                                        Holiday Title
                                        <span class="text-red-500 ml-1">*</span>
                                    </label>
                                    <input type="text" id="title" name="title" value="{{ old('title') }}" required
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500 text-sm placeholder-gray-400"
                                        placeholder="e.g., Christmas Day, Independence Day">
                                    @error('title')
                                        <div class="flex items-center mt-2">
                                            <svg class="h-4 w-4 text-red-500 mr-2" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        </div>
                                    @enderror
                                </div>

                                <!-- Holiday Date -->
                                <div class="space-y-2">
                                    <label for="date" class="flex items-center text-sm font-semibold text-gray-700">
                                        <svg class="h-4 w-4 mr-2 text-gray-500" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                            </path>
                                        </svg>
                                        Holiday Date
                                        <span class="text-red-500 ml-1">*</span>
                                    </label>
                                    <input type="date" id="date" name="date" value="{{ old('date') }}" required
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500 text-sm">
                                    @error('date')
                                        <div class="flex items-center mt-2">
                                            <svg class="h-4 w-4 text-red-500 mr-2" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Right Column -->
                            <div class="space-y-6">
                                <!-- Holiday Type -->
                                <div class="space-y-2">
                                    <label for="type" class="flex items-center text-sm font-semibold text-gray-700">
                                        <svg class="h-4 w-4 mr-2 text-gray-500" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z">
                                            </path>
                                        </svg>
                                        Holiday Type
                                    </label>
                                    <select id="type" name="type"
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500 text-sm bg-white">
                                        <option value="" {{ old('type') == '' ? 'selected' : '' }}>Select Holiday Type
                                        </option>
                                        <option value="national" {{ old('type') == 'national' ? 'selected' : '' }}>🏛️
                                            National Holiday</option>
                                        <option value="company" {{ old('type') == 'company' ? 'selected' : '' }}>🏢 Company
                                            Holiday</option>
                                        <option value="festival" {{ old('type') == 'festival' ? 'selected' : '' }}>🎉 Festival
                                        </option>
                                        <option value="event" {{ old('type') == 'event' ? 'selected' : '' }}>📅 Special Event
                                        </option>
                                    </select>
                                    @error('type')
                                        <div class="flex items-center mt-2">
                                            <svg class="h-4 w-4 text-red-500 mr-2" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        </div>
                                    @enderror
                                </div>

                                <!-- Type Legend -->
                                <div class="bg-gray-50 rounded-lg p-4 border border-gray-200">
                                    <h4 class="text-sm font-medium text-gray-700 mb-2">Holiday Types:</h4>
                                    <div class="space-y-1 text-xs text-gray-600">
                                        <div class="flex items-center"><span class="w-4">🏛️</span> National - Government
                                            declared holidays</div>
                                        <div class="flex items-center"><span class="w-4">🏢</span> Company - Organization
                                            specific holidays</div>
                                        <div class="flex items-center"><span class="w-4">🎉</span> Festival - Religious or
                                            cultural celebrations</div>
                                        <div class="flex items-center"><span class="w-4">📅</span> Event - Special occasions
                                            or events</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Full Width Description -->
                        <div class="space-y-2">
                            <label for="description" class="flex items-center text-sm font-semibold text-gray-700">
                                <svg class="h-4 w-4 mr-2 text-gray-500" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                    </path>
                                </svg>
                                Description
                                <span class="text-gray-400 ml-1 text-xs">(Optional)</span>
                            </label>
                            <textarea id="description" name="description" rows="4"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500 text-sm placeholder-gray-400 resize-none"
                                placeholder="Add any additional details about this holiday...">{{ old('description') }}</textarea>
                            <p class="text-xs text-gray-500">
                                <svg class="h-3 w-3 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                Provide context or significance of this holiday
                            </p>
                            @error('description')
                                <div class="flex items-center mt-2">
                                    <svg class="h-4 w-4 text-red-500 mr-2" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                </div>
                            @enderror
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex items-center justify-between pt-6 border-t border-gray-200">
                            <div class="flex items-center text-sm text-gray-500">
                                <svg class="h-4 w-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z">
                                    </path>
                                </svg>
                                <span>Fields marked with * are required</span>
                            </div>

                            <div class="flex items-center space-x-4">
                                <a href="{{ route('holidays.index') }}"
                                    class="inline-flex items-center px-6 py-3 border border-gray-300 text-sm font-medium rounded-lg text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                                    <svg class="h-4 w-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                    Cancel
                                </a>

                                <button type="submit"
                                    class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-green-600 to-blue-600 text-white text-sm font-semibold rounded-lg hover:from-green-700 hover:to-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 shadow-lg">
                                    <svg class="h-4 w-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                    </svg>
                                    Add Holiday
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endcan
</x-app-layout>