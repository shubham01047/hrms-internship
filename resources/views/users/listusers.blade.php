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
                <table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role Assigned</th>
                            <th>Created</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($users->isNotEmpty())
                            @foreach ($users as $index => $user)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->roles->pluck('name')->implode(', ') }}</td>
                                    <td>{{ \Carbon\Carbon::parse($user->created_at)->format('d M, Y') }}</td>
                                    <td>
                                        @can('edit users')
                                            <a href="{{ route('users.edit', $user->id) }}">Edit</a>
                                        @endcan
                                        {{-- <a href="javascript:void(0);"
                                            onclick="deleteRole({{ $user->id }})">Delete</a> --}}
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
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
