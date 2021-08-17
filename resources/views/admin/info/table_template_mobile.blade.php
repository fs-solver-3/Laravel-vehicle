<div class="section-bottom-side--mobile__list">
    <!-- Элемент мобильной таблицы-->
    @if (count($infoObjects) == 0)
    <div class="panel-body text-center">
        <h4>No Review Available.</h4>
    </div>
    @else
    @foreach($infoObjects as $item)
    <div class="section-bottom-side--mobile__item--wrap section-data-container--item">
        <div class="section-bottom-side--mobile__item">
            <div class="section-bottom-side--mobile__item--name">{{ optional($item->writer)->name }}</div>
            <div class="section-bottom-side--mobile__item--attr">
                <div class="section-arrow-mobile-table section-top-added gogocar-arrow-button">
                    <svg class="icon icon-arrow-down-mobile ">
                        <use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#arrow-down-mobile')}}"></use>
                    </svg>
                </div>
            </div>
        </div>
        <ul class="section-bottom-side--mobile__item--content">
            <li class="section-mobile-table--item">
                <div class="section-mobile-table--item__left">@lang('global.id'): <span class="mr-1">{{ $item->id }}</span></div>
            </li>
            <li class="section-mobile-table--item">
                <div class="section-mobile-table--item__left">@lang('global.review.fields.author'): <span class="mr-1">{{ optional($item->writer)->name }}</span></div>
            </li>
            <li class="section-mobile-table--item">
                <div class="section-mobile-table--item__left">@lang('global.review.fields.type'): <span class="mr-1">{{ $item->type }}</span></div>
            </li>
            <li class="section-mobile-table--item">
                <div class="section-mobile-table--item__left">@lang('global.review.fields.comment'): <span class="mr-1">{{ $item->comment }}</span></div>
            </li>
        </ul>
    </div>
    @endforeach
    @endif
</div>
<div class="section-bottom-pagination--wrap mt-20px">
    <!--.section-bottom--delete.gogocar-arrow-button-->
    <!--    +icon('delete')-->
    <div class="section-bottom-pagination"></div>
</div>