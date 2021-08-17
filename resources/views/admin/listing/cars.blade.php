{{-- <option value="" selected>All</option> --}}
@foreach ($cars as $key => $car)
<option value="{{ $car->id }}">
    {{ $car->name }}
</option>
@endforeach