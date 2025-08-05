<x-app-layout>
    <x-slot name="header">
        {{-- Updated header to match the image: "Project" in dark, "Management" in red gradient --}}
        <div class="flex justify-between items-center w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 lg:pr-24">
            <h1 class="text-4xl font-extrabold drop-shadow-lg animate-fade-in-down">
                <span class="text-gray-900 dark:text-gray-100">Project</span>
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-[var(--primary-border)] to-[var(--hover-bg)] ml-2">Management</span>
            </h1>
            @can('create project')
                {{-- Updated button to use the new theme's red gradient --}}
                <a href="{{ route('projects.create') }}" class="inline-flex items-center px-8 py-4 border border-transparent text-base font-semibold rounded-full shadow-xl text-white bg-action-gradient hover:bg-action-gradient focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[var(--primary-border)] transition-all duration-300 ease-in-out hover:shadow-2xl hover:scale-105 transform origin-center animate-fade-in animate-delay-200">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2 transition-transform duration-300 ease-in-out"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
                    Create New Project
                </a>
            @endcan
        </div>
    </x-slot>

    <div class="py-8 sm:px-6 lg:px-8 bg-gray-100 min-h-[calc(100vh-64px)] theme-app">
        <style>
            /* Define the exact theme variables provided by the user */
            :root {
                --primary-bg: #572626;           /* Royal Black (very dark background) */
                --primary-bg-light: #1e1e1ee0;   /* Slightly lighter black for cards/sections */
                --primary-text: #ffffff;         /* Pure white text */
                --primary-border: #ff4d67;       /* Rose/Red-400: soft accent border */
                --hover-bg: #ff1e42;             /* Red-600: hover highlight */
                --secondary-bg: #b91c1c;         /* Strong Red (like Rose-700) */
                --secondary-text: #ffffff;       /* White text on red */

                /* RGB values for rgba usage (derived from the provided hex codes) */
                --primary-rgb: 87, 38, 38;
                --primary-bg-light-rgb: 30, 30, 30;
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

            /* Member tag styling */
            .member-tag {
                background-color: #e0e0e0; /* Light gray from image */
                color: #616161; /* Dark gray text from image */
                transition: all 0.2s ease-in-out;
            }

            .dark .member-tag {
                background-color: var(--primary-bg); /* Darker background for dark mode */
                color: var(--primary-text);
            }

            .member-tag:hover {
                transform: scale(1.05); /* Slight scale on hover */
                box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            }

            .dark .member-tag:hover {
                background-color: var(--hover-bg);
                color: white;
            }

            /* Button gradients and hover effects */
            /* "Create New Project" button gradient using new theme colors */
            .bg-action-gradient { background: linear-gradient(90deg, var(--primary-border), var(--hover-bg)); }
            .bg-action-gradient:hover { background: linear-gradient(90deg, var(--hover-bg), var(--primary-border)); transform: scale(1.05); box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2); }

            /* Solid colors for card action buttons, now themed */
            .btn-edit { background-color: var(--primary-border); border: 1px solid var(--primary-border); }
            .btn-view { background-color: var(--hover-bg); border: 1px solid var(--hover-bg); }
            .btn-delete { background-color: var(--secondary-bg); border: 1px solid var(--secondary-bg); }

            /* Consistent hover effects for all card action buttons */
            .btn-edit:hover { background-color: var(--hover-bg); border-color: var(--hover-bg); transform: scale(1.05); box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2); }
            .btn-view:hover { background-color: var(--primary-border); border-color: var(--primary-border); transform: scale(1.05); box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2); }
            .btn-delete:hover { background-color: var(--hover-bg); border-color: var(--hover-bg); transform: scale(1.05); box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2); }


            /* Modal styles (retained from previous turn) */
            .modal-overlay {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background-color: rgba(0, 0, 0, 0.6);
                display: flex;
                justify-content: center;
                align-items: center;
                z-index: 1000;
                opacity: 0;
                visibility: hidden;
                transition: opacity 0.3s ease-in-out, visibility 0.3s ease-in-out;
            }

            .modal-overlay.show {
                opacity: 1;
                visibility: visible;
            }

            .modal-content {
                background: white;
                padding: 2.5rem;
                border-radius: 15px;
                box-shadow: 0 15px 30px rgba(0, 0, 0, 0.25);
                text-align: center;
                max-width: 450px;
                width: 90%;
                transform: translateY(-20px);
                opacity: 0;
                transition: transform 0.3s ease-in-out, opacity 0.3s ease-in-out;
            }

            .modal-overlay.show .modal-content {
                transform: translateY(0);
                opacity: 1;
            }

            .dark .modal-content {
                background: var(--primary-bg);
                color: var(--primary-text);
            }

            .modal-title {
                font-size: 1.75rem;
                font-weight: bold;
                color: var(--primary-border); /* Using primary-border for modal title */
                margin-bottom: 1rem;
            }

            .dark .modal-title {
                color: var(--hover-bg);
            }

            .modal-message {
                font-size: 1rem;
                color: #4b5563;
                margin-bottom: 2rem;
            }

            .dark .modal-message {
                color: #d1d5db;
            }

            .modal-buttons {
                display: flex;
                justify-content: center;
                gap: 1rem;
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

            {{-- Grid container for project cards --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 animate-fade-in animate-delay-300 items-stretch">
                @foreach ($projects as $index => $project)
                    {{-- Added flex-col and justify-between to make cards same height and push buttons to bottom --}}
                    <div class="bg-white rounded-xl shadow-lg p-6 relative transition-all duration-300 ease-in-out hover:shadow-xl hover:-translate-y-1 flex flex-col justify-between">
                        <div> {{-- Wrapper for top content to allow flex-grow on description/members --}}
                            <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-2">{{ $project->title }}</h2>
                            {{-- Deadline tag positioned top-right --}}
                            <span class="absolute top-6 right-6 inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-yellow-100 text-yellow-800 transition-colors duration-200">
                                {{ \Carbon\Carbon::parse($project->deadline)->format('M d, Y') }}
                            </span>
                            <p class="text-gray-600 dark:text-gray-300 text-sm mb-3">Client: {{ $project->client_name }}</p>
                            <p class="text-gray-700 dark:text-gray-400 text-sm mb-4 line-clamp-3 flex-grow">{{ $project->description }}</p>

                            <div class="mt-4 mb-6">
                                <h3 class="text-base font-semibold text-gray-800 dark:text-gray-200 mb-2">Members:</h3>
                                <ul class="flex flex-wrap gap-2">
                                    @foreach ($project->members as $member)
                                        <li class="member-tag px-3 py-1 rounded-full text-xs font-medium" title="{{ $member->name }}">
                                            {{ $member->name }}
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        {{-- Action buttons at the bottom of the card --}}
                        <div class="flex justify-end gap-2 mt-auto pt-4 border-t border-gray-100 dark:border-gray-700">
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
                                <button type="button" onclick="showDeleteModal('{{ route('projects.destroy', $project->id) }}')" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white btn-delete transition-all duration-300 ease-in-out hover:shadow-lg">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-1"><path d="M3 6h18"/><path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"/><path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"/><line x1="10" x2="10" y1="11" y2="17"/><line x1="14" x2="14" y1="11" y2="17"/></svg>
                                    Delete
                                </button>
                            @endcan
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Delete Confirmation Modal (retained) -->
        <div id="deleteModal" class="modal-overlay">
            <div class="modal-content">
                <h3 class="modal-title">Confirm Deletion</h3>
                <p class="modal-message">Are you sure you want to delete this project? This action cannot be undone.</p>
                <div class="modal-buttons">
                    <button type="button" onclick="hideDeleteModal()" class="inline-flex items-center px-6 py-3 rounded-full shadow-md transition-all duration-300 ease-in-out hover:shadow-lg btn-cancel">
                        Cancel
                    </button>
                    <form id="deleteForm" method="POST" class="inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-semibold rounded-full shadow-xl text-white btn-delete transition-all duration-300 ease-in-out hover:shadow-2xl hover:-translate-y-1">
                            Delete
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <script>
            let deleteForm = document.getElementById('deleteForm');
            let deleteModal = document.getElementById('deleteModal');

            function showDeleteModal(actionUrl) {
                deleteForm.action = actionUrl;
                deleteModal.classList.add('show');
            }

            function hideDeleteModal() {
                deleteModal.classList.remove('show');
            }

            // Close modal if clicked outside content
            deleteModal.addEventListener('click', function(event) {
                if (event.target === deleteModal) {
                    hideDeleteModal();
                }
            });
        </script>
    </div>
</x-app-layout>
