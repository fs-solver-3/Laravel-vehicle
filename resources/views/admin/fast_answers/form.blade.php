<div class="form-row">
    <div class="form-group col-sm-6 {{ $errors->has('name') ? 'has-error' : '' }}">
        <label for="name" class="control-label">@lang('global.fast_answers.fields.name')</label>
        <input class="form-control" name="name" type="text" id="name" value="{{ old('name', optional($fastAnswer)->name) }}" minlength="1" maxlength="255" placeholder="Enter name here...">
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>

    <div class="form-group col-sm-12 {{ $errors->has('description') ? 'has-error' : '' }}">
        <label for="description" class="control-label">@lang('global.fast_answers.fields.description')</label>
        <textarea class="form-control" name="description" cols="50" rows="10" id="description" minlength="1" maxlength="1000" style="min-height: 100px">{{ old('description', optional($fastAnswer)->description) }}</textarea>
        {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-row">
    <div class="form-group col-sm-6 {{ $errors->has('demand_category_id') ? 'has-error' : '' }}">
        <label for="demand_category_id" class="control-label">@lang('global.fast_answers.fields.demand_category_id')</label>
        <select class="form-control select2" id="demand_category_id" name="demand_category_id">
            <option value="" style="display: none;" {{ old('demand_category_id', optional($fastAnswer)->demand_category_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select demand category</option>
            @foreach ($demandCategories as $key => $demandCategory)
            <option value="{{ $key }}" {{ old('demand_category_id', optional($fastAnswer)->demand_category_id) == $key ? 'selected' : '' }}>
                {{ $demandCategory }}
            </option>
            @endforeach
        </select>

        {!! $errors->first('demand_category_id', '<p class="help-block">:message</p>') !!}
    </div>

    <div class="form-group col-sm-6 {{ $errors->has('link') ? 'has-error' : '' }}">
        <label for="link" class="control-label">Link</label>
        <input class="form-control" name="link" type="text" id="link" value="{{ old('link', optional($fastAnswer)->link) }}" minlength="1" placeholder="Enter link here...">
        {!! $errors->first('link', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<script src="{{asset('js/jquery-3.4.1.js')}}" type="text/javascript"></script>
<script>
    $(document).ready(function() {
        $('.select2').select2();
    });
</script>