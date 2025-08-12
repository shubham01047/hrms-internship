<x-app-layout>
    <h2>Salary Structures</h2>
    <a href="{{ route('salary.create') }}">Add Structure</a>
    <table border="1">
        <tr>
            <th>Employee</th>
            <th>Basic</th>
            <th>HRA</th>
            <th>Allowances</th>
            <th>Tax %</th>
            <th>PF %</th>
            <th>ESI %</th>
        </tr>
        @foreach ($structures as $s)
            <tr>
                <td>{{ $s->user->name }}</td>
                <td>{{ $s->basic }}</td>
                <td>{{ $s->hra }}</td>
                <td>{{ $s->allowances }}</td>
                <td>{{ $s->tax }}</td>
                <td>{{ $s->pf }}</td>
                <td>{{ $s->esi }}</td>
            </tr>
        @endforeach
    </table>
</x-app-layout>
