<x-layout>
    <x-card class="p-10">

        <header>
            <h1 class="text-3xl text-center font-bold my-6 uppercase">
                Courses list
            </h1>
        </header>
        @unless($courses->isEmpty())
        <table class="w-full table-auto rounded-sm">
            <thead>
                <tr>
                    <th>name</th>
                    <th>category</th>
                </tr>
            </thead>
            <tbody>

                    @foreach ($courses as $course)
                        <tr class="border-gray-300">
                            <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                            <img src="{{ asset('images/' . $course->image) }}" alt="{{ $course->name }}" class="w-20 h-20 rounded-full">
                            </td>
                            <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                                {{ $course->title }}
                            </td>
                            <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                                {{ $course->category }}
                            </td>
                        </tr>
                    @endforeach


            </tbody>
        </table>
        @else
        <p class="text-center">No courses yet.</p>
        @endunless
    </x-card>
</x-layout>
