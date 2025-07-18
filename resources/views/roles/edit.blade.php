<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-black leading-tight">
                Edit Roles
            </h2>
            <a href="{{ route('roles.index') }}" class="bg-green-700">Back</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{-- {{ __("You're logged in!") }} --}}
                    <form action="{{ route('roles.update', $role->id) }}" method="POST">
                        @csrf
                        <div>
                            name:
                            <input type="text" name="name" value="{{ old('name', $role->name) }}">
                            @error('name')
                                <span>{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="grid grid-cols-3 mt-3 mb-4">
                            @if ($permissions->isNotEmpty())
                                @foreach ($permissions as $permission)
                                    <div class="mt-3">
                                        <input {{ $hasPermissions->contains($permission->name) ? 'checked' : '' }}
                                            type="checkbox" name="permission[]" value="{{ $permission->name }}"
                                            id="permission-{{ $permission->id }}">

                                        <label for="permission-{{ $permission->id }}">{{ $permission->name }}</label>
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
