<div class="section-bottom-side--mobile__list">
    <!-- Элемент мобильной таблицы-->
    @foreach ($fastAnswers as $fastAnswer)
        <div class="section-bottom-side--mobile__item--wrap section-data-container--item">
            <div class="section-bottom-side--mobile__item">
                <div class="section-bottom-side--mobile__item--name">{{ $fastAnswer->name }}</div>
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
                            <a href="{{ route('admin.fast_answers.edit', ['locale' => app()->getLocale(), 'id' => $fastAnswer->id]) }}"
                                class="links" title="Edit event">
                                <div class="section-tbody--modal--item">
                                    <svg class="icon icon-pen ">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite_admin.svg#pen') }}">
                                        </use>
                                    </svg><span>@lang('global.app_edit')</span>
                                </div>
                            </a>
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
                            <use xlink:href="{{ asset('static/img/svg/symbol/sprite_admin.svg#arrow-down-mobile') }}">
                            </use>
                        </svg>
                    </div>
                </div>
            </div>
            <ul class="section-bottom-side--mobile__item--content">
                <li class="section-mobile-table--item">
                    <div class="section-mobile-table--item__left">ID:</div>
                    <div class="section-mobile-table--item__right">{{ $loop->index + 1 }}</div>
                </li>
                <li class="section-mobile-table--item">
                    <div class="section-mobile-table--item__left">@lang('global.demand_categories.fields.title'):</div>
                    <div class="section-mobile-table--item__right">{{ $fastAnswer->name }}</div>
                </li>
                <li class="section-mobile-table--item">
                    <div class="section-mobile-table--item__left">@lang('global.fast_answers.fields.demand_category_id'):</div>
                    <div class="section-mobile-table--item__right">{{ optional($fastAnswer->demandCategory)->name }}
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
