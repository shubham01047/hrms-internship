<x-app-layout>
    <x-slot name="header">
        <h1 class="text-4xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-[var(--primary-bg-light)] to-[var(--hover-bg)] dark:from-[var(--primary-border)] dark:to-[var(--primary-bg-light)] drop-shadow-lg animate-fade-in-down">
            Edit Timesheet
        </h1>
    </x-slot>

    <div class="py-10 sm:px-6 lg:px-8 bg-gradient-to-br from-[var(--primary-bg-light)] via-[var(--primary-border)] to-[var(--secondary-bg)] dark:from-[var(--primary-bg)] dark:via-[var(--secondary-bg)] dark:to-[var(--primary-bg)] min-h-[calc(100vh-64px)] flex items-center justify-center">
        <div class="bg-white dark:bg-[var(--secondary-bg)] overflow-hidden shadow-3xl rounded-2xl border border-gray-200 dark:border-[var(--primary-border)] p-6 md:p-8 w-full max-w-2xl
                    transition-all duration-500 ease-in-out hover:shadow-4xl hover:scale-[1.005] transform origin-center animate-fade-in">
            <h2 class="text-2xl font-bold text-gray-900 dark:text-[var(--secondary-text)] mb-6 text-center bg-gradient-to-r from-[var(--primary-bg-light)]/10 to-[var(--primary-bg)]/10 dark:from-[var(--primary-bg)]/50 dark:to-[var(--secondary-bg)]/50 py-3 rounded-lg shadow-sm">
                Timesheet Details
            </h2>
            <form method="POST" action="{{ route('tasks.timesheets.update', [$projectId, $task->id, $timesheet->id]) }}" class="space-y-6">
                @csrf
                @method('PUT')

                <div>
                    <label for="date" class="block text-base font-semibold text-gray-700 dark:text-[var(--primary-text)] mb-1">Date:</label>
                    <input
                        type="date"
                        name="date"
                        id="date"
                        value="{{ old('date', $timesheet->date) }}"
                        required
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 dark:border-[var(--primary-border)] rounded-lg shadow-sm text-gray-900 dark:text-[var(--primary-text)] dark:bg-[var(--primary-bg)]
                               focus:ring-[var(--primary-bg-light)] focus:border-[var(--primary-bg-light)] focus:ring-2 focus:shadow-lg focus:shadow-[var(--primary-bg-light)]/50 dark:focus:shadow-[var(--primary-bg-light)]/50
                               transition-all duration-300 ease-in-out hover:border-[var(--hover-bg)] dark:hover:border-[var(--hover-bg)] hover:scale-[1.01] transform origin-center"
                    >
                </div>

                <div>
                    <label for="hours_worked" class="block text-base font-semibold text-gray-700 dark:text-[var(--primary-text)] mb-1">Hours Worked:</label>
                    <input
                        type="number"
                        name="hours_worked"
                        id="hours_worked"
                        step="0.01"
                        min="0.1"
                        max="24"
                        value="{{ old('hours_worked', $timesheet->hours_worked) }}"
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
                    >{{ old('description', $timesheet->description) }}</textarea>
                </div>

                <div class="flex justify-end gap-3 pt-4">
                    <a href="{{ route('tasks.timesheets.index', [$projectId, 'task' => $task->id]) }}" class="inline-flex items-center px-6 py-3 border border-gray-300 dark:border-[var(--primary-border)] text-base font-medium rounded-full shadow-md text-gray-700 dark:text-[var(--primary-text)] bg-white dark:bg-[var(--primary-bg)] hover:bg-gray-100 dark:hover:bg-[var(--hover-bg)]/50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[var(--primary-bg-light)] transition-all duration-300 ease-in-out hover:shadow-lg hover:scale-105 transform origin-center">
                        Cancel
                    </a>
                    <button type="submit" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-full shadow-xl text-white bg-gradient-to-r from-[var(--primary-bg-light)] to-[var(--hover-bg)] hover:from-[var(--hover-bg)] hover:to-[var(--primary-bg-light)] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[var(--primary-bg-light)] transition-all duration-300 ease-in-out hover:shadow-2xl hover:scale-105 transform origin-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                        Update Timesheet
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>