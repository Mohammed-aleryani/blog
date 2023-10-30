<x-layout>

    <x-setting heading="Publish New Post">

        <main class="max-w-lg mx-auto mt-10- bg-gray-100 border-gray-200 p-6 rounded-xl">


            <form action="/admin/posts/store" method="POST" class="mt-10" enctype="multipart/form-data">
                @csrf


                <x-form.input name="title"/>
                <x-form.input name="slug"/>
                <x-form.input name="thumbnail" type="file"/>
                <x-form.textarea name="excerpt"/>
                <x-form.textarea name="body"/>
                <div class="m-6  flex justify-around">
                    <x-form.radio value="publish">Publish</x-form.radio>
                    <x-form.radio value="draft">Draft</x-form.radio>
                </div>


                <div class="mb-6 flex flex-col ">
                    <label class="block mb-2 uppercase font-bold text-xs text0gray-700" for="category_id">
                        Category
                    </label>
                    <select class="h-10  rounded" name="category_id" id="category_id">
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
                    <x-form.button type="submit"
                                   class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500 ">
                        submit
                    </x-form.button>
                </div>


            </form>
        </main>


    </x-setting>


</x-layout>