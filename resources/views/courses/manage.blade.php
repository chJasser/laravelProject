<x-layout>
    <x-card class="p-10">

        <header>
            <a href="/courses/create" class="btn btn-success btn-sm" title="Add New Reclamation">
                <i class="fa fa-plus" aria-hidden="true"></i> Add New
            </a>
            <h1 class="text-3xl text-center font-bold my-6 uppercase">
                Manage courses
            </h1>
        </header>

        <table class="w-full table-auto rounded-sm">
            <thead>
                <tr>
                    <th>title</th>
                    <th>Description</th>
                    <th>Owner</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @unless($courses->isEmpty())
                    @foreach ($courses as $course)
                        <tr class="border-gray-300">
                            <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                                <a href="/courses/{{ $course->id }}"> {{ $course->title }} </a>
                            </td>
                            <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                                 {{ $course->description }}
                            </td>
                            <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                                {{ $course->owner }}
                            </td>
                            <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                                <a href="/courses/{{ $course->id }}/edit" class="text-blue-400 px-6 py-2 rounded-xl"><i
                                        class="fa-solid fa-pen-to-square"></i>
                                    Edit</a>
                            </td>
                            <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                                <form method="POST" action="/courses/{{ $course->id }}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="text-red-500"><i class="fa-solid fa-trash"></i> Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr class="border-gray-300">
                        <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                            <p class="text-center">No courses Found</p>
                        </td>
                    </tr>
                @endunless

            </tbody>
        </table>
    </x-card>
</x-layout>
