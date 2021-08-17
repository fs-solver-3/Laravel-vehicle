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
    <form id="choose_car_cargo" action="javascript:void(0)" enctype="multipart/form-data">
        <section class="trip-choise-car">
            <div class="container">
                <div class="trip-choise-car">
                    <h1 class="main-section--title--v2 text-center mb-5">@lang('front.trip_choise_car_cargo.on') <span>@lang('front.trip_choise_car_cargo.which_machine')</span> @lang('front.trip_choise_car_cargo.plan_driver') ?
                    </h1>
                    <div class="col-xl-8 col-lg-8 trip-select-car--wrapper m-0-auto">
                        @if(count($cars) > 0)
                        <div class="trip-select-car">
                            <div class="trip-select--icon--car">
                                <div class="gogocar-gray-icons">
                                    <svg class="icon icon-taxi ">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#taxi') }}"></use>
                                    </svg>
                                </div>
                                <div class="trip-select--car--name">
                                    <input type="hidden" class="trip-select--car--id" name="car_id" id="car_id"
                                        style="display: none;" value="{{$cars[0]->id}}">
                                    <div class="trip-select--car--name1">{{$cars[0]->model}}</div>
                                    <div class="trip-select--car--name2">({{$cars[0]->number}})</div>
                                </div>
                            </div>
                            <div class="trip-select--arrow">
                                <svg class="icon icon-arrow-right ">
                                    <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#arrow-right') }}"></use>
                                </svg>
                            </div>
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
                                        <input type="hidden" class="trip-select-car-name--id" style="display: none;"
                                            value="{{$item->id}}">
                                        <div class="trip-select-car-name--number1">{{$item->model}} </div>
                                        <div class="trip-select-car-name--number2">({{$item->number}})</div>
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
                        </ul>
                        @else
                        <a href="{{ route('profile.car.add', ['locale' => app()->getLocale(), 'type' => 'truck']) }}" target="_blank">
                            <p class="main-section--desc text-center">@lang('front.trip_choise_car_cargo.add_truck')</p>
                        </a>
                        @endif
                    </div>
                </div>
            </div>
        </section>
        <section class="trip-choise-car">
            <div class="container">
                <div class="trip-choise-car">
                    <h1 class="main-section--title--v2 text-center mb-5">@lang('front.trip_choise_car_cargo.so'), <span>@lang('front.trip_choise_car_cargo.how_much')</span> @lang('front.trip_choise_car_cargo.you_can') ?</h1>
                    <div class="trip-choise-car-cargo">
                        <div class="col-xl-4 col-lg-4">
                            <div class="gogocar-input--wrapper gogocar-placeholder">
                                <div class="gogocar-input-icon gogocar-gray-icons">
                                    <svg class="icon icon-weight ">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#weight') }}"></use>
                                    </svg>
                                </div>
                                <input class="gogocar-input-v1" type="number" name="capacity" id="capacity">
                                <label>@lang('front.trip_choise_car_cargo.total_weight') <span>(кг)</span></label>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4">
                            <div class="gogocar-input--wrapper gogocar-placeholder">
                                <div class="gogocar-input-icon gogocar-gray-icons">
                                    <svg class="icon icon-volume ">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#volume') }}"></use>
                                    </svg>
                                </div>
                                <input class="gogocar-input-v1" type="number" name="place" id="place">
                                <label>@lang('front.trip_choise_car_cargo.total_volumn') <span>(м3)</span></label>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4">
                            <div class="gogocar-input--wrapper gogocar-placeholder">
                                <div class="gogocar-input-icon gogocar-gray-icons">
                                    <svg class="icon icon-gabar ">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#gabar') }}"></use>
                                    </svg>
                                </div>
                                <input class="gogocar-input-v1" type="number" name="max_size" id="max_size">
                                <label>@lang('front.trip_choise_car_cargo.max_side') <span>(м)</span></label>
                                <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="trip-choise-car">
            <div class="container">
                <div class="trip-choise-car">
                    <h1 class="main-section--title text-center mb-5">@lang('front.trip_choise_car_cargo.what_kind') <span>@lang('front.trip_choise_car_cargo.you_can_take') ?</span></h1>
                    <div class="trip-choise-car-type">
                        <div class="gogocar-input--wrapper">
                            <div class="gogocar-input-hidden-cargo-find"></div>
                            <input class="gogocar-input-v1 gogocar-from ggc-type-cargo" type="hidden" name="cargo_type" id="cargo_type">
                            <div class="gogocar-add-cargo-type gogocar-gray-icons" data-toggle="modal"
                                data-target="#popup-cargo-type">
                                <svg class="icon icon-plus ">
                                    <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#plus') }}"></use>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <input type="hidden" id="setprice_state" name="setprice_state" value="@php echo($setprice_status); @endphp">
            @if(count($cars) > 0)
                <div class="trip-stops--places--buttons">
                    <a class="gogocar-gray-button m-0-auto-none mr-4" href="{{ route('whenTripCargo', app()->getLocale()) }}">@lang('front.trip_stops_places.back')</a>
                    <button class="gogocar-yellow-button m-0-auto-none " type="submit">@lang('front.suggest_late_to.continue')</button>
                </div>
            @endif
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
                    <h3 class="main-section--title--v2 font-size-25 mb-4">@lang('front.trip_choise_car.we_meet_cargo')
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
                    <h3 class="main-section--title--v2 font-size-25 mb-4">@lang('front.trip_choise_car_cargo.invalid_address')</span></h3>
                    <a href="{{ route("clearSession", app()->getLocale()) }}">@lang('front.trip_choise_car.go_to_main').</a>
                </div>
            </div>
        </div>
    </div>
    @endif

    <div class="modal fade" id="popup-input-value" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered popup-modal--wrap" role="document">
            <div class="modal-content popup-content">
                <div class="popup-covid--wrap popup-icon-size">
                    <p class="popup-trip-finish">@lang('message.please_input_all_info')</p>
                    <div class="gogocar-yellow-button w-170" data-dismiss="modal" >@lang('front.search_page.ok')</div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="popup-input-value2" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered popup-modal--wrap" role="document">
            <div class="modal-content popup-content">
                <div class="popup-covid--wrap popup-icon-size">
                    <p class="popup-trip-finish">@lang('front.carbook.something_wrong')</p>
                    <div class="gogocar-yellow-button w-170" data-dismiss="modal">@lang('front.search_page.ok')</div>
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
            $('#popup-input-value').modal('show');
            return false;
        }
        if(state == null || state == undefined || state == '' || state == false){
            $('#popup-input-value').modal('show');
            // $("#popup-fp").modal("show");
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
            $("#setprice_state").val(true);
            var token = $("#token").val();
            $.ajax({
                type: 'POST'
                , headers: {
                    'X-CSRF-TOKEN': token
                }
                , url: '{{ route("savePrice_total_cargo", app()->getLocale()) }}'
                , data: {
                    price: price
                }
                , success: function(data) {
                    if (data.state == 'success') {
                        $('#choose_car_cargo').submit();
                    }
                    else{
                        $('#popup-input-value2').modal('show');
                    }
                }
                , error: function(XMLHttpRequest, textStatus, errorThrown) {
                }
            });
        } else if (value == "no") {
            var cargo_type = $('#cargo_type').val();
            localStorage.setItem('cargo_type', cargo_type)
            window.location.href = '{{ route("changePrice_cargo", app()->getLocale()) }}';
        }
    }
    $(document).ready(function() {

        $('.trip-choise-car-cargo input').change(function(){
            if($(this).val().length > 0){
                $(this).siblings('label').hide();
            }else{
                $(this).siblings('label').show();
            }
            let id = $(this).attr('id');
            localStorage.setItem('cargo' + id, $(this).val());
        })

        $('.trip-choise-car-cargo input').each(function(){
            let id = $(this).attr('id');
            let val = localStorage.getItem('cargo' + id);
            if(val){
                $(this).val(val);
            }
            if($(this).val().length > 0){
                $(this).siblings('label').hide();
            }else{
                $(this).siblings('label').show();
            }
        })

        $('.trip-select-car--item').click(function () {
            var get_car_id = $(this).children().children().children('.trip-select-car-name--id').val();
            var get_car_model = $(this).children().children().children('.trip-select-car-name--number1').text();
            var get_car_number = $(this).children().children().children('.trip-select-car-name--number2').text();
            $('.trip-select--car--id').val(get_car_id);
            $('.trip-select--car--name1').text(get_car_model);
            $('.trip-select--car--name2').text(get_car_number);
            localStorage.setItem('get_truck_id', get_car_id);
            localStorage.setItem('get_truck_model', get_car_model);
            localStorage.setItem('get_truck_number', get_car_number);
        });

        let get_car_id = localStorage.getItem('get_truck_id');
        let get_car_model = localStorage.getItem('get_truck_model');
        let get_car_number = localStorage.getItem('get_truck_number');
        if(get_car_id){
            $('#car_id').val(get_car_id);
        }else{
            localStorage.setItem('get_truck_id', $('#car_id').val());
        }
        if(get_car_model){
            $('.trip-select--icon--car .trip-select--car--name1').text(get_car_model);
        }
        if(get_car_number){
            $('.trip-select--icon--car .trip-select--car--name2').text(get_car_number);
        }

        $('#choose_car_cargo').submit(function(e) {
            e.preventDefault();
            var car = $('#car_id').val();
            var state = $('#setprice_state').val();
            var capacity = $('#capacity').val();
            var place = $('#place').val();
            var max_size = $('#max_size').val();
            var cargo_type = $('#cargo_type').val();
            if(car == '' || car == undefined || car == null || capacity == '' || place == '' || max_size == '' || cargo_type == ''){
                // alert("Please input all details");
                $('#popup-input-value').modal('show');
                return false;
            }
            if(state == false || state == null || state == undefined || state == ''){
                $('#popup-fp').modal('show');
            }
            else{
                var formData = new FormData($("#choose_car_cargo")[0]);
            
                var token = $("#token").val();
                $.ajax({
                    type:'POST',
                    headers: {
                        'X-CSRF-TOKEN': token
                    },
                    url: '{{ route('saveCar_cargo', app()->getLocale()) }}',
                    data: formData,
                    cache:false,
                    contentType: false,
                    processData: false,
                    success: (data) => {
                        if (data.state == 'success') {
                            localStorage.clear();
                            if(data.photo_exist == true){
                                window.location.href = '{{ route("addComment_cargo", app()->getLocale()) }}';
                            }
                            else{
                                window.location.href = '{{ route("addPhoto_cargo", app()->getLocale()) }}';
                            }
                        }
                        else{
                            $('#popup-input-value2').modal('show');
                        }
                    },
                    error: function(data){
                        console.log(data);
                    }
                });
            }
        });
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