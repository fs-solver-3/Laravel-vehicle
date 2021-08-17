<div class="section-top-side box-bg-mobile2">
    <div class="section-block--title">Пользователи</div>
</div>
<div class="section-bottom-side--mobile__list">
    @if(count($transactions) == 0)
    <div class="panel-body text-center">
        <h4>@lang('global.no_data')</h4>
    </div>
    @else
    @foreach ($transactions as $item)
    <div class="section-bottom-side--mobile__item--wrap section-data-container--item">
        <div class="section-bottom-side--mobile__item">
            <div class="section-bottom-side--mobile__item--name">one</div>
            <div class="section-bottom-side--mobile__item--attr">
                <div class="section-tbody--show__popup section-top-added gogocar-arrow-button">
                    <svg class="icon icon-dots ">
                        <use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#dots')}}"></use>
                    </svg>
                    <div class="section-tbody--modal--table__mobile">
                        <a href="{{ route('admin.transactions.show', ['locale' => app()->getLocale(), 'id' => $item->id]) }}"
                            class="links" title="Show transaction">
                            <div class="section-tbody--modal--item">
                                <svg class="icon icon-paper ">
                                    <use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#paper')}}">
                                    </use>
                                </svg><span>Просмотр</span>
                            </div>
                        </a>
                        <a href="{{ route('admin.transactions.edit', ['locale' => app()->getLocale(), 'id' => $item->id]) }}"
                            class="links" title="Edit transaction">
                            <div class="section-tbody--modal--item">
                                <svg class="icon icon-pen ">
                                    <use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#pen')}}">
                                    </use>
                                </svg><span>Изменить</span>
                            </div>
                        </a>
                        <form method="POST"
                            action="{!! route('admin.transactions.destroy', ['locale' => app()->getLocale(), 'id' => $item->id]) !!}"
                            accept-charset="UTF-8">
                            <input name="_method" value="DELETE" type="hidden">
                            {{ csrf_field() }}
                            <button type="submit" title="Delete trip" onclick="return confirm(&quot;Click Ok to delete Transaction .&quot;)">
                                <div class="section-tbody--modal--item">
                                    <svg class="icon icon-delete-red ">
                                        <use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#delete-red')}}">
                                        </use>
                                    </svg><span>@lang('global.app_delete')</span>
                                </div>
                            </button>
                        </form>
                    </div>
                </div>
                <div class="section-arrow-mobile-table section-top-added gogocar-arrow-button">
                    <svg class="icon icon-arrow-down-mobile ">
                        <use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#arrow-down-mobile')}}"></use>
                    </svg>
                </div>
            </div>
        </div>
        <ul class="section-bottom-side--mobile__item--content">
            <li class="section-mobile-table--item" style="align-items:center;">
                <div class="section-mobile-table--item__left">Отклонить:</div>
                <div class="section-mobile-table--item__right">
                    <div class="section-body-checkbox__input__off">
                        <input class="section-body-checkbox__off" type="checkbox">
                    </div>
                </div>
            </li>
            <li class="section-mobile-table--item">
                <div class="section-mobile-table--item__left">Пользователь:</div>
                <div class="section-mobile-table--item__right">{{$item->user->name}}</div>
            </li>
            <li class="section-mobile-table--item">
                <div class="section-mobile-table--item__left">Сумма:</div>
                <div class="section-mobile-table--item__right">{{$item->amount}} UZS</div>
            </li>
            <li class="section-mobile-table--item">
                <div class="section-mobile-table--item__left">Дата:</div>
                <div class="section-mobile-table--item__right">{{$item->created_at}}</div>
            </li>
            {{-- <li class="section-mobile-table--item">
                <div class="section-mobile-table--item__left">Назначение платежа:</div>
                <div class="section-mobile-table--item__right">Facilisis etiam.</div>
            </li> --}}
            <li class="section-mobile-table--item">
                <div class="section-mobile-table--item__left">Вид операции:</div>
                <div class="section-mobile-table--item__right">
                    @switch($item->type)
                        @case('book')
                            книга
                            @break
                        @case('withdraw')
                            изымать
                            @break
                        @case('charged from paypal')
                            взимается с PayPal
                            @break
                        @case('charged for booking')
                            взимается за бронирование
                            @break
                        @default
                            {{ $item->type }} 
                    @endswitch
                </div>
            </li>
            <li class="section-mobile-table--item">
                <div class="section-mobile-table--item__left">Статус:</div>
                <div class="section-mobile-table--item__right">{{$item->state}}</div>
            </li>
            <li class="section-mobile-table--item">
                <div class="section-mobile-table--item__left">Комментарий: <span>{{$item->comment}}</span></div>
            </li>
            <li class="section-mobile-table--item">
                <div class="section-mobile-table--item__left">Метод:</div>
                <div class="section-mobile-table--item__right">{{$item->method}}</div>
            </li>
        </ul>
    </div>
    @endforeach
    @endif
</div>
<div class="section-bottom-pagination--wrap">
    <!--.section-bottom--delete.gogocar-arrow-button-->
    <!--    +icon('delete')-->
    <div class="section-bottom-pagination"></div>
</div>