@props(['name'])
<x-form.section>
    <x-form.label name="{{$name}}"/>
    <textarea class="border border-gray-400 p-2 w-full rounded"
              name="{{$name}}"
              id="{{$name}}"
              required>{!!$slot!!}</textarea>

    <x-form.error name="{{$name}}"/>
</x-form.section>