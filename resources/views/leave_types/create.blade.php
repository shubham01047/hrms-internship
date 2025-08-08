<x-app-layout>
    <h1>Create Leave Type</h1>
    <form action="{{ route('leave-types.store') }}" method="POST">
        @csrf
        <label>Name:</label>
        <input type="text" name="name" required><br>
        <label>Description:</label>
        <textarea name="description"></textarea><br>
        <a href="{{ route('leave-types.index') }}">Back</a>
        <button type="submit">Save</button>
    </form>
</x-app-layout>
