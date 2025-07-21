<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-black leading-tight">
                {{ __('Roles') }}
            </h2>

            @can('create roles')
            <a href="{{ route('roles.create') }}" class="bg-green-700">Create</a>
        @endcan
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
                <th class="px-6 py-3">Permissions</th>
                <th class="px-6 py-3">Created</th>
                <th class="px-6 py-3">Action</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-300 bg-white">
            @if ($roles->isNotEmpty())
                @foreach ($roles as $index => $role)
                    <tr class="hover:bg-gray-100 transition">
                        <td class="px-6 py-4">{{ $index + 1 }}</td>
                        <td class="px-6 py-4 font-medium">{{ $role->name }}</td>
                        <td class="px-6 py-4 text-gray-700">
                            {{ $role->permissions->pluck('name')->implode(', ') }}
                        </td>
                        <td class="px-6 py-4">
                            {{ \Carbon\Carbon::parse($role->created_at)->format('d M, Y') }}
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex space-x-2">
                                @can('edit roles')
                                    <a href="{{ route('roles.edit', $role->id) }}"
                                       class="inline-block px-3 py-1 text-xs font-medium text-white bg-blue-600 rounded hover:bg-blue-700 transition">
                                        Edit
                                    </a>
                                @endcan
                                @can('delete roles')
                                    <a href="javascript:void(0);"
                                       onclick="deleteRole({{ $role->id }})"
                                       class="inline-block px-3 py-1 text-xs font-medium text-white bg-red-600 rounded hover:bg-red-700 transition">
                                        Delete
                                    </a>
                                @endcan
                            </div>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="5" class="px-6 py-4 text-center text-gray-500">No roles found.</td>
                </tr>
            @endif
        </tbody>
    </table>
</div>


                <div class="my-3">
                    {{ $roles->links() }}
                </div>
            </div>
        </div>
    </div>
    <x-slot name="script">
        <script type="text/javascript">
            // deletePermission function here
            function deleteRole(id) {
                console.log("Calling delete for ID:", id);
                if (confirm('Are you sure u want to delete "{{ $role->name }}"?')) {
                    $.ajax({
                        url: '{{ route('roles.destroy') }}',
                        type: 'DELETE',
                        data: {
                            id: id
                        },
                        dataType: 'json',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            window.location.href = '{{ route('roles.index') }}'
                        }
                    });
                }
            }
        </script>
    </x-slot>
</x-app-layout>
