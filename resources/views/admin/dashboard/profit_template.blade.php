<section class="section-2 section-content-main--table">
    <div class="section-content--main__wrap box-bg2">
        <div class="section-content--main">
            <div class="section-bottom-side--scroll border-none">
                <table class="section-table">
                    <thead class="section-thead-report-pp">
                        <tr>
                            <th>@lang('global.dashboard_all.author')</th>
                            <th>@lang('global.dashboard_all.number_passenger')</th>
                            <th>@lang('global.dashboard_all.passenger')</th>
                            <th>@lang('global.dashboard_all.date_of_travel')</th>
                            <th>@lang('global.dashboard_all.date_edit')</th>
                            <th>@lang('global.dashboard_all.amount') (UZS)</th>
                            <th>@lang('global.dashboard_all.collect') (UZS)</th>
                        </tr>
                    </thead>
                    @if(count($bookings) == 0)
                    @else
                    <tbody class="section-data-container">
                        @foreach($bookings as $booking)
                        <tr class="section-data-container--item">
                            <td><a class="color-yellow" href="{{ route('admin.users.edit', ['locale' => app()->getLocale(), 'id' => optional($booking->user)->id, 'tab' => 'main']) }}">{{ optional($booking->user)->name }}</a></td>
                            <td>{{ $booking->total_people }}</td>
                            <td><a class="color-yellow" href="{{ route('admin.users.edit', ['locale' => app()->getLocale(), 'id' => optional($booking->driver)->id, 'tab' => 'main']) }}">{{ optional($booking->driver)->name }}</a></td>
                            <td>
                                @if($booking->listing == null)
                                    удаленная поездка
                                @else
                                    {{ optional($booking->listing)->starting_date }}

                                @endif
                            </td>
                            <td>{{ date("d.m.yy H:i", strtotime($booking->created_at)) }}</td>
                            <td>{{ $booking->amount }}</td>
                            <td>{{ $booking->amount * 0.1 }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                    @endif
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
            <div class="section-bottom-side--mobile__list">
                <!-- Элемент мобильной таблицы-->
                @foreach($bookings as $booking)
                <div class="section-bottom-side--mobile__item--wrap section-data-container--item">
                    <div class="section-bottom-side--mobile__item">
                        <div class="section-bottom-side--mobile__item--name"> {{ $booking->driver->name }}</div>
                        <div class="section-bottom-side--mobile__item--attr">
                           
                            <div class="section-arrow-mobile-table section-top-added gogocar-arrow-button">
                                <svg class="icon icon-arrow-down-mobile ">
                                    <use xlink:href="{{ asset('static/img/svg/symbol/sprite_admin.svg#arrow-down-mobile') }}"></use>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <ul class="section-bottom-side--mobile__item--content">
                        <li class="section-mobile-table--item">
                            <div class="section-mobile-table--item__left">@lang('global.dashboard_all.author'):</div>
                            <div class="section-mobile-table--item__right"><a class="color-yellow" href="{{ route('admin.users.edit', ['locale' => app()->getLocale(), 'id' => optional($booking->user)->id, 'tab' => 'main']) }}">{{ optional($booking->user)->name }}</a></div>
                        </li>
                        <li class="section-mobile-table--item">
                            <div class="section-mobile-table--item__left">{{ optional($booking->user)->name }}:</div>
                            <div class="section-mobile-table--item__right">{{ $booking->total_people }}</div>
                        </li>
                        <li class="section-mobile-table--item">
                            <div class="section-mobile-table--item__left">@lang('global.dashboard_all.passenger'):</div>
                            <div class="section-mobile-table--item__right"><a class="color-yellow" href="{{ route('admin.users.edit', ['locale' => app()->getLocale(), 'id' => optional($booking->driver)->id, 'tab' => 'main']) }}">{{ optional($booking->driver)->name }}</a></a></div>
                        </li>
                        <li class="section-mobile-table--item">
                            <div class="section-mobile-table--item__left">@lang('global.dashboard_all.date_of_travel'):</div>
                            <div class="section-mobile-table--item__right">@if($booking->listing == null)
                                удаленная поездка
                            @else
                                {{ optional($booking->listing)->starting_date }}

                            @endif</div>
                        </li>
                        <li class="section-mobile-table--item">
                            <div class="section-mobile-table--item__left">@lang('global.dashboard_all.date_edit'):</div>
                            <div class="section-mobile-table--item__right">{{ date("d.m.yy H:i", strtotime($booking->created_at)) }}</div>
                        </li>
                        <li class="section-mobile-table--item d-flex justify-content-between">
                            <div class="section-mobile-table--item__summ">@lang('global.dashboard_all.amount'): {{ $booking->amount }} UZS</div>
                            <div class="section-mobile-table--item__sbor">@lang('global.dashboard_all.collect'): {{ $booking->amount * 0.1 }} UZS</div>
                        </li>
                    </ul>
                </div>
                @endforeach
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
            <div class="section-block--title">@lang('global.dashboard_all.all_trip'): {{ count($bookings) }}</div>
            <div class="section-block--title">@lang('global.dashboard_all.profit'): {{ $profit_total }} UZS</div>
        </div>
        <div class="section-bottom-side">
            <!-- Таблицу или контент сюда-->
            <canvas id="chart-course-chart" height="140"></canvas>
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
            labels: [@foreach($bookings_date as $key => $item) "{{$item->date}}", @endforeach
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
                    , data: [@foreach($bookings_date as $key => $item) {{$item -> amount}}, @endforeach]
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


        var ctx = document.getElementById("chart-course-chart").getContext("2d");
        new Chart(ctx, {
            type: 'line'
            , data: lineData
            , options: lineOptions
        });

        

    })
</script>