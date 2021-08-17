<div class="section-top-side">
    <div class="section-block--title">Операции</div>
</div>
<div class="section-bottom-side--scroll">
    @if(count($transactions) == 0)
    <div class="panel-body text-center">
        <h4>@lang('global.no_data')</h4>
    </div>
    @else
    <table class="section-table" id="tblMain">
        <thead>
            <tr>
                <th>
                    <div class="section-thead-checkbox__input" id="check-all">
                        <input class="section-thead-checkbox" type="checkbox">
                    </div>
                </th>
                <th class="section-thead--icon">
                    <svg class="icon icon-settings ">
                        <use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#settings')}}"></use>
                    </svg>
                </th>
                <th>Отклонить</th>
                <th>Пользователь</th>
                <th>Сумма</th>
                <th>Дата</th>
                {{-- <th>Назначение платежа</th> --}}
                <th>Вид операции:</th>
                <th>Статус</th>
                <th>Комментарий</th>
                <th>Метод</th>
            </tr>
        </thead>
        <tbody class="section-data-container">
            @foreach ($transactions as $item)
            <tr class="section-data-container--item">
                <td>
                    <div class="section-body-checkbox__input">
                        <input class="section-body-checkbox" type="checkbox">
                    </div>
                </td>
                <td class="section-tbody--icon section-tbody--show__popup">
                    <svg class="icon icon-burger ">
                        <use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#burger')}}"></use>
                    </svg>
                    <div class="section-tbody--modal--table">
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
                </td>
                <td>
                    @if($item->type == 'withdraw')
                    <div class="section-body-checkbox__input__off">
                        <input class="section-body-checkbox__off" type="checkbox">
                    </div>
                    @endif
                </td>
                <td>{{$item->user->name}}</td>
                <td>{{$item->amount}} UZS</td>
                <td>{{$item->created_at}}</td>
                {{-- <td>Facilisis etiam.</td> --}}
                <td>
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
                </td>
                <td>{{$item->state}}</td>
                <td>{{$item->comment}}</td>
                <td>{{$item->method}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
</div>
<div class="section-bottom-pagination--wrap">
    <div class="section-bottom--delete gogocar-arrow-button">
        <svg class="icon icon-delete ">
            <use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#delete')}}"></use>
        </svg>
    </div>
    <div class="section-bottom-pagination"></div>
</div>