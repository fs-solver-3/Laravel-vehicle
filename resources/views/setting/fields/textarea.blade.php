<div class="form-group {{ $errors->has($field['name']) ? ' has-error' : '' }}  {{ array_get( $field, 'class') }}">
    <label for="{{ $field['name'] }}">{{ $field['label'] }}</label>
    <textarea
           name="{{ $field['name'] }}"
           class="form-control"
           id="{{ $field['name'] }}"
           placeholder="{{ $field['label'] }}">{{ old($field['name'], Helper::setting($field['name'])) }}
    </textarea>

    @if ($errors->has($field['name'])) <small class="help-block">{{ $errors->first($field['name']) }}</small> @endif
</div>