<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-black leading-tight">
                Edit Employees
            </h2>
            <a href="{{ route('employees.index') }}" class="back-button">Back</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{-- {{ __("You're logged in!") }} --}}
                    <form action="{{ route('employees.update', $employee->id) }}" method="POST">
                        @csrf
                        <div>
                            <label for="f-name">First Name:</label>
                            <input type="text" name="first_name"
                                value="{{ old('first_name', $employee->first_name) }}" class="input-field m-5">
                            @error('first_name')
                                <span>{{ $message }}</span>
                            @enderror
                            <br><label for="l-name">Last Name:</label>
                            <input type="text" name="last_name" value="{{ old('last_name', $employee->last_name) }}" class="input-field m-5 ">
                            @error('last_name')
                                <span>{{ $message }}</span>
                            @enderror
                            <br><label for="email">E-mail:</label>
                            <input type="text" name="email" value="{{ old('email', $employee->email) }}" class="input-field my-5 mx-12">
                            @error('email')
                                <span>{{ $message }}</span>
                            @enderror
                        </div>
                        <button class="success-button">Update</button>
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
