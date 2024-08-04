<x-layout>



    <section class="px-6 py-8">
        <div class="border border-gray-200 p-6 rounded-xl max-w-lg mx-auto">
            <h1 class="text-center font-bold text-xl">Create A Post</h1>
            <form method="post" action="/admin/create" enctype="multipart/form-data">
                @csrf
                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="title">
                        Title
                    </label>
                    <input class="border border-gray-200 rounded p-2 w-full" type="text" name="title" id="title"
                           value="{{ old('title') }}"
                           required>
                    @error('title')
                    <p class="text-red-500 text-xs pt-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class='mb-6'>
                <label class='block mb-2 uppercase font-bold text-sx text-gray-700'
                for='thumbnail'
                >
               Upload your image
                </label>
                <input class='border border-gray-200 rounded p-2 w-full'
                type='file'
                name='thumbnail'
                id='thumbnail'
                required
                >
                    @error('thumbnail')
                    <p class="text-red-500 text-xs pt-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="body">
                        Write the Post
                    </label>
                    <textarea class="border border-gray-200 rounded p-2 w-full" name="body" id="body" rows="5" required>
                        {{ old('body') }}
                    </textarea>
                    @error('body')
                    <p class="text-red-500 text-xs pt-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="excert">
                        Excerpt
                    </label>
                    <textarea class="border border-gray-200 rounded p-2 w-full" name="excert" id="excert" required>{{ old('excert') }}</textarea>
                    @error('excert')
                    <p class="text-red-500 text-xs pt-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="slug">
                        Slug
                    </label>
                    <input class="border border-gray-200 rounded p-2 w-full" name="slug" id="slug"
                           value="{{old('slug')}}"
                           required/>
                    @error('slug')
                    <p class="text-red-500 text-xs pt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="category">
                        Category
                    </label>
                    <select name="category_id" id="category_id" class="border border-gray-200 rounded p-2 rounded w-auto">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                            @error('category_id')
                            <p class="text-red-500 text-xs pt-2">{{ $message }}</p>
                            @enderror
                    </select>
                </div>
                <div class="flex justify-center">
                    <button type="submit" class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500">
                        Post
                    </button>
                </div>
            </form>
        </div>
    </section>

</x-layout>
