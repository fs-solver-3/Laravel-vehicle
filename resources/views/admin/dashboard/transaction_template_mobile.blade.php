<div class="section-bottom-side--mobile__list">
    <!-- Элемент мобильной таблицы-->
    @foreach ($withdraws as $item)
    <div class="section-bottom-side--mobile__item--wrap section-data-container--item">
        <div class="section-bottom-side--mobile__item">
            <div class="section-bottom-side--mobile__item--name">{{ $item->user->name }}</div>
            <div class="section-bottom-side--mobile__item--attr">
                <div class="section-tbody--show__popup section-top-added gogocar-arrow-button">
                    <svg class="icon icon-dots ">
                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite_admin.svg#dots') }}"></use>
                    </svg>
                    <div class="section-tbody--modal--table__mobile">
                        <div class="section-tbody--modal--item">
                            <svg class="icon icon-paper ">
                                <use xlink:href="{{ asset('static/img/svg/symbol/sprite_admin.svg#paper') }}"></use>
                            </svg><span>@lang('global.app_view')</span>
                        </div>
                        <div class="section-tbody--modal--item">
                            <svg class="icon icon-pen ">
                                <use xlink:href="{{ asset('static/img/svg/symbol/sprite_admin.svg#pen') }}"></use>
                            </svg><span>@lang('global.app_edit')</span>
                        </div>
                        <div class="section-tbody--modal--item">
                            <svg class="icon icon-delete-red ">
                                <use xlink:href="{{ asset('static/img/svg/symbol/sprite_admin.svg#delete-red') }}">
                                </use>
                            </svg><span>@lang('global.app_delete')</span>
                        </div>
                    </div>
                </div>
                <div class="section-arrow-mobile-table section-top-added gogocar-arrow-button">
                    <svg class="icon icon-arrow-down-mobile ">
                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite_admin.svg#arrow-down-mobile') }}"></use>
                    </svg>
                </div>
            </div>
        </div>
        <ul class="section-bottom-side--mobile__item--content">
            <li class="section-mobile-table--item" style="align-items:center;">
                <div class="section-mobile-table--item__left">@lang('global.transactions.fields.block'):</div>
                <div class="section-mobile-table--item__right">
                    <div class="section-body-checkbox__input__off">
                        <input class="section-body-checkbox__off" type="checkbox">
                    </div>
                </div>
            </li>
            <li class="section-mobile-table--item">
                <div class="section-mobile-table--item__left">@lang('global.transactions.fields.user'):</div>
                <div class="section-mobile-table--item__right"><a class="color-yellow"
                        href="/">{{ $item->user->name }}</a></div>
            </li>
            <li class="section-mobile-table--item">
                <div class="section-mobile-table--item__left">@lang('global.transactions.fields.amount'):</div>
                <div class="section-mobile-table--item__right">{{ $item->amount }} UZS</div>
            </li>
            <li class="section-mobile-table--item">
                <div class="section-mobile-table--item__left">@lang('global.transactions.fields.date'):</div>
                <div class="section-mobile-table--item__right">{{date('d.m.yy',strtotime($item->created_at))}}</div>
            </li>
            <li class="section-mobile-table--item">
                <div class="section-mobile-table--item__left">@lang('global.transactions.fields.amount'):</div>
                <div class="section-mobile-table--item__right">{{ $item->amount }} UZS</div>
            </li>
            <li class="section-mobile-table--item">
                <div class="section-mobile-table--item__left">@lang('global.transactions.fields.status'):</div>
                <div class="section-mobile-table--item__right">{{ $item->status }}</div>
            </li>
            <li class="section-mobile-table--item">
                <div class="section-mobile-table--item__left">@lang('global.transactions.fields.method'):</div>
                <div class="section-mobile-table--item__right">{{ $item->method }}</div>
            </li>
        </ul>
    </div>
    @endforeach
    <!-- Элемент мобильной таблицы-->
</div>
<div class="section-bottom-pagination--wrap">
    <!--.section-bottom--delete.gogocar-arrow-button-->
    <!--    +icon('delete')-->
    <div class="section-bottom-pagination"></div>
</div>