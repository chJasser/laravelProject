<x-layout>
    <x-card class="p-10 rounded max-w-lg mx-auto mt-24">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">
            Edit {{ $course->title }}
            </h2>
            <p class="mb-4">Edit course</p>
        </header>

        <form action="/courses/{{ $course->id }}" method="POST" >
            @csrf
            @method('PUT')
            <div class="mb-6">
                <label for="title" class="inline-block text-lg mb-2">title</label>
                <input type="text" value="{{ $course->title }}" class="border border-gray-200 rounded p-2 w-full"
                    title="title" />
                @error('title')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror

            </div>

            <div class="mb-6">
                <label for="description" class="inline-block text-lg mb-2">description</label>
                <textarea rows="10"type="text"  class="border border-gray-200 rounded p-2 w-full"
                    title="description"  >{{ $course->description }}</textarea>
                @error('description')
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
