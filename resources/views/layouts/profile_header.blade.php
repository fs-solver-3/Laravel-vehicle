<header>
    <div class="header-container">
        <div class="container">
            <div class="header-wrap">
                <div class="header-sandwich-menu">
                    <svg class="icon icon-menu ">
                        <use xlink:href="{{asset('static/img/svg/symbol/sprite.svg#menu')}}"></use>
                    </svg>
                </div>
                <div class="header-logo">
                    <a href="/">
                        <svg class="icon icon-logo2 " xmlns="{{asset('static/img/svg/symbol/sprite.svg')}}">
                            <use xlink:href="{{asset('static/img/svg/symbol/sprite.svg#logo2')}}"></use>
                        </svg>
                    </a>
                </div>
                <div class="header-trip">
                    <div class="header-trip--wrap">
                        <a class="header-trip--wrap__link" href="{{ route('search', app()->getLocale()) }}">@lang('front.header.find') <span>@lang('front.header.trip')</span></a>
                        @if(Auth::user())
                        <a class="header-trip--wrap__link" href="{{ route('choosetype', app()->getLocale()) }}">@lang('front.header.suggest') <span>@lang('front.header.trip')</span></a>
                        @else
                        <a class="header-trip--wrap__link" href="#" data-toggle="modal" data-target="#popup-login">@lang('front.header.suggest') <span>@lang('front.header.trip')</span></a>
                        @endif

                    </div>
                </div>
                <div class="header-profile">
                    @if(Auth::user())
                        <div class="header-profile--menu">
                            <svg class="icon icon-menu ">
                                <use xlink:href="{{asset('static/img/svg/symbol/sprite.svg#menu')}}"></use>
                            </svg>
                            <ul class="header-profile--menu--list">
                                    <a class="header-profile--menu--item" href="{{ route('personal_Control', app()->getLocale()) }}">
                                        <svg class="icon icon-home ">
                                            <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#home') }}"></use>
                                        </svg><span>@lang('front.header.management')</span>
                                    </a>
                                    <a class="header-profile--menu--item" href="{{ route('profile', ['locale' => app()->getLocale(), 'tab' => 'personal_data']) }}">
                                        <svg class="icon icon-profile ">
                                            <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#profile') }}"></use>
                                        </svg><span>@lang('front.header.profile')</span>
                                    </a>
                                    <a class="header-profile--menu--item" href="{{ route('personal-message', app()->getLocale()) }}">
                                        <svg class="icon icon-message ">
                                            <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#message') }}"></use>
                                        </svg><span>@lang('front.header.message')</span></a>
                                    <a class="header-profile--menu--item" href="{{ route('trip-alerts', app()->getLocale()) }}">
                                        <svg class="icon icon-notific ">
                                            <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#notific') }}"></use>
                                        </svg><span>@lang('front.header.notification')</span></a>
                                    <a class="header-profile--menu--item" href="{{ route('trips', app()->getLocale()) }}">
                                        <svg class="icon icon-wheel ">
                                            <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#wheel') }}"></use>
                                        </svg><span>@lang('front.header.your_trips')</span>
                                    </a>
                                    <a class="header-profile--menu--item" href="{{ route('bookings', app()->getLocale()) }}">
                                        <svg class="icon icon-wheel ">
                                            <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#wheel') }}"></use>
                                        </svg><span>@lang('front.header.bookings')</span>
                                    </a>
                                   
                                    @if (Session::get('hasClonedUser') == 1)
                                    <a onclick="event.preventDefault(); document.getElementById('cloneuser-form').submit();" class="button header-profile--menu--item" style="color: #fff;">
                                        <svg class="icon icon-home ">
                                            <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#home') }}"></use>
                                        </svg><span>@lang('front.return')</span>
                                    </a>
                                    <form id="cloneuser-form" action="{{ route('loginAs') }}" method="post">
                                        {{ csrf_field() }}
                                    </form>

                                    @endif

                                     <a class="header-profile--menu--logout" href="{{ route('logout', app()->getLocale()) }}">
                                         <svg class="icon icon-logout ">
                                             <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#logout') }}"></use>
                                         </svg><span>@lang('front.header.logout')</span>
                                     </a>
                            </ul>
                        </div>
                        <div class="header-profile--menu__mobile">
                            <svg class="icon icon-menu ">
                                <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#menu') }}"></use>
                            </svg>
                        </div>
                        <div class="header-user-profile" id="app1">
                            <a class="header-user-profile--link" href="{{ route('personal-message', app()->getLocale()) }}">
                                @if(!is_null(Auth::user()->avatar))
                                <div class="header-user-profile--img" style="background-image:url('{{ asset(Auth::user()->avatar) }}');">
                                @else    
                                <div class="header-user-profile--img" style="background-image:url('{{ asset('/static/img/content/drivers-avatar/driver1.png') }}');">
                                @endif
                                <unread-com></unread-com>
                                </div><span>{{Auth::user()->name}}</span>
                            </a>
                        </div>
                    @else
                        <div class="header-profile--reg" data-toggle="modal" data-target="#popup-register">@lang('front.header.register')</div>
                        <div class="header-profile--login" data-toggle="modal" data-target="#popup-login">@lang('front.login')</div>
                    @endif
                </div>
            </div>
        </div>
        <div class="header-mobile-menu">
            <div class="personal-sidebar--content--wrap">
                <div class="personal-sidebar--content gogocar-box">
                  <div class="account-control--bottom__panel--header">
                    <div class="account-control--title--wrap">
                      <h3 class="account-control--title">Информация профиля</h3>
                    </div>
                  </div>
                  <ul class="personal-sidebar--list">
                    <a class="personal-sidebar--item @if($request->get('tab') == 'personal_data') active @endif" href="{{ route('profile', ['locale' => app()->getLocale(), 'tab' => 'personal_data']) }}">@lang('front.profile.personal_data')</a>
                    <a class="personal-sidebar--item @if($request->get('tab') == 'photo') active @endif" href="{{ route('profile', ['locale' => app()->getLocale(), 'tab' => 'photo']) }}">@lang('front.profile.photo')</a>
                    <a class="personal-sidebar--item @if($request->get('tab') == 'passport') active @endif" href="{{ route('profile', ['locale' => app()->getLocale(), 'tab' => 'passport']) }}" >@lang('front.profile.passport')</a>
                    <a class="personal-sidebar--item @if($request->get('tab') == 'my_driver_lisence') active @endif" href="{{ route('profile', ['locale' => app()->getLocale(), 'tab' => 'my_driver_lisence']) }}" >@lang('front.profile.driver_license')</a>
                    <a class="personal-sidebar--item @if($request->get('tab') == 'preference') active @endif" href="{{ route('profile', ['locale' => app()->getLocale(), 'tab' => 'preference']) }}" >@lang('front.profile.my_preference')</a>
                    <a class="personal-sidebar--item @if($request->get('tab') == 'user_realiability') active @endif" href="{{ route('profile', ['locale' => app()->getLocale(), 'tab' => 'user_realiability']) }}">@lang('front.profile.realibility')
                    </a>
                    @if($request->get('add_car') || Route::currentRouteName()=='profile.car.edit' || Route::currentRouteName()=='profile.truck.edit' )
                    <a class="personal-sidebar--item  active" href="{{ route('profile', ['locale' => app()->getLocale(), 'tab' => 'car']) }}">@lang('front.profile.my_car')
                    </a>
                    @else
                    <a class="personal-sidebar--item @if($request->get('tab') == 'car') active @endif" href="{{ route('profile', ['locale' => app()->getLocale(), 'tab' => 'car']) }}">@lang('front.profile.my_car')
                    </a>
                    @endif
                    <a class="personal-sidebar--item @if($request->get('tab') == 'mailing_address') active @endif"  href="{{ route('profile', ['locale' => app()->getLocale(), 'tab' => 'mailing_address']) }}">@lang('front.profile.mail_address')</a>
                    </ul>
                </div>
                <div class="personal-sidebar--content gogocar-box">
                  <div class="account-control--bottom__panel--header">
                    <div class="account-control--title--wrap">
                      <h3 class="account-control--title">@lang('front.profile.reviews')</h3>
                    </div>
                  </div>
                  <ul class="personal-sidebar--list">
                    <li><a class="personal-sidebar--item @if($request->get('tab') == 'received_feedback') active @endif" href="{{ route('profile', ['locale' => app()->getLocale(), 'tab' => 'received_feedback']) }}">@lang('front.profile.received_reviews')</a></li>
                    <li><a class="personal-sidebar--item @if($request->get('tab') == 'left_feedback') active @endif" href="{{ route('profile', ['locale' => app()->getLocale(), 'tab' => 'left_feedback']) }}">@lang('front.profile.left_reviews')</a></li>
                  </ul>
                </div>
                <div class="personal-sidebar--content gogocar-box">
                  <div class="account-control--bottom__panel--header">
                    <div class="account-control--title--wrap">
                      <h3 class="account-control--title">@lang('front.profile.account')</h3>
                    </div>
                  </div>
                  <ul class="personal-sidebar--list">
                        <li><a class="personal-sidebar--item @if($request->get('tab') == 'payment') active @endif" href="{{ route('profile', ['locale' => app()->getLocale(), 'tab' => 'payment']) }}">@lang('front.profile.payment')</a></li>
                        <li><a class="personal-sidebar--item @if($request->get('tab') == 'payment_method') active @endif" href="{{ route('profile', ['locale' => app()->getLocale(), 'tab' => 'payment_method']) }}">@lang('front.profile.transfer_method')</a></li>
                        <li><a class="personal-sidebar--item @if($request->get('tab') == 'alerts') active @endif" href="{{ route('profile', ['locale' => app()->getLocale(), 'tab' => 'alerts']) }}">@lang('front.profile.alerts')</a>
                        </li>
                        <li>
                            <a class="personal-sidebar--item" href="{{ route('personal-message', app()->getLocale()) }}" >@lang('front.profile.message')</a>
                        </li>
                        <li><a class="personal-sidebar--item @if($request->get('tab') == 'account') active @endif" href="{{ route('profile', ['locale' => app()->getLocale(), 'tab' => 'account']) }}">@lang('front.profile.account2')</a></li>
                        <li><a class="personal-sidebar--item @if($request->get('tab') == 'support' || $request->get('demand_id') != null) active @endif" href="{{ route('profile', ['locale' => app()->getLocale(), 'tab' => 'support']) }}">@lang('front.profile.support')</a>
                        </li>
                        <li><a class="personal-sidebar--item @if($request->get('tab') == 'password') active @endif" href="{{ route('profile', ['locale' => app()->getLocale(), 'tab' => 'password']) }}">@lang('front.profile.password')</a></li>
                        <li><a class="personal-sidebar--item @if($request->get('tab') == 'close_account') active @endif" href="{{ route('profile', ['locale' => app()->getLocale(), 'tab' => 'close_account']) }}">@lang('front.profile.close_account')</a></li>
                    </ul>
                </div>
              </div>
        </div>
    </div>
</header>
