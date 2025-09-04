<x-app-layout>
    <x-slot name="header">
        <div class="theme-app flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between p-4 sm:p-6 rounded-lg shadow-sm"
            style="background: linear-gradient(to right, var(--secondary-bg), var(--primary-bg));">
            <div class="flex items-center space-x-3">
                <div class="p-2 rounded-lg shadow-md" style="background-color: var(--hover-bg);">
                    <svg class="w-6 h-6" style="color: var(--primary-text);" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                </div>
                <div class="min-w-0">
                    <h2 class="font-bold text-xl sm:text-2xl leading-tight truncate"
                        style="color: var(--primary-text);">
                        Create New Project
                    </h2>
                    <p class="text-xs sm:text-sm" style="color: var(--secondary-text);">Fill in the details to create a
                        new project</p>
                </div>
            </div>
            <a href="{{ route('projects.index') }}"
                class="inline-flex items-center justify-center w-full sm:w-auto px-5 sm:px-6 py-2.5 sm:py-3 font-semibold rounded-lg shadow-lg hover:scale-105 transform transition-all duration-300 ease-in-out focus:outline-none focus:ring-4 lg:mr-24"
                style="background-color: var(--hover-bg); color: var(--primary-text);"
                onmouseover="this.style.backgroundColor='var(--primary-bg-light)'"
                onmouseout="this.style.backgroundColor='var(--hover-bg)'" aria-label="Back to Projects">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Back to Projects
            </a>
        </div>
    </x-slot>

    <div class="py-6 sm:py-8 bg-gradient-to-br from-gray-50 to-blue-50 min-h-screen">
        <div class="w-full px-3 sm:px-6 lg:px-8">
            <div class="bg-white rounded-xl shadow-xl overflow-hidden border border-gray-200">
                <div class="theme-app px-4 sm:px-6 py-4 border-b border-gray-200"
                    style="background: linear-gradient(to right, var(--secondary-bg), var(--primary-bg));">
                    <div class="flex items-center space-x-3">
                        <div class="p-2 rounded-lg shadow-sm" style="background-color: var(--hover-bg);">
                            <svg class="w-5 h-5" style="color: var(--primary-text);" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                </path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold" style="color: var(--primary-text);">Project Details</h3>
                            <p class="text-sm" style="color: var(--secondary-text);">Fill in the details to create a new
                                project</p>
                        </div>
                    </div>
                </div>

                <div class="p-4 sm:p-6">
                    <!-- Added comprehensive form validation with JavaScript -->
                    <form method="POST" action="{{ route('projects.store') }}" class="space-y-6" id="projectForm"
                        novalidate>
                        @csrf

                        <!-- Enhanced title field with validation -->
                        <div class="space-y-2">
                            <label for="title" class="block text-sm font-semibold text-gray-700 mb-2">
                                <div class="flex items-center space-x-2">
                                    <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                        </path>
                                    </svg>
                                    <span>Project Title</span>
                                    <span class="text-red-500">*</span>
                                </div>
                            </label>
                            <input type="text" name="title" id="title" required minlength="2" maxlength="200"
                                placeholder="Enter project title..."
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-4 focus:ring-blue-200 focus:border-blue-500 transition-all duration-300 ease-in-out hover:border-gray-400 bg-gray-50 focus:bg-white">
                            <div id="titleError"
                                class="hidden flex items-center space-x-2 mt-2 p-3 bg-red-50 border border-red-200 rounded-lg">
                                <svg class="w-4 h-4 text-red-500" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span class="text-sm text-red-600 font-medium" id="titleErrorText"></span>
                            </div>
                            @error('title')
                                <div
                                    class="flex items-center space-x-2 mt-2 p-3 bg-red-50 border border-red-200 rounded-lg">
                                    <svg class="w-4 h-4 text-red-500" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <span class="text-sm text-red-600 font-medium">{{ $message }}</span>
                                </div>
                            @enderror
                        </div>

                        <!-- Enhanced client name field with validation -->
                        <div class="space-y-2">
                            <label for="client_name" class="block text-sm font-semibold text-gray-700 mb-2">
                                <div class="flex items-center space-x-2">
                                    <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z">
                                        </path>
                                    </svg>
                                    <span>Client Name</span>
                                </div>
                            </label>
                            <input type="text" name="client_name" id="client_name" maxlength="100"
                                placeholder="Enter client name..."
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-4 focus:ring-blue-200 focus:border-blue-500 transition-all duration-300 ease-in-out hover:border-gray-400 bg-gray-50 focus:bg-white">
                            <div id="clientNameError"
                                class="hidden flex items-center space-x-2 mt-2 p-3 bg-red-50 border border-red-200 rounded-lg">
                                <svg class="w-4 h-4 text-red-500" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span class="text-sm text-red-600 font-medium" id="clientNameErrorText"></span>
                            </div>
                        </div>

                        <!-- Enhanced budget field with validation -->
                        <div class="space-y-2">
                            <label for="budget" class="block text-sm font-semibold text-gray-700 mb-2">
                                <div class="flex items-center space-x-2">
                                    <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1">
                                        </path>
                                    </svg>
                                    <span>Budget</span>
                                </div>
                            </label>
                            <input type="number" name="budget" id="budget" step="0.01" min="0"
                                max="999999999.99" placeholder="Enter project budget..."
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-4 focus:ring-blue-200 focus:border-blue-500 transition-all duration-300 ease-in-out hover:border-gray-400 bg-gray-50 focus:bg-white">
                            <div id="budgetError"
                                class="hidden flex items-center space-x-2 mt-2 p-3 bg-red-50 border border-red-200 rounded-lg">
                                <svg class="w-4 h-4 text-red-500" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span class="text-sm text-red-600 font-medium" id="budgetErrorText"></span>
                            </div>
                        </div>

                        <!-- Enhanced deadline field with validation -->
                        <div class="space-y-2">
                            <label for="deadline" class="block text-sm font-semibold text-gray-700 mb-2">
                                <div class="flex items-center space-x-2">
                                    <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                    <span>Deadline</span>
                                </div>
                            </label>
                            <input type="date" name="deadline" id="deadline"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-4 focus:ring-blue-200 focus:border-blue-500 transition-all duration-300 ease-in-out hover:border-gray-400 bg-gray-50 focus:bg-white">
                            <div id="deadlineError"
                                class="hidden flex items-center space-x-2 mt-2 p-3 bg-red-50 border border-red-200 rounded-lg">
                                <svg class="w-4 h-4 text-red-500" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span class="text-sm text-red-600 font-medium" id="deadlineErrorText"></span>
                            </div>
                        </div>
                        <label for="status" class="block text-sm font-semibold text-gray-700 mb-2">
                            <div class="flex items-center space-x-2">
                                <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span>Status</span>
                                <span class="text-red-500">*</span>
                            </div>
                        </label>
                        <select name="status" id="status" required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-4 focus:ring-blue-200 focus:border-blue-500 transition-all duration-300 ease-in-out hover:border-gray-400 bg-gray-50 focus:bg-white">
                            <option value="">---Select Project Status---</option>
                            <option value="To-Do">To-Do</option>
                            <option value="In Progress">In Progress</option>
                            <option value="On Hold">On Hold</option>
                            <option value="Done">Done</option>
                        </select>
                        <!-- Enhanced description field with character counter -->
                        <div class="space-y-2">
                            <label for="description" class="block text-sm font-semibold text-gray-700 mb-2">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center space-x-2">
                                        <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M4 6h16M4 12h16M4 18h7"></path>
                                        </svg>
                                        <span>Description</span>
                                    </div>
                                    <span class="text-xs text-gray-500" id="descriptionCounter">0/1000</span>
                                </div>
                            </label>
                            <textarea name="description" id="description" rows="5" maxlength="1000"
                                placeholder="Enter project description..."
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-4 focus:ring-blue-200 focus:border-blue-500 transition-all duration-300 ease-in-out hover:border-gray-400 bg-gray-50 focus:bg-white resize-none"></textarea>
                            <div id="descriptionError"
                                class="hidden flex items-center space-x-2 mt-2 p-3 bg-red-50 border border-red-200 rounded-lg">
                                <svg class="w-4 h-4 text-red-500" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span class="text-sm text-red-600 font-medium" id="descriptionErrorText"></span>
                            </div>
                        </div>

                        <div class="space-y-2">
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                <div class="flex items-center space-x-2">
                                    <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                                        </path>
                                    </svg>
                                    <span>Assign Employees</span>
                                </div>
                            </label>
                            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 mt-4">
                                @foreach ($users as $user)
                                    <label for="member-{{ $user->id }}"
                                        class="flex items-center p-3 bg-gray-50 border border-gray-200 rounded-lg cursor-pointer hover:bg-gray-100 hover:border-gray-300 transition-all duration-200">
                                        <input type="checkbox" name="members[]" value="{{ $user->id }}"
                                            id="member-{{ $user->id }}"
                                            class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                                        <span class="ml-3 text-sm font-medium text-gray-900">{{ $user->name }}</span>
                                    </label>
                                @endforeach
                            </div>
                        </div>

                        <div
                            class="flex flex-col sm:flex-row items-stretch sm:items-center justify-end gap-2 sm:gap-4 pt-6 border-t border-gray-200">
                            <a href="{{ route('projects.index') }}"
                                class="inline-flex items-center justify-center w-full sm:w-auto px-6 py-3 border border-gray-300 text-gray-700 bg-white font-semibold rounded-lg shadow-sm hover:bg-gray-50 hover:scale-105 transform transition-all duration-300 ease-in-out focus:outline-none focus:ring-4 focus:ring-gray-300">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                                Cancel
                            </a>
                            <button type="submit"
                                class="theme-app inline-flex items-center justify-center w-full sm:w-auto px-8 py-3 font-semibold rounded-lg shadow-lg hover:scale-105 transform transition-all duration-300 ease-in-out focus:outline-none focus:ring-4"
                                style="background-color: var(--hover-bg); color: var(--primary-text);"
                                onmouseover="this.style.backgroundColor='var(--primary-bg-light)'"
                                onmouseout="this.style.backgroundColor='var(--hover-bg)'">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                                Create Project
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Added comprehensive JavaScript validation -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('projectForm');
            const titleInput = document.getElementById('title');
            const clientNameInput = document.getElementById('client_name');
            const budgetInput = document.getElementById('budget');
            const deadlineInput = document.getElementById('deadline');
            const descriptionInput = document.getElementById('description');
            const descriptionCounter = document.getElementById('descriptionCounter');

            // Set minimum date for deadline (today)
            const today = new Date().toISOString().split('T')[0];
            deadlineInput.setAttribute('min', today);

            // Set maximum date for deadline (5 years from now)
            const maxDate = new Date();
            maxDate.setFullYear(maxDate.getFullYear() + 5);
            deadlineInput.setAttribute('max', maxDate.toISOString().split('T')[0]);

            // Real-time validation functions
            function validateTitle() {
                const value = titleInput.value.trim();
                const titleError = document.getElementById('titleError');
                const titleErrorText = document.getElementById('titleErrorText');

                if (value.length === 0) {
                    showError(titleInput, titleError, titleErrorText, 'Project title is required');
                    return false;
                } else if (value.length < 2) {
                    showError(titleInput, titleError, titleErrorText,
                    'Project title must be at least 2 characters');
                    return false;
                } else if (value.length > 200) {
                    showError(titleInput, titleError, titleErrorText, 'Project title cannot exceed 200 characters');
                    return false;
                } else if (!/^[a-zA-Z0-9\s\-_.,!?()&]+$/.test(value)) {
                    showError(titleInput, titleError, titleErrorText, 'Project title contains invalid characters');
                    return false;
                } else {
                    hideError(titleInput, titleError);
                    return true;
                }
            }

            function validateClientName() {
                const value = clientNameInput.value.trim();
                const clientNameError = document.getElementById('clientNameError');
                const clientNameErrorText = document.getElementById('clientNameErrorText');

                if (value.length > 0) {
                    if (value.length > 100) {
                        showError(clientNameInput, clientNameError, clientNameErrorText,
                            'Client name cannot exceed 100 characters');
                        return false;
                    } else if (!/^[a-zA-Z0-9\s\-_.,&]+$/.test(value)) {
                        showError(clientNameInput, clientNameError, clientNameErrorText,
                            'Client name contains invalid characters');
                        return false;
                    }
                }
                hideError(clientNameInput, clientNameError);
                return true;
            }

            function validateBudget() {
                const value = budgetInput.value.trim();
                const budgetError = document.getElementById('budgetError');
                const budgetErrorText = document.getElementById('budgetErrorText');

                if (value.length > 0) {
                    const numValue = parseFloat(value);
                    if (isNaN(numValue)) {
                        showError(budgetInput, budgetError, budgetErrorText, 'Please enter a valid budget amount');
                        return false;
                    } else if (numValue < 0) {
                        showError(budgetInput, budgetError, budgetErrorText, 'Budget cannot be negative');
                        return false;
                    } else if (numValue > 999999999.99) {
                        showError(budgetInput, budgetError, budgetErrorText, 'Budget amount is too large');
                        return false;
                    }
                }
                hideError(budgetInput, budgetError);
                return true;
            }

            function validateDeadline() {
                const value = deadlineInput.value;
                const deadlineError = document.getElementById('deadlineError');
                const deadlineErrorText = document.getElementById('deadlineErrorText');

                if (value) {
                    const selectedDate = new Date(value);
                    const today = new Date();
                    today.setHours(0, 0, 0, 0);

                    if (selectedDate < today) {
                        showError(deadlineInput, deadlineError, deadlineErrorText,
                        'Deadline cannot be in the past');
                        return false;
                    }

                    const maxDate = new Date();
                    maxDate.setFullYear(maxDate.getFullYear() + 5);
                    if (selectedDate > maxDate) {
                        showError(deadlineInput, deadlineError, deadlineErrorText,
                            'Deadline cannot be more than 5 years in the future');
                        return false;
                    }
                }
                hideError(deadlineInput, deadlineError);
                return true;
            }

            function validateDescription() {
                const value = descriptionInput.value;
                const descriptionError = document.getElementById('descriptionError');
                const descriptionErrorText = document.getElementById('descriptionErrorText');

                // Update character counter
                descriptionCounter.textContent = `${value.length}/1000`;
                descriptionCounter.className = value.length > 900 ? 'text-xs text-red-500' :
                'text-xs text-gray-500';

                if (value.length > 1000) {
                    showError(descriptionInput, descriptionError, descriptionErrorText,
                        'Description cannot exceed 1000 characters');
                    return false;
                } else {
                    hideError(descriptionInput, descriptionError);
                    return true;
                }
            }

            function showError(input, errorDiv, errorText, message) {
                input.classList.add('border-red-500', 'focus:border-red-500', 'focus:ring-red-200');
                input.classList.remove('border-gray-300', 'focus:border-blue-500', 'focus:ring-blue-200');
                errorText.textContent = message;
                errorDiv.classList.remove('hidden');
            }

            function hideError(input, errorDiv) {
                input.classList.remove('border-red-500', 'focus:border-red-500', 'focus:ring-red-200');
                input.classList.add('border-gray-300', 'focus:border-blue-500', 'focus:ring-blue-200');
                errorDiv.classList.add('hidden');
            }

            // Event listeners for real-time validation
            titleInput.addEventListener('input', validateTitle);
            titleInput.addEventListener('blur', validateTitle);

            clientNameInput.addEventListener('input', validateClientName);
            clientNameInput.addEventListener('blur', validateClientName);

            budgetInput.addEventListener('input', validateBudget);
            budgetInput.addEventListener('blur', validateBudget);

            deadlineInput.addEventListener('change', validateDeadline);
            deadlineInput.addEventListener('blur', validateDeadline);

            descriptionInput.addEventListener('input', validateDescription);

            // Form submission validation
            form.addEventListener('submit', function(e) {
                const isTitleValid = validateTitle();
                const isClientNameValid = validateClientName();
                const isBudgetValid = validateBudget();
                const isDeadlineValid = validateDeadline();
                const isDescriptionValid = validateDescription();

                if (!isTitleValid || !isClientNameValid || !isBudgetValid || !isDeadlineValid || !
                    isDescriptionValid) {
                    e.preventDefault();

                    // Scroll to first error
                    const firstError = form.querySelector('.border-red-500');
                    if (firstError) {
                        firstError.scrollIntoView({
                            behavior: 'smooth',
                            block: 'center'
                        });
                        firstError.focus();
                    }
                }
            });
        });
    </script>
</x-app-layout>
