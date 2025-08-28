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
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
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
                        <label>Gender:</label>
                        <select name="gender">
                            <option value="">-- Select Gender --</option>
                            <option value="male" {{ old('gender', $users->gender) == 'male' ? 'selected' : '' }}>Male
                            </option>
                            <option value="female" {{ old('gender', $users->gender) == 'female' ? 'selected' : '' }}>
                                Female</option>
                            <option value="other" {{ old('gender', $users->gender) == 'other' ? 'selected' : '' }}>
                                Other</option>
                        </select><br><br>
                        <label>Date of Birth:</label>
                        <input type="date" name="date_of_birth"
                            value="{{ old('date_of_birth', $users->date_of_birth) }}"><br><br>
                        <label>Contact Number:</label>
                        <input type="number" name="contact_number"
                            value="{{ old('contact_number', $users->contact_number) }}"><br><br>
                        <label>Address:</label>
                        <input type="text" name="address" value="{{ old('address', $users->address) }}"><br><br>
                        <label>City:</label>
                        <input type="text" name="city" value="{{ old('city', $users->city) }}"><br><br>
                        <label>State:</label>
                        <input type="text" name="state" value="{{ old('state', $users->state) }}"><br><br>
                        <label>Country:</label>
                        <input type="text" name="country" value="{{ old('country', $users->country) }}"><br><br>
                        <label>Pin Code:</label>
                        <input type="number" name="pin_code"
                            value="{{ old('pin_code', $users->pin_code) }}"><br><br>
                        <label>Joining Date:</label>
                        <input type="date" name="joining_date"
                            value="{{ old('joining_date', $users->joining_date) }}"><br><br>
                        <label>Employment Type:</label>
                        <select name="employment_type" id="employment_type" class="form-control" required>
                            <option value="">-- Select Employment Type --</option>
                            <option value="Full-Time" {{ $users->employment_type == 'full_time' ? 'selected' : '' }}>
                                Full-Time</option>
                            <option value="Part-Time" {{ $users->employment_type == 'part_time' ? 'selected' : '' }}>
                                Part-Time</option>
                            <option value="intern" {{ $users->employment_type == 'intern' ? 'selected' : '' }}>
                                Intern</option>
                            <option value="trainee" {{ $users->employment_type == 'trainee' ? 'selected' : '' }}>
                                Trainee</option>
                            <option value="contract" {{ $users->employment_type == 'contract' ? 'selected' : '' }}>
                                Contract</option>
                        </select><br><br>
                        <label>Status:</label>
                        <select name="status" id="status" class="form-control" required>
                            <option value="">-- Select Status --</option>
                            <option value="active" {{ $users->status == 'active' ? 'selected' : '' }}>Active
                            </option>
                            <option value="inactive" {{ $users->status == 'inactive' ? 'selected' : '' }}>Inactive
                            </option>
                            <option value="terminated" {{ $users->status == 'terminated' ? 'selected' : '' }}>
                                Terminated</option>
                        </select><br><br>
                        <div>
                            <label for="resume">Resume</label><br>
                            @if ($users->resume)
                                <a href="{{ asset('storage/' . $users->resume) }}" target="_blank">View Resume</a><br>
                            @endif
                            <input type="file" name="resume" id="resume">
                        </div>
                        <!-- Aadhar Card -->
                        <div>
                            <label for="aadhar_card">Aadhar Card</label><br>
                            @if ($users->aadhar_card)
                                <a href="{{ asset('storage/' . $users->aadhar_card) }}" target="_blank">View
                                    Aadhar</a><br>
                            @endif
                            <input type="file" name="aadhar_card" id="aadhar_card">
                        </div>

                        <!-- PAN Card -->
                        <div>
                            <label for="pan_card">PAN Card</label><br>
                            @if ($users->pan_card)
                                <a href="{{ asset('storage/' . $users->pan_card) }}" target="_blank">View PAN</a><br>
                            @endif
                            <input type="file" name="pan_card" id="pan_card">
                        </div><br><br>
                        <label>Leave Balance:</label>
                        <input type="number" name="leave_balance"
                            value="{{ old('leave_balance', $users->leave_balance) }}"><br><br>
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
                                onmouseout="this.style.backgroundColor='var(--hover-bg)'" disabled>
                                <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 mr-2" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path>
                                </svg>
                                <span id="button-text">No Changes Made</span>
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
            const form = document.getElementById('userEditForm');
            const nameInput = document.getElementById('name');
            const emailInput = document.getElementById('email');
            const roleCheckboxes = document.querySelectorAll('.role-checkbox');
            const submitBtn = document.getElementById('updateUserBtn');
            const buttonText = document.getElementById('button-text');

            let isSubmitting = false;

            // Store original values for change detection
            const originalValues = {
                name: nameInput.value.trim(),
                email: emailInput.value.trim(),
                roles: Array.from(roleCheckboxes).filter(cb => cb.checked).map(cb => cb.value).sort()
            };

            // Validation state
            const validation = {
                name: true, // Start as valid since we have existing data
                email: true,
                roles: true,
                hasChanges: false
            };

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
                    showError(nameInput, nameError,
                        'Name can only contain letters, spaces, hyphens, and apostrophes.');
                    validation.name = false;
                } else {
                    hideError(nameInput, nameError);
                    validation.name = true;
                    // Auto-format name
                    nameInput.value = name.replace(/\s+/g, ' ').replace(/\b\w/g, l => l.toUpperCase());
                }

                checkForChanges();
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

                checkForChanges();
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

                checkForChanges();
                updateSubmitButton();
            }

            function checkForChanges() {
                const currentValues = {
                    name: nameInput.value.trim(),
                    email: emailInput.value.trim(),
                    roles: Array.from(roleCheckboxes).filter(cb => cb.checked).map(cb => cb.value).sort()
                };

                const hasNameChange = currentValues.name !== originalValues.name;
                const hasEmailChange = currentValues.email !== originalValues.email;
                const hasRoleChanges = JSON.stringify(currentValues.roles) !== JSON.stringify(originalValues.roles);

                validation.hasChanges = hasNameChange || hasEmailChange || hasRoleChanges;
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
                const allValid = validation.name && validation.email && validation.roles;

                if (!allValid) {
                    submitBtn.disabled = true;
                    submitBtn.classList.add('opacity-50', 'cursor-not-allowed');
                    buttonText.textContent = 'Please Fix Errors';
                } else if (!validation.hasChanges) {
                    submitBtn.disabled = true;
                    submitBtn.classList.add('opacity-50', 'cursor-not-allowed');
                    buttonText.textContent = 'No Changes Made';
                } else if (isSubmitting) {
                    submitBtn.disabled = true;
                    submitBtn.classList.add('opacity-75');
                    // Keep loading text
                } else {
                    submitBtn.disabled = false;
                    submitBtn.classList.remove('opacity-50', 'cursor-not-allowed', 'opacity-75');
                    buttonText.textContent = 'Update User';
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

            // Event listeners
            nameInput.addEventListener('input', validateName);
            nameInput.addEventListener('blur', validateName);

            emailInput.addEventListener('input', validateEmail);
            emailInput.addEventListener('blur', validateEmail);

            roleCheckboxes.forEach(checkbox => {
                checkbox.addEventListener('change', function() {
                    // Update visual style for role boxes
                    const parentDiv = this.closest('.bg-white');
                    if (this.checked) {
                        parentDiv.classList.add('ring-2', 'ring-blue-200', 'bg-blue-50');
                    } else {
                        parentDiv.classList.remove('ring-2', 'ring-blue-200', 'bg-blue-50');
                    }
                    validateRoles();
                });
            });

            // Form submission
            form.addEventListener('submit', function(e) {
                e.preventDefault();

                if (isSubmitting) return;

                // Validate all fields
                validateName();
                validateEmail();
                validateRoles();

                const allValid = validation.name && validation.email && validation.roles;

                if (!allValid) {
                    scrollToFirstError();
                    return;
                }

                if (!validation.hasChanges) {
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
                    Updating User...
                `;

                // Submit the form
                setTimeout(() => {
                    form.submit();
                }, 500);
            });

            // Initial validation and change detection
            validateName();
            validateEmail();
            validateRoles();
            checkForChanges();
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
    </style>
</x-app-layout>
