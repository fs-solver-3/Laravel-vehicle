<section class="section2 col-xl-12 col-lg-12 col-md-12 col-sm-6">
    <div class="filter-main box-bg2">
        <div class="section-top-side">
            <div class="section-block--title">@lang('global.dashboard_all.all_trip'): {{count($listings)}}</div>
            <div class="section-reports-right">
                <div class="section-input-wrap pr-0 desktop-display-none">
                    <div class="section-select--input2 section-select--input__show">
                        <span>@if(isset($body_type)) {{$body_type}} @else Пассажирские @endif</span>
                        <input type="hidden" value="все" id="body_type" name="body_type">
                        <div class="section-select--popup__icon">
                            <svg class="icon icon-arrow-down-white ">
                                <use xlink:href="{{asset('static/img/svg/symbol/sprite.svg#arrow-down-white')}}"></use>
                            </svg>
                        </div>
                       <ul class="section-select--popup__list section-select--popup__list__show">
                           <li class="section-select--popup__item2 hover-text-color" data-type="все">все</li>
                           @foreach ($body_types as $item)
                            <li class="section-select--popup__item2 hover-text-color body-type" data-type="{{ $item->name }}">{{ $item->name }}</li>
                           @endforeach
                        </ul>
                    </div>
                    {{-- <div class="section-select--input2 section-select--input__show">
                       
                    </div> --}}
                </div>
                <div class="section-reports-mobile--wrap">
                    <div class="section-reports-mobile section-dotted-mobile2 mr-0">
                        <svg class="icon icon-sort ">
                            <use xlink:href="{{asset('static/img/svg/symbol/sprite.svg#sort') }}"></use>
                        </svg>
                    </div>
                    <div class="section-upper-modal__calendar">
                        <div class="col-xl-8 col-lg-8 col-md-8 col-sm-6 section-balance-filter--date p-0">
                            <label>@lang('global.dashboard_all.special'):</label>
                            <div class="section-balance-filter--date__wrap">
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 section-input-wrap pl-0 pr-0">
                                    <div class="section-balance-filter-date__wrap">
                                        <input class="input-main calendar-filter-today calendar-zone-height"
                                            type="text">
                                        <div class="section-balance-date--icon">
                                            <svg class="icon icon-calendar ">
                                                <use
                                                    xlink:href="{{asset('static/img/svg/symbol/sprite.svg#calendar') }}">
                                                </use>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 section-input-wrap pr-0">
                                    <div class="section-balance-filter-date__wrap">
                                        <input class="input-main calendar-filter calendar-zone-height" type="text">
                                        <div class="section-balance-date--icon">
                                            <svg class="icon icon-calendar ">
                                                <use
                                                    xlink:href="{{asset('static/img/svg/symbol/sprite.svg#calendar') }}">
                                                </use>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="section-bottom-side">
            <!-- Таблицу или контент сюда-->
            <canvas id="lineChart" height="140"></canvas>
        </div>
    </div>
</section>
<section class="section3 col-xl-12 col-lg-12 col-md-12 col-sm-6">
    <div class="filter-main box-bg2">
        <div class="section-top-side">
            <div class="section-reports-left">
                <div class="@if($type == 'car_body') section-block--title @endif trip_filter" style="margin-right: 30px;" data-filter="car_body">Сравнение по кузовам</div>
                <div class="section-reports-date-list">
                    <div class="@if($type == 'region') section-block--title @endif trip_filter" data-filter="region">Сравнение по регионам</div>
                </div>
            </div>
            <div class="section-reports-right">
                <div class="section-reports-mobile--wrap">
                    <div class="section-reports-mobile section-dotted-mobile2 mr-0">
                        <svg class="icon icon-sort ">
                            <use xlink:href="{{asset('static/img/svg/symbol/sprite.svg#sort') }}"></use>
                        </svg>
                    </div>
                    <div class="section-upper-modal__calendar">
                        <div class="col-xl-8 col-lg-8 col-md-8 col-sm-6 section-balance-filter--date p-0">
                            <label>@lang('global.dashboard.special'):</label>
                            <div class="section-balance-filter--date__wrap">
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 section-input-wrap pl-0 pr-0">
                                    <div class="section-balance-filter-date__wrap">
                                        <input class="input-main calendar-filter-today calendar-zone-height"
                                            type="text">
                                        <div class="section-balance-date--icon">
                                            <svg class="icon icon-calendar ">
                                                <use
                                                    xlink:href="{{asset('static/img/svg/symbol/sprite.svg#calendar') }}">
                                                </use>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 section-input-wrap pr-0">
                                    <div class="section-balance-filter-date__wrap">
                                        <input class="input-main calendar-filter calendar-zone-height" type="text">
                                        <div class="section-balance-date--icon">
                                            <svg class="icon icon-calendar ">
                                                <use
                                                    xlink:href="{{asset('static/img/svg/symbol/sprite.svg#calendar') }}">
                                                </use>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@if(count($filtered_listings) > 0)
    @foreach ($filtered_listings as $key=>$item)
        @if(count($item) > 0 && $key != 'undefined')
        <section class="section4 col-xl-6 col-lg-6 col-md-6 col-sm-6">
            <div class="filter-main box-bg2">
                <div class="section-top-side">
                    <div class="section-block--title">
                        {{ $key }}
                    </div>
                </div>
                <div class="section-bottom-side">
                    <canvas id="lineChart-{{$loop->index}}" height="140"></canvas>
                </div>
            </div>
        </section>
        @endif
    @endforeach
@endif
<script>
    // $(function() {
            $(document).ready(function() {
                $('.select2').select2();
                $(function() {
        
                    var lineData = {
                        labels: [@foreach($listings_date as $key => $item) "{{$item['date']}}", @endforeach]
                        , datasets: [
        
                            {
                                label: "Trips counts"
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
                                , data: [@foreach($listings_date as $key => $item) {{$item['views']}}, @endforeach]
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
        
        
                    var ctx = document.getElementById("lineChart").getContext("2d");
                    new Chart(ctx, {
                        type: 'line'
                        , data: lineData
                        , options: lineOptions
                    });
        
                    @foreach($filtered_listings as $key => $item)
                    var lineData = {
                        labels: [@if(count($item) > 0) @foreach($item as $key=>$value) "{{$key}}", @endforeach @endif
                        ]
                        , datasets: [
        
                            {
                                label: "counts"
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
                                , data: [@foreach($item as $key=>$value) {{$value}}, @endforeach]
                            }
                        ]
                    , };
                    var ctx = document.getElementById("lineChart-{{$loop->index}}").getContext("2d");
                    new Chart(ctx, {
                        type: 'line'
                        , data: lineData
                        , options: lineOptions
                    });
                    @endforeach
        
                });
            });
</script>