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
                <table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Permissions</th>
                            <th>Created</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($roles->isNotEmpty())
                            @foreach ($roles as $index => $role)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $role->name }}</td>
                                    <td>{{ $role->permissions->pluck('name')->implode(', ') }}</td>
                                    <td>{{ \Carbon\Carbon::parse($role->created_at)->format('d M, Y') }}</td>
                                    <td>
                                        @can('edit roles')
                                            <a href="{{ route('roles.edit', $role->id) }}">Edit</a>
                                        @endcan
                                        @can('delete roles')
                                            <a href="javascript:void(0);"
                                                onclick="deleteRole({{ $role->id }})">Delete</a>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
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
