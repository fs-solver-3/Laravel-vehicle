@extends('layouts.app')
@section('title', 'Грузовое Авто')
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
                   <label>ID</label>
                   <input class="input-main" type="text" placeholder="ID..." id="truck_id">
               </div>
               <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 section-input-wrap pr-0">
                   <label>@lang('global.car.fields.owner'):</label>
                   <select class="form-control select2" id="user_id">
                       <option value="" style="display: none;" disabled selected>@lang('global.not_set')</option>
                       <option value="">@lang('global.all')</option>
                       @foreach ($users as $key => $user)
                       <option value="{{ $user->id }}">
                           {{ $user->name }}
                       </option>
                       @endforeach
                   </select>
               </div>
               <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 section-input-wrap pl-0">
                   <label>@lang('global.car.fields.brand')</label>
                    {{-- <input class="input-main" type="text" placeholder="" id="truck_name"> --}}
                    <select class="input-main select2" id="car_name">
                        <option value="" style="display: none;" disabled selected>@lang('global.not_set')</option>
                        <option value="" data-brand-id="all">@lang('global.all')</option>
                        @foreach ($brands as $key => $item)
                        <option value="{{ $item->name }}" data-brand-id="{{$item->id}}">
                            {{ $item->name }}
                        </option>
                        @endforeach
                    </select>
                   
               </div>
               <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 section-input-wrap pr-0">
                   <label>@lang('global.car.fields.model')</label>
                    {{-- <input class="input-main" type="text" placeholder="" id="truck_model"> --}}
                    <select class="input-main select2" id="car_model">
                        @include('includes.car_models')
                    </select>
               </div>
               <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 section-input-wrap pl-0">
                   <label>@lang('global.car.fields.color')</label>
                   {{-- <input class="input-main" type="text" placeholder="" id="truck_color"> --}}
                   <div class="section-select--input2 section-select--input__show"><span class="color_part">@lang('global.not_set')</span>
                       <input type="hidden" name="color" id="truck_color" value="">
                       <div class="section-select--popup__icon">
                           <svg class="icon icon-arrow-down-white ">
                               <use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#arrow-down-white')}}"></use>
                           </svg>
                       </div>
                       <ul class="section-select--popup__list section-select--popup__list__show">
                           <li class="section-select--popup__item3 hover-text-color click_color" data-type=''>@lang('global.all')</li>
                       @foreach ($colors as $color)
                           <li class="section-select--popup__item3 hover-text-color click_color" data-type="{{$color->color}}"><div style="background-color: {{$color->color}}">{{$color->color}}</div></li>
                       @endforeach
                       </ul>
                   </div>
               </div>
               <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 section-input-wrap pr-0">
                   <label>@lang('global.car.fields.year')</label>
                   <input class="input-main" type="text" placeholder="" id="truck_year">
               </div>
               {{-- <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 section-input-wrap pl-0">
                   <label>Carcase Type</label>
                   <input class="input-main" type="text" placeholder="" id="truck_type">
               </div> --}}
               <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 section-input-wrap pl-0">
                   <label>@lang('global.car.fields.number')</label>
                   <input class="input-main" type="text" placeholder="" id="truck_number">
               </div>
               <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 section-input-wrap pr-0">
                   <label>@lang('global.car.fields.body_type')</label>
                   <select class="form-control select2" id="truck_bodytype">
                       <option value="" style="display: none;" disabled selected>@lang('global.not_set')</option>
                       <option value="">@lang('global.all')</option>
                       @foreach ($bodytypes as $key => $bodytype)
                       <option value="{{ $bodytype->id }}">
                           {{ $bodytype->name }}
                       </option>
                       @endforeach
                   </select>
               </div>
               <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 section-input-wrap pl-0">
                   <label>@lang('global.truck.fields.capacity')</label>
                   <input class="input-main" type="text" placeholder="" id="truck_capacity">
               </div>
               <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 section-input-wrap pr-0">
                   <label>@lang('global.truck.fields.place')</label>
                   <input class="input-main" type="text" placeholder="" id="truck_place">
               </div>
               <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 section-input-wrap pl-0">
                   <label>@lang('global.truck.fields.max_size')</label>
                   <input class="input-main" type="text" placeholder="" id="truck_max_size">
               </div>
           </div>
       </div>
   </section>
    <section class="section-2 section-content-main--table">
        <div class="section-content--main__wrap box-bg2">
            <div class="section-content--main table-content">
                @include('admin.trucks.table_template')
            </div>
        </div>
    </section>
    <section class="section3 section-content-main-mobile--table">
        <div class="section-content--main-mobile__wrap">
            <div class="section-content--main box-bg2 pb-20px table-content-mobile">
                @include('admin.trucks.table_template_mobile')
            </div>
        </div>
    </section>
<script>
    window.route_mass_crud_entries_destroy = '{{ route('admin.truck.mass_destroy', app()->getLocale()) }}';
</script>
@include('includes.admin_column_modal')
@include('includes.admin_setting_modal')
@endsection
@section('add_custom_script')

<script src="{{asset('js/jquery-3.4.1.js')}}" type="text/javascript"></script>
<script src="{{asset('js/select2.full.min.js')}}" type="text/javascript" defer></script>
<script>
    window._token = '{{ csrf_token() }}';

    $(document).ready(function() {
        $('.select2').select2();
        // $('#user_id').select2({
        //     minimumInputLength: 1
        //     , ajax: {
        //         url: '{{ route("api.users.search") }}'
        //         , dataType: 'json'
        //     , }
        // , });
        filter_trip();
    });

    $("#truck_id").keyup(function(){
        filter_trip();
    });
    $("#car_model").change(function(){
        filter_trip();
    });
    $("#car_name").change(function(){
        filter_trip();
    });
    // $("#truck_color").keyup(function(){
    //     filter_trip();
    // });
    $("#truck_year").keyup(function(){
        filter_trip();
    });
    $("#truck_type").keyup(function(){
        filter_trip();
    });
    $("#truck_number").keyup(function(){
        filter_trip();
    });
    $("#truck_capacity").keyup(function(){
        filter_trip();
    });
    $("#truck_place").keyup(function(){
        filter_trip();
    });
    $("#truck_max_size").keyup(function(){
        filter_trip();
    });
    $("#user_id").change(function(){
        filter_trip();
    });
    $("#truck_bodytype").change(function(){
        filter_trip();
    });
    function filter_trip(){
        if($('#truck_id').parent().css('display') != 'none')
        {
            var truck_id = $('#truck_id').val();
        }
        if($('#car_model').parent().css('display') != 'none')
        {
            var truck_model = $('#car_model').val();
        }
        if($('#car_name').parent().css('display') != 'none')
        {
            var truck_name = $('#car_name').val();
        }
        if($('#truck_color').parent().parent().css('display') != 'none')
        {
            var truck_color = $('#truck_color').val();
        }
        if($('#truck_year').parent().css('display') != 'none')
        {
            var truck_year = $('#truck_year').val();
        }
        if($('#truck_type').parent().css('display') != 'none')
        {
            var truck_type = $('#truck_type').val();
        }
        if($('#truck_number').parent().css('display') != 'none')
        {
            var truck_number = $('#truck_number').val();
        }
        if($('#truck_capacity').parent().css('display') != 'none')
        {
            var truck_capacity = $('#truck_capacity').val();
        }
        if($('#truck_place').parent().css('display') != 'none')
        {
            var truck_place = $('#truck_place').val();
        }
        if($('#truck_max_size').parent().css('display') != 'none')
        {
            var truck_max_size = $('#truck_max_size').val();
        }
        if($('#user_id').parent().css('display') != 'none')
        {
            var user_id = $('#user_id').val();
        }
        if($('#truck_bodytype').parent().css('display') != 'none')
        {
            var truck_bodytype = $('#truck_bodytype').val();
        }
        $.ajax({
            type:'POST',
            headers: {
                'X-CSRF-TOKEN': _token
            },
            url: "{{ route('admin.truck.filter', app()->getLocale()) }}",
            data: {
                truck_id: truck_id,
                user_id: user_id,
                truck_model: truck_model,
                truck_name: truck_name,
                truck_color: truck_color,
                truck_year: truck_year,
                truck_type: truck_type,
                truck_number: truck_number,
                truck_place: truck_place,
                truck_max_size: truck_max_size,
                truck_bodytype: truck_bodytype,
                truck_capacity: truck_capacity
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
    $(document).on("click", '.click_color', function(){
        var get_user = $(this).html();
        var get_data = $(this).data('type');
        $(this).parents('.section-select--input__show').children('span').html(get_user);
        $('#truck_color').val(get_data);
        filter_trip();
    });
</script>
@endsection