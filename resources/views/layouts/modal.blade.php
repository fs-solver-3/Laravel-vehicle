<div class="modal fade" id="popup-login" tabindex="-1" role="dialog" aria-labelledby="popup-login" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered popup-modal--wrap" role="document">
        <div class="modal-content popup-content">
            <div class="popup-header">
                <div class="popup-modal-close close" data-dismiss="modal" aria-label="Close">
                    <svg class="icon icon-close ">
                        <use
                            xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#close') }}">
                        </use>
                    </svg>
                </div>
                <h3 class="popup-title">@lang('front.modal.login')</h3>
            </div>
            <form class="popup-inputs--wrapper">
                <div class="error-block">
                    <span class="invalid-feedback" role="alert">
                        <strong></strong>
                    </span>
                </div>
                 @if(Session::has('error_message'))
                    <div class="error-block">
                        <span class="invalid-feedback" role="alert" style="display: block">
                            <strong> {!! session('error_message') !!}</strong>
                        </span>
                    </div>
                 @endif
                <span class="invalid-feedback" role="alert" id="login-email-error">
                    <strong></strong>
                </span>
                <div class="popup-input--wrapper">
                    <div class="popup-input-icon gogocar-gray-icons">
                        <svg class="icon icon-email ">
                            <use
                                xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#email') }}">
                            </use>
                        </svg>
                    </div>
                    <input class="popup-input gogocar-input-v1" type="email" name="email" placeholder="Email">
                </div>
                <span class="invalid-feedback" role="alert" id="login-password-error">
                    <strong></strong>
                </span>
                <div class="popup-input--wrapper">
                    <div class="popup-input-icon gogocar-gray-icons showpasswordlink" data-id="password">
                        <svg class="icon icon-key ">
                            <use
                                xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#key') }}">
                            </use>
                        </svg>
                    </div>
                    <input class="popup-input gogocar-input-v1" id="password" type="password" name="password" placeholder="Пароль">
                    <a href="#" class="show_ps showpasswordlink" data-id="password" style="color: #fff;position: absolute;z-index: 1;right: 20px;top: 20px;">
                        <img class="viaible" src="{{asset('images/visibility.svg')}}" alt="key">
                        <img class="inviaible" src="{{asset('images/invisible.svg')}}" alt="key">
                    </a>
                </div>
                <div class="popup-checkbox-remember">
                    <input id="popup-checkbox-remember" name="remember" type="checkbox">
                    <label for="popup-checkbox-remember">@lang('front.modal.remember_me')</label>
                </div>
                <button class="gogocar-yellow-button" type="submit" id="login_btn" onclick="ym(67411513,'reachGoal','login'); return true;">Войти</button>
                <div class="forgot_password">
                    <a href="#" id="forget_password" class="text-center">@lang('front.sign_modal.forget_password')</a>
                </div>
            </form>
            <div class="popup-login-social--wrap">
                <h3 class="popup-title-light">@lang('front.modal.orsign'):</h3>
                <div class="popup-login-social">
                    <div class="gogocar-gray-icons">
                        <div class="popup-social--block">
                            <a href="{{url('/auth/facebook')}}">
                                <svg class="icon icon-facebook ">
                                    <use
                                        xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#facebook') }}">
                                    </use>
                                </svg>
                            </a>
                        </div>
                    </div>
                    <div class="gogocar-gray-icons">
                        <div class="popup-social--block">
                            <a href="{{url('/auth/vk')}}">
                            <svg class="icon icon-vk ">
                                <use
                                    xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#vk') }}">
                                </use>
                            </svg>
                            </a>
                        </div>
                    </div>
                    <div class="gogocar-gray-icons">
                        <div class="popup-social--block">
                            <a href="{{url('/auth/google')}}">
                                <svg class="icon icon-google ">
                                    <use
                                        xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#google') }}">
                                    </use>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="popup-register-login">@lang('front.modal.not_with')? 
            <div class="popup-register--link popup-reg--link" data-toggle="modal" data-target="#popup-register">
                @lang('front.modal.register')!</div>
        </div>
    </div>
</div>
<div class="modal fade" id="popup-register" tabindex="-1" role="dialog" aria-labelledby="popup-login"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered popup-modal--wrap" role="document">
        <div class="modal-content popup-content">
            <div class="popup-header">
                <div class="popup-modal-close close" data-dismiss="modal" aria-label="Close">
                    <svg class="icon icon-close ">
                        <use
                            xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#close') }}">
                        </use>
                    </svg>
                </div>
                <h3 class="popup-title">@lang('front.modal.registration')</h3>
            </div>
            <form class="popup-inputs--wrapper" id="register-block">
                <div class="error-blocks" id="register-error-block">
                    <div class="error-block">
                        <span class="invalid-feedback email" role="alert">
                            <strong></strong>
                        </span>
                    </div>
                    <div class="error-block">
                        <span class="invalid-feedback password" role="alert">
                            <strong></strong>
                        </span>
                    </div>
                    <div class="error-block">
                        <span class="invalid-feedback password_equal" role="alert">
                            <strong></strong>
                        </span>
                    </div>
                    <div class="error-block">
                        <span class="invalid-feedback common" role="alert">
                            <strong></strong>
                        </span>
                    </div>
                    <div class="error-block">
                        <span class="invalid-feedback phone" role="alert">
                            <strong></strong>
                        </span>
                    </div>
                </div>
                <div class="popup-input--wrapper">
                    <div class="popup-input-icon gogocar-gray-icons">
                        <svg class="icon icon-email ">
                            <use
                                xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#email') }}">
                            </use>
                        </svg>
                    </div>
                    <input class="popup-input gogocar-input-v1" id="email_input" type="email" name="email" placeholder="Email" required>
                </div>
                <span class="invalid-feedback" role="alert" id="email-error">
                    <strong></strong>
                </span>
                <div class="gogocar-select-country--wrap gogocar-select-country--wrap--reg">
                    <div class="gogocar-select-country-reg popup-input--wrapper">
                        <div class="gogocar-select-country--flag--wrap">
                            <div class="gogocar-select-country--flag"
                                style="background-image:url('{{ asset('static/img/general/lang/uz.png') }}');">
                            </div>
                            <div class="gogocar-select-country--name">UZ</div>
                        </div>
                        <svg class="icon icon-arrow-right ">
                            <use
                                xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#arrow-right') }}">
                            </use>
                        </svg>
                        <ul class="gogocar-select-country__list-reg">
                            <li class="gogocar-select-country__item" data-mask-phone="(+900 00) 000-00-00"
                                data-placeholder="(+998-90) ___-__-__">
                                <div class="gogocar-select-country__item--flag"
                                    style="background-image:url('{{ asset('static/img/general/lang/uz.png') }}');">
                                </div>
                                <div class="gogocar-select-country__item--name">UZ</div>
                            </li>
                            <li class="gogocar-select-country__item" data-mask-phone="+7 (000) 000-00-00"
                                data-placeholder="+7 (000) ___-__-__">
                                <div class="gogocar-select-country__item--flag"
                                    style="background-image:url('{{ asset('static/img/general/lang/ru.png') }}');">
                                </div>
                                <div class="gogocar-select-country__item--name">RU</div>
                            </li>
                        </ul>
                    </div>
                    <div class="popup-input--wrapper">
                        <div class="popup-input-icon gogocar-gray-icons">
                            <svg class="icon icon-phone ">
                                <use
                                    xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#phone') }}">
                                </use>
                            </svg>
                        </div>
                        <input class="popup-input gogocar-input-v1 mask-phone-choise" type="tel" name="phone"
                            placeholder="(+998-90) ___-__-__" required minlength="18" id="phone_input">
                    </div>
                </div>
                <span class="invalid-feedback" role="alert" id="phone-error">
                    <strong></strong>
                </span>
                <div class="popup-input--wrapper">
                    <div class="popup-input-icon gogocar-gray-icons showpasswordlink" data-id="password_confirm">
                        <svg class="icon icon-key ">
                            <use
                                xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#key') }}">
                            </use>
                        </svg>
                    </div>
                    <input class="popup-input gogocar-input-v1 popup-eye-status" type="password" placeholder="Пароль" id="password_register"
                        name="password" psswd-shown="false">
                    {{-- <a href="#" class="show_ps showpasswordlink" data-id="password_confirm" style="color: #fff;position: absolute;z-index: 1;right: 20px;top: 20px;">
                        <img class="viaible" src="{{asset('images/visibility.svg')}}" alt="key">
                        <img class="inviaible" src="{{asset('images/invisible.svg')}}" alt="key">
                    </a> --}}
                    <div class="popup-show-pass">
                        <svg class="icon icon-eye ">
                            <use
                                xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#eye') }}">
                            </use>
                        </svg>
                    </div>
                </div>
                <span class="invalid-feedback" role="alert" id="password-error">
                    <strong></strong>
                </span>
                <div class="popup-input--wrapper">
                    <div class="popup-input-icon gogocar-gray-icons">
                        <svg class="icon icon-key ">
                            <use
                                xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#key') }}">
                            </use>
                        </svg>
                    </div>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input class="popup-input gogocar-input-v1 popup-eye-status" type="password" id="password_confirm"
                        name="password_confirm" placeholder="Повторите пароль" psswd-shown="false" required>

                    <div class="popup-show-pass">
                        <svg class="icon icon-eye ">
                            <use
                                xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#eye') }}">
                            </use>
                        </svg>
                    </div>
                </div>
                <div class="gogocar-yellow-button gogocar-active-reg" id="register-btn">@lang('front.modal.next')</div>
                 <div class="popup-login-social--wrap">
                     <h3 class="popup-title-light">@lang('front.modal.orsign'):</h3>
                     <div class="popup-login-social">
                         <div class="gogocar-gray-icons">
                             <div class="popup-social--block">
                                 <a href="{{url('/auth/facebook')}}">
                                     <svg class="icon icon-facebook ">
                                         <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#facebook') }}">
                                         </use>
                                     </svg>
                                 </a>
                             </div>
                         </div>
                         <div class="gogocar-gray-icons">
                             <div class="popup-social--block">
                                 <a href="{{url('/auth/vk')}}">
                                    <svg class="icon icon-vk ">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#vk') }}">
                                        </use>
                                    </svg>
                                 </a>
                             </div>
                         </div>
                         <div class="gogocar-gray-icons">
                             <div class="popup-social--block">
                                <a href="{{ url('auth/google') }}" >
                                    <svg class="icon icon-google ">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#google') }}">
                                        </use>
                                    </svg>
                                </a>
                             </div>
                         </div>
                     </div>
                 </div>
                <!-- <div class="button_container">

            <div class="text-center">
                <button type="submit" class="button" id="register-btn">
                @lang('front.sign_modal.title')
                </button>
            </div>
            <p>@lang('front.sign_modal.by_register') <a href="#">>@lang('front.sign_modal.terms')</a></p>
        </div> -->
            </form>
        </div>
        <div class="popup-register-login">@lang('front.modal.i_already')? 
            <div class="popup-register--link popup-login--link" id="login-now" data-toggle="modal" data-target="#popup-login">@lang('front.modal.login')!
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="popup-reg-active" tabindex="-1" role="dialog" aria-labelledby="popup-login"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered popup-modal--wrap" role="document">
        <div class="modal-content popup-content">
            <div class="popup-header">
                <div class="popup-modal-close close" data-dismiss="modal" aria-label="Close">
                    <svg class="icon icon-close ">
                        <use
                            xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#close') }}">
                        </use>
                    </svg>
                </div>
                <h3 class="popup-title">@lang('front.modal.confirmation_code')</h3>
                <p class="popup-desc">@lang('front.modal.to_number') <span id="phone_txt"></span> @lang('front.modal.a_code_was_sent'):</p>
            </div>
            <form class="popup-inputs--wrapper" id="verify-block">
                <div class="error-block">
                    <span class="invalid-feedback" role="alert">
                        <strong></strong>
                    </span>
                </div>
                <div class="popup-active-reg">
                    <input class="popup-active-reg--input" type="text" name="verification_code1" name="verification_code1" maxlength="1"
                        placeholder="_">
                    <input class="popup-active-reg--input" type="text" name="verification_code2" maxlength="1"
                        placeholder="_">
                    <input class="popup-active-reg--input" type="text" name="verification_code3" maxlength="1"
                        placeholder="_">
                    <input class="popup-active-reg--input" type="text" name="verification_code4" maxlength="1"
                        placeholder="_">
                </div>
                <div class="popup-active-reg--again" id="send_sms_again">@lang('front.modal.resend')</div>
                <button class="gogocar-yellow-button" type="submit" id="verify-btn">@lang('front.modal.confirm')</button>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="popup-cargo-type" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered popup-modal--wrap modal-970" role="document">
        <div class="modal-content popup-content">
            <div class="popup-header">
                <div class="popup-modal-close close" data-dismiss="modal" aria-label="Close">
                    <svg class="icon icon-close ">
                        <use
                            xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#close') }}">
                        </use>
                    </svg>
                </div>
                <h3 class="main-section--title text-center mb-5">@lang('front.modal.types') <span>@lang('front.modal.cargo')</span></h3>
            </div>
            <ul class="popup-gogocar-type-cargo row mb-4">
                @isset($cargotypes)
                @if(count($cargotypes) != 0)
                @foreach ($cargotypes as $item)
                <li class="col-xl-6 col-sm-12 popup-gogocar-type-cargo--item__wrap">
                    <div class="popup-gogocar-type-cargo--item">
                        <div class="popup-gogocar-cargo--checkbox"></div><span>{{$item->type_name}}</span>
                    </div>
                </li>
                @endforeach
                @endif
                @endisset
            </ul>
            <div class="popup-buttons-ok-close">
                <div class="gogocar-yellow-button type-cargo-choise mr-5" data-dismiss="modal" aria-label="Close">
                    @lang('front.modal.confirm')</div>
                <div class="gogocar-gray-button" data-dismiss="modal" aria-label="Close">@lang('front.modal.cancel')</div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="popup-del-msg" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered popup-modal--wrap" role="document">
        <div class="modal-content popup-content">
            <div class="popup-covid--wrap popup-del-msg">
                <h3 class="main-section--title--v2 font-size-25 mb-5">@lang('front.modal.delete_messages')?</h3>
                <div class="delete-chat-msg">
                    <div class="delete-choise-chat-msg gogocar-red-button" data-dismiss="modal" aria-label="Close">
                        @lang('front.modal.delete')</div>
                    <div class="gogocar-gray-button" data-dismiss="modal" aria-label="Close">@lang('front.modal.cancel')</div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="forget_window" tabindex="-1" role="dialog" aria-labelledby="popup-login" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered popup-modal--wrap" role="document">
        <div class="modal-content popup-content">
            <div class="popup-header">
                <div class="popup-modal-close close" data-dismiss="modal" aria-label="Close">
                    <svg class="icon icon-close ">
                        <use
                            xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#close') }}">
                        </use>
                    </svg>
                </div>
                <h3 class="popup-title">@lang('front.modal.forgot_password')</h3>
            </div>
            <p id="forget_message">@lang('front.modal.enter_your_email').</p>
            <form class="m-t" role="form" method="POST"
                action="{{ route('password.email', app()->getLocale()) }}">
                {{ csrf_field() }}
                <div class="error-block">
                    <span class="invalid-feedback" role="alert">
                        <strong></strong>
                    </span>
                </div>
                <div class="popup-input--wrapper">
                    <div class="popup-input-icon gogocar-gray-icons">
                        <svg class="icon icon-email ">
                            <use
                                xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#email')}}">
                            </use>
                        </svg>
                    </div>
                    <input class="popup-input gogocar-input-v1" type="email" id="forget_email_address" name="email"
                        placeholder="Email address" value="{{ old('email') }}" autocomplete="email"
                        required autofocus>
                </div>
                <button class="gogocar-yellow-button" type="submit">@lang('front.modal.send_new_password')</button>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="popup-reg-active-phone" tabindex="-1" role="dialog" aria-labelledby="popup-login"
  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered popup-modal--wrap" role="document">
      <div class="modal-content popup-content">
          <div class="popup-header">
              <div class="popup-modal-close close" data-dismiss="modal" aria-label="Close">
                  <svg class="icon icon-close ">
                      <use
                          xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#close') }}">
                      </use>
                  </svg>
              </div>
              <h3 class="popup-title">@lang('front.modal.confirmation_code')</h3>
              <p class="popup-desc">@lang('front.modal.to_number') <span id="phone_txt"></span> @lang('front.modal.a_code_was_sent'):</p>
          </div>
          <form class="popup-inputs--wrapper" id="verify-block-profile">
              <div class="error-block">
                  <span class="invalid-feedback" role="alert">
                      <strong></strong>
                  </span>
              </div>
              <div class="popup-active-reg">
                  <input class="popup-active-reg--input" type="text" name="verification_code1" name="verification_code1" maxlength="1"
                      placeholder="_">
                  <input class="popup-active-reg--input" type="text" name="verification_code2" maxlength="1"
                      placeholder="_">
                  <input class="popup-active-reg--input" type="text" name="verification_code3" maxlength="1"
                      placeholder="_">
                  <input class="popup-active-reg--input" type="text" name="verification_code4" maxlength="1"
                      placeholder="_">
              </div>
              <div class="popup-active-reg--again" id="send_sms_again">@lang('front.modal.resend')</div>
              <button class="gogocar-yellow-button" type="submit" id="verify-btn2">@lang('front.modal.confirm')</button>
          </form>
      </div>
  </div>
</div>
@if(Session::has('error_message'))
<script>
    $('#popup-login').modal('show')
</script>
@endif

<script>
    function showpassword(x) {
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
    $(".showpasswordlink").click(function(e){
        id = $(this).data('id');
        var x = document.getElementById(id);
        $(this).toggleClass("show_password");
        showpassword(x);
    })

    $(".popup-active-reg--input").keyup(function () {
        if (this.value.length == this.maxLength) {
        $(this).next('.popup-active-reg--input').focus();
        }
    });

    var all_pass = false;
    var password_equal = false;
    var phone_valid = false;

    function check_email_address(email_address) {
        let email_reg_exp =
            /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return (email_reg_exp.test(email_address));
    }

    function validateInputs() {
        $('#password_rules').show();
        var password = $('#password_register').val(),
            conf = $('#password_confirm').val();
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


        if (password == conf && password != ''){
            password_equal = true;
            $('.password_match').addClass('complete');
        }
        else {
            $('.password_match').removeClass('complete')
            password_equal = false;
        }
    }
    // validatePhone('333');
    function validatePhone(inputtxt)
    {
        var phoneno = /^\+[0-9]{1,3}\.[0-9]{4,14}(?:x.+)?$/;
        if(inputtxt.length > 10){
            phone_valid = true;
        }
        else{
            phone_valid = false;
        }
    }

    function validateAll(){
        if (all_pass && password_equal && phone_valid) {
            $('#register-error-block span').hide();
        }
    }

    $('#popup-register #email_input').change(function(){
        var email = $("#popup-register  input[name=email]").val();
        if (check_email_address(email)) {
            $('#register-error-block span.email').hide();
        }
        else{
            $('#register-error-block span.email').html("@lang('message.input_email')");
            $('#register-error-block span.email').show();
        }
        validateAll();
    })

    $('#popup-register #password_confirm').change(function(){
        validateInputs();
        if(password_equal == false){
            $('#register-error-block span.password_equal').html("@lang('message.equal_password')");
            $('#register-error-block span.password_equal').show();
        }
        else{
            $('#register-error-block span.password_equal').hide();
        }
        validateAll();
    })

    $('#popup-register #password_register').change(function(){
        validateInputs();
        if(all_pass == false){
            $('#register-error-block span.password').html("@lang('message.valid_password')");
            $('#register-error-block span.password').show();
        }
        else{
            $('#register-error-block span.password').hide();
        }
        validateAll();
    })

    $('#popup-register #phone_input').change(function(){
        var phone = $("#popup-register  input[name=phone]").val();
        validatePhone(phone);
        console.log('phone222', phone_valid);
        if(phone_valid == false){
            $('#register-error-block span.phone').html("@lang('message.invalaid_phone')");
            $('#register-error-block span.phone').show();
        }
        else{
            $('#register-error-block span.phone').hide();
        }
        validateAll();
    })

    var validateInput = $('input.validate');

    $('#password_rules').hide();

    validateInput.on('input', validateInputs);

    $("#register-btn").click(function (e) {
        e.preventDefault();
        validateInputs();
        var password = $("#popup-register  input[name=password]").val();
        var password_confirm = $("#popup-register  input[name=password_confirm]").val();
        var email = $("#popup-register  input[name=email]").val();
        var phone = $("#popup-register  input[name=phone]").val();
        var token = $("#popup-register  input[name=_token]").val();
        if (check_email_address(email)) {
            all_pass = true;
        } else {
            all_pass = false;
        }

        if(phone == ""){
            phone_valid = false;
        }
        console.log(all_pass, password_equal, phone_valid);

        if (all_pass && password_equal && phone_valid) {
            $.ajax({
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': token
                },
                url: '{{ route("register_2", app()->getLocale()) }}',
                data: {
                    password: password,
                    email: email,
                    phone: phone,
                    password_confirm: password_confirm,
                    token: token
                },
                success: function (data) {
                    // alert(data);
                    if (data.state == 'success') {
                        $('#popup-register').modal('hide');
                        $('#popup-reg-active').modal('show');
                        $("#phone_txt").text(phone);
                    } else {
                        // console.log(JSON.parse(data.errors));
                        $('#register-block .error-block span.common').html(data);
                        $('#register-block .error-block span.common').show();
                    }
                },
                error: function (XMLHttpRequest, textStatus, errorThrown) {
                    var message = XMLHttpRequest.responseText;
                    error_message = JSON.parse(message).errors;
                    console.log(error_message);
                    $('.error-block span.common').html(error_message);
                    if (error_message) {
                        error_email = error_message.email ? error_message.email : "";
                        error_password = error_message.password ? error_message.password : "";
                        error_phone = error_message.phone ? error_message.phone : "";
                        var error_texts = error_email + error_password + error_phone;
                        console.log(error_texts);
                        // $('.error-block span strong').html(error_texts);
                        // $('.error-block .invalid-feedback').show();
                        if (error_email != "") {
                            $('#register-error-block span.email').html("@lang('message.email_unique')");
                            $('#register-error-block span.email').show();
                        } else {
                            $('#register-error-block span.email').hide();
                        }
                        
                        if (error_phone != "") {
                            $('#register-error-block span.email').html("@lang('message.existing_phone_number')");
                            $('#register-error-block span.email').show();
                        } else {
                            $('#phone-error').hide();
                        }
                    }
                }

            });
        }
        else{
            $('#register-error-block span.common').html("@lang('message.input_valid_all')");
            $('#register-error-block span.common').show(); 
        }
    });

    $("#login_btn").click(function (e) {
        e.preventDefault();
        var password = $("#popup-login input[name=password]").val();
        var email = $("#popup-login input[name=email]").val();
        var remember = $('#popup-checkbox-remember').is(":checked");
        var token = $("#popup-register  input[name=_token]").val();
        $.ajax({
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': token
            },
            url: '{{ route("login", app()->getLocale()) }}',
            data: {
                password: password,
                email: email,
                remember: remember,
                token: token
            },
            success: function (data) {
                // alert(data);
                if (data.state == 'login') {
                    var url = "{{ route('profile', ['locale' => app()->getLocale(), 'tab' => 'personal_data']) }}";
                    var current_page = $('#current_page').val();
                    if(current_page == 'home'){
                        window.location.replace(url);
                    }else{
                        window.location.reload();
                    }
                } else if (data.state == 'admin_login') {
                    // console.log(JSON.parse(data.errors));
                    var url =
                        "{{ route('admin.users.index', app()->getLocale()) }}";
                    window.location.replace(url);
                } else if (data.state == 'verify') {
                    $('#popup-reg-active').modal('show');
                } else if (data.state == 'block') {
                    $('#popup-login .error-block span strong').html("@lang('message.account_close')");
                    $('#popup-login .error-block span').show();
                } else {
                    $('#popup-login .error-block span strong').html("@lang('message.invalid_email_or_password')");;
                    $('#popup-login .error-block span').show();
                }
            },
            error: function (XMLHttpRequest, textStatus, errorThrown) {
                var message = XMLHttpRequest.responseText;
                error_message = JSON.parse(message).errors;
                $('.error-block span strong').html(error_message);
                if (error_message) {

                    let error_email = error_message.email ? error_message.email : "";
                    let error_password = error_message.password ? error_message.password : "";
                    let error_phone = error_message.phone ? error_message.phone : "";
                    var error_texts = error_email + error_password;
                    // $('.error-block span strong').html(error_texts);
                    // $('.error-block .invalid-feedback').show();
                    if (error_email != "") {
                        $('#login-email-error').show();
                        $('#login-email-error strong').html(error_email).show();
                    } else {
                        $('#login-email-error').hide();
                    }
                    if (error_password != "") {
                        $('#login-password-error').show();
                        $('#login-password-error strong').html(error_password).show();
                    } else {
                        $('#login-password-error').hide();
                    }
                    if (error_phone != "") {
                        $('#popup-login .error-block span strong').html("@lang('message.existing_phone_number')");;
                        $('#popup-login .error-block span').show();
                    } 

                }
            }

        });
    });

    $("#verify-btn").click(function (e) {
        e.preventDefault();
        var verification_code = $("#verify-block input[name=verification_code1]").val() + $(
            "#verify-block input[name=verification_code2]").val() + $(
            "#verify-block input[name=verification_code3]").val() + $(
            "#verify-block input[name=verification_code4]").val();
        // var phone = $("#phone_txt").text();
        var phone = $("#popup-register  input[name=phone]").val();
        var token = $("#popup-register  input[name=_token]").val();
        $.ajax({
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': token
            },
            url: '{{ route("register_step2", app()->getLocale()) }}',
            data: {
                verification_code: verification_code,
                phone: phone,
                token: token
            },
            success: function (data) {
                // alert(data);
                if (data.state == 'success') {
                    var url = "{{ route('profile', app()->getLocale()) }}";
                    window.location.replace(url);
                } else {
                    console.log(data.error);
                    $('#verify-block .error-block span strong').html(data.error).css('color',
                        '#dc3545');
                    $('#verify-block .error-block span').show();
                }
            },
            error: function (XMLHttpRequest, textStatus, errorThrown) {
                console.log('Sms Error');
            }

        });
    });

    $('#forget_password').on('click', function (event) {
        $('#popup-login').modal('hide');
        $('#forget_window').modal('show');
        $('#forget_window #forget_email_address').focus();
    });
    $('#forget_window button').click(function (e) {
        $('#forget_window p').html('Check email, the code was sent?');
        $('#forget_window').modal('show');
    });

    // $("#register-now").click(function (e) {
    //     e.preventDefault();
    //     $("#popup-register").modal('show');
    //     $("#popup-login").modal('hide');
    // });
    // $("#login-now").click(function (e) {
    //     e.preventDefault();
    //     $("#popup-register").modal('hide');
    //     // $("#popup-login").modal('show');
    // });
    $("#send_sms_again").click(function (e) {
        e.preventDefault();
        var phone = $("#popup-register  input[name=phone]").val();
        var token = $("#popup-register  input[name=_token]").val();
        $.ajax({
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': token
            },
            url: '{{ route("send-sms", app()->getLocale()) }}',
            data: {
                phone: phone,
                token: token
            },
            success: function (data) {
                // alert(data);
                console.log(data);
                if (data.state == 'success') {
                    $('#verify-block .error-block span strong').html(
                        'Verification code was sent to your phone number again').css('color',
                        'green');
                    $('#verify-block .error-block span').show();
                    $("#send_sms_again").hide();
                    setTimeout(function () {
                        $("#send_sms_again").show();;
                    }, 1000 * 60 * 10);
                } else {
                    $('#verify-block .error-block span strong').html(data);
                    $('#verify-block .error-block span').show();
                }
            },
            error: function (XMLHttpRequest, textStatus, errorThrown) {
                console.log('Sms Error');
            }
        });
    });

    // $(document).on('keypress',function(e) {
    //     if(e.which == 13) {
    //         console.log('enter');
    //         $('#login_btn').trigger('click');
    //     }
    // });
    document.addEventListener("keypress", function onEvent(event) {
    if (event.key === "Enter") {
        $('#login_btn').trigger('click');
        // Do something better
    }

    $( "#popup-login #password" ).on( "keypress", function(event) {
      if(event.which == 13) 
        $('#login_btn').trigger('click');
    });
});
</script>

