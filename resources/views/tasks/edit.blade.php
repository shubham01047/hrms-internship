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
                        Edit Task: {{ $task->title }}
                    </h2>
                    <p class="text-xs sm:text-sm" style="color: var(--secondary-text);">Update the details for this task
                    </p>
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
                                    d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                </path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold" style="color: var(--primary-text);">Task Details</h3>
                            <p class="text-sm" style="color: var(--secondary-text);">Edit the details for this task</p>
                        </div>
                    </div>
                </div>

                <div class="p-4 sm:p-6">
                    <form method="POST" action="{{ route('projects.tasks.update', [$task->project_id, $task->id]) }}"
                        class="space-y-6" id="taskEditForm" novalidate>
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
                                    <span>Task Title</span>
                                    <span class="text-red-500">*</span>
                                </div>
                            </label>
                            <input type="text" name="title" id="title" value="{{ $task->title }}" required
                                minlength="2" maxlength="200"
                                placeholder="Enter task title..."
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-4 focus:ring-blue-200 focus:border-blue-500 transition-all duration-300 ease-in-out hover:border-gray-400 bg-gray-50 focus:bg-white">
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
                            <!-- Added client-side validation error display -->
                            <div id="titleError" class="hidden flex items-center space-x-2 mt-2 p-3 bg-red-50 border border-red-200 rounded-lg">
                                <svg class="w-4 h-4 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span class="text-sm text-red-600 font-medium" id="titleErrorText"></span>
                            </div>
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
                                </div>
                            </label>
                            <textarea name="description" id="description" rows="5" maxlength="1000" placeholder="Enter task description..."
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-4 focus:ring-blue-200 focus:border-blue-500 transition-all duration-300 ease-in-out hover:border-gray-400 bg-gray-50 focus:bg-white resize-none">{{ $task->description }}</textarea>
                            <!-- Added character counter for description -->
                            <div class="flex justify-between items-center text-sm text-gray-500">
                                <span id="descriptionCounter">0 / 1000 characters</span>
                            </div>
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
                                @foreach (['Low', 'Medium', 'High', 'Urgent'] as $priority)
                                    <option value="{{ $priority }}"
                                        {{ $task->priority === $priority ? 'selected' : '' }}>{{ $priority }}
                                    </option>
                                @endforeach
                            </select>
                            <!-- Added client-side validation error display for priority -->
                            <div id="priorityError" class="hidden flex items-center space-x-2 mt-2 p-3 bg-red-50 border border-red-200 rounded-lg">
                                <svg class="w-4 h-4 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span class="text-sm text-red-600 font-medium" id="priorityErrorText"></span>
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
                                @foreach (['To-Do', 'In Progress', 'On Hold', 'Done'] as $status)
                                    <option value="{{ $status }}"
                                        {{ $task->status === $status ? 'selected' : '' }}>{{ $status }}</option>
                                @endforeach
                            </select>
                            <!-- Added client-side validation error display for status -->
                            <div id="statusError" class="hidden flex items-center space-x-2 mt-2 p-3 bg-red-50 border border-red-200 rounded-lg">
                                <svg class="w-4 h-4 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span class="text-sm text-red-600 font-medium" id="statusErrorText"></span>
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
                            <input type="date" name="due_date" id="due_date" value="{{ $task->due_date }}"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-4 focus:ring-blue-200 focus:border-blue-500 transition-all duration-300 ease-in-out hover:border-gray-400 bg-gray-50 focus:bg-white">
                            <!-- Added client-side validation error display for due date -->
                            <div id="dueDateError" class="hidden flex items-center space-x-2 mt-2 p-3 bg-red-50 border border-red-200 rounded-lg">
                                <svg class="w-4 h-4 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span class="text-sm text-red-600 font-medium" id="dueDateErrorText"></span>
                            </div>
                        </div>

                        <div class="space-y-2">
                            <label for="hours_assigned" class="block text-sm font-semibold text-gray-700 mb-2">
                                <div class="flex items-center space-x-2">
                                    <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <span>Assign Total Hours</span>
                                </div>
                            </label>
                            <input type="number" name="hours_assigned" id="hours_assigned" 
                                   min="0" max="9999" step="0.1" value="{{ $task->hours_assigned }}" 
                                   placeholder="Enter hours (e.g., 8.5)"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-4 focus:ring-blue-200 focus:border-blue-500 transition-all duration-300 ease-in-out hover:border-gray-400 bg-gray-50 focus:bg-white">
                            <!-- Added client-side validation error display for hours -->
                            <div id="hoursError" class="hidden flex items-center space-x-2 mt-2 p-3 bg-red-50 border border-red-200 rounded-lg">
                                <svg class="w-4 h-4 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span class="text-sm text-red-600 font-medium" id="hoursErrorText"></span>
                            </div>
                        </div>
                        <div class="space-y-2">
                            <label for="assigned_user_ids" class="block text-sm font-semibold text-gray-700 mb-2">
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
                                        <input type="checkbox" name="assigned_user_ids[]"
                                            value="{{ $user->id }}" id="assigned-user-{{ $user->id }}"
                                            class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded"
                                            {{ $task->assignedUsers->contains($user->id) ? 'checked' : '' }}>
                                        <span
                                            class="ml-3 text-sm font-medium text-gray-900">{{ $user->name }}</span>
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
                                        d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path>
                                </svg>
                                Update Task
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Added comprehensive client-side validation script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('taskEditForm');
            const titleInput = document.getElementById('title');
            const descriptionInput = document.getElementById('description');
            const prioritySelect = document.getElementById('priority');
            const statusSelect = document.getElementById('status');
            const dueDateInput = document.getElementById('due_date');
            const hoursInput = document.getElementById('hours_assigned');

            // Character counter for description
            const descriptionCounter = document.getElementById('descriptionCounter');
            
            function updateDescriptionCounter() {
                const length = descriptionInput.value.length;
                descriptionCounter.textContent = `${length} / 1000 characters`;
                descriptionCounter.style.color = length > 900 ? '#ef4444' : '#6b7280';
            }
            
            descriptionInput.addEventListener('input', updateDescriptionCounter);
            updateDescriptionCounter(); // Initialize counter

            // Validation functions
            function showError(elementId, message) {
                const errorDiv = document.getElementById(elementId);
                const errorText = document.getElementById(elementId.replace('Error', 'ErrorText'));
                const input = document.getElementById(elementId.replace('Error', ''));
                
                errorDiv.classList.remove('hidden');
                errorText.textContent = message;
                input.classList.add('border-red-500');
                input.classList.remove('border-gray-300');
            }

            function hideError(elementId) {
                const errorDiv = document.getElementById(elementId);
                const input = document.getElementById(elementId.replace('Error', ''));
                
                errorDiv.classList.add('hidden');
                input.classList.remove('border-red-500');
                input.classList.add('border-gray-300');
            }

            function validateTitle() {
                const title = titleInput.value.trim();
                const titlePattern = /^[a-zA-Z0-9\s\-_.,!?()]+$/;
                
                if (!title) {
                    showError('titleError', 'Task title is required.');
                    return false;
                } else if (title.length < 2) {
                    showError('titleError', 'Task title must be at least 2 characters long.');
                    return false;
                } else if (title.length > 200) {
                    showError('titleError', 'Task title cannot exceed 200 characters.');
                    return false;
                } else if (!titlePattern.test(title)) {
                    showError('titleError', 'Task title contains invalid characters.');
                    return false;
                } else {
                    hideError('titleError');
                    return true;
                }
            }

            function validatePriority() {
                if (!prioritySelect.value) {
                    showError('priorityError', 'Please select a priority level.');
                    return false;
                } else {
                    hideError('priorityError');
                    return true;
                }
            }

            function validateStatus() {
                if (!statusSelect.value) {
                    showError('statusError', 'Please select a status.');
                    return false;
                } else {
                    hideError('statusError');
                    return true;
                }
            }

            function validateDueDate() {
                if (dueDateInput.value) {
                    const selectedDate = new Date(dueDateInput.value);
                    const today = new Date();
                    today.setHours(0, 0, 0, 0);
                    
                    if (selectedDate < today) {
                        showError('dueDateError', 'Due date cannot be in the past.');
                        return false;
                    } else {
                        hideError('dueDateError');
                        return true;
                    }
                } else {
                    hideError('dueDateError');
                    return true;
                }
            }

            function validateHours() {
                if (hoursInput.value) {
                    const hours = parseFloat(hoursInput.value);
                    if (isNaN(hours) || hours < 0) {
                        showError('hoursError', 'Hours must be a positive number.');
                        return false;
                    } else if (hours > 9999) {
                        showError('hoursError', 'Hours cannot exceed 9999.');
                        return false;
                    } else {
                        hideError('hoursError');
                        return true;
                    }
                } else {
                    hideError('hoursError');
                    return true;
                }
            }

            // Real-time validation
            titleInput.addEventListener('input', validateTitle);
            prioritySelect.addEventListener('change', validatePriority);
            statusSelect.addEventListener('change', validateStatus);
            dueDateInput.addEventListener('change', validateDueDate);
            hoursInput.addEventListener('input', validateHours);

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
        });
    </script>
</x-app-layout>
