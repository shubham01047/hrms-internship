<x-app-layout>
    <x-slot name="header">
        <div class="theme-app p-4 sm:p-6 rounded-lg shadow-sm" style="background: linear-gradient(to right, var(--secondary-bg), var(--primary-bg));">
            <div class="max-w-7xl mx-auto">
                {{-- Adjusted for responsiveness --}}
                <div class="flex flex-col sm:flex-row justify-between items-center gap-4 sm:gap-0 lg:mr-24">
                    <div class="flex items-center space-x-2 sm:space-x-3 text-center sm:text-left mb-4 sm:mb-0">
                        <div class="p-2 sm:p-3 rounded-lg sm:rounded-2xl shadow-lg" style="background-color: var(--hover-bg);">
                            <svg class="w-5 h-5 sm:w-6 sm:h-6" style="color: var(--primary-text);" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                        </div>
                        {{-- Reduced heading size for larger screens --}}
                        <h2 class="font-bold text-xl sm:text-xl lg:text-2xl leading-tight" style="color: var(--primary-text);">
                            Create New User
                        </h2>
                    </div>
                    <div class="w-full sm:w-auto">
                        <a href="{{ route('users.index') }}" 
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

    <div class="py-6 sm:py-8">
        <div class="max-w-7xl mx-auto px-1 sm:px-2 lg:px-4"> {{-- increased max-width and reduced padding further --}}
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-xl border border-gray-200">
                <div class="theme-app px-2 py-3 sm:px-3 sm:py-4 border-b border-gray-200" style="background: linear-gradient(to right, var(--secondary-bg), var(--primary-bg));"> {{-- reduced header padding --}}
                    <div class="flex items-center space-x-2 sm:space-x-3">
                        <div class="p-2 rounded-lg shadow-sm" style="background-color: var(--hover-bg);">
                            <svg class="w-4 h-4 sm:w-5 sm:h-5" style="color: var(--primary-text);" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-base sm:text-lg font-semibold" style="color: var(--primary-text);">Create User Information</h3>
                            <p class="text-xs sm:text-sm" style="color: var(--secondary-text);">Add new user details and role assignments</p>
                        </div>
                    </div>
                </div>
                
                <div class="p-2 sm:p-4"> {{-- reduced form content padding --}}
                    <form id="userCreateForm" action="{{ route('users.store') }}" method="POST" class="space-y-4 sm:space-y-8">
                        @csrf
                        
                        {{-- User Information Section --}}
                        <div class="bg-gray-50 rounded-lg p-2 sm:p-4 border border-gray-200"> {{-- reduced section padding --}}
                            <div class="space-y-2 sm:space-y-4">
                                <div class="flex items-center space-x-1.5 sm:space-x-2 mb-2 sm:mb-4">
                                    <svg class="w-4 h-4 sm:w-5 sm:h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                    <h4 class="theme-app text-base sm:text-lg font-semibold" style="color: var(--secondary-text);">User Information</h4>
                                </div>
                                
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 sm:gap-6">
                                    <div class="space-y-2">
                                        <label for="name" class="block text-sm font-semibold text-gray-700">
                                            <div class="flex items-center space-x-1.5 sm:space-x-2">
                                                <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                                </svg>
                                                <span>Full Name</span>
                                                <span class="text-red-500">*</span>
                                            </div>
                                        </label>
                                        <input type="text" 
                                               name="name" 
                                               id="name"
                                               value="{{ old('name') }}"
                                               placeholder="Enter full name"
                                               class="w-full px-3 py-2.5 sm:px-4 sm:py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-4 focus:ring-blue-200 focus:border-blue-500 transition-all duration-300 ease-in-out hover:border-gray-400 bg-white text-sm">
                                        <div id="name-error" class="hidden flex items-center space-x-2 mt-2 p-2 sm:p-3 bg-red-50 border border-red-200 rounded-lg">
                                            <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                            <span class="text-xs sm:text-sm text-red-600 font-medium"></span>
                                        </div>
                                        @error('name')
                                            <div class="flex items-center space-x-2 mt-2 p-2 sm:p-3 bg-red-50 border border-red-200 rounded-lg">
                                                <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                </svg>
                                                <span class="text-xs sm:text-sm text-red-600 font-medium">{{ $message }}</span>
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="space-y-2">
                                        <label for="email" class="block text-sm font-semibold text-gray-700">
                                            <div class="flex items-center space-x-1.5 sm:space-x-2">
                                                <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                                </svg>
                                                <span>Email Address</span>
                                                <span class="text-red-500">*</span>
                                            </div>
                                        </label>
                                        <input type="email" 
                                               name="email" 
                                               id="email"
                                               value="{{ old('email') }}"
                                               placeholder="Enter email address"
                                               class="w-full px-3 py-2.5 sm:px-4 sm:py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-4 focus:ring-blue-200 focus:border-blue-500 transition-all duration-300 ease-in-out hover:border-gray-400 bg-white text-sm">
                                        <div id="email-error" class="hidden flex items-center space-x-2 mt-2 p-2 sm:p-3 bg-red-50 border border-red-200 rounded-lg">
                                            <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                            <span class="text-xs sm:text-sm text-red-600 font-medium"></span>
                                        </div>
                                        @error('email')
                                            <div class="flex items-center space-x-2 mt-2 p-2 sm:p-3 bg-red-50 border border-red-200 rounded-lg">
                                                <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                </svg>
                                                <span class="text-xs sm:text-sm text-red-600 font-medium">{{ $message }}</span>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Password Section --}}
                        <div class="bg-green-50 rounded-lg p-2 sm:p-4 border border-green-200"> {{-- reduced section padding --}}
                            <div class="flex items-center space-x-1.5 sm:space-x-2 mb-4 sm:mb-6">
                                <svg class="w-4 h-4 sm:w-5 sm:h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                </svg>
                                <h4 class="theme-app text-base sm:text-lg font-semibold" style="color: var(--secondary-text);">Security Information</h4>
                            </div>
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 sm:gap-6">
                                <div class="space-y-2">
                                    <label for="password" class="block text-sm font-semibold text-gray-700">
                                        <div class="flex items-center space-x-1.5 sm:space-x-2">
                                            <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                            </svg>
                                            <span>Password</span>
                                            <span class="text-red-500">*</span>
                                        </div>
                                    </label>
                                    <div class="relative">
                                        <input type="password" 
                                               name="password" 
                                               id="password"
                                               placeholder="Enter secure password"
                                               class="w-full px-3 py-2.5 sm:px-4 sm:py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-4 focus:ring-green-200 focus:border-green-500 transition-all duration-300 ease-in-out hover:border-gray-400 bg-white text-sm pr-10">
                                        <button type="button" id="togglePassword" class="absolute inset-y-0 right-0 pr-3 flex items-center">
                                            <svg id="eyeIcon" class="w-4 h-4 text-gray-400 hover:text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                            </svg>
                                        </button>
                                    </div>
                                    <div id="password-strength" class="hidden mt-2">
                                        <div class="flex items-center space-x-2 mb-2">
                                            <span class="text-xs font-medium text-gray-600">Password Strength:</span>
                                            <span id="strength-text" class="text-xs font-bold"></span>
                                        </div>
                                        <div class="w-full bg-gray-200 rounded-full h-2">
                                            <div id="strength-bar" class="h-2 rounded-full transition-all duration-300"></div>
                                        </div>
                                    </div>
                                    <div id="password-error" class="hidden flex items-center space-x-2 mt-2 p-2 sm:p-3 bg-red-50 border border-red-200 rounded-lg">
                                        <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        <span class="text-xs sm:text-sm text-red-600 font-medium"></span>
                                    </div>
                                    @error('password')
                                        <div class="flex items-center space-x-2 mt-2 p-2 sm:p-3 bg-red-50 border border-red-200 rounded-lg">
                                            <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                            <span class="text-xs sm:text-sm text-red-600 font-medium">{{ $message }}</span>
                                        </div>
                                    @enderror
                                </div>

                                <div class="space-y-2">
                                    <label for="confirm_password" class="block text-sm font-semibold text-gray-700">
                                        <div class="flex items-center space-x-1.5 sm:space-x-2">
                                            <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.031 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                                            </svg>
                                            <span>Confirm Password</span>
                                            <span class="text-red-500">*</span>
                                        </div>
                                    </label>
                                    <div class="relative">
                                        <input type="password" 
                                               name="confirm_password" 
                                               id="confirm_password"
                                               placeholder="Confirm your password"
                                               class="w-full px-3 py-2.5 sm:px-4 sm:py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-4 focus:ring-green-200 focus:border-green-500 transition-all duration-300 ease-in-out hover:border-gray-400 bg-white text-sm pr-10">
                                        <button type="button" id="toggleConfirmPassword" class="absolute inset-y-0 right-0 pr-3 flex items-center">
                                            <svg id="eyeIconConfirm" class="w-4 h-4 text-gray-400 hover:text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                            </svg>
                                        </button>
                                    </div>
                                    <div id="confirm-password-error" class="hidden flex items-center space-x-2 mt-2 p-2 sm:p-3 bg-red-50 border border-red-200 rounded-lg">
                                        <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        <span class="text-xs sm:text-sm text-red-600 font-medium"></span>
                                    </div>
                                    @error('confirm_password')
                                        <div class="flex items-center space-x-2 mt-2 p-2 sm:p-3 bg-red-50 border border-red-200 rounded-lg">
                                            <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                            <span class="text-xs sm:text-sm text-red-600 font-medium">{{ $message }}</span>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        {{-- Roles Assignment Section --}}
                        <div class="bg-blue-50 rounded-lg p-2 sm:p-4 border border-blue-200"> {{-- reduced section padding --}}
                            <div class="flex items-center space-x-1.5 sm:space-x-2 mb-4 sm:mb-6">
                                <svg class="w-4 h-4 sm:w-5 sm:h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.031 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                                </svg>
                                <h4 class="theme-app text-base sm:text-lg font-semibold" style="color: var(--secondary-text);">Role Assignment</h4>
                            </div>
                            
                            @if ($roles->isNotEmpty())
                                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-3 sm:gap-4">
                                    @foreach ($roles as $role)
                                        <div class="bg-white rounded-lg p-3 sm:p-4 border border-gray-200 hover:border-blue-300 hover:shadow-md transition-all duration-300 ease-in-out transform hover:scale-[1.01]">
                                            <label for="role-{{ $role->id }}" class="flex items-center space-x-2 sm:space-x-3 cursor-pointer">
                                                <input type="checkbox" 
                                                       name="role[]" 
                                                       value="{{ $role->name }}"
                                                       id="role-{{ $role->id }}"
                                                       class="role-checkbox w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2 transition-all duration-200">
                                                <div class="flex items-center space-x-1.5 sm:space-x-2">
                                                    <div class="w-7 h-7 sm:w-8 sm:h-8 bg-gradient-to-r from-blue-100 to-blue-200 rounded-full flex items-center justify-center">
                                                        <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                                        </svg>
                                                    </div>
                                                    <span class="text-sm font-medium text-gray-900">{{ ucwords($role->name) }}</span>
                                                </div>
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                                <div id="roles-error" class="hidden flex items-center space-x-2 mt-4 p-2 sm:p-3 bg-red-50 border border-red-200 rounded-lg">
                                    <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <span class="text-xs sm:text-sm text-red-600 font-medium">Please select at least one role for the user.</span>
                                </div>
                            @else
                                <div class="text-center py-6 sm:py-8">
                                    <div class="w-14 h-14 sm:w-16 sm:h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-3 sm:mb-4">
                                        <svg class="w-7 h-7 sm:w-8 sm:h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                        </svg>
                                    </div>
                                    <p class="text-sm sm:text-base text-gray-500">No roles available to assign.</p>
                                </div>
                            @endif
                        </div>

                        <div class="bg-yellow-50 rounded-lg p-2 sm:p-3 border border-yellow-200"> {{-- reduced notice section padding --}}
                            <div class="flex items-start space-x-2 sm:space-x-3">
                                <svg class="w-4 h-4 sm:w-5 sm:h-5 text-yellow-500 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16c-.77.833.192 2.5 1.732 2.5z"></path>
                                </svg>
                                <div>
                                    <h4 class="text-sm sm:text-base font-semibold text-gray-900">Important Notice</h4>
                                    <p class="text-xs sm:text-sm text-gray-600 mt-1">
                                        User roles will determine their access permissions across the system. Choose carefully.
                                    </p>
                                </div>
                            </div>
                        </div>
                        
                        {{-- Action Buttons --}}
                        <div class="flex flex-col sm:flex-row items-center justify-center sm:justify-end space-y-3 sm:space-y-0 sm:space-x-4 pt-4 sm:pt-6 border-t border-gray-200">
                            <a href="{{ route('users.index') }}"
                               class="theme-app inline-flex items-center justify-center w-full sm:w-auto px-4 py-3 sm:px-6 sm:py-4 font-semibold rounded-lg shadow-lg hover:scale-105 transform transition-all duration-300 ease-in-out focus:outline-none focus:ring-4 text-sm sm:text-base"
                               style="background-color: var(--primary-border); color: var(--primary-text);"
                               onmouseover="this.style.backgroundColor='var(--primary-bg-light)'"
                               onmouseout="this.style.backgroundColor='var(--primary-border)'">
                                <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                                Cancel
                            </a>
                            <button type="submit" id="createUserBtn"
                                    class="theme-app inline-flex items-center justify-center w-full sm:w-auto px-6 py-3 sm:px-8 sm:py-4 font-semibold rounded-lg shadow-lg hover:scale-105 transform transition-all duration-300 ease-in-out focus:outline-none focus:ring-4 text-base sm:text-lg disabled:opacity-50 disabled:cursor-not-allowed disabled:hover:scale-100"
                                    style="background-color: var(--hover-bg); color: var(--primary-text);"
                                    onmouseover="this.style.backgroundColor='var(--primary-bg-light)'"
                                    onmouseout="this.style.backgroundColor='var(--hover-bg)'"
                                    disabled>
                                <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
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
            
            // Password strength elements
            const passwordStrength = document.getElementById('password-strength');
            const strengthBar = document.getElementById('strength-bar');
            const strengthText = document.getElementById('strength-text');
            
            let isSubmitting = false;
            
            // Validation state
            const validation = {
                name: false,
                email: false,
                password: false,
                confirmPassword: false,
                roles: false
            };
            
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
            
            // Validation functions
            function validateName() {
                const name = nameInput.value.trim();
                const nameError = document.getElementById('name-error');
                
                if (!name) {
                    showError(nameInput, nameError, 'Full name is required.');
                    validation.name = false;
                } else if (name.length < 2) {
                    showError(nameInput, nameError, 'Name must be at least 2 characters long.');
                    validation.name = false;
                } else if (name.length > 100) {
                    showError(nameInput, nameError, 'Name must not exceed 100 characters.');
                    validation.name = false;
                } else if (!/^[a-zA-Z\s\-'\.]+$/.test(name)) {
                    showError(nameInput, nameError, 'Name can only contain letters, spaces, hyphens, and apostrophes.');
                    validation.name = false;
                } else {
                    hideError(nameInput, nameError);
                    validation.name = true;
                    // Auto-format name
                    nameInput.value = name.replace(/\s+/g, ' ').replace(/\b\w/g, l => l.toUpperCase());
                }
                
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
            
            function checkPasswordStrength(password) {
                let strength = 0;
                let feedback = [];
                
                // Length check
                if (password.length >= 8) strength += 1;
                else feedback.push('at least 8 characters');
                
                // Uppercase check
                if (/[A-Z]/.test(password)) strength += 1;
                else feedback.push('uppercase letter');
                
                // Lowercase check
                if (/[a-z]/.test(password)) strength += 1;
                else feedback.push('lowercase letter');
                
                // Number check
                if (/\d/.test(password)) strength += 1;
                else feedback.push('number');
                
                // Special character check
                if (/[!@#$%^&*(),.?":{}|<>]/.test(password)) strength += 1;
                else feedback.push('special character');
                
                return { strength, feedback };
            }
            
            function updatePasswordStrength(password) {
                if (!password) {
                    passwordStrength.classList.add('hidden');
                    return;
                }
                
                passwordStrength.classList.remove('hidden');
                const { strength, feedback } = checkPasswordStrength(password);
                
                const strengthLevels = [
                    { text: 'Very Weak', color: 'bg-red-500', width: '20%' },
                    { text: 'Weak', color: 'bg-red-400', width: '40%' },
                    { text: 'Fair', color: 'bg-yellow-500', width: '60%' },
                    { text: 'Good', color: 'bg-blue-500', width: '80%' },
                    { text: 'Strong', color: 'bg-green-500', width: '100%' }
                ];
                
                const level = strengthLevels[strength] || strengthLevels[0];
                strengthText.textContent = level.text;
                strengthText.className = `text-xs font-bold ${level.color.replace('bg-', 'text-')}`;
                strengthBar.className = `h-2 rounded-full transition-all duration-300 ${level.color}`;
                strengthBar.style.width = level.width;
            }
            
            function validatePassword() {
                const password = passwordInput.value;
                const passwordError = document.getElementById('password-error');
                
                updatePasswordStrength(password);
                
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
                    showError(passwordInput, passwordError, 'Password must contain at least one uppercase letter, one lowercase letter, and one number.');
                    validation.password = false;
                } else {
                    hideError(passwordInput, passwordError);
                    validation.password = true;
                }
                
                // Re-validate confirm password when password changes
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
                const firstError = document.querySelector('.border-red-500, .flex.items-center.space-x-2:not(.hidden)');
                if (firstError) {
                    firstError.scrollIntoView({ behavior: 'smooth', block: 'center' });
                    if (firstError.tagName === 'INPUT' || firstError.tagName === 'SELECT' || firstError.tagName === 'TEXTAREA') {
                        setTimeout(() => firstError.focus(), 500);
                    }
                }
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
        
        /* Password strength bar animation */
        #strength-bar {
            transition: width 0.3s ease, background-color 0.3s ease;
        }
    </style>
</x-app-layout>
