<x-app-layout>
    <x-slot name="header">
        {{-- Added lg:pr-24 to create more space on the right for larger screens --}}
        <div class="flex justify-between items-center w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 lg:pr-24">
            <h1 class="text-4xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-[var(--primary-bg-light)] to-[var(--hover-bg)] drop-shadow-lg animate-fade-in-down">
                Project Management
            </h1>
            @can('create project')
                <a href="{{ route('projects.create') }}" class="inline-flex items-center px-8 py-4 border border-transparent text-base font-semibold rounded-full shadow-xl text-white bg-action-gradient hover:bg-action-gradient focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[var(--primary-bg-light)] transition-all duration-300 ease-in-out hover:shadow-2xl hover:scale-105 transform origin-center animate-fade-in animate-delay-200">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2 transition-transform duration-300 ease-in-out"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
                    Create New Project
                </a>
            @endcan
        </div>
    </x-slot>

    <div class="py-8 sm:px-6 lg:px-8 bg-gray-100 min-h-[calc(100vh-64px)] theme-app">
        <style>
            :root {
                --primary-rgb: 59, 31, 34;
                --primary-bg-light-rgb: 244, 63, 94;
                --primary-bg: #3b1f22;
                --secondary-bg: #5a3a3d;
                --primary-border: #e5e7eb;
                --hover-bg: #f43f5e;
                --action-gradient-from: #4a90e2;
                --action-gradient-to: #50e3c2;
                --action-gradient-hover-from: #3a7bd5;
                --action-gradient-hover-to: #40d0b0;
                --edit-button-from: #3498db;
                --edit-button-to: #2980b9;
                --view-button-from: #2ecc71;
                --view-button-to: #27ae60;
                --delete-button-bg: #e74c3c;
                --delete-button-hover-bg: #c0392b;
            }

            @keyframes fadeIn {
                from { opacity: 0; transform: translateY(30px); }
                to { opacity: 1; transform: translateY(0); }
            }

            .animate-fade-in { animation: fadeIn 0.8s ease-out forwards; }
            .animate-delay-100 { animation-delay: 0.1s; }
            .animate-delay-200 { animation-delay: 0.2s; }
            .animate-delay-300 { animation-delay: 0.3s; }
            .animate-delay-400 { animation-delay: 0.4s; }
            .animate-delay-500 { animation-delay: 0.5s; }
            .animate-delay-600 { animation-delay: 0.6s; }
            .animate-delay-700 { animation-delay: 0.7s; }

            .main-container {
                border-radius: 20px;
                overflow: hidden;
                box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.15), 0 10px 20px -5px rgba(0, 0, 0, 0.1);
                border: 1px solid var(--primary-border);
                background: var(--primary-bg-light);
                backdrop-filter: blur(10px);
            }

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

            .table-header {
                background: linear-gradient(90deg, var(--primary-bg), var(--secondary-bg));
            }

            /* Removed hover effects for table rows as per previous requests */
            .table-row-hover:hover {
                /* No background or text color changes on hover */
            }

            .table-row-hover:hover .text-gray-900,
            .table-row-hover:hover .text-gray-800,
            .table-row-hover:hover .text-gray-600,
            .table-row-hover:hover .text-indigo-800,
            .table-row-hover:hover .text-gray-700 {
                /* No text color changes on hover */
            }

            .bg-action-gradient { background: linear-gradient(90deg, var(--action-gradient-from), var(--action-gradient-to)); }
            .bg-action-gradient:hover { background: linear-gradient(90deg, var(--action-gradient-hover-from), var(--action-gradient-hover-to)); }
            .btn-edit { background: linear-gradient(90deg, var(--edit-button-from), var(--edit-button-to)); }
            .btn-edit:hover { background: linear-gradient(90deg, var(--edit-button-to), var(--edit-button-from)); transform: scale(1.05); box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2); }
            .btn-view { background: linear-gradient(90deg, var(--view-button-from), var(--view-button-to)); }
            .btn-view:hover { background: linear-gradient(90deg, var(--view-button-to), var(--view-button-from)); transform: scale(1.05); box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2); }
            .btn-delete { background: var(--delete-button-bg); border: 1px solid var(--delete-button-bg); }
            .btn-delete:hover { background: var(--delete-button-hover-bg); border-color: var(--delete-button-hover-bg); transform: scale(1.05); box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2); }

            /* Mobile responsive adjustments for table */
            @media (max-width: 768px) {
                .header-section { padding: 1.5rem; }

                table, thead, tbody, th, td, tr {
                    display: block;
                }

                thead tr {
                    position: absolute;
                    top: -9999px;
                    left: -9999px;
                }

                tr {
                    border: 1px solid #ccc;
                    margin-bottom: 1rem;
                    border-radius: 10px;
                    overflow: hidden;
                    box-shadow: 0 4px 6px rgba(0,0,0,0.1);
                }

                td {
                    border: none;
                    border-bottom: 1px solid #eee;
                    position: relative;
                    padding-left: 50%;
                    text-align: right;
                    padding-top: 0.75rem;
                    padding-bottom: 0.75rem;
                }

                td:last-child {
                    border-bottom: none;
                }

                td::before {
                    content: attr(data-label);
                    position: absolute;
                    left: 6px;
                    width: 45%;
                    padding-right: 10px;
                    white-space: nowrap;
                    text-align: left;
                    font-weight: bold;
                    color: var(--primary-bg); /* Use a theme color for labels */
                }

                /* Specific adjustments for action buttons on mobile */
                td:last-child {
                    text-align: center;
                    padding-left: 6px; /* Reset padding for actions */
                }
                td:last-child::before {
                    content: ''; /* Hide label for actions column */
                }
                .flex-wrap.gap-2 {
                    justify-content: center;
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

            <div class="main-container animate-fade-in animate-delay-300">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="table-header text-white shadow-md">
                            <tr>
                                <th scope="col" class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider rounded-tl-xl">#</th>
                                <th scope="col" class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider">Title</th>
                                <th scope="col" class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider">Client</th>
                                <th scope="col" class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider">Description</th>
                                <th scope="col" class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider">Deadline</th>
                                <th scope="col" class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider">Members</th>
                                <th scope="col" class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider rounded-tr-xl">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($projects as $index => $project)
                                <tr class="table-row-hover transition-all duration-200 ease-in-out {{ $loop->odd ? 'bg-white' : 'bg-gray-50' }}">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900" data-label="#">{{ $index + 1 }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-800" data-label="Title">{{ $project->title }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-800" data-label="Client">{{ $project->client_name }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-600 max-w-xs overflow-hidden text-ellipsis" data-label="Description">{{ $project->description }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-800" data-label="Deadline">
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-yellow-100 text-yellow-800 transition-colors duration-200">
                                            {{ \Carbon\Carbon::parse($project->deadline)->format('M d, Y') }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-800" data-label="Members">
                                        <ul class="flex flex-wrap gap-1">
                                            @foreach ($project->members as $member)
                                                <li class="bg-gray-200 text-gray-700 px-2.5 py-1 rounded-full text-xs font-medium transition-colors duration-200 hover:bg-gray-300" title="{{ $member->name }}">
                                                    {{ $member->name }}
                                                </li>
                                            @endforeach
                                        </ul>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium" data-label="Actions">
                                        <div class="flex flex-wrap gap-2">
                                            @can('edit project')
                                                <a href="{{ route('projects.edit', $project->id) }}" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white btn-edit transition-all duration-300 ease-in-out hover:shadow-lg">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-1"><path d="M12 20h9"/><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"/></svg>
                                                    Edit
                                                </a>
                                            @endcan
                                            <a href="{{ route('projects.show', ['project' => $project]) }}" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white btn-view transition-all duration-300 ease-in-out hover:shadow-lg">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-1"><path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z"/><circle cx="12" cy="12" r="3"/></svg>
                                                    View Tasks
                                                </a>
                                                @can('delete project')
                                                    <form action="{{ route('projects.destroy', $project->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this project?');" class="inline-block">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white btn-delete transition-all duration-300 ease-in-out hover:shadow-lg">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-1"><path d="M3 6h18"/><path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"/><path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"/><line x1="10" x2="10" y1="11" y2="17"/><line x1="14" x2="14" y1="11" y2="17"/></svg>
                                                            Delete
                                                        </button>
                                                    </form>
                                                @endcan
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
</x-app-layout>
