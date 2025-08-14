<x-app-layout>
    <a href="{{ route('users.index') }}">
        Back to List
    </a>
    <form action="{{ route('users.store') }}" method="POST">
        @csrf
        <input type="text" name="name" id="name" placeholder="Enter full name">
        @error('name')
            {{ $message }}
        @enderror
        <span>Email Address</span>
        <input type="email" name="email" id="email" placeholder="Enter email address">
        @error('email')
            {{ $message }}
        @enderror
        <span>password</span>
        <input type="password" name="password" id="password" placeholder="Enter password">
        @error('password')
            {{ $message }}
        @enderror
        <span>Confirm password:</span>
        <input type="password" name="confirm_password" id="confirm_password" placeholder="Enter password again">
        @error('confirm_password')
            {{ $message }}
        @enderror
        Roles Assignment Section
        @if ($roles->isNotEmpty())
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-3 sm:gap-4">
                @foreach ($roles as $role)
                    <div>
                        <label for="role-{{ $role->id }}">
                            <input type="checkbox" name="role[]" value="{{ $role->name }}"
                                id="role-{{ $role->id }}">
                            <span class="text-sm font-medium text-gray-900">{{ ucwords($role->name) }}</span>
                @endforeach
            @else
                <p class="text-sm sm:text-base text-gray-500">No roles available to assign.</p>
        @endif
        </div>
        <a href="{{ route('users.index') }}">
            Cancel
        </a>
        <button type="submit">
            Create User
        </button>
    </form>
</x-app-layout>
