@extends('layouts.user_app')
@section('title', 'Изменить рекомендуемую цену')
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
    <section class="remove-price">
        <div class="container">
            <div class="remove-price--wrap">
                <h1 class="main-section--title--v2 text-center mb-5">Изменить <span>рекомендуемую цену</span> за 1 кг
                </h1>
                <div class="col-xl-8 col-lg-8 remove-price--content">
                    <div class="gogocar-input--wrapper">
                        <div class="remove-price--content__icon__route">
                            <div class="gogocar-gray-icons">
                                <svg class="icon icon-map2 ">
                                    <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#map2') }}"></use>
                                </svg>
                            </div>
                            <div class="remove-price--route"><span class="remove-route--start">{{ $fc }}</span>
                                <div class="gogocar-trip--item__route">
                                    <div class="gogocar-trip--item__route--start"></div>
                                    <div class="gogocar-trip--item__route--end"></div>
                                </div><span class="remove-route--end">{{ $dc }}</span>
                            </div>
                        </div>
                        <div class="remove-change--price">
                            <div class="remove-change--price--minus">
                                <svg class="icon icon-minus ">
                                    <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#minus') }}"></use>
                                </svg>
                            </div>
                            <div class="remove-change--price-text money" data-change-ratio="{{Helper::convertCurrency(1, 'RUB', 'UZS')}}" data-change-price="5000" data-change-currency="UZS" data-currency-rub="0" data-currency-uzs="0">
                                0 @if(session()->get('currency') == null || session()->get('currency') == 'UZS')  UZS @else RUB @endif
                            </div>
                            <div class="remove-change--price--plus">
                                <svg class="icon icon-add ">
                                    <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#add') }}"></use>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="gogocar-trip--item">
                        <div class="gogocar-trip--item__top">
                            <div class="gogocar-trip--item-town__route">
                                <div class="gogocar-trip--item__town"><span>{{ $fc }}</span><span>{{ $dc }}</span></div>
                                <div class="gogocar-trip--item__route">
                                    <div class="gogocar-trip--item__route--start"></div>
                                    <div class="gogocar-trip--item__route--end"></div>
                                </div>
                            </div>
                        </div>
                        <div class="gogocar-trip--item__bottom">
                            <div class="remove-change--price">
                                <div class="remove-change--price--minus">
                                    <svg class="icon icon-minus ">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#minus') }}"></use>
                                    </svg>
                                </div>
                                <div class="remove-change--price-text money" data-change-ratio="{{Helper::convertCurrency(1, 'RUB', 'UZS')}}" data-change-price="5000" data-change-currency="UZS" data-currency-rub="0" data-currency-uzs="0">
                                    0 @if(session()->get('currency') == null || session()->get('currency') == 'UZS')  UZS @else RUB @endif
                                </div>
                                <div class="remove-change--price--plus">
                                    <svg class="icon icon-add ">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#add') }}"></use>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                @if($stops != null)
                @foreach ($stops as $item)
                <div class="col-xl-8 col-lg-8 remove-price--content">
                    <div class="gogocar-input--wrapper">
                        <div class="remove-price--content__icon__route">
                            <div class="gogocar-gray-icons">
                                <svg class="icon icon-map2 ">
                                    <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#map2') }}"></use>
                                </svg>
                            </div>
                            <div class="remove-price--route">
                                <span class="remove-route--start">{{$item->drop_off}}</span>
                                <div class="gogocar-trip--item__route">
                                    <div class="gogocar-trip--item__route--start"></div>
                                    <div class="gogocar-trip--item__route--end"></div>
                                </div>
                                <span class="remove-route--end">{{$dc}}</span>
                            </div>
                        </div>
                        <div class="remove-change--price">
                            <div class="remove-change--price--minus">
                                <svg class="icon icon-minus ">
                                    <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#minus') }}"></use>
                                </svg>
                            </div>
                            <div class="remove-change--price-text money" data-change-ratio="{{Helper::convertCurrency(1, 'RUB', 'UZS')}}" data-change-price="5000" data-change-currency="UZS" data-currency-rub="0" data-currency-uzs="0">
                                0 @if(session()->get('currency') == null || session()->get('currency') == 'UZS')  UZS @else RUB @endif
                            </div>
                            <div class="remove-change--price--plus">
                                <svg class="icon icon-add ">
                                    <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#add') }}"></use>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="gogocar-trip--item">
                        <div class="gogocar-trip--item__top">
                            <div class="gogocar-trip--item-town__route">
                                <div class="gogocar-trip--item__town">
                                    <span>{{$fc}}</span>
                                    <span>{{$item->drop_off}}</span>
                                </div>
                                <div class="gogocar-trip--item__route">
                                    <div class="gogocar-trip--item__route--start"></div>
                                    <div class="gogocar-trip--item__route--end"></div>
                                </div>
                            </div>
                        </div>
                        <div class="gogocar-trip--item__bottom">
                            <div class="remove-change--price">
                                <div class="remove-change--price--minus">
                                    <svg class="icon icon-minus ">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#minus') }}"></use>
                                    </svg>
                                </div>
                                <div class="remove-change--price-text money" data-change-ratio="{{Helper::convertCurrency(1, 'RUB', 'UZS')}}" data-change-price="5000" data-change-currency="UZS" data-currency-rub="0" data-currency-uzs="0">
                                    0 @if(session()->get('currency') == null || session()->get('currency') == 'UZS')  UZS @else RUB @endif
                                </div>
                                <div class="remove-change--price--plus">
                                    <svg class="icon icon-add ">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#add') }}"></use>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                @endif
            </div>
            <div class="trip-stops--places--buttons mt-5">
                <a href="{{ route('chooseCarCargo', app()->getLocale()) }}" style="width: 210px; margin-right: 20px;">
                    <div class="gogocar-gray-button m-0-auto-none mr-4">@lang('front.remove_price.back')</div>
                </a>
                <div class="gogocar-yellow-button m-0-auto-none" onclick="gonext()">@lang('front.remove_price.continue')</div>
            </div>
            <form method="GET" action="{{ route('addPhoto_cargo', app()->getLocale()) }}" id="choose_car_cargo" action="javascript:void(0)" enctype="multipart/form-data">
                <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                <input type="hidden" class="trip-select--car--id" id="car_id" name="car_id" >
                <input class="gogocar-input-v1" type="hidden" name="capacity" id="capacity">
                <input class="gogocar-input-v1" type="hidden" name="place" id="place">
                <input class="gogocar-input-v1" type="hidden" name="max_size" id="max_size">
                <input class="gogocar-input-v1 gogocar-from ggc-type-cargo" type="hidden" name="cargo_type" id="cargo_type">
            </form>
        </div>
    </section>
</div>
<div class="modal fade" id="popup-input-value" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered popup-modal--wrap" role="document">
        <div class="modal-content popup-content">
            <div class="popup-covid--wrap popup-icon-size">
                <p class="popup-trip-finish">@lang('front.carbook.something_wrong')</p>
                <div class="gogocar-yellow-button w-170" data-dismiss="modal">Ок</div>
            </div>
        </div>
    </div>
</div>
<script>
    function gonext() {
        var values = $('.remove-change--price-text').map(function() { return $(this).attr('data-currency-uzs'); }).get();
        var prices = new Array();
        var token = $("#token").val();
        var i = 0;
        if ($(window).width() < 768) {
            i = 1;
        }
        else {
            i = 0;
        }
        for(i;i<values.length;i=i+2){
            prices.push(values[i]);
        }
        $.ajax({
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': token
            },
            url: '{{ route("savePrice_cargo", app()->getLocale()) }}',
            data: {
                prices: prices
            },
            success: function (data) {
                if (data.state == 'success') {
                    $('#choose_car_cargo').submit();
                    // window.location.href = '{{ route("chooseCarCargoAfterSetPrice", app()->getLocale()) }}';
                }
                else{
                    $('#popup-input-value').modal('show');
                }
            },
            error: function (XMLHttpRequest, textStatus, errorThrown) {

            }

        });
    };
    $( "#finish" ).click(function() {
        $('#popup-input-value').modal('hide');
        $('#address-input').focus();
    });

    $(document).ready(function() {
        $('#choose_car_cargo .gogocar-input-v1').each(function(){
            let id = $(this).attr('id');
            let val = localStorage.getItem('cargo' + id);
            if(val){
                $(this).val(val);
            }
        })

        let get_car_id = localStorage.getItem('get_truck_id');
        if(get_car_id){
            $('#car_id').val(get_car_id);
        }
        let cargo_type = localStorage.getItem('cargo_type');
        if(cargo_type){
            $('#cargo_type').val(cargo_type);
        }
    })
</script>
@endsection
@section('user_lang')
    @include('includes.user_flag')
@endsection