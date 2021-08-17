

{{--  --}}
<div class="form-row">

    <div class="form-group col-md-6 {{ $errors->has('name') ? 'has-error' : '' }}">

        <label for="name" class="control-label">@lang('global.demand_categories.fields.title')</label>
        <input class="form-control" name="name" type="text" id="name" value="{{ old('name', optional($demandComplexity)->name) }}" minlength="1" maxlength="255" placeholder="Enter name here...">
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>

    <div class="form-group col-md-6 {{ $errors->has('grade') ? 'has-error' : '' }}">

        <label for="grade" class="control-label">@lang('global.demand_categories.fields.grade')</label>
        <input class="form-control" name="grade" type="text" id="grade" value="{{ old('name', optional($demandComplexity)->grade) }}" minlength="1" maxlength="255" placeholder="Enter grade here...">
        {!! $errors->first('grade', '<p class="help-block">:message</p>') !!}
    </div>

</div>
<div class="form-row">

    <div class="form-group col-md-12 {{ $errors->has('description') ? 'has-error' : '' }}">

        <label for="description" class="control-label">@lang('global.demand_categories.fields.description')</label>
        <textarea class="form-control" name="description" cols="50" rows="10" id="description" minlength="1" maxlength="1000" style="min-height: 100px">{{ old('description', optional($demandComplexity)->description) }}</textarea>

        {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<script src="{{asset('js/jquery-3.4.1.js')}}" type="text/javascript"></script>
<script>
    $(document).ready(function() {
        $('.select2').select2();
    });
</script>
