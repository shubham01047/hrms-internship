<x-app-layout>
    <x-slot name="header">
        {{-- Professional header with gradient background --}}
        <div class="theme-app flex flex-col sm:flex-row justify-between items-center p-4 sm:p-6 rounded-lg shadow-sm"
            style="background: linear-gradient(to right, var(--secondary-bg), var(--primary-bg));">
            <div class="flex flex-col sm:flex-row items-start justify-between gap-4 sm:gap-0 w-full">
                <div class="flex items-center space-x-2 sm:space-x-3">
                    <div class="p-2 rounded-lg shadow-md" style="background-color: var(--hover-bg);">
                        <svg class="w-5 h-5 sm:w-6 sm:h-6" style="color: var(--primary-text);" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                        </svg>
                    </div>
                    <h2 class="font-bold text-xl sm:text-xl lg:text-2xl leading-tight"
                        style="color: var(--primary-text);">
                        Create Salary Structure
                    </h2>
                </div>
                <div class="flex items-center">
                    <a href="{{ route('salary.index') }}"
                        class="inline-flex items-center justify-center px-4 py-2 sm:px-6 sm:py-3 text-sm sm:text-base font-semibold rounded-lg shadow-lg hover:scale-105 transform transition-all duration-300 ease-in-out focus:outline-none focus:ring-4 lg:mr-24"
                        style="background-color: var(--hover-bg); color: var(--primary-text);"
                        onmouseover="this.style.backgroundColor='var(--primary-bg-light)'"
                        onmouseout="this.style.backgroundColor='var(--hover-bg)'">
                        <svg class="w-4 h-4 sm:w-5 sm:h-5 mr-2" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7">
                            </path>
                        </svg>
                        Back to List
                    </a>
                </div>
            </div>
    </x-slot>

    <div class="py-4 sm:py-8 bg-gradient-to-br from-gray-50 to-blue-50 min-h-screen">
        <div class="w-full px-4 sm:px-6 lg:px-8 space-y-6 sm:space-y-8">
            <!-- Statistics Cards -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6">
                <div
                    class="bg-white rounded-xl shadow-sm border border-gray-200 p-4 sm:p-6 hover:shadow-md transition-shadow duration-200">
                    <div class="flex items-center">
                        <div class="p-2 sm:p-3 bg-blue-100 rounded-lg mr-3 sm:mr-4">
                            <svg class="w-5 h-5 sm:w-6 sm:h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-gray-900 font-semibold text-sm sm:text-base">Employee Setup</h3>
                            <p class="text-gray-600 text-xs sm:text-sm">Comprehensive salary structure</p>
                        </div>
                    </div>
                </div>

                <div
                    class="bg-white rounded-xl shadow-sm border border-gray-200 p-4 sm:p-6 hover:shadow-md transition-shadow duration-200">
                    <div class="flex items-center">
                        <div class="p-2 sm:p-3 bg-green-100 rounded-lg mr-3 sm:mr-4">
                            <svg class="w-5 h-5 sm:w-6 sm:h-6 text-green-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-gray-900 font-semibold text-sm sm:text-base">Auto Calculations</h3>
                            <p class="text-gray-600 text-xs sm:text-sm">Deductions computed automatically</p>
                        </div>
                    </div>
                </div>

                <div
                    class="bg-white rounded-xl shadow-sm border border-gray-200 p-4 sm:p-6 hover:shadow-md transition-shadow duration-200 sm:col-span-2 lg:col-span-1">
                    <div class="flex items-center">
                        <div class="p-2 sm:p-3 bg-purple-100 rounded-lg mr-3 sm:mr-4">
                            <svg class="w-5 h-5 sm:w-6 sm:h-6 text-purple-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-gray-900 font-semibold text-sm sm:text-base">Compliance Ready</h3>
                            <p class="text-gray-600 text-xs sm:text-sm">Tax and statutory compliant</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Form Card -->
            <div class="bg-white rounded-xl shadow-xl overflow-hidden border border-gray-200">
                <!-- Card Header -->
                <div class="theme-app px-4 sm:px-6 py-3 sm:py-4 border-b border-gray-200"
                    style="background: linear-gradient(to right, var(--secondary-bg), var(--primary-bg));">
                    <div class="flex items-center space-x-2 sm:space-x-3">
                        <div class="p-1.5 sm:p-2 rounded-lg shadow-sm" style="background-color: var(--hover-bg);">
                            <svg class="w-4 h-4" style="color: var(--primary-text);" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-base sm:text-lg font-semibold" style="color: var(--primary-text);">Salary Structure Form
                            </h3>
                            <p class="text-xs sm:text-sm" style="color: var(--secondary-text);">Define compensation and deduction details</p>
                        </div>
                    </div>
                </div>

                <!-- Form Content -->
                <div class="p-4 sm:p-6">
                    <form method="POST" action="{{ route('salary.store') }}" class="space-y-4 sm:space-y-6" id="salaryForm">
                        @csrf
                        
                        <!-- Employee Selection -->
                        <div class="space-y-2">
                            <label for="user_id" class="block text-sm font-semibold text-gray-700 mb-2">
                                <div class="flex items-center space-x-2">
                                    <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                    <span>Select Employee</span>
                                    <span class="text-red-500">*</span>
                                </div>
                            </label>
                            <select name="user_id" id="user_id" required
                                class="w-full px-3 sm:px-4 py-2 sm:py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-4 focus:ring-blue-200 focus:border-blue-500 transition-all duration-300 ease-in-out hover:border-gray-400 bg-gray-50 focus:bg-white text-sm sm:text-base">
                                <option value="">Choose an employee...</option>
                                @foreach ($users as $u)
                                    <option value="{{ $u->id }}">{{ $u->name }}</option>
                                @endforeach
                            </select>
                            <!-- Added client-side validation error display -->
                            <div id="user_id_error" class="hidden flex items-center space-x-2 mt-2 p-2 sm:p-3 bg-red-50 border border-red-200 rounded-lg">
                                <svg class="w-4 h-4 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span class="text-xs sm:text-sm text-red-600 font-medium"></span>
                            </div>
                            @error('user_id')
                                <div
                                    class="flex items-center space-x-2 mt-2 p-2 sm:p-3 bg-red-50 border border-red-200 rounded-lg">
                                    <svg class="w-4 h-4 text-red-500" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <span class="text-xs sm:text-sm text-red-600 font-medium">{{ $message }}</span>
                                </div>
                            @enderror
                        </div>

                        <!-- Salary Components -->
                        <div class="space-y-4 sm:space-y-6">
                            <h4 class="text-base sm:text-lg font-semibold text-gray-800 flex items-center space-x-2">
                                <svg class="w-4 h-4 sm:w-5 sm:h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                                </svg>
                                <span>Salary Components</span>
                            </h4>
                            
                            <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 sm:gap-6">
                                <!-- Basic Salary -->
                                <div class="space-y-2">
                                    <label for="basic" class="block text-sm font-semibold text-gray-700 mb-2">
                                        <div class="flex items-center space-x-2">
                                            <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                                            </svg>
                                            <span>Basic Salary</span>
                                            <span class="text-red-500">*</span>
                                        </div>
                                    </label>
                                    <!-- Added validation attributes and improved input -->
                                    <input type="number" name="basic" id="basic" required
                                        placeholder="Enter basic salary amount" min="1" max="99999999" step="0.01"
                                        class="w-full px-3 sm:px-4 py-2 sm:py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-4 focus:ring-blue-200 focus:border-blue-500 transition-all duration-300 ease-in-out hover:border-gray-400 bg-gray-50 focus:bg-white text-sm sm:text-base">
                                    <!-- Added client-side validation error display -->
                                    <div id="basic_error" class="hidden flex items-center space-x-2 mt-2 p-2 sm:p-3 bg-red-50 border border-red-200 rounded-lg">
                                        <svg class="w-4 h-4 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        <span class="text-xs sm:text-sm text-red-600 font-medium"></span>
                                    </div>
                                    @error('basic')
                                        <div
                                            class="flex items-center space-x-2 mt-2 p-2 sm:p-3 bg-red-50 border border-red-200 rounded-lg">
                                            <svg class="w-4 h-4 text-red-500" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                            <span class="text-xs sm:text-sm text-red-600 font-medium">{{ $message }}</span>
                                        </div>
                                    @enderror
                                </div>

                                <!-- HRA -->
                                <div class="space-y-2">
                                    <label for="hra" class="block text-sm font-semibold text-gray-700 mb-2">
                                        <div class="flex items-center space-x-2">
                                            <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                                            </svg>
                                            <span>House Rent Allowance (HRA)</span>
                                            <span class="text-red-500">*</span>
                                        </div>
                                    </label>
                                    <!-- Added validation attributes and improved input -->
                                    <input type="number" name="hra" id="hra" required
                                        placeholder="Enter HRA amount" min="0" max="99999999" step="0.01"
                                        class="w-full px-3 sm:px-4 py-2 sm:py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-4 focus:ring-blue-200 focus:border-blue-500 transition-all duration-300 ease-in-out hover:border-gray-400 bg-gray-50 focus:bg-white text-sm sm:text-base">
                                    <!-- Added client-side validation error display -->
                                    <div id="hra_error" class="hidden flex items-center space-x-2 mt-2 p-2 sm:p-3 bg-red-50 border border-red-200 rounded-lg">
                                        <svg class="w-4 h-4 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        <span class="text-xs sm:text-sm text-red-600 font-medium"></span>
                                    </div>
                                    @error('hra')
                                        <div
                                            class="flex items-center space-x-2 mt-2 p-2 sm:p-3 bg-red-50 border border-red-200 rounded-lg">
                                            <svg class="w-4 h-4 text-red-500" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                            <span class="text-xs sm:text-sm text-red-600 font-medium">{{ $message }}</span>
                                        </div>
                                    @enderror
                                </div>

                                <!-- Allowances -->
                                <div class="space-y-2 lg:col-span-2">
                                    <label for="allowances" class="block text-sm font-semibold text-gray-700 mb-2">
                                        <div class="flex items-center space-x-2">
                                            <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                            </svg>
                                            <span>Other Allowances</span>
                                            <span class="text-red-500">*</span>
                                        </div>
                                    </label>
                                    <!-- Added validation attributes and improved input -->
                                    <input type="number" name="allowances" id="allowances" required
                                        placeholder="Enter other allowances amount" min="0" max="99999999" step="0.01"
                                        class="w-full px-3 sm:px-4 py-2 sm:py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-4 focus:ring-blue-200 focus:border-blue-500 transition-all duration-300 ease-in-out hover:border-gray-400 bg-gray-50 focus:bg-white text-sm sm:text-base">
                                    <!-- Added client-side validation error display -->
                                    <div id="allowances_error" class="hidden flex items-center space-x-2 mt-2 p-2 sm:p-3 bg-red-50 border border-red-200 rounded-lg">
                                        <svg class="w-4 h-4 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        <span class="text-xs sm:text-sm text-red-600 font-medium"></span>
                                    </div>
                                    @error('allowances')
                                        <div
                                            class="flex items-center space-x-2 mt-2 p-2 sm:p-3 bg-red-50 border border-red-200 rounded-lg">
                                            <svg class="w-4 h-4 text-red-500" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                            <span class="text-xs sm:text-sm text-red-600 font-medium">{{ $message }}</span>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Deductions Section -->
                        <div class="space-y-4 sm:space-y-6">
                            <h4 class="text-base sm:text-lg font-semibold text-gray-800 flex items-center space-x-2">
                                <svg class="w-4 h-4 sm:w-5 sm:h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                                </svg>
                                <span>Deduction Percentages</span>
                            </h4>
                            
                            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6">
                                <!-- Tax -->
                                <div class="space-y-2">
                                    <label for="tax" class="block text-sm font-semibold text-gray-700 mb-2">
                                        <div class="flex items-center space-x-2">
                                            <span class="w-3 h-3 rounded-full bg-red-500"></span>
                                            <span>Tax (%)</span>
                                            <span class="text-red-500">*</span>
                                        </div>
                                    </label>
                                    <input type="number" name="tax" id="tax" required
                                        placeholder="0.00" step="0.01" min="0" max="100"
                                        class="w-full px-3 sm:px-4 py-2 sm:py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-4 focus:ring-blue-200 focus:border-blue-500 transition-all duration-300 ease-in-out hover:border-gray-400 bg-gray-50 focus:bg-white text-sm sm:text-base">
                                    <!-- Added client-side validation error display -->
                                    <div id="tax_error" class="hidden flex items-center space-x-2 mt-2 p-2 sm:p-3 bg-red-50 border border-red-200 rounded-lg">
                                        <svg class="w-4 h-4 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        <span class="text-xs sm:text-sm text-red-600 font-medium"></span>
                                    </div>
                                    @error('tax')
                                        <div
                                            class="flex items-center space-x-2 mt-2 p-2 sm:p-3 bg-red-50 border border-red-200 rounded-lg">
                                            <svg class="w-4 h-4 text-red-500" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                            <span class="text-xs sm:text-sm text-red-600 font-medium">{{ $message }}</span>
                                        </div>
                                    @enderror
                                </div>

                                <!-- PF -->
                                <div class="space-y-2">
                                    <label for="pf" class="block text-sm font-semibold text-gray-700 mb-2">
                                        <div class="flex items-center space-x-2">
                                            <span class="w-3 h-3 rounded-full bg-yellow-500"></span>
                                            <span>Provident Fund (%)</span>
                                            <span class="text-red-500">*</span>
                                        </div>
                                    </label>
                                    <input type="number" name="pf" id="pf" required
                                        placeholder="0.00" step="0.01" min="0" max="100"
                                        class="w-full px-3 sm:px-4 py-2 sm:py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-4 focus:ring-blue-200 focus:border-blue-500 transition-all duration-300 ease-in-out hover:border-gray-400 bg-gray-50 focus:bg-white text-sm sm:text-base">
                                    <!-- Added client-side validation error display -->
                                    <div id="pf_error" class="hidden flex items-center space-x-2 mt-2 p-2 sm:p-3 bg-red-50 border border-red-200 rounded-lg">
                                        <svg class="w-4 h-4 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        <span class="text-xs sm:text-sm text-red-600 font-medium"></span>
                                    </div>
                                    @error('pf')
                                        <div
                                            class="flex items-center space-x-2 mt-2 p-2 sm:p-3 bg-red-50 border border-red-200 rounded-lg">
                                            <svg class="w-4 h-4 text-red-500" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                            <span class="text-xs sm:text-sm text-red-600 font-medium">{{ $message }}</span>
                                        </div>
                                    @enderror
                                </div>

                                <!-- ESI -->
                                <div class="space-y-2 sm:col-span-2 lg:col-span-1">
                                    <label for="esi" class="block text-sm font-semibold text-gray-700 mb-2">
                                        <div class="flex items-center space-x-2">
                                            <span class="w-3 h-3 rounded-full bg-blue-500"></span>
                                            <span>ESI (%)</span>
                                            <span class="text-red-500">*</span>
                                        </div>
                                    </label>
                                    <input type="number" name="esi" id="esi" required
                                        placeholder="0.00" step="0.01" min="0" max="100"
                                        class="w-full px-3 sm:px-4 py-2 sm:py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-4 focus:ring-blue-200 focus:border-blue-500 transition-all duration-300 ease-in-out hover:border-gray-400 bg-gray-50 focus:bg-white text-sm sm:text-base">
                                    <!-- Added client-side validation error display -->
                                    <div id="esi_error" class="hidden flex items-center space-x-2 mt-2 p-2 sm:p-3 bg-red-50 border border-red-200 rounded-lg">
                                        <svg class="w-4 h-4 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        <span class="text-xs sm:text-sm text-red-600 font-medium"></span>
                                    </div>
                                    @error('esi')
                                        <div
                                            class="flex items-center space-x-2 mt-2 p-2 sm:p-3 bg-red-50 border border-red-200 rounded-lg">
                                            <svg class="w-4 h-4 text-red-500" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                            <span class="text-xs sm:text-sm text-red-600 font-medium">{{ $message }}</span>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Guidelines -->
                        <div class="bg-blue-50 border border-blue-200 rounded-lg p-3 sm:p-4">
                            <div class="flex">
                                <div class="flex-shrink-0">
                                    <svg class="h-4 w-4 sm:h-5 sm:w-5 text-blue-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <div class="ml-2 sm:ml-3">
                                    <h3 class="text-xs sm:text-sm font-medium text-blue-800">Salary Structure Guidelines</h3>
                                    <div class="mt-1 sm:mt-2 text-xs sm:text-sm text-blue-700">
                                        <ul class="list-disc list-inside space-y-1">
                                            <li>Basic salary should be at least 40% of total CTC</li>
                                            <li>HRA is typically 40-50% of basic salary</li>
                                            <li>Deduction percentages are applied to gross salary</li>
                                            <li>Ensure compliance with statutory requirements</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Submit Buttons -->
                        <div class="flex flex-col sm:flex-row items-center justify-end space-y-3 sm:space-y-0 sm:space-x-4 pt-4 sm:pt-6 border-t border-gray-200">
                            <a href="{{ route('salary.index') }}"
                                class="w-full sm:w-auto inline-flex items-center justify-center px-4 sm:px-6 py-2 sm:py-3 border border-gray-300 text-gray-700 bg-white font-semibold rounded-lg shadow-sm hover:bg-gray-50 hover:scale-105 transform transition-all duration-300 ease-in-out focus:outline-none focus:ring-4 focus:ring-gray-300 text-sm sm:text-base">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                                Cancel
                            </a>
                            <button type="submit" id="submitBtn"
                                class="w-full sm:w-auto theme-app inline-flex items-center justify-center px-6 sm:px-8 py-2 sm:py-3 font-semibold rounded-lg shadow-lg hover:scale-105 transform transition-all duration-300 ease-in-out focus:outline-none focus:ring-4 text-sm sm:text-base"
                                style="background-color: var(--hover-bg); color: var(--primary-text);"
                                onmouseover="this.style.backgroundColor='var(--primary-bg-light)'"
                                onmouseout="this.style.backgroundColor='var(--hover-bg)'">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                                Create Salary Structure
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Added comprehensive client-side validation script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('salaryForm');
            const submitBtn = document.getElementById('submitBtn');
            
            // Validation functions
            function showError(fieldId, message) {
                const errorDiv = document.getElementById(fieldId + '_error');
                const field = document.getElementById(fieldId);
                
                if (errorDiv && field) {
                    errorDiv.querySelector('span').textContent = message;
                    errorDiv.classList.remove('hidden');
                    field.classList.add('border-red-500');
                    field.classList.remove('border-gray-300');
                }
            }
            
            function hideError(fieldId) {
                const errorDiv = document.getElementById(fieldId + '_error');
                const field = document.getElementById(fieldId);
                
                if (errorDiv && field) {
                    errorDiv.classList.add('hidden');
                    field.classList.remove('border-red-500');
                    field.classList.add('border-gray-300');
                }
            }
            
            function validateEmployee() {
                const userSelect = document.getElementById('user_id');
                if (!userSelect.value) {
                    showError('user_id', 'Please select an employee');
                    return false;
                }
                hideError('user_id');
                return true;
            }
            
            function validateSalaryAmount(fieldId, fieldName, min = 1) {
                const field = document.getElementById(fieldId);
                const value = parseFloat(field.value);
                
                if (!field.value) {
                    showError(fieldId, `${fieldName} is required`);
                    return false;
                }
                
                if (isNaN(value) || value < min) {
                    showError(fieldId, `${fieldName} must be at least ${min}`);
                    return false;
                }
                
                if (value > 99999999) {
                    showError(fieldId, `${fieldName} cannot exceed 99,999,999`);
                    return false;
                }
                
                hideError(fieldId);
                return true;
            }
            
            function validatePercentage(fieldId, fieldName) {
                const field = document.getElementById(fieldId);
                const value = parseFloat(field.value);
                
                if (!field.value) {
                    showError(fieldId, `${fieldName} is required`);
                    return false;
                }
                
                if (isNaN(value) || value < 0) {
                    showError(fieldId, `${fieldName} must be 0 or greater`);
                    return false;
                }
                
                if (value > 100) {
                    showError(fieldId, `${fieldName} cannot exceed 100%`);
                    return false;
                }
                
                hideError(fieldId);
                return true;
            }
            
            // Real-time validation
            document.getElementById('user_id').addEventListener('change', validateEmployee);
            
            document.getElementById('basic').addEventListener('input', function() {
                validateSalaryAmount('basic', 'Basic salary', 1);
            });
            
            document.getElementById('hra').addEventListener('input', function() {
                validateSalaryAmount('hra', 'HRA', 0);
            });
            
            document.getElementById('allowances').addEventListener('input', function() {
                validateSalaryAmount('allowances', 'Allowances', 0);
            });
            
            document.getElementById('tax').addEventListener('input', function() {
                validatePercentage('tax', 'Tax percentage');
            });
            
            document.getElementById('pf').addEventListener('input', function() {
                validatePercentage('pf', 'PF percentage');
            });
            
            document.getElementById('esi').addEventListener('input', function() {
                validatePercentage('esi', 'ESI percentage');
            });
            
            // Form submission validation
            form.addEventListener('submit', function(e) {
                let isValid = true;
                
                // Validate all fields
                if (!validateEmployee()) isValid = false;
                if (!validateSalaryAmount('basic', 'Basic salary', 1)) isValid = false;
                if (!validateSalaryAmount('hra', 'HRA', 0)) isValid = false;
                if (!validateSalaryAmount('allowances', 'Allowances', 0)) isValid = false;
                if (!validatePercentage('tax', 'Tax percentage')) isValid = false;
                if (!validatePercentage('pf', 'PF percentage')) isValid = false;
                if (!validatePercentage('esi', 'ESI percentage')) isValid = false;
                
                if (!isValid) {
                    e.preventDefault();
                    
                    // Scroll to first error
                    const firstError = document.querySelector('.border-red-500');
                    if (firstError) {
                        firstError.scrollIntoView({ 
                            behavior: 'smooth', 
                            block: 'center' 
                        });
                        firstError.focus();
                    }
                }
            });
        });
    </script>
</x-app-layout>
