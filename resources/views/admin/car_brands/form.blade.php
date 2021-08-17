
<div class="form-row">
    <div class="form-group col-md-12 {{ $errors->has('name') ? 'has-error' : '' }}">
        <label for="name" class="control-label">@lang('global.car_brand.fields.name')</label>
        <input class="form-control" name="name" type="text" id="name" value="{{ old('name', optional($car)->name) }}" minlength="1" maxlength="255" placeholder="Enter name here...">
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>

    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 section-input-wrap">
        <div class="checkbox-input--tab__item">
            <div class="checkbox-input @if(old('popular', optional($car)->popular) == true) {{ 'checked' }} @endif"></div>
            <input class="checkbox-input--tab" type="checkbox" name="popular" id="popular" @if(old('popular',
                optional($car)->popular) == true) {{ 'checked' }} @endif><span>@lang('global.car_brand.fields.popular')</span>
        </div>
    </div>
</div>