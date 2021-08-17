@extends('layouts.app')
@section('title', 'Trips')
@section('admin_lang')
<ul class="choise-lang--list">
    <li class="choise-lang--item"
        data-value='{{ route(\Illuminate\Support\Facades\Route::currentRouteName(), ['locale' => 'ru', 'id' => $listing->id])}}'>
        <div class="choise-lang--item__img"
            style="background-image:url('{{ asset('/static/img/general/lang/lang-ru.png') }}');">
        </div>
        <div class="choise-lang--item__text">RU</div>
    </li>
    <li class="choise-lang--item"
        data-value="{{ route(\Illuminate\Support\Facades\Route::currentRouteName(), ['locale' => 'uz', 'id' => $listing->id])}}">
        <div class="choise-lang--item__img"
            style="background-image:url('{{ asset('/static/img/general/lang/lang-uz.png') }}');">
        </div>
        <div class="choise-lang--item__text">UZ</div>
    </li>
</ul>
@endsection
@section('content')
<section class="section-1">
    @if ($errors->any())
    <ul class="alert alert-danger">
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
    @endif
    <div class="panel panel-default">

        <div class="panel-heading clearfix">

            <div class="pull-left">
                <a href="{{ route('admin.listing.index', app()->getLocale()) }}" class="back_to_link"
                    title="Show All Listings">
                    <img src="{{asset('admin/left-arrow.svg')}}" class="left-arrow" alt="for you">
                </a>
                <span class="pull-left admin-form-title">
                    <h4>{{ !empty($listing->name) ? $listing->name : 'Listing' }}</h4>
                </span>
            </div>
            <div class="btn-group btn-group-sm pull-right" role="group">

                <a href="{{ route('admin.listing.create', app()->getLocale()) }}" class="btn btn-add"
                    title="Create New Listing">
                    <img src="{{asset('admin/plus.svg')}}" alt="for you">
                </a>

            </div>
        </div>

        <form method="POST"
            action="{{ route('admin.listing.update', ['locale' => app()->getLocale(), 'id' => $listing->id]) }}"
            id="edit_listing_form" name="edit_listing_form" accept-charset="UTF-8" class="form-horizontal">
            {{ csrf_field() }}
            <input name="_method" type="hidden" value="PUT">
            <div class="section-bottom-side">
                <div class="section-inputs--wrapper row">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 section-input-wrap">
                        <label>@lang('global.listing.fields.type_trip'):</label>
                        <div class="section-select--input2 section-select--input__show"><span id="trip_type"
                                data-type="@if($listing->car_id != null){{'passenger'}}@elseif($listing->truck_id != null){{'cargo'}}@endif">@if($listing->car_id
                                != null) {{'Пассажирская'}} @elseif($listing->truck_id != null) {{'Грузовая'}}
                                @endif</span>
                            <input type="hidden" id="listing_type" name="listing_type"
                                value="@if($listing->car_id != null){{'passenger'}}@elseif($listing->truck_id != null){{'cargo'}}@endif">
                            <div class="section-select--popup__icon">
                                <svg class="icon icon-arrow-down-white ">
                                    <use xlink:href="{{asset('static/img/svg/symbol/sprite.svg#arrow-down-white')}}">
                                    </use>
                                </svg>
                            </div>
                            <ul class="section-select--popup__list section-select--popup__list__show">
                                <li class="section-select--popup__item2 hover-text-color" data-type="passenger">
                                    @lang('global.listing.fields.passenger')</li>
                                <li class="section-select--popup__item2 hover-text-color" data-type="cargo">@lang('global.listing.fields.freight')
                                </li>
                            </ul>
                        </div>
                    </div>
                    <input class="input-main" type="hidden" name="listing_id" value="{{$listing->id}}">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 section-input-wrap">
                        <label>@lang('global.listing.fields.trip_creator'):</label>
                        <select class="input-main select2" id="user_id" name="user_id">
                            <option value="" style="display: none;"
                                {{ old('user_id', optional($listing)->user_id ?: '') == '' ? 'selected' : '' }} disabled
                                selected>Select user</option>
                            @foreach ($users as $key => $user)
                            <option value="{{ $key }}"
                                {{ old('user_id', optional($listing)->user_id) == $key ? 'selected' : '' }}>
                                {{ $user }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    @php
                    $datetime = new DateTime($listing->starting_date);
                    $date = $datetime->format('d-m-Y');
                    $time = $datetime->format('H:i');
                    @endphp
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 section-input-wrap">
                        <label>@lang('global.listing.fields.departure_date'):</label>
                        <div class="section-balance-filter-date__wrap">
                            <input class="input-main calendar-filter-today calendar-zone-height text-left" type="text"
                                name="starting_date" value="{{ $date }}">
                            <div class="section-balance-date--icon">
                                <svg class="icon icon-calendar ">
                                    <use xlink:href="{{asset('static/img/svg/symbol/sprite.svg#calendar')}}"></use>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 section-input-wrap">
                        <label>@lang('global.listing.fields.time'):</label>
                        <select class="input-main" name="starting_time" id="starting_time">
                            <option {{ $time == '00"00' ? 'selected' : '' }} value="00:00">00:00</option>
                            <option {{ $time == '01:00' ? 'selected' : '' }} value="01:00">01:00</option>
                            <option {{ $time == '02:00' ? 'selected' : '' }} value="02:00">02:00</option>
                            <option {{ $time == '03:00' ? 'selected' : '' }} value="03:00">03:00</option>
                            <option {{ $time == '04:00' ? 'selected' : '' }} value="04:00">04:00</option>
                            <option {{ $time == '05:00' ? 'selected' : '' }} value="05:00">05:00</option>
                            <option {{ $time == '06:00' ? 'selected' : '' }} value="06:00">06:00</option>
                            <option {{ $time == '07:00' ? 'selected' : '' }} value="07:00">07:00</option>
                            <option {{ $time == '08:00' ? 'selected' : '' }} value="08:00">08:00</option>
                            <option {{ $time == '09:00' ? 'selected' : '' }} value="09:00">09:00</option>
                            <option {{ $time == '10:00' ? 'selected' : '' }} value="10:00">10:00</option>
                            <option {{ $time == '11:00' ? 'selected' : '' }} value="11:00">11:00</option>
                            <option {{ $time == '12:00' ? 'selected' : '' }} value="12:00">12:00</option>
                            <option {{ $time == '13:00' ? 'selected' : '' }} value="13:00">13:00</option>
                            <option {{ $time == '14:00' ? 'selected' : '' }} value="14:00">14:00</option>
                            <option {{ $time == '15:00' ? 'selected' : '' }} value="15:00">15:00</option>
                            <option {{ $time == '16:00' ? 'selected' : '' }} value="16:00">16:00</option>
                            <option {{ $time == '17:00' ? 'selected' : '' }} value="17:00">17:00</option>
                            <option {{ $time == '18:00' ? 'selected' : '' }} value="18:00">18:00</option>
                            <option {{ $time == '19:00' ? 'selected' : '' }} value="19:00">19:00</option>
                            <option {{ $time == '20:00' ? 'selected' : '' }} value="20:00">20:00</option>
                            <option {{ $time == '21:00' ? 'selected' : '' }} value="21:00">21:00</option>
                            <option {{ $time == '22:00' ? 'selected' : '' }} value="22:00">22:00</option>
                            <option {{ $time == '23:00' ? 'selected' : '' }} value="23:00">23:00</option>
                            <option {{ $time == '24:00' ? 'selected' : '' }} value="24:00">24:00</option>
                        </select>
                        {{-- <input class="input-main" type="text" placeholder="12:40:00" name="starting_time"> --}}
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 section-input-wrap">
                        <label>@lang('global.listing.fields.location'):</label>
                        <input class="input-main map-input" type="text" id="address1-input" name="fc" placeholder="Откуда" value="{{optional($listing->location)->full}}" required>
                        <input type="hidden" name="address1_latitude" id="address1-latitude" value="{{$listing->location->lat}}" />
                        <input type="hidden" name="address1_longitude" id="address1-longitude" value="{{$listing->location->lng}}" />
                        <input type="hidden" name="address1_component" id="address1-component" value="" />
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 section-input-wrap">
                        <label>@lang('global.listing.fields.destination'):</label>
                        <input class="input-main map-input" type="text" id="address2-input" name="dc" placeholder="Откуда" value="{{optional($listing->destination)->full}}" required>
                        <input type="hidden" name="address2_latitude" id="address2-latitude" value="{{$listing->destination->lat}}" />
                        <input type="hidden" name="address2_longitude" id="address2-longitude" value="{{$listing->destination->lng}}" />
                        <input type="hidden" name="address2_component" id="address2-component" value="0" />
                    </div>
                    @if ($listing->car_id != null)
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 section-input-wrap">
                        <label>@lang('global.listing.fields.passenger'):</label>
                        <input class="input-main" name="max_occupants" type="text" id="max_occupants"
                            value="{{ old('max_occupants', optional($listing)->max_occupants) }}" minlength="1"
                            placeholder="Enter max occupants here...">
                    </div>
                    @elseif($listing->truck_id != null)
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 section-input-wrap" id="truck_cargo">
                        <label>@lang('global.listing.fields.cargo'):</label>
                        <div class="section-select--input2 section-select--input__show section-driver-rules--category justify-content-start">
                            <div class="section-yellow-bg--wrap">
                                @foreach ($cargos as $item)
                                <div class="section-yellow-bg--content">
                                    <span>{{$item->type_name}}</span>
                                    <div class="section-yellow-bg--content__icon">
                                        <svg class="icon icon-close ">
                                            <use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#close')}}"></use>
                                        </svg>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <input type="hidden" id="cargotypes" name="cargotype" value="@foreach ($cargos as $item) {{$item->type_name}}@endforeach">
                            <ul class="section-select--popup__list">
                                @foreach ($cargotypes as $item)
                                <li class="section-select--popup__item hover-text-color">{{$item->type_name}}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    @endif
                    @if ($listing->car_id != null)
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 section-input-wrap">
                        <label>@lang('global.listing.fields.car'):</label>
                        <select class="input-main select2" id="car_id" name="car_id">
                            <option value="" style="display: none;"
                                {{ old('car_id', optional($listing)->car_id ?: '') == '' ? 'selected' : '' }} disabled
                                selected>Select car</option>
                            @foreach ($cars as $key => $car)
                            <option value="{{ $key }}"
                                {{ old('car_id', optional($listing)->car_id) == $key ? 'selected' : '' }}>
                                {{ $car }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    @elseif($listing->truck_id != null)
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 section-input-wrap">
                        <label>@lang('global.listing.fields.truck'):</label>
                        <select class="input-main select2" id="truck_id" name="truck_id">
                            <option value="" style="display: none;"
                                {{ old('car_id', optional($listing)->truck_id ?: '') == '' ? 'selected' : '' }} disabled
                                selected>Select car</option>
                            @foreach ($trucks as $key => $truck)
                            <option value="{{ $key }}"
                                {{ old('car_id', optional($listing)->truck_id) == $key ? 'selected' : '' }}>
                                {{ $truck }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    @endif
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 section-input-wrap">
                        <label>@lang('global.listing.fields.amount'):</label>
                        <input class="input-main" name="price_per_seat" type="text" id="price_per_seat"
                            value="{{ old('price_per_seat', optional($listing)->price_per_seat) }}" minlength="1"
                            placeholder="Enter price per seat here...">
                    </div>
                    {{-- <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 section-input-wrap">
                        <label>Сбор:</label>
                        <input class="input-main" type="text" placeholder="9 000 UZS">
                    </div> --}}
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 section-input-wrap">
                        <div class="checkbox-input--tab__item">
                            <input name="active" type="hidden" value="0">
                            <div class="checkbox-input {{$listing->active == true ? 'checked' : ''}}"></div>
                            <input class="checkbox-input--tab" type="checkbox" name="active"
                                {{$listing->active == true ? 'checked' : ''}}><span>Архив</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section-footer-side">
                <div class="section-buttons--wrap">
                    <button class="section-button--yellow w-100px mr-3" type="submit">@lang('global.app_update')</button>
                    <a href="{{ route('admin.listing.index', app()->getLocale()) }}">
                        <div class="section-button--gray w-100px">@lang('global.app_cancel')</div>
                    </a>
                </div>
            </div>
        </form>

    </div>
    <div id="address-map-container" style="display: none; ">
        <div style="width: 100%; height: 100%" id="address1-map"></div>
        <div style="width: 100%; height: 100%" id="address2-map"></div>
    </div>
</section>
@endsection
@section('add_custom_script')
<script
    src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&libraries=places&callback=initialize&language=en-RU"
    async defer></script>
<script src="{{asset('js/mapInput.js')}}"></script>
<script src="{{ url('adminlte/js') }}/select2.full.min.js"></script>
<script>
    function validateForm1() {
        const address1 = $('#address1-component').val();
        const address2 = $('#ddress2-component').val();
        if (address1 == 0 || address2 == 0) {
            alert("Please input valid address in google map");
            return false;
        }
    }
    $(document).ready(function() {
        $('.select2').select2();
        $('#trip_type').on('DOMSubtreeModified', function() {
            if ($('#trip_type').data('type') == 'passenger') {
                $('#car_users').show();
                $('#truck_cargo').hide();
                $('#select_car').show();
                $('#select_truck').hide();
            } else if ($('#trip_type').data('type') == 'cargo') {
                $('#car_users').hide();
                $('#truck_cargo').show();
                $('#select_car').hide();
                $('#select_truck').show();
            }
        })

         // model fetch
        $('#user_id').on('change', function () {
            var query = $(this).val();
            fetch_cars(query);
        });

        fetch_cars($('#user_id').val());

        function fetch_cars(query) {
          var type = $('#listing_type').val();
            $.ajax({
                url: "/fetch_cars?query=" + query +'&type="' + type,
                success: function (data) {
                    $('#car_id').html(data['cars']);
                    $('#truck_id').html(data['trucks']);
                }
            })
        }
    });
</script>
@endsection
