@extends('layouts.user_app')
@section('title', 'Ваши поездки')
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
    <section class="you-trip">
        <div class="container">
          <div class="you-trip--wrap">
            <h1 class="main-section--title text-center">Существующий @lang('front.profile_trips.your') <span>@lang('front.profile_trips.trip')</span></h1>
            <p class="section-desc">у вас эти поездки на  {{$combined_date_and_time}} - {{$arrival_time_stop}}</p>
            {{-- <div class="col-xl-6 col-lg-6 gogocar-you-trip--wrap m-0-auto">
              <div class="gogocar-gray-button active" data-gogocar="driver">Я водитель</div>
              <div class="gogocar-gray-button" data-gogocar="companion">Я попутчик</div>
            </div> --}}
            @php
              use Hashids\Hashids;
              $hashids = new Hashids();
            @endphp
            <div class="col-xl-8 col-lg-8 you-trip--content m-0-auto">
              <div class="gogocar-trip--item driver active">
                @if(count($trips) > 0)
                    @foreach ($trips as $trip)
                    <a href="{{ route('trip-detail', [app()->getLocale(), 't_id'=>$hashids->encode($trip->id)]) }}">
                    <div class="driver-trips">
                        <div class="gogocar-trip--item__top">
                          
                        <div class="car-to-book--item--top">
                          <span class="car-to-book--item--date">{{date('d.m.Y',strtotime($trip->starting_date))}} {{date('H:i',strtotime($trip->starting_date))}}</span>
                          @if(!is_null($trip))
                              <div class="gogocar-trip--item__top">
                                  <div class="gogocar-trip--item-town__route">
                                      <div class="gogocar-trip--item__town">
                                        <div class="gogocar-drivers--time__icon gdt-yellow">
                                          <svg class="icon icon-location2 ">
                                              <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#location2') }}"></use>
                                          </svg>
                                        </div>
                                        <span class="from_position">
                                          @if(!empty($trip->sourcecity->district))
                                            {{ $trip->sourcecity->district }} {{ $trip->sourcecity->city }}
                                          @elseif(!empty($trip->sourcecity->city))
                                            {{ $trip->sourcecity->city }}
                                          @elseif(!empty($trip->sourcecity->state))
                                            {{ $trip->sourcecity->state }}
                                          @endif
                                        </span>
                                        <div class="gogocar-trip--item__route" style="min-width: 100px; margin-top: 7px;">
                                            <div class="gogocar-trip--item__route--start"></div>
                                            <div class="gogocar-trip--item__route--end"></div>
                                        </div>
                                        <span class="to_position">
                                          @if(!empty($trip->destinationcity->district))
                                            {{ $trip->destinationcity->district }} {{ $trip->destinationcity->city }}
                                          @elseif(!empty($trip->destinationcity->city))
                                            {{ $trip->destinationcity->city }}
                                          @elseif(!empty($trip->destinationcity->state))
                                            {{ $trip->destinationcity->state }}
                                          @endif
                                        </span>
                                        <div class="gogocar-drivers--time__icon gdt-green">
                                          <svg class="icon icon-location2 ">
                                              <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#location2') }}"></use>
                                          </svg>
                                        </div>
                                      </div>
                                  </div>
                              </div>
                            @endif
                            <div class="you-trip--companions">
                              @if(count($trip->bookings) > 0)
                                <div class="car-to-book--item--profile">
                                  <span>{{count($trip->bookings)}} Пассажир</span>
                                </div>
                                {{-- @foreach ($trip->bookings as $book)
                                  @if(!is_null($book->user) && $book->canceled == false)
                                    <div class="car-to-book--item--profile">

                                        @if(!is_null($book->user) && !is_null($book->user->avatar))
                                        <div class="header-user-profile--img" style="background-image:url('{{ asset($book->user->avatar) }}');"></div>
                                        @else    
                                        <div class="cat-to-book--item__img" style="background-image:url('{{ asset('/static/img/content/drivers-avatar/driver1.png') }}');"></div>
                                        @endif
                                        <div class="you-trip--companion"><span>{{ $book->user->name}}</span>
                                        <div class="you-trip--com--desc">Попутчик №{{ $book->user->id}}</div>
                                        </div>
                                    </div>
                                  @endif
                                @endforeach --}}
                              @else
                                <div class="car-to-book--item--profile">
                                  <span>@lang('front.profile_trips.no_traveller')</span>
                                </div>
                              @endif
                            </div>
                        </div>
                        <div class="car-to-book--item--bottom">
                            <div class="car-to-book--bottom-info">
                              <div class="car-to-book--place--price">{{ $trip->seats() }} @lang('front.profile_trips.place'): <span class="money" data-currency-rub="{{Helper::convertCurrency($trip->price_per_seat, 'UZS', 'RUB')}}" data-currency-uzs="{{$trip->price_per_seat}}">
                                {{ $trip->price_per_seat }} UZS
                                </span></div>
                              <div class="car-to-book--during">@lang('front.profile_trips.payment'): <span>@lang('front.profile_trips.on_the_way')</span></div>
                            </div>
                            <div class="gogocar-ready-plan--car">
                              @if(!is_null($trip->car))
                              <div class="gogocar-gray-icons">
                                  <svg class="icon icon-taxi ">
                                      <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#taxi') }}"></use>
                                  </svg>
                              </div>
                              <div class="gogocar-ready-plan--text">
                                  
                                  {{$trip->car->model}}
                              </div>
                              @endif
                              @if(!is_null($trip->truck))
                              <div class="gogocar-gray-icons">
                                  <svg class="icon icon-cargo ">
                                      <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#cargo') }}"></use>
                                  </svg>
                              </div>
                              <div class="gogocar-ready-plan--text">
                                  
                                  {{$trip->truck->model}}
                              </div>
                              @endif
                            </div>
                            <div class="cat-to-book--bottom-how-to-pay">@lang('front.profile_trips.cash')</div>
                        </div>
                        </div>
                        <div class="gogocar-trip--item__bottom">
                        <div class="car-to-book--services">
                            <div class="car-to-book--services--left">
                              <div class="gogocar-gray-icons">
                                  <svg class="icon icon-question ">
                                  <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#question')}}"></use>
                                  </svg>
                              </div>
                              <div class="car-to-book--services--left--content">
                                <span class="car-to-book--place--price">@lang('front.profile_trips.service_charge')</span>
                                <span class="car-to-book--during">@lang('front.profile_trips.no_ride_fee')</span>
                              </div>
                            </div>
                            <div class="car-to-book--services--right">
                              <div class="car-to-book--services--left--content">
                                <span class="car-to-book--during--right money" data-currency-rub="{{Helper::convertCurrency($trip->price_per_seat, 'UZS', 'RUB')}}" data-currency-uzs="{{$trip->price_per_seat}}">
                                {{ $trip->price_per_seat }} UZS
                                </span>
                              </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    </a>
                    @endforeach
                @else
                    <p class="section-desc">@lang('front.profile_trips.no_trip')</p>
                @endif
              </div>
            </div>
          </div>
        </div>
    </section>
</div>
<script>
    $(document).ready(function(){
        $('.custom-date').change(function(){
            let trip_id = $(this).data('trip-id');
            $("#date-" + trip_id).val($(this).val());
        })

        $('.hidden1').on('DOMSubtreeModified',function(){
            let trip_id = $(this).data('trip-id');
            $("#min-price-" + trip_id).val($(this).html());
        })

        $('.hidden2').on('DOMSubtreeModified',function(){
            let trip_id = $(this).data('trip-id');
            $("#max-price-" + trip_id).val($(this).html());
        })

      
    })
</script>
@endsection
@section('user_lang')
    @include('includes.user_flag')
@endsection
