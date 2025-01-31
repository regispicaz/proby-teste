@props(['route', 'status'])

<a href="{{ $route }}" class="w-full">
    <div
        class="bg-blue-200 hover:bg-blue-300 overflow-hidden shadow-sm sm:rounded-lg w-full transition ease-in-out duration-150'">
        <div class="p-6 text-gray-900 flex justify-between">
            <p class="font-bold">{{ $status }}</p>
        </div>
    </div>
</a>