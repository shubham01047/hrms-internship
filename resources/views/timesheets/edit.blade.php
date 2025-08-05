<x-app-layout>
    <x-slot name="header">
        {{-- Updated header to match the gradient and rounded-xl from leave_index.blade.php --}}
        <div class="bg-gradient-to-r from-red-500 to-red-600 text-white p-6 rounded-xl shadow-lg mb-8 animate-fade-in transition-all duration-300 ease-in-out hover:shadow-2xl hover:scale-105">
            <h1 class="text-3xl font-bold mb-2">Edit Timesheet</h1>
            <p class="text-red-100">Edit the details for this timesheet entry</p>
        </div>
    </x-slot>

    <div class="py-12 sm:px-6 lg:px-8 bg-gray-100 min-h-[calc(100vh-64px)] theme-app flex items-center justify-center">
        {{-- Custom animations and styles --}}
        <style>
            /* Define color variables to match the theme from leave_index.blade.php and index.blade.php */
            :root {
                --primary-rgb: 239, 68, 68; /* Red-500 RGB for shadows */
                --primary-bg-light-rgb: 244, 63, 94; /* From index.blade.php */
                --primary-bg: #3b1f22; /* From index.blade.php */
                --secondary-bg: #5a3a3d; /* From index.blade.php */
                --primary-border: #e5e7eb; /* From index.blade.php */
                --hover-bg: #f43f5e; /* From index.blade.php */

                /* Action button gradients, aligned with red theme */
                --action-gradient-from: #ef4444; /* red-500 */
                --action-gradient-to: #dc2626; /* red-600 */
                --action-gradient-hover-from: #b91c1c; /* red-700 */
                --action-gradient-hover-to: #991b1b; /* red-800 */
            }

            /* Custom fade-in animation */
            @keyframes fadeIn {
                from {
                    opacity: 0;
                    transform: translateY(30px);
                }
                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            .animate-fade-in {
                animation: fadeIn 0.8s ease-out forwards;
            }

            /* Staggered animation delays */
            .animate-delay-100 { animation-delay: 0.1s; }
            .animate-delay-200 { animation-delay: 0.2s; }
            .animate-delay-300 { animation-delay: 0.3s; }
            .animate-delay-400 { animation-delay: 0.4s; }
            .animate-delay-500 { animation-delay: 0.5s; }
            .animate-delay-600 { animation-delay: 0.6s; }
            .animate-delay-700 { animation-delay: 0.7s; }

            /* Enhanced Form Container */
            .form-container {
                border-radius: 20px;
                overflow: hidden;
                box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.15), 0 10px 20px -5px rgba(0, 0, 0, 0.1);
                border: 1px solid var(--primary-border);
                background: white;
                backdrop-filter: blur(10px);
                transition: all 0.3s ease-in-out;
            }

            .form-container:hover {
                box-shadow: 0 35px 60px -12px rgba(0, 0, 0, 0.2), 0 15px 25px -5px rgba(0, 0, 0, 0.15);
                transform: translateY(-2px);
            }

            /* Enhanced Form Input Styles */
            .form-input {
                width: 100%;
                padding: 1.25rem 1.5rem;
                border: 2px solid #e5e7eb;
                border-radius: 16px;
                font-size: 1rem;
                font-weight: 500;
                background: linear-gradient(135deg, #ffffff, #fafafa);
                transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
                outline: none;
                position: relative;
            }

            /* Dark mode for form inputs */
            .dark .form-input {
                background: var(--primary-bg);
                border-color: var(--primary-border);
                color: white; /* Changed to white for better contrast in dark mode */
            }

            /* Enhanced Focus Effects */
            .form-input:focus {
                border-color: var(--primary-border);
                background: linear-gradient(135deg, #ffffff, #fef7f7);
                box-shadow:
                    0 0 0 4px rgba(var(--primary-rgb), 0.1), /* Changed to primary-rgb for red focus */
                    0 8px 25px rgba(var(--primary-rgb), 0.15),
                    0 4px 12px rgba(0, 0, 0, 0.1);
                transform: translateY(-2px) scale(1.01);
            }

            .dark .form-input:focus {
                background: var(--primary-bg);
                box-shadow:
                    0 0 0 4px rgba(var(--primary-rgb), 0.2), /* Changed to primary-rgb for red focus */
                    0 8px 25px rgba(var(--primary-rgb), 0.25),
                    0 4px 12px rgba(0, 0, 0, 0.2);
            }

            /* Hover Effects for Inputs */
            .form-input:hover:not(:focus) {
                border-color: #d1d5db;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.08);
                transform: translateY(-1px);
            }

            .dark .form-input:hover:not(:focus) {
                border-color: var(--hover-bg);
            }

            /* Textarea Specific Styling */
            textarea.form-input {
                resize: vertical;
                min-height: 140px;
                line-height: 1.6;
            }

            /* Enhanced Label Styling */
            .form-label {
                display: block;
                font-size: 1.125rem;
                font-weight: 600;
                color: var(--primary-bg); /* Default color for light mode */
                margin-bottom: 0.75rem;
                transition: all 0.3s ease;
            }

            .dark .form-label {
                color: white; /* Changed to white for better contrast in dark mode */
            }

            .form-label .required {
                color: var(--hover-bg);
                margin-left: 0.25rem;
                font-weight: 700;
            }

            /* Form Field Container */
            .form-field {
                margin-bottom: 2rem;
                opacity: 0;
                animation: fadeInField 0.6s ease-out forwards;
            }

            /* Input field staggered animations */
            @keyframes fadeInField {
                from {
                    opacity: 0;
                    transform: translateY(30px) scale(0.95);
                }
                to {
                    opacity: 1;
                    transform: translateY(0) scale(1);
                }
            }

            .form-field:nth-child(1) { animation-delay: 0.1s; }
            .form-field:nth-child(2) { animation-delay: 0.2s; }
            .form-field:nth-child(3) { animation-delay: 0.3s; }
            .form-field:nth-child(4) { animation-delay: 0.4s; }
            .form-field:nth-child(5) { animation-delay: 0.5s; }
            .form-field:nth-child(6) { animation-delay: 0.6s; }
            .form-field:nth-child(7) { animation-delay: 0.7s; }

            /* Enhanced Form Header */
            .form-header {
                /* Changed to match the red gradient theme */
                background: linear-gradient(135deg, #fef2f2, #fecaca); /* Light red gradient */
                border-bottom: 1px solid #fca5a5; /* Red-300 */
                padding: 2rem;
                position: relative;
                overflow: hidden;
                transition: all 0.3s ease-in-out;
            }

            .dark .form-header {
                background: linear-gradient(135deg, var(--secondary-bg), var(--primary-bg));
                border-bottom-color: var(--primary-border);
            }

            .form-header::before {
                content: '';
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                height: 4px;
                /* Adjusted gradientShift to use red tones */
                background: linear-gradient(90deg, #fca5a5, #ef4444, #fca5a5);
                background-size: 200% 100%;
                animation: gradientShift 3s ease-in-out infinite;
            }

            @keyframes gradientShift {
                0%, 100% { background-position: 0% 50%; }
                50% { background-position: 100% 50%; }
            }

            /* Form Body Enhanced */
            .form-body {
                padding: 2.5rem;
                background: linear-gradient(135deg, #ffffff, #fefefe);
                transition: all 0.3s ease-in-out;
            }

            .dark .form-body {
                background: linear-gradient(135deg, var(--primary-bg), var(--secondary-bg));
            }

            /* Focus-within effects for form sections */
            .form-field:focus-within .form-label {
                color: var(--primary-border);
                transform: translateY(-2px);
            }

            /* Checkbox styling */
            .checkbox-container {
                background: linear-gradient(135deg, #f9fafb, #f3f4f6);
                border: 2px solid #e5e7eb;
                border-radius: 12px;
                padding: 1rem;
                cursor: pointer;
                transition: all 0.3s ease-in-out;
            }

            .dark .checkbox-container {
                background: var(--primary-bg);
                border-color: var(--primary-border);
            }

            .checkbox-container:hover {
                border-color: var(--primary-border);
                background: linear-gradient(135deg, #ffffff, #f8fafc);
                transform: translateY(-1px);
                box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            }

            .dark .checkbox-container:hover {
                background: var(--secondary-bg);
                border-color: var(--hover-bg);
            }

            /* Checkbox checked state */
            .checkbox-container.has-checked {
                background: linear-gradient(135deg, #fef3c7, #fde68a); /* Yellow gradient for checked state */
                border-color: #f59e0b; /* Yellow-500 */
                box-shadow: 0 6px 15px rgba(245, 158, 11, 0.3);
            }

            .dark .checkbox-container.has-checked {
                background: linear-gradient(135deg, #92400e, #b45309); /* Darker yellow gradient */
                border-color: #d97706; /* Yellow-700 */
                box-shadow: 0 6px 15px rgba(217, 119, 6, 0.4);
            }

            .checkbox-container .peer-checked-bg {
                background: var(--primary-bg-light);
                border-color: var(--primary-bg-light);
            }

            .dark .checkbox-container .peer-checked-bg {
                background: var(--hover-bg);
                border-color: var(--hover-bg);
            }

            /* Submit button gradient */
            .bg-secondary-gradient {
                background: linear-gradient(90deg, var(--action-gradient-from), var(--action-gradient-to));
            }

            .bg-secondary-gradient:hover {
                background: linear-gradient(90deg, var(--action-gradient-hover-from), var(--action-gradient-hover-to));
            }

            /* Cancel button styling */
            .btn-cancel {
                border: 1px solid var(--primary-border);
                color: var(--primary-bg);
                background: white;
            }

            .dark .btn-cancel {
                color: white; /* Changed to white for better contrast in dark mode */
                background: var(--primary-bg);
                border-color: var(--primary-border);
            }

            .btn-cancel:hover {
                background: var(--action-gradient-from); /* Use red gradient for hover */
                color: white;
                border-color: var(--action-gradient-from);
            }

            .dark .btn-cancel:hover {
                background: var(--action-gradient-hover-from); /* Darker red gradient for hover */
                color: white;
                border-color: var(--action-gradient-hover-from);
            }


            /* Mobile responsive adjustments */
            @media (max-width: 768px) {
                .form-input {
                    padding: 1rem 1.25rem;
                    font-size: 0.9375rem;
                }

                .form-body {
                    padding: 1.5rem;
                }

                .form-header {
                    padding: 1.5rem;
                }

                .form-field {
                    margin-bottom: 1.5rem;
                }
            }
        </style>

        <div class="w-full max-w-3xl animate-fade-in animate-delay-200">
            <div class="form-container">
                <div class="form-header">
                    <h2 class="text-xl font-bold text-gray-800 dark:text-gray-100 mb-2 transition-all duration-300 ease-in-out">Timesheet Details</h2>
                    <p class="text-gray-600 dark:text-gray-300">Edit the details for this timesheet entry</p>
                </div>
                <div class="form-body">
                    <form method="POST" action="{{ route('tasks.timesheets.update', [$projectId, $task->id, $timesheet->id]) }}" class="space-y-0">
                        @csrf
                        @method('PUT')

                        <!-- Date -->
                        <div class="form-field">
                            <label for="date" class="form-label">
                                <div class="flex items-center space-x-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 dark:text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3a2 2 0 012-2h4a2 2 0 012 2v4m-6 0V6a2 2 0 012-2h4a2 2 0 012 2v1m-6 0h6m-6 0l-1 1m7-1l1 1m-1-1v4a2 2 0 01-2 2H9a2 2 0 01-2-2V8m8 0V9a2 2 0 01-2 2H9a2 2 0 01-2-2V8" />
                                    </svg>
                                    <span>Date</span>
                                    <span class="required">*</span>
                                </div>
                            </label>
                            <input
                                type="date"
                                name="date"
                                id="date"
                                value="{{ old('date', $timesheet->date) }}"
                                required
                                class="form-input"
                            >
                        </div>

                        <!-- Hours Worked -->
                        <div class="form-field">
                            <label for="hours_worked" class="form-label">
                                <div class="flex items-center space-x-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 dark:text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <span>Hours Worked</span>
                                    <span class="required">*</span>
                                </div>
                            </label>
                            <input
                                type="number"
                                name="hours_worked"
                                id="hours_worked"
                                step="0.01"
                                min="0.1"
                                max="24"
                                value="{{ old('hours_worked', $timesheet->hours_worked) }}"
                                required
                                class="form-input"
                            >
                        </div>

                        <!-- Description -->
                        <div class="form-field">
                            <label for="description" class="form-label">
                                <div class="flex items-center space-x-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 dark:text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" />
                                    </svg>
                                    <span>Description</span>
                                </div>
                            </label>
                            <textarea
                                name="description"
                                id="description"
                                rows="5"
                                placeholder="Enter a description of your work..."
                                class="form-input"
                            >{{ old('description', $timesheet->description) }}</textarea>
                        </div>

                        <!-- Submit Buttons -->
                        <div class="form-field">
                            <div class="flex flex-col sm:flex-row items-start sm:items-center justify-end pt-6 space-y-4 sm:space-y-0 sm:space-x-4">
                                <a href="{{ route('tasks.timesheets.index', [$projectId, 'task' => $task->id]) }}" class="inline-flex items-center px-8 py-4 rounded-full shadow-md transition-all duration-300 ease-in-out hover:shadow-lg w-full sm:w-auto justify-center btn-cancel">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                    Cancel
                                </a>
                                <button type="submit" class="inline-flex items-center px-8 py-4 border border-transparent text-base font-semibold rounded-full shadow-xl text-white bg-secondary-gradient hover:bg-hover focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-300 ease-in-out hover:shadow-2xl hover:-translate-y-1 w-full sm:w-auto justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 transition-transform duration-300 ease-in-out" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                    </svg>
                                    Update Timesheet
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
