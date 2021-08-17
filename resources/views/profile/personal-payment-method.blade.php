<div class="personal-content--main">
    <div class="personal-content--header">
        <h3 class="personal-content--header--title">@lang('front.profile.payment_method.payment')</h3>
    </div>
    <div class="personal-content--body">
        <div class="gogocar-ready-plan--covid personal-info-about-me">
            <div class="popup-input--money--logo" style="background-image:url('/static/img/general/cash/cash3.png');"></div>
            <div class="gogocar-ready-plan--covid--info">
                <div class="gogocar-ready-plan--covid--title">@lang('front.profile.payment_method.des').
                </div>
            </div>
        </div>
        <div class="personal-mail--info" style="margin-top: 20px">
            <form id="paypal-form" action="javascript:void(0)" enctype="multipart/form-data">
                <div class="col-xl-6 col-lg-6 mb-5 personal-add--car__wrap">
                    <div class="all-trip--popup__col personal-content--select">
                        <label>@lang('front.profile.payment_method.paypal_address')</label>
                        <input class="gogocar-input--filter personal-content--input" type="text" placeholder="Адрес..." value="@if(Auth::user()->paypal_email) {{Auth::user()->paypal_email}} @endif" name="paypal_email">
                        {{-- <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}"> --}}
                    </div>
                </div>
                <button class="gogocar-yellow-button m-0 gogocar-mobile-m-0-auto" id="change_email_2">@lang('front.profile.payment_method.save')</button>
            </form>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#paypal-form').submit(function(e) {
            e.preventDefault();

            var formData = new FormData($("#paypal-form")[0]);
            var token = $("#token").val();
            $.ajax({
                type: 'POST'
                , headers: {
                    'X-CSRF-TOKEN': token
                }
                , url: '{{ route("savePaypalemail")}}'
                , data: formData
                , cache: false
                , contentType: false
                , processData: false
                , success: (data) => {
                    if (data.state == 'success') {
                        $("#success_msg").css('display', 'block');
                        $('#success_msg_content').html("@lang('message.paypal_email_save')");
                    } else {
                        $('#popup-input-value').modal('show');
                    }
                }
                , error: function(data) {
                    console.log(data);
                }
            });
        });
    })
</script>
