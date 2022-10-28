@props(['event'])
<x-card>
    <div class="flex">
        <img class="hidden w-48 mr-3 md:block"

            src="{{ $event->logo ? asset('storage/' . $event->logo) : asset('images/no-image.png') }}" alt="" />

        <div>
            <h3 class="text-2xl">
                <a href="/events/{{ $event['id'] }}">{{ $event['title'] }}</a>
            </h3>
            <div class="text-xl font-bold mb-4">{{ $event->owner }}</div>
            <x-event-tags :tags="$event->tags" />
            <div class="text-lg mt-4">
                <i class="fa-solid fa-location-dot"></i> {{ $event->location }}
            </div>
            <div class="text-lg mt-4">
                <i class="fa-solid fa-person"></i> Number of participants
                {{ App\Http\Controllers\EventController::numbOfParticipants($event) }}
            </div>
            <div class="text-lg mt-4">
                <i class="fa-solid fa-list"></i> Number of comments
                {{ App\Http\Controllers\EventController::numbOfComments($event) }}
            </div>
            <div class="text-lg mt-4">
                <i class="fa-solid fa-clock"></i> starting : {{ $event->start_date }} || <i
                    class="fa-solid fa-clock"></i>
                ending : {{ $event->start_date }}
            </div>


        </div>
    </div>
</x-card>
