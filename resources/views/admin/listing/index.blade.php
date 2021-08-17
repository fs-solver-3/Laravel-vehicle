@extends('layouts.app')
@section('title', 'Trips')
@section('admin_lang')
@include('includes.admin_flag')
@endsection
@section('content')

<section class="section-1">
    @if(Session::has('success_message'))
        <div class="alert alert-success">
            <span class="glyphicon glyphicon-ok"></span>
            {!! session('success_message') !!}

            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">&times;</span>
            </button>

        </div>
    @endif
        <div class="filter-main box-bg2">
            <div class="section-top-side">
                <div class="section-block--title">@lang('global.filter_name')</div>
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
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 section-input-wrap pl-0">
                    <label>@lang('global.id'):</label>
                    <input class="input-main" type="text" placeholder="Название" id="listing_id">
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 section-input-wrap pr-0">
                    <label>@lang('global.users.title'):</label>

                    <select class="form-control select2" id="selected_user">
                        <option value="" selected>All</option>
                        @foreach ($users as $key => $user)
                        <option value="{{ $user->id }}">
                            {{ $user->name }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 section-input-wrap pl-0">
                    <label>@lang('global.interval'):</label>
                    <div class="section-select--input2 section-select--input__show" id="period"><span>Не установлен</span>
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
                <div class="col-xl-8 col-lg-8 col-md-8 col-sm-6 section-balance-filter--date p-0 section-input-wrap">
                    <label>Дата:</label>
                    <div class="section-balance-filter--date__wrap">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 pl-0">
                            <div class="section-balance-filter-date__wrap">
                                <input class="input-main calendar-filter-today calendar-zone-height" type="text" id="to_date">
                                <div class="section-balance-date--icon">
                                    <svg class="icon icon-calendar ">
                                        <use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#calendar')}}"></use>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 section-input-wrap pr-0">
                            <div class="section-balance-filter-date__wrap">
                                <input class="input-main calendar-filter calendar-zone-height" type="text" id="from_date">
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
    <section class="section-2 section-content-main--table">
        <div class="section-content--main__wrap box-bg2">
            <div class="section-content--main">
                <div class="section-top-side p-0">
                    <div class="section-overflow-top-side">
                        <ul class="section-users--tabs">
                            
                            <li class="section-tab-trip">
                                <a href="{{ route('admin.listing.create', app()->getLocale()) }}" title="Create New Trip" style="color: #fff">
                                    <svg class="icon icon-plus ">
                                        <use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#plus')}}"></use>
                                    </svg><span>@lang('global.listing.add_order')</span>
                                </a>
                            </li>
                            <li class="section-users--tab active" data-tab-users="trip-all" onclick="filter_trip('all');">@lang('global.listing.all')</li>
                            <li class="section-users--tab" data-tab-users="trip-archive" onclick="filter_trip('archive');">@lang('global.listing.archiving')</li>
                            <li class="section-users--tab" data-tab-users="trip-new" onclick="filter_trip('new');">@lang('global.listing.new')</li>
                            <li class="section-users--tab" data-tab-users="trip-active" onclick="filter_trip('active');">@lang('global.listing.active')</li>
                            <li class="section-users--tab" data-tab-users="trip-over" onclick="filter_trip('complete');">@lang('global.listing.complete')</li>
                            <li class="section-users--tab" data-tab-users="trip-pre" onclick="filter_trip('pre');">@lang('global.listing.preliminary')</li>
                            <li class="section-users--tab" data-tab-users="trip-people" onclick="filter_trip('passenger');">@lang('global.listing.passenger')</li>
                            <li class="section-users--tab" data-tab-users="trip-cargo" onclick="filter_trip('cargo');">@lang('global.listing.truck')</li>
                        </ul>
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
                <div class="trips-data">
                    @include('admin.listing.table_template')
                </div>
            </div>
        </div>
    </section>
    <!-- .section-content-main--table-->
    <section class="section3 section-content-main-mobile--table">
        <div class="section-content--main-mobile__wrap">
            <div class="section-content--main box-bg2 pb-20px">
                <div class="section-top-side box-bg-mobile2">
                    <div class="section-block--title">Группы</div>
                    <div class="filter-side--right">
                        <div class="section-top-added gogocar-arrow-button">
                            <svg class="icon icon-plus ">
                                <use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#plus')}}"></use>
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="trips-data-mobile">
                    @include('admin.listing.table_template_mobile')
                </div>
            </div>
        </div>
    </section>
<script>
    window.route_mass_crud_entries_destroy = '{{ route('admin.listing.mass_destroy', app()->getLocale()) }}';
</script>
@include('includes.admin_column_modal')
@include('includes.admin_setting_modal')
@endsection
@section('add_custom_script')

<script src="{{ url('adminlte/js') }}/select2.full.min.js"></script>
<script>
    window._token = '{{ csrf_token() }}';
    $("#listing_id").keyup(function(){
        filter_trip();
    });
    function filter_trip(type = 'all'){
        $(".spn_hol").show();
        $('.trips-data').html('');
        if($('#listing_id').parent().css('display') != 'none')
        {
            var listing_id = $('#listing_id').val();
        }
        if($('#selected_user').parent().css('display') != 'none')
        {
            var selected_user = $('#selected_user').val();
        }
        if($('#from_date').parent().parent().parent().parent().css('display') != 'none')
        {
            var from_date = $('#from_date').val();
            var to_date = $('#to_date').val();
        }
        if(from_date != "" && to_date != ""){
            $.ajax({
                type:'POST',
                headers: {
                    'X-CSRF-TOKEN': _token
                },
                url: "{{ route('admin.listing.filter', app()->getLocale()) }}",
                data: {
                    listing_id: listing_id,
                    selected_user: selected_user,
                    from_date: from_date,
                    to_date: to_date,
                    type: type
                },
                success: (data) => {
                    $(".spn_hol").hide();
                    $('.trips-data').html(data['template']);
                    $('.trips-data-mobile').html(data['template_mobile']);
                    pagination_table();
                    if (document.startDateFeach) {
                        document.startDateFeach = false;
                        setTimeout(function() {
                        document.endDateStart = false;
                        }, 1000);
                    }
                    if (document.endDateFeach){
                        setTimeout(function() {
                        document.endDateFeach = false;
                        }, 1000);
                    } 
                    if (document.durationDateFeach) document.durationDateFeach = false;
                },
                error: function(data){
                    console.log(data);
                }
            });
        }
    }
    function pagination_table() {
        var items_wrap = $('.section-content--main');
        for(let item of items_wrap){
            let items = $(item).find('.section-data-container--item');
            let numItems = items.length;
            let perPage = 10;

            items.slice(perPage).hide();

            if(numItems > perPage){
                $(item).find('.section-bottom-pagination').pagination({
                    items: numItems,
                    itemsOnPage: perPage,
                    ellipsePageSet: false,
                    displayedPages: 4,
                    edges: 0,
                    prevText: '<div class="section-bottom-paginationprev gogocar-arrow-button-pagination"><svg class="icon icon-arrow-left "><use xlink:href="/static/img/svg/symbol/sprite_admin.svg#arrow-left"></use></svg></div>',
                    nextText: '<div class="section-bottom-paginationnext gogocar-arrow-button-pagination"><svg class="icon icon-arrow-left arrow-rotate "><use xlink:href="/static/img/svg/symbol/sprite_admin.svg#arrow-left"></use></svg></div>',
                    onPageClick: function (pageNumber) {
                        let showFrom = perPage * (pageNumber - 1);
                        let showTo = showFrom + perPage;
                        items.hide().slice(showFrom, showTo).show();
                        //$('.catalog-pag-show-items').text(showFrom);
                    }

                });
            } else if(numItems <= perPage){
                // $(item).find('.section-bottom-pagination--wrap').css('display','none');
            }
        }

    }
    function setdate(get_data) {
        var dateString = $('#from_date').datepicker("getDate");
        if(get_data == 'day'){
            dateString.setDate(dateString.getDate()+7);
        $('#to_date').datepicker('setDate', dateString);
        }
        else if(get_data == 'month'){
            dateString.setMonth(dateString.getMonth()+1);
        $('#to_date').datepicker('setDate', dateString);
        }
        else if(get_data == 'year'){
            dateString.setYear(dateString.getFullYear()+1);
        $('#to_date').datepicker('setDate', dateString);
        }
    }
    $('#selected_user').change(function () {
        filter_trip();
    });

    var duration = function () {
        $('.click_period').click(function () {
            var get_data = $(this).data('type');
            $('#selected_period').val(get_data);
            document.endDateStart = true;
            setdate(get_data);
            filter_trip();
            if (!document.endDateFeach) {
                document.durationDateFeach = true;
            }
        });
    };
    

    $(document).on("click", '.section-arrow-mobile-table', function(){
        $(this).toggleClass('active');
        $(this).parents('.section-bottom-side--mobile__item').next().slideToggle(200).css('display','flex');
    });
    $(document).on("click", '.section-tbody--show__popup', function(){
        $('.section-tbody--modal--table,.left-and-right-side').addClass('active');
        $(this).children('.section-tbody--modal--table__mobile').addClass('active');
    });
    $('#from_date').on('change', function(){
        // filter_trip();
        // var get_data = $('#selected_period').val();

        // if($('#selected_period').parent().parent().css('display') == 'none'){
        //     filter_trip();
        // }
        // else{
        //     setdate(get_data);
        if (!document.startDateFeach) {
            filter_trip();
            document.startDateFeach = true;
        }
        // }
    });
    document.endDateStart = true;
    $('#to_date').on('change', function(){
        filter_trip();
        if (!document.endDateFeach && !document.endDateStart) {
            filter_trip();
            document.endDateFeach = true;
        }
    });
    duration();
    $(document).ready(function() {
        $('.select2').select2();
    })
</script>

@endsection