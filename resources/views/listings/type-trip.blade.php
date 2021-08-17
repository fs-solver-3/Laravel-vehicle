@extends('layouts.user_app')
@section('title', 'Предложить поездку')
@section('content')
<div class="content">
    <section class="breadcrumbs">
        <div class="container">
            <ul class="breadcrumbs--list">
                <a class="breadcrumbs--item" href="/">@lang('front.profile.home')
                    <svg class="icon icon-arrow-right3 ">
                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#arrow-right3') }}"></use>
                    </svg>
                </a>
                <a class="breadcrumbs--item" href="{{ route('search', app()->getLocale()) }}">@lang('front.header.find')<span>&nbsp @lang('front.header.trip')</span></a>
            </ul>
        </div>
    </section>
    <section class="type-trip">
        <div class="container">
            <div class="type-trip--wrap">
                <h1 class="main-section--title text-center mb-5">@lang('front.type_trip.what_kind') <span>@lang('front.type_trip.you_have_trip') ?</span></h1>
                <div class="col-xl-9 col-lg-9 type-trip--list">
                    <div class="col-xl-6">
                        <div class="type-trip--item gogocar-box">
                            <svg class="icon icon-svg2 ">
                                <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#svg2') }}"></use>
                            </svg>
                            <div class="plan-trip--title">@lang('front.type_trip.passenger_transportation')</div>
                            <div class="section-desc">@lang('front.type_trip.are_you_plan')</div><a
                                class="gogocar-yellow-button"
                                href="{{ route('suggestFromPassenger', app()->getLocale()) }}">@lang('front.type_trip.select')</a>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="type-trip--item gogocar-box">
                            <svg class="icon icon-cargo ">
                                <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#cargo') }}"></use>
                            </svg>
                            <div class="plan-trip--title">@lang('front.type_trip.freight_trip')</div>
                            <div class="section-desc">@lang('front.type_trip.are_you_plan_truck')</div><a
                                class="gogocar-yellow-button"
                                href="{{ route('suggestFromCargo', app()->getLocale()) }}">@lang('front.type_trip.select')</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection

@section('user_lang')
    @include('includes.user_flag')
@endsection