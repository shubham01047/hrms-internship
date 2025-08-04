<x-app-layout>
    <x-slot name="header">
        <h1 class="text-4xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-fuchsia-600 to-purple-700 dark:from-fuchsia-400 dark:to-purple-500 drop-shadow-lg">
            Worklogs for Task: {{ $task->title }}
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

        <div class="mb-10 flex justify-end gap-4">
            @can('create timesheet')
                <a href="{{ route('tasks.timesheets.create', [$task->project_id, $task->id]) }}" class="inline-flex items-center px-8 py-4 border border-transparent text-base font-medium rounded-full shadow-xl text-white bg-gradient-to-r from-blue-600 to-cyan-600 hover:from-blue-700 hover:to-cyan-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-300 ease-in-out hover:shadow-2xl">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
                    Create Timesheet
                </a>
            @endcan
            <a href="{{ route('projects.show', ['project' => $task->project_id]) }}" class="inline-flex items-center px-8 py-4 border border-gray-300 dark:border-gray-600 text-base font-medium rounded-full shadow-md text-gray-700 dark:text-gray-200 bg-white dark:bg-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-all duration-300 ease-in-out hover:shadow-lg">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><path d="M9 14 4 9l5-5"/><path d="M20 9H4"/></svg>
                Back to Task
            </a>
        </div>

        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-3xl rounded-2xl border border-gray-200 dark:border-gray-700 p-8 md:p-10">
            <h2 class="text-3xl font-bold text-gray-900 dark:text-gray-100 mb-8 text-center bg-gradient-to-r from-blue-50 to-indigo-50 dark:from-gray-700 dark:to-gray-750 py-4 rounded-lg shadow-sm">
                Timesheet Entries
            </h2>
            @if($timesheets->count() > 0)
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead class="bg-gradient-to-r from-purple-700 to-indigo-700 text-white shadow-md">
                            <tr>
                                <th scope="col" class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider rounded-tl-xl">User</th>
                                <th scope="col" class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider">Date</th>
                                <th scope="col" class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider">Hours Worked</th>
                                <th scope="col" class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider">Description</th>
                                <th scope="col" class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider">Status</th>
                                <th scope="col" class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider rounded-tr-xl">Action</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                            @foreach ($timesheets as $timesheet)
                                <tr class="odd:bg-gray-50 even:bg-white dark:odd:bg-gray-700 dark:even:bg-gray-800 hover:bg-blue-100 dark:hover:bg-gray-600 transition-all duration-200 ease-in-out hover:shadow-md">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-100">{{ $timesheet->user->name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">{{ \Carbon\Carbon::parse($timesheet->date)->format('M d, Y') }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">{{ $timesheet->hours_worked }} Hours</td>
                                    <td class="px-6 py-4 text-sm text-gray-600 dark:text-gray-300 max-w-xs overflow-hidden text-ellipsis">{{ $timesheet->description }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <span class="px-3 py-1 rounded-full text-xs font-semibold
                                            @if($timesheet->status === 'Approved') bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200
                                            @elseif($timesheet->status === 'Rejected') bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200
                                            @else bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200 @endif
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
                                                    <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-xs font-medium rounded-md text-white bg-gradient-to-r from-green-500 to-emerald-600 hover:from-green-600 hover:to-emerald-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition-all duration-300 ease-in-out hover:shadow-lg">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-1"><polyline points="20 6 9 17 4 12"/></svg>
                                                        Approve
                                                    </button>
                                                </form>
                                            @endcan
                                            @can('reject timesheet')
                                                <form method="POST" action="{{ route('timesheets.reject', $timesheet->id) }}" class="inline-block">
                                                    @csrf
                                                    @method('PUT')
                                                    <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-xs font-medium rounded-md text-white bg-gradient-to-r from-red-600 to-rose-600 hover:from-red-700 hover:to-rose-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition-all duration-300 ease-in-out hover:shadow-lg">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-1"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
                                                        Reject
                                                    </button>
                                                </form>
                                            @endcan
                                            @can('edit timesheet')
                                                <a href="{{ route('tasks.timesheets.edit', [$task->project_id, $task->id, $timesheet->id]) }}" class="inline-flex items-center px-4 py-2 border border-transparent text-xs font-medium rounded-md text-white bg-gradient-to-r from-yellow-500 to-orange-500 hover:from-yellow-600 hover:to-orange-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-400 transition-all duration-300 ease-in-out hover:shadow-lg">
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
                <div class="bg-gray-50 dark:bg-gray-700 p-6 rounded-lg shadow-inner text-center text-gray-600 dark:text-gray-300 text-lg font-medium">
                    <p>No timesheet entries for this task yet.</p>
                    @can('create timesheet')
                        <a href="{{ route('tasks.timesheets.create', [$task->project_id, $task->id]) }}" class="mt-6 inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-full shadow-lg text-white bg-gradient-to-r from-blue-600 to-cyan-600 hover:from-blue-700 hover:to-cyan-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-300 ease-in-out hover:shadow-xl">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
                            Add First Timesheet
                        </a>
                    @endcan
                </div>
            @endif
        </div>
    </div>
</x-app-layout>