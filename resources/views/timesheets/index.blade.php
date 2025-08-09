<x-app-layout>
    <x-slot name="header">
        <div class="theme-app relative overflow-hidden rounded-lg shadow-sm p-4 sm:p-6"
            style="background: linear-gradient(to right, var(--secondary-bg), var(--primary-bg));">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                <div class="flex items-center gap-3">
                    <div class="p-2 rounded-lg shadow-md" style="background-color: var(--hover-bg);">
                        <svg class="w-6 h-6" style="color: var(--primary-text);" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div>
                        <h2 class="font-bold text-2xl leading-tight" style="color: var(--primary-text);">
                            Worklogs for Task: {{ $task->title }}
                        </h2>
                        <p class="text-sm" style="color: var(--secondary-text);">
                            All recorded timesheet entries for this task
                        </p>
                    </div>
                </div>

                <div
                    class="flex flex-col sm:flex-row items-stretch sm:items-center justify-end gap-2 sm:gap-3 w-full md:w-auto lg:mr-24">
                    @can('create timesheet')
                        <a href="{{ route('tasks.timesheets.create', [$task->project_id, $task->id]) }}"
                            class="inline-flex items-center justify-center px-5 py-2.5 font-semibold rounded-lg shadow-lg ring-1 ring-white/20 transition-all duration-300 hover:scale-[1.02] focus:outline-none focus:ring-2 focus:ring-white/40"
                            style="background-color: var(--hover-bg); color: var(--primary-text);"
                            onmouseover="this.style.backgroundColor='var(--primary-bg-light)'"
                            onmouseout="this.style.backgroundColor='var(--hover-bg)'">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                            Create Timesheet
                        </a>
                    @endcan
                    <a href="{{ route('projects.show', ['project' => $task->project_id]) }}"
                        class="inline-flex items-center justify-center px-5 py-2.5 font-semibold rounded-lg shadow-md transition-all duration-300 hover:scale-[1.02] focus:outline-none focus:ring-2 focus:ring-white/40 border"
                        style="background: white; color: var(--secondary-bg); border-color: var(--primary-border);">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        Back to Project
                    </a>
                    <a href="{{ route('timesheets.report.form', [$projectId, $task->id]) }}"
                        class="inline-flex items-center justify-center px-5 py-2.5 font-semibold rounded-lg shadow-md transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-white/40 border"
                        style="color: var(--primary-text); border-color: rgba(255,255,255,0.35); background: rgba(255,255,255,0.08);"
                        onmouseover="this.style.background='rgba(255,255,255,0.16)'"
                        onmouseout="this.style.background='rgba(255,255,255,0.08)'">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v14m7-7H5">
                            </path>
                        </svg>
                        Download Report
                    </a>
                </div>
            </div>
        </div>
    </x-slot>

    <div class="py-8 bg-gradient-to-br from-gray-50 to-blue-50 min-h-screen">
        <style>
            @keyframes fadeIn {
                from {
                    opacity: 0;
                    transform: translateY(20px);
                }

                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            .animate-fade-in {
                animation: fadeIn 0.6s ease-out forwards;
            }

            .animate-delay-100 {
                animation-delay: .1s;
            }

            .animate-delay-200 {
                animation-delay: .2s;
            }

            .animate-delay-300 {
                animation-delay: .3s;
            }

            .table-row-hover:hover {
                background-color: #f8fafc !important;
            }
        </style>

        <div class="w-full px-4 sm:px-6 lg:px-8 space-y-8">
            @if (session('success'))
                <div class="bg-green-50 border-l-4 border-green-400 p-4 rounded-lg animate-fade-in animate-delay-100">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-green-400" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm text-green-700 font-medium">{{ session('success') }}</p>
                        </div>
                    </div>
                </div>
            @endif

            @if (session('error'))
                <div class="bg-red-50 border-l-4 border-red-400 p-4 rounded-lg animate-fade-in animate-delay-100">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-red-400" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm text-red-700 font-medium">{{ session('error') }}</p>
                        </div>
                    </div>
                </div>
            @endif

            <div
                class="bg-white rounded-xl shadow-xl overflow-hidden border border-gray-200 animate-fade-in animate-delay-200">
                <div class="theme-app px-6 py-4 border-b border-gray-200"
                    style="background: linear-gradient(to right, var(--secondary-bg), var(--primary-bg));">
                    <div class="flex items-center space-x-3">
                        <div class="p-2 rounded-lg shadow-sm" style="background-color: var(--hover-bg);">
                            <svg class="w-5 h-5" style="color: var(--primary-text);" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2v2M7 9h10">
                                </path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold" style="color: var(--primary-text);">
                                Timesheet Entries ({{ $timesheets->count() }})
                            </h3>
                            <p class="text-sm" style="color: var(--secondary-text);">All recorded worklogs for this task
                            </p>
                        </div>
                    </div>
                </div>

                @if ($timesheets->count() > 0)
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="theme-app"
                                style="background: linear-gradient(to right, var(--primary-bg), var(--secondary-bg));">
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider"
                                        style="color: var(--primary-text);">User</th>
                                    <th scope="col"
                                        class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider"
                                        style="color: var(--primary-text);">Date</th>
                                    <th scope="col"
                                        class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider"
                                        style="color: var(--primary-text);">Hours Worked</th>
                                    <th scope="col"
                                        class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider"
                                        style="color: var(--primary-text);">Description</th>
                                    <th scope="col"
                                        class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider"
                                        style="color: var(--primary-text);">Status</th>
                                    <th scope="col"
                                        class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider"
                                        style="color: var(--primary-text);">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($timesheets as $index => $timesheet)
                                    <tr
                                        class="table-row-hover transition-all duration-200 {{ $index % 2 == 0 ? 'bg-white' : 'bg-gray-50' }}">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                            {{ $timesheet->user->name }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                            {{ \Carbon\Carbon::parse($timesheet->date)->format('M d, Y') }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                            {{ $timesheet->hours_worked }} Hours</td>
                                        <td class="px-6 py-4 text-sm text-gray-600 max-w-xs">
                                            <div class="truncate" title="{{ $timesheet->description }}">
                                                {{ $timesheet->description ?: 'No description provided' }}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <span
                                                class="px-3 py-1 rounded-full text-xs font-semibold
                                                @if ($timesheet->status === 'Approved') bg-green-100 text-green-800
                                                @elseif($timesheet->status === 'Rejected') bg-red-100 text-red-800
                                                @else bg-yellow-100 text-yellow-800 @endif">
                                                {{ ucfirst($timesheet->status) }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <div class="flex flex-wrap gap-2">
                                                @can('approve timesheet')
                                                    @if ($timesheet->status !== 'Approved')
                                                        <form method="POST"
                                                            action="{{ route('timesheets.approve', $timesheet->id) }}"
                                                            class="inline-block">
                                                            @csrf
                                                            @method('PUT')
                                                            <button type="submit"
                                                                class="inline-flex items-center px-3 py-1 text-xs font-medium rounded-md text-white"
                                                                style="background-color: #16a34a;"
                                                                onmouseover="this.style.backgroundColor='#22c55e'"
                                                                onmouseout="this.style.backgroundColor='#16a34a'">
                                                                <svg class="w-3 h-3 mr-1" fill="none"
                                                                    stroke="currentColor" viewBox="0 0 24 24">
                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                        stroke-width="2" d="M5 13l4 4L19 7"></path>
                                                                </svg>
                                                                Approve
                                                            </button>

                                                        </form>
                                                    @endif
                                                @endcan
                                                @can('reject timesheet')
                                                    @if ($timesheet->status !== 'Rejected')
                                                        <form method="POST"
                                                            action="{{ route('timesheets.reject', $timesheet->id) }}"
                                                            class="inline-block">
                                                            @csrf
                                                            @method('PUT')
                                                            <button type="submit"
                                                                class="inline-flex items-center px-3 py-1 text-xs font-medium rounded-md text-white bg-red-600 hover:bg-red-700 transition-all duration-200">
                                                                <svg class="w-3 h-3 mr-1" fill="none"
                                                                    stroke="currentColor" viewBox="0 0 24 24">
                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                        stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                                                </svg>
                                                                Reject
                                                            </button>
                                                        </form>
                                                    @endif
                                                @endcan
                                                @can('edit timesheet')
                                                    <a href="{{ route('tasks.timesheets.edit', [$task->project_id, $task->id, $timesheet->id]) }}"
                                                        class="inline-flex items-center px-3 py-1 text-xs font-medium rounded-md text-white"
                                                        style="background-color: var(--hover-bg);"
                                                        onmouseover="this.style.backgroundColor='var(--primary-bg-light)'"
                                                        onmouseout="this.style.backgroundColor='var(--hover-bg)'">
                                                        <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor"
                                                            viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                                            </path>
                                                        </svg>
                                                        Edit
                                                    </a>
                                                @endcan
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="text-center py-12">
                        <div class="bg-gray-100 p-4 rounded-full mx-auto mb-4 w-fit">
                            <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-medium text-gray-900 mb-2">No Timesheet Entries</h3>
                        <p class="text-gray-500 mb-4">No timesheet entries have been recorded for this task yet.</p>
                        @can('create timesheet')
                            <a href="{{ route('tasks.timesheets.create', [$task->project_id, $task->id]) }}"
                                class="theme-app inline-flex items-center px-6 py-3 font-semibold rounded-lg shadow-lg hover:scale-105 transform transition-all duration-300 ease-in-out focus:outline-none focus:ring-4"
                                style="background-color: var(--hover-bg); color: var(--primary-text);"
                                onmouseover="this.style.backgroundColor='var(--primary-bg-light)'"
                                onmouseout="this.style.backgroundColor='var(--hover-bg)'">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                                Add First Timesheet
                            </a>
                        @endcan
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
