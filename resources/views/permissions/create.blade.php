<x-app-layout>
    <x-slot name="header">
        <div class="theme-app flex flex-col sm:flex-row justify-between items-center p-4 sm:p-6 rounded-lg shadow-sm" style="background: linear-gradient(to right, var(--secondary-bg), var(--primary-bg));">
            {{-- Added lg:mr-24 to create space for the dropdown on larger screens --}}
            <div class="flex flex-col sm:flex-row items-center justify-between gap-4 sm:gap-0 w-full lg:mr-24">
                <div class="flex items-center space-x-2 sm:space-x-3 mb-4 sm:mb-0">
                    <div class="p-2 rounded-lg shadow-md" style="background-color: var(--hover-bg);">
                        <svg class="w-5 h-5 sm:w-6 sm:h-6" style="color: var(--primary-text);" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                    </div>
                    {{-- Adjusted heading size for responsiveness --}}
                    <h2 class="font-bold text-xl sm:text-xl lg:text-2xl leading-tight" style="color: var(--primary-text);">
                        Create New Permission
                    </h2>
                </div>
                <div class="w-full sm:w-auto">
                    <a href="{{ route('permissions.index') }}" 
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
    </x-slot>

    <div class="py-6 sm:py-8">
        <!-- Increased max-width from max-w-4xl to max-w-6xl and reduced padding to minimal -->
        <div class="max-w-6xl mx-auto px-1 sm:px-1 lg:px-2">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-xl border border-gray-200">
                <!-- Reduced header section padding further -->
                <div class="bg-gradient-to-r from-gray-50 to-blue-50 px-1 py-3 sm:px-2 sm:py-4 border-b border-gray-200">
                    <div class="flex items-center space-x-2 sm:space-x-3">
                        <div class="theme-app p-2 rounded-lg shadow-sm" style="background-color: var(--hover-bg);">
                            <svg class="w-4 h-4 sm:w-5 sm:h-5" style="color: var(--primary-text);" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.031 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-base sm:text-lg font-semibold text-gray-900">Permission Details</h3>
                            <p class="text-xs sm:text-sm text-gray-600">Fill in the information below to create a new permission</p>
                        </div>
                    </div>
                </div>
                
                <!-- Reduced form content padding to minimal -->
                <div class="p-1 sm:p-2">
                    <form id="createPermissionForm" action="{{ route('permissions.store') }}" method="POST" class="space-y-4 sm:space-y-6" novalidate>
                        @csrf
                        
                        <div class="space-y-2">
                            <label for="name" class="block text-sm font-semibold text-gray-700 mb-1 sm:mb-2">
                                <div class="flex items-center space-x-1.5 sm:space-x-2">
                                    <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                                    </svg>
                                    <span>Permission Name</span>
                                    <span class="text-red-500">*</span>
                                </div>
                            </label>
                            <input type="text" 
                                   name="name" 
                                   id="name"
                                   placeholder="Enter permission name (e.g., create users, edit posts)"
                                   class="w-full px-3 py-2.5 sm:px-4 sm:py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-4 focus:ring-blue-200 focus:border-blue-500 transition-all duration-300 ease-in-out hover:border-gray-400 bg-gray-50 focus:bg-white text-sm"
                                   required>
                            
                            <!-- Client-side validation error display -->
                            <div id="nameError" class="hidden flex items-center space-x-2 mt-2 p-2 sm:p-3 bg-red-50 border border-red-200 rounded-lg">
                                <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16c-.77.833.192 2.5 1.732 2.5z"></path>
                                </svg>
                                <span id="nameErrorText" class="text-xs sm:text-sm text-red-600 font-medium"></span>
                            </div>

                            <!-- Server-side validation error display -->
                            @error('name')
                                <div class="flex items-center space-x-2 mt-2 p-2 sm:p-3 bg-red-50 border border-red-200 rounded-lg">
                                    <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <span class="text-xs sm:text-sm text-red-600 font-medium">{{ $message }}</span>
                                </div>
                            @enderror
                        </div>

                        <div class="bg-blue-50 rounded-lg p-3 sm:p-4 border border-blue-200">
                            <div class="flex items-start space-x-2 sm:space-x-3">
                                <svg class="w-4 h-4 sm:w-5 sm:h-5 text-blue-600 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <div>
                                    <h4 class="text-sm font-semibold text-gray-900">Naming Guidelines</h4>
                                    <ul class="text-xs sm:text-sm text-gray-600 mt-1 space-y-1">
                                        <li>• Use descriptive names (e.g., "create users", "edit articles")</li>
                                        <li>• Use lowercase with spaces or underscores</li>
                                        <li>• Be specific about the action and resource</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        
                        <div class="flex flex-col sm:flex-row items-center justify-center sm:justify-end space-y-3 sm:space-y-0 sm:space-x-4 pt-4 sm:pt-6 border-t border-gray-200">
                            <a href="{{ route('permissions.index') }}"
                               class="inline-flex items-center justify-center w-full sm:w-auto px-4 py-2.5 sm:px-6 sm:py-3 border border-gray-300 text-gray-700 bg-white font-semibold rounded-lg shadow-sm hover:bg-gray-50 hover:scale-105 transform transition-all duration-300 ease-in-out focus:outline-none focus:ring-4 focus:ring-gray-300 text-sm">
                                <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                                Cancel
                            </a>
                            <button type="submit" id="submitBtn"
                                    class="theme-app inline-flex items-center justify-center w-full sm:w-auto px-6 py-2.5 sm:px-8 sm:py-3 font-semibold rounded-lg shadow-lg hover:scale-105 transform transition-all duration-300 ease-in-out focus:outline-none focus:ring-4 text-sm disabled:opacity-50 disabled:cursor-not-allowed"
                                    style="background-color: var(--hover-bg); color: var(--primary-text);"
                                    onmouseover="this.style.backgroundColor='var(--primary-bg-light)'"
                                    onmouseout="this.style.backgroundColor='var(--hover-bg)'"
                                    disabled>
                                <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                                <span id="submitBtnText">Create Permission</span>
                                <div id="submitSpinner" class="hidden ml-2">
                                    <svg class="animate-spin h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                    </svg>
                                </div>
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
            const form = document.getElementById('createPermissionForm');
            const nameInput = document.getElementById('name');
            const nameError = document.getElementById('nameError');
            const nameErrorText = document.getElementById('nameErrorText');
            const submitBtn = document.getElementById('submitBtn');
            const submitBtnText = document.getElementById('submitBtnText');
            const submitSpinner = document.getElementById('submitSpinner');

            // Validation rules
            const validationRules = {
                name: {
                    required: true,
                    minLength: 3,
                    maxLength: 100,
                    pattern: /^[a-zA-Z0-9\s_-]+$/,
                    customValidation: function(value) {
                        // Check for reserved words
                        const reservedWords = ['admin', 'root', 'system', 'null', 'undefined', 'super', 'master'];
                        const lowerValue = value.toLowerCase().trim();
                        
                        if (reservedWords.some(word => lowerValue.includes(word))) {
                            return 'Permission name cannot contain reserved words like "admin", "root", "system", etc.';
                        }
                        
                        // Check for consecutive spaces or special characters
                        if (/\s{2,}/.test(value)) {
                            return 'Permission name cannot contain consecutive spaces.';
                        }
                        
                        // Check if starts or ends with space/underscore/hyphen
                        if (/^[\s_-]|[\s_-]$/.test(value)) {
                            return 'Permission name cannot start or end with spaces, underscores, or hyphens.';
                        }
                        
                        return null;
                    }
                }
            };

            // Validation function
            function validateField(fieldName, value) {
                const rules = validationRules[fieldName];
                if (!rules) return { isValid: true, message: '' };

                // Required validation
                if (rules.required && (!value || value.trim() === '')) {
                    return { isValid: false, message: 'Permission name is required.' };
                }

                // Skip other validations if field is empty and not required
                if (!value || value.trim() === '') {
                    return { isValid: true, message: '' };
                }

                const trimmedValue = value.trim();

                // Length validation
                if (rules.minLength && trimmedValue.length < rules.minLength) {
                    return { isValid: false, message: `Permission name must be at least ${rules.minLength} characters long.` };
                }

                if (rules.maxLength && trimmedValue.length > rules.maxLength) {
                    return { isValid: false, message: `Permission name cannot exceed ${rules.maxLength} characters.` };
                }

                // Pattern validation
                if (rules.pattern && !rules.pattern.test(trimmedValue)) {
                    return { isValid: false, message: 'Permission name can only contain letters, numbers, spaces, underscores, and hyphens.' };
                }

                // Custom validation
                if (rules.customValidation) {
                    const customError = rules.customValidation(trimmedValue);
                    if (customError) {
                        return { isValid: false, message: customError };
                    }
                }

                return { isValid: true, message: '' };
            }

            // Show error function
            function showError(errorElement, errorTextElement, message) {
                errorTextElement.textContent = message;
                errorElement.classList.remove('hidden');
                errorElement.classList.add('animate-pulse');
                setTimeout(() => {
                    errorElement.classList.remove('animate-pulse');
                }, 500);
            }

            // Hide error function
            function hideError(errorElement) {
                errorElement.classList.add('hidden');
            }

            // Update input styling
            function updateInputStyling(input, isValid) {
                if (isValid) {
                    input.classList.remove('border-red-500', 'focus:border-red-500', 'focus:ring-red-200');
                    input.classList.add('border-green-300', 'focus:border-green-500', 'focus:ring-green-200');
                } else {
                    input.classList.remove('border-gray-300', 'border-green-300', 'focus:border-blue-500', 'focus:border-green-500', 'focus:ring-blue-200', 'focus:ring-green-200');
                    input.classList.add('border-red-500', 'focus:border-red-500', 'focus:ring-red-200');
                }
            }

            // Update submit button state
            function updateSubmitButton(isValid) {
                if (isValid && nameInput.value.trim()) {
                    submitBtn.disabled = false;
                    submitBtn.classList.remove('opacity-50', 'cursor-not-allowed');
                } else {
                    submitBtn.disabled = true;
                    submitBtn.classList.add('opacity-50', 'cursor-not-allowed');
                }
            }

            // Real-time validation for name field
            nameInput.addEventListener('input', function() {
                const validation = validateField('name', this.value);
                
                if (validation.isValid && this.value.trim()) {
                    hideError(nameError);
                    updateInputStyling(nameInput, true);
                    updateSubmitButton(true);
                } else if (this.value.trim()) {
                    showError(nameError, nameErrorText, validation.message);
                    updateInputStyling(nameInput, false);
                    updateSubmitButton(false);
                } else {
                    hideError(nameError);
                    nameInput.classList.remove('border-red-500', 'border-green-300', 'focus:border-red-500', 'focus:border-green-500', 'focus:ring-red-200', 'focus:ring-green-200');
                    nameInput.classList.add('border-gray-300', 'focus:border-blue-500', 'focus:ring-blue-200');
                    updateSubmitButton(false);
                }
            });

            // Blur validation (when user leaves the field)
            nameInput.addEventListener('blur', function() {
                if (this.value.trim()) {
                    const validation = validateField('name', this.value);
                    
                    if (!validation.isValid) {
                        showError(nameError, nameErrorText, validation.message);
                        updateInputStyling(nameInput, false);
                        updateSubmitButton(false);
                    }
                }
            });

            // Form submission validation
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                
                // Validate all fields
                const nameValidation = validateField('name', nameInput.value);
                
                let isFormValid = true;

                // Show validation errors
                if (!nameValidation.isValid) {
                    showError(nameError, nameErrorText, nameValidation.message);
                    updateInputStyling(nameInput, false);
                    isFormValid = false;
                } else {
                    hideError(nameError);
                    updateInputStyling(nameInput, true);
                }

                // If form is valid, show loading state and submit
                if (isFormValid) {
                    // Show loading state
                    submitBtn.disabled = true;
                    submitBtnText.textContent = 'Creating...';
                    submitSpinner.classList.remove('hidden');
                    
                    // Add a small delay to show the loading state
                    setTimeout(() => {
                        form.submit();
                    }, 500);
                } else {
                    // Focus on first invalid field
                    nameInput.focus();
                    
                    // Shake animation for submit button
                    submitBtn.classList.add('animate-pulse');
                    setTimeout(() => {
                        submitBtn.classList.remove('animate-pulse');
                    }, 500);
                }
            });

            // Prevent double submission
            let isSubmitting = false;
            form.addEventListener('submit', function(e) {
                if (isSubmitting) {
                    e.preventDefault();
                    return false;
                }
                isSubmitting = true;
            });
        });
    </script>

    <style>
        .animate-pulse {
            animation: pulse 0.5s ease-in-out;
        }
        
        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.7; }
        }
        
        .animate-spin {
            animation: spin 1s linear infinite;
        }
        
        @keyframes spin {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }
    </style>
</x-app-layout>
