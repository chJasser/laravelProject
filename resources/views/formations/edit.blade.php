<x-layout>
    <x-card class="p-10 rounded max-w-lg mx-auto mt-24">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">
            Edit {{ $club->name }}
            </h2>
            <p class="mb-4">Edit club</p>
        </header>

        <form action="/clubs/{{ $club->id }}" method="POST" enctype="multipart/form-data">
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
            <div>
                <label for="logo" class="inline-block text-lg mb-2">logo</label>
                <input type="file" class="border border-gray-200 rounded p-2 w-full"
                    name="logo" />
                @error('logo')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label for="email" class="inline-block text-lg mb-2">email</label>
                <input type="email" value="{{ $club->email }}" class="border border-gray-200 rounded p-2 w-full"
                    name="email" />
                @error('email')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label for="category" class="inline-block text-lg mb-2">category</label>
                <select name="category" id="category" class="border border-gray-200 rounded p-2 w-full">
                    @foreach ($categories as $category)
                        <option value="{{ $category }}" {{ $club->category == $category ? 'selected' : '' }}>{{ $category }}</option>
                    @endforeach
                </select>
                @error('category')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label for="website" class="inline-block text-lg mb-2">website</label>
                <input type="text" value="{{ $club->website }}" class="border border-gray-200 rounded p-2 w-full"
                    name="website" />
                @error('website')
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
