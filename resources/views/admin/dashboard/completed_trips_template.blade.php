<section class="section-2 section-content-main--table">
    <div class="section-content--main__wrap box-bg2">
        <div class="section-content--main">
            <div class="section-bottom-side--scroll border-none">
                @if(count($listings) == 0)
                    <div class="panel-body text-center">
                        <p>@lang('global.no_data').</p>
                    </div>
                @else
                <table class="section-table">
                    <thead class="section-thead-report-pp">
                        <tr>
                            <th>Пользователь</th>
                            <th>Всего поездок</th>
                            <th>Завершено</th>
                        </tr>
                    </thead>
                    <tbody class="section-data-container">
                        @foreach ($listings as $item)
                            <tr class="section-data-container--item">
                                <td>{{ $item['user_name']}}</td>
                                <td>{{ $item['total']}}</td>
                                <td>{{ $item['completed']}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @endif
            </div>
            <div class="section-bottom-pagination--wrap">
                {{-- <div class="section-bottom--delete gogocar-arrow-button">
                    <svg class="icon icon-delete ">
                        <use xlink:href="static/img/svg/symbol/sprite.svg#delete"></use>
                    </svg>
                </div> --}}
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
                <!-- Элемент мобильной таблицы-->

                @foreach ($listings as $item)    
                    <div class="section-bottom-side--mobile__item--wrap section-data-container--item">
                        <div class="section-bottom-side--mobile__item">
                            <div class="section-bottom-side--mobile__item--name">{{ $item['user_name']}}</div>
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
                                <div class="section-mobile-table--item__left">Пользователь:</div>
                                <div class="section-mobile-table--item__right">
                                    {{ $item['user_name']}}</div>
                            </li>
                            <li class="section-mobile-table--item">
                                <div class="section-mobile-table--item__left">Всего поездок:</div>
                                <div class="section-mobile-table--item__right">{{ $item['total']}}</div>
                            </li>
                            <li class="section-mobile-table--item">
                                <div class="section-mobile-table--item__left">Завершено:</div>
                                <div class="section-mobile-table--item__right">{{ $item['completed']}}</div>
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