<x-app-layout>
    <x-slot name="header">
        <h1 class="text-5xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-fuchsia-600 to-purple-700 dark:from-fuchsia-400 dark:to-purple-500 drop-shadow-lg">
            Project: {{ $project->title }}
        </h1>
    </x-slot>

    <div class="py-12 sm:px-6 lg:px-8 bg-gradient-to-br from-blue-100 via-purple-100 to-pink-100 dark:from-gray-900 dark:via-gray-850 dark:to-gray-800 min-h-[calc(100vh-64px)]">
        @if (session('success'))
            <div class="bg-green-100 border border-green-500 text-green-800 px-6 py-4 rounded-xl relative mb-8 shadow-xl transition-all duration-300 ease-in-out hover:shadow-2xl flex items-center" role="alert">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-3 text-green-600"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                <strong class="font-bold">Success!</strong>
                <span class="block sm:inline ml-2">{{ session('success') }}</span>
            </div>
        @endif
        @if (session('error'))
            <div class="bg-red-100 border border-red-500 text-red-800 px-6 py-4 rounded-xl relative mb-8 shadow-xl transition-all duration-300 ease-in-out hover:shadow-2xl flex items-center" role="alert">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-3 text-red-600"><circle cx="12" cy="12" r="10"/><line x1="15" y1="9" x2="9" y2="15"/><line x1="9" y1="9" x2="15" y2="15"/></svg>
                <strong class="font-bold">Error!</strong>
                <span class="block sm:inline ml-2">{{ session('error') }}</span>
            </div>
        @endif

        {{-- Project Details Card (More Compact) --}}
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-3xl rounded-2xl border border-gray-200 dark:border-gray-700 p-6 md:p-8 mb-12 transition-all duration-300 ease-in-out hover:shadow-4xl"> {{-- Reduced padding here --}}
            <h2 class="text-2xl font-bold text-gray-900 dark:text-gray-100 mb-6 text-center bg-gradient-to-r from-blue-50 to-indigo-50 dark:from-gray-700 dark:to-gray-750 py-3 rounded-lg shadow-sm"> {{-- Reduced font size and padding for internal title --}}
                Project Overview
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-base text-gray-700 dark:text-gray-300"> {{-- Reduced gap and font size --}}
                <p><strong class="font-semibold text-gray-900 dark:text-gray-100">Client:</strong> {{ $project->client_name }}</p>
                <p><strong class="font-semibold text-gray-900 dark:text-gray-100">Deadline:</strong> {{ \Carbon\Carbon::parse($project->deadline)->format('M d, Y') }}</p>
                <div class="md:col-span-2">
                    <strong class="font-semibold text-gray-900 dark:text-gray-100 block mb-1">Description:</strong> {{-- Reduced margin --}}
                    <p class="bg-gray-50 dark:bg-gray-700 p-3 rounded-lg shadow-inner text-gray-800 dark:text-gray-200 text-sm">{{ $project->description }}</p> {{-- Reduced padding and font size --}}
                </div>
                <div class="md:col-span-2">
                    <strong class="font-semibold text-gray-900 dark:text-gray-100 block mb-1">Members:</strong> {{-- Reduced margin --}}
                    <ul class="flex flex-wrap gap-1.5"> {{-- Slightly reduced gap --}}
                        @foreach ($project->members as $member)
                            <li class="bg-indigo-100 dark:bg-indigo-900 text-indigo-800 dark:text-indigo-200 px-2.5 py-1 rounded-full text-xs font-medium transition-colors duration-200 hover:bg-indigo-200 dark:hover:bg-indigo-800">
                                {{ $member->name }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="flex justify-end gap-3 pt-6"> {{-- Reduced gap and padding --}}
                @can('create task')
                    <a href="{{ route('projects.tasks.create', $project->id) }}" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-full shadow-xl text-white bg-gradient-to-r from-blue-600 to-cyan-600 hover:from-blue-700 hover:to-cyan-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-300 ease-in-out hover:shadow-2xl"> {{-- Reduced padding --}}
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
                        Add Task
                    </a>
                @endcan
                <a href="{{ route('projects.index') }}" class="inline-flex items-center px-6 py-3 border border-gray-300 dark:border-gray-600 text-base font-medium rounded-full shadow-md text-gray-700 dark:text-gray-200 bg-white dark:bg-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-all duration-300 ease-in-out hover:shadow-lg"> {{-- Reduced padding --}}
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><path d="M9 14 4 9l5-5"/><path d="M20 9H4"/></svg>
                    Back to Projects
                </a>
            </div>
        </div>

        {{-- Tasks Section --}}
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-3xl rounded-2xl border border-gray-200 dark:border-gray-700 p-8 md:p-10">
            <h2 class="text-3xl font-bold text-gray-900 dark:text-gray-100 mb-8 text-center bg-gradient-to-r from-blue-50 to-indigo-50 dark:from-gray-700 dark:to-gray-750 py-4 rounded-lg shadow-sm">
                Tasks
            </h2>
            @if($project->tasks->count() > 0)
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead class="bg-gradient-to-r from-purple-700 to-indigo-700 text-white shadow-md">
                            <tr>
                                <th scope="col" class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider rounded-tl-xl">#</th>
                                <th scope="col" class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider">Title</th>
                                <th scope="col" class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider">Assigned To</th>
                                <th scope="col" class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider">Priority</th>
                                <th scope="col" class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider">Status</th>
                                <th scope="col" class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider">Due Date</th>
                                <th scope="col" class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider rounded-tr-xl">Action</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                            @foreach ($project->tasks as $index => $task)
                                <tr class="odd:bg-gray-50 even:bg-white dark:odd:bg-gray-700 dark:even:bg-gray-800 hover:bg-blue-100 dark:hover:bg-gray-600 transition-all duration-200 ease-in-out hover:shadow-md">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-100">{{ $index + 1 }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">{{ $task->title }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                        <ul class="flex flex-wrap gap-1">
                                            @forelse ($task->assignedUsers as $user)
                                                <li class="bg-indigo-100 dark:bg-indigo-900 text-indigo-800 dark:text-indigo-200 px-2.5 py-1 rounded-full text-xs font-medium transition-colors duration-200 hover:bg-indigo-200 dark:hover:bg-indigo-800">
                                                    {{ $user->name }}
                                                </li>
                                            @empty
                                                <li class="text-gray-500 dark:text-gray-400 italic">No users assigned</li>
                                            @endforelse
                                        </ul>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <span class="px-3 py-1 rounded-full text-xs font-semibold
                                            @if($task->priority === 'Urgent') bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200
                                            @elseif($task->priority === 'High') bg-orange-100 text-orange-800 dark:bg-orange-900 dark:text-orange-200
                                            @elseif($task->priority === 'Medium') bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200
                                            @else bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200 @endif
                                            transition-colors duration-200">
                                            {{ ucfirst($task->priority) }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">{{ ucfirst($task->status) }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">{{ \Carbon\Carbon::parse($task->due_date)->format('M d, Y') }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <div class="flex flex-wrap gap-2">
                                            @can('edit task')
                                                <a href="{{ route('projects.tasks.edit', [$project->id, $task->id]) }}" class="inline-flex items-center px-4 py-2 border border-transparent text-xs font-medium rounded-md text-white bg-gradient-to-r from-yellow-500 to-orange-500 hover:from-yellow-600 hover:to-orange-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-400 transition-all duration-300 ease-in-out hover:shadow-lg">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-1"><path d="M12 20h9"/><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"/></svg>
                                                    Edit
                                                </a>
                                            @endcan
                                            @can('delete task')
                                                <form action="{{ route('projects.tasks.destroy', [$project->id, $task->id]) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this task?');" class="inline-block">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-xs font-medium rounded-md text-white bg-gradient-to-r from-red-600 to-rose-600 hover:from-red-700 hover:to-rose-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition-all duration-300 ease-in-out hover:shadow-lg">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-1"><path d="M3 6h18"/><path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"/><path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"/><line x1="10" x2="10" y1="11" y2="17"/><line x1="14" x2="14" y1="11" y2="17"/></svg>
                                                        Delete
                                                    </button>
                                                </form>
                                            @endcan
                                            @can('view timesheet')
                                                <a href="{{ route('tasks.timesheets.index', ['project' => $project->id, 'task' => $task->id]) }}" class="inline-flex items-center px-4 py-2 border border-transparent text-xs font-medium rounded-md text-white bg-gradient-to-r from-teal-500 to-emerald-600 hover:from-teal-600 hover:to-emerald-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500 transition-all duration-300 ease-in-out hover:shadow-lg">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-1"><path d="M8 2v4"/><path d="M16 2v4"/><rect width="18" height="18" x="3" y="4" rx="2"/><path d="M3 10h18"/><path d="M12 17v-6"/></svg>
                                                    Timesheet
                                                </a>
                                            @endcan
                                            <a href="{{ route('tasks.comments.index', ['project' => $project->id, 'task' => $task->id]) }}" class="inline-flex items-center px-4 py-2 border border-transparent text-xs font-medium rounded-md text-white bg-gradient-to-r from-indigo-500 to-purple-600 hover:from-indigo-600 hover:to-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-all duration-300 ease-in-out hover:shadow-lg">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-1"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V3a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
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
                    <div class="bg-gray-50 dark:bg-gray-700 p-6 rounded-lg shadow-inner text-center text-gray-600 dark:text-gray-300 text-lg font-medium">
                        <p>No tasks assigned to this project yet.</p>
                        @can('create task')
                            <a href="{{ route('projects.tasks.create', $project->id) }}" class="mt-6 inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-full shadow-lg text-white bg-gradient-to-r from-blue-600 to-cyan-600 hover:from-blue-700 hover:to-cyan-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-300 ease-in-out hover:shadow-xl">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
                                Add First Task
                            </a>
                        @endcan
                    </div>
                @endif
            </div>
        </div>
</x-app-layout>