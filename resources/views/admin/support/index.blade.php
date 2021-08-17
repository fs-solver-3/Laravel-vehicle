@extends('layouts.app')
@section('title', 'Рабочий стол')
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
    <div class="filter-main box-bg2">
        <div class="section-top-side">
            <div class="section-block--title">@lang('global.filter_name')</div>
            <div class="filter-side--right">
                <div class="filter-settings gogocar-arrow-button" id="table-button" data-toggle="modal" data-target="#settingModal">
                    <svg class="icon icon-settings ">
                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite_admin.svg#settings') }}"></use>
                    </svg>
                </div>
               <div class="filter-show-and-hide gogocar-arrow-button">
                   <svg class="icon icon-arrow-down-white ">
                       <use xlink:href="{{ asset('static/img/svg/symbol/sprite_admin.svg#arrow-down-white') }}"></use>
                   </svg>
               </div>
            </div>
        </div>
        <div class="section-bottom-side filter-balance-bottom row m-0">
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 section-input-wrap pl-0">
                <label>@lang('global.interval'):</label>
                <div class="section-select--input2 section-select--input__show"><span>@lang('global.not_set')</span>
                    <input type="hidden" id="selected_period" value="all">
                    <div class="section-select--popup__icon">
                        <svg class="icon icon-arrow-down-white ">
                            <use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#arrow-down-white')}}"></use>
                        </svg>
                    </div>
                    <ul class="section-select--popup__list section-select--popup__list__show">
                           <li class="section-select--popup__item2 hover-text-color click_period" data-type="day">@lang('global.day')</li>
                           <li class="section-select--popup__item2 hover-text-color click_period" data-type="month">@lang('global.month')</li>
                           <li class="section-select--popup__item2 hover-text-color click_period" data-type="year">@lang('global.year')</li>
                    </ul>
                </div>
            </div>
            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-6 section-balance-filter--date p-0">
                <label>Дата:</label>
                <div class="section-balance-filter--date__wrap">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 section-input-wrap pl-0">
                        <div class="section-balance-filter-date__wrap">
                            <input class="input-main calendar-filter-transaction calendar-zone-height" type="text" id="to_date">
                            <div class="section-balance-date--icon">
                                <svg class="icon icon-calendar ">
                                    <use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#calendar')}}"></use>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 section-input-wrap pr-0">
                        <div class="section-balance-filter-date__wrap">
                            <input class="input-main calendar-filter-transaction calendar-zone-height" type="text" id="from_date">
                            <div class="section-balance-date--icon">
                                <svg class="icon icon-calendar ">
                                    <use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#calendar')}}"></use>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section-2">
    <div class="support-main box-bg2">
        <div class="section-top-side">
            <div class="section-block--title">@lang('global.support.tp_desktop')</div>
            {{-- <div class="support-time-server">Время на сервере: <span>20.05.2020 11:37:31</span></div> --}}
            <div class="support-time-server">@lang('global.support.time'): <span id="time"></span></div>
        </div>
    </div>
</section>
<section class="section-3">
    <div id="support_index_container">
        @include('admin.support.index_template')
    </div>
</section>
@include('includes.admin_column_modal')
@include('includes.admin_setting_modal')


@endsection
@section('add_custom_script')
<script src="{{asset('static/js/datepicker.js')}}"></script>
<script src="{{asset('static/js/datepicker.ru-RU.js')}}"></script>
{{-- <script src="{{asset('js/bootstrap-datepicker.js')}}" type="text/javascript"></script> --}}
{{-- <script src="{{ url('adminlte/js') }}/bootstrap.min.js"></script> --}}
<script src="{{ url('adminlte/js') }}/select2.full.min.js"></script>
{{-- <script src="{{ url('js/admin') }}/support.js"></script> --}}

<script src="{{ url('adminlte/plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
<script src="{{ url('adminlte/plugins/fastclick/fastclick.js') }}"></script>
<script>
    window._token = '{{ csrf_token() }}';
</script>
<script>
    let date = new Date();

    setInterval(() => {
        date.setSeconds(date.getSeconds() + 1);

        // let time = `${date.getHours()}:${date.getMinutes()}:${date.getSeconds()}`;
        var month=date.getMonth()+1;
        var day=date.getDate();
        var year=date.getFullYear();
        if (month <10 ){month='0' + month;} if (day <10 ){day='0' + day;} 
        var x3=day + '-' + month + '-' + year;

        var hour=date.getHours();
        var minute=date.getMinutes();
        var second=date.getSeconds();
        if(hour <10 ){hour='0' +hour;} if(minute <10 ) {minute='0' + minute; } if(second<10){second='0' + second;} 
        var x3 = x3 + ' ' +  hour+':'+minute+':'+second

        document.getElementById('time').innerText = x3;
    }, 1000);
    // $(function() {
    $(document).ready(function() {
        $('.select2').select2();
        $('#users').select2({
            minimumInputLength: 1, 
            ajax: {url: '{{ route("api.users.search") }}', 
                dataType: 'json', 
            }, 
        });

        function setdate(get_data) {
            var dateString = $('#from_date').datepicker("getDate");
            if(get_data == 'day'){
                dateString.setDate(dateString.getDate()-7);
                $('#to_date').datepicker('setDate', dateString);
            }
            else if(get_data == 'month'){
                dateString.setMonth(dateString.getMonth()-1);
                $('#to_date').datepicker('setDate', dateString);
            }
            else if(get_data == 'year'){
                dateString.setYear(dateString.getFullYear()-1);
                $('#to_date').datepicker('setDate', dateString);
            }
        }

        $('#from_date').on('change', function(){
            fetch_data();
            // var get_data = $('#selected_period').val();
            //  setdate(get_data);
        });
        $('#to_date').on('change', function(){
             fetch_data();
        });

        $('.click_period').click(function () {
            var get_data = $(this).data('type');
            $('#selected_period').val(get_data);
            setdate(get_data);
        });
       

        function fetch_data() {
            //  var period = $('#transaction_period a.active').data('period');
            //      query  = $('#directions_id').val();
            var users = $('#users').select2("val");
            var start_date = $('#from_date').val();
            var end_date = $('#to_date').val();
            // start_date = $('#start_date').val().split(".").reverse().join("-");
            // start_date = $('#end_date').val().split(".").reverse().join("-");

            $.ajax({
                url: '{{ route('admin.support.index', app()->getLocale()) }}', 
                data: {
                    from_date: start_date, 
                    to_date: end_date
                }, 
                success: function(data) {
                    $('#support_index_container').html('');
                    $('#support_index_container').html(data);
                    if (document.startDateFeach) {
                        document.startDateFeach = false;
                        setTimeout(function() {
                            //  alert("Hello"); 
                            document.endDateStart = false;
                        }, 1000);
                    }
                    if (document.endDateFeach) document.endDateFeach = false;
                    if (document.durationDateFeach) document.durationDateFeach = false;
                }
            })
        }

    })
</script>
@endsection