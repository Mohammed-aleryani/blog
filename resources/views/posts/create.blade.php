<x-layout>

    <h1 class="font-bold text-center mt-5"> Publish New Post</h1>

    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10- bg-gray-100 border-gray-200 p-6 rounded-xl">


            <form action="/admin/posts/store" method="POST" class="mt-10">
                @csrf


                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text0gray-700" for="title">
                        TITLE
                    </label>

                    <input class="border border-gray-400 p-2 w-full"
                           type="text"
                           name="title"
                           id="title"
                           value="{{old('title')}}"
                           required>
                    @error('name')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text0gray-700" for="slug">
                        SLUG
                    </label>

                    <input class="border border-gray-400 p-2 w-full"
                           type="text"
                           name="slug"
                           value="{{old('slug')}}"
                           id="slug"
                           required>
                    @error('slug')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>


                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text0gray-700" for="excerpt">
                        EXCERPT
                    </label>

                    <textarea class="border border-gray-400 p-2 w-full"
                              name="excerpt"
                              id="excerpt"
                              required>{{old('excerpt')}}</textarea>
                    @error('excerpt')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>


                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text0gray-700" for="body">
                        Body
                    </label>

                    <textarea class="border border-gray-400 p-2 w-full"
                              name="body"
                              id="body"
                              required>{{old('body')}}</textarea>

                    @error('body')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>


                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text0gray-700" for="category_id">
                        Category
                    </label>
                    <select name="category_id" id="category_id">
                        @foreach($categories as $category)
                            <option value="{{$category->id}} "{{old("category_id")==$category->id ? "selected":''}}>
                                {{$category->name}}</option>
                        @endforeach
                    </select>


                    @error('category')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-4 flex justify-end ">
                    <x-button type="submit"
                              class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500 ">
                        PUBLISH
                    </x-button>
                </div>


            </form>
        </main>
    </section>

</x-layout>