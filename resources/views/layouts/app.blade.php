<!DOCTYPE html>
<html lang="ru-RU">

<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <!--[if IE]>
    <meta http-equiv="X-UA-Compatible" content="IE = edge"><![endif]-->
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="keywords" content="">
    <link rel="stylesheet" type="text/css" href="{{asset('css/inspinia.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('css/admin.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('css/main.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/chat.css')}}">
    @yield('add_css')
    <script>
        window.Laravel = {!!json_encode(['csrfToken' => csrf_token()
                , 'user' => ['authenticated' => auth() -> check()
                    , 'id' => auth() -> check() ? auth() -> user() -> id : null
                    , 'name' => auth() -> check() ? auth() -> user() -> name : null
                    , 'avatar' => auth() -> check() ? auth() -> user() -> avatar : null
                , ]
            ]) !!};
    </script>
    <!--[if lt IE 9]>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.2/html5shiv.min.js"></script><![endif]-->
</head>

<body class="index-page">
    <div class="wrapper">
        <div class="left-and-right-side">
            <sidebar class="col-xl-2_5 col-lg-3 col-md-4 col-sm-10 left-side box-bg">
                <div class="nav-sidebar">
                    <div class="nav-sidebar--admin">
                        @if(is_null(Auth::user()->avatar))
                        <div class="nav-sidebar--admin__img"
                            style="background-image:url('{{ asset('/static/img/general/ava.png') }}');"></div>
                        @else
                        <div class="nav-sidebar--admin__img"
                            style="background-image:url('{{ asset(Auth::user()->avatar) }}');">
                        </div>
                        @endif
                        <div class="nav-sidebar--admin__info">
                            <div class="nav-sidebar--admin__name">@if(Auth::user()){{Auth::user()->name}}@endif</div>
                            <div class="nav-sidebar--admin__role">@if(Auth::user()){{Auth::user()->role[0]->title}}@endif</div>
                        </div>
                    </div>
                    <div class="nav-sidebar--sections">
                        <ul class="nav-sidebar-menu--list">
                            @can('Setting_access')
                            <a href="{{ route('admin.settings', app()->getLocale()) }}">
                                <li class="nav-sidebar-menu--item  @if( $controller=='SettingController' ) active @endif">
                                    <div class="nav-sidebar-menu--item--wrap">
                                        <div class="nav-sidebar-menu--item__left-side">
                                            <img src="{{asset('admin/settings-menu.svg')}}" alt="for you">
                                            <div class="nav-sidebar-menu--item__name" style="margin-left: 10px;">@lang('global.settings.title')</div>
                                        </div>
                                    </div>
                                </li>
                            </a>
                            @endcan
                            @can('user_access')
                            <li class="nav-sidebar-menu--item @if( $controller=='UsersController' || $controller=='RolesController' || $controller=='PermissionsController' ) active @endif">
                                <div class="nav-sidebar-menu--item--wrap">
                                    <div class="nav-sidebar-menu--item__left-side">
                                        <svg class="icon icon-user-control ">
                                            <use
                                                xlink:href="{{ asset('static/img/svg/symbol/sprite_admin.svg#user-control') }}">
                                            </use>
                                        </svg>
                                        <div class="nav-sidebar-menu--item__name">@lang('global.sidebar.user_management')</div>
                                    </div>
                                    <div class="nav-sidebar-menu--item__right-side">
                                        <svg class="icon icon-arrow-down-white ">
                                            <use
                                                xlink:href="{{ asset('static/img/svg/symbol/sprite_admin.svg#arrow-down-white') }}">
                                            </use>
                                        </svg>
                                    </div>
                                </div>
                                <ul class="nav-sidebar-menu--list--depth2">
                                    <a class="nav-sidebar-menu--item--depth2 @if(Route::currentRouteName()=='admin.users.index' ) active @endif"
                                        href="{{route('admin.users.index', app()->getLocale())}}">@lang('global.sidebar.users')</a>
                                    <a class="nav-sidebar-menu--item--depth2 @if(Route::currentRouteName()=='admin.permissions.index' ) active @endif"
                                        href="{{route('admin.permissions.index', app()->getLocale())}}">@lang('global.sidebar.permissions')
                                        доступа</a>
                                    <a class="nav-sidebar-menu--item--depth2 @if(Route::currentRouteName()=='admin.roles.index' ) active @endif"
                                        href="{{route('admin.roles.index', app()->getLocale())}}">@lang('global.sidebar.roles')</a>
                                </ul>
                            </li>
                            @endcan
                            @can('support_access')
                            <li class="nav-sidebar-menu--item @if( $controller=='SupportController' || $controller=='DemandCategoriesController' || $controller=='DemandComplexitiesController' || $controller=='DemandCriticalitiesController' || $controller=='DemandScoresController' || $controller=='DemandStatusesController' || $controller=='FastAnswersController' ) active @endif">
                                <div class="nav-sidebar-menu--item--wrap">
                                    <div class="nav-sidebar-menu--item__left-side">
                                        <svg class="icon icon-support ">
                                            <use
                                                xlink:href="{{ asset('static/img/svg/symbol/sprite_admin.svg#support') }}">
                                            </use>
                                        </svg>
                                        <div class="nav-sidebar-menu--item__name">@lang('global.sidebar.support')</div>
                                    </div>
                                    <div class="nav-sidebar-menu--item__right-side">
                                        <svg class="icon icon-arrow-down-white ">
                                            <use
                                                xlink:href="{{ asset('static/img/svg/symbol/sprite_admin.svg#arrow-down-white') }}">
                                            </use>
                                        </svg>
                                    </div>
                                </div>
                                <ul class="nav-sidebar-menu--list--depth2">
                                    <a class="nav-sidebar-menu--item--depth2 @if(Route::currentRouteName()=='admin.support.index' ) active @endif"
                                        href="{{ route('admin.support.index', app()->getLocale()) }}">@lang('global.sidebar.desktop')</a>
                                    <a class="nav-sidebar-menu--item--depth2 @if(Route::currentRouteName()=='admin.support.appeal' ) active @endif"
                                        href="{{ route('admin.support.appeal', app()->getLocale()) }}">@lang('global.sidebar.appeal')</a>
                                    <a class="nav-sidebar-menu--item--depth2 @if(Route::currentRouteName()=='admin.support.graph' ) active @endif"
                                        href="{{ route('admin.support.graph', app()->getLocale()) }}">@lang('global.sidebar.graph')</a>
                                    <li class="nav-sidebar-menu--item--depth2">
                                        <div class="nav-sidebar-menu--item--depth2--wrap">
                                            <div class="nav-sidebar-menu--item--depth2--text">@lang('global.sidebar.directories')</div>
                                            <div class="nav-sidebar-menu--item--depth2--icon">
                                                <svg class="icon icon-arrow-down-white ">
                                                    <use
                                                        xlink:href="{{ asset('static/img/svg/symbol/sprite_admin.svg#arrow-down-white') }}">
                                                    </use>
                                                </svg>
                                            </div>
                                        </div>
                                        <ul class="nav-sidebar-menu--list--depth3">
                                            <a class="nav-sidebar-menu--item--depth3 @if(Route::currentRouteName()=='admin.demand_categories.index' ) active @endif"
                                                href="{{ route('admin.demand_categories.index', app()->getLocale()) }}">@lang('global.sidebar.category')</a>
                                            <a class="nav-sidebar-menu--item--depth3 @if(Route::currentRouteName()=='admin.demand_criticality.index' ) active @endif"
                                                href="{{ route('admin.demand_criticality.index', app()->getLocale()) }}">@lang('global.sidebar.criticality')</a>
                                            <a class="nav-sidebar-menu--item--depth3 @if(Route::currentRouteName()=='admin.demand_status.index' ) active @endif"
                                                href="{{ route('admin.demand_status.index', app()->getLocale()) }}">@lang('global.sidebar.state')</a>
                                            <a class="nav-sidebar-menu--item--depth3 @if(Route::currentRouteName()=='admin.demand_score.index' ) active @endif"
                                                href="{{ route('admin.demand_score.index', app()->getLocale()) }}">@lang('global.sidebar.score')</a>
                                            <a class="nav-sidebar-menu--item--depth3 @if(Route::currentRouteName()=='admin.demand_complexity.index' ) active @endif"
                                                href="{{ route('admin.demand_complexity.index', app()->getLocale()) }}">@lang('global.sidebar.difficulity')</a>
                                            <a class="nav-sidebar-menu--item--depth3 @if(Route::currentRouteName()=='admin.fast_answers.index' ) active @endif"
                                                href="{{ route('admin.fast_answers.index', app()->getLocale()) }}">@lang('global.sidebar.fast')</a>
                                        </ul>
                                    </li>
                                    <a class="nav-sidebar-menu--item--depth2 @if(Route::currentRouteName()=='admin.support_levels.index' ) active @endif" href="{{ route('admin.support_levels.index', app()->getLocale()) }}">@lang('global.sidebar.support_level')</a>
                                    {{-- <a class="nav-sidebar-menu--item--depth2" href="/">Расписание</a>
                                    <a class="nav-sidebar-menu--item--depth2" href="/">Группы</a> --}}
                                </ul>
                            </li>
                            @endcan
                            @can('trip_access')
                            <a href="{{ route('admin.listing.index', app()->getLocale()) }}" class="links">
                                <li class="nav-sidebar-menu--item">
                                    <div class="nav-sidebar-menu--item--wrap">
                                        <div class="nav-sidebar-menu--item__left-side">
                                            <svg class="icon icon-trip">
                                                <use xlink:href="{{ asset('static/img/svg/symbol/sprite_admin.svg#trip') }}">
                                                </use>
                                            </svg>
                                            <div class="nav-sidebar-menu--item__name">@lang('global.sidebar.trip')</div>
                                        </div>
                                    </div>
                                </li>
                            </a>
                            @endcan
                            @can('review_access')
                            <li class="nav-sidebar-menu--item @if(Route::currentRouteName()=='admin.reviews.index' || Route::currentRouteName()=='admin.info.index' || Route::currentRouteName()=='admin.reason.index' || Route::currentRouteName()=='admin.complains.index' || Route::currentRouteName()=='admin.complains.all') active @endif">
                                <div class="nav-sidebar-menu--item--wrap">
                                    <div class="nav-sidebar-menu--item__left-side">
                                        <svg class="icon icon-review ">
                                            <use xlink:href="{{ asset('static/img/svg/symbol/sprite_admin.svg#review') }}">
                                            </use>
                                        </svg>
                                        <div class="nav-sidebar-menu--item__name">@lang('global.sidebar.review')</div>
                                    </div>
                                    <div class="nav-sidebar-menu--item__right-side">
                                        <svg class="icon icon-arrow-down-white ">
                                            <use
                                                xlink:href="{{ asset('static/img/svg/symbol/sprite_admin.svg#arrow-down-white') }}">
                                            </use>
                                        </svg>
                                    </div>
                                </div>
                                <ul class="nav-sidebar-menu--list--depth2">
                                    <a class="nav-sidebar-menu--item--depth2 @if(Route::currentRouteName()=='admin.reviews.index' ) active @endif"
                                        href="{{route('admin.reviews.index', app()->getLocale())}}">
                                        @lang('global.sidebar.review')
                                    </a>
                                    <a class="nav-sidebar-menu--item--depth2 @if(Route::currentRouteName()=='admin.info.index' ) active @endif"
                                        href="{{route('admin.info.index', app()->getLocale())}}">@lang('global.sidebar.info')</a>
                                    <a class="nav-sidebar-menu--item--depth2 @if(Route::currentRouteName()=='admin.reason.index' ) active @endif"
                                        href="{{route('admin.reason.index', app()->getLocale())}}">@lang('global.sidebar.reason')</a>
                                    <a class="nav-sidebar-menu--item--depth2 @if(Route::currentRouteName()=='admin.complains.index' ) active @endif"
                                        href="{{route('admin.complains.index', app()->getLocale())}}">@lang('global.sidebar.complain_category')</a>
                                    <a class="nav-sidebar-menu--item--depth2 @if(Route::currentRouteName()=='admin.complains.all' ) active @endif"
                                        href="{{route('admin.complains.all', app()->getLocale())}}">@lang('global.sidebar.complain')</a>
                                </ul>
                            </li>
                            @endcan
                            @can('cars_access')
                            <li class="nav-sidebar-menu--item @if( $controller=='CarsController' || $controller=='TrucksController' ||  $controller=='CarBrandsController' || $controller=='CarModelsController' || $controller=='ColorsController') active @endif">
                                <div class="nav-sidebar-menu--item--wrap">
                                    <div class="nav-sidebar-menu--item__left-side">
                                        <svg class="icon icon-car ">
                                            <use xlink:href="{{ asset('static/img/svg/symbol/sprite_admin.svg#car') }}"></use>
                                        </svg>
                                        <a href="{{ route('admin.car.index', app()->getLocale()) }}">
                                            <div class="nav-sidebar-menu--item__name">@lang('global.sidebar.cars')</div>
                                        </a>
                                    </div>
                                    <div class="nav-sidebar-menu--item__right-side">
                                        <svg class="icon icon-arrow-down-white ">
                                            <use
                                                xlink:href="{{ asset('static/img/svg/symbol/sprite_admin.svg#arrow-down-white') }}">
                                            </use>
                                        </svg>
                                    </div>
                                </div>
                                <ul class="nav-sidebar-menu--list--depth2">
                                    <a class="nav-sidebar-menu--item--depth2 @if(Route::currentRouteName()=='admin.car.index' ) active @endif"
                                        href="{{ route('admin.car.index', app()->getLocale()) }}">
                                        Авто
                                    </a>
                                    <a class="nav-sidebar-menu--item--depth2 @if(Route::currentRouteName()=='admin.truck.index' ) active @endif"
                                        href="{{ route('admin.truck.index', app()->getLocale()) }}">@lang('global.sidebar.trucks')
                                    </a>
                                    <a class="nav-sidebar-menu--item--depth2 @if(Route::currentRouteName()=='admin.car_brand.index' ) active @endif"
                                        href="{{ route('admin.car_brand.index', app()->getLocale()) }}">@lang('global.sidebar.car_brand')
                                    </a>
                                    <a class="nav-sidebar-menu--item--depth2 @if(Route::currentRouteName()=='admin.car_model.index' ) active @endif"
                                        href="{{ route('admin.car_model.index', app()->getLocale()) }}">@lang('global.sidebar.car_model')
                                    </a>
                                    <a class="nav-sidebar-menu--item--depth2 @if(Route::currentRouteName()=='admin.colors.index' ) active @endif"
                                        href="{{ route('admin.colors.index', app()->getLocale()) }}">@lang('global.sidebar.color')
                                    </a>
                                </ul>
                            </li>
                            @endcan
                            @can('content_access')
                            <li class="nav-sidebar-menu--item @if( $controller=='PagesController' || $controller=='NewsController' || $controller=='PostsController') active @endif">
                                <div class="nav-sidebar-menu--item--wrap">
                                    <div class="nav-sidebar-menu--item__left-side">
                                        <svg class="icon icon-files ">
                                            <use xlink:href="{{ asset('static/img/svg/symbol/sprite_admin.svg#files') }}"></use>
                                        </svg>
                                        <div class="nav-sidebar-menu--item__name">@lang('global.sidebar.content')</div>
                                    </div>
                                    <div class="nav-sidebar-menu--item__right-side">
                                        <svg class="icon icon-arrow-down-white ">
                                            <use
                                                xlink:href="{{ asset('static/img/svg/symbol/sprite_admin.svg#arrow-down-white') }}">
                                            </use>
                                        </svg>
                                    </div>
                                </div>
                                <ul class="nav-sidebar-menu--list--depth2">
                                    <a class="nav-sidebar-menu--item--depth2 @if(Route::currentRouteName()=='admin.pages.index' ) active @endif" href="{{ route('admin.pages.index', app()->getLocale()) }}">@lang('global.sidebar.page_info')</a>
                                    <a class="nav-sidebar-menu--item--depth2 @if(Route::currentRouteName()=='admin.news.index' ) active @endif" href="{{ route('admin.news.index', app()->getLocale()) }}">@lang('global.sidebar.news')</a>
                                    <a class="nav-sidebar-menu--item--depth2 @if(Route::currentRouteName()=='admin.posts.index' ) active @endif" href="{{ route('admin.posts.index', app()->getLocale()) }}">@lang('global.sidebar.posts')</a>
                                  
                                </ul>
                            </li>
                            @endcan
                            @can('seo_access')
                            <li class="nav-sidebar-menu--item @if( $controller=='SeoAllController' || $controller=='SeoAreasController') active @endif">
                                <div class="nav-sidebar-menu--item--wrap">
                                    <div class="nav-sidebar-menu--item__left-side">
                                        <svg class="icon icon-seo ">
                                            <use xlink:href="{{ asset('static/img/svg/symbol/sprite_admin.svg#seo') }}"></use>
                                        </svg>
                                        <div class="nav-sidebar-menu--item__name">@lang('global.sidebar.seo')</div>
                                    </div>
                                    <div class="nav-sidebar-menu--item__right-side">
                                        <svg class="icon icon-arrow-down-white ">
                                            <use
                                                xlink:href="{{ asset('static/img/svg/symbol/sprite_admin.svg#arrow-down-white') }}">
                                            </use>
                                        </svg>
                                    </div>
                                </div>
                                <ul class="nav-sidebar-menu--list--depth2">
                                    <a class="nav-sidebar-menu--item--depth2 @if(Route::currentRouteName()=='admin.seo_all.index' ) active @endif"
                                        href="{{ route('admin.seo_all.index', app()->getLocale()) }}">@lang('global.sidebar.list_of_cities')</a>
                                    <a class="nav-sidebar-menu--item--depth2 @if(Route::currentRouteName()=='admin.seo_area.index' && $request->type == 'betweencity' ) active @endif" href="{{ route('admin.seo_area.index', ['locale' => app()->getLocale(), 'type' => 'betweencity']) }}">@lang('global.sidebar.general_meta')</a>
                                    <a class="nav-sidebar-menu--item--depth2 @if(Route::currentRouteName()=='admin.seo_area.index' && $request->type == 'city' ) active @endif" href="{{ route('admin.seo_area.index', ['locale' => app()->getLocale(), 'type' => 'city']) }}">@lang('global.sidebar.general_meta_city')</a>
                                    <a class="nav-sidebar-menu--item--depth2 @if(Route::currentRouteName()=='admin.seo_area.index' && $request->type == 'card' ) active @endif" href="{{ route('admin.seo_area.index', ['locale' => app()->getLocale(), 'type' => 'card']) }}">@lang('global.sidebar.general_meta_driver')</a>
                                    <a class="nav-sidebar-menu--item--depth2 @if(Route::currentRouteName()=='admin.seo_area.index' && $request->type == 'auto' ) active @endif" href="{{ route('admin.seo_area.index', ['locale' => app()->getLocale(), 'type' => 'auto']) }}">@lang('global.sidebar.meta_tags_transport')</a>
                                    <a class="nav-sidebar-menu--item--depth2 @if(Route::currentRouteName()=='admin.seo_area.index' && $request->type == 'destination' ) active @endif" href="{{ route('admin.seo_area.index', ['locale' => app()->getLocale(), 'type' => 'destination']) }}">@lang('global.sidebar.list_of_unique')</a>
                                </ul>
                            </li>
                            @endcan
                            @can('passport_access')
                            <li class="nav-sidebar-menu--item @if( $controller=='PassportsController' || $controller=='DriverLisencesController') active @endif">
                                <div class="nav-sidebar-menu--item--wrap">
                                    <div class="nav-sidebar-menu--item__left-side">
                                        <svg class="icon icon-doc ">
                                            <use xlink:href="{{ asset('static/img/svg/symbol/sprite_admin.svg#doc') }}"></use>
                                        </svg>
                                        <div class="nav-sidebar-menu--item__name">@lang('global.sidebar.document')</div>
                                    </div>
                                    <div class="nav-sidebar-menu--item__right-side">
                                        <svg class="icon icon-arrow-down-white ">
                                            <use
                                                xlink:href="{{ asset('static/img/svg/symbol/sprite_admin.svg#arrow-down-white') }}">
                                            </use>
                                        </svg>
                                    </div>
                                </div>
                                <ul class="nav-sidebar-menu--list--depth2">
                                    <a class="nav-sidebar-menu--item--depth2 @if(Route::currentRouteName()=='admin.passport.index' ) active @endif" href="{{ route('admin.passport.index', app()->getLocale()) }}">@lang('global.sidebar.passport')</a>
                                    <a class="nav-sidebar-menu--item--depth2 @if(Route::currentRouteName()=='admin.driver__lisence.index' ) active @endif" href="{{ route('admin.driver__lisence.index', app()->getLocale()) }}">@lang('global.sidebar.driver_license')</a>
                                </ul>
                            </li>
                            @endcan
                            @can('transaction_access')
                            <a href="{{ route('admin.transactions.index', app()->getLocale()) }}">
                            <li class="nav-sidebar-menu--item">
                                <div class="nav-sidebar-menu--item--wrap">
                                    <div class="nav-sidebar-menu--item__left-side">
                                        <svg class="icon icon-ubu ">
                                            <use xlink:href="{{ asset('static/img/svg/symbol/sprite_admin.svg#ubu') }}"></use>
                                        </svg>
                                        <div class="nav-sidebar-menu--item__name">@lang('global.sidebar.operation')</div>
                                    </div>
                                </div>
                            </li>
                            </a>
                            @endcan
                            @can('dashboard_access')
                            <a href="{{ route('admin.dashboard.yandex', app()->getLocale()) }}">
                            <li class="nav-sidebar-menu--item">
                                <div class="nav-sidebar-menu--item--wrap">
                                    <div class="nav-sidebar-menu--item__left-side">
                                        <svg class="icon icon-yandex ">
                                            <use xlink:href="{{ asset('static/img/svg/symbol/sprite_admin.svg#yandex') }}">
                                            </use>
                                        </svg>
                                        <div class="nav-sidebar-menu--item__name">@lang('global.sidebar.yandex_metris')</div>
                                    </div>
                                </div>
                            </li>
                            </a>
                            @endcan
                            @can('dashboard_access')
                            <a href="{{ route('admin.dashboard.google', app()->getLocale()) }}">
                            <li class="nav-sidebar-menu--item @if(Route::currentRouteName()=='admin.dashboard.google' ) class=" active" @endif">
                                <div class="nav-sidebar-menu--item--wrap">
                                    <div class="nav-sidebar-menu--item__left-side">
                                        <svg class="icon icon-google ">
                                            <use xlink:href="{{ asset('static/img/svg/symbol/sprite_admin.svg#google') }}">
                                            </use>
                                        </svg>
                                        <div class="nav-sidebar-menu--item__name">@lang('global.sidebar.google_metris')</div>
                                    </div>
                                </div>

                            </li>
                            </a>
                            @endcan
                            @can('dashboard_access')
                            <li class="nav-sidebar-menu--item  @if( $controller=='DashboardController') active @endif">
                                <div class="nav-sidebar-menu--item--wrap">
                                    <div class="nav-sidebar-menu--item__left-side">
                                        <svg class="icon icon-otc ">
                                            <use xlink:href="{{ asset('static/img/svg/symbol/sprite_admin.svg#otc') }}"></use>
                                        </svg>
                                        <div class="nav-sidebar-menu--item__name">@lang('global.sidebar.reports')</div>
                                    </div>
                                    <div class="nav-sidebar-menu--item__right-side">
                                        <svg class="icon icon-arrow-down-white ">
                                            <use
                                                xlink:href="{{ asset('static/img/svg/symbol/sprite_admin.svg#arrow-down-white') }}">
                                            </use>
                                        </svg>
                                    </div>
                                </div>
                                <ul class="nav-sidebar-menu--list--depth2">
                                    <a class="nav-sidebar-menu--item--depth2 @if(Route::currentRouteName()=='admin.dashboard.trips' ) active @endif" href="{{ route('admin.dashboard.trips', app()->getLocale()) }}">@lang('global.sidebar.trips')</a>
                                    <a class="nav-sidebar-menu--item--depth2 @if(Route::currentRouteName()=='admin.dashboard.profit' ) active @endif" href="{{ route('admin.dashboard.profit', app()->getLocale()) }}">@lang('global.sidebar.profit_report')</a>
                                    <a class="nav-sidebar-menu--item--depth2 @if(Route::currentRouteName()=='admin.dashboard.completed_trips' ) active @endif" href="{{ route('admin.dashboard.completed_trips', app()->getLocale()) }}">Завершено поездок</a>
                                    <a class="nav-sidebar-menu--item--depth2 @if(Route::currentRouteName()=='admin.dashboard.withdraw' ) active @endif" href="{{ route('admin.dashboard.withdraw', app()->getLocale()) }}">@lang('global.sidebar.withdraw_money')</a>
                                    <a class="nav-sidebar-menu--item--depth2 @if(Route::currentRouteName()=='admin.dashboard.transaction' ) active @endif" href="{{ route('admin.dashboard.transaction', app()->getLocale()) }}">@lang('global.sidebar.payout') </a>
                                    <a class="nav-sidebar-menu--item--depth2 @if(Route::currentRouteName()=='admin.dashboard.reviews' ) active @endif" href="{{ route('admin.dashboard.reviews', app()->getLocale()) }}">Отчет по отзывам</a>
                                </ul>
                            </li>
                            @endcan

                            <li class="nav-sidebar-menu--item">
                                <div class="nav-sidebar-menu--item--wrap">
                                    <div class="nav-sidebar-menu--item__left-side">
                                        @if (Session::get('hasClonedUser') == 1)
                                        <a onclick="event.preventDefault(); document.getElementById('cloneuser-form').submit();" class="" style="color: #fff;">
                                            <span class="icon">
                                                <img src="{{asset('admin/back-admin.svg')}}" alt="for you">
                                            </span>
                                            <span class="nav-sidebar-menu--item__name">@lang('front.return')</span>
                                        </a>
                                        <form id="cloneuser-form" action="{{ route('loginAs') }}" method="post">
                                            {{ csrf_field() }}
                                        </form>
                                        @endif
                                    </div>
                                </div>
                            </li>

                    </ul>
                </div>
        </div>
        </sidebar>
        <div class="col-xl-9_5 col-lg-9 col-md-8 col-sm-12 right-side">
            <header class="box-bg pr-50">
                <div class="header-nav-left">
                    <div class="header-nav-left--back gogocar-arrow-button">
                        <svg class="icon icon-arrow-left ">
                            <use xlink:href="{{ asset('static/img/svg/symbol/sprite_admin.svg#arrow-left') }}"></use>
                        </svg>
                    </div>
                    <div class="header-nav-left-menu gogocar-arrow-button">
                        <svg class="icon icon-menu ">
                            <use xlink:href="{{ asset('static/img/svg/symbol/sprite_admin.svg#menu') }}"></use>
                        </svg>
                    </div>
                    <div class="header-logo">
                        <svg class="icon icon-logo ">
                            <use xlink:href="{{ asset('static/img/svg/symbol/sprite_admin.svg#logo') }}"></use>
                        </svg>
                    </div>
                </div>
                <div class="header-nav-right">
                    {{-- <div class="header-right--message header-right--message__notification">
                        <svg class="icon icon-message ">
                            <use xlink:href="{{ asset('static/img/svg/symbol/sprite_admin.svg#message') }}"></use>
                        </svg>
                    </div> --}}
                    <div class="header-right--message header-right--message__notification2 count-info" id="admin-notification">
                        <admin-notification-com></admin-notification-com>
                        <svg class="icon icon-message ">
                            <use xlink:href="{{ asset('static/img/svg/symbol/sprite_admin.svg#message') }}"></use>
                        </svg>
                    </div>
                    <div class="header-right-choise--lang__wrap">
                        <div class="header-right-choise--lang" data-lang="RU">
                            @if(app()->getLocale() == 'ru')
                            <div class="choise-lang__img"
                                style="background-image:url('{{ asset('/static/img/general/lang/lang-ru.png') }}');">
                            </div>
                            @endif
                            @if(app()->getLocale() == 'uz')
                            <div class="choise-lang__img" style="background-image:url('{{ asset('/static/img/general/lang/lang-uz.png') }}');">
                            </div>
                            @endif
                            <div class="choise-lang__arrow">
                                <svg class="icon icon-arrow-down ">
                                    <use xlink:href="{{ asset('static/img/svg/symbol/sprite_admin.svg#arrow-down') }}">
                                    </use>
                                </svg>
                            </div>
                        </div>
                        @yield('admin_lang')
                        {{-- <ul class="choise-lang--list">
                            <li class="choise-lang--item">
                                <div class="choise-lang--item__img"
                                    style="background-image:url('{{ asset('/static/img/general/lang/lang-ru.png') }}');">
                                </div>
                                <div class="choise-lang--item__text">RU</div>
                            </li>
                            <li class="choise-lang--item">
                                <div class="choise-lang--item__img"
                                    style="background-image:url('{{ asset('/static/img/general/lang/lang-uz.png') }}');">
                                </div>
                                <div class="choise-lang--item__text">UZ</div>
                            </li>
                        </ul> --}}
                    </div>
                    <a class="header-profile--menu--logout" href="{{ route('logout', app()->getLocale()) }}">
                    <div class="header-logout">
                        <svg class="icon icon-logout ">
                            <use xlink:href="{{ asset('static/img/svg/symbol/sprite_admin.svg#logout') }}"></use>
                        </svg>
                    </div>
                    </a>
                </div>
            </header>
            <div class="content">
                @yield('content')
            </div>
        </div>
    </div>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/libs.min.js') }}" defer></script>
    <script src="{{ asset('js/admin_main.js') }}" defer></script>
    <script src="{{ asset('js/jquery.simplePagination.js') }}" defer></script>
    <script src="{{ asset('js/admin/theme.js') }}" defer></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('static/js/datepicker.js') }}" defer></script>
    <script src="{{ asset('static/js/datepicker.ru-RU.js') }}" defer></script>
    @yield('add_custom_script')
    <script>window._token = '{{ csrf_token() }}';</script>
    {{-- <script src="static/js/main.js"></script>
    <script src="static/js/datepicker.js"></script>
    <script src="static/js/datepicker.ru-RU.js"></script> --}}
</body>

</html>