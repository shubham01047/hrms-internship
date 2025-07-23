<x-app-layout>
    @can('approve leave')
        <div class="py-12 bg-gray-100 min-h-screen animate-fade-in">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
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
                            
                            /* Table row slide-up animation */
                            @keyframes slideUpFadeIn {
                                from {
                                    opacity: 0;
                                    transform: translateY(20px);
                                }
                                to {
                                    opacity: 1;
                                    transform: translateY(0);
                                }
                            }
                            
                            .animate-slide-up {
                                animation: slideUpFadeIn 0.6s ease-out forwards;
                            }
                            
                            /* Enhanced table styles */
                            .enhanced-table {
                                border-radius: 16px;
                                overflow: hidden;
                                box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
                                border: 1px solid #e5e7eb;
                                background: white;
                                transition: all 0.3s ease-in-out;
                            }
                            
                            .enhanced-table:hover {
                                box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.15);
                                transform: translateY(-2px);
                            }
                            
                            .table-container {
                                overflow-x: auto;
                                scrollbar-width: thin;
                                scrollbar-color: #cbd5e1 #f1f5f9;
                            }
                            
                            .table-container::-webkit-scrollbar {
                                height: 10px;
                            }
                            
                            .table-container::-webkit-scrollbar-track {
                                background: #f1f5f9;
                                border-radius: 5px;
                            }
                            
                            .table-container::-webkit-scrollbar-thumb {
                                background: linear-gradient(135deg, #cbd5e1, #94a3b8);
                                border-radius: 5px;
                                transition: background 0.3s ease;
                            }
                            
                            .table-container::-webkit-scrollbar-thumb:hover {
                                background: linear-gradient(135deg, #94a3b8, #64748b);
                            }
                            
                            .enhanced-table table {
                                width: 100%;
                                min-width: 700px;
                                border-collapse: separate;
                                border-spacing: 0;
                            }
                            
                            .enhanced-table thead th {
                                background: linear-gradient(135deg, #1f2937, #374151);
                                color: white;
                                font-weight: 600;
                                text-transform: uppercase;
                                font-size: 0.75rem;
                                letter-spacing: 0.05em;
                                padding: 1.25rem 1.5rem;
                                text-align: left;
                                position: sticky;
                                top: 0;
                                z-index: 10;
                                transition: all 0.3s ease-in-out;
                            }
                            
                            .enhanced-table thead th:hover {
                                background: linear-gradient(135deg, #374151, #4b5563);
                            }
                            
                            .enhanced-table thead th:first-child {
                                border-top-left-radius: 16px;
                            }
                            
                            .enhanced-table thead th:last-child {
                                border-top-right-radius: 16px;
                            }
                            
                            .enhanced-table tbody tr {
                                transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
                                border-bottom: 1px solid #f3f4f6;
                                position: relative;
                                opacity: 0;
                            }
                            
                            .enhanced-table tbody tr:nth-child(even) {
                                background: linear-gradient(135deg, #fafafa, #f8fafc);
                            }
                            
                            .enhanced-table tbody tr:nth-child(odd) {
                                background: linear-gradient(135deg, #ffffff, #fefefe);
                            }
                            
                            .enhanced-table tbody tr:hover {
                                background: linear-gradient(135deg, #fef2f2, #fef7f7) !important;
                                transform: translateY(-2px) scale(1.01);
                                box-shadow: 0 10px 25px rgba(239, 68, 68, 0.15);
                                border-left: 4px solid #ef4444;
                                z-index: 5;
                            }
                            
                            .enhanced-table tbody tr:hover td {
                                border-color: #fecaca;
                            }
                            
                            .enhanced-table tbody td {
                                padding: 1.5rem 1.5rem;
                                vertical-align: middle;
                                border-right: 1px solid #f3f4f6;
                                transition: all 0.3s ease;
                            }
                            
                            .enhanced-table tbody td:last-child {
                                border-right: none;
                            }
                            
                            .enhanced-table tbody tr:last-child td:first-child {
                                border-bottom-left-radius: 16px;
                            }
                            
                            .enhanced-table tbody tr:last-child td:last-child {
                                border-bottom-right-radius: 16px;
                            }
                            
                            /* Row animation delays */
                            .enhanced-table tbody tr:nth-child(1) { animation-delay: 0.1s; }
                            .enhanced-table tbody tr:nth-child(2) { animation-delay: 0.2s; }
                            .enhanced-table tbody tr:nth-child(3) { animation-delay: 0.3s; }
                            .enhanced-table tbody tr:nth-child(4) { animation-delay: 0.4s; }
                            .enhanced-table tbody tr:nth-child(5) { animation-delay: 0.5s; }
                            .enhanced-table tbody tr:nth-child(6) { animation-delay: 0.6s; }
                            .enhanced-table tbody tr:nth-child(7) { animation-delay: 0.7s; }
                            .enhanced-table tbody tr:nth-child(8) { animation-delay: 0.8s; }
                            .enhanced-table tbody tr:nth-child(n+9) { animation-delay: 0.9s; }
                            
                            /* Empty state animation */
                            .empty-state {
                                background: linear-gradient(135deg, #f8fafc, #f1f5f9);
                                border-radius: 16px;
                                border: 2px dashed #cbd5e1;
                                transition: all 0.3s ease-in-out;
                            }
                            
                            .empty-state:hover {
                                border-color: #94a3b8;
                                transform: translateY(-2px);
                                box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
                            }
                        </style>

                        <!-- Page Header with Animation -->
                        <div class="bg-gradient-to-r from-red-500 to-red-600 text-white p-6 rounded-xl shadow-lg mb-8 animate-fade-in transition-all duration-300 ease-in-out hover:shadow-2xl hover:scale-105">
                            <div class="flex items-center justify-between">
                                <div class="transition-all duration-300 ease-in-out">
                                    <h2 class="text-3xl font-bold mb-2">Pending Leave Requests</h2>
                                    <p class="text-red-100">Review and manage employee leave applications</p>
                                </div>
                                <div class="hidden md:flex items-center space-x-4">
                                    <div class="bg-white bg-opacity-20 rounded-lg p-3 transition-all duration-300 ease-in-out hover:bg-opacity-30 hover:scale-110">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 transition-transform duration-300 ease-in-out" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </div>
                                    <div class="text-right transition-all duration-300 ease-in-out">
                                        <div class="text-2xl font-bold">{{ $leaves->count() }}</div>
                                        <div class="text-sm text-red-100">Pending Requests</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Quick Stats with Staggered Animation -->
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                            <div class="bg-gradient-to-br from-yellow-50 to-yellow-100 p-6 rounded-xl border border-yellow-200 shadow-md animate-fade-in animate-delay-100 transition-all duration-300 ease-in-out hover:shadow-xl hover:scale-105 hover:-translate-y-2">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <p class="text-yellow-600 text-sm font-medium">Pending Review</p>
                                        <p class="text-3xl font-bold text-yellow-800 transition-all duration-300 ease-in-out">{{ $leaves->count() }}</p>
                                    </div>
                                    <div class="bg-yellow-500 bg-opacity-20 rounded-full p-3 transition-all duration-300 ease-in-out hover:bg-opacity-30 hover:scale-110">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-yellow-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="bg-gradient-to-br from-blue-50 to-blue-100 p-6 rounded-xl border border-blue-200 shadow-md animate-fade-in animate-delay-200 transition-all duration-300 ease-in-out hover:shadow-xl hover:scale-105 hover:-translate-y-2">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <p class="text-blue-600 text-sm font-medium">Urgent Reviews</p>
                                        <p class="text-3xl font-bold text-blue-800 transition-all duration-300 ease-in-out">{{ $leaves->where('created_at', '>=', now()->subDays(3))->count() }}</p>
                                    </div>
                                    <div class="bg-blue-500 bg-opacity-20 rounded-full p-3 transition-all duration-300 ease-in-out hover:bg-opacity-30 hover:scale-110">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="bg-gradient-to-br from-purple-50 to-purple-100 p-6 rounded-xl border border-purple-200 shadow-md animate-fade-in animate-delay-300 transition-all duration-300 ease-in-out hover:shadow-xl hover:scale-105 hover:-translate-y-2">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <p class="text-purple-600 text-sm font-medium">This Week</p>
                                        <p class="text-3xl font-bold text-purple-800 transition-all duration-300 ease-in-out">{{ $leaves->where('created_at', '>=', now()->startOfWeek())->count() }}</p>
                                    </div>
                                    <div class="bg-purple-500 bg-opacity-20 rounded-full p-3 transition-all duration-300 ease-in-out hover:bg-opacity-30 hover:scale-110">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3a2 2 0 012-2h4a2 2 0 012 2v4m-6 0V6a2 2 0 012-2h4a2 2 0 012 2v1m-6 0h6m-6 0l-1 1m7-1l1 1m-1-1v4a2 2 0 01-2 2H9a2 2 0 01-2-2V8m8 0V9a2 2 0 01-2 2H9a2 2 0 01-2-2V8" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Enhanced Leave Requests Table -->
                        <div class="animate-fade-in animate-delay-400">
                            <div class="mb-6">
                                <h3 class="text-xl font-semibold text-gray-800 mb-2 transition-all duration-300 ease-in-out">Leave Requests Awaiting Approval</h3>
                                <div class="flex items-center space-x-2">
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-yellow-100 text-yellow-800 border border-yellow-300 transition-all duration-300 ease-in-out hover:scale-105 hover:shadow-md">
                                        {{ $leaves->count() }} Pending Reviews
                                    </span>
                                </div>
                            </div>
                            
                            <div class="enhanced-table">
                                <div class="table-container">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th>
                                                    <div class="flex items-center space-x-2">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transition-transform duration-300 ease-in-out" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                                        </svg>
                                                        <span>Employee</span>
                                                    </div>
                                                </th>
                                                <th>
                                                    <div class="flex items-center space-x-2">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transition-transform duration-300 ease-in-out" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                                                        </svg>
                                                        <span>Leave Type</span>
                                                    </div>
                                                </th>
                                                <th>
                                                    <div class="flex items-center space-x-2">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transition-transform duration-300 ease-in-out" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3a2 2 0 012-2h4a2 2 0 012 2v4m-6 0V6a2 2 0 012-2h4a2 2 0 012 2v1m-6 0h6m-6 0l-1 1m7-1l1 1m-1-1v4a2 2 0 01-2 2H9a2 2 0 01-2-2V8m8 0V9a2 2 0 01-2 2H9a2 2 0 01-2-2V8" />
                                                        </svg>
                                                        <span>Start Date</span>
                                                    </div>
                                                </th>
                                                <th>
                                                    <div class="flex items-center space-x-2">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transition-transform duration-300 ease-in-out" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3a2 2 0 012-2h4a2 2 0 012 2v4m-6 0V6a2 2 0 012-2h4a2 2 0 012 2v1m-6 0h6m-6 0l-1 1m7-1l1 1m-1-1v4a2 2 0 01-2 2H9a2 2 0 01-2-2V8m8 0V9a2 2 0 01-2 2H9a2 2 0 01-2-2V8" />
                                                        </svg>
                                                        <span>End Date</span>
                                                    </div>
                                                </th>
                                                <th>
                                                    <div class="flex items-center space-x-2">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transition-transform duration-300 ease-in-out" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 100 4m0-4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 100 4m0-4v2m0-6V4" />
                                                        </svg>
                                                        <span>Actions</span>
                                                    </div>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($leaves as $leave)
                                                <tr class="animate-slide-up">
                                                    <td>
                                                        <div class="flex items-center">
                                                            <div class="flex-shrink-0 h-12 w-12">
                                                                <div class="h-12 w-12 rounded-full bg-gradient-to-r from-blue-500 to-purple-600 flex items-center justify-center text-white font-bold text-lg shadow-lg transition-all duration-300 ease-in-out hover:scale-110 hover:shadow-xl">
                                                                    {{ substr($leave->user->name, 0, 1) }}
                                                                </div>
                                                            </div>
                                                            <div class="ml-4">
                                                                <div class="text-sm font-semibold text-gray-900 transition-colors duration-300 ease-in-out">{{ $leave->user->name }}</div>
                                                                <div class="text-xs text-gray-500">Employee ID: #{{ $leave->user->id }}</div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="flex items-center">
                                                            <div class="flex-shrink-0 h-10 w-10">
                                                                <div class="h-10 w-10 rounded-full bg-gradient-to-r from-purple-400 to-pink-500 flex items-center justify-center shadow-md transition-all duration-300 ease-in-out hover:scale-110 hover:shadow-lg">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                                                                    </svg>
                                                                </div>
                                                            </div>
                                                            <div class="ml-3">
                                                                <div class="text-sm font-semibold text-gray-900 transition-colors duration-300 ease-in-out">{{ $leave->leaveType->name }}</div>
                                                                <div class="text-xs text-gray-500">Leave Request</div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="text-sm font-medium text-gray-900 transition-colors duration-300 ease-in-out">{{ \Carbon\Carbon::parse($leave->start_date)->format('d M, Y') }}</div>
                                                        <div class="text-xs text-gray-500">{{ \Carbon\Carbon::parse($leave->start_date)->format('l') }}</div>
                                                    </td>
                                                    <td>
                                                        <div class="text-sm font-medium text-gray-900 transition-colors duration-300 ease-in-out">{{ \Carbon\Carbon::parse($leave->end_date)->format('d M, Y') }}</div>
                                                        <div class="text-xs text-gray-500">{{ \Carbon\Carbon::parse($leave->end_date)->format('l') }}</div>
                                                    </td>
                                                    <td>
                                                        <div class="flex items-center space-x-3">
                                                            <form method="POST" action="{{ route('leaves.approve', $leave->id) }}" class="inline">
                                                                @csrf
                                                                <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-lg text-white bg-gradient-to-r from-green-500 to-green-600 shadow-md transition-all duration-300 ease-in-out hover:scale-105 hover:shadow-xl hover:from-green-600 hover:to-green-700 transform hover:-translate-y-1">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1 transition-transform duration-300 ease-in-out" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                                                    </svg>
                                                                    Approve
                                                                </button>
                                                            </form>
                                                            <form method="POST" action="{{ route('leaves.reject', $leave->id) }}" class="inline">
                                                                @csrf
                                                                <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-lg text-white bg-gradient-to-r from-red-500 to-red-600 shadow-md transition-all duration-300 ease-in-out hover:scale-105 hover:shadow-xl hover:from-red-600 hover:to-red-700 transform hover:-translate-y-1">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1 transition-transform duration-300 ease-in-out" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                                                    </svg>
                                                                    Reject
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                
                                @if($leaves->isEmpty())
                                    <div class="empty-state text-center py-20">
                                        <svg class="mx-auto h-20 w-20 text-gray-400 mb-6 transition-transform duration-300 ease-in-out hover:scale-110" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        <h3 class="text-xl font-medium text-gray-900 mb-2">No pending requests</h3>
                                        <p class="text-gray-500">All leave requests have been processed.</p>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endcan
</x-app-layout>