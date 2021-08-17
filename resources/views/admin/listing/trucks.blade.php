{{-- <option value="" selected>All</option> --}}
@foreach ($trucks as $key => $truck)
<option value="{{ $truck->id }}">
    {{ $truck->name }}
</option>
@endforeach