
<div class="form-row">
    <div class="form-group col-md-12 {{ $errors->has('color') ? 'has-error' : '' }}">
        <label for="color" class="control-label">@lang('global.color.title')</label>
        <input class="form-control" name="color" type="text" id="color" value="{{ old('color', optional($colors)->color) }}" minlength="1" placeholder="Enter color here...">
        {!! $errors->first('color', '<p class="help-block">:message</p>') !!}
    </div>
</div>

