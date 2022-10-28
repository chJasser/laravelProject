<x-layout>
    <x-card class="p-10">

        <header>
            @if (auth()->user()->role == 'admin')
                <a href="/clubs/manage" class="inline-block text-black ml-4 mb-4"><i class="fa-solid fa-arrow-left"></i> Back
                </a>

            <a href="/clubs/create" class="btn btn-success btn-sm" title="Add New Club">
                <i class="fa fa-plus" aria-hidden="true"></i> Add New
            </a>
            @endif
            <h1 class="text-3xl text-center font-bold my-6 uppercase">
                Manage Clubs
            </h1>
        </header>


    <div class="flex flex-row justify-items-center">
        @unless($clubs->isEmpty())
        @foreach ($clubs as $club)
        <div class="max-w-sm mr-5 mt-5 rounded overflow-hidden shadow-lg">
            <img src="{{ asset('images/' . $club->logo) }}" alt="logo" class="">
            <div class="px-6 py-4">
               <div class="flex justify-between">
                <div class="font-bold text-xl mb-2">Name : {{$club->name}}</div>
                    <div class="text-white font-bold py-2 px-4 rounded" >
                        @if(auth()->user()->role == 'user')
                        @if ($club->users->contains(auth()->user()))
                        <a href="/clubs/{{ $club->id }}/leave" class="bg-red-500 hover:bg-red-700 text-white-400 px-6 py-2 px-4 rounded"><i
                            class="fa-solid fa-pen-to-square"></i>
                        Leave</a>
                                    @else
                                        <a href="/clubs/{{ $club->id }}/join" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded"><i
                                                class="fa-solid fa-pen-to-square"></i>
                                            Join</a>
                                    @endif
                        @endif

                    </div>
               </div>
                <p class="text-gray-700 text-base mb-1">
                Category : {{$club->category}}
                </p>
                <h3>Owner : {{$club->user->name}}</h3>
                <button class="btn btn-warning mt-5">
                <a href="/clubs/{{ $club->id }}/members" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded"><i
                                        class="fa-solid fa-pen-to-square"></i>
                                  {{$club->users->count()}}  Members</a>
                </button>
            </div>
            @if (auth()->user()->role == 'admin')
            <div class="px-6 pt-2 pb-2 flex flex-row mr-5 items-center">
                <a href="/clubs/{{ $club->id }}/edit" class="mr-5 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"><i
                                    class="fa-solid fa-pen-to-square"></i>
                                Edit</a>
                    <form method="POST" action="/clubs/{{ $club->id }}">
                    @csrf
                    @method('DELETE')
                    <button class="ml-5 mb-2 bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded"><i class="fa-solid fa-trash"></i> Delete</button>
                    </form>
                </div>

            @endif

        </div>
        @endforeach
        </div>
        <div class="d-flex justify-content-center">
            {{-- {!! $clubs->links() !!} --}}
        </div>
        @else
        <p class="text-center">No clubs yet.</p>
        @endunless




        <!-- @unless($clubs->isEmpty())
        <table class="w-full table-auto rounded-sm">
            <thead>
                <tr>
                    <th>logo</th>
                    <th>name</th>
                    <th>Owner</th>
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
        @endunless -->
    </x-card>
</x-layout>
