<x-app-layout>
    <x-slot name="header">
        <div class="theme-app" style="background: linear-gradient(to right, var(--secondary-bg), var(--primary-bg)); padding: 1.5rem 1rem; sm:padding: 3rem 2rem; border-radius: 0;">
            <div class="max-w-7xl mx-auto">
                <div class="flex flex-col sm:flex-row justify-between items-center gap-4 sm:gap-0 lg:mr-24">
                    <div class="flex items-center space-x-3 sm:space-x-4 text-center sm:text-left">
                        <div class="p-2 sm:p-3 rounded-lg sm:rounded-2xl shadow-lg" style="background-color: var(--hover-bg);">
                            <svg class="w-6 h-6 sm:w-8 sm:h-8" style="color: var(--primary-text);" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <h1 class="text-2xl sm:text-3xl font-bold leading-tight" style="color: var(--primary-text);">
                                {{ __('Salary Structures') }}
                            </h1>
                            <p class="text-sm sm:text-lg mt-1" style="color: var(--secondary-text);">
                                Manage employee compensation and benefits structure
                            </p>
                        </div>
                    </div>
                    <a href="{{ route('salary.create') }}" 
                       class="theme-app inline-flex items-center justify-center w-full sm:w-auto px-6 py-3 sm:px-8 sm:py-4 font-semibold rounded-lg sm:rounded-xl shadow-lg hover:scale-105 transform transition-all duration-300 ease-in-out focus:outline-none text-base sm:text-lg"
                       style="background-color: var(--hover-bg); color: var(--primary-text);"
                       onmouseover="this.style.backgroundColor='var(--primary-bg-light)'"
                       onmouseout="this.style.backgroundColor='var(--hover-bg)'">
                        <svg class="w-4 h-4 sm:w-5 sm:h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                        Add New Structure
                    </a>
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
                               placeholder="Search employees..." 
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
                            <span class="font-semibold" id="totalCount">{{ $structures->count() }}</span>
                            <span id="employeeText">{{ Str::plural('employee', $structures->count()) }}</span>
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
                                        <span>Employee Name</span>
                                    </div>
                                </th>
                                <th class="px-4 py-3 sm:px-8 sm:py-6 text-right text-xs sm:text-sm font-bold uppercase tracking-wider" style="color: var(--primary-text);">
                                    <div class="flex items-center justify-end space-x-1 sm:space-x-2">
                                        <svg class="w-3 h-3 sm:w-4 sm:h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        <span>Basic Salary</span>
                                    </div>
                                </th>
                                <th class="px-4 py-3 sm:px-8 sm:py-6 text-right text-xs sm:text-sm font-bold uppercase tracking-wider" style="color: var(--primary-text);">
                                    <div class="flex items-center justify-end space-x-1 sm:space-x-2">
                                        <svg class="w-3 h-3 sm:w-4 sm:h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>
                                        </svg>
                                        <span>HRA</span>
                                    </div>
                                </th>
                                <th class="px-4 py-3 sm:px-8 sm:py-6 text-right text-xs sm:text-sm font-bold uppercase tracking-wider" style="color: var(--primary-text);">
                                    <div class="flex items-center justify-end space-x-1 sm:space-x-2">
                                        <svg class="w-3 h-3 sm:w-4 sm:h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 100 4m0-4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 100 4m0-4v2m0-6V4"></path>
                                        </svg>
                                        <span>Allowances</span>
                                    </div>
                                </th>
                                <th class="px-4 py-3 sm:px-8 sm:py-6 text-center text-xs sm:text-sm font-bold uppercase tracking-wider" style="color: var(--primary-text);">
                                    <div class="flex items-center justify-center space-x-1 sm:space-x-2">
                                        <svg class="w-3 h-3 sm:w-4 sm:h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                                        </svg>
                                        <span>Deductions</span>
                                    </div>
                                </th>
                            </tr>
                        </thead>
                        <tbody id="salaryTableBody" class="bg-white divide-y divide-gray-100">
                            @if ($structures->isNotEmpty())
                                @foreach ($structures as $s)
                                    <tr class="salary-row hover:bg-gray-50 transition-all duration-200 ease-in-out" 
                                        data-employee-name="{{ strtolower($s->user->name) }}"
                                        data-employee-id="{{ $s->user->id }}">
                                        <td class="px-4 py-3 sm:px-8 sm:py-6">
                                            <div class="flex items-center space-x-2 sm:space-x-4">
                                                <div class="flex-shrink-0">
                                                    <div class="h-10 w-10 sm:h-12 sm:w-12 rounded-full flex items-center justify-center text-white font-bold text-base sm:text-lg" style="background-color: var(--hover-bg);">
                                                        {{ strtoupper(substr($s->user->name, 0, 1)) }}
                                                    </div>
                                                </div>
                                                <div>
                                                    <div class="text-sm sm:text-base font-semibold text-gray-900 employee-name">
                                                        {{ $s->user->name }}
                                                    </div>
                                                    <div class="text-xs text-gray-500 uppercase tracking-wide font-medium">Employee</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-4 py-3 sm:px-8 sm:py-6 text-right">
                                            <div class="text-sm sm:text-base font-bold text-gray-900">
                                                ₹{{ number_format($s->basic, 2) }}
                                            </div>
                                            <div class="text-xs text-gray-500">Basic Pay</div>
                                        </td>
                                        <td class="px-4 py-3 sm:px-8 sm:py-6 text-right">
                                            <div class="text-sm sm:text-base font-semibold text-gray-900">
                                                ₹{{ number_format($s->hra, 2) }}
                                            </div>
                                            <div class="text-xs text-gray-500">Housing</div>
                                        </td>
                                        <td class="px-4 py-3 sm:px-8 sm:py-6 text-right">
                                            <div class="text-sm sm:text-base font-semibold text-gray-900">
                                                ₹{{ number_format($s->allowances, 2) }}
                                            </div>
                                            <div class="text-xs text-gray-500">Benefits</div>
                                        </td>
                                        <td class="px-4 py-3 sm:px-8 sm:py-6">
                                            <div class="flex flex-wrap gap-1.5 sm:gap-2 justify-center">
                                                <span class="inline-flex items-center px-2 py-0.5 sm:px-3 sm:py-1 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                                    Tax {{ $s->tax }}%
                                                </span>
                                                <span class="inline-flex items-center px-2 py-0.5 sm:px-3 sm:py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                                    PF {{ $s->pf }}%
                                                </span>
                                                <span class="inline-flex items-center px-2 py-0.5 sm:px-3 sm:py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                                    ESI {{ $s->esi }}%
                                                </span>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                            
                            <!-- No Results Row (Hidden by default) -->
                            <tr id="noResultsRow" class="hidden">
                                <td colspan="5" class="px-4 py-8 sm:px-8 sm:py-16 text-center">
                                    <div class="flex flex-col items-center justify-center space-y-4">
                                        <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center">
                                            <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                            </svg>
                                        </div>
                                        <div class="text-lg font-medium text-gray-900">No employees found</div>
                                        <div class="text-sm text-gray-500">
                                            Try adjusting your search terms or <button onclick="clearSearch()" class="text-indigo-600 hover:text-indigo-500 underline">clear the search</button>.
                                        </div>
                                    </div>
                                </td>
                            </tr>

                            <!-- Empty State Row (Show when no structures at all) -->
                            @if ($structures->isEmpty())
                                <tr id="emptyStateRow">
                                    <td colspan="5" class="px-4 py-8 sm:px-8 sm:py-16 text-center">
                                        <div class="flex flex-col items-center justify-center space-y-4">
                                            <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center">
                                                <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                </svg>
                                            </div>
                                            <div class="text-lg font-medium text-gray-900">No salary structures found</div>
                                            <div class="text-sm text-gray-500">Get started by creating your first salary structure.</div>
                                            <a href="{{ route('salary.create') }}" 
                                               class="theme-app inline-flex items-center px-4 py-2 text-sm font-medium rounded-lg transition-all duration-200 hover:scale-105"
                                               style="background-color: var(--hover-bg); color: var(--primary-text);">
                                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                                </svg>
                                                Add Structure
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
    <x-slot name="script">
        <script type="text/javascript">
            // Store original employee data
            const originalEmployees = @json($structures->map(function($s) { return ['name' => $s->user->name, 'id' => $s->user->id]; }));
            let currentSearchTerm = '';

            // Search functionality
            document.getElementById('searchInput').addEventListener('input', function() {
                const searchTerm = this.value.toLowerCase().trim();
                currentSearchTerm = searchTerm;
                filterEmployees(searchTerm);
                updateUI(searchTerm);
            });

            // Clear search functionality
            document.getElementById('clearSearch').addEventListener('click', function() {
                clearSearch();
            });

            function filterEmployees(searchTerm) {
                const rows = document.querySelectorAll('.salary-row');
                const noResultsRow = document.getElementById('noResultsRow');
                let visibleCount = 0;

                rows.forEach((row, index) => {
                    const employeeName = row.getAttribute('data-employee-name');
                    const nameElement = row.querySelector('.employee-name');
                    const originalEmployee = originalEmployees[index] || {};

                    // Search in employee name
                    const matchesName = employeeName.includes(searchTerm);

                    if (searchTerm === '' || matchesName) {
                        row.style.display = '';
                        visibleCount++;
                        
                        // Highlight search term in employee name
                        if (searchTerm !== '' && matchesName) {
                            const highlightedName = highlightSearchTerm(originalEmployee.name || '', searchTerm);
                            nameElement.innerHTML = highlightedName;
                        } else {
                            nameElement.textContent = originalEmployee.name || '';
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
                const employeeTextElement = document.getElementById('employeeText');
                const searchContextElement = document.getElementById('searchContext');

                totalCountElement.textContent = count;
                employeeTextElement.textContent = count === 1 ? 'employee' : 'employees';
                
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
                filterEmployees('');
                updateUI('');
            }

            // Initialize on page load
            document.addEventListener('DOMContentLoaded', function() {
                updateCounter({{ $structures->count() }}, '');
            });
        </script>
    </x-slot>
</x-app-layout>
