<x-app-layout>
    <x-slot name="header">
        <h1 class="text-4xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-[var(--primary-bg-light)] to-[var(--hover-bg)] dark:from-[var(--primary-border)] dark:to-[var(--primary-bg-light)] drop-shadow-lg animate-fade-in-down">
            Create Task for Project: {{ $project->name }}
        </h1>
    </x-slot>

    <div class="py-10 sm:px-6 lg:px-8 bg-gradient-to-br from-[var(--primary-bg-light)] via-[var(--primary-border)] to-[var(--secondary-bg)] dark:from-[var(--primary-bg)] dark:via-[var(--secondary-bg)] dark:to-[var(--primary-bg)] min-h-[calc(100vh-64px)] flex items-center justify-center">
        <div class="bg-white dark:bg-[var(--secondary-bg)] overflow-hidden shadow-3xl rounded-2xl border border-gray-200 dark:border-[var(--primary-border)] p-6 md:p-8 w-full max-w-2xl
                    transition-all duration-500 ease-in-out hover:shadow-4xl hover:scale-[1.005] transform origin-center animate-fade-in">
            <h2 class="text-2xl font-bold text-gray-900 dark:text-[var(--secondary-text)] mb-6 text-center bg-gradient-to-r from-[var(--primary-bg-light)]/10 to-[var(--primary-bg)]/10 dark:from-[var(--primary-bg)]/50 dark:to-[var(--secondary-bg)]/50 py-3 rounded-lg shadow-sm">
                Task Details
            </h2>
            <form method="POST" action="{{ route('projects.tasks.store', $project->id) }}" class="space-y-6">
                @csrf

                <div>
                    <label for="title" class="block text-base font-semibold text-gray-700 dark:text-[var(--primary-text)] mb-1">Task Title:</label>
                    <input
                        type="text"
                        name="title"
                        id="title"
                        required
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 dark:border-[var(--primary-border)] rounded-lg shadow-sm text-gray-900 dark:text-[var(--primary-text)] dark:bg-[var(--primary-bg)]
                               focus:ring-[var(--primary-bg-light)] focus:border-[var(--primary-bg-light)] focus:ring-2 focus:shadow-lg focus:shadow-[var(--primary-bg-light)]/50 dark:focus:shadow-[var(--primary-bg-light)]/50
                               transition-all duration-300 ease-in-out hover:border-[var(--hover-bg)] dark:hover:border-[var(--hover-bg)] hover:scale-[1.01] transform origin-center"
                    >
                </div>

                <div>
                    <label for="description" class="block text-base font-semibold text-gray-700 dark:text-[var(--primary-text)] mb-1">Description:</label>
                    <textarea
                        name="description"
                        id="description"
                        rows="4"
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 dark:border-[var(--primary-border)] rounded-lg shadow-sm text-gray-900 dark:text-[var(--primary-text)] dark:bg-[var(--primary-bg)]
                               focus:ring-[var(--primary-bg-light)] focus:border-[var(--primary-bg-light)] focus:ring-2 focus:shadow-lg focus:shadow-[var(--primary-bg-light)]/50 dark:focus:shadow-[var(--primary-bg-light)]/50
                               transition-all duration-300 ease-in-out hover:border-[var(--hover-bg)] dark:hover:border-[var(--hover-bg)] hover:scale-[1.01] transform origin-center"
                    ></textarea>
                </div>

                <div>
                    <label for="priority" class="block text-base font-semibold text-gray-700 dark:text-[var(--primary-text)] mb-1">Priority:</label>
                    <select
                        name="priority"
                        id="priority"
                        required
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 dark:border-[var(--primary-border)] rounded-lg shadow-sm text-gray-900 dark:text-[var(--primary-text)] dark:bg-[var(--primary-bg)]
                               focus:ring-[var(--primary-bg-light)] focus:border-[var(--primary-bg-light)] focus:ring-2 focus:shadow-lg focus:shadow-[var(--primary-bg-light)]/50 dark:focus:shadow-[var(--primary-bg-light)]/50
                               transition-all duration-300 ease-in-out hover:border-[var(--hover-bg)] dark:hover:border-[var(--hover-bg)] hover:scale-[1.01] transform origin-center"
                    >
                        <option value="">---Select Priority---</option>
                        <option value="Low">Low</option>
                        <option value="Medium">Medium</option>
                        <option value="High">High</option>
                        <option value="Urgent">Urgent</option>
                    </select>
                </div>

                <div>
                    <label for="status" class="block text-base font-semibold text-gray-700 dark:text-[var(--primary-text)] mb-1">Status:</label>
                    <select
                        name="status"
                        id="status"
                        required
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 dark:border-[var(--primary-border)] rounded-lg shadow-sm text-gray-900 dark:text-[var(--primary-text)] dark:bg-[var(--primary-bg)]
                               focus:ring-[var(--primary-bg-light)] focus:border-[var(--primary-bg-light)] focus:ring-2 focus:shadow-lg focus:shadow-[var(--primary-bg-light)]/50 dark:focus:shadow-[var(--primary-bg-light)]/50
                               transition-all duration-300 ease-in-out hover:border-[var(--hover-bg)] dark:hover:border-[var(--hover-bg)] hover:scale-[1.01] transform origin-center"
                    >
                        <option value="">---Select Status---</option>
                        <option value="To-Do">To-Do</option>
                        <option value="In Progress">In Progress</option>
                        <option value="On Hold">On Hold</option>
                        <option value="Done">Done</option>
                    </select>
                </div>

                <div>
                    <label for="due_date" class="block text-base font-semibold text-gray-700 dark:text-[var(--primary-text)] mb-1">Due Date:</label>
                    <input
                        type="date"
                        name="due_date"
                        id="due_date"
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 dark:border-[var(--primary-border)] rounded-lg shadow-sm text-gray-900 dark:text-[var(--primary-text)] dark:bg-[var(--primary-bg)]
                               focus:ring-[var(--primary-bg-light)] focus:border-[var(--primary-bg-light)] focus:ring-2 focus:shadow-lg focus:shadow-[var(--primary-bg-light)]/50 dark:focus:shadow-[var(--primary-bg-light)]/50
                               transition-all duration-300 ease-in-out hover:border-[var(--hover-bg)] dark:hover:border-[var(--hover-bg)] hover:scale-[1.01] transform origin-center"
                    >
                </div>

                <div>
                    <label class="block text-base font-semibold text-gray-700 dark:text-[var(--primary-text)] mb-2">Assign Employees:</label>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3">
                        @foreach ($project->users as $user)
                            <div class="relative flex items-center bg-gray-50 dark:bg-[var(--primary-bg)] p-3 rounded-lg shadow-sm
                                        transition-all duration-200 ease-in-out hover:bg-[var(--primary-bg-light)]/20 dark:hover:bg-[var(--hover-bg)]/50 hover:shadow-md hover:scale-[1.02] transform origin-center
                                        has-[input:checked]:bg-[var(--primary-bg-light)] has-[input:checked]:dark:bg-[var(--hover-bg)] has-[input:checked]:border-[var(--primary-bg-light)] has-[input:checked]:shadow-lg">
                                <label for="assigned-user-{{ $user->id }}" class="flex items-center w-full cursor-pointer">
                                    <input
                                        type="checkbox"
                                        name="assigned_user_ids[]"
                                        value="{{ $user->id }}"
                                        id="assigned-user-{{ $user->id }}"
                                        class="sr-only peer" {{-- Hidden visually, but functional and accessible --}}
                                        {{ isset($task) && $task->assignedUsers->contains($user->id) ? 'checked' : '' }}
                                    >
                                    <div class="h-4 w-4 border-2 border-gray-300 dark:border-[var(--primary-border)] rounded flex items-center justify-center
                                                peer-checked:bg-[var(--primary-bg-light)] peer-checked:border-[var(--primary-bg-light)] transition-all duration-200 ease-in-out">
                                        <svg class="h-3 w-3 text-white opacity-0 peer-checked:opacity-100 transition-opacity duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                        </svg>
                                    </div>
                                    <span class="ml-2 block text-sm text-gray-900 dark:text-[var(--primary-text)]">
                                        {{ $user->name }}
                                    </span>
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="flex justify-end gap-3 pt-4">
                    <a href="{{ route('projects.show', ['project' => $project]) }}" class="inline-flex items-center px-6 py-3 border border-gray-300 dark:border-[var(--primary-border)] text-base font-medium rounded-full shadow-md text-gray-700 dark:text-[var(--primary-text)] bg-white dark:bg-[var(--primary-bg)] hover:bg-gray-100 dark:hover:bg-[var(--hover-bg)]/50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[var(--primary-bg-light)] transition-all duration-300 ease-in-out hover:shadow-lg hover:scale-105 transform origin-center">
                        Cancel
                    </a>
                    <button type="submit" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-full shadow-xl text-white bg-gradient-to-r from-[var(--primary-bg-light)] to-[var(--hover-bg)] hover:from-[var(--hover-bg)] hover:to-[var(--primary-bg-light)] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[var(--primary-bg-light)] transition-all duration-300 ease-in-out hover:shadow-2xl hover:scale-105 transform origin-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                        Create Task
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>