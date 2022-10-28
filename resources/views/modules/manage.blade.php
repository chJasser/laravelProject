<x-layout>
    <x-card class="p-10">

        <header>
            @if (auth()->user()->role=='admin')
            <a href="/modules/create" class="btn btn-success btn-sm" title="Add New Reclamation">
                <i class="fa fa-plus" aria-hidden="true"></i> Add New
            </a>
            @endif

            <h1 class="text-3xl text-center font-bold my-6 uppercase">
                Manage Modules
            </h1>
        </header>

        <table class="w-full table-auto rounded-sm">
            <thead>
                <tr>
                    <th>image</th>
                    <th>Name</th>
                    <th>Description</th>
                    @if (auth()->user()->role=='admin')
                    <th>Actions</th>
                    @endif

                </tr>
            </thead>
            <tbody>
                @unless($modules->isEmpty())
                    @foreach ($modules as $module)
                        <tr class="border-gray-300">
                            <td>
                                <img src="{{ asset('images/' . $module->image) }}" alt="{{ $module->name }}" class="w-20 h-20 rounded-full">
                            </td>
                            <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                                <a href="/modules/{{ $module->id }}"> {{ $module->name }} </a>
                            </td>
                            <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                                 {{ $module->description }}
                            </td>

                            <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                                <a href="/modules/{{ $module->id }}/courses" class="text-blue-400 px-6 py-2 rounded-xl"><i
                                        class="fa-solid fa-pen-to-square"></i>
                                        {{$module->courses->count()}}
                                  Courses</a>
                            </td>
                            @if (auth()->user()->role=='admin')
                            <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                                <a href="/modules/{{ $module->id }}/edit" class="text-blue-400 px-6 py-2 rounded-xl"><i
                                        class="fa-solid fa-pen-to-square"></i>
                                    Edit</a>
                            </td>
                            <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                                <form method="POST" action="/modules/{{ $module->id }}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="text-red-500"><i class="fa-solid fa-trash"></i> Delete</button>
                                </form>
                            </td>
                            @endif

                        </tr>
                    @endforeach
                @else
                    <tr class="border-gray-300">
                        <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                            <p class="text-center">No modules Found</p>
                        </td>
                    </tr>
                @endunless

            </tbody>
        </table>
    </x-card>
</x-layout>

