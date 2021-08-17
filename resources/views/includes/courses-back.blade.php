<option value="" style="display: none;" selected>Select @lang('global.comments.fields.course')</option>
@foreach ($courses as $key => $course)
    @if(isset($course_id))
        <option value="{{ $key }}" {{ $course_id == $key ? 'selected' : '' }} data-course-id="{{$key}}">
            {{ $course }}
        </option>
    @else
    <option value="{{ $key }}" data-course-id="{{$key}}">
            {{ $course }}
        </option>
    @endif
@endforeach