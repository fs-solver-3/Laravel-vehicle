<section class="section-2 section-content-main--table">
    <div class="section-content--main__wrap box-bg2">
        <div class="section-content--main">
            <div class="section-bottom-side--scroll border-none">
                @if(count($results) > 0)
                <table class="section-table">
                    <thead class="section-thead-report-pp">
                        <tr>
                            <th></th>
                            <th>Пользователь</th>
                            <th>Поездка</th>
                            <th>Статус отзыва</th>
                        </tr>
                    </thead>
                    <tbody class="section-data-container">
                        @foreach ($results as $item)     
                            <tr class="section-data-container--item">
                                <td class="section-tbody--icon section-tbody--show__popup section-report-popup-td">
                                    <svg class="icon icon-burger ">
                                        <use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#burger')}}"></use>
                                    </svg>
                                    <div class="section-tbody--modal--table">
                                        <a href="{{ route('admin.listing.show', ['locale' => app()->getLocale(), 'id' => $item->listing_id]) }}"
                                            class="links" title="Show listing">
                                            <div class="section-tbody--modal--item">
                                                <svg class="icon icon-paper ">
                                                    <use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#paper')}}"></use>
                                                </svg><span>@lang('global.app_view')</span>
                                            </div>
                                        </a>
                                        @if($item->count > 0)
                                        <a href="{{ route('admin.dashboard.reviewShow', ['locale' => app()->getLocale(), 'id' => $item->listing_id]) }}"
                                            class="links" title="show review">
                                            <div class="section-tbody--modal--item">
                                                <svg class="icon icon-eye ">
                                                    <use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#eye')}}"></use>
                                                </svg><span>Опубликовать</span>
                                            </div>
                                        </a>
                                        @endif
                                        <a href="{{ route('admin.listing.edit', ['locale' => app()->getLocale(), 'id' => $item->listing_id]) }}"
                                            class="links" title="Edit listing">
                                            <div class="section-tbody--modal--item">
                                                <svg class="icon icon-pen ">
                                                    <use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#pen')}}"></use>
                                                </svg><span>@lang('global.app_edit')</span>
                                            </div>
                                        </a>
                                        <form method="POST"
                                            action="{!! route('admin.listing.destroy', ['locale' => app()->getLocale(), 'id' => $item->listing_id]) !!}"
                                            accept-charset="UTF-8">
                                            <input name="_method" value="DELETE" type="hidden">
                                            {{ csrf_field() }}
                                            <button type="submit" title="Delete trip"
                                                onclick="return confirm(&quot;Click Ok to delete trip.&quot;)">
                                                <div class="section-tbody--modal--item">
                                                    <svg class="icon icon-delete-red ">
                                                        <use
                                                            xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#delete-red')}}">
                                                        </use>
                                                    </svg><span>@lang('global.app_delete')</span>
                                                </div>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                                <td>{{ $item->user_name }}</td>
                                <td>{{ $item->from_full }} - {{ $item->to_full }}</td>
                                <td>
                                    @if($item->count > 0)
                                    Оставлен ({{$item->count}})
                                    @else
                                    Не оставлен
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @else
                    <div class="panel-body text-center">
                        <p>@lang('global.no_data').</p>
                    </div>
                @endif
            </div>
            <div class="section-bottom-pagination--wrap">
                <div class="section-bottom--delete gogocar-arrow-button">
                    <svg class="icon icon-delete ">
                        <use xlink:href="static/img/svg/symbol/sprite.svg#delete"></use>
                    </svg>
                </div>
                <div class="section-bottom-pagination"></div>
            </div>
        </div>
    </div>
</section>
<!-- .section-content-main--table-->
<section class="section3 section-content-main-mobile--table">
    <div class="section-content--main-mobile__wrap">
        <div class="section-content--main box-bg2 pb-20px">
            <div class="section-bottom-side--mobile__list">
                @foreach ($results as $item) 
                <!-- Элемент мобильной таблицы-->
                <div class="section-bottom-side--mobile__item--wrap section-data-container--item">
                    <div class="section-bottom-side--mobile__item">
                        <div class="section-bottom-side--mobile__item--name">{{ $item->user_name }}</div>
                        <div class="section-bottom-side--mobile__item--attr">
                            <div class="section-tbody--show__popup section-top-added gogocar-arrow-button">
                                <svg class="icon icon-dots ">
                                    <use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#dots')}}"></use>
                                </svg>
                                <div class="section-tbody--modal--table__mobile">
                                    <a href="{{ route('admin.listing.show', ['locale' => app()->getLocale(), 'id' => $item->listing_id]) }}"
                                            class="links" title="Show listing">
                                            <div class="section-tbody--modal--item">
                                                <svg class="icon icon-paper ">
                                                    <use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#paper')}}"></use>
                                                </svg><span>@lang('global.app_view')</span>
                                            </div>
                                        </a>
                                        @if($item->count > 0)
                                        <a href="{{ route('admin.dashboard.reviewShow', ['locale' => app()->getLocale(), 'id' => $item->listing_id]) }}"
                                            class="links" title="show review">
                                            <div class="section-tbody--modal--item">
                                                <svg class="icon icon-eye ">
                                                    <use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#eye')}}"></use>
                                                </svg><span>Опубликовать</span>
                                            </div>
                                        </a>
                                        @endif
                                        <a href="{{ route('admin.listing.edit', ['locale' => app()->getLocale(), 'id' => $item->listing_id]) }}"
                                            class="links" title="Edit listing">
                                            <div class="section-tbody--modal--item">
                                                <svg class="icon icon-pen ">
                                                    <use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#pen')}}"></use>
                                                </svg><span>@lang('global.app_edit')</span>
                                            </div>
                                        </a>
                                        <form method="POST"
                                            action="{!! route('admin.listing.destroy', ['locale' => app()->getLocale(), 'id' => $item->listing_id]) !!}"
                                            accept-charset="UTF-8">
                                            <input name="_method" value="DELETE" type="hidden">
                                            {{ csrf_field() }}
                                            <button type="submit" title="Delete trip"
                                                onclick="return confirm(&quot;Click Ok to delete trip.&quot;)">
                                                <div class="section-tbody--modal--item">
                                                    <svg class="icon icon-delete-red ">
                                                        <use
                                                            xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#delete-red')}}">
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
                        <li class="section-mobile-table--item">
                            <div class="section-mobile-table--item__left">Пользователь:</div>
                            <div class="section-mobile-table--item__right">
                                <a class="color-yellow" href="/">{{ $item->user_name }}</a></div>
                        </li>
                        <li class="section-mobile-table--item">
                            <div class="section-mobile-table--item__left">Поездка:</div>
                            <div class="section-mobile-table--item__right">{{ $item->from_full }} - {{ $item->to_full }}</div>
                        </li>
                        <li class="section-mobile-table--item">
                            <div class="section-mobile-table--item__left">Статус отзыва:</div>
                            <div class="section-mobile-table--item__right">@if($item->count > 0)
                                Оставлен ({{$item->count}})
                                @else
                                Не оставлен
                                @endif
                            </div>
                        </li>
                    </ul>
                </div>
                @endforeach
            </div>
            <div class="section-bottom-pagination--wrap">
                <!--.section-bottom--delete.gogocar-arrow-button-->
                <!--    +icon('delete')-->
                <div class="section-bottom-pagination"></div>
            </div>
        </div>
    </div>
</section>