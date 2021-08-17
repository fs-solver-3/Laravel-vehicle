<div class="form-row">

    <div class="form-group col-md-6 {{ $errors->has('name') ? 'has-error' : '' }}">

        <label for="name" class="control-label">@lang('global.demand_categories.fields.title')</label>
        <input class="input-main" name="name" type="text" id="name" value="{{ old('name', optional($demandCategory)->name) }}" minlength="1" maxlength="255" placeholder="Enter name here...">
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>

    <div class="form-group col-md-6 {{ $errors->has('grade') ? 'has-error' : '' }}">

        <label for="grade" class="control-label">@lang('global.demand_categories.fields.grade')</label>
        <input class="input-main" name="grade" type="text" id="grade" value="{{ old('name', optional($demandCategory)->grade) }}" minlength="1" maxlength="255" placeholder="Enter grade here...">
        {!! $errors->first('grade', '<p class="help-block">:message</p>') !!}
    </div>

</div>
<div class="form-row">

    <div class="form-group col-md-12 {{ $errors->has('description') ? 'has-error' : '' }}">

        <label for="description" class="control-label">@lang('global.demand_categories.fields.description')</label>
        <textarea class="input-main" name="description" cols="50" rows="10" id="description" minlength="1" maxlength="1000" style="min-height: 100px">{{ old('description', optional($demandCategory)->description) }}</textarea>

        {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-12 {{ $errors->has('user_id') ? 'has-error' : '' }}">
        <label for="user_id" class="control-label">@lang('global.demand_categories.fields.manager')</label>

        @if(Route::currentRouteName() == 'admin.demand_categories.create')
        <select class="input-main chosen-select select2" id="user_id" name="user_id[]" multiple placeholder="Учителя...">
            @foreach ($managers as $key => $manager)
            <option value="{{ $key }}">
                {{ $manager }}
            </option>
            @endforeach
        </select>
        @else
        {!! Form::select('user_id[]', $managers, old('manager') ? old('manager') : $demandCategory->manager->pluck('id')->toArray(), ['class' => 'input-main select2', 'multiple' => 'multiple', 'required' => '']) !!}

        @endif


        {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<script src="{{asset('js/jquery-3.4.1.js')}}" type="text/javascript"></script>
<script src="{{asset('js/select2.full.min.js')}}" type="text/javascript" defer></script>
<script>
    $(document).ready(function() {
        $('.select2').select2();
    });

</script>
