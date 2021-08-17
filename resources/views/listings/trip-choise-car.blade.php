@extends('layouts.user_app')
@section('title', 'какой машине')
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
    <form method="GET" action="{{ route('addPhoto', app()->getLocale()) }}" onsubmit="return validateForm()" id="choose_car">
        <section class="trip-choise-car">
            <div class="container">
                <div class="trip-choise-car">
                    <h1 class="main-section--title--v2 text-center mb-5">@lang('front.trip_choise_car.on') <span>@lang('front.trip_choise_car.which_car')</span> @lang('front.trip_choise_car.plan_to_driver') ?
                    </h1>
                    <div class="col-xl-8 col-lg-8 trip-select-car--wrapper m-0-auto">
                        @if(count($cars) > 0 || count(Auth::user()->buses) > 0 )
                        <div class="trip-select-car">
                            @if(count($cars) > 0)
                                <div class="trip-select--icon--car">
                                    <div class="gogocar-gray-icons">
                                        <svg class="icon icon-taxi ">
                                            <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#taxi') }}"></use>
                                        </svg>
                                    </div>
                                    <div class="trip-select--car--name">
                                        <input type="hidden" class="trip-select--car--id" id="car_id" name="car_id" style="display: none;" value="{{$cars[0]->id}}">
                                        <div class="trip-select--car--name1">{{$cars[0]->model}}</div>
                                        <div class="trip-select--car--name2">({{$cars[0]->number}})</div>
                                    </div>
                                </div>
                                <div class="trip-select--arrow">
                                    <svg class="icon icon-arrow-right ">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#arrow-right') }}"></use>
                                    </svg>
                                </div>
                            @elseif(count(Auth::user()->buses) > 0)
                                <div class="trip-select--icon--car">
                                    <div class="gogocar-gray-icons">
                                        <svg class="icon icon-taxi ">
                                            <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#taxi') }}"></use>
                                        </svg>
                                    </div>
                                    <div class="trip-select--car--name">
                                        <input type="hidden" class="trip-select--car--id" id="car_id" name="car_id" style="display: none;" value="{{Auth::user()->buses[0]->id}}">
                                        <div class="trip-select--car--name1">{{Auth::user()->buses[0]->model}}</div>
                                        <div class="trip-select--car--name2">({{Auth::user()->buses[0]->number}})</div>
                                    </div>
                                </div>
                                <div class="trip-select--arrow">
                                    <svg class="icon icon-arrow-right ">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#arrow-right') }}"></use>
                                    </svg>
                                </div>
                            @endif
                        </div>
                        <ul class="trip-select-car--list">
                            @foreach($cars as $item)
                            <li class="trip-select-car--item suggest-late--result--item">
                                <div class="suggest-late--result--item__left">
                                    <div class="gogocar-gray-icons">
                                        <svg class="icon icon-taxi ">
                                            <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#taxi') }}">
                                            </use>
                                        </svg>
                                    </div>
                                    <div class="trip-select-car-name--number">
                                        <input type="hidden" class="trip-select-car-name--id" style="display: none;" value="{{$item->id}}">
                                        <div class="trip-select-car-name--number1">{{$item->model}} </div>
                                        <div class="trip-select-car-name--number2"> ({{$item->number}})</div>
                                    </div>
                                </div>
                                <div class="gogocar-gray-icons2">
                                    <svg class="icon icon-arrow-right3 ">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#arrow-right3') }}">
                                        </use>
                                    </svg>
                                </div>
                            </li>
                            @endforeach
                            @if( !is_null(Auth::user()->buses))
                                @foreach(Auth::user()->buses  as $item)
                                <li class="trip-select-car--item suggest-late--result--item">
                                    <div class="suggest-late--result--item__left">
                                        <div class="gogocar-gray-icons">
                                            <svg class="icon icon-taxi ">
                                                <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#taxi') }}">
                                                </use>
                                            </svg>
                                        </div>
                                        <div class="trip-select-car-name--number">
                                            <input type="hidden" class="trip-select-car-name--id" style="display: none;" value="{{$item->id}}">
                                            <div class="trip-select-car-name--number1">{{$item->model}} </div>
                                            <div class="trip-select-car-name--number2"> ({{$item->number}})</div>
                                        </div>
                                    </div>
                                    <div class="gogocar-gray-icons2">
                                        <svg class="icon icon-arrow-right3 ">
                                            <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#arrow-right3') }}">
                                            </use>
                                        </svg>
                                    </div>
                                </li>
                                @endforeach
                            @endif
                        </ul>
                        @else
                        <a href="{{ route('profile.car.add', ['locale' => app()->getLocale(), 'type' => 'car']) }}" target="_blank">
                            <p class="popup-trip-finish text-center">@lang('front.trip_choise_car.add_car')
                            </p>
                        </a>
                        @endif
                    </div>
                </div>
            </div>
        </section>

        <section class="trip-choise-car">
            <div class="container">
                <div class="trip-choise-car">
                    <h1 class="main-section--title--v2 text-center mb-5">@lang('front.trip_choise_car.so'), <span>@lang('front.trip_choise_car.how_many')</span> @lang('front.trip_choise_car.take_on')?</h1>
                    <div class="trip-choise-car--count mb-5">
                        <div class="trip-choise-car--count--minus">
                            <svg class="icon icon-arrow-left ">
                                <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#arrow-left') }}"></use>
                            </svg>
                        </div>
                        <div class="trip-choise-car--count-field gogocar-input--wrapper">
                            <div class="gogocar-gray-icons">
                                <svg class="icon icon-man ">
                                    <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#man') }}"></use>
                                </svg>
                            </div>
                            <input class="gogocar-input-v1 trip-choise-car--count--input" name="count" type="text" value="1" readonly max="8" id="car_seat">
                        </div>
                        <div class="trip-choise-car--count--plus">
                            <svg class="icon icon-arrow-right ">
                                <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#arrow-right') }}"></use>
                            </svg>
                        </div>
                    </div>
                    <input type="hidden" id="setprice_state" name="setprice_state" value="@php echo($setprice_status); @endphp">
                    @if(count($cars) > 0 || count(Auth::user()->buses) > 0 )
                    <button type="submit" class="gogocar-yellow-button">@lang('front.suggest_late_to.continue')</button>
                    @endif
                </div>
            </div>
        </section>

    </form>
    @if($result && $result != 'zero_result')
    {{-- @if($price_per_seat == null) --}}
    <div class="modal fade" id="popup-fp" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered popup-modal--wrap" role="document">
            <div class="modal-content popup-content">
                <div class="popup-header">
                    <div class="popup-modal-close close" data-dismiss="modal" aria-label="Close">
                        <svg class="icon icon-close ">
                            <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#close') }}"></use>
                        </svg>
                    </div>
                </div>
                <div class="popup-covid--wrap popup-icon-size">
                    <svg class="icon icon-friendly-price ">
                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#friendly-price') }}"></use>
                    </svg>
                    <h3 class="main-section--title--v2 font-size-25 mb-4">@lang('front.trip_choise_car.we_meet')
                        <span>@lang('front.trip_choise_car.kind_price'):</span></h3>
                    <div class="poopup-friendly-price mb-4 money" id="friendly_price" 
                        data-currency-rub="{{Helper::convertCurrency(floor($result['distance']/1000*500), 'UZS', 'RUB')}}" data-currency-uzs="{{floor($result['distance']/1000*500)}}">
                        {{floor($result['distance']/1000*500)}} UZS
                    </div>
                    <input type="hidden" value=" {{floor($result['distance'] / 1000 * 500) }}" name="price" id="price">
                    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                    <div class="popup-covid--buttons">
                        <button class="gogocar-yellow-button mb-4" onclick="setprice('yes')">@lang('front.trip_choise_car.yes')</button>
                        <button class="gogocar-gray-button" onclick="setprice('no')">@lang('front.trip_choise_car.no')</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- @endif --}}
    @else
    <div class="modal fade" id="popup-fp" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered popup-modal--wrap" role="document">
            <div class="modal-content popup-content">
                <div class="popup-header">
                    <div class="popup-modal-close close" data-dismiss="modal" aria-label="Close">
                        <svg class="icon icon-close ">
                            <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#close') }}"></use>
                        </svg>
                    </div>
                </div>
                <div class="popup-covid--wrap popup-icon-size">
                    <svg class="icon icon-friendly-price ">
                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#friendly-price') }}"></use>
                    </svg>
                    <h3 class="main-section--title--v2 font-size-25 mb-4">@lang('front.trip_choise_car.invalid').</span></h3>
                <a href="{{ route("clearSession", app()->getLocale()) }}">@lang('front.trip_choise_car.go_to_main').</a>
                </div>
            </div>
        </div>
    </div>
    @endif

    <div class="modal fade" id="popup-input-value2" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered popup-modal--wrap" role="document">
            <div class="modal-content popup-content">
                <div class="popup-covid--wrap popup-icon-size">
                    <p class="popup-trip-finish">@lang('front.carbook.something_wrong')</p>
                    <div class="gogocar-yellow-button w-170" id="finish2">Ок</div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function validateForm() {
        const car = $('#car_id').val();
        const state = $('#setprice_state').val();
        if(car == null || car == undefined || car == ''){
            alert("Please select the car.");
            return false;
        }
        if(state == null || state == undefined || state == '' || state == false){
            $("#popup-fp").modal("show");
            return false;
        }
    }
    function setprice(value) {
        if (value == 'yes') {
            $("#popup-fp").modal("hide");
            var price = $("#price").val();
            if(price == ""){
                $('#popup-fp').modal('toggle');
            }
            $('#setprice_state').val(true);
            var token = $("#token").val();
            $.ajax({
                type: 'POST'
                , headers: {
                    'X-CSRF-TOKEN': token
                }
                , url: '{{ route("savePrice_total", app()->getLocale()) }}'
                , data: {
                    price: price
                }
                , success: function(data) {
                    // alert(data);
                    if (data.state == 'success') {
                        localStorage.clear();
                        $('#choose_car').submit();
                    }
                    else{
                        $('#popup-input-value2').modal('show');
                    }
                }
                , error: function(XMLHttpRequest, textStatus, errorThrown) {

                }

            });
        } else if (value == "no") {
            window.location.href = '{{ route("changePrice", app()->getLocale()) }}';
        }
    }
    $(document).ready(function() {
        $('.trip-choise-car--count').click(function(){
            localStorage.setItem('car_seat', $('#car_seat').val());
            console.log('car_seat', localStorage.getItem('car_seat'));
        })
        let val = localStorage.getItem('car_seat');
        if(val != undefined && val != null && val !== NaN){
            $('#car_seat').val(val);
        }else{
            localStorage.setItem('car_seat', $('#car_seat').val());
        }

        $('.trip-select-car--item').click(function () {
            var get_car_id = $(this).children().children().children('.trip-select-car-name--id').val();
            var get_car_model = $(this).children().children().children('.trip-select-car-name--number1').text();
            var get_car_number = $(this).children().children().children('.trip-select-car-name--number2').text();
            $('.trip-select--car--id').val(get_car_id);
            $('.trip-select--car--name1').text(get_car_model);
            $('.trip-select--car--name2').text(get_car_number);
            localStorage.setItem('get_car_id', get_car_id);
            localStorage.setItem('get_car_model', get_car_model);
            localStorage.setItem('get_car_number', get_car_number);
        });

        let get_car_id = localStorage.getItem('get_car_id');
        let get_car_model = localStorage.getItem('get_car_model');
        let get_car_number = localStorage.getItem('get_car_number');
        if(get_car_id){
            $('#car_id').val(get_car_id);
        }else{
            localStorage.setItem('get_car_id', $('#car_id').val());
        }
        if(get_car_model){
            $('.trip-select--icon--car .trip-select--car--name1').text(get_car_model);
        }
        if(get_car_number){
            $('.trip-select--icon--car .trip-select--car--name2').text(get_car_number);
        }

    })
</script>
<style>
    @media (max-width: 768px) {
        .trip-stops--places--buttons{
            margin-bottom: 60px;
        }
    }
</style>
@endsection
@section('user_lang')
    @include('includes.user_flag')
@endsection