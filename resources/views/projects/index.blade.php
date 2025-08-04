<x-app-layout>
    <x-slot name="header">
        <h1 class="text-4xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-purple-600 to-pink-600 dark:from-purple-400 dark:to-pink-400 drop-shadow-md">Project Management</h1>
    </x-slot>

    <div class="py-10 sm:px-6 lg:px-8 bg-gradient-to-br from-blue-50 to-indigo-100 dark:from-gray-900 dark:to-gray-800 min-h-[calc(100vh-64px)]">
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

        <div class="mb-10 flex justify-end">
            @can('create project')
                <a href="{{ route('projects.create') }}" class="inline-flex items-center px-8 py-4 border border-transparent text-base font-semibold rounded-full shadow-xl text-white bg-gradient-to-r from-blue-600 to-cyan-600 hover:from-blue-700 hover:to-cyan-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-300 ease-in-out hover:shadow-2xl">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
                    Create New Project
                </a>
            @endcan
        </div>

        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-2xl rounded-xl border border-gray-200 dark:border-gray-700">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                    <thead class="bg-gradient-to-r from-purple-700 to-indigo-700 text-white shadow-md">
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
                    <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                        @foreach ($projects as $index => $project)
                            <tr class="odd:bg-gray-50 even:bg-white dark:odd:bg-gray-700 dark:even:bg-gray-800 hover:bg-blue-100 dark:hover:bg-gray-600 transition-all duration-200 ease-in-out hover:shadow-md">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-100">{{ $index + 1 }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">{{ $project->title }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">{{ $project->client_name }}</td>
                                <td class="px-6 py-4 text-sm text-gray-600 dark:text-gray-300 max-w-xs overflow-hidden text-ellipsis">{{ $project->description }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">{{ \Carbon\Carbon::parse($project->deadline)->format('M d, Y') }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                    <ul class="flex flex-wrap gap-1">
                                        @foreach ($project->members as $member)
                                            <li class="bg-indigo-100 dark:bg-indigo-900 text-indigo-800 dark:text-indigo-200 px-2.5 py-1 rounded-full text-xs font-medium transition-colors duration-200 hover:bg-indigo-200 dark:hover:bg-indigo-800">
                                                {{ $member->name }}
                                            </li>
                                        @endforeach
                                    </ul>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <div class="flex flex-wrap gap-2">
                                        @can('edit project')
                                            <a href="{{ route('projects.edit', $project->id) }}" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-gradient-to-r from-yellow-500 to-orange-500 hover:from-yellow-600 hover:to-orange-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-400 transition-all duration-300 ease-in-out hover:shadow-lg">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-1"><path d="M12 20h9"/><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"/></svg>
                                                Edit
                                            </a>
                                        @endcan
                                        <a href="{{ route('projects.show', ['project' => $project]) }}" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-gradient-to-r from-purple-600 to-pink-600 hover:from-purple-700 hover:to-pink-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 transition-all duration-300 ease-in-out hover:shadow-lg">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-1"><path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z"/><circle cx="12" cy="12" r="3"/></svg>
                                            View Tasks
                                        </a>
                                        @can('delete project')
                                            <form action="{{ route('projects.destroy', $project->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this project?');" class="inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-gradient-to-r from-red-600 to-rose-600 hover:from-red-700 hover:to-rose-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition-all duration-300 ease-in-out hover:shadow-lg">
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