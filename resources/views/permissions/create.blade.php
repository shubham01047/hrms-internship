<x-app-layout>
    <x-slot name="header">
         <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-black leading-tight">
                Create Permissions
            </h2>
            <a href="{{ route('permissions.index') }}" class="back-button">Back</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{-- {{ __("You're logged in!") }} --}}
                    <form action="{{ route('permissions.store') }}" method="POST">
                        @csrf
                        <label for="name" class="lable">Name</label>
                        <input type="text" name="name" class="input-field">
                        @error('name')
                            <span>{{ $message }}</span>   
                        @enderror
                        <button class="success-button ml-10 ">Create</button>
                        <a href="{{ route('permissions.index') }}"
                            class="danger-button">
                            Cancel
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
