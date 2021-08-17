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
    <section class="notific-trip">
        <div class="container">
            <div class="notific-trip--wrap">
                <h1 class="main-section--title text-center">@lang('front.alerts.notification') <span>@lang('front.alerts.about_trip')</span></h1>
                <p class="section-desc mb-5">@lang('front.alerts.you_will_receive').</p>
                <div class="col-xl-9 col-lg-9 notific-trip--list m-0-auto">
                    @if(count($trips) > 0)
                    @foreach ($trips as $trip)
                        <div class="notific-trip--item gogocar-trip--item">
                            <div class="gogocar-trip--item__top">
                                <div class="gogocar-trip--item-town__route">
                                    <div class="gogocar-trip--item__town"><span>{{ $trip->from_city }}</span><span>{{ $trip->to_city }}</span></div>
                                    <div class="gogocar-trip--item__route">
                                        <div class="gogocar-trip--item__route--start"></div>
                                        <div class="gogocar-trip--item__route--end"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="gogocar-trip--item__bottom">
                                <div class="notific-trip-date-price">
                                    <div class="all-trip--popup__col">
                                        <label>@lang('front.alerts.date'):</label>
                                        <div class="notific-input-icon">
                                            <input id="date-old-{{$trip->id}}" data-trip-id="{{$trip->id}}"  class="gogocar-input--filter popup-show-calendar popup-show-calendar-click calendar-zone-height custom-date" type="text" readonly="readonly" value="{{date('d.m.yy',strtotime($trip->starting_date))}}">
                                            <div class="notific-calendar-icon">
                                                <svg class="icon icon-calendar2 ">
                                                    <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#calendar2') }}"></use>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="all-trip--popup__col noti-price-label">
                                        <label>@lang('front.alerts.price') (UZS):</label>
                                        <div class="notific-range-price">
                                            <div class="filter-slider" data-min="{{ $trip->price_per_seat }}" data-max="{{ $trip->price_per_seat + 5000 }}"></div>
                                            <div class="notific-range-price--text">
                                                <span class="min-values hidden1" data-trip-id="{{$trip->id}}">{{ $trip->price_per_seat }}</span>
                                                <span class="max-values hidden2" data-trip-id="{{$trip->id}}"></span></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="notific-icons">
                                    {{-- <a  href="{{ route('search', app()->getLocale()) }}"> --}}
                                    <form class="find-trip-form find-trip-form--peoples trip-peoples active" method="GET"
                                        action="{{ route('searchcar', app()->getLocale()) }}" >
                                        <div class="gogocar-yellow-icons">
                                        <input type="hidden" name="from" value="{{ $trip->from_city }}" />
                                        <input type="hidden" name="to" value="{{ $trip->to_city }}" />
                                        <input type="hidden" name="date" id="date-{{$trip->id}}"  value="{{$trip->starting_date}}" />
                                        <input type="hidden" name="search_type" value="draft" />
                                        <input type="hidden" name="min_price" id="min-price-{{$trip->id}}" value="{{ $trip->price_per_seat }}" />
                                        <input type="hidden" name="max_price" id="max-price-{{$trip->id}}" value="{{ $trip->price_per_seat + 5000 }}" />
                                        <button class="" type="submit">
                                            <svg class="icon icon-search ">
                                                <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#search') }}"></use>
                                            </svg>
                                        </button>
                                        </div>
                                    </form>
                                    {{-- </a> --}}

                                    <button type="submit" title="Delete Trip" data-toggle="modal" id="smallButton" data-target="#popup-del-msg-{{$trip->id}}">
                                        <div class="gogocar-red-icons">
                                            <svg class="icon icon-delete2 ">
                                                <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#delete2') }}"></use>
                                            </svg>
                                        </div>
                                    </button>

                                    <div class="modal fade" id="popup-del-msg-{{$trip->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered popup-modal--wrap" role="document">
                                            <div class="modal-content popup-content">
                                                <div class="popup-covid--wrap popup-del-msg">
                                                    <h3 class="main-section--title--v2 font-size-25 mb-5">@lang('global.app_delete') @lang('front.alerts.notification')?</h3>
                                                    <form method="POST" action="{!! route('search.trip.destroy', ['locale' => app()->getLocale(), 'id' => $trip->id]) !!}" accept-charset="UTF-8">
                                                        <input name="_method" value="DELETE" type="hidden">
                                                        {{ csrf_field() }}
                                                        <div class="delete-chat-msg">
                                                            <button type="submit" class="delete-choise-chat-msg gogocar-red-button" title="Delete Trip">
                                                                <div>
                                                                    @lang('global.app_delete')</div>
                                                            </button>
                                                            <div class="gogocar-gray-button" data-dismiss="modal" aria-label="Close">@lang('global.app_cancel')</div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    @else
                        <p class="section-desc mb-5">@lang('front.alerts.no_notification')</p>
                    @endif
                </div>
            </div>
        </div>
    </section>
</div>


<script>
    $(document).ready(function(){
        $('.custom-date').change(function(){
            // console.log('changed', $(this).val());
            let trip_id = $(this).data('trip-id');
            $("#date-" + trip_id).val($(this).val());
        })

        $('.hidden1').on('DOMSubtreeModified',function(){
            let trip_id = $(this).data('trip-id');
            $("#min-price-" + trip_id).val($(this).html());
            // alert('changed')
        })

        $('.hidden2').on('DOMSubtreeModified',function(){
            let trip_id = $(this).data('trip-id');
            $("#max-price-" + trip_id).val($(this).html());
        // alert('changed')
        })

      
    })
</script>
@endsection
@section('user_lang')
    @include('includes.user_flag')
@endsection