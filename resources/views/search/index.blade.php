@extends('layouts.user_app')
@section('title', 'Найти поездку')
@section('content')
@php
    use Hashids\Hashids;
    $hashids = new Hashids();
@endphp
<div class="content">
    <section class="breadcrumbs">
        <div class="container">
            <ul class="breadcrumbs--list">
                <a class="breadcrumbs--item" href="/">@lang('front.profile.home')
                    <svg class="icon icon-arrow-right3 ">
                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#arrow-right3') }}"></use>
                    </svg>
                </a>
                <a class="breadcrumbs--item" href="{{ route('choosetype', app()->getLocale()) }}"><span>@lang('front.header.suggest') &nbsp</span><span>@lang('front.header.trip')</span></a>
            </ul>
        </div>
    </section>
    <section class="find-trip">
        <div class="container">
            <div class="find-trip--wrap">
                <h1 class="main-section--title text-center mb-5">@lang('front.search_page.what_kind') <span>@lang('front.search_page.transportations')</span></h1>
                <div class="col-xl-10 find-trip-choise--wrap p-0">
                    <div class="find-trip-peoples find-trips-tab active" data-trip="trip-peoples">
                        <div class="find-trip-icon__text">
                            <svg class="icon icon-svg2 ">
                                <use xlink:href="{{asset('static/img/svg/symbol/sprite.svg#svg2')}}"></use>
                            </svg><span>@lang('front.search_page.passenger_transportation')</span>
                        </div>
                        <div class="find-trip-checkbox"></div>
                    </div>
                    <div class="find-trip-cargo find-trips-tab" data-trip="trip-cargo">
                        <div class="find-trip-icon__text">
                            <svg class="icon icon-cargo ">
                                <use xlink:href="{{asset('static/img/svg/symbol/sprite.svg#cargo')}}"></use>
                            </svg><span>@lang('front.search_page.freight_transport')</span>
                        </div>
                        <div class="find-trip-checkbox"></div>
                    </div>
                </div>
                <div class="col-xl-8 find-trip-form--wrapper">
                    <form class="find-trip-form find-trip-form--peoples trip-peoples active" method="GET"
                        action="{{ route('searchcar', app()->getLocale()) }}" onsubmit="return validateFormPassenger()">
                        <h1 class="main-section--title text-center mb-5">@lang('front.search_page.where') <span>@lang('front.search_page.you_want')</span></h1>
                        <div class="find-trip-change--wrap">
                            <div class="gogocar-input--wrapper">
                                <div class="gogocar-input-icon gogocar-gray-icons">
                                    <svg class="icon icon-map2 ">
                                        <use xlink:href="{{asset('static/img/svg/symbol/sprite.svg#map2')}}"></use>
                                    </svg>
                                </div>
                                <input class="gogocar-input-v1 gogocar-from map-input" id="address1-input" type="text"
                                    name="fc" placeholder="Откуда...">
                                <input type="hidden" name="address1_latitude" id="address1-latitude" value="0" />
                                <input type="hidden" name="address1_longitude" id="address1-longitude" value="0" />
                                <input type="hidden" name="address1_component" id="address1-component" value="0" />
                                <input type="hidden" name="current_lat" class="current_lat" value="0" />
                                <input type="hidden" name="current_lng" class="current_lng" value="0" />
                            </div>
                            <div class="gogocar-input--wrapper">
                                <div class="gogocar-input-icon gogocar-gray-icons">
                                    <svg class="icon icon-map2 ">
                                        <use xlink:href="{{asset('static/img/svg/symbol/sprite.svg#map2')}}"></use>
                                    </svg>
                                </div>
                                <input class="gogocar-input-v1 gogocar-to map-input" id="address2-input" type="text"
                                    name="dc" placeholder="Куда...">
                                <input type="hidden" name="address2_latitude" id="address2-latitude" value="0" />
                                <input type="hidden" name="address2_longitude" id="address2-longitude" value="0" />
                                <input type="hidden" name="address2_component" id="address2-component" value="0" />
                            </div>
                            <div class="find-trip-change gogocar-yellow-icons">
                                <svg class="icon icon-sort ">
                                    <use xlink:href="{{asset('static/img/svg/symbol/sprite.svg#sort')}}"></use>
                                </svg>
                            </div>
                        </div>
                        <div class="find-trip-data__count">
                            <div class="gogocar-input--wrapper w-48">
                                <div class="gogocar-input-icon gogocar-gray-icons">
                                    <svg class="icon icon-calendar ">
                                        <use xlink:href="{{asset('static/img/svg/symbol/sprite.svg#calendar')}}"></use>
                                    </svg>
                                </div>
                                <input
                                    class="gogocar-input-v1 popup-show-calendar popup-show-calendar-click calendar-zone-height"
                                    name="date" type="text" readonly>
                                <input type="hidden" name="hour" id="client_hours" value="0" />
                            </div>
                            <div class="gogocar-input--wrapper w-48">
                                <div class="gogocar-input-icon gogocar-gray-icons">
                                    <svg class="icon icon-man ">
                                        <use xlink:href="{{asset('static/img/svg/symbol/sprite.svg#man')}}"></use>
                                    </svg>
                                </div>
                                <input class="gogocar-input-v1 main-section-search--input__peoples" type="text"
                                    name="count" value="1 пассажир" readonly>
                                <div class="main-section-search--peoples__count--wrap">
                                    <div class="main-section-search--peoples__count">
                                        <div
                                            class="main-section-search--minus main-section-search--controls people-count-start">
                                            <svg class="icon icon-minus ">
                                                <use xlink:href="{{asset('static/img/svg/symbol/sprite.svg#minus')}}">
                                                </use>
                                            </svg>
                                        </div>
                                        <div class="main-section-search-count-div">1</div>
                                        <div class="main-section-search--plus main-section-search--controls">
                                            <svg class="icon icon-add ">
                                                <use xlink:href="{{asset('static/img/svg/symbol/sprite.svg#add')}}">
                                                </use>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button class="gogocar-yellow-button find-trip-submit" type="submit">@lang('front.search_page.find')</button>
                    </form>
                    <form class="find-trip-form find-trip-form--cargo trip-cargo" method="GET"
                        action="{{ route('searchcargo', app()->getLocale()) }}" onsubmit="return validateForm()">
                        <h1 class="main-section--title text-center mb-5">@lang('front.search_page.when_how') <span>@lang('front.search_page.you_want_to_send')?</span></h1>
                        <div class="find-trip-change--wrap">
                            <div class="gogocar-input--wrapper">
                                <div class="gogocar-input-icon gogocar-gray-icons">
                                    <svg class="icon icon-map2 ">
                                        <use xlink:href="{{asset('static/img/svg/symbol/sprite.svg#map2')}}"></use>
                                    </svg>
                                </div>
                                <input class="gogocar-input-v1 gogocar-from--cargo map-input" id="address3-input"
                                    name="fc" type="text" placeholder="Откуда...">
                                <input type="hidden" name="address3_latitude" id="address3-latitude" value="0" />
                                <input type="hidden" name="address3_longitude" id="address3-longitude" value="0" />
                                <input type="hidden" name="address3_component" id="address3-component" value="0" />
                            </div>
                            <div class="gogocar-input--wrapper">
                                <div class="gogocar-input-icon gogocar-gray-icons">
                                    <svg class="icon icon-map2 ">
                                        <use xlink:href="{{asset('static/img/svg/symbol/sprite.svg#map2')}}"></use>
                                    </svg>
                                </div>
                                <input class="gogocar-input-v1 gogocar-to--cargo map-input" id="address4-input"
                                    type="text" name="dc" placeholder="Куда...">
                                <input type="hidden" name="address4_latitude" id="address4-latitude" value="0" />
                                <input type="hidden" name="address4_longitude" id="address4-longitude" value="0" />
                                <input type="hidden" name="address4_component" id="address4-component" value="0" />
                            </div>
                            <div class="find-trip-change--cargo gogocar-yellow-icons">
                                <svg class="icon icon-sort ">
                                    <use xlink:href="{{asset('static/img/svg/symbol/sprite.svg#sort')}}"></use>
                                </svg>
                            </div>
                        </div>
                        <div class="find-trip-data__weight">
                            <div class="gogocar-input--wrapper w-48">
                                <div class="gogocar-input-icon gogocar-gray-icons">
                                    <svg class="icon icon-calendar ">
                                        <use xlink:href="{{asset('static/img/svg/symbol/sprite.svg#calendar')}}"></use>
                                    </svg>
                                </div>
                                <input
                                    class="gogocar-input-v1 popup-show-calendar popup-show-calendar-click calendar-zone-height"
                                    name="date" type="text" readonly>
                                    <input type="hidden" name="hour" id="client_hours_cargo" value="0" />
                            </div>
                            <div class="gogocar-input--wrapper gogocar-placeholder w-48">
                                <div class="gogocar-input-icon gogocar-gray-icons ">
                                    <svg class="icon icon-weight ">
                                        <use xlink:href="{{asset('static/img/svg/symbol/sprite.svg#weight')}}"></use>
                                    </svg>
                                </div>
                                <input class="gogocar-input-v1 trip-search-cargo" type="text" name="capacity">
                                <label>@lang('front.search_page.total_weight') <span>(кг)</span></label>
                            </div>
                        </div>
                        <div class="find-trip-data__weight">
                            <div class="gogocar-input--wrapper gogocar-placeholder w-48">
                                <div class="gogocar-input-icon gogocar-gray-icons">
                                    <svg class="icon icon-volume ">
                                        <use xlink:href="{{asset('static/img/svg/symbol/sprite.svg#volume')}}"></use>
                                    </svg>
                                </div>
                                <input class="gogocar-input-v1 trip-search-cargo" type="text" name="place">
                                <label>@lang('front.search_page.total_volumn')<span>(м3)</span></label>
                            </div>
                            <div class="gogocar-input--wrapper gogocar-placeholder w-48">
                                <div class="gogocar-input-icon gogocar-gray-icons">
                                    <svg class="icon icon-gabar ">
                                        <use xlink:href="{{asset('static/img/svg/symbol/sprite.svg#gabar')}}"></use>
                                    </svg>
                                </div>
                                <input class="gogocar-input-v1 trip-search-cargo" type="text" name="max_size">
                                <label>@lang('front.search_page.total_dimention')<span>(м)</span></label>
                            </div>
                        </div>
                        <div class="find-trip-change--wrap mb-5">
                            <div class="gogocar-input--wrapper">
                                <div class="gogocar-input-icon gogocar-gray-icons">
                                    <svg class="icon icon-type-cargo ">
                                        <use xlink:href="{{asset('static/img/svg/symbol/sprite.svg#type-cargo')}}">
                                        </use>
                                    </svg>
                                </div>
                                <div class="gogocar-input-hidden-cargo-find"></div>
                                <input class="gogocar-input-v1 gogocar-from ggc-type-cargo" type="hidden" name="cargotype">
                                <div class="gogocar-add-cargo-type gogocar-gray-icons" data-toggle="modal"
                                    data-target="#popup-cargo-type">
                                    <svg class="icon icon-plus ">
                                        <use xlink:href="{{asset('static/img/svg/symbol/sprite.svg#plus')}}"></use>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <button class="gogocar-yellow-button find-trip-submit" type="submit">@lang('front.search_page.find')</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    @if(isset($trips) && count($trips) > 0)
    <section class="popular-trip-slider">
        <h3 class="section-title">@lang('front.search_page.popular')</h3>
        <p class="section-desc">@lang('front.search_page.find_trip')</p>
        <div class="popular-trip-slider-js">
            @foreach ($trips as $trip)
            <div class="gogocar-trip--item">
                <div class="gogocar-trip--item__top">
                    <div class="gogocar-trip--item-town__route">
                        <div class="gogocar-trip--item__town">
                            <span>{{$trip->sourcecity->city}}</span><span>{{ $trip->destinationcity->city }}</span>
                        </div>
                        <div class="gogocar-trip--item__route">
                            <div class="gogocar-trip--item__route--start"></div>
                            <div class="gogocar-trip--item__route--end"></div>
                        </div>
                        @php
                        $seconds = $trip->time;
                        $hours = floor($seconds / 3600);
                        $h = floor($seconds / 3600);
                        $seconds -= $hours * 3600;
                        $minutes = floor($seconds / 60);
                        @endphp
                        <div class="gogocar-trip--item__km">{{ round($trip->distance/1000) }} км  <span>( {{ $hours }}
                                ч. {{ $minutes }} мин. )</span>
                                <p>{{round($trip->distance_from_you)}}km @lang('front.search_page.from_you')</p>
                        </div>
                    </div>
                </div>
                <div class="gogocar-trip--item__bottom">
                    <div class="gogocar-trip--item__price money" data-currency-rub="{{Helper::convertCurrency($trip->price_per_seat, 'UZS', 'RUB')}}" data-currency-uzs="{{$trip->price_per_seat}}">от {{ $trip->price_per_seat }} UZS</div>
                     @php
                        if($trip->car_id != null)
                            $trip_type2 = "passenger";
                        elseif($trip->truck_id != null)
                            $trip_type2 = "cargo";
                        else
                            $trip_type2 = null;
                     @endphp
                    {{-- <a href="{{ route('tripplan', [app()->getLocale(), 't_id'=>$hashids->encode($trip->id), 'type'=>$trip_type2]) }}">
                        <div class="gogocar-gray-icons2">
                            <svg class="icon icon-arrow-right3 ">
                                <use xlink:href="{{asset('static/img/svg/symbol/sprite.svg#arrow-right3')}}"></use>
                            </svg>
                        </div>
                    </a> --}}
                    @if(Auth::user())
                        @if(!is_null($trip->user) && ($trip->user->id != optional(Auth::user())->id))
                            <a href="{{ route('tripplan', [app()->getLocale(), 't_id'=>$hashids->encode($trip->id), 'type'=>$trip_type2]) }}">
                                <div class="gogocar-gray-icons2">
                                    <svg class="icon icon-arrow-right3 ">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#arrow-right3') }}">
                                        </use>
                                    </svg>
                                </div>
                            </a>
                        @else
                            <a href="{{ route('trip-detail', [app()->getLocale(), 't_id'=>$hashids->encode($trip->id)]) }}">
                                <div class="gogocar-gray-icons2">
                                    <svg class="icon icon-arrow-right3 ">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#arrow-right3') }}">
                                        </use>
                                    </svg>
                                </div>
                            </a>
                        @endif
                    @else
                        <a href="#"  data-toggle="modal" data-target="#popup-login">
                            <div class="gogocar-gray-icons2">
                                <svg class="icon icon-arrow-right3 ">
                                    <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#arrow-right3') }}">
                                    </use>
                                </svg>
                            </div>
                        </a>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
        <div class="popular-dots--wrap"></div>
        <div class="gogocar-yellow-button">@lang('front.search_page.find_trip')</div>
    </section>
    @endif
</div>
<div id="address-map-container" style="display: none; ">
    <div style="width: 100%; height: 100%" id="address1-map"></div>
    <div style="width: 100%; height: 100%" id="address2-map"></div>
    <div style="width: 100%; height: 100%" id="address3-map"></div>
    <div style="width: 100%; height: 100%" id="address4-map"></div>
</div>

<div class="modal fade" id="popup-input-value" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered popup-modal--wrap" role="document">
        <div class="modal-content popup-content">
            <div class="popup-covid--wrap popup-icon-size">
                <p class="popup-trip-finish">@lang('front.search_page.input_address')</p>
                <div class="gogocar-yellow-button w-170" id="finish">@lang('front.search_page.ok')</div>
            </div>
        </div>
    </div>
</div>
<script>
    function validateForm() {
        // var lat = $('#address1-latitude').val();
        // var lng = $('#address1-longitude').val();
        const address3 = $('#address3-component').val();
        const address4 = $('#address4-component').val();
        if (address3 == 0 || address4 == 0) {
            $('#popup-input-value').modal('show');
            return false;
        }

        currentHours();
        localStorage.clear();

    }
    function validateFormPassenger() {
     // var lat = $('#address1-latitude').val();
     // var lng = $('#address1-longitude').val();
     const address1 = $('#address1-component').val();
     const address2 = $('#address2-component').val();
        if (address1 == 0 || address2 == 0) {
            $('#popup-input-value').modal('show');
            return false;
        }
        currentHours();
     }

    $( "#finish" ).click(function() {
        $('#popup-input-value').modal('hide');
        $('#address-input').focus();
    });

    function currentHours(){
        let s= new Date().toLocaleString();
        $('#client_hours').val(s);
        $('#client_hours_cargo').val(s);
    }

    $(document).ready(function() {
        $('.trip-search-cargo').change(function(){
            if($(this).val().length > 0){
                $(this).siblings('label').hide();
            }else{
                $(this).siblings('label').show();
            }
            let id = $(this).attr('id');
            localStorage.setItem('cargo-search' + id, $(this).val());
        })
        $('.trip-search-cargo').each(function(){
            if($(this).val().length > 0){
                $(this).siblings('label').hide();
            }else{
                $(this).siblings('label').show();
            }
            let id = $(this).attr('id');
            localStorage.setItem('cargo-search' + id, $(this).val());
        })
    })
</script>
@endsection

@section('user_lang')
    @include('includes.user_flag')
@endsection