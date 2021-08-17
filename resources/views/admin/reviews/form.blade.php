
<div class="form-row">
    <div class="form-group col-sm-6 {{ $errors->has('writer_id') ? 'has-error' : '' }}">
        <label for="writer_id" class="control-label">Writer</label>
        {{-- <select class="form-control" id="writer_id" name="writer_id" @if(Route::currentRouteName()=='admin.reviews.edit' ) disabled @endif>
                <option value="" style="display: none;" {{ old('writer_id', optional($reviews)->writer_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select writer</option>
            @foreach ($writers as $key => $writer)
                <option value="{{ $key }}" {{ old('writer_id', optional($reviews)->writer_id) == $key ? 'selected' : '' }}>
                    {{ $writer }}
                </option>
            @endforeach
        </select> --}}
        <select class="form-control select2" id="user_id" name="writer_id" required>
            <option value="" style="display: none;" {{ old('user_id', optional($reviews)->writer_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select user</option>
            @foreach ($writers as $key => $writer)
            <option value="{{ $key }}" {{ old('user_id', optional($reviews)->writer_id) == $key ? 'selected' : '' }}>
                {{ $writer }}
            </option>
            @endforeach
        </select>
        
        {!! $errors->first('writer_id', '<p class="help-block">:message</p>') !!}
    </div>

    <div class="form-group col-sm-6 {{ $errors->has('title') ? 'has-error' : '' }}">
        <label for="title" class="control-label">Title</label>
        <input class="form-control" name="title" type="text" id="title" value="{{ old('title', optional($reviews)->title) }}" minlength="1" maxlength="255" placeholder="Enter title here...">
        {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-row">
    <div class="form-group col-sm-12 {{ $errors->has('type') ? 'has-error' : '' }}">
        <label for="type" class="control-label">Type</label>
        <input class="form-control" name="type" type="text" id="type" value="{{ old('type', optional($reviews)->type) }}" minlength="1" placeholder="Enter type here...">
        {!! $errors->first('type', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-row">
    <div class="form-group col-sm-12  {{ $errors->has('comment') ? 'has-error' : '' }}">
        <label for="comment" class="control-label">Тип поездки:</label>
        {{-- <input class="form-control" name="comment" type="text" id="comment" value="{{ old('comment', optional($reviews)->comment) }}" minlength="1" placeholder="Enter comment here..."> --}}
        <textarea class="textarea-input" name="comment" id="comment" rows="4" value="{{ old('comment', optional($reviews)->comment) }}"></textarea>
        {!! $errors->first('comment', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<div class="form-row">
    <div class="form-group col-sm-12 {{ $errors->has('score') ? 'has-error' : '' }}">
        <label for="score" class="control-label">Оценка</label>
        {{-- <div class="col-md-10">
            <input class="form-control" name="score" type="text" id="score" value="{{ old('score', optional($reviews)->score) }}" minlength="1" placeholder="Enter score here...">
            {!! $errors->first('score', '<p class="help-block">:message</p>') !!}
        </div> --}}
        <div class="review-rating">
            <div class="m-0-auto" id="rateYo" data-rating="0"></div>
            <input class="rateyo-hidden" type="hidden" id="score" name="score" value="{{ old('score', optional($reviews)->score) }}">
            {!! $errors->first('score', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>


<div class="form-row">
    <div class="form-group col-sm-6 {{ $errors->has('receiver_id') ? 'has-error' : '' }}">
        <label for="receiver_id" class="control-label">Receiver</label>
        {{-- <select class="form-control" id="receiver_id" name="receiver_id" @if(Route::currentRouteName()=='admin.reviews.edit' ) disabled @endif>
                <option value="" style="display: none;" {{ old('receiver_id', optional($reviews)->receiver_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select receiver</option>
            @foreach ($receivers as $key => $receiver)
                <option value="{{ $key }}" {{ old('receiver_id', optional($reviews)->receiver_id) == $key ? 'selected' : '' }}>
                    {{ $receiver }}
                </option>
            @endforeach
        </select> --}}

        <select class="form-control select2" id="receiver_id" name="receiver_id" required>
            <option value="" style="display: none;" {{ old('receiver_id', optional($reviews)->receiver_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select user</option>
            @foreach ($receivers as $key => $receiver)
            <option value="{{ $key }}" {{ old('receiver_id', optional($reviews)->receiver_id) == $key ? 'selected' : '' }}>
                {{ $receiver }}
            </option>
            @endforeach
        </select>
        
        {!! $errors->first('receiver_id', '<p class="help-block">:message</p>') !!}
    </div>

    <div class="form-group col-sm-6 {{ $errors->has('booking_id') ? 'has-error' : '' }}">
        <label for="booking_id" class="control-label">Booking</label>
        <div class="section-select--input2 section-select--input__show"><span>Любой</span>
            <input type="hidden" value="" id="booking_id" name="booking_id">
            <div class="section-select--popup__icon">
                <svg class="icon icon-arrow-down-white ">
                    <use xlink:href="{{asset('static/img/svg/symbol/sprite.svg#arrow-down-white')}}"></use>
                </svg>
            </div>
            <ul class="section-select--popup__list section-select--popup__list__show">
                {{-- <li class="section-select--popup__item2 hover-text-color click_role" data-type="all">All</li> --}}
                @foreach ($bookings as $key => $booking)
                    <li class="section-select--popup__item2 hover-text-color click_book" data-type="{{ $key }}">{{ $booking }}</li>
                @endforeach
            </ul>
        </div>
        {{-- <select class="form-control" id="booking_id" name="booking_id">
                <option value="" style="display: none;" {{ old('booking_id', optional($reviews)->booking_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select booking</option>
            @foreach ($bookings as $key => $booking)
                <option value="{{ $key }}" {{ old('booking_id', optional($reviews)->booking_id) == $key ? 'selected' : '' }}>
                    {{ $booking }}
                </option>
            @endforeach
        </select> --}}
        
        {!! $errors->first('booking_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<script src="{{asset('js/jquery-3.4.1.js')}}" type="text/javascript"></script>
<script src="{{asset('js/select2.full.min.js')}}" type="text/javascript" defer></script>
<script>
    $(document).ready(function() {
        $('.select2').select2();
        $('#user_id').select2({
            minimumInputLength: 1, 
            ajax: {
                url: '{{ route("api.users.search") }}', 
                dataType: 'json', 
            }, 
        });

        $('#receiver_id').select2({
            minimumInputLength: 1, 
            ajax: {
                url: '{{ route("api.users.search") }}', 
                dataType: 'json', 
            }, 
        });

        $('.click_book').click(function () {
            var get_data = $(this).data('type');
            $('#booking_id').val(get_data);
        });
    });
</script>