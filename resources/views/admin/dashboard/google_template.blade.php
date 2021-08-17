<div class="row no-margin">
    <div class="col-lg-6">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>@lang('global.google.fields.trafic')</h5>
            </div>
            <div class="ibox-content ">
                <div class="flot-chart chart-block">
                    <div class="flot-chart-content" id="trafic-users-chart">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>@lang('global.google.fields.region')</h5>
            </div>
            <div class="ibox-content no-padding clearfix">
                <ul class="list-group">
                    @if(count($analyticsDatasCity['rows']) > 0 )
                        @foreach ($analyticsDatasCity['rows'] as $item)
                            <li class="list-group-item fist-item">
                                <span class="pull-right">
                                    {{$item[1]}}
                                </span>
                                <span class="label-location"></span> 
                                <span class="city-name">{{$item[0]}}</span>
                            </li>
                        @endforeach
                    @endif
                </ul>
            </div>
        </div>
    
    </div>
</div>
<div class="row no-margin">
    <div class="col-lg-4">
        <div class="col-lg-12 no-padding average-time">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>@lang('global.google.fields.average_time_spent')</h5>
                </div>
                <div class="ibox-content">
                    @php
                        $total_time = 0;
                        foreach ($analyticsAverageTime as $key => $item) {
                            # code...
                            $total_time += $item[3];
                        } 
                    @endphp
                    <h2>{{gmdate("H:i:s", $total_time)}}</h2>
                    <div class="flot-chart">
                        <div class="flot-chart-content" id="flot-line-chart"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12 no-padding average-time">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>@lang('global.google.fields.average_time_spent_day')</h5>
                </div>
                <div class="ibox-content">
                        {{-- <h2>
                            {{gmdate("H:i:s", $analyticsAverageTimeDuringDay['rows'][0][2])}}
                        </h2> --}}
                        @php
                            $total_time_duraing_day = 0;
                            if(count($analyticsAverageTimeDuringDay['rows'])){
                                foreach ($analyticsAverageTimeDuringDay['rows'] as $key => $item) {
                                    # code...
                                    $total_time_duraing_day += $item[3];
                                } 
                            }
                        @endphp
                        <h2>{{gmdate("H:i:s", $total_time_duraing_day)}}</h2>
                        <div class="flot-chart">
                            <div class="flot-chart-content" id="flot-line-day-chart"></div>
                        </div>
                </div>
            </div>  
        </div>
    </div>
    <div class="col-lg-8">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>@lang('global.google.fields.hour_trafic')</h5>
            </div>
            <div class="ibox-content ">
                    <div class="flot-chart chart-block">
                        <div class="flot-chart-content" id="trafic-hour-chart"></div>
                    </div>
            </div>
        </div>
    </div>
</div>
<div class="row no-margin">
    <div class="col-lg-6">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>@lang('global.google.fields.source_trafic')</h5>
            </div>
            <div class="ibox-content clearfix">
                <div class="flot-chart-block col-lg-6">
                    <div class="flot-chart-pie-content" id="source-pie-chart"></div>
                </div>
                @php
                    $total_sources = 0;
                    if(count($analyticsDatasBySource)){
                        foreach ($analyticsDatasBySource as $key => $item) {
                            # code...
                            $total_sources += $item[1];
                        }
                    }
                    $colors_pie = ['#5F691E', '#B8CC3B', '#F2674B', '#FAA04D', '#fff','#5F691E', '#B8CC3B', '#F2674B', '#FAA04D', '#fff', '#5F691E', '#B8CC3B', '#F2674B', '#FAA04D', '#fff', '#5F691E', '#B8CC3B', '#F2674B', '#FAA04D', '#fff','#5F691E', '#B8CC3B', '#F2674B', '#FAA04D', '#fff']
                @endphp
                <div class="flot-chart-text col-lg-6">
                        <ul class="list-group">
                        @if(count($analyticsDatasBySource['rows']))
                        @foreach ($analyticsDatasBySource['rows'] as $key => $item)
                            <li class="list-group-item fist-item">
                                <span class="pull-right">
                                    @if($total_sources != 0)
                                    {{ round($item[1] / $total_sources * 100, 2) }} %
                                    @endif
                                </span>
                                <span class="label-location" style="background: {{$colors_pie[$key]}}"></span> 
                                <span class="city-name">{{$item[0]}}</span>
                            </li>
                        @endforeach
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="col-lg-6">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>@lang('global.google.fields.source_trafic')</h5>
            </div>
            <div class="ibox-content clearfix">
                <div class="flot-chart-block col-lg-6">
                    <div class="flot-chart-pie-content" id="aim-pie-chart"></div>
                </div>
                <div class="flot-chart-text col-lg-6">
                        <ul class="list-group">
                            @php
                                $total_aim = 0;
                            @endphp
                        @if(isset($analyticsDatasEvent['rows']))
                            @foreach ($analyticsDatasEvent['rows'] as $key => $item)
                                <li class="list-group-item fist-item">
                                    <span class="pull-right">
                                        {{$item[1]}} 
                                    </span>
                                <span class="label-location" style="background: {{$colors_pie[$key]}}"></span> 
                                    <span class="city-name">{{$item[0]}}</span>
                                </li>
                                 @php
                                    $total_aim += $item[1]; 
                                 @endphp
                            @endforeach
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div> --}}
</div>
<script>
        // $(function() {
    $(document).ready(function() {
        // $(".spn_hol").hide();
        window._token = '{{ csrf_token() }}';
        $('#google_chart_container').hide();
        $('#directions_id').on('change', function() {
            fetch_course_data();
        });

        $('#transaction_period a.links').click(function(e){
            $('#transaction_period a.links').removeClass('active');
            $(this).addClass('active');
            let period = $('#transaction_period a.active').data('period');
            let start = moment().subtract(period, 'days');
            let end = moment();
            if (period === 'all') start = moment('01/01/2020', 'MM/DD/YYYY');
            //  $('#reportrange').daterangepicker({
            //     format: 'MM/DD/YYYY',
            //     startDate: start,
            //     endDate: end
            // })
            $('#reportrange').daterangepicker({
                    format: 'DD.MM.YYYY',
                    startDate: start,
                    endDate: end,
                    minDate: '01/01/2020',
                    maxDate: moment(),
                    dateLimit: { days: 60 },
                    showDropdowns: true,
                    showWeekNumbers: true,
                    timePicker: false,
                    timePickerIncrement: 1,
                    timePicker12Hour: true,
                    ranges: {
                        'Today': [moment(), moment()],
                        'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                        'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                        'This Month': [moment().startOf('month'), moment().endOf('month')],
                        'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                    },
                    opens: 'left',
                    drops: 'down',
                    buttonClasses: ['btn', 'btn-sm'],
                    applyClass: 'btn-primary',
                    cancelClass: 'btn-default',
                    separator: ' to ',
                    locale: {
                        applyLabel: 'Submit',
                        cancelLabel: 'Cancel',
                        fromLabel: 'From',
                        toLabel: 'To',
                        customRangeLabel: 'Custom',
                        daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr','Sa'],
                        monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                        firstDay: 1
                    }
                }, function(start, end) {
                    // fetch_course_data(start.format('YYYY-MM-DD'), end.format('YYYY-MM-DD'));
                    let period = end.diff(start, 'days');
                    fetch_google_data(start.format('YYYY-MM-DD'), period);
                    $('#reportrange span').html(start.format('DD.MM.YYYY') + ' - ' + end.format('DD.MM.YYYY'));
            });
            $('#reportrange span').html(start.format('DD.MM.YYYY') + ' - ' + moment().format('DD.MM.YYYY'));
            fetch_google_data(start.format('YYYY-MM-DD'), period);
            e.stopImmediatePropagation();

        })

        // function fetch_google_data() {
        var fetch_google_data = function(from, period){ 
            // var period = $('#transaction_period a.active').data('period');
            $(".spn_hol").show();
            $('#google_chart_container').hide();
            $.ajax({
                url:'{{ route('admin.dashboard.google', app()->getLocale()) }}',
                data:{start_date: from, period: period},
                success: function(data) {
                    $('#google_chart_container').show();
                    $('#google_chart_container').html('');
                    $('#google_chart_container').html(data);
                    $(".spn_hol").hide();
                },
                error: function(){}
            });
            // e.stopImmediatePropagation();
            return false;

        }
             // flot bar chart
        $(function() {
            var barOptions = {
                series: {
                    bars: {
                        show: true,
                        barWidth: 60 * 60 * 1000 * 12,
                        fill: true,
                        fillColor: {
                            colors: [{
                                opacity: 1
                            }, {
                                opacity: 1
                            }]
                        }
                    }
                },
                xaxis: {
                    tickerSize: 60 * 60 * 1000,
                    mode: "time",
                    timeBase: "months",
                    timeformat: "%d/%m"
                },
                colors: ["#B75E38"],
                grid: {
                    color: "#404352",
                    hoverable: false,
                    clickable: true,
                    tickColor: "#404352",
                    borderWidth:0
                },
                legend: {
                    show: false
                },
                tooltip: true,
                tooltipOpts: {
                    content: "x: %x, y: %y"
                }
            };
            var barData = {
                label: "bar",
                data: [
                    @foreach ($analyticsData['rows'] as $item)
                        [{{ strtotime($item[0]) * 1000 }}, {{ $item[1] }}],
                     @endforeach
                    ],
            };
            $.plot($("#trafic-users-chart"), [barData], barOptions);
        });
        // flot bar chart
        $(function() {
            var barOptions = {
                series: {
                    bars: {
                        show: true,
                        barWidth: 3600000,
                        fill: true,
                        fillColor: {
                            colors: [{
                                opacity: 0.8
                            }, {
                                opacity: 0.8
                            }]
                        }
                    }
                },
                xaxis: {
                    tickDecimals: 0
                },
                colors: ["#1ab394"],
                grid: {
                    color: "#999999",
                    hoverable: true,
                    clickable: true,
                    tickColor: "#D4D4D4",
                    borderWidth:0
                },
                legend: {
                    show: false
                },
                tooltip: true,
                tooltipOpts: {
                    content: "x: %x, y: %y"
                }
            };
            var barData = {
                label: "bar",
                data: [
                    @foreach ($analyticsDatasBySource['rows'] as $item)
                        ['{{ date('d-M-y', strtotime($item[0])) }}', {{ $item[1] }}],
                    @endforeach
                ]
            };
            $.plot($("#flot-bar-chart"), [barData], barOptions);

        });
        // end flot bar chart


        // flot line chart
        $(function() {
            var barOptions = {
                series: {
                    lines: {
                        show: true,
                        lineWidth: 2,
                        fill: true,
                        fillColor: {
                            colors: [{
                                opacity: 0.7
                            }, {
                                opacity: 1
                            }]
                        }
                    }
                },
                colors: ["#B75E38"],
                grid: {
                   show: false,
                },
                xaxis: {
                    tickFormatter: function() {
                        return "";
                    }
                },
                yaxis: {
                    tickFormatter: function() {
                        return "";
                    }
                },
                legend: {
                    show: false
                },
                tooltip: true,
                tooltipOpts: {
                    content: "x: x, y: y"
                }
            };
            var barData = {
                label: "bar",
                data: [
                @foreach ($analyticsAverageTime['rows'] as $item)
                    [{{$item[0]}}, {{ $item[3] }}],
                @endforeach
                   
                ]
            };
            $.plot($("#flot-line-chart"), [barData], barOptions);

        });
        // end flot line chart

         // flot line chart in a day
        $(function() {
            var barOptions = {
                series: {
                    lines: {
                        show: true,
                        lineWidth: 2,
                        fill: true,
                        fillColor: {
                            colors: [{
                                opacity: 0.7
                            }, {
                                opacity: 1
                            }]
                        }
                    }
                },
                colors: ["#B75E38"],
                grid: {
                   show: false,
                },
                xaxis: {
                    tickFormatter: function() {
                        return "";
                    }
                },
                yaxis: {
                    tickFormatter: function() {
                        return "";
                    }
                },
                legend: {
                    show: false
                },
                tooltip: true,
                tooltipOpts: {
                    content: "x: x, y: y"
                }
            };
            var barData = {
                label: "bar",
                data: [
                @foreach ($analyticsAverageTimeDuringDay['rows'] as $item)
                    [{{$item[0]}}, {{ $item[3] }}],
                @endforeach
                   
                ]
            };
            $.plot($("#flot-line-day-chart"), [barData], barOptions);

        });
        // end flot line chart in a day

         // flot bar chart
        $(function() {
            var barOptions = {
                series: {
                    bars: {
                        show: true,
                        barWidth: 0.6,
                        fill: true,
                        fillColor: {
                            colors: [{
                                opacity: 1
                            }, {
                                opacity: 1
                            }]
                        }
                    }
                },
                xaxis: {
                    tickDecimals: 0,
                    timeformat: "%H",
                    color: 'red',
                    tickFormatter: function(e) {
                        return e + ':00';
                    }
                },
                colors: ["#B75E38"],
                grid: {
                    color: "#404352",
                    hoverable: false,
                    clickable: true,
                    tickColor: "#404352",
                    borderWidth:0
                },
                legend: {
                    show: false
                },
                tooltip: true,
                tooltipOpts: {
                    content: "x: %x, y: %y"
                }
            };
            var barData = {
                label: "bar",
                data: [
                    @foreach ($analyticsDatasByHour['rows'] as $item)
                        [{{$item[0]}}, {{ $item[1] }}],
                    @endforeach
                ]
            };
            $.plot($("#trafic-hour-chart"), [barData], barOptions);
        });

        // start users chart
     

        //Flot Pie Chart
        // end users chart
        //Flot Pie Chart
        
        var colors_pie = ['#5F691E', '#B8CC3B', '#F2674B', '#FAA04D', '#fff','#5F691E', '#B8CC3B', '#F2674B', '#FAA04D', '#fff']
        $(function() {

            var data = [
            @foreach ($analyticsDatasBySource as $key => $item)
            { 
                label: "{{$item[0]}}",
                data: {{$item[1]/$total_sources*100}},
                color: colors_pie[{{$key}}],
            },     
            @endforeach
            ];

            var plotObj = $.plot($("#source-pie-chart"), data, {
                series: {
                    pie: {
                        borderWidth: 0,
                        borderColor: 'red',
                        show: true,
                        label: {
                            show: false,
                            radius: 0,
                            background: { opacity: 1 }
                        },
                        stroke: {
                            color: '#2A2F3E',
                            width: 0
                        },
                    }
                },
                grid: {
                    hoverable: false,
                },
                legend: {
                    show: false
                },
                tooltip: false
            });

        });

        //Aim Pie Chart
        var colors_pie = ['#5F691E', '#B8CC3B', '#F2674B', '#FAA04D', '#fff','#5F691E', '#B8CC3B', '#F2674B', '#FAA04D', '#fff']
        $(function() {

            var data = [
            @foreach ($analyticsDatasEvent as $key => $item)
            { 
                label: "{{$item[0]}}",
                data: {{$item[1]/$total_aim*100}},
                color: colors_pie[{{$key}}],
            },     
            @endforeach
            ];

            var plotObj = $.plot($("#aim-pie-chart"), data, {
                series: {
                    pie: {
                        borderWidth: 0,
                        borderColor: 'red',
                        show: true,
                        label: {
                            show: false,
                            radius: 0,
                            background: { opacity: 1 }
                        },
                        stroke: {
                            color: '#2A2F3E',
                            width: 0
                        },
                    }
                },
                grid: {
                    hoverable: false,
                },
                legend: {
                    show: false
                },
                tooltip: false
            });

        });

        // Bar chart
        $(function () {
            var barData = {
                labels:  [@foreach ($analyticsData['rows'] as $item)
                        '{{ date('d.m.yy', strtotime($item[0])) }}',
                        @endforeach],
                datasets: [
                    {
                        label: "Users",
                        backgroundColor: '#B75E38',
                        borderColor: "#B75E38",
                        pointBackgroundColor: "#B75E38",
                        pointBorderColor: "#fff",
                        data:  [@foreach ($analyticsData['rows'] as $item)
                        '{{ $item[1] }}',
                        @endforeach],
                    }
                ]
            };

            var barOptions = {
                responsive: true,
                scales: {
                    xAxes: [{
                        gridLines: {
                        color: '#404352',
                        lineWidth: 0.5
                        }
                    }],
                    yAxes: [{
                    
                        gridLines: {
                        color: '#404352',
                        lineWidth: 0.5
                        }
                    }]
                },
            };


            var ctx2 = document.getElementById("barChart").getContext("2d");
            new Chart(ctx2, {type: 'bar', data: barData, options:barOptions});
        })
        $('#google_chart_container').show();
        $(".spn_hol").hide();
      
    });

</script>  