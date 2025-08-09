<x-app-layout>
    <x-slot name="header">
        <div class="mr-24 theme-app flex justify-between items-center p-6 rounded-lg shadow-sm" style="background: linear-gradient(to right, var(--secondary-bg), var(--primary-bg));">
            <div class="flex items-center space-x-3">
                <div class="p-2 rounded-lg shadow-md" style="background-color: var(--hover-bg);">
                    <svg class="w-6 h-6" style="color: var(--primary-text);" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                    </svg>
                </div>
                <div>
                    <h2 class="font-bold text-2xl leading-tight" style="color: var(--primary-text);">
                        Task Comments
                    </h2>
                    <p class="text-sm" style="color: var(--secondary-text);">Comments for: {{ $task->title }}</p>
                </div>
            </div>
            <a href="{{ route('projects.show', ['project' => $project]) }}" 
               class="inline-flex items-center px-6 py-3 font-semibold rounded-lg shadow-lg hover:scale-105 transform transition-all duration-300 ease-in-out focus:outline-none focus:ring-4"
               style="background-color: var(--hover-bg); color: var(--primary-text);"
               onmouseover="this.style.backgroundColor='var(--primary-bg-light)'"
               onmouseout="this.style.backgroundColor='var(--hover-bg)'">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Back to Project
            </a>
        </div>
    </x-slot>

    <div class="py-8 bg-gradient-to-br from-gray-50 to-blue-50 min-h-screen">
        <div class="w-full px-4 sm:px-6 lg:px-8 space-y-8">
            @if (session('success'))
                <div class="bg-green-50 border-l-4 border-green-400 p-4 rounded-lg">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-green-400" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm text-green-700 font-medium">{{ session('success') }}</p>
                        </div>
                    </div>
                </div>
            @endif

            @if (session('error'))
                <div class="bg-red-50 border-l-4 border-red-400 p-4 rounded-lg">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-red-400" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm text-red-700 font-medium">{{ session('error') }}</p>
                        </div>
                    </div>
                </div>
            @endif

            <!-- Task Information Card -->
            <div class="bg-white rounded-xl shadow-xl overflow-hidden border border-gray-200">
                <div class="theme-app px-6 py-4 border-b border-gray-200" style="background: linear-gradient(to right, var(--secondary-bg), var(--primary-bg));">
                    <div class="flex items-center space-x-3">
                        <div class="p-2 rounded-lg shadow-sm" style="background-color: var(--hover-bg);">
                            <svg class="w-5 h-5" style="color: var(--primary-text);" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2v2M7 9h10"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold" style="color: var(--primary-text);">Task Information</h3>
                            <p class="text-sm" style="color: var(--secondary-text);">Details about the current task</p>
                        </div>
                    </div>
                </div>
                
                <div class="p-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-base text-gray-700">
                        <p><strong class="font-semibold text-gray-900">Task:</strong> {{ $task->title }}</p>
                        <p><strong class="font-semibold text-gray-900">Project:</strong> {{ $project->title }}</p>
                        <p><strong class="font-semibold text-gray-900">Priority:</strong> 
                            <span class="px-2 py-1 rounded-full text-xs font-semibold
                                @if($task->priority === 'Urgent') bg-red-100 text-red-800
                                @elseif($task->priority === 'High') bg-orange-100 text-orange-800
                                @elseif($task->priority === 'Medium') bg-blue-100 text-blue-800
                                @else bg-green-100 text-green-800 @endif">
                                {{ $task->priority }}
                            </span>
                        </p>
                        <p><strong class="font-semibold text-gray-900">Status:</strong> {{ $task->status }}</p>
                    </div>
                    @if($task->description)
                        <div class="mt-4">
                            <strong class="font-semibold text-gray-900 block mb-2">Description:</strong>
                            <p class="bg-gray-50 p-4 rounded-lg shadow-inner text-gray-800">{{ $task->description }}</p>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Add Comment Card -->
            <div class="bg-white rounded-xl shadow-xl overflow-hidden border border-gray-200">
                <div class="theme-app px-6 py-4 border-b border-gray-200" style="background: linear-gradient(to right, var(--secondary-bg), var(--primary-bg));">
                    <div class="flex items-center space-x-3">
                        <div class="p-2 rounded-lg shadow-sm" style="background-color: var(--hover-bg);">
                            <svg class="w-5 h-5" style="color: var(--primary-text);" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold" style="color: var(--primary-text);">Add New Comment</h3>
                            <p class="text-sm" style="color: var(--secondary-text);">Share your thoughts about this task</p>
                        </div>
                    </div>
                </div>
                
                <div class="p-6">
                    <form action="{{ route('tasks.comments.store', [$task->project_id, $task->id]) }}" method="POST" class="space-y-4">
                        @csrf
                        <div>
                            <label for="comment" class="block text-sm font-semibold text-gray-700 mb-2">Your Comment</label>
                            <textarea name="comment" 
                                      id="comment"
                                      rows="4"
                                      required
                                      placeholder="Write your comment here..."
                                      class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-4 focus:ring-blue-200 focus:border-blue-500 transition-all duration-300 ease-in-out hover:border-gray-400 bg-gray-50 focus:bg-white resize-none"></textarea>
                            @error('comment')
                                <div class="flex items-center space-x-2 mt-2 p-3 bg-red-50 border border-red-200 rounded-lg">
                                    <svg class="w-4 h-4 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <span class="text-sm text-red-600 font-medium">{{ $message }}</span>
                                </div>
                            @enderror
                        </div>
                        
                        <div class="flex items-center justify-end space-x-4 pt-4">
                            <button type="submit"
                                    class="theme-app inline-flex items-center px-8 py-3 font-semibold rounded-lg shadow-lg hover:scale-105 transform transition-all duration-300 ease-in-out focus:outline-none focus:ring-4"
                                    style="background-color: var(--hover-bg); color: var(--primary-text);"
                                    onmouseover="this.style.backgroundColor='var(--primary-bg-light)'"
                                    onmouseout="this.style.backgroundColor='var(--hover-bg)'">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                                Add Comment
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Comments List Card -->
            <div class="bg-white rounded-xl shadow-xl overflow-hidden border border-gray-200">
                <div class="theme-app px-6 py-4 border-b border-gray-200" style="background: linear-gradient(to right, var(--secondary-bg), var(--primary-bg));">
                    <div class="flex items-center space-x-3">
                        <div class="p-2 rounded-lg shadow-sm" style="background-color: var(--hover-bg);">
                            <svg class="w-5 h-5" style="color: var(--primary-text);" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a2 2 0 01-2-2v-6a2 2 0 012-2h8z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold" style="color: var(--primary-text);">All Comments ({{ $comments->count() }})</h3>
                            <p class="text-sm" style="color: var(--secondary-text);">Discussion history for this task</p>
                        </div>
                    </div>
                </div>
                
                <div class="p-6">
                    @forelse($comments as $comment)
                        <div class="mb-6 p-4 bg-gray-50 rounded-lg border border-gray-200 hover:bg-gray-100 transition-all duration-200 {{ !$loop->last ? 'border-b border-gray-300 pb-6' : '' }}">
                            <div class="flex items-start justify-between mb-3">
                                <div class="flex items-center space-x-3">
                                    <div class="w-10 h-10 bg-blue-500 rounded-full flex items-center justify-center text-white font-semibold text-sm">
                                        {{ strtoupper(substr($comment->user->name, 0, 2)) }}
                                    </div>
                                    <div>
                                        <h4 class="font-semibold text-gray-900">{{ $comment->user->name }}</h4>
                                        <p class="text-sm text-gray-500">{{ $comment->created_at->format('M d, Y \a\t g:i A') }}</p>
                                    </div>
                                </div>
                                <span class="text-xs text-gray-400">{{ $comment->created_at->diffForHumans() }}</span>
                            </div>
                            <div class="ml-13">
                                <p class="text-gray-800 leading-relaxed">{{ $comment->comment }}</p>
                            </div>
                        </div>
                    @empty
                        <div class="text-center py-12">
                            <div class="bg-gray-100 p-4 rounded-full mx-auto mb-4 w-fit">
                                <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                                </svg>
                            </div>
                            <h3 class="text-lg font-medium text-gray-900 mb-2">No Comments Yet</h3>
                            <p class="text-gray-500 mb-4">Be the first to start the discussion about this task.</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout>