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
                    <th>image</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @unless($data->isEmpty())
                    @foreach ($data as $module)
                        <tr class="border-gray-300">
                            <td>
                                <img src="{{ asset('images/' . $module->image) }}" alt="{{ $module->name }}" class="w-20 h-20 rounded-full">
                            </td>
                            <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                                <a href="/courses/{{ $course->id }}"> {{ $module->name }} </a>
                            </td>
                            <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                                 {{ $module->description }}
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

