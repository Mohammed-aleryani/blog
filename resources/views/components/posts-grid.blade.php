@props(['posts'])
<x-post-featured-card :post="$posts[0]"/>

<div class="lg:grid lg:grid-cols-6">
    @if(count($posts)>1)
        @foreach($posts->skip(1) as $post)
            <x-post-card
                    :post="$post"
                    class="{{$loop->iteration <3? 'col-span-3':'col-span-2'}}"/>
        @endforeach
    @endif
</div>

<div class="lg:grid lg:grid-cols-3">
</div>