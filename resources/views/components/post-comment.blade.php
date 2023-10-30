@props(['comment'])
<x-panel class="bg-gray-50">
    <article class="flex  space-x-4">
        <div class="flex-shrink-0">
            <img src="https://i.pravatar.cc/60?id={{$comment->user_id}}" alt="" width="60" height="60"
                 class="rounded-xs">
        </div>

        <div x-data="{show:false}" class="w-full">
            <header class="mb-4 flex justify-between">
                <div>
                    <h3 class="font-bold">{{$comment->author->name}}</h3>
                    <p class="text-xs">
                        Posted
                        <time>{{$comment->created_at->diffForHumans()}}</time>
                    </p>
                </div>
                @if(auth()->id()==$comment->author->id)
                    <div class="flex">
                        <button
                                @click="show=!show"
                                class="text-blue-500 hover:text-blue-600 mr-5">Edit
                        </button>

                        <form method="POST" action="comment/{{ $comment->id }}"
                              class="inline-flex"
                        >
                            @csrf
                            @method('DELETE')

                            <button class="text-xs text-gray-400 ">Delete</button>
                        </form>
                    </div>
                @endif
            </header>

            <div>

                <form action="comment/{{$comment->id}}" method="post" x-show="show" style="display: none">
                    @method('PATCH')
                    @csrf
                    <x-form.textarea name="body">
                        {{$comment->body}}

                    </x-form.textarea>
                    <x-form.button type="submit"
                                   class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500 ">
                        submit
                    </x-form.button>

                </form>

                <p x-show="!show">
                    {{$comment->body}}
                </p>
            </div>

        </div>

    </article>
</x-panel>
