<x-app-layout>
    <x-slot name="header">
        <h1 class="text-4xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-[var(--primary-bg-light)] to-[var(--hover-bg)] drop-shadow-lg animate-fade-in-down">
            Task Comments
        </h1>
    </x-slot>

    <div class="py-10 sm:px-6 lg:px-8 bg-gray-100 min-h-[calc(100vh-64px)] theme-app flex items-center justify-center">
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

        <div class="w-full max-w-3xl mx-auto space-y-10">
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

            <div class="main-container p-6 md:p-8 animate-fade-in animate-delay-200">
                <div class="header-section mb-6 -mx-6 -mt-6 md:-mx-8 md:-mt-8 rounded-t-2xl">
                    <h2 class="text-2xl font-bold text-gray-900 mb-2 text-center">
                        Comments for Task: <span class="text-[var(--hover-bg)]">{{ $task->title }}</span>
                    </h2>
                    <p class="text-gray-600 text-center">Engage in discussions about this task</p>
                </div>

                <div class="mb-8 p-6 bg-gray-50 rounded-xl shadow-inner border border-gray-200 animate-fade-in animate-delay-300">
                    <h3 class="text-xl font-semibold text-gray-800 mb-4">Add a New Comment</h3>
                    <form action="{{ route('tasks.comments.store', [$task->project_id, $task->id]) }}" method="POST" class="space-y-4">
                        @csrf
                        <div>
                            <label for="comment" class="sr-only">Your Comment</label>
                            <textarea
                                name="comment"
                                id="comment"
                                rows="3"
                                required
                                placeholder="Write your comment here..."
                                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm text-gray-900
                                    focus:ring-[var(--primary-bg-light)] focus:border-[var(--primary-bg-light)] focus:ring-2 focus:shadow-lg focus:shadow-[var(--primary-bg-light)]/50
                                    transition-all duration-300 ease-in-out hover:border-[var(--hover-bg)] hover:scale-[1.005] transform origin-center"
                            ></textarea>
                        </div>
                        <div class="flex flex-col sm:flex-row justify-end gap-3">
                            <a href="{{ route('projects.show', ['project' => $project]) }}" class="inline-flex items-center px-6 py-3 border border-gray-300 text-base font-medium rounded-full shadow-md text-gray-700 bg-white hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[var(--primary-bg-light)] transition-all duration-300 ease-in-out hover:shadow-lg hover:scale-105 transform origin-center btn-secondary w-full sm:w-auto justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><path d="M9 14 4 9l5-5"/><path d="M20 9H4"/></svg>
                                Back to Task
                            </a>
                            <button type="submit" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-full shadow-xl text-white bg-action-gradient hover:bg-action-gradient focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[var(--primary-bg-light)] transition-all duration-300 ease-in-out hover:shadow-2xl hover:scale-105 transform origin-center w-full sm:w-auto justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                                Add Comment
                            </button>
                        </div>
                    </form>
                </div>

                <div class="mt-8">
                    <h3 class="text-xl font-semibold text-gray-800 mb-4">All Comments</h3>
                    <ul class="space-y-4">
                        @forelse($comments as $comment)
                            <li class="bg-gray-50 p-4 rounded-lg shadow-sm border border-gray-200 transition-all duration-200 ease-in-out hover:shadow-md hover:scale-[1.005] transform origin-center animate-fade-in animate-delay-{{ $loop->index * 100 + 400 }}">
                                <div class="flex items-start justify-between mb-1">
                                    <strong class="text-[var(--hover-bg)] text-lg font-bold">{{ $comment->user->name }}:</strong>
                                    <small class="text-gray-500 text-sm">{{ $comment->created_at->diffForHumans() }}</small>
                                </div>
                                <p class="text-gray-800 leading-relaxed">{{ $comment->comment }}</p>
                            </li>
                        @empty
                            <li class="text-center text-gray-600 py-4 animate-fade-in animate-delay-400">No comments yet. Be the first to add one!</li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
</x-app-layout>
