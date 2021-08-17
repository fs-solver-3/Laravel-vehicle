
<div class="form-row {{ $errors->has('title') ? 'has-error' : '' }}">
    <div class="form-group col-md-12">
        <label for="title" class="control-label">@lang('global.permissions.fields.title')</label>
            <input class="form-control" name="title" type="text" id="title" value="{{ old('title', optional($permissions)->title) }}" minlength="1" maxlength="255" placeholder="Enter title here...">
            {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-row">
   <div class="form-group  col-md-12 {{ $errors->has('description') ? 'has-error' : '' }}">
        <label for="des" class="control-label">@lang('global.permissions.fields.description')</label>
            <textarea class="form-control" name="des" cols="50" rows="10" id="description" minlength="1" maxlength="1000" style="min-height: 100px">{{ old('description', optional($permissions)->des) }}</textarea>
            {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
    </div> 
</div>
<script src="{{asset('js/jquery-3.4.1.js')}}" type="text/javascript"></script>
<script src="{{asset('js/select2.full.min.js')}}" type="text/javascript"></script>
<script>
        $(document).ready(function(){
            $('.select2').select2();
        });

</script>