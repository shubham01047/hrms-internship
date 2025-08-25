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
                        Create Task for Project: {{ $project->title }}
                    </h2>
                    <p class="text-xs sm:text-sm" style="color: var(--secondary-text);">Fill in the details to create a
                        new task</p>
                </div>
            </div>
            <a href="{{ route('projects.show', ['project' => $project]) }}"
                class="inline-flex items-center justify-center w-full sm:w-auto px-5 sm:px-6 py-2.5 sm:py-3 font-semibold rounded-lg shadow-lg hover:scale-105 transform transition-all duration-300 ease-in-out focus:outline-none focus:ring-4 lg:mr-24"
                style="background-color: var(--hover-bg); color: var(--primary-text);"
                onmouseover="this.style.backgroundColor='var(--primary-bg-light)'"
                onmouseout="this.style.backgroundColor='var(--hover-bg)'" aria-label="Back to Project">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Back to Project
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
                                    d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2v2M7 9h10">
                                </path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold" style="color: var(--primary-text);">Task Details</h3>
                            <p class="text-sm" style="color: var(--secondary-text);">Fill in the details to create a new
                                task</p>
                        </div>
                    </div>
                </div>

                <div class="p-4 sm:p-6">
                    <form method="POST" action="{{ route('projects.tasks.store', $project->id) }}" class="space-y-6" id="taskForm">
                        @csrf

                        <div class="space-y-2">
                            <label for="title" class="block text-sm font-semibold text-gray-700 mb-2">
                                <div class="flex items-center space-x-2">
                                    <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                        </path>
                                    </svg>
                                    <span>Task Title</span>
                                    <span class="text-red-500">*</span>
                                </div>
                            </label>
                            <!-- Added validation attributes and error display -->
                            <input type="text" name="title" id="title" required
                                minlength="2" maxlength="200"
                                placeholder="Enter task title..."
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-4 focus:ring-blue-200 focus:border-blue-500 transition-all duration-300 ease-in-out hover:border-gray-400 bg-gray-50 focus:bg-white">
                            <div id="title-error" class="hidden flex items-center space-x-2 mt-2 p-3 bg-red-50 border border-red-200 rounded-lg">
                                <svg class="w-4 h-4 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span class="text-sm text-red-600 font-medium" id="title-error-text"></span>
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
                            <label for="description" class="block text-sm font-semibold text-gray-700 mb-2">
                                <div class="flex items-center space-x-2">
                                    <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 6h16M4 12h16M4 18h7"></path>
                                    </svg>
                                    <span>Description</span>
                                    <!-- Added character counter -->
                                    <span class="text-xs text-gray-500" id="description-counter">0/1000 characters</span>
                                </div>
                            </label>
                            <!-- Added maxlength validation -->
                            <textarea name="description" id="description" rows="5" maxlength="1000" placeholder="Enter task description..."
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-4 focus:ring-blue-200 focus:border-blue-500 transition-all duration-300 ease-in-out hover:border-gray-400 bg-gray-50 focus:bg-white resize-none"></textarea>
                        </div>

                        <div class="space-y-2">
                            <label for="priority" class="block text-sm font-semibold text-gray-700 mb-2">
                                <div class="flex items-center space-x-2">
                                    <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z">
                                        </path>
                                    </svg>
                                    <span>Priority</span>
                                    <span class="text-red-500">*</span>
                                </div>
                            </label>
                            <select name="priority" id="priority" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-4 focus:ring-blue-200 focus:border-blue-500 transition-all duration-300 ease-in-out hover:border-gray-400 bg-gray-50 focus:bg-white">
                                <option value="">---Select Priority---</option>
                                <option value="Low">Low</option>
                                <option value="Medium">Medium</option>
                                <option value="High">High</option>
                                <option value="Urgent">Urgent</option>
                            </select>
                            <!-- Added priority error display -->
                            <div id="priority-error" class="hidden flex items-center space-x-2 mt-2 p-3 bg-red-50 border border-red-200 rounded-lg">
                                <svg class="w-4 h-4 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span class="text-sm text-red-600 font-medium">Please select a priority level</span>
                            </div>
                        </div>

                        <div class="space-y-2">
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
                                <option value="">---Select Status---</option>
                                <option value="To-Do">To-Do</option>
                                <option value="In Progress">In Progress</option>
                                <option value="On Hold">On Hold</option>
                                <option value="Done">Done</option>
                            </select>
                            <!-- Added status error display -->
                            <div id="status-error" class="hidden flex items-center space-x-2 mt-2 p-3 bg-red-50 border border-red-200 rounded-lg">
                                <svg class="w-4 h-4 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span class="text-sm text-red-600 font-medium">Please select a status</span>
                            </div>
                        </div>

                        <div class="space-y-2">
                            <label for="due_date" class="block text-sm font-semibold text-gray-700 mb-2">
                                <div class="flex items-center space-x-2">
                                    <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                    <span>Due Date</span>
                                </div>
                            </label>
                            <input type="date" name="due_date" id="due_date"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-4 focus:ring-blue-200 focus:border-blue-500 transition-all duration-300 ease-in-out hover:border-gray-400 bg-gray-50 focus:bg-white">
                            <!-- Added due date error display -->
                            <div id="due-date-error" class="hidden flex items-center space-x-2 mt-2 p-3 bg-red-50 border border-red-200 rounded-lg">
                                <svg class="w-4 h-4 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span class="text-sm text-red-600 font-medium" id="due-date-error-text"></span>
                            </div>
                        </div>

                        <!-- Added proper label and validation for hours assigned -->
                        <div class="space-y-2">
                            <label for="hours_assigned" class="block text-sm font-semibold text-gray-700 mb-2">
                                <div class="flex items-center space-x-2">
                                    <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <span>Assign Total Hours</span>
                                </div>
                            </label>
                            <input type="number" name="hours_assigned" id="hours_assigned" 
                                min="0" max="9999" step="0.1" placeholder="Enter hours (e.g., 8.5)"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-4 focus:ring-blue-200 focus:border-blue-500 transition-all duration-300 ease-in-out hover:border-gray-400 bg-gray-50 focus:bg-white">
                            <div id="hours-error" class="hidden flex items-center space-x-2 mt-2 p-3 bg-red-50 border border-red-200 rounded-lg">
                                <svg class="w-4 h-4 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span class="text-sm text-red-600 font-medium" id="hours-error-text"></span>
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
                                @foreach ($project->users as $user)
                                    <label for="assigned-user-{{ $user->id }}"
                                        class="flex items-center p-3 bg-gray-50 border border-gray-200 rounded-lg cursor-pointer hover:bg-gray-100 hover:border-gray-300 transition-all duration-200">
                                        <input type="checkbox" name="assigned_user_ids[]" value="{{ $user->id }}"
                                            id="assigned-user-{{ $user->id }}"
                                            class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                                        <span class="ml-3 text-sm font-medium text-gray-900">{{ $user->name }}</span>
                                    </label>
                                @endforeach
                            </div>
                        </div>

                        <div
                            class="flex flex-col sm:flex-row items-stretch sm:items-center justify-end gap-2 sm:gap-4 pt-6 border-t border-gray-200">
                            <a href="{{ route('projects.show', ['project' => $project]) }}"
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
                                Create Task
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
            const form = document.getElementById('taskForm');
            const titleInput = document.getElementById('title');
            const descriptionInput = document.getElementById('description');
            const prioritySelect = document.getElementById('priority');
            const statusSelect = document.getElementById('status');
            const dueDateInput = document.getElementById('due_date');
            const hoursInput = document.getElementById('hours_assigned');

            // Character counter for description
            const descriptionCounter = document.getElementById('description-counter');
            descriptionInput.addEventListener('input', function() {
                const length = this.value.length;
                descriptionCounter.textContent = `${length}/1000 characters`;
                descriptionCounter.className = length > 900 ? 'text-xs text-red-500' : 'text-xs text-gray-500';
            });

            // Real-time validation functions
            function validateTitle() {
                const value = titleInput.value.trim();
                const errorDiv = document.getElementById('title-error');
                const errorText = document.getElementById('title-error-text');
                
                if (value.length === 0) {
                    showError(titleInput, errorDiv, errorText, 'Task title is required');
                    return false;
                } else if (value.length < 2) {
                    showError(titleInput, errorDiv, errorText, 'Task title must be at least 2 characters');
                    return false;
                } else if (value.length > 200) {
                    showError(titleInput, errorDiv, errorText, 'Task title cannot exceed 200 characters');
                    return false;
                } else if (!/^[a-zA-Z0-9\s\-_.,!?()]+$/.test(value)) {
                    showError(titleInput, errorDiv, errorText, 'Task title contains invalid characters');
                    return false;
                } else {
                    hideError(titleInput, errorDiv);
                    return true;
                }
            }

            function validatePriority() {
                const value = prioritySelect.value;
                const errorDiv = document.getElementById('priority-error');
                
                if (!value) {
                    showError(prioritySelect, errorDiv);
                    return false;
                } else {
                    hideError(prioritySelect, errorDiv);
                    return true;
                }
            }

            function validateStatus() {
                const value = statusSelect.value;
                const errorDiv = document.getElementById('status-error');
                
                if (!value) {
                    showError(statusSelect, errorDiv);
                    return false;
                } else {
                    hideError(statusSelect, errorDiv);
                    return true;
                }
            }

            function validateDueDate() {
                const value = dueDateInput.value;
                const errorDiv = document.getElementById('due-date-error');
                const errorText = document.getElementById('due-date-error-text');
                
                if (value) {
                    const selectedDate = new Date(value);
                    const today = new Date();
                    today.setHours(0, 0, 0, 0);
                    
                    if (selectedDate < today) {
                        showError(dueDateInput, errorDiv, errorText, 'Due date cannot be in the past');
                        return false;
                    }
                    
                    const maxDate = new Date();
                    maxDate.setFullYear(maxDate.getFullYear() + 5);
                    if (selectedDate > maxDate) {
                        showError(dueDateInput, errorDiv, errorText, 'Due date cannot be more than 5 years in the future');
                        return false;
                    }
                }
                
                hideError(dueDateInput, errorDiv);
                return true;
            }

            function validateHours() {
                const value = hoursInput.value;
                const errorDiv = document.getElementById('hours-error');
                const errorText = document.getElementById('hours-error-text');
                
                if (value) {
                    const hours = parseFloat(value);
                    if (isNaN(hours) || hours < 0) {
                        showError(hoursInput, errorDiv, errorText, 'Hours must be a positive number');
                        return false;
                    } else if (hours > 9999) {
                        showError(hoursInput, errorDiv, errorText, 'Hours cannot exceed 9999');
                        return false;
                    }
                }
                
                hideError(hoursInput, errorDiv);
                return true;
            }

            function showError(input, errorDiv, errorText = null, message = '') {
                input.classList.add('border-red-500', 'focus:border-red-500', 'focus:ring-red-200');
                input.classList.remove('border-gray-300', 'focus:border-blue-500', 'focus:ring-blue-200');
                errorDiv.classList.remove('hidden');
                if (errorText) {
                    errorText.textContent = message;
                }
            }

            function hideError(input, errorDiv) {
                input.classList.remove('border-red-500', 'focus:border-red-500', 'focus:ring-red-200');
                input.classList.add('border-gray-300', 'focus:border-blue-500', 'focus:ring-blue-200');
                errorDiv.classList.add('hidden');
            }

            // Add event listeners for real-time validation
            titleInput.addEventListener('blur', validateTitle);
            titleInput.addEventListener('input', function() {
                if (this.value.length >= 2) validateTitle();
            });

            prioritySelect.addEventListener('change', validatePriority);
            statusSelect.addEventListener('change', validateStatus);
            dueDateInput.addEventListener('change', validateDueDate);
            hoursInput.addEventListener('blur', validateHours);
            hoursInput.addEventListener('input', function() {
                if (this.value) validateHours();
            });

            // Form submission validation
            form.addEventListener('submit', function(e) {
                const isTitleValid = validateTitle();
                const isPriorityValid = validatePriority();
                const isStatusValid = validateStatus();
                const isDueDateValid = validateDueDate();
                const isHoursValid = validateHours();

                if (!isTitleValid || !isPriorityValid || !isStatusValid || !isDueDateValid || !isHoursValid) {
                    e.preventDefault();
                    
                    // Scroll to first error
                    const firstError = document.querySelector('.border-red-500');
                    if (firstError) {
                        firstError.scrollIntoView({ behavior: 'smooth', block: 'center' });
                        firstError.focus();
                    }
                }
            });

            // Set minimum date to today
            const today = new Date().toISOString().split('T')[0];
            dueDateInput.setAttribute('min', today);
        });
    </script>
</x-app-layout>
