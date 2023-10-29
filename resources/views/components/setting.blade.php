@props(['heading'])

<section class="px-6 py-8 max-w-4xl mx-auto">
    <h1 class="text0lg font-bold mb-8 pb-2 border-b"> {{$heading}}</h1>
    <div class="flex">
        <aside class="w-48">
            <h4 class="font-semibold mb-4">Links</h4>
            <ul>
                <li>
                    <a href="/admin/posts" class=" {{request()->is('admin/posts')?'text-blue-500':''}}">Dashboard</a>
                </li>
                <li>
                    <a href="/admin/posts/create" class="{{request()->is('admin/posts/create')?'text-blue-500':''}}">New
                        Post</a>
                </li>
            </ul>
        </aside>

        <main class="flex-1">
            {{$slot}}
        </main>
    </div>

</section>