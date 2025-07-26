<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center bg-gradient-to-r from-gray-50 to-gray-100 p-6 rounded-lg shadow-sm">
            <div class="flex items-center space-x-3">
                <div class="p-2 bg-gradient-to-r from-purple-500 to-purple-600 rounded-lg shadow-md">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                </div>
                <h2 class="font-bold text-2xl text-gray-800 leading-tight">
                    {{ __('Roles Management') }}
                </h2>
            </div>
            @can('create roles')
                <a href="{{ route('roles.create') }}" 
                   class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-green-500 to-green-600 text-white font-semibold rounded-lg shadow-lg hover:from-green-600 hover:to-green-700 hover:scale-105 transform transition-all duration-300 ease-in-out focus:outline-none focus:ring-4 focus:ring-green-300">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    Create Role
                </a>
            @endcan
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-message></x-message>
            
            <div class="bg-white rounded-xl shadow-xl overflow-hidden border border-gray-200">
                <!-- Search Bar Section -->
                <div class="p-6 bg-gradient-to-r from-gray-50 to-gray-100 border-b border-gray-200">
                    <div class="flex flex-col sm:flex-row gap-4 items-center justify-between">
                        <div class="relative flex-1 max-w-md">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </div>
                            <input type="text" 
                                   id="searchInput"
                                   placeholder="Search roles..." 
                                   class="block w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg leading-5 bg-white placeholder-gray-500 focus:outline-none focus:placeholder-gray-400 focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-all duration-300 ease-in-out shadow-sm">
                        </div>
                        
                        <div class="flex items-center space-x-3">
                            <button id="clearSearch" 
                                    class="hidden inline-flex items-center px-4 py-2 bg-gray-500 text-white text-sm font-medium rounded-lg hover:bg-gray-600 transition-colors duration-200">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                                Clear
                            </button>
                            
                            <div id="resultsCounter" class="text-sm text-gray-600 bg-white px-3 py-2 rounded-lg border border-gray-200">
                                <span class="font-semibold" id="totalCount">{{ $roles->count() }}</span> 
                                <span id="roleText">{{ Str::plural('role', $roles->count()) }}</span>
                                <span id="searchContext"></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="p-6">
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gradient-to-r from-red-600 to-red-700">
                                <tr>
                                    <th class="px-6 py-4 text-left text-xs font-bold text-white uppercase tracking-wider rounded-tl-lg">
                                        <div class="flex items-center space-x-2">
                                            <span>#</span>
                                        </div>
                                    </th>
                                    <th class="px-6 py-4 text-left text-xs font-bold text-white uppercase tracking-wider">
                                        <div class="flex items-center space-x-2">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                            </svg>
                                            <span>Role Name</span>
                                        </div>
                                    </th>
                                    <th class="px-6 py-4 text-left text-xs font-bold text-white uppercase tracking-wider">
                                        <div class="flex items-center space-x-2">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.031 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                                            </svg>
                                            <span>Permissions</span>
                                        </div>
                                    </th>
                                    <th class="px-6 py-4 text-left text-xs font-bold text-white uppercase tracking-wider">
                                        <div class="flex items-center space-x-2">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3a4 4 0 118 0v4m-4 6v6m-4-6h8"></path>
                                            </svg>
                                            <span>Created</span>
                                        </div>
                                    </th>
                                    <th class="px-6 py-4 text-left text-xs font-bold text-white uppercase tracking-wider rounded-tr-lg">
                                        <div class="flex items-center space-x-2">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"></path>
                                            </svg>
                                            <span>Actions</span>
                                        </div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody id="rolesTableBody" class="bg-white divide-y divide-gray-200">
                                @if ($roles->isNotEmpty())
                                    @foreach ($roles as $index => $role)
                                        <tr class="role-row hover:bg-gradient-to-r hover:from-gray-50 hover:to-gray-100 transition-all duration-300 ease-in-out transform hover:scale-[1.01]" 
                                            data-role-name="{{ strtolower($role->name) }}"
                                            data-role-permissions="{{ strtolower($role->permissions->pluck('name')->implode(' ')) }}"
                                            data-role-id="{{ $role->id }}">
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center justify-center w-8 h-8 bg-gradient-to-r from-gray-100 to-gray-200 rounded-full text-sm font-semibold text-gray-700">
                                                    {{ $index + 1 }}
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div class="flex-shrink-0 h-10 w-10">
                                                        <div class="h-10 w-10 rounded-full bg-gradient-to-r from-purple-400 to-purple-600 flex items-center justify-center">
                                                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                                            </svg>
                                                        </div>
                                                    </div>
                                                    <div class="ml-4">
                                                        <div class="text-sm font-semibold text-gray-900 role-name">
                                                            {{ ucwords($role->name) }}
                                                        </div>
                                                        <div class="text-sm text-gray-500">Role</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4">
                                                <div class="max-w-xs role-permissions">
                                                    @if($role->permissions->isNotEmpty())
                                                        <div class="permissions-container" data-role-index="{{ $index }}">
                                                            <!-- Initially visible permissions (first 3) -->
                                                            <div class="flex flex-wrap gap-1 visible-permissions">
                                                                @foreach($role->permissions->take(3) as $permission)
                                                                    <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800 permission-badge">
                                                                        {{ $permission->name }}
                                                                    </span>
                                                                @endforeach
                                                                @if($role->permissions->count() > 3)
                                                                    <button onclick="togglePermissions({{ $index }})" 
                                                                            class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-gray-100 text-gray-600 hover:bg-gray-200 transition-colors duration-200 cursor-pointer expand-btn">
                                                                        <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                                                        </svg>
                                                                        +{{ $role->permissions->count() - 3 }} more
                                                                    </button>
                                                                @endif
                                                            </div>
                                                            
                                                            <!-- Hidden permissions (initially hidden) -->
                                                            @if($role->permissions->count() > 3)
                                                                <div class="hidden-permissions hidden">
                                                                    <div class="flex flex-wrap gap-1 mt-2">
                                                                        @foreach($role->permissions as $permission)
                                                                            <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800 permission-badge">
                                                                                {{ $permission->name }}
                                                                            </span>
                                                                        @endforeach
                                                                        <button onclick="togglePermissions({{ $index }})" 
                                                                                class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-gray-100 text-gray-600 hover:bg-gray-200 transition-colors duration-200 cursor-pointer collapse-btn">
                                                                            <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path>
                                                                            </svg>
                                                                            Show less
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    @else
                                                        <span class="text-sm text-gray-400 italic">No permissions assigned</span>
                                                    @endif
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <svg class="w-4 h-4 text-gray-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3a4 4 0 118 0v4m-4 6v6m-4-6h8"></path>
                                                    </svg>
                                                    <span class="text-sm text-gray-900 font-medium">
                                                        {{ \Carbon\Carbon::parse($role->created_at)->format('d M, Y') }}
                                                    </span>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center space-x-3">
                                                    @can('edit roles')
                                                        <a href="{{ route('roles.edit', $role->id) }}"
                                                           class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-blue-500 to-blue-600 text-white text-xs font-semibold rounded-lg shadow-md hover:from-blue-600 hover:to-blue-700 hover:scale-105 transform transition-all duration-300 ease-in-out focus:outline-none focus:ring-4 focus:ring-blue-300">
                                                            <x-pencil class="w-3 h-3 mr-1"/>
                                                            Edit
                                                        </a>
                                                    @endcan
                                                    @can('delete roles')
                                                        <a href="javascript:void(0);" onclick="deleteRole({{ $role->id }})"
                                                           class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-red-500 to-red-600 text-white text-xs font-semibold rounded-lg shadow-md hover:from-red-600 hover:to-red-700 hover:scale-105 transform transition-all duration-300 ease-in-out focus:outline-none focus:ring-4 focus:ring-red-300">
                                                            <x-trashcan class="w-3 h-3 mr-1"/>
                                                            Delete
                                                        </a>
                                                    @endcan
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                                
                                <!-- No Results Row (Hidden by default) -->
                                <tr id="noResultsRow" class="hidden">
                                    <td colspan="5" class="px-6 py-12 text-center">
                                        <div class="flex flex-col items-center justify-center space-y-4">
                                            <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center">
                                                <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                                </svg>
                                            </div>
                                            <div class="text-lg font-medium text-gray-900">No roles found</div>
                                            <div class="text-sm text-gray-500">
                                                Try adjusting your search terms or <button onclick="clearSearch()" class="text-purple-600 hover:text-purple-500 underline">clear the search</button>.
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                                <!-- Empty State Row (Show when no roles at all) -->
                                @if ($roles->isEmpty())
                                    <tr id="emptyStateRow">
                                        <td colspan="5" class="px-6 py-12 text-center">
                                            <div class="flex flex-col items-center justify-center space-y-4">
                                                <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center">
                                                    <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                                    </svg>
                                                </div>
                                                <div class="text-lg font-medium text-gray-900">No roles found</div>
                                                <div class="text-sm text-gray-500">Get started by creating your first role.</div>
                                            </div>
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
                
                @if ($roles->hasPages())
                    <div class="bg-gray-50 px-6 py-4 border-t border-gray-200 rounded-b-xl">
                        <div class="flex items-center justify-between">
                            <div class="text-sm text-gray-700">
                                Showing {{ $roles->firstItem() }} to {{ $roles->lastItem() }} of {{ $roles->total() }} results
                            </div>
                            <div class="pagination-wrapper">
                                {{ $roles->links() }}
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
    
    <x-slot name="script">
        <script type="text/javascript">
            // Store original roles data
            const originalRoles = @json($roles->items());
            let currentSearchTerm = '';

            // Toggle permissions visibility
            function togglePermissions(roleIndex) {
                const container = document.querySelector(`[data-role-index="${roleIndex}"]`);
                const visiblePermissions = container.querySelector('.visible-permissions');
                const hiddenPermissions = container.querySelector('.hidden-permissions');
                
                if (hiddenPermissions.classList.contains('hidden')) {
                    // Show all permissions
                    visiblePermissions.classList.add('hidden');
                    hiddenPermissions.classList.remove('hidden');
                } else {
                    // Show limited permissions
                    visiblePermissions.classList.remove('hidden');
                    hiddenPermissions.classList.add('hidden');
                }
            }

            // Search functionality
            document.getElementById('searchInput').addEventListener('input', function() {
                const searchTerm = this.value.toLowerCase().trim();
                currentSearchTerm = searchTerm;
                filterRoles(searchTerm);
                updateUI(searchTerm);
            });

            // Clear search functionality
            document.getElementById('clearSearch').addEventListener('click', function() {
                clearSearch();
            });

            function filterRoles(searchTerm) {
                const rows = document.querySelectorAll('.role-row');
                const noResultsRow = document.getElementById('noResultsRow');
                let visibleCount = 0;

                rows.forEach((row, index) => {
                    const roleName = row.getAttribute('data-role-name');
                    const rolePermissions = row.getAttribute('data-role-permissions');
                    const nameElement = row.querySelector('.role-name');
                    const permissionElements = row.querySelectorAll('.permission-badge');
                    const originalRole = originalRoles[index] || {};

                    // Search in role name and permissions
                    const matchesName = roleName.includes(searchTerm);
                    const matchesPermissions = rolePermissions.includes(searchTerm);

                    if (searchTerm === '' || matchesName || matchesPermissions) {
                        row.style.display = '';
                        visibleCount++;
                        
                        // Update row number
                        const numberCell = row.querySelector('td:first-child div');
                        numberCell.textContent = visibleCount;
                        
                        // Highlight search term in role name
                        if (searchTerm !== '' && matchesName) {
                            const highlightedName = highlightSearchTerm(originalRole.name || '', searchTerm);
                            nameElement.innerHTML = highlightedName;
                        } else {
                            nameElement.textContent = (originalRole.name || '').charAt(0).toUpperCase() + (originalRole.name || '').slice(1);
                        }

                        // Highlight search term in permissions
                        if (searchTerm !== '' && matchesPermissions) {
                            permissionElements.forEach((element, permIndex) => {
                                const originalPermission = originalRole.permissions?.[permIndex]?.name || element.textContent;
                                if (originalPermission.toLowerCase().includes(searchTerm)) {
                                    element.innerHTML = highlightSearchTerm(originalPermission, searchTerm);
                                } else {
                                    element.textContent = originalPermission;
                                }
                            });
                        } else if (searchTerm === '') {
                            // Reset permission text when no search
                            permissionElements.forEach((element, permIndex) => {
                                const originalPermission = originalRole.permissions?.[permIndex]?.name || element.textContent;
                                element.textContent = originalPermission;
                            });
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
                const roleTextElement = document.getElementById('roleText');
                const searchContextElement = document.getElementById('searchContext');

                totalCountElement.textContent = count;
                roleTextElement.textContent = count === 1 ? 'role' : 'roles';
                
                if (searchTerm) {
                    searchContextElement.innerHTML = ` found for "<span class="font-medium text-purple-600">${searchTerm}</span>"`;
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
                filterRoles('');
                updateUI('');
            }

            // deleteRole function
            function deleteRole(id) {
                console.log("Calling delete for ID:", id);
                if (confirm('Are you sure you want to delete this role?')) {
                    $.ajax({
                        url: '{{ route('roles.destroy') }}',
                        type: 'DELETE',
                        data: {
                            id: id
                        },
                        dataType: 'json',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            // Remove the row from DOM
                            const row = document.querySelector(`[data-role-id="${id}"]`);
                            if (row) {
                                row.remove();
                                // Re-filter to update numbering and counter
                                filterRoles(currentSearchTerm);
                            }
                        },
                        error: function(xhr, status, error) {
                            alert('Error deleting role: ' + error);
                        }
                    });
                }
            }

            // Initialize on page load
            document.addEventListener('DOMContentLoaded', function() {
                updateCounter({{ $roles->count() }}, '');
            });
        </script>
    </x-slot>
</x-app-layout>