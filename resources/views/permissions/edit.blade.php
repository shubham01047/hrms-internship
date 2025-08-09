<x-app-layout>
    <x-slot name="header">
        <div class="theme-app flex flex-col sm:flex-row justify-between items-center p-4 sm:p-6 rounded-lg shadow-sm" style="background: linear-gradient(to right, var(--secondary-bg), var(--primary-bg));">
            {{-- Added lg:mr-24 to create space for the dropdown on larger screens --}}
            <div class="flex flex-col sm:flex-row items-center justify-between gap-4 sm:gap-0 w-full lg:mr-24">
                <div class="flex items-center space-x-2 sm:space-x-3 mb-4 sm:mb-0">
                    <div class="p-2 rounded-lg shadow-md" style="background-color: var(--hover-bg);">
                        <svg class="w-5 h-5 sm:w-6 sm:h-6" style="color: var(--primary-text);" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                        </svg>
                    </div>
                    {{-- Adjusted heading size for responsiveness --}}
                    <h2 class="font-bold text-xl sm:text-xl lg:text-2xl leading-tight" style="color: var(--primary-text);">
                        Edit Permission
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
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-xl border border-gray-200">
                <div class="bg-gradient-to-r from-gray-50 to-blue-50 px-4 py-3 sm:px-6 sm:py-4 border-b border-gray-200">
                    <div class="flex items-center space-x-2 sm:space-x-3">
                        <div class="theme-app p-2 rounded-lg shadow-sm" style="background-color: var(--hover-bg);">
                            <svg class="w-4 h-4 sm:w-5 sm:h-5" style="color: var(--primary-text);" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-base sm:text-lg font-semibold text-gray-900">Update Permission Details</h3>
                            <p class="text-xs sm:text-sm text-gray-600">Modify the permission information below</p>
                        </div>
                    </div>
                </div>
                
                <div class="p-4 sm:p-8">
                    <form action="{{ route('permissions.update', $permission->id) }}" method="POST" class="space-y-4 sm:space-y-6">
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
                                   value="{{ old('name', $permission->name) }}"
                                   placeholder="Enter permission name (e.g., create users, edit posts)"
                                   class="w-full px-3 py-2.5 sm:px-4 sm:py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-4 focus:ring-blue-200 focus:border-blue-500 transition-all duration-300 ease-in-out hover:border-gray-400 bg-gray-50 focus:bg-white text-sm">
                            @error('name')
                                <div class="flex items-center space-x-2 mt-2 p-2 sm:p-3 bg-red-50 border border-red-200 rounded-lg">
                                    <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <span class="text-xs sm:text-sm text-red-600 font-medium">{{ $message }}</span>
                                </div>
                            @enderror
                        </div>

                        <div class="bg-amber-50 rounded-lg p-3 sm:p-4 border border-amber-200">
                            <div class="flex items-start space-x-2 sm:space-x-3">
                                <svg class="w-4 h-4 sm:w-5 sm:h-5 text-amber-600 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16c-.77.833.192 2.5 1.732 2.5z"></path>
                                </svg>
                                <div>
                                    <h4 class="text-sm font-semibold text-gray-900">Important Notice</h4>
                                    <p class="text-xs sm:text-sm text-gray-600 mt-1">
                                        Changing this permission name may affect users and roles that currently have this permission assigned.
                                    </p>
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
                            <button type="submit"
                                    class="theme-app inline-flex items-center justify-center w-full sm:w-auto px-6 py-2.5 sm:px-8 sm:py-3 font-semibold rounded-lg shadow-lg hover:scale-105 transform transition-all duration-300 ease-in-out focus:outline-none focus:ring-4 text-sm"
                                    style="background-color: var(--hover-bg); color: var(--primary-text);"
                                    onmouseover="this.style.backgroundColor='var(--primary-bg-light)'"
                                    onmouseout="this.style.backgroundColor='var(--hover-bg)'">
                                <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path>
                                </svg>
                                Update Permission
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
