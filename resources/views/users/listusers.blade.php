<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-black leading-tight">
                {{ __('Users') }}
            </h2>
            {{-- <a href="{{ route('roles.create') }}" class="bg-green-700">Create</a> --}}
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-message></x-message>
            <div class="p-6 text-black">
                <div class="overflow-x-auto">
    <table class="min-w-full border border-gray-600 rounded-lg shadow-md text-sm text-left text-gray-900">
        <thead class="bg-red-600 text-white uppercase text-xs tracking-wider">
            <tr class="border-b border-gray-800">
                <th class="px-6 py-3">#</th>
                <th class="px-6 py-3">Name</th>
                <th class="px-6 py-3">Email</th>
                <th class="px-6 py-3">Role Assigned</th>
                <th class="px-6 py-3">Created</th>
                <th class="px-6 py-3">Action</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-300 bg-white">
            @if ($users->isNotEmpty())
                @foreach ($users as $index => $user)
                    <tr class="hover:bg-gray-100 transition">
                        <td class="px-6 py-4">{{ $index + 1 }}</td>
                        <td class="px-6 py-4 font-medium">{{ $user->name }}</td>
                        <td class="px-6 py-4">{{ $user->email }}</td>
                        <td class="px-6 py-4 text-gray-700">
                            {{ $user->roles->pluck('name')->implode(', ') }}
                        </td>
                        <td class="px-6 py-4">
                            {{ \Carbon\Carbon::parse($user->created_at)->format('d M, Y') }}
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex space-x-2">
                                @can('edit users')
                                    <a href="{{ route('users.edit', $user->id) }}"
                                       class="inline-block px-3 py-1 text-xs font-medium text-white bg-blue-600 rounded hover:bg-blue-700 transition">
                                        <x-pencil/>Edit
                                    </a>
                                @endcan
                                {{-- 
                                @can('delete users')
                                    <a href="javascript:void(0);"
                                       onclick="deleteUser({{ $user->id }})"
                                       class="inline-block px-3 py-1 text-xs font-medium text-white bg-red-600 rounded hover:bg-red-700 transition">
                                        <x-trashcan/>Delete
                                    </a>
                                @endcan
                                --}}
                            </div>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="6" class="px-6 py-4 text-center text-gray-500">No users found.</td>
                </tr>
            @endif
        </tbody>
    </table>
</div>

                <div class="my-3">
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
    <x-slot name="script">
        <script type="text/javascript">
            // deletePermission function here
        </script>
    </x-slot>
</x-app-layout>
