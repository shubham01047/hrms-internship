<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-black leading-tight">
                {{ __('Permissions') }}
            </h2>
            <a href="{{ route('permissions.create') }}" class="bg-green-700">Create</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-message></x-message>
            <div class="p-6 text-black">
                <table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Created</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($permissions->isNotEmpty())
                            @foreach ($permissions as $permission)
                                <tr>
                                    <td>{{ $permission->id }}</td>
                                    <td>{{ $permission->name }}</td>
                                    <td>{{ \Carbon\Carbon::parse($permission->created_at)->format('d M, Y') }}</td>
                                    <td>
                                        <a href="{{ route('permissions.edit', $permission->id) }}">Edit</a>
                                        <a href="javascript:void(0);"
                                            onclick="deletePermission({{ $permission->id }})">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
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
