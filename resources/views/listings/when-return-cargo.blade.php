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
  <form method="GET" action="{{ route('setReturntrip_cargo', app()->getLocale()) }}">
    <section class="when-trip">
      <div class="container">
        <div class="when-trip--wrap">
          <h1 class="main-section--title text-center mb-5">Когда <span>состоится поездка ?</span></h1>
          <div class="when-trip-date">
            <div class="trip-show-calendar mr-4"></div>
            <div class="when-trip-calendar"></div>
            <input class="when-trip-show-date" type="hidden" value="" name="date">
            <div class="when-trip--date--arrows">
              <div class="gogocar-gray-icons wtda-arrow--prev gogocar-gray-button-hover">
                <svg class="icon icon-arrow-right ">
                  <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#arrow-right') }}"></use>
                </svg>
              </div>
              <div class="gogocar-gray-icons wtda-arrow--next gogocar-gray-button-hover">
                <svg class="icon icon-arrow-right ">
                  <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#arrow-right') }}"></use>
                </svg>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="when-trip">
      <div class="container">
        <div class="when-trip--wrap">
          <h1 class="main-section--title text-center mb-5">Во сколько <span>заберете пассажиров ?</span></h1>
          <div class="when-trip-date w-230 m-0-auto mb-5">
            <select class="gogocar-select-when-trip" name="time">
              <option value="00:00">00:00</option>
              <option value="01:00">01:00</option>
              <option value="02:00">02:00</option>
              <option value="03:00">03:00</option>
              <option value="04:00">04:00</option>
              <option value="05:00">05:00</option>
              <option value="06:00">06:00</option>
              <option value="07:00">07:00</option>
              <option value="08:00">08:00</option>
              <option value="09:00">09:00</option>
              <option value="10:00">10:00</option>
              <option value="11:00">11:00</option>
              <option value="12:00">12:00</option>
              <option value="13:00">13:00</option>
              <option value="14:00">14:00</option>
              <option value="15:00">15:00</option>
              <option value="16:00">16:00</option>
              <option value="17:00">17:00</option>
              <option value="18:00">18:00</option>
              <option value="19:00">19:00</option>
              <option value="20:00">20:00</option>
              <option value="21:00">21:00</option>
              <option value="22:00">22:00</option>
              <option value="23:00">23:00</option>
            </select>
          </div>
          <div class="trip-stops--places--buttons">
            <button class="gogocar-yellow-button" type="submit">Продолжить</button>
            <a href="{{ route('addComment_cargo', app()->getLocale()) }}" class="gogocar-gray-button">Отмена</a>
          </div>
        </div>
      </div>
    </section>
  </form>
</div>
<script>
  window.return_date = '{{$list_startdate}}';
 $(document).ready(function() {
    $('.trip-show-calendar').each(function(){
        $(this).datepicker({
            minDate: new Date(return_date),
            autoShow: true,
            autoPick: false,
            language: 'ru-RU',
            // autoHide: true,
            //trigger: '.data-exam-popup',
            inline: true,
            //container: '.trip-show-calendar',
            pickedClass: 'picked-day-gogocar',
            highlightedClass: 'today-day-gogocar',
            zIndex: 1050,
            pick: function (e) {
                var date = $(this).datepicker('getDate', true);
                $('.when-trip-show-date').val(date);
            },
            startDate: return_date,
            template: '<div class="datepicker-container" id="datepicker-id-trip">' + '<div class="datepicker-panel" data-view="years picker">' + '<ul class="gogocar-ul-navbar">' + '<li data-view="years prev">&lsaquo;</li>' + '<li data-view="years current"></li>' + '<li data-view="years next">&rsaquo;</li>' + '</ul>' + '<ul data-view="years"></ul>' + '</div>' + '<div class="datepicker-panel" data-view="months picker">' + '<ul>' + '<li data-view="year prev">&lsaquo;</li>' + '<li data-view="year current"></li>' + '<li data-view="year next">&rsaquo;</li>' + '</ul>' + '<ul data-view="months"></ul>' + '</div>' + '<div class="datepicker-panel" data-view="days picker">' + '<ul class="gogocar-ul-navbar">' + '<li data-view="month prev" class="gogocar-calendar-prev"><svg xmlns="http://www.w3.org/2000/svg" class="icon" id="Слой_1" data-name="Слой 1" viewBox="0 0 10 18">\n' +
                '  <path d="M9,17,1,9,9,1" style="fill: none;stroke: #fff;stroke-linecap: round;stroke-linejoin: round;stroke-width: 2px"/>\n' +
                '</svg></li>' + '<li data-view="month current" class="gogocar-calendar-current"></li>' + '<li data-view="month next" class="gogocar-calendar-next"><svg xmlns="http://www.w3.org/2000/svg" class="icon" id="Слой_1" data-name="Слой 1" viewBox="0 0 10 18">\n' +
                '  <path d="M1,1,9,9,1,17" style="fill: none;stroke: #fff;stroke-linecap: round;stroke-linejoin: round;stroke-width: 2px"/>\n' +
                '</svg></li>' + '</ul>' + '<ul data-view="week"></ul>' + '<ul data-view="days"></ul>' + '</div>' + '</div>',
        });

    });

 })
</script>
@endsection