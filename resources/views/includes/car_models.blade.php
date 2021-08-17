{{-- <option value="" style="display: none;" disabled selected>Not Selected</option> --}}
<option value="">ВСЕ</option>
@foreach ($models as $item)
    <option value="{{ $item->name }}" @if (isset($truck) && old('model', optional($truck)->model) == $item->name){{'selected'}}@endif @if (isset($car) && old('model', optional($car)->model) == $item->name){{'selected'}}@endif>
        {{ $item->name }}
    </option>
@endforeach