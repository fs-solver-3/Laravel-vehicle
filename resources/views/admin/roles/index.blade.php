@extends('layouts.app')
@section('title', 'Роли')
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
            <div class="section-bottom-side filter-bottom-side">
                <div class="section-input-wrap">
                    <label>@lang('global.name'):</label>
                    <div class="section-select--input2 section-select--input__show"><span class="section-bg-text--content">Название..</span>
                        <input type="hidden" id="cargotypes" value="">
                        <div class="section-yellow-bg--wrap"></div>
                        <div class="section-select--popup__icon">
                            <svg class="icon icon-arrow-down-white ">
                                <use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#arrow-down-white')}}"></use>
                            </svg>
                        </div>
                        <ul class="section-select--popup__list">
                            @foreach ($permissions as $permission)
                            <li class="section-select--popup__item hover-text-color click-permission" data-type="{{$permission->id}}">{{ $permission->title }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section2 section-content-main--table">
        <div class="section-content--main__wrap box-bg2">
            <div class="section-content--main">
                <div class="section-top-side">
                    <div class="section-block--title">@lang('global.roles.title')</div>
                    <a href="{{ route('admin.roles.create', app()->getLocale()) }}" title="Create New Roles">
                    <div class="filter-side--right">
                        <div class="section-top-added gogocar-arrow-button">
                            <svg class="icon icon-plus ">
                                <use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#plus')}}"></use>
                            </svg>
                        </div>
                    </div>
                    </a>
                </div>
                <div class="section-bottom-side--scroll table-content">
                    @include('admin.roles.table_template')
                </div>
                <div class="section-bottom-pagination--wrap">
                    <div class="section-bottom--delete gogocar-arrow-button">
                        <svg class="icon icon-delete ">
                            <use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#delete')}}"></use>
                        </svg>
                    </div>
                    <div class="section-bottom-pagination"></div>
                </div>
            </div>
        </div>
    </section>
    <!-- .section-content-main--table-->
    <section class="section3 section-content-main-mobile--table">
        <div class="section-content--main-mobile__wrap">
            <div class="section-content--main box-bg2 pb-20px">
                <div class="section-top-side box-bg-mobile2">
                    <div class="section-block--title">@lang('global.roles.title')</div>
                    <div class="filter-side--right">
                        <div class="section-top-added gogocar-arrow-button">
                            <svg class="icon icon-plus ">
                                <use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#plus')}}"></use>
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="section-bottom-side--mobile__list table-content-mobile">
                    @include('admin.roles.table_template_mobile')
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
        @can('role_delete')
            window.route_mass_crud_entries_destroy = '{{ route('admin.roles.mass_destroy', app()->getLocale()) }}';
        @endcan

    </script>
@include('includes.admin_column_modal')
@include('includes.admin_setting_modal')
@endsection
@section('add_custom_script')
<script>
  window._token = '{{ csrf_token() }}';
    function filter_trip(){
        if($('#cargotypes').parent().parent().css('display') != 'none')
        {
            var permissions = $('#cargotypes').val();
        }
        $.ajax({
            type:'POST',
            headers: {
                'X-CSRF-TOKEN': _token
            },
            url: "{{ route('admin.roles.filter', app()->getLocale()) }}",
            data: {
                permissions: permissions
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

    $(document).on("click", '.section-arrow-mobile-table', function(){
        $(this).toggleClass('active');
        $(this).parents('.section-bottom-side--mobile__item').next().slideToggle(200).css('display','flex');
    });
    $(document).on("click", '.section-tbody--show__popup', function(){
        $('.section-tbody--modal--table,.left-and-right-side').addClass('active');
        $(this).children('.section-tbody--modal--table__mobile').addClass('active');
    });
    $(document).ready(function() {
        filter_trip();

        $('#cargotypes').change(function(){
            filter_trip();
        })
    })
</script>
@endsection