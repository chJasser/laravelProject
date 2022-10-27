<div class="w-full bg-white rounded-lg border my-1 border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
    <div class="flex flex-col items-left ml-5 pb-3">
        <div class="flex items-left">

            <div class="mt-4 ml-2">
                <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">{{ $post->user->name }}

                    {{ $post->created_at }} </h5>
                <span class="text-sm text-gray-500 dark:text-gray-400">
                    {{ $post->content }} </h5>
                </span>
            </div>
        </div>

        <div class="mt-3 p-4">

            <div id="accordion-collapse" data-accordion="collapse">
                <div class="flex">
                    <button type="button" data-accordion-target="#accordion-collapse-body-2" aria-expanded="false"
                        aria-controls="accordion-collapse-body-2"
                        {{ $post->user_id == auth()->user()->id ? '' : 'disabled' }}
                        class="inline-flex items-center py-2 px-4 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">update
                    </button>
                    <form method="POST" action="/posts/{{ $post->id }}">
                        @csrf
                        @method('DELETE')
                        <button {{ $post->user_id == auth()->user()->id ? '' : 'disabled' }}
                            class="inline-flex items-center py-2 ml-3 px-4 text-sm font-medium text-center text-gray-900 bg-red rounded-lg border border-red-300 hover:bg-red-100 focus:ring-4 focus:outline-none focus:ring-red-200 dark:bg-red-800 dark:text-white dark:border-red-600 dark:hover:bg-red-700 dark:hover:border-red-700 dark:focus:ring-red-700">
                            Delete
                        </button>
                    </form>
                </div>
                <h2 id="accordion-collapse-heading-2">


                </h2>
                <div id="accordion-collapse-body-2" class="hidden my-2" aria-labelledby="accordion-collapse-heading-2">

                    <div class="flex mx-auto items-center justify-center shadow-lg mt-5  mb-4 ">

                        <form method="POST" action="/posts/{{ $post->id }}" class="w-full  bg-white rounded-lg  pt-2">
                            @csrf
                            @method('PUT')
                            <div class="flex flex-wrap mb-6">
                                <h2 class="px-4 pt-3 pb-2 text-gray-800 text-lg">Update comment</h2>
                                <div class="w-full md:w-full px-3 mb-2 mt-2">
                                    <textarea
                                        class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white"
                                        name="content" placeholder='Type Your Comment'></textarea>
                                </div>
                                <div class="w-full md:w-full flex items-start md:w-full px-3">
                                    <div class="flex items-start w-1/2 text-gray-700 px-2 mr-auto">
                                        <svg fill="none" class="w-5 h-5 text-gray-600 mr-1" viewBox="0 0 24 24"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </div>
                                    <div class="-mr-1">
                                        <input type='submit'
                                            class="bg-white text-gray-700 font-medium py-1 px-4 border border-gray-400 rounded-lg tracking-wide mr-1 hover:bg-gray-100"
                                            value='Update Comment'>
                                    </div>
                                </div>
                        </form>
                    </div>
                </div>
            </div>





            </a>
        </div>
    </div>
</div>
