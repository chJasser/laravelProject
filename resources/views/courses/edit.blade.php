<x-layout>
    <x-card class="p-10 rounded max-w-lg mx-auto mt-24">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">
            Edit {{ $course->title }}
            </h2>
            <p class="mb-4">Edit course</p>
        </header>

        <form action="/courses/{{ $course->id }}" method="POST" enctype="multipart/form-data" >
            @csrf
            @method('PUT')
            <div class="mb-6">
                <label for="title" class="inline-block text-lg mb-2">Title</label>
                <input type="text" value="{{ $course->title }}" class="border border-gray-200 rounded p-2 w-full"
                    name="title" />
                @error('title')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror

            </div>

            <div class="mb-6">
                <label for="description" class="inline-block text-lg mb-2">Description</label>
                <textarea rows="10"type="text"  class="border border-gray-200 rounded p-2 w-full"
                    name="description"  >{{ $course->description }}</textarea>
                @error('description')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

           <div class="mb-6">
                <label for="category" class="inline-block text-lg mb-2">Category</label>
                <select name="category" id="category" class="border border-gray-200 rounded p-2 w-full">
                    @foreach ($categories as $category)
                        <option value="{{ $category }}" {{ $course->category == $category ? 'selected' : '' }}>{{ $category }}</option>
                    @endforeach
                </select>
                @error('category')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label for="image" class="inline-block text-lg mb-2">Image</label>
                <input type="file" class="border border-gray-200 rounded p-2 w-full"
                    name="image" />
                @error('image')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <button class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
                    Edit course
                </button>

                <a href="/courses/manage" class="text-black ml-4"> Back </a>
            </div>
        </form>
    </x-card>
</x-layout>
