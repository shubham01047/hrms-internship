<x-app-layout>
    <style>
        .theme-app {
            --primary-bg: #0b1f3a;
            --primary-bg-light: #102c4e;
            --primary-text: #f8fafc;
            --primary-border: #1e3a5f;
            --hover-bg: #2563eb;
            --secondary-bg: #2c4e9c;
            --secondary-text: #cbd5e1;
        }
    </style>

    <!-- Professional header with gradient background -->
    <x-slot name="header">
        <div class="theme-app flex flex-col sm:flex-row justify-between items-center p-4 sm:p-6 rounded-lg shadow-sm"
            style="background: linear-gradient(to right, var(--secondary-bg), var(--primary-bg));">
            <div class="flex items-center space-x-4 mb-4 sm:mb-0">
                <div class="flex items-center justify-center w-12 h-12 rounded-full" 
                     style="background: var(--primary-bg-light);">
                    <svg class="w-6 h-6" style="color: var(--primary-text);" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                </div>
                <div>
                    <h1 class="text-xl sm:text-2xl font-bold" style="color: var(--primary-text);">
                        Attendance Reports
                    </h1>
                    <p class="text-sm" style="color: var(--secondary-text);">
                        Generate and download comprehensive attendance reports
                    </p>
                </div>
            </div>
            <div class="flex items-center space-x-3">
                <span class="px-3 py-1 rounded-full text-xs font-medium" 
                      style="background: var(--hover-bg); color: white;">
                    Export Ready
                </span>
            </div>
        </div>
    </x-slot>

    <!-- Removed max-width constraint and side padding to fit full page width -->
    <div class="py-4 sm:py-8 bg-gradient-to-br from-gray-50 to-blue-50 min-h-screen">
        <div class="w-full px-1 sm:px-2 space-y-6 sm:space-y-8">
            
            <!-- Statistics Cards -->
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 sm:gap-6">
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-4 sm:p-6 hover:shadow-md transition-shadow duration-200">
                    <div class="flex items-center">
                        <div class="p-2 sm:p-3 bg-blue-100 rounded-lg mr-3 sm:mr-4">
                            <svg class="w-5 h-5 sm:w-6 sm:h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-gray-900 font-semibold text-sm sm:text-base">Accurate Data</h3>
                            <p class="text-gray-600 text-xs sm:text-sm">Precise attendance tracking</p>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-4 sm:p-6 hover:shadow-md transition-shadow duration-200">
                    <div class="flex items-center">
                        <div class="p-2 sm:p-3 bg-green-100 rounded-lg mr-3 sm:mr-4">
                            <svg class="w-5 h-5 sm:w-6 sm:h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-gray-900 font-semibold text-sm sm:text-base">Fast Export</h3>
                            <p class="text-gray-600 text-xs sm:text-sm">Quick report generation</p>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-4 sm:p-6 hover:shadow-md transition-shadow duration-200">
                    <div class="flex items-center">
                        <div class="p-2 sm:p-3 bg-purple-100 rounded-lg mr-3 sm:mr-4">
                            <svg class="w-5 h-5 sm:w-6 sm:h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2h-2a2 2 0 00-2 2z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-gray-900 font-semibold text-sm sm:text-base">Multiple Formats</h3>
                            <p class="text-gray-600 text-xs sm:text-sm">PDF & Excel support</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Updated main form card to use white background like reference file -->
            <div class="bg-white rounded-xl shadow-xl overflow-hidden border border-gray-200">
                <!-- Card Header -->
                <div class="theme-app px-4 sm:px-6 py-3 sm:py-4 border-b border-gray-200"
                    style="background: linear-gradient(to right, var(--secondary-bg), var(--primary-bg));">
                    <div class="flex items-center space-x-2 sm:space-x-3">
                        <div class="p-1.5 sm:p-2 rounded-lg shadow-sm" style="background-color: var(--hover-bg);">
                            <svg class="w-4 h-4" style="color: var(--primary-text);" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-base sm:text-lg font-semibold" style="color: var(--primary-text);">Download Report</h3>
                            <p class="text-xs sm:text-sm" style="color: var(--secondary-text);">Generate attendance reports in your preferred format</p>
                        </div>
                    </div>
                </div>

                <!-- Updated form content with light theme styling -->
                <div class="p-4 sm:p-6">
                    <form method="POST" action="{{ route('attendance.report.download') }}" class="space-y-4 sm:space-y-6">
                        @csrf
                        
                        <!-- Date Range Section -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-6">
                            <div>
                                <label class="block text-sm sm:text-base font-semibold mb-2 sm:mb-3 text-gray-700">
                                    From Date
                                </label>
                                <input type="date" 
                                       name="from" 
                                       required
                                       class="w-full px-3 sm:px-4 py-2 sm:py-3 text-sm sm:text-base rounded-lg border border-gray-300 shadow-sm focus:ring-4 focus:ring-blue-200 focus:border-blue-500 transition-all duration-300 ease-in-out hover:border-gray-400 bg-gray-50 focus:bg-white">
                            </div>
                            
                            <div>
                                <label class="block text-sm sm:text-base font-semibold mb-2 sm:mb-3 text-gray-700">
                                    To Date
                                </label>
                                <input type="date" 
                                       name="to" 
                                       required
                                       class="w-full px-3 sm:px-4 py-2 sm:py-3 text-sm sm:text-base rounded-lg border border-gray-300 shadow-sm focus:ring-4 focus:ring-blue-200 focus:border-blue-500 transition-all duration-300 ease-in-out hover:border-gray-400 bg-gray-50 focus:bg-white">
                            </div>
                        </div>

                        <!-- Export Type Section -->
                        <div>
                            <label class="block text-sm sm:text-base font-semibold mb-2 sm:mb-3 text-gray-700">
                                Export Format
                            </label>
                            <select name="type" 
                                    required
                                    class="w-full px-3 sm:px-4 py-2 sm:py-3 text-sm sm:text-base rounded-lg border border-gray-300 shadow-sm focus:ring-4 focus:ring-blue-200 focus:border-blue-500 transition-all duration-300 ease-in-out hover:border-gray-400 bg-gray-50 focus:bg-white">
                                <option value="">Select File Type</option>
                                <option value="pdf">📄 PDF Document</option>
                                <option value="excel">📊 Excel Spreadsheet</option>
                            </select>
                        </div>

                        <!-- Info Section -->
                        <div class="bg-blue-50 border border-blue-200 rounded-lg p-3 sm:p-4">
                            <div class="flex items-start space-x-3">
                                <svg class="w-4 h-4 sm:w-5 sm:h-5 mt-0.5 flex-shrink-0 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                                </svg>
                                <div>
                                    <h4 class="text-sm sm:text-base font-semibold mb-1 text-blue-800">Report Information</h4>
                                    <p class="text-xs sm:text-sm text-blue-700">
                                        The report will include punch-in/out times, break durations, and total working hours for all employees within the selected date range.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex flex-col sm:flex-row gap-3 sm:gap-4 pt-4 sm:pt-6 border-t border-gray-200">
                            <button type="submit" 
                                    class="w-full sm:flex-1 px-4 sm:px-6 py-2.5 sm:py-3 text-sm sm:text-base rounded-lg font-semibold text-white transition-all duration-300 ease-in-out flex items-center justify-center space-x-2 bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-200 shadow-lg hover:shadow-xl">
                                <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                                <span>Download Report</span>
                            </button>
                            
                            <a href="{{ url()->previous() }}" 
                               class="w-full sm:flex-1 px-4 sm:px-6 py-2.5 sm:py-3 text-sm sm:text-base rounded-lg font-semibold text-center transition-all duration-300 ease-in-out flex items-center justify-center space-x-2 bg-white text-gray-700 border border-gray-300 hover:bg-gray-50 focus:ring-4 focus:ring-gray-200 shadow-sm hover:shadow-md">
                                <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                                <span>Cancel</span>
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
