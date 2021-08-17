@extends('layouts.user_app')
@section('content')
<div class="content">
    <section class="car-place">
        <div class="container">
            <form method="GET" action="{{ route('checkbooking', app()->getLocale()) }}" id="place_form">
                <div class="car-place--wrapper">
                    <h1 class="main-section--title text-center mb-5">@lang('front.car-place.where_is') <span>@lang('front.car-place.you_want') ?</span></h1>
                    <div class="car-place--content">
                        <input type="hidden" value="{{$trip_id}}" name="trip_id" id="trip_id">
                        <input type="hidden" value="" name="place" id="place">
                        <div class="col-xl-12 car-place--info">
                            <h3 class="section-title">@lang('front.car-place.select_the_seat')</h3>
                            {{-- <p class="section-desc">Sapien neque nunc diam mi tortor. Senectus tincidunt mi nec at
                                lectus
                                egestas non faucibus. Quisque dui malesuada sed nisi odio nibh in imperdiet ultrices.
                                Tortor
                                augue vitae risus tellus mauris.</p> --}}
                            <div class="trip-select-car">
                                <div class="trip-select--icon--car">
                                    <div class="gogocar-gray-icons">
                                        <svg class="icon icon-taxi ">
                                            <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#taxi') }}">
                                            </use>
                                        </svg>
                                    </div>
                                    <div class="trip-select--car--name">
                                        <div class="trip-select--car--name2">@lang('front.car-place.passenger')</div>
                                    </div>
                                </div>
                                <div class="trip-select--arrow">
                                    <svg class="icon icon-arrow-right ">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#arrow-right') }}">
                                        </use>
                                    </svg>
                                </div>
                            </div>
                            <ul class="trip-select-car--list car-select-car--list">
                                <li class="trip-select-car--item suggest-late--result--item">
                                    <div class="suggest-late--result--item__left">
                                        <div class="gogocar-gray-icons">
                                            <svg class="icon icon-taxi ">
                                                <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#taxi') }}">
                                                </use>
                                            </svg>
                                        </div>
                                        <div class="trip-select-car-name--number">
                                            <div class="trip-select-car-name--number2">@lang('front.car-place.passenger')</div>
                                        </div>
                                    </div>
                                    <div class="gogocar-gray-icons2">
                                        <svg class="icon icon-arrow-right3 ">
                                            <use
                                                xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#arrow-right3') }}">
                                            </use>
                                        </svg>
                                    </div>
                                </li>
                                <li class="trip-select-car--item suggest-late--result--item">
                                    <div class="suggest-late--result--item__left">
                                        <div class="gogocar-gray-icons">
                                            <svg class="icon icon-taxi ">
                                                <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#taxi') }}">
                                                </use>
                                            </svg>
                                        </div>
                                        <div class="trip-select-car-name--number">
                                            <div class="trip-select-car-name--number2">@lang('front.car-place.freight')</div>
                                        </div>
                                    </div>
                                    <div class="gogocar-gray-icons2">
                                        <svg class="icon icon-arrow-right3 ">
                                            <use
                                                xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#arrow-right3') }}">
                                            </use>
                                        </svg>
                                    </div>
                                </li>
                            </ul>
                            <div class="gogocar-ready-plan--covid">
                                <div class="gogocar-gray-icons">
                                    <svg class="icon icon-covid ">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#covid') }}"></use>
                                    </svg>
                                </div>
                                <div class="gogocar-ready-plan--covid--info">
                                    <div class="gogocar-ready-plan--covid--title">@lang('front.car-place.only_1') !</div>
                                    <div class="gogocar-ready-plan--covid--desc">COVID-19: @lang('front.car-place.you_will_be')</div>
                                </div>
                            </div>
                            <button class="gogocar-yellow-button" id="continue_btn">@lang('front.car-place.continue')</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
</div>

<script>
    $("#place_form").submit(function(){
        var place = $('.car-place--position').find('div.active').data('car-place');
        $("#place").val(place);
    });
    $( document ).ready(function() {
        $("#continue_btn").prop('disabled', true);
        $("#continue_btn").css('opacity', 0.5);
        $(".car-place--svg--places").click( function() {
            $(this).addClass('active').siblings().removeClass('active');
            if ($('.car-place--svg--places').hasClass('active')){
                $("#continue_btn").prop('disabled', false);
                $("#continue_btn").css('opacity', 1);
            }
        });
    });
</script>
@endsection