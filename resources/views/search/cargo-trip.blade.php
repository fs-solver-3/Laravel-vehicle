@extends('layouts.user_app')
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
    <div class="container" id="success_msg" style="display: none;">
        <div class="alert alert-success">
            <span class="glyphicon glyphicon-ok"></span>
            <span id="success_msg_content"></span>
            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
    @php
        use Hashids\Hashids;
        $hashids = new Hashids();
    @endphp
    <section class="trip">
        <div class="container">
            <div class="trip--wrap">
                <h1 class="section-title mb-5 font-size-35">@lang('front.trip.trips')</h1>
                <div class="col-xl-10 gogocar-input--wrapper gogocar-trip-filter gogocar-trip-filter-h">
                    <div class="gogocar-gray-icons size-icon--42">
                        <svg class="icon icon-map2 ">
                            <use xlink:href="{{asset('static/img/svg/symbol/sprite.svg#map2')}}"></use>
                        </svg>
                    </div>
                    <div class="gogocar-trip-filter--info">
                        <div class="gogocar-trip-filter--item">
                            <div class="gogocar-trip-filter--item__info">@lang('front.trip.where_from'): <span>{{$filterdata->fc}}</span></div>
                        </div>
                        <div class="gogocar-trip-filter--item">
                            <div class="gogocar-trip-filter--item__info">@lang('front.trip.where_to'): <span>{{$filterdata->dc}}</span></div>
                        </div>
                        <div class="gogocar-trip-filter--item">
                            <div class="gogocar-trip-filter--item__info">@lang('front.trip.when'): <span>{{$filterdata->date}}</span></div>
                        </div>
                        <div class="gogocar-trip-filter--item">
                            <div class="gogocar-trip-filter--item__info">@lang('front.cargo_trip.free_place'):
                                <span>{{$filterdata->capacity}} кг, {{$filterdata->place}} м3</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="drivers-nearby">
        <div class="container">
            <div class="drivers--wrap">
                @if(count($rides) > 0)
                <h3 class="main-section--title--v2 text-center">@lang('front.trip.driver') <span>@lang('front.trip.near_you')</span></h3>
                <p class="section-desc">@lang('front.trip.see_which')</p>
                <div class="drivers-nearby--list row">
                    @php
                        $rides = array_slice($rides, 0, 3);
                    @endphp
                    @foreach($rides as $ride)
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 gogocar-trip--item">
                        <div class="gogocar-trip--item__top">
                            <div class="gogocar-trip--item-town__route">
                                <div class="gogocar-trip--item__town">
                                    <span>{{$ride->sourcecity->city}}</span><span>{{$ride->destinationcity->city}}</span>
                                </div>
                                <div class="gogocar-trip--item__route">
                                    <div class="gogocar-trip--item__route--start"></div>
                                    <div class="gogocar-trip--item__route--end"></div>
                                </div>
                                <div class="gogocar-drivers--time">
                                    <div class="gogocar-drivers--time--start">
                                        @php
                                        $datetime1 = new DateTime($ride->starting_date);
                                        $date1 = $datetime1->format('Y-m-d');
                                        $time1 = $datetime1->format('H:i');
                                        @endphp
                                        <span>{{ $time1 }}</span>
                                        <div class="gogocar-drivers--time__icon gdt-yellow">
                                            <svg class="icon icon-location2 ">
                                                <use
                                                    xlink:href="{{asset('static/img/svg/symbol/sprite.svg#location2')}}">
                                                </use>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="gogocar-trip--item__km">{{round($ride->distance_from_you)}}km @lang('front.search_page.from_you')</div>
                                    <div class="gogocar-drivers--time--end">
                                        <div class="gogocar-drivers--time__icon gdt-green">
                                            <svg class="icon icon-location2 ">
                                                <use
                                                    xlink:href="{{asset('static/img/svg/symbol/sprite.svg#location2')}}">
                                                </use>
                                            </svg>
                                        </div>
                                        @php
                                        $seconds = $ride->time;
                                        $hours = floor($seconds / 3600);
                                        $h = floor($seconds / 3600);
                                        $seconds -= $hours * 3600;
                                        $minutes = floor($seconds / 60);
                                        $arrival_time = date('m-d H:i',strtotime('+'.$h.' hours
                                        +'.$minutes.'minutes',strtotime($ride->starting_date)));
                                        @endphp
                                        <span>{{$arrival_time}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="gogocar-trip--item__bottom">
                            <div class="gogocar-drivers--profile--wrap">
                                @if($ride->carowner->avatar!=null)
                                <div class="gogocar-drivers--profile"
                                    style="background-image:url('{{asset($ride->carowner->avatar)}}');">
                                </div>
                                @else
                                <div class="gogocar-drivers--profile"
                                    style="background-image:url('{{asset('static/img/general/photo.png')}}');">
                                </div>
                                @endif
                                <div class="gogocar-drivers--price">{{$ride->carowner->name}} ~
                                    <span>{{$ride->price_per_seat}} UZS</span></div>
                            </div>
                            @php
                            if($ride->car_id!=null)
                            $trip_type1="passenger";
                            elseif($ride->truck_id!=null)
                            $trip_type1="cargo";
                            else
                            $trip_type1=null;
                            @endphp
                            @if(Auth::user())
                            @if($ride->user != null && ($ride->user->id != optional(Auth::user())->id))
                                <a
                                    href="{{ route('tripplan', [app()->getLocale(), 't_id'=>$hashids->encode($ride->id), 'type'=>$trip_type1]) }}">
                                    <div class="gogocar-gray-icons2">
                                        <svg class="icon icon-arrow-right3 ">
                                            <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#arrow-right3') }}">
                                            </use>
                                        </svg>
                                    </div>
                                </a>
                            @else
                                    <a href="{{ route('trip-detail', [app()->getLocale(), 't_id'=>$hashids->encode($ride->id)]) }}">
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
                @endif
            </div>
        </div>
    </section>
    <section class="all-trip pt-0">
        <div class="container">
            <h3 class="section-title font-size-35">@lang('front.trip.all_trip')</h3>
        </div>
        <div class="all-trip--filter--wrap">
            <div class="container">
                <div class="all-trip--left__right">
                    <div class="all-trip--left"><span>Доступно {{count($trips)}} поездок</span></div>
                    <div class="all-trip--right">
                        <div class="all-trip--sort" data-type="distance">Сортировать: <span>по расстоянию</span>
                            <svg class="icon icon-arrow-right ">
                                <use xlink:href="{{asset('static/img/svg/symbol/sprite.svg#arrow-right')}}"></use>
                            </svg>
                        </div>
                        <div class="all-trip--filter--button">
                            <svg class="icon icon-filter ">
                                <use xlink:href="{{asset('static/img/svg/symbol/sprite.svg#filter')}}"></use>
                            </svg>
                        </div>
                        <div class="all-trip--sort--select">
                            <div class="all-trip--sort--select__item" data-type="distance">По расстоянию</div>
                            <div class="all-trip--sort--select__item" data-type="price">По цене</div>
                            <div class="all-trip--sort--select__item" data-type="rating">По рейтингу водителя</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="all-trip--popup--wrap">
            <div class="container">
                <div class="all-trip--popup--content row">
                    <div class="col-xl-4 atpc-filter">
                        <div class="all-trip--popup__col">
                            <label>Время:</label>
                            <div class="all-trip--popup__time">
                                <div class="all-trip--popup__time--before"><span>от</span>
                                    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                                    <select class="gogocar-select" name="before_time" id="before_time">
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
                                </div><span class="all-trip--space">–</span>
                                <div class="all-trip--popup__time--after"><span>до</span>
                                    <select class="gogocar-select" name="after_time" id="after_time">
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
                                        <option value="24:00" selected>24:00</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 atpc-filter">
                        <div class="all-trip--popup__col">
                            <label>@lang('front.trip.date'):</label>
                            <input
                                class="gogocar-input--filter popup-show-calendar popup-show-calendar-click calendar-zone-height"
                                type="text" name="selected_date" id="selected_date" value="{{ $filterdata->date }}">
                        </div>
                    </div>
                    <div class="col-xl-4 atpc-filter">
                        <div class="all-trip--popup__col">
                            <label>@lang('front.trip.booking'):</label>
                            <div class="all-trip--popup--to--book">
                                <input class="all-trip--popup-checkbox" id="all-trip-checkbox" type="checkbox"
                                    id="all_trip_checkbox" name="all_trip_checkbox">
                                <label for="all-trip-checkbox">Автоматическое подтверждение</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 atpc-filter">
                        <div class="all-trip--popup__col">
                            <label>@lang('front.trip.point_departure'):</label>
                            <input class="gogocar-input--filter map-input" type="text" placeholder="Откуда"
                                name="from_position" id="address1-input" value="{{ $filterdata->fc }}">
                            <input type="hidden" name="address1_latitude" id="address1-latitude" value="{{ $filterdata->address3_latitude }}" />
                            <input type="hidden" name="address1_longitude" id="address1-longitude" value="{{ $filterdata->address3_longitude }}" />
                            <input type="hidden" name="address1_component" id="address1-component" value="{{ $filterdata->address3_component }}" />
                        </div>
                    </div>
                    <div class="col-xl-6 atpc-filter">
                        <div class="all-trip--popup__col">
                            <label>@lang('front.trip.point_destination'):</label>
                            <input class="gogocar-input--filter map-input" type="text" placeholder="Куда"
                                name="to_position" id="address2-input" value="{{ $filterdata->dc }}">
                            <input type="hidden" name="address2_latitude" id="address2-latitude" value="{{ $filterdata->address4_latitude }}" />
                            <input type="hidden" name="address2_longitude" id="address2-longitude" value="{{ $filterdata->address4_longitude }}" />
                            <input type="hidden" name="address2_component" id="address2-component" value="{{ $filterdata->address4_component }}" />
                        </div>
                    </div>
                    <div class="col-xl-4 atpc-filter">
                        <div class="all-trip--popup__col">
                            <label>@lang('front.trip.price')  (UZS):</label>
                            <div class="all-trip--popup__time">
                                <div class="all-trip--popup__time--before"><span>от</span>
                                    <input class="gogocar-input--filter" type="text" name="from_price" id="from_price">
                                </div><span class="all-trip--space">–</span>
                                <div class="all-trip--popup__time--after"><span>до</span>
                                    <input class="gogocar-input--filter" type="text" name="to_price" id="to_price">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 atpc-filter">
                        <div class="all-trip--popup__col">
                            <label>@lang('front.trip.distance') :</label>
                            <input class="gogocar-input--filter" type="text" placeholder="Любое"
                                name="distance_from_you" id="distance_from_you" value="{{Helper::setting('radius')}}">
                        </div>
                    </div>
                    <div class="col-xl-4 atpc-filter">
                        <div class="all-trip--popup__col">
                            <label>@lang('front.trip.rating'):</label>
                            <select class="gogocar-select" name="driver_rating" id="driver_rating">
                                <option value="0">0</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-xl-4 atpc-filter">
                        <div class="all-trip--popup__col">
                            <label>@lang('front.trip.truck_type'):</label>
                            <select class="gogocar-select" name="truck_type" id="truck_type">
                                @foreach ($bodytypes as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                                {{-- <option value="Бортовой кузов">Бортовой кузов</option>
                                <option value="Тентованный кузов">Тентованный кузов</option>
                                <option value="Цельнометаллический кузов">Цельнометаллический кузов</option>
                                <option value="Изотермический кузов">Изотермический кузов</option>
                                <option value="Рефрижератор">Рефрижератор</option>
                                <option value="Платформы и низкорамные тралы">Платформы и низкорамные тралы</option>
                                <option value="Цистерны">Цистерны</option> --}}
                            </select>
                        </div>
                    </div>
                    <div class="col-xl-4 atpc-filter">
                        <div class="all-trip--popup__col">
                            <label>@lang('front.cargo_trip.possible_weight') (кг):</label>
                            <input class="gogocar-input--filter" type="text" placeholder="Любой" name="capacity"
                            id="capacity" value="{{$filterdata->capacity}}">
                        </div>
                    </div>
                    <div class="col-xl-4 atpc-filter">
                        <div class="all-trip--popup__col">
                            <label>@lang('front.cargo_trip.volumn') (м3):</label>
                            <input class="gogocar-input--filter" type="text" placeholder="Любой" name="place"
                                id="place" value="{{$filterdata->place}}">
                        </div>
                    </div>
                    <button class="gogocar-yellow-button" id="filter_trip">@lang('front.cargo_trip.continue')</button>
                </div>
                <div class="all-trip--result">(16 @lang('front.cargo_trip.fit') {{count($trips)}} @lang('front.cargo_trip.travel'))</div>
            </div>
        </div>
    </section>
    <section class="trips-category">
        @include('search.trip_cargo_template')
    </section>
</div>
<div id="address-map-container" style="display: none; ">
    <div style="width: 100%; height: 100%" id="address1-map"></div>
    <div style="width: 100%; height: 100%" id="address2-map"></div>
</div>
<script>
    window.searchtrip_url = "{{ route("search_cargo_trips", app()->getLocale()) }}";
    $(document).ready(function() {
        if($('#selected_date').val() == ''){
            $('#selected_date').datepicker({
            autoShow: false,
            language: 'ru-RU',
            autoHide: true,
            //trigger: '.data-exam-popup',
            container: '.popup-calendar',
            pickedClass: 'picked-day-gogocar',
            highlightedClass: 'today-day-gogocar',
            zIndex: 1050,
        });  
        }
    });
</script>
@endsection