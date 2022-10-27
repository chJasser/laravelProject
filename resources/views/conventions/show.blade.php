<x-layout>
    @include('partials._search')

    <a href="/conventions/manage" class="inline-block text-black ml-4 mb-4"><i class="fa-solid fa-arrow-left"></i> Back
    </a>
    <div class="mx-4">
        <x-card class="p-10 ">
            <div class="flex flex-col items-center justify-center text-center">
                <h3 class="text-2xl mb-2">{{ $convention->name }}</h3>
                <div class="text-xl font-bold mb-4">{{ $convention->owner }}</div>
                <div class="border border-gray-200 w-full mb-6"></div>
                <div>

                    <div class="text-lg space-y-6 font-bold">
                        <p>{{ $convention->description }}
                        </p>

                    </div>
                    <div>
                        <h3 class="text-lg  mb-4 " style='color:red'>
                            Reclamations Number : <span class="mr-2">{{ $reclamation_size}}
                            </span>
                        </h3>
                    </div>
                </div>
        </x-card>
        <table class="w-full table-auto rounded-sm ">

            <thead>
                <tr>
                    <th>Title</th>
                    <th>Content</th>
                </tr>
            </thead>
            <tbody>
                @unless($reclamations->isEmpty())
                @foreach ($reclamations as $reclamation)
                <tr class="border-gray-300">
                    <td class=" px-4 py-8 border-t border-b border-gray-300 text-lg">
                        <a href="/reclamations/{{ $reclamation->id }}"> {{ $reclamation->title }} </a>
                    </td>
                    <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                        {{ $reclamation->content }}
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
    </div>
</x-layout>