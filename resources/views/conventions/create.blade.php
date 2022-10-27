<x-layout>
    <x-card class="p-10 rounded max-w-lg mx-auto mt-24">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">
                Create an Convention
            </h2>
            <p class="mb-4">Post Convention</p>
        </header>

        <form action="/conventions" method="POST" enctype="multipart/form-data">
            @csrf


            <div class="mb-6">
                <label for="name" class="inline-block text-lg mb-2">Name</label>
                <input type="text" value="{{ old('name') }}" class="border border-gray-200 rounded p-2 w-full"
                    name="name" placeholder="" />
                @error('name')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror

            </div>


            <div class="mb-6">
                <label for="start_date" class="inline-block text-lg mb-2">
                    StartDate
                </label>
                <input type="date" value="{{ old('start_date') }}" class="border border-gray-200 rounded p-2 w-full"
                    name="start_date" />
                @error('start_date')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label for="end_date" class="inline-block text-lg mb-2">
                    EndDate
                </label>
                <input type="date" value="{{ old('end_date') }}" class="border border-gray-200 rounded p-2 w-full"
                    name="end_date" />
                @error('end_date')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
          

            <div class="mb-6">
                <label for="picture" class="inline-block text-lg mb-2">
                    Convention Image
                </label>
                <input type="file" class="border border-gray-200 rounded p-2 w-full" name="picture" />
                @error('picture')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="description" class="inline-block text-lg mb-2">
                    Convention Description
                </label>
                <textarea value="{{ old('description') }}" class="border border-gray-200 rounded p-2 w-full" name="description"
                    rows="10" placeholder="Include tasks, requirements, salary, etc"></textarea>
                @error('description')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <button class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
                    Create Convention
                </button>

                <a href="/" class="text-black ml-4"> Back </a>
            </div>
        </form>
    </x-card>
</x-layout>
