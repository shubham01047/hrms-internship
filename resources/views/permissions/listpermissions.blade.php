<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-black leading-tight">
                {{ __('Permissions') }}
            </h2>
            @can('create permissions')
                <a href="{{ route('permissions.create') }}" class="success-button">Create</a>
            @endcan
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-message></x-message>
            <div class="p-6 text-black">
                <table
                    class="min-w-full border border-gray-600 rounded-lg shadow-md overflow-hidden text-sm text-left text-gray-900 ">
                    <thead class="bg-gradient-to-br from-red-600 to-red-400 text-white uppercase text-xs tracking-wider ">
                        <tr class="border-b border-gray-800">
                            <th class="px-6 py-3">#</th>
                            <th class="px-6 py-3">Name</th>
                            <th class="px-6 py-3">Created</th>
                            <th class="px-6 py-3">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-700 bg-white">
                        @if ($permissions->isNotEmpty())
                            @foreach ($permissions as $index => $permission)
                                <tr class="hover:bg-gray-100 transition">
                                    <td class="px-6 py-4">{{ $index + 1 }}</td>
                                    <td class="px-6 py-4">{{ ucwords($permission->name) }}</td>
                                    <td class="px-6 py-4">
                                        {{ \Carbon\Carbon::parse($permission->created_at)->format('d M, Y') }}</td>
                                    <td class="flex px-6 py-4 space-x-2">
                                        @can('edit permissions')
                                            <a href="{{ route('permissions.edit', $permission->id) }}"
                                                class="inline b-5 px-3 py-1 text-xs font-medium text-white bg-blue-600 rounded hover:bg-blue-700 transition"><x-pencil/>Edit</a>
                                        @endcan
                                        @can('delete permissions')
                                            <a href="javascript:void(0);" onclick="deletePermission({{ $permission->id }})"
                                                class="inline-block px-3 py-1 text-xs font-medium text-white bg-red-600 rounded hover:bg-red-700 transition"><x-trashcan />Delete</a>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="4" class="px-6 py-4 text-center text-gray-500">No permissions found.
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
                <div class="my-3">
    {{ $permissions->links() }}
</div>
            </div>
        </div>
    </div>
    <x-slot name="script">
        <script type="text/javascript">
            // deletePermission function here
            function deletePermission(id) {
                console.log("Calling delete for ID:", id);
                if (confirm('Are you sure u want to delete "{{ $permission->name }}"?')) {
                    $.ajax({
                        url: '{{ route('permissions.destroy') }}',
                        type: 'DELETE',
                        data: {
                            id: id
                        },
                        dataType: 'json',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            window.location.href = '{{ route('permissions.index') }}'
                        }
                    });
                }
            }
        </script>
    </x-slot>
</x-app-layout>
