@props(['convention'])
<x-card>
    <div class="flex">
        <img class="hidden w-48 mr-6 md:block"
            src="{{ $convention->picture ? asset('storage/' . $picture->image) : asset('images/no-image.png') }}" alt="" />
        <div>
            <h3 class="text-2xl">
                <a href="/conventions/{{ $convention['id'] }}">{{ $convention['name'] }}</a>
            </h3>
            <div class="text-xl font-bold mb-4">{{ $convention->owner }}</div>
            <div class="text-lg mt-4">
               {{ $convention->start_date }}/ {{ $convention->end_date }}
            </div>
        </div>
    </div>
</x-card>
