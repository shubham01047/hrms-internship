<x-app-layout>
    <x-slot name="header">
        <h1 class="text-4xl font-extrabold text-[var(--secondary-text)] bg-[var(--secondary-bg)] px-6 py-4 rounded-lg drop-shadow-md">Edit Project</h1>

    </x-slot>

    <div class="py-12 sm:px-6 lg:px-8 bg-gray-100 min-h-[calc(100vh-64px)] theme-app flex items-center justify-center">
        {{-- Custom animations and styles --}}
        <style>
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
            
            /* Enhanced Focus Effects */
            .form-input:focus {
                border-color: var(--primary-border);
                background: linear-gradient(135deg, #ffffff, #fef7f7);
                box-shadow: 
                    0 0 0 4px rgba(var(--primary-rgb), 0.1),
                    0 8px 25px rgba(var(--primary-rgb), 0.15),
                    0 4px 12px rgba(0, 0, 0, 0.1);
                transform: translateY(-2px) scale(1.01);
            }
            
            /* Hover Effects for Inputs */
            .form-input:hover:not(:focus) {
                border-color: #d1d5db;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.08);
                transform: translateY(-1px);
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
                color: var(--primary-bg);
                margin-bottom: 0.75rem;
                transition: all 0.3s ease;
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
                background: linear-gradient(135deg, #f8fafc, #f1f5f9);
                border-bottom: 1px solid #e5e7eb;
                padding: 2rem;
                position: relative;
                overflow: hidden;
                transition: all 0.3s ease-in-out;
            }
            
            .form-header::before {
                content: '';
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                height: 4px;
                background: linear-gradient(90deg, var(--primary-border), var(--primary-bg-light), var(--primary-border));
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
            
            .checkbox-container:hover {
                border-color: var(--primary-border);
                background: linear-gradient(135deg, #ffffff, #f8fafc);
                transform: translateY(-1px);
                box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
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
                    <h2 class="text-xl font-bold text-gray-800 mb-2 transition-all duration-300 ease-in-out">Project Details</h2>
                    <p class="text-gray-600">Update the details for this project</p>
                </div>
                <div class="form-body">
                    <form method="POST" action="{{ route('projects.update', $project->id) }}" class="space-y-0">
                        @csrf
                        @method('PUT')

                        <!-- Project Title -->
                        <div class="form-field">
                            <label for="title" class="form-label">
                                <div class="flex items-center space-x-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                    <span>Project Title</span>
                                    <span class="required">*</span>
                                </div>
                            </label>
                            <input
                                type="text"
                                name="title"
                                id="title"
                                value="{{ $project->title }}"
                                required
                                placeholder="Enter project title..."
                                class="form-input"
                            >
                        </div>

                        <!-- Client Name -->
                        <div class="form-field">
                            <label for="client_name" class="form-label">
                                <div class="flex items-center space-x-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                    <span>Client Name</span>
                                </div>
                            </label>
                            <input
                                type="text"
                                name="client_name"
                                id="client_name"
                                value="{{ $project->client_name }}"
                                placeholder="Enter client name..."
                                class="form-input"
                            >
                        </div>

                        <!-- Budget -->
                        <div class="form-field">
                            <label for="budget" class="form-label">
                                <div class="flex items-center space-x-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1" />
                                    </svg>
                                    <span>Budget</span>
                                </div>
                            </label>
                            <input
                                type="number"
                                name="budget"
                                id="budget"
                                value="{{ $project->budget }}"
                                step="0.01"
                                placeholder="Enter project budget..."
                                class="form-input"
                            >
                        </div>

                        <!-- Deadline -->
                        <div class="form-field">
                            <label for="deadline" class="form-label">
                                <div class="flex items-center space-x-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3a2 2 0 012-2h4a2 2 0 012 2v4m-6 0V6a2 2 0 012-2h4a2 2 0 012 2v1m-6 0h6m-6 0l-1 1m7-1l1 1m-1-1v4a2 2 0 01-2 2H9a2 2 0 01-2-2V8m8 0V9a2 2 0 01-2 2H9a2 2 0 01-2-2V8" />
                                    </svg>
                                    <span>Deadline</span>
                                </div>
                            </label>
                            <input
                                type="date"
                                name="deadline"
                                id="deadline"
                                value="{{ $project->deadline }}"
                                class="form-input"
                            >
                        </div>

                        <!-- Description -->
                        <div class="form-field">
                            <label for="description" class="form-label">
                                <div class="flex items-center space-x-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" />
                                    </svg>
                                    <span>Description</span>
                                </div>
                            </label>
                            <textarea
                                name="description"
                                id="description"
                                rows="5"
                                placeholder="Enter project description..."
                                class="form-input"
                            >{{ $project->description }}</textarea>
                        </div>

                        <!-- Assign Employees -->
                        <div class="form-field">
                            <label class="form-label">
                                <div class="flex items-center space-x-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                    </svg>
                                    <span>Assign Employees</span>
                                </div>
                            </label>
                            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 mt-4">
                                @foreach ($users as $user)
                                    <label for="member-{{ $user->id }}" class="checkbox-container flex items-center">
                                        <input
                                            type="checkbox"
                                            name="members[]"
                                            value="{{ $user->id }}"
                                            id="member-{{ $user->id }}"
                                            class="hidden peer"
                                            {{ $project->members->contains($user->id) ? 'checked' : '' }}
                                        >
                                        <div class="h-5 w-5 border-2 border-gray-300 rounded flex items-center justify-center mr-3
                                                    peer-checked:bg-[var(--primary-bg)] peer-checked:border-[var(--primary-bg)] transition-all duration-200 ease-in-out">
                                            <svg class="h-4 w-4 text-white opacity-0 peer-checked:opacity-100 transition-opacity duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                            </svg>
                                        </div>
                                        <span class="text-base text-gray-900 font-medium">
                                            {{ $user->name }}
                                        </span>
                                    </label>
                                @endforeach
                            </div>
                        </div>

                        <!-- Submit Buttons -->
                        <div class="form-field">
                            <div class="flex flex-col sm:flex-row items-start sm:items-center justify-end pt-6 space-y-4 sm:space-y-0 sm:space-x-4">
                                <a href="{{ route('projects.index') }}" class="inline-flex items-center px-8 py-4 border border-gray-300 text-base font-medium rounded-full shadow-md text-gray-700 bg-white hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-all duration-300 ease-in-out hover:shadow-lg w-full sm:w-auto justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                    Cancel
                                </a>
                                <button type="submit" class="inline-flex items-center px-8 py-4 border border-transparent text-base font-semibold rounded-full shadow-xl text-white bg-secondary-gradient hover:bg-hover focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-300 ease-in-out hover:shadow-2xl hover:-translate-y-1 w-full sm:w-auto justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 transition-transform duration-300 ease-in-out" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                    </svg>
                                    Update Project
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>