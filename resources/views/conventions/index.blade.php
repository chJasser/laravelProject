<x-layout>
    @include('partials._hero')
    @include('partials._search-conventions')
    <a href="/reclamations/create" class="btn btn-success btn-sm mx-5" title="Add New Reclamation">  <i class="fa fa-plus" aria-hidden="true"></i> Add Reclamation
            </a>
    <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4 mt-10">

        @unless(count($conventions) == 0)
            @foreach ($conventions as $convention)
                <x-card-convention :convention="$convention"></x-card-convention>
            @endforeach
        @else
            <p>no conventions available !</p>
        @endunless

    </div>
    <div class="mt-6 p-4">
        {{ $conventions->links() }}
    </div>
</x-layout>
