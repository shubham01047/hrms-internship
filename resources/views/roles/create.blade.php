<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-black leading-tight">
                Create Roles
            </h2>
            <a href="{{ route('roles.index') }}" class="danger-button">Back</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{-- {{ __("You're logged in!") }} --}}
                    <form action="{{ route('roles.store') }}" method="POST">
                        @csrf
                        <div>
                            <label for="name" class="lable">Name</label>
                            <input type="text" name="name" class="input-field">
                            @error('name')
                                <span>{{ $message }}</span>
                            @enderror
                            <button class="success-button ml-10">Submit</button>
                        </div>
                        <div class="grid grid-cols-3 mt-3 mb-4">
                            @if ($permissions->isNotEmpty())
                                @foreach ($permissions as $permission)
                                    <div class="mt-3">
                                        <input type="checkbox" name="permission[]" value="{{ $permission->name }}"
                                            id="permission-{{ $permission->id }}">
                                        <label for="permission-{{ $permission->id }}">{{ $permission->name }}</label>
                                    </div>
                                @endforeach
                            @endif
                            
                        </div>
<<<<<<< HEAD
                        <button class="bg-slate-700">Submit</button>
                        <a href="{{ route('roles.index') }}"
                            class="bg-gray-500">
                            Cancel
                        </a>
=======
                        
>>>>>>> 392a132ac2a0fedd4b0d7541b32f8f24ce025784
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
