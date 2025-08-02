<x-app-layout>
    <div class="text-gray-300 flex items-center justify-center min-h-screen">
        <div class="flex flex-col items-center space-y-6 text-center">
            <div class="flex items-center space-x-4 text-lg tracking-wide">
                <span class="text-gray-700 font-semibold">403</span>
                <div class="h-7 w-px bg-gray-600 font-bold"></div>
                <span class="uppercase text-gray-700 font-semibold">User does not have the right permissions.</span>
            </div>
            <a href="{{ url()->previous() }}" class="text-sm px-4 py-2 text-white rounded bg-gray-600">
                ← Back to Previous Page
            </a>
        </div>
    </div>
</x-app-layout>