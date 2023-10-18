<x-layout>
    @include('_posts-header')

    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        @if($posts->count()>0)
            <x-posts-grid :posts=" $posts"/>
        @else
            <h3 class="text-center">There is no blog to show</h3>
        @endif
    </main>

</x-layout>
