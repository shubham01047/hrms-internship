<x-app-layout>
    <x-slot name="header">
        <div class="theme-app flex flex-col sm:flex-row justify-between items-center gap-4 sm:gap-0 w-full p-4 sm:p-6 rounded-lg shadow-sm" style="background: linear-gradient(to right, var(--secondary-bg), var(--primary-bg));">
            <div class="flex flex-col sm:flex-row items-center justify-between gap-4 sm:gap-0 w-full lg:mr-24">
                <div class="flex items-center space-x-2 sm:space-x-3 mb-4 sm:mb-0">
                    <div class="p-2 rounded-lg shadow-md" style="background-color: var(--hover-bg);">
                        <svg class="w-5 h-5 sm:w-6 sm:h-6" style="color: var(--primary-text);" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                    </div>
                    <h2 class="font-bold text-xl sm:text-xl lg:text-2xl leading-tight" style="color: var(--primary-text);">
                        Create New Role
                    </h2>
                </div>
                <div class="w-full sm:w-auto">
                    <a href="{{ route('roles.index') }}" 
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
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-xl border border-gray-200">
                <div class="theme-app px-4 py-3 sm:px-6 sm:py-4 border-b border-gray-200" style="background: linear-gradient(to right, var(--secondary-bg), var(--primary-bg));">
                    <div class="flex items-center space-x-2 sm:space-x-3">
                        <div class="p-2 rounded-lg shadow-sm" style="background-color: var(--hover-bg);">
                            <svg class="w-4 h-4 sm:w-5 sm:h-5" style="color: var(--primary-text);" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-base sm:text-lg font-semibold" style="color: var(--primary-text);">Role Configuration</h3>
                            <p class="text-xs sm:text-sm" style="color: var(--secondary-text);">Define the role name and assign permissions</p>
                        </div>
                    </div>
                </div>
                
                <div class="p-4 sm:p-8">
                    <form id="createRoleForm" action="{{ route('roles.store') }}" method="POST" class="space-y-4 sm:space-y-6">
                        @csrf
                        
                        <!-- Role Name Section -->
                        <div class="bg-gray-50 rounded-lg p-4 sm:p-6 border border-gray-200">
                            <div class="space-y-2 sm:space-y-4">
                                <div class="flex items-center space-x-1.5 sm:space-x-2 mb-2 sm:mb-4">
                                    <svg class="w-4 h-4 sm:w-5 sm:h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                    <h4 class="theme-app text-base sm:text-lg font-semibold" style="color: var(--primary-text);">Role Information</h4>
                                </div>
                                
                                <div class="space-y-2">
                                    <label for="name" class="block text-sm font-semibold text-gray-700 mb-1 sm:mb-2">
                                        <div class="flex items-center space-x-1.5 sm:space-x-2">
                                            <span>Role Name</span>
                                            <span class="text-red-500">*</span>
                                        </div>
                                    </label>
                                    <div class="relative">
                                        <input type="text" 
                                               name="name" 
                                               id="name"
                                               placeholder="Enter role name (e.g., Admin, Editor, Viewer)"
                                               class="w-full px-3 py-2.5 sm:px-4 sm:py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-4 focus:ring-green-200 focus:border-green-500 transition-all duration-300 ease-in-out hover:border-gray-400 bg-white text-sm">
                                        <div id="name-validation-icon" class="absolute right-3 top-1/2 transform -translate-y-1/2 hidden">
                                            <!-- Success icon -->
                                            <svg class="w-5 h-5 text-green-500 success-icon hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                            </svg>
                                            <!-- Error icon -->
                                            <svg class="w-5 h-5 text-red-500 error-icon hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                            </svg>
                                        </div>
                                    </div>
                                    <div id="name-error" class="hidden flex items-center space-x-2 mt-2 p-2 sm:p-3 bg-red-50 border border-red-200 rounded-lg">
                                        <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        <span class="text-xs sm:text-sm text-red-600 font-medium" id="name-error-text"></span>
                                    </div>
                                    <div id="name-success" class="hidden flex items-center space-x-2 mt-2 p-2 sm:p-3 bg-green-50 border border-green-200 rounded-lg">
                                        <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                        </svg>
                                        <span class="text-xs sm:text-sm text-green-600 font-medium">Role name looks good!</span>
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
                            </div>
                        </div>

                        <!-- Permissions Section -->
                        <div class="bg-blue-50 rounded-lg p-4 sm:p-6 border border-blue-200">
                            <div class="flex items-center space-x-1.5 sm:space-x-2 mb-4 sm:mb-6">
                                <svg class="w-4 h-4 sm:w-5 sm:h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.031 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                                </svg>
                                <h4 class="theme-app text-base sm:text-lg font-semibold" style="color: var(--primary-text);">Assign Permissions</h4>
                            </div>
                            
                            <!-- Permission Selection Validation -->
                            <div id="permission-error" class="hidden flex items-center space-x-2 mb-4 p-2 sm:p-3 bg-red-50 border border-red-200 rounded-lg">
                                <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span class="text-xs sm:text-sm text-red-600 font-medium">Please select at least one permission for this role.</span>
                            </div>
                            
                            <!-- Search Bar -->
                            <div class="mb-4 sm:mb-6">
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="w-4 h-4 sm:w-5 sm:h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                        </svg>
                                    </div>
                                    <input type="text" 
                                           id="permission-search"
                                           placeholder="Search permissions..."
                                           class="w-full pl-10 pr-4 py-2.5 sm:py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-4 focus:ring-blue-200 focus:border-blue-500 transition-all duration-300 ease-in-out hover:border-gray-400 bg-white text-sm">
                                </div>
                                <!-- Search Results Counter -->
                                <div class="mt-2 text-xs sm:text-sm text-gray-600">
                                    <span id="search-results-count">{{ $permissions->count() }}</span> permissions found
                                </div>
                            </div>
                            
                            <!-- Select All Permissions option -->
                            <div class="bg-white rounded-lg p-3 sm:p-4 border-2 border-blue-300 mb-4 sm:mb-6">
                                <label for="select-all-permissions" class="flex items-center space-x-2 sm:space-x-3 cursor-pointer">
                                    <input type="checkbox" 
                                           id="select-all-permissions"
                                           class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2 transition-all duration-200">
                                    <div class="flex items-center space-x-1.5 sm:space-x-2">
                                        <div class="w-7 h-7 sm:w-8 sm:h-8 bg-gradient-to-r from-green-100 to-green-200 rounded-full flex items-center justify-center">
                                            <svg class="w-3.5 h-3.5 sm:w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4"></path>
                                            </svg>
                                        </div>
                                        <span class="text-sm font-bold text-gray-900">Select All Visible Permissions</span>
                                    </div>
                                </label>
                            </div>
                            
                            @if ($permissions->isNotEmpty())
                                <div id="permissions-grid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-3 sm:gap-4">
                                    @foreach ($permissions as $permission)
                                        <div class="permission-item bg-white rounded-lg p-3 sm:p-4 border border-gray-200 hover:border-blue-300 hover:shadow-md transition-all duration-300 ease-in-out transform hover:scale-[1.01]" data-permission-name="{{ strtolower($permission->name) }}">
                                            <label for="permission-{{ $permission->id }}" class="flex items-center space-x-2 sm:space-x-3 cursor-pointer">
                                                <input type="checkbox" 
                                                       name="permission[]" 
                                                       value="{{ $permission->name }}"
                                                       id="permission-{{ $permission->id }}"
                                                       class="permission-checkbox w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2 transition-all duration-200">
                                                <div class="flex items-center space-x-1.5 sm:space-x-2">
                                                    <div class="w-7 h-7 sm:w-8 sm:h-8 bg-gradient-to-r from-blue-100 to-blue-200 rounded-full flex items-center justify-center">
                                                        <svg class="w-3.5 h-3.5 sm:w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1721 9z"></path>
                                                        </svg>
                                                    </div>
                                                    <span class="text-sm font-medium text-gray-900">{{ ucwords($permission->name) }}</span>
                                                </div>
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                                
                                <!-- No Results Message -->
                                <div id="no-results-message" class="hidden text-center py-6 sm:py-8">
                                    <div class="w-14 h-14 sm:w-16 sm:h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-3 sm:mb-4">
                                        <svg class="w-7 h-7 sm:w-8 sm:h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                        </svg>
                                    </div>
                                    <p class="text-sm sm:text-base text-gray-500">No permissions found matching your search.</p>
                                    <button type="button" onclick="clearSearch()" class="mt-2 text-blue-600 hover:text-blue-800 text-sm font-medium">Clear search</button>
                                </div>
                            @else
                                <div class="text-center py-6 sm:py-8">
                                    <div class="w-14 h-14 sm:w-16 sm:h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-3 sm:mb-4">
                                        <svg class="w-7 h-7 sm:w-8 sm:h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.031 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                                        </svg>
                                    </div>
                                    <p class="text-sm sm:text-base text-gray-500">No permissions available to assign.</p>
                                </div>
                            @endif
                        </div>
                        
                        <!-- Action Buttons -->
                        <div class="flex flex-col sm:flex-row items-center justify-center sm:justify-end space-y-3 sm:space-y-0 sm:space-x-4 pt-4 sm:pt-6 border-t border-gray-200">
                            <a href="{{ route('roles.index') }}"
                               class="inline-flex items-center justify-center w-full sm:w-auto px-4 py-3 sm:px-6 sm:py-4 border border-gray-300 text-gray-700 bg-white font-semibold rounded-lg shadow-sm hover:bg-gray-50 hover:scale-105 transform transition-all duration-300 ease-in-out focus:outline-none focus:ring-4 focus:ring-gray-300 text-base">
                                <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                                Cancel
                            </a>
                            <button type="submit" id="createRoleBtn"
                                    class="theme-app inline-flex items-center justify-center w-full sm:w-auto px-6 py-3 sm:px-8 sm:py-4 font-semibold rounded-lg shadow-lg hover:scale-105 transform transition-all duration-300 ease-in-out focus:outline-none focus:ring-4 text-base sm:text-lg disabled:opacity-50 disabled:cursor-not-allowed"
                                    style="background-color: var(--hover-bg); color: var(--primary-text);"
                                    onmouseover="this.style.backgroundColor='var(--primary-bg-light)'"
                                    onmouseout="this.style.backgroundColor='var(--hover-bg)'"
                                    disabled>
                                <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                                <span id="create-btn-text">Create Role</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Enhanced JavaScript for Validation -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('createRoleForm');
            const nameInput = document.getElementById('name');
            const createBtn = document.getElementById('createRoleBtn');
            const createBtnText = document.getElementById('create-btn-text');
            const nameError = document.getElementById('name-error');
            const nameErrorText = document.getElementById('name-error-text');
            const nameSuccess = document.getElementById('name-success');
            const nameValidationIcon = document.getElementById('name-validation-icon');
            const permissionError = document.getElementById('permission-error');
            const selectAllCheckbox = document.getElementById('select-all-permissions');
            const searchInput = document.getElementById('permission-search');
            const permissionsGrid = document.getElementById('permissions-grid');
            const noResultsMessage = document.getElementById('no-results-message');
            const searchResultsCount = document.getElementById('search-results-count');
            
            // Get all permission items and checkboxes
            const permissionItems = document.querySelectorAll('.permission-item');
            const permissionCheckboxes = document.querySelectorAll('.permission-checkbox');
            
            let isFormValid = false;
            let isNameValid = false;
            let isPermissionValid = false;
            let isSubmitting = false;
            
            // Reserved role names
            const reservedNames = ['admin', 'root', 'system', 'super', 'superuser', 'administrator', 'guest', 'anonymous'];
            
            // Role name validation
            function validateRoleName(name) {
                const trimmedName = name.trim();
                
                if (!trimmedName) {
                    return { valid: false, message: 'Role name is required.' };
                }
                
                if (trimmedName.length < 2) {
                    return { valid: false, message: 'Role name must be at least 2 characters long.' };
                }
                
                if (trimmedName.length > 50) {
                    return { valid: false, message: 'Role name must not exceed 50 characters.' };
                }
                
                if (!/^[a-zA-Z0-9\s_-]+$/.test(trimmedName)) {
                    return { valid: false, message: 'Role name can only contain letters, numbers, spaces, underscores, and hyphens.' };
                }
                
                if (/^\s|\s$/.test(trimmedName)) {
                    return { valid: false, message: 'Role name cannot start or end with spaces.' };
                }
                
                if (/\s{2,}/.test(trimmedName)) {
                    return { valid: false, message: 'Role name cannot contain consecutive spaces.' };
                }
                
                if (reservedNames.includes(trimmedName.toLowerCase())) {
                    return { valid: false, message: 'This role name is reserved. Please choose a different name.' };
                }
                
                return { valid: true, message: '' };
            }
            
            // Update validation UI
            function updateValidationUI(input, isValid, message = '') {
                const errorElement = document.getElementById(input.id + '-error');
                const errorTextElement = document.getElementById(input.id + '-error-text');
                const successElement = document.getElementById(input.id + '-success');
                const iconContainer = document.getElementById(input.id + '-validation-icon');
                const successIcon = iconContainer?.querySelector('.success-icon');
                const errorIcon = iconContainer?.querySelector('.error-icon');
                
                // Reset classes
                input.classList.remove('border-red-500', 'border-green-500', 'ring-red-200', 'ring-green-200');
                
                if (isValid) {
                    input.classList.add('border-green-500', 'ring-green-200');
                    errorElement?.classList.add('hidden');
                    successElement?.classList.remove('hidden');
                    
                    if (iconContainer) {
                        iconContainer.classList.remove('hidden');
                        successIcon?.classList.remove('hidden');
                        errorIcon?.classList.add('hidden');
                    }
                } else if (message) {
                    input.classList.add('border-red-500', 'ring-red-200');
                    errorElement?.classList.remove('hidden');
                    successElement?.classList.add('hidden');
                    
                    if (errorTextElement) {
                        errorTextElement.textContent = message;
                    }
                    
                    if (iconContainer) {
                        iconContainer.classList.remove('hidden');
                        successIcon?.classList.add('hidden');
                        errorIcon?.classList.remove('hidden');
                    }
                } else {
                    errorElement?.classList.add('hidden');
                    successElement?.classList.add('hidden');
                    
                    if (iconContainer) {
                        iconContainer.classList.add('hidden');
                        successIcon?.classList.add('hidden');
                        errorIcon?.classList.add('hidden');
                    }
                }
            }
            
            // Validate permissions
            function validatePermissions() {
                const checkedPermissions = document.querySelectorAll('.permission-checkbox:checked');
                isPermissionValid = checkedPermissions.length > 0;
                
                if (isPermissionValid) {
                    permissionError.classList.add('hidden');
                } else {
                    permissionError.classList.remove('hidden');
                }
                
                return isPermissionValid;
            }
            
            // Update form validation state
            function updateFormValidation() {
                isFormValid = isNameValid && isPermissionValid;
                
                if (isFormValid && !isSubmitting) {
                    createBtn.disabled = false;
                    createBtn.classList.remove('opacity-50', 'cursor-not-allowed');
                } else {
                    createBtn.disabled = true;
                    createBtn.classList.add('opacity-50', 'cursor-not-allowed');
                }
            }
            
            // Real-time name validation
            nameInput.addEventListener('input', function() {
                const validation = validateRoleName(this.value);
                isNameValid = validation.valid;
                updateValidationUI(this, validation.valid, validation.message);
                updateFormValidation();
            });
            
            nameInput.addEventListener('blur', function() {
                // Auto-format the input
                this.value = this.value.trim().replace(/\s+/g, ' ');
                const validation = validateRoleName(this.value);
                isNameValid = validation.valid;
                updateValidationUI(this, validation.valid, validation.message);
                updateFormValidation();
            });
            
            // Permission validation
            permissionCheckboxes.forEach(checkbox => {
                checkbox.addEventListener('change', function() {
                    validatePermissions();
                    updateFormValidation();
                });
            });
            
            // Form submission
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                
                if (isSubmitting) return;
                
                // Final validation
                const nameValidation = validateRoleName(nameInput.value);
                isNameValid = nameValidation.valid;
                updateValidationUI(nameInput, nameValidation.valid, nameValidation.message);
                
                validatePermissions();
                updateFormValidation();
                
                if (!isFormValid) {
                    // Focus on first invalid field
                    if (!isNameValid) {
                        nameInput.focus();
                    }
                    return;
                }
                
                // Show loading state
                isSubmitting = true;
                createBtn.disabled = true;
                createBtnText.innerHTML = `
                    <svg class="animate-spin -ml-1 mr-3 h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    Creating Role...
                `;
                
                // Submit the form
                this.submit();
            });
            
            // Search functionality
            searchInput.addEventListener('input', function() {
                const searchTerm = this.value.toLowerCase().trim();
                let visibleCount = 0;
                
                permissionItems.forEach(item => {
                    const permissionName = item.getAttribute('data-permission-name');
                    const isVisible = permissionName.includes(searchTerm);
                    
                    if (isVisible) {
                        item.style.display = 'block';
                        visibleCount++;
                    } else {
                        item.style.display = 'none';
                    }
                });
                
                // Update results count
                searchResultsCount.textContent = visibleCount;
                
                // Show/hide no results message
                if (visibleCount === 0 && searchTerm !== '') {
                    permissionsGrid.style.display = 'none';
                    noResultsMessage.classList.remove('hidden');
                } else {
                    permissionsGrid.style.display = 'grid';
                    noResultsMessage.classList.add('hidden');
                }
                
                // Update select all state after search
                updateSelectAllState();
            });
            
            // Handle Select All checkbox click
            selectAllCheckbox.addEventListener('change', function() {
                const visibleCheckboxes = getVisibleCheckboxes();
                visibleCheckboxes.forEach(checkbox => {
                    checkbox.checked = this.checked;
                });
                validatePermissions();
                updateFormValidation();
            });
            
            // Handle individual permission checkbox changes
            permissionCheckboxes.forEach(checkbox => {
                checkbox.addEventListener('change', function() {
                    updateSelectAllState();
                    validatePermissions();
                    updateFormValidation();
                });
            });
            
            // Get only visible checkboxes
            function getVisibleCheckboxes() {
                return Array.from(permissionCheckboxes).filter(checkbox => {
                    const item = checkbox.closest('.permission-item');
                    return item.style.display !== 'none';
                });
            }
            
            // Update select all checkbox state
            function updateSelectAllState() {
                const visibleCheckboxes = getVisibleCheckboxes();
                const checkedVisibleCount = visibleCheckboxes.filter(cb => cb.checked).length;
                const totalVisibleCount = visibleCheckboxes.length;
                
                if (totalVisibleCount === 0) {
                    selectAllCheckbox.checked = false;
                    selectAllCheckbox.indeterminate = false;
                } else if (checkedVisibleCount === 0) {
                    selectAllCheckbox.checked = false;
                    selectAllCheckbox.indeterminate = false;
                } else if (checkedVisibleCount === totalVisibleCount) {
                    selectAllCheckbox.checked = true;
                    selectAllCheckbox.indeterminate = false;
                } else {
                    selectAllCheckbox.checked = false;
                    selectAllCheckbox.indeterminate = true;
                }
            }
            
            // Initialize validation state
            updateSelectAllState();
            updateFormValidation();
        });
        
        // Clear search function
        function clearSearch() {
            const searchInput = document.getElementById('permission-search');
            searchInput.value = '';
            searchInput.dispatchEvent(new Event('input'));
        }
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
        
        /* Pulse animation for validation feedback */
        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.5; }
        }
        
        .animate-pulse {
            animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
        }
    </style>
</x-app-layout>
