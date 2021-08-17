<div class="form-row">
    <div class="form-group col-md-12 {{ $errors->has('title') ? 'has-error' : '' }}">
        <label for="title" class="control-label">@lang('global.roles.fields.title')</label>
            <input class="form-control" name="title" type="text" id="title" value="{{ old('title', optional($roles)->title) }}" minlength="1" maxlength="255" placeholder="Enter title here...">
            {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-12">
        <label for="title" class="control-label">@lang('global.roles.fields.permission')*</label>
        @if ($methods == 'create')
        {!! Form::select('permission[]', $permissions, old('permission'), ['class' => 'form-control select2', 'multiple' => 'multiple']) !!}
        @else
        {!! Form::select('permission[]', $permissions, old('permission') ? old('permission') : $roles->permission->pluck('id')->toArray(), ['class' => 'form-control select2', 'multiple' => 'multiple']) !!}
        @endif           
        <p class="help-block"></p>
        @if($errors->has('permission'))
            <p class="help-block">
                {{ $errors->first('permission') }}
            </p>
        @endif
    </div>
</div>
