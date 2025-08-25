<x-app-layout>
    <!-- Replaced custom header with x-slot header structure from listusers file -->
    <x-slot name="header">
        <div class="theme-app"
            style="background: linear-gradient(to right, var(--secondary-bg), var(--primary-bg)); padding: 1.5rem 1rem; sm:padding: 3rem 2rem; border-radius: 0;">
            <div class="max-w-7xl mx-auto">
                <div class="flex flex-col sm:flex-row justify-between items-center gap-4 sm:gap-0 lg:mr-24">
                    <div class="flex items-center space-x-4">
                        <div class="p-3 rounded-2xl shadow-lg" style="background-color: var(--hover-bg);">
                            <svg class="w-8 h-8" style="color: var(--primary-text);" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-4m-5 0H3m2 0h4M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                                </path>
                            </svg>
                        </div>
                        <div>
                            <h1 class="text-2xl sm:text-3xl font-bold leading-tight"
                                style="color: var(--primary-text);">
                                {{ __('Edit Company Details') }}
                            </h1>
                            <p class="text-sm sm:text-lg mt-1" style="color: var(--secondary-text);">
                                Update your company information and branding settings
                            </p>
                        </div>
                    </div>

                    <a href="{{ url()->previous() }}"
                        class="theme-app inline-flex items-center justify-center w-full sm:w-auto px-6 py-3 sm:px-8 sm:py-4 font-semibold rounded-lg sm:rounded-xl shadow-lg hover:scale-105 transform transition-all duration-300 ease-in-out focus:outline-none text-base sm:text-lg"
                        style="background-color: var(--hover-bg); color: var(--primary-text);"
                        onmouseover="this.style.backgroundColor='var(--primary-bg-light)'"
                        onmouseout="this.style.backgroundColor='var(--hover-bg)'">
                        <svg class="w-4 h-4 sm:w-5 sm:h-5 mr-2" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        Back
                    </a>
                </div>
            </div>
        </div>
    </x-slot>

    <!-- Updated background to use simple background color instead of gradient -->
    <div class="py-8" style="background-color: #f8fafc; min-height: 100vh;">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Added success/error messages with better styling -->
            @if (session('success'))
                <div class="px-4 py-3 rounded-lg mb-6 backdrop-blur-sm"
                    style="background-color: rgba(34, 197, 94, 0.2); border: 1px solid rgba(34, 197, 94, 0.3); color: var(--primary-text, #f8fafc);">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6-2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        {{ session('success') }}
                    </div>
                </div>
            @endif
            @if (session('error'))
                <div class="px-4 py-3 rounded-lg mb-6 backdrop-blur-sm"
                    style="background-color: rgba(239, 68, 68, 0.2); border: 1px solid rgba(239, 68, 68, 0.3); color: var(--primary-text, #f8fafc);">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        {{ session('error') }}
                    </div>
                </div>
            @endif

            <form action="{{ route('company.update', $company->id) }}" method="POST" enctype="multipart/form-data"
                class="space-y-6" id="companyForm" novalidate>
                @csrf
                @method('PUT')

                <!-- Company Information Section with gray theme like reference -->
                <div class="bg-white rounded-xl shadow-xl border border-gray-200">
                    <!-- Updated section header to match main header styling pattern -->
                    <div class="px-6 py-4 border-b border-gray-200 rounded-t-xl"
                        style="background: linear-gradient(to right, var(--secondary-bg), var(--primary-bg));">
                        <div class="flex items-center gap-3">
                            <div class="p-2 rounded-lg" style="background-color: var(--hover-bg);">
                                <svg class="w-5 h-5" style="color: var(--primary-text);" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-4m-5 0H3m2 0h4M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                                    </path>
                                </svg>
                            </div>
                            <h2 class="text-lg font-semibold" style="color: var(--primary-text);">Company Information
                            </h2>
                        </div>
                    </div>
                    <div class="p-6 space-y-6">
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-gray-700 font-medium mb-2">
                                    <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-4m-5 0H3m2 0h4M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                                        </path>
                                    </svg>
                                    Company Name <span class="text-red-500">*</span>
                                </label>
                                <!-- Added required, minlength, maxlength, and pattern validation -->
                                <input type="text" name="company_name"
                                    value="{{ old('company_name', $company->company_name) }}"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300 @error('company_name') border-red-500 @enderror"
                                    required
                                    minlength="2"
                                    maxlength="100"
                                    pattern="[a-zA-Z0-9\s\-&.,']+"
                                    title="Company name must be 2-100 characters and contain only letters, numbers, spaces, and common punctuation">
                                @error('company_name')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                                <!-- Added validation feedback div -->
                                <div class="validation-feedback text-red-500 text-sm mt-1 hidden"></div>
                            </div>
                            <div>
                                <label class="block text-gray-700 font-medium mb-2">
                                    <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z">
                                        </path>
                                    </svg>
                                    System Title <span class="text-red-500">*</span>
                                </label>
                                <!-- Added required, minlength, maxlength validation -->
                                <input type="text" name="system_title"
                                    value="{{ old('system_title', $company->system_title) }}"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300 @error('system_title') border-red-500 @enderror"
                                    required
                                    minlength="2"
                                    maxlength="50"
                                    title="System title must be 2-50 characters">
                                @error('system_title')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                                <!-- Added validation feedback div -->
                                <div class="validation-feedback text-red-500 text-sm mt-1 hidden"></div>
                            </div>
                        </div>
                        <div>
                            <label class="block text-gray-700 font-medium mb-2">
                                <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 6h16M4 12h16M4 18h7"></path>
                                </svg>
                                Company Description
                            </label>
                            <!-- Added maxlength validation -->
                            <textarea name="company_description" rows="4"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300 @error('company_description') border-red-500 @enderror"
                                maxlength="1000"
                                title="Description must not exceed 1000 characters">{{ old('company_description', $company->company_description) }}</textarea>
                            @error('company_description')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                            <!-- Added character counter -->
                            <div class="text-sm text-gray-500 mt-1">
                                <span id="descriptionCount">{{ strlen($company->company_description ?? '') }}</span>/1000 characters
                            </div>
                            <!-- Added validation feedback div -->
                            <div class="validation-feedback text-red-500 text-sm mt-1 hidden"></div>
                        </div>
                        <div>
                            <label class="block text-gray-700 font-medium mb-2">
                                <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                    </path>
                                </svg>
                                Company Logo
                            </label>
                            @if ($company->company_logo)
                                <div class="mb-4">
                                    <p class="text-gray-600 text-sm mb-2">Current Logo:</p>
                                    <div class="bg-gray-500 p-4 rounded-lg inline-block border border-gray-200">
                                        <img src="{{ asset('images/' . $company->company_logo) }}" alt="Company Logo"
                                            class="max-h-24 rounded">
                                    </div>
                                </div>
                            @endif
                            <!-- Added file type and size validation -->
                            <input type="file" name="company_logo" accept="image/jpeg,image/jpg,image/png,image/gif,image/webp"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-gray-100 file:text-gray-700 hover:file:bg-gray-200 @error('company_logo') border-red-500 @enderror"
                                data-max-size="5242880"
                                title="Please select an image file (JPEG, PNG, GIF, WebP) under 5MB">
                            @error('company_logo')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                            <!-- Added file validation info -->
                            <p class="text-sm text-gray-500 mt-1">Accepted formats: JPEG, PNG, GIF, WebP. Maximum size: 5MB</p>
                            <!-- Added validation feedback div -->
                            <div class="validation-feedback text-red-500 text-sm mt-1 hidden"></div>
                        </div>
                        <div class="office-timing-row">
                            @php
                                // Decode JSON timings from DB
                                $timings = json_decode($company->timings, true) ?? [];

                                // If there's no row yet, create a default row
                                if (empty($timings)) {
                                    $timings[] = [
                                        'day_from' => 'monday',
                                        'day_to' => 'friday',
                                        'start' => '09:00',
                                        'end' => '18:00',
                                    ];
                                }
                            @endphp
                            @foreach ($timings as $index => $row)
                                <div class="space-y-4 sm:space-y-0">
                                    <label class="block text-gray-700 font-medium mb-2">
                                        <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        Office Timings: <span class="text-red-500">*</span>
                                    </label>
                                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-4">
                                        <div>
                                            <label class="block text-sm text-gray-600 mb-1">From Day <span class="text-red-500">*</span></label>
                                            <!-- Added required validation -->
                                            <select name="timings[{{ $index }}][day_from]" class="w-full px-3 py-2 text-sm sm:text-base border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300" required>
                                                @foreach (['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'] as $day)
                                                    <option value="{{ $day }}" {{ $row['day_from'] == $day ? 'selected' : '' }}>
                                                        {{ ucfirst($day) }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div>
                                            <label class="block text-sm text-gray-600 mb-1">To Day <span class="text-red-500">*</span></label>
                                            <!-- Added required validation -->
                                            <select name="timings[{{ $index }}][day_to]" class="w-full px-3 py-2 text-sm sm:text-base border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300" required>
                                                @foreach (['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'] as $day)
                                                    <option value="{{ $day }}" {{ $row['day_to'] == $day ? 'selected' : '' }}>
                                                        {{ ucfirst($day) }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div>
                                            <label class="block text-sm text-gray-600 mb-1">Start Time <span class="text-red-500">*</span></label>
                                            <input type="time" name="timings[{{ $index }}][start]" value="{{ $row['start'] }}" 
                                                class="w-full px-3 py-2 text-sm sm:text-base border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300" required>
                                        </div>
                                        <div>
                                            <label class="block text-sm text-gray-600 mb-1">End Time <span class="text-red-500">*</span></label>
                                            <!-- Added data attribute for time validation -->
                                            <input type="time" name="timings[{{ $index }}][end]" value="{{ $row['end'] }}" 
                                                class="w-full px-3 py-2 text-sm sm:text-base border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300" 
                                                required data-start-time="timings[{{ $index }}][start]">
                                        </div>
                                    </div>
                                    <!-- Added timing validation feedback -->
                                    <div class="timing-validation-feedback text-red-500 text-sm mt-1 hidden"></div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <!-- Theme Customization Section with blue theme like reference -->
                    <div class="bg-white rounded-xl shadow-xl border border-blue-200">
                        <!-- Updated section header to match main header styling pattern -->
                        <div class="px-6 py-4 border-b border-blue-200 rounded-t-xl"
                            style="background: linear-gradient(to right, var(--secondary-bg), var(--primary-bg));">
                            <div class="flex items-center gap-3">
                                <div class="p-2 rounded-lg" style="background-color: var(--hover-bg);">
                                    <svg class="w-5 h-5" style="color: var(--primary-text);" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 6h16M4 12h16M4 18h16"></path>
                                    </svg>
                                </div>
                                <h2 class="text-lg font-semibold" style="color: var(--primary-text);">Theme
                                    Customization
                                </h2>
                            </div>
                        </div>
                        <div class="p-6">
                            <!-- Improved mobile responsive grid for color pickers -->
                            <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-4 sm:gap-6">
                                <div>
                                    <label class="block text-gray-700 font-medium mb-2">
                                        <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M4 6h16M4 12h16M4 18h16"></path>
                                        </svg>
                                        Navbar Color
                                    </label>
                                    <div class="flex items-center gap-2 sm:gap-3">
                                        <input type="color" name="navbar_color"
                                            value="{{ old('navbar_color', $company->navbar_color ?? '#000000') }}"
                                            class="w-10 h-10 sm:w-12 sm:h-12 rounded-lg border-2 border-gray-300 bg-transparent cursor-pointer">
                                        <input type="text"
                                            value="{{ old('navbar_color', $company->navbar_color ?? '#000000') }}"
                                            readonly
                                            class="flex-1 px-2 py-2 sm:px-3 text-xs sm:text-sm bg-gray-50 border border-gray-300 rounded-lg text-gray-700">
                                    </div>
                                </div>
                                <div>
                                    <label class="block text-gray-700 font-medium mb-2">
                                        <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M4 5a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z">
                                            </path>
                                        </svg>
                                        Sidebar Color
                                    </label>
                                    <div class="flex items-center gap-2 sm:gap-3">
                                        <input type="color" name="sidebar_color"
                                            value="{{ old('sidebar_color', $company->sidebar_color ?? '#000000') }}"
                                            class="w-10 h-10 sm:w-12 sm:h-12 rounded-lg border-2 border-gray-300 bg-transparent cursor-pointer">
                                        <input type="text"
                                            value="{{ old('sidebar_color', $company->sidebar_color ?? '#000000') }}"
                                            readonly
                                            class="flex-1 px-2 py-2 sm:px-3 text-xs sm:text-sm bg-gray-50 border border-gray-300 rounded-lg text-gray-700">
                                    </div>
                                </div>
                                <div>
                                    <label class="block text-gray-700 font-medium mb-2">
                                        <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z">
                                            </path>
                                        </svg>
                                        Primary Color
                                    </label>
                                    <div class="flex items-center gap-2 sm:gap-3">
                                        <input type="color" name="primary_color"
                                            value="{{ old('primary_color', $company->primary_color ?? '#000000') }}"
                                            class="w-10 h-10 sm:w-12 sm:h-12 rounded-lg border-2 border-gray-300 bg-transparent cursor-pointer">
                                        <input type="text"
                                            value="{{ old('primary_color', $company->primary_color ?? '#000000') }}"
                                            readonly
                                            class="flex-1 px-2 py-2 sm:px-3 text-xs sm:text-sm bg-gray-50 border border-gray-300 rounded-lg text-gray-700">
                                    </div>
                                </div>
                                <div>
                                    <label class="block text-gray-700 font-medium mb-2">
                                        <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                                            </path>
                                        </svg>
                                        Text Color
                                    </label>
                                    <div class="flex items-center gap-2 sm:gap-3">
                                        <input type="color" name="text_color"
                                            value="{{ old('text_color', $company->text_color ?? '#000000') }}"
                                            class="w-10 h-10 sm:w-12 sm:h-12 rounded-lg border-2 border-gray-300 bg-transparent cursor-pointer">
                                        <input type="text"
                                            value="{{ old('text_color', $company->text_color ?? '#000000') }}"
                                            readonly
                                            class="flex-1 px-2 py-2 sm:px-3 text-xs sm:text-sm bg-gray-50 border border-gray-300 rounded-lg text-gray-700">
                                    </div>
                                </div>
                                <div>
                                    <label class="block text-gray-700 font-medium mb-2">
                                        <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
                                        </svg>
                                        Footer Color
                                    </label>
                                    <div class="flex items-center gap-2 sm:gap-3">
                                        <input type="color" name="footer_color"
                                            value="{{ old('footer_color', $company->footer_color ?? '#000000') }}"
                                            class="w-10 h-10 sm:w-12 sm:h-12 rounded-lg border-2 border-gray-300 bg-transparent cursor-pointer">
                                        <input type="text"
                                            value="{{ old('footer_color', $company->footer_color ?? '#000000') }}"
                                            class="flex-1 px-2 py-2 sm:px-3 text-xs sm:text-sm bg-gray-50 border border-gray-300 rounded-lg text-gray-700">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Action buttons with green theme like reference -->
                    <div class="bg-white rounded-xl shadow-xl border border-green-200">
                        <!-- Updated section header to match main header styling pattern -->
                        <div class="px-6 py-4 border-b border-green-200 rounded-t-xl"
                            style="background: linear-gradient(to right, var(--secondary-bg), var(--primary-bg));">
                            <div class="flex items-center gap-3">
                                <div class="p-2 rounded-lg" style="background-color: var(--hover-bg);">
                                    <svg class="w-5 h-5" style="color: var(--primary-text);" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12l2 2 4-4m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <h2 class="text-lg font-semibold" style="color: var(--primary-text);">Actions</h2>
                            </div>
                        </div>
                        <div class="p-6">
                            <!-- Made action buttons stack vertically on mobile with full width -->
                            <div class="flex flex-col sm:flex-row gap-3 sm:gap-4 sm:justify-end">
                                <a href="{{ url()->previous() }}"
                                    class="w-full sm:w-auto inline-flex items-center justify-center px-4 py-3 sm:px-6 text-sm sm:text-base font-semibold rounded-lg shadow-lg transform transition-all duration-300 focus:outline-none focus:ring-4"
                                    style="background-color: var(--secondary-text, #8a8a8a); color: var(--primary-text, #f8fafc); focus:ring-color: rgba(138, 138, 138, 0.5);"
                                    onmouseover="this.style.backgroundColor='#6b7280'; this.style.transform='scale(1.05)'"
                                    onmouseout="this.style.backgroundColor='var(--secondary-text, #8a8a8a)'; this.style.transform='scale(1)'">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                    Cancel
                                </a>
                                <button type="submit"
                                    class="w-full sm:w-auto inline-flex items-center justify-center px-4 py-3 sm:px-6 text-sm sm:text-base font-semibold rounded-lg shadow-lg transform transition-all duration-300 focus:outline-none focus:ring-4"
                                    style="background-color: var(--hover-bg, #2563eb); color: var(--primary-text, #f8fafc); focus:ring-color: rgba(37, 99, 235, 0.5);"
                                    onmouseover="this.style.backgroundColor='#1d4ed8'; this.style.transform='scale(1.05)'"
                                    onmouseout="this.style.backgroundColor='var(--hover-bg, #2563eb)'; this.style.transform='scale(1)'">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 7H5a2 2 0 00-2-2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4">
                                        </path>
                                    </svg>
                                    Update Company Details
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Added comprehensive JavaScript validation -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('companyForm');
            const companyNameInput = document.querySelector('input[name="company_name"]');
            const systemTitleInput = document.querySelector('input[name="system_title"]');
            const descriptionTextarea = document.querySelector('textarea[name="company_description"]');
            const logoInput = document.querySelector('input[name="company_logo"]');
            const descriptionCount = document.getElementById('descriptionCount');

            // Character counter for description
            if (descriptionTextarea && descriptionCount) {
                descriptionTextarea.addEventListener('input', function() {
                    const currentLength = this.value.length;
                    descriptionCount.textContent = currentLength;
                    
                    if (currentLength > 1000) {
                        this.classList.add('border-red-500');
                        showValidationError(this, 'Description cannot exceed 1000 characters');
                    } else {
                        this.classList.remove('border-red-500');
                        hideValidationError(this);
                    }
                });
            }

            // File validation
            if (logoInput) {
                logoInput.addEventListener('change', function() {
                    const file = this.files[0];
                    if (file) {
                        // Check file size (5MB = 5242880 bytes)
                        if (file.size > 5242880) {
                            showValidationError(this, 'File size must be less than 5MB');
                            this.value = '';
                            return;
                        }

                        // Check file type
                        const allowedTypes = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif', 'image/webp'];
                        if (!allowedTypes.includes(file.type)) {
                            showValidationError(this, 'Please select a valid image file (JPEG, PNG, GIF, WebP)');
                            this.value = '';
                            return;
                        }

                        hideValidationError(this);
                    }
                });
            }

            // Real-time validation for text inputs
            function validateInput(input, minLength, maxLength, pattern = null) {
                input.addEventListener('input', function() {
                    const value = this.value.trim();
                    
                    if (value.length === 0) {
                        showValidationError(this, 'This field is required');
                        return;
                    }
                    
                    if (value.length < minLength) {
                        showValidationError(this, `Minimum ${minLength} characters required`);
                        return;
                    }
                    
                    if (value.length > maxLength) {
                        showValidationError(this, `Maximum ${maxLength} characters allowed`);
                        return;
                    }
                    
                    if (pattern && !pattern.test(value)) {
                        showValidationError(this, 'Please enter a valid format');
                        return;
                    }
                    
                    hideValidationError(this);
                });
            }

            // Apply validation to inputs
            if (companyNameInput) {
                validateInput(companyNameInput, 2, 100, /^[a-zA-Z0-9\s\-&.,']+$/);
            }
            
            if (systemTitleInput) {
                validateInput(systemTitleInput, 2, 50);
            }

            // Time validation
            function validateTimings() {
                const timingRows = document.querySelectorAll('.office-timing-row > div');
                let isValid = true;

                timingRows.forEach(row => {
                    const startTimeInput = row.querySelector('input[type="time"][name*="[start]"]');
                    const endTimeInput = row.querySelector('input[type="time"][name*="[end]"]');
                    const feedbackDiv = row.querySelector('.timing-validation-feedback');

                    if (startTimeInput && endTimeInput && feedbackDiv) {
                        const startTime = startTimeInput.value;
                        const endTime = endTimeInput.value;

                        if (startTime && endTime) {
                            if (startTime >= endTime) {
                                feedbackDiv.textContent = 'End time must be after start time';
                                feedbackDiv.classList.remove('hidden');
                                startTimeInput.classList.add('border-red-500');
                                endTimeInput.classList.add('border-red-500');
                                isValid = false;
                            } else {
                                feedbackDiv.classList.add('hidden');
                                startTimeInput.classList.remove('border-red-500');
                                endTimeInput.classList.remove('border-red-500');
                            }
                        }
                    }
                });

                return isValid;
            }

            // Add time validation listeners
            document.querySelectorAll('input[type="time"]').forEach(timeInput => {
                timeInput.addEventListener('change', validateTimings);
            });

            // Form submission validation
            form.addEventListener('submit', function(e) {
                let isFormValid = true;

                // Validate required fields
                const requiredFields = form.querySelectorAll('[required]');
                requiredFields.forEach(field => {
                    if (!field.value.trim()) {
                        showValidationError(field, 'This field is required');
                        isFormValid = false;
                    }
                });

                // Validate timings
                if (!validateTimings()) {
                    isFormValid = false;
                }

                // Validate file if selected
                if (logoInput && logoInput.files[0]) {
                    const file = logoInput.files[0];
                    if (file.size > 5242880) {
                        showValidationError(logoInput, 'File size must be less than 5MB');
                        isFormValid = false;
                    }
                }

                if (!isFormValid) {
                    e.preventDefault();
                    // Scroll to first error
                    const firstError = form.querySelector('.border-red-500');
                    if (firstError) {
                        firstError.scrollIntoView({ behavior: 'smooth', block: 'center' });
                        firstError.focus();
                    }
                }
            });

            // Helper functions
            function showValidationError(input, message) {
                input.classList.add('border-red-500');
                const feedbackDiv = input.parentNode.querySelector('.validation-feedback');
                if (feedbackDiv) {
                    feedbackDiv.textContent = message;
                    feedbackDiv.classList.remove('hidden');
                }
            }

            function hideValidationError(input) {
                input.classList.remove('border-red-500');
                const feedbackDiv = input.parentNode.querySelector('.validation-feedback');
                if (feedbackDiv) {
                    feedbackDiv.classList.add('hidden');
                }
            }

            // Color picker validation
            document.querySelectorAll('input[type="color"]').forEach(colorInput => {
                const textInput = colorInput.parentNode.querySelector('input[type="text"]');
                
                colorInput.addEventListener('change', function() {
                    if (textInput) {
                        textInput.value = this.value;
                    }
                });
            });
        });
    </script>

</x-app-layout>
