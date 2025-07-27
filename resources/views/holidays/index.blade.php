<x-app-layout>
    <x-slot name="header">Holidays</x-slot>

    <a href="{{ route('holidays.create') }}">Add Holiday</a>
    <table>
        <thead>
            <tr>
                <th>Title</th>
                <th>Date</th>
                <th>Type</th>
                <th>Description</th>
                @can('delete holiday')
                    <th>Action</th>
                @endcan
            </tr>
        </thead>
        <tbody>
            @foreach($holidays as $holiday)
                <tr>
                    <td>{{ $holiday->title }}</td>
                    <td>{{ $holiday->date }}</td>
                    <td>{{ ucfirst($holiday->type) }}</td>
                    <td>{{ $holiday->description }}</td>
                    @can('delete holiday')
                        <td>
                            <form action="{{ route('holidays.destroy', $holiday->id) }}" method="POST"
                                onsubmit="return confirm('Are you sure?')">
                                @csrf @method('DELETE')
                                <button>Delete</button>
                            </form>
                        </td>
                    @endcan
                </tr>
            @endforeach
        </tbody>
    </table>
</x-app-layout>