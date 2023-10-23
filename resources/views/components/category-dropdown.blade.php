<x-dropdown>

    <x-slot name="trigger">
        <button
                @click="show=!show"
                class="py-2 pl-3 pr-9 text-sm font-semibold text-left w-full lg:32 flex lg:inline-flex"
                style="display: inline-flex">
            {{isset($currentCategory)?$currentCategory->name:'Categories'}}

            <svg class="transform -rotate-90 absolute pointer-events-none" style="right: 12px;" width="22"
                 height="22" viewBox="0 0 22 22">
                <g fill="none" fill-rule="evenodd">
                    <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
                    </path>
                    <path fill="#222"
                          d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z"></path>
                </g>
            </svg>
        </button>
    </x-slot>

    <x-dropdown-item href="/">All</x-dropdown-item>
    @foreach($categories as $category)
        <x-dropdown-item
                :isActive="$isActive=isset($currentCategory) && $currentCategory->is($category)"
                href="/?category={{$category->slug}}&{{http_build_query(request()->except('$category'))}}"> {{$category->name}}</x-dropdown-item>
    @endforeach
</x-dropdown>