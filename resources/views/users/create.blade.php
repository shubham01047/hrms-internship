<x-app-layout>
    <x-slot name="header">
        <div class="theme-app p-4 sm:p-6 rounded-lg shadow-sm"
            style="background: linear-gradient(to right, var(--secondary-bg), var(--primary-bg));">
            <div class="max-w-7xl mx-auto">
                {{-- Adjusted for responsiveness --}}
                <div class="flex flex-col sm:flex-row justify-between items-center gap-4 sm:gap-0 lg:mr-24">
                    <div class="flex items-center space-x-2 sm:space-x-3 text-center sm:text-left mb-4 sm:mb-0">
                        <div class="p-2 sm:p-3 rounded-lg sm:rounded-2xl shadow-lg"
                            style="background-color: var(--hover-bg);">
                            <svg class="w-5 h-5 sm:w-6 sm:h-6" style="color: var(--primary-text);" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                        </div>
                        {{-- Reduced heading size for larger screens --}}
                        <h2 class="font-bold text-xl sm:text-xl lg:text-2xl leading-tight"
                            style="color: var(--primary-text);">
                            Create New User
                        </h2>
                    </div>
                    <div class="w-full sm:w-auto">
                        <a href="{{ route('users.index') }}"
                            class="inline-flex items-center justify-center w-full px-4 py-2 sm:px-6 sm:py-3 text-sm sm:text-base font-semibold rounded-lg shadow-lg hover:scale-105 transform transition-all duration-300 ease-in-out focus:outline-none focus:ring-4"
                            style="background-color: var(--hover-bg); color: var(--primary-text);"
                            onmouseover="this.style.backgroundColor='var(--primary-bg-light)'"
                            onmouseout="this.style.backgroundColor='var(--hover-bg)'">
                            <svg class="w-4 h-4 sm:w-5 sm:h-5 mr-2" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                            </svg>
                            Back to List
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>

    <div class="py-6 sm:py-8">
        <div class="max-w-7xl mx-auto px-1 sm:px-2 lg:px-4"> {{-- increased max-width and reduced padding further --}}
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-xl border border-gray-200">
                <div class="theme-app px-2 py-3 sm:px-3 sm:py-4 border-b border-gray-200"
                    style="background: linear-gradient(to right, var(--secondary-bg), var(--primary-bg));">
                    {{-- reduced header padding --}}
                    <div class="flex items-center space-x-2 sm:space-x-3">
                        <div class="p-2 rounded-lg shadow-sm" style="background-color: var(--hover-bg);">
                            <svg class="w-4 h-4 sm:w-5 sm:h-5" style="color: var(--primary-text);" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-base sm:text-lg font-semibold" style="color: var(--primary-text);">Create
                                User Information</h3>
                            <p class="text-xs sm:text-sm" style="color: var(--secondary-text);">Add new user details and
                                role assignments</p>
                        </div>
                    </div>
                </div>

                <div class="p-2 sm:p-4"> {{-- reduced form content padding --}}
                    <form id="userCreateForm" action="{{ route('users.store') }}" method="POST"
                        class="space-y-4 sm:space-y-8" enctype="multipart/form-data">
                        @csrf

                        {{-- User Information Section --}}
                        <div class="bg-gray-50 rounded-lg p-2 sm:p-4 border border-gray-200"> {{-- reduced section padding --}}
                            <div class="space-y-2 sm:space-y-4">
                                <div class="flex items-center space-x-1.5 sm:space-x-2 mb-2 sm:mb-4">
                                    <svg class="w-4 h-4 sm:w-5 sm:h-5 text-gray-600" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z">
                                        </path>
                                    </svg>
                                    <h4 class="theme-app text-base sm:text-lg font-semibold"
                                        style="color: var(--secondary-text);">User Information</h4>
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 sm:gap-6">
                                    <div class="space-y-2">
                                        <label for="name" class="block text-sm font-semibold text-gray-700">
                                            <div class="flex items-center space-x-1.5 sm:space-x-2">
                                                <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 text-gray-500" fill="none"
                                                    stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z">
                                                    </path>
                                                </svg>
                                                <span>Full Name</span>
                                                <span class="text-red-500">*</span>
                                            </div>
                                        </label>
                                        <input type="text" name="name" id="name" value="{{ old('name') }}"
                                            placeholder="Enter full name"
                                            class="w-full px-3 py-2.5 sm:px-4 sm:py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-4 focus:ring-blue-200 focus:border-blue-500 transition-all duration-300 ease-in-out hover:border-gray-400 bg-white text-sm">
                                        <div id="name-error"
                                            class="hidden flex items-center space-x-2 mt-2 p-2 sm:p-3 bg-red-50 border border-red-200 rounded-lg">
                                            <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 text-red-500" fill="none"
                                                stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                            <span class="text-xs sm:text-sm text-red-600 font-medium"></span>
                                        </div>
                                        @error('name')
                                            <div
                                                class="flex items-center space-x-2 mt-2 p-2 sm:p-3 bg-red-50 border border-red-200 rounded-lg">
                                                <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 text-red-500" fill="none"
                                                    stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                </svg>
                                                <span
                                                    class="text-xs sm:text-sm text-red-600 font-medium">{{ $message }}</span>
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="space-y-2">
                                        <label for="email" class="block text-sm font-semibold text-gray-700">
                                            <div class="flex items-center space-x-1.5 sm:space-x-2">
                                                <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 text-gray-500" fill="none"
                                                    stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                                    </path>
                                                </svg>
                                                <span>Email Address</span>
                                                <span class="text-red-500">*</span>
                                            </div>
                                        </label>
                                        <input type="email" name="email" id="email"
                                            value="{{ old('email') }}" placeholder="Enter email address"
                                            class="w-full px-3 py-2.5 sm:px-4 sm:py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-4 focus:ring-blue-200 focus:border-blue-500 transition-all duration-300 ease-in-out hover:border-gray-400 bg-white text-sm">
                                        <div id="email-error"
                                            class="hidden flex items-center space-x-2 mt-2 p-2 sm:p-3 bg-red-50 border border-red-200 rounded-lg">
                                            <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 text-red-500" fill="none"
                                                stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                            <span class="text-xs sm:text-sm text-red-600 font-medium"></span>
                                        </div>
                                        @error('email')
                                            <div
                                                class="flex items-center space-x-2 mt-2 p-2 sm:p-3 bg-red-50 border border-red-200 rounded-lg">
                                                <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 text-red-500" fill="none"
                                                    stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                </svg>
                                                <span
                                                    class="text-xs sm:text-sm text-red-600 font-medium">{{ $message }}</span>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Password Section --}}
                        <div class="bg-green-50 rounded-lg p-2 sm:p-4 border border-green-200">
                            <div class="flex items-center space-x-1.5 sm:space-x-2 mb-4 sm:mb-6">
                                <svg class="w-4 h-4 sm:w-5 sm:h-5 text-green-600" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z">
                                    </path>
                                </svg>
                                <h4 class="theme-app text-base sm:text-lg font-semibold"
                                    style="color: var(--secondary-text);">Security Information</h4>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 sm:gap-6">
                                <div class="space-y-2">
                                    <label for="password" class="block text-sm font-semibold text-gray-700">
                                        <div class="flex items-center space-x-1.5 sm:space-x-2">
                                            <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 text-gray-500" fill="none"
                                                stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z">
                                                </path>
                                            </svg>
                                            <span>Password</span>
                                            <span class="text-red-500">*</span>
                                        </div>
                                    </label>
                                    <div class="relative">
                                        <input type="password" name="password" id="password"
                                            placeholder="Enter secure password"
                                            class="w-full px-3 py-2.5 sm:px-4 sm:py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-4 focus:ring-green-200 focus:border-green-500 transition-all duration-300 ease-in-out hover:border-gray-400 bg-white text-sm pr-10">
                                        <button type="button" id="togglePassword"
                                            class="absolute inset-y-0 right-0 pr-3 flex items-center">
                                            <svg id="eyeIcon" class="w-4 h-4 text-gray-400 hover:text-gray-600"
                                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                                </path>
                                            </svg>
                                        </button>
                                    </div>
                                    <div id="password-error"
                                        class="hidden flex items-center space-x-2 mt-2 p-2 sm:p-3 bg-red-50 border border-red-200 rounded-lg">
                                        <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 text-red-500" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        <span class="text-xs sm:text-sm text-red-600 font-medium"></span>
                                    </div>
                                    @error('password')
                                        <div
                                            class="flex items-center space-x-2 mt-2 p-2 sm:p-3 bg-red-50 border border-red-200 rounded-lg">
                                            <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 text-red-500" fill="none"
                                                stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                            <span
                                                class="text-xs sm:text-sm text-red-600 font-medium">{{ $message }}</span>
                                        </div>
                                    @enderror
                                </div>

                                <div class="space-y-2">
                                    <label for="confirm_password" class="block text-sm font-semibold text-gray-700">
                                        <div class="flex items-center space-x-1.5 sm:space-x-2">
                                            <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 text-gray-500" fill="none"
                                                stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.031 9-11.622 0-1.042-.133-2.052-.382-3.016z">
                                                </path>
                                            </svg>
                                            <span>Confirm Password</span>
                                            <span class="text-red-500">*</span>
                                        </div>
                                    </label>
                                    <div class="relative">
                                        <input type="password" name="confirm_password" id="confirm_password"
                                            placeholder="Confirm your password"
                                            class="w-full px-3 py-2.5 sm:px-4 sm:py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-4 focus:ring-green-200 focus:border-green-500 transition-all duration-300 ease-in-out hover:border-gray-400 bg-white text-sm pr-10">
                                        <button type="button" id="toggleConfirmPassword"
                                            class="absolute inset-y-0 right-0 pr-3 flex items-center">
                                            <svg id="eyeIconConfirm" class="w-4 h-4 text-gray-400 hover:text-gray-600"
                                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                                </path>
                                            </svg>
                                        </button>
                                    </div>
                                    <div id="confirm-password-error"
                                        class="hidden flex items-center space-x-2 mt-2 p-2 sm:p-3 bg-red-50 border border-red-200 rounded-lg">
                                        <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 text-red-500" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        <span class="text-xs sm:text-sm text-red-600 font-medium"></span>
                                    </div>
                                    @error('confirm_password')
                                        <div
                                            class="flex items-center space-x-2 mt-2 p-2 sm:p-3 bg-red-50 border border-red-200 rounded-lg">
                                            <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 text-red-500" fill="none"
                                                stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                            <span
                                                class="text-xs sm:text-sm text-red-600 font-medium">{{ $message }}</span>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        {{-- Personal & Employment Details --}}
                        <div class="bg-gray-50 rounded-lg p-2 sm:p-4 border border-gray-200 mt-4">
                            <div class="flex items-center space-x-1.5 sm:space-x-2 mb-4">
                                <svg class="w-4 h-4 sm:w-5 sm:h-5 text-gray-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M20 13V7a2 2 0 00-2-2h-3.5a2 2 0 01-1.6-.8l-.9-1.2a2 2 0 00-1.6-.8H6a2 2 0 00-2 2v10">
                                    </path>
                                </svg>
                                <h4 class="theme-app text-base sm:text-lg font-semibold"
                                    style="color: var(--secondary-text);">Personal & Employment Details</h4>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 sm:gap-6">
                                {{-- Gender --}}
                                <div class="space-y-2">
                                    <label class="block text-sm font-semibold text-gray-700">Gender</label>
                                    <select name="gender"
                                        class="w-full px-3 py-2.5 sm:px-4 sm:py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-4 focus:ring-blue-200 focus:border-blue-500 transition-all duration-300 bg-white text-sm">
                                        <option value="">-- Select Gender --</option>
                                        <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male
                                        </option>
                                        <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>
                                            Female</option>
                                        <option value="Other" {{ old('gender') == 'Other' ? 'selected' : '' }}>Other
                                        </option>
                                    </select>
                                </div>

                                {{-- Date of Birth --}}
                                <div class="space-y-2">
                                    <label class="block text-sm font-semibold text-gray-700">Date of Birth</label>
                                    <input type="date" name="date_of_birth" value="{{ old('date_of_birth') }}"
                                        class="w-full px-3 py-2.5 sm:px-4 sm:py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-4 focus:ring-blue-200 focus:border-blue-500 transition-all duration-300 bg-white text-sm">
                                </div>

                                {{-- Contact Number --}}
                                <div class="space-y-2">
                                    <label class="block text-sm font-semibold text-gray-700">Contact Number</label>
                                    <input type="number" name="contact_number" id="contact_number" value="{{ old('contact_number') }}"
                                        class="w-full px-3 py-2.5 sm:px-4 sm:py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-4 focus:ring-blue-200 focus:border-blue-500 transition-all duration-300 bg-white text-sm">
                                </div>

                                {{-- Address --}}
                                <div class="space-y-2">
                                    <label class="block text-sm font-semibold text-gray-700">Address</label>
                                    <input type="text" name="address" value="{{ old('address') }}"
                                        placeholder="House, Street, Area"
                                        class="w-full px-3 py-2.5 sm:px-4 sm:py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-4 focus:ring-blue-200 focus:border-blue-500 transition-all duration-300 bg-white text-sm">
                                </div>

                                {{-- City --}}
                                <div class="space-y-2">
                                    <label class="block text-sm font-semibold text-gray-700">City</label>
                                    <input type="text" name="city" value="{{ old('city') }}"
                                        class="w-full px-3 py-2.5 sm:px-4 sm:py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-4 focus:ring-blue-200 focus:border-blue-500 transition-all duration-300 bg-white text-sm">
                                </div>

                                {{-- State --}}
                                <div class="space-y-2">
                                    <label class="block text-sm font-semibold text-gray-700">State</label>
                                    <input type="text" name="state" value="{{ old('state') }}"
                                        class="w-full px-3 py-2.5 sm:px-4 sm:py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-4 focus:ring-blue-200 focus:border-blue-500 transition-all duration-300 bg-white text-sm">
                                </div>

                                {{-- Country --}}
                                <div class="space-y-2">
                                    <label class="block text-sm font-semibold text-gray-700">Country</label>
                                    <input type="text" name="country" value="{{ old('country') }}"
                                        class="w-full px-3 py-2.5 sm:px-4 sm:py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-4 focus:ring-blue-200 focus:border-blue-500 transition-all duration-300 bg-white text-sm">
                                </div>

                                {{-- Pin Code --}}
                                <div class="space-y-2">
                                    <label class="block text-sm font-semibold text-gray-700">Pin Code</label>
                                    <input type="number" name="pin_code" value="{{ old('pin_code') }}"
                                        class="w-full px-3 py-2.5 sm:px-4 sm:py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-4 focus:ring-blue-200 focus:border-blue-500 transition-all duration-300 bg-white text-sm">
                                </div>

                                {{-- Joining Date --}}
                                <div class="space-y-2">
                                    <label class="block text-sm font-semibold text-gray-700">Joining Date</label>
                                    <input type="date" name="joining_date" value="{{ old('joining_date') }}"
                                        class="w-full px-3 py-2.5 sm:px-4 sm:py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-4 focus:ring-blue-200 focus:border-blue-500 transition-all duration-300 bg-white text-sm">
                                </div>

                                {{-- Employment Type --}}
                                <div class="space-y-2">
                                    <label class="block text-sm font-semibold text-gray-700">Employment Type</label>
                                    <select name="employment_type" id="employment_type" required
                                        class="w-full px-3 py-2.5 sm:px-4 sm:py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-4 focus:ring-blue-200 focus:border-blue-500 transition-all duration-300 bg-white text-sm">
                                        <option value="">-- Select Employment Type --</option>
                                        <option value="full_time">Full-Time</option>
                                        <option value="part_time">Part-Time</option>
                                        <option value="intern">Intern</option>
                                        <option value="trainee">Trainee</option>
                                        <option value="Contract">Contract</option>
                                    </select>
                                </div>

                                {{-- Status --}}
                                <div class="space-y-2">
                                    <label class="block text-sm font-semibold text-gray-700">Status</label>
                                    <select name="status" id="status" required
                                        class="w-full px-3 py-2.5 sm:px-4 sm:py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-4 focus:ring-blue-200 focus:border-blue-500 transition-all duration-300 bg-white text-sm">
                                        <option value="">-- Select Status --</option>
                                        <option value="active">Active</option>
                                        <option value="inactive">Inactive</option>
                                        <option value="terminated">Terminated</option>
                                    </select>
                                </div>

                                {{-- Resume --}}
                                <div class="space-y-2">
                                    <label class="block text-sm font-semibold text-gray-700">Resume</label>
                                    <input type="file" name="resume"
                                        class="w-full px-3 py-2.5 sm:px-4 sm:py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-4 focus:ring-blue-200 focus:border-blue-500 transition-all duration-300 bg-white text-sm">
                                </div>

                                {{-- Aadhar Card --}}
                                <div class="space-y-2">
                                    <label class="block text-sm font-semibold text-gray-700">Aadhar Card</label>
                                    <input type="file" name="aadhar_card"
                                        class="w-full px-3 py-2.5 sm:px-4 sm:py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-4 focus:ring-blue-200 focus:border-blue-500 transition-all duration-300 bg-white text-sm">
                                </div>

                                {{-- PAN Card --}}
                                <div class="space-y-2">
                                    <label class="block text-sm font-semibold text-gray-700">PAN Card</label>
                                    <input type="file" name="pan_card"
                                        class="w-full px-3 py-2.5 sm:px-4 sm:py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-4 focus:ring-blue-200 focus:border-blue-500 transition-all duration-300 bg-white text-sm">
                                </div>

                                {{-- Leave Balance --}}
                                <div class="space-y-2">
                                    <label class="block text-sm font-semibold text-gray-700">Leave Balance</label>
                                    <input type="number" name="leave_balance" value="{{ old('leave_balance') }}"
                                        class="w-full px-3 py-2.5 sm:px-4 sm:py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-4 focus:ring-blue-200 focus:border-blue-500 transition-all duration-300 bg-white text-sm">
                                </div>
                            </div>
                        </div>

                        {{-- Roles Assignment Section --}}
                        <div class="bg-blue-50 rounded-lg p-2 sm:p-4 border border-blue-200">
                            <div class="flex items-center space-x-1.5 sm:space-x-2 mb-4 sm:mb-6">
                                <svg class="w-4 h-4 sm:w-5 sm:h-5 text-blue-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.031 9-11.622 0-1.042-.133-2.052-.382-3.016z">
                                    </path>
                                </svg>
                                <h4 class="theme-app text-base sm:text-lg font-semibold"
                                    style="color: var(--secondary-text);">Role Assignment</h4>
                            </div>

                            @if ($roles->isNotEmpty())
                                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-3 sm:gap-4">
                                    @foreach ($roles as $role)
                                        <div
                                            class="bg-white rounded-lg p-3 sm:p-4 border border-gray-200 hover:border-blue-300 hover:shadow-md transition-all duration-300 ease-in-out transform hover:scale-[1.01]">
                                            <label for="role-{{ $role->id }}"
                                                class="flex items-center space-x-2 sm:space-x-3 cursor-pointer">
                                                <input type="checkbox" name="role[]" value="{{ $role->name }}"
                                                    id="role-{{ $role->id }}"
                                                    class="role-checkbox w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2 transition-all duration-200">
                                                <div class="flex items-center space-x-1.5 sm:space-x-2">
                                                    <div
                                                        class="w-7 h-7 sm:w-8 sm:h-8 bg-gradient-to-r from-blue-100 to-blue-200 rounded-full flex items-center justify-center">
                                                        <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 text-blue-600"
                                                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z">
                                                            </path>
                                                        </svg>
                                                    </div>
                                                    <span
                                                        class="text-sm font-medium text-gray-900">{{ ucwords($role->name) }}</span>
                                                </div>
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                                <div id="roles-error"
                                    class="hidden flex items-center space-x-2 mt-4 p-2 sm:p-3 bg-red-50 border border-red-200 rounded-lg">
                                    <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 text-red-500" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <span class="text-xs sm:text-sm text-red-600 font-medium">Please select at least
                                        one role for the user.</span>
                                </div>
                            @else
                                <div class="text-center py-6 sm:py-8">
                                    <div
                                        class="w-14 h-14 sm:w-16 sm:h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-3 sm:mb-4">
                                        <svg class="w-7 h-7 sm:w-8 sm:h-8 text-gray-400" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                                            </path>
                                        </svg>
                                    </div>
                                    <p class="text-sm sm:text-base text-gray-500">No roles available to assign.</p>
                                </div>
                            @endif
                        </div>

                        <div class="bg-yellow-50 rounded-lg p-2 sm:p-3 border border-yellow-200">
                            {{-- reduced notice section padding --}}
                            <div class="flex items-start space-x-2 sm:space-x-3">
                                <svg class="w-4 h-4 sm:w-5 sm:h-5 text-yellow-500 mt-0.5" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16c-.77.833.192 2.5 1.732 2.5z">
                                    </path>
                                </svg>
                                <div>
                                    <h4 class="text-sm sm:text-base font-semibold text-gray-900">Important Notice</h4>
                                    <p class="text-xs sm:text-sm text-gray-600 mt-1">
                                        User roles will determine their access permissions across the system. Choose
                                        carefully.
                                    </p>
                                </div>
                            </div>
                        </div>

                        {{-- Action Buttons --}}
                        <div
                            class="flex flex-col sm:flex-row items-center justify-center sm:justify-end space-y-3 sm:space-y-0 sm:space-x-4 pt-4 sm:pt-6 border-t border-gray-200">
                            <a href="{{ route('users.index') }}"
                                class="theme-app inline-flex items-center justify-center w-full sm:w-auto px-4 py-3 sm:px-6 sm:py-4 font-semibold rounded-lg shadow-lg hover:scale-105 transform transition-all duration-300 ease-in-out focus:outline-none focus:ring-4 text-sm sm:text-base"
                                style="background-color: var(--primary-border); color: var(--primary-text);"
                                onmouseover="this.style.backgroundColor='var(--primary-bg-light)'"
                                onmouseout="this.style.backgroundColor='var(--primary-border)'">
                                <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 mr-2" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                                Cancel
                            </a>
                            <button type="submit" id="createUserBtn"
                                class="theme-app inline-flex items-center justify-center w-full sm:w-auto px-6 py-3 sm:px-8 sm:py-4 font-semibold rounded-lg shadow-lg hover:scale-105 transform transition-all duration-300 ease-in-out focus:outline-none focus:ring-4 text-base sm:text-lg disabled:opacity-50 disabled:cursor-not-allowed disabled:hover:scale-100"
                                style="background-color: var(--hover-bg); color: var(--primary-text);"
                                onmouseover="this.style.backgroundColor='var(--primary-bg-light)'"
                                onmouseout="this.style.backgroundColor='var(--hover-bg)'" disabled>
                                <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 mr-2" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                                <span id="button-text">Create User</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript Validation -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('userCreateForm');
            const nameInput = document.getElementById('name');
            const emailInput = document.getElementById('email');
            const passwordInput = document.getElementById('password');
            const confirmPasswordInput = document.getElementById('confirm_password');
            const roleCheckboxes = document.querySelectorAll('.role-checkbox');
            const submitBtn = document.getElementById('createUserBtn');
            const buttonText = document.getElementById('button-text');

            // Password visibility toggles
            const togglePassword = document.getElementById('togglePassword');
            const toggleConfirmPassword = document.getElementById('toggleConfirmPassword');
            const eyeIcon = document.getElementById('eyeIcon');
            const eyeIconConfirm = document.getElementById('eyeIconConfirm');

            let isSubmitting = false;

            // Validation state
            const validation = {
                name: false,
                email: false,
                password: false,
                confirmPassword: false,
                roles: false
            };

            const genderSelect = form.querySelector('select[name="gender"]');
            const dobInput = form.querySelector('input[name="date_of_birth"]');
            const contactInput = form.querySelector('input[name="contact_number"]');
            const addressInput = form.querySelector('input[name="address"]');
            const cityInput = form.querySelector('input[name="city"]');
            const stateInput = form.querySelector('input[name="state"]');
            const countryInput = form.querySelector('input[name="country"]');
            const pinInput = form.querySelector('input[name="pin_code"]');
            const joiningInput = form.querySelector('input[name="joining_date"]');
            const employmentSelect = document.getElementById('employment_type');
            const statusSelect = document.getElementById('status');

            const resumeInput = form.querySelector('input[name="resume"]');
            const aadharInput = form.querySelector('input[name="aadhar_card"]');
            const panInput = form.querySelector('input[name="pan_card"]');
            const leaveBalanceInput = form.querySelector('input[name="leave_balance"]');

            Object.assign(validation, {
              gender: false,
              dob: false,
              contact: false,
              address: false,
              city: false,
              state: false,
              country: false,
              pin: false,
              joiningDate: false,
              employmentType: false,
              status: false,
              // optional fields: start as valid, only fail if incorrect when provided
              resumeValid: true,
              aadharValid: true,
              panValid: true,
              leaveBalanceValid: true,
            });

            // Password visibility toggle
            togglePassword.addEventListener('click', function() {
                const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordInput.setAttribute('type', type);

                if (type === 'text') {
                    eyeIcon.innerHTML = `
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.878 9.878L3 3m6.878 6.878L21 21"></path>
                    `;
                } else {
                    eyeIcon.innerHTML = `
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                    `;
                }
            });

            toggleConfirmPassword.addEventListener('click', function() {
                const type = confirmPasswordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                confirmPasswordInput.setAttribute('type', type);

                if (type === 'text') {
                    eyeIconConfirm.innerHTML = `
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.878 9.878L3 3m6.878 6.878L21 21"></path>
                    `;
                } else {
                    eyeIconConfirm.innerHTML = `
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                    `;
                }
            });

            // If multiple password inputs exist, remove all but the first to keep design/validation intact.
            const passwordFields = document.querySelectorAll('input[name="password"]');
            if (passwordFields.length > 1) {
                for (let i = 1; i < passwordFields.length; i++) {
                    const wrapper = passwordFields[i].closest('.space-y-2') || passwordFields[i].parentElement;
                    if (wrapper && wrapper.contains(passwordFields[i])) {
                        wrapper.remove();
                    } else {
                        passwordFields[i].remove();
                    }
                }
            }
            // Enforce hidden type for both fields in case any markup discrepancy exists
            if (typeof passwordInput !== 'undefined' && passwordInput) {
                passwordInput.setAttribute('type', 'password');
            }
            if (typeof confirmPasswordInput !== 'undefined' && confirmPasswordInput) {
                confirmPasswordInput.setAttribute('type', 'password');
            }

            // Validation functions
            function validateName() {
                const nameError = document.getElementById('name-error');
                const raw = nameInput.value || '';
                const trimmed = raw.trim();

                if (!trimmed) {
                    showError(nameInput, nameError, 'Full name is required.');
                    validation.name = false;
                    updateSubmitButton();
                    return;
                }

                // exactly one space, no leading/trailing spaces, letters only on both sides
                const spaces = (trimmed.match(/ /g) || []).length;
                if (spaces !== 1) {
                    showError(nameInput, nameError, 'Full name must contain exactly one space (e.g., First Last).');
                    validation.name = false;
                    updateSubmitButton();
                    return;
                }

                if (!/^[A-Za-z]+ [A-Za-z]+$/.test(trimmed)) {
                    showError(nameInput, nameError, 'Use letters only with one space between first and last name.');
                    validation.name = false;
                    updateSubmitButton();
                    return;
                }

                // normalize the input (no extra spaces at ends)
                nameInput.value = trimmed;

                hideError(nameInput, nameError);
                validation.name = true;
                updateSubmitButton();
            }

            function validateEmail() {
                const email = emailInput.value.trim().toLowerCase();
                const emailError = document.getElementById('email-error');
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

                if (!email) {
                    showError(emailInput, emailError, 'Email address is required.');
                    validation.email = false;
                } else if (!emailRegex.test(email)) {
                    showError(emailInput, emailError, 'Please enter a valid email address.');
                    validation.email = false;
                } else if (email.length > 255) {
                    showError(emailInput, emailError, 'Email address must not exceed 255 characters.');
                    validation.email = false;
                } else {
                    hideError(emailInput, emailError);
                    validation.email = true;
                    // Auto-format email
                    emailInput.value = email;
                }

                updateSubmitButton();
            }

            function validatePassword() {
                const password = passwordInput.value;
                const passwordError = document.getElementById('password-error');

                if (!password) {
                    showError(passwordInput, passwordError, 'Password is required.');
                    validation.password = false;
                } else if (password.length < 8) {
                    showError(passwordInput, passwordError, 'Password must be at least 8 characters long.');
                    validation.password = false;
                } else if (password.length > 255) {
                    showError(passwordInput, passwordError, 'Password must not exceed 255 characters.');
                    validation.password = false;
                } else if (!/(?=.*[a-z])(?=.*[A-Z])(?=.*\d)/.test(password)) {
                    showError(
                      passwordInput,
                      passwordError,
                      'Password must contain at least one uppercase letter, one lowercase letter, and one number.'
                    );
                    validation.password = false;
                } else {
                    hideError(passwordInput, passwordError);
                    validation.password = true;
                }

                if (confirmPasswordInput.value) {
                    validateConfirmPassword();
                }

                updateSubmitButton();
            }

            function validateConfirmPassword() {
                const password = passwordInput.value;
                const confirmPassword = confirmPasswordInput.value;
                const confirmPasswordError = document.getElementById('confirm-password-error');

                if (!confirmPassword) {
                    showError(confirmPasswordInput, confirmPasswordError, 'Please confirm your password.');
                    validation.confirmPassword = false;
                } else if (password !== confirmPassword) {
                    showError(confirmPasswordInput, confirmPasswordError, 'Passwords do not match.');
                    validation.confirmPassword = false;
                } else {
                    hideError(confirmPasswordInput, confirmPasswordError);
                    validation.confirmPassword = true;
                }

                updateSubmitButton();
            }

            function validateRoles() {
                const checkedRoles = Array.from(roleCheckboxes).filter(cb => cb.checked);
                const rolesError = document.getElementById('roles-error');

                if (checkedRoles.length === 0) {
                    rolesError.classList.remove('hidden');
                    validation.roles = false;
                } else {
                    rolesError.classList.add('hidden');
                    validation.roles = true;
                }

                updateSubmitButton();
            }

            function showError(input, errorElement, message) {
                input.classList.remove('border-gray-300', 'border-green-500');
                input.classList.add('border-red-500');
                errorElement.querySelector('span').textContent = message;
                errorElement.classList.remove('hidden');
            }

            function hideError(input, errorElement) {
                input.classList.remove('border-red-500');
                input.classList.add('border-green-500');
                errorElement.classList.add('hidden');
            }

            function updateSubmitButton() {
                const allValid = Object.values(validation).every(v => v === true);

                if (allValid && !isSubmitting) {
                    submitBtn.disabled = false;
                    submitBtn.classList.remove('opacity-50', 'cursor-not-allowed');
                    buttonText.textContent = 'Create User';
                } else {
                    submitBtn.disabled = true;
                    submitBtn.classList.add('opacity-50', 'cursor-not-allowed');
                    if (!isSubmitting) {
                        buttonText.textContent = 'Please Complete All Fields';
                    }
                }
            }

            function scrollToFirstError() {
                const firstError = document.querySelector(
                    '.border-red-500, .flex.items-center.space-x-2:not(.hidden)');
                if (firstError) {
                    firstError.scrollIntoView({
                        behavior: 'smooth',
                        block: 'center'
                    });
                    if (firstError.tagName === 'INPUT' || firstError.tagName === 'SELECT' || firstError.tagName ===
                        'TEXTAREA') {
                        setTimeout(() => firstError.focus(), 500);
                    }
                }
            }

            function ensureErrorBox(field, id) {
                let container = field.closest('.space-y-2') || field.parentElement;
                if (!container) container = field;

                let err = container.querySelector('#' + id);
                if (!err) {
                    err = document.createElement('div');
                    err.id = id;
                    err.className = 'hidden flex items-center space-x-2 mt-2 p-2 sm:p-3 bg-red-50 border border-red-200 rounded-lg';
                    err.innerHTML = `
                        <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span class="text-xs sm:text-sm text-red-600 font-medium"></span>
                    `;
                    container.appendChild(err);
                }
                return err;
            }

            function validateGender() {
                if (!genderSelect) return;
                const err = ensureErrorBox(genderSelect, 'gender-error-dyn');
                if (!genderSelect.value) {
                    showError(genderSelect, err, 'Please select a gender.');
                    validation.gender = false;
                } else {
                    hideError(genderSelect, err);
                    validation.gender = true;
                }
                updateSubmitButton();
            }

            function validateDOB() {
                if (!dobInput) return;
                const err = ensureErrorBox(dobInput, 'dob-error-dyn');
                const val = (dobInput.value || '').trim();
                if (!val) {
                    showError(dobInput, err, 'Date of birth is required.');
                    validation.dob = false;
                } else {
                    const d = new Date(val);
                    const today = new Date();
                    // Strip time
                    d.setHours(0,0,0,0); today.setHours(0,0,0,0);
                    if (isNaN(d.getTime())) {
                        showError(dobInput, err, 'Please enter a valid date.');
                        validation.dob = false;
                    } else if (d > today) {
                        showError(dobInput, err, 'Date of birth cannot be in the future.');
                        validation.dob = false;
                    } else {
                        hideError(dobInput, err);
                        validation.dob = true;
                    }
                }
                updateSubmitButton();
            }

            function validateContact() {
                if (!contactInput) return;
                const err = ensureErrorBox(contactInput, 'contact-error-dyn');
                const digits = String(contactInput.value || '').replace(/\D/g, '');
                contactInput.value = digits; // normalize
                if (!digits) {
                    showError(contactInput, err, 'Contact number is required.');
                    validation.contact = false;
                } else if (!/^\d{7,15}$/.test(digits)) {
                    showError(contactInput, err, 'Enter a valid contact number (7–15 digits).');
                    validation.contact = false;
                } else {
                    hideError(contactInput, err);
                    validation.contact = true;
                }
                updateSubmitButton();
            }

            function validateRequiredText(inputEl, key, label, minLen = 1) {
                if (!inputEl) { validation[key] = true; return; }
                const err = ensureErrorBox(inputEl, key + '-error-dyn');
                const val = (inputEl.value || '').trim();
                if (!val || val.length < minLen) {
                    showError(inputEl, err, `${label} is required.`);
                    validation[key] = false;
                } else {
                    hideError(inputEl, err);
                    validation[key] = true;
                }
                updateSubmitButton();
            }

            function validatePin() {
                if (!pinInput) return;
                const err = ensureErrorBox(pinInput, 'pin-error-dyn');
                const digits = String(pinInput.value || '').replace(/\D/g, '');
                pinInput.value = digits; // normalize
                if (!digits) {
                    showError(pinInput, err, 'Pin code is required.');
                    validation.pin = false;
                } else if (!/^\d{4,10}$/.test(digits)) {
                    showError(pinInput, err, 'Pin code must be 4–10 digits.');
                    validation.pin = false;
                } else {
                    hideError(pinInput, err);
                    validation.pin = true;
                }
                updateSubmitButton();
            }

            function validateJoiningDate() {
                if (!joiningInput) return;
                const err = ensureErrorBox(joiningInput, 'joining-error-dyn');
                const val = (joiningInput.value || '').trim();
                if (!val) {
                    showError(joiningInput, err, 'Joining date is required.');
                    validation.joiningDate = false;
                } else {
                    hideError(joiningInput, err);
                    validation.joiningDate = true;
                }
                updateSubmitButton();
            }

            function validateEmploymentType() {
                if (!employmentSelect) return;
                const err = ensureErrorBox(employmentSelect, 'employment-type-error-dyn');
                if (!employmentSelect.value) {
                    showError(employmentSelect, err, 'Please select an employment type.');
                    validation.employmentType = false;
                } else {
                    hideError(employmentSelect, err);
                    validation.employmentType = true;
                }
                updateSubmitButton();
            }

            function validateStatus() {
                if (!statusSelect) return;
                const err = ensureErrorBox(statusSelect, 'status-error-dyn');
                if (!statusSelect.value) {
                    showError(statusSelect, err, 'Please select a status.');
                    validation.status = false;
                } else {
                    hideError(statusSelect, err);
                    validation.status = true;
                }
                updateSubmitButton();
            }

            // Optional fields: validate only if provided
            function validateFile(inputEl, key, label, exts, maxMB) {
                if (!inputEl) { validation[key] = true; return; }
                const err = ensureErrorBox(inputEl, key + '-error-dyn');
                const f = inputEl.files && inputEl.files[0];
                if (!f) {
                    // no file = treat as valid (optional)
                    hideError(inputEl, err);
                    validation[key] = true;
                } else {
                    const sizeMB = f.size / (1024 * 1024);
                    const ext = (f.name.split('.').pop() || '').toLowerCase();
                    if (!exts.includes(ext)) {
                        showError(inputEl, err, `${label} must be one of: ${exts.join(', ')}.`);
                        validation[key] = false;
                    } else if (sizeMB > maxMB) {
                        showError(inputEl, err, `${label} must be ≤ ${maxMB} MB.`);
                        validation[key] = false;
                    } else {
                        hideError(inputEl, err);
                        validation[key] = true;
                    }
                }
                updateSubmitButton();
            }

            function validateLeaveBalance() {
                if (!leaveBalanceInput) { validation.leaveBalanceValid = true; return; }
                const err = ensureErrorBox(leaveBalanceInput, 'leave-balance-error-dyn');
                const raw = String(leaveBalanceInput.value || '').trim();
                if (!raw) {
                    // optional, empty is fine
                    hideError(leaveBalanceInput, err);
                    validation.leaveBalanceValid = true;
                } else if (!/^\d+$/.test(raw)) {
                    showError(leaveBalanceInput, err, 'Leave balance must be a non-negative integer.');
                    validation.leaveBalanceValid = false;
                } else {
                    hideError(leaveBalanceInput, err);
                    validation.leaveBalanceValid = true;
                }
                updateSubmitButton();
            }

            // Event listeners
            nameInput.addEventListener('input', validateName);
            nameInput.addEventListener('blur', validateName);

            emailInput.addEventListener('input', validateEmail);
            emailInput.addEventListener('blur', validateEmail);

            passwordInput.addEventListener('input', validatePassword);
            passwordInput.addEventListener('blur', validatePassword);

            confirmPasswordInput.addEventListener('input', validateConfirmPassword);
            confirmPasswordInput.addEventListener('blur', validateConfirmPassword);

            roleCheckboxes.forEach(checkbox => {
                checkbox.addEventListener('change', validateRoles);
            });

            if (genderSelect) genderSelect.addEventListener('change', validateGender);
            if (dobInput) { dobInput.addEventListener('input', validateDOB); dobInput.addEventListener('blur', validateDOB); }
            if (contactInput) { contactInput.addEventListener('input', validateContact); contactInput.addEventListener('blur', validateContact); }
            if (addressInput) { addressInput.addEventListener('input', () => validateRequiredText(addressInput, 'address', 'Address')); addressInput.addEventListener('blur', () => validateRequiredText(addressInput, 'address', 'Address')); }
            if (cityInput) { cityInput.addEventListener('input', () => validateRequiredText(cityInput, 'city', 'City')); cityInput.addEventListener('blur', () => validateRequiredText(cityInput, 'city', 'City')); }
            if (stateInput) { stateInput.addEventListener('input', () => validateRequiredText(stateInput, 'state', 'State')); stateInput.addEventListener('blur', () => validateRequiredText(stateInput, 'state', 'State')); }
            if (countryInput) { countryInput.addEventListener('input', () => validateRequiredText(countryInput, 'country', 'Country')); countryInput.addEventListener('blur', () => validateRequiredText(countryInput, 'country', 'Country')); }
            if (pinInput) { pinInput.addEventListener('input', validatePin); pinInput.addEventListener('blur', validatePin); }
            if (joiningInput) { joiningInput.addEventListener('input', validateJoiningDate); joiningInput.addEventListener('blur', validateJoiningDate); }
            if (employmentSelect) employmentSelect.addEventListener('change', validateEmploymentType);
            if (statusSelect) statusSelect.addEventListener('change', validateStatus);

            if (resumeInput) resumeInput.addEventListener('change', () => validateFile(resumeInput, 'resumeValid', 'Resume', ['pdf', 'doc', 'docx'], 5));
            if (aadharInput) aadharInput.addEventListener('change', () => validateFile(aadharInput, 'aadharValid', 'Aadhar card', ['pdf', 'jpg', 'jpeg', 'png'], 5));
            if (panInput) panInput.addEventListener('change', () => validateFile(panInput, 'panValid', 'PAN card', ['pdf', 'jpg', 'jpeg', 'png'], 5));
            if (leaveBalanceInput) { leaveBalanceInput.addEventListener('input', validateLeaveBalance); leaveBalanceInput.addEventListener('blur', validateLeaveBalance); }

            // Form submission
            form.addEventListener('submit', function(e) {
                e.preventDefault();

                if (isSubmitting) return;

                // Validate all fields
                validateName();
                validateEmail();
                validatePassword();
                validateConfirmPassword();
                validateRoles();

                // New validations for Personal & Employment Details
                validateGender();
                validateDOB();
                validateContact();
                validateRequiredText(addressInput, 'address', 'Address');
                validateRequiredText(cityInput, 'city', 'City');
                validateRequiredText(stateInput, 'state', 'State');
                validateRequiredText(countryInput, 'country', 'Country');
                validatePin();
                validateJoiningDate();
                validateEmploymentType();
                validateStatus();
                validateFile(resumeInput, 'resumeValid', 'Resume', ['pdf', 'doc', 'docx'], 5);
                validateFile(aadharInput, 'aadharValid', 'Aadhar card', ['pdf', 'jpg', 'jpeg', 'png'], 5);
                validateFile(panInput, 'panValid', 'PAN card', ['pdf', 'jpg', 'jpeg', 'png'], 5);
                validateLeaveBalance();

                const allValid = Object.values(validation).every(v => v === true);

                if (!allValid) {
                    scrollToFirstError();
                    return;
                }

                // Show loading state
                isSubmitting = true;
                submitBtn.disabled = true;
                submitBtn.classList.add('opacity-75');
                buttonText.innerHTML = `
                    <svg class="animate-spin -ml-1 mr-3 h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    Creating User...
                `;

                // Submit the form
                setTimeout(() => {
                    form.submit();
                }, 500);
            });

            validateGender(); validateDOB(); validateContact();
            validateRequiredText(addressInput, 'address', 'Address');
            validateRequiredText(cityInput, 'city', 'City');
            validateRequiredText(stateInput, 'state', 'State');
            validateRequiredText(countryInput, 'country', 'Country');
            validatePin(); validateJoiningDate(); validateEmploymentType(); validateStatus();
            // optional fields start valid; no need to trigger now

            // Initial validation
            updateSubmitButton();
        });
    </script>

    <style>
        /* Loading spinner animation */
        @keyframes spin {
            from {
                transform: rotate(0deg);
            }

            to {
                transform: rotate(360deg);
            }
        }

        .animate-spin {
            animation: spin 1s linear infinite;
        }

        /* Smooth transitions for form elements */
        input,
        select,
        textarea {
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }

        /* Password strength bar animation */
        /* Hide native password reveal/clear icons */
        input[type="password"]::-ms-reveal,
        input[type="password"]::-ms-clear {
            display: none;
        }
    </style>
</x-app-layout>
