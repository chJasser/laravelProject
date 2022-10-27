<x-layout>

    <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">
        @unless(count($events) == 0)
            @foreach ($events as $event)
                <x-event-card :event="$event"></x-event-card>
            @endforeach
        @else
            <p>not participated in any event yet!</p>
        @endunless

    </div>

</x-layout>
