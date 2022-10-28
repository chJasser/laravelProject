<x-layout>
    <x-card class="p-10">

        <header>
            <h1 class="text-3xl text-center font-bold my-6 uppercase">
                list Clubs
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
                    @if ($club->users->contains(auth()->user()))
                    <a href="/clubs/{{ $club->id }}/leave" class="bg-red-500 hover:bg-red-700 text-white-400 px-6 py-2 px-4 rounded"><i
                        class="fa-solid fa-pen-to-square"></i>
                    Leave</a>
                                @else
                                    <a href="/clubs/{{ $club->id }}/join" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded"><i
                                            class="fa-solid fa-pen-to-square"></i>
                                        Join</a>
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
        </div>
        @endforeach
        </div>
        @else
        <p class="text-center">No clubs yet.</p>
        @endunless





        @else
        <p class="text-center">No clubs yet.</p>
        @endunless -->
    </x-card>
</x-layout>
