<x-layout>
    @include('partials._search')

    <a href="/courses/manage" class="inline-block text-black ml-4 mb-4"><i class="fa-solid fa-arrow-left"></i> Back
    </a>
    <div class="mx-4">
        <x-card class="p-10 ">
            <div class="flex flex-col items-center justify-center text-center">

            <img src="{{ asset('images/' . $course->image) }}" alt="image" class="mb-5">
                <h3 class="text-2xl mb-2">{{ $course->title }}</h3>
                <div class="text-xl font-bold mb-4">{{ $course->user->title }}</div>
                <div class="border border-gray-200 w-full mb-6"></div>
                <div>
                    <h3 class="text-3xl font-bold mb-4">
                        course Description
                    </h3>
                    <div class="text-lg space-y-6">
                        <p>{{ $course->description }}
                        </p>

                    </div>
                </div>
            </div>
        </x-card>

    </div>
</x-layout>
