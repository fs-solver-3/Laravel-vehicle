@extends('layouts.user_app')
@section('content')
<div class="content">
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
                            <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#map2') }}">
                            </use>
                        </svg>
                    </div>
                    <div class="gogocar-trip-filter--info">
                        <div class="gogocar-trip-filter--item">
                            <div class="gogocar-trip-filter--item__info">@lang('front.trip.where_from'): <span>{{ $filterdata->fc }}</span>
                            </div>
                        </div>
                        <div class="gogocar-trip-filter--item">
                            <div class="gogocar-trip-filter--item__info">@lang('front.trip.where_to'): <span>{{ $filterdata->dc }}</span>
                            </div>
                        </div>
                        <div class="gogocar-trip-filter--item">
                            <div class="gogocar-trip-filter--item__info">@lang('front.trip.when'): <span>{{ $filterdata->date }}</span>
                            </div>
                        </div>
                        <div class="gogocar-trip-filter--item">
                            <div class="gogocar-trip-filter--item__info">@lang('front.trip.passenger'):
                                <span>{{ $filterdata->count }}</span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="drivers-nearby">
        <div class="container">
            <div class="drivers--wrap">
                @if(count($alerts) > 0)
                {{-- <h3 class="main-section--title--v2 text-center">@lang('front.trip.driver') <span>@lang('front.trip.near_you')</span></h3> --}}
                {{-- <p class="section-desc">@lang('front.trip.see_which')</p> --}}
                <div class="drivers-nearby--list row">
                    @foreach($alerts->take(3) as $ride)
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 gogocar-trip--item">
                        <div class="gogocar-trip--item__top">
                            <div class="gogocar-trip--item-town__route">
                                <div class="gogocar-trip--item__town">
                                    <span>{{ $ride->from_full }}</span><span>{{ $ride->to_full }}</span>
                                </div>
                                <div class="gogocar-trip--item__route">
                                    <div class="gogocar-trip--item__route--start"></div>
                                    <div class="gogocar-trip--item__route--end"></div>
                                </div>
                                <div class="gogocar-drivers--time">
                                    <div class="gogocar-drivers--time--start">
                                       
                                        <span></span>
                                        <div class="gogocar-drivers--time__icon gdt-yellow">
                                            <svg class="icon icon-location2 ">
                                                <use
                                                    xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#location2') }}">
                                                </use>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="gogocar-drivers--time--end">
                                        <div class="gogocar-drivers--time__icon gdt-green">
                                            <svg class="icon icon-location2 ">
                                                <use
                                                    xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#location2') }}">
                                                </use>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="gogocar-trip--item__bottom">
                            <div class="gogocar-drivers--profile--wrap">
                                @if($ride->user!=null && $ride->user->avatar!=null)
                                    <div class="gogocar-drivers--profile"
                                        style="background-image:url('{{ asset($ride->user->avatar) }}');">
                                    </div>
                                    <div class="gogocar-drivers--price">
                                        {{ $ride->user->name }}
                                        <span>- {{$ride->starting_date}}</span>
                                    </div>
                                @else
                                    <div class="gogocar-drivers--profile"
                                        style="background-image:url('{{ asset('static/img/general/photo.png') }}');">
                                    </div>
                                    <div class="gogocar-drivers--price">{{ optional($ride->user)->name }}
                                        <span>- {{$ride->starting_date}}</span>
                                    </div>
                                @endif

                            </div>
                            {{-- @php
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
                            @endif --}}
                        </div>
                    </div>
                    @endforeach
                </div>
                @endif
                <div class="gogocar-yellow-button media-576">@lang('front.trip.find')</div>
            </div>
        </div>
    </section>
</div>

<div class="modal fade" id="popup-input-value" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered popup-modal--wrap" role="document">
        <div class="modal-content popup-content">
            <div class="popup-covid--wrap popup-icon-size">
                <p class="popup-trip-finish">@lang('front.trip.sorry')</p>
                <div class="gogocar-yellow-button w-170" id="finish">@lang('front.trip.ok')</div>
            </div>
        </div>
    </div>
</div>

<div id="address-map-container" style="display: none; ">
    <div style="width: 100%; height: 100%" id="address1-map"></div>
    <div style="width: 100%; height: 100%" id="address2-map"></div>
</div>
<script>
    window.searchtrip_url = "{{ route("searchtrips", app()->getLocale()) }}";
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
        $('#save_search').click(function(e) {
            e.preventDefault();
 
            var token = $("#token").val();
            var from_address = $('#address1-input').val();
            var address1_component = $('#address1-component').val();
            var to_address = $('#address2-input').val();
            var address2_component = $('#address2-component').val();
            var date = $('#selected_date').val();
            var place = $('#allow_counts').val();
            $.ajax({
                type:'POST',
                headers: {
                    'X-CSRF-TOKEN': token
                },
                url: '{{ route("save_search_trip", app()->getLocale()) }}',
                data: {
                    from_address: from_address,
                    address1_component: address1_component,
                    to_address: to_address,
                    address2_component: address2_component,
                    date: date,
                    place: place
                },
                success: (data) => {
                    if(data.state == 'success'){
                        window.location.href = '{{ route("trip-alerts", app()->getLocale()) }}';
                        // $("#success_msg").css('display', 'block');
                        // $('#success_msg_content').html('Your trip has been saved successfully');
                        // $('html, body').animate({
                        //     scrollTop: 0
                        // }, 800, function(){
                        // // window.location.hash = hash;
                        // });
                    }
                    else{
                        $('#popup-input-value').modal('show');
                    }
                },
                error: function(data){
                    console.log(data);
                }
            });
        });
    });
</script>
@endsection
@section('user_lang')
    @include('includes.user_flag')
@endsection