<div class="form-row">
    <div class="form-group col-md-12 {{ $errors->has('title') ? 'has-error' : '' }}">
        <label for="complain" class="control-label">@lang('global.complain.fields.title')</label>
        <input class="form-control" name="title" type="text" id="title" value="{{ old('title', optional($complains)->title) }}" minlength="1" placeholder="Enter complain title here...">
        {!! $errors->first('complain', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="form-group col-md-12 {{ $errors->has('title') ? 'has-error' : '' }}">
        <label for="des" class="control-label">@lang('global.complain.fields.text')</label>
        <textarea class="form-control" name="des" cols="50" rows="5" id="des" minlength="1" maxlength="1000" style="min-height: 100px">{{ old('des', optional($complains)->des) }}</textarea>
        {!! $errors->first('des', '<p class="help-block">:message</p>') !!}
    </div>
</div>

