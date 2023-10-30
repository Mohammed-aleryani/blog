@auth()
    <x-panel>
        <form action="#" method="post">

            @csrf
            <header class="flex items-center">
                <img src="https://i.pravatar.cc/60?id={{auth()->id()}}" width="40" height="40"
                     class="rounded"
                     alt="">

                <h2 class="ml-4">Want to participate</h2>
            </header>

            <div class="mt-6">
                            <textarea name="body" class="w-full text-sm focus:outline-none focus:ring" rows="5"
                                      placeholder="Quick, thing of something to say"></textarea>
            </div>

            <div class="flex justify-end mt-6 pt-6 border-t border-gray-200">
                <x-form.button>
                    Post
                </x-form.button>
            </div>
        </form>
    </x-panel>

@else
    <p class="font-semibold">
        <a href="/register" class="hover:underline">Register</a> or <a href="/login"
                                                                       class="hover:underline">Log
            in</a> to participate

    </p>
@endauth