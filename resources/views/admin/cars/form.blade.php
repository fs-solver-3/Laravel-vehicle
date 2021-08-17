<div class="form-row">
    <div class="form-group col-sm-6 {{ $errors->has('user_id') ? 'has-error' : '' }}">
        <label for="user_id" class="control-label">@lang('global.transactions.fields.user')</label>
        <select class="form-control select2" id="user_id" name="user_id" required>
            <option value="" style="display: none;" {{ old('user_id', optional($car)->user_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select user</option>
            @foreach ($users as $key => $user)
            <option value="{{ $user->id }}" {{ old('user_id', optional($car)->user_id) == $user->id ? 'selected' : '' }}>
                {{ $user->name }}
            </option>
            @endforeach
        </select>

        {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="form-group col-md-6 {{ $errors->has('type') ? 'has-error' : '' }}">
        <label for="model" class="control-label">@lang('global.car.fields.type')</label>
        {{-- <input class="form-control" name="model" type="text" id="model" value="{{ old('model', optional($car)->model) }}"
        minlength="1" placeholder="Enter model here...">
        {!! $errors->first('model', '<p class="help-block">:message</p>') !!} --}}
        <select class="input-main select2" name="type" id="type" required>
            <option value="" selected disabled>@lang('global.not_set')</option>
            <option value="Легковая" {{ old('type', optional($car)->type) == "Легковая" ? 'selected' : '' }}>Легковая</option>
            <option value="bus" {{ old('type', optional($car)->type) == "bus" ? 'selected' : '' }}>автобусе</option>
        </select>
    </div>
</div>
<div class="form-row">
    
    <div class="form-group col-md-6 {{ $errors->has('name') ? 'has-error' : '' }}">
        <label for="name" class="control-label">@lang('global.car.fields.brand')</label>
        {{-- <input class="form-control" name="name" type="text" id="name" value="{{ old('name', optional($car)->name) }}" minlength="1" maxlength="255" placeholder="Enter name here...">
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!} --}}
        <select class="input-main select2" name="name" id="car_name" required>
            <option value="" selected disabled>@lang('global.not_set')</option>
            @foreach ($brands as $item)
            <option value="{{ $item->name }}" data-brand-id="{{$item->id}}" @if (old('name', optional($car)->name) == $item->name){{'selected'}}@endif>
                {{ $item->name }}
            </option>
            @endforeach
        </select>
    </div>

    <div class="form-group col-md-6 {{ $errors->has('model') ? 'has-error' : '' }}">
        <label for="model" class="control-label">@lang('global.car.fields.model')</label>
        {{-- <input class="form-control" name="model" type="text" id="model" value="{{ old('model', optional($car)->model) }}"
        minlength="1" placeholder="Enter model here...">
        {!! $errors->first('model', '<p class="help-block">:message</p>') !!} --}}
        <select class="input-main select2" id="car_model" name="model">
            @include('includes.car_models')
        </select>
        {{-- <select class="input-main select2" name="model" id="model" required>
            <option value="" selected disabled>@lang('global.not_set')</option>
            @foreach ($models as $user)
            <option value="{{ $user->name }}" @if (old('model', optional($car)->model) == $user->name){{'selected'}}@endif>
                {{ $user->name }}
            </option>
            @endforeach
        </select> --}}
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-6 {{ $errors->has('color') ? 'has-error' : '' }}">
        <label for="color" class="control-label">@lang('global.car.fields.color')</label>
        {{-- <input class="form-control" name="color" type="text" id="color" value="{{ old('color', optional($car)->color) }}" minlength="1" placeholder="Enter color here...">
        {!! $errors->first('color', '<p class="help-block">:message</p>') !!} --}}
        <div class="section-select--input2 section-select--input__show"><span class="color_part"><div style="background-color: {{ old('color', optional($car)->color) }}">{{ old('color', optional($car)->color) }}</div></span>
            <input type="hidden" name="color" id="color" value="{{ old('color', optional($car)->color) }}" required>
            <div class="section-select--popup__icon">
                <svg class="icon icon-arrow-down-white ">
                    <use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#arrow-down-white')}}"></use>
                </svg>
            </div>
            <ul class="section-select--popup__list section-select--popup__list__show">
                <li class="section-select--popup__item3 hover-text-color click_color" data-type=''>@lang('global.not_set')</li>
            @foreach ($colors as $color)
                <li class="section-select--popup__item3 hover-text-color click_color" data-type="{{$color->color}}"><div style="background-color: {{$color->color}}">{{$color->color}}</div></li>
            @endforeach
            </ul>
        </div>
    </div>

    <div class="form-group col-md-6 {{ $errors->has('year') ? 'has-error' : '' }}">
        <label for="year" class="control-label">@lang('global.car.fields.year')</label>
        <input class="form-control" name="year" type="number" min="1900" max="2021" id="year" value="{{ old('year', optional($car)->year) }}" minlength="1" placeholder="Enter year here..." required>
        {!! $errors->first('year', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-6 {{ $errors->has('body_type') ? 'has-error' : '' }}">
        <label for="body_type" class="control-label">@lang('global.car.fields.body_type')</label>
        {{-- <input class="form-control" name="body_type" type="text" id="body_type" value="{{ old('body_type', optional($car)->body_type) }}" minlength="1" placeholder="Enter body type here...">
        {!! $errors->first('body_type', '<p class="help-block">:message</p>') !!} --}}
        <select class="input-main select2" name="body_type" id="body_type" required>
            <option value="" selected disabled>@lang('global.not_set')</option>
            <option value="Хэтчбек" @if (old('body_type', optional($car)->body_type) == 'Хэтчбек'){{'selected'}}@endif>Хэтчбек</option>
            <option value="Седан" @if (old('body_type', optional($car)->body_type) == 'Седан'){{'selected'}}@endif>Седан</option>
            <option value="Кабриолет" @if (old('body_type', optional($car)->body_type) == 'Кабриолет'){{'selected'}}@endif>Кабриолет</option>
            <option value="Универсал" @if (old('body_type', optional($car)->body_type) == 'Универсал'){{'selected'}}@endif>Универсал</option>
            <option value="Кроссовер" @if (old('body_type', optional($car)->body_type) == 'Кроссовер'){{'selected'}}@endif>Кроссовер</option>
            <option value="Минивен" @if (old('body_type', optional($car)->body_type) == 'Минивен'){{'selected'}}@endif>Минивен</option>
        </select>
    </div>
    <div class="form-group col-md-6 {{ $errors->has('number') ? 'has-error' : '' }}">
        <label for="number" class="control-label">@lang('global.car.fields.number')</label>
        <input class="form-control gogocar-car-number" name="number" type="text" id="number" value="{{ old('number', optional($car)->number) }}" placeholder="AA-9999-99" required>
        {!! $errors->first('number', '<p class="help-block">:message</p>') !!}
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
    });
</script>