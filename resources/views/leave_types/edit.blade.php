<x-app-layout>
    <h1>Edit Leave Type</h1>
    <form action="{{ route('leave-types.update', $leaveType) }}" method="POST">
        @csrf
        @method('PUT')
        <label>Name:</label>
        <input type="text" name="name" value="{{ $leaveType->name }}" required><br>
        <label>Description:</label>
        <textarea name="description">{{ $leaveType->description }}</textarea><br>
        <a href="{{ route('leave-types.index') }}">Back</a>
        <button type="submit">Update</button>
    </form>
</x-app-layout>
