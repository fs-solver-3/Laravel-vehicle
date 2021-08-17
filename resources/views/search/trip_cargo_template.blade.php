@php
    use Hashids\Hashids;
    $hashids = new Hashids();
@endphp
@if(count($trips) != 0)
<div class="container">
    <div class="trips-category--wrapper">
        <div class="col-xl-7 trips-category--buttons">
            <div class="gogocar-gray-button w-170">@lang('front.trip_template.all')</div>
            <div class="gogocar-gray-button w-170">@lang('front.trip_template_cargo.express')</div>
            <div class="gogocar-gray-button w-170">@lang('front.trip_template_cargo.small_size')</div>
        </div>
        <div class="trips-catelory--list row">
            @foreach($trips as $trip)
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 gogocar-trip--item gogocar-trip-pagination--item">
                <div class="gogocar-trip--item__top">
                    <div class="gogocar-trip--item-town__route">
                        <div class="gogocar-trip--item__town"><span>{{$trip->sourcecity->city}}</span>
                            <div class="gogocar-trip--item__town--when">
                                <svg class="icon icon-calendar3 ">
                                    <use xlink:href="{{asset('static/img/svg/symbol/sprite.svg#calendar3')}}"></use>
                                </svg>
                                @php
                                    $ru_month = array( 'Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь', 'Июль', 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь' );
                                    $en_month = array( 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December' );

                                    $ru_weekdays = array( 'Понедельник', 'Вторник', 'Среда', 'Четверг', 'Пятница', 'Суббота', 'Воскресенье' );
                                    $en_weekdays = array( 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday' );

                                    $date = date('F', strtotime ( $trip->starting_date )); 
                                    $date_month = str_replace($en_month, $ru_month, $date);
                                    $date_day = str_replace($en_weekdays, $ru_weekdays, date('l', strtotime ( $trip->starting_date )));
                                @endphp  
                                <div class="gogocar-trip--item__town--when__date">{{$date_day}}, {{ date('j', strtotime ( $trip->starting_date )) }},  {{$date_month}}</div>
                            </div><span>{{$trip->destinationcity->city}}</span>
                        </div>
                        <div class="gogocar-trip--item__route">
                            <div class="gogocar-trip--item__route--start"></div>
                            <div class="gogocar-trip--item__route--end"></div>
                        </div>
                        <div class="gogocar-drivers--time">
                            <div class="gogocar-drivers--time--start">
                                @php
                                $datetime1 = new DateTime($trip->starting_date);
                                $date1 = $datetime1->format('Y-m-d');
                                $time1 = $datetime1->format('H:i');
                                @endphp
                                <span>{{ $time1 }}</span>
                                <div class="gogocar-drivers--time__icon gdt-yellow">
                                    <svg class="icon icon-location2 ">
                                        <use xlink:href="{{asset('static/img/svg/symbol/sprite.svg#location2')}}">
                                        </use>
                                    </svg>
                                </div>
                            </div>
                            @php
                            $seconds = $trip->time;
                            $hours = floor($seconds / 3600);
                            $h = floor($seconds / 3600);
                            $seconds -= $hours * 3600;
                            $minutes = floor($seconds / 60);
                            // $seconds -= $minutes * 60;
                            @endphp
                            <div class="gogocar-trip--item__km">{{ round($trip->distance/1000) }} км  <span>(
                                    {{ $hours }} ч.
                                    {{ $minutes }} мин. )</span>
                                <p>{{round($trip->distance_from_you)}}km @lang('front.search_page.from_you')</p>
                            </div>
                            <div class="gogocar-drivers--time--end">
                                <div class="gogocar-drivers--time__icon gdt-green">
                                    <svg class="icon icon-location2 ">
                                        <use xlink:href="{{asset('static/img/svg/symbol/sprite.svg#location2')}}">
                                        </use>
                                    </svg>
                                </div>
                                @php
                                $arrival_time = date('m-d H:i',strtotime('+'.$h.' hours
                                +'.$minutes.'minutes',strtotime($trip->starting_date)));
                                @endphp
                                <span>{{ $arrival_time }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="gogocar-trip--item__bottom">
                    <div class="gogocar-drivers--profile--wrap">
                        @if($trip->carowner->avatar!=null)
                        <div class="gogocar-drivers--profile"
                            style="background-image:url('{{asset($trip->carowner->avatar)}}');">
                        </div>
                        @else
                        <div class="gogocar-drivers--profile"
                            style="background-image:url('{{asset('static/img/general/photo.png')}}');">
                        </div>
                        @endif
                        <div class="gogocar-trips-category--name__rating">
                            <div class="gogocar-trips-category--name__rating--attr--wrap">
                                <div class="gogocar-trips-category--name__rating--wrap"><span
                                        class="gogocar-trips-category--name">{{$trip->carowner->name}}</span>
                                    <div class="gogocar-trips-category--rating green-rating">
                                        <svg class="icon icon-green-star ">
                                            <use xlink:href="{{asset('static/img/svg/symbol/sprite.svg#green-star')}}">
                                            </use>
                                        </svg><span>{{ $trip->carowner->rating }}</span>
                                    </div>
                                </div>
                                <div class="gogocar-trips-category--name__attr--list">
                                    @if(isset($trip->user_preferences->music_allowed))
                                    @if($trip->user_preferences->music_allowed)
                                    <div class="gogocar-trips-category--name__attr--item gogocar-attr--green">
                                        <svg class="icon icon-music ">
                                            <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#music') }}">
                                            </use>
                                        </svg>
                                    </div>
                                    @endif
                                    @if($trip->user_preferences->pet_allowed)
                                    <div class="gogocar-trips-category--name__attr--item gogocar-attr--red">
                                        <svg class="icon icon-dogs ">
                                            <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#dogs') }}">
                                            </use>
                                        </svg>
                                    </div>
                                    @endif
                                    @if($trip->user_preferences->dialog_allowed)
                                    <div class="gogocar-trips-category--name__attr--item gogocar-attr--green">
                                        <svg class="icon icon-talk ">
                                            <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#talk') }}">
                                            </use>
                                        </svg>
                                    </div>
                                    @endif
                                    @endif
                                </div>
                            </div>
                            <div class="gogocar-trips-category--price money" data-currency-rub="{{Helper::convertCurrency($trip->price_per_seat, 'UZS', 'RUB')}}" data-currency-uzs="{{$trip->price_per_seat}}">
                                {{ $trip->price_per_seat }} UZS
                        </div>
                        </div>
                    </div>
                    @php
                    if($trip->car_id != null)
                    $trip_type2 = "passenger";
                    elseif($trip->truck_id != null)
                    $trip_type2 = "cargo";
                    else
                    $trip_type2 = null;
                    @endphp
                    @if(Auth::user())
                        @if($trip->user->id != optional(Auth::user())->id)
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
        <div class="gogocar-panination"></div>
        <div class="gogocar-trip--bottom-flex">
            {{-- <div class="gogocar-yellow-button w-270">Показать еще</div> --}}
            <div class="gogocar-gray-button gogocar-gray-button-hover w-270">Уведомить о новых поездках</div>
        </div>
    </div>
</div>
@else
<div class="main-section--title--v2 text-center">@lang('front.trip.no_result').</div>
@endif