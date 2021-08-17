
<div class="form-row">
    <div class="form-group col-sm-12 {{ $errors->has('user_id') ? 'has-error' : '' }}">
        <label for="user_id" class="control-label">@lang('global.transactions.fields.user')</label>
            <select class="form-control select2" id="user_id" name="user_id" required>
                <option value="" style="display: none;" {{ old('user_id', optional($transactions)->user_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select user</option>
                @foreach ($users as $key => $user)
                    <option value="{{ $key }}" {{ old('user_id', optional($transactions)->user_id) == $key ? 'selected' : '' }}>
                        {{ $user }}
                    </option>
                @endforeach
            </select>
            
            {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-row">
    <div class="form-group col-sm-6 {{ $errors->has('amount') ? 'has-error' : '' }}">
        <label for="amount" class="control-label">@lang('global.transactions.fields.amount')</label>
        <input class="form-control" name="amount" type="text" id="amount" value="{{ old('amount', optional($transactions)->amount) }}" minlength="1" placeholder="Enter amount here...">
        {!! $errors->first('amount', '<p class="help-block">:message</p>') !!}
    </div>

    <div class="form-group col-sm-6 {{ $errors->has('method') ? 'has-error' : '' }}">
        <label for="method" class="control-label">@lang('global.transactions.fields.method')</label>
        <input class="form-control" name="method" type="text" id="method" value="{{ old('method', optional($transactions)->method) }}" minlength="1" placeholder="Enter method here...">
        {!! $errors->first('method', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-row">

    <div class="form-group col-sm-6 {{ $errors->has('status') ? 'has-error' : '' }}">
        <label for="status" class="control-label">@lang('global.transactions.fields.status')</label>
        <select class="form-control select2" id="status" name="state">
            <option value="pendign">@lang('global.transactions.fields.pending')</option>
            <option value="reject">@lang('global.transactions.fields.reject')</option>
            <option value="complete">@lang('global.transactions.fields.complete')</option>
        </select>
        {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
    </div>
</div>
{{-- <div class="form-row">
    <div class="form-group col-sm-6 {{ $errors->has('passed') ? 'has-error' : '' }}">
        <label for="passed" class="control-label">@lang('global.transactions.fields.passed')</label>
            <input class="form-control" name="passed" type="text" id="passed" value="{{ old('passed', optional($transactions)->passed) }}" minlength="1" placeholder="Enter passed here...">
            {!! $errors->first('passed', '<p class="help-block">:message</p>') !!}
        </div>
</div> --}}
<script src="{{asset('js/jquery-3.4.1.js')}}" type="text/javascript"></script>
<script src="{{asset('js/select2.full.min.js')}}" defer type="text/javascript"></script>
<script>
        $(document).ready(function(){
            $('.select2').select2();
            $('#user_id').select2({
                minimumInputLength: 1,
                ajax: {
                    url: '{{ route("api.users.search") }}',
                    dataType: 'json',
                    },
            });
        });

</script>