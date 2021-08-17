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
        <div class="header-mobile-menu header-mobile-menu-main">
            <div class="personal-sidebar--content--wrap">
                <div class="personal-sidebar--content gogocar-box">
                    <ul class="header-profile--menu--list">
                        <a class="header-profile--menu--item" href="{{ route('personal_Control', app()->getLocale()) }}">
                            <svg class="icon icon-home ">
                                <use xlink:href="{{asset('static/img/svg/symbol/sprite.svg#home')}}"></use>
                            </svg><span>@lang('front.header.management')</span>
                        </a>
                        <a class="header-profile--menu--item"  href="{{ route('profile', ['locale' => app()->getLocale(), 'tab' => 'personal_data']) }}">
                            <svg class="icon icon-profile ">
                                <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#profile') }}"></use>
                            </svg><span>@lang('front.header.profile')</span>
                        </a>
                        <a class="header-profile--menu--item" href="{{ route('personal-message', app()->getLocale()) }}">
                            <svg class="icon icon-message ">
                                <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#message') }}"></use>
                            </svg><span>@lang('front.header.message')</span>
                        </a>
                        <a class="header-profile--menu--item" href="{{ route('trip-alerts', app()->getLocale()) }}">
                            <svg class="icon icon-notific ">
                                <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#notific') }}"></use>
                            </svg><span>@lang('front.header.notification')</span>
                        </a>
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
                    <div class="footer-border">
                        <div class="container">
                          <div class="footer-wrap">
                            <div class="col-xl-3 col-lg-3 col-md-3 footer-items"><a class="footer-logo" href="/">
                                <svg class="icon icon-logo2 ">
                                    <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#logo2')}}"></use>
                                </svg></a>
                                <ul class="footer-copy--social footer-logo-social"><a class="footer-copy--social__item" href="/">
                                    <svg class="icon icon-facebook ">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#facebook')}}"></use>
                                    </svg></a><a class="footer-copy--social__item" href="/">
                                    <svg class="icon icon-instagram ">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#instagram')}}"></use>
                                    </svg></a><a class="footer-copy--social__item" href="/">
                                    <svg class="icon icon-twitter ">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#twitter')}}"></use>
                                    </svg></a><a class="footer-copy--social__item" href="/">
                                    <svg class="icon icon-whatsapp ">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#whatsapp')}}"></use>
                                    </svg></a></ul>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-5 footer-items">
                              <div class="footer-pages--wrap">
                                <ul class="footer-pages-list">
                                    <a class="footer-pages-item" href="{{ route('about', app()->getLocale()) }}">@lang('front.footer.about')</a>
                                   <a class="footer-pages-item" href="{{ route('faq', app()->getLocale()) }}">@lang('front.footer.faq')</a>
                               </ul>
                                <ul class="footer-pages-list">
                                    <a class="footer-pages-item" href="{{ route('contact', app()->getLocale()) }}">@lang('front.footer.contact')</a>
                                    <a class="footer-pages-item" href="{{ route('looking', app()->getLocale()) }}">@lang('front.footer.looking')</a>
                               </ul>
                                <ul class="footer-pages-list">
                                    <a class="footer-pages-item" href="{{ route('terms', app()->getLocale()) }}">@lang('front.footer.terms')</a>
                                    <a class="footer-pages-item" href="{{ route('service', app()->getLocale()) }}">@lang('front.footer.service')</a>
                               </ul>
                              </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-4 footer-items">
                                <div class="footer-select-list">
                                    <div class="footer-country-list">
                                        <div class="footer-country-item fci-choised">
                                            @if(session()->get('currency') == null || session()->get('currency') == 'UZS')
                                               <div class="footer-country-item__img currency-gocar" data-currency="UZS" style="background-image:url('{{ asset('static/img/general/lang/uz.png')}}');"></div><span>UZS</span>
                                            @else
                                               <div class="footer-country-item__img currency-gocar" data-currency="RUB" style="background-image:url('{{ asset('static/img/general/lang/ru.png')}}');"></div><span>RUB</span>
                                            @endif
                                            <svg class="icon icon-arrow-right3 ">
                                                <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#arrow-right3')}}"></use>
                                            </svg>
                                        </div>
                                        <div class="footer-country-list--block">
                                            <div class="footer-country-item fci-choise currency-gocar" data-currency="UZS">
                                                <div class="footer-country-item__img"  style="background-image:url('{{ asset('static/img/general/lang/uz.png')}}');"></div><span>UZS</span>
                                            </div>
                                            <div class="footer-country-item fci-choise currency-gocar" data-currency="RUB">
                                                <div class="footer-country-item__img"  style="background-image:url('{{ asset('static/img/general/lang/ru.png')}}');"></div><span>RUB</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="footer-country-list2">
                                        <div class="footer-country-item2">
                                            @if(app()->getLocale() == 'ru')
                                            <div class="footer-country-item__img" style="background-image:url('{{ asset('static/img/general/lang/ru.png')}}');"></div>
                                            @endif
                                            @if(app()->getLocale() == 'uz')
                                            <div class="footer-country-item__img" style="background-image:url('{{ asset('static/img/general/lang/uz.png')}}');"></div>
                                            @endif
                                            <svg class="icon icon-arrow-right3 ">
                                                <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#arrow-right3')}}"></use>
                                            </svg>
                                        </div>
                                        @include('includes.user_flag')
                                    </div>
                                </div>
                            </div>
                          </div>
                        </div>
                        <div class="footer-copyright">
                            <div class="container">
                                <div class="footer-copy--wrap">
                                    <div class="footer-copy--info">GoGoCar, {{ now()->year }} ©</div>
                                    <ul class="footer-copy--social"><a class="footer-copy--social__item" href="/">
                                            <svg class="icon icon-facebook ">
                                                <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#facebook')}}"></use>
                                            </svg></a><a class="footer-copy--social__item" href="/">
                                            <svg class="icon icon-instagram ">
                                                <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#instagram')}}"></use>
                                            </svg></a><a class="footer-copy--social__item" href="/">
                                            <svg class="icon icon-twitter ">
                                                <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#twitter')}}"></use>
                                            </svg></a><a class="footer-copy--social__item" href="/">
                                            <svg class="icon icon-whatsapp ">
                                                <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#whatsapp')}}"></use>
                                            </svg></a>
                                    </ul>
                                </div>
                            </div>
                        </div>
                      </div>
                </div>
            </div>
        </div>
    </div>
</header>
