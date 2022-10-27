<x-layout>
    <x-card class="p-10 rounded max-w-lg mx-auto mt-24">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">
                Edit {{ $convention->name }}

            </h2>
            <p class="mb-4">Edit Convention</p>
        </header>

        <form action="/conventions/{{ $convention->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-6">
                <label for="name" class="inline-block text-lg mb-2">Name</label>
                <input type="text" value="{{ $convention->name }}" class="border border-gray-200 rounded p-2 w-full"
                    name="name" placeholder="" />
                @error('name')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror

            </div>

            <div class="mb-6">
                <label for="start_date" class="inline-block text-lg mb-2">
                   Start Date
                </label>
                <input type="date" value="{{ $convention->start_date }}" class="border border-gray-200 rounded p-2 w-full"
                    name="start_date" />
                @error('start_date')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label for="end_date" class="inline-block text-lg mb-2">
                   End Date
                </label>
                <input type="date" value="{{ $convention->end_date }}" class="border border-gray-200 rounded p-2 w-full"
                    name="end_date" />
                @error('end_date')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="picture" class="inline-block text-lg mb-2">
                    Convention Image
                </label>
                <img class="w-48 mr-6 mb-6"
                    src="{{ $convention->picture ? asset('storage/' . $convention->picture) : asset('images/no-image.png') }}"
                    alt="" />
                <input type="file" class="border border-gray-200 rounded p-2 w-full" name="image" />
                @error('picture')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="description" class="inline-block text-lg mb-2">
                    Convention Description
                </label>
                <textarea class="border border-gray-200 rounded p-2 w-full" name="description" rows="10"
                    placeholder="Include tasks, requirements, salary, etc"> {{ $convention->description }}</textarea>
                @error('convention')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <button class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
                    Update Convention
                </button>

                <a href="/" class="text-black ml-4"> Back </a>
            </div>
        </form>
    </x-card>
</x-layout>
