<x-layout>
    <x-card class="p-10 rounded max-w-lg mx-auto mt-24">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">
                Create course
            </h2>

        </header>

        <form action="/courses/manage" method="POST"  enctype="multipart/form-data">
            @csrf
            <div class="mb-6">
                <label for="title" class="inline-block text-lg mb-2">Title</label>
                <input type="text" value="{{ old('title') }}" class="border border-gray-200 rounded p-2 w-full" name="title" placeholder="Example: nodeJS" />
                @error('title')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror

            </div>

            <div class="mb-6">
                <label for="description" class="inline-block text-lg mb-2">Description</label>
                <textarea rows="10" type="text" value="{{ old('description') }}" class="border border-gray-200 rounded p-2 w-full" name="description" placeholder="Example: NodeJs"></textarea>
                @error('description')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label for="category" class="inline-block text-lg mb-2">Category</label>
                <select name="category" id="category" class="border border-gray-200 rounded p-2 w-full">
                    @foreach ($categories as $category)
                    <option value="{{ $category }}">{{ $category }}</option>
                    @endforeach
                </select>
                @error('category')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label for="image" class="inline-block text-lg mb-2">Image</label>
                <input type="file" value="{{ old('image') }}" class="border border-gray-200 rounded p-2 w-full" name="image" placeholder="Example: nodeJS" />
                @error('image')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>


            <div class="row mb-3">
            				<label class="col-sm-2 col-label-form">Module</label>
            				<div class="col-sm-10">
            				<select class="border border-gray-200 rounded p-2 w-full" aria-label="Default select example" name="modules_id">
            					<option selected>Open this select menu</option>
            					@if(count($modules) > 0)

            				@foreach($modules as $row)
            					<option value="{{ $row->id}}" name="id">{{ $row->name }}</option>
            					>
            					@endforeach
            				@else
            					<option value="NULL">No Data
            </option>
            					@endif
            					</select>
            				</div>
            			</div>



            <div class="mb-6">
                <button class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
                    Create course
                </button>

                <a href="/courses/manage" class="text-black ml-4"> Back </a>
            </div>
        </form>
    </x-card>
</x-layout>
