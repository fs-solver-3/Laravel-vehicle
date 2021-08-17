
<div class="form-row">
    <div class="form-group col-md-12 {{ $errors->has('name') ? 'has-error' : '' }}">
        <label for="name" class="control-label">@lang('global.support_levels.fields.title')</label>
        <input class="form-control" name="name" type="text" id="name" value="{{ old('name', optional($supportLevels)->name) }}" minlength="1" maxlength="255" placeholder="Enter name here...">
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-6 {{ $errors->has('reaction_time') ? 'has-error' : '' }}">
        <label for="reaction_time" class="control-label">@lang('global.support_levels.fields.reaction_time')</label>
        <input class="form-control" name="reaction_time" type="text" id="reaction_time" value="{{ old('reaction_time', optional($supportLevels)->reaction_time) }}" minlength="1" placeholder="Enter reaction time here...">
        {!! $errors->first('reaction_time', '<p class="help-block">:message</p>') !!}
    </div>

    <div class="form-group col-md-6 {{ $errors->has('default_answer') ? 'has-error' : '' }}">
        <label for="default_answer" class="control-label">@lang('global.support_levels.fields.default_answer')</label>
        @if(Route::currentRouteName() == 'admin.support_levels.create')
        <select class="form-control chosen-select select2" id="default_support_id" name="default_support_id" placeholder="Учителя...">
            @foreach ($managers as $key => $manager)
            <option value="{{ $key }}">
                {{ $manager }}
            </option>
            @endforeach
        </select>
        @else
        {!! Form::select('default_support_id', $managers, old('manager') ? old('manager') : $supportLevels->manager->pluck('id')->toArray(), ['class' => 'form-control select2', 'required' => '']) !!}
        @endif
        {!! $errors->first('default_answer', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-12 {{ $errors->has('description') ? 'has-error' : '' }}">
        <label for="description" class="control-label">@lang('global.support_levels.fields.description')</label>
        <textarea class="form-control" name="description" cols="50" rows="10" id="description" minlength="1" maxlength="1000" style="min-height: 100px">{{ old('description', optional($supportLevels)->description) }}</textarea>
        {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-12 {{ $errors->has('user_id') ? 'has-error' : '' }}">
        <label for="user_id" class="control-label">@lang('global.demand_categories.fields.manager')</label>

        @if(Route::currentRouteName() == 'admin.support_levels.create')
        <select class="form-control chosen-select select2" id="user_id" name="user_id[]" multiple placeholder="Учителя...">
            @foreach ($managers as $key => $manager)
            <option value="{{ $key }}">
                {{ $manager }}
            </option>
            @endforeach
        </select>
        @else
        {!! Form::select('user_id[]', $managers, old('manager') ? old('manager') : $supportLevels->manager->pluck('id')->toArray(), ['class' => 'form-control select2', 'multiple' => 'multiple', 'required' => '']) !!}
        @endif
        {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<script src="{{asset('js/jquery-3.4.1.js')}}" type="text/javascript"></script>
<script src="{{ url('adminlte/js') }}/select2.full.min.js" defer></script>
<script>
    $(document).ready(function() {
        $('.select2').select2();
    });
</script>