<x-layout>
    @include('partials._hero')
    @include('partials._search-forums')
    <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">
        @unless(count($forums) == 0)
            @foreach ($forums as $forum)
                <x-card-forum :forum="$forum"></x-card-forum>
            @endforeach
        @else
            <p>no forums available !</p>
        @endunless

    </div>
    <div class="mt-6 p-4">
        {{ $forums->links() }}
    </div>
    <form action="/subscribe" method="POST">
        @csrf

        <div class="flex justify-center align-content-center align-items-center">
            <div style="width: 80%;" class="mb-3">
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Email
                    address</label>

                <input name="email" id="email"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="john.doe@company.com">
            </div>
            <button style="height:70%;margin-top: 30px;margin-left: 5px" type="submit"
                class="text-white bg-[#4285F4] hover:bg-[#4285F4]/90 focus:ring-4 focus:outline-none focus:ring-[#4285F4]/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-[#4285F4]/55 mr-2 mb-2">
                Subscribe to our newsletter
            </button>
        </div>
        <div class="text-center">
            @error('email')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

    </form>

</x-layout>
