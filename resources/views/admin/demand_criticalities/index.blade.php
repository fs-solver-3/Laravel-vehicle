@extends('layouts.app')
@section('title', 'Критичность')

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
                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite_admin.svg#settings')}}"></use>
                    </svg>
                </div>
                <div class="filter-show-and-hide gogocar-arrow-button">
                    <svg class="icon icon-arrow-down-white ">
                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite_admin.svg#arrow-down-white')}}"></use>
                    </svg>
                </div>
            </div>
        </div>
        <div class="section-bottom-side filter-balance-bottom row m-0">
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 section-input-wrap pl-0">
                <label for="search_id">@lang('global.id')</label>
                <input class="input-main" type="text" placeholder="ID..." id="search_id">
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 section-input-wrap pr-0">
                <label for="search_title">@lang('global.demand_categories.fields.title'):</label>
                <input class="input-main" type="text" placeholder="Заголовок..." id="search_title">
            </div>
        </div>
    </div>
</section>

<section class="section-2 section-content-main--table">
    <div class="section-content--main__wrap box-bg2">
        <div class="section-content--main">
            <div class="section-top-side">
                <div class="section-block-title-question">
                    <div class="section-block--title">@lang('global.demand_criticality.title')</div>
                </div>
                <div class="filter-side--right">
                    <a href="{{ route('admin.demand_criticality.create', app()->getLocale()) }}" title="Create New Demand Category">
                        <div class="section-top-added gogocar-arrow-button">
                            <svg class="icon icon-plus ">
                                <use xlink:href="{{ asset('static/img/svg/symbol/sprite_admin.svg#plus')}}"></use>
                            </svg>
                        </div>
                    </a>
                </div>
            </div>
            <div class="section-content--main table-content">
                @include('admin.demand_criticalities.table_template')
            </div>
        </div>
    </div>
</section>
<!-- .section-content-main--table-->
<section class="section3 section-content-main-mobile--table">
    <div class="section-content--main-mobile__wrap">
        <div class="section-content--main box-bg2 pb-20px">
            <div class="section-top-side box-bg-mobile2">
                <div class="section-block--title">@lang('global.demand_criticality.title')</div>
                <div class="filter-side--right">
                    <div class="section-top-added gogocar-arrow-button">
                        <svg class="icon icon-plus ">
                            <use xlink:href="{{ asset('static/img/svg/symbol/sprite_admin.svg#plus') }}"></use>
                        </svg>
                    </div>
                </div>
            </div>

            <div class="table-content-mobile">
                @include('admin.demand_criticalities.table_template_mobile')
            </div>

            <div class="section-bottom-pagination--wrap">
                <!--.section-bottom--delete.gogocar-arrow-button-->
                <!--    +icon('delete')-->
                <div class="section-bottom-pagination"></div>
            </div>
        </div>
    </div>
</section>

<script>
    window.route_mass_crud_entries_destroy = '{{ route('admin.demand_criticality.mass_destroy', app()->getLocale()) }}';
</script>
@include('includes.admin_column_modal')
@include('includes.admin_setting_modal')

@endsection
@section('add_custom_script')
<script defer>
    window._token = '{{ csrf_token() }}';
    $(document).ready(function() {
        var id;
        var title;
        var url = window.location.href;
        var filed_name = url + '-' + 'search_id';
        var storaged_val_1 = localStorage.getItem(filed_name);
        if (storaged_val_1 != null) {
            id = storaged_val_1;
        }

        filed_name = url + '-' + 'search_title';
        var storaged_val_2 = localStorage.getItem(filed_name);
        if (storaged_val_2 != null) {
            title = storaged_val_2;
        }

        $("#search_id").keyup(function() {
            id = $(this).val();
            fetch_data();
        });
        $("#search_title").keyup(function() {
            title = $(this).val();
            fetch_data();
        });

        fetch_data();

        function fetch_data() {
            $.ajax({
                type: 'GET', 
                headers: {
                    'X-CSRF-TOKEN': _token
                }, 
                url: "{{ route('admin.demand_criticality.index', app()->getLocale()) }}", 
                data: {
                    id: id, 
                    name: title
                }, 
                success: (data) => {
                    $('.table-content').html(data['template']);
				    $('.table-content-mobile').html(data['template_mobile']);
                    // pagination_table();
                }, 
                error: function(data) {
                    console.log(data);
                }
            });
        }

        $(document).on("click", '.section-arrow-mobile-table', function(){
            $(this).toggleClass('active');
            $(this).parents('.section-bottom-side--mobile__item').next().slideToggle(200).css('display','flex');
        });
        $(document).on("click", '.section-tbody--show__popup', function(){
            $('.section-tbody--modal--table,.left-and-right-side').addClass('active');
            $(this).children('.section-tbody--modal--table__mobile').addClass('active');
        });
    })
</script>
@endsection