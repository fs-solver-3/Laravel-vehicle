<section class="section-2 section-content-main--table">
    <div class="section-content--main__wrap box-bg2">
        <div class="section-content--main">
            <div class="section-bottom-side--scroll border-none">
                @if(count($withdrawObjects) == 0)
                <div class="panel-body text-center">
                    <h4>@lang('global.no_data').</h4>
                </div>
                @else
                <table class="section-table">
                    <thead class="section-thead-report-pp">
                        <tr>
                            <th>@lang('global.users.title')</th>
                            <th>@lang('global.dashboard_all.amount')</th>
                            <th>@lang('global.date')</th>
                        </tr>
                    </thead>
                    
                    <tbody class="section-data-container">
                        @foreach ($withdrawObjects as $item)
                        <tr class="section-data-container--item">
                            <td><a class="color-yellow" href="/">{{ $item->user->name }}</a></td>
                            <td>{{ $item->amount }} UZS</td>
                            <td>{{date('d.m.yy',strtotime($item->created_at))}}</td>
                        </tr>
                        @endforeach
                    </table>
                </tbody>
                @endif
            </div>
            {{-- <div class="section-bottom-pagination--wrap">
                <div class="section-bottom--delete gogocar-arrow-button">
                    <svg class="icon icon-delete ">
                        <use xlink:href="static/img/svg/symbol/sprite.svg#delete"></use>
                    </svg>
                </div>
                <div class="section-bottom-pagination"></div>
            </div> --}}
        </div>
    </div>
</section>
<!-- .section-content-main--table-->
<section class="section3 section-content-main-mobile--table">
    <div class="section-content--main-mobile__wrap">
        <div class="section-content--main box-bg2 pb-20px">
            <div class="section-bottom-side--mobile__list">
                <!-- Элемент мобильной таблицы-->
                @if(count($withdrawObjects) > 0)
                @foreach ($withdrawObjects as $item)
                <div class="section-bottom-side--mobile__item--wrap section-data-container--item">
                    <div class="section-bottom-side--mobile__item">
                        <div class="section-bottom-side--mobile__item--name"> {{ $item->user->name }}</div>
                        <div class="section-bottom-side--mobile__item--attr">
                            <div class="section-tbody--show__popup section-top-added gogocar-arrow-button">
                                <svg class="icon icon-dots ">
                                    <use xlink:href="static/img/svg/symbol/sprite.svg#dots"></use>
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
                                            <use xlink:href="{{ asset('static/img/svg/symbol/sprite_admin.svg#delete-red') }}"></use>
                                        </svg><span>@lang('global.app_delete')</span>
                                    </div>
                                </div>
                            </div>
                            <div class="section-arrow-mobile-table section-top-added gogocar-arrow-button">
                                <svg class="icon icon-arrow-down-mobile ">
                                    <use xlink:href="static/img/svg/symbol/sprite.svg#arrow-down-mobile"></use>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <ul class="section-bottom-side--mobile__item--content">
                        <li class="section-mobile-table--item">
                            <div class="section-mobile-table--item__left">@lang('global.users.title'): {{ $item->user->name }}</div>
                            <div class="section-mobile-table--item__right"><a class="color-yellow" href="/">{{ $item->user->name }}</a></div>
                        </li>
                        <li class="section-mobile-table--item">
                            <div class="section-mobile-table--item__left">@lang('global.dashboard_all.amount'):</div>
                            <div class="section-mobile-table--item__right">{{ $item->amount }} UZS</div>
                        </li>
                        <li class="section-mobile-table--item">
                            <div class="section-mobile-table--item__left">@lang('global.date'):</div>
                            <div class="section-mobile-table--item__right">{{date('d.m.yy',strtotime($item->created_at))}}</div>
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
        </div>
    </div>
</section>
<section class="section2 col-xl-12 col-lg-12 col-md-12 col-sm-6 p-30 mobile-padding-0">
    <div class="filter-main box-bg2">
        <div class="section-top-side">
            <div class="section-block--title">@lang('global.dashboard_all.withdraw')</div>
            <div class="section-block--title">@lang('global.dashboard_all.profit'): {{ $total }} UZS</div>
        </div>
        <div class="section-bottom-side">
            <canvas id="chart-withdraw-chart" height="140"></canvas>
        </div>
    </div>
</section>
<script>
    // $(function() {
    $(document).ready(function() {
        window.dtDefaultOptions = {
            stateSave: true
            , retrieve: true,
            // dom: 'lrtip',
            dom: 'fBrtipl',
            // dom: 'fBrtip<"actions">l',
            columnDefs: []
            , "iDisplayLength": 100
            , "aaSorting": []
            , language: {
                paginate: {
                    next: '<img src="/../admin/next.svg">'
                    , previous: '<img src="/../admin/previous.svg">'
                }
            }
            , buttons: [],

        };
        var dataTable;
        $('.datatable').each(function() {
            dataTable = $(this).dataTable(window.dtDefaultOptions);
        });

        var lineData = {
            labels: [@foreach($withdraws as $key => $item)
                "{{$item->date}}", @endforeach
            ]
            , datasets: [

                {
                    label: "Amount "
                    , backgroundColor: 'rgba(243, 115, 53,0.3)'
                    , borderColor: "rgba(243, 115, 53,0.7)"
                    , pointBackgroundColor: "rgba(42, 47, 62, 1)"
                    , pointBorderColor: "#F27234"
                    , lineTension: 0
                    , pointBorderWidth: 1
                    , pointHoverRadius: 3
                    , pointHitRadius: 10
                    , pointBorderWidth: 1
                    , borderWidth: 1
                    , data: [@foreach($withdraws as $key => $item) {{ $item -> amount}}, @endforeach]
                }
            ]
        , };

        var lineOptions = {
            responsive: true
            , scales: {
                xAxes: [{
                    gridLines: {
                        color: "#404352"
                    }
                    , scaleLabel: {
                        display: false
                        , fontColor: "red"
                    }
                }]
                , yAxes: [{
                    gridLines: {
                        color: "#404352"
                        , borderDash: [2, 5]
                    , }
                    , scaleLabel: {
                        display: false
                        , fontColor: "green"
                    }
                }]
            }
        };


        var ctx = document.getElementById("chart-withdraw-chart").getContext("2d");
        new Chart(ctx, {
            type: 'line'
            , data: lineData
            , options: lineOptions
        });


    })
</script>