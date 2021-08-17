<div class="form-row">
<div class="form-group col-md-6 {{ $errors->has('name') ? 'has-error' : '' }}">
    <label for="name" class="control-label">@lang('global.car.fields.brand')</label>
    <div>
        {{-- <input class="form-control" name="name" type="text" id="name" value="{{ old('name', optional($truck)->name) }}" minlength="1" maxlength="255" placeholder="Enter name here...">
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!} --}}
        <select class="input-main select2" name="name" id="car_name" required>
            <option value="" selected disabled>@lang('global.not_set')</option>
            @foreach ($brands as $item)
            <option value="{{ $item->name }}" data-brand-id="{{$item->id}}" @if (old('name', optional($truck)->name) == $item->name){{'selected'}}@endif>
                {{ $item->name }}
            </option>
            @endforeach
        </select>
    </div>
</div>

<div class="form-group col-md-6 {{ $errors->has('model') ? 'has-error' : '' }}">
    <label for="model" class="control-label">@lang('global.car.fields.model')</label>
    <div>
        {{-- <input class="form-control" name="model" type="text" id="model" value="{{ old('model', optional($truck)->model) }}" minlength="1" placeholder="Enter model here...">
        {!! $errors->first('model', '<p class="help-block">:message</p>') !!} --}}
        <select class="input-main select2" name="model" id="car_model" required>
            {{-- <option value="" selected disabled>@lang('global.not_set')</option>
            @foreach ($models as $user)
            <option value="{{ $user->name }}" @if (old('model', optional($truck)->model) == $user->name){{'selected'}}@endif>
                {{ $user->name }}
            </option>
            @endforeach --}}
            @include('includes.car_models')
        </select>
    </div>
</div>

<div class="form-group col-md-6 {{ $errors->has('year') ? 'has-error' : '' }}">
    <label for="year" class="control-label">@lang('global.car.fields.year')</label>
    <div>
        <input class="form-control" name="year" type="number" min="1900" max="2021" id="year" value="{{ old('year', optional($truck)->year) }}" minlength="1" placeholder="Enter year here...">
        {!! $errors->first('year', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group col-md-6 {{ $errors->has('color') ? 'has-error' : '' }}">
    <label for="color" class="control-label">@lang('global.car.fields.color')</label>
    <div>
        {{-- <input class="form-control" name="color" type="text" id="color" value="{{ old('color', optional($truck)->color) }}" minlength="1" placeholder="Enter color here...">
        {!! $errors->first('color', '<p class="help-block">:message</p>') !!} --}}
        <div class="section-select--input2 section-select--input__show"><span class="color_part"><div style="background-color: {{ old('color', optional($truck)->color) }}">{{ old('color', optional($truck)->color) }}</div></span>
            <input type="hidden" name="color" id="color" value="{{ old('color', optional($truck)->color) }}" required>
            <div class="section-select--popup__icon">
                <svg class="icon icon-arrow-down-white ">
                    <use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#arrow-down-white')}}"></use>
                </svg>
            </div>
            <ul class="section-select--popup__list section-select--popup__list__show">
                <li class="section-select--popup__item3 hover-text-color click_color_truck" data-type=''>@lang('global.not_set')</li>
            @foreach ($colors as $user)
                <li class="section-select--popup__item3 hover-text-color click_color_truck" data-type="{{$user->color}}"><div style="background-color: {{$user->color}}">{{$user->color}}</div></li>
            @endforeach
            </ul>
        </div>
    </div>
</div>

<div class="form-group col-md-6 {{ $errors->has('user_id') ? 'has-error' : '' }}">
    <label for="user_id" class="control-label">@lang('global.car.fields.owner')</label>
    <div>
        <select class="form-control" id="user_id" name="user_id" required>
        	<option value="" style="display: none;" {{ old('user_id', optional($truck)->user_id ?: '') == '' ? 'selected' : '' }} disabled selected>@lang('global.not_set')</option>
            @foreach ($users as $user)
			    <option value="{{ $user->id }}" {{ old('user_id', optional($truck)->user_id) == $user->id ? 'selected' : '' }}>
			    	{{ $user->name }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group col-md-6 {{ $errors->has('body_type_id') ? 'has-error' : '' }}">
    <label for="body_type_id" class="control-label">@lang('global.car.fields.body_type')</label>
    <div>
        <select class="form-control select2" id="body_type_id" name="body_type_id" required>
        	    <option value="" style="display: none;" {{ old('body_type_id', optional($truck)->body_type_id ?: '') == '' ? 'selected' : '' }} disabled selected>@lang('global.not_set')</option>
        	@foreach ($bodyTypes as $key => $bodyType)
			    <option value="{{ $bodyType->id }}" {{ old('body_type_id', optional($truck)->body_type_id) == $bodyType->id ? 'selected' : '' }}>
			    	{{ $bodyType->name }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('body_type_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

{{-- <div class="form-group {{ $errors->has('cargo_type_id') ? 'has-error' : '' }}">
    <label for="cargo_type_id" class="control-label">Cargo Type</label>
    <div>
        <select class="form-control" id="cargo_type_id" name="cargo_type_id">
        	    <option value="" style="display: none;" {{ old('cargo_type_id', optional($truck)->cargo_type_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select cargo type</option>
        	@foreach ($cargoTypes as $key => $cargoType)
			    <option value="{{ $key }}" {{ old('cargo_type_id', optional($truck)->cargo_type_id) == $key ? 'selected' : '' }}>
			    	{{ $cargoType }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('cargo_type_id', '<p class="help-block">:message</p>') !!}
    </div>
</div> --}}

<div class="form-group col-md-6 {{ $errors->has('number') ? 'has-error' : '' }}">
    <label for="number" class="control-label">@lang('global.car.fields.number')</label>
    <div>
        <input class="form-control gogocar-car-number" name="number" type="text" id="number" value="{{ old('number', optional($truck)->number) }}" placeholder="Enter number here..." required>
        {!! $errors->first('number', '<p class="help-block">:message</p>') !!}
    </div>
</div>

{{-- <div class="form-group col-md-6 {{ $errors->has('carcase_type') ? 'has-error' : '' }}">
    <label for="carcase_type" class="control-label">Carcase Type</label>
    <div>
        <input class="form-control" name="carcase_type" type="text" id="carcase_type" value="{{ old('carcase_type', optional($truck)->carcase_type) }}" minlength="1" placeholder="Enter carcase type here..." required>
        {!! $errors->first('carcase_type', '<p class="help-block">:message</p>') !!}
    </div>
</div> --}}

<div class="form-group col-md-6 {{ $errors->has('capacity') ? 'has-error' : '' }}">
    <label for="capacity" class="control-label">@lang('global.truck.fields.capacity')</label>
    <div>
        <input class="form-control" name="capacity" type="number" id="capacity" value="{{ old('capacity', optional($truck)->capacity) }}" minlength="1" placeholder="Enter capacity here...">
        {!! $errors->first('capacity', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group col-md-6 {{ $errors->has('place') ? 'has-error' : '' }}">
    <label for="place" class="control-label">@lang('global.truck.fields.place')</label>
    <div>
        <input class="form-control" name="place" type="number" id="place" value="{{ old('place', optional($truck)->place) }}" minlength="1" placeholder="Enter place here...">
        {!! $errors->first('place', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group col-md-6 {{ $errors->has('max_size') ? 'has-error' : '' }}">
    <label for="max_size" class="control-label">@lang('global.truck.fields.max_size')</label>
    <div>
        <input class="form-control" name="max_size" type="number" id="max_size" value="{{ old('max_size', optional($truck)->max_size) }}" minlength="1" placeholder="Enter max size here...">
        {!! $errors->first('max_size', '<p class="help-block">:message</p>') !!}
    </div>
</div>
</div>
<script src="{{asset('js/jquery-3.4.1.js')}}" type="text/javascript"></script>
<script src="{{asset('js/select2.full.min.js')}}" type="text/javascript" defer></script>
<script>
    $(document).ready(function() {
        $('.select2').select2();
        $('#user_id').select2({
            minimumInputLength: 1
            , ajax: {
                url: '{{ route("api.users.search") }}'
                , dataType: 'json'
            , }
        , });

        // model fetch
            // model fetch
        $('#car_name').on('change', function () {
            var query = $(this).children("option:selected").data('brand-id');
            fetch_models(query);
        });

        function fetch_models(query) {
            $.ajax({
                url: "/fetch_models?query=" + query,
                success: function (data) {
                    $('#car_model').html('');
                    $('#car_model').html(data);
                }
            })
        }
        // end model fetch
    });
	$(document).on("click", '.click_color_truck', function(){
        var get_user = $(this).html();
        var get_data = $(this).data('type');
        $(this).parents('.section-select--input__show').children('span').html(get_user);
        $('#color').val(get_data);
	});
</script>
