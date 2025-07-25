<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center bg-gradient-to-r from-gray-50 to-gray-100 p-6 rounded-lg shadow-sm">
            <div class="flex items-center space-x-3">
                <div class="p-2 bg-gradient-to-r from-teal-500 to-teal-600 rounded-lg shadow-md">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                    </svg>
                </div>
                <h2 class="font-bold text-2xl text-gray-800 leading-tight">
                    {{ __('User Management') }}
                </h2>
            </div>
            <div class="flex items-center space-x-3">
                <div class="text-sm text-gray-600 bg-white px-4 py-2 rounded-lg shadow-sm border">
                    <span class="font-medium">Total Users:</span> 
                    <span class="text-teal-600 font-bold">{{ $users->total() ?? $users->count() }}</span>
                </div>
            </div>
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
                                   placeholder="Search users by name, email, or role..." 
                                   class="block w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg leading-5 bg-white placeholder-gray-500 focus:outline-none focus:placeholder-gray-400 focus:ring-2 focus:ring-teal-500 focus:border-teal-500 transition-all duration-300 ease-in-out shadow-sm">
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
                                <span class="font-semibold" id="totalCount">{{ $users->count() }}</span> 
                                <span id="userText">{{ Str::plural('user', $users->count()) }}</span>
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
                                            <span>User</span>
                                        </div>
                                    </th>
                                    <th class="px-6 py-4 text-left text-xs font-bold text-white uppercase tracking-wider">
                                        <div class="flex items-center space-x-2">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                            </svg>
                                            <span>Email</span>
                                        </div>
                                    </th>
                                    <th class="px-6 py-4 text-left text-xs font-bold text-white uppercase tracking-wider">
                                        <div class="flex items-center space-x-2">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.031 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                                            </svg>
                                            <span>Roles</span>
                                        </div>
                                    </th>
                                    <th class="px-6 py-4 text-left text-xs font-bold text-white uppercase tracking-wider">
                                        <div class="flex items-center space-x-2">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3a4 4 0 118 0v4m-4 6v6m-4-6h8"></path>
                                            </svg>
                                            <span>Joined</span>
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
                            <tbody id="usersTableBody" class="bg-white divide-y divide-gray-200">
                                @if ($users->isNotEmpty())
                                    @foreach ($users as $index => $user)
                                        <tr class="user-row hover:bg-gradient-to-r hover:from-gray-50 hover:to-gray-100 transition-all duration-300 ease-in-out transform hover:scale-[1.01]" 
                                            data-user-name="{{ strtolower($user->name) }}"
                                            data-user-email="{{ strtolower($user->email) }}"
                                            data-user-roles="{{ strtolower($user->roles->pluck('name')->implode(' ')) }}"
                                            data-user-id="{{ $user->id }}">
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center justify-center w-8 h-8 bg-gradient-to-r from-gray-100 to-gray-200 rounded-full text-sm font-semibold text-gray-700">
                                                    {{ $index + 1 }}
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div class="flex-shrink-0 h-12 w-12">
                                                        <div class="h-12 w-12 rounded-full bg-gradient-to-r from-teal-400 to-teal-600 flex items-center justify-center shadow-lg">
                                                            <span class="text-white font-semibold text-lg">
                                                                {{ strtoupper(substr($user->name, 0, 2)) }}
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="ml-4">
                                                        <div class="text-sm font-semibold text-gray-900 user-name">{{ $user->name }}</div>
                                                        <div class="text-sm text-gray-500">System User</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <svg class="w-4 h-4 text-gray-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                                    </svg>
                                                    <span class="text-sm text-gray-900 user-email">{{ $user->email }}</span>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4">
                                                <div class="max-w-xs user-roles">
                                                    @if($user->roles->isNotEmpty())
                                                        <div class="flex flex-wrap gap-1">
                                                            @foreach($user->roles->take(2) as $role)
                                                                <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-purple-100 text-purple-800 role-badge">
                                                                    {{ $role->name }}
                                                                </span>
                                                            @endforeach
                                                            @if($user->roles->count() > 2)
                                                                <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-gray-100 text-gray-600">
                                                                    +{{ $user->roles->count() - 2 }} more
                                                                </span>
                                                            @endif
                                                        </div>
                                                    @else
                                                        <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-gray-100 text-gray-500">
                                                            No roles assigned
                                                        </span>
                                                    @endif
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <svg class="w-4 h-4 text-gray-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3a4 4 0 118 0v4m-4 6v6m-4-6h8"></path>
                                                    </svg>
                                                    <span class="text-sm text-gray-900 font-medium">
                                                        {{ \Carbon\Carbon::parse($user->created_at)->format('d M, Y') }}
                                                    </span>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center space-x-3">
                                                    @can('edit users')
                                                        <a href="{{ route('users.edit', $user->id) }}"
                                                           class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-blue-500 to-blue-600 text-white text-xs font-semibold rounded-lg shadow-md hover:from-blue-600 hover:to-blue-700 hover:scale-105 transform transition-all duration-300 ease-in-out focus:outline-none focus:ring-4 focus:ring-blue-300">
                                                            <x-pencil class="w-3 h-3 mr-1"/>
                                                            Edit
                                                        </a>
                                                    @endcan
                                                    {{-- 
                                                    @can('delete users')
                                                        <a href="javascript:void(0);" onclick="deleteUser({{ $user->id }})"
                                                           class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-red-500 to-red-600 text-white text-xs font-semibold rounded-lg shadow-md hover:from-red-600 hover:to-red-700 hover:scale-105 transform transition-all duration-300 ease-in-out focus:outline-none focus:ring-4 focus:ring-red-300">
                                                            <x-trashcan class="w-3 h-3 mr-1"/>
                                                            Delete
                                                        </a>
                                                    @endcan
                                                    --}}
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                                
                                <!-- No Results Row (Hidden by default) -->
                                <tr id="noResultsRow" class="hidden">
                                    <td colspan="6" class="px-6 py-12 text-center">
                                        <div class="flex flex-col items-center justify-center space-y-4">
                                            <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center">
                                                <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                                </svg>
                                            </div>
                                            <div class="text-lg font-medium text-gray-900">No users found</div>
                                            <div class="text-sm text-gray-500">
                                                Try adjusting your search terms or <button onclick="clearSearch()" class="text-teal-600 hover:text-teal-500 underline">clear the search</button>.
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                                <!-- Empty State Row (Show when no users at all) -->
                                @if ($users->isEmpty())
                                    <tr id="emptyStateRow">
                                        <td colspan="6" class="px-6 py-12 text-center">
                                            <div class="flex flex-col items-center justify-center space-y-4">
                                                <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center">
                                                    <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                                                    </svg>
                                                </div>
                                                <div class="text-lg font-medium text-gray-900">No users found</div>
                                                <div class="text-sm text-gray-500">Users will appear here once they are registered.</div>
                                            </div>
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
                
                @if ($users->hasPages())
                    <div class="bg-gray-50 px-6 py-4 border-t border-gray-200 rounded-b-xl">
                        <div class="flex items-center justify-between">
                            <div class="text-sm text-gray-700">
                                Showing {{ $users->firstItem() }} to {{ $users->lastItem() }} of {{ $users->total() }} results
                            </div>
                            <div class="pagination-wrapper">
                                {{ $users->links() }}
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
    
    <x-slot name="script">
        <script type="text/javascript">
            // Store original users data
            const originalUsers = @json($users->items());
            let currentSearchTerm = '';

            // Search functionality
            document.getElementById('searchInput').addEventListener('input', function() {
                const searchTerm = this.value.toLowerCase().trim();
                currentSearchTerm = searchTerm;
                filterUsers(searchTerm);
                updateUI(searchTerm);
            });

            // Clear search functionality
            document.getElementById('clearSearch').addEventListener('click', function() {
                clearSearch();
            });

            function filterUsers(searchTerm) {
                const rows = document.querySelectorAll('.user-row');
                const noResultsRow = document.getElementById('noResultsRow');
                let visibleCount = 0;

                rows.forEach((row, index) => {
                    const userName = row.getAttribute('data-user-name');
                    const userEmail = row.getAttribute('data-user-email');
                    const userRoles = row.getAttribute('data-user-roles');
                    const nameElement = row.querySelector('.user-name');
                    const emailElement = row.querySelector('.user-email');
                    const roleElements = row.querySelectorAll('.role-badge');
                    const originalUser = originalUsers[index] || {};

                    // Search in user name, email, and roles
                    const matchesName = userName.includes(searchTerm);
                    const matchesEmail = userEmail.includes(searchTerm);
                    const matchesRoles = userRoles.includes(searchTerm);

                    if (searchTerm === '' || matchesName || matchesEmail || matchesRoles) {
                        row.style.display = '';
                        visibleCount++;
                        
                        // Update row number
                        const numberCell = row.querySelector('td:first-child div');
                        numberCell.textContent = visibleCount;
                        
                        // Highlight search term in user name
                        if (searchTerm !== '' && matchesName) {
                            const highlightedName = highlightSearchTerm(originalUser.name || '', searchTerm);
                            nameElement.innerHTML = highlightedName;
                        } else {
                            nameElement.textContent = originalUser.name || '';
                        }

                        // Highlight search term in email
                        if (searchTerm !== '' && matchesEmail) {
                            const highlightedEmail = highlightSearchTerm(originalUser.email || '', searchTerm);
                            emailElement.innerHTML = highlightedEmail;
                        } else {
                            emailElement.textContent = originalUser.email || '';
                        }

                        // Highlight search term in roles
                        if (searchTerm !== '' && matchesRoles) {
                            roleElements.forEach((element, roleIndex) => {
                                const originalRole = originalUser.roles?.[roleIndex]?.name || element.textContent;
                                if (originalRole.toLowerCase().includes(searchTerm)) {
                                    element.innerHTML = highlightSearchTerm(originalRole, searchTerm);
                                } else {
                                    element.textContent = originalRole;
                                }
                            });
                        } else if (searchTerm === '') {
                            // Reset role text when no search
                            roleElements.forEach((element, roleIndex) => {
                                const originalRole = originalUser.roles?.[roleIndex]?.name || element.textContent;
                                element.textContent = originalRole;
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
                if (!searchTerm) return text;
                
                const regex = new RegExp(`(${searchTerm})`, 'gi');
                return text.replace(regex, '<mark class="bg-yellow-200 px-1 rounded">$1</mark>');
            }

            function updateCounter(count, searchTerm) {
                const totalCountElement = document.getElementById('totalCount');
                const userTextElement = document.getElementById('userText');
                const searchContextElement = document.getElementById('searchContext');

                totalCountElement.textContent = count;
                userTextElement.textContent = count === 1 ? 'user' : 'users';
                
                if (searchTerm) {
                    searchContextElement.innerHTML = ` found for "<span class="font-medium text-teal-600">${searchTerm}</span>"`;
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
                filterUsers('');
                updateUI('');
            }

            // Initialize on page load
            document.addEventListener('DOMContentLoaded', function() {
                updateCounter({{ $users->count() }}, '');
            });

            // deleteUser function here (commented out as per original)
        </script>
    </x-slot>
</x-app-layout>