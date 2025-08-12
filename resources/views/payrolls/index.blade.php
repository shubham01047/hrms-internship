<x-app-layout>
    <div class="theme-app min-h-screen relative z-0" style="background-color: #f8fafc; color: var(--primary-text);">
        <!-- Header Section -->
        <div class="relative overflow-hidden" style="background: linear-gradient(135deg, var(--primary-bg-light) 0%, var(--secondary-bg) 100%);">
            <div class="absolute inset-0 opacity-10">
                <div class="absolute inset-0" style="background-image: radial-gradient(circle at 20% 50%, var(--hover-bg) 0%, transparent 50%), radial-gradient(circle at 80% 20%, var(--secondary-bg) 0%, transparent 50%);"></div>
            </div>
            <div class="relative px-4 sm:px-6 lg:px-8 py-8 sm:py-12">
                <div class="max-w-7xl mx-auto">
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                        <div class="flex items-center space-x-4">
                            <div class="p-3 rounded-xl" style="background-color: var(--hover-bg);">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                                </svg>
                            </div>
                            <div>
                                <h1 class="text-2xl sm:text-3xl lg:text-4xl font-bold" style="color: var(--primary-text);">
                                    Payroll Management
                                </h1>
                                <p class="text-sm sm:text-base mt-2" style="color: var(--secondary-text);">
                                    Generate and manage employee payrolls for {{ now()->format('M, Y') }}
                                </p>
                            </div>
                        </div>
                        <div class="flex flex-col sm:flex-row gap-3 lg:mr-24">
                            <a href="{{ route('payrolls.generateAll', now()->format('M, Y')) }}" 
                               class="inline-flex items-center justify-center px-4 py-2 text-sm font-medium text-white rounded-lg transition-all duration-200 hover:scale-105 hover:shadow-lg"
                               style="background-color: var(--hover-bg);">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                                Generate All ({{ now()->format('M, Y') }})
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 sm:py-8">
            <!-- Success/Error Messages -->
            @if (session('success'))
                <div class="mb-6 p-4 rounded-lg border-l-4" style="background-color: #f0fdf4; border-color: #10b981; color: #059669;">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 mr-2 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="text-sm sm:text-base">{{ session('success') }}</span>
                    </div>
                </div>
            @endif

            @if (session('error'))
                <div class="mb-6 p-4 rounded-lg border-l-4" style="background-color: #fef2f2; border-color: #ef4444; color: #dc2626;">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 mr-2 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="text-sm sm:text-base">{{ session('error') }}</span>
                    </div>
                </div>
            @endif

            <!-- Danger Zone -->
            <div class="mb-8 p-4 sm:p-6 rounded-xl border-2 border-red-500/20" style="background-color: #ffffff;">
                <div class="flex flex-col sm:flex-row sm:items-center mb-4 gap-3">
                    <div class="flex items-center">
                        <svg class="w-6 h-6 text-red-500 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z"></path>
                        </svg>
                        <h3 class="text-lg font-semibold text-red-500">Danger Zone</h3>
                    </div>
                </div>
                <p class="text-sm mb-4" style="color: var(--secondary-text);">
                    This action will permanently delete all payroll records. This cannot be undone.
                </p>
                <form method="POST" action="{{ route('payrolls.destroyAll') }}" onsubmit="return confirm('Delete ALL payrolls? This action cannot be undone!')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="w-full sm:w-auto inline-flex items-center justify-center px-4 py-2 text-sm font-medium text-white bg-red-600 rounded-lg hover:bg-red-700 transition-colors duration-200">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                        </svg>
                        Delete All Payrolls
                    </button>
                </form>
            </div>

            <!-- Existing Payrolls Section -->
            <div class="mb-8">
                <div class="rounded-xl shadow-lg overflow-hidden" style="background-color: #ffffff; border: 1px solid #e2e8f0;">
                    <div class="px-4 sm:px-6 py-4 border-b" style="border-color: #e2e8f0; background-color: var(--primary-bg-light);">
                        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
                            <div class="flex items-center space-x-3">
                                <svg class="w-6 h-6 flex-shrink-0" style="color: var(--hover-bg);" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                                <h3 class="text-lg sm:text-xl font-semibold text-white">Existing Payrolls</h3>
                            </div>
                            <span class="px-3 py-1 text-sm font-medium rounded-full self-start sm:self-auto" style="background-color: var(--hover-bg); color: white;">
                                {{ $payrolls->count() }} Records
                            </span>
                        </div>
                    </div>

                    <!-- Mobile-first responsive table with card layout on small screens -->
                    <div class="block sm:hidden">
                        <!-- Mobile Card Layout -->
                        <div class="divide-y divide-gray-200">
                            @forelse($payrolls as $p)
                                <div class="p-4 hover:bg-gray-50 transition-colors duration-200">
                                    <div class="flex items-start justify-between mb-3">
                                        <div class="flex items-center space-x-3">
                                            <div class="w-10 h-10 rounded-full flex items-center justify-center text-sm font-semibold text-white flex-shrink-0" style="background-color: var(--hover-bg);">
                                                {{ strtoupper(substr($p->user->name, 0, 2)) }}
                                            </div>
                                            <div>
                                                <div class="font-medium text-gray-900 text-sm">{{ $p->user->name }}</div>
                                                <div class="text-xs text-gray-500 mt-1">{{ $p->month }}</div>
                                            </div>
                                        </div>
                                        <div class="text-right">
                                            <div class="text-lg font-semibold text-gray-900">
                                                ₹{{ number_format($p->net_salary, 2) }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex flex-col sm:flex-row gap-2">
                                        <a href="{{ route('payrolls.slip', $p->id) }}" 
                                           class="flex-1 inline-flex items-center justify-center px-3 py-2 text-sm font-medium text-white rounded-lg transition-colors duration-200"
                                           style="background-color: var(--hover-bg);">
                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                            </svg>
                                            Download
                                        </a>
                                        <form method="POST" action="{{ route('payrolls.destroy', $p->id) }}" 
                                              onsubmit="return confirm('Delete this payroll?')" class="flex-1">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="w-full inline-flex items-center justify-center px-3 py-2 text-sm font-medium text-white bg-red-600 rounded-lg hover:bg-red-700 transition-colors duration-200">
                                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                </svg>
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            @empty
                                <div class="p-8 text-center">
                                    <div class="flex flex-col items-center space-y-3">
                                        <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                        </svg>
                                        <p class="text-lg font-medium text-gray-500">No payrolls found</p>
                                        <p class="text-sm text-gray-400">Generate payrolls for employees to see them here</p>
                                    </div>
                                </div>
                            @endforelse
                        </div>
                    </div>

                    <!-- Desktop Table Layout -->
                    <div class="hidden sm:block overflow-x-auto">
                        <table class="w-full">
                            <thead style="background-color: #f8fafc;">
                                <tr>
                                    <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Employee</th>
                                    <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Month</th>
                                    <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Net Salary</th>
                                    <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                @forelse($payrolls as $p)
                                    <tr class="hover:bg-gray-50 transition-colors duration-200">
                                        <td class="px-6 py-4">
                                            <div class="flex items-center space-x-3">
                                                <div class="w-10 h-10 rounded-full flex items-center justify-center text-sm font-semibold text-white" style="background-color: var(--hover-bg);">
                                                    {{ strtoupper(substr($p->user->name, 0, 2)) }}
                                                </div>
                                                <div>
                                                    <div class="font-medium text-gray-900">{{ $p->user->name }}</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <span class="px-3 py-1 text-sm font-medium rounded-full bg-gray-100 text-gray-700 border border-gray-200">
                                                {{ $p->month }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="text-lg font-semibold text-gray-900">
                                                ₹{{ number_format($p->net_salary, 2) }}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="flex items-center space-x-3">
                                                <a href="{{ route('payrolls.slip', $p->id) }}" 
                                                   class="inline-flex items-center px-3 py-1 text-sm font-medium text-white rounded-lg transition-colors duration-200"
                                                   style="background-color: var(--hover-bg);">
                                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                                    </svg>
                                                    Download
                                                </a>
                                                <form method="POST" action="{{ route('payrolls.destroy', $p->id) }}" 
                                                      onsubmit="return confirm('Delete this payroll?')" class="inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="inline-flex items-center px-3 py-1 text-sm font-medium text-white bg-red-600 rounded-lg hover:bg-red-700 transition-colors duration-200">
                                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                        </svg>
                                                        Delete
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="px-6 py-12 text-center">
                                            <div class="flex flex-col items-center space-y-3">
                                                <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                                </svg>
                                                <p class="text-lg font-medium text-gray-500">No payrolls found</p>
                                                <p class="text-sm text-gray-400">Generate payrolls for employees to see them here</p>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Generate Individual Payrolls Section -->
            <div class="rounded-xl shadow-lg overflow-hidden" style="background-color: #ffffff; border: 1px solid #e2e8f0;">
                <div class="px-4 sm:px-6 py-4 border-b" style="border-color: #e2e8f0; background-color: var(--primary-bg-light);">
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
                        <div class="flex items-center space-x-3">
                            <svg class="w-6 h-6 flex-shrink-0" style="color: var(--hover-bg);" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                            <h3 class="text-lg sm:text-xl font-semibold text-white">Generate Individual Payrolls</h3>
                        </div>
                        <span class="px-3 py-1 text-sm font-medium rounded-full self-start sm:self-auto" style="background-color: var(--hover-bg); color: white;">
                            {{ $employees->count() }} Employees
                        </span>
                    </div>
                </div>

                <!-- Mobile-first responsive layout for employee generation -->
                <div class="block sm:hidden">
                    <!-- Mobile Card Layout -->
                    <div class="divide-y divide-gray-200">
                        @foreach ($employees as $employee)
                            <div class="p-4 hover:bg-gray-50 transition-colors duration-200">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center space-x-3">
                                        <div class="w-10 h-10 rounded-full flex items-center justify-center text-sm font-semibold text-white flex-shrink-0" style="background-color: var(--hover-bg);">
                                            {{ strtoupper(substr($employee->name, 0, 2)) }}
                                        </div>
                                        <div>
                                            <div class="font-medium text-gray-900 text-sm">{{ $employee->name }}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <a href="{{ route('payrolls.generate', ['user_id' => $employee->id, 'month' => now()->format('M, Y')]) }}" 
                                       class="w-full inline-flex items-center justify-center px-4 py-2 text-sm font-medium text-white rounded-lg transition-colors duration-200"
                                       style="background-color: var(--hover-bg);">
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                        </svg>
                                        Generate for {{ now()->format('M, Y') }}
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Desktop Table Layout -->
                <div class="hidden sm:block overflow-x-auto">
                    <table class="w-full">
                        <thead style="background-color: #f8fafc;">
                            <tr>
                                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Employee</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Action</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @foreach ($employees as $employee)
                                <tr class="hover:bg-gray-50 transition-colors duration-200">
                                    <td class="px-6 py-4">
                                        <div class="flex items-center space-x-3">
                                            <div class="w-10 h-10 rounded-full flex items-center justify-center text-sm font-semibold text-white" style="background-color: var(--hover-bg);">
                                                {{ strtoupper(substr($employee->name, 0, 2)) }}
                                            </div>
                                            <div>
                                                <div class="font-medium text-gray-900">{{ $employee->name }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <a href="{{ route('payrolls.generate', ['user_id' => $employee->id, 'month' => now()->format('M, Y')]) }}" 
                                           class="inline-flex items-center px-4 py-2 text-sm font-medium text-white rounded-lg transition-colors duration-200"
                                           style="background-color: var(--hover-bg);">
                                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                            </svg>
                                            Generate for {{ now()->format('M, Y') }}
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
