@inject('request', 'Illuminate\Http\Request')
@section('title', 'Пользователи')
@extends('layouts.app')
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
        <div class="section-bottom-side filter-bottom-side row m-0">
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 section-input-wrap pl-0">
              <label>@lang('global.users.fields.id'):</label>
              <input class="input-main" type="text" placeholder="" id="user_id">
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 section-input-wrap pl-0">
              <label>@lang('global.users.fields.name'):</label>
              <input class="input-main" type="text" placeholder="" id="user_name">
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 section-input-wrap pl-0">
              <label>@lang('global.users.fields.email'):</label>
              <input class="input-main" type="text" placeholder="" id="user_email">
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 section-input-wrap pl-0">
                <label>@lang('global.users.fields.role'):</label>
                <div class="section-select--input section-select--input__show"><span></span>
                    <input type="hidden" id="role_id">
                    <div class="section-select--popup__icon">
                        <svg class="icon icon-arrow-down-white ">
                            <use xlink:href="{{ asset('static/img/svg/symbol/sprite_admin.svg#arrow-down-white') }}"></use>
                        </svg>
                    </div>
                    <ul class="section-select--popup__list section-select--popup__list__show">
                        <li class="section-select--popup__item2 hover-text-color click-role" data-type="">All</li>
                        @foreach ($roles as  $role)
                        <li class="section-select--popup__item2 hover-text-color click-role" data-type="{{$role->id}}">{{ $role->title }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 section-input-wrap pl-0">
                <label>@lang('global.users.fields.activity'):</label>
                <div class="section-select--input2 section-select--input__show"><span>All</span>
                    <input type="hidden" id="confirmed" value="">
                    <div class="section-select--popup__icon">
                        <svg class="icon icon-arrow-down-white ">
                            <use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#arrow-down-white')}}"></use>
                        </svg>
                    </div>
                    <ul class="section-select--popup__list section-select--popup__list__show">
                        <li class="section-select--popup__item2 hover-text-color click_confirm" data-type = ''>@lang('global.all')</li>
                        <li class="section-select--popup__item2 hover-text-color click_confirm" data-type = '1'>@lang('global.users.fields.active')</li>
                        <li class="section-select--popup__item2 hover-text-color click_confirm" data-type = '0'>@lang('global.users.fields.inactive')</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!--.section-remove--pdd-->
<section class="section2 section-content-main--table">
    <div class="section-content--main__wrap box-bg2">
        <div class="section-content--main">
            <div class="section-top-side">
                <div class="section-block--title">@lang('global.users.title')</div>
                <div class="filter-side--right">
                    <div class="section-top-added gogocar-arrow-button">
                        <a href="{{ route('admin.users.create', app()->getLocale()) }}" title="Create New Users">
                            <svg class="icon icon-plus ">
                                <use xlink:href="{{ asset('static/img/svg/symbol/sprite_admin.svg#plus') }}"></use>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            <div class="table-content">
                @include('admin.users.table_template')
            </div>
            <div class="section-bottom-pagination--wrap">
                <div class="section-bottom--delete gogocar-arrow-button">
                    <svg class="icon icon-delete ">
                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite_admin.svg#delete') }}"></use>
                    </svg>
                </div>
                <div class="section-bottom-pagination"></div>
            </div>
        </div>
    </div>
</section>
<section class="section3 section-content-main-mobile--table">
    <div class="section-content--main-mobile__wrap">
        <div class="section-content--main box-bg2 pb-20px">
            <div class="section-top-side box-bg-mobile2">
                <div class="section-block--title">@lang('global.users.title')</div>
                <div class="filter-side--right">
                    <a href="{{ route('admin.users.create', app()->getLocale()) }}" title="Create New Users">
                    <div class="section-top-added gogocar-arrow-button">
                        <svg class="icon icon-plus ">
                            <use xlink:href="{{ asset('static/img/svg/symbol/sprite_admin.svg#plus') }}"></use>
                        </svg>
                    </div>
                    </a>
                </div>
            </div>
            <div class="section-bottom-side--mobile__list table-content-mobile">
                <!-- Элемент мобильной таблицы-->
                @include('admin.users.table_template_mobile')
            </div>
            <div class="section-bottom-pagination--wrap mt-20px">
                <!--.section-bottom--delete.gogocar-arrow-button-->
                <!--    +icon('delete')-->
                <div class="section-bottom-pagination"></div>
            </div>
        </div>
    </div>
</section>
<script>
    window.route_mass_crud_entries_destroy = '{{ route('admin.users.mass_destroy', app()->getLocale()) }}';
</script>
@include('includes.admin_column_modal')
@include('includes.admin_setting_modal')
@endsection
@section('add_custom_script')
<script>
  window._token = '{{ csrf_token() }}';
    $("#user_id").keyup(function(){
        filter_trip();
    });
    $("#user_name").keyup(function(){
        filter_trip();
    });
    $("#user_email").keyup(function(){
        filter_trip();
    });
    function filter_trip(){
        if($('#user_id').parent().css('display') != 'none')
        {
            var user_id = $('#user_id').val();
        }
        if($('#user_name').parent().css('display') != 'none')
        {
            var user_name = $('#user_name').val();
        }
        if($('#user_email').parent().css('display') != 'none')
        {
            var user_email = $('#user_email').val();
        }
        if($('#role_id').parent().parent().css('display') != 'none')
        {
            var user_role = $('#role_id').val();
        }
        if($('#confirmed').parent().parent().css('display') != 'none')
        {
            var confirmed = $('#confirmed').val();
        }
        $.ajax({
            type:'POST',
            headers: {
                'X-CSRF-TOKEN': _token
            },
            url: "{{ route('admin.users.filter', app()->getLocale()) }}",
            data: {
                user_id: user_id,
                user_name: user_name,
                user_email: user_email,
                confirmed: confirmed,
                user_role: user_role
            },
            success: (data) => {
                $('.table-content').html(data['template']);
                $('.table-content-mobile').html(data['template_mobile']);
                pagination_table();
            },
            error: function(data){
                console.log(data);
            }
        });
    }
  function pagination_table() {
        var items_wrap = $('.section-content--main');
        for(let item of items_wrap){
            let items = $(item).find('.section-data-container--item');
            let numItems = items.length;console.log(numItems);
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
    $('.click-role').click(function () {
        var get_data = $(this).data('type');
        $('#role_id').val(get_data);
        filter_trip();
    });
    $('.click_confirm').click(function () {
        var get_data = $(this).data('type');
        $('#confirmed').val(get_data);
        filter_trip();
    });
    // $(document).on("click", '.section-arrow-mobile-table', function(){
    //     $(this).toggleClass('active');
    //     $(this).parents('.section-bottom-side--mobile__item').next().slideToggle(200).css('display','flex');
    // });
    $(document).on("click", '.section-tbody--show__popup', function(){
        $('.section-tbody--modal--table,.left-and-right-side').addClass('active');
        $(this).children('.section-tbody--modal--table__mobile').addClass('active');
    });
    $(document).ready(function() {
    //   filter_trip();
    })
    
</script>
@endsection