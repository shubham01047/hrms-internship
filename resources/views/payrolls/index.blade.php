<x-app-layout>
    <h2>Payrolls</h2>
    @if (session('success'))
        <div>{{ session('success') }}</div>
    @endif
    @if (session('error'))
        <div>{{ session('error') }}</div>
    @endif
    <a href="{{ route('payrolls.generateAll', now()->format('M, Y')) }}">Generate All ({{ now()->format('M, Y') }})</a>
    <form method="POST" action="{{ route('payrolls.destroyAll') }}" onsubmit="return confirm('Delete ALL payrolls?')">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger my-4">Delete All Payrolls</button>
    </form>
    <h3>Existing Payrolls</h3>
    <table border="1">
        <tr>
            <th>Employee</th>
            <th>Month</th>
            <th>Net</th>
            <th>Slip</th>
            <th>Delete</th>
        </tr>
        @forelse($payrolls as $p)
            <tr>
                <td>{{ $p->user->name }}</td>
                <td>{{ $p->month }}</td>
                <td>{{ $p->net_salary }}</td>
                <td><a href="{{ route('payrolls.slip', $p->id) }}">Download Slip</a></td>
                <td>
                    <form method="POST" action="{{ route('payrolls.destroy', $p->id) }}"
                        onsubmit="return confirm('Delete this payroll?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4">No payrolls found.</td>
            </tr>
        @endforelse
    </table>

    <h3>Generate Payroll (per Employee)</h3>
    <table border="1">
        <tr>
            <th>Employee</th>
            <th>Action</th>
        </tr>
        @foreach ($employees as $employee)
            <tr>
                <td>{{ $employee->name }}</td>
                <td>
                    <a
                        href="{{ route('payrolls.generate', ['user_id' => $employee->id, 'month' => now()->format('M, Y')]) }}">
                        Generate for {{ now()->format('M, Y') }}
                    </a>
                </td>
            </tr>
        @endforeach
    </table>
</x-app-layout>
