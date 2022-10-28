<x-layout>
    <x-card class="p-10">

        <header>

            <h1 class="text-3xl text-center font-bold my-6 uppercase">
                Manage Reclamations
            </h1>

        </header>

        <table class="w-full table-auto rounded-sm">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Content</th>
                    <th>Status</th>
                    <th>Owner</th>
                    <th>Convention Reclamé</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @unless($reclamations->isEmpty())
                    @foreach ($reclamations as $reclamation)
                        <tr class="border-gray-300">
                            <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                                <a href="/reclamations/{{ $reclamation->id }}"> {{ $reclamation->title }} </a>
                            </td>
                            <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                                {{ $reclamation->content }}
                            </td>
                            <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                                <input type="checkbox" name="status" @checked($reclamation->status || old('status', 0) === 1) />
                            </td>
                            <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                                {{ $reclamation->owner }}
                            </td>
                            <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                                {{ $reclamation->convention_id }}
                            </td>
                            <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                                <form method="POST" action="/reclamationsAdmin/{{ $reclamation->id }}">
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
                            <p class="text-center">No Reclamations Found</p>
                        </td>
                    </tr>
                @endunless

            </tbody>
        </table>
    </x-card>
</x-layout>
