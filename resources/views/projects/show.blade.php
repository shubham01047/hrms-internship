<x-app-layout>
    <x-slot name="header">
        <div class="theme-app flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between p-4 sm:p-6 rounded-lg shadow-sm"
            style="background: linear-gradient(to right, var(--secondary-bg), var(--primary-bg));">
            <div class="flex items-center space-x-3">
                <div class="p-2 rounded-lg shadow-md" style="background-color: var(--hover-bg);">
                    <svg class="w-6 h-6" style="color: var(--primary-text);" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                        </path>
                    </svg>
                </div>
                <div class="min-w-0">
                    <h2 class="font-bold text-xl sm:text-2xl leading-tight truncate"
                        style="color: var(--primary-text);">Project: {{ $project->title }}</h2>
                    <p class="text-xs sm:text-sm" style="color: var(--secondary-text);">Project details and task
                        management</p>
                </div>
            </div>
            <div class="flex flex-col sm:flex-row gap-3 w-full sm:w-auto lg:mr-24">
                @can('create task')
                    <a href="{{ route('projects.tasks.create', $project->id) }}"
                        class="theme-app inline-flex items-center justify-center px-5 sm:px-6 py-2.5 sm:py-3 font-semibold rounded-lg shadow-lg hover:scale-105 transform transition-all duration-300 ease-in-out focus:outline-none focus:ring-4 border-2 border-white"
                        style="background-color: var(--primary-bg); color: var(--primary-text);"
                        onmouseover="this.style.backgroundColor='var(--primary-bg-light)'"
                        onmouseout="this.style.backgroundColor='var(--primary-bg)'">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                        Add Task
                    </a>
                @endcan
                <a href="{{ route('projects.index') }}"
                    class="inline-flex items-center justify-center w-full sm:w-auto px-5 sm:px-6 py-2.5 sm:py-3 font-semibold rounded-lg shadow-lg hover:scale-105 transform transition-all duration-300 ease-in-out focus:outline-none focus:ring-4"
                    style="background-color: var(--hover-bg); color: var(--primary-text);"
                    onmouseover="this.style.backgroundColor='var(--primary-bg-light)'"
                    onmouseout="this.style.backgroundColor='var(--hover-bg)'">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Back to Projects
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-4 sm:py-6 bg-gradient-to-br from-gray-50 to-blue-50 min-h-screen">
        <div class="w-full px-3 sm:px-6 lg:px-8 space-y-4 sm:space-y-5">
            @if (session('success'))
                <div class="bg-green-50 border-l-4 border-green-400 p-4 rounded-lg">
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
                <div class="bg-red-50 border-l-4 border-red-400 p-4 rounded-lg">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-red-400" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 001.414 1.414L10 11.414l1.293 1.293a1 1 0 00-1.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm text-red-700 font-medium">{{ session('error') }}</p>
                        </div>
                    </div>
                </div>
            @endif

            <div class="bg-white rounded-xl shadow-xl overflow-hidden border border-gray-200">
                <div class="theme-app px-3 sm:px-4 py-3 border-b border-gray-200"
                    style="background: linear-gradient(to right, var(--secondary-bg), var(--primary-bg));">
                    <div class="flex items-center gap-3">
                        <div class="p-2 rounded-lg shadow-sm" style="background-color: var(--hover-bg);">
                            <svg class="w-5 h-5" style="color: var(--primary-text);" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                </path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold" style="color: var(--primary-text);">Project Overview</h3>
                            <p class="text-sm" style="color: var(--secondary-text);">Key details about your project</p>
                        </div>
                    </div>
                </div>

                <div class="p-3 sm:p-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-3 sm:gap-4 text-base text-gray-700 mb-4">
                        <p><strong class="font-semibold text-gray-900">Client:</strong>
                            {{ $project->client_name ?: 'Not specified' }}</p>
                        <p><strong class="font-semibold text-gray-900">Deadline:</strong>
                            {{ \Carbon\Carbon::parse($project->deadline)->format('M d, Y') }}</p>
                        @can('view project budget')
                            @if ($project->budget)
                                <p><strong class="font-semibold text-gray-900">Budget:</strong>
                                    ₹{{ number_format($project->budget, 2) }}</p>
                            @endif
                        @endcan
                        <div class="md:col-span-2">
                            <strong class="font-semibold text-gray-900 block mb-2">Description:</strong>
                            <p class="bg-gray-50 p-3 rounded-lg shadow-inner text-gray-800">
                                {{ $project->description ?: 'No description provided' }}</p>
                        </div>
                        <div class="md:col-span-2">
                            <strong class="font-semibold text-gray-900 block mb-2">Team Members:</strong>
                            <div class="flex flex-wrap gap-2">
                                @forelse ($project->members as $member)
                                    <span
                                        class="bg-gray-200 text-gray-700 px-3 py-1.5 rounded-full text-sm font-medium transition-colors duration-200 hover:bg-gray-300">{{ $member->name }}</span>
                                @empty
                                    <span class="text-gray-500 italic">No members assigned</span>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-xl overflow-hidden border border-gray-200">
                <div class="theme-app px-3 sm:px-4 py-3 border-b border-gray-200"
                    style="background: linear-gradient(to right, var(--primary-bg), var(--secondary-bg));">
                    <div class="flex items-center gap-3">
                        <div class="p-2 rounded-lg shadow-sm" style="background-color: var(--hover-bg);">
                            <svg class="w-5 h-5" style="color: var(--primary-text);" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2v2M7 9h10">
                                </path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold" style="color: var(--primary-text);">Tasks</h3>
                            <p class="text-sm" style="color: var(--secondary-text);">All tasks associated with this
                                project</p>
                        </div>
                    </div>
                </div>

                <div class="px-3 sm:px-4 py-3 border-b border-gray-100 bg-white">
                    <div class="flex items-center gap-2">
                        <div class="relative flex-1 max-w-md">
                            <input
                                id="taskSearch"
                                type="text"
                                placeholder="Search tasks by title..."
                                class="w-full rounded-md border border-gray-300 px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                                aria-label="Search tasks by title"
                            />
                        </div>
                        <button
                            id="clearTaskSearch"
                            type="button"
                            class="text-sm px-3 py-2 rounded-md bg-gray-100 text-gray-700 hover:bg-gray-200"
                            aria-label="Clear task search"
                        >
                            Clear
                        </button>
                        <span id="taskSearchCount" class="text-xs text-gray-500" aria-live="polite"></span>
                    </div>
                </div>

                @if ($project->tasks->count() > 0)
                    <div class="overflow-x-auto">
                        <table id="tasksTable" class="min-w-full divide-y divide-gray-200">
                            <thead class="theme-app"
                                style="background: linear-gradient(to right, var(--primary-bg), var(--secondary-bg));">
                                <tr>
                                    <th scope="col"
                                        class="px-4 sm:px-6 py-3 sm:py-4 text-left text-xs font-bold uppercase tracking-wider"
                                        style="color: var(--primary-text);">#</th>
                                    <th scope="col"
                                        class="px-4 sm:px-6 py-3 sm:py-4 text-left text-xs font-bold uppercase tracking-wider"
                                        style="color: var(--primary-text);">Title</th>
                                    <th scope="col"
                                        class="px-4 sm:px-6 py-3 sm:py-4 text-left text-xs font-bold uppercase tracking-wider"
                                        style="color: var(--primary-text);">Assigned To</th>
                                    <th scope="col"
                                        class="px-4 sm:px-6 py-3 sm:py-4 text-left text-xs font-bold uppercase tracking-wider"
                                        style="color: var(--primary-text);">Priority</th>
                                    <th scope="col"
                                        class="px-4 sm:px-6 py-3 sm:py-4 text-left text-xs font-bold uppercase tracking-wider"
                                        style="color: var(--primary-text);">Status</th>
                                    <th scope="col"
                                        class="px-4 sm:px-6 py-3 sm:py-4 text-left text-xs font-bold uppercase tracking-wider"
                                        style="color: var(--primary-text);">Due Date</th>
                                    <th scope="col"
                                        class="px-4 sm:px-6 py-3 sm:py-4 text-left text-xs font-bold uppercase tracking-wider"
                                        style="color: var(--primary-text);">Hours Assigned</th>
                                    <th scope="col"
                                        class="px-4 sm:px-6 py-3 sm:py-4 text-left text-xs font-bold uppercase tracking-wider"
                                        style="color: var(--primary-text);">Action</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($project->tasks as $index => $task)
                                    <tr
                                        class="hover:bg-gray-50 transition-all duration-200 {{ $index % 2 == 0 ? 'bg-white' : 'bg-gray-50' }}">
                                        <td
                                            class="px-4 sm:px-6 py-3 sm:py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                            {{ $index + 1 }}</td>
                                        <td class="px-4 sm:px-6 py-3 sm:py-4 whitespace-nowrap text-sm text-gray-800">
                                            {{ $task->title }}</td>
                                        <td class="px-4 sm:px-6 py-3 sm:py-4 whitespace-nowrap text-sm text-gray-800">
                                            <div class="flex flex-wrap gap-1">
                                                @forelse ($task->assignedUsers as $user)
                                                    <span
                                                        class="bg-gray-200 text-gray-700 px-2.5 py-1 rounded-full text-xs font-medium">{{ $user->name }}</span>
                                                @empty
                                                    <span class="text-gray-500 italic">No users assigned</span>
                                                @endforelse
                                            </div>
                                        </td>
                                        <td class="px-4 sm:px-6 py-3 sm:py-4 whitespace-nowrap text-sm font-medium">
                                            <span
                                                class="px-3 py-1 rounded-full text-xs font-semibold
                                                @if ($task->priority === 'Urgent') bg-red-100 text-red-800
                                                @elseif($task->priority === 'High') bg-orange-100 text-orange-800
                                                @elseif($task->priority === 'Medium') bg-blue-100 text-blue-800
                                                @else bg-green-100 text-green-800 @endif">
                                                {{ ucfirst($task->priority) }}
                                            </span>
                                        </td>
                                        <td class="px-4 sm:px-6 py-3 sm:py-4 whitespace-nowrap text-sm font-medium">
                                            <span
                                                class="px-3 py-1 rounded-full text-xs font-semibold
                                                @if ($task->status === 'Done') bg-green-100 text-green-800
                                                @elseif($task->status === 'In Progress') bg-blue-100 text-blue-800
                                                @elseif($task->status === 'On Hold') bg-yellow-100 text-yellow-800
                                                @else bg-gray-100 text-gray-800 @endif">
                                                {{ ucfirst($task->status) }}
                                            </span>
                                        </td>
                                        <td class="px-4 sm:px-6 py-3 sm:py-4 whitespace-nowrap text-sm text-gray-800">
                                            {{ \Carbon\Carbon::parse($task->due_date)->format('M d, Y') }}</td>
                                        @php
                                            $decimalHours = $task->hours_assigned ?? 0;
                                            $hours = floor($decimalHours);
                                            $minutes = round(($decimalHours - $hours) * 60);
                                        @endphp
                                        <td class="px-4 sm:px-6 py-3 sm:py-4 whitespace-nowrap text-sm text-gray-800">
                                            {{ $hours }} hr {{ $minutes }} min
                                        </td>
                                        <td class="px-4 sm:px-6 py-3 sm:py-4 whitespace-nowrap text-sm font-medium">
                                            <div class="flex flex-wrap gap-2">
                                                @can('edit task')
                                                    <a href="{{ route('projects.tasks.edit', [$project->id, $task->id]) }}"
                                                        class="inline-flex items-center px-4 py-2 text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 transition-all duration-200 hover:scale-105">
                                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor"
                                                            viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                                            </path>
                                                        </svg>
                                                        Edit
                                                    </a>
                                                @endcan
                                                @can('delete task')
                                                    <button type="button" onclick="deleteTask({{ $project->id }}, {{ $task->id }}, '{{ $task->title }}')"
                                                            class="inline-flex items-center px-4 py-2 text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 transition-all duration-200 hover:scale-105">
                                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                                            </path>
                                                        </svg>
                                                        Delete
                                                    </button>
                                                @endcan
                                                @can('view timesheet')
                                                    <a href="{{ route('tasks.timesheets.index', ['project' => $project->id, 'task' => $task->id]) }}"
                                                        class="inline-flex items-center px-4 py-2 text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 transition-all duration-200 hover:scale-105">
                                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor"
                                                            viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                        </svg>
                                                        Timesheet
                                                    </a>
                                                @endcan
                                                <a href="{{ route('tasks.comments.index', ['project' => $project->id, 'task' => $task->id]) }}"
                                                    class="inline-flex items-center px-4 py-2 text-sm font-medium rounded-md text-white bg-purple-600 hover:bg-purple-700 transition-all duration-200 hover:scale-105">
                                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z">
                                                        </path>
                                                    </svg>
                                                    Comments
                                                </a>
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
                                    d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2v2M7 9h10">
                                </path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-medium text-gray-900 mb-2">No Tasks Found</h3>
                        <p class="text-gray-500 mb-4">No tasks have been assigned to this project yet.</p>
                        @can('create task')
                            <a href="{{ route('projects.tasks.create', $project->id) }}"
                                class="theme-app inline-flex items-center px-6 py-3 font-semibold rounded-lg shadow-lg hover:scale-105 transition-all duration-300 focus:outline-none focus:ring-4 border-2 border-white"
                                style="background-color: var(--hover-bg); color: var(--primary-text);">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                                Add First Task
                            </a>
                        @endcan
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div id="deleteModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-50" style="display: none;">
        <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
            <div class="mt-3 text-center">
                <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-red-100">
                    <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                    </svg>
                </div>
                <h3 class="text-lg font-medium text-gray-900 mt-4">Delete Task</h3>
                <div class="mt-2 px-7 py-3">
                    <p class="text-sm text-gray-500">
                        Are you sure you want to delete the task "<span id="taskName" class="font-semibold text-red-600"></span>"?
                    </p>
                    <p class="text-xs text-red-400 mt-2">This action cannot be undone and will permanently remove this task and all associated data.</p>
                </div>
                <div class="items-center px-4 py-3">
                    <button id="confirmDelete" class="px-4 py-2 bg-red-500 text-white text-base font-medium rounded-md w-24 mr-2 hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-300">
                        <span class="delete-text">Delete</span>
                        <div class="delete-spinner" style="display: none;">
                            <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                        </div>
                    </button>
                    <button id="cancelDelete" class="px-4 py-2 bg-gray-500 text-white text-base font-medium rounded-md w-24 hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-300">Cancel</button>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        let currentProjectId = null;
        let currentTaskId = null;

        function deleteTask(projectId, taskId, taskName) {
            currentProjectId = projectId;
            currentTaskId = taskId;
            $('#taskName').text(taskName);
            $('#deleteModal').fadeIn(300);
            $('body').css('overflow', 'hidden');
        }

        // Delete modal handlers
        $('#confirmDelete').click(function() {
            if (currentProjectId && currentTaskId) {
                // Show loading state
                $('.delete-text').hide();
                $('.delete-spinner').show();
                $(this).prop('disabled', true);
                $('#cancelDelete').prop('disabled', true);

                // Create and submit form
                const form = $('<form>', {
                    'method': 'POST',
                    'action': '{{ route("projects.tasks.destroy", [":projectId", ":taskId"]) }}'.replace(':projectId', currentProjectId).replace(':taskId', currentTaskId)
                });
                form.append('@csrf');
                form.append('@method("DELETE")');
                $('body').append(form);
                form.submit();
            }
        });

        $('#cancelDelete').click(function() {
            $('#deleteModal').fadeOut(300);
            $('body').css('overflow', 'auto');
            currentProjectId = null;
            currentTaskId = null;
        });

        // Close modal on background click
        $('#deleteModal').click(function(e) {
            if (e.target === this) {
                $(this).fadeOut(300);
                $('body').css('overflow', 'auto');
                currentProjectId = null;
                currentTaskId = null;
            }
        });

        // Close modal on ESC key
        $(document).keydown(function(e) {
            if (e.keyCode === 27) {
                $('#deleteModal').fadeOut(300);
                $('body').css('overflow', 'auto');
                currentProjectId = null;
                currentTaskId = null;
            }
        });

        // Task search logic
        $(function() {
            const $input = $('#taskSearch');
            const $clear = $('#clearTaskSearch');
            const $count = $('#taskSearchCount');

            function normalize(s) {
                return (s || '').toString().toLowerCase().trim();
            }

            function applyFilter() {
                const q = normalize($input.val());
                const $rows = $('#tasksTable tbody tr');

                if (!q) {
                    $rows.show();
                    $count.text('');
                    return;
                }

                let visible = 0;
                $rows.each(function() {
                    // Only check the Title column (second td)
                    const titleText = normalize($(this).find('td:nth-child(2)').text());
                    const match = titleText.indexOf(q) !== -1;
                    $(this).toggle(match);
                    if (match) visible++;
                });

                $count.text(visible + ' match' + (visible === 1 ? '' : 'es'));
            }

            $input.on('input', applyFilter);
            $clear.on('click', function() {
                $input.val('');
                applyFilter();
                $input.trigger('focus');
            });
        });
    </script>

    <style>
        .animate-spin {
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>
</x-app-layout>
