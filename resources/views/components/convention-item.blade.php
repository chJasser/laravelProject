<div class="w-full bg-white rounded-lg border my-1 border-gray-200 shadow-md dark:bg-gray-100 dark:border-gray-700">
    <div class="flex flex-col items-left ml-5 pb-3">
        

        @php
            $likes = App\Http\Controllers\LikeConventionController::index($convention->id);
            $liked = false;
            foreach ($likes as $like) {
                if ($like->user_id == auth()->id()) {
                    $liked = true;
                }
            }
            $dislikes = App\Http\Controllers\DisLikeConventionController::index($convention->id);
            $disliked = false;
            foreach ($dislikes as $dislike) {
                if ($dislike->user_id == auth()->id()) {
                    $disliked = true;
                }
            }
        @endphp

        <div class="mt-3 p-4">

            <div class="flex justify-end">
                <form method="POST" action="/likesconvention/{{ $convention->id }}">
                    @csrf
                    <button type="submit" {{ $liked === true ? 'disabled' : '' }}>

                        <span style="color: black;font-size:30px"> {{ count($likes) }} </span>
                        <i style="font-size: 40px;cursor: pointer;" class="fa-solid fa-thumbs-up m-2"></i>
                    </button>
                </form>

                <form method="POST" action="/dislikesconvention/{{ $convention->id }}">
                    @csrf
                    <button type="submit" {{ $disliked === true ? 'disabled' : '' }}>

                        <span style="color: black;font-size:30px"> {{ count($dislikes) }} </span>
                        <i style="font-size: 40px;cursor: pointer;" class="fa-solid fa-thumbs-down  m-2"></i>
                    </button>
                </form>


            </div>
            

            </a>
        </div>
    </div>
</div>
