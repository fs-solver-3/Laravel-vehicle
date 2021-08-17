<div class="section-bottom-side--mobile__list">
    <!-- Элемент мобильной таблицы-->
    @if(count($listings) == 0)
        <div class="panel-body text-center">
            <h4>@lang('global.no_data').</h4>
        </div>
    @else
        @foreach($listings as $listing)
        <div class="section-bottom-side--mobile__item--wrap section-data-container--item">
            <div class="section-bottom-side--mobile__item">
                <div class="section-bottom-side--mobile__item--name"> Поездка №{{ $listing->id }} от {{ $listing->starting_date }}</div>
                <div class="section-bottom-side--mobile__item--attr">
                    <div class="section-tbody--show__popup section-top-added gogocar-arrow-button">
                        <svg class="icon icon-dots ">
                            <use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#dots')}}"></use>
                        </svg>
                        <div class="section-tbody--modal--table__mobile">
                            <a href="{{ route('admin.listing.show', ['locale' => app()->getLocale(), 'id' => $listing->id]) }}" class="links" title="Show listing">
                                <div class="section-tbody--modal--item">
                                    <svg class="icon icon-paper ">
                                        <use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#paper')}}"></use>
                                    </svg><span>@lang('global.app_view')</span>
                                </div>
                            </a>
                            <a href="{{ route('admin.listing.edit', ['locale' => app()->getLocale(), 'id' => $listing->id]) }}" class="links" title="Edit listing">
                                <div class="section-tbody--modal--item">
                                    <svg class="icon icon-pen ">
                                        <use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#pen')}}"></use>
                                    </svg><span>@lang('global.app_edit')</span>
                                </div>
                            </a>
                            <form method="POST" action="{!! route('admin.listing.destroy', ['locale' => app()->getLocale(), 'id' => $listing->id]) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}
                                <div class="section-tbody--modal--item">
                                    <svg class="icon icon-delete-red ">
                                        <use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#delete-red')}}"></use>
                                    </svg><span>@lang('global.app_delete')</span>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="section-arrow-mobile-table section-top-added gogocar-arrow-button view_content_mobile">
                        <svg class="icon icon-arrow-down-mobile ">
                            <use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#arrow-down-mobile')}}"></use>
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
                    <div class="section-mobile-table--item__left">@lang('global.listing.fields.date'):</div>
                    <div class="section-mobile-table--item__right">{{ $listing->starting_date }}</div>
                </li>
                <li class="section-mobile-table--item">
                    <div class="section-mobile-table--item__left">@lang('global.listing.fields.author'):</div>
                    <div class="section-mobile-table--item__right"><a class="color-yellow" href="{{ route('admin.users.edit', ['locale' => app()->getLocale(), 'id' => optional($listing->user)->id, 'tab' => 'main']) }}">{{ optional($listing->user)->name }}</a></div>
                </li>
                <li class="section-mobile-table--item">
                    <div class="section-mobile-table--item__left">@lang('global.listing.fields.location'):</div>
                    <div class="section-mobile-table--item__right">{{ optional($listing->location_address)->city }} {{ optional($listing->location_address)->street }} {{ optional($listing->location_address)->district }}</div>
                </li>
                <li class="section-mobile-table--item">
                    <div class="section-mobile-table--item__left">@lang('global.listing.fields.destination'):</div>
                    <div class="section-mobile-table--item__right">{{ optional($listing->destination_address)->city }}
                        {{ optional($listing->destination_address)->street }}
                        {{ optional($listing->destination_address)->district }}</div>
                </li>
                <li class="section-mobile-table--item">
                    <div class="section-mobile-table--item__left">@lang('global.listing.fields.passenger_number'):</div>
                    <div class="section-mobile-table--item__right">{{ $listing->max_occupants }}</div>
                </li>
                <li class="section-mobile-table--item">
                    <div class="section-mobile-table--item__left">@lang('global.listing.fields.car'):</div>
                    <div class="section-mobile-table--item__right">{{ optional($listing->car)->name }}</div>
                </li>
                <li class="section-mobile-table--item">
                    <div class="section-mobile-table--item__left">@lang('global.listing.fields.truck'):</div>
                    <div class="section-mobile-table--item__right">{{ optional($listing->truck)->name }}</div>
                </li>
                <li class="section-mobile-table--item">
                    <div class="section-mobile-table--item__left">@lang('global.listing.fields.collection') (UZS):</div>
                    <div class="section-mobile-table--item__right">{{ $listing->price_per_seat }}</div>
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
{{-- <script>

    $('.view_content_mobile').click(function () {console.log('sdf');
        console.log($(this).parents('ul'));
    });
</script> --}}