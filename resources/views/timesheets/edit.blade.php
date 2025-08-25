<x-app-layout>
    <x-slot name="header">
        <div
            class="theme-app flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between p-4 sm:p-6 rounded-lg shadow-sm"
            style="background: linear-gradient(to right, var(--secondary-bg), var(--primary-bg));"
        >
            <div class="flex items-center space-x-3">
                <div class="p-2 rounded-lg shadow-md" style="background-color: var(--hover-bg);">
                    <svg class="w-6 h-6" style="color: var(--primary-text);" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                    </svg>
                </div>
                <div class="min-w-0">
                    <h2 class="font-bold text-xl sm:text-2xl leading-tight truncate" style="color: var(--primary-text);">
                        Edit Timesheet
                    </h2>
                    <p class="text-xs sm:text-sm" style="color: var(--secondary-text);">Edit the details for this timesheet entry</p>
                </div>
            </div>
            <a href="{{ route('tasks.timesheets.index', [$projectId, 'task' => $task->id]) }}"
               class="inline-flex items-center justify-center w-full sm:w-auto px-5 sm:px-6 py-2.5 sm:py-3 font-semibold rounded-lg shadow-lg hover:scale-105 transform transition-all duration-300 ease-in-out focus:outline-none focus:ring-4 lg:mr-24"
               style="background-color: var(--hover-bg); color: var(--primary-text);"
               onmouseover="this.style.backgroundColor='var(--primary-bg-light)'"
               onmouseout="this.style.backgroundColor='var(--hover-bg)'" aria-label="Back to Timesheets">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Back to Timesheets
            </a>
        </div>
    </x-slot>

    <div class="py-6 sm:py-8 bg-gradient-to-br from-gray-50 to-blue-50 min-h-screen">
        <div class="w-full px-3 sm:px-6 lg:px-8">
            <div class="bg-white rounded-xl shadow-xl overflow-hidden border border-gray-200">
                <div class="theme-app px-4 sm:px-6 py-4 border-b border-gray-200" style="background: linear-gradient(to right, var(--secondary-bg), var(--primary-bg));">
                    <div class="flex items-center space-x-3">
                        <div class="p-2 rounded-lg shadow-sm" style="background-color: var(--hover-bg);">
                            <svg class="w-5 h-5" style="color: var(--primary-text);" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M7 9h10"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold" style="color: var(--primary-text);">Timesheet Details</h3>
                            <p class="text-sm" style="color: var(--secondary-text);">Edit the details for this timesheet entry</p>
                        </div>
                    </div>
                </div>

                <div class="p-4 sm:p-6">
                    <form method="POST" action="{{ route('tasks.timesheets.update', [$projectId, $task->id, $timesheet->id]) }}" class="space-y-6" id="timesheetEditForm">
                        @csrf
                        @method('PUT')

                        <div class="space-y-2">
                            <label for="date" class="block text-sm font-semibold text-gray-700 mb-2">
                                <div class="flex items-center space-x-2">
                                    <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                    <span>Date</span>
                                    <span class="text-red-500">*</span>
                                </div>
                            </label>
                            <input type="date" name="date" id="date" value="{{ old('date', $timesheet->date) }}" required
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-4 focus:ring-blue-200 focus:border-blue-500 bg-gray-50 focus:bg-white">
                            <div id="dateError" class="hidden flex items-center space-x-2 mt-2 p-3 bg-red-50 border border-red-200 rounded-lg">
                                <svg class="w-4 h-4 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                <span class="text-sm text-red-600 font-medium" id="dateErrorText"></span>
                            </div>
                            @error('date')
                                <div class="flex items-center space-x-2 mt-2 p-3 bg-red-50 border border-red-200 rounded-lg">
                                    <svg class="w-4 h-4 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    <span class="text-sm text-red-600 font-medium">{{ $message }}</span>
                                </div>
                            @enderror
                        </div>

                        <div class="space-y-2">
                            <label for="hours_worked" class="block text-sm font-semibold text-gray-700 mb-2">
                                <div class="flex items-center space-x-2">
                                    <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    <span>Hours Worked</span>
                                    <span class="text-red-500">*</span>
                                </div>
                            </label>
                            <input type="number" name="hours_worked" id="hours_worked" step="0.01" min="0.01" max="24"
                                   value="{{ old('hours_worked', $timesheet->hours_worked) }}" required
                                   placeholder="Enter hours worked..."
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-4 focus:ring-blue-200 focus:border-blue-500 bg-gray-50 focus:bg-white">
                            <div id="hoursError" class="hidden flex items-center space-x-2 mt-2 p-3 bg-red-50 border border-red-200 rounded-lg">
                                <svg class="w-4 h-4 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                <span class="text-sm text-red-600 font-medium" id="hoursErrorText"></span>
                            </div>
                            @error('hours_worked')
                                <div class="flex items-center space-x-2 mt-2 p-3 bg-red-50 border border-red-200 rounded-lg">
                                    <svg class="w-4 h-4 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    <span class="text-sm text-red-600 font-medium">{{ $message }}</span>
                                </div>
                            @enderror
                        </div>

                        <div class="space-y-2">
                            <label for="description" class="block text-sm font-semibold text-gray-700 mb-2">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center space-x-2">
                                        <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M4 6h16M4 12h16M4 18h7"/>
                                        </svg>
                                        <span>Description</span>
                                    </div>
                                    <span class="text-xs text-gray-500" id="descriptionCounter">0/500</span>
                                </div>
                            </label>
                            <textarea name="description" id="description" rows="5" maxlength="500" placeholder="Enter a description of your work..."
                                      class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-4 focus:ring-blue-200 focus:border-blue-500 bg-gray-50 focus:bg-white resize-none">{{ old('description', $timesheet->description) }}</textarea>
                            <div id="descriptionError" class="hidden flex items-center space-x-2 mt-2 p-3 bg-red-50 border border-red-200 rounded-lg">
                                <svg class="w-4 h-4 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                <span class="text-sm text-red-600 font-medium" id="descriptionErrorText"></span>
                            </div>
                        </div>

                        <div class="flex flex-col sm:flex-row items-stretch sm:items-center justify-end gap-2 sm:gap-4 pt-6 border-t border-gray-200">
                            <a href="{{ route('tasks.timesheets.index', [$projectId, 'task' => $task->id]) }}"
                               class="inline-flex items-center justify-center w-full sm:w-auto px-6 py-3 border border-gray-300 text-gray-700 bg-white font-semibold rounded-lg shadow-sm hover:bg-gray-50 hover:scale-105 transition-all duration-300 focus:outline-none focus:ring-4 focus:ring-gray-300">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M6 18L18 6M6 6l12 12M6 12h12"/>
                                </svg>
                                Cancel
                            </a>
                            <button type="submit"
                                    class="theme-app inline-flex items-center justify-center w-full sm:w-auto px-8 py-3 font-semibold rounded-lg shadow-lg hover:scale-105 transition-all duration-300 focus:outline-none focus:ring-4"
                                    style="background-color: var(--hover-bg); color: var(--primary-text);"
                                    onmouseover="this.style.backgroundColor='var(--primary-bg-light)'"
                                    onmouseout="this.style.backgroundColor='var(--hover-bg)'">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/>
                                </svg>
                                Update Timesheet
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Added comprehensive validation JavaScript -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('timesheetEditForm');
            const dateInput = document.getElementById('date');
            const hoursInput = document.getElementById('hours_worked');
            const descriptionInput = document.getElementById('description');
            const descriptionCounter = document.getElementById('descriptionCounter');

            // Initialize character counter
            function updateDescriptionCounter() {
                const length = descriptionInput.value.length;
                descriptionCounter.textContent = `${length}/500`;
                descriptionCounter.className = length > 450 ? 'text-xs text-red-500' : 'text-xs text-gray-500';
            }

            // Validation functions
            function validateDate() {
                const dateError = document.getElementById('dateError');
                const dateErrorText = document.getElementById('dateErrorText');
                
                if (!dateInput.value) {
                    showError(dateInput, dateError, dateErrorText, 'Date is required');
                    return false;
                }

                const selectedDate = new Date(dateInput.value);
                const today = new Date();
                const oneYearAgo = new Date();
                oneYearAgo.setFullYear(today.getFullYear() - 1);
                
                if (selectedDate > today) {
                    showError(dateInput, dateError, dateErrorText, 'Date cannot be in the future');
                    return false;
                }
                
                if (selectedDate < oneYearAgo) {
                    showError(dateInput, dateError, dateErrorText, 'Date cannot be more than 1 year ago');
                    return false;
                }

                hideError(dateInput, dateError);
                return true;
            }

            function validateHours() {
                const hoursError = document.getElementById('hoursError');
                const hoursErrorText = document.getElementById('hoursErrorText');
                const value = parseFloat(hoursInput.value);
                
                if (!hoursInput.value) {
                    showError(hoursInput, hoursError, hoursErrorText, 'Hours worked is required');
                    return false;
                }
                
                if (isNaN(value) || value <= 0) {
                    showError(hoursInput, hoursError, hoursErrorText, 'Hours must be a positive number');
                    return false;
                }
                
                if (value < 0.01) {
                    showError(hoursInput, hoursError, hoursErrorText, 'Minimum hours is 0.01');
                    return false;
                }
                
                if (value > 24) {
                    showError(hoursInput, hoursError, hoursErrorText, 'Maximum hours is 24');
                    return false;
                }

                hideError(hoursInput, hoursError);
                return true;
            }

            function validateDescription() {
                const descriptionError = document.getElementById('descriptionError');
                const descriptionErrorText = document.getElementById('descriptionErrorText');
                
                if (descriptionInput.value.length > 500) {
                    showError(descriptionInput, descriptionError, descriptionErrorText, 'Description cannot exceed 500 characters');
                    return false;
                }

                hideError(descriptionInput, descriptionError);
                return true;
            }

            function showError(input, errorDiv, errorText, message) {
                input.classList.add('border-red-500', 'bg-red-50');
                input.classList.remove('border-gray-300', 'bg-gray-50');
                errorText.textContent = message;
                errorDiv.classList.remove('hidden');
            }

            function hideError(input, errorDiv) {
                input.classList.remove('border-red-500', 'bg-red-50');
                input.classList.add('border-gray-300', 'bg-gray-50');
                errorDiv.classList.add('hidden');
            }

            // Event listeners
            dateInput.addEventListener('blur', validateDate);
            dateInput.addEventListener('change', validateDate);
            
            hoursInput.addEventListener('input', validateHours);
            hoursInput.addEventListener('blur', validateHours);
            
            descriptionInput.addEventListener('input', function() {
                updateDescriptionCounter();
                validateDescription();
            });

            // Initialize counter
            updateDescriptionCounter();

            // Form submission validation
            form.addEventListener('submit', function(e) {
                const isDateValid = validateDate();
                const isHoursValid = validateHours();
                const isDescriptionValid = validateDescription();

                if (!isDateValid || !isHoursValid || !isDescriptionValid) {
                    e.preventDefault();
                    
                    // Scroll to first error
                    const firstError = form.querySelector('.border-red-500');
                    if (firstError) {
                        firstError.scrollIntoView({ behavior: 'smooth', block: 'center' });
                        firstError.focus();
                    }
                }
            });
        });
    </script>
</x-app-layout>
