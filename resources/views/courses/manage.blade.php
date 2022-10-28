<x-layout>
    <x-card class="p-10">

        <header>
            @if (auth()->user()->role=='admin')
            <a href="/courses/create" class="btn btn-success btn-sm" title="Add New Reclamation">
                <i class="fa fa-plus" aria-hidden="true"></i> Add New
            </a>
            @endif

            <h1 class="text-3xl text-center font-bold my-6 uppercase">
                Manage courses
            </h1>
        </header>

        <!-- @unless($courses->isEmpty())
        @foreach ($courses as $course)
        <div class="max-w-sm rounded overflow-hidden shadow-lg">
            <img class="w-full" src="/img/card-top.jpg" alt="Sunset in the mountains">
            <div class="px-6 py-4">
                <div class="font-bold text-xl mb-2">The Coldest Sunset</div>
                <p class="text-gray-700 text-base">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus quia, nulla! Maiores et perferendis eaque, exercitationem praesentium nihil.
                </p>
            </div>
            <div class="px-6 pt-4 pb-2">
                <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#photography</span>
                <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#travel</span>
                <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#winter</span>
            </div>
        </div>
        @endforeach
                @else
                    <tr class="border-gray-300">
                        <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                            <p class="text-center">No courses Found</p>
                        </td>
                    </tr>
                @endunless -->


        <table class="w-full table-auto rounded-sm">
            <thead>
                <tr>
                    <th>image</th>
                    <th>title</th>
                    <th>Description</th>
                    <th>Categorie</th>
                    <th>Owner</th>
                    @if (auth()->user()->role=='admin')
                    <th>Actions</th>
                    @endif

                </tr>
            </thead>
            <tbody>
                @unless($courses->isEmpty())
                    @foreach ($courses as $course)
                        <tr class="border-gray-300">
                            <td>
                                <img src="{{ asset('images/' . $course->image) }}" alt="{{ $course->title }}" class="w-20 h-20 rounded-full">
                            </td>
                            <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                                <a href="/courses/{{ $course->id }}"> {{ $course->title }} </a>
                            </td>
                            <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                                 {{ $course->description }}
                            </td>
                            <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                                {{ $course->category}}
                            </td>
                            <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                                {{ $course->user->name }}
                            </td>
                            @if (auth()->user()->role=='admin')
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
                            @endif
                            <td>
                                <a href="/courses/{{ $course->id }}" class="mr-5 font-bold py-2 px-4 rounded">
                                <i class="fa-sharp fa-solid fa-circle-info"></i> Details
                                   </a>
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

