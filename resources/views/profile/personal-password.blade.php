<div class="personal-content--main">
    <div class="personal-content--header">
        <h3 class="personal-content--header--title">@lang('front.profile.password_tab.password')</h3>
    </div>
    <div class="personal-content--body">
        <div class="personal-password--list">
            <div class="personal-add--car--title">@lang('front.profile.password_tab.change_password')</div>
            <div class="personal-add--car--desc">@lang('front.profile.password_tab.if')
            </div>
            <form id="reset_password_form" action="javascript:void(0)" enctype="multipart/form-data">
                <div class="personal-password-zone row">
                    <div class="col-xl-4 col-lg-4 pl-0 all-trip--popup__col gogocar-personal-pass">
                        <label>@lang('front.profile.password_tab.current_password'):</label>
                        <input class="gogocar-input--filter personal-content--input" type="password" name="old_password">
                    </div>
                    <div class="col-xl-4 col-lg-4 all-trip--popup__col gogocar-personal-pass">
                        <label>@lang('front.profile.password_tab.new_password'):</label>
                        <input class="gogocar-input--filter personal-content--input" type="password" name="new_password">
                    </div>
                    <div class="col-xl-4 col-lg-4 pr-0 all-trip--popup__col gogocar-personal-pass">
                        <label>@lang('front.profile.password_tab.confirm'):</label>
                        <input class="gogocar-input--filter personal-content--input" type="password" name="confirm_password">
                    </div>
                    {{-- <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}"> --}}
                </div>
                <button class="gogocar-yellow-button m-0">@lang('front.profile.car_tab.save')</button>
            </form>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#reset_password_form').submit(function(e) {
            e.preventDefault();
 
            var formData = new FormData($("#reset_password_form")[0]);
            var token = $("#token").val();
            $.ajax({
                type:'POST',
                headers: {
                    'X-CSRF-TOKEN': token
                },
                url: '{{ route("reset_password", app()->getLocale()) }}',
                data: formData,
                cache:false,
                contentType: false,
                processData: false,
                success: (data) => {
                    if(data.state == 'success'){
                        $("#success_msg").css('display', 'block');
                        $('#success_msg_content').html('The password has been changed successfully!');
                    }
                    else{
                        $('#popup-input-value').modal('show');
                    }
                },
                error: function(data){
                    console.log(data);
                }
            });
        });
    })
</script>