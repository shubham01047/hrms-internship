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
                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                </path>
                            </svg>
                        </div>
                        {{-- Reduced heading size for larger screens --}}
                        <h2 class="font-bold text-xl sm:text-xl lg:text-2xl leading-tight"
                            style="color: var(--primary-text);">
                            Edit User
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
        <!-- Increased max-width from max-w-6xl to max-w-7xl and reduced horizontal padding -->
        <div class="max-w-7xl mx-auto px-1 sm:px-2 lg:px-4">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-xl border border-gray-200">
                <!-- Reduced header section padding -->
                <div class="theme-app px-2 py-3 sm:px-3 sm:py-4 border-b border-gray-200"
                    style="background: linear-gradient(to right, var(--secondary-bg), var(--primary-bg));">
                    <div class="flex items-center space-x-2 sm:space-x-3">
                        <div class="p-2 rounded-lg shadow-sm" style="background-color: var(--hover-bg);">
                            <svg class="w-4 h-4 sm:w-5 sm:h-5" style="color: var(--primary-text);" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7-7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-base sm:text-lg font-semibold" style="color: var(--primary-text);">Update
                                User Information</h3>
                            <p class="text-xs sm:text-sm" style="color: var(--secondary-text);">Modify user details and
                                role assignments</p>
                        </div>
                    </div>
                </div>

                <!-- Reduced form content padding from p-4 sm:p-8 to p-2 sm:p-4 -->
                <div class="p-2 sm:p-4">
                    <form id="userEditForm" action="{{ route('users.update', $users->id) }}" method="POST"
                        class="space-y-4 sm:space-y-8" enctype="multipart/form-data">
                        @csrf

                        {{-- User Information Section --}}
                        <div class="bg-gray-50 rounded-lg p-4 sm:p-6 border border-gray-200">
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
                                        <input type="text" name="name" id="name"
                                            value="{{ old('name', $users->name) }}" placeholder="Enter full name"
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
                                            value="{{ old('email', $users->email) }}"
                                            placeholder="Enter email address"
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

                        <div class="bg-gray-50 rounded-lg p-4 sm:p-6 border border-gray-200">
                            <div class="flex items-center space-x-2 sm:space-x-3 mb-4 sm:mb-6">
                                <svg class="w-4 h-4 sm:w-5 sm:h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M12 14a7 7 0 00-7 7h14a7 7 0 00-7-7zM16 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                                </svg>
                                <h4 class="theme-app text-base sm:text-lg font-semibold" style="color: var(--secondary-text);">
                                    Additional Information
                                </h4>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 sm:gap-6">
                                <div class="space-y-2">
                                    <label class="block text-sm font-semibold text-gray-700">Gender</label>
                                    <select name="gender"
                                            class="w-full px-3 py-2.5 sm:px-4 sm:py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-4 focus:ring-blue-200 focus:border-blue-500 transition-all duration-300 bg-white text-sm">
                                        <option value="">-- Select Gender --</option>
                                        <option value="male"   {{ old('gender', $users->gender) == 'male' ? 'selected' : '' }}>Male</option>
                                        <option value="female" {{ old('gender', $users->gender) == 'female' ? 'selected' : '' }}>Female</option>
                                        <option value="other"  {{ old('gender', $users->gender) == 'other' ? 'selected' : '' }}>Other</option>
                                    </select>
                                    <div id="gender-error" class="hidden flex items-center space-x-2 mt-2 p-2 sm:p-3 bg-red-50 border border-red-200 rounded-lg">
                                        <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        <span class="text-xs sm:text-sm text-red-600 font-medium"></span>
                                    </div>
                                </div>

                                <div class="space-y-2">
                                    <label class="block text-sm font-semibold text-gray-700">Date of Birth</label>
                                    <input type="date" name="date_of_birth" value="{{ old('date_of_birth', $users->date_of_birth) }}"
                                           class="w-full px-3 py-2.5 sm:px-4 sm:py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-4 focus:ring-blue-200 focus:border-blue-500 transition-all duration-300 bg-white text-sm" />
                                    <div id="date_of_birth-error" class="hidden flex items-center space-x-2 mt-2 p-2 sm:p-3 bg-red-50 border border-red-200 rounded-lg">
                                        <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        <span class="text-xs sm:text-sm text-red-600 font-medium"></span>
                                    </div>
                                </div>

                                <div class="space-y-2">
                                    <label class="block text-sm font-semibold text-gray-700">Contact Number</label>
                                    <input type="number" name="contact_number" value="{{ old('contact_number', $users->contact_number) }}"
                                           class="w-full px-3 py-2.5 sm:px-4 sm:py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-4 focus:ring-blue-200 focus:border-blue-500 transition-all duration-300 bg-white text-sm" />
                                    <div id="contact_number-error" class="hidden flex items-center space-x-2 mt-2 p-2 sm:p-3 bg-red-50 border border-red-200 rounded-lg">
                                        <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        <span class="text-xs sm:text-sm text-red-600 font-medium"></span>
                                    </div>
                                </div>

                                <div class="space-y-2 md:col-span-1">
                                    <label class="block text-sm font-semibold text-gray-700">Address</label>
                                    <input type="text" name="address" value="{{ old('address', $users->address) }}"
                                           placeholder="Street, Area"
                                           class="w-full px-3 py-2.5 sm:px-4 sm:py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-4 focus:ring-blue-200 focus:border-blue-500 transition-all duration-300 bg-white text-sm" />
                                    <div id="address-error" class="hidden flex items-center space-x-2 mt-2 p-2 sm:p-3 bg-red-50 border border-red-200 rounded-lg">
                                        <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        <span class="text-xs sm:text-sm text-red-600 font-medium"></span>
                                    </div>
                                </div>

                                <div class="space-y-2">
                                    <label class="block text-sm font-semibold text-gray-700">City</label>
                                    <input type="text" name="city" value="{{ old('city', $users->city) }}"
                                           class="w-full px-3 py-2.5 sm:px-4 sm:py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-4 focus:ring-blue-200 focus:border-blue-500 transition-all duration-300 bg-white text-sm" />
                                    <div id="city-error" class="hidden flex items-center space-x-2 mt-2 p-2 sm:p-3 bg-red-50 border border-red-200 rounded-lg">
                                        <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        <span class="text-xs sm:text-sm text-red-600 font-medium"></span>
                                    </div>
                                </div>

                                <div class="space-y-2">
                                    <label class="block text-sm font-semibold text-gray-700">State</label>
                                    <input type="text" name="state" value="{{ old('state', $users->state) }}"
                                           class="w-full px-3 py-2.5 sm:px-4 sm:py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-4 focus:ring-blue-200 focus:border-blue-500 transition-all duration-300 bg-white text-sm" />
                                    <div id="state-error" class="hidden flex items-center space-x-2 mt-2 p-2 sm:p-3 bg-red-50 border border-red-200 rounded-lg">
                                        <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        <span class="text-xs sm:text-sm text-red-600 font-medium"></span>
                                    </div>
                                </div>

                                <div class="space-y-2">
                                    <label class="block text-sm font-semibold text-gray-700">Country</label>
                                    <input type="text" name="country" value="{{ old('country', $users->country) }}"
                                           class="w-full px-3 py-2.5 sm:px-4 sm:py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-4 focus:ring-blue-200 focus:border-blue-500 transition-all duration-300 bg-white text-sm" />
                                    <div id="country-error" class="hidden flex items-center space-x-2 mt-2 p-2 sm:p-3 bg-red-50 border border-red-200 rounded-lg">
                                        <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        <span class="text-xs sm:text-sm text-red-600 font-medium"></span>
                                    </div>
                                </div>

                                <div class="space-y-2">
                                    <label class="block text-sm font-semibold text-gray-700">Pin Code</label>
                                    <input type="number" name="pin_code" value="{{ old('pin_code', $users->pin_code) }}"
                                           class="w-full px-3 py-2.5 sm:px-4 sm:py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-4 focus:ring-blue-200 focus:border-blue-500 transition-all duration-300 bg-white text-sm" />
                                    <div id="pin_code-error" class="hidden flex items-center space-x-2 mt-2 p-2 sm:p-3 bg-red-50 border border-red-200 rounded-lg">
                                        <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        <span class="text-xs sm:text-sm text-red-600 font-medium"></span>
                                    </div>
                                </div>

                                <div class="space-y-2">
                                    <label class="block text-sm font-semibold text-gray-700">Joining Date</label>
                                    <input type="date" name="joining_date" value="{{ old('joining_date', $users->joining_date) }}"
                                           class="w-full px-3 py-2.5 sm:px-4 sm:py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-4 focus:ring-blue-200 focus:border-blue-500 transition-all duration-300 bg-white text-sm" />
                                    <div id="joining_date-error" class="hidden flex items-center space-x-2 mt-2 p-2 sm:p-3 bg-red-50 border border-red-200 rounded-lg">
                                        <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        <span class="text-xs sm:text-sm text-red-600 font-medium"></span>
                                    </div>
                                </div>

                                <div class="space-y-2">
                                    <label class="block text-sm font-semibold text-gray-700">Employment Type</label>
                                    <select name="employment_type" id="employment_type" class="w-full px-3 py-2.5 sm:px-4 sm:py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-4 focus:ring-blue-200 focus:border-blue-500 transition-all duration-300 bg-white text-sm">
                                        <option value="">-- Select Employment Type --</option>
                                        <option value="Full-Time" {{ $users->employment_type == 'full_time' ? 'selected' : '' }}>Full-Time</option>
                                        <option value="Part-Time" {{ $users->employment_type == 'part_time' ? 'selected' : '' }}>Part-Time</option>
                                        <option value="intern"    {{ $users->employment_type == 'intern' ? 'selected' : '' }}>Intern</option>
                                        <option value="trainee"   {{ $users->employment_type == 'trainee' ? 'selected' : '' }}>Trainee</option>
                                        <option value="contract"  {{ $users->employment_type == 'contract' ? 'selected' : '' }}>Contract</option>
                                    </select>
                                    <div id="employment_type-error" class="hidden flex items-center space-x-2 mt-2 p-2 sm:p-3 bg-red-50 border border-red-200 rounded-lg">
                                        <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        <span class="text-xs sm:text-sm text-red-600 font-medium"></span>
                                    </div>
                                </div>

                                <div class="space-y-2">
                                    <label class="block text-sm font-semibold text-gray-700">Status</label>
                                    <select name="status" id="status" class="w-full px-3 py-2.5 sm:px-4 sm:py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-4 focus:ring-blue-200 focus:border-blue-500 transition-all duration-300 bg-white text-sm">
                                        <option value="">-- Select Status --</option>
                                        <option value="active"     {{ $users->status == 'active' ? 'selected' : '' }}>Active</option>
                                        <option value="inactive"   {{ $users->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                                        <option value="terminated" {{ $users->status == 'terminated' ? 'selected' : '' }}>Terminated</option>
                                    </select>
                                    <div id="status-error" class="hidden flex items-center space-x-2 mt-2 p-2 sm:p-3 bg-red-50 border border-red-200 rounded-lg">
                                        <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        <span class="text-xs sm:text-sm text-red-600 font-medium"></span>
                                    </div>
                                </div>

                                <div class="space-y-2 md:col-span-2">
                                    <label class="block text-sm font-semibold text-gray-700" for="resume">Resume</label>
                                    @if ($users->resume)
                                        <a class="text-sm text-blue-600 underline" href="{{ asset('storage/' . $users->resume) }}" target="_blank">View Resume</a>
                                    @endif
                                    <input type="file" name="resume" id="resume"
                                           class="mt-2 w-full px-3 py-2.5 sm:px-4 sm:py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-4 focus:ring-blue-200 focus:border-blue-500 transition-all duration-300 bg-white text-sm" />
                                    <div id="resume-error" class="hidden flex items-center space-x-2 mt-2 p-2 sm:p-3 bg-red-50 border border-red-200 rounded-lg">
                                        <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        <span class="text-xs sm:text-sm text-red-600 font-medium"></span>
                                    </div>
                                </div>

                                <div class="space-y-2 md:col-span-1">
                                    <label class="block text-sm font-semibold text-gray-700" for="aadhar_card">Aadhar Card</label>
                                    @if ($users->aadhar_card)
                                        <a class="text-sm text-blue-600 underline" href="{{ asset('storage/' . $users->aadhar_card) }}" target="_blank">View Aadhar</a>
                                    @endif
                                    <input type="file" name="aadhar_card" id="aadhar_card"
                                           class="mt-2 w-full px-3 py-2.5 sm:px-4 sm:py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-4 focus:ring-blue-200 focus:border-blue-500 transition-all duration-300 bg-white text-sm" />
                                    <div id="aadhar_card-error" class="hidden flex items-center space-x-2 mt-2 p-2 sm:p-3 bg-red-50 border border-red-200 rounded-lg">
                                        <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        <span class="text-xs sm:text-sm text-red-600 font-medium"></span>
                                    </div>
                                </div>

                                <div class="space-y-2 md:col-span-1">
                                    <label class="block text-sm font-semibold text-gray-700" for="pan_card">PAN Card</label>
                                    @if ($users->pan_card)
                                        <a class="text-sm text-blue-600 underline" href="{{ asset('storage/' . $users->pan_card) }}" target="_blank">View PAN</a>
                                    @endif
                                    <input type="file" name="pan_card" id="pan_card"
                                           class="mt-2 w-full px-3 py-2.5 sm:px-4 sm:py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-4 focus:ring-blue-200 focus:border-blue-500 transition-all duration-300 bg-white text-sm" />
                                    <div id="pan_card-error" class="hidden flex items-center space-x-2 mt-2 p-2 sm:p-3 bg-red-50 border border-red-200 rounded-lg">
                                        <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        <span class="text-xs sm:text-sm text-red-600 font-medium"></span>
                                    </div>
                                </div>

                                <div class="space-y-2">
                                    <label class="block text-sm font-semibold text-gray-700">Leave Balance</label>
                                    <input type="number" name="leave_balance" value="{{ old('leave_balance', $users->leave_balance) }}"
                                           class="w-full px-3 py-2.5 sm:px-4 sm:py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-4 focus:ring-blue-200 focus:border-blue-500 transition-all duration-300 bg-white text-sm" />
                                    <div id="leave_balance-error" class="hidden flex items-center space-x-2 mt-2 p-2 sm:p-3 bg-red-50 border border-red-200 rounded-lg">
                                        <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        <span class="text-xs sm:text-sm text-red-600 font-medium"></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Roles Assignment Section --}}
                        <div class="bg-blue-50 rounded-lg p-4 sm:p-6 border border-blue-200">
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
                                            class="bg-white rounded-lg p-3 sm:p-4 border border-gray-200 hover:border-blue-300 hover:shadow-md transition-all duration-300 ease-in-out transform hover:scale-[1.01] {{ $hasRoles->contains($role->id) ? 'ring-2 ring-blue-200 bg-blue-50' : '' }}">
                                            <label for="role-{{ $role->id }}"
                                                class="flex items-center space-x-2 sm:space-x-3 cursor-pointer">
                                                <input type="checkbox" name="role[]" value="{{ $role->name }}"
                                                    id="role-{{ $role->id }}"
                                                    {{ $hasRoles->contains($role->id) ? 'checked' : '' }}
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

                        <div class="bg-yellow-50 rounded-lg p-3 sm:p-4 border border-yellow-200">
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
                                        Changing user roles will immediately affect their access permissions across the
                                        system.
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
                            <button type="submit" id="updateUserBtn"
                                class="theme-app inline-flex items-center justify-center w-full sm:w-auto px-6 py-3 sm:px-8 sm:py-4 font-semibold rounded-lg shadow-lg hover:scale-105 transform transition-all duration-300 ease-in-out focus:outline-none focus:ring-4 text-base sm:text-lg disabled:opacity-50 disabled:cursor-not-allowed disabled:hover:scale-100"
                                style="background-color: var(--hover-bg); color: var(--primary-text);"
                                onmouseover="this.style.backgroundColor='var(--primary-bg-light)'"
                                onmouseout="this.style.backgroundColor='var(--hover-bg)'">
                                {{-- removed disabled attribute and static “No Changes Made” text so the button is always usable --}}
                                <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 mr-2" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path>
                                </svg>
                                <span id="button-text">Update User</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- JavaScript Validation --}}
    <script>
  document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('userEditForm');
    if (!form) return;

    // Prevent native browser validation popups; we'll manage UX ourselves.
    form.setAttribute('novalidate', 'true');

    const submitBtn = document.getElementById('updateUserBtn');
    const btnText = document.getElementById('button-text');

    // Helpers
    const byId = (id) => document.getElementById(id);
    const setAriaInvalid = (el, invalid) => {
      if (!el) return;
      el.setAttribute('aria-invalid', invalid ? 'true' : 'false');
      if (invalid) el.setAttribute('aria-describedby', `${el.name}-error`);
      else el.removeAttribute('aria-describedby');
    };

    const showError = (fieldName, message) => {
      const container = byId(`${fieldName}-error`);
      const input = form.elements[fieldName];
      if (!container) return false;

      const span = container.querySelector('span');
      if (message) {
        container.classList.remove('hidden');
        if (span) span.textContent = message;
        if (input) setAriaInvalid(input, true);
        return true;
      } else {
        container.classList.add('hidden');
        if (span) span.textContent = '';
        if (input) setAriaInvalid(input, false);
        return false;
      }
    };

    const clearAllErrors = () => {
      const errorBlocks = form.querySelectorAll('[id$="-error"]');
      errorBlocks.forEach((el) => {
        el.classList.add('hidden');
        const span = el.querySelector('span');
        if (span) span.textContent = '';
      });
      // Reset aria-invalid on inputs
      Array.from(form.elements).forEach((el) => {
        if (el instanceof HTMLInputElement || el instanceof HTMLSelectElement || el instanceof HTMLTextAreaElement) {
          setAriaInvalid(el, false);
        }
      });
    };

    const isEmpty = (v) => !v || String(v).trim() === '';
    const isEmail = (v) => /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(String(v).trim());
    const isDigits = (v) => /^\d+$/.test(String(v).trim());
    const parseDate = (v) => {
      const d = new Date(v);
      return isNaN(d.getTime()) ? null : d;
    };
    const today = () => {
      const d = new Date();
      d.setHours(0,0,0,0);
      return d;
    };

    // Field validators
    const validateName = () => {
      const el = form.elements['name'];
      const v = el ? el.value : '';
      if (isEmpty(v)) return showError('name', 'Full name is required.');
      if (v.trim().length < 2) return showError('name', 'Full name must be at least 2 characters.');
      return showError('name', '');
    };

    const validateEmail = () => {
      const el = form.elements['email'];
      const v = el ? el.value : '';
      if (isEmpty(v)) return showError('email', 'Email address is required.');
      if (!isEmail(v)) return showError('email', 'Enter a valid email address.');
      return showError('email', '');
    };

    const validateGender = () => {
      const el = form.elements['gender'];
      if (!el) return false;
      const v = String(el.value).trim();
      if (isEmpty(v)) return showError('gender', 'Please select a gender.');
      const allowed = ['male','female','other'];
      if (!allowed.includes(v)) return showError('gender', 'Invalid gender selected.');
      return showError('gender', '');
    };

    const validateDOB = () => {
      const el = form.elements['date_of_birth'];
      if (!el) return false; // optional
      const v = String(el.value).trim();
      if (isEmpty(v)) return showError('date_of_birth', '');
      const d = parseDate(v);
      if (!d) return showError('date_of_birth', 'Enter a valid date.');
      if (d > today()) return showError('date_of_birth', 'Date of birth cannot be in the future.');
      return showError('date_of_birth', '');
    };

    const validateContact = () => {
      const el = form.elements['contact_number'];
      if (!el) return false; // optional
      const v = String(el.value).trim();
      if (isEmpty(v)) return showError('contact_number', '');
      const digitsOnly = v.replace(/\D/g, '');
      if (!isDigits(digitsOnly)) return showError('contact_number', 'Contact number must contain digits only.');
      if (digitsOnly.length < 7 || digitsOnly.length > 15) {
        return showError('contact_number', 'Contact number must be between 7 and 15 digits.');
      }
      return showError('contact_number', '');
    };

    const validateTextMax = (name, max = 255, label = 'This field') => {
      const el = form.elements[name];
      if (!el) return false;
      const v = String(el.value || '').trim();
      if (isEmpty(v)) return showError(name, '');
      if (v.length > max) return showError(name, `${label} must be at most ${max} characters.`);
      return showError(name, '');
    };

    const validatePin = () => {
      const el = form.elements['pin_code'];
      if (!el) return false;
      const v = String(el.value).trim();
      if (isEmpty(v)) return showError('pin_code', '');
      if (!isDigits(v)) return showError('pin_code', 'PIN code must be digits only.');
      if (v.length < 4 || v.length > 10) return showError('pin_code', 'PIN code must be 4 to 10 digits.');
      return showError('pin_code', '');
    };

    const validateJoiningDate = () => {
      const el = form.elements['joining_date'];
      if (!el) return false;
      const v = String(el.value).trim();
      if (isEmpty(v)) return showError('joining_date', '');
      const d = parseDate(v);
      if (!d) return showError('joining_date', 'Enter a valid joining date.');
      if (d > today()) return showError('joining_date', 'Joining date cannot be in the future.');
      return showError('joining_date', '');
    };

    const validateSelectIn = (name, allowed, required = false, label = 'Selection') => {
      const el = form.elements[name];
      if (!el) return false;
      const v = String(el.value).trim();
      if (required && isEmpty(v)) return showError(name, `${label} is required.`);
      if (!isEmpty(v) && !allowed.includes(v)) return showError(name, `Invalid ${label.toLowerCase()} selected.`);
      return showError(name, '');
    };

    const validateNumberNonNegative = (name, label = 'Value') => {
      const el = form.elements[name];
      if (!el) return false;
      const v = String(el.value).trim();
      if (isEmpty(v)) return showError(name, '');
      const num = Number(v);
      if (!Number.isFinite(num) || num < 0) return showError(name, `${label} must be a non-negative number.`);
      return showError(name, '');
    };

    const validateFile = (name, allowedExt, maxMB, label) => {
      const el = form.elements[name];
      if (!el || !el.files || !el.files.length) {
        // optional files; no error if not provided
        return showError(name, '');
      }
      const file = el.files[0];
      const sizeOK = file.size <= maxMB * 1024 * 1024;
      const ext = (file.name.split('.').pop() || '').toLowerCase();
      const typeOK = allowedExt.includes(ext);
      if (!typeOK) return showError(name, `${label} must be one of: ${allowedExt.join(', ')}.`);
      if (!sizeOK) return showError(name, `${label} must be ${maxMB}MB or smaller.`);
      return showError(name, '');
    };

    const validateRoles = () => {
      const checkboxes = form.querySelectorAll('.role-checkbox');
      const anyChecked = Array.from(checkboxes).some((c) => c.checked);
      const error = byId('roles-error');
      if (!error) return false;
      if (!anyChecked) {
        error.classList.remove('hidden');
        return true;
      } else {
        error.classList.add('hidden');
        return false;
      }
    };

    // Live validation bindings (only on key fields to keep things light)
    const bindLiveValidation = () => {
      const map = [
        ['name', validateName, ['input', 'blur']],
        ['email', validateEmail, ['input', 'blur']],
        ['gender', validateGender, ['change', 'blur']],
        ['date_of_birth', validateDOB, ['change', 'blur']],
        ['contact_number', validateContact, ['input', 'blur']],
        ['address', () => validateTextMax('address', 255, 'Address'), ['input', 'blur']],
        ['city', () => validateTextMax('city', 120, 'City'), ['input', 'blur']],
        ['state', () => validateTextMax('state', 120, 'State'), ['input', 'blur']],
        ['country', () => validateTextMax('country', 120, 'Country'), ['input', 'blur']],
        ['pin_code', validatePin, ['input', 'blur']],
        ['joining_date', validateJoiningDate, ['change', 'blur']],
        ['employment_type', () => validateSelectIn('employment_type', ['Full-Time','Part-Time','intern','trainee','contract'], false, 'Employment type'), ['change', 'blur']],
        ['status', () => validateSelectIn('status', ['active','inactive','terminated'], false, 'Status'), ['change', 'blur']],
        ['leave_balance', () => validateNumberNonNegative('leave_balance', 'Leave balance'), ['input', 'blur']],
        ['resume', () => validateFile('resume', ['pdf','doc','docx'], 5, 'Resume'), ['change']],
        ['aadhar_card', () => validateFile('aadhar_card', ['pdf','jpg','jpeg','png'], 5, 'Aadhar card'), ['change']],
        ['pan_card', () => validateFile('pan_card', ['pdf','jpg','jpeg','png'], 5, 'PAN card'), ['change']],
      ];
      map.forEach(([name, fn, events]) => {
        const el = form.elements[name];
        if (!el) return;
        events.forEach((ev) => el.addEventListener(ev, fn));
      });

      const roleBoxes = form.querySelectorAll('.role-checkbox');
      roleBoxes.forEach((cb) => cb.addEventListener('change', validateRoles));
    };

    bindLiveValidation();

    const setSubmittingState = (submitting) => {
      if (!submitBtn) return;
      submitBtn.disabled = submitting;
      if (submitting) {
        // Add spinner if not present
        if (!submitBtn.querySelector('.v0-spinner')) {
          const spinner = document.createElement('span');
          spinner.className = 'v0-spinner ml-2 inline-block w-4 h-4 border-2 border-white border-t-transparent rounded-full animate-spin';
          spinner.setAttribute('aria-hidden', 'true');
          submitBtn.appendChild(spinner);
        }
        if (btnText) btnText.textContent = 'Submitting...';
      } else {
        const sp = submitBtn.querySelector('.v0-spinner');
        if (sp) sp.remove();
        if (btnText) btnText.textContent = 'Update User';
      }
    };

    form.addEventListener('submit', function (e) {
      clearAllErrors();

      // Run all validations
      const errors = [];

      if (validateName()) errors.push('name');
      if (validateEmail()) errors.push('email');
      if (validateGender()) errors.push('gender');
      if (validateDOB()) errors.push('date_of_birth');
      if (validateContact()) errors.push('contact_number');
      if (validateTextMax('address', 255, 'Address')) errors.push('address');
      if (validateTextMax('city', 120, 'City')) errors.push('city');
      if (validateTextMax('state', 120, 'State')) errors.push('state');
      if (validateTextMax('country', 120, 'Country')) errors.push('country');
      if (validatePin()) errors.push('pin_code');
      if (validateJoiningDate()) errors.push('joining_date');
      if (validateSelectIn('employment_type', ['Full-Time','Part-Time','intern','trainee','contract'], false, 'Employment type')) errors.push('employment_type');
      if (validateSelectIn('status', ['active','inactive','terminated'], false, 'Status')) errors.push('status');
      if (validateNumberNonNegative('leave_balance', 'Leave balance')) errors.push('leave_balance');
      if (validateFile('resume', ['pdf','doc','docx'], 5, 'Resume')) errors.push('resume');
      if (validateFile('aadhar_card', ['pdf','jpg','jpeg','png'], 5, 'Aadhar card')) errors.push('aadhar_card');
      if (validateFile('pan_card', ['pdf','jpg','jpeg','png'], 5, 'PAN card')) errors.push('pan_card');
      if (validateRoles()) errors.push('roles');

      if (errors.length > 0) {
        e.preventDefault();
        // Scroll to first visible error
        const firstError = form.querySelector('[id$="-error"]:not(.hidden)');
        if (firstError) {
          firstError.scrollIntoView({ behavior: 'smooth', block: 'center' });
          // Try focusing the associated input
          const id = firstError.id.replace('-error','');
          const input = form.elements[id];
          if (input && typeof input.focus === 'function') input.focus();
        }
        setSubmittingState(false);
      } else {
        setSubmittingState(true);
      }
    });
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
    </style>
</x-app-layout>
