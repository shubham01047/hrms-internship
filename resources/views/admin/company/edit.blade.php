<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <form method="POST" action="{{ route('company.update') }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        {{-- Company Name (Required) --}}
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Company Name <span
                    class="text-red-500">*</span></label>
            <input type="text" name="name" value="{{ old('name', $company->name) }}" required
                class="mt-1 w-full border-gray-300 rounded-md shadow-sm focus:ring-red-500 focus:border-red-500">
        </div>

        {{-- System Title (Required) --}}
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">System Title <span
                    class="text-red-500">*</span></label>
            <input type="text" name="system_title" value="{{ old('system_title', $company->system_title) }}" required
                class="mt-1 w-full border-gray-300 rounded-md shadow-sm focus:ring-red-500 focus:border-red-500">
        </div>

        {{-- Company Description (Optional) --}}
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Company Description</label>
            <textarea name="description" rows="3"
                class="mt-1 w-full border-gray-300 rounded-md shadow-sm focus:ring-red-500 focus:border-red-500">{{ old('description', $company->description) }}</textarea>
        </div>

        {{-- Company Logo (Optional) --}}
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Logo Path (e.g. logos/mylogo.png)</label>
            <input type="text" name="logo" value="{{ old('logo', $company->logo) }}"
                class="mt-1 w-full border-gray-300 rounded-md shadow-sm focus:ring-red-500 focus:border-red-500">
        </div>

        {{-- Submit Button --}}
        <div>
            <button type="submit"
                class="inline-flex items-center px-4 py-2 bg-red-600 text-white text-sm font-medium rounded-md hover:bg-red-700 focus:outline-none focus:ring focus:ring-red-300">
                Save Changes
            </button>
        </div>
    </form>
</body>

</html>
