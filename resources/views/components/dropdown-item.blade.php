@props(['isActive'=>false])

@php
    if ($isActive) {
        $class = "block text-left px-3 text-xs leading-5 hover:bg-blue-500 focus:bg-blue-500 hover:text-white bg-blue-500 text-white";
    } else {
        $class = "block text-left px-3 text-xs leading-5 hover:bg-blue-500 focus:bg-blue-500 hover:text-white focus:text-white";
    }
@endphp

<a {{$attributes->merge(['class'=>$class])}}>{{$slot}}</a>