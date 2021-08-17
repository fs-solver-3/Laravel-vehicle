@extends('layouts.user_app')
@section('title', 'Вам подходит')
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
    <section class="trip-stops--places">
        <div class="container">
            <div class="trip-stops--places--wrap">
                <h1 class="col-xl-9 col-lg-9 main-section--title--v2 text-center mb-5 m-0-auto">@lang('front.trip_stops_places.would_be_here_cargo'). <span>@lang('front.trip_stops_places.suits_you')?</span></h1>
                <ul class="trip-stops--places--list">
                    <div class="trip-stops--places--end mb-100px"><span>{{Session::get('from-position-cargo')}}</span></div>
                    @if(Session::get('stops-cargo-reserve')!=null)
                    @foreach(Session::get('stops-cargo-reserve') as $item)
                    <li class="trip-stops--places--item mb-100px @if($item->active == 1 ) active @endif">
                        <div class="popup-gogocar-cargo--checkbox"></div><span>{{$item->drop_off}}</span>
                        <input type="hidden" name="stop_active[]" class="stop_active" value="{{$item->active}}">
                    </li>
                    @endforeach
                    @endif
                    {{-- <li class="trip-stops--places--item mb-100px">
                        <div class="popup-gogocar-cargo--checkbox"></div><span>АЗС “Лукойл”, Узумчилик</span>
                    </li> --}}
                    <div class="trip-stops--places--start"><span>{{Session::get('to-position-cargo')}}</span></div>
                </ul>
                <div class="trip-stops--places--buttons">
                    <a class="gogocar-gray-button m-0-auto-none mr-4" href="{{ route('stopsListings_cargo', app()->getLocale()) }}">@lang('front.trip_stops_places.back')</a>
                    <a class="gogocar-yellow-button m-0-auto-none" href="{{ route('whenTripCargo', app()->getLocale()) }}">@lang('front.suggest_late_to.continue')</a>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
    $(document).ready(function() {
        $( ".trip-stops--places--item" ).click(function() {
            if($(this).hasClass('active')){
                $(this).children('.stop_active').val(0);
            }
            else{
                $(this).children('.stop_active').val(1);
            }
            gonext();
            
        });

        function gonext() {
            var values = $('.stop_active').map(function() { return this.value; }).get();
            var active = new Array();
            var token = $("#token").val();
            for(i = 0; i < values.length; i++){
                active.push(values[i]);
            }
            $.ajax({
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': token
                },
                url: '{{ route("updateStopsCargo", app()->getLocale()) }}',
                data: {
                    active: active
                },
                success: function (data) {
                    console.log(data);
                },
                error: function (XMLHttpRequest, textStatus, errorThrown) {

                }

            });
        };
    })
</script>
@endsection
@section('user_lang')
    @include('includes.user_flag')
@endsection