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
                                <div class="gogocar-trip--item__town"><span>{{$detail->location->city}}</span><span>{{$detail->destination->city}}</span></div>
                                <div class="gogocar-trip--item__route">
                                    <div class="gogocar-trip--item__route--start"></div>
                                    @if(count($stops) > 0)
                                    @foreach($stops as $item)
                                    @if($item->distance != '' || $item->time != '')
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
                                        <div class="gogocar-plan-trip-driver-position--dot" style="padding: 0px;">
                                            <div data-toggle="tooltip" data-placement="top" title="{{ $item->location->full }}" class="span_point" style="left: calc({{ $item->distance / $detail->distance * 100 }}%);" data-distance = "{{ $item->distance}}" data-total="{{$detail->distance}}"></div>
                                        </div>
                                        <div class="gogocar-plan-trip-driver-position--time">
                                            <span style="left: calc({{ $item->distance / $detail->distance * 100 }}%);">
                                                {{-- {{$item->starting_hour}} --}}
                                            </span></div>
                                        </div>
                                    @else
                                        <div class="gogocar-ready-plan-trip--info" style="">
                                            <div class="gogocar-plan-trip-driver-position--town" style="padding: 0px;"><span>{{ str_limit($item->location->full, 15) }}</span></div>
                                            <div class="gogocar-plan-trip-driver-position--dot" style="padding: 0px;"></div>
                                            <div class="gogocar-plan-trip-driver-position--time" style="padding: 0px;">
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
                                        {{$detail->seats()}} свободное место
                                    </div>
                                </div>
                                <div class="gogocar-ready-plan--car">
                                    <div class="gogocar-gray-icons">
                                        <svg class="icon icon-taxi ">
                                            <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#taxi')}}"></use>
                                        </svg>
                                    </div>
                                    <div class="gogocar-ready-plan--text">
                                        @if(!is_null($detail->car))
                                        {{$detail->car->model}}
                                        @endif
                                    </div>
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
                                <div class="gogocar-ready-plan__price money" data-currency-rub="{{Helper::convertCurrency($detail->price_per_seat, 'UZS', 'RUB')}}" data-currency-uzs="{{$detail->price_per_seat}}">{{ $detail->price_per_seat }} UZS</div>
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
    @if(!is_null($detail->additional_info))
    <section class="comment-driver">
        <div class="container">
            <div class="comment-driver--wrap">
                <h3 class="section-title mb-5">@lang('front.plan.driver_comment')</h3>
                <div class="comment-driver--content">
                    <div class="comment-driver--border"></div>
                    <p class="comment-driver--text">“ {{$detail->additional_info}} ”</p>
                </div>
            </div>
        </div>
    </section>
    @endif
    <section class="chat">
        <div class="container">
            <div class="chat-wrap">
                <h3 class="section-title mb-5 chat-container-992--title">@lang('front.plan.chat_with')</h3>
                <div class="chat-section" id="app">
                    <room-com :user="{{ $detail->carowner}}"
                        :listing="{{ $detail->id }}"
                        type="passenger">
                    </room-com>
                    <div class="col-xl-3 col-lg-4 chat-content--info">
                        <div class="chat-content--info__driver--profile gogocar-box">
                            @if($detail->carowner != null && $detail->carowner->avatar != null)
                                <div class="chat-content--info__driver--img"
                                    style="background-image:url('/{{ $detail->carowner->avatar}}');"></div>
                            @else
                                <div class="chat-content--info__driver--img"
                                    style="background-image:url('{{ asset('static/img/content/drivers-avatar/driver1.png')}}');"></div>
                            @endif
                            <span class="chat-content--info__driver--name">{{ $detail->carowner->name}} {{ $detail->carowner->surname}}</span>

                            <div class="chat-content--info__driver--rating--rev">
                                @if(count($reviews) > 0 )
                                @php
                                    $total_score = $reviews->sum('score');
                                    $average_score = $total_score / count($reviews)
                                @endphp
                                <div class="gogocar-trips-category--rating green-rating">
                                    <svg class="icon icon-green-star ">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#green-star') }}"></use>
                                    </svg><span>{{ round($average_score, 1) }}</span>
                                </div>
                                <div class="chat-content--info__driver--rev">({{count($reviews)}} @lang('front.plan.reviews'))</div>
                                @else
                                     <div class="chat-content--info__driver--rev">@lang('front.plan.no_review')</div>
                                @endif
                            </div>
                            {{-- @if(count($reviews) > 0 )
                            <a class="gogocar-yellow-button chat-gogocar-yellow-button-desctop"
                                href="/">@lang('front.plan.more_information')
                            </a>
                            @endif --}}
                            <div class="chat-content-buttons__driver--992">
                                {{-- <a class="gogocar-gray-button"
                                    href="/">@lang('front.plan.more_information')</a> --}}
                                <div class="gogocar-yellow-button chat-content-show--992">@lang('front.plan.message')</div>
                            </div>
                        </div>
                        <div class="chat-content--info__driver--review gogocar-box chat-content--info__driver--mobile">
                             @if(count($reviews) > 0 )
                            <div class="chat-content--info__driver--review--header"><span
                                    class="chat-content--info__driver--title">@lang('front.plan.reviews')</span>
                                <div class="gogocar-trips-category--rating green-rating">
                                    <svg class="icon icon-green-star ">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#green-star')}}"></use>
                                    </svg><span>{{ round($average_score, 1)}}</span>
                                </div>
                            </div>
                            @endif
                            <div class="chat-content--info__driver--review--wrap">
                                <div class="chat-content--info__driver--review--js">
                                    @if(count($reviews) > 0 )
                                    @foreach ($reviews as $item)
                                        @if(!is_null($item->writer))
                                        <div class="chat-content--info__driver--review--content">
                                            <div class="chat-content--review__trip--profile">
                                                <div class="chat-content--review__trip--info">
                                                    <div class="chat-content--review__trip--info__img" @if(is_null($item->writer->avatar))
                                                        style="background-image:url('{{ asset('/static/img/content/drivers-avatar/driver1.png') }}');"
                                                        @else
                                                        style="background-image:url('/{{ $item->writer->avatar }}');"
                                                        @endif
                                                        >
                                                    </div>
                                                    <div class="chat-content--review__trip--name__trip"><span
                                                            class="chat-content--review__trip--name">{{ $item->writer->name}}</span>
                                                    <span class="chat-content--review__trip--trip">
                                                            {{ optional(optional(optional($item->booking)->listing)->location)->city }} @if(!is_null(optional(optional($item->booking)->listing)->location)) → @endif {{ optional(optional(optional($item->booking)->listing)->destination)->city }}
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="chat-content--review__trip--rating">
                                                    {{ $item->score }}
                                                </div>
                                            </div>
                                            <p class="chat-content--review__trip--text">{{ str_limit($item->comment, 60) }}</p><span
                                                class="chat-content--review__trip--date">{{ date('d.m.yy', strtotime($item->created_at)) }}</span>
                                        </div>
                                        @endif
                                    @endforeach
                                    @else
                                         <div class="chat-content--info__driver--review--content">
                                             <div class="chat-content--review__trip--profile">
                                                 <div class="chat-content--review__trip--info">
                                                     <div class="chat-content--review__trip--info__img" style="background-image:url('/{{ $detail->carowner->avatar}}');">
                                                     </div>
                                                     <div class="chat-content--review__trip--name__trip"><span class="chat-content--review__trip--name">{{ $detail->carowner->name}}</span>
                                                        <span class="chat-content--review__trip--trip"></span>
                                                     </div>
                                                 </div>
                                                 <div class="chat-content--review__trip--rating">
                                                 </div>
                                             </div>
                                             <p class="chat-content--review__trip--text">
                                                @lang('front.plan.no_review')
                                            </p><span class="chat-content--review__trip--date"></span>
                                         </div>
                                    @endif
                                </div>
                                
                                <div class="chat-dots--wrap"></div>
                            </div>
                        </div><a class="chat-content--warning gogocar-box" data-toggle="modal" data-target="#popup-jaloba">
                            <div class="gogocar-gray-icons">
                                <svg class="icon icon-warning ">
                                    <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#warning') }}"></use>
                                </svg>
                            </div><span>@lang('front.plan.complain')</span>
                        </a>
                    </div>
                </div>
                <div class="col-xl-9 col-lg-9 pl-0 plan-trip-btn">
                    @if($detail->seats() < 1)
                    <a class="gogocar-gray-button" href="#">Все места были книги</a>
                    @else
                        <a class="gogocar-yellow-button" href="{{ route('car_place', [app()->getLocale(), 'trip_id'=>$detail->id]) }}">@lang('front.plan.continue')</a>
                    @endif

                </div>
            </div>
        </div>
    </section>
</div>
@if(count($complains) > 0)
<div class="modal fade" id="popup-jaloba" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered popup-modal--wrap modal-970" role="document">
        <div class="modal-content popup-content">
            <div class="popup-header">
                <div class="popup-modal-close close" data-dismiss="modal" aria-label="Close">
                    <svg class="icon icon-close ">
                        <use xlink:href="static/img/svg/symbol/sprite.svg#close"></use>
                    </svg>
                </div>
            </div>
            <div class="popup-covid--wrap popup-icon-size">
                <h3 class="main-section--title--red"><span>@lang('front.modal.complain')</span> @lang('front.modal.for_a_ride') !</h3>
                <p class="main-section--title font-size-20 text-center">@lang('front.modal.which') <span>@lang('front.modal.at_you')</span> @lang('front.modal.reason') <span>для жалобы ?</span></p>
                <div class="popup-gogocar-type-cargo mb-4">
                    @foreach ($complains as $item)
                        <div class="col-xl-12 col-sm-12 popup-go-jaloba mb-4">
                            <div class="popup-gogocar-type-cargo--item" data-entry-id="{{ $item->id }}">
                                <span>{{ $item->title }}</span>
                                <div class="popup-gogocar-cargo--checkbox" ></div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="you-trip-cancel--buttons">
                    <div class="gogocar-gray-button" data-dismiss="modal" aria-label="Close">@lang('front.modal.i_changed')</div>
                    <div class="gogocar-red-button" data-toggle="modal" data-dismiss="modal" data-target="#popup-jaloba2">@lang('front.modal.continue')</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
<div class="modal fade" id="popup-jaloba2" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered popup-modal--wrap modal-970" role="document">
        <div class="modal-content popup-content">
            <div class="popup-header">
                <div class="popup-modal-close close" data-dismiss="modal" aria-label="Close">
                    <svg class="icon icon-close ">
                        <use xlink:href="static/img/svg/symbol/sprite.svg#close"></use>
                    </svg>
                </div>
            </div>
            <div class="popup-covid--wrap popup-icon-size">
                <h3 class="main-section--title--red"><span>@lang('front.modal.complain')</span>@lang('front.modal.for_a_ride') !</h3>
                <p class="main-section--title font-size-20 text-center"><span>@lang('front.plan.please_provide')</span> @lang('front.plan.more_information2')</p>
                <div class="col-xl-10 col-lg-10 trip-comment--content back-text-color-wrap">
                    <textarea class="trip-comment--textarea back-text-color" cols="10" rows="5" placeholder="Опишиет проблему подробнее" id="complain_text"></textarea>
                </div>
                <input type="hidden" id="complain_id">
                <input type="hidden" id="listing_id" value="{{$detail->id}}">
                <input type="hidden" id="driver_id" value="{{$detail->carowner->id}}">
                <div class="you-trip-cancel--buttons">
                    <div class="gogocar-gray-button" data-dismiss="modal" aria-label="Close">@lang('front.plan.i_changed')</div>
                    <div class="gogocar-red-button" id="saveComplain">@lang('front.plan.complain')</div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $( ".gogocar-ready-plan-trip--info .span_point" ).hover(
            function() {
                $(this).parent().siblings('.gogocar-plan-trip-driver-position--town').show('1000');
            }, function() {
                $(this).parent().siblings('.gogocar-plan-trip-driver-position--town').hide('1000');
            }
        );

        $("#saveComplain").on('click', function (e) {
        e.preventDefault();

        let complain_id = $('#complain_id').val();
        let listing_id = $('#listing_id').val();
        let driver_id = $('#driver_id').val();
        let comment = $('#complain_text').val();

        const formData = new FormData();
        // var formData = new FormData(this);
        formData.append('complain_id', complain_id);
        formData.append('listing_id', listing_id);
        formData.append('driver_id', driver_id);
        formData.append('comment', comment);
        $.ajax({
            type: 'POST',
            url: '/saveComplain',
            data: formData,
            dataType: 'json',
            contentType: false,
            cache: false,
            processData: false,
            // data:{user_id:user_id,teacher_id:teacher_id, courses_id:courses_id, _token: token, body:text},
            success: function (data) {
                // alert(data);
                if (data.state == 'success') {
                    $('#popup-jaloba2').modal('hide');
                    $("#success_msg").css('display', 'block');
                    $('#success_msg_content').html("@lang('message.complain_saved')");
                    // window.location.reload;
                }
                else{
                    $("#success_msg").css('display', 'block');
                    $('#success_msg_content').html("@lang('message.something_wrong')");
                }
            },
            error: function (XMLHttpRequest, textStatus, errorThrown) {
                $("#success_msg").css('display', 'block');
                $('#success_msg_content').html("@lang('message.something_wrong')");
            }

        });

    });
    })
</script>
@endsection
