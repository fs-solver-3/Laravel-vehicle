 <section class="section-2 section-content-main--table">
     <div class="section-content--main__wrap box-bg2">
         <div class="section-content--main">
             <div class="section-top-side">
                 <div class="section-block-title-question">
                     <div class="section-block--title">Операции</div>
                     <div class="section-block--question">
                         <svg class="icon icon-question ">
                             <use xlink:href="{{ asset('static/img/svg/symbol/sprite_admin.svg#question') }}"></use>
                         </svg>
                         <div class="section-block--question__content">
                             <div class="section-block--question__title">Статус обращения:</div>
                             <ul class="section-block--question__list">
                                 <li class="section-block--question__li">
                                     <div class="section-status-block status-red"></div>
                                     <p>последний раз в обращение писал клиент техподдержки (вы ответственный)</p>
                                 </li>
                                 <li class="section-block--question__li">
                                     <div class="section-status-block status-yellow"></div>
                                     <p>последний раз в обращение писал клиент техподдержки (вы не ответственный)</p>
                                 </li>
                                 <li class="section-block--question__li">
                                     <div class="section-status-block status-green"></div>
                                     <p>последний раз в обращение писали вы</p>
                                 </li>
                                 <li class="section-block--question__li">
                                     <div class="section-status-block status-green">s</div>
                                     <p>последний раз в обращение писал сотрудник техподдержки</p>
                                 </li>
                                 <li class="section-block--question__li">
                                     <div class="section-status-block status-gray"></div>
                                     <p>обращение закрыто</p>
                                 </li>
                             </ul>
                         </div>
                     </div>
                 </div>
                 {{-- <div class="filter-side--right">
                     <div class="section-top-added gogocar-arrow-button">
                         <svg class="icon icon-plus ">
                             <use xlink:href="{{ asset('static/img/svg/symbol/sprite_admin.svg#plus') }}"></use>
                         </svg>
                     </div>
                 </div> --}}
             </div>
             <div class="section-bottom-side--scroll">
                 <table class="section-table">
                     <thead>
                         <tr>
                             <th>
                                 <div class="section-thead-checkbox__input" id="check-all">
                                     <input class="section-thead-checkbox" type="checkbox">
                                 </div>
                             </th>
                             <th class="section-thead--icon">
                                 <svg class="icon icon-settings ">
                                     <use xlink:href="{{ asset('static/img/svg/symbol/sprite_admin.svg#settings') }}"></use>
                                 </svg>
                             </th>
                             <th>ID</th>
                             <th>Индикатор</th>
                             <th>Заголовок</th>
                             <th>Автор</th>
                             <th>Срочность ответа</th>
                             <th>Сообщение</th>
                             <th>Уровень</th>
                             <th>Ответственный</th>
                             <th>Крайний срок</th>
                         </tr>
                     </thead>
                     <tbody class="section-data-container">
                         @foreach($appealObjects as $item)
                         <tr class="section-data-container--item">
                             <td>
                                 <div class="section-body-checkbox__input">
                                     <input class="section-body-checkbox" type="checkbox">
                                 </div>
                             </td>
                             <td class="section-tbody--icon section-tbody--show__popup">
                                 <svg class="icon icon-burger ">
                                     <use xlink:href="{{ asset('static/img/svg/symbol/sprite_admin.svg#burger') }}"></use>
                                 </svg>
                                 <div class="section-tbody--modal--table">
                                     <div class="section-tbody--modal--item">
                                         <a href="{{ route('admin.support.chat', ['locale' => app()->getLocale(), 'id' => $item->id]) }}" class="links"
                                            title="Show messages">
                                         <svg class="icon icon-chat ">
                                             <use xlink:href="{{ asset('static/img/svg/symbol/sprite_admin.svg#chat') }}"></use>
                                         </svg>
                                         <span>Сообщения</span>
                                        </a>
                                     </div>
                                     <div class="section-tbody--modal--item">
                                         <a href="{{ route('admin.demand.edit', ['locale' => app()->getLocale(), 'id' => $item->id]) }}" class="links"
                                            title="edit demand">
                                         <svg class="icon icon-pen ">
                                             <use xlink:href="{{ asset('static/img/svg/symbol/sprite_admin.svg#pen') }}"></use>
                                         </svg><span>Изменить</span>
                                         </a>
                                     </div>
                                 </div>
                             </td>
                             <td>{{ $loop->index + 1 }}</td>
                             <td>
                                  @switch($item->indicator())

                                  @case(1)
                                  <img src='{{asset("admin/red-circle-big.svg")}}'>
                                  @break
                                  @case(2)
                                  <img src='{{asset("admin/yellow-circle.svg")}}'>

                                  @break
                                  @case(3)
                                  <img src='{{asset("admin/green-circle-big.svg")}}'>

                                  @break
                                  @case(4)
                                  <div class="section-status-block status-green">s</div>

                                  @break
                                  @case(5)
                                  <img src='{{asset("admin/grey-circle-big.svg")}}'>

                                  @break
                                  @default
                                  <img src='{{asset("admin/red-circle-big.svg")}}'>

                                  @endswitch
                             </td>
                             <td>{{ $item->name }}</td>
                             <td>
                                 <div class="section-author--info">
                                     <div class="section-author--info_1">{{date('d.m.yy h:i',strtotime($item->created_at))}}</div>
                                     <div class="section-author--info_2"><span>[2]</span>
                                         <div class="section-author--info_2__text">(dev) {{ optional($item->user)->name }}</div>
                                     </div>
                                 </div>
                             </td>
                             <td>{{date('d.m.yy h:i',strtotime($item->created_at))}}</td>
                             <td>1</td>
                             <td>По умолчанию</td>
                             <td>{{ optional($item->support)->name }}</td>
                             <td>{{date('d.m.yy',strtotime($item->created_at))}}</td>
                         </tr>
                         @endforeach
                     </tbody>
                 </table>
             </div>
             <div class="section-bottom-pagination--wrap">
                 <div class="section-bottom--delete gogocar-arrow-button">
                     <svg class="icon icon-delete ">
                         <use xlink:href="{{ asset('static/img/svg/symbol/sprite_admin.svg#delete') }}"></use>
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
             <div class="section-top-side box-bg-mobile2">
                 <div class="section-block-title-question">
                     <div class="section-block--title">Операции</div>
                     <div class="section-block--question">
                         <svg class="icon icon-question ">
                             <use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#question')}}"></use>
                         </svg>
                         <div class="section-block--question__content">
                             <div class="section-block--question__title">Статус обращения:</div>
                             <ul class="section-block--question__list">
                                 <li class="section-block--question__li">
                                     <div class="section-status-block status-red"></div>
                                     <p>последний раз в обращение писал клиент техподдержки (вы ответственный)</p>
                                 </li>
                                 <li class="section-block--question__li">
                                     <div class="section-status-block status-yellow"></div>
                                     <p>последний раз в обращение писал клиент техподдержки (вы не ответственный)</p>
                                 </li>
                                 <li class="section-block--question__li">
                                     <div class="section-status-block status-green"></div>
                                     <p>последний раз в обращение писали вы</p>
                                 </li>
                                 <li class="section-block--question__li">
                                     <div class="section-status-block status-green">s</div>
                                     <p>последний раз в обращение писал сотрудник техподдержки</p>
                                 </li>
                                 <li class="section-block--question__li">
                                     <div class="section-status-block status-gray"></div>
                                     <p>обращение закрыто</p>
                                 </li>
                             </ul>
                         </div>
                     </div>
                 </div>
                 <div class="filter-side--right">
                     <div class="section-top-added gogocar-arrow-button">
                         <svg class="icon icon-plus ">
                             <use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#plus')}}"></use>
                         </svg>
                     </div>
                 </div>
             </div>
             <div class="section-bottom-side--mobile__list">
                 <!-- Элемент мобильной таблицы-->
                 @foreach($appealObjects as $item)
                 <div class="section-bottom-side--mobile__item--wrap section-data-container--item">
                     <div class="section-bottom-side--mobile__item">
                         <div class="d-flex align-items-center">
                             <div class="section-status-block status-yellow mr-7"></div>
                             <div class="section-bottom-side--mobile__item--name">{{ $item->name }}</div>
                         </div>
                         <div class="section-bottom-side--mobile__item--attr">
                             <div class="section-tbody--show__popup section-top-added gogocar-arrow-button">
                                 <svg class="icon icon-dots ">
                                     <use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#dots')}}"></use>
                                 </svg>
                                 <div class="section-tbody--modal--table__mobile">
                                     <div class="section-tbody--modal--item">
                                         <a href="{{ route('admin.support.chat', ['locale' => app()->getLocale(), 'id' => $item->id]) }}" class="links"
                                            title="Show messages">
                                         <svg class="icon icon-chat ">
                                             <use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#chat')}}"></use>
                                         </svg><span>Сообщения</span>
                                         </a>
                                     </div>
                                     <div class="section-tbody--modal--item">
                                         <svg class="icon icon-pen ">
                                             <use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#pen')}}"></use>
                                         </svg><span>Изменить</span>
                                     </div>
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
                             <div class="section-mobile-table--item__left">ID:</div>
                             <div class="section-mobile-table--item__right">{{ $item->id }}</div>
                         </li>
                         <li class="section-mobile-table--item align-items-center">
                             <div class="section-mobile-table--item__left">Индикатор:</div>
                             @switch($item->indicator())

                             @case(1)
                             <img src='{{asset("admin/red-circle-big.svg")}}'>
                             @break
                             @case(2)
                             <img src='{{asset("admin/yellow-circle.svg")}}'>

                             @break
                             @case(3)
                             <img src='{{asset("admin/green-circle-big.svg")}}'>

                             @break
                             @case(4)
                             <img src='{{asset("admin/s-circle.png")}}' width='20' height='20'>

                             @break
                             @case(5)
                             <img src='{{asset("admin/grey-circle-big.svg")}}'>

                             @break
                             @default
                             <img src='{{asset("admin/red-circle-big.svg")}}'>

                             @endswitch
                             @switch($item->indicator())

                                  @case(1)
                                  <img src='{{asset("admin/red-circle-big.svg")}}'>
                                  @break
                                  @case(2)
                                  <img src='{{asset("admin/yellow-circle.svg")}}'>

                                  @break
                                  @case(3)
                                  <img src='{{asset("admin/green-circle-big.svg")}}'>

                                  @break
                                  @case(4)
                                  <div class="section-status-block status-green">s</div>
                                  @break
                                  @case(5)
                                  <img src='{{asset("admin/grey-circle-big.svg")}}'>

                                  @break
                                  @default
                                  <img src='{{asset("admin/red-circle-big.svg")}}'>

                                  @endswitch
                         </li>
                         <li class="section-mobile-table--item">
                             <div class="section-mobile-table--item__left">Заголовок:</div>
                             <div class="section-mobile-table--item__right">{{ $item->name }}</div>
                         </li>
                         <li class="section-mobile-table--item">
                             <div class="section-mobile-table--item__left">Автор:<span class="section-author--info_1 ml-1">17.05.2020 21:59:45<span class="ml-1">[2]</span>
                                     <div class="section-author--info_2__text">(dev) {{ optional($item->user)->name }}</div>
                                 </span></div>
                         </li>
                         <li class="section-mobile-table--item">
                             <div class="section-mobile-table--item__left">Срочность ответа:</div>
                             <div class="section-mobile-table--item__right">{{date('d.m.yy h:mm',strtotime($item->created_at))}}</div>
                         </li>
                         <li class="section-mobile-table--item">
                             <div class="section-mobile-table--item__left">Сообщение:</div>
                             <div class="section-mobile-table--item__right">1</div>
                         </li>
                         <li class="section-mobile-table--item">
                             <div class="section-mobile-table--item__left">Уровень:</div>
                             <div class="section-mobile-table--item__right">{{ optional($item->support)->name }}</div>
                         </li>
                         <li class="section-mobile-table--item">
                             <div class="section-mobile-table--item__left">Крайний срок:</div>
                             <div class="section-mobile-table--item__right">{{date('d.m.yy',strtotime($item->created_at))}}</div>
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
  <style>
      .datatable .dropdown-menu {
        z-index: 11111;
        background-image: none;
        background-color: transparent;
        background-position: center;
        background-size: cover;
        background-repeat: no-repeat;
        border: none;
        -webkit-box-shadow: none;
        box-shadow: none;
        left: -15px;
        top: 42px;
        background: #3F4451;
        height: auto !important;
        width: 240px ;
      }
      .datatable .dropdown-menu::before {
        content: "";
        border-left: 10px solid transparent;
        border-right: 10px solid transparent;
        border-bottom: 20px solid #3F4451;
        left: 15px;
        top: -20px;
        position: absolute;
        width: 0;
        height: 0;
      }
      .datatable .dropdown-menu .btn-group {
        position: relative;
        top: 0px;
        left: -20px;
      }
  </style>