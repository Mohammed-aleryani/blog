<x-layout>

    <x-setting :heading="'Edit Post : '. $post->title">

        <main class="max-w-lg mx-auto mt-10- bg-gray-100 border-gray-200 p-6 rounded-xl">


            <form action="/admin/posts/{{$post->id}}" method="POST" class="mt-10" enctype="multipart/form-data">
                @csrf
                @method('PATCH')


                <x-form.input name="title" :value="old('title',$post->title)"/>
                <x-form.input name="slug" :value="old('slug',$post->slug)"/>


                <div class="flex">
                    <div class="flex-1">
                        <x-form.input name="thumbnail" type="file" :value="old('thumbnail', $post->thumbnail)"/>
                    </div>
                    <img src="{{ asset('storage/'.$post->thumbnail) }}"
                         alt="Blog Post illustration" class="rounded-xl ml-6" width="100"></div>

                <x-form.textarea name="excerpt"> {!!strip_tags(old('excerpt',$post->excerpt)) !!}</x-form.textarea>
                <x-form.textarea name="body">{!! strip_tags(old('body',$post->body)) !!}</x-form.textarea>

                <div class="mb-6 flex flex-col ">
                    <label class="block mb-2 uppercase font-bold text-xs text0gray-700" for="category_id">
                        Category
                    </label>
                    <select class="h-10  rounded" name="category_id" id="category_id">
                        @foreach($categories as $category)
                            <option value="{{$category->id}} "{{old("category_id",$post->category_id)==$category->id ? "selected":''}}>
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
                        UPDATE
                    </x-form.button>
                </div>


            </form>
        </main>


    </x-setting>


</x-layout>