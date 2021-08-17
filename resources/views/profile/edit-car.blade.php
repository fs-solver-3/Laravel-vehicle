@inject('request', 'Illuminate\Http\Request')
@extends('layouts.profile_app')
@section('title', 'профиль')
@section('add_css')
    <link rel="stylesheet" type="text/css" href="{{asset('static/css/select2.css')}}" />
@endsection
@section('content')
<div class="content">
    <section class="breadcrumbs">
        <div class="container">
            <div class="breadcrumb--title">@lang('front.profile.profile_infomation')</div>
            <ul class="breadcrumbs--list">
                <a class="breadcrumbs--item" href="/">@lang('front.profile.home')
                    <svg class="icon icon-arrow-right3 ">
                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#arrow-right3') }}">
                        </use>
                    </svg>
                </a>
                <a class="breadcrumbs--item" href="{{ route('personal_Control', app()->getLocale()) }}">@lang('front.profile.account_manage')</a>
            </ul>
        </div>
    </section>
    @if(Session::has('success_message'))
        <div class="container">
            <div class="alert alert-success">
                <span class="glyphicon glyphicon-ok"></span>
                {!! session('success_message') !!}
                <button type="button" class="close" data-dismiss="alert" aria-label="close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    @endif
    <div class="container" id="success_msg" style="display: none;">
        <div class="alert alert-success">
            <span class="glyphicon glyphicon-ok"></span>
            <span id="success_msg_content"></span>
            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
    <section class="personal-settings pt-0">
        <div class="container">
            <div class="personal-settings--wrap">
                <div class="col-xl-3 col-lg-3 personal-sidebar">
                    <div class="personal-sidebar--content--wrap">
                        <div class="personal-sidebar--content gogocar-box container">
                            <div class="account-control--bottom__panel--header">
                                <div class="account-control--title--wrap">
                                    <h3 class="account-control--title">@lang('front.profile.profile_infomation')</h3>
                                </div>
                            </div>
                            <ul class="personal-sidebar--list nav nav-pills">
                                <li>
                                    <a class="personal-sidebar--item @if($request->get('tab') == 'personal_data') active @endif" href="{{ route('profile', ['locale' => app()->getLocale(), 'tab' => 'personal_data']) }}">@lang('front.profile.personal_data')</a>
                                </li>
                                <li>
                                    <a class="personal-sidebar--item @if($request->get('tab') == 'photo') active @endif" href="{{ route('profile', ['locale' => app()->getLocale(), 'tab' => 'photo']) }}">@lang('front.profile.photo')</a>
                                </li>
                                <li >
                                    <a class="personal-sidebar--item @if($request->get('tab') == 'passport') active @endif" href="{{ route('profile', ['locale' => app()->getLocale(), 'tab' => 'passport']) }}" >@lang('front.profile.passport')</a>
                                </li>
                                <li>
                                    <a class="personal-sidebar--item @if($request->get('tab') == 'my_driver_lisence') active @endif" href="{{ route('profile', ['locale' => app()->getLocale(), 'tab' => 'my_driver_lisence']) }}" >@lang('front.profile.driver_license')</a>
                                </li>
                                <li>
                                    <a class="personal-sidebar--item @if($request->get('tab') == 'preference') active @endif" href="{{ route('profile', ['locale' => app()->getLocale(), 'tab' => 'preference']) }}" >@lang('front.profile.my_preference')</a>
                                </li>
                                <li>
                                    <a class="personal-sidebar--item @if($request->get('tab') == 'user_realiability') active @endif" href="{{ route('profile', ['locale' => app()->getLocale(), 'tab' => 'user_realiability']) }}">@lang('front.profile.realibility')
                                    </a>
                                   
                                </li>
                                <li>
                                     @if($request->get('add_car') || Route::currentRouteName()=='profile.car.edit' || Route::currentRouteName()=='profile.truck.edit' )
                                     <a class="personal-sidebar--item  active" href="{{ route('profile', ['locale' => app()->getLocale(), 'tab' => 'car']) }}">@lang('front.profile.my_car')
                                     </a>
                                     @else
                                     <a class="personal-sidebar--item active" href="{{ route('profile', ['locale' => app()->getLocale(), 'tab' => 'car']) }}">@lang('front.profile.my_car')
                                     </a>
                                     @endif
                                </li>
                                <li>
                                    <a class="personal-sidebar--item @if($request->get('tab') == 'mailing_address') active @endif"  href="{{ route('profile', ['locale' => app()->getLocale(), 'tab' => 'mailing_address']) }}">@lang('front.profile.mail_address')</a>
                                </li>
                            </ul>
                        </div>
                        <div class="personal-sidebar--content gogocar-box container">
                            <div class="account-control--bottom__panel--header">
                                <div class="account-control--title--wrap">
                                    <h3 class="account-control--title">@lang('front.profile.reviews')</h3>
                                </div>
                            </div>
                            <ul class="personal-sidebar--list nav nav-pills">
                                <li><a class="personal-sidebar--item @if($request->get('tab') == 'received_feedback') active @endif" href="{{ route('profile', ['locale' => app()->getLocale(), 'tab' => 'received_feedback']) }}">@lang('front.profile.received_reviews')</a></li>
                                <li><a class="personal-sidebar--item @if($request->get('tab') == 'left_feedback') active @endif" href="{{ route('profile', ['locale' => app()->getLocale(), 'tab' => 'left_feedback']) }}">@lang('front.profile.left_reviews')</a></li>
                            </ul>
                        </div>
                        <div class="personal-sidebar--content gogocar-box container">
                            <div class="account-control--bottom__panel--header">
                                <div class="account-control--title--wrap">
                                    <h3 class="account-control--title">@lang('front.profile.account')</h3>
                                </div>
                            </div>
                            <ul class="personal-sidebar--list nav nav-pills">
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
                <div class="col-xl-9 col-lg-9 personal-content tab-content clearfix">
                   
                    <div id="my_car" class="tab-pane active">
                        @include('profile.edit-car-template')
                    </div>
                   
                </div>
            </div>
        </div>

    </section>
</div>

<script src="{{asset('js/select2.full.min.js')}}" type="text/javascript" defer></script>
<script>
    $('document').ready(function() {
        var active_tab = $('.personal-sidebar--list .personal-sidebar--item.active').length;
        if(active_tab == 0){
            $('.personal-sidebar--list .personal-sidebar--item').first().addClass('active');
            $('#personal_data').addClass('active');
        }
    })
</script>
@endsection

