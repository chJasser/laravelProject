<x-layout>
    <x-card class="p-10 rounded max-w-lg mx-auto mt-24">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">
                Create formation
            </h2>

        </header>
      {{-- create formation form and assign to club with select input --}}
        <form method="post" action="/clubs/{{ $club->id }}/formations">
            @csrf
            <div class="mb-6">
                <label for="name" class="inline-block text-lg mb-2">name</label>
                <input type="text" value="{{ old('name') }}" class="border border-gray-200 rounded p-2 w-full"
                    name="name" />
                @error('name')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label for="description" class="inline-block text-lg mb-2">description</label>
                <textarea rows="10" type="text" class="border border-gray-200 rounded p-2 w-full"
                    name="description">{{ old('description') }}</textarea>
                @error('description')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label for="category" class="inline-block text-lg mb-2">category</label>
                <select name="category" id="category" class="border border-gray-200 rounded p-2 w-full">
                    @foreach ($categories as $category)
                        <option value="{{ $category }}" {{ old('category') == $category ? 'selected' : '' }}>{{ $category }}</option>
                    @endforeach
                </select>
                @error('category')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label for="club" class="inline-block text-lg mb-2">club</label>
                <select name="club" id="club" class="border border-gray-200 rounded p-2 w-full">
                    @foreach ($clubs as $club)
                        <option value="{{ $club->id }}" {{ old('club') == $club->id ? 'selected' : '' }}>{{ $club->name }}</option>
                    @endforeach
                </select>
                @error('club')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-6">
                <button type="submit" class="bg-blue-500 text-white rounded py-2 px-4 hover:bg-blue-600">Create
                    formation</button>
            </div>
        </form>



    </x-card>
</x-layout>
