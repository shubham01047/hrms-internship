<x-app-layout>
    <x-slot name="header">
        <h1 class="text-4xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-[var(--primary-bg-light)] to-[var(--hover-bg)] drop-shadow-lg animate-fade-in-down">
            Worklogs for Task: {{ $task->title }}
        </h1>
    </x-slot>

    <div class="py-12 sm:px-6 lg:px-8 bg-gray-100 min-h-[calc(100vh-64px)] theme-app flex items-center justify-center">
        {{-- Custom animations and styles --}}
        <style>
            /* Define RGB values for primary colors for rgba usage */
            :root {
                --primary-rgb: 59, 31, 34; /* RGB for #3b1f22 */
                --primary-bg-light-rgb: 244, 63, 94; /* RGB for #f43f5e */
                /* New gradient colors for primary actions */
                --action-gradient-from: #4a90e2; /* Medium blue */
                --action-gradient-to: #50e3c2; /* Light teal/cyan */
                --action-gradient-hover-from: #3a7bd5;
                --action-gradient-hover-to: #40d0b0;
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

            /* Enhanced Container */
            .main-container {
                border-radius: 20px;
                overflow: hidden;
                box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.15), 0 10px 20px -5px rgba(0, 0, 0, 0.1);
                border: 1px solid var(--primary-border);
                background: white;
                backdrop-filter: blur(10px);
                transition: all 0.3s ease-in-out;
            }

            .main-container:hover {
                box-shadow: 0 35px 60px -12px rgba(0, 0, 0, 0.2), 0 15px 25px -5px rgba(0, 0, 0, 0.15);
                transform: translateY(-2px);
            }

            /* Enhanced Header Section */
            .header-section {
                background: linear-gradient(135deg, #f8fafc, #f1f5f9);
                border-bottom: 1px solid #e5e7eb;
                padding: 2rem;
                position: relative;
                overflow: hidden;
                transition: all 0.3s ease-in-out;
            }

            .header-section::before {
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

            /* Table Header */
            .table-header {
                background: linear-gradient(90deg, var(--primary-bg), var(--secondary-bg));
            }

            /* Table Row Hover */
            .table-row-hover:hover {
                background-color: #f8fafc !important; /* Very light gray */
            }

            .table-row-hover:hover .text-gray-900,
            .table-row-hover:hover .text-gray-800,
            .table-row-hover:hover .text-gray-600,
            .table-row-hover:hover .text-indigo-800,
            .table-row-hover:hover .text-gray-700 {
                color: #333 !important; /* Darker gray for text */
            }

            /* Primary action button gradient */
            .bg-action-gradient {
                background: linear-gradient(90deg, var(--action-gradient-from), var(--action-gradient-to));
            }

            .bg-action-gradient:hover {
                background: linear-gradient(90deg, var(--action-gradient-hover-from), var(--action-gradient-hover-to));
            }

            /* Secondary button styling (e.g., Back to Task) */
            .btn-secondary {
                border: 1px solid var(--primary-border);
                color: var(--primary-bg);
                background: white;
            }

            .btn-secondary:hover {
                background: var(--primary-bg-light);
                color: white;
                border-color: var(--primary-bg-light);
            }

            /* Delete button styling */
            .btn-delete {
                border: 1px solid var(--primary-border);
                color: var(--primary-bg);
                background: white;
            }

            .btn-delete:hover {
                background: var(--primary-bg-light);
                color: white;
                border-color: var(--primary-bg-light);
            }

            /* Mobile responsive adjustments */
            @media (max-width: 768px) {
                .header-section {
                    padding: 1.5rem;
                }
            }
        </style>

        <div class="w-full max-w-6xl mx-auto space-y-12">
            @if (session('success'))
                <div class="bg-green-100 border border-green-500 text-green-800 px-6 py-4 rounded-xl relative shadow-xl transition-all duration-300 ease-in-out hover:shadow-2xl flex items-center animate-fade-in animate-delay-100" role="alert">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-3 text-green-600"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                    <strong class="font-bold">Success!</strong>
                    <span class="block sm:inline ml-2">{{ session('success') }}</span>
                </div>
            @endif
            @if (session('error'))
                <div class="bg-red-100 border border-red-500 text-red-800 px-6 py-4 rounded-xl relative shadow-xl transition-all duration-300 ease-in-out hover:shadow-2xl flex items-center animate-fade-in animate-delay-100" role="alert">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-3 text-red-600"><circle cx="12" cy="12" r="10"/><line x1="15" y1="9" x2="9" y2="15"/><line x1="9" y1="9" x2="15" y2="15"/></svg>
                    <strong class="font-bold">Error!</strong>
                    <span class="block sm:inline ml-2">{{ session('error') }}</span>
                </div>
            @endif

            <div class="mb-10 flex flex-col sm:flex-row justify-end gap-4 animate-fade-in animate-delay-200">
                @can('create timesheet')
                    <a href="{{ route('tasks.timesheets.create', [$task->project_id, $task->id]) }}" class="inline-flex items-center px-8 py-4 border border-transparent text-base font-semibold rounded-full shadow-xl text-white bg-action-gradient hover:bg-action-gradient focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[var(--primary-bg-light)] transition-all duration-300 ease-in-out hover:shadow-2xl hover:-translate-y-1 w-full sm:w-auto justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2 transition-transform duration-300 ease-in-out"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
                        Create Timesheet
                    </a>
                @endcan
                <a href="{{ route('projects.show', ['project' => $task->project_id]) }}" class="inline-flex items-center px-8 py-4 border border-gray-300 text-base font-medium rounded-full shadow-md text-gray-700 bg-white hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[var(--primary-bg-light)] transition-all duration-300 ease-in-out hover:shadow-lg w-full sm:w-auto justify-center btn-secondary">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><path d="M9 14 4 9l5-5"/><path d="M20 9H4"/></svg>
                    Back to Task
                </a>
            </div>

            <div class="main-container p-8 md:p-10 animate-fade-in animate-delay-300">
                <div class="header-section mb-8 -mx-8 -mt-8 md:-mx-10 md:-mt-10 rounded-t-2xl">
                    <h2 class="text-3xl font-bold text-gray-900 mb-2 text-center">
                        Timesheet Entries
                    </h2>
                    <p class="text-gray-600 text-center">All recorded worklogs for this task</p>
                </div>
                @if($timesheets->count() > 0)
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="table-header text-white shadow-md">
                                <tr>
                                    <th scope="col" class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider rounded-tl-xl">User</th>
                                    <th scope="col" class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider">Date</th>
                                    <th scope="col" class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider">Hours Worked</th>
                                    <th scope="col" class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider">Description</th>
                                    <th scope="col" class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider">Status</th>
                                    <th scope="col" class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider rounded-tr-xl">Action</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($timesheets as $timesheet)
                                    <tr class="table-row-hover transition-all duration-200 ease-in-out hover:shadow-md {{ $loop->odd ? 'bg-white' : 'bg-gray-50' }}">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $timesheet->user->name }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{ \Carbon\Carbon::parse($timesheet->date)->format('M d, Y') }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{ $timesheet->hours_worked }} Hours</td>
                                        <td class="px-6 py-4 text-sm text-gray-600 max-w-xs overflow-hidden text-ellipsis">{{ $timesheet->description }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <span class="px-3 py-1 rounded-full text-xs font-semibold
                                                @if($timesheet->status === 'Approved') bg-green-100 text-green-800
                                                @elseif($timesheet->status === 'Rejected') bg-red-100 text-red-800
                                                @else bg-yellow-100 text-yellow-800 @endif
                                                transition-colors duration-200">
                                                {{ ucfirst($timesheet->status) }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <div class="flex flex-wrap gap-2">
                                                @can('approve timesheet')
                                                    <form method="POST" action="{{ route('timesheets.approve', $timesheet->id) }}" class="inline-block">
                                                        @csrf
                                                        @method('PUT')
                                                        <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-xs font-medium rounded-md text-white bg-action-gradient hover:bg-action-gradient focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[var(--primary-bg-light)] transition-all duration-300 ease-in-out hover:shadow-lg">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-1"><polyline points="20 6 9 17 4 12"/></svg>
                                                            Approve
                                                        </button>
                                                    </form>
                                                @endcan
                                                @can('reject timesheet')
                                                    <form method="POST" action="{{ route('timesheets.reject', $timesheet->id) }}" class="inline-block">
                                                        @csrf
                                                        @method('PUT')
                                                        <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-xs font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition-all duration-300 ease-in-out hover:shadow-lg">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-1"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
                                                            Reject
                                                        </button>
                                                    </form>
                                                @endcan
                                                @can('edit timesheet')
                                                    <a href="{{ route('tasks.timesheets.edit', [$task->project_id, $task->id, $timesheet->id]) }}" class="inline-flex items-center px-4 py-2 border border-transparent text-xs font-medium rounded-md text-white bg-action-gradient hover:bg-action-gradient focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[var(--primary-bg-light)] transition-all duration-300 ease-in-out hover:shadow-lg">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-1"><path d="M12 20h9"/><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"/></svg>
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
                    <div class="bg-gray-50 p-6 rounded-lg shadow-inner text-center text-gray-600 text-lg font-medium animate-fade-in animate-delay-400">
                        <p>No timesheet entries for this task yet.</p>
                        @can('create timesheet')
                            <a href="{{ route('tasks.timesheets.create', [$task->project_id, $task->id]) }}" class="mt-6 inline-flex items-center px-8 py-4 border border-transparent text-base font-semibold rounded-full shadow-lg text-white bg-action-gradient hover:bg-action-gradient focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[var(--primary-bg-light)] transition-all duration-300 ease-in-out hover:shadow-xl">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
                                Add First Timesheet
                            </a>
                        @endcan
                    </div>
                @endif
            </div>
        </div>
</x-app-layout>
