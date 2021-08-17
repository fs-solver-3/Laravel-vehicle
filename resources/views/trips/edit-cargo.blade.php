@extends('layouts.user_app')
@section('title', 'Редактировать пoездку')
@section('content')
    <div class="content">
        <section class="type-trip">
            <div class="container">
                @if(Session::has('success_message'))
                    <div class="alert alert-success">
                        <span class="glyphicon glyphicon-ok"></span>
                        {!! session('success_message') !!}

                        <button type="button" class="close" data-dismiss="alert" aria-label="close">
                            <span aria-hidden="true">&times;</span>
                        </button>

                    </div>
                @endif
                @php
                    use Hashids\Hashids;
                    $hashids = new Hashids();
                @endphp
                <form method="POST" action="{{ route('trip.update', ['locale' => app()->getLocale(), 'id' => $listing->id]) }}" id="edit_listing_form" name="edit_listing_form" accept-charset="UTF-8" class="form-horizontal">
                    {{ csrf_field() }}
                    <input name="_method" type="hidden" value="PUT">
                    <div class="change-trip--wrap">
                        <h1 class="main-section--title text-center mb-5">@lang('front.edit_trip.edit') <span>@lang('front.edit_trip.trip')</span></h1>
                        <div class="col-xl-8 col-lg-8 change-trip--list">
                        <div class="find-trip-change--wrap change-trip--where">
                            <div class="gogocar-title-input">@lang('front.edit_trip.where_we') ?</div>
                            <div class="gogocar-input--wrapper">
                            <div class="gogocar-input-icon gogocar-gray-icons">
                                <svg class="icon icon-map2 ">
                                <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#map2')}}"></use>
                                </svg>
                            </div>
                            @if(!is_null($listing->location_address))
                                @if(!is_null($listing->location_address->full))
                                    <input class="gogocar-input-v1 gogocar-from map-input" id="address1-input" name="fc" type="text" placeholder="Откуда..." value="{{$listing->location_address->full}}">
                                @else
                                    <input class="gogocar-input-v1 gogocar-from map-input" id="address1-input" name="fc" type="text" placeholder="Откуда..." value="{{$listing->location_address->city}}">
                                @endif
                                <input type="hidden" name="address1_latitude" id="address1-latitude" value="0" />
                                <input type="hidden" name="address1_longitude" id="address1-longitude" value="0" />
                                <input type="hidden" name="address1_component" id="address1-component" value="0" />
                            @endif
                            </div>
                        </div>
                        <div class="change-trip-stops">
                            <div class="gogocar-title-input">@lang('front.edit_trip.do_you')?</div>
                                @foreach ($listing->stop as $stop)
                                    <div class="change-trip--stop">
                                        <div class="find-trip-change--wrap change-trip-input--wrap">
                                            <div class="gogocar-input-label">@lang('front.edit_trip.stop') {{$loop->index + 1}}</div>
                                            <div class="gogocar-input--wrapper">
                                                <div class="gogocar-input-icon gogocar-gray-icons">
                                                    <svg class="icon icon-map2 ">
                                                    <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#map2')}}"></use>
                                                    </svg>
                                                </div>
                                                @if(!is_null($stop))
                                                    @if(!is_null($stop->location->full))
                                                        <input class="gogocar-input-v1 gogocar-from map-input" name="stop[]" id="address-stop-{{$loop->index + 1}}-input" type="text" placeholder="Откуда..." value="{{$stop->location->full}}">
                                                    @else
                                                        <input class="gogocar-input-v1 gogocar-from map-input" name="stop[]" id="address-stop-{{$loop->index + 1}}-input" type="text" placeholder="Откуда..." value="{{$stop->location->full}}">
                                                    @endif
                                                    <input type="hidden" name="address_stop_latitude[]" id="address-stop-{{$loop->index + 1}}-latitude" value="" />
                                                    <input type="hidden" name="address_stop_longitude[]" id="address-stop-{{$loop->index + 1}}-longitude" value="0" />
                                                    <input type="hidden" name="address_stop_component[]" id="address-stop-{{$loop->index + 1}}-component" value="0" />
                                                    <input type="hidden" name="stops[]" id="address-stop-{{$loop->index + 1}}-id" value="{{ $stop->location_id }}" />
                                                    <input type="hidden" name="stops_id[]" id="address-stop-{{$loop->index + 1}}-id" value="{{ $stop->id }}" />
                                                @endif
                                            </div>
                                        </div>
                                        <div class="change-trip-people-and-time">
                                            <div class="trip-choise-car--count mb-5 ml-0">
                                              <div class="trip-choise-car--count--minus">
                                                <svg class="icon icon-arrow-left ">
                                                  <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#arrow-left')}}"></use>
                                                </svg>
                                              </div>
                                              <div class="trip-choise-car--count-field gogocar-input--wrapper">
                                                <div class="gogocar-gray-icons">
                                                  <svg class="icon icon-man ">
                                                    <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#man')}}"></use>
                                                  </svg>
                                                </div>
                                                <input name="stop_max_occupants[]" class="gogocar-input-v1 trip-choise-car--count--input" type="text" value="{{$stop->max_occupants}}" readonly style="width: 150px">
                                              </div>
                                              <div class="trip-choise-car--count--plus">
                                                <svg class="icon icon-arrow-right ">
                                                  <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#arrow-right')}}"></use>
                                                </svg>
                                              </div>
                                            </div>
                                            <div class="when-trip-date w-230 m-0-auto mb-5">
                                                <select class="gogocar-select-when-trip" name="stop_starting_time[]">
                                                    <option value="00:00" @if($stop->starting_hour == '00:00') selected @endif>00:00</option>
                                                    <option value="01:00" @if($stop->starting_hour == '01:00') selected @endif>01:00</option>
                                                    <option value="02:00" @if($stop->starting_hour == '02:00') selected @endif>02:00</option>
                                                    <option value="03:00" @if($stop->starting_hour == '03:00') selected @endif>03:00</option>
                                                    <option value="04:00" @if($stop->starting_hour == '04:00') selected @endif>04:00</option>
                                                    <option value="05:00" @if($stop->starting_hour == '05:00') selected @endif>05:00</option>
                                                    <option value="06:00" @if($stop->starting_hour == '06:00') selected @endif>06:00</option>
                                                    <option value="07:00" @if($stop->starting_hour == '07:00') selected @endif>07:00</option>
                                                    <option value="08:00" @if($stop->starting_hour == '08:00') selected @endif>08:00</option>
                                                    <option value="09:00" @if($stop->starting_hour == '09:00') selected @endif>09:00</option>
                                                    <option value="10:00" @if($stop->starting_hour == '10:00') selected @endif>10:00</option>
                                                    <option value="11:00" @if($stop->starting_hour == '11:00') selected @endif>11:00</option>
                                                    <option value="12:00" @if($stop->starting_hour == '12:00') selected @endif>12:00</option>
                                                    <option value="13:00" @if($stop->starting_hour == '13:00') selected @endif>13:00</option>
                                                    <option value="14:00" @if($stop->starting_hour == '14:00') selected @endif>14:00</option>
                                                    <option value="15:00" @if($stop->starting_hour == '15:00') selected @endif>15:00</option>
                                                    <option value="16:00" @if($stop->starting_hour == '16:00') selected @endif>16:00</option>
                                                    <option value="17:00" @if($stop->starting_hour == '17:00') selected @endif>17:00</option>
                                                    <option value="18:00" @if($stop->starting_hour == '18:00') selected @endif>18:00</option>
                                                    <option value="19:00" @if($stop->starting_hour == '19:00') selected @endif>19:00</option>
                                                    <option value="20:00" @if($stop->starting_hour == '20:00') selected @endif>20:00</option>
                                                    <option value="21:00" @if($stop->starting_hour == '21:00') selected @endif>21:00</option>
                                                    <option value="22:00" @if($stop->starting_hour == '22:00') selected @endif>22:00</option>
                                                    <option value="23:00" @if($stop->starting_hour == '23:00') selected @endif>23:00</option>
                                                    <option value="24:00" @if($stop->starting_hour == '24:00') selected @endif>24:00</option>
                                                </select>
                                            </div>
                                            <div class="mb-5 delete-stop" data-id="{{ $stop->id }}">
                                                <div class="gogocar-red-icons">
                                                    <svg class="icon icon-delete2 ">
                                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#delete2') }}"></use>
                                                    </svg>
                                                </div>
                                                <input type="hidden" class="delete-stop-id" name="delete_stops[]" value="" />
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                                @if(Session::get('edit-stops-passenger') != null)
                                    @foreach(Session::get('edit-stops-passenger') as $item)
                                        <div class="change-trip--stop new-stop">
                                            <div class="find-trip-change--wrap change-trip-input--wrap">
                                                <div class="gogocar-input-label">@lang('front.edit_trip.new') {{$loop->index + 1}}</div>
                                                <div class="gogocar-input--wrapper">
                                                <div class="gogocar-input-icon gogocar-gray-icons">
                                                    <svg class="icon icon-map2 ">
                                                    <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#map2')}}"></use>
                                                    </svg>
                                                </div>
                                                <input class="gogocar-input-v1 gogocar-from map-input" name="new_stop[]" type="text" id="address-new-stop-{{$loop->index + 1}}-input" placeholder="Откуда..." value="{{$item->drop_off}}">
                                                <input type="hidden" name="address_new_stop_latitude[]" id="address-new-stop-{{$loop->index + 1}}-latitude" value="{{$item->lat}}" />
                                                <input type="hidden" name="address_new_stop_longitude[]" id="address-new-stop-{{$loop->index + 1}}-longitude" value="{{$item->long}}" />
                                                <input type="hidden" name="address_new_stop_component[]" id="address-new-stop-{{$loop->index + 1}}-component" value="{{ $item->address_component }}" />
                                                </div>
                                            </div>
                                            <div class="change-trip-people-and-time">
                                                <div class="trip-choise-car--count mb-5 ml-0">
                                                  <div class="trip-choise-car--count--minus">
                                                    <svg class="icon icon-arrow-left ">
                                                      <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#arrow-left')}}"></use>
                                                    </svg>
                                                  </div>
                                                  <div class="trip-choise-car--count-field gogocar-input--wrapper">
                                                    <div class="gogocar-gray-icons">
                                                      <svg class="icon icon-man ">
                                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#man')}}"></use>
                                                      </svg>
                                                    </div>
                                                    <input name="new_stop_max_occupants[]" class="gogocar-input-v1 trip-choise-car--count--input" type="text" value="" readonly style="width: 150px">
                                                  </div>
                                                  <div class="trip-choise-car--count--plus">
                                                    <svg class="icon icon-arrow-right ">
                                                      <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#arrow-right')}}"></use>
                                                    </svg>
                                                  </div>
                                                </div>
                                                <div class="when-trip-date w-230 m-0-auto mb-5">
                                                    <select class="gogocar-select-when-trip" name="new_stop_starting_time[]">
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
                                                        <option value="24:00">24:00</option>
                                                    </select>
                                                </div>
                                                <div class="mb-5 delete-stop-new">
                                                    <div class="gogocar-red-icons">
                                                        <svg class="icon icon-delete2 ">
                                                            <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#delete2') }}"></use>
                                                        </svg>
                                                    </div>
                                                    <input type="hidden" class="delete-stop-id" name="new_delete_stops[]" value="" />
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            <a href="{{ route('edit.trip.map_Deploy_Cargo', [app()->getLocale(), 'id'=>$listing->id]) }}"><div class="gogocar-gray-button gogocar-add-stops w-270 m-0-auto">Добавить еще остановку</div></a>
                        </div>
                        <div class="find-trip-change--wrap change-trip--where">
                            <div class="gogocar-title-input">@lang('front.edit_trip.where_would') ?</div>
                            <div class="gogocar-input--wrapper">
                            <div class="gogocar-input-icon gogocar-gray-icons">
                                <svg class="icon icon-map2 ">
                                <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#map2')}}"></use>
                                </svg>
                            </div>
                            @if(!is_null($listing->destination_address))
                                @if(!is_null($listing->destination_address->full))
                                    <input class="gogocar-input-v1 gogocar-from map-input" id="address2-input" name="dc" type="text" placeholder="Откуда..." value="{{$listing->destination_address->full}}">
                                @else
                                    <input class="gogocar-input-v1 gogocar-from map-input" id="address2-input" name="dc" type="text" placeholder="Откуда..." value="{{$listing->destination_address->city}}">
                                @endif
                                <input type="hidden" name="address2_latitude" id="address2-latitude" value="0" />
                                <input type="hidden" name="address2_longitude" id="address2-longitude" value="0" />
                                <input type="hidden" name="address2_component" id="address2-component" value="0" />
                                @endif
                            </div>
                        </div>
                        <div class="change-trip-time--wrap">
                            <div class="gogocar-title-input">@lang('front.edit_trip.when_would') ?</div>
                            <div class="change-trip-people-and-time">
                            <div class="col-xl-8 col-lg-8 col-md-6 col-sm-12 gogocar-input--wrapper mb-0">
                                <div class="gogocar-input-icon gogocar-gray-icons">
                                <svg class="icon icon-calendar ">
                                    <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#calendar')}}"></use>
                                </svg>
                                </div>
                                <input name="starting_date" class="gogocar-input-v1 popup-show-calendar popup-show-calendar-click calendar-zone-height" type="text" value="{{{date('d.m.Y',strtotime($listing->starting_date))}}}}">
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 when-trip-date">
                                <select class="gogocar-select-when-trip" name="starting_time">
                                <option value="00:00" @if(date('h:i',strtotime($listing->starting_date)) == '00:00') selected @endif>00:00</option>
                                <option value="01:00" @if(date('h:i',strtotime($listing->starting_date)) == '01:00') selected @endif>01:00</option>
                                <option value="02:00" @if(date('h:i',strtotime($listing->starting_date)) == '02:00') selected @endif>02:00</option>
                                <option value="03:00" @if(date('h:i',strtotime($listing->starting_date)) == '03:00') selected @endif>03:00</option>
                                <option value="04:00" @if(date('h:i',strtotime($listing->starting_date)) == '04:00') selected @endif>04:00</option>
                                <option value="05:00" @if(date('h:i',strtotime($listing->starting_date)) == '05:00') selected @endif>05:00</option>
                                <option value="06:00" @if(date('h:i',strtotime($listing->starting_date)) == '06:00') selected @endif>06:00</option>
                                <option value="07:00" @if(date('h:i',strtotime($listing->starting_date)) == '07:00') selected @endif>07:00</option>
                                <option value="08:00" @if(date('h:i',strtotime($listing->starting_date)) == '08:00') selected @endif>08:00</option>
                                <option value="09:00" @if(date('h:i',strtotime($listing->starting_date)) == '09:00') selected @endif>09:00</option>
                                <option value="10:00" @if(date('h:i',strtotime($listing->starting_date)) == '10:00') selected @endif>10:00</option>
                                <option value="11:00" @if(date('h:i',strtotime($listing->starting_date)) == '11:00') selected @endif>11:00</option>
                                <option value="12:00" @if(date('h:i',strtotime($listing->starting_date)) == '12:00') selected @endif>12:00</option>
                                <option value="13:00" @if(date('h:i',strtotime($listing->starting_date)) == '13:00') selected @endif>13:00</option>
                                <option value="14:00" @if(date('h:i',strtotime($listing->starting_date)) == '14:00') selected @endif>14:00</option>
                                <option value="15:00" @if(date('h:i',strtotime($listing->starting_date)) == '15:00') selected @endif>15:00</option>
                                <option value="16:00" @if(date('h:i',strtotime($listing->starting_date)) == '16:00') selected @endif>16:00</option>
                                <option value="17:00" @if(date('h:i',strtotime($listing->starting_date)) == '17:00') selected @endif>17:00</option>
                                <option value="18:00" @if(date('h:i',strtotime($listing->starting_date)) == '18:00') selected @endif>18:00</option>
                                <option value="19:00" @if(date('h:i',strtotime($listing->starting_date)) == '19:00') selected @endif>19:00</option>
                                <option value="20:00" @if(date('h:i',strtotime($listing->starting_date)) == '20:00') selected @endif>20:00</option>
                                <option value="21:00" @if(date('h:i',strtotime($listing->starting_date)) == '21:00') selected @endif>21:00</option>
                                <option value="22:00" @if(date('h:i',strtotime($listing->starting_date)) == '22:00') selected @endif>22:00</option>
                                <option value="23:00" @if(date('h:i',strtotime($listing->starting_date)) == '23:00') selected @endif>23:00</option>
                                <option value="24:00" @if(date('h:i',strtotime($listing->starting_date)) == '24:00') selected @endif>24:00</option>
                                </select>
                            </div>
                            </div>
                        </div>
                        <div class="change-trip-car--wrap">
                            <div class="gogocar-title-input">@lang('front.edit_trip.what_car') ?</div>
                            <div class="trip-select-car--wrapper">
                            <div class="trip-select-car">
                                <div class="trip-select--icon--car">
                                <div class="gogocar-gray-icons">
                                    <svg class="icon icon-taxi ">
                                    <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#taxi')}}"></use>
                                    </svg>
                                </div>
                                @if(count(Auth::user()->trucks) > 0)
                                <div class="trip-select--car--name">
                                    <input type="hidden" class="trip-select--car--id" id="car_id" name="truck_id" style="display: none;" value="{{optional($listing->truck)->id}}">
                                    <div class="trip-select--car--name1">{{optional($listing->truck)->model}}</div>
                                    <div class="trip-select--car--name2">({{optional($listing->truck)->number}})</div>
                                </div>
                                @endif
                                </div>
                                <div class="trip-select--arrow">
                                <svg class="icon icon-arrow-right ">
                                    <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#arrow-right')}}"></use>
                                </svg>
                                </div>
                            </div>
                            <ul class="trip-select-car--list">
                                @foreach(Auth::user()->trucks as $item)
                                <li class="trip-select-car--item suggest-late--result--item">
                                <div class="suggest-late--result--item__left">
                                    <div class="gogocar-gray-icons">
                                    <svg class="icon icon-taxi ">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#taxi')}}"></use>
                                    </svg>
                                    </div>
                                    <div class="trip-select-car-name--number">
                                    <input type="hidden" class="trip-select-car-name--id" style="display: none;" value="{{$item->id}}">
                                    <div class="trip-select-car-name--number1">{{$item->model}}</div>
                                    <div class="trip-select-car-name--number2">({{$item->number}})</div>
                                    </div>
                                </div>
                                <div class="gogocar-gray-icons2">
                                    <svg class="icon icon-arrow-right3 ">
                                    <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#arrow-right3')}}"></use>
                                    </svg>
                                </div>
                                </li>
                                @endforeach
                            </ul>
                            </div>
                        </div>
                        <div class="change-trip-cargo--weight--wrap">
                            <div class="gogocar-title-input">Итак, сколько груза можете взять в дорогу ?</div>
                            <div class="gogocar-input--wrapper gogocar-placeholder w-48">
                              <div class="gogocar-input-icon gogocar-gray-icons">
                                <svg class="icon icon-weight ">
                                  <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#weight')}}"></use>
                                </svg>
                              </div>
                              <input class="gogocar-input-v1" type="text" value="{{$listing->capacity}}" name="capacity" id="capacity">
                              <label>Общий вес <span>(кг)</span></label>
                            </div>
                            <div class="gogocar-input--wrapper gogocar-placeholder w-48">
                              <div class="gogocar-input-icon gogocar-gray-icons">
                                <svg class="icon icon-volume ">
                                  <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#volume')}}"></use>
                                </svg>
                              </div>
                              <input class="gogocar-input-v1" type="text" value="{{$listing->place}}" name="place" id="place">
                              <label>Общий объем <span>(м3)</span></label>
                            </div>
                            <div class="gogocar-input--wrapper gogocar-placeholder w-48">
                              <div class="gogocar-input-icon gogocar-gray-icons">
                                <svg class="icon icon-gabar ">
                                  <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#gabar')}}"></use>
                                </svg>
                              </div>
                              <input class="gogocar-input-v1" type="text" value="{{$listing->max_size}}"  name="max_size" id="max_size">
                              <label>Макс. габарит <span>(м)</span></label>
                            </div>
                          </div>
                          <div class="change-trip-cargo--type--wrap">
                            <div class="gogocar-title-input">Какие виды груза можете взять ?</div>
                            <div class="gogocar-input--wrapper">
                              <div class="gogocar-input-icon gogocar-gray-icons">
                                <svg class="icon icon-type-cargo ">
                                  <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#type-cargo')}}"></use>
                                </svg>
                              </div>
                              <div class="gogocar-input-hidden-cargo-find">
                                    @foreach ($listing->cargo_type as $item)
                                        <div class="ggc-cargo--item">{{ $item->type_name}}
                                            <svg class="icon icon-close ggc-cargo-delete ">
                                                <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#close')}}"></use>
                                            </svg>
                                        </div>
                                    @endforeach
                              </div>
                              <input class="gogocar-input-v1 gogocar-from ggc-type-cargo" type="hidden" placeholder="Типы груза...">
                              <div class="gogocar-add-cargo-type gogocar-gray-icons" data-toggle="modal" data-target="#popup-cargo-type-edit">
                                <svg class="icon icon-plus ">
                                  <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#plus')}}"></use>
                                </svg>
                              </div>
                            </div>
                          </div>
                        <div class="change-trip-recomend--wrap">
                            <div class="gogocar-title-input">@lang('front.edit_trip.change_suggest')</div>
                            <div class="remove-price--content">
                                <div class="gogocar-input--wrapper">
                                    <div class="remove-price--content__icon__route">
                                    <div class="gogocar-gray-icons">
                                        <svg class="icon icon-map2 ">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#map2')}}"></use>
                                        </svg>
                                    </div>
                                    <div class="remove-price--route"><span class="remove-route--start">{{$listing->location_address->full}}</span>
                                        <div class="gogocar-trip--item__route">
                                        <div class="gogocar-trip--item__route--start"></div>
                                        <div class="gogocar-trip--item__route--end"></div>
                                        </div><span class="remove-route--end">{{$listing->destination_address->full}}</span>
                                    </div>
                                    </div>
                                    <div class="remove-change--price">
                                    <div class="remove-change--price--minus">
                                        <svg class="icon icon-minus ">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#minus')}}"></use>
                                        </svg>
                                    </div>
                                    <div class="remove-change--price-text money" data-change-ratio="{{Helper::convertCurrency(1, 'RUB', 'UZS')}}"
                                    data-change-price="5000" data-change-currency="UZS"
                                    data-currency-rub="{{Helper::convertCurrency($listing->price_per_seat, 'UZS', 'RUB')}}" data-currency-uzs="{{$listing->price_per_seat}}"
                                    >{{ $listing->price_per_seat }}&nbspUZS</div>
                                    <div class="remove-change--price--plus">
                                        <svg class="icon icon-add ">
                                            <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#add')}}"></use>
                                        </svg>
                                    </div>
                                    <input type="hidden" id="price_per_seat" name="price_per_seat" value="{{ $listing->price_per_seat }}">
                                    </div>
                                </div>
                                @foreach ($listing->stop as $item)
                                <div class="gogocar-input--wrapper old-stop-prices" id="old-stop-prices-{{ $item->id }}">
                                    <div class="remove-price--content__icon__route">
                                    <div class="gogocar-gray-icons">
                                        <svg class="icon icon-map2 ">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#map2')}}"></use>
                                        </svg>
                                    </div>
                                    <div class="remove-price--route"><span class="remove-route--start">{{ $item->location->full }}</span>
                                        <div class="gogocar-trip--item__route">
                                        <div class="gogocar-trip--item__route--start"></div>
                                        <div class="gogocar-trip--item__route--end"></div>
                                        </div><span class="remove-route--end">{{$listing->destination_address->full}}</span>
                                    </div>
                                    </div>
                                    <div class="remove-change--price">
                                    <div class="remove-change--price--minus">
                                        <svg class="icon icon-minus ">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#minus')}}"></use>
                                        </svg>
                                    </div>
                                    <div class="remove-change--price-text money" data-change-ratio="{{Helper::convertCurrency(1, 'RUB', 'UZS')}}"
                                    data-change-price="5000" data-change-currency="UZS"
                                    data-currency-rub="{{Helper::convertCurrency($item->location->price, 'UZS', 'RUB')}}" data-currency-uzs="{{$item->location->price}}"
                                    >{{ $item->location->price }}&nbspUZS</div>
                                    <div class="remove-change--price--plus">
                                        <svg class="icon icon-add ">
                                            <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#add')}}"></use>
                                        </svg>
                                    </div>
                                    <input type="hidden" id="price_per_seat-{{$loop->index}}" name="stop_price_per_seat[]" value="{{ $item->location->price }}">
                                    </div>
                                </div>
                                @endforeach
                                @if(Session::get('edit-stops-passenger') != null)
                                    @foreach(Session::get('edit-stops-passenger') as $item)
                                        <div class="gogocar-input--wrapper">
                                            <div class="remove-price--content__icon__route">
                                            <div class="gogocar-gray-icons">
                                                <svg class="icon icon-map2 ">
                                                <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#map2')}}"></use>
                                                </svg>
                                            </div>
                                            <div class="remove-price--route"><span class="remove-route--start">{{$item->drop_off}}</span>
                                                <div class="gogocar-trip--item__route">
                                                <div class="gogocar-trip--item__route--start"></div>
                                                <div class="gogocar-trip--item__route--end"></div>
                                                </div><span class="remove-route--end">{{$listing->destination_address->full}}</span>
                                            </div>
                                            </div>
                                            <div class="remove-change--price">
                                            <div class="remove-change--price--minus">
                                                <svg class="icon icon-minus ">
                                                <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#minus')}}"></use>
                                                </svg>
                                            </div>
                                            <div class="remove-change--price-text money"  data-change-ratio="{{Helper::convertCurrency(1, 'RUB', 'UZS')}}"
                                            data-change-price="5000" data-change-currency="UZS"
                                            data-currency-rub="{{Helper::convertCurrency(0, 'UZS', 'RUB')}}" data-currency-uzs="0"
                                            >0&nbspUZS</div>
                                            <div class="remove-change--price--plus">
                                                <svg class="icon icon-add ">
                                                    <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#add')}}"></use>
                                                </svg>
                                            </div>
                                            <input type="hidden" id="price_per_seat-{{$loop->index}}" name="new_stop_price_per_seat[]" value="0">
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="change-trip-go-back--wrap">
                            <div class="gogocar-title-input">@lang('front.edit_trip.are_you')!</div>
                            <div class="change-trip-go-back--buttons">
                                <a href="{{ route('trip.return', [app()->getLocale(), 't_id'=>$listing->id]) }}" class="gogocar-yellow-button gogocar-active-reg">
                                    <div >@lang('front.edit_trip.i_will_post_now')</div>
                                </a>
                                <a class="gogocar-gray-button" href="{{ route('trips', app()->getLocale()) }}">
                                    <div class="">
                                        @lang('front.edit_trip.i_will_post')
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="change-trip-comment--wrap">
                            <div class="gogocar-title-input">@lang('front.edit_trip.end_trip')?</div>
                            <div class="trip-comment--content">
                            <label>@lang('front.edit_trip.comment'):</label>
                            <textarea name="additional_info" class="trip-comment--textarea" rows="5" cols="10" placeholder="Здравствуйте! Я еду по работе, в багажнике много места. В салоне будем только мы.">{{$listing->additional_info}}</textarea>
                            </div>
                        </div>
                        </div>
                        <input type="hidden" id="listing_type" name="listing_type"
                                value="@if($listing->car_id != null){{'passenger'}}@elseif($listing->truck_id != null){{'cargo'}}@endif">
                        {{-- <div class="gogocar-yellow-button" data-toggle="modal" data-target="#popup-change">Сохранить</div> --}}
                        <input type="hidden" name="cargo_type" value="" id="cargo_type">
                        <button class="gogocar-yellow-button" type="submit">@lang('global.app_save')</button>
                    </div>
                </form>
            </div>
            <div id="address-map-container" style="display: none; ">
                <div style="width: 100%; height: 100%" id="address1-map"></div>
                <div style="width: 100%; height: 100%" id="address2-map"></div>
                    @foreach ($listing->stop as $stop)
                        <div style="width: 100%; height: 100%" id="address-stop-{{$loop->index + 1}}-map"></div>
                    @endforeach
                    @if(Session::get('edit-stops-passenger') != null)
                        @foreach(Session::get('edit-stops-passenger') as $item)
                            <div style="width: 100%; height: 100%" id="address-new-stop-{{$loop->index + 1}}-map"></div>
                        @endforeach
                    @endif
            </div>
          </section>
    </div>
    <script>
         $('.remove-change--price').click(function(){
            var values = $(this).children('.remove-change--price-text').attr('data-currency-uzs');
            $(this).children('input').val(parseInt(values));
         })

         $(document).ready(function() {
            $('.gogocar-placeholder input').each(function(){
                let id = $(this).attr('id');
                let val = localStorage.getItem('cargo' + id);
                if(val){
                    $(this).val(val);
                }
                if($(this).val().length > 0){
                    $(this).siblings('label').hide();
                }else{
                    $(this).siblings('label').show();
                }
            })

            $('.gogocar-placeholder input').change(function(){
                if($(this).val().length > 0){
                    $(this).siblings('label').hide();
                }else{
                    $(this).siblings('label').show();
                }
                let id = $(this).attr('id');
                localStorage.setItem('cargo' + id, $(this).val());
            })

           

            function cargotype(){
                var cargo_type_id = [];
                $('#popup-cargo-type-edit .popup-gogocar-type-cargo--item__wrap.active').each(function(){
                    let id = $(this).data('id');
                    cargo_type_id.push(id);
                })
                $('#cargo_type').val(cargo_type_id);
            }

            cargotype();

            $('#popup-cargo-type-edit .popup-gogocar-type-cargo--item__wrap').click(function(){
                cargotype();
            })

            $('.delete-stop').click(function(){
                 $(this).parent().parent('.change-trip--stop').hide();
                 $(this).children('.delete-stop-id').val($(this).data('id'));
             })

             $('.delete-stop-new').click(function(){
                 $(this).parent().parent('.new-stop').remove();
             })
            

         })
    </script>
<div class="modal fade" id="popup-cargo-type-edit" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered popup-modal--wrap modal-970" role="document">
        <div class="modal-content popup-content">
            <div class="popup-header">
                <div class="popup-modal-close close" data-dismiss="modal" aria-label="Close">
                    <svg class="icon icon-close ">
                        <use
                            xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#close') }}">
                        </use>
                    </svg>
                </div>
                <h3 class="main-section--title text-center mb-5">@lang('front.modal.types') <span>@lang('front.modal.cargo')</span></h3>
            </div>
            <ul class="popup-gogocar-type-cargo row mb-4">
                @isset($cargotypes)
                @if(count($cargotypes) != 0)
                @foreach ($cargotypes as $item)
                <li class="col-xl-6 col-sm-12 popup-gogocar-type-cargo--item__wrap @if(in_array($item->id, $listing_cargo_ypes)) active @endif" data-id="{{$item->id}}">
                    <div class="popup-gogocar-type-cargo--item">
                        <div class="popup-gogocar-cargo--checkbox"></div><span>{{$item->type_name}}</span>
                    </div>
                </li>
                @endforeach
                @endif
                @endisset
            </ul>
            <div class="popup-buttons-ok-close">
                <div class="gogocar-yellow-button type-cargo-choise mr-5" data-dismiss="modal" aria-label="Close">
                    @lang('front.modal.confirm')</div>
                <div class="gogocar-gray-button" data-dismiss="modal" aria-label="Close">@lang('front.modal.cancel')</div>
            </div>
        </div>
    </div>
</div>
@endsection
