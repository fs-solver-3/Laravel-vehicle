  <div class="section-bottom-side--mobile__list">
      @if (count($demandStatuses) == 0)
      <div class="panel-body text-center">
          <h4>No data Available.</h4>
      </div>
      @else
        <div class="section-bottom-side--mobile__list">
            <!-- Элемент мобильной таблицы-->
            @foreach($demandStatuses as $demandStatus)
            <div class="section-bottom-side--mobile__item--wrap section-data-container--item">
                <div class="section-bottom-side--mobile__item">
                    <div class="section-bottom-side--mobile__item--name">{{ $demandStatus->name }}</div>
                    <div class="section-bottom-side--mobile__item--attr">
                        <div class="section-tbody--show__popup section-top-added gogocar-arrow-button">
                            <svg class="icon icon-dots ">
                                <use xlink:href="{{ asset('static/img/svg/symbol/sprite_admin.svg#dots') }}"></use>
                            </svg>
                            <div class="section-tbody--modal--table__mobile">
                                <div class="section-tbody--modal--item">
                                    <svg class="icon icon-paper ">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite_admin.svg#paper') }}"></use>
                                    </svg><span>Просмотр</span>
                                </div>
                                <a href="{{ route('admin.demand_status.edit', ['locale' => app()->getLocale(), 'id' => $demandStatus->id]) }}" class="links" title="Edit event">
                                    <div class="section-tbody--modal--item">
                                        <svg class="icon icon-pen ">
                                            <use xlink:href="{{ asset('static/img/svg/symbol/sprite_admin.svg#pen') }}"></use>
                                        </svg><span>Изменить</span>
                                    </div>
                                </a>
                                <div class="section-tbody--modal--item">
                                    <svg class="icon icon-delete-red ">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite_admin.svg#delete-red') }}"></use>
                                    </svg><span>Удалить</span>
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
                        <div class="section-mobile-table--item__left">ID:</div>
                        <div class="section-mobile-table--item__right">{{ $loop->index + 1 }}</div>
                    </li>
                    <li class="section-mobile-table--item">
                        <div class="section-mobile-table--item__left">Сортировка:</div>
                        <div class="section-mobile-table--item__right">{{ $demandStatus->score }}</div>
                    </li>
                    <li class="section-mobile-table--item">
                        <div class="section-mobile-table--item__left">Заголовок:</div>
                        <div class="section-mobile-table--item__right">{{ $demandStatus->name }}</div>
                    </li>
                </ul>
            </div>
            @endforeach

        </div>
      @endif
  </div>