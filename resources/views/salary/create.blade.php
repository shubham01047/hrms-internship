<x-app-layout>
    <h2>Create Salary Structure</h2>
    <form method="POST" action="{{ route('salary.store') }}">
        @csrf
        <select name="user_id">
            @foreach ($users as $u)
                <option value="{{ $u->id }}">{{ $u->name }}</option>
            @endforeach
        </select>
        <input type="number" name="basic" placeholder="Basic">
        <input type="number" name="hra" placeholder="HRA">
        <input type="number" name="allowances" placeholder="Allowances">
        <input type="number" name="tax" placeholder="Tax %">
        <input type="number" name="pf" placeholder="PF %">
        <input type="number" name="esi" placeholder="ESI %">
        <button type="submit">Save</button>
    </form>

</x-app-layout>
