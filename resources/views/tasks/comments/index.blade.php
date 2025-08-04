<x-app-layout>
    <x-slot name="header">
        <h1 class="text-4xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-[var(--primary-bg-light)] to-[var(--hover-bg)] dark:from-[var(--primary-border)] dark:to-[var(--primary-bg-light)] drop-shadow-lg animate-fade-in-down">
            Task Comments
        </h1>
    </x-slot>

    <div class="py-10 sm:px-6 lg:px-8 bg-gradient-to-br from-[var(--primary-bg-light)] via-[var(--primary-border)] to-[var(--secondary-bg)] dark:from-[var(--primary-bg)] dark:via-[var(--secondary-bg)] dark:to-[var(--primary-bg)] min-h-[calc(100vh-64px)] flex items-center justify-center">
        <div class="bg-white dark:bg-[var(--secondary-bg)] overflow-hidden shadow-3xl rounded-2xl border border-gray-200 dark:border-[var(--primary-border)] p-6 md:p-8 w-full max-w-3xl
                    transition-all duration-500 ease-in-out hover:shadow-4xl hover:scale-[1.005] transform origin-center animate-fade-in">

            @if (session('success'))
                <div class="bg-green-100 dark:bg-green-900 border border-green-400 dark:border-green-700 text-green-700 dark:text-green-200 px-4 py-3 rounded-lg relative mb-6 shadow-md animate-fade-in-down" role="alert">
                    <div class="flex items-center">
                        <div class="py-1"><svg class="fill-current h-6 w-6 text-green-500 dark:text-green-300 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
                        <div>
                            <p class="font-bold">Success!</p>
                            <p class="text-sm">{{ session('success') }}</p>
                        </div>
                    </div>
                </div>
            @endif
            @if (session('error'))
                <div class="bg-red-100 dark:bg-red-900 border border-red-400 dark:border-red-700 text-red-700 dark:text-red-200 px-4 py-3 rounded-lg relative mb-6 shadow-md animate-fade-in-down" role="alert">
                    <div class="flex items-center">
                        <div class="py-1"><svg class="fill-current h-6 w-6 text-red-500 dark:text-red-300 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
                        <div>
                            <p class="font-bold">Error!</p>
                            <p class="text-sm">{{ session('error') }}</p>
                        </div>
                    </div>
                </div>
            @endif

            <h2 class="text-2xl font-bold text-gray-900 dark:text-[var(--secondary-text)] mb-6 text-center bg-gradient-to-r from-[var(--primary-bg-light)]/10 to-[var(--primary-bg)]/10 dark:from-[var(--primary-bg)]/50 dark:to-[var(--secondary-bg)]/50 py-3 rounded-lg shadow-sm">
                Comments for Task: <span class="text-[var(--hover-bg)] dark:text-[var(--primary-border)]">{{ $task->title }}</span>
            </h2>

            <div class="mb-8 p-6 bg-gray-50 dark:bg-[var(--primary-bg)] rounded-xl shadow-inner border border-gray-200 dark:border-[var(--primary-border)] animate-fade-in-up">
                <h3 class="text-xl font-semibold text-gray-800 dark:text-[var(--primary-text)] mb-4">Add a New Comment</h3>
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
                            class="mt-1 block w-full px-4 py-2 border border-gray-300 dark:border-[var(--primary-border)] rounded-lg shadow-sm text-gray-900 dark:text-[var(--primary-text)] dark:bg-[var(--primary-bg)]
                                   focus:ring-[var(--primary-bg-light)] focus:border-[var(--primary-bg-light)] focus:ring-2 focus:shadow-lg focus:shadow-[var(--primary-bg-light)]/50 dark:focus:shadow-[var(--primary-bg-light)]/50
                                   transition-all duration-300 ease-in-out hover:border-[var(--hover-bg)] dark:hover:border-[var(--hover-bg)] hover:scale-[1.005] transform origin-center"
                        ></textarea>
                    </div>
                    <div class="flex justify-end gap-3">
                        <a href="{{ route('projects.show', ['project' => $project]) }}" class="inline-flex items-center px-6 py-3 border border-gray-300 dark:border-[var(--primary-border)] text-base font-medium rounded-full shadow-md text-gray-700 dark:text-[var(--primary-text)] bg-white dark:bg-[var(--primary-bg)] hover:bg-gray-100 dark:hover:bg-[var(--hover-bg)]/50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[var(--primary-bg-light)] transition-all duration-300 ease-in-out hover:shadow-lg hover:scale-105 transform origin-center">
                            Back to Task
                        </a>
                        <button type="submit" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-full shadow-xl text-white bg-gradient-to-r from-[var(--primary-bg-light)] to-[var(--hover-bg)] hover:from-[var(--hover-bg)] hover:to-[var(--primary-bg-light)] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[var(--primary-bg-light)] transition-all duration-300 ease-in-out hover:shadow-2xl hover:scale-105 transform origin-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                            Add Comment
                        </button>
                    </div>
                </form>
            </div>

            <div class="mt-8">
                <h3 class="text-xl font-semibold text-gray-800 dark:text-[var(--primary-text)] mb-4">All Comments</h3>
                <ul class="space-y-4">
                    @forelse($comments as $comment)
                        <li class="bg-gray-50 dark:bg-[var(--primary-bg)] p-4 rounded-lg shadow-sm border border-gray-200 dark:border-[var(--primary-border)] transition-all duration-200 ease-in-out hover:shadow-md hover:scale-[1.005] transform origin-center animate-fade-in-up">
                            <div class="flex items-start justify-between mb-1">
                                <strong class="text-[var(--hover-bg)] dark:text-[var(--primary-border)] text-lg font-bold">{{ $comment->user->name }}:</strong>
                                <small class="text-gray-500 dark:text-[var(--primary-text)] text-sm">{{ $comment->created_at->diffForHumans() }}</small>
                            </div>
                            <p class="text-gray-800 dark:text-[var(--secondary-text)] leading-relaxed">{{ $comment->comment }}</p>
                        </li>
                    @empty
                        <li class="text-center text-gray-600 dark:text-[var(--primary-text)] py-4 animate-fade-in-up">No comments yet. Be the first to add one!</li>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
</x-app-layout>