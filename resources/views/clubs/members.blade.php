<x-layout>
    <x-card class="p-10">

        <header>
            <h1 class="text-3xl text-center font-bold my-6 uppercase">
                members list
            </h1>
        </header>
        @unless($users->isEmpty())
        <table class="w-full table-auto rounded-sm">
            <thead>
                <tr>
                    <th>name</th>
                    <th>email</th>
                </tr>
            </thead>
            <tbody>

                    @foreach ($users as $user)
                        <tr class="border-gray-300">
                            <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                                {{ $user->name }}
                            </td>
                            <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                                {{ $user->email }}
                            </td>
                        </tr>
                    @endforeach


            </tbody>
        </table>
        @else
        <p class="text-center">No subscibers yet.</p>
        @endunless
    </x-card>
</x-layout>
