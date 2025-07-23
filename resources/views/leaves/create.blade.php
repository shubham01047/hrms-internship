<x-app-layout>
    @can('apply leave')
        <div class="py-12 bg-gray-100 min-h-screen animate-fade-in">
            <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg transition-all duration-500 ease-in-out hover:shadow-2xl">
                    <div class="p-6 text-black">
                        
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
                            
                            /* Form slide-up animation */
                            @keyframes formSlideUp {
                                from {
                                    opacity: 0;
                                    transform: translateY(40px) scale(0.95);
                                }
                                to {
                                    opacity: 1;
                                    transform: translateY(0) scale(1);
                                }
                            }
                            
                            .animate-form-slide {
                                animation: formSlideUp 1s ease-out forwards;
                            }
                            
                            /* Card hover effect */
                            .info-card:hover {
                                transform: translateY(-4px) scale(1.02);
                                box-shadow: 0 12px 30px rgba(0, 0, 0, 0.15);
                            }
                            
                            /* Enhanced Form Container */
                            .form-container {
                                border-radius: 20px;
                                overflow: hidden;
                                box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.15), 0 10px 20px -5px rgba(0, 0, 0, 0.1);
                                border: 1px solid #e5e7eb;
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
                                border-color: #ef4444;
                                background: linear-gradient(135deg, #ffffff, #fef7f7);
                                box-shadow: 
                                    0 0 0 4px rgba(239, 68, 68, 0.1),
                                    0 8px 25px rgba(239, 68, 68, 0.15),
                                    0 4px 12px rgba(0, 0, 0, 0.1);
                                transform: translateY(-2px) scale(1.01);
                            }
                            
                            /* Hover Effects for Inputs */
                            .form-input:hover:not(:focus) {
                                border-color: #d1d5db;
                                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.08);
                                transform: translateY(-1px);
                            }
                            
                            /* Select Dropdown Styling */
                            .form-input select,
                            select.form-input {
                                appearance: none;
                                background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%236b7280' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='m6 8 4 4 4-4'/%3e%3c/svg%3e");
                                background-position: right 1rem center;
                                background-repeat: no-repeat;
                                background-size: 1.5em 1.5em;
                                padding-right: 3rem;
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
                                font-size: 0.9375rem;
                                font-weight: 600;
                                color: #374151;
                                margin-bottom: 0.75rem;
                                transition: all 0.3s ease;
                            }
                            
                            .form-label .required {
                                color: #ef4444;
                                margin-left: 0.25rem;
                                font-weight: 700;
                            }
                            
                            .form-label svg {
                                transition: all 0.3s ease;
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
                            
                            /* Form Grid Layout */
                            .form-grid {
                                display: grid;
                                grid-template-columns: 1fr;
                                gap: 2rem;
                            }
                            
                            @media (min-width: 768px) {
                                .form-grid-2 {
                                    grid-template-columns: 1fr 1fr;
                                    gap: 2.5rem;
                                }
                            }
                            
                            /* Enhanced Help Text */
                            .help-text {
                                font-size: 0.8125rem;
                                color: #6b7280;
                                margin-top: 0.5rem;
                                line-height: 1.5;
                                transition: all 0.3s ease;
                            }
                            
                            .form-input:focus + .help-text,
                            .form-field:focus-within .help-text {
                                color: #ef4444;
                                transform: translateX(4px);
                            }
                            
                            /* Form Section Dividers */
                            .form-divider {
                                border: none;
                                height: 1px;
                                background: linear-gradient(90deg, transparent, #e5e7eb, transparent);
                                margin: 2.5rem 0;
                                transition: all 0.3s ease;
                            }
                            
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
                                background: linear-gradient(90deg, #ef4444, #f87171, #ef4444);
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
                                color: #ef4444;
                                transform: translateY(-2px);
                            }
                            
                            .form-field:focus-within .form-label svg {
                                color: #ef4444;
                                transform: scale(1.1);
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

                        <!-- Page Header with Animation -->
                        <div class="bg-gradient-to-r from-red-500 to-red-600 text-white p-6 rounded-xl shadow-lg mb-8 animate-fade-in transition-all duration-300 ease-in-out hover:shadow-2xl hover:scale-105">
                            <div class="flex items-center justify-between">
                                <div class="transition-all duration-300 ease-in-out">
                                    <h2 class="text-3xl font-bold mb-2">Apply for Leave</h2>
                                    <p class="text-red-100">Submit your leave application for approval</p>
                                </div>
                                <div class="hidden md:flex items-center space-x-4">
                                    <div class="bg-white bg-opacity-20 rounded-lg p-3 transition-all duration-300 ease-in-out hover:bg-opacity-30 hover:scale-110">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 transition-transform duration-300 ease-in-out" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Info Cards with Staggered Animation -->
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                            <div class="info-card bg-gradient-to-br from-blue-50 to-blue-100 p-6 rounded-xl border border-blue-200 shadow-md animate-fade-in animate-delay-100 transition-all duration-300 ease-in-out">
                                <div class="flex items-center">
                                    <div class="bg-blue-500 bg-opacity-20 rounded-full p-3 mr-4 transition-all duration-300 ease-in-out hover:bg-opacity-30 hover:scale-110">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <h3 class="text-blue-800 font-semibold transition-colors duration-300 ease-in-out">Quick Process</h3>
                                        <p class="text-blue-600 text-sm">Fast approval workflow</p>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="info-card bg-gradient-to-br from-green-50 to-green-100 p-6 rounded-xl border border-green-200 shadow-md animate-fade-in animate-delay-200 transition-all duration-300 ease-in-out">
                                <div class="flex items-center">
                                    <div class="bg-green-500 bg-opacity-20 rounded-full p-3 mr-4 transition-all duration-300 ease-in-out hover:bg-opacity-30 hover:scale-110">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <h3 class="text-green-800 font-semibold transition-colors duration-300 ease-in-out">Real-time Status</h3>
                                        <p class="text-green-600 text-sm">Track your application</p>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="info-card bg-gradient-to-br from-purple-50 to-purple-100 p-6 rounded-xl border border-purple-200 shadow-md animate-fade-in animate-delay-300 transition-all duration-300 ease-in-out">
                                <div class="flex items-center">
                                    <div class="bg-purple-500 bg-opacity-20 rounded-full p-3 mr-4 transition-all duration-300 ease-in-out hover:bg-opacity-30 hover:scale-110">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <h3 class="text-purple-800 font-semibold transition-colors duration-300 ease-in-out">24/7 Available</h3>
                                        <p class="text-purple-600 text-sm">Apply anytime</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Enhanced Leave Application Form -->
                        <div class="animate-fade-in animate-delay-400">
                            <div class="mb-6 transition-all duration-300 ease-in-out">
                                <h3 class="text-xl font-semibold text-gray-800 mb-2">Leave Application Form</h3>
                                <p class="text-gray-600">Please fill in all required information</p>
                            </div>
                            
                            <div class="form-container animate-form-slide">
                                <div class="form-header">
                                    <h4 class="text-xl font-bold text-gray-800 mb-2 transition-all duration-300 ease-in-out">Application Details</h4>
                                    <p class="text-gray-600">Complete the form below to submit your leave request</p>
                                </div>
                                
                                <div class="form-body">
                                    <form action="{{ route('leaves.store') }}" method="POST" class="space-y-0">
                                        @csrf
                                        
                                        <!-- Leave Type -->
                                        <div class="form-field">
                                            <label class="form-label">
                                                <div class="flex items-center space-x-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                                                    </svg>
                                                    <span>Leave Type</span>
                                                    <span class="required">*</span>
                                                </div>
                                            </label>
                                            <select name="leave_type_id" required class="form-input">
                                                <option value="" selected>Select Leave Type</option>
                                                @foreach ($leaveTypes as $type)
                                                    <option value="{{ $type->id }}" title="{{ $type->description }}">{{ $type->name }}</option>
                                                @endforeach
                                            </select>
                                            <p class="help-text">Choose the appropriate leave type for your request</p>
                                        </div>

                                        <hr class="form-divider">

                                        <!-- Date Range -->
                                        <div class="form-grid form-grid-2">
                                            <!-- Start Date -->
                                            <div class="form-field">
                                                <label class="form-label">
                                                    <div class="flex items-center space-x-2">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3a2 2 0 012-2h4a2 2 0 012 2v4m-6 0V6a2 2 0 012-2h4a2 2 0 012 2v1m-6 0h6m-6 0l-1 1m7-1l1 1m-1-1v4a2 2 0 01-2 2H9a2 2 0 01-2-2V8m8 0V9a2 2 0 01-2 2H9a2 2 0 01-2-2V8" />
                                                        </svg>
                                                        <span>Start Date</span>
                                                        <span class="required">*</span>
                                                    </div>
                                                </label>
                                                <input type="date" name="start_date" required class="form-input">
                                                <p class="help-text">Select the first day of your leave</p>
                                            </div>

                                            <!-- End Date -->
                                            <div class="form-field">
                                                <label class="form-label">
                                                    <div class="flex items-center space-x-2">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3a2 2 0 012-2h4a2 2 0 012 2v4m-6 0V6a2 2 0 012-2h4a2 2 0 012 2v1m-6 0h6m-6 0l-1 1m7-1l1 1m-1-1v4a2 2 0 01-2 2H9a2 2 0 01-2-2V8m8 0V9a2 2 0 01-2 2H9a2 2 0 01-2-2V8" />
                                                        </svg>
                                                        <span>End Date</span>
                                                        <span class="required">*</span>
                                                    </div>
                                                </label>
                                                <input type="date" name="end_date" required class="form-input">
                                                <p class="help-text">Select the last day of your leave</p>
                                            </div>
                                        </div>

                                        <hr class="form-divider">

                                        <!-- Reason -->
                                        <div class="form-field">
                                            <label class="form-label">
                                                <div class="flex items-center space-x-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                    </svg>
                                                    <span>Reason for Leave</span>
                                                    <span class="required">*</span>
                                                </div>
                                            </label>
                                            <textarea 
                                                name="reason" 
                                                required 
                                                rows="6" 
                                                placeholder="Please provide a detailed reason for your leave request. Include any relevant information that will help with the approval process..."
                                                class="form-input"
                                            ></textarea>
                                            <p class="help-text">Provide a clear and detailed explanation for your leave request to expedite approval</p>
                                        </div>

                                        <hr class="form-divider">

                                        <!-- Submit Button -->
                                        <div class="form-field">
                                            <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between pt-4 space-y-4 sm:space-y-0">
                                                <div class="flex items-center text-sm text-gray-500 transition-all duration-300 ease-in-out">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                    </svg>
                                                    <span>All fields marked with <span class="text-red-500 font-semibold">*</span> are required</span>
                                                </div>
                                                <button type="submit" class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-red-500 to-red-600 text-white font-semibold rounded-lg shadow-md transition-all duration-300 ease-in-out hover:scale-105 hover:shadow-xl hover:from-red-600 hover:to-red-700 transform hover:-translate-y-1 w-full sm:w-auto">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 transition-transform duration-300 ease-in-out" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                                                    </svg>
                                                    Submit Application
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- Help Section -->
                        <div class="mt-8 bg-gradient-to-r from-blue-50 to-indigo-50 rounded-xl p-6 border border-blue-200 animate-fade-in animate-delay-500 transition-all duration-300 ease-in-out hover:shadow-lg hover:scale-102">
                            <div class="flex items-start">
                                <div class="flex-shrink-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600 transition-transform duration-300 ease-in-out hover:scale-110" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <h3 class="text-sm font-medium text-blue-800 transition-colors duration-300 ease-in-out">Need Help?</h3>
                                    <div class="mt-2 text-sm text-blue-700">
                                        <ul class="list-disc list-inside space-y-1">
                                            <li class="transition-all duration-300 ease-in-out hover:text-blue-800">Make sure to select the appropriate leave type for your request</li>
                                            <li class="transition-all duration-300 ease-in-out hover:text-blue-800">Provide sufficient notice period as per company policy</li>
                                            <li class="transition-all duration-300 ease-in-out hover:text-blue-800">Include detailed reason to expedite the approval process</li>
                                            <li class="transition-all duration-300 ease-in-out hover:text-blue-800">Contact HR for any questions regarding leave policies</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endcan
</x-app-layout>