@extends('layouts.app')
@section('title', 'Trips')
@section('content')
<section class="section-1">
  <div class="section-content--main__wrap box-bg2 pb-0">
    <div class="section-content--main">
      <div class="section-top-side">
        <div class="section-top-block--back">
          <a href="{{ route('admin.listing.index', app()->getLocale()) }}">
            <div class="section-top-block--back__item">
              <svg class="icon icon-arrow-left ">
                <use xlink:href="{{asset('static/img/svg/symbol/sprite.svg#arrow-left')}}"></use>
              </svg>
            </div>
          </a>
          <div class="section-block--title">@lang('global.listing.fields.trip') №{{$listing->id}}</div>
        </div>
      </div>
      <div class="section-bottom-side pr-0 pl-0">
        <ul class="setion-trip-more--list">
          <li class="setion-trip-more--item">
            <div class="setion-trip-more--name">@lang('global.listing.fields.author'):</div><a class="setion-trip-more--info" href="/">{{ optional($listing->user)->name }}</a>
          </li>
          <li class="setion-trip-more--item">
            <div class="setion-trip-more--name">@lang('global.listing.fields.type_trip'):</div><a class="setion-trip-more--info"
              href="/">{{ $listing->car_id != null? 'Пассажирская' : 'Грузовая' }}</a>
          </li>
          <li class="setion-trip-more--item">
            <div class="setion-trip-more--name">Пассажиры:</div>
            @if(count($listing->bookings) > 0)
              @foreach ($listing->bookings as $book)
                @if(!is_null($book->user))
                <a class="setion-trip-more--info" href="{{ route('admin.users.edit', ['locale' => app()->getLocale(), 'id' => optional($book->user)->id, 'tab' => 'main']) }}"">
                  {{ $book->user->name}},
                </a>
                @endif
              @endforeach
              <span>({{count($listing->bookings)}})</span>
            @endif
            {{-- <a class="setion-trip-more--info" href="/">Марья
              Ефремова, Наталья Муравьёва <span>(2)</span>
            </a> --}}
          </li>
          <li class="setion-trip-more--item">
            <div class="setion-trip-more--name">@lang('global.listing.fields.date'): {{ $listing->starting_date }}</div>
          </li>
          <li class="setion-trip-more--item">
            <div class="setion-trip-more--name">Дата изменения: {{ $listing->updated_at }}</div>
          </li>
          <li class="setion-trip-more--item">
            <div class="setion-trip-more--name">@lang('global.listing.fields.collection') (UZS): {{ $listing->commission() }}</div>
          </li>
          {{-- <li class="setion-trip-more--item">
            <div class="setion-trip-more--name">Сбор (UZS): 11 000</div>
          </li> --}}
          <li class="setion-trip-more--item">
            <div class="setion-trip-more--name">@lang('global.listing.fields.location'):</div><a class="setion-trip-more--info"
              href="/">{{ optional($listing->location)->city }}</a>
          </li>
          @foreach ($stops as $item)
          <li class="setion-trip-more--item">
            <div class="setion-trip-more--name">@lang('global.listing.fields.stop'):</div><a class="setion-trip-more--info" href="/">{{$item->city}}
              </a>
          </li>
          @endforeach
          <li class="setion-trip-more--item">
            <div class="setion-trip-more--name">@lang('global.listing.fields.destination'):</div><a class="setion-trip-more--info"
              href="/">{{ optional($listing->destination)->city }}</a>
          </li>
          @if ($listing->car_id != null)
          <li class="setion-trip-more--item">
            <div class="setion-trip-more--name">@lang('global.listing.fields.car'): {{ optional($listing->car)->name }}</div>
          </li>
          @elseif($listing->truck_id != null)
          <li class="setion-trip-more--item">
            <div class="setion-trip-more--name">@lang('global.listing.fields.truck'): {{ optional($listing->truck)->name }}</div>
          </li>
          @endif
          {{-- <li class="setion-trip-more--item">
            <div class="setion-trip-more--name">Кол-во мест: 5</div>
          </li> --}}
          @if ($listing->car_id != null)
          <li class="setion-trip-more--item">
            <div class="setion-trip-more--name">@lang('global.listing.fields.passenger_number'): {{ $listing->max_occupants }}</div>
          </li>
          @endif
          <li class="setion-trip-more--item">
            <div class="setion-trip-more--name">@lang('global.listing.fields.distance'): {{ round($listing->distance/1000) }} км</div>
          </li>
          @php
          $seconds = $listing->time;
          $hours = floor($seconds / 3600);
          $h = floor($seconds / 3600);
          $seconds -= $hours * 3600;
          $minutes = floor($seconds / 60);
          // $seconds -= $minutes * 60;
          @endphp
          <li class="setion-trip-more--item">
            <div class="setion-trip-more--name">@lang('global.listing.fields.duration'): {{ $hours }} ч. {{ $minutes }} мин.</div>
          </li>
        </ul>
      </div>
      <div class="section-footer-side">
        <div class="section-buttons--wrap">
          <a href="{{ route('admin.listing.edit', ['locale' => app()->getLocale(), 'id' => $listing->id]) }}" title="Edit listing">
            <button class="section-button--yellow w-140">@lang('global.app_edit')</button>
          </a>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection