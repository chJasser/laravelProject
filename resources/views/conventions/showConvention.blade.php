<x-layout>
    @include('partials._search')

    <a href="/conventions" class="inline-block text-black ml-4 mb-4"><i class="fa-solid fa-arrow-left"></i> Back
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
                </div>
        </x-card>
        <x-convention-item :convention="$convention"> </x-convention-item>
        
    </div>
</x-layout>