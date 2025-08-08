<x-app-layout>
    <h1>Leave Types</h1>
    @if (session('success'))
        {{ session('success') }}
    @endif
    @if (session('error'))
        {{ session('error') }}
    @endif
    <a href="{{ route('leave-types.create') }}">Add New Leave Type</a>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Actions</th>
        </tr>
        @foreach ($leaveTypes as $index => $leaveType)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $leaveType->name }}</td>
                <td>{{ $leaveType->description }}</td>
                <td>
                    @can('edit leave type')
                        <a href="{{ route('leave-types.edit', $leaveType) }}">Edit</a>
                    @endcan
                    @can('delete leave type')
                        <form action="{{ route('leave-types.destroy', $leaveType) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                        @endcan
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
</x-app-layout>
