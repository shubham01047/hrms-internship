<x-app-layout>
    <x-slot name="header">
        <div class="theme-app p-4 sm:p-6 rounded-lg shadow-sm" style="background: linear-gradient(to right, var(--secondary-bg), var(--primary-bg));">
            <div class="max-w-7xl mx-auto">
                <div class="flex flex-col sm:flex-row justify-between items-center gap-4 sm:gap-0">
                    <div class="flex items-center space-x-2 sm:space-x-3 mb-4 sm:mb-0">
                        <div class="p-2 rounded-lg shadow-md" style="background-color: var(--hover-bg);">
                            <svg class="w-5 h-5 sm:w-6 sm:h-6" style="color: var(--primary-text);" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                            </svg>
                        </div>
                        <h2 class="font-bold text-xl sm:text-2xl leading-tight" style="color: var(--primary-text);">
                            Edit Role
                        </h2>
                    </div>
                   <div class="w-full sm:w-auto lg:mr-24">
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
        </div>
    </x-slot>

    <div class="py-6 sm:py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-xl border border-gray-200">
                <div class="theme-app px-4 py-3 sm:px-6 sm:py-4 border-b border-gray-200" style="background: linear-gradient(to right, var(--secondary-bg), var(--primary-bg));">
                    <div class="flex items-center space-x-2 sm:space-x-3">
                        <div class="p-2 rounded-lg shadow-sm" style="background-color: var(--hover-bg);">
                            <svg class="w-4 h-4 sm:w-5 sm:h-5" style="color: var(--primary-text);" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-base sm:text-lg font-semibold" style="color: var(--primary-text);">Update Role Configuration</h3>
                            <p class="text-xs sm:text-sm" style="color: var(--secondary-text);">Modify the role name and permissions</p>
                        </div>
                    </div>
                </div>
                
                <div class="p-4 sm:p-8">
                    <form id="roleUpdateForm" action="{{ route('roles.update', $role->id) }}" method="POST" class="space-y-4 sm:space-y-6">
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
                                               value="{{ old('name', $role->name) }}"
                                               data-original-value="{{ $role->name }}"
                                               placeholder="Enter role name (e.g., Admin, Editor, Viewer)"
                                               class="w-full px-3 py-2.5 sm:px-4 sm:py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-4 focus:ring-blue-200 focus:border-blue-500 transition-all duration-300 ease-in-out hover:border-gray-400 bg-white text-sm">
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
                                <h4 class="theme-app text-base sm:text-lg font-semibold" style="color: var(--primary-text);">Update Permissions</h4>
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
                            
                            <!-- Select All option -->
                            <div class="bg-white rounded-lg p-3 sm:p-4 border border-blue-200 hover:border-blue-300 transition-all duration-300 mb-4 sm:mb-6">
                                <label for="select-all" class="flex items-center space-x-2 sm:space-x-3 cursor-pointer">
                                    <input type="checkbox" 
                                           id="select-all"
                                           class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2 transition-all duration-200">
                                    <div class="flex items-center space-x-1.5 sm:space-x-2">
                                        <div class="w-7 h-7 sm:w-8 sm:h-8 bg-gradient-to-r from-green-100 to-green-200 rounded-full flex items-center justify-center">
                                            <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                        </div>
                                        <span class="text-sm font-medium text-gray-900">Select All Visible Permissions</span>
                                    </div>
                                </label>
                            </div>
                            
                            @if ($permissions->isNotEmpty())
                                <div id="permissions-grid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-3 sm:gap-4">
                                    @foreach ($permissions as $permission)
                                        <div class="permission-item bg-white rounded-lg p-3 sm:p-4 border border-gray-200 hover:border-blue-300 hover:shadow-md transition-all duration-300 ease-in-out transform hover:scale-[1.01] {{ $hasPermissions->contains($permission->name) ? 'ring-2 ring-blue-200 bg-blue-50' : '' }}" data-permission-name="{{ strtolower($permission->name) }}">
                                            <label for="permission-{{ $permission->id }}" class="flex items-center space-x-2 sm:space-x-3 cursor-pointer">
                                                <input type="checkbox" 
                                                       name="permission[]" 
                                                       value="{{ $permission->name }}"
                                                       id="permission-{{ $permission->id }}"
                                                       {{ $hasPermissions->contains($permission->name) ? 'checked' : '' }}
                                                       data-original-checked="{{ $hasPermissions->contains($permission->name) ? 'true' : 'false' }}"
                                                       class="permission-checkbox w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2 transition-all duration-200">
                                                <div class="flex items-center space-x-1.5 sm:space-x-2">
                                                    <div class="w-7 h-7 sm:w-8 sm:h-8 bg-gradient-to-r from-blue-100 to-blue-200 rounded-full flex items-center justify-center">
                                                        <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16c-.77.833.192 2.5 1.732 2.5z"></path>
                                        </svg>
                                    </div>
                                    <p class="text-sm sm:text-base text-gray-500">No permissions available to assign.</p>
                                </div>
                            @endif
                        </div>

                        <div class="bg-yellow-50 rounded-lg p-3 sm:p-4 border border-yellow-200">
                            <div class="flex items-start space-x-2 sm:space-x-3">
                                <svg class="w-4 h-4 sm:w-5 sm:h-5 text-yellow-500 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16c-.77.833.192 2.5 1.732 2.5z"></path>
                                </svg>
                                <div>
                                    <h4 class="text-sm font-semibold text-gray-900">Important Notice</h4>
                                    <p class="text-xs sm:text-sm text-gray-600 mt-1">
                                        Changing role permissions will immediately affect all users assigned to this role.
                                    </p>
                                </div>
                            </div>
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
                            <button type="button" id="updateRoleBtn"
                                    class="theme-app inline-flex items-center justify-center w-full sm:w-auto px-6 py-3 sm:px-8 sm:py-4 font-semibold rounded-lg shadow-lg hover:scale-105 transform transition-all duration-300 ease-in-out focus:outline-none focus:ring-4 text-base sm:text-lg disabled:opacity-50 disabled:cursor-not-allowed"
                                    style="background-color: var(--hover-bg); color: var(--primary-text);"
                                    onmouseover="this.style.backgroundColor='var(--primary-bg-light)'"
                                    onmouseout="this.style.backgroundColor='var(--hover-bg)'"
                                    disabled>
                                <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path>
                                </svg>
                                <span id="update-btn-text">No Changes Made</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Custom Confirmation Modal -->
    <div id="confirmationModal" class="fixed inset-0 z-50 hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <!-- Background overlay -->
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
        
        <!-- Modal container - properly centered -->
        <div class="fixed inset-0 flex items-center justify-center p-4">
            <!-- Modal panel -->
            <div class="relative bg-white rounded-lg shadow-xl transform transition-all w-full max-w-lg mx-auto">
                <div class="px-4 pt-5 pb-4 sm:p-6">
                    <div class="sm:flex sm:items-start">
                        <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                            <svg class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16c-.77.833.192 2.5 1.732 2.5z" />
                            </svg>
                        </div>
                        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                            <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                                Confirm Role Update
                            </h3>
                            <div class="mt-2">
                                <p class="text-sm text-gray-500">
                                    Are you sure you want to update this role? This action will immediately affect all users assigned to this role and their permissions will be updated accordingly.
                                </p>
                            </div>
                            <div class="mt-4 bg-yellow-50 border border-yellow-200 rounded-lg p-3">
                                <div class="flex">
                                    <div class="flex-shrink-0">
                                        <svg class="h-5 w-5 text-yellow-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd" d="M8.485 2.495c.673-1.167 2.357-1.167 3.03 0l6.28 10.875c.673 1.167-.17 2.625-1.516 2.625H3.72c-1.347 0-2.189-1.458-1.515-2.625L8.485 2.495zM10 5a.75.75 0 01.75.75v3.5a.75.75 0 01-1.5 0v-3.5A.75.75 0 0110 5zm0 9a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <div class="ml-3">
                                        <p class="text-sm text-yellow-700">
                                            <strong>Warning:</strong> This change cannot be undone and will take effect immediately.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-5 sm:mt-4 sm:flex sm:flex-row-reverse">
                        <button type="button" id="confirmUpdateBtn" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm transition-all duration-200 hover:scale-105">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path>
                            </svg>
                            Yes, Update Role
                        </button>
                        <button type="button" id="cancelUpdateBtn" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:w-auto sm:text-sm transition-all duration-200 hover:scale-105">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                            Cancel
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Enhanced JavaScript with Validation -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            const form = document.getElementById('roleUpdateForm');
            const nameInput = document.getElementById('name');
            const updateBtn = document.getElementById('updateRoleBtn');
            const updateBtnText = document.getElementById('update-btn-text');
            const nameError = document.getElementById('name-error');
            const nameErrorText = document.getElementById('name-error-text');
            const nameSuccess = document.getElementById('name-success');
            const nameValidationIcon = document.getElementById('name-validation-icon');
            const permissionError = document.getElementById('permission-error');
            const selectAllCheckbox = document.getElementById('select-all');
            const searchInput = document.getElementById('permission-search');
            const permissionsGrid = document.getElementById('permissions-grid');
            const noResultsMessage = document.getElementById('no-results-message');
            const searchResultsCount = document.getElementById('search-results-count');
            
            // Get all permission items and checkboxes
            const permissionItems = document.querySelectorAll('.permission-item');
            const permissionCheckboxes = document.querySelectorAll('.permission-checkbox');
            
            // Store original values
            const originalName = nameInput.getAttribute('data-original-value');
            const originalPermissions = new Set();
            
            permissionCheckboxes.forEach(checkbox => {
                if (checkbox.getAttribute('data-original-checked') === 'true') {
                    originalPermissions.add(checkbox.value);
                }
            });
            
            let isFormValid = false;
            let isNameValid = true; // Start as valid since we have existing data
            let isPermissionValid = true; // Start as valid since we have existing data
            let hasChanges = false;
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
                
                if (reservedNames.includes(trimmedName.toLowerCase()) && trimmedName.toLowerCase() !== originalName.toLowerCase()) {
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
            
            // Check for changes
            function checkForChanges() {
                const currentName = nameInput.value.trim();
                const currentPermissions = new Set();
                
                permissionCheckboxes.forEach(checkbox => {
                    if (checkbox.checked) {
                        currentPermissions.add(checkbox.value);
                    }
                });
                
                const nameChanged = currentName !== originalName;
                const permissionsChanged = !areSetsEqual(currentPermissions, originalPermissions);
                
                hasChanges = nameChanged || permissionsChanged;
                
                return hasChanges;
            }
            
            // Helper function to compare sets
            function areSetsEqual(set1, set2) {
                if (set1.size !== set2.size) return false;
                for (let item of set1) {
                    if (!set2.has(item)) return false;
                }
                return true;
            }
            
            // Update form validation state
            function updateFormValidation() {
                checkForChanges();
                isFormValid = isNameValid && isPermissionValid && hasChanges;
                
                if (hasChanges) {
                    if (isFormValid && !isSubmitting) {
                        updateBtn.disabled = false;
                        updateBtn.classList.remove('opacity-50', 'cursor-not-allowed');
                        updateBtnText.textContent = 'Update Role';
                    } else {
                        updateBtn.disabled = true;
                        updateBtn.classList.add('opacity-50', 'cursor-not-allowed');
                        updateBtnText.textContent = 'Update Role';
                    }
                } else {
                    updateBtn.disabled = true;
                    updateBtn.classList.add('opacity-50', 'cursor-not-allowed');
                    updateBtnText.textContent = 'No Changes Made';
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
                    updatePermissionBoxStyle(this);
                    validatePermissions();
                    updateFormValidation();
                    updateSelectAllState();
                });
            });
            
            // Custom confirmation modal functionality
            $('#updateRoleBtn').on('click', function(e) {
                e.preventDefault();
                
                if (isSubmitting || !isFormValid) return;
                
                $('#confirmationModal').removeClass('hidden');
                $('body').addClass('overflow-hidden');
                
                // Add fade-in animation
                $('#confirmationModal').hide().fadeIn(300);
            });
            
            // Close modal on cancel
            $('#cancelUpdateBtn').on('click', function() {
                closeModal();
            });
            
            // Close modal on background click
            $('#confirmationModal').on('click', function(e) {
                if ($(e.target).hasClass('fixed') && $(e.target).hasClass('inset-0')) {
                    closeModal();
                }
            });
            
            // Close modal on ESC key
            $(document).on('keydown', function(e) {
                if (e.key === 'Escape' && !$('#confirmationModal').hasClass('hidden')) {
                    closeModal();
                }
            });
            
            // Confirm update
            $('#confirmUpdateBtn').on('click', function() {
                // Final validation
                const nameValidation = validateRoleName(nameInput.value);
                isNameValid = nameValidation.valid;
                updateValidationUI(nameInput, nameValidation.valid, nameValidation.message);
                
                validatePermissions();
                updateFormValidation();
                
                if (!isFormValid) {
                    closeModal();
                    if (!isNameValid) {
                        nameInput.focus();
                    }
                    return;
                }
                
                // Add loading state
                isSubmitting = true;
                $(this).prop('disabled', true).html(`
                    <svg class="animate-spin -ml-1 mr-3 h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    Updating...
                `);
                
                // Submit the form
                $('#roleUpdateForm').submit();
            });
            
            function closeModal() {
                $('#confirmationModal').fadeOut(300, function() {
                    $(this).addClass('hidden');
                    $('body').removeClass('overflow-hidden');
                });
            }
            
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
            
            // Handle select all checkbox change
            selectAllCheckbox.addEventListener('change', function() {
                const visibleCheckboxes = getVisibleCheckboxes();
                visibleCheckboxes.forEach(checkbox => {
                    checkbox.checked = this.checked;
                    // Trigger visual updates for the permission boxes
                    updatePermissionBoxStyle(checkbox);
                });
                validatePermissions();
                updateFormValidation();
            });
            
            // Get only visible checkboxes
            function getVisibleCheckboxes() {
                return Array.from(permissionCheckboxes).filter(checkbox => {
                    const item = checkbox.closest('.permission-item');
                    return item.style.display !== 'none';
                });
            }
            
            // Update the visual style of permission boxes
            function updatePermissionBoxStyle(checkbox) {
                const parentDiv = checkbox.closest('.permission-item');
                if (checkbox.checked) {
                    parentDiv.classList.add('ring-2', 'ring-blue-200', 'bg-blue-50');
                } else {
                    parentDiv.classList.remove('ring-2', 'ring-blue-200', 'bg-blue-50');
                }
            }
            
            // Update select all checkbox state based on individual checkboxes
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
            
            // Initialize the states on page load
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
        /* Custom animations for modal */
        @keyframes fadeIn {
            from { opacity: 0; transform: scale(0.95); }
            to { opacity: 1; transform: scale(1); }
        }
        
        @keyframes fadeOut {
            from { opacity: 1; transform: scale(1); }
            to { opacity: 0; transform: scale(0.95); }
        }
        
        .animate-fadeIn {
            animation: fadeIn 0.3s ease-out;
        }
        
        .animate-fadeOut {
            animation: fadeOut 0.3s ease-in;
        }
        
        /* Prevent body scroll when modal is open */
        body.overflow-hidden {
            overflow: hidden;
        }
        
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
