@extends('layouts.user_app')
@section('content')
<div class="content">
    @php
        use Hashids\Hashids;
        $hashids = new Hashids();
    @endphp
    @php
        if($trip->car_id!=null)
        $trip_type1="passenger";
        elseif($trip->truck_id!=null)
        $trip_type1="cargo";
        else
        $trip_type1=null;
    @endphp
    <section class="breadcrumbs">
        <div class="container">
            <ul class="breadcrumbs--list">
                <a class="breadcrumbs--item" href="/">@lang('front.profile.home')
                    <svg class="icon icon-arrow-right3 ">
                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#arrow-right3') }}"></use>
                    </svg>
                </a>
                <a class="breadcrumbs--item" href="{{ route('search', app()->getLocale()) }}">@lang('front.header.find')<span>&nbsp @lang('front.header.trip')</span>
                    <svg class="icon icon-arrow-right3 ">
                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#arrow-right3') }}"></use>
                    </svg>
                </a>
                <a class="breadcrumbs--item" href="{{ route('tripplan', [app()->getLocale(), 't_id'=>$hashids->encode($trip->id), 'type'=>$trip_type1]) }}">
                    @lang('front.trip_detail.detail')
                    <svg class="icon icon-arrow-right3 ">
                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#arrow-right3') }}"></use>
                    </svg>
                </a>
                @if($trip_type1 == 'passenger')
                <a class="breadcrumbs--item" href="{{ route('car_place', [app()->getLocale(), 'trip_id'=>$trip->id]) }}">
                    @lang('front.car-place.place')
                </a>
                @endif
            </ul>
        </div>
    </section>
    @if(count($trips) == 0)
    <section class="car-to-book">
        <div class="container">
            <div class="car-to-book--wrap">
                <h1 class="main-section--title--v2 text-center mb-5">@lang('front.carbook.check_everything_and') <span>@lang('front.carbook.book_now') !</span></h1>
                <div class="col-xl-9 col-lg-9 car-to-book--content">
                    <div class="gogocar-trip--item">
                        <div class="gogocar-trip--item__top">
                            <div class="car-to-book--item--top">
                                @php
                                    $ru_month = array( 'Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь', 'Июль', 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь' );
                                    $en_month = array( 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December' );

                                    $ru_weekdays = array( 'Понедельник', 'Вторник', 'Среда', 'Четверг', 'Пятница', 'Суббота', 'Воскресенье' );
                                    $en_weekdays = array( 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday' );

                                    $date = date('F', strtotime ( $trip->starting_date )); 
                                    $date_month = str_replace($en_month, $ru_month, $date);
                                    $date_day = str_replace($en_weekdays, $ru_weekdays, date('l', strtotime ( $trip->starting_date )));
                                    $datetime1 = new DateTime($trip->starting_date);
                                    $time1 = $datetime1->format('H:i');
                                @endphp  
                                <span class="car-to-book--item--date">{{$date_day}}, {{ date('j', strtotime ( $trip->starting_date )) }},  {{$date_month}} {{$time1}}</span>
                                {{-- <span class="car-to-book--item--date">{{$date}}, {{$time1}}</span> --}}
                                <div class="car-to-book--item--profile">
                                    @if($trip->carowner->avatar!=null)
                                    <div class="cat-to-book--item__img"
                                        style="background-image:url('{{ asset($trip->carowner->avatar) }}');">
                                    </div>
                                    @else
                                    <div class="cat-to-book--item__img"
                                        style="background-image:url('{{ asset('static/img/general/photo.png') }}');">
                                    </div>
                                    @endif
                                    <span>{{ $trip->carowner->name}}</span>
                                </div>
                            </div>
                            <input type="hidden" name="place" value="{{$place}}" id="place">
                            <input type="hidden" name="trip_id" id="trip_id" value="{{$trip->id}}">
                            <div class="car-to-book--item--bottom">
                                <div class="car-to-book--bottom-info">
                                    <div class="car-to-book--place--price">{{ $trip->max_occupants }} @lang('front.carbook.place'): <span class="money" data-currency-rub="{{Helper::convertCurrency($trip->price_per_seat, 'UZS', 'RUB')}}" data-currency-uzs="{{$trip->price_per_seat}}">{{ $trip->price_per_seat }} UZS</span></div>
                                    <div class="car-to-book--during">@lang('front.carbook.payment'): <span>@lang('front.carbook.during_the_trip')</span></div>
                                </div>
                                <div class="cat-to-book--bottom-how-to-pay">@lang('front.carbook.cash')</div>
                            </div>
                        </div>
                        <div class="gogocar-trip--item__bottom">
                            <div class="car-to-book--services">
                                <div class="car-to-book--services--left">
                                    <div class="gogocar-gray-icons">
                                        <svg class="icon icon-question ">
                                            <use xlink:href="{{asset('static/img/svg/symbol/sprite.svg#question')}}"></use>
                                        </svg>
                                    </div>
                                    <div class="car-to-book--services--left--content"><span
                                            class="car-to-book--place--price">@lang('front.carbook.fee_for')</span><span class="car-to-book--during">@lang('front.carbook.there_is')</span></div>
                                </div>
                                <div class="car-to-book--services--right">
                                    <div class="car-to-book--services--left--content">
                                        {{-- <span
                                            class="car-to-book--place--price--right">16
                                            000,00 UZS
                                        </span> --}}
                                        <span class="car-to-book--during--right money" data-currency-rub="{{Helper::convertCurrency($trip->price_per_seat, 'UZS', 'RUB')}}" data-currency-uzs="{{$trip->price_per_seat}}">{{ $trip->price_per_seat }} UZS</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="book_way">
                        <div class="popup-input--money--item active" data-way="escrow">
                            <div class="popup-input--money--checkbox"></div>
                            <input type="radio" id="escrow" name="book_way" value="escrow" checked>
                            <label for="escrow">@lang('front.carbook.pay_using')</label><br>
                        </div>
                        <div class="popup-input--money--item" data-way="directly">
                            <div class="popup-input--money--checkbox"></div>
                            <input type="radio" id="directly" name="book_way" value="directly">
                            <label for="directly">@lang('front.carbook.pay_to')</label><br>
                        </div>
                    </div>
                </div>
                <a class="gogocar-yellow-button"  id="book_trip" style="color: #FFF">@lang('front.carbook.book_now')</a>
            </div>
        </div>
    </section>
    @else
    <section class="you-trip">
        <div class="container">
          <div class="you-trip--wrap">
            <h1 class="main-section--title text-center">@lang('front.profile_trips.your') <span>@lang('front.profile_trips.trip')</span></h1>
            <p class="section-desc">Вы являетесь водителем в другой поездке в этот промежуток времени. Отмените поездку, прежде чем забронировать новую!</p>
            
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
                                        <span class="from_position">{{ $trip->sourcecity->city }}</span>
                                        <div class="gogocar-trip--item__route" style="min-width: 100px; margin-top: 7px;">
                                            <div class="gogocar-trip--item__route--start"></div>
                                            <div class="gogocar-trip--item__route--end"></div>
                                        </div>
                                        <span class="to_position">{{ $trip->destinationcity->city }}</span>
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
                            <div class="cat-to-book--bottom-how-to-pay">@lang('front.profile_trips.cash')</div>
                        </div>
                        </div>
                        <div class="gogocar-trip--item__bottom">
                        <div class="car-to-book--services">
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
    @endif
</div>

<div class="modal fade" id="popup-input-book-directly" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered popup-modal--wrap" role="document">
        <div class="modal-content popup-content">
            <div class="popup-covid--wrap popup-icon-size">
                <p class="popup-trip-finish">@lang('message.directly_book')</p>
                <div class="you-trip-cancel--buttons">
                    <div class="gogocar-gray-button w-170" data-dismiss="modal">@lang('global.app_cancel')</div>
                    <div class="gogocar-yellow-button w-170" id="direct_book">@lang('front.carbook.book_now')</div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="popup-input-value-2" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered popup-modal--wrap" role="document">
        <div class="modal-content popup-content">
            <div class="popup-covid--wrap popup-icon-size">
                <p class="popup-trip-finish">@lang('message.profile.book_already')</p>
                <div class="gogocar-yellow-button w-170" data-dismiss="modal">@lang('front.profile.photo_tab.ok')</div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="popup-input-money" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered popup-modal--wrap" role="document">
        <div class="modal-content popup-content">
            <div class="popup-header">
                <div class="popup-modal-close close" data-dismiss="modal" aria-label="Close">
                    <svg class="icon icon-close ">
                        <use xlink:href="{{asset('static/img/svg/symbol/sprite.svg#close')}}"></use>
                    </svg>
                </div>
            </div>
            {{-- <form class="popup-covid--wrap popup-modal--money popup-icon-size"> --}}
                <h3 class="main-section--title--v2 font-size-25 mb-5">@lang('front.carbook.select_a_deposit')</h3>
                <div class="popup-input--money--wrap">
                    {{-- <div class="popup-input--money--item" data-type="uzcard">
                        <div class="popup-input--money--checkbox"></div>
                        <input type="radio">
                        <div class="popup-input--money--logo" style="background-image:url('/static/img/general/cash/cash1.png');"></div>
                        <div class="popup-input--money--name">UZCard</div>
                    </div> --}}
                    <div class="popup-input--money--item" data-type="click">
                        <div class="popup-input--money--checkbox"></div>
                        <input type="radio">
                        <div class="popup-input--money--logo" style="background-image:url('/static/img/general/cash/cash2.png');"></div>
                        <div class="popup-input--money--name">Click Evolution</div>
                    </div>
                    <div class="popup-input--money--item" data-type="paypal">
                        <div class="popup-input--money--checkbox"></div>
                        <input type="radio">
                        <div class="popup-input--money--logo" style="background-image:url('/static/img/general/cash/cash3.png');"></div>
                        <div class="popup-input--money--name">PayPal</div>
                    </div>

                    <div class="gogocar-input--wrapper popup-input--money--cash">
                        <div class="gogocar-input-icon gogocar-gray-icons">
                            <svg class="icon icon-money ">
                                <use xlink:href="{{asset('static/img/svg/symbol/sprite.svg#money')}}"></use>
                            </svg>
                        </div>
                        <input class="gogocar-input-v1 gogocar-from money-input" type="text" id="input_amount" name="amount_original" placeholder="Укажите сумму..." value="{{ $trip->price_per_seat }}" data-currency-rub="{{Helper::convertCurrency($trip->price_per_seat, 'UZS', 'RUB')}}" data-currency-uzs="{{$trip->price_per_seat}}"  required readonly>
                        <input class="gogocar-input-v1 gogocar-from money-input" type="hidden" id="output_amount" name="amount" placeholder="Укажите сумму..." value="{{ $trip->price_per_seat / 10290 }}" data-currency-rub="{{Helper::convertCurrency($trip->price_per_seat, 'UZS', 'RUB')}}" data-currency-uzs="{{$trip->price_per_seat}}" required readonly>
                        <input type="hidden" name="pay_type" value="book">
                        <input type="hidden" name="trip_id" value="{{ $trip->id }}">
                        <input type="hidden" name="way" value="escrow">
                   </div>
                   
                </div>
                <form class="w3-card-4 payment-forms" method="POST" id="payment-form" action="{!! route('paywithpaypal') !!}">
                    {{ csrf_field() }}
                    <div class="gogocar-input--wrapper popup-input--money--cash">
                         <input class="gogocar-input-v1 gogocar-from" type="hidden" id="input_amount" name="amount_original" placeholder="Укажите сумму..." value="{{ $trip->price_per_seat }}" data-currency-rub="{{Helper::convertCurrency($trip->price_per_seat, 'UZS', 'RUB')}}" data-currency-uzs="{{$trip->price_per_seat}}"  required readonly>
                         <input class="gogocar-input-v1 gogocar-from" type="hidden" id="output_amount" name="amount" placeholder="Укажите сумму..." value="{{Helper::convertCurrencyUsd($trip->price_per_seat, 'UZS', 'USD')}}" data-currency-rub="{{Helper::convertCurrency($trip->price_per_seat, 'UZS', 'RUB')}}" data-currency-uzs="{{$trip->price_per_seat}}" required readonly>
                         <input type="hidden" name="pay_type" value="book">
                         <input type="hidden" name="trip_id" value="{{ $trip->id }}">
                         <input type="hidden" name="way" value="escrow">
                         <input type="hidden" name="paypal_place" value="{{$place}}">
                    </div>
                    <input type="hidden" value="paypal" name="payment_method">
                    <div class="button_container">
                        <button class="gogocar-yellow-button" type="submit">@lang('front.carbook.pay_with_paypal')</button>
                    </div>
                </form>

                <form id="payment-form-click"  class="payment-forms" id="payment-form-click"action="https://my.click.uz/services/pay" method="get" target="_blank">
                    <input type="hidden" name="amount" value="{{$trip->price_per_seat}}" />
                    <input type="hidden" name="merchant_id" value="9249"/>
                    <input type="hidden" name="merchant_user_id" value="4"/>
                    <input type="hidden" name="service_id" value="13605"/>
                    <input type="hidden" name="transaction_param" value="order-{{$order_number}}"/>
                    <input type="hidden" name="return_url" value="https://gogocar.itmigdex.ru/"/>
                    <input type="hidden" name="card_type" value="uzcard"/>
                    <div class="gogocar-input--wrapper popup-input--money--cash">
                        <input data-currency-rub="{{Helper::convertCurrency($trip->price_per_seat, 'UZS', 'RUB')}}" data-currency-uzs="{{$trip->price_per_seat}}" class="gogocar-input-v1 gogocar-from money-input" type="hidden" id="input_amount" name="amount_original" placeholder="Укажите сумму..." value="{{ $trip->price_per_seat }}" required readonly>
                    </div>
                    <div class="button_container">
                        <button type="submit" class="gogocar-yellow-button" class="click_logo"><i></i>@lang('front.carbook.pay_with_click')</button>
                    </div>
                  </form>
            {{-- </form> --}}
        </div>
    </div>
</div>
<script>
    window.booking_link = '{{ route("bookings", app()->getLocale()) }}';
    const input_amount = document.querySelector('#input_amount');
    const output_amount = document.querySelector('#output_amount');
    function convertCurrency(){
        const input_currency1 = 'RUB';
        const output_currency1 = 'USD';

        fetch(`https://api.exchangerate-api.com/v4/latest/${input_currency1}`)
            .then(res => res.json())
            .then(res => {
            const new_rate = res.rates[output_currency1];
            // rate.innerText = `1 ${input_currency1} = ${new_rate} ${output_currency1}`
            output_amount.value = (input_amount.value * new_rate).toFixed(0);
        })
    }
    $(document).ready(function(){
        $('.payment-forms').hide();
        $('.popup-input--money--item').click(function(){
            $('.payment-forms').hide();
            let type = $(this).data('type');
            switch (type) {
                case 'paypal':
                        $('#payment-form').show();
                    break;
                case 'click':
                    $('#payment-form-click').show();
                break;
                case 'uzcard':
                
                break;
        
                default:
                    break;
            }
        })
    })
    // convertCurrency();
</script>
 <div class="toast" style="position: fixed; top: 80px; right: 0;" id="toast_complain" data-autohide="false">
     <div class="toast-header">
         <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
             <span aria-hidden="true">&times;</span>
         </button>
     </div>
     <div class="toast-body">
        @lang('front.carbook.something_wrong')
     </div>
 </div>
@endsection