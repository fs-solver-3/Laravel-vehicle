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
                <a class="breadcrumbs--item" href="{{ route('profile', ['locale' => app()->getLocale(), 'tab' => 'personal_data']) }}">@lang('front.profile.profile_infomation')</a>
            </ul>
        </div>
    </section>
    <section class="notific-trip bookings">
        <div class="container">
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
            <div class="notific-trip--wrap">
                <h1 class="main-section--title text-center">@lang('front.bookings.booking')</span></h1>
                {{-- <p class="section-desc mb-5">Вы получите электронное письмо, когда появится подходящая поездка.</p> --}}
                <div class="col-xl-9 col-lg-9 notific-trip--list m-0-auto">
                    @if(count($bookings) > 0)
                    @foreach ($bookings as $trip)
                        @if(!is_null($trip->listing) && $trip->driver_id != Auth::user()->id)
                        <div class="notific-trip--item gogocar-trip--item booking-item">
                            @if(!is_null($trip->listing))
                            <div class="gogocar-trip--item__top">
                                <div class="gogocar-trip--item-town__route">
                                    <div class="gogocar-trip--item__town"><span>{{ $trip->listing->sourcecity->city }}</span><span>{{ $trip->listing->destinationcity->city }}</span></div>
                                    <div class="gogocar-trip--item__route">
                                        <div class="gogocar-trip--item__route--start"></div>
                                        <div class="gogocar-trip--item__route--end"></div>
                                    </div>
                                </div>
                            </div>
                            @endif
                            <div class="gogocar-trip--item__bottom">
                                @if(!is_null($trip->driver_id))
                                <div class="gogocar-drivers--profile--wrap">
                                    @if($trip->driver->avatar!=null)
                                    <div class="gogocar-drivers--profile" style="background-image:url('{{ asset($trip->driver->avatar) }}');">
                                    </div>
                                    @else
                                    <div class="gogocar-drivers--profile" style="background-image:url('{{ asset('static/img/general/photo.png') }}');">
                                    </div>
                                    @endif
                                     <div class="gogocar-trips-category--name__rating--wrap">
                                         <span class="gogocar-trips-category--name">{{ $trip->driver->name }}</span>
                                         <div class="gogocar-trips-category--rating green-rating">
                                             <svg class="icon icon-green-star ">
                                                 <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#green-star') }}">
                                                 </use>
                                             </svg>
                                             <span>{{ $trip->driver->rating }}</span>
                                         </div>
                                     </div>
                                </div>
                                @endif
                                <div class="notific-trip-date-price">
                                    <div class="all-trip--popup__col">
                                        <div class="car-to-book--item--top2">
                                            <span class="car-to-book--item--date" style="color: #fdab3e">{{date('d.m.Y',strtotime($trip->listing->starting_date))}} {{date('H:i',strtotime($trip->listing->starting_date))}}</span>
                                        </div>
                                    </div>
                                </div>
                                @if($trip->type == "escrow" && $trip->status == 'pending' )
                                    <div class="personal-review--change--buttons" style="margin-top: 20px">
                                    <button class="gogocar-yellow-button mr-1" title="release funds" data-target="#popup-release-msg-{{$trip->id}}" data-toggle="modal">
                                        @lang('front.bookings.release')
                                    </button>
                                    <button class="gogocar-red-button ml-1" title="release funds" data-target="#popup-cancel-msg-{{$trip->id}}" data-toggle="modal">
                                        отменить
                                    </button>
                                    </div>
                                    <div class="modal fade" id="popup-release-msg-{{$trip->id}}" tabindex="-1" role="dialog" aria-hidden="true">
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
                                                    <h3 class="main-section--title--red">@lang('front.trip_end.you_are_one_step') <span> высвобождения</span> средств!!</h3>
                                                    <p class="main-section--title font-size-20 text-center">@lang('front.trip_end.are_you_sure') ? <span>Деньги будут отданы водителю.</span></p>
                                                    <div class="you-trip-cancel--buttons">
                                                        <div class="gogocar-gray-button" data-dismiss="modal" aria-label="Close">@lang('global.app_cancel')</div>
                                                        <form method="POST" action="{!! route('release-funds', ['locale' => app()->getLocale(), 'id' => $trip->id]) !!}" accept-charset="UTF-8">
                                                            {{ csrf_field() }}
                                                            <button type="submit" class="gogocar-red-button" title="Release funds" style="border: none; min-width: 200px;">
                                                                @lang('front.bookings.release')
                                                            </button>
                                                        </form>  
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal fade" id="popup-cancel-msg-{{$trip->id}}" tabindex="-1" role="dialog" aria-hidden="true">
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
                                                    <h3 class="main-section--title--red">@lang('front.trip_end.you_are_one_step') <span> отмены поездки</span> поездки!</h3>
                                                    <p class="main-section--title font-size-20 text-center">@lang('front.trip_end.are_you_sure') ? <span>Бронирование будет аннулировано.</span></p>
                                                    <div class="you-trip-cancel--buttons">
                                                        <div class="gogocar-gray-button" data-dismiss="modal" aria-label="Close">@lang('global.app_cancel')</div>
                                                        <form method="POST" action="{!! route('cancel-book', ['locale' => app()->getLocale(), 'id' => $trip->id]) !!}" accept-charset="UTF-8">
                                                            {{ csrf_field() }}
                                                            <button type="submit" class="gogocar-red-button" title="Release funds" style="border: none; min-width: 200px;">
                                                                отменить
                                                            </button>
                                                        </form>  
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <div class="notific-icons">
                                        @if(!is_null($trip->review_id))
                                            <div class="personal-review--change--buttons" style="margin-top: 40px">
                                                <div class="gogocar-yellow-button mb-4">@lang('front.bookings.left_review')</div>
                                            </div>
                                        @else
                                            <a href="{{ route('leave-review', ['locale' => app()->getLocale(), 'id' => $trip->id]) }}">
                                                <div class="personal-review--change--buttons" style="margin-top: 40px">
                                                    <div class="gogocar-yellow-button mb-4">@lang('front.bookings.leave_review')</div>
                                                </div>
                                            </a>
                                        @endif
                                    </div>
                                @endif
                            </div>
                        </div>
                        @endif
                    @endforeach
                    @else
                    <p class="section-desc">@lang('front.bookings.no_trip')</p>
                    @endif
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
@section('user_lang')
    @include('includes.user_flag')
@endsection