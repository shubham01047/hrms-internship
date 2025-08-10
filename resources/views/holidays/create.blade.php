<x-app-layout>
    @can('create holiday')
        <x-slot name="header">
            <div
                class="theme-app flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between p-4 sm:p-6 rounded-lg shadow-sm"
                style="background: linear-gradient(to right, var(--secondary-bg), var(--primary-bg));">
                <div class="flex items-center space-x-3">
                    <div class="p-2 rounded-lg shadow-md" style="background-color: var(--hover-bg);">
                        <svg class="w-6 h-6" style="color: var(--primary-text);" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <div class="min-w-0">
                        <h2 class="font-bold text-xl sm:text-2xl leading-tight truncate" style="color: var(--primary-text);">
                            Add New Holiday
                        </h2>
                        <p class="text-xs sm:text-sm" style="color: var(--secondary-text);">
                            Create a new holiday entry for your organization
                        </p>
                    </div>
                </div>

                <a href="{{ route('holidays.index') }}"
                   class="inline-flex items-center justify-center w-full sm:w-auto px-5 sm:px-6 py-2.5 sm:py-3 font-semibold rounded-lg shadow-lg hover:scale-105 transform transition-all duration-300 ease-in-out focus:outline-none focus:ring-4 lg:mr-24"
                   style="background-color: var(--hover-bg); color: var(--primary-text);"
                   onmouseover="this.style.backgroundColor='var(--primary-bg-light)'"
                   onmouseout="this.style.backgroundColor='var(--hover-bg)'"
                   aria-label="Back to holiday list"
                >
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Back to List
                </a>
            </div>
        </x-slot>

        <div class="py-6 sm:py-8 bg-gradient-to-br from-gray-50 to-blue-50 min-h-screen">
            <div class="w-full px-3 sm:px-4 lg:px-8">
                <div class="bg-white rounded-xl shadow-xl border border-gray-200 overflow-hidden">
                    <div class="theme-app px-4 sm:px-6 py-4 border-b border-gray-200"
                         style="background: linear-gradient(to right, var(--secondary-bg), var(--primary-bg));">
                        <div class="flex items-center space-x-3">
                            <div class="p-2 rounded-lg shadow-sm" style="background-color: var(--hover-bg);">
                                <svg class="w-5 h-5" style="color: var(--primary-text);" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                </svg>
                            </div>
                            <div>
                                <h2 class="text-lg sm:text-xl font-bold" style="color: var(--primary-text);">
                                    Holiday Information
                                </h2>
                                <p class="text-xs sm:text-sm" style="color: var(--secondary-text);">
                                    Fill in the details below to add a new holiday
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="p-4 sm:p-6">
                        <form action="{{ route('holidays.store') }}" method="POST" class="space-y-6">
                            @csrf

                            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 lg:gap-8">
                                <div class="space-y-6">
                                    <div class="space-y-2">
                                        <label for="title" class="flex items-center text-sm font-medium text-gray-700">
                                            <svg class="w-4 h-4 mr-2 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                      d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                            </svg>
                                            HOLIDAY TITLE <span class="text-red-500 ml-1">*</span>
                                        </label>
                                        <input
                                            type="text"
                                            id="title"
                                            name="title"
                                            value="{{ old('title') }}"
                                            required
                                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-4 focus:ring-blue-200 focus:border-blue-500 transition-all duration-300 ease-in-out hover:border-gray-400 bg-gray-50 focus:bg-white text-sm"
                                            placeholder="e.g., Christmas Day, Independence Day"
                                        />
                                        @error('title')
                                            <div class="flex items-center space-x-2 mt-2 p-3 bg-red-50 border border-red-200 rounded-lg">
                                                <svg class="w-4 h-4 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                          d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>
                                                <span class="text-sm text-red-600 font-medium">{{ $message }}</span>
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="space-y-2">
                                        <label for="date" class="flex items-center text-sm font-medium text-gray-700">
                                            <svg class="w-4 h-4 mr-2 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                      d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                            </svg>
                                            HOLIDAY DATE <span class="text-red-500 ml-1">*</span>
                                        </label>
                                        <input
                                            type="date"
                                            id="date"
                                            name="date"
                                            value="{{ old('date') }}"
                                            required
                                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-4 focus:ring-blue-200 focus:border-blue-500 transition-all duration-300 ease-in-out hover:border-gray-400 bg-gray-50 focus:bg-white text-sm"
                                        />
                                        @error('date')
                                            <div class="flex items-center space-x-2 mt-2 p-3 bg-red-50 border border-red-200 rounded-lg">
                                                <svg class="w-4 h-4 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                          d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>
                                                <span class="text-sm text-red-600 font-medium">{{ $message }}</span>
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="space-y-6">
                                    <div class="space-y-2">
                                        <label for="type" class="flex items-center text-sm font-medium text-gray-700">
                                            <svg class="w-4 h-4 mr-2 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                      d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                                            </svg>
                                            HOLIDAY TYPE
                                        </label>
                                        <select
                                            id="type"
                                            name="type"
                                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-4 focus:ring-blue-200 focus:border-blue-500 transition-all duration-300 ease-in-out hover:border-gray-400 bg-gray-50 focus:bg-white text-sm"
                                        >
                                            <option value="">Select Holiday Type</option>
                                            <option value="national" {{ old('type') == 'national' ? 'selected' : '' }}>National</option>
                                            <option value="company" {{ old('type') == 'company' ? 'selected' : '' }}>Company</option>
                                            <option value="festival" {{ old('type') == 'festival' ? 'selected' : '' }}>Festival</option>
                                            <option value="event" {{ old('type') == 'event' ? 'selected' : '' }}>Event</option>
                                        </select>
                                        @error('type')
                                            <div class="flex items-center space-x-2 mt-2 p-3 bg-red-50 border border-red-200 rounded-lg">
                                                <svg class="w-4 h-4 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                          d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>
                                                <span class="text-sm text-red-600 font-medium">{{ $message }}</span>
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="bg-blue-50 rounded-lg p-4 border border-blue-200">
                                        <h4 class="text-sm font-semibold text-gray-900 mb-3 flex items-center">
                                            <svg class="w-4 h-4 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                      d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                            HOLIDAY TYPES:
                                        </h4>
                                        <div class="space-y-3">
                                            <div class="flex items-start space-x-3">
                                                <div class="p-1 bg-gray-100 rounded"><span class="text-sm">🏛️</span></div>
                                                <div>
                                                    <div class="text-sm font-medium text-gray-900">National</div>
                                                    <div class="text-xs text-gray-600">Government declared holidays</div>
                                                </div>
                                            </div>
                                            <div class="flex items-start space-x-3">
                                                <div class="p-1 bg-blue-100 rounded"><span class="text-sm">🏢</span></div>
                                                <div>
                                                    <div class="text-sm font-medium text-gray-900">Company</div>
                                                    <div class="text-xs text-gray-600">Organization specific holidays</div>
                                                </div>
                                            </div>
                                            <div class="flex items-start space-x-3">
                                                <div class="p-1 bg-purple-100 rounded"><span class="text-sm">🎉</span></div>
                                                <div>
                                                    <div class="text-sm font-medium text-gray-900">Festival</div>
                                                    <div class="text-xs text-gray-600">Religious or cultural celebrations</div>
                                                </div>
                                            </div>
                                            <div class="flex items-start space-x-3">
                                                <div class="p-1 bg-green-100 rounded"><span class="text-sm">📅</span></div>
                                                <div>
                                                    <div class="text-sm font-medium text-gray-900">Event</div>
                                                    <div class="text-xs text-gray-600">Special occasions or events</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="space-y-2">
                                <label for="description" class="flex items-center text-sm font-medium text-gray-700">
                                    <svg class="w-4 h-4 mr-2 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                    DESCRIPTION <span class="text-gray-500 text-xs">(Optional)</span>
                                </label>
                                <textarea
                                    id="description"
                                    name="description"
                                    rows="4"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-4 focus:ring-blue-200 focus:border-blue-500 transition-all duration-300 ease-in-out hover:border-gray-400 bg-gray-50 focus:bg-white text-sm resize-none"
                                    placeholder="Add any additional details about this holiday..."
                                >{{ old('description') }}</textarea>
                                <p class="text-xs text-gray-500 flex items-center">
                                    <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    Provide context or significance of this holiday
                                </p>
                                @error('description')
                                    <div class="flex items-center space-x-2 mt-2 p-3 bg-red-50 border border-red-200 rounded-lg">
                                        <svg class="w-4 h-4 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        <span class="text-sm text-red-600 font-medium">{{ $message }}</span>
                                    </div>
                                @enderror
                            </div>

                            <div class="flex flex-col sm:flex-row items-stretch sm:items-center justify-between gap-3 sm:gap-4 pt-4 border-t border-gray-200">
                                <div class="flex items-center text-xs sm:text-sm text-gray-500">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    Fields marked with <span class="text-red-500 mx-1">*</span> are required
                                </div>

                                <div class="flex flex-col sm:flex-row w-full sm:w-auto gap-2 sm:gap-3">
                                    <a href="{{ route('holidays.index') }}"
                                       class="inline-flex items-center justify-center w-full sm:w-auto px-5 sm:px-6 py-2.5 sm:py-3 border border-gray-300 text-gray-700 bg-white font-semibold rounded-lg shadow-sm hover:bg-gray-50 hover:scale-[1.02] transform transition-all duration-300 ease-in-out focus:outline-none focus:ring-4 focus:ring-gray-300"
                                       aria-label="Cancel and go back to holiday list"
                                    >
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                        Cancel
                                    </a>

                                    <button type="submit"
                                            class="theme-app inline-flex items-center justify-center w-full sm:w-auto px-6 sm:px-8 py-2.5 sm:py-3 font-semibold rounded-lg shadow-lg hover:scale-[1.02] transform transition-all duration-300 ease-in-out focus:outline-none focus:ring-4"
                                            style="background-color: var(--hover-bg); color: var(--primary-text);"
                                            onmouseover="this.style.backgroundColor='var(--primary-bg-light)'"
                                            onmouseout="this.style.backgroundColor='var(--hover-bg)'"
                                            aria-label="Add holiday"
                                    >
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                        </svg>
                                        Add Holiday
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endcan
</x-app-layout>
