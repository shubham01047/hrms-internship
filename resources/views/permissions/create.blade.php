<x-app-layout>
    <x-slot name="header">
        <div class=" mr-24 flex justify-between items-center bg-gradient-to-r from-blue-800 to-blue-900 p-6 rounded-lg shadow-sm">
            <div class="flex items-center space-x-3">
                <div class="p-2 bg-white/20 rounded-lg shadow-md">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                </div>
                <h2 class="font-bold text-2xl text-white leading-tight">
                    Create New Permission
                </h2>
            </div>
            <a href="{{ route('permissions.index') }}" 
               class="inline-flex items-center px-6 py-3 bg-white text-blue-800 font-semibold rounded-lg shadow-lg hover:bg-blue-50 hover:scale-105 transform transition-all duration-300 ease-in-out focus:outline-none focus:ring-4 focus:ring-blue-300">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Back to List
            </a>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-xl border border-gray-200">
                <div class="bg-gradient-to-r from-gray-50 to-blue-50 px-6 py-4 border-b border-gray-200">
                    <div class="flex items-center space-x-3">
                        <div class="p-2 bg-blue-600 rounded-lg shadow-sm">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.031 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900">Permission Details</h3>
                            <p class="text-sm text-gray-600">Fill in the information below to create a new permission</p>
                        </div>
                    </div>
                </div>
                
                <div class="p-8">
                    <form action="{{ route('permissions.store') }}" method="POST" class="space-y-6">
                        @csrf
                        
                        <div class="space-y-2">
                            <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">
                                <div class="flex items-center space-x-2">
                                    <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-4 focus:ring-blue-200 focus:border-blue-500 transition-all duration-300 ease-in-out hover:border-gray-400 bg-gray-50 focus:bg-white">
                            @error('name')
                                <div class="flex items-center space-x-2 mt-2 p-3 bg-red-50 border border-red-200 rounded-lg">
                                    <svg class="w-4 h-4 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <span class="text-sm text-red-600 font-medium">{{ $message }}</span>
                                </div>
                            @enderror
                        </div>

                        <div class="bg-blue-50 rounded-lg p-4 border border-blue-200">
                            <div class="flex items-start space-x-3">
                                <svg class="w-5 h-5 text-blue-600 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <div>
                                    <h4 class="text-sm font-semibold text-gray-900">Naming Guidelines</h4>
                                    <ul class="text-sm text-gray-600 mt-1 space-y-1">
                                        <li>• Use descriptive names (e.g., "create users", "edit articles")</li>
                                        <li>• Use lowercase with spaces or underscores</li>
                                        <li>• Be specific about the action and resource</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        
                        <div class="flex items-center justify-end space-x-4 pt-6 border-t border-gray-200">
                            <a href="{{ route('permissions.index') }}"
                               class="inline-flex items-center px-6 py-3 border border-gray-300 text-gray-700 bg-white font-semibold rounded-lg shadow-sm hover:bg-gray-50 hover:scale-105 transform transition-all duration-300 ease-in-out focus:outline-none focus:ring-4 focus:ring-gray-300">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                                Cancel
                            </a>
                            <button type="submit"
                                    class="inline-flex items-center px-8 py-3 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg shadow-lg hover:scale-105 transform transition-all duration-300 ease-in-out focus:outline-none focus:ring-4 focus:ring-blue-300">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                                Create Permission
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>