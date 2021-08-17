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
            <div class="ibox-content no-padding">
                <ul class="list-group">
                    @if(count($dataCity->getData()->getAll()) > 0)
                        @foreach ($dataCity->getData()->getAll() as $item)
                            <li class="list-group-item fist-item">
                                <span class="pull-right">
                                    @if(count($item->getMetrics()) > 0)
                                    {{$item->getMetrics()[0]}}
                                    @endif
                                </span>
                                <span class="label-location"></span> 
                                <span class="city-name">
                                    @if(count($item->getDimensions()->getAll()) > 0)
                                    {{$item->getDimensions()->getAll()[0]->getName()}}
                                    @endif
                                </span>
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
                        if(count($dataAverageTime->getData()->getAll()) > 0){
                            $average = ($dataAverageTime->getData()->getAll()[0])->getMetrics();
                            if(count($average) > 0){
                                foreach (($dataAverageTime->getData()->getAll()[0])->getMetrics()[0] as $item => $value) {
                                    # code...
                                    $total_time += $value;
                                } 
                            }
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
                        {{gmdate("H:i:s", ($dataAverageTimeToday->getData()->getAll()[0]->getMetrics()[0][0]))}}
                    </h2> --}}
                    @php
                            $total_time_duraing_day = 0;
                            foreach ($dataAverageTimeToday->getData()->getAll()[0]->getMetrics()[0] as $key => $item) {
                                # code...
                                $total_time_duraing_day += $item;
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
                    foreach ($dataSourceTrafic->getRows() as $key => $item) {
                        # code...
                        $total_sources += $item[1];
                    } 
                    $colors_pie = ['#5F691E', '#B8CC3B', '#F2674B', '#FAA04D', '#fff','#5F691E', '#B8CC3B', '#F2674B', '#FAA04D', '#fff', '#5F691E', '#B8CC3B', '#F2674B', '#FAA04D', '#fff','#5F691E', '#B8CC3B', '#F2674B', '#FAA04D', '#fff']
                @endphp
                <div class="flot-chart-text col-lg-6">
                        <ul class="list-group">
                        @foreach ( $dataSourceTrafic->getRows() as $key => $item)
                            <li class="list-group-item fist-item">
                                <span class="pull-right">
                                    @if($total_sources != 0)
                                    {{ round($item[1] / $total_sources * 100, 2) }} %
                                    @endif
                                </span>
                                @if(isset($colors_pie[$key]))
                                <span class="label-location" style="background: {{$colors_pie[$key]}}"></span> 
                                @endif
                                <span class="city-name">{{$item[0]}}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
    @php
        $total_aim = 0;
    @endphp
    {{-- <div class="col-lg-6">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>@lang('global.google.fields.source_trafic')</h5>
            </div>
            <div class="ibox-content">
                <div class="flot-chart-block col-lg-6">
                    <div class="flot-chart-pie-content" id="aim-pie-chart"></div>
                </div>
                <div class="flot-chart-text col-lg-6">
                        <ul class="list-group">
                        
                        @if(isset($dataGoal))
                            @foreach ($dataGoal as $key => $item)
                                <li class="list-group-item fist-item">
                                    <span class="pull-right">
                                        {{$item->getMetrics()[0]}} 
                                    </span>
                                <span class="label-location" style="background: {{$colors_pie[$key]}}"></span> 
                                    <span class="city-name">{{($item->getDimensions()->getAll())[0]->getName()}}</span>
                                </li>
                                @if(is_float($item->getMetrics()[0]))
                                @php
                                    $total_aim += $item->getMetrics()[0]; 
                                @endphp
                                @endif
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
        // $('.buy_course').hide();
        $(".spn_hol").hide();
        window._token = '{{ csrf_token() }}';
        $('#directions_id').on('change', function() {
            fetch_course_data();
        });

         $('#transaction_period a.links').click(function(e){
            $('#transaction_period a.links').removeClass('active');
            $(this).addClass('active');
            let period = $('#transaction_period a.active').data('period');
            let start = moment().subtract(period, 'days');
            let end = moment();
            if (period === 'all') start = moment('10.01.2020', 'MM/DD/YYYY');
            //  $('#reportrange').daterangepicker({
            //     format: 'MM/DD/YYYY',
            //     startDate: start,
            //     endDate: end
            // })
            $('#reportrange').daterangepicker({
                format: 'DD.MM.YYYY',
                startDate: start,
                endDate: end,
                minDate: '10.01.2020',
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
                $('#reportrange span').html(start.format('DD.MM.YYYY') + ' - ' + end.format('DD.MM.YYYY'));
                fetch_yandex_data(start.format('YYYY-MM-DD'), end.format('YYYY-MM-DD'), period);
            });
            $('#reportrange span').html(start.format('DD.MM.YYYY') + ' - ' + moment().format('DD.MM.YYYY'));
            fetch_yandex_data(start.format('YYYY-MM-DD'), end.format('YYYY-MM-DD'), period);
            e.stopImmediatePropagation();

        })

        var fetch_yandex_data = function(end, start, period){ 
        //    var period = $('#transaction_period a.active').data('period');
        //    let from_date = end_date.split(".").reverse().join("-");
                //  query  = $('#directions_id').val();
             $(".spn_hol").show();
             $('#yandex_chart_container').hide();
            $.ajax({
                url:'{{ route('admin.dashboard.yandex', app()->getLocale()) }}',
                data:{start_date: start, from_date: end, period: period},
                success: function(data) {
                    $('#yandex_chart_container').show();
                    $('#yandex_chart_container').html('');
                    $('#yandex_chart_container').html(data);
                     $(".spn_hol").hide();
                },
                error: function(){}
            });
            // e.stopImmediatePropagation();
            return false;
        }

        function getdateyandex(day, after) {
            // var date = new Date(day);
            var day = day.split("-").join("/")
            var newdate = new Date(day);

            newdate.setDate(newdate.getDate() + after);
            
            var dd = newdate.getDate();
            if(dd < 10) dd = '0' + dd;
            var mm = newdate.getMonth() + 1;
            if(mm < 10) mm = '0' + mm;
            var y = newdate.getFullYear();
            var someFormattedDate = dd + '.' + mm + '.' + y;
            return someFormattedDate;
        }

        // Bar chart
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
                    timeBase: "days",
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
                    @foreach (($data->getData()->getAll())[0]->getMetrics()[0] as $item => $value)
                        [{{ strtotime($data->getQuery()->getDate1() . ' + '.$item.'days') * 1000 }}, {!! $value !!}],
                     @endforeach
                    ],
            };
            $.plot($("#trafic-users-chart"), [barData], barOptions);
        });

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
                @foreach (($dataAverageTime->getData()->getAll()[0])->getMetrics()[0] as $item => $value)
                    [{{$item}}, {{ $value }}],
                @endforeach
                   
                ]
            };
            $.plot($("#flot-line-chart"), [barData], barOptions);

        });
        // end flot line chart

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
                    @foreach (($dataTimeTrafic->getData()->getAll())[0]->getMetrics()[0] as $item => $value)
                        [{{$item}}, {{ $value }}],
                    @endforeach
                ]
            };
            $.plot($("#trafic-hour-chart"), [barData], barOptions);
        });
       
       //Flot Pie Chart
        var colors_pie = ['#5F691E', '#B8CC3B', '#F2674B', '#FAA04D', '#fff','#5F691E', '#B8CC3B', '#F2674B', '#FAA04D', '#fff']
        $(function() {
            @if($total_sources != 0)
            var data = [
            @foreach ( $dataSourceTrafic->getRows() as $key => $item)
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

            @endif

        });

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
                @foreach ($dataAverageTimeToday->getData()->getAll()[0]->getMetrics()[0] as $key => $item)
                    [{{$key}}, {{ $item }}],
                @endforeach
                   
                ]
            };
            $.plot($("#flot-line-day-chart"), [barData], barOptions);

        });
        // end flot line chart in a day

        // $(window).bind("load", function() {

        //     "use strict";
            
        //     $(".spn_hol").fadeOut(300);
        //     $('.buy_course').show();
        // });
        //Aim Pie Chart
        var colors_pie = ['#5F691E', '#B8CC3B', '#F2674B', '#FAA04D', '#fff','#5F691E', '#B8CC3B', '#F2674B', '#FAA04D', '#fff', '#5F691E', '#B8CC3B', '#F2674B', '#FAA04D', '#fff','#5F691E', '#B8CC3B', '#F2674B', '#FAA04D', '#fff','#5F691E', '#B8CC3B', '#F2674B', '#FAA04D', '#fff','#5F691E', '#B8CC3B', '#F2674B', '#FAA04D', '#fff']
        @if($total_aim != 0)
        $(function() {

            var data = [
            @foreach ($dataGoal as $key => $item)
            { 
                label: "{{($item->getDimensions()->getAll())[0]->getName()}}",
                data: {{($item->getMetrics()[0])/$total_aim*100}},
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
        @endif

        

      
    });

</script>  