
<div class="form-row">
    <div class="form-group col-md-6 {{ $errors->has('name') ? 'has-error' : '' }}">
        <label for="name" class="control-label">@lang('global.users.fields.name')</label>
            <input class="form-control input-main" name="name" type="text" id="name" value="{{ old('name', optional($users)->name) }}" minlength="1" maxlength="255" placeholder="Enter name here..." required>
            {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>

    <div class="form-group col-md-6 {{ $errors->has('email') ? 'has-error' : '' }}">
        <label for="email" class="control-label">@lang('global.users.fields.email')</label>
        <input class="form-control input-main" name="email" type="email" id="email" value="{{ old('email', optional($users)->email) }}" placeholder="Enter email here..." required>
        {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-6 {{ $errors->has('phone') ? 'has-error' : '' }}">
        <label for="phone" class="control-label">@lang('global.users.fields.phone')</label>
        <input class="form- input-main" name="phone" type="text" id="phone" value="{{ old('phone', optional($users)->phone) }}" minlength="1" placeholder="Enter phone here..." required>
        {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
    </div>

    <div class="form-group col-md-6 {{ $errors->has('password') ? 'has-error' : '' }}">
        <label for="password" class="control-label">@lang('global.users.fields.password')</label>
            <input class="form-control input-main" name="password" type="password" id="password" placeholder="Enter password here..." >
            {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-6 {{ $errors->has('password') ? 'has-error' : '' }}">
        <label for="password" class="control-label">@lang('global.users.fields.password_confirm')</label>
            <input class="form-control validate input-main" name="password_confirm" type="password" id="password_confirm" placeholder="Enter Confirm password here..." >
            {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
    </div>

    <div class="form-group col-md-6 {{ $errors->has('role_id') ? 'has-error' : '' }}">
        <label for="role_id" class="control-label">@lang('global.users.fields.role')</label>
            <div class="section-select--input2 section-select--input__show"><span>Любой</span>
                <input type="hidden" value="5" id="role_id" name="role_id">
                <div class="section-select--popup__icon">
                    <svg class="icon icon-arrow-down-white ">
                        <use xlink:href="{{asset('static/img/svg/symbol/sprite.svg#arrow-down-white')}}"></use>
                    </svg>
                </div>
                <ul class="section-select--popup__list section-select--popup__list__show">
                    {{-- <li class="section-select--popup__item2 hover-text-color click_role" data-type="all">All</li> --}}
                    @foreach ($roles as $key => $role)
                        <li class="section-select--popup__item2 hover-text-color click_role" data-type="{{ $key }}">{{ $role }}</li>
                    @endforeach
                </ul>
            </div>
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-6">
            <input name="isVerified" type="hidden" value="0"  required>
            @if ($methods == 'edit')
                <input name="isVerified" type="checkbox" value="1" id="isVerified"  @if ($users->isVerified ) checked @endif>
            @else
                <input name="isVerified" type="checkbox" value="1" id="isVerified" checked>
            @endif

            {!! Form::label('isVerified', 'isVerified', ['class' => 'control-label checkbox-label']) !!}
            <p class="help-block"></p>
            @if($errors->has('cisVerified'))
                <p class="help-block">
                    {{ $errors->first('isVerified') }}
                </p>
            @endif
    </div>

    <div class="form-group col-md-6">
       
            <input name="active" type="hidden" value="0" required>
            @if ($methods == 'edit')
                <input name="active" type="checkbox" value="1" id="active"  @if ($users->active ) checked @endif>
            @else
                <input name="active" type="checkbox" value="1" id="active" checked>
            @endif
             {!! Form::label('active', 'active', ['class' => 'control-label checkbox-label']) !!}
            <p class="help-block"></p>
            @if($errors->has('active'))
                <p class="help-block">
                    {{ $errors->first('active') }}
                </p>
            @endif
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-12 {{ $errors->has('avatar') ? 'has-error' : '' }}">
            @if(Route::currentRouteName() == 'admin.users.edit')
                @if(is_null($users->avatar))
                    <img src="{{asset($users->avatar)}}" class="uploaded_image" style="max-width: 50px; display: none;">
                    @else    
                    <img src="{{asset($users->avatar)}}" class="uploaded_image" style="max-width: 50px;">
                @endif
             @else
                <img src="#" class="uploaded_image" style="max-width: 50px; display: none;">
            @endif
            <span class="btn delete-image btn-black">
                <input type="file" class="btn btn-black" name="upload_image" id="files" accept=".png, .jpg, .jpeg, .svg">
                <img src="{{asset('admin/attach.svg')}}" class="form-attach" style="max-width: 50px;">
                <span class="bold attach-text">@lang('global.upload') &nbsp @lang('global.users.fields.photo')</span>
                <input type="hidden" name="delete_image" id="delete_image">
            </span>
            @if(Route::currentRouteName() == 'admin.users.edit')
                <span class="btn remove btn-black">@lang('global.delete_image')</span>
            @endif
            {{-- <input type="file" name="upload_image">  --}}
            {!! $errors->first('avatar', '<p class="help-block">:message</p>') !!}
    </div>
</div>







<div id="password_rules" class="col-md-12">
    <h6>@lang('global.users.fields.password_requirements')</h6>
    <ul>
        <li class="password_length">@lang('global.users.fields.password_length')</li>
        <li class="password_uppercase">@lang('global.users.fields.password_uppercase')</li>
        <li class="password_number">@lang('global.users.fields.password_number')</li>
        <li class="password_match">@lang('global.users.fields.password_match')</li>
    </ul>
</div>
 @if(isset($teacher_edit))
    <input type="hidden" name="teacher_edit" value="{{ $teacher_edit }}">
 @endif
<script src="{{asset('js/jquery-3.4.1.js')}}" type="text/javascript"></script>
<script>
        $(document).ready(function(){
            $('.select2').select2();
        });

</script>
<script>
    $('#password_rules').hide();
        var all_pass = false;
        var validateInput = $('input.validate');
            
        function validateInputs() {
            // alert('test');
            $('#password_rules').show();
            var password = $('#password').val(),
                conf = $('#password_confirm').val(),
                all_pass = true;
                
            var uppercase = password.match(/[A-Z]/),
                number = password.match(/[0-9]/);

            if (password.length < 8) {
                $('.password_length').removeClass('complete');
                all_pass = false;
            } else $('.password_length').addClass('complete');

            if (uppercase) $('.password_uppercase').addClass('complete');
            else {
                $('.password_uppercase').removeClass('complete');
                all_pass = false;
            }
            
            if (number) $('.password_number').addClass('complete');
            else {
                $('.password_number').removeClass('complete');
                all_pass = false
            }


            if (password == conf && password != '') $('.password_match').addClass('complete');
            else {
                $('.password_match').removeClass('complete')
                all_pass = false;
            }
            return all_pass;
        }

    validateInput.on('input', validateInputs);
    
     $(document).ready(function(){
        
        if (window.File && window.FileList && window.FileReader) {
            $("#files").on("change", function(e) {
            var files = e.target.files,
                filesLength = files.length;
            for (var i = 0; i < filesLength; i++) {
                var f = files[i]
                var fileReader = new FileReader();
                fileReader.onload = (function(e) {
                var file = e.target;
                $('.uploaded_image').attr('src', e.target.result).show(); 
                });
                fileReader.readAsDataURL(f);
            }
            });
            $(".remove").click(function(){
                     $('.uploaded_image').hide(); 
                     $('#files').val('deleted_image');
                     $('#delete_image').val('delete');
                    // $(this).parent(".pip").remove();
                });
        } else {
            alert("Your browser doesn't support to File API")
        }
        
        $('.click_role').click(function () {
            var get_data = $(this).data('type');
            $('#role_id').val(get_data);
        });
    })
</script>
