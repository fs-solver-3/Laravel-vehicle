
  <div class="personal-content--main">
      <div class="personal-content--header">
          <h3 class="personal-content--header--title">@lang('front.profile.car_tab.my_car')</h3>
      </div>
      <div class="personal-content--body">
          <ul class="personal-car--list row">
                @if( !is_null(Auth::user()->cars))
                    @foreach (Auth::user()->cars as $car)
                        <li class="col-xl-4 col-lg-5 col-md-12 col-sm-12 gogocar-added-car-li">
                            <div class="personal-car--item gogocar-box">
                                <div class="personal-car--item--left">
                                    <div class="personal-car--item--left__top">{{ $car->number }}</div>
                                    <div class="personal-car--item--left__bottom">{{ $car->model }}</div>
                                </div>
                                <div class="personal-car--item--right">
                                    <a href="{{ route('profile.car.edit', ['locale' => app()->getLocale(), 'id' => $car->id]) }}">
                                        <div class="gogocar-gray-icons personal-car--item--setting">
                                            <svg class="icon icon-setting-car ">
                                                <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#setting-car') }}"></use>
                                            </svg>
                                        </div>
                                    </a>

                                    <button title="Delete car" data-toggle="modal" id="smallButton" data-target="#popup-del-msg-{{$car->id}}">
                                        <div class="gogocar-red-icons">
                                            <svg class="icon icon-delete2 ">
                                                <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#delete2') }}"></use>
                                            </svg>
                                        </div>
                                    </button>

                                    <div class="modal fade" id="popup-del-msg-{{$car->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered popup-modal--wrap" role="document">
                                            <div class="modal-content popup-content">
                                                <div class="popup-covid--wrap popup-del-msg">
                                                    <h3 class="main-section--title--v2 font-size-25 mb-5">@lang('global.app_delete') машину?</h3>
                                                    <form method="POST" action="{!! route('profile.car.destroy', ['locale' => app()->getLocale(), 'id' => $car->id]) !!}" accept-charset="UTF-8">
                                                        <input name="_method" value="DELETE" type="hidden">
                                                        {{ csrf_field() }}
                                                        <div class="delete-chat-msg">
                                                            <button type="submit" class="delete-choise-chat-msg gogocar-red-button" title="Delete Car">
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
                        </li>
                    @endforeach
                @endif
              <li class="col-xl-4 col-lg-5 col-md-12 col-sm-12 gogocar-added-car-li">
                  <a href="{{ route('profile.car.add', ['locale' => app()->getLocale(), 'type' => 'car']) }}" >
                        <div class="personal-car--item--add gogocar-box">
                            <svg class="icon icon-add ">
                                <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#add') }}"></use>
                            </svg>
                            <span class="personal-car--item--add__text">Добавить @lang('front.profile.add_car.passenger')</span>
                        </div>
                    </a>
              </li>
          </ul>
      </div>
      {{-- bus --}}
      <div class="personal-content--header">
          <h3 class="personal-content--header--title">@lang('front.profile.car_tab.my_bus')</h3>
      </div>
      <div class="personal-content--body">
          <ul class="personal-car--list row">
              @if( !is_null(Auth::user()->buses))
              @foreach (Auth::user()->buses as $car)
              <li class="col-xl-4 col-lg-5 col-md-12 col-sm-12 gogocar-added-car-li">
                  <div class="personal-car--item gogocar-box">
                      <div class="personal-car--item--left">
                          <div class="personal-car--item--left__top">{{ $car->number }}</div>
                          <div class="personal-car--item--left__bottom">{{ $car->model }}</div>
                      </div>
                      <div class="personal-car--item--right">
                          <a href="{{ route('profile.car.edit', ['locale' => app()->getLocale(), 'id' => $car->id]) }}">
                              <div class="gogocar-gray-icons personal-car--item--setting">
                                  <svg class="icon icon-setting-car ">
                                      <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#setting-car') }}"></use>
                                  </svg>
                              </div>
                          </a>
                          <button titlcar" data-toggle="modal" id="smallButton" data-target="#popup-del-msg-{{$car->id}}">
                            <div class="gogocar-red-icons">
                                <svg class="icon icon-delete2 ">
                                    <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#delete2') }}"></use>
                                </svg>
                            </div>
                        </button>

                        <div class="modal fade" id="popup-del-msg-{{$car->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered popup-modal--wrap" role="document">
                                <div class="modal-content popup-content">
                                    <div class="popup-covid--wrap popup-del-msg">
                                        <h3 class="main-section--title--v2 font-size-25 mb-5">@lang('global.app_delete') машину?</h3>
                                        <form method="POST" action="{!! route('profile.car.destroy', ['locale' => app()->getLocale(), 'id' => $car->id]) !!}" accept-charset="UTF-8">
                                            <input name="_method" value="DELETE" type="hidden">
                                            {{ csrf_field() }}
                                            <div class="delete-chat-msg">
                                                <button type="submit" class="delete-choise-chat-msg gogocar-red-button" title="Delete Car">
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
              </li>
              @endforeach
              @endif
              <li class="col-xl-4 col-lg-5 col-md-12 col-sm-12 gogocar-added-car-li">
                  <a href="{{ route('profile.car.add', ['locale' => app()->getLocale(), 'type' => 'bus']) }}">
                      <div class="personal-car--item--add gogocar-box">
                          <svg class="icon icon-add ">
                              <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#add') }}"></use>
                          </svg>
                          <span class="personal-car--item--add__text">Добавить @lang('front.profile.add_car.bus')</span>
                      </div>
                  </a>
              </li>
          </ul>
      </div>
      {{-- endbus --}}
      <div class="personal-content--header">
          <h3 class="personal-content--header--title">@lang('front.profile.car_tab.my_truck')</h3>
      </div>
      <div class="personal-content--body">
          <ul class="personal-car--list row">
              @if( !is_null(Auth::user()->trucks))
                @foreach (Auth::user()->trucks as $truck)
                <li class="col-xl-4 col-lg-5 col-md-12 col-sm-12 gogocar-added-car-li">
                    <div class="personal-car--item gogocar-box">
                        <div class="personal-car--item--left">
                            <div class="personal-car--item--left__top">{{ $truck->number }}</div>
                            <div class="personal-car--item--left__bottom">{{ $truck->model }}</div>
                        </div>
                        <div class="personal-car--item--right">
                            <a href="{{ route('profile.truck.edit', ['locale' => app()->getLocale(), 'id' => $truck->id]) }}">
                                <div class="gogocar-gray-icons personal-car--item--setting">
                                    <svg class="icon icon-setting-car ">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#setting-car') }}"></use>
                                    </svg>
                                </div>
                            </a>

                            <button title="Delete Car" data-toggle="modal" id="smallButton" data-target="#popup-del-msg-truck-{{$truck->id}}">
                                <div class="gogocar-red-icons">
                                    <svg class="icon icon-delete2 ">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#delete2') }}"></use>
                                    </svg>
                                </div>
                            </button>
    
                            <div class="modal fade" id="popup-del-msg-truck-{{$truck->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered popup-modal--wrap" role="document">
                                    <div class="modal-content popup-content">
                                        <div class="popup-covid--wrap popup-del-msg">
                                            <h3 class="main-section--title--v2 font-size-25 mb-5">@lang('global.app_delete') машину?</h3>
                                            <form method="POST" action="{!! route('profile.truck.destroy', ['locale' => app()->getLocale(), 'id' => $truck->id]) !!}" accept-charset="UTF-8">
                                                <input name="_method" value="DELETE" type="hidden">
                                                {{ csrf_field() }}
                                                <div class="delete-chat-msg">
                                                    <button type="submit" class="delete-choise-chat-msg gogocar-red-button" title="Delete Car">
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
                </li>
                @endforeach
              @endif

              <li class="col-xl-4 col-lg-5 col-md-12 col-sm-12 gogocar-added-car-li">
                  <a href="{{ route('profile.car.add', ['locale' => app()->getLocale(), 'type' => 'truck']) }}">
                      <div class="personal-car--item--add gogocar-box">
                          <svg class="icon icon-add ">
                              <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#add') }}"></use>
                          </svg>
                          <span class="personal-car--item--add__text">Добавить @lang('front.profile.add_car.freight')</span>
                      </div>
                  </a>
              </li>
          </ul>
      </div>
      
  </div>