<x-app-layout>
    <x-slot name="header">
        <div class="theme-app" style="background: linear-gradient(to right, var(--secondary-bg), var(--primary-bg)); padding: 3rem 2rem; border-radius: 0;">
            <div class="max-w-7xl mx-auto">
                <div class="flex items-center space-x-4">
                    <div class="p-3 rounded-2xl shadow-lg" style="background-color: var(--hover-bg);">
                        <svg class="w-8 h-8" style="color: var(--primary-text);" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-4xl font-bold leading-tight" style="color: var(--primary-text);">
                            Edit Employee
                        </h1>
                        <p class="text-lg mt-1" style="color: var(--secondary-text);">
                            Update employee information and details
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>

    <div class="py-8" style="background-color: #f1f5f9; min-height: 100vh;">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <!-- Employee Profile Card -->
            <div class="theme-app rounded-3xl shadow-lg mb-8 p-8" style="background: linear-gradient(135deg, var(--secondary-bg), var(--primary-bg));">
                <div class="flex items-center space-x-6">
                    <div class="relative">
                        <div class="w-16 h-16 rounded-full flex items-center justify-center shadow-lg" style="background-color: var(--hover-bg);">
                            <span class="text-xl font-bold" style="color: var(--primary-text);">
                                {{ substr($employee->name ?? 'E', 0, 1) }}
                            </span>
                        </div>
                    </div>
                    <div class="flex-1">
                        <h2 class="text-2xl font-bold mb-1" style="color: var(--primary-text);">{{ $employee->name ?? 'Employee Name' }}</h2>
                        <p class="text-lg mb-3" style="color: var(--secondary-text);">{{ $employee->email ?? 'employee@company.com' }}</p>
                        <div class="flex items-center space-x-3">
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-500 text-white">
                                {{ ucfirst($employee->status ?? 'Active') }}
                            </span>
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium" style="background-color: var(--hover-bg); color: var(--primary-text);">
                                {{ ucfirst(str_replace('_', ' ', $employee->employment_type ?? 'Full Time')) }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <form action="{{ route('employees.update', $employee->id) }}" method="POST" enctype="multipart/form-data" class="space-y-8">
                @csrf
                @method('PUT')

                <!-- Basic Personal Details Section -->
                <div class="bg-white rounded-3xl shadow-lg overflow-hidden">
                    <div class="theme-app px-6 py-4 flex items-center space-x-3" style="background: linear-gradient(to right, var(--secondary-bg), var(--primary-bg));">
                        <div class="w-8 h-8 rounded-full flex items-center justify-center text-white font-bold text-sm" style="background-color: var(--hover-bg);">
                            1
                        </div>
                        <h3 class="text-lg font-bold" style="color: var(--primary-text);">Basic personal details and contact information</h3>
                    </div>
                    
                    <div class="p-8">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="space-y-2">
                                <label class="block text-sm font-semibold text-gray-700 uppercase tracking-wide">Full Name</label>
                                <input type="text" name="name" value="{{ $employee->name }}"
                                    class="w-full px-4 py-3 bg-white border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200">
                            </div>

                            <div class="space-y-2">
                                <label class="block text-sm font-semibold text-gray-700 uppercase tracking-wide">Email Address</label>
                                <input type="email" name="email" value="{{ $employee->email }}"
                                    class="w-full px-4 py-3 bg-white border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200">
                            </div>

                            <div class="space-y-2">
                                <label class="block text-sm font-semibold text-gray-700 uppercase tracking-wide">Gender</label>
                                <select name="gender" class="w-full px-4 py-3 bg-white border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200">
                                    <option value="">Select Gender</option>
                                    <option value="male" {{ $employee->gender === 'male' ? 'selected' : '' }}>Male</option>
                                    <option value="female" {{ $employee->gender === 'female' ? 'selected' : '' }}>Female</option>
                                    <option value="other" {{ $employee->gender === 'other' ? 'selected' : '' }}>Other</option>
                                </select>
                            </div>

                            <div class="space-y-2">
                                <label class="block text-sm font-semibold text-gray-700 uppercase tracking-wide">Date of Birth</label>
                                <input type="date" name="date_of_birth" value="{{ $employee->date_of_birth }}"
                                    class="w-full px-4 py-3 bg-white border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200">
                            </div>

                            <div class="space-y-2 md:col-span-2">
                                <label class="block text-sm font-semibold text-gray-700 uppercase tracking-wide">Phone Number</label>
                                <input type="text" name="phone" value="{{ $employee->phone }}"
                                    class="w-full px-4 py-3 bg-white border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200">
                            </div>

                            <div class="space-y-2 md:col-span-2">
                                <label class="block text-sm font-semibold text-gray-700 uppercase tracking-wide">Address</label>
                                <textarea name="address" rows="4" 
                                    class="w-full px-4 py-3 bg-white border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 resize-none">{{ $employee->address }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Address and Geographical Details Section -->
                <div class="bg-white rounded-3xl shadow-lg overflow-hidden">
                    <div class="theme-app px-6 py-4 flex items-center space-x-3" style="background: linear-gradient(to right, var(--secondary-bg), var(--primary-bg));">
                        <div class="w-8 h-8 rounded-full flex items-center justify-center text-white font-bold text-sm" style="background-color: var(--hover-bg);">
                            2
                        </div>
                        <h3 class="text-lg font-bold" style="color: var(--primary-text);">Address and geographical details</h3>
                    </div>
                    
                    <div class="p-8">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="space-y-2">
                                <label class="block text-sm font-semibold text-gray-700 uppercase tracking-wide">City</label>
                                <input type="text" name="city" value="{{ $employee->city }}"
                                    class="w-full px-4 py-3 bg-white border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200">
                            </div>

                            <div class="space-y-2">
                                <label class="block text-sm font-semibold text-gray-700 uppercase tracking-wide">State</label>
                                <input type="text" name="state" value="{{ $employee->state }}"
                                    class="w-full px-4 py-3 bg-white border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200">
                            </div>

                            <div class="space-y-2">
                                <label class="block text-sm font-semibold text-gray-700 uppercase tracking-wide">Postal Code</label>
                                <input type="text" name="postal_code" value="{{ $employee->postal_code }}"
                                    class="w-full px-4 py-3 bg-white border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200">
                            </div>

                            <div class="space-y-2">
                                <label class="block text-sm font-semibold text-gray-700 uppercase tracking-wide">Country</label>
                                <input type="text" name="country" value="{{ $employee->country }}"
                                    class="w-full px-4 py-3 bg-white border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Job Details and Employment Status Section -->
                <div class="bg-white rounded-3xl shadow-lg overflow-hidden">
                    <div class="theme-app px-6 py-4 flex items-center space-x-3" style="background: linear-gradient(to right, var(--secondary-bg), var(--primary-bg));">
                        <div class="w-8 h-8 rounded-full flex items-center justify-center text-white font-bold text-sm" style="background-color: var(--hover-bg);">
                            3
                        </div>
                        <h3 class="text-lg font-bold" style="color: var(--primary-text);">Job details and employment status</h3>
                    </div>
                    
                    <div class="p-8">
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            <div class="space-y-2">
                                <label class="block text-sm font-semibold text-gray-700 uppercase tracking-wide">Joining Date</label>
                                <input type="date" name="joining_date" value="{{ $employee->joining_date }}"
                                    class="w-full px-4 py-3 bg-white border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200">
                            </div>

                            <div class="space-y-2">
                                <label class="block text-sm font-semibold text-gray-700 uppercase tracking-wide">Employment Type</label>
                                <select name="employment_type" class="w-full px-4 py-3 bg-white border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200">
                                    <option value="full_time" {{ $employee->employment_type === 'full_time' ? 'selected' : '' }}>Full Time</option>
                                    <option value="part_time" {{ $employee->employment_type === 'part_time' ? 'selected' : '' }}>Part Time</option>
                                    <option value="intern" {{ $employee->employment_type === 'intern' ? 'selected' : '' }}>Intern</option>
                                </select>
                            </div>

                            <div class="space-y-2">
                                <label class="block text-sm font-semibold text-gray-700 uppercase tracking-wide">Status</label>
                                <select name="status" class="w-full px-4 py-3 bg-white border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200">
                                    <option value="active" {{ $employee->status === 'active' ? 'selected' : '' }}>Active</option>
                                    <option value="inactive" {{ $employee->status === 'inactive' ? 'selected' : '' }}>Inactive</option>
                                    <option value="terminated" {{ $employee->status === 'terminated' ? 'selected' : '' }}>Terminated</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex items-center justify-end space-x-4 pt-4">
                    <a href="{{ route('employees.index') }}" 
                       class="inline-flex items-center px-6 py-3 bg-gray-600 text-white text-sm font-semibold rounded-xl hover:bg-gray-700 transition-all duration-200 shadow-lg">
                        Cancel
                    </a>
                    
                    <button type="submit" 
                            class="theme-app inline-flex items-center px-8 py-3 text-sm font-semibold rounded-xl transition-all duration-200 shadow-lg"
                            style="background-color: var(--hover-bg); color: var(--primary-text);"
                            onmouseover="this.style.backgroundColor='var(--primary-bg-light)'"
                            onmouseout="this.style.backgroundColor='var(--hover-bg)'">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        Update Employee
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
