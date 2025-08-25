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
                              d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                    </svg>
                </div>
                <div class="min-w-0">
                    <h2 class="font-bold text-xl sm:text-2xl leading-tight truncate" style="color: var(--primary-text);">
                        Log Timesheet
                    </h2>
                    <p class="text-xs sm:text-sm" style="color: var(--secondary-text);">Task: {{ $task->title }}</p>
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
        <div class="w-full px-3 sm:px-6 lg:px-8 space-y-6">
            @if ($attendance)
                <div class="bg-white rounded-xl shadow-xl overflow-hidden border border-gray-200">
                    <div class="theme-app px-4 sm:px-6 py-4 border-b border-gray-200" style="background: linear-gradient(to right, var(--secondary-bg), var(--primary-bg));">
                        <div class="flex items-center space-x-3">
                            <div class="p-2 rounded-lg shadow-sm" style="background-color: var(--hover-bg);">
                                <svg class="w-5 h-5" style="color: var(--primary-text);" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold" style="color: var(--primary-text);">Today's Attendance</h3>
                                <p class="text-sm" style="color: var(--secondary-text);">{{ \Carbon\Carbon::parse($today)->format('M d, Y') }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="p-4 sm:p-6">
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 text-base text-gray-700">
                            <p><strong class="font-semibold text-gray-900">Punch In:</strong> {{ \Carbon\Carbon::parse($attendance->punch_in)->format('h:i A') }}</p>
                            <p><strong class="font-semibold text-gray-900">Punch Out:</strong> {{ $attendance->punch_out ? \Carbon\Carbon::parse($attendance->punch_out)->format('h:i A') : 'Not yet punched out' }}</p>
                            <p><strong class="font-semibold text-gray-900">Total Hours:</strong> <span class="text-green-600 font-medium">{{ $attendance->total_working_hours ?? 'N/A' }}</span></p>
                        </div>
                    </div>
                </div>
            @else
                <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4 rounded-lg">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-yellow-400" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm text-yellow-700 font-medium">No attendance record found for today.</p>
                        </div>
                    </div>
                </div>
            @endif

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
                            <p class="text-sm" style="color: var(--secondary-text);">Log your work hours for this task</p>
                        </div>
                    </div>
                </div>

                <div class="p-4 sm:p-6">
                    <form action="{{ route('tasks.timesheets.store', [$projectId, $task->id]) }}" method="POST" class="space-y-6">
                        @csrf
                        <input type="hidden" name="task_id" value="{{ $task->id }}">

                        <div class="space-y-2">
                            <label for="date" class="block text-sm font-semibold text-gray-700 mb-2">
                                <div class="flex items-center space-x-2">
                                    <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                    <span>Date</span>
                                </div>
                            </label>
                            <input type="date" name="date" id="date" value="{{ $today }}" readonly
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm bg-gray-100 cursor-not-allowed opacity-75">
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
                                   value="{{ old('hours_worked', $hoursWorked) }}" required placeholder="Enter hours worked..."
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-4 focus:ring-blue-200 focus:border-blue-500 bg-gray-50 focus:bg-white"
                                   data-validation="hours">
                            <div id="hours_worked_error" class="hidden flex items-center space-x-2 mt-2 p-3 bg-red-50 border border-red-200 rounded-lg">
                                <svg class="w-4 h-4 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                <span class="text-sm text-red-600 font-medium" id="hours_worked_error_text"></span>
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
                                        <span>Work Description</span>
                                    </div>
                                    <span class="text-xs text-gray-500">
                                        <span id="description_count">0</span>/500 characters
                                    </span>
                                </div>
                            </label>
                            <textarea name="description" id="description" rows="5" placeholder="Enter a description of your work..." maxlength="500"
                                      class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-4 focus:ring-blue-200 focus:border-blue-500 bg-gray-50 focus:bg-white resize-none"
                                      data-validation="description">{{ old('description') }}</textarea>
                            <div id="description_error" class="hidden flex items-center space-x-2 mt-2 p-3 bg-red-50 border border-red-200 rounded-lg">
                                <svg class="w-4 h-4 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                <span class="text-sm text-red-600 font-medium" id="description_error_text"></span>
                            </div>
                        </div>

                        <div class="flex flex-col sm:flex-row items-stretch sm:items-center justify-end gap-2 sm:gap-4 pt-6 border-t border-gray-200">
                            <a href="{{ route('tasks.timesheets.index', [$projectId, 'task' => $task->id]) }}"
                               class="inline-flex items-center justify-center w-full sm:w-auto px-6 py-3 border border-gray-300 text-gray-700 bg-white font-semibold rounded-lg shadow-sm hover:bg-gray-50 hover:scale-105 transition-all duration-300 focus:outline-none focus:ring-4 focus:ring-gray-300">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M6 18L18 6M6 6l12 12"/>
                                </svg>
                                Cancel
                            </a>
                            <button type="submit" id="submit_btn"
                                    class="theme-app inline-flex items-center justify-center w-full sm:w-auto px-8 py-3 font-semibold rounded-lg shadow-lg hover:scale-105 transition-all duration-300 focus:outline-none focus:ring-4"
                                    style="background-color: var(--hover-bg); color: var(--primary-text);"
                                    onmouseover="this.style.backgroundColor='var(--primary-bg-light)'"
                                    onmouseout="this.style.backgroundColor='var(--hover-bg)'">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                                </svg>
                                Submit Timesheet
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.querySelector('form');
            const hoursWorkedInput = document.getElementById('hours_worked');
            const descriptionInput = document.getElementById('description');
            const descriptionCount = document.getElementById('description_count');
            const submitBtn = document.getElementById('submit_btn');

            // Validation functions
            function validateHoursWorked() {
                const value = parseFloat(hoursWorkedInput.value);
                const errorDiv = document.getElementById('hours_worked_error');
                const errorText = document.getElementById('hours_worked_error_text');
                
                hoursWorkedInput.classList.remove('border-red-500');
                errorDiv.classList.add('hidden');
                
                if (!hoursWorkedInput.value.trim()) {
                    showError('hours_worked', 'Hours worked is required');
                    return false;
                }
                
                if (isNaN(value) || value <= 0) {
                    showError('hours_worked', 'Hours worked must be a positive number');
                    return false;
                }
                
                if (value > 24) {
                    showError('hours_worked', 'Hours worked cannot exceed 24 hours per day');
                    return false;
                }
                
                if (value < 0.01) {
                    showError('hours_worked', 'Hours worked must be at least 0.01 hours (36 seconds)');
                    return false;
                }
                
                return true;
            }

            function validateDescription() {
                const value = descriptionInput.value.trim();
                const errorDiv = document.getElementById('description_error');
                
                descriptionInput.classList.remove('border-red-500');
                errorDiv.classList.add('hidden');
                
                if (value.length > 500) {
                    showError('description', 'Description cannot exceed 500 characters');
                    return false;
                }
                
                return true;
            }

            function showError(fieldName, message) {
                const input = document.getElementById(fieldName);
                const errorDiv = document.getElementById(fieldName + '_error');
                const errorText = document.getElementById(fieldName + '_error_text');
                
                input.classList.add('border-red-500');
                errorText.textContent = message;
                errorDiv.classList.remove('hidden');
            }

            function updateDescriptionCount() {
                const count = descriptionInput.value.length;
                descriptionCount.textContent = count;
                
                if (count > 500) {
                    descriptionCount.parentElement.classList.add('text-red-500');
                    descriptionCount.parentElement.classList.remove('text-gray-500');
                } else {
                    descriptionCount.parentElement.classList.remove('text-red-500');
                    descriptionCount.parentElement.classList.add('text-gray-500');
                }
            }

            // Real-time validation
            hoursWorkedInput.addEventListener('input', validateHoursWorked);
            hoursWorkedInput.addEventListener('blur', validateHoursWorked);
            
            descriptionInput.addEventListener('input', function() {
                updateDescriptionCount();
                validateDescription();
            });
            descriptionInput.addEventListener('blur', validateDescription);

            // Initialize description count
            updateDescriptionCount();

            // Form submission validation
            form.addEventListener('submit', function(e) {
                let isValid = true;
                
                if (!validateHoursWorked()) {
                    isValid = false;
                }
                
                if (!validateDescription()) {
                    isValid = false;
                }
                
                if (!isValid) {
                    e.preventDefault();
                    
                    // Scroll to first error
                    const firstError = document.querySelector('.border-red-500');
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
