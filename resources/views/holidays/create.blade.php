<x-app-layout>
    @can('create holiday')
        <x-slot name="header">Add Holiday</x-slot>

        <form action="{{ route('holidays.store') }}" method="POST">
            @csrf
            <div>
                <label>Title:</label>
                <input type="text" name="title" required>
            </div>
            <div>
                <label>Date:</label>
                <input type="date" name="date" required>
            </div>
            <div>
                <label>Type:</label>
                <select name="type">
                    <option value="" selected>--- Select Holiday Type ---</option>
                    <option value="national">National</option>
                    <option value="company">Company</option>
                    <option value="festival">Festival</option>
                    <option value="event">Event</option>
                </select>
            </div>
            <div>
                <label>Description:</label>
                <textarea name="description"></textarea>
            </div>
            <button class="btn btn-success mt-3">Submit</button>
        </form>
    @endcan
</x-app-layout>