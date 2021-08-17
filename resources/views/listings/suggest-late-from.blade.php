@extends('layouts.user_app')
@section('title', 'Откуда выезжаем ')
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
    <section class="suggest-late">
        <div class="container">
            <form method="GET"
                action="javascript:void(0)" id="from_position_passenger">
            <div class="suggest-late--wrap">
                <h1 class="main-section--title text-center mb-5">@lang('front.suggest_late_from.where_from') <span>@lang('front.suggest_late_from.where_leaving') ?</span></h1>
                <div class="col-xl-8 col-lg-8 suggest-late--inputs">
                    <div class="gogocar-input--wrapper">
                        <div class="gogocar-gray-icons">
                            <svg class="icon icon-map2 ">
                                <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#map2') }}"></use>
                            </svg>
                        </div>
                        <input class="gogocar-input-v1 suggest-late--input--from map-input" id="address-input" type="text" name="fc" placeholder="Например, Медресе Абулкосим, Ташкент">
                        <input type="hidden" name="address_latitude" id="address-latitude" value="0" />
                        <input type="hidden" name="address_longitude" id="address-longitude" value="0" />
                        <input type="hidden" name="address_component" id="address-component" value="0" />
                    </div>
                    <div class="trip-stops--places--buttons">
                        <a class="gogocar-gray-button m-0-auto-none mr-4" href="{{ route('choosetype', app()->getLocale()) }}">@lang('front.trip_stops_places.back')</a>
                        <button class="gogocar-yellow-button m-0-auto-none find-trip-submit" type="submit" id="next_page">@lang('front.suggest_late_from.continue')</button>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </section>
</div>

<div id="address-map-container" style="display: none; ">
    <div style="width: 100%; height: 100%" id="address-map"></div>
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
<script>
    $(document).ready(function() {

        $('#from_position_passenger').submit(function(e) {
            e.preventDefault();
            var lat = $('#address-latitude').val();
            var lng = $('#address-longitude').val();
            var address = $('#address-component').val();
            if (lat == 0 || lng == 0 || address == 0) {
                $('#popup-input-value').modal('show');
                // alert("Please input valid address in google map");
            } else {
                var formData = new FormData($("#from_position_passenger")[0]);

                var token = $("#token").val();
                $.ajax({
                    type: 'POST'
                    , headers: {
                        'X-CSRF-TOKEN': token
                    }
                    , url: '{{ route('suggestToPassenger', app()->getLocale()) }}'
                    , data: formData
                    , cache: false
                    , contentType: false
                    , processData: false
                    , success: (data) => {
                        if(data.state == 'success'){
                            if (data.result == 'ok') {
                                window.location.href = '{{ route("suggest_late_to", app()->getLocale()) }}';
                            } else if (data.result == 'failed') {
                                $('#popup-input-value2').modal('show');
                            }
                        }
                        else{

                        }
                    }
                    , error: function(data) {
                        console.log(data);
                    }
                });
            }
        });

        $( "#finish" ).click(function() {
            $('#popup-input-value').modal('hide');
        });

        $( "#finish2" ).click(function() {
            $('#popup-input-value2').modal('hide');
        });
    })
</script>
@endsection
@section('user_lang')
    @include('includes.user_flag')
@endsection