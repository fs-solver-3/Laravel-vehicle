<div class="personal-content--main">
    <form action="javascript:void(0)" id="personal_info" method="POST" enctype="multipart/form-data">
        <div class="personal-content--header">
            <h3 class="personal-content--header--title">@lang('front.profile.settings.personal_data')</h3>
        </div>
        <div class="personal-content--body--content row">
            <div class="col-xl-4 col-lg-4 personal-mb">
                <div class="all-trip--popup__col personal-content--select">
                    <label>@lang('front.profile.settings.gender'):</label>
                    <select class="gogocar-select" id="sex">
                        <option value="">@lang('global.not_set')</option>
                        <option value="Мужской" @if(Auth::user()->sex == 'Мужской') selected @endif>@lang('front.profile.settings.man')</option>
                        <option value="Женский" @if(Auth::user()->sex == 'Женский') selected @endif>@lang('front.profile.settings.woman')</option>
                    </select>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 personal-mb">
                <div class="all-trip--popup__col">
                    <label>@lang('front.profile.settings.first_name'):</label>
                    <input class="gogocar-input--filter personal-content--input" type="text" placeholder="Введите имя" id="name"
                        value="{{Auth::user()->name}}" required>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 personal-mb">
                <div class="all-trip--popup__col">
                    <label>@lang('front.profile.settings.last_name'):</label>
                    <input class="gogocar-input--filter personal-content--input" type="text" placeholder="Введите фамилию" id="surname" value="{{Auth::user()->surname}}">
                </div>
            </div>
            <div class="col-xl-5 col-lg-5 personal-mb">
                <div class="all-trip--popup__col">
                    <label>@lang('front.profile.settings.email'):</label>
                    <input class="gogocar-input--filter personal-content--input" type="email" id="email"
                        value="{{Auth::user()->email}}" placeholder="Введите Email" required
                        pattern="[a-z0-9._%+-]+@[a-z0-9.-]+[.][a-z]{2,4}$">
                </div>
            </div>
            <div class="col-xl-7 col-lg-7 personal-mb">
                <div class="all-trip--popup__col">
                    <label>@lang('front.profile.settings.phone'):</label>
                    <div class="gogocar-select-country--wrap">
                        <div class="gogocar-select-country gogocar-input--filter personal-content--input">
                            <div class="gogocar-select-country--flag--wrap">
                                @if (!is_null(Auth::user()->phone))
                                    @php
                                    $phone = Auth::user()->phone;
                                    $splitTel = substr($phone, 0, 2);
                                    @endphp
                                    @if($splitTel == "+9")
                                    <div class="gogocar-select-country--flag"
                                        style="background-image:url('{{ asset('static/img/general/lang/uz.png') }}');"></div>
                                    <div class="gogocar-select-country--name">UZ</div>
                                    @elseif($splitTel=="+7")
                                        <div class="gogocar-select-country--flag"
                                            style="background-image:url('{{ asset('static/img/general/lang/ru.png') }}');"></div>
                                        <div class="gogocar-select-country--name">RU</div>
                                    @else
                                        <div class="gogocar-select-country--flag"
                                        style="background-image:url('{{ asset('static/img/general/lang/uz.png') }}');"></div>
                                        <div class="gogocar-select-country--name">UZ</div>
                                    @endif
                                @else
                                    <div class="gogocar-select-country--flag"
                                    style="background-image:url('{{ asset('static/img/general/lang/uz.png') }}');"></div>
                                    <div class="gogocar-select-country--name">UZ</div>
                                @endif
                            </div>
                            <svg class="icon icon-arrow-right ">
                                <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#arrow-right') }}"></use>
                            </svg>
                            <ul class="gogocar-select-country__list">
                                <li class="gogocar-select-country__item" data-mask-phone="(+900 00) 000-00-00">
                                    <div class="gogocar-select-country__item--flag"
                                        style="background-image:url('{{ asset('static/img/general/lang/uz.png') }}');">
                                    </div>
                                    <div class="gogocar-select-country__item--name">UZ</div>
                                </li>
                                <li class="gogocar-select-country__item" data-mask-phone="+7 (000) 000-00-00">
                                    <div class="gogocar-select-country__item--flag"
                                        style="background-image:url('{{ asset('static/img/general/lang/ru.png') }}');">
                                    </div>
                                    <div class="gogocar-select-country__item--name">RU</div>
                                </li>
                            </ul>
                        </div>
                        @if(isset($splitTel))
                            @if($splitTel == "+9")
                            <input class="gogocar-input--filter personal-content--input mask-phone-choise uz" type="tel"
                                data-mask="(+900) 00 000-00-00" placeholder="Введите Телефон" required minlength="18"
                                value="{{Auth::user()->phone}}" id="phone" required>
                            @elseif($splitTel=="+7")
                            <input class="gogocar-input--filter personal-content--input mask-phone-choise ru" type="tel"
                                data-mask="+7 (000) 000-00-00" placeholder="Введите Телефон" required minlength="18"
                                value="{{substr(Auth::user()->phone, 2, strlen(Auth::user()->phone))}}" id="phone" required>
                            @else
                                <input class="gogocar-input--filter personal-content--input mask-phone-choise not" type="tel"
                                placeholder="Введите Телефон" required minlength="18"
                                value="{{Auth::user()->phone}}" id="phone" required>
                            @endif
                        @else
                            <input class="gogocar-input--filter personal-content--input mask-phone-choise" type="tel"
                            data-mask="(+900) 00 000-00-00" placeholder="Введите Телефон" required minlength="18"
                            value="" id="phone" required>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-xl-5 col-lg-5 personal-mb">
                <div class="all-trip--popup__col mb-4">
                    <label>@lang('front.profile.settings.birthday'):</label>
                    <div class="notific-input-icon personal-w">
                        <input
                            class="ddd gogocar-input--filter personal-calendar personal-content--input popup-show-calendar-click calendar-zone-height"
                            type="text" id="birthday" value="{{date('d.m.Y',strtotime(Auth::user()->birthday))}}">
                        <div class="notific-calendar-icon popup-show-calendar-click">
                            <svg class="icon icon-calendar2 ">
                                <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#calendar2') }}"></use>
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="gogocar-ready-plan--covid personal-info-about-me">
                    <div class="gogocar-gray-icons">
                        <svg class="icon icon-info ">
                            <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#info') }}"></use>
                        </svg>
                    </div>
                    <div class="gogocar-ready-plan--covid--info">
                        <div class="gogocar-ready-plan--covid--title">@lang('front.profile.settings.tell_others').</div>
                        <div class="gogocar-ready-plan--covid--desc">@lang('front.profile.settings.at_least')</div>
                    </div>
                </div>
            </div>
            <div class="col-xl-7 col-lg-7 personal-mb">
                <div class="all-trip--popup__col">
                    <label>@lang('front.profile.settings.about_me'):</label>
                    <textarea class="personal-textarea personal-content--input" placeholder="Введите информацию о себе"
                        rows="5" cols="10" minlength="10" id="profile">{{Auth::user()->profile}}</textarea>
                </div>
            </div>
        </div>
        <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
        <button type="submit" class="gogocar-yellow-button mt-4" id="savedata">@lang('front.profile.settings.save')</button>
    </form>
</div>
<div class="modal fade" id="popup-input-value-sms" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered popup-modal--wrap" role="document">
        <div class="modal-content popup-content">
            <div class="popup-covid--wrap popup-icon-size">
                <p class="popup-trip-finish"></p>
                <div class="gogocar-yellow-button w-170 finish">@lang('front.search_page.ok')</div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
       
        $('#personal_info').submit(function() {
            var name = $("#name").val();
            var surname = $("#surname").val();
            var email = $("#email").val();
            var sex = $("#sex").val();
            var phone = $("#phone").val();
            var birthday = $("#birthday").val();
            var profile = $("#profile").val();
            var token = $("#token").val();
            $.ajax({
                type:'POST',
                dataType: "json",
                headers: {
                    'X-CSRF-TOKEN': token
                },
                url: '{{ route("save_user_settings", app()->getLocale()) }}',
                data: {
                    name: name,
                    surname: surname,
                    email: email,
                    sex: sex,
                    phone: phone,
                    birthday: birthday,
                    profile: profile
                },
                success: (data) => {
                    if(data.state == 'success'){
                        // alert('Updated successfully.');
                        //  $("#success_msg").css('display', 'block');
                        //  $('#success_msg_content').html("@lang('message.profile.profile_update')");
                         location.reload();
                    }
                    else if(data.state == 'confirm'){
                        $('#popup-reg-active-phone').modal('show');
                    }
                    else if(data.state == 'error'){
                        $('#popup-input-value-sms .popup-trip-finish').html(data.message);
                        $('#popup-input-value-sms').modal('show');
                    }
                    else{
                        $('popup-input-value-sms').modal('show');
                    }
                },
                error: function(data){
                    console.log(data);
                }
            });
        });

        $("#verify-btn2").click(function (e) {
            e.preventDefault();
            var verification_code = $("#verify-block-profile input[name=verification_code1]").val() + $(
                "#verify-block-profile input[name=verification_code2]").val() + $(
                "#verify-block-profile input[name=verification_code3]").val() + $(
                "#verify-block-profile input[name=verification_code4]").val();
            // var phone = $("#phone_txt").text();
            var phone = $("#personal_data  #phone").val();
            var token = $("#token").val();
            $.ajax({
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': token
                },
                url: '{{ route("phone.verify", app()->getLocale()) }}',
                data: {
                    verification_code: verification_code,
                    phone: phone,
                },
                success: function (data) {
                    // alert(data);
                    if (data.state == 'success') {
                        var url = "{{ route('profile', ['locale' => app()->getLocale(), 'tab' => 'user_realiability']) }}";
                        window.location.replace(url);
                    } else {
                        $('#verify-block-profile .error-block span strong').html(data.error).css('color',
                            '#dc3545');
                        $('#verify-block-profile .error-block span').show();
                    }
                },
                error: function (XMLHttpRequest, textStatus, errorThrown) {
                    console.log('Sms Error');
                }

            });
        });

        $('#popup-input-value-sms .finish').click(function() {
            $('#popup-input-value-sms').modal('hide');
        });
    })
</script>