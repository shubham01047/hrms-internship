<x-app-layout>
    @can('apply leave')
        <h2>Apply for Leave</h2>

        <form action="{{ route('leaves.store') }}" method="POST">
            @csrf
            <label>Leave Type</label>
            <select name="leave_type_id" required>
                <option value="" selected>---Select Leave Type---</option>
                @foreach ($leaveTypes as $type)
                    <option value="{{ $type->id }}" title="{{ $type->description }}">{{ $type->name }}</option>
                @endforeach
            </select>

            <label>Start Date</label>
            <input type="date" name="start_date" required>

            <label>End Date</label>
            <input type="date" name="end_date" required>

            <label>Reason</label>
            <textarea name="reason" required></textarea>

            <button type="submit">Apply</button>
        </form>
    @endcan
</x-app-layout>
