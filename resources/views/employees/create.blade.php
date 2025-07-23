<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-black leading-tight">
                Create Employee
            </h2>
            <a href="{{ route('employees.index') }}" class="back-button">Back</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('employees.store') }}" method="POST">
                        @csrf
                        <div class="my-5">
                            <label for="f-name" class="lable">First Name:</label>
                            <input type="text" name="first_name" value="{{ old('first_name') }}" class="input-field">
                            @error('first_name')
                                <span>{{ $message }}</span>
                            @enderror
                            <label for="l-name" class="lable">Last Name:</label>
                            <input type="text" name="last_name" value="{{ old('last_name') }}" class="input-field">
                            @error('last_name')
                                <span>{{ $message }}</span>
                            @enderror
                            <label for="email" class="lable">E-mail:</label>
                            <input type="text" name="email" value="{{ old('email') }}" class="input-field">
                            @error('email')
                                <span>{{ $message }}</span>
                            @enderror
                        </div>
                        <button class="success-button">Submit</button>
                        <a href="{{ route('employees.index') }}"
                            class="danger-button">
                            Cancel
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
