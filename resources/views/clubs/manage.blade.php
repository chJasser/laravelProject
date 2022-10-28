<x-layout>
    <x-card class="p-10">

        <header>
            <a href="/clubs/create" class="btn btn-success btn-sm" title="Add New Club">
                <i class="fa fa-plus" aria-hidden="true"></i> Add New
            </a>
            <h1 class="text-3xl text-center font-bold my-6 uppercase">
                Manage Clubs
            </h1>
        </header>
        @unless($clubs->isEmpty())
        <table class="w-full table-auto rounded-sm">
            <thead>
                <tr>
                    <th>logo</th>
                    <th>name</th>
                    <th>Category</th>
                    <th>Description</th>
                    <th>Owner</th>
                    <th>Actions</th>

                </tr>
            </thead>
            <tbody>

                    @foreach ($clubs as $club)
                        <tr class="border-gray-300">
                            <td class="border px-4 py-2">
                                <img src="{{ asset('images/' . $club->logo) }}" alt="logo" class="w-10 h-10 rounded-full">
                            </td>
                            <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                                <a href="/clubs/{{ $club->id }}"> {{ $club->name }} </a>
                            </td>

                            <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                                {{ $club->user->name }}
                            </td>
                            <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                                {{ $club->category }}
                            </td>
                            <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                                {{ $club->description }}
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
                            <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                                <a href="/clubs/{{ $club->id }}/members" class="text-blue-400 px-6 py-2 rounded-xl"><i
                                        class="fa-solid fa-pen-to-square"></i>
                                  {{$club->users->count()}}  Members</a>
                            </td>
                            <td>
                               @if ($club->users->contains(auth()->user()))
                                   <a href="/clubs/{{ $club->id }}/leave" class="text-blue-400 px-6 py-2 rounded-xl"><i
                                        class="fa-solid fa-pen-to-square"></i>
                                    Leave</a>
                               @else
                                   <a href="/clubs/{{ $club->id }}/join" class="text-blue-400 px-6 py-2 rounded-xl"><i
                                        class="fa-solid fa-pen-to-square"></i>
                                    Join</a>
                               @endif
                        </tr>
                    @endforeach


            </tbody>
        </table>
        <div class="d-flex justify-content-center">
            {{-- {!! $clubs->links() !!} --}}
        </div>
        @else
        <p class="text-center">No clubs yet.</p>
        @endunless
    </x-card>
</x-layout>
