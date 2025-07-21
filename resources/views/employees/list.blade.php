<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-black leading-tight">
                {{ __('Employees') }}
            </h2>
            @can('create employee')
                <a href="{{ route('employees.create') }}" class="bg-green-700">Create</a>
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
                            <th>Full Name</th>
                            <th>Email</th>
                            <th>Created</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($employees->isNotEmpty())
                            @foreach ($employees as $index => $employee)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $employee->first_name . ' ' . $employee->last_name }}</td>
                                    <td>{{ $employee->email }}</td>
                                    <td>{{ \Carbon\Carbon::parse($employee->created_at)->format('d M, Y') }}</td>
                                    <td>
                                        @can('edit employee')
                                            <a href="{{ route('employees.edit', $employee->id) }}">Edit</a>
                                        @endcan
                                        @can('delete employee')
                                            <a href="javascript:void(0);"
                                                onclick="deleteEmployee({{ $employee->id }})">Delete</a>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
                <div class="my-3">
                    {{ $employees->links() }}
                </div>
            </div>
        </div>
    </div>
    <x-slot name="script">
        <script type="text/javascript">
            // deletePermission function here
            function deleteEmployee(id) {
                console.log("Calling delete for ID:", id);
                if (confirm('Are you sure u want to delete "{{ $employee->first_name }}"?')) {
                    $.ajax({
                        url: '{{ route('employees.destroy') }}',
                        type: 'DELETE',
                        data: {
                            id: id
                        },
                        dataType: 'json',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            window.location.href = '{{ route('employees.index') }}'
                        }
                    });
                }
            }
        </script>
    </x-slot>
</x-app-layout>
