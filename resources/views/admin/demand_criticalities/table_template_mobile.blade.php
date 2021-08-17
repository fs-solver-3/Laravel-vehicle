<div class="section-bottom-side--mobile__list">
    @if (count($demandCriticalities) == 0)
    <div class="panel-body text-center">
        <h4>@lang('global.no_data').</h4>
    </div>
    @else
        <div class="section-bottom-side--mobile__list">
            <!-- Элемент мобильной таблицы-->
            @foreach($demandCriticalities as $demandCriticality)
            <div class="section-bottom-side--mobile__item--wrap section-data-container--item">
                <div class="section-bottom-side--mobile__item">
                    <div class="section-bottom-side--mobile__item--name">{{ $demandCriticality->name }}</div>
                    <div class="section-bottom-side--mobile__item--attr">
                        <div class="section-tbody--show__popup section-top-added gogocar-arrow-button">
                            <svg class="icon icon-dots ">
                                <use xlink:href="{{ asset('static/img/svg/symbol/sprite_admin.svg#dots') }}"></use>
                            </svg>
                            <div class="section-tbody--modal--table__mobile">
                                <div class="section-tbody--modal--item">
                                    <svg class="icon icon-paper ">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite_admin.svg#paper') }}"></use>
                                    </svg><span>@lang('global.app_show')</span>
                                </div>
                                <a href="{{ route('admin.demand_criticality.edit', ['locale' => app()->getLocale(), 'id' => $demandCriticality->id]) }}" class="links" title="Edit event">
                                    <div class="section-tbody--modal--item">
                                        <svg class="icon icon-pen ">
                                            <use xlink:href="{{ asset('static/img/svg/symbol/sprite_admin.svg#pen') }}"></use>
                                        </svg><span>@lang('global.app_edit')</span>
                                    </div>
                                </a>
                                <div class="section-tbody--modal--item">
                                    <svg class="icon icon-delete-red ">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite_admin.svg#delete-red') }}"></use>
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
                    <li class="section-mobile-table--item">
                        <div class="section-mobile-table--item__left">@lang('global.id'):</div>
                        <div class="section-mobile-table--item__right">{{ $loop->index + 1 }}</div>
                    </li>
                    <li class="section-mobile-table--item">
                        <div class="section-mobile-table--item__left">@lang('global.demand_criticality.fields.grade'):</div>
                        <div class="section-mobile-table--item__right">{{ $demandCriticality->score }}</div>
                    </li>
                    <li class="section-mobile-table--item">
                        <div class="section-mobile-table--item__left">@lang('global.demand_criticality.fields.title'):</div>
                        <div class="section-mobile-table--item__right">{{ $demandCriticality->name }}</div>
                    </li>
                </ul>
            </div>
            @endforeach

        </div>
    @endif
</div>