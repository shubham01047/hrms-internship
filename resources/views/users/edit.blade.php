<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-black leading-tight">
                Edit Users
            </h2>
            <a href="{{ route('users.index') }}" class="bg-green-700">Back</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{-- {{ __("You're logged in!") }} --}}
                    <form action="{{ route('users.update', $users->id) }}" method="POST">
                        @csrf
                        <div>
                            name:
                            <input type="text" name="name" value="{{ old('name', $users->name) }}">
                            @error('name')
                                <span>{{ $message }}</span>
                            @enderror

                            email:
                            <input type="text" name="email" value="{{ old('email', $users->email) }}">
                            @error('email')
                                <span>{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="grid grid-cols-3 mt-3 mb-4">
                            @if ($roles->isNotEmpty())
                                @foreach ($roles as $role)
                                    <div class="mt-3">
                                        <input {{ $hasRoles->contains($role->id) ? 'checked' : '' }} type="checkbox"
                                            name="role[]" value="{{ $role->name }}" id="role-{{ $role->id }}">

                                        <label for="role-{{ $role->id }}">{{ $role->name }}</label>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                        <button class="bg-slate-700">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
