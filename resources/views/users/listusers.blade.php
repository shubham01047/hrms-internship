<x-app-layout>
    <x-slot name="header">
        <div class="theme-app"
            style="background: linear-gradient(to right, var(--secondary-bg), var(--primary-bg)); padding: 1.5rem 1rem; sm:padding: 3rem 2rem; border-radius: 0;">
            <div class="max-w-7xl mx-auto">
                <div class="flex flex-col sm:flex-row justify-between items-center gap-4 sm:gap-0 lg:mr-24">
                    <div class="flex items-center space-x-4">
                        <div class="p-3 rounded-2xl shadow-lg" style="background-color: var(--hover-bg);">
                            <svg class="w-8 h-8" style="color: var(--primary-text);" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z">
                                </path>
                            </svg>
                        </div>
                        <div>
                            <h1 class="text-2xl sm:text-3xl font-bold leading-tight"
                                style="color: var(--primary-text);">
                                {{ __('User Management') }}
                            </h1>
                            <p class="text-sm sm:text-lg mt-1" style="color: var(--secondary-text);">
                                Manage system users and their access permissions
                            </p>
                        </div>
                    </div>

                    @can('create users')
                        <a href="{{ route('users.create') }}"
                            class="theme-app inline-flex items-center justify-center w-full sm:w-auto px-6 py-3 sm:px-8 sm:py-4 font-semibold rounded-lg sm:rounded-xl shadow-lg hover:scale-105 transform transition-all duration-300 ease-in-out focus:outline-none text-base sm:text-lg"
                            style="background-color: var(--hover-bg); color: var(--primary-text);"
                            onmouseover="this.style.backgroundColor='var(--primary-bg-light)'"
                            onmouseout="this.style.backgroundColor='var(--hover-bg)'">
                            <svg class="w-4 h-4 sm:w-5 sm:h-5 mr-2" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                            Create User
                        </a>
                    @endcan
                </div>
            </div>
        </div>
    </x-slot>

    <div class="py-8" style="background-color: #f8fafc; min-height: 100vh;">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-message></x-message>

            <!-- Search Section -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 mb-6 p-6">
                <div class="flex flex-col sm:flex-row gap-4 items-center justify-between">
                    <div class="relative flex-1 max-w-md">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                        <input type="text" id="searchInput" placeholder="Search users by name, email, or role..."
                            class="block w-full pl-10 sm:pl-12 pr-4 py-2.5 sm:py-4 border border-gray-200 rounded-xl leading-5 bg-gray-50 placeholder-gray-500 focus:outline-none focus:placeholder-gray-400 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 focus:bg-white transition-all duration-300 ease-in-out text-sm sm:text-base">
                    </div>

                    <div class="flex items-center space-x-4">
                        <button id="clearSearch"
                            class="theme-app hidden inline-flex items-center px-4 py-2 text-xs sm:text-sm font-medium rounded-lg transition-colors duration-200"
                            style="background-color: var(--primary-border); color: var(--primary-text);"
                            onmouseover="this.style.backgroundColor='var(--hover-bg)'"
                            onmouseout="this.style.backgroundColor='var(--primary-border)'">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                            Clear
                        </button>

                        <div
                            class="flex items-center space-x-2 text-gray-600 bg-gray-100 px-3 py-2 sm:px-4 sm:py-3 rounded-xl text-xs sm:text-sm w-full sm:w-auto justify-center">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z">
                                </path>
                            </svg>
                            <span class="font-semibold" id="totalCount">{{ $users->count() }}</span>
                            <span id="userText">{{ Str::plural('user', $users->count()) }}</span>
                            <span id="searchContext"></span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Table Section - Optimized for no horizontal scrolling -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="min-w-full table-fixed">
                        <thead class="theme-app"
                            style="background: linear-gradient(to right, var(--secondary-bg), var(--primary-bg));">
                            <tr>
                                <th class="w-16 px-3 py-3 sm:px-4 sm:py-4 text-left text-xs font-bold uppercase tracking-wider"
                                    style="color: var(--primary-text);">
                                    <span>#</span>
                                </th>
                                <th class="w-1/4 px-3 py-3 sm:px-4 sm:py-4 text-left text-xs font-bold uppercase tracking-wider"
                                    style="color: var(--primary-text);">
                                    <div class="flex items-center space-x-1">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z">
                                            </path>
                                        </svg>
                                        <span>User</span>
                                    </div>
                                </th>
                                <th class="w-1/4 px-3 py-3 sm:px-4 sm:py-4 text-left text-xs font-bold uppercase tracking-wider"
                                    style="color: var(--primary-text);">
                                    <div class="flex items-center space-x-1">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                            </path>
                                        </svg>
                                        <span>Email</span>
                                    </div>
                                </th>
                                <th class="w-1/6 px-3 py-3 sm:px-4 sm:py-4 text-left text-xs font-bold uppercase tracking-wider"
                                    style="color: var(--primary-text);">
                                    <div class="flex items-center space-x-1">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.031 9-11.622 0-1.042-.133-2.052-.382-3.016z">
                                            </path>
                                        </svg>
                                        <span>Roles</span>
                                    </div>
                                </th>
                                <th class="w-1/6 px-3 py-3 sm:px-4 sm:py-4 text-left text-xs font-bold uppercase tracking-wider"
                                    style="color: var(--primary-text);">
                                    <div class="flex items-center space-x-1">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M8 7V3a4 4 0 118 0v4m-4 6v6m-4-6h8"></path>
                                        </svg>
                                        <span>Joined</span>
                                    </div>
                                </th>
                                <th class="w-24 px-3 py-3 sm:px-4 sm:py-4 text-center text-xs font-bold uppercase tracking-wider"
                                    style="color: var(--primary-text);">
                                    <span>Actions</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody id="usersTableBody" class="bg-white divide-y divide-gray-100">
                            @if ($users->isNotEmpty())
                                @foreach ($users as $index => $user)
                                    <tr class="user-row hover:bg-gray-50 transition-all duration-200 ease-in-out"
                                        data-user-name="{{ strtolower($user->name) }}"
                                        data-user-email="{{ strtolower($user->email) }}"
                                        data-user-roles="{{ strtolower($user->roles->pluck('name')->implode(' ')) }}"
                                        data-user-id="{{ $user->id }}">
                                        <td class="px-3 py-4 sm:px-4 sm:py-4 whitespace-nowrap">
                                            <div
                                                class="flex items-center justify-center w-6 h-6 sm:w-7 sm:h-7 bg-gradient-to-r from-blue-100 to-blue-200 rounded-full text-xs font-semibold text-blue-800">
                                                {{ $index + 1 }}
                                            </div>
                                        </td>
                                        <td class="px-3 py-4 sm:px-4 sm:py-4">
                                            <div class="flex items-center space-x-3">
                                                <div class="flex-shrink-0">
                                                    <div class="h-8 w-8 sm:h-10 sm:w-10 rounded-full flex items-center justify-center text-white font-bold text-sm"
                                                        style="background-color: var(--hover-bg);">
                                                        {{ strtoupper(substr($user->name, 0, 1)) }}
                                                    </div>
                                                </div>
                                                <div class="min-w-0 flex-1">
                                                    <div
                                                        class="text-sm font-semibold text-gray-900 user-name truncate">
                                                        {{ $user->name }}</div>
                                                    <div class="text-xs text-gray-500">System User</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-3 py-4 sm:px-4 sm:py-4">
                                            <div class="flex items-center">
                                                <svg class="w-3 h-3 text-gray-400 mr-2 flex-shrink-0" fill="none"
                                                    stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                                    </path>
                                                </svg>
                                                <span
                                                    class="text-xs text-gray-900 user-email truncate">{{ $user->email }}</span>
                                            </div>
                                        </td>
                                        <td class="px-3 py-4 sm:px-4 sm:py-4">
                                            <div class="user-roles">
                                                @if ($user->roles->isNotEmpty())
                                                    <div class="flex flex-wrap gap-1">
                                                        @foreach ($user->roles->take(1) as $role)
                                                            <span
                                                                class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-purple-100 text-purple-800 role-badge">
                                                                {{ $role->name }}
                                                            </span>
                                                        @endforeach
                                                        @if ($user->roles->count() > 1)
                                                            <span
                                                                class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-600">
                                                                +{{ $user->roles->count() - 1 }}
                                                            </span>
                                                        @endif
                                                    </div>
                                                @else
                                                    <span
                                                        class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-500">
                                                        None
                                                    </span>
                                                @endif
                                            </div>
                                        </td>
                                        <td class="px-3 py-4 sm:px-4 sm:py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <svg class="w-3 h-3 text-gray-400 mr-2" fill="none"
                                                    stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M8 7V3a4 4 0 118 0v4m-4 6v6m-4-6h8"></path>
                                                </svg>
                                                <span class="text-xs text-gray-900 font-medium">
                                                    {{ \Carbon\Carbon::parse($user->created_at)->format('M d') }}
                                                </span>
                                            </div>
                                        </td>
                                        <td class="px-3 py-4 sm:px-4 sm:py-4 whitespace-nowrap">
                                            <div class="flex flex-col space-y-1">
                                                @can('edit users')
                                                    <a href="{{ route('users.edit', $user->id) }}"
                                                        class="theme-app inline-flex items-center justify-center px-2 py-1 text-xs font-medium rounded transition-all duration-200 hover:scale-105"
                                                        style="background-color: var(--hover-bg); color: var(--primary-text);"
                                                        onmouseover="this.style.backgroundColor='var(--primary-bg-light)'"
                                                        onmouseout="this.style.backgroundColor='var(--hover-bg)'">
                                                        <x-pencil class="w-3 h-3 mr-1" />
                                                        Edit
                                                    </a>
                                                @endcan
                                                {{-- @can('delete users') --}}
                                                <button type="button" onclick="deleteUser({{ $user->id }}, '{{ $user->name }}')"
                                                    class="inline-flex items-center justify-center px-2 py-1 bg-red-600 hover:bg-red-700 text-white text-xs font-medium rounded hover:scale-105 transform transition-all duration-200 ease-in-out focus:outline-none">
                                                    <x-trashcan class="w-3 h-3 mr-1" />
                                                    Delete
                                                </button>
                                                {{-- @endcan --}}
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif

                            <!-- No Results Row (Hidden by default) -->
                            <tr id="noResultsRow" class="hidden">
                                <td colspan="6" class="px-4 py-8 sm:px-8 sm:py-16 text-center">
                                    <div class="flex flex-col items-center justify-center space-y-4">
                                        <div
                                            class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center">
                                            <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                            </svg>
                                        </div>
                                        <div class="text-lg font-medium text-gray-900">No users found</div>
                                        <div class="text-sm text-gray-500">
                                            Try adjusting your search terms or <button onclick="clearSearch()"
                                                class="text-indigo-600 hover:text-indigo-500 underline">clear the
                                                search</button>.
                                        </div>
                                    </div>
                                </td>
                            </tr>

                            <!-- Empty State Row (Show when no users at all) -->
                            @if ($users->isEmpty())
                                <tr id="emptyStateRow">
                                    <td colspan="6" class="px-4 py-8 sm:px-8 sm:py-16 text-center">
                                        <div class="flex flex-col items-center justify-center space-y-4">
                                            <div
                                                class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center">
                                                <svg class="w-8 h-8 text-gray-400" fill="none"
                                                    stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z">
                                                    </path>
                                </svg>
                                            </div>
                                            <div class="text-lg font-medium text-gray-900">No users found</div>
                                            <div class="text-sm text-gray-500">Users will appear here once they are
                                                registered.</div>
                                        </div>
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>

                @if ($users->hasPages())
                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:py-4 border-t border-gray-200">
                        <div class="flex flex-col sm:flex-row items-center justify-between gap-3">
                            <div class="text-xs sm:text-sm text-gray-700 font-medium">
                                Showing {{ $users->firstItem() }} to {{ $users->lastItem() }} of
                                {{ $users->total() }} results
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

    <!-- Delete Confirmation Modal -->
    <div id="deleteConfirmationModal" class="fixed inset-0 z-50 hidden" aria-labelledby="delete-modal-title" role="dialog" aria-modal="true">
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
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                        </div>
                        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                            <h3 class="text-lg leading-6 font-medium text-gray-900" id="delete-modal-title">
                                Delete User
                            </h3>
                            <div class="mt-2">
                                <p class="text-sm text-gray-500">
                                    Are you sure you want to delete the user "<span id="userNameToDelete" class="font-semibold text-gray-900"></span>"? This action cannot be undone and will permanently remove the user from the system.
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
                                            <strong>Warning:</strong> This will permanently remove the user and all their data. This action cannot be reversed.
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
                            Yes, Delete User
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
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script type="text/javascript">
            // Store original users data
            const originalUsers = @json($users->items());
            let currentSearchTerm = '';
            let userIdToDelete = null;

            // deleteUser function with custom modal
            function deleteUser(id, userName) {
                console.log("Calling delete for ID:", id);
                userIdToDelete = id;
                
                // Set the user name in the modal
                document.getElementById('userNameToDelete').textContent = userName;
                
                // Show the modal
                $('#deleteConfirmationModal').removeClass('hidden');
                $('body').addClass('overflow-hidden');
                
                // Add fade-in animation
                $('#deleteConfirmationModal').hide().fadeIn(300);
            }

            $(document).ready(function() {
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
                    if (userIdToDelete) {
                        // Add loading state
                        $(this).prop('disabled', true).html(`
                            <svg class="animate-spin -ml-1 mr-3 h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                            Deleting...
                        `);
                        
                        // Perform the AJAX delete request
                        $.ajax({
                            url: '{{ route('users.destroy') }}',
                            type: 'DELETE',
                            data: {
                                id: userIdToDelete
                            },
                            dataType: 'json',
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            success: function(response) {
                                // Remove the row from DOM
                                const row = document.querySelector(`[data-user-id="${userIdToDelete}"]`);
                                if (row) {
                                    row.remove();
                                    // Re-filter to update numbering and counter
                                    filterUsers(currentSearchTerm);
                                }
                                closeDeleteModal();
                            },
                            error: function(xhr, status, error) {
                                alert('Error deleting user: ' + error);
                                // Reset button state
                                $('#confirmDeleteBtn').prop('disabled', false).html(`
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                    </svg>
                                    Yes, Delete User
                                `);
                                closeDeleteModal();
                            }
                        });
                    }
                });
                
                function closeDeleteModal() {
                    $('#deleteConfirmationModal').fadeOut(300, function() {
                        $(this).addClass('hidden');
                        $('body').removeClass('overflow-hidden');
                        userIdToDelete = null;
                    });
                }

                // Initialize on page load
                updateCounter({{ $users->count() }}, '');
            });

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
                                const originalRole = originalUser.roles?.[roleIndex]?.name || element
                                    .textContent;
                                if (originalRole.toLowerCase().includes(searchTerm)) {
                                    element.innerHTML = highlightSearchTerm(originalRole, searchTerm);
                                } else {
                                    element.textContent = originalRole;
                                }
                            });
                        } else if (searchTerm === '') {
                            // Reset role text when no search
                            roleElements.forEach((element, roleIndex) => {
                                const originalRole = originalUser.roles?.[roleIndex]?.name || element
                                    .textContent;
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
                    searchContextElement.innerHTML =
                        ` found for "<span class="font-medium text-indigo-600">${searchTerm}</span>"`;
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
            
            /* Prevent body scroll when modal is open */
            body.overflow-hidden {
                overflow: hidden;
            }
        </style>
    </x-slot>
</x-app-layout>
