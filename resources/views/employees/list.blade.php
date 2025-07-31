<x-app-layout>
    <x-slot name="header">
        <div class="relative bg-gradient-to-br from-indigo-600 via-purple-600 to-blue-700 overflow-hidden">
            <div class="absolute inset-0 bg-black opacity-10"></div>
            <div class="absolute inset-0 bg-gradient-to-r from-blue-600/20 to-purple-600/20"></div>
            <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
                <div class="flex justify-between items-center">
                    <div class="flex items-center space-x-4">
                        <div class="p-3 bg-white/20 backdrop-blur-sm rounded-2xl shadow-xl border border-white/30">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <h1 class="text-3xl font-bold text-white tracking-tight">Employee Management</h1>
                            <p class="text-indigo-100 mt-1 text-lg">Manage your team members and their information</p>
                        </div>
                    </div>
                    {{-- @can('create employee')
                        <a href="{{ route('employees.create') }}" 
                           class="inline-flex items-center px-6 py-3 bg-white/20 backdrop-blur-sm text-white font-semibold rounded-2xl shadow-xl border border-white/30 hover:bg-white/30 focus:outline-none focus:ring-4 focus:ring-white/50 transition-all duration-300 transform hover:-translate-y-1 hover:shadow-2xl">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                            Add Employee
                        </a>
                    @endcan --}}
                </div>
            </div>
            <div class="absolute bottom-0 left-0 right-0 h-px bg-gradient-to-r from-transparent via-white/30 to-transparent"></div>
        </div>
    </x-slot>

    <div class="min-h-screen bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-50 py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <x-message></x-message>
            
            <div class="bg-white/80 backdrop-blur-xl rounded-3xl shadow-2xl border border-white/50 overflow-hidden">
                <!-- Enhanced Search Bar Section -->
                <div class="relative bg-gradient-to-r from-gray-50 to-blue-50 px-8 py-6 border-b border-gray-200/50">
                    <div class="flex flex-col lg:flex-row gap-6 items-center justify-between">
                        <div class="relative flex-1 max-w-2xl group">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400 group-hover:text-blue-500 transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </div>
                            <input type="text" 
                                   id="searchInput"
                                   placeholder="Search employees by name, email, or phone..." 
                                   class="block w-full pl-12 pr-4 py-4 bg-white border-2 border-gray-200 rounded-2xl text-sm placeholder-gray-500 focus:outline-none focus:ring-4 focus:ring-blue-500/20 focus:border-blue-500 shadow-sm hover:shadow-md transition-all duration-300 group-hover:border-gray-300">
                        </div>
                        
                        <div class="flex items-center space-x-4">
                            <button id="clearSearch" 
                                    class="hidden inline-flex items-center px-4 py-2 bg-gradient-to-r from-gray-500 to-gray-600 text-white text-sm font-medium rounded-xl hover:from-gray-600 hover:to-gray-700 shadow-lg transition-all duration-300 transform hover:-translate-y-0.5 hover:shadow-xl">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                                Clear
                            </button>
                            
                            <div id="resultsCounter" class="bg-white/90 backdrop-blur-sm px-4 py-3 rounded-2xl border-2 border-gray-200 shadow-sm">
                                <div class="flex items-center space-x-2">
                                    <div class="w-2 h-2 bg-emerald-400 rounded-full animate-pulse"></div>
                                    <span class="text-sm text-gray-600 font-medium">
                                        <span class="font-bold text-blue-600" id="totalCount">{{ $employees->count() }}</span> 
                                        <span id="employeeText">{{ Str::plural('employee', $employees->count()) }}</span>
                                        <span id="searchContext"></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full">
                        <thead class="bg-gradient-to-r from-gray-50 to-blue-50">
                            <tr>
                                <th class="px-8 py-4 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">#</th>
                                <th class="px-8 py-4 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">Employee</th>
                                <th class="px-8 py-4 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">Email</th>
                                <th class="px-8 py-4 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">Phone</th>
                                <th class="px-8 py-4 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">Status</th>
                                <th class="px-8 py-4 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody id="employeeTableBody" class="bg-white divide-y divide-gray-100">
                            @forelse($employees as $employee)
                                <tr class="employee-row hover:bg-gradient-to-r hover:from-blue-50/50 hover:to-indigo-50/50 transition-all duration-300 group" 
                                    data-employee-name="{{ strtolower($employee->name ?? '') }}" 
                                    data-employee-email="{{ strtolower($employee->email ?? '') }}"
                                    data-employee-phone="{{ strtolower($employee->phone ?? '') }}">
                                    <td class="px-8 py-6 whitespace-nowrap">
                                        <div class="flex items-center justify-center w-10 h-10 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-2xl text-white text-sm font-bold shadow-lg group-hover:shadow-xl transition-all duration-300 row-number">
                                            {{ $loop->iteration }}
                                        </div>
                                    </td>
                                    <td class="px-8 py-6 whitespace-nowrap">
                                        <div class="flex items-center space-x-4">
                                            <div class="relative">
                                                <div class="h-12 w-12 rounded-2xl bg-gradient-to-br from-blue-500 to-indigo-600 flex items-center justify-center shadow-lg group-hover:shadow-xl transition-all duration-300">
                                                    <span class="text-sm font-bold text-white">
                                                        {{ substr($employee->name ?? 'N', 0, 1) }}
                                                    </span>
                                                </div>
                                                <div class="absolute -bottom-1 -right-1 w-4 h-4 bg-emerald-400 rounded-full border-2 border-white shadow-sm"></div>
                                            </div>
                                            <div>
                                                <div class="text-sm font-bold text-gray-900 employee-name group-hover:text-blue-600 transition-colors duration-300">{{ $employee->name ?? '-' }}</div>
                                                <div class="text-xs text-gray-500">ID: #{{ str_pad($employee->id ?? 0, 4, '0', STR_PAD_LEFT) }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-8 py-6 whitespace-nowrap">
                                        <div class="text-sm text-gray-900 employee-email group-hover:text-blue-600 transition-colors duration-300">{{ $employee->email ?? '-' }}</div>
                                    </td>
                                    <td class="px-8 py-6 whitespace-nowrap">
                                        <div class="text-sm text-gray-500 employee-phone">{{ $employee->phone ?? '-' }}</div>
                                    </td>
                                    <td class="px-8 py-6 whitespace-nowrap">
                                        <span class="inline-flex items-center px-3 py-2 rounded-xl text-xs font-bold shadow-lg transition-all duration-300 hover:shadow-xl
                                            @if($employee->status === 'active') bg-gradient-to-r from-emerald-400 to-emerald-500 text-white
                                            @elseif($employee->status === 'inactive') bg-gradient-to-r from-amber-400 to-amber-500 text-white
                                            @else bg-gradient-to-r from-red-400 to-red-500 text-white @endif">
                                            <div class="w-2 h-2 bg-white rounded-full mr-2 animate-pulse"></div>
                                            {{ ucfirst($employee->status) ?? 'N/A' }}
                                        </span>
                                    </td>
                                    <td class="px-8 py-6 whitespace-nowrap">
                                        <a href="{{ route('employees.edit', $employee->id) }}" 
                                           class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-blue-600 to-indigo-600 text-white text-sm font-semibold rounded-xl hover:from-blue-700 hover:to-indigo-700 focus:outline-none focus:ring-4 focus:ring-blue-500/50 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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
                                            <div class="w-20 h-20 bg-gradient-to-br from-gray-200 to-gray-300 rounded-3xl flex items-center justify-center mb-4 shadow-lg">
                                                <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                                </svg>
                                            </div>
                                            <h3 class="text-lg font-bold text-gray-900 mb-2">No employees found</h3>
                                            <p class="text-gray-500">Get started by adding your first employee to the system.</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                            
                            <!-- No Results Row (Hidden by default) -->
                            <tr id="noResultsRow" style="display: none;">
                                <td colspan="6" class="px-8 py-16 text-center">
                                    <div class="flex flex-col items-center">
                                        <div class="w-20 h-20 bg-gradient-to-br from-gray-200 to-gray-300 rounded-3xl flex items-center justify-center mb-4 shadow-lg">
                                            <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                            </svg>
                                        </div>
                                        <h3 class="text-lg font-bold text-gray-900 mb-2">No employees found</h3>
                                        <p class="text-gray-500">Try adjusting your search terms or filters.</p>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                
                @if ($employees->hasPages())
                    <div class="bg-gradient-to-r from-gray-50 to-blue-50 px-8 py-4 border-t border-gray-200/50">
                        <div class="flex items-center justify-between">
                            <div class="text-sm text-gray-700 font-medium">
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
                return text.replace(regex, '<mark class="bg-yellow-300 px-1 rounded font-semibold text-yellow-900">$1</mark>');
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
                        searchContextElement.innerHTML = ` found for "<span class="font-bold text-blue-600">${searchTerm}</span>"`;
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