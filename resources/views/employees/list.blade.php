<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-black leading-tight">
                {{ __('Employees') }}
            </h2>
            @can('create employee')
                <a href="{{ route('employees.create') }}" class="success-button">Create</a>
            @endcan
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-message></x-message>
            <div class="p-6 text-black">

                <div class="overflow-x-auto">
                    <table
                        class="min-w-full border border-gray-600 rounded-lg shadow-md text-sm text-left text-gray-900">
                        <thead class="bg-red-600 text-white uppercase text-xs tracking-wider">
                            <tr class="border-b border-gray-800">
                                <th class="px-6 py-3">#</th>
                                <th class="px-6 py-3">Full Name</th>
                                <th class="px-6 py-3">Email</th>
                                <th class="px-6 py-3">Created</th>
                                <th class="px-6 py-3">Action</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-300 bg-white">
                            @if ($employees->isNotEmpty())
                                @foreach ($employees as $index => $employee)
                                    <tr class="hover:bg-gray-100 transition">
                                        <td class="px-6 py-4">{{ $index + 1 }}</td>
                                        <td class="px-6 py-4">{{ $employee->first_name . ' ' . $employee->last_name }}
                                        </td>
                                        <td class="px-6 py-4">{{ $employee->email }}</td>
                                        <td class="px-6 py-4">
                                            {{ \Carbon\Carbon::parse($employee->created_at)->format('d M, Y') }}</td>
                                        <td class="flex space-x-2 px-6 py-4">
                                            @can('edit employee')
                                                <a href="{{ route('employees.edit', $employee->id) }}"
                                                    class="inline  px-3 py-1 text-xs font-medium text-white bg-blue-600 rounded hover:bg-blue-700 transition"><x-pencil/>Edit</a>
                                            @endcan
                                            @can('delete employee')
                                                <a href="javascript:void(0);" onclick="deleteEmployee({{ $employee->id }})"
                                                    class="inline-block px-3 py-1 text-xs font-medium text-white bg-red-600 rounded hover:bg-red-700 transition "><x-trashcan/>Delete</a>
                                            @endcan
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="5" class="px-6 py-4 text-center text-gray-500">No employees found.
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>

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
