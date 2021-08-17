@inject('request', 'Illuminate\Http\Request')
@extends('layouts.user_app')
@section('content')
<script>
    window.profile_url = '{{ route('profile', ['locale' => app()->getLocale(), 'tab' => 'personal_data']) }}';
</script>
<div class="content">
    <section class="breadcrumbs personal-fixed-chat--bread">
        <div class="container">
            <div class="breadcrumb--title">Сообщения</div>
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
    <section class="personal-settings personal-fixed-chat-p pt-0 you-trip--content">
        <div class="col-xl-6 col-lg-6 gogocar-you-trip--wrap m-0-auto">
            <div class="gogocar-gray-button @if($request->type != 'driver') active @endif" data-gogocar="driver">Я водитель</div>
            <div class="gogocar-gray-button @if($request->type == 'driver') active @endif" data-gogocar="companion">Я попутчик</div>
        </div>
        <div class="gogocar-trip--item driver @if($request->type != 'driver') active @endif">
            <div id="app">
                @if(!is_null($request->room) && ($request->type == 'passenger' ||  $request->type == 'admin'))
                    <chat-com :room_id="{{$request->room}}" :message_type="'{{$request->type}}'" ></chat-com>
                @else
                    <chat-com></chat-com>
                @endif
            </div>
        </div>
        <div class="gogocar-trip--item companion @if($request->type == 'driver') active @endif">
            <div id="app2">
                @if($request->type == 'driver')
                    <chat-passenger-com></chat-passenger-com>
                @else
                    <chat-passenger-com></chat-passenger-com>
                @endif
            </div>
        </div>
    </section>
</div>
<style>
    @media (max-width: 768px) {
        html {
            height  : 100%;
            overflow-y: hidden;
            position: relative;
        }
        .mobile-flow{
            overflow-y: hidden !important
        }
    }
</style>
<script>
    let vh = window.innerHeight * 0.01;
    // Then we set the value in the --vh custom property to the root of the document
    document.documentElement.style.setProperty('--vh', `${vh}px`);
</script>
@endsection
@section('user_lang')
    @include('includes.user_flag')
@endsection