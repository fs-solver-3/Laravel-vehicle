@extends('layouts.app')
@section('title', 'Операции')
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
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger">
            <span class="glyphicon glyphicon-ok"></span>
            {{ $error }}
        
            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
     @endforeach
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
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-6 section-input-wrap pl-0">
                <label>@lang('global.transactions.fields.user'):</label>
                <select class="form-control select2" id="selected_user">
                  <option value="" selected>All</option>
                  @foreach ($users as $key => $user)
                  <option value="{{ $user->id }}">
                      {{ $user->name }}
                  </option>
                  @endforeach
                </select>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 section-input-wrap pl-0">
                <label>@lang('global.transactions.fields.operation_type'):</label>
                <div class="section-select--input2 section-select--input__show"><span>@lang('global.any')</span>
                    <input type="hidden" value="all" id="operation_method">
                    <div class="section-select--popup__icon">
                        <svg class="icon icon-arrow-down-white ">
                            <use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#arrow-down-white')}}"></use>
                        </svg>
                    </div>
                    <ul class="section-select--popup__list section-select--popup__list__show">
                        <li class="section-select--popup__item2 hover-text-color click_method" data-type="all">@lang('global.all')</li>
                        <li class="section-select--popup__item2 hover-text-color click_method" data-type="withdraw">@lang('global.transactions.fields.withdraw')</li>
                        <li class="section-select--popup__item2 hover-text-color click_method" data-type="replenishment">@lang('global.transactions.fields.replenishment')</li>
                        <li class="section-select--popup__item2 hover-text-color click_method" data-type="book">@lang('global.transactions.fields.book')</li>
                    </ul>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 section-input-wrap pr-0">
                <label>@lang('global.transactions.fields.state'):</label>
                <div class="section-select--input2 section-select--input__show"><span>@lang('global.all')</span>
                    <input type="hidden" value="all" id="status">
                    <div class="section-select--popup__icon">
                        <svg class="icon icon-arrow-down-white ">
                            <use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#arrow-down-white')}}"></use>
                        </svg>
                    </div>
                    <ul class="section-select--popup__list section-select--popup__list__show">
                        <li class="section-select--popup__item2 hover-text-color click_status" data-type="all">@lang('global.all')</li>
                        <li class="section-select--popup__item2 hover-text-color click_status" data-type="released">@lang('global.transactions.fields.released')</li>
                        <li class="section-select--popup__item2 hover-text-color click_status" data-type="pending">@lang('global.transactions.fields.pending')</li>
                    </ul>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 section-input-wrap pl-0">
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
            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-6 section-balance-filter--date p-0 section-input-wrap">
                <label>@lang('global.date'):</label>
                <div class="section-balance-filter--date__wrap">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 pl-0 pr-0">
                        <div class="section-balance-filter-date__wrap">
                            <input class="input-main calendar-filter-transaction calendar-zone-height" type="text" id="to_date">
                            <div class="section-balance-date--icon">
                                <svg class="icon icon-calendar ">
                                    <use xlink:href="{{asset('static/img/svg/symbol/sprite.svg#calendar')}}"></use>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 section-input-wrap pr-0">
                        <div class="section-balance-filter-date__wrap">
                            <input class="input-main calendar-filter-transaction calendar-zone-height" type="text" id="from_date">
                            <div class="section-balance-date--icon">
                                <svg class="icon icon-calendar ">
                                    <use xlink:href="{{asset('static/img/svg/symbol/sprite.svg#calendar')}}"></use>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section2 section-content-main--table">
    <div class="section-content--main__wrap box-bg2">
        <div class="section-content--main table-content">
            @include('admin.transactions.table_template')
        </div>
    </div>
</section>
<!-- .section-content-main--table-->
<section class="section3 section-content-main-mobile--table">
    <div class="section-content--main-mobile__wrap">
        <div class="section-content--main box-bg2 pb-20px table-content-mobile">
            @include('admin.transactions.table_template_mobile')
        </div>
    </div>
</section>
<div class="modal fade" id="popup-add" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <form class="modal-content" method="POST"
            action="{{ route("admin.transactions.replenish", app()->getLocale()) }}" id="replenish_transactions_form"
            name="replenish_users_form" accept-charset="UTF-8" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="popup-header">
                <div class="popup-close--icon close" data-dismiss="modal" aria-label="Close">
                    <svg class="icon icon-close ">
                        <use xlink:href="{{asset('static/img/svg/symbol/sprite.svg#close')}}"></use>
                    </svg>
                </div>
                <h3 class="popup-title">@lang('global.transactions.fields.balance')</h3>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label>@lang('global.transactions.fields.user'):</label>
                    <select class="form-control chosen-select select2 filter-column-form" id="search_user" name="user" required>
                        <option value="" selected>@lang('global.all')</option>
                        @foreach ($users as $key => $user)
                        <option value="{{ $user->id }}">
                            {{ $user->name }}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-6 section-input-wrap popup-input--wrap p-0">
                <label>@lang('global.transactions.fields.amount'):</label>
                <input class="input-main" type="number" placeholder="Введите сумму" name="amount" required>
            </div>
            <div class="popup-balance--buttons row">
                <div class="popup-balance--button">1000</div>
                <div class="popup-balance--button">5000</div>
                <div class="popup-balance--button">10000</div>
                <div class="popup-balance--button">20000</div>
                <div class="popup-balance--button">50000</div>
                <div class="popup-balance--button">100000</div>
            </div>
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-6 section-input-wrap popup-input--wrap p-0">
                <label>@lang('global.transactions.fields.comment'):</label>
                <textarea class="textarea-input" placeholder="Комментарий..." cols="4" rows="3" name="comment"></textarea>
            </div>
            <div class="popup-balance-checkboxes">
                <div class="popup-balance-checkbox--wrap">
                    <div class="popup-balance-checkbox"></div>
                    <input class="popup-balance-checkbox__input" for="type" type="checkbox" name="type[]"
                        value="Пополнение баланса"><span>@lang('global.transactions.fields.balance')</span>
                </div>
                <div class="popup-balance-checkbox--wrap">
                    <div class="popup-balance-checkbox"></div>
                    <input class="popup-balance-checkbox__input" for="type" type="checkbox" name="type[]"
                        value="Бонус к балансу"><span>@lang('global.transactions.fields.bonus')</span>
                </div>
                <div class="popup-balance-checkbox--wrap">
                    <div class="popup-balance-checkbox"></div>
                    <input class="popup-balance-checkbox__input" for="type" type="checkbox" name="type[]"
                        value="Бонус по промокоду"><span>@lang('global.transactions.fields.promo_code')</span>
                </div>
            </div>
            <div class="popup-section-button">
                <div class="section-button--gray close" data-dismiss="modal" aria-label="Close">@lang('global.app_cancel')</div>
                <button class="section-button--yellow" type="submit">@lang('global.app_create')</button>
            </div>
        </form>
    </div>
</div>
<div class="modal fade" id="popup-rem" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <form class="modal-content" method="POST" action="{{ route("admin.transactions.withdraw", app()->getLocale()) }}"
            id="withdraw_transactions_form" name="withdraw_transactions_form" accept-charset="UTF-8" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="popup-header">
                <div class="popup-close--icon close" data-dismiss="modal" aria-label="Close">
                    <svg class="icon icon-close ">
                        <use xlink:href="static/img/svg/symbol/sprite.svg#close"></use>
                    </svg>
                </div>
                <h3 class="popup-title">@lang('global.transactions.fields.magazine')</h3>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label>@lang('global.transactions.fields.user'):</label>
                    <select class="form-control chosen-select select2 filter-column-form" id="search_user1" required name="user">
                        <option value="" selected>All</option>
                        @foreach ($users as $key => $user)
                        <option value="{{ $user->id }}">
                            {{ $user->name }}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-6 section-input-wrap popup-input--wrap p-0">
                <label>@lang('global.transactions.fields.amount'):</label>
                <input class="input-main" type="number" placeholder="Введите сумму" name="amount">
            </div>
            <div class="popup-balance--buttons row">
                <div class="popup-balance--button pb-red">1000</div>
                <div class="popup-balance--button pb-red">5000</div>
                <div class="popup-balance--button pb-red">10000</div>
                <div class="popup-balance--button pb-red">20000</div>
                <div class="popup-balance--button pb-red">50000</div>
                <div class="popup-balance--button pb-red">100000</div>
            </div>
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-6 section-input-wrap popup-input--wrap p-0">
                <label>@lang('global.transactions.fields.comment'):</label>
                <textarea class="textarea-input" placeholder="Комментарий..." cols="4" rows="3" name="comment"></textarea>
            </div>
            <div class="popup-balance-checkboxes">
                <div class="popup-balance-checkbox--wrap">
                    <div class="popup-balance-checkbox pbc-red"></div>
                    <input class="popup-balance-checkbox__input" for="type" name="type[]" type="checkbox"
                        value="Списание с баланса"><span>@lang('global.transactions.fields.magazine')</span>
                </div>
                <div class="popup-balance-checkbox--wrap">
                    <div class="popup-balance-checkbox pbc-red"></div>
                    <input class="popup-balance-checkbox__input" for="type" name="type[]" type="checkbox"
                        value="Штраф"><span>@lang('global.transactions.fields.fine')</span>
                </div>
            </div>
            <div class="popup-section-button">
                <div class="section-button--gray close" data-dismiss="modal" aria-label="Close">@lang('global.app_cancel')</div>
                <button class="section-button--yellow section-button--red" type="submit">@lang('global.app_create')</button>
            </div>
        </form>
    </div>
</div>
<script>
    window.route_mass_crud_entries_destroy = '{{ route('admin.transactions.mass_destroy', app()->getLocale()) }}';
</script>
@include('includes.admin_column_modal')
@include('includes.admin_setting_modal')
@endsection
@section('add_custom_script')
{{-- <script src="{{asset('js/jquery-3.4.1.js')}}" type="text/javascript"></script> --}}
<script src="{{ url('adminlte/js') }}/select2.full.min.js"></script>
{{-- <script src="{{asset('js/bootstrap-datepicker.js')}}" type="text/javascript"></script>
<script src="{{ asset('js/plugins/datatables.min.js')}}"></script>
<script src="{{ url('js/admin') }}/transaction.js"></script>

<script src="{{ url('adminlte/plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
<script src="{{ url('adminlte/plugins/fastclick/fastclick.js') }}"></script> --}}
<script>
    window._token = '{{ csrf_token() }}';

    function filter_trip(){
        if($('#selected_user').parent().css('display') != 'none')
        {
            var user = $('#selected_user').val();
        }
        if($('#operation_method').parent().parent().css('display') != 'none')
        {
            var method = $('#operation_method').val();
        }
        if($('#status').parent().parent().css('display') != 'none')
        {
            var status = $('#status').val();
        }
        if($('#from_date').parent().parent().parent().parent().css('display') != 'none')
        {
            var from_date = $('#from_date').val();
            var to_date = $('#to_date').val();
        }
        $.ajax({
            type:'POST',
            headers: {
                'X-CSRF-TOKEN': _token
            },
            url: "{{ route('admin.transactions.filter', app()->getLocale()) }}",
            data: {
                user: user,
                method: method,
                status: status,
                from_date: from_date,
                to_date: to_date
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

    $(document).ready(function() {
        $('.select2').select2();
        // $('#search_user').select2({
        //     minimumInputLength: 1, 
        //     ajax: {
        //         url: '{{ route("api.users.search") }}', 
        //         dataType: 'json', 
        //         }, 
        // });

        // $('#search_user1').select2({
        //     minimumInputLength: 1, 
        //     ajax: {
        //         url: '{{ route("api.users.search") }}', 
        //         dataType: 'json', 
        //         }, 
        // });
        $(document).on("click", '.section-body-checkbox__input__off', function(){
        // $('.section-body-checkbox__input__off').on('click', function () {
            if (confirm('Are you sure you want to approve?')) {
                $(this).toggleClass('checked');
                var $checked = $(this);
                $(this).siblings('form.approve-form').submit();
                if ($checked.children('.section-body-checkbox__off').attr('checked')) {
                    $checked.children('.section-body-checkbox__off').removeAttr('checked', false);
                    $checked.parents('.section-data-container--item').children('td').removeAttr('style');
                    $checked.parents('.section-data-container--item').children().children('.color-yellow').removeAttr('style');
                    $checked.parents('.section-bottom-side--mobile__item--wrap').find('.section-bottom-side--mobile__item--name,.section-mobile-table--item__left,.section-mobile-table--item__right,.section-mobile-table--item__left span,.section-mobile-table--item__right .color-yellow').removeAttr('style');
                } else {
                    $checked.children('.section-body-checkbox__off').attr('checked', true);
                    $checked.parents('.section-data-container--item').children('td').attr('style', 'color:#7B818C');
                    $checked.parents('.section-data-container--item').children('td').attr('style', 'color:#7B818C');
                    $checked.parents('.section-data-container--item').children().children('.color-yellow').attr('style', 'color:#7B818C');
                    $checked.parents('.section-bottom-side--mobile__item--wrap').find('.section-bottom-side--mobile__item--name,.section-mobile-table--item__left,.section-mobile-table--item__right,.section-mobile-table--item__left span,.section-mobile-table--item__right .color-yellow').attr('style', 'color:#7B818C');
                    // $checked.parents('.section-bottom-side--mobile__item--wrap').find('.section-mobile-table--item__left').attr('style','color:#7B818C');
                }
            }

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

        $('#selected_user').change(function () {
            filter_trip();
        });
        $('.click_method').click(function () {
            var get_data = $(this).data('type');
            $('#operation_method').val(get_data);
            filter_trip();
        });
        $('.click_status').click(function () {
            var get_data = $(this).data('type');
            $('#status').val(get_data);
            filter_trip();
        });

    })
</script>
@endsection