<div class="personal-content--main">
    <div class="personal-content--header">
        <h3 class="personal-content--header--title">@lang('front.profile.reliability_tab.trustworthiness')</h3>
    </div>
    <div class="personal-content--body">
        <div class="gogocar-ready-plan--covid personal-info-about-me mb-4">
            <div class="gogocar-gray-icons">
                <svg class="icon icon-info ">
                    <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#info') }}"></use>
                </svg>
            </div>
            <div class="gogocar-ready-plan--covid--info">
                <div class="gogocar-ready-plan--covid--title">@lang('front.profile.reliability_tab.verify_profile')!</div>
                <div class="gogocar-ready-plan--covid--desc">@lang('front.profile.reliability_tab.become').</div>
            </div>
        </div>
        <ul class="personal-save--list">
            <li class="personal-save--item gogocar-box">
                <div class="col-xl-7 col-lg-7 personal-save--item__left">
                    <div class="personal-save--item__wrap">
                        <div class="personal-save--item__title">
                            @if(Auth::user()->email_verified_at))
                                @lang('front.profile.reliability_tab.email_confirmed')
                            @else
                                @lang('front.profile.reliability_tab.not_email_confirmed')
                            @endif
                        </div>
                        <div class="personal-save--item__content">
                            <div class="personal-save--item__content--wrap">
                                <div class="personal-save--item__content--wrap--title">@lang('front.profile.reliability_tab.your_email'):
                                </div>
                                <a class="personal-save--item__content--wrap--link"
                                    href="mailto:{{ Auth::user()->email }}">{{ Auth::user()->email }}</a>
                            </div>
                            {{-- <a class="personal-save--item__content--change" href="/">Изменить</a> --}}
                        </div>
                    </div>
                    @if(Auth::user()->email_verified_at))
                    <p class="personal-save--item__text">@lang('front.profile.reliability_tab.you_have').</p>
                    @endif
                </div>
                <div class="personal-save--item__rihgt">
                        @if(!is_null(Auth::user()->email_verified_at))
                        <div class="account-control--submited--icon submit-green-icon">
                            <svg class="icon icon-ok ">
                                <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#ok') }}"></use>
                            </svg>
                        </div>
                        @else
                            <div class="account-control--submited--icon submit-yellow-icon">!</div>
                        @endif
                </div>
            </li>
            <li class="personal-save--item gogocar-box" id="phone-bar">
                <div class="col-xl-7 col-lg-7 personal-save--item__left">
                    <div class="personal-save--item__wrap">
                        <div class="personal-save--item__title">
                            @if(Auth::user()->isVerified)
                                @lang('front.profile.reliability_tab.phone_number')
                            @else
                                @lang('front.profile.reliability_tab.not_verified_phone')
                            @endif
                        </div>
                        <div class="personal-save--item__content">
                            <div class="personal-save--item__content--wrap">
                                <div class="personal-save--item__content--wrap--title">
                                        @lang('front.profile.reliability_tab.your_phone'):
                                </div><a class="personal-save--item__content--wrap--link"
                                    href="tel:+{{ Auth::user()->phone }}">{{ Auth::user()->phone }}</a>
                            </div>
                            {{-- <a class="personal-save--item__content--change" href="/">Изменить</a> --}}
                        </div>
                    </div>
                    <p class="personal-save--item__text">
                        @if(Auth::user()->isVerified)
                            @lang('front.profile.reliability_tab.you_verified_phone').
                        @else
                            {{-- @lang('front.profile.reliability_tab.not_verified_phone') --}}
                        @endif
                    </p>
                </div>
                <div class="personal-save--item__rihgt">
                        @if(Auth::user()->isVerified)
                            <div class="account-control--submited--icon submit-green-icon">
                                <svg class="icon icon-ok ">
                                    <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#ok') }}"></use>
                                </svg>
                            </div>
                        @else
                            <div class="account-control--submited--icon submit-yellow-icon">!</div>
                        @endif
                </div>
            </li>
            <li class="personal-save--item personal-save--item2 gogocar-box" id="id_verify">
                <div class="col-xl-7 col-lg-7 personal-save--item__left">
                    <div class="personal-save--item__wrap">
                        <div class="personal-save--item__title">
                            @if(!is_null(Auth::user()->passport) && Auth::user()->passport->verified)
                                @lang('front.profile.reliability_tab.verified_id')
                            @else
                                @lang('front.profile.reliability_tab.verify_id')
                            @endif
                        </div>
                    </div>
                    @if(Auth::user()->isVerified)
                    <p class="personal-save--item__text">@lang('front.profile.reliability_tab.this_will').
                    </p>
                    @endif
                </div>
                <div class="personal-save--item__rihgt">
                    <div class="personal-save--item__rihgt--wrap">
                        <div class="personal-save--item__rihgt--submit">
                            @if(!is_null(Auth::user()->passport) && Auth::user()->passport->verified)
                                @lang('front.profile.reliability_tab.verified_id')
                            @else
                                @lang('front.profile.reliability_tab.verify_id_second')
                            @endif
                        </div>
                        @if(!is_null(Auth::user()->passport) && Auth::user()->passport->verified)
                            <div class="account-control--submited--icon submit-green-icon">
                                <svg class="icon icon-ok ">
                                    <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#ok') }}"></use>
                                </svg>
                            </div>
                        @else
                            <div class="account-control--submited--icon submit-yellow-icon">!</div>
                        @endif

                    </div>
                </div>
            </li>
            <li class="personal-save--item personal-save--item2 gogocar-box">
                <div class="col-xl-7 col-lg-7 personal-save--item__left">
                    <div class="personal-save--item__wrap">
                        <div class="personal-save--item__title">@lang('front.profile.reliability_tab.link_facebook')</div>
                    </div>
                    <p class="personal-save--item__text">@lang('front.profile.reliability_tab.this_will_allow').</p>
                </div>
                <div class="personal-save--item__rihgt">
                    <div class="personal-save--item__rihgt--wrap personal-account--flex-wrap">
                        @if(is_null(Auth::user()->facebook_id))
                        <a href="{{url('/auth/facebook')}}">
                        <div class="personal-save--item__rihgt--account">
                            <div class="personal-save--social--account">
                                <svg class="icon icon-facebook ">
                                    <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#facebook') }}"></use>
                                </svg>
                            </div>
                            <div class="personal-save--social--account__text">@lang('front.profile.reliability_tab.link_account')</div>
                        </div>
                        </a>
                        @endif
                        @if(!is_null(Auth::user()->facebook_id))
                            <div class="account-control--submited--icon submit-green-icon">
                                <svg class="icon icon-ok ">
                                    <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#ok') }}"></use>
                                </svg>
                            </div>
                        @else
                            <div class="account-control--submited--icon submit-yellow-icon">!</div>
                        @endif
                    </div>
                </div>
            </li>
            <li class="personal-save--item personal-save--item2 gogocar-box">
                <div class="col-xl-7 col-lg-7 personal-save--item__left">
                    <div class="personal-save--item__wrap">
                        <div class="personal-save--item__title">@lang('front.profile.reliability_tab.link_vk')</div>
                    </div>
                    <p class="personal-save--item__text">@lang('front.profile.reliability_tab.this_will_vk').</p>
                </div>
                <div class="personal-save--item__rihgt">
                    <div class="personal-save--item__rihgt--wrap personal-account--flex-wrap">
                        @if(is_null(Auth::user()->vk_id))
                            <a href="{{url('/auth/vk')}}">
                                <div class="personal-save--item__rihgt--account">
                                    <div class="personal-save--social--account">
                                        <svg class="icon icon-vk ">
                                            <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#vk') }}"></use>
                                        </svg>
                                    </div>
                                    <div class="personal-save--social--account__text">@lang('front.profile.reliability_tab.personal_profile')</div>
                                </div>
                            </a>
                        @else
                            <div class="personal-save--item__rihgt--account">
                                <div class="personal-save--social--account">
                                    <svg class="icon icon-vk ">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#vk') }}"></use>
                                    </svg>
                                </div>
                                <div class="personal-save--social--account__text">
                                    @if($vk_friend_counts === 'Access is denied')
                                    @lang('front.profile.reliability_tab.prviate_profile')
                                    @else
                                    @lang('front.profile.reliability_tab.friend_counts'): {{$vk_friend_counts}}
                                    @endif
                                </div>
                            </div>
                        @endif

                        @if(!is_null(Auth::user()->vk_id))
                            <div class="account-control--submited--icon submit-green-icon">
                                <svg class="icon icon-ok ">
                                    <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#ok') }}"></use>
                                </svg>
                            </div>
                        @else
                        <div class="account-control--submited--icon submit-yellow-icon">!</div>
                        @endif
                    </div>
                </div>
            </li>
        </ul>
        <div class="gogocar-yellow-button">@lang('front.profile.reliability_tab.save')</div>
    </div>
</div>
