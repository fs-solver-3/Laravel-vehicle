
<div class="form-row">
    <div class="form-group col-md-12 {{ $errors->has('reason') ? 'has-error' : '' }}">
        <label for="reason" class="control-label">@lang('global.reason.title')</label>
        <input class="form-control" name="text" type="text" id="reason" value="{{ old('reason', optional($reason)->text) }}" minlength="1" placeholder="Enter reason here...">
        {!! $errors->first('reason', '<p class="help-block">:message</p>') !!}
    </div>
</div>

