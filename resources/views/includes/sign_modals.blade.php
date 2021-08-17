<div class="modal fade" id="authorization_window" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="authorization_container">
                <div class="logo_container">
                    <img src="{{asset('img/logo_old.svg')}}" alt="logo">
                </div>
                <form method="POST" >
                    @csrf
                    <div class="error-block">
                        <span class="invalid-feedback" role="alert">
                            <strong></strong>
                        </span>
                    </div>
                    <div class="single_input">
                        <div class="input_sign">
                            <img src="{{asset('img/authorization/arroba.svg')}}" alt="arroba">
                        </div>
                        <!-- <input type="email" placeholder="Email" id="email_address_auth"> -->
                        <input id="email_address_auth" placeholder="@lang('front.sign_modal.email')" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>
                    <div class="single_input">
                        <div class="input_sign">
                            <img src="{{asset('img/authorization/key.svg')}}" alt="key">
                        </div>
                        <!-- <input type="password" placeholder="Пароль"> -->
                        <input id="password" placeholder="@lang('front.sign_modal.password')" type="password"  class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                        <a href="#" class="show_ps showpasswordlink" data-id="password" style="color: #fff;position: absolute;z-index: 1;right: 20px;top: 15px;"><img class="viaible" src="{{asset('img/visibility.svg')}}" alt="key"><img class="inviaible" src="{{asset('img/invisible.svg')}}" alt="key"></a>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>
                    <div class="button_container">
                        <div class="text-center">
                            <button type="submit" class="button" style="border: 0px;" id="login_btn" onclick="ym(67411513,'reachGoal','login'); return true;">
                                    {{ __('Войти') }}
                            </button>
                        </div>
                        <a href="#" id="forget_password">@lang('front.sign_modal.forget_password')</a>
                    </div>
                </form>
            </div>
            <p>@lang('front.sign_modal.remember') <a href="#" id="auth_to_reg">@lang('front.sign_modal.title')</a></p>
        </div>
    </div>
</div>
<!--конец окна авторизации-->

<!--модальное окно регистрации-->
<div class="modal fade" id="registration_window" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="registration_container">
                <h2> @lang('front.sign_modal.title')</h2>
                <h5>@lang('front.sign_modal.invite'):</h5>
                {{-- <div class="referal">
                    <img src="{{asset('img/registration/user_avatar.png')}}" alt="avatar">
                    <div class="info">
                        <h3>Михаил Кокорин</h3>
                        <span>@Kokorin_misha</span>
                    </div>
                </div> --}}
                <form method="POST" id="register-block">
                    @csrf
                    <div class="error-block">
                        <span class="invalid-feedback" role="alert">
                            <strong></strong>
                        </span>
                    </div>
                    <div class="single_input">
                        <span class="invalid-feedback" role="alert" id="name-error">
                            <strong></strong>
                        </span>
                        <div class="input_sign">
                            <img src="{{asset('img/registration/avatar.svg')}}" alt="avatar">
                        </div>
                        <!-- <input type="text" placeholder="Имя Фамилия" id="name" name="name"> -->
                        <input id="name" placeholder="@lang('front.sign_modal.name')" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            
                    </div>
                    <div class="single_input">
                        <span class="invalid-feedback" role="alert" id="email-error">
                            <strong></strong>
                        </span>
                        <div class="input_sign">
                            <img src="{{asset('img/registration/arroba.svg')}}" alt="arroba">
                        </div>
                        <!-- <input type="email" placeholder="Email" id="email_address" name="email"> -->
                        <input id="email_address" placeholder="@lang('front.sign_modal.email')" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                    </div>
                    <div class="single_input">
                        <span class="invalid-feedback" role="alert" id="phone-error">
                            <strong></strong>
                        </span>
                        {{-- <div class="input_sign">
                            <img src="{{asset('img/registration/phone.svg')}}" alt="phone">
                        </div> --}}
                        <!-- <input type="tel" placeholder="+7 (___) ___-__-__" id="phone_number" name="phone"> -->
                        <input id="phone_number" type="tel"  class="form-control @error('phone') is-invalid @enderror" name="phone_number" value="{{ old('email') }}" required autocomplete="phone" placeholder="Телефон" >
                    </div>
                    {{-- <input type="tel" placeholder="" id="telephone"> --}}
                    <div class="single_input position-relative">
                        <span class="invalid-feedback" role="alert" id="password-error">
                            <strong></strong>
                        </span>
                        <div class="input_sign">
                            <img src="{{asset('img/registration/key.svg')}}" alt="key">
                        </div>
                        <!-- <input type="password" placeholder="Пароль" name="password"> -->
                        <input id="password_register" type="password" placeholder="@lang('front.sign_modal.password')" class="form-control  @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                        <a href="#" class="show_ps showpasswordlink" data-id="password_register"  style="color: #fff; position: absolute;z-index: 1;right: 20px;"><img class="viaible" src="{{asset('img/visibility.svg')}}" alt="key"><img class="inviaible" src="{{asset('img/invisible.svg')}}" alt="key"></a>

                    </div>
                    <div class="single_input">
                        <span class="invalid-feedback" role="alert" id="password-confirm-error"></span>
                        <div class="input_sign">
                            <img src="{{asset('img/registration/key.svg')}}" alt="key">
                        </div>
                        <!-- <input type="password" placeholder="Пароль" name="password"> -->
                        <input id="password_confirm" type="password" placeholder="@lang('front.sign_modal.password')" class="form-control validate" name="password_confirmation" required >
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>
                    <input type="hidden"  name="phone" id="full_phone_number">
                <div class="button_container">
                    <div class="text-center">
                        <button type="submit" class="button" id="register-btn">
                           @lang('front.sign_modal.title')
                        </button>
                    </div>
                    <p>@lang('front.sign_modal.by_register')&nbsp<a href="#">@lang('front.sign_modal.terms')</a></p>
                </div>
                <div id="password_rules">
                    <h6>@lang('profile.profile.configure.password_requirements')</h6>
                    <ul>
                        <li class="password_length">@lang('profile.profile.configure.password_length')</li>
                        <li class="password_uppercase">@lang('profile.profile.configure.password_uppercase')</li>
                        <li class="password_number">@lang('profile.profile.configure.password_number')</li>
                        <li class="password_match">@lang('profile.profile.configure.password_match')</li>
                    </ul>
                </div>
                </form>
                <form method="POST" action="" id="verify-block">
                    @csrf
                    <div class="error-block">
                        <span class="invalid-feedback" role="alert">
                            <strong></strong>
                        </span>
                    </div>
                    <div class="single_input">
                        <label for="sms_code">@lang('front.sign_modal.sms_code'):</label>
                        <input type="text" placeholder="___-___" id="sms_code" name="verification_code">
                    </div>
                    <a href="#" id="send_sms_again" style="color: #F37335">@lang('front.sign_modal.sms_again')</a>
                    <input type="hidden" name="phone_number" value="" >
                    <div class="button_container">
                        <div class="text-center">
                            <button type="submit" class="button" id="verify-btn">                           
                            @lang('front.sign_modal.verify')
                            </button>
                        </div>
                        <p>@lang('front.sign_modal.by_register')<a href="#">@lang('front.sign_modal.terms').</a></p>
                    </div>
                </form>
            </div>
            <div class="auth_link">
                <p>@lang('front.sign_modal.already')
                    <a href="#" id="reg_to_auth">@lang('front.sign_modal.login')</a>
                </p>
            </div>
        </div>

    </div>
</div>

    <script>
        $( document ).ready(function() {
            $('#user_acc .dropdown-menu a:not(".curator_chat_link")').on('click', function (event) {
                window.localStorage.removeItem("activeTab");
                event.stopPropagation();
            });
            $('.user_account .dropdown-menu a:not(".curator_chat_link")').on('click', function (event) {
                window.localStorage.removeItem("activeTab");
                event.stopPropagation();
            });
            $('.user_account .dropdown-menu a').on('click', function (event) {
                // window.localStorage.removeItem("activeTab");
                event.stopPropagation();
            });
            $('#forget_password').on('click', function (event) {
                // event.stopPropagation();
                $('#authorization_window').modal('hide');
                $('#forget_window').modal('show');
                $('#forget_window #email_address').focus();
            });
        });
        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });
        $('#verify-block').hide();
        var all_pass = true;
        $("#register-btn").click(function(e){
            e.preventDefault();
            validateInputs();
            var name = $("#registration_window input[name=name]").val();
            var password = $("#registration_window  input[name=password]").val();
            var password_confirmation = $("#registration_window  input[name=password_confirmation]").val();
            var email = $("#registration_window  input[name=email]").val();
            if (check_email_address(email)) {
                 all_pass = true;
            } else {
                all_pass = false;
                alert('You shold enter valid email');
                $("#registration_window  input[name=email]").focus();
            }
            var phone = $("#registration_window  input[name=phone]").val();
            var token = $("#registration_window  input[name=_token]").val();
            if(all_pass){
                $.ajax({
                type:'POST',
                url:'{{ route('register', app()->getLocale()) }}',
                data:{name:name, password:password, email:email, phone:phone, password_confirmation:password_confirmation, token:token},
                success:function(data){
                    // alert(data);
                    if (data.state == 'success'){
                        $('#register-block').hide();
                        $('#verify-block').show();
                        $("#registration_window  input[name=phone_number]").val(phone);
                    }
                    else {
                        // console.log(JSON.parse(data.errors));
                        $('#register-block .error-block span strong').html(data);
                        $('#register-block .error-block span').show();
                    }
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) { 
                        var message = XMLHttpRequest.responseText;
                        error_message = JSON.parse(message).errors;
                        console.log(error_message);
                        $('.error-block span strong').html(error_message);
                        if (error_message){

                            error_email = error_message.email? error_message.email : "" ;
                            error_password = error_message.password? error_message.password : "" ;
                            error_phone = error_message.phone? error_message.phone : "" ;
                            error_name = error_message.name? error_message.name : "" ;
                            var error_texts = error_name + error_password + error_phone + error_name;
                            console.log(error_texts);
                            // $('.error-block span strong').html(error_texts);
                            // $('.error-block .invalid-feedback').show();
                            if (error_email != ""){
                                $('#email-error').show();
                                $('#email-error strong').html(error_email).show();
                            }
                            else{
                                $('#email-error').hide();
                            }
                            if (error_password != ""){
                                $('#password-error').show();
                                $('#password-error strong').html(error_password).show();
                            }
                            else{
                                $('#password-error').hide();
                            }
                            if (error_phone != ""){
                                $('#phone-error').show();
                                $('#phone-error strong').html(error_phone).show();
                            }
                            else{
                                $('#phone-error').hide();
                            }
                            if (error_name != ""){
                                $('#name-error').show();
                                $('#name-error strong').html(error_name).show();
                            }
                            else{
                                $('#name-error').hide();
                            }
                        }
                    }  

                });
            }
            else{
                alert('You should enter valid password.');
            }
            
        });
        //  verify sms code
        $("#verify-btn").click(function(e){
            e.preventDefault();
            var verification_code = $("#verify-block input[name=verification_code]").val();
            var phone = $("#verify-block  input[name=phone_number]").val();
            var token = $("#registration_window  input[name=_token]").val();
            $.ajax({
                type:'POST',
                url:'{{ route('register-step2', app()->getLocale()) }}',
                data:{verification_code:verification_code, phone:phone, token:token},
                success:function(data){
                    // alert(data);
                    if (data.state == 'success'){
                        var url = "{{ route('profile', app()->getLocale()) }}";
                        window.location.replace(url);
                    }
                    else {
                        console.log(data.error);
                        $('#verify-block .error-block span strong').html(data.error).css('color','#dc3545');
                        $('#verify-block .error-block span').show();
                    }
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) { 
                        console.log('Sms Error');
                    }  

            });
        });

        $("#send_sms_again").click(function(e){
            e.preventDefault();
            var phone = $("#verify-block  input[name=phone_number]").val();
            var token = $("#registration_window  input[name=_token]").val();
            $.ajax({
                type:'POST',
                url:'{{ route('send-sms', app()->getLocale()) }}',
                data:{phone:phone, token:token},
                success:function(data){
                    // alert(data);
                    console.log(data);
                    if (data.state == 'success'){
                        $('#verify-block .error-block span strong').html('Verification code was sent to your phone number again').css('color','green');
                        $('#verify-block .error-block span').show();
                        $("#send_sms_again").hide();
                        setTimeout(function () {
                             $("#send_sms_again").show();;
                        }, 1000*60*10);
                    }
                    else {
                        $('#verify-block .error-block span strong').html(data);
                        $('#verify-block .error-block span').show();
                    }
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) { 
                        console.log('Sms Error');
                    }  

            });
        });

        $('#forget_window .button').click(function(e){
            $('#forget_window p').html('Check email, the code was sent?');
            $('#forget_window').modal('show');
        });

        // login

        $("#login_btn").click(function(e){
            console.log('login-clicked');
            e.preventDefault();
            var password = $("#authorization_window input[name=password]").val();
            var email = $("#authorization_window  input[name=email]").val();
            var token = $("#registration_window  input[name=_token]").val();
            $.ajax({
            type:'POST',
            url:'{{ route('login', app()->getLocale()) }}',
            data:{password:password, email:email, token:token},
            success:function(data){
                // alert(data);
                if (data.state == 'login'){
                    if(data.role == 'Teacher'){
                        var url = "{{ route('admin-dashboard', app()->getLocale()) }}";
                    }
                    else if(data.role == 'Support'){
                        var url = "{{ route('admin-dashboard', app()->getLocale()) }}";
                    }
                    else {
                        var url = "{{ route('profile', app()->getLocale()) }}";
                    }
                    // alert(url);
                    window.location.replace(url);
                }
                else if(data.state == 'admin_login') {
                    // console.log(JSON.parse(data.errors));
                    var url = "{{ route('admin-dashboard', app()->getLocale()) }}";
                    window.location.replace(url);
                }
                else if(data.state == 'verify') {
                    // console.log(JSON.parse(data.errors));
                    $(registration_window).modal('show');
                    $('#register-block').hide();
                    $('#verify-block').show();
                    $("#registration_window  input[name=phone_number]").val(data.phone);
                }
                else if(data.state == 'block'){
                     $('#authorization_window .error-block span strong').html('Your account is blocked');
                     $('#authorization_window .error-block span').show();
                }
                else{
                     console.log('invalid email or password');
                     $('#authorization_window .error-block span strong').html('Invalid Email or Password');
                     $('#authorization_window .error-block span').show();
                }
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) { 
                    var message = XMLHttpRequest.responseText;
                    error_message = JSON.parse(message).errors;
                    console.log(error_message);
                    $('.error-block span strong').html(error_message);
                    if (error_message){

                        error_email = error_message.email? error_message.email : "" ;
                        error_password = error_message.password? error_message.password : "" ;
                        var error_texts = error_name + error_password;
                        console.log(error_texts);
                        // $('.error-block span strong').html(error_texts);
                        // $('.error-block .invalid-feedback').show();
                        if (error_email != ""){
                            $('#login-email-error').show();
                            $('#login-email-error strong').html(error_email).show();
                        }
                        else{
                            $('#login-email-error').hide();
                        }
                        if (error_password != ""){
                            $('#login-password-error').show();
                            $('#login-password-error strong').html(error_password).show();
                        }
                        else{
                            $('#login-password-error').hide();
                        }
                       
                    }
                }  

            });
        });

        $(".showpasswordlink").click(function(e){
            // var x = $(this).siblings('input').val();
            id = $(this).data('id');
            var x = document.getElementById(id);
            $(this).toggleClass("show_password");
            showpassword(x);
        })

        function showpassword(x) {
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }

        function check_email_address(email_address) {
            let email_reg_exp = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            return (email_reg_exp.test(email_address));
        }

        var validateInput = $('input.validate');
            
            $('#password_rules').hide();
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


                if (password == conf && password != '') $('.password_match').addClass('complete');
                else {
                    $('.password_match').removeClass('complete')
                    all_pass = false;
                }
            }
            validateInput.on('input', validateInputs);
            
            function showPassword() {
                if(validateInput.attr('type') === 'password') {
                    validateInput.attr('type', 'text');
                }
                else if(validateInput.attr('type') === 'text') {
                    console.log('else');
                    validateInput.attr('type', 'password');
                }
            }
            $('.togglePassword').on('click', showPassword);

        
    </script>
    <script>
        var input = document.querySelector("#phone_number");

        $currentCountry = 'us';
        $.ajax({
            url: 'http://ip-api.com/json/',
            async: false,
            success:function(data){
                $currentCountry = data.countryCode.toLowerCase();
                console.log(data.countryCode.toLowerCase());
            }
        })

        $selected = $('.country_code').attr('country_iso_code2') != undefined ? $('.country_code').attr('country_iso_code2') : $currentCountry;
        
        var iti = window.intlTelInput(input, {
            preferredCountries: [ $selected ],
            //   separateDialCode: true,
             autoPlaceholder: true,
            //  initialCountry: "auto",
            //     geoIpLookup: function(success, failure) {
            //         $.get("https://ipinfo.io", function() {}, "jsonp").always(function(resp) {
            //         var countryCode = (resp && resp.country) ? resp.country : "";
            //         success(countryCode);
            //         });
            //  },
            utilsScript: "/build/js/utils.js",
        });
        phone = document.querySelector('#phone_number');
        phone.addEventListener('focus', function () {
            var getCode = iti.getSelectedCountryData();
            var digital_code = getCode.dialCode;
            $(input).val(digital_code);
        })
         phone.addEventListener('blur', function () {
            // alert( iti.isValidNumber());
             $('#full_phone_number').val(iti.getNumber());
             if (iti.isValidNumber()) {
                this.style.backgroundImage = 'url(/img/registration/check.svg)';
                this.style.backgroundRepeat = 'no-repeat';
                this.style.backgroundPosition = 'right 15px center';
            } else {
                this.style.backgroundImage = 'none';
            }
        });
        $("#phone_number").keypress(function(e) {
            //if the letter is not digit then display error and don't type anything
            if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
            //display error message
            // $("#errmsg").html("Digits Only").show().fadeOut("slow");
            return false;
            }
        });
        // iti.isValidNumber();
    
  </script>
