@props(['value','checked'=>''])
<div>
    <input
            class="inline text0gray-700"
            type="radio" id="status"
            name="status"
            value="{{old('status')??$value}}"
            {{$checked}}
    >

    <label class="font-semibold" for="html">{{$slot}}</label>

</div>