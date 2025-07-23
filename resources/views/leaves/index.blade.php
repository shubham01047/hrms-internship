<x-app-layout>
    @can('view all leaves')
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
                                border-radius: 12px;
                                overflow: hidden;
                                box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
                                border: 1px solid #e5e7eb;
                                background: white;
                                transition: all 0.3s ease-in-out;
                            }
                            
                            .enhanced-table:hover {
                                box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
                                transform: translateY(-2px);
                            }
                            
                            .table-container {
                                overflow-x: auto;
                                scrollbar-width: thin;
                                scrollbar-color: #cbd5e1 #f1f5f9;
                            }
                            
                            .table-container::-webkit-scrollbar {
                                height: 8px;
                            }
                            
                            .table-container::-webkit-scrollbar-track {
                                background: #f1f5f9;
                                border-radius: 4px;
                            }
                            
                            .table-container::-webkit-scrollbar-thumb {
                                background: #cbd5e1;
                                border-radius: 4px;
                                transition: background 0.3s ease;
                            }
                            
                            .table-container::-webkit-scrollbar-thumb:hover {
                                background: #94a3b8;
                            }
                            
                            .enhanced-table table {
                                width: 100%;
                                min-width: 600px;
                                border-collapse: separate;
                                border-spacing: 0;
                            }
                            
                            .enhanced-table thead th {
                                background: linear-gradient(135deg, #f8fafc, #f1f5f9);
                                color: #374151;
                                font-weight: 600;
                                text-transform: uppercase;
                                font-size: 0.75rem;
                                letter-spacing: 0.05em;
                                padding: 1rem 1.5rem;
                                text-align: left;
                                border-bottom: 2px solid #e5e7eb;
                                position: sticky;
                                top: 0;
                                z-index: 10;
                                transition: all 0.3s ease-in-out;
                            }
                            
                            .enhanced-table thead th:hover {
                                background: linear-gradient(135deg, #f1f5f9, #e5e7eb);
                            }
                            
                            .enhanced-table thead th:first-child {
                                border-top-left-radius: 12px;
                            }
                            
                            .enhanced-table thead th:last-child {
                                border-top-right-radius: 12px;
                            }
                            
                            .enhanced-table tbody tr {
                                transition: all 0.3s ease-in-out;
                                border-bottom: 1px solid #f3f4f6;
                                opacity: 0;
                            }
                            
                            .enhanced-table tbody tr:nth-child(even) {
                                background-color: #fafafa;
                            }
                            
                            .enhanced-table tbody tr:nth-child(odd) {
                                background-color: #ffffff;
                            }
                            
                            .enhanced-table tbody tr:hover {
                                background: linear-gradient(135deg, #fef2f2, #fef7f7) !important;
                                transform: translateY(-2px) scale(1.01);
                                box-shadow: 0 8px 25px rgba(239, 68, 68, 0.15);
                                border-left: 4px solid #ef4444;
                                z-index: 5;
                            }
                            
                            .enhanced-table tbody td {
                                padding: 1.25rem 1.5rem;
                                vertical-align: middle;
                                border-right: 1px solid #f3f4f6;
                                transition: all 0.3s ease-in-out;
                            }
                            
                            .enhanced-table tbody td:last-child {
                                border-right: none;
                            }
                            
                            .enhanced-table tbody tr:last-child td:first-child {
                                border-bottom-left-radius: 12px;
                            }
                            
                            .enhanced-table tbody tr:last-child td:last-child {
                                border-bottom-right-radius: 12px;
                            }
                            
                            /* Status badges with enhanced animations */
                            .status-badge {
                                transition: all 0.3s ease-in-out;
                                transform: scale(1);
                            }
                            
                            .status-badge:hover {
                                transform: scale(1.05) translateY(-1px);
                                box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
                            }
                            
                            .status-pending { 
                                background: linear-gradient(135deg, #fef3c7, #fde68a);
                                color: #92400e;
                                border: 1px solid #f59e0b;
                                padding: 0.5rem 1rem;
                                border-radius: 20px;
                                font-weight: 600;
                                font-size: 0.75rem;
                                text-transform: uppercase;
                                letter-spacing: 0.05em;
                                box-shadow: 0 2px 4px rgba(245, 158, 11, 0.2);
                            }
                            
                            .status-approved { 
                                background: linear-gradient(135deg, #d1fae5, #a7f3d0);
                                color: #065f46;
                                border: 1px solid #10b981;
                                padding: 0.5rem 1rem;
                                border-radius: 20px;
                                font-weight: 600;
                                font-size: 0.75rem;
                                text-transform: uppercase;
                                letter-spacing: 0.05em;
                                box-shadow: 0 2px 4px rgba(16, 185, 129, 0.2);
                            }
                            
                            .status-rejected { 
                                background: linear-gradient(135deg, #fee2e2, #fecaca);
                                color: #991b1b;
                                border: 1px solid #ef4444;
                                padding: 0.5rem 1rem;
                                border-radius: 20px;
                                font-weight: 600;
                                font-size: 0.75rem;
                                text-transform: uppercase;
                                letter-spacing: 0.05em;
                                box-shadow: 0 2px 4px rgba(239, 68, 68, 0.2);
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
                                border-radius: 12px;
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
                                    <h2 class="text-3xl font-bold mb-2">My Leave Applications</h2>
                                    <p class="text-red-100">Track and manage your leave requests</p>
                                </div>
                                <div class="hidden md:flex items-center space-x-4">
                                    <div class="bg-white bg-opacity-20 rounded-lg p-3 transition-all duration-300 ease-in-out hover:bg-opacity-30 hover:scale-110">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 transition-transform duration-300 ease-in-out" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3a2 2 0 012-2h4a2 2 0 012 2v4m-6 0V6a2 2 0 012-2h4a2 2 0 012 2v1m-6 0h6m-6 0l-1 1m7-1l1 1m-1-1v4a2 2 0 01-2 2H9a2 2 0 01-2-2V8m8 0V9a2 2 0 01-2 2H9a2 2 0 01-2-2V8" />
                                        </svg>
                                    </div>
                                    <!-- Enhanced Apply Button with Animations -->
                                    <a href="{{ route('leaves.create') }}" class="inline-flex items-center px-6 py-3 bg-white text-red-600 font-semibold rounded-lg shadow-md transition-all duration-300 ease-in-out hover:scale-105 hover:shadow-xl hover:bg-red-50 transform hover:-translate-y-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 transition-transform duration-300 ease-in-out" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                        </svg>
                                        Apply for Leave
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Quick Stats with Staggered Animation -->
                        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
                            <div class="bg-gradient-to-br from-blue-50 to-blue-100 p-6 rounded-xl border border-blue-200 shadow-md animate-fade-in animate-delay-100 transition-all duration-300 ease-in-out hover:shadow-xl hover:scale-105 hover:-translate-y-2">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <p class="text-blue-600 text-sm font-medium">Total Applications</p>
                                        <p class="text-2xl font-bold text-blue-800 transition-all duration-300 ease-in-out">{{ $leaves->count() }}</p>
                                    </div>
                                    <div class="bg-blue-500 bg-opacity-20 rounded-full p-3 transition-all duration-300 ease-in-out hover:bg-opacity-30 hover:scale-110">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="bg-gradient-to-br from-green-50 to-green-100 p-6 rounded-xl border border-green-200 shadow-md animate-fade-in animate-delay-200 transition-all duration-300 ease-in-out hover:shadow-xl hover:scale-105 hover:-translate-y-2">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <p class="text-green-600 text-sm font-medium">Approved</p>
                                        <p class="text-2xl font-bold text-green-800 transition-all duration-300 ease-in-out">{{ $leaves->where('status', 'approved')->count() }}</p>
                                    </div>
                                    <div class="bg-green-500 bg-opacity-20 rounded-full p-3 transition-all duration-300 ease-in-out hover:bg-opacity-30 hover:scale-110">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="bg-gradient-to-br from-yellow-50 to-yellow-100 p-6 rounded-xl border border-yellow-200 shadow-md animate-fade-in animate-delay-300 transition-all duration-300 ease-in-out hover:shadow-xl hover:scale-105 hover:-translate-y-2">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <p class="text-yellow-600 text-sm font-medium">Pending</p>
                                        <p class="text-2xl font-bold text-yellow-800 transition-all duration-300 ease-in-out">{{ $leaves->where('status', 'pending')->count() }}</p>
                                    </div>
                                    <div class="bg-yellow-500 bg-opacity-20 rounded-full p-3 transition-all duration-300 ease-in-out hover:bg-opacity-30 hover:scale-110">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-yellow-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="bg-gradient-to-br from-red-50 to-red-100 p-6 rounded-xl border border-red-200 shadow-md animate-fade-in animate-delay-400 transition-all duration-300 ease-in-out hover:shadow-xl hover:scale-105 hover:-translate-y-2">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <p class="text-red-600 text-sm font-medium">Rejected</p>
                                        <p class="text-2xl font-bold text-red-800 transition-all duration-300 ease-in-out">{{ $leaves->where('status', 'rejected')->count() }}</p>
                                    </div>
                                    <div class="bg-red-500 bg-opacity-20 rounded-full p-3 transition-all duration-300 ease-in-out hover:bg-opacity-30 hover:scale-110">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Enhanced Leave Applications Table -->
                        <div class="animate-fade-in animate-delay-500">
                            <div class="flex items-center justify-between mb-4">
                                <div class="transition-all duration-300 ease-in-out">
                                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Leave Applications History</h3>
                                    <p class="text-gray-600">Total: {{ $leaves->count() }} applications</p>
                                </div>
                                <!-- Mobile Apply Button -->
                                <div class="md:hidden">
                                    <a href="{{ route('leaves.create') }}" class="inline-flex items-center px-4 py-2 bg-red-600 text-white font-semibold rounded-lg shadow-md transition-all duration-300 ease-in-out hover:scale-105 hover:shadow-xl hover:bg-red-700 transform hover:-translate-y-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                        </svg>
                                        Apply
                                    </a>
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
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                        </svg>
                                                        <span>Status</span>
                                                    </div>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($leaves as $leave)
                                                <tr class="animate-slide-up">
                                                    <td>
                                                        <div class="flex items-center">
                                                            <div class="flex-shrink-0 h-10 w-10">
                                                                <div class="h-10 w-10 rounded-full bg-gradient-to-r from-blue-400 to-blue-600 flex items-center justify-center transition-all duration-300 ease-in-out hover:scale-110 hover:shadow-lg">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                                                                    </svg>
                                                                </div>
                                                            </div>
                                                            <div class="ml-4">
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
                                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold status-{{ strtolower($leave->status) }} status-badge">
                                                            @if($leave->status === 'approved')
                                                                <svg class="w-3 h-3 mr-1 transition-transform duration-300 ease-in-out" fill="currentColor" viewBox="0 0 20 20">
                                                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                                                </svg>
                                                            @elseif($leave->status === 'rejected')
                                                                <svg class="w-3 h-3 mr-1 transition-transform duration-300 ease-in-out" fill="currentColor" viewBox="0 0 20 20">
                                                                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                                                </svg>
                                                            @else
                                                                <svg class="w-3 h-3 mr-1 transition-transform duration-300 ease-in-out" fill="currentColor" viewBox="0 0 20 20">
                                                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"></path>
                                                                </svg>
                                                            @endif
                                                            {{ ucfirst($leave->status) }}
                                                        </span>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                
                                @if($leaves->isEmpty())
                                    <div class="empty-state text-center py-16">
                                        <svg class="mx-auto h-16 w-16 text-gray-400 mb-4 transition-transform duration-300 ease-in-out hover:scale-110" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                        </svg>
                                        <h3 class="text-lg font-medium text-gray-900 mb-2">No leave applications</h3>
                                        <p class="text-gray-500 mb-6">You haven't submitted any leave applications yet.</p>
                                        <a href="{{ route('leaves.create') }}" class="inline-flex items-center px-6 py-3 bg-red-600 text-white font-semibold rounded-lg shadow-md transition-all duration-300 ease-in-out hover:scale-105 hover:shadow-xl hover:bg-red-700 transform hover:-translate-y-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                            </svg>
                                            Apply for Leave
                                        </a>
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