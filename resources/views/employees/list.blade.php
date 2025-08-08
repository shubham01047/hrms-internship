<x-app-layout>
    <x-slot name="header">
        <div class="theme-app" style="background: linear-gradient(to right, var(--secondary-bg), var(--primary-bg)); padding: 1.5rem 1rem; sm:padding: 3rem 2rem; border-radius: 0;">
            <div class="max-w-7xl mx-auto">
                <div class="flex flex-col sm:flex-row justify-between items-center gap-4 sm:gap-0 lg:mr-24">
                    <div class="flex items-center space-x-4">
                        <div class="p-2 sm:p-3 rounded-lg sm:rounded-2xl shadow-lg" style="background-color: var(--hover-bg);">
                            <svg class="w-6 h-6 sm:w-8 sm:h-8" style="color: var(--primary-text);" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <h1 class="text-2xl sm:text-3xl font-bold leading-tight" style="color: var(--primary-text);">
                                Employee Management
                            </h1>
                            <p class="text-sm sm:text-lg mt-1" style="color: var(--secondary-text);">
                                Manage your team members and their information
                            </p>
                        </div>
                    </div>
                    {{-- @can('create employee')
                        <a href="{{ route('employees.create') }}" 
                           class="inline-flex items-center justify-center w-full sm:w-auto px-6 py-3 sm:px-8 sm:py-4 font-semibold rounded-lg sm:rounded-xl shadow-lg hover:scale-105 transform transition-all duration-300 ease-in-out focus:outline-none text-base sm:text-lg"
                           style="background-color: var(--hover-bg); color: var(--primary-text);"
                           onmouseover="this.style.backgroundColor='var(--primary-bg-light)'"
                           onmouseout="this.style.backgroundColor='var(--hover-bg)'">
                            <svg class="w-4 h-4 sm:w-5 sm:h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                            Add Employee
                        </a>
                    @endcan --}}
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
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                        <input type="text" 
                               id="searchInput"
                               placeholder="Search employees by name, email, or phone..." 
                               class="block w-full pl-10 sm:pl-12 pr-4 py-2.5 sm:py-4 border border-gray-200 rounded-lg sm:rounded-xl leading-5 bg-gray-50 placeholder-gray-500 focus:outline-none focus:placeholder-gray-400 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 focus:bg-white transition-all duration-300 ease-in-out text-sm sm:text-base">
                    </div>
                    
                    <div class="flex items-center space-x-4">
                        <button id="clearSearch" 
                                class="theme-app hidden inline-flex items-center px-4 py-2 text-sm font-medium rounded-lg transition-colors duration-200"
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
                            <span class="font-semibold" id="totalCount">{{ $employees->count() }}</span>
                            <span id="employeeText">{{ Str::plural('employee', $employees->count()) }}</span>
                            <span id="searchContext"></span>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Table Section -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="min-w-full">
                        <thead class="theme-app" style="background: linear-gradient(to right, var(--secondary-bg), var(--primary-bg));">
                            <tr>
                                <th class="px-4 py-3 sm:px-8 sm:py-6 text-left text-xs sm:text-sm font-bold uppercase tracking-wider" style="color: var(--primary-text);">
                                    <div class="flex items-center space-x-2">
                                        <span>#</span>
                                    </div>
                                </th>
                                <th class="px-4 py-3 sm:px-8 sm:py-6 text-left text-xs sm:text-sm font-bold uppercase tracking-wider" style="color: var(--primary-text);">
                                    <div class="flex items-center space-x-2">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                        </svg>
                                        <span>Employee</span>
                                    </div>
                                </th>
                                <th class="px-4 py-3 sm:px-8 sm:py-6 text-left text-xs sm:text-sm font-bold uppercase tracking-wider" style="color: var(--primary-text);">
                                    <div class="flex items-center space-x-2">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path>
                                        </svg>
                                        <span>Email</span>
                                    </div>
                                </th>
                                <th class="px-4 py-3 sm:px-8 sm:py-6 text-left text-xs sm:text-sm font-bold uppercase tracking-wider" style="color: var(--primary-text);">
                                    <div class="flex items-center space-x-2">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                        </svg>
                                        <span>Phone</span>
                                    </div>
                                </th>
                                <th class="px-4 py-3 sm:px-8 sm:py-6 text-left text-xs sm:text-sm font-bold uppercase tracking-wider" style="color: var(--primary-text);">
                                    <div class="flex items-center space-x-2">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        <span>Status</span>
                                    </div>
                                </th>
                                <th class="px-4 py-3 sm:px-8 sm:py-6 text-left text-xs sm:text-sm font-bold uppercase tracking-wider" style="color: var(--primary-text);">
                                    <span>Actions</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody id="employeeTableBody" class="bg-white divide-y divide-gray-100">
                            @forelse($employees as $employee)
                                <tr class="employee-row hover:bg-gray-50 transition-all duration-200 ease-in-out" 
                                    data-employee-name="{{ strtolower($employee->name ?? '') }}" 
                                    data-employee-email="{{ strtolower($employee->email ?? '') }}"
                                    data-employee-phone="{{ strtolower($employee->phone ?? '') }}">
                                    <td class="px-4 py-3 sm:px-8 sm:py-6 whitespace-nowrap">
                                        <div class="flex items-center justify-center w-7 h-7 sm:w-8 sm:h-8 bg-gradient-to-r from-blue-100 to-blue-200 rounded-full text-xs sm:text-sm font-semibold text-blue-800 row-number">
                                            {{ $loop->iteration }}
                                        </div>
                                    </td>
                                    <td class="px-4 py-3 sm:px-8 sm:py-6 whitespace-nowrap">
                                        <div class="flex items-center space-x-4">
                                            <div class="flex-shrink-0">
                                                <div class="h-10 w-10 sm:h-12 sm:w-12 rounded-full flex items-center justify-center text-white font-bold text-base sm:text-lg" style="background-color: var(--hover-bg);">
                                                    {{ strtoupper(substr($employee->name ?? 'N', 0, 1)) }}
                                                </div>
                                            </div>
                                            <div>
                                                <div class="text-sm sm:text-base font-semibold text-gray-900 employee-name">
                                                    {{ $employee->name ?? '-' }}
                                                </div>
                                                <div class="text-xs text-gray-500">ID: #{{ str_pad($employee->id ?? 0, 4, '0', STR_PAD_LEFT) }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-4 py-3 sm:px-8 sm:py-6 whitespace-nowrap">
                                        <div class="text-xs sm:text-sm text-gray-900 employee-email">{{ $employee->email ?? '-' }}</div>
                                    </td>
                                    <td class="px-4 py-3 sm:px-8 sm:py-6 whitespace-nowrap">
                                        <div class="text-xs sm:text-sm text-gray-500 employee-phone">{{ $employee->phone ?? '-' }}</div>
                                    </td>
                                    <td class="px-4 py-3 sm:px-8 sm:py-6 whitespace-nowrap">
                                        <span class="inline-flex items-center px-2 py-0.5 sm:px-3 sm:py-1 rounded-full text-xs font-medium
                                            @if($employee->status === 'active') bg-green-100 text-green-800
                                            @elseif($employee->status === 'inactive') bg-yellow-100 text-yellow-800
                                            @else bg-red-100 text-red-800 @endif">
                                            {{ ucfirst($employee->status) ?? 'N/A' }}
                                        </span>
                                    </td>
                                    <td class="px-4 py-3 sm:px-8 sm:py-6 whitespace-nowrap">
                                        <a href="{{ route('employees.edit', $employee->id) }}" 
                                           class="theme-app inline-flex items-center px-3 py-1.5 sm:px-4 sm:py-2 text-xs font-medium rounded-lg transition-all duration-200 hover:scale-105"
                                           style="background-color: var(--hover-bg); color: var(--primary-text);"
                                           onmouseover="this.style.backgroundColor='var(--primary-bg-light)'"
                                           onmouseout="this.style.backgroundColor='var(--hover-bg)'">
                                            <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                            </svg>
                                            Edit
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr id="noEmployeesRow">
                                    <td colspan="6" class="px-8 py-16 text-center">
                                        <div class="flex flex-col items-center">
                                            <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mb-4">
                                                <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                                </svg>
                                            </div>
                                            <h3 class="text-lg font-medium text-gray-900 mb-2">No employees found</h3>
                                            <p class="text-sm text-gray-500">Get started by adding your first employee to the system.</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                            
                            <!-- No Results Row (Hidden by default) -->
                            <tr id="noResultsRow" style="display: none;">
                                <td colspan="6" class="px-8 py-16 text-center">
                                    <div class="flex flex-col items-center">
                                        <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mb-4">
                                            <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                            </svg>
                                        </div>
                                        <h3 class="text-lg font-medium text-gray-900 mb-2">No employees found</h3>
                                        <p class="text-sm text-gray-500">Try adjusting your search terms or filters.</p>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                
                @if ($employees->hasPages())
                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:py-4 border-t border-gray-200">
                        <div class="flex flex-col sm:flex-row items-center justify-between gap-3">
                            <div class="text-xs sm:text-sm text-gray-700 font-medium">
                                Showing {{ $employees->firstItem() }} to {{ $employees->lastItem() }} of {{ $employees->total() }} results
                            </div>
                            <div class="pagination-wrapper">
                                {{ $employees->links() }}
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
    
    <x-slot name="script">
        <script type="text/javascript">
            let currentSearchTerm = '';
            const originalEmployees = @json($employees->items());

            document.addEventListener('DOMContentLoaded', function() {
                updateCounter({{ $employees->count() }}, '');

                document.getElementById('searchInput').addEventListener('input', function() {
                    const searchTerm = this.value.toLowerCase().trim();
                    currentSearchTerm = searchTerm;
                    filterEmployees(searchTerm);
                    updateUI(searchTerm);
                });

                document.getElementById('clearSearch').addEventListener('click', function() {
                    clearSearch();
                });
            });

            function filterEmployees(searchTerm) {
                const rows = document.querySelectorAll('.employee-row');
                const noResultsRow = document.getElementById('noResultsRow');
                const noEmployeesRow = document.getElementById('noEmployeesRow');
                let visibleCount = 0;

                if (noEmployeesRow) {
                    noEmployeesRow.style.display = 'none';
                }

                rows.forEach((row, index) => {
                    const employeeName = row.getAttribute('data-employee-name') || '';
                    const employeeEmail = row.getAttribute('data-employee-email') || '';
                    const employeePhone = row.getAttribute('data-employee-phone') || '';
                    
                    const nameElement = row.querySelector('.employee-name');
                    const emailElement = row.querySelector('.employee-email');
                    const phoneElement = row.querySelector('.employee-phone');
                    const rowNumberElement = row.querySelector('.row-number');
                    
                    const originalEmployee = originalEmployees[index] || {};

                    const matchesName = employeeName.includes(searchTerm);
                    const matchesEmail = employeeEmail.includes(searchTerm);
                    const matchesPhone = employeePhone.includes(searchTerm);

                    if (searchTerm === '' || matchesName || matchesEmail || matchesPhone) {
                        row.style.display = '';
                        visibleCount++;
                        
                        if (rowNumberElement) {
                            rowNumberElement.textContent = visibleCount;
                        }
                        
                        if (nameElement) {
                            if (searchTerm !== '' && matchesName) {
                                const highlightedName = highlightSearchTerm(originalEmployee.name || '', searchTerm);
                                nameElement.innerHTML = highlightedName;
                            } else {
                                nameElement.textContent = originalEmployee.name || '-';
                            }
                        }

                        if (emailElement) {
                            if (searchTerm !== '' && matchesEmail) {
                                const highlightedEmail = highlightSearchTerm(originalEmployee.email || '', searchTerm);
                                emailElement.innerHTML = highlightedEmail;
                            } else {
                                emailElement.textContent = originalEmployee.email || '-';
                            }
                        }

                        if (phoneElement) {
                            if (searchTerm !== '' && matchesPhone) {
                                const highlightedPhone = highlightSearchTerm(originalEmployee.phone || '', searchTerm);
                                phoneElement.innerHTML = highlightedPhone;
                            } else {
                                phoneElement.textContent = originalEmployee.phone || '-';
                            }
                        }
                    } else {
                        row.style.display = 'none';
                    }
                });

                if (visibleCount === 0 && searchTerm !== '') {
                    if (noResultsRow) {
                        noResultsRow.style.display = '';
                    }
                } else {
                    if (noResultsRow) {
                        noResultsRow.style.display = 'none';
                    }
                }

                if (searchTerm === '' && originalEmployees.length === 0 && noEmployeesRow) {
                    noEmployeesRow.style.display = '';
                }

                updateCounter(visibleCount, searchTerm);
            }

            function highlightSearchTerm(text, searchTerm) {
                if (!searchTerm || !text) return text;
                
                const regex = new RegExp(`(${escapeRegExp(searchTerm)})`, 'gi');
                return text.replace(regex, '<mark class="bg-yellow-200 px-1 rounded">$1</mark>');
            }

            function escapeRegExp(string) {
                return string.replace(/[.*+?^${}()|[\]\\]/g, '\\$&');
            }

            function updateCounter(count, searchTerm) {
                const totalCountElement = document.getElementById('totalCount');
                const employeeTextElement = document.getElementById('employeeText');
                const searchContextElement = document.getElementById('searchContext');

                if (totalCountElement) {
                    totalCountElement.textContent = count;
                }
                
                if (employeeTextElement) {
                    employeeTextElement.textContent = count === 1 ? 'employee' : 'employees';
                }
                
                if (searchContextElement) {
                    if (searchTerm) {
                        searchContextElement.innerHTML = ` found for "<span class="font-medium text-indigo-600">${searchTerm}</span>"`;
                    } else {
                        searchContextElement.textContent = '';
                    }
                }
            }

            function updateUI(searchTerm) {
                const clearButton = document.getElementById('clearSearch');
                
                if (clearButton) {
                    if (searchTerm) {
                        clearButton.classList.remove('hidden');
                        clearButton.classList.add('inline-flex');
                    } else {
                        clearButton.classList.add('hidden');
                        clearButton.classList.remove('inline-flex');
                    }
                }
            }

            function clearSearch() {
                const searchInput = document.getElementById('searchInput');
                if (searchInput) {
                    searchInput.value = '';
                }
                currentSearchTerm = '';
                filterEmployees('');
                updateUI('');
            }
        </script>
    </x-slot>
</x-app-layout>
