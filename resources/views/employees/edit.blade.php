<x-app-layout>
    <x-slot name="header">
        <div class="theme-app" style="background: linear-gradient(to right, var(--secondary-bg), var(--primary-bg)); padding: 1.5rem 1rem; sm:padding: 3rem 2rem; border-radius: 0;">
            <div class="max-w-7xl mx-auto">
                {{-- Added lg:mr-24 to create space for the dropdown on larger screens --}}
                <div class="flex flex-col sm:flex-row justify-between items-center gap-4 sm:gap-0 lg:mr-24">
                    <div class="flex items-center space-x-2 sm:space-x-3 text-center sm:text-left mb-4 sm:mb-0">
                        <div class="p-2 sm:p-3 rounded-lg sm:rounded-2xl shadow-lg" style="background-color: var(--hover-bg);">
                            <svg class="w-5 h-5 sm:w-6 sm:h-6" style="color: var(--primary-text);" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                            </svg>
                        </div>
                        {{-- Reduced heading size for larger screens --}}
                        <h1 class="text-2xl sm:text-3xl font-bold leading-tight" style="color: var(--primary-text);">
                            Edit Employee
                        </h1>
                        <p class="text-sm sm:text-lg mt-1" style="color: var(--secondary-text);">
                            Update employee information and details
                        </p>
                    </div>
                    <div class="w-full sm:w-auto">
                        <a href="{{ route('employees.index') }}" 
                           class="inline-flex items-center justify-center w-full px-4 py-2 sm:px-6 sm:py-3 text-sm sm:text-base font-semibold rounded-lg shadow-lg hover:scale-105 transform transition-all duration-300 ease-in-out focus:outline-none focus:ring-4"
                           style="background-color: var(--hover-bg); color: var(--primary-text);"
                           onmouseover="this.style.backgroundColor='var(--primary-bg-light)'"
                           onmouseout="this.style.backgroundColor='var(--hover-bg)'">
                            <svg class="w-4 h-4 sm:w-5 sm:h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                            </svg>
                            Back to List
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>

    <div class="py-6 sm:py-8" style="background-color: #f1f5f9; min-height: 100vh;">
        <div class="mx-auto"> {{-- Removed max-w-4xl and px-4 sm:px-6 lg:px-8 here --}}
            
            <!-- Employee Profile Card -->
            <div class="theme-app rounded-xl sm:rounded-3xl shadow-lg mb-6 sm:mb-8 p-4 sm:p-8" style="background: linear-gradient(135deg, var(--secondary-bg), var(--primary-bg));">
                <div class="flex flex-col sm:flex-row items-center space-y-4 sm:space-y-0 sm:space-x-6 text-center sm:text-left">
                    <div class="relative">
                        <div class="w-16 h-16 sm:w-20 sm:h-20 rounded-full flex items-center justify-center shadow-lg" style="background-color: var(--hover-bg);">
                            <span class="text-xl sm:text-2xl font-bold" style="color: var(--primary-text);">
                                {{ substr($employee->name ?? 'E', 0, 1) }}
                            </span>
                        </div>
                    </div>
                    <div class="flex-1">
                        <h2 class="text-xl sm:text-2xl font-bold mb-1" style="color: var(--primary-text);">{{ $employee->name ?? 'Employee Name' }}</h2>
                        <p class="text-sm sm:text-lg mb-2 sm:mb-3" style="color: var(--secondary-text);">{{ $employee->email ?? 'employee@company.com' }}</p>
                        <div class="flex items-center justify-center sm:justify-start space-x-2 sm:space-x-3">
                            <span class="inline-flex items-center px-2 py-0.5 sm:px-3 sm:py-1 rounded-full text-xs sm:text-sm font-medium bg-green-500 text-white">
                                {{ ucfirst($employee->status ?? 'Active') }}
                            </span>
                            <span class="inline-flex items-center px-2 py-0.5 sm:px-3 sm:py-1 rounded-full text-xs sm:text-sm font-medium" style="background-color: var(--hover-bg); color: var(--primary-text);">
                                {{ ucfirst(str_replace('_', ' ', $employee->employment_type ?? 'Full Time')) }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <form id="employeeEditForm" action="{{ route('employees.update', $employee->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4 sm:space-y-8">
                @csrf
                @method('PUT')

                <!-- Basic Personal Details Section -->
                <div class="bg-white rounded-xl sm:rounded-3xl shadow-lg overflow-hidden border border-gray-200">
                    <div class="theme-app px-4 py-3 sm:px-6 sm:py-4 flex items-center space-x-2 sm:space-x-3" style="background: linear-gradient(to right, var(--secondary-bg), var(--primary-bg));">
                        <div class="w-7 h-7 sm:w-8 h-8 rounded-full flex items-center justify-center text-white font-bold text-xs sm:text-sm" style="background-color: var(--hover-bg);">
                            1
                        </div>
                        <h3 class="text-base sm:text-lg font-bold" style="color: var(--primary-text);">Basic personal details and contact information</h3>
                    </div>
                    
                    <div class="p-4 sm:p-8">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 sm:gap-6">
                            <div class="space-y-2">
                                <label class="block text-xs sm:text-sm font-semibold text-gray-700 uppercase tracking-wide">
                                    Full Name <span class="text-red-500">*</span>
                                </label>
                                <input type="text" name="name" id="name" value="{{ $employee->name }}"
                                    class="w-full px-3 py-2.5 sm:px-4 sm:py-3 bg-white border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 text-sm"
                                    placeholder="Enter full name">
                                <div class="error-message hidden flex items-center space-x-2 mt-1 p-2 bg-red-50 border border-red-200 rounded-lg">
                                    <svg class="w-4 h-4 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <span class="text-sm text-red-600 font-medium"></span>
                                </div>
                            </div>

                            <div class="space-y-2">
                                <label class="block text-xs sm:text-sm font-semibold text-gray-700 uppercase tracking-wide">
                                    Email Address <span class="text-red-500">*</span>
                                </label>
                                <input type="email" name="email" id="email" value="{{ $employee->email }}"
                                    class="w-full px-3 py-2.5 sm:px-4 sm:py-3 bg-white border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 text-sm"
                                    placeholder="Enter email address">
                                <div class="error-message hidden flex items-center space-x-2 mt-1 p-2 bg-red-50 border border-red-200 rounded-lg">
                                    <svg class="w-4 h-4 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <span class="text-sm text-red-600 font-medium"></span>
                                </div>
                            </div>

                            <div class="space-y-2">
                                <label class="block text-xs sm:text-sm font-semibold text-gray-700 uppercase tracking-wide">Gender</label>
                                <select name="gender" id="gender" class="w-full px-3 py-2.5 sm:px-4 sm:py-3 bg-white border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 text-sm">
                                    <option value="">Select Gender</option>
                                    <option value="male" {{ $employee->gender === 'male' ? 'selected' : '' }}>Male</option>
                                    <option value="female" {{ $employee->gender === 'female' ? 'selected' : '' }}>Female</option>
                                    <option value="other" {{ $employee->gender === 'other' ? 'selected' : '' }}>Other</option>
                                </select>
                                <div class="error-message hidden flex items-center space-x-2 mt-1 p-2 bg-red-50 border border-red-200 rounded-lg">
                                    <svg class="w-4 h-4 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <span class="text-sm text-red-600 font-medium"></span>
                                </div>
                            </div>

                            <div class="space-y-2">
                                <label class="block text-xs sm:text-sm font-semibold text-gray-700 uppercase tracking-wide">Date of Birth</label>
                                <input type="date" name="date_of_birth" id="date_of_birth" value="{{ $employee->date_of_birth }}"
                                    class="w-full px-3 py-2.5 sm:px-4 sm:py-3 bg-white border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 text-sm">
                                <div class="error-message hidden flex items-center space-x-2 mt-1 p-2 bg-red-50 border border-red-200 rounded-lg">
                                    <svg class="w-4 h-4 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <span class="text-sm text-red-600 font-medium"></span>
                                </div>
                            </div>

                            <div class="space-y-2 md:col-span-2">
                                <label class="block text-xs sm:text-sm font-semibold text-gray-700 uppercase tracking-wide">Phone Number</label>
                                <input type="text" name="phone" id="phone" value="{{ $employee->phone }}"
                                    class="w-full px-3 py-2.5 sm:px-4 sm:py-3 bg-white border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 text-sm"
                                    placeholder="Enter phone number">
                                <div class="error-message hidden flex items-center space-x-2 mt-1 p-2 bg-red-50 border border-red-200 rounded-lg">
                                    <svg class="w-4 h-4 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <span class="text-sm text-red-600 font-medium"></span>
                                </div>
                            </div>

                            <div class="space-y-2 md:col-span-2">
                                <label class="block text-xs sm:text-sm font-semibold text-gray-700 uppercase tracking-wide">Address</label>
                                <textarea name="address" id="address" rows="3" 
                                    class="w-full px-3 py-2.5 sm:px-4 sm:py-3 bg-white border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 resize-none text-sm"
                                    placeholder="Enter address">{{ $employee->address }}</textarea>
                                <div class="error-message hidden flex items-center space-x-2 mt-1 p-2 bg-red-50 border border-red-200 rounded-lg">
                                    <svg class="w-4 h-4 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <span class="text-sm text-red-600 font-medium"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Address and Geographical Details Section -->
                <div class="bg-white rounded-xl sm:rounded-3xl shadow-lg overflow-hidden border border-gray-200">
                    <div class="theme-app px-4 py-3 sm:px-6 sm:py-4 flex items-center space-x-2 sm:space-x-3" style="background: linear-gradient(to right, var(--secondary-bg), var(--primary-bg));">
                        <div class="w-7 h-7 sm:w-8 h-8 rounded-full flex items-center justify-center text-white font-bold text-xs sm:text-sm" style="background-color: var(--hover-bg);">
                            2
                        </div>
                        <h3 class="text-base sm:text-lg font-bold" style="color: var(--primary-text);">Address and geographical details</h3>
                    </div>
                    
                    <div class="px-4 sm:px-6 py-4 sm:py-8"> {{-- Adjusted padding here --}}
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 sm:gap-6">
                            <div class="space-y-2">
                                <label class="block text-xs sm:text-sm font-semibold text-gray-700 uppercase tracking-wide">City</label>
                                <input type="text" name="city" id="city" value="{{ $employee->city }}"
                                    class="w-full px-3 py-2.5 sm:px-4 sm:py-3 bg-white border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 text-sm"
                                    placeholder="Enter city">
                                <div class="error-message hidden flex items-center space-x-2 mt-1 p-2 bg-red-50 border border-red-200 rounded-lg">
                                    <svg class="w-4 h-4 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <span class="text-sm text-red-600 font-medium"></span>
                                </div>
                            </div>

                            <div class="space-y-2">
                                <label class="block text-xs sm:text-sm font-semibold text-gray-700 uppercase tracking-wide">State</label>
                                <input type="text" name="state" id="state" value="{{ $employee->state }}"
                                    class="w-full px-3 py-2.5 sm:px-4 sm:py-3 bg-white border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 text-sm"
                                    placeholder="Enter state">
                                <div class="error-message hidden flex items-center space-x-2 mt-1 p-2 bg-red-50 border border-red-200 rounded-lg">
                                    <svg class="w-4 h-4 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <span class="text-sm text-red-600 font-medium"></span>
                                </div>
                            </div>

                            <div class="space-y-2">
                                <label class="block text-xs sm:text-sm font-semibold text-gray-700 uppercase tracking-wide">Postal Code</label>
                                <input type="text" name="postal_code" id="postal_code" value="{{ $employee->postal_code }}"
                                    class="w-full px-3 py-2.5 sm:px-4 sm:py-3 bg-white border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 text-sm"
                                    placeholder="Enter postal code">
                                <div class="error-message hidden flex items-center space-x-2 mt-1 p-2 bg-red-50 border border-red-200 rounded-lg">
                                    <svg class="w-4 h-4 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <span class="text-sm text-red-600 font-medium"></span>
                                </div>
                            </div>

                            <div class="space-y-2">
                                <label class="block text-xs sm:text-sm font-semibold text-gray-700 uppercase tracking-wide">Country</label>
                                <input type="text" name="country" id="country" value="{{ $employee->country }}"
                                    class="w-full px-3 py-2.5 sm:px-4 sm:py-3 bg-white border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 text-sm"
                                    placeholder="Enter country">
                                <div class="error-message hidden flex items-center space-x-2 mt-1 p-2 bg-red-50 border border-red-200 rounded-lg">
                                    <svg class="w-4 h-4 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <span class="text-sm text-red-600 font-medium"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Job Details and Employment Status Section -->
                <div class="bg-white rounded-xl sm:rounded-3xl shadow-lg overflow-hidden border border-gray-200">
                    <div class="theme-app px-4 py-3 sm:px-6 sm:py-4 flex items-center space-x-2 sm:space-x-3" style="background: linear-gradient(to right, var(--secondary-bg), var(--primary-bg));">
                        <div class="w-7 h-7 sm:w-8 h-8 rounded-full flex items-center justify-center text-white font-bold text-xs sm:text-sm" style="background-color: var(--hover-bg);">
                            3
                        </div>
                        <h3 class="text-base sm:text-lg font-bold" style="color: var(--primary-text);">Job details and employment status</h3>
                    </div>
                    
                    <div class="px-4 sm:px-6 py-4 sm:py-8"> {{-- Adjusted padding here --}}
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 sm:gap-6">
                            <div class="space-y-2">
                                <label class="block text-xs sm:text-sm font-semibold text-gray-700 uppercase tracking-wide">
                                    Joining Date <span class="text-red-500">*</span>
                                </label>
                                <input type="date" name="joining_date" id="joining_date" value="{{ $employee->joining_date }}"
                                    class="w-full px-3 py-2.5 sm:px-4 sm:py-3 bg-white border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 text-sm">
                                <div class="error-message hidden flex items-center space-x-2 mt-1 p-2 bg-red-50 border border-red-200 rounded-lg">
                                    <svg class="w-4 h-4 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <span class="text-sm text-red-600 font-medium"></span>
                                </div>
                            </div>

                            <div class="space-y-2">
                                <label class="block text-xs sm:text-sm font-semibold text-gray-700 uppercase tracking-wide">
                                    Employment Type <span class="text-red-500">*</span>
                                </label>
                                <select name="employment_type" id="employment_type" class="w-full px-3 py-2.5 sm:px-4 sm:py-3 bg-white border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 text-sm">
                                    <option value="">Select Employment Type</option>
                                    <option value="full_time" {{ $employee->employment_type === 'full_time' ? 'selected' : '' }}>Full Time</option>
                                    <option value="part_time" {{ $employee->employment_type === 'part_time' ? 'selected' : '' }}>Part Time</option>
                                    <option value="intern" {{ $employee->employment_type === 'intern' ? 'selected' : '' }}>Intern</option>
                                    <option value="trainee" {{ $employee->employment_type === 'trainee' ? 'selected' : '' }}>Trainee</option>
                                </select>
                                <div class="error-message hidden flex items-center space-x-2 mt-1 p-2 bg-red-50 border border-red-200 rounded-lg">
                                    <svg class="w-4 h-4 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <span class="text-sm text-red-600 font-medium"></span>
                                </div>
                            </div>

                            <div class="space-y-2">
                                <label class="block text-xs sm:text-sm font-semibold text-gray-700 uppercase tracking-wide">
                                    Status <span class="text-red-500">*</span>
                                </label>
                                <select name="status" id="status" class="w-full px-3 py-2.5 sm:px-4 sm:py-3 bg-white border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 text-sm">
                                    <option value="">Select Status</option>
                                    <option value="active" {{ $employee->status === 'active' ? 'selected' : '' }}>Active</option>
                                    <option value="inactive" {{ $employee->status === 'inactive' ? 'selected' : '' }}>Inactive</option>
                                    <option value="terminated" {{ $employee->status === 'terminated' ? 'selected' : '' }}>Terminated</option>
                                </select>
                                <div class="error-message hidden flex items-center space-x-2 mt-1 p-2 bg-red-50 border border-red-200 rounded-lg">
                                    <svg class="w-4 h-4 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <span class="text-sm text-red-600 font-medium"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex flex-col sm:flex-row items-center justify-center sm:justify-end space-y-3 sm:space-y-0 sm:space-x-4 pt-4 sm:pt-6 border-t border-gray-200">
                    <a href="{{ route('employees.index') }}" 
                       class="inline-flex items-center justify-center w-full sm:w-auto px-4 py-3 sm:px-6 sm:py-4 border border-gray-300 text-gray-700 bg-white font-semibold rounded-lg shadow-sm hover:bg-gray-50 hover:scale-105 transform transition-all duration-300 ease-in-out focus:outline-none focus:ring-4 focus:ring-gray-300 text-sm sm:text-base">
                        <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                        Cancel
                    </a>
                    
                    <button type="submit" id="updateEmployeeBtn"
                            class="theme-app inline-flex items-center justify-center w-full sm:w-auto px-6 py-3 sm:px-8 sm:py-4 font-semibold rounded-lg shadow-lg hover:scale-105 transform transition-all duration-300 ease-in-out focus:outline-none focus:ring-4 text-base sm:text-lg"
                            style="background-color: var(--hover-bg); color: var(--primary-text);"
                            onmouseover="this.style.backgroundColor='var(--primary-bg-light)'"
                            onmouseout="this.style.backgroundColor='var(--hover-bg)'">
                        <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path>
                        </svg>
                        Update Employee
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- JavaScript Validation -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('employeeEditForm');
            const submitBtn = document.getElementById('updateEmployeeBtn');
            
            // Store original values for change detection
            const originalValues = {
                name: document.getElementById('name').value,
                email: document.getElementById('email').value,
                gender: document.getElementById('gender').value,
                date_of_birth: document.getElementById('date_of_birth').value,
                phone: document.getElementById('phone').value,
                address: document.getElementById('address').value,
                city: document.getElementById('city').value,
                state: document.getElementById('state').value,
                postal_code: document.getElementById('postal_code').value,
                country: document.getElementById('country').value,
                joining_date: document.getElementById('joining_date').value,
                employment_type: document.getElementById('employment_type').value,
                status: document.getElementById('status').value
            };

            // Validation rules
            const validationRules = {
                name: {
                    required: true,
                    minLength: 2,
                    maxLength: 100,
                    pattern: /^[a-zA-Z\s'-]+$/,
                    message: {
                        required: 'Full name is required',
                        minLength: 'Name must be at least 2 characters long',
                        maxLength: 'Name cannot exceed 100 characters',
                        pattern: 'Name can only contain letters, spaces, hyphens, and apostrophes'
                    }
                },
                email: {
                    required: true,
                    pattern: /^[^\s@]+@[^\s@]+\.[^\s@]+$/,
                    maxLength: 255,
                    message: {
                        required: 'Email address is required',
                        pattern: 'Please enter a valid email address',
                        maxLength: 'Email cannot exceed 255 characters'
                    }
                },
                phone: {
                    pattern: /^[\+]?[1-9][\d]{0,15}$/,
                    minLength: 10,
                    maxLength: 15,
                    message: {
                        pattern: 'Please enter a valid phone number',
                        minLength: 'Phone number must be at least 10 digits',
                        maxLength: 'Phone number cannot exceed 15 digits'
                    }
                },
                date_of_birth: {
                    validate: function(value) {
                        if (!value) return true; // Optional field
                        const birthDate = new Date(value);
                        const today = new Date();
                        const age = today.getFullYear() - birthDate.getFullYear();
                        const monthDiff = today.getMonth() - birthDate.getMonth();
                        
                        if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < birthDate.getDate())) {
                            age--;
                        }
                        
                        return age >= 16 && age <= 100;
                    },
                    message: {
                        validate: 'Employee must be between 16 and 100 years old'
                    }
                },
                address: {
                    maxLength: 500,
                    message: {
                        maxLength: 'Address cannot exceed 500 characters'
                    }
                },
                city: {
                    pattern: /^[a-zA-Z\s'-]+$/,
                    maxLength: 100,
                    message: {
                        pattern: 'City name can only contain letters, spaces, hyphens, and apostrophes',
                        maxLength: 'City name cannot exceed 100 characters'
                    }
                },
                state: {
                    pattern: /^[a-zA-Z\s'-]+$/,
                    maxLength: 100,
                    message: {
                        pattern: 'State name can only contain letters, spaces, hyphens, and apostrophes',
                        maxLength: 'State name cannot exceed 100 characters'
                    }
                },
                postal_code: {
                    pattern: /^[a-zA-Z0-9\s-]+$/,
                    maxLength: 20,
                    message: {
                        pattern: 'Postal code can only contain letters, numbers, spaces, and hyphens',
                        maxLength: 'Postal code cannot exceed 20 characters'
                    }
                },
                country: {
                    pattern: /^[a-zA-Z\s'-]+$/,
                    maxLength: 100,
                    message: {
                        pattern: 'Country name can only contain letters, spaces, hyphens, and apostrophes',
                        maxLength: 'Country name cannot exceed 100 characters'
                    }
                },
                joining_date: {
                    required: true,
                    validate: function(value) {
                        if (!value) return false;
                        const joiningDate = new Date(value);
                        const today = new Date();
                        const minDate = new Date('1900-01-01');
                        
                        return joiningDate >= minDate && joiningDate <= today;
                    },
                    message: {
                        required: 'Joining date is required',
                        validate: 'Joining date must be between 1900 and today'
                    }
                },
                employment_type: {
                    required: true,
                    message: {
                        required: 'Employment type is required'
                    }
                },
                status: {
                    required: true,
                    message: {
                        required: 'Status is required'
                    }
                }
            };

            // Validate individual field
            function validateField(fieldName, value) {
                const rules = validationRules[fieldName];
                if (!rules) return { isValid: true };

                const trimmedValue = typeof value === 'string' ? value.trim() : value;

                // Required validation
                if (rules.required && (!trimmedValue || trimmedValue === '')) {
                    return { isValid: false, message: rules.message.required };
                }

                // Skip other validations if field is empty and not required
                if (!trimmedValue && !rules.required) {
                    return { isValid: true };
                }

                // Length validations
                if (rules.minLength && trimmedValue.length < rules.minLength) {
                    return { isValid: false, message: rules.message.minLength };
                }

                if (rules.maxLength && trimmedValue.length > rules.maxLength) {
                    return { isValid: false, message: rules.message.maxLength };
                }

                // Pattern validation
                if (rules.pattern && !rules.pattern.test(trimmedValue)) {
                    return { isValid: false, message: rules.message.pattern };
                }

                // Custom validation
                if (rules.validate && !rules.validate(trimmedValue)) {
                    return { isValid: false, message: rules.message.validate };
                }

                return { isValid: true };
            }

            // Show error message
            function showError(fieldName, message) {
                const field = document.getElementById(fieldName);
                const errorDiv = field.parentNode.querySelector('.error-message');
                const errorSpan = errorDiv.querySelector('span');
                
                field.classList.remove('border-gray-300', 'border-green-500');
                field.classList.add('border-red-500');
                errorSpan.textContent = message;
                errorDiv.classList.remove('hidden');
            }

            // Hide error message
            function hideError(fieldName) {
                const field = document.getElementById(fieldName);
                const errorDiv = field.parentNode.querySelector('.error-message');
                
                field.classList.remove('border-red-500');
                field.classList.add('border-green-500');
                errorDiv.classList.add('hidden');
                
                // Reset to default after a short delay
                setTimeout(() => {
                    field.classList.remove('border-green-500');
                    field.classList.add('border-gray-300');
                }, 2000);
            }

            // Validate all fields
            function validateForm() {
                let isFormValid = true;
                const formData = new FormData(form);

                Object.keys(validationRules).forEach(fieldName => {
                    const value = formData.get(fieldName) || '';
                    const validation = validateField(fieldName, value);
                    
                    if (!validation.isValid) {
                        showError(fieldName, validation.message);
                        isFormValid = false;
                    } else {
                        hideError(fieldName);
                    }
                });

                return isFormValid;
            }

            // Check if form has changes
            function hasFormChanged() {
                const formData = new FormData(form);
                
                return Object.keys(originalValues).some(key => {
                    const currentValue = formData.get(key) || '';
                    const originalValue = originalValues[key] || '';
                    return currentValue !== originalValue;
                });
            }

            // Update submit button state
            function updateSubmitButton() {
                const hasChanges = hasFormChanged();
                const isValid = validateForm();
                
                if (!hasChanges) {
                    submitBtn.disabled = true;
                    submitBtn.innerHTML = `
                        <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        No Changes Made
                    `;
                    submitBtn.style.opacity = '0.6';
                } else if (!isValid) {
                    submitBtn.disabled = true;
                    submitBtn.innerHTML = `
                        <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        Please Fix Errors
                    `;
                    submitBtn.style.opacity = '0.6';
                } else {
                    submitBtn.disabled = false;
                    submitBtn.innerHTML = `
                        <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path>
                        </svg>
                        Update Employee
                    `;
                    submitBtn.style.opacity = '1';
                }
            }

            // Real-time validation for all form fields
            Object.keys(validationRules).forEach(fieldName => {
                const field = document.getElementById(fieldName);
                if (field) {
                    // Validate on input/change
                    field.addEventListener('input', function() {
                        const validation = validateField(fieldName, this.value);
                        if (!validation.isValid) {
                            showError(fieldName, validation.message);
                        } else {
                            hideError(fieldName);
                        }
                        updateSubmitButton();
                    });

                    field.addEventListener('change', function() {
                        updateSubmitButton();
                    });

                    // Auto-format certain fields
                    if (fieldName === 'name') {
                        field.addEventListener('input', function() {
                            // Capitalize first letter of each word
                            this.value = this.value.replace(/\b\w/g, l => l.toUpperCase());
                        });
                    }

                    if (fieldName === 'email') {
                        field.addEventListener('input', function() {
                            // Convert to lowercase
                            this.value = this.value.toLowerCase().trim();
                        });
                    }

                    if (fieldName === 'phone') {
                        field.addEventListener('input', function() {
                            // Remove non-numeric characters except + at the beginning
                            this.value = this.value.replace(/(?!^)\+/g, '').replace(/[^\d+]/g, '');
                        });
                    }
                }
            });

            // Form submission
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                
                if (!validateForm()) {
                    // Scroll to first error
                    const firstError = document.querySelector('.error-message:not(.hidden)');
                    if (firstError) {
                        firstError.scrollIntoView({ behavior: 'smooth', block: 'center' });
                    }
                    return;
                }

                if (!hasFormChanged()) {
                    alert('No changes have been made to update.');
                    return;
                }

                // Show loading state
                submitBtn.disabled = true;
                submitBtn.innerHTML = `
                    <svg class="animate-spin -ml-1 mr-3 h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    Updating Employee...
                `;

                // Submit the form
                this.submit();
            });

            // Initial validation
            updateSubmitButton();
        });
    </script>

    <style>
        /* Loading spinner animation */
        @keyframes spin {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }
        
        .animate-spin {
            animation: spin 1s linear infinite;
        }

        /* Smooth transitions for form elements */
        input, select, textarea {
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }

        /* Success state styling */
        .border-green-500 {
            border-color: #10b981 !important;
            box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.1);
        }

        /* Error state styling */
        .border-red-500 {
            border-color: #ef4444 !important;
            box-shadow: 0 0 0 3px rgba(239, 68, 68, 0.1);
        }

        /* Disabled button styling */
        button:disabled {
            cursor: not-allowed;
            transform: none !important;
        }

        button:disabled:hover {
            transform: none !important;
            scale: 1 !important;
        }
    </style>
</x-app-layout>
