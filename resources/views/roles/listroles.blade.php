<x-app-layout>
    <x-slot name="header">
        <div class="theme-app" style="background: linear-gradient(to right, var(--secondary-bg), var(--primary-bg)); padding: 1.5rem 1rem; sm:padding: 3rem 2rem; border-radius: 0;">
            <div class="max-w-7xl mx-auto">
                {{-- Added lg:mr-24 to create space for the dropdown on larger screens --}}
                <div class="flex flex-col sm:flex-row justify-between items-center gap-4 sm:gap-0 lg:mr-24">
                    <div class="flex items-center space-x-3 sm:space-x-4 text-center sm:text-left">
                        <div class="p-2 sm:p-3 rounded-lg sm:rounded-2xl shadow-lg" style="background-color: var(--hover-bg);">
                            <svg class="w-6 h-6 sm:w-8 sm:h-8" style="color: var(--primary-text);" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                        </div>
                        <div>
                            {{-- Reduced heading size for larger screens --}}
                            <h1 class="text-2xl sm:text-3xl font-bold leading-tight" style="color: var(--primary-text);">
                                {{ __('Roles Management') }}
                            </h1>
                            <p class="text-sm sm:text-lg mt-1" style="color: var(--secondary-text);">
                                Manage user roles and permissions across your organization
                            </p>
                        </div>
                    </div>
                    @can('create roles')
                        <a href="{{ route('roles.create') }}" 
                           class="theme-app inline-flex items-center justify-center w-full sm:w-auto px-6 py-3 sm:px-8 sm:py-4 font-semibold rounded-lg sm:rounded-xl shadow-lg hover:scale-105 transform transition-all duration-300 ease-in-out focus:outline-none text-base sm:text-lg"
                           style="background-color: var(--hover-bg); color: var(--primary-text);"
                           onmouseover="this.style.backgroundColor='var(--primary-bg-light)'"
                           onmouseout="this.style.backgroundColor='var(--hover-bg)'">
                            <svg class="w-4 h-4 sm:w-5 sm:h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                            Create Role
                        </a>
                    @endcan
                </div>
            </div>
        </div>
    </x-slot>

    <div class="py-6 sm:py-8" style="background-color: #f8fafc; min-height: 100vh;">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <x-message></x-message>
            
            <!-- Search Section -->
            <div class="bg-white rounded-xl sm:rounded-2xl shadow-sm border border-gray-100 mb-4 sm:mb-6 p-4 sm:p-6">
                <div class="flex flex-col sm:flex-row gap-3 sm:gap-4 items-center justify-between">
                    <div class="relative flex-1 w-full sm:max-w-md">
                        <div class="absolute inset-y-0 left-0 pl-3 sm:pl-4 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                        <input type="text" 
                               id="searchInput"
                               placeholder="Search roles..." 
                               class="block w-full pl-10 sm:pl-12 pr-4 py-2.5 sm:py-4 border border-gray-200 rounded-lg sm:rounded-xl leading-5 bg-gray-50 placeholder-gray-500 focus:outline-none focus:placeholder-gray-400 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 focus:bg-white transition-all duration-300 ease-in-out text-sm sm:text-base">
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
                        
                        <div class="flex items-center space-x-2 text-gray-600 bg-gray-100 px-3 py-2 sm:px-4 sm:py-3 rounded-lg sm:rounded-xl text-xs sm:text-sm w-full sm:w-auto justify-center">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                            <span class="font-semibold" id="totalCount">{{ $roles->count() }}</span>
                            <span id="roleText">{{ Str::plural('role', $roles->count()) }}</span>
                            <span id="searchContext"></span>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Table Section -->
            <div class="bg-white rounded-xl sm:rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="min-w-full">
                        <thead class="theme-app" style="background: linear-gradient(to right, var(--secondary-bg), var(--primary-bg));">
                            <tr>
                                <th class="px-4 py-3 sm:px-8 sm:py-6 text-left text-xs sm:text-sm font-bold uppercase tracking-wider" style="color: var(--primary-text);">
                                    <div class="flex items-center space-x-1 sm:space-x-2">
                                        <svg class="w-3 h-3 sm:w-4 sm:h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                        </svg>
                                        <span>Role Name</span>
                                    </div>
                                </th>
                                <th class="px-4 py-3 sm:px-8 sm:py-6 text-left text-xs sm:text-sm font-bold uppercase tracking-wider" style="color: var(--primary-text);">
                                    <div class="flex items-center space-x-1 sm:space-x-2">
                                        <svg class="w-3 h-3 sm:w-4 sm:h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.031 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                                        </svg>
                                        <span>Permissions</span>
                                    </div>
                                </th>
                                <th class="px-4 py-3 sm:px-8 sm:py-6 text-left text-xs sm:text-sm font-bold uppercase tracking-wider" style="color: var(--primary-text);">
                                    <div class="flex items-center space-x-1 sm:space-x-2">
                                        <svg class="w-3 h-3 sm:w-4 sm:h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3a4 4 0 118 0v4m-4 6v6m-4-6h8"></path>
                                        </svg>
                                        <span>Created</span>
                                    </div>
                                </th>
                                <th class="px-4 py-3 sm:px-8 sm:py-6 text-left text-xs sm:text-sm font-bold uppercase tracking-wider" style="color: var(--primary-text);">
                                    <span>Actions</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody id="rolesTableBody" class="bg-white divide-y divide-gray-100">
                            @if ($roles->isNotEmpty())
                                @foreach ($roles as $index => $role)
                                    <tr class="role-row hover:bg-gray-50 transition-all duration-200 ease-in-out" 
                                        data-role-name="{{ strtolower($role->name) }}"
                                        data-role-permissions="{{ strtolower($role->permissions->pluck('name')->implode(' ')) }}"
                                        data-role-id="{{ $role->id }}">
                                        <td class="px-4 py-3 sm:px-8 sm:py-6">
                                            <div class="flex items-center space-x-2 sm:space-x-4">
                                                <div class="flex-shrink-0">
                                                    <div class="h-10 w-10 sm:h-12 sm:w-12 rounded-full flex items-center justify-center text-white font-bold text-base sm:text-lg" style="background-color: var(--hover-bg);">
                                                        {{ strtoupper(substr($role->name, 0, 1)) }}
                                                    </div>
                                                </div>
                                                <div>
                                                    <div class="text-sm sm:text-base font-semibold text-gray-900 role-name">
                                                        {{ ucwords($role->name) }}
                                                    </div>
                                                    <div class="text-xs text-gray-500 uppercase tracking-wide font-medium">Role</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-4 py-3 sm:px-8 sm:py-6">
                                            <div class="max-w-xs role-permissions">
                                                @if($role->permissions->isNotEmpty())
                                                    <div class="permissions-container" data-role-index="{{ $index }}">
                                                        <!-- Initially visible permissions (first 3) -->
                                                        <div class="flex flex-wrap gap-1.5 sm:gap-2 visible-permissions">
                                                            @foreach($role->permissions->take(3) as $permission)
                                                                <span class="inline-flex items-center px-2 py-0.5 sm:px-3 sm:py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800 permission-badge">
                                                                    {{ $permission->name }}
                                                                </span>
                                                            @endforeach
                                                            @if($role->permissions->count() > 3)
                                                                <button onclick="togglePermissions({{ $index }})" 
                                                                        class="inline-flex items-center px-2 py-0.5 sm:px-3 sm:py-1 rounded-full text-xs font-medium bg-gray-100 text-gray-600 hover:bg-gray-200 transition-colors duration-200 cursor-pointer expand-btn">
                                                                    +{{ $role->permissions->count() - 3 }} more
                                                                </button>
                                                            @endif
                                                        </div>
                                                        
                                                        <!-- Hidden permissions (initially hidden) -->
                                                        @if($role->permissions->count() > 3)
                                                            <div class="hidden-permissions hidden">
                                                                <div class="flex flex-wrap gap-1.5 sm:gap-2 mt-1.5 sm:mt-2">
                                                                    @foreach($role->permissions as $permission)
                                                                        <span class="inline-flex items-center px-2 py-0.5 sm:px-3 sm:py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800 permission-badge">
                                                                            {{ $permission->name }}
                                                                        </span>
                                                                    @endforeach
                                                                    <button onclick="togglePermissions({{ $index }})" 
                                                                            class="inline-flex items-center px-2 py-0.5 sm:px-3 sm:py-1 rounded-full text-xs font-medium bg-gray-100 text-gray-600 hover:bg-gray-200 transition-colors duration-200 cursor-pointer collapse-btn">
                                                                        Show less
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    </div>
                                                @else
                                                    <span class="text-xs sm:text-sm text-gray-400 italic">No permissions assigned</span>
                                                @endif
                                            </div>
                                        </td>
                                        <td class="px-4 py-3 sm:px-8 sm:py-6">
                                            <div class="flex items-center text-gray-600">
                                                <svg class="w-3 h-3 sm:w-4 sm:h-4 mr-1 sm:mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3a4 4 0 118 0v4m-4 6v6m-4-6h8"></path>
                                                </svg>
                                                <span class="text-xs sm:text-sm font-medium">
                                                    {{ \Carbon\Carbon::parse($role->created_at)->format('d M, Y') }}
                                                </span>
                                            </div>
                                        </td>
                                        <td class="px-4 py-3 sm:px-8 sm:py-6">
                                            <div class="flex items-center space-x-2 sm:space-x-3">
                                                @can('edit roles')
                                                    <button class="theme-app inline-flex items-center px-3 py-1.5 sm:px-4 sm:py-2 text-xs font-medium rounded-lg transition-all duration-200 hover:scale-105"
                                                            style="background-color: var(--hover-bg); color: var(--primary-text);"
                                                            onmouseover="this.style.backgroundColor='var(--primary-bg-light)'"
                                                            onmouseout="this.style.backgroundColor='var(--hover-bg)'"
                                                            onclick="window.location.href='{{ route('roles.edit', $role->id) }}'">
                                                        <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                                        </svg>
                                                        Edit
                                                    </button>
                                                @endcan
                                                @can('delete roles')
                                                    <button onclick="deleteRole({{ $role->id }})"
                                                            class="inline-flex items-center px-3 py-1.5 sm:px-4 sm:py-2 bg-red-600 hover:bg-red-700 text-white text-xs font-medium rounded-lg transition-all duration-200 hover:scale-105">
                                                        <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                        </svg>
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
                                <td colspan="4" class="px-4 py-8 sm:px-8 sm:py-16 text-center">
                                    <div class="flex flex-col items-center justify-center space-y-4">
                                        <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center">
                                            <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                            </svg>
                                        </div>
                                        <div class="text-lg font-medium text-gray-900">No roles found</div>
                                        <div class="text-sm text-gray-500">
                                            Try adjusting your search terms or <button onclick="clearSearch()" class="text-indigo-600 hover:text-indigo-500 underline">clear the search</button>.
                                        </div>
                                    </div>
                                </td>
                            </tr>

                            <!-- Empty State Row (Show when no roles at all) -->
                            @if ($roles->isEmpty())
                                <tr id="emptyStateRow">
                                    <td colspan="4" class="px-4 py-8 sm:px-8 sm:py-16 text-center">
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
                <div class="mt-4 sm:mt-6 bg-white rounded-xl sm:rounded-2xl shadow-sm border border-gray-100 px-4 py-3 sm:px-6 sm:py-4">
                    <div class="flex flex-col sm:flex-row items-center justify-between gap-3">
                        <div class="text-xs sm:text-sm text-gray-700">
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
                    searchContextElement.innerHTML = ` found for "<span class="font-medium text-indigo-600">${searchTerm}</span>"`;
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
