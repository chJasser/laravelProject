<x-layout>
    <x-card class="p-10 rounded max-w-lg mx-auto mt-24">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">
            Edit {{ $club->name }}
            </h2>
            <p class="mb-4">Edit club</p>
        </header>

        <form action="/clubs/{{ $club->id }}" method="POST" >
            @csrf
            @method('PUT')
            <div class="mb-6">
                <label for="name" class="inline-block text-lg mb-2">name</label>
                <input type="text" value="{{ $club->name }}" class="border border-gray-200 rounded p-2 w-full"
                    name="name" />
                @error('name')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror

            </div>

            <div class="mb-6">
                <label for="description" class="inline-block text-lg mb-2">description</label>
                <textarea rows="10"type="text"  class="border border-gray-200 rounded p-2 w-full"
                    name="description"  >{{ $club->description }}</textarea>
                @error('description')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>





            <div class="mb-6">
                <button class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
                    Edit club
                </button>

                <a href="/clubs/manage" class="text-black ml-4"> Back </a>
            </div>
        </form>
    </x-card>
</x-layout>
