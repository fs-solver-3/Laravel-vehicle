@extends('layouts.app')
@section('title', 'Отчет о прибыли')
@section('add_css')
<link href="{{asset('css/dashboard.css')}}" rel="stylesheet">
<link href="{{asset('css/plugins/daterangepicker-bs3.css')}}" rel="stylesheet">
<script src="{{asset('js/jquery-3.4.1.js')}}" type="text/javascript"></script>
@endsection
@section('admin_lang')
@include('includes.admin_flag')
@endsection
@section('content')
 <section class="section-1">
     <div class="filter-main box-bg2">
         <div class="section-top-side">
             <div class="section-block--title">@lang('global.dashboard_all.profit')</div>
             <div class="filter-side--right">
                 <div class="filter-settings gogocar-arrow-button" data-toggle="modal" data-target="#settingModal">
                     <svg class="icon icon-settings ">
                         <use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#settings')}}"></use>
                     </svg>
                 </div>
                 <div class="filter-show-and-hide gogocar-arrow-button">
                     <svg class="icon icon-arrow-down-white ">
                         <use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#arrow-down-white')}}"></use>
                     </svg>
                 </div>
             </div>
         </div>
         <div class="section-bottom-side filter-balance-bottom row m-0">
             <div class="col-xl-12 col-lg-12 col-md-12 col-sm-6 section-input-wrap p-0">
                 <label>@lang('global.users.title'):</label>
                 <select class="form-control select2" id="user_id">
                    <option value="" selected>@lang('global.all')</option>
                     @foreach ($users as $key => $user)
                     <option value="{{ $user->id }}">
                         {{ $user->name }}
                     </option>
                     @endforeach
                 </select>
             </div>
             <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 section-input-wrap pl-0">
                 <label>Интервал:</label>
                 <div class="section-select--input2 section-select--input__show"><span>@lang('global.not_set')</span>
                    <input type="hidden" id="selected_period" value="all">
                     <div class="section-select--popup__icon">
                         <svg class="icon icon-arrow-down-white ">
                             <use xlink:href="{{ asset('static/img/svg/symbol/sprite_admin.svg#arrow-down-white')}}"></use>
                         </svg>
                     </div>
                     <ul class="section-select--popup__list section-select--popup__list__show">
                         <li class="section-select--popup__item2 hover-text-color click_period" data-type="day">@lang('global.day')</li>
                         <li class="section-select--popup__item2 hover-text-color click_period" data-type="month">@lang('global.month')</li>
                         <li class="section-select--popup__item2 hover-text-color click_period" data-type="year">@lang('global.year')</li>
                     </ul>
                 </div>
             </div>
             <div class="col-xl-8 col-lg-8 col-md-8 col-sm-6 section-balance-filter--date p-0 section-input-wrap">
                 <label>@lang('global.date'):</label>
                 <div class="section-balance-filter--date__wrap">
                     <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 pl-0 pr-0">
                         <div class="section-balance-filter-date__wrap">
                             <input class="input-main calendar-filter-transaction calendar-zone-height" type="text" id="to_date">
                             <div class="section-balance-date--icon">
                                 <svg class="icon icon-calendar ">
                                     <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#calendar')}}"></use>
                                 </svg>
                             </div>
                         </div>
                     </div>
                     <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 section-input-wrap pr-0">
                         <div class="section-balance-filter-date__wrap">
                             <input class="input-main calendar-filter-transaction calendar-zone-height" type="text" id="from_date">
                             <div class="section-balance-date--icon">
                                 <svg class="icon icon-calendar ">
                                     <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#calendar')}}"></use>
                                 </svg>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </section>
 <div id="profilt-container">
     @include('admin.dashboard.profit_template')
 </div>
@include('includes.admin_column_modal')
@include('includes.admin_setting_modal')
@endsection
@section('add_custom_script')
{{-- <script src="{{ asset('js/bootstrap.min.js')}}"></script> --}}
<script src="{{ asset('js/plugins/metisMenu/jquery.metisMenu.js')}}"></script>
<script src="{{ asset('js/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>
<script src="{{ asset('js/plugins/chartJs/Chart.min.js')}}"></script>
<!-- Morris -->
<script src="{{ asset('js/plugins/morris/raphael-2.1.0.min.js')}}"></script>
<script src="{{ asset('js/plugins/morris/morris.js')}}"></script>

<!-- Custom and plugin javascript -->
{{-- <script src="{{ asset('js/inspinia.js')}}"></script> --}}
<script src="{{ asset('js/plugins/pace/pace.min.js')}}"></script>
<script src="{{ asset('js/bootstrap-datepicker.js')}}" type="text/javascript"></script>
<script src="{{ asset('js/plugins/fullcalendar/moment.min.js')}}"></script>
<script src="{{ asset('js/plugins/daterangepicker/daterangepicker.js')}}" type="text/javascript"></script>
<script src="{{ url('adminlte/js') }}/select2.full.min.js"></script>
<!-- Morris demo data-->
{{-- <script src="{{ asset('js/demo/morris-demo.js')}}"></script> --}}
<script>
    // $(function() {
    function filter_trip(){
        if($('#user_id').parent().css('display') != 'none')
        {
            var user_id = $('#user_id').val();
        }
        if($('#from_date').parent().parent().parent().parent().css('display') != 'none')
        {
            var from_date = $('#from_date').val();
            var to_date = $('#to_date').val();
        }
        if(from_date != "" && to_date != "" && from_date != to_date){
            $.ajax({
                type:'GET',
                headers: {
                    'X-CSRF-TOKEN': _token
                },
                url: "{{ route('admin.dashboard.profit', app()->getLocale()) }}",
                data: {
                    user_id: user_id,
                    from_date: from_date,
                    to_date: to_date
                },
                success: (data) => {
                    $('#profilt-container').html(data['template']);
                    // $('.table-content-mobile').html(data['template_mobile']);
                },
                error: function(data){
                    console.log(data);
                }
            });
        }
    }
    $(document).ready(function() {
        $('.select2').select2();
        window._token = '{{ csrf_token() }}';
        $("#user_id").change(function(){
            filter_trip();
        });
        // var dateString = new Date();
        // $('#from_date').datepicker('setDate', dateString);
        // setdate('day');
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
        $('.click_period').click(function () {
            var get_data = $(this).data('type');
            $('#selected_period').val(get_data);
            setdate(get_data);
        });
        $(document).on("click", '.section-arrow-mobile-table', function(){
            $(this).toggleClass('active');
            $(this).parents('.section-bottom-side--mobile__item').next().slideToggle(200).css('display','flex');
        });
        $(document).on("click", '.section-tbody--show__popup', function(){
            $('.section-tbody--modal--table,.left-and-right-side').addClass('active');
            $(this).children('.section-tbody--modal--table__mobile').addClass('active');
        });
        $('#from_date').on('change', function(){
            var get_data = $('#selected_period').val();
            if($('#selected_period').parent().parent().css('display') == 'none'){
                filter_trip();
            }
            else{
                setdate(get_data);
            }
        });
        $('#to_date').on('change', function(){
            filter_trip();
        });
    });
</script>

@endsection