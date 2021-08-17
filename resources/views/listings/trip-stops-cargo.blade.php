@extends('layouts.user_app')
@section('title', 'Хотите добавить')
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
    <section class="trip-stops">
        <div class="container">
            <div class="trip-stops--wrap">
                <h1 class="col-xl-9 col-lg-9 main-section--title--v2 text-center mb-5">@lang('front.trip_stops.want') <span>@lang('front.trip_stops.add')</span>, @lang('front.trip_stops.which_passenger')?</h1>
                <ul class="col-xl-12 col-lg-12 trip-stops--list">
                    @if(Session::get('stops-cargo')!=null)
                    @foreach(Session::get('stops-cargo') as $item)
                    <li>
                        <div class="col-xl-8 col-lg-8 trip-stops--item @if($item->active == 1 ) active @endif">
                            <div class="trip-stops--item--name__icon">
                                <div class="gogocar-gray-icons">
                                    <svg class="icon icon-map2 ">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#map2') }}"></use>
                                    </svg>
                                </div><span>{{$item->drop_off}}</span>
                            </div>
                            <div class="popup-gogocar-cargo--checkbox"></div>
                            <input type="hidden" name="stop_active[]" class="stop_active" value="{{$item->active}}">
                        </div>
                        <div class="when-trip-date w-230 m-0-auto mb-5">
                            <select class="gogocar-select-when-trip" name="stop_starting_time[]">
                                <option value="00:00" @if(isset($item->starting_hour) && $item->starting_hour == '00:00') selected @endif>00:00</option>
                                <option value="01:00" @if(isset($item->starting_hour) && $item->starting_hour == '01:00') selected @endif>01:00</option>
                                <option value="02:00" @if(isset($item->starting_hour) && $item->starting_hour == '02:00') selected @endif>02:00</option>
                                <option value="03:00" @if(isset($item->starting_hour) && $item->starting_hour == '03:00') selected @endif>03:00</option>
                                <option value="04:00" @if(isset($item->starting_hour) && $item->starting_hour == '04:00') selected @endif>04:00</option>
                                <option value="05:00" @if(isset($item->starting_hour) && $item->starting_hour == '05:00') selected @endif>05:00</option>
                                <option value="06:00" @if(isset($item->starting_hour) && $item->starting_hour == '06:00') selected @endif>06:00</option>
                                <option value="07:00" @if(isset($item->starting_hour) && $item->starting_hour == '07:00') selected @endif>07:00</option>
                                <option value="08:00" @if(isset($item->starting_hour) && $item->starting_hour == '08:00') selected @endif>08:00</option>
                                <option value="09:00" @if(isset($item->starting_hour) && $item->starting_hour == '09:00') selected @endif>09:00</option>
                                <option value="10:00" @if(isset($item->starting_hour) && $item->starting_hour == '10:00') selected @endif>10:00</option>
                                <option value="11:00" @if(isset($item->starting_hour) && $item->starting_hour == '11:00') selected @endif>11:00</option>
                                <option value="12:00" @if(isset($item->starting_hour) && $item->starting_hour == '12:00') selected @endif>12:00</option>
                                <option value="13:00" @if(isset($item->starting_hour) && $item->starting_hour == '13:00') selected @endif>13:00</option>
                                <option value="14:00" @if(isset($item->starting_hour) && $item->starting_hour == '14:00') selected @endif>14:00</option>
                                <option value="15:00" @if(isset($item->starting_hour) && $item->starting_hour == '15:00') selected @endif>15:00</option>
                                <option value="16:00" @if(isset($item->starting_hour) && $item->starting_hour == '16:00') selected @endif>16:00</option>
                                <option value="17:00" @if(isset($item->starting_hour) && $item->starting_hour == '17:00') selected @endif>17:00</option>
                                <option value="18:00" @if(isset($item->starting_hour) && $item->starting_hour == '18:00') selected @endif>18:00</option>
                                <option value="19:00" @if(isset($item->starting_hour) && $item->starting_hour == '19:00') selected @endif>19:00</option>
                                <option value="20:00" @if(isset($item->starting_hour) && $item->starting_hour == '20:00') selected @endif>20:00</option>
                                <option value="21:00" @if(isset($item->starting_hour) && $item->starting_hour == '21:00') selected @endif>21:00</option>
                                <option value="22:00" @if(isset($item->starting_hour) && $item->starting_hour == '22:00') selected @endif>22:00</option>
                                <option value="23:00" @if(isset($item->starting_hour) && $item->starting_hour == '23:00') selected @endif>23:00</option>
                                <option value="24:00" @if(isset($item->starting_hour) && $item->starting_hour == '24:00') selected @endif>24:00</option>
                            </select>
                        </div>
                    </li>
                    @endforeach
                    @endif
                </ul>
                <a href="{{ route('map_Deploy_Cargo', app()->getLocale()) }}"><div class="trips-stops--added">@lang('front.trip_stops.add_settlement')</div></a>
                {{-- <a href="{{ route('stopPlacesCargo', app()->getLocale()) }}" id="stops_continue"><div class="gogocar-yellow-button">@lang('front.suggest_late_to.continue')</div></a> --}}
                <div class="trip-stops--places--buttons">
                    <a class="gogocar-gray-button m-0-auto-none mr-4" href="{{ route('suggest_cargo_to', app()->getLocale()) }}">@lang('front.trip_stops_places.back')</a>
                    <a class="gogocar-yellow-button m-0-auto-none" href="{{ route('stopPlacesCargo', app()->getLocale()) }}" id="stops_continue">@lang('front.suggest_late_to.continue')</a>
                </div>
            </div>
        </div>
    </section>
</div>
<script>
    $(document).ready(function() {
        $( ".trip-stops--item" ).click(function() {
            if($(this).hasClass('active')){
                $(this).children('.stop_active').val(0);
            }
            else{
                $(this).children('.stop_active').val(1);
            }
            gonext();
            
        });

        $('#stops_continue').click(function(){
            gonext();
        })

        function gonext() {
            var values = $('.stop_active').map(function() { return this.value; }).get();
            var active = new Array();
            var token = $("#token").val();
            for(i = 0; i < values.length; i++){
                active.push(values[i]);
            }
            var times = $('.gogocar-select-when-trip').map(function() { return this.value; }).get();
            var time = new Array();
            for(i = 0; i < times.length; i++){
                time.push(times[i]);
            }
            $.ajax({
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': token
                },
                url: '{{ route("updateStopsCargo", app()->getLocale()) }}',
                data: {
                    active: active,
                    time: time
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