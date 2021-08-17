@extends('layouts.app')
@section('title', 'Trips')
@section('admin_lang')
@include('includes.admin_flag')
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
        <div class="section-content--main__wrap box-bg2 pb-0">
            <div class="section-content--main">
                <div class="section-top-side">
                    <div class="section-top-block--back">
                        <a href="{{ route('admin.listing.index', app()->getLocale()) }}">
                            <div class="section-top-block--back__item">
                                <svg class="icon icon-arrow-left ">
                                    <use xlink:href="{{asset('static/img/svg/symbol/sprite.svg#arrow-left')}}"></use>
                                </svg>
                            </div>
                        </a>
                        <div class="section-block--title">@lang('global.listing.fields.add')</div>
                    </div>
                </div>
                <form class="section-support-form" method="POST" action="{{ route('admin.listing.store_listing', app()->getLocale()) }}" accept-charset="UTF-8" id="create_car_form" name="create_car_form" onsubmit="return validateForm1()">
                    {{ csrf_field() }}
                    <div class="section-bottom-side">
                        <div class="section-inputs--wrapper row">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 section-input-wrap">
                                <label>@lang('global.listing.fields.type_trip'):</label>
                                <div class="section-select--input2 section-select--input__show"><span id="trip_type" data-type="passenger">@lang('global.listing.fields.passenger')</span>
                                    <input type="hidden" id="listing_type" name="listing_type" value="passenger">
                                    <div class="section-select--popup__icon">
                                        <svg class="icon icon-arrow-down-white ">
                                            <use xlink:href="{{asset('static/img/svg/symbol/sprite.svg#arrow-down-white')}}"></use>
                                        </svg>
                                    </div>
                                    <ul class="section-select--popup__list section-select--popup__list__show">
                                        <li class="section-select--popup__item2 hover-text-color" data-type="passenger">@lang('global.listing.fields.passenger')</li>
                                        <li class="section-select--popup__item2 hover-text-color" data-type="cargo">@lang('global.listing.fields.freight')</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 section-input-wrap">
                                <label>@lang('global.listing.fields.trip_creator'):</label>
                                <select class="input-main select2" id="user_id" name="user_id" required>
                                    {{-- <option value="" selected>All</option> --}}
                                    @foreach ($users as $key => $user)
                                    <option value="{{ $user->id }}">
                                        {{ $user->name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 section-input-wrap">
                                <label>@lang('global.listing.fields.departure_date'):</label>
                                <div class="section-balance-filter-date__wrap">
                                    <input class="input-main calendar-filter-today calendar-zone-height text-left" type="text" name="starting_date">
                                    <div class="section-balance-date--icon">
                                        <svg class="icon icon-calendar ">
                                            <use xlink:href="{{asset('static/img/svg/symbol/sprite.svg#calendar')}}"></use>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 section-input-wrap">
                                <label>@lang('global.listing.fields.time'):</label>
                                <select class="input-main select2" name="starting_time" id="starting_time">
                                    <option value="00:00">00:00</option>
                                    <option value="01:00">01:00</option>
                                    <option value="02:00">02:00</option>
                                    <option value="03:00">03:00</option>
                                    <option value="04:00">04:00</option>
                                    <option value="05:00">05:00</option>
                                    <option value="06:00">06:00</option>
                                    <option value="07:00">07:00</option>
                                    <option value="08:00">08:00</option>
                                    <option value="09:00">09:00</option>
                                    <option value="10:00">10:00</option>
                                    <option value="11:00">11:00</option>
                                    <option value="12:00">12:00</option>
                                    <option value="13:00">13:00</option>
                                    <option value="14:00">14:00</option>
                                    <option value="15:00">15:00</option>
                                    <option value="16:00">16:00</option>
                                    <option value="17:00">17:00</option>
                                    <option value="18:00">18:00</option>
                                    <option value="19:00">19:00</option>
                                    <option value="20:00">20:00</option>
                                    <option value="21:00">21:00</option>
                                    <option value="22:00">22:00</option>
                                    <option value="23:00">23:00</option>
                                    <option value="24:00">24:00</option>
                                </select>
                                {{-- <input class="input-main" type="text" placeholder="12:40:00" name="starting_time"> --}}
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 section-input-wrap">
                                <label>@lang('global.listing.fields.location'):</label>
                                <input class="input-main map-input" type="text" id="address1-input" name="fc" placeholder="Откуда" required>
                                <input type="hidden" name="address1_latitude" id="address1-latitude" value="0" />
                                <input type="hidden" name="address1_longitude" id="address1-longitude" value="0" />
                                <input type="hidden" name="address1_component" id="address1-component" value="0" />
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 section-input-wrap">
                                <label>@lang('global.listing.fields.destination'):</label>
                                <input class="input-main map-input" type="text" id="address2-input" name="dc" placeholder="Откуда" required>
                                <input type="hidden" name="address2_latitude" id="address2-latitude" value="0" />
                                <input type="hidden" name="address2_longitude" id="address2-longitude" value="0" />
                                <input type="hidden" name="address2_component" id="address2-component" value="0" />
                                {{-- <select class="input-main select2" id="destination_id" name="destination_id">
                                    <option value="" selected>All</option>
                                    @foreach ($destinations as $key => $destination)
                                    <option value="{{ $destination->id }}">
                                        {{ $destination->city }}
                                    </option>
                                    @endforeach
                                </select> --}}
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 section-input-wrap" id="car_users">
                                <label>@lang('global.listing.fields.passenger'):</label>
                                <input class="input-main" name="max_occupants" type="text" id="max_occupants" value="" minlength="1" placeholder="Enter max occupants here...">
                            </div>

                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 section-input-wrap" id="truck_cargo" style="display: none">
                                <label>@lang('global.listing.fields.cargo'):</label>
                                <div class="section-select--input2 section-select--input__show section-driver-rules--category justify-content-start" id="select_cargotype">
                                    <div class="section-yellow-bg--wrap">
                                    </div>
                                    <input type="hidden" id="cargotypes" name="cargotype" value="">
                                    <ul class="section-select--popup__list">
                                        @foreach ($cargotypes as $item)
                                        <li class="section-select--popup__item hover-text-color">{{$item->type_name}}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>

                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 section-input-wrap" id="select_car">
                                <label>@lang('global.listing.fields.car'):</label>
                                <select class="input-main select2" id="car_id" name="car_id">
                                    
                                </select>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 section-input-wrap" id="select_truck" style="display:none">
                                <label>@lang('global.listing.fields.truck'):</label>
                                <select class="input-main select2" id="truck_id" name="truck_id">
                                    <option value="" selected>@lang('global.all')</option>
                                    @foreach ($trucks as $key => $truck)
                                    <option value="{{ $truck->id }}">
                                        {{ $truck->name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 section-input-wrap">
                                <label>@lang('global.listing.fields.amount'):</label>
                                <input class="input-main" name="price_per_seat" type="number" id="price_per_seat" value="" minlength="1" placeholder="Enter price per seat here...">
                            </div>
                            {{-- <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 section-input-wrap">
                                <label>Сбор:</label>
                                <input class="input-main" type="text" placeholder="9 000 UZS">
                            </div> --}}
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 section-input-wrap">
                                <div class="checkbox-input--tab__item">
                                    <input name="active" type="hidden" value="0">
                                    <div class="checkbox-input"></div>
                                    <input class="checkbox-input--tab" type="checkbox" name="active"><span>@lang('global.listing.fields.active')</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="section-footer-side">
                        <div class="section-buttons--wrap">
                            <button class="section-button--yellow w-100px mr-3" type="submit">@lang('global.app_create')</button>
                            <a href="{{ route('admin.listing.index', app()->getLocale()) }}">
                                <div class="section-button--gray w-100px">@lang('global.app_cancel')</div>
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <div id="address-map-container" style="display: none; ">
      <div style="width: 100%; height: 100%" id="address1-map"></div>
      <div style="width: 100%; height: 100%" id="address2-map"></div>
    </div>
@endsection
@section('add_custom_script')
<script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&libraries=places&callback=initialize&language=en-RU" async defer></script>
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