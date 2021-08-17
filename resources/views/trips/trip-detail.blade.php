@extends('layouts.user_app')
@section('title', 'Ваши поездки')
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
                    <a class="breadcrumbs--item" href="{{ route('trips', app()->getLocale()) }}">@lang('front.header.your_trips')
                        <svg class="icon icon-arrow-right3 ">
                            <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#arrow-right3') }}"></use>
                        </svg>
                    </a>
                </ul>
            </div>
        </section>
        
        @if(Session::has('success_message'))
            <div class="container">
                <div class="alert alert-success">
                    <span class="glyphicon glyphicon-ok"></span>
                    {!! session('success_message') !!}
                    <button type="button" class="close" data-dismiss="alert" aria-label="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        @endif
        <section class="ready-plan-trip">
            <div class="container">
                <div class="ready-plan-trip--wrap">
                    <h1 class="main-section--title--v2 text-center mb-5">@lang('front.plan.trip_is_planned_for')
                        @php
                            $ru_month = array( 'Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь', 'Июль', 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь' );
                            $en_month = array( 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December' );

                            $ru_weekdays = array( 'Понедельник', 'Вторник', 'Среда', 'Четверг', 'Пятница', 'Суббота', 'Воскресенье' );
                            $en_weekdays = array( 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday' );

                            $date = date('F', strtotime ( $detail->starting_date )); 
                            $date_month = str_replace($en_month, $ru_month, $date);
                            $date_day = str_replace($en_weekdays, $ru_weekdays, date('l', strtotime ( $detail->starting_date )));
                        @endphp  
                        <span>{{$date_day}}, {{ date('j', strtotime ( $detail->starting_date )) }},  {{$date_month}}</span>
                    </h1>
                    <div class="ready-plan-trip--info">
                        <div class="gogocar-trip--item">
                            <div class="gogocar-trip--item__top">
                                <div class="gogocar-trip--item-town__route">
                                    <div class="gogocar-trip--item__town">
                                        <span>{{ $detail->location->full }}</span><span>{{ $detail->destination->city }}</span>
                                    </div>
                                    <div class="gogocar-trip--item__route">
                                        <div class="gogocar-trip--item__route--start"></div>
                                          @if (count($stops) > 0)
                                              @foreach ($stops as $item)
                                                  @if (($item->distance != '' || $item->time != '') && $detail->distance != 0 )
                                                      @php
                                                      $seconds_stop = $item->time;
                                                      $hours_stop = floor($seconds_stop / 3600);
                                                      $h_stop = floor($seconds_stop / 3600);
                                                      $seconds_stop -= $hours_stop * 3600;
                                                      $minutes_stop = floor($seconds_stop / 60);
                                                      $arrival_time_stop  = date('H:i',strtotime('+'.$h_stop.' hours + '.$minutes_stop.'minutes',strtotime($detail->starting_date)));
                                                      @endphp
                                                      <div class="gogocar-ready-plan-trip--info" style="">
                                                        <div class="gogocar-plan-trip-driver-position--town-2 stop-detail" style="padding: 0px; display: none; left: calc({{ $item->distance / $detail->distance * 100 -2 }}%);">
                                                            @if($detail->distance != 0)
                                                                <span style="">{{$item->location->full }} --{{$item->starting_hour}}
                                                                </span>
                                                            @endif
                                                        </div>
                                                        <div class="gogocar-plan-trip-driver-position--dot2" style="padding: 0px;">
                                                            <div class="span_point" style="left: calc({{ $item->distance / $detail->distance * 100 }}%);" data-distance = "{{ $item->distance}}" data-total="{{$detail->distance}}"></div>
                                                        </div>
                                                        <div class="gogocar-plan-trip-driver-position--time">
                                                            <span style="left: calc({{ $item->distance / $detail->distance * 100 }}%);">
                                                                {{-- {{$item->starting_hour}} --}}
                                                            </span></div>
                                                        </div>
                                                  @else
                                                      <div class="gogocar-ready-plan-trip--info" style="">
                                                          <div class="gogocar-plan-trip-driver-position--town"
                                                              style="padding: 0px;"><span>{{ str_limit($item->location->full, 15) }}</span>
                                                          </div>
                                                          <div class="gogocar-plan-trip-driver-position--dot"
                                                              style="padding: 0px;"></div>
                                                          <div class="gogocar-plan-trip-driver-position--time"
                                                              style="padding: 0px;">
                                                              <span>@lang('front.plan.not_expected')</span>
                                                          </div>
                                                      </div>
                                                  @endif
                                              @endforeach
                                          @endif
                                        <div class="gogocar-trip--item__route--end"></div>
                                    </div>
                                    <div class="gogocar-drivers--time">
                                        <div class="gogocar-drivers--time--start">
                                            @php
                                                $datetime1 = new DateTime($detail->starting_date);
                                                $date1 = $datetime1->format('Y-m-d');
                                                $time1 = $datetime1->format('H:i');
                                            @endphp
                                            <span>{{$time1}}</span>
                                            <div class="gogocar-drivers--time__icon gdt-yellow">
                                                <svg class="icon icon-location2 ">
                                                  <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#location2') }}"></use>
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="gogocar-drivers--time--end">
                                            <div class="gogocar-drivers--time__icon gdt-green">
                                                <svg class="icon icon-location2 ">
                                                  <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#location2') }}"></use>
                                                </svg>
                                            </div>
                                            @php
                                                $seconds = $detail->time;
                                                $hours = floor($seconds / 3600);
                                                $h = floor($seconds / 3600);
                                                $seconds -= $hours * 3600;
                                                $minutes = floor($seconds / 60);
                                                $arrival_time  = date('m-d H:i',strtotime('+'.$h.' hours + '.$minutes.'minutes',strtotime($detail->starting_date)));
                                            @endphp
                                           <span>{{$arrival_time}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="gogocar-trip--item__bottom">
                                <div class="gogocar-ready-plan--bottom">
                                    <div class="gogocar-ready-plan--km__place">
                                        <div class="gogocar-trip--item__km">{{ round($detail->distance/1000) }} км  <span>( {{ $hours }} ч. {{$minutes}} мин. )</span></div>
                                        <div class="gogocar-ready-plan--place">
                                            <svg class="icon icon-trip-place ">
                                                <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#trip-place')}}"></use>
                                            </svg>
                                        {{$detail->seats()}} @lang('front.trip_end.seat')</div>
                                    </div>
                                    <div class="gogocar-ready-plan--car">
                                        @if(!is_null($detail->car))
                                            <div class="gogocar-gray-icons">
                                                <svg class="icon icon-taxi ">
                                                    <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#taxi') }}"></use>
                                                </svg>
                                            </div>
                                            <div class="gogocar-ready-plan--text">
                                                
                                                {{$detail->car->model}}
                                            </div>
                                        @endif
                                        @if(!is_null($detail->truck))
                                            <div class="gogocar-gray-icons">
                                                <svg class="icon icon-cargo ">
                                                    <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#cargo') }}"></use>
                                                </svg>
                                            </div>
                                            <div class="gogocar-ready-plan--text">
                                                
                                                {{$detail->truck->model}}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="gogocar-ready-plan--covid">
                                        <div class="gogocar-gray-icons">
                                            <svg class="icon icon-covid ">
                                                <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#covid') }}"></use>
                                            </svg>
                                        </div>
                                        <div class="gogocar-ready-plan--covid--info">
                                            <div class="gogocar-ready-plan--covid--title">{{$detail->covid19_title}}</div>
                                            <div class="gogocar-ready-plan--covid--desc">{{$detail->covid19_desc}}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="gogocar-ready-plan--map__price">
                                    {{-- <div class="gogocar-gray-icons">
                                        <svg class="icon icon-map-gray ">
                                            <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#map-gray') }}"></use>
                                        </svg>
                                    </div> --}}
                                    <div class="gogocar-ready-plan__price money" data-currency-rub="{{Helper::convertCurrency($detail->price_per_seat, 'UZS', 'RUB')}}" data-currency-uzs="{{$detail->price_per_seat}}">{{ $detail->price_per_seat }} UZS
                                    
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="gogocar-ready-plan__mobile">
                          <div class="gogocar-ready-plan--car">
                              <div class="gogocar-gray-icons">
                                  <svg class="icon icon-taxi ">
                                      <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#taxi') }}"></use>
                                  </svg>
                              </div>
                              <div class="gogocar-ready-plan--text">{{$detail->model}}</div>
                          </div>
                          <div class="gogocar-ready-plan--covid">
                              <div class="gogocar-gray-icons">
                                  <svg class="icon icon-covid ">
                                      <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#covid') }}"></use>
                                  </svg>
                              </div>
                              <div class="gogocar-ready-plan--covid--info">
                                  <div class="gogocar-ready-plan--covid--title">{{$detail->covid19_title}}</div>
                                  <div class="gogocar-ready-plan--covid--desc">{{$detail->covid19_desc}}</div>
                              </div>
                          </div>
                      </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="ready-plan-trip">
            <div class="container">
                <div class="ready-plan-trip--wrap">
                    <h3 class="section-title mb-5">@lang('front.trip_end.fellow')</h3>
                    @if(count($detail->bookings) > 0)
                      <div class="gogocar-companions--wrap row">
                            @foreach ($detail->bookings as $book)
                              @if(!is_null($book->user))
                                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 gogocar-companions--col">
                                    <div class="gogocar-companions--item">
                                        @if(!is_null($book->user->avatar))
                                        <div class="gogocar-companions--img" style="background-image:url('{{ asset($book->user->avatar) }}');"></div>
                                        @else    
                                        <div class="gogocar-companions--img" style="background-image:url('{{ asset('/static/img/content/drivers-avatar/driver1.png') }}');"></div>
                                        @endif
                                        <div class="gogocar-companions--info">
                                            <div class="gogocar-companions--name">{{ $book->user->name}}</div>
                                            <div class="gogocar-companions--place">@lang('front.trip_end.companion') №{{ $book->user->id}}</div>
                                        </div>
                                    </div>
                                </div>
                              @endif
                            @endforeach
                      </div>
                    @else
                      <p class="section-desc text-center">@lang('front.profile_trips.no_traveller')</p>
                    @endif
                </div>
            </div>
        </section>
        @if(count($detail->bookings) > 0)
        <section class="chat">
            <div class="container">
                <div class="chat-wrap">
                    <h3 class="section-title mb-5 chat-container-992--title">@lang('front.plan.chat_with')</h3>
                    <div class="chat-section" id="driver_app">
                        <driver-com :trip_id="{{$detail->id}}"></driver-com>
                    </div>
                </div>
            </div>
        </section>
        @endif
        <section class="you-trip-detail pt-0">
            <div class="container">
                <div class="you-trip-detail--wrap gogocar-box">
                    <div class="you-trip-detail--buttons you-trip-detail--buttons2">
                        <a href="{{ route('trip.return', [app()->getLocale(), 't_id'=>$detail->id]) }}">
                          <div class="you-trip-detail--copy" data-toggle="modal" id="smallButton" data-target="#popup-del-msg-{{$detail->id}}">Обратная поездка</div>
                        </a>
                        <div class="you-trip-copy-and-delete">
                            <a href="{{ route('trip.copy', [app()->getLocale(), 't_id'=>$detail->id]) }}">
                                <div class="you-trip-detail--cancel">@lang('front.trip_end.copy_ride')</div>
                            </a>
                            <div class="you-trip-delete-and-change">
                                <a class="gogocar-gray-icons" href="{{ route('trip.edit', [app()->getLocale(), 't_id'=>$hashids->encode($detail->id)]) }}">
                                    <svg class="icon icon-pen ">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#pen')}}"></use>
                                    </svg>
                                </a>
                                <div class="gogocar-red-icons" data-target="#popup-trip-cancel" data-toggle="modal">
                                    <svg class="icon icon-delete2 ">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#delete2')}}"></use>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="{{ route('trip.end', [app()->getLocale(), 't_id'=>$detail->id]) }}">
                    <div class="gogocar-yellow-button w-370 m-0-auto" >@lang('front.trip_detail.end_trip')</div>
                </a>
            </div>
        </section>
    </div>

<div class="modal fade" id="popup-trip-cancel" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered popup-modal--wrap" role="document">
        <div class="modal-content popup-content">
            <div class="popup-header">
                <div class="popup-modal-close close" data-dismiss="modal" aria-label="Close">
                    <svg class="icon icon-close ">
                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#close')}}"></use>
                    </svg>
                </div>
            </div>
            <div class="popup-covid--wrap popup-icon-size">
                <h3 class="main-section--title--red">@lang('front.trip_end.you_are_one_step') <span>@lang('front.trip_end.delete_trip') !</span></h3>
                <p class="main-section--title font-size-20 text-center">@lang('front.trip_end.are_you_sure') ? <span>@lang('front.trip_end.the_ride')</span></p>
                <div class="you-trip-cancel--buttons">
                    <div class="gogocar-gray-button" data-dismiss="modal" aria-label="Close">@lang('front.trip_end.i_change')</div>
                    <form method="POST" action="{!! route('trip.destroy', ['locale' => app()->getLocale(), 'id' => $detail->id]) !!}" accept-charset="UTF-8">
                        <input name="_method" value="DELETE" type="hidden">
                        {{ csrf_field() }}
                        <div class="notific-icons gogocar-red-button">
                            <button type="submit" class="gogocar-red-button" title="Delete Trip" style="width: 200px;color: #fff">
                                @lang('front.trip_end.delete_trip')
                            </div>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="popup-trip-end" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered popup-modal--wrap" role="document">
        <div class="modal-content popup-content">
            <div class="popup-header">
                <div class="popup-modal-close close" data-dismiss="modal" aria-label="Close">
                    <svg class="icon icon-close ">
                    <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#close')}}"></use>
                    </svg>
                </div>
            </div>
            <div class="popup-covid--wrap popup-icon-size">
                <h3 class="main-section--title--red">@lang('front.trip_end.you_are_one_step') <span>@lang('front.trip_end.cancel')</span> @lang('front.trip_end.trips')!</h3>
                <p class="main-section--title font-size-20 text-center">@lang('front.trip_end.are_you_sure') ? <span>@lang('front.trip_end.the_ride')</span></p>
                <div class="you-trip-cancel--buttons">
                    <div class="gogocar-gray-button" data-dismiss="modal" aria-label="Close">@lang('front.trip_end.i_change')</div>
                    <a class="gogocar-red-button" href="{{ route('trip.end', [app()->getLocale(), 't_id'=>$detail->id]) }}">
                        <span>
                            @lang('front.trip_end.cancel_trip')
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
  <script>
    var stop_show = function() {
            if ($(window).width() > 992) {
                $( ".gogocar-ready-plan-trip--info .span_point" ).hover(
                    function() {
                        $(this).parent().siblings('.gogocar-plan-trip-driver-position--town-2').show();
                    }, function() {
                        $(this).parent().siblings('.gogocar-plan-trip-driver-position--town-2').hide();
                    }
                );
            }
        }

        stop_show();
</script>
@endsection
