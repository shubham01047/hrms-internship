<x-app-layout>
    <x-slot name="header">
        <div class="theme-app flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between p-4 sm:p-6 rounded-lg shadow-sm"
            style="background: linear-gradient(to right, var(--secondary-bg), var(--primary-bg));">
            <div class="flex items-center space-x-3">
                <div class="p-2 rounded-lg shadow-md" style="background-color: var(--hover-bg);">
                    <svg class="w-6 h-6" style="color: var(--primary-text);" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                        </path>
                    </svg>
                </div>
                <div class="min-w-0">
                    <h2 class="font-bold text-xl sm:text-2xl leading-tight truncate"
                        style="color: var(--primary-text);">
                        Edit Project
                    </h2>
                    <p class="text-xs sm:text-sm" style="color: var(--secondary-text);">Update the details for this
                        project</p>
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
                            <p class="text-sm" style="color: var(--secondary-text);">Update the details for this project
                            </p>
                        </div>
                    </div>
                </div>

                <div class="p-4 sm:p-6">
                    <form method="POST" action="{{ route('projects.update', $project->id) }}" class="space-y-6"
                        id="projectEditForm">
                        @csrf
                        @method('PUT')

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
                            <input type="text" name="title" id="title" value="{{ $project->title }}" required
                                minlength="2" maxlength="200" placeholder="Enter project title..."
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
                            <input type="text" name="client_name" id="client_name"
                                value="{{ $project->client_name }}" maxlength="100"
                                placeholder="Enter client name..."
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-4 focus:ring-blue-200 focus:border-blue-500 transition-all duration-300 ease-in-out hover:border-gray-400 bg-gray-50 focus:bg-white">
                            <div id="clientError"
                                class="hidden flex items-center space-x-2 mt-2 p-3 bg-red-50 border border-red-200 rounded-lg">
                                <svg class="w-4 h-4 text-red-500" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span class="text-sm text-red-600 font-medium" id="clientErrorText"></span>
                            </div>
                        </div>

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
                            <input type="number" name="budget" id="budget" value="{{ $project->budget }}"
                                step="0.01" min="0" max="999999999.99"
                                placeholder="Enter project budget..."
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
                                value="{{ $project->deadline ? \Carbon\Carbon::parse($project->deadline)->format('Y-m-d') : '' }}"
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
                            @foreach (['To-Do', 'In Progress', 'On Hold', 'Done'] as $status)
                                <option value="{{ $status }}" {{ $project->status === $status ? 'selected' : '' }}>
                                    {{ $status }}</option>
                            @endforeach
                        </select>
                        <div class="space-y-2">
                            <label for="description" class="block text-sm font-semibold text-gray-700 mb-2">
                                <div class="flex items-center space-x-2">
                                    <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 6h16M4 12h16M4 18h7"></path>
                                    </svg>
                                    <span>Description</span>
                                </div>
                            </label>
                            <div class="relative">
                                <textarea name="description" id="description" rows="5" maxlength="1000"
                                    placeholder="Enter project description..."
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-4 focus:ring-blue-200 focus:border-blue-500 transition-all duration-300 ease-in-out hover:border-gray-400 bg-gray-50 focus:bg-white resize-none">{{ $project->description }}</textarea>
                                <div class="absolute bottom-2 right-2 text-xs text-gray-500">
                                    <span id="descriptionCount">{{ strlen($project->description ?? '') }}</span>/1000
                                </div>
                            </div>
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
                                            class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded"
                                            {{ $project->members->contains($user->id) ? 'checked' : '' }}>
                                        <span
                                            class="ml-3 text-sm font-medium text-gray-900">{{ $user->name }}</span>
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
                            <button type="submit" id="submitBtn"
                                class="theme-app inline-flex items-center justify-center w-full sm:w-auto px-8 py-3 font-semibold rounded-lg shadow-lg hover:scale-105 transform transition-all duration-300 ease-in-out focus:outline-none focus:ring-4"
                                style="background-color: var(--hover-bg); color: var(--primary-text);"
                                onmouseover="this.style.backgroundColor='var(--primary-bg-light)'"
                                onmouseout="this.style.backgroundColor='var(--hover-bg)'">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path>
                                </svg>
                                Update Project
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('projectEditForm');
            const titleInput = document.getElementById('title');
            const clientInput = document.getElementById('client_name');
            const budgetInput = document.getElementById('budget');
            const deadlineInput = document.getElementById('deadline');
            const descriptionInput = document.getElementById('description');
            const descriptionCount = document.getElementById('descriptionCount');

            // Set date constraints
            const today = new Date().toISOString().split('T')[0];
            const maxDate = new Date();
            maxDate.setFullYear(maxDate.getFullYear() + 5);
            deadlineInput.setAttribute('min', today);
            deadlineInput.setAttribute('max', maxDate.toISOString().split('T')[0]);

            // Validation functions
            function validateTitle() {
                const value = titleInput.value.trim();
                const titleError = document.getElementById('titleError');
                const titleErrorText = document.getElementById('titleErrorText');

                if (!value) {
                    showError(titleInput, titleError, titleErrorText, 'Project title is required');
                    return false;
                } else if (value.length < 2) {
                    showError(titleInput, titleError, titleErrorText,
                    'Project title must be at least 2 characters');
                    return false;
                } else if (value.length > 200) {
                    showError(titleInput, titleError, titleErrorText,
                        'Project title must not exceed 200 characters');
                    return false;
                } else if (!/^[a-zA-Z0-9\s\-_.,!?()&]+$/.test(value)) {
                    showError(titleInput, titleError, titleErrorText, 'Project title contains invalid characters');
                    return false;
                } else {
                    hideError(titleInput, titleError);
                    return true;
                }
            }

            function validateClient() {
                const value = clientInput.value.trim();
                const clientError = document.getElementById('clientError');
                const clientErrorText = document.getElementById('clientErrorText');

                if (value && value.length > 100) {
                    showError(clientInput, clientError, clientErrorText,
                        'Client name must not exceed 100 characters');
                    return false;
                } else if (value && !/^[a-zA-Z0-9\s\-_.,!?()&]+$/.test(value)) {
                    showError(clientInput, clientError, clientErrorText, 'Client name contains invalid characters');
                    return false;
                } else {
                    hideError(clientInput, clientError);
                    return true;
                }
            }

            function validateBudget() {
                const value = budgetInput.value;
                const budgetError = document.getElementById('budgetError');
                const budgetErrorText = document.getElementById('budgetErrorText');

                if (value && (isNaN(value) || parseFloat(value) < 0)) {
                    showError(budgetInput, budgetError, budgetErrorText, 'Budget must be a positive number');
                    return false;
                } else if (value && parseFloat(value) > 999999999.99) {
                    showError(budgetInput, budgetError, budgetErrorText, 'Budget cannot exceed 999,999,999.99');
                    return false;
                } else {
                    hideError(budgetInput, budgetError);
                    return true;
                }
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
                    } else {
                        hideError(deadlineInput, deadlineError);
                        return true;
                    }
                } else {
                    hideError(deadlineInput, deadlineError);
                    return true;
                }
            }

            function validateDescription() {
                const value = descriptionInput.value;
                const descriptionError = document.getElementById('descriptionError');
                const descriptionErrorText = document.getElementById('descriptionErrorText');

                descriptionCount.textContent = value.length;

                if (value.length > 1000) {
                    showError(descriptionInput, descriptionError, descriptionErrorText,
                        'Description must not exceed 1000 characters');
                    return false;
                } else {
                    hideError(descriptionInput, descriptionError);
                    return true;
                }
            }

            function showError(input, errorDiv, errorText, message) {
                input.classList.add('border-red-500', 'focus:border-red-500', 'focus:ring-red-200');
                input.classList.remove('border-gray-300', 'focus:border-blue-500', 'focus:ring-blue-200');
                errorDiv.classList.remove('hidden');
                errorText.textContent = message;
            }

            function hideError(input, errorDiv) {
                input.classList.remove('border-red-500', 'focus:border-red-500', 'focus:ring-red-200');
                input.classList.add('border-gray-300', 'focus:border-blue-500', 'focus:ring-blue-200');
                errorDiv.classList.add('hidden');
            }

            // Real-time validation
            titleInput.addEventListener('input', validateTitle);
            titleInput.addEventListener('blur', validateTitle);

            clientInput.addEventListener('input', validateClient);
            clientInput.addEventListener('blur', validateClient);

            budgetInput.addEventListener('input', validateBudget);
            budgetInput.addEventListener('blur', validateBudget);

            deadlineInput.addEventListener('change', validateDeadline);
            deadlineInput.addEventListener('blur', validateDeadline);

            descriptionInput.addEventListener('input', validateDescription);
            descriptionInput.addEventListener('blur', validateDescription);

            // Form submission validation
            form.addEventListener('submit', function(e) {
                const isTitleValid = validateTitle();
                const isClientValid = validateClient();
                const isBudgetValid = validateBudget();
                const isDeadlineValid = validateDeadline();
                const isDescriptionValid = validateDescription();

                if (!isTitleValid || !isClientValid || !isBudgetValid || !isDeadlineValid || !
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
