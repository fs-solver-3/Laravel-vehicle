    <div class="row mt-2 google-charts no-margins">
        <div class="row no-margin">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title clearfix">
                        <h5>@lang('global.support.graph.support_load')</h5>
                    </div>
                    <div class="ibox-content">
                        <div class="chart-block">
                            <div class="col-lg-10">
                                <div class="flot-chart-content" id="support_load">
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="flot-chart-text">
                                    <ul class="list-group">
                                        <li class="list-group-item fist-item">
                                            <span class="label-location" style="background: #FDC830"></span>
    
                                            <span class="city-name">@lang('global.support.graph.total_message')</span>
    
                                        </li>
                                        <li class="list-group-item fist-item">
                                            <span class="label-location" style="background: #F37335"></span>
    
                                            <span class="city-name">@lang('global.support.graph.open_message')</span>
                                        </li>
                                        <li class="list-group-item fist-item">
                                            <span class="label-location" style="background: #23C6C8"></span>
    
                                            <span class="city-name">@lang('global.support.graph.close_message')</span>
    
                                        </li>
                                        {{-- <li class="list-group-item fist-item">
                                            <span class="label-location" style="background: #41479B"></span>
    
                                            <span class="city-name">@lang('global.support.graph.messages')</span>
    
                                        </li>
                                        <li class="list-group-item fist-item">
                                            <span class="label-location" style="background: #FF4B55"></span>
    
                                            <span class="city-name">@lang('global.support.graph.overdue_treatment')</span>
    
    
                                        </li> --}}
                                    </ul>
                                </div>
    
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row no-margins google-charts">

        <div class="col-lg-12 ">
            <div class="ibox float-e-margins">
                <div class="ibox-title clearfix">
                    <h5>@lang('global.support.graph.number_messages')</h5>
                </div>
                <div class="ibox-content clearfix">
                    <div class="flot-chart-block col-lg-6">
                        <div class="flot-chart-pie-content-message" id="message-count-pie-chart"></div>
                    </div>
                    @php
                    # code...
                    $totalMessagesCount = array_sum($messagesFilter);
                    $colors_pie = ['#F37335', '#23C6C8', '#FDC830', '#41479B', '#FF4B55','#2E8EDC', '#F871A7', '#EFAA88','#F37335', '#23C6C8', '#FDC830', '#41479B', '#FF4B55','#2E8EDC', '#F871A7', '#EFAA88' ]

                    @endphp
                    <div class="flot-chart-text col-lg-6">
                        <ul class="list-group demands-group">
                            @foreach ($messagesFilter as $key => $item)
                            <li class="list-group-item fist-item">
                                <div class="label-location" style="background: {{$colors_pie[$loop->index]}}"></div>
                                <div class="demand-percent">
                                    @if($totalMessagesCount != 0)
                                    {{ round($item / $totalMessagesCount * 100, 2) }} %
                                    @endif
                                </div>
                                <div class="demand-counts">{{ $item }}</div>
                                <span class="demand-days">
                                    @switch($key)
                                    @case(0)
                                    <span>2 и менее @lang('global.support.message')</span>
                                    @break
                                    @case(1)
                                    <span>3 @lang('global.support.message')</span>
                                    @break
                                    @case(2)
                                    <span>4 @lang('global.support.message')</span>
                                    @break
                                    @case(3)
                                    <span>5 @lang('global.support.message')</span>
                                    @break
                                    @case(4)
                                    <span>6 @lang('global.support.message')</span>
                                    @break
                                    @case(5)
                                    <span>7 @lang('global.support.message')</span>
                                    @break
                                    @case(6)
                                    <span>8 @lang('global.support.message')</span>
                                    @break
                                    @case(7)
                                    <span>9 и более @lang('global.support.message')</span>
                                    @break
                                    @case(8)
                                    <span>10 и более @lang('global.support.message')</span>
                                    @break
                                    @default

                                    @endswitch
                                </span>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>


            </div>
        </div>

    </div>
    <div class="row no-margins google-charts">

        <div class="col-lg-12 ">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>@lang('global.support.graph.problem_solve')</h5>
                </div>
                <div class="ibox-content clearfix">
                    <div class="flot-chart-block col-lg-6">
                        <div class="flot-chart-pie-content-message" id="message-pie-chart"></div>
                    </div>
                    @php
                    # code...
                    $totalMessages = array_sum($demandsFilter);
                    $colors_pie = ['#F37335', '#23C6C8', '#FDC830', '#41479B', '#FF4B55','#2E8EDC', '#F871A7', '#EFAA88','#F37335', '#23C6C8', '#FDC830', '#41479B', '#FF4B55','#2E8EDC', '#F871A7', '#EFAA88' ]

                    @endphp
                    <div class="flot-chart-text col-lg-6">
                        <ul class="list-group demands-group">
                            @foreach ($demandsFilter as $key => $item)
                            <li class="list-group-item fist-item">
                                <div class="label-location" style="background: {{$colors_pie[$loop->index]}}"></div>
                                <div class="demand-percent">
                                    @if($totalMessages != 0)
                                    {{ round($item / $totalMessages * 100, 2) }} %
                                    @endif
                                </div>
                                <div class="demand-counts">{{ $item }}</div>
                                <span class="demand-days">
                                    @switch($key)
                                    @case(0)
                                    <span>Менее 1 дня</span>
                                    @break
                                    @case(1)
                                    <span>от 1 до 2 дней</span>
                                    @break
                                    @case(2)
                                    <span>от 2 до 3 дней</span>
                                    @break
                                    @case(3)
                                    <span>от 3 до 4 дней</span>
                                    @break
                                    @case(4)
                                    <span>от 4 до 5 дней</span>
                                    @break
                                    @case(5)
                                    <span>от 5 до 6 дней</span>
                                    @break
                                    @case(6)
                                    <span>от 6 до 7 дней</span>
                                    @break
                                    @case(7)
                                    <span>Менее 1 дня</span>
                                    @break
                                    @case(8)
                                    <span>Более 7 дней</span>
                                    @break
                                    @default

                                    @endswitch
                                </span>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>


            </div>
        </div>

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

            $('#transaction_period a.links').click(function(e) {
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
                    format: 'DD.MM.YYYY'
                    , startDate: start
                    , endDate: end
                    , minDate: '01/01/2020'
                    , maxDate: moment()
                    , dateLimit: {
                        days: 60
                    }
                    , showDropdowns: true
                    , showWeekNumbers: true
                    , timePicker: false
                    , timePickerIncrement: 1
                    , timePicker12Hour: true
                    , ranges: {
                        'Today': [moment(), moment()]
                        , 'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')]
                        , 'Last 7 Days': [moment().subtract(6, 'days'), moment()]
                        , 'Last 30 Days': [moment().subtract(29, 'days'), moment()]
                        , 'This Month': [moment().startOf('month'), moment().endOf('month')]
                        , 'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                    }
                    , opens: 'left'
                    , drops: 'down'
                    , buttonClasses: ['btn', 'btn-sm']
                    , applyClass: 'btn-primary'
                    , cancelClass: 'btn-default'
                    , separator: ' to '
                    , locale: {
                        applyLabel: 'Submit'
                        , cancelLabel: 'Cancel'
                        , fromLabel: 'From'
                        , toLabel: 'To'
                        , customRangeLabel: 'Custom'
                        , daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa']
                        , monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December']
                        , firstDay: 1
                    }
                }, function(start, end) {
                    // fetch_course_data(start.format('YYYY-MM-DD'), end.format('YYYY-MM-DD'));
                    let period = end.diff(start, 'days');
                    fetch_graph_data(start.format('YYYY-MM-DD'), period);
                    $('#reportrange span').html(start.format('DD.MM.YYYY') + ' - ' + end.format('DD.MM.YYYY'));
                });
                $('#reportrange span').html(start.format('DD.MM.YYYY') + ' - ' + moment().format('DD.MM.YYYY'));
                fetch_graph_data(start.format('YYYY-MM-DD'), period);
                e.stopImmediatePropagation();

            })

            // function fetch_graph_data() {
            var fetch_graph_data = function(from, period) {
                // var period = $('#transaction_period a.active').data('period');
                $(".spn_hol").show();
                $('#google_chart_container').hide();
                $.ajax({
                    url: '{{route('admin.support.graph', app()->getLocale()) }}', 
                    data: {start_date: from, period: period}, 
                    success: function(data) {
                        $('#google_chart_container').show();
                        $('#google_chart_container').html('');
                        $('#google_chart_container').html(data);
                        $(".spn_hol").hide();
                    }
                    , error: function() {}
                });
                // e.stopImmediatePropagation();
                return false;

            }
        
            $('#google_chart_container').show();
            $(".spn_hol").hide();

        });
        $(function() {

        Morris.Area({
        element: 'support_load'

        , data: [
        @foreach($data as $key => $item)

        {
        period: '{{ $key }}', total: '{{ $item['total'] }}',
        open: '{{ $item['open'] }}',
        close: '{{ $item['close'] }}'

        },

        @endforeach

        ]
        , xkey: 'period'
        , ykeys: ['total', 'open', 'close']
        , labels: ['total', 'open', 'close']

        , pointSize: 2
        , hideHover: 'always'
        , resize: true
        , lineColors: ['#23C6C8', '#F37335', '#FDC830']
        , lineWidth: 2
        , pointSize: 1
        , });
        });

        var colors_pie = ['#F37335', '#23C6C8', '#FDC830', '#41479B', '#FF4B55', '#2E8EDC', '#F871A7', '#EFAA88', '#F37335', '#23C6C8', '#FDC830', '#41479B', '#FF4B55', '#2E8EDC', '#F871A7', '#EFAA88']
        @if($totalMessages != 0 )
        $(function() {

        var data = [
        @foreach($demandsFilter as $key => $item) {
        label: "{{$item}}"
        , data: {{ $item / $totalMessages * 100 }}
        , color: colors_pie[{{$loop->index}}]
        , }
        , @endforeach
        ];

        var plotObj = $.plot($("#message-pie-chart"), data, {

        series: {
        pie: {
        borderWidth: 0
        , borderColor: 'red'
        , show: true
        , label: {
        show: false
        , radius: 0
        , background: {
        opacity: 1
        }
        }
        , stroke: {
        color: '#2A2F3E'
        , width: 0
        }
        , }
        }
        , grid: {
        hoverable: false
        , }
        , legend: {
        show: false
        }
        , tooltip: false
        });

        });
        @endif

        // message count chart
        @if($totalMessagesCount != 0 )
        $(function() {

        var data = [
        @foreach($messagesFilter as $key => $item) {
        label: "{{$item}}"
        , data: {{ $item / $totalMessagesCount * 100 }}
        , color: colors_pie[{{ $loop->index }}]
        , }
        , @endforeach
        ];

        var plotObj = $.plot($("#message-count-pie-chart"), data, {

        series: {
        pie: {
        borderWidth: 0
        , borderColor: 'red'
        , show: true
        , label: {
        show: false
        , radius: 0
        , background: {
        opacity: 1
        }
        }
        , stroke: {
        color: '#2A2F3E'
        , width: 0
        }
        , }
        }
        , grid: {
        hoverable: false
        , }
        , legend: {
        show: false
        }
        , tooltip: false
        });

        });
        @endif
    </script>