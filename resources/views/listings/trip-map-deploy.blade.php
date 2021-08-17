@extends('layouts.user_app')
@section('title', 'пассажиров')
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
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="test">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">&times;</span>
            </button>

        </div>
	@endif
    <section class="trip-map-deploy p-0">
        <div class="container">
            <div class="trip-map--wrap">
                <div class="col-xl-5 col-lg-5 col-md-7 col-sm-12 trip-map--absolute gogocar-box">
                    <div class="main-section--title text-center">@lang('front.trip_map_deploy.where') <span>@lang('front.trip_map_deploy.would_you')</span></div>
                    <div class="main-section--title text-center mb-4">@lang('front.trip_map_deploy.drop_off')&nbsp<span>@lang('front.trip_map_deploy.passenger') ?</span></div>
                    <form method="POST" action="{{ route('stopsPassenger', app()->getLocale()) }}" accept-charset="UTF-8" id="stopspassener" onsubmit="return validateForm()">
                        <div class="col-xl-12 col-lg-12 suggest-late--inputs">
                            <div class="gogocar-input--wrapper">
                                <div class="gogocar-gray-icons">
                                    <svg class="icon icon-map2 ">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#map2') }}"></use>
                                    </svg>
                                </div>
                                {{ csrf_field() }}
                                <input class="gogocar-input-v1 suggest-late--input--to map-input" id="address-input"
                                    type="text" name="drop_off" placeholder="Введите место...">
                                @if($lat_from)
                                <input type="hidden" name="address_latitude" id="address-latitude" value="{{$lat_from}}" />
                                @else
                                <input type="hidden" name="address_latitude" id="address-latitude" value="0" />
                                @endif
                                @if($lng_from)
                                <input type="hidden" name="address_longitude" id="address-longitude" value="{{$lng_from}}" />
                                @else
                                <input type="hidden" name="address_longitude" id="address-longitude" value="0" />
                                @endif
                                <input type="hidden" name="address_component" id="address-component" value="0" />
                            </div>
                            <div class="trip-map--buttons mt-3">
                                <button class="gogocar-yellow-button" type="submit">@lang('front.trip_map_deploy.next')</button>
                                <a href="{{route('stopsPassenger.show', app()->getLocale())}}" ><div class="gogocar-gray-button">@lang('front.trip_map_deploy.cancel')</div></a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        {{-- <div class="trip-map-deploy--map">
            <script type="text/javascript" charset="utf-8" async
                src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3Aa33765aebc6379d90ab27f1107925d437548f3bd54a36efa2650eafc8ff4b33f&amp;amp;width=100%&amp;amp;height=100%&amp;amp;lang=ru_RU&amp;amp;scroll=false">
            </script>
        </div> --}}
        <div class="trip-map-deploy--map" id="address-map-container" style="display: block; ">
            <div style="width: 100%; height: 100%" id="address-map"></div>
        </div>
        <div id="address-map-container" style="display: none; ">
            <div style="width: 100%; height: 100%" id="address-map"></div>
        </div>
        <div class="trip-map--buttons__mobile">
            <div class="container">
                <div class="trip-map--buttons mt-3">
                    <div class="gogocar-yellow-button next-page">@lang('front.trip_map_deploy.next')</div>
                    <a href="{{route('stopsPassenger.show', app()->getLocale())}}" class="gogocar-gray-button cancel">
                        <div>@lang('front.trip_map_deploy.cancel')</div>
                    </a>
                </div>
            </div>
        </div>
    </section>
</div>

<div class="modal fade" id="popup-input-value" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered popup-modal--wrap" role="document">
        <div class="modal-content popup-content">
            <div class="popup-covid--wrap popup-icon-size">
                <p class="popup-trip-finish">@lang('front.search_page.input_address')</p>
                <div class="gogocar-yellow-button w-170" id="finish" data-dismiss="modal">Ок</div>
            </div>
        </div>
    </div>
</div>

<script>
    function validateForm() {
        var lat = $('#address-latitude').val();
        var lng = $('#address-longitude').val();
        var address = $('#address-component').val();
        if (lat == 0 || lng == 0 || address == 0) {
            $("#popup-input-value").modal("show");
            return false;
        }
    }
     $(document).ready(function() {
         $('.trip-map--buttons__mobile .next-page').click(function(){
            $('#stopspassener').submit();
         })
     })
</script>
@endsection