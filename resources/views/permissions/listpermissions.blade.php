<x-app-layout>
    <x-slot name="header">
        <div class="theme-app flex flex-col sm:flex-row justify-between items-center p-4 sm:p-6 rounded-lg shadow-sm" style="background: linear-gradient(to right, var(--secondary-bg), var(--primary-bg));">
            <div class="flex items-center space-x-2 sm:space-x-3 mb-4 sm:mb-0">
                <div class="p-2 rounded-lg shadow-md" style="background-color: var(--hover-bg);">
                    <svg class="w-5 h-5 sm:w-6 sm:h-6" style="color: var(--primary-text);" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.031 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                    </svg>
                </div>
                <h2 class="font-bold text-xl sm:text-2xl leading-tight" style="color: var(--primary-text);">
                    {{ __('Permissions Management') }}
                </h2>
            </div>
            @can('create permissions')
                <div class="w-full sm:w-auto lg:mr-24">
                    <a href="{{ route('permissions.create') }}" 
                    class="inline-flex items-center justify-center w-full px-4 py-2 sm:px-6 sm:py-3 text-sm sm:text-base font-semibold rounded-lg shadow-lg hover:scale-105 transform transition-all duration-300 ease-in-out focus:outline-none focus:ring-4"
                    style="background-color: var(--hover-bg); color: var(--primary-text);"
                    onmouseover="this.style.backgroundColor='var(--primary-bg-light)'"
                    onmouseout="this.style.backgroundColor='var(--hover-bg)'">
                        <svg class="w-4 h-4 sm:w-5 sm:h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                d="M12 6v6m0 0v6m0-6h6m-6 0H6">
                            </path>
                        </svg>
                        Create Permission
                    </a>
                </div>

            @endcan
        </div>
    </x-slot>

    <div class="py-6 sm:py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <x-message></x-message>
            
            <div class="bg-white rounded-xl shadow-xl overflow-hidden border border-gray-200">
                <!-- Search Bar Section -->
                <div class="p-4 sm:p-6 bg-gradient-to-r from-gray-50 to-blue-50 border-b border-gray-200">
                    <div class="flex flex-col sm:flex-row gap-3 sm:gap-4 items-center justify-between">
                        <div class="relative flex-1 w-full sm:max-w-md">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </div>
                            <input type="text" 
                                   id="searchInput"
                                   placeholder="Search permissions..." 
                                   class="block w-full pl-10 pr-4 py-2 sm:py-3 border border-gray-300 rounded-lg leading-5 bg-white placeholder-gray-500 focus:outline-none focus:placeholder-gray-400 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-300 ease-in-out shadow-sm text-sm">
                        </div>
                        
                        <div class="flex flex-col sm:flex-row items-center gap-3 w-full sm:w-auto">
                            <button id="clearSearch" 
                                    class="theme-app hidden inline-flex items-center justify-center w-full sm:w-auto px-4 py-2 text-sm font-medium rounded-lg transition-colors duration-200"
                                    style="background-color: var(--primary-border); color: var(--primary-text);"
                                    onmouseover="this.style.backgroundColor='var(--hover-bg)'"
                                    onmouseout="this.style.backgroundColor='var(--primary-border)'">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                                Clear
                            </button>
                            
                            <div id="resultsCounter" class="text-xs sm:text-sm text-gray-600 bg-white px-3 py-2 rounded-lg border border-gray-200 w-full sm:w-auto text-center">
                                <span class="font-semibold" id="totalCount">{{ $permissions->count() }}</span> 
                                <span id="permissionText">{{ Str::plural('permission', $permissions->count()) }}</span>
                                <span id="searchContext"></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="p-4 sm:p-6">
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="theme-app" style="background: linear-gradient(to right, var(--secondary-bg), var(--primary-bg));">
                                <tr>
                                    <th class="px-4 py-3 text-left text-xs font-bold uppercase tracking-wider rounded-tl-lg" style="color: var(--primary-text);">
                                        <div class="flex items-center space-x-1 sm:space-x-2">
                                            <span>#</span>
                                        </div>
                                    </th>
                                    <th class="px-4 py-3 text-left text-xs font-bold uppercase tracking-wider" style="color: var(--primary-text);">
                                        <div class="flex items-center space-x-1 sm:space-x-2">
                                            <svg class="w-3 h-3 sm:w-4 sm:h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                                            </svg>
                                            <span>Name</span>
                                        </div>
                                    </th>
                                    <th class="px-4 py-3 text-left text-xs font-bold uppercase tracking-wider" style="color: var(--primary-text);">
                                        <div class="flex items-center space-x-1 sm:space-x-2">
                                            <svg class="w-3 h-3 sm:w-4 sm:h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3a4 4 0 118 0v4m-4 6v6m-4-6h8"></path>
                                            </svg>
                                            <span>Created</span>
                                        </div>
                                    </th>
                                    <th class="px-4 py-3 text-left text-xs font-bold uppercase tracking-wider rounded-tr-lg" style="color: var(--primary-text);">
                                        <div class="flex items-center space-x-1 sm:space-x-2">
                                            <svg class="w-3 h-3 sm:w-4 sm:h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"></path>
                                            </svg>
                                            <span>Actions</span>
                                        </div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody id="permissionsTableBody" class="bg-white divide-y divide-gray-200">
                                @if ($permissions->isNotEmpty())
                                    @foreach ($permissions as $index => $permission)
                                        <tr class="permission-row hover:bg-gradient-to-r hover:from-gray-50 hover:to-blue-50 transition-all duration-300 ease-in-out transform hover:scale-[1.01]" 
                                            data-permission-name="{{ strtolower($permission->name) }}"
                                            data-permission-id="{{ $permission->id }}">
                                            <td class="px-4 py-3 whitespace-nowrap">
                                                <div class="flex items-center justify-center w-7 h-7 sm:w-8 sm:h-8 bg-gradient-to-r from-blue-100 to-blue-200 rounded-full text-xs sm:text-sm font-semibold text-blue-800">
                                                    {{ $index + 1 }}
                                                </div>
                                            </td>
                                            <td class="px-4 py-3 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div class="flex-shrink-0 h-8 w-8 sm:h-10 sm:w-10">
                                                        <div class="h-8 w-8 sm:h-10 sm:w-10 rounded-full bg-gradient-to-r from-blue-500 to-blue-600 flex items-center justify-center">
                                                            <svg class="w-4 h-4 sm:w-5 sm:h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1721 9z"></path>
                                                            </svg>
                                                        </div>
                                                    </div>
                                                    <div class="ml-2 sm:ml-4">
                                                        <div class="text-sm font-semibold text-gray-900 permission-name">
                                                            {{ ucwords($permission->name) }}
                                                        </div>
                                                        <div class="text-xs text-gray-500">Permission</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-4 py-3 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <svg class="w-3 h-3 sm:w-4 sm:h-4 text-gray-400 mr-1 sm:mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3a4 4 0 118 0v4m-4 6v6m-4-6h8"></path>
                                                    </svg>
                                                    <span class="text-xs sm:text-sm text-gray-900 font-medium">
                                                        {{ \Carbon\Carbon::parse($permission->created_at)->format('d M, Y') }}
                                                    </span>
                                                </div>
                                            </td>
                                            <td class="px-4 py-3 whitespace-nowrap">
                                                <div class="flex items-center space-x-2 sm:space-x-3">
                                                    @can('edit permissions')
                                                        <a href="{{ route('permissions.edit', $permission->id) }}"
                                                           class="theme-app inline-flex items-center px-3 py-1.5 sm:px-4 sm:py-2 text-xs font-semibold rounded-lg shadow-md hover:scale-105 transform transition-all duration-300 ease-in-out focus:outline-none focus:ring-4"
                                                           style="background-color: var(--hover-bg); color: var(--primary-text);"
                                                           onmouseover="this.style.backgroundColor='var(--primary-bg-light)'"
                                                           onmouseout="this.style.backgroundColor='var(--hover-bg)'">
                                                            <x-pencil class="w-3 h-3 mr-1"/>
                                                            Edit
                                                        </a>
                                                    @endcan
                                                    @can('delete permissions')
                                                        <button type="button" onclick="deletePermission({{ $permission->id }}, '{{ addslashes($permission->name) }}')"
                                                           class="inline-flex items-center px-3 py-1.5 sm:px-4 sm:py-2 bg-red-600 hover:bg-red-700 text-white text-xs font-semibold rounded-lg shadow-md hover:scale-105 transform transition-all duration-300 ease-in-out focus:outline-none focus:ring-4 focus:ring-red-300">
                                                            <x-trashcan class="w-3 h-3 mr-1"/>
                                                            Delete
                                                        </button>
                                                    @endcan
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                                
                                <!-- No Results Row (Hidden by default) -->
                                <tr id="noResultsRow" class="hidden">
                                    <td colspan="4" class="px-6 py-12 text-center">
                                        <div class="flex flex-col items-center justify-center space-y-4">
                                            <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center">
                                                <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                                </svg>
                                            </div>
                                            <div class="text-lg font-medium text-gray-900">No permissions found</div>
                                            <div class="text-sm text-gray-500">
                                                Try adjusting your search terms or <button onclick="clearSearch()" class="text-blue-600 hover:text-blue-500 underline">clear the search</button>.
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                                <!-- Empty State Row (Show when no permissions at all) -->
                                @if ($permissions->isEmpty())
                                    <tr id="emptyStateRow">
                                        <td colspan="4" class="px-6 py-12 text-center">
                                            <div class="flex flex-col items-center justify-center space-y-4">
                                                <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center">
                                                    <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.031 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                                                    </svg>
                                                </div>
                                                <div class="text-lg font-medium text-gray-900">No permissions found</div>
                                                <div class="text-sm text-gray-500">Get started by creating your first permission.</div>
                                            </div>
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
                
                @if ($permissions->hasPages())
                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:py-4 border-t border-gray-200 rounded-b-xl">
                        <div class="flex flex-col sm:flex-row items-center justify-between gap-3">
                            <div class="text-xs sm:text-sm text-gray-700">
                                Showing {{ $permissions->firstItem() }} to {{ $permissions->lastItem() }} of {{ $permissions->total() }} results
                            </div>
                            <div class="pagination-wrapper">
                                {{ $permissions->links() }}
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Custom Delete Confirmation Modal -->
    <div id="deleteConfirmationModal" class="fixed inset-0 z-50 hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
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
                                Delete Permission
                            </h3>
                            <div class="mt-2">
                                <p class="text-sm text-gray-500">
                                    Are you sure you want to delete the permission "<span id="permissionNameToDelete" class="font-semibold text-gray-900"></span>"? This action cannot be undone.
                                </p>
                            </div>
                            <div class="mt-4 bg-red-50 border border-red-200 rounded-lg p-3">
                                <div class="flex">
                                    <div class="flex-shrink-0">
                                        <svg class="h-5 w-5 text-red-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd" d="M8.485 2.495c.673-1.167 2.357-1.167 3.03 0l6.28 10.875c.673 1.167-.17 2.625-1.516 2.625H3.72c-1.347 0-2.189-1.458-1.515-2.625L8.485 2.495zM10 5a.75.75 0 01.75.75v3.5a.75.75 0 01-1.5 0v-3.5A.75.75 0 0110 5zm0 9a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <div class="ml-3">
                                        <p class="text-sm text-red-700">
                                            <strong>Warning:</strong> Deleting this permission will remove it from all roles and users who currently have it assigned.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-5 sm:mt-4 sm:flex sm:flex-row-reverse">
                        <button type="button" id="confirmDeleteBtn" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm transition-all duration-200 hover:scale-105">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                            </svg>
                            Yes, Delete Permission
                        </button>
                        <button type="button" id="cancelDeleteBtn" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:w-auto sm:text-sm transition-all duration-200 hover:scale-105">
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
    
    <x-slot name="script">
        <!-- Include jQuery -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script type="text/javascript">
            // Store original permissions data
            const originalPermissions = @json($permissions->items());
            let currentSearchTerm = '';
            let permissionToDelete = null;

            $(document).ready(function() {
                // Custom delete confirmation modal functionality
                window.deletePermission = function(id, name) {
                    permissionToDelete = id;
                    $('#permissionNameToDelete').text(name);
                    $('#deleteConfirmationModal').removeClass('hidden');
                    $('body').addClass('overflow-hidden');
                    
                    // Add fade-in animation
                    $('#deleteConfirmationModal').hide().fadeIn(300);
                };
                
                // Close modal on cancel
                $('#cancelDeleteBtn').on('click', function() {
                    closeDeleteModal();
                });
                
                // Close modal on background click
                $('#deleteConfirmationModal').on('click', function(e) {
                    if ($(e.target).hasClass('fixed') && $(e.target).hasClass('inset-0')) {
                        closeDeleteModal();
                    }
                });
                
                // Close modal on ESC key
                $(document).on('keydown', function(e) {
                    if (e.key === 'Escape' && !$('#deleteConfirmationModal').hasClass('hidden')) {
                        closeDeleteModal();
                    }
                });
                
                // Confirm delete
                $('#confirmDeleteBtn').on('click', function() {
                    if (permissionToDelete) {
                        // Add loading state
                        $(this).prop('disabled', true).html(`
                            <svg class="animate-spin -ml-1 mr-3 h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                            Deleting...
                        `);
                        
                        // Perform the delete operation
                        performDelete(permissionToDelete);
                    }
                });
                
                function closeDeleteModal() {
                    $('#deleteConfirmationModal').fadeOut(300, function() {
                        $(this).addClass('hidden');
                        $('body').removeClass('overflow-hidden');
                        permissionToDelete = null;
                        // Reset button state
                        $('#confirmDeleteBtn').prop('disabled', false).html(`
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                            </svg>
                            Yes, Delete Permission
                        `);
                    });
                }
                
                function performDelete(id) {
                    $.ajax({
                        url: '{{ route('permissions.destroy') }}',
                        type: 'DELETE',
                        data: {
                            id: id
                        },
                        dataType: 'json',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            // Close modal first
                            closeDeleteModal();
                            
                            // Remove the row from DOM with animation
                            const row = document.querySelector(`[data-permission-id="${id}"]`);
                            if (row) {
                                $(row).fadeOut(300, function() {
                                    $(this).remove();
                                    // Re-filter to update numbering and counter
                                    filterPermissions(currentSearchTerm);
                                });
                            }
                        },
                        error: function(xhr, status, error) {
                            closeDeleteModal();
                            alert('Error deleting permission: ' + error);
                        }
                    });
                }
            });

            // Search functionality
            document.getElementById('searchInput').addEventListener('input', function() {
                const searchTerm = this.value.toLowerCase().trim();
                currentSearchTerm = searchTerm;
                filterPermissions(searchTerm);
                updateUI(searchTerm);
            });

            // Clear search functionality
            document.getElementById('clearSearch').addEventListener('click', function() {
                clearSearch();
            });

            function filterPermissions(searchTerm) {
                const rows = document.querySelectorAll('.permission-row');
                const noResultsRow = document.getElementById('noResultsRow');
                let visibleCount = 0;

                rows.forEach((row, index) => {
                    const permissionName = row.getAttribute('data-permission-name');
                    const nameElement = row.querySelector('.permission-name');
                    const originalName = originalPermissions[index]?.name || '';

                    if (searchTerm === '' || permissionName.includes(searchTerm)) {
                        row.style.display = '';
                        visibleCount++;
                        
                        // Update row number
                        const numberCell = row.querySelector('td:first-child div');
                        numberCell.textContent = visibleCount;
                        
                        // Highlight search term
                        if (searchTerm !== '') {
                            const highlightedName = highlightSearchTerm(originalName, searchTerm);
                            nameElement.innerHTML = highlightedName;
                        } else {
                            nameElement.textContent = originalName.charAt(0).toUpperCase() + originalName.slice(1);
                        }
                    } else {
                        row.style.display = 'none';
                    }
                });

                // Show/hide no results row
                if (visibleCount === 0 && searchTerm !== '') {
                    noResultsRow.style.display = '';
                } else {
                    noResultsRow.style.display = 'none';
                }

                // Update counter
                updateCounter(visibleCount, searchTerm);
            }

            function highlightSearchTerm(text, searchTerm) {
                if (!searchTerm) return text.charAt(0).toUpperCase() + text.slice(1);
                
                const regex = new RegExp(`(${searchTerm})`, 'gi');
                const highlightedText = text.replace(regex, '<mark class="bg-yellow-200 px-1 rounded">$1</mark>');
                return highlightedText.charAt(0).toUpperCase() + highlightedText.slice(1);
            }

            function updateCounter(count, searchTerm) {
                const totalCountElement = document.getElementById('totalCount');
                const permissionTextElement = document.getElementById('permissionText');
                const searchContextElement = document.getElementById('searchContext');

                totalCountElement.textContent = count;
                permissionTextElement.textContent = count === 1 ? 'permission' : 'permissions';
                
                if (searchTerm) {
                    searchContextElement.innerHTML = ` found for "<span class="font-medium text-blue-600">${searchTerm}</span>"`;
                } else {
                    searchContextElement.textContent = '';
                }
            }

            function updateUI(searchTerm) {
                const clearButton = document.getElementById('clearSearch');
                
                if (searchTerm) {
                    clearButton.classList.remove('hidden');
                    clearButton.classList.add('inline-flex');
                } else {
                    clearButton.classList.add('hidden');
                    clearButton.classList.remove('inline-flex');
                }
            }

            function clearSearch() {
                document.getElementById('searchInput').value = '';
                currentSearchTerm = '';
                filterPermissions('');
                updateUI('');
            }

            // Initialize on page load
            document.addEventListener('DOMContentLoaded', function() {
                updateCounter({{ $permissions->count() }}, '');
            });
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
        </style>
    </x-slot>
</x-app-layout>
