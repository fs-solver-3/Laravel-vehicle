<div class="personal-content--main">
    <div class="personal-content--header">
        <h3 class="personal-content--header--title">@lang('front.profile.mail_tab.mail_address')</h3>
    </div>
    <div class="personal-content--body">
        <div class="gogocar-ready-plan--covid personal-info-about-me">
            <div class="gogocar-gray-icons">
                <svg class="icon icon-info ">
                    <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#info') }}"></use>
                </svg>
            </div>
            <div class="gogocar-ready-plan--covid--info">
                <div class="gogocar-ready-plan--covid--title">@lang('front.profile.mail_tab.what_need').
                </div>
                <div class="gogocar-ready-plan--covid--desc">@lang('front.profile.mail_tab.your_mailing').</div>
            </div>
        </div>
        <div class="personal-mail--info">
            <div class="personal-mail--name__family">
                <div class="personal-mail--name mb-3">@lang('front.profile.mail_tab.name'): <span>{{Auth::user()->name}}</span></div>
                <div class="personal-mail--name">@lang('front.profile.mail_tab.last_name'): <span>{{Auth::user()->surname}}</span></div>
            </div>
            <form id="mailing_address_form" action="javascript:void(0)" enctype="multipart/form-data">
                <div class="col-xl-6 col-lg-6 mb-5 personal-add--car__wrap">
                    <div class="all-trip--popup__col personal-content--select">
                        <label>@lang('front.profile.mail_tab.please_enter'):</label>
                    <input class="gogocar-input--filter personal-content--input" type="text" placeholder="Адрес..." value="{{Auth::user()->mailing_address}}" name="mailing_address">
                    {{-- <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}"> --}}
                    </div>
                </div>
                <button class="gogocar-yellow-button m-0 gogocar-mobile-m-0-auto" id="change_email">Сохранить</button>
            </form>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#mailing_address_form').submit(function(e) {
            e.preventDefault();
 
            var formData = new FormData($("#mailing_address_form")[0]);
            var token = $("#token").val();
            $.ajax({
                type:'POST',
                headers: {
                    'X-CSRF-TOKEN': token
                },
                url: '{{ route("save_mailing_address", app()->getLocale()) }}',
                data: formData,
                cache:false,
                contentType: false,
                processData: false,
                success: (data) => {
                    if(data.state == 'success'){
                        $("#success_msg").css('display', 'block');
                        $('#success_msg_content').html('Mailing address has been updated successfully!');
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
