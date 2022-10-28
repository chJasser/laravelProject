<x-layout>
    <x-card class="p-10">

        <header>
            <a href="/conventions/create" class="btn btn-success btn-sm" title="Add New Convention">
                <i class="fa fa-plus" aria-hidden="true"></i> Add New
            </a>
            <h1 class="text-3xl text-center font-bold my-6 uppercase">
                Manage Conventions
            </h1>

        </header>

        <table class="w-full table-auto rounded-sm">
            <thead>
                <tr>
                    <th>name</th>
                    <th>Description</th>
                    <th>Owner</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @unless($conventions->isEmpty())
                @foreach ($conventions as $convention)
                <tr class="border-gray-300">
                    <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                        <a href="/conventions/{{ $convention->id }}"> {{ $convention->name }} </a>
                    </td>
                    <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                        {{ $convention->description }}
                    </td>
                    <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                        {{ $convention->owner }}
                    </td>
                    <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                        <a href="/conventions/{{ $convention->id }}/edit" class="text-blue-400 px-6 py-2 rounded-xl"><i class="fa-solid fa-pen-to-square"></i>
                            Edit</a>
                    </td>
                    <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                        <form method="POST" action="/conventions/{{ $convention->id }}">
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
                        <p class="text-center">No Conventions Found</p>
                    </td>
                </tr>
                @endunless

            </tbody>
        </table>
    </x-card>
</x-layout>