@extends('layouts.app')
@section('title', 'Обращения')
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
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 section-input-wrap pl-0">
                <label>ID:</label>
                <input class="input-main" type="text" placeholder="Название" id="selected_id">
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 section-input-wrap pr-0">
                <label>@lang('global.interval'):</label>
                <div class="section-select--input2 section-select--input__show"><span>@lang('global.interval')</span>
                    <input type="hidden" value="" id="indicator">
                    <div class="section-select--popup__icon">
                        <svg class="icon icon-arrow-down-white ">
                            <use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#arrow-down-white') }}"></use>
                        </svg>
                    </div>
                    <ul class="section-select--popup__list section-select--popup__list__show">
                        <li class="section-select--popup__item2 hover-text-color click_indicator" data-type="">@lang('global.all')</li>
                        <li class="section-select--popup__item2 hover-text-color click_indicator" data-type="1">Status1</li>
                        <li class="section-select--popup__item2 hover-text-color click_indicator" data-type="2">Status2</li>
                        <li class="section-select--popup__item2 hover-text-color click_indicator" data-type="3">Status3</li>
                        <li class="section-select--popup__item2 hover-text-color click_indicator" data-type="4">Status4</li>
                        <li class="section-select--popup__item2 hover-text-color click_indicator" data-type="5">Status5</li>
                    </ul>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 section-input-wrap pl-0">
                <label>Интервал:</label>
                <div class="section-select--input2 section-select--input__show"><span>@lang('global.not_set')</span>
                    <input type="hidden" value="" id="selected_period">
                    <div class="section-select--popup__icon">
                        <svg class="icon icon-arrow-down-white ">
                            <use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#arrow-down-white') }}"></use>
                        </svg>
                    </div>
                    <ul class="section-select--popup__list section-select--popup__list__show">
                        {{-- <li class="section-select--popup__item2 hover-text-color">День</li>
                        <li class="section-select--popup__item2 hover-text-color">Месяц</li>
                        <li class="section-select--popup__item2 hover-text-color">Год</li> --}}
                        <li class="section-select--popup__item2 hover-text-color click_period" data-type="day">@lang('global.day')</li>
                        <li class="section-select--popup__item2 hover-text-color click_period" data-type="month">@lang('global.month')</li>
                        <li class="section-select--popup__item2 hover-text-color click_period" data-type="year">@lang('global.year')</li>
                    </ul>
                </div>
            </div>
            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-6 section-balance-filter--date p-0 section-input-wrap">
                <label>Дата:</label>
                <div class="section-balance-filter--date__wrap">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 pl-0">
                        <div class="section-balance-filter-date__wrap">
                            <input class="input-main calendar-filter-transaction calendar-zone-height" type="text" id="to_date">
                            <div class="section-balance-date--icon">
                                <svg class="icon icon-calendar ">
                                    <use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#calendar') }}"></use>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 pr-0">
                        <div class="section-balance-filter-date__wrap">
                            <input class="input-main calendar-filter-transaction calendar-zone-height" type="text" id="from_date">
                            <div class="section-balance-date--icon">
                                <svg class="icon icon-calendar ">
                                    <use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#calendar') }}"></use>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 section-input-wrap pl-0">
                <label id="apeal_active">@lang('global.support.active')</label>
                <div class="checkbox-input--tab__item">
                    <div class="checkbox-input" id="checkbox_div"></div>
                    <input class="checkbox-input--tab" type="checkbox" id="active"><span>@lang('global.support.active')</span>
                </div>
            </div>
        </div>
    </div>
</section>

<div id="support_index_container">
    @include('admin.support.appeal_template')
</div>
@include('includes.admin_column_modal')
@include('includes.admin_setting_modal')
@endsection
@section('add_custom_script')
<script>
    window._token = '{{ csrf_token() }}';
    $(document).ready(function() {

        function setdate(get_data) {
            var dateString = $('#from_date').datepicker("getDate");
            if (get_data == 'day') {
                dateString.setDate(dateString.getDate() - 7);
                $('#to_date').datepicker('setDate', dateString);
            } else if (get_data == 'month') {
                dateString.setMonth(dateString.getMonth() - 1);
                $('#to_date').datepicker('setDate', dateString);
            } else if (get_data == 'year') {
                dateString.setYear(dateString.getFullYear() - 1);
                $('#to_date').datepicker('setDate', dateString);
            }
        }

        $('#from_date').on('change', function() {
            fetch_data();
            // var get_data = $('#selected_period').val();
            // if($('#selected_period').parent().parent().css('display') == 'none'){
            // }
            // else{
            //     setdate(get_data);
            // }
        });
        $('#to_date').on('change', function() {
            fetch_data();
        });
        // $('#active').on('change', function() {
        //     fetch_data();
        // });

        $("#selected_id").keyup(function() {
            fetch_data();
        });
        $('.click_period').click(function() {
            var get_data = $(this).data('type');
            $('#selected_period').val(get_data);
            setdate(get_data);
        });
        $('#active').change(function() {
            if(this.checked) {
            }
            fetch_data();
        });
        $('.click_indicator').click(function() {
            var get_data = $(this).data('type');
            $('#indicator').val(get_data);
            fetch_data();
        });

        $(document).on("click", '.section-arrow-mobile-table', function() {
            $(this).toggleClass('active');
            $(this).parents('.section-bottom-side--mobile__item').next().slideToggle(200).css('display', 'flex');
        });
        $(document).on("click", '.section-tbody--show__popup', function() {
            $('.section-tbody--modal--table,.left-and-right-side').addClass('active');
            $(this).children('.section-tbody--modal--table__mobile').addClass('active');
        });

    })
    function fetch_data() {
        var selected_id = $('#selected_id').val();
        if($('#selected_id').parent().css('display') != 'none')
        {
        }
        if($('#indicator').parent().parent().css('display') != 'none')
        {
            var indicator = $('#indicator').val();
        }
        if($('#from_date').parent().parent().parent().parent().css('display') != 'none')
        {
            var start_date = $('#from_date').val();
            var end_date = $('#to_date').val();
        }
        if($('#active').parent().parent().css('display') != 'none')
        {
            if($('#active').prop("checked") == true){
                var active = true;
            }
            else{
                var active = false;
            }
        }
        if(start_date != "" && end_date != "" && start_date != end_date){
            $.ajax({
                type:'GET',
                headers: {
                    'X-CSRF-TOKEN': _token
                },
                url: "{{ route('admin.support.appeal', app()->getLocale()) }}", 
                data: {
                    id: selected_id,
                    indicator: indicator,
                    active: active,
                    start_date: start_date,
                    end_date: end_date
                }, 
                success: function(data) {
                    $('#support_index_container').html('');
                    $('#support_index_container').html(data);
                },
                error: function(data){
                    console.log(data);
                }
            })
        }
    }
    fetch_data();
</script>
@endsection