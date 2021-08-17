@extends('layouts.app')
@section('title', 'Графики')
@section('add_css')
<link href="{{asset('css/dashboard.css')}}" rel="stylesheet">
<link href="{{asset('css/plugins/daterangepicker-bs3.css')}}" rel="stylesheet">
<script src="{{asset('js/jquery-3.4.1.js')}}" type="text/javascript"></script>
@endsection

@section('admin_lang')
@include('includes.admin_flag')
@endsection
@section('content')

@if(Session::has('success_message'))
<div class="alert alert-success">
    <span class="glyphicon glyphicon-ok"></span>
    {!! session('success_message') !!}

    <button type="button" class="close" data-dismiss="alert" aria-label="close">
        <span aria-hidden="true">&times;</span>
    </button>

</div>
@endif
<section class="section-1">
<div class="buy_course">
    <div class="wrapper white-bg page-heading breadcrumb-m ibox clearfix">
        <div class="col-md-8 left-block col-xs-8">
            <h2>@lang('global.support.graph.title')</h2>
            <ol class="course-duration hidden-xs" id="transaction_period">
                <li>
                    <a class="links" data-period="all">
                        @lang('global.time.fields.all_day')
                    </a>
                </li>
                <li>
                    <a class="links " data-period="0">@lang('global.time.fields.today')</a>
                </li>
                <li>
                    <a class="links active" data-period="7">@lang('global.time.fields.week')</a>
                </li>
                <li>
                    <a class="links" data-period="30"> @lang('global.time.fields.month')</a>
                </li>
                <li>
                    <a class="links" data-period="365">@lang('global.time.fields.year')</a>
                </li>

            </ol>
        </div>
        <div class="pull-right filter-box">
            <div id="reportrange" class="form-control">
                <span class="hidden-xs"></span>
                {{-- <img src="{{asset('admin/calendar-1.svg')}}" class="calendar-1" alt="for you"> --}}
            </div>
            <div class="mobile-filter visible-xs-block">
                <img src="{{asset('admin/sort.svg')}}" class="calendar-1" alt="for you">
            </div>
        </div>
    </div>

    <div class="spiner-example spn_hol">
        <div class="sk-spinner sk-spinner-wave">
            <div class="sk-rect1"></div>
            <div class="sk-rect2"></div>
            <div class="sk-rect3"></div>
            <div class="sk-rect4"></div>
            <div class="sk-rect5"></div>
        </div>
    </div>

    <div class="row mt-2 google-charts" id="google_chart_container">
        @include('admin.support.graph_template')
    </div>

    <div class="bottom_slide" id="mobile_filter">
        <div class="bottom_icon">
            <img src="{{asset('admin/bottom-slide.svg')}}" class="bottom_img" alt="for you">
        </div>
        <ol class="course-duration" id="transaction_period">
            <li>
                <a class="links" data-period="all">
                    @lang('global.time.fields.all_day')
                </a>
            </li>
            <li>
                <a class="links " data-period="0">@lang('global.time.fields.today')</a>
            </li>
            <li>
                <a class="links active" data-period="7">@lang('global.time.fields.week')</a>
            </li>
            <li>
                <a class="links" data-period="30"> @lang('global.time.fields.month')</a>
            </li>
            <li>
                <a class="links" data-period="365">@lang('global.time.fields.year')</a>
            </li>

        </ol>
    </div>

</div>

</section>
@include('includes.admin_column_modal')
@include('includes.admin_setting_modal')

@endsection
@section('add_custom_script')
<script src="{{asset('js/jquery-3.4.1.js')}}" type="text/javascript"></script>
<script src="{{asset('js/bootstrap-datepicker.js')}}" type="text/javascript"></script>
<script src="{{ asset('js/plugins/fullcalendar/moment.min.js')}}"></script>
<script src="{{ asset('js/plugins/daterangepicker/daterangepicker.js')}}" type="text/javascript"></script>

{{-- <script src="{{ url('adminlte/js') }}/bootstrap.min.js"></script> --}}
<script src="{{ url('adminlte/js') }}/select2.full.min.js"></script>
{{-- <script src="{{ url('js/admin') }}/blog.js"></script> --}}

<script src="{{ url('adminlte/plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
<script src="{{ url('adminlte/plugins/fastclick/fastclick.js') }}"></script>

<!-- Morris -->
<script src="{{ asset('js/plugins/morris/raphael-2.1.0.min.js')}}"></script>
<script src="{{ asset('js/plugins/morris/morris.js')}}"></script>

<!-- Flot -->
<script src="{{asset('js/plugins/flot/jquery.flot.js')}}"></script>
<script src="{{asset('js/plugins/flot/jquery.flot.tooltip.min.js')}}"></script>
<script src="{{asset('js/plugins/flot/jquery.flot.resize.js')}}"></script>
<script src="{{asset('js/plugins/flot/jquery.flot.pie.js')}}"></script>
<script src="{{asset('js/plugins/flot/jquery.flot.time.js')}}"></script>

<script>
    window._token = '{{ csrf_token() }}';
</script>
<script>
    $(document).ready(function() {
        window._token = '{{ csrf_token() }}';
        // $('input[name="daterange"]').daterangepicker();
        var fetch_graph_data = function(from, period) {
            // var period = $('#transaction_period a.active').data('period');
            $(".spn_hol").show();
            $('#google_chart_container').hide();
            $.ajax({
                url: '{{ route('admin.support.graph', app()->getLocale()) }}'
                , data: {
                    start_date: from
                    , period: period
                }
                , success: function(data) {
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
        $('#reportrange span').html(moment().subtract(6, 'days').format('DD.MM.YYYY') + ' - ' + moment().format('DD.MM.YYYY'));
        $('#reportrange').daterangepicker({
            format: 'DD.MM.YYYY'
            , startDate: moment().subtract(6, 'days')
            , endDate: moment()
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
    })
</script>

<script>

</script>

@endsection