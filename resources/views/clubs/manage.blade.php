<x-layout>
    <x-card class="p-10">

        <header>
            <a href="/clubs/create" class="btn btn-success btn-sm" title="Add New Reclamation">
                <i class="fa fa-plus" aria-hidden="true"></i> Add New
            </a>
            <h1 class="text-3xl text-center font-bold my-6 uppercase">
                Manage Clubs
            </h1>
        </header>

        <table class="w-full table-auto rounded-sm">
            <thead>
                <tr>
                    <th>name</th>
                    <th>Description</th>
                    <th>Owner</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @unless($clubs->isEmpty())
                    @foreach ($clubs as $club)
                        <tr class="border-gray-300">
                            <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                                <a href="/clubs/{{ $club->id }}"> {{ $club->name }} </a>
                            </td>
                            <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                                 {{ $club->description }}
                            </td>
                            <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                                {{ $club->owner }}
                            </td>
                            <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                                <a href="/clubs/{{ $club->id }}/edit" class="text-blue-400 px-6 py-2 rounded-xl"><i
                                        class="fa-solid fa-pen-to-square"></i>
                                    Edit</a>
                            </td>
                            <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                                <form method="POST" action="/clubs/{{ $club->id }}">
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
                            <p class="text-center">No clubs Found</p>
                        </td>
                    </tr>
                @endunless

            </tbody>
        </table>
    </x-card>
</x-layout>
