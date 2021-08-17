@extends('layouts.app')
@section('title', 'Отзывы')
@section('content')
    <section class="section-2 section-content-main--table">
        <div class="section-content--main__wrap box-bg2">
            <div class="section-content--main">
                <div class="section-top-side">
                    <div class="section-block-title-question">
                        <div class="section-block--title">@lang('global.review.title')</div>
                    </div>
                </div>
                <div class="table-content">
                    <div class="section-bottom-side--scroll">
                        @if (count($bookings) == 0)
                        <div class="panel-body text-center">
                            <h4>No Review Available.</h4>
                        </div>
                        @else
                        <table class="section-table" id="tblMain">
                            <thead>
                                <tr>
                                    <th>
                                        <div class="section-thead-checkbox__input" id="check-all">
                                            <input class="section-thead-checkbox" type="checkbox" >
                                        </div>
                                    </th>
                                    <th class="section-thead--icon" data-toggle="modal" data-target="#myModal">
                                        <svg class="icon icon-settings ">
                                            <use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#settings')}}"></use>
                                        </svg>
                                    </th>
                                    <th>@lang('global.id')</th>
                                    <th>@lang('global.date')</th>
                                    <th>@lang('global.review.fields.author')</th>
                                    <th>@lang('global.review.fields.user')</th>
                                    <th>@lang('global.review.fields.comment')</th>
                                    <th>@lang('global.review.rating')</th>
                                </tr>
                            </thead>
                            <tbody class="section-data-container">
                                @foreach($bookings as $booking)
                                <tr class="section-data-container--item">
                                    <td>
                                        <div class="section-body-checkbox__input">
                                            <input class="section-body-checkbox" type="checkbox" data-entry-id="{{ optional($booking->reviews)->id }}">
                                        </div>
                                    </td>
                                    <td class="section-tbody--icon section-tbody--show__popup">
                                        <svg class="icon icon-burger ">
                                            <use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#burger')}}"></use>
                                        </svg>
                                        <div class="section-tbody--modal--table">
                                            <a href="{{ route('admin.users.chat', ['locale' => app()->getLocale(), 'id' => optional($booking->reviews)->receiver_id]) }}">
                                            <div class="section-tbody--modal--item">
                                                <svg class="icon icon-chat ">
                                                    <use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#chat')}}"></use>
                                                </svg><span>@lang('global.message')</span>
                                            </div>
                                            </a>
                                            <a href="{{ route('admin.reviews.edit', ['locale' => app()->getLocale(), 'id' => optional($booking->reviews)->id]) }}" class="links"
                                                title="Edit Reviews">
                                            <div class="section-tbody--modal--item">
                                                <svg class="icon icon-pen ">
                                                    <use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#pen')}}"></use>
                                                </svg><span>@lang('global.app_edit')</span>
                                            </div>
                                            </a>
                                        </div>
                                    </td>
                                    <td>{{ $loop->index+1 }}</td>
                                    <td>{{ optional($booking->reviews)->created_at }}</td>
                                    <td><a class="color-yellow" href="{{ route('admin.users.edit', ['locale' => app()->getLocale(), 'id' => optional(optional($booking->reviews)->writer)->id, 'tab' => 'main']) }}">{{ optional(optional($booking->reviews)->writer)->name }}</a></td>
                                    <td><a class="color-yellow" href="{{ route('admin.users.edit', ['locale' => app()->getLocale(), 'id' => optional(optional($booking->reviews)->receiver)->id, 'tab' => 'main']) }}">{{ optional(optional($booking->reviews)->receiver)->name }}</a></td>
                                    <td>{{ optional($booking->reviews)->comment }}</td>
                                    <td>{{ optional($booking->reviews)->score }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @endif
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
        </div>
    </section>
    <!-- .section-content-main--table-->
    <section class="section3 section-content-main-mobile--table">
        <div class="section-content--main-mobile__wrap">
            <div class="section-content--main box-bg2 pb-20px">
                <div class="section-top-side box-bg-mobile2">
                    <div class="section-block--title">@lang('global.review.title')</div>
                    <div class="filter-side--right">
                        <a href="{{ route('admin.reviews.create', app()->getLocale()) }}" title="Create New Reviews">
                            <div class="section-top-added gogocar-arrow-button">
                                <svg class="icon icon-plus ">
                                    <use xlink:href="{{ asset('static/img/svg/symbol/sprite_admin.svg#plus') }}">
                                    </use>
                                </svg>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="table-content-mobile">
                    <div class="section-bottom-side--mobile__list">
                        <!-- Элемент мобильной таблицы-->
                        @if (count($bookings) == 0)
                        <div class="panel-body text-center">
                            <h4>@lang('global.no_data')</h4>
                        </div>
                        @else
                        @foreach($bookings as $booking)
                        <div class="section-bottom-side--mobile__item--wrap section-data-container--item">
                            <div class="section-bottom-side--mobile__item">
                                <div class="section-bottom-side--mobile__item--name"><a class="color-yellow" href="{{ route('admin.users.edit', ['locale' => app()->getLocale(), 'id' => optional(optional($booking->reviews)->writer)->id, 'tab' => 'main']) }}">{{ optional(optional($booking->reviews)->writer)->name }}</a> </div>
                                <div class="section-bottom-side--mobile__item--attr">
                                    <div class="section-tbody--show__popup section-top-added gogocar-arrow-button">
                                        <svg class="icon icon-dots ">
                                            <use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#dots')}}"></use>
                                        </svg>
                                        <div class="section-tbody--modal--table__mobile">
                                            <a href="{{ route('admin.users.chat', ['locale' => app()->getLocale(), 'id' => optional($booking->reviews)->receiver_id]) }}">
                                            <div class="section-tbody--modal--item">
                                                <svg class="icon icon-chat ">
                                                    <use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#chat')}}"></use>
                                                </svg><span>@lang('global.message')</span>
                                            </div>
                                            </a>
                                            <a href="{{ route('admin.reviews.edit', ['locale' => app()->getLocale(), 'id' => optional($booking->reviews)->receiver_id]) }}" class="links"
                                                title="Edit Reviews">
                                            <div class="section-tbody--modal--item">
                                                <svg class="icon icon-pen ">
                                                    <use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#pen')}}"></use>
                                                </svg><span>@lang('global.app_edit')</span>
                                            </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="section-arrow-mobile-table section-top-added gogocar-arrow-button">
                                        <svg class="icon icon-arrow-down-mobile ">
                                            <use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#arrow-down-mobile')}}"></use>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <ul class="section-bottom-side--mobile__item--content">
                                <li class="section-mobile-table--item">
                                    <div class="section-mobile-table--item__left">ID:</div>
                                    <div class="section-mobile-table--item__right">{{ $loop->index+1 }}</div>
                                </li>
                                <li class="section-mobile-table--item">
                                    <div class="section-mobile-table--item__left">@lang('global.date'):</div>
                                    <div class="section-mobile-table--item__right">{{ optional($booking->reviews)->created_at }}</div>
                                </li>
                                <li class="section-mobile-table--item">
                                    <div class="section-mobile-table--item__left">@lang('global.review.fields.author'):</div>
                                    <div class="section-mobile-table--item__right"><a class="color-yellow"
                                            href="/">{{ optional(optional($booking->reviews)->writer)->name }}</a></div>
                                </li>
                                <li class="section-mobile-table--item">
                                    <div class="section-mobile-table--item__left">@lang('global.review.fields.user'):</div>
                                    <div class="section-mobile-table--item__right"><a class="color-yellow"
                                            href="/">{{ optional(optional($booking->reviews)->receiver)->name }}</a></div>
                                </li>
                                <li class="section-mobile-table--item">
                                    <div class="section-mobile-table--item__left">@lang('global.review.fields.comment'):<span
                                            class="ml-1">{{ optional($booking->reviews)->comment }}</span></div>
                                </li>
                            </ul>
                        </div>
                        @endforeach
                        @endif
                    </div>
                    <div class="section-bottom-pagination--wrap mt-20px">
                        <!--.section-bottom--delete.gogocar-arrow-button-->
                        <!--    +icon('delete')-->
                        <div class="section-bottom-pagination"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        window.route_mass_crud_entries_destroy = '{{ route('admin.reviews.mass_destroy', app()->getLocale()) }}';
    </script>
    @include('includes.admin_column_modal')
    @include('includes.admin_setting_modal')
@endsection
@section('add_custom_script')
    <script src="{{ url('adminlte/js') }}/select2.full.min.js"></script>
    <script>
        $("#selected_user").change(function() {
            filter_trip();
        });
        window._token = '{{ csrf_token() }}';
        $("#review_id").keyup(function() {
            filter_trip();
        });

        function filter_trip() {
            if ($('#selected_user').parent().css('display') != 'none') {
                var selected_user = $('#selected_user').val();
            }
            if ($('#selected_rating').parent().parent().css('display') != 'none') {
                var selected_rating = $('#selected_rating').val();
            }
            if ($('#from_date').parent().parent().parent().parent().css('display') != 'none') {
                var from_date = $('#from_date').val();
                var to_date = $('#to_date').val();
            }
            if(from_date != "" && to_date != "" && from_date != to_date){
                $.ajax({
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': _token
                    },
                    url: "{{ route('admin.reviews.filter', app()->getLocale()) }}",
                    data: {
                        selected_user: selected_user,
                        selected_rating: selected_rating,
                        from_date: from_date,
                        to_date: to_date
                    },
                    success: (data) => {
                        $('.table-content').html(data['template']);
                        $('.table-content-mobile').html(data['template_mobile']);
                        pagination_table();
                    },
                    error: function(data) {
                        console.log(data);
                    }
                });
            }
        }

        function pagination_table() {
            var items_wrap = $('.section-content--main');
            for (let item of items_wrap) {
                let items = $(item).find('.section-data-container--item');
                let numItems = items.length;
                let perPage = 10;

                items.slice(perPage).hide();

                if (numItems > perPage) {
                    $(item).find('.section-bottom-pagination').pagination({
                        items: numItems,
                        itemsOnPage: perPage,
                        ellipsePageSet: false,
                        displayedPages: 4,
                        edges: 0,
                        prevText: '<div class="section-bottom-paginationprev gogocar-arrow-button-pagination"><svg class="icon icon-arrow-left "><use xlink:href="/static/img/svg/symbol/sprite_admin.svg#arrow-left"></use></svg></div>',
                        nextText: '<div class="section-bottom-paginationnext gogocar-arrow-button-pagination"><svg class="icon icon-arrow-left arrow-rotate "><use xlink:href="/static/img/svg/symbol/sprite_admin.svg#arrow-left"></use></svg></div>',
                        onPageClick: function(pageNumber) {
                            let showFrom = perPage * (pageNumber - 1);
                            let showTo = showFrom + perPage;
                            items.hide().slice(showFrom, showTo).show();
                            //$('.catalog-pag-show-items').text(showFrom);
                        }

                    });
                } else if (numItems <= perPage) {
                    // $(item).find('.section-bottom-pagination--wrap').css('display', 'none');
                }
            }

        }

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
        $('.click_rating').click(function() {
            var get_data = $(this).data('type');
            $('#selected_rating').val(get_data);
            filter_trip();
        });
        $('.click_period').click(function() {
            var get_data = $(this).data('type');
            $('#selected_period').val(get_data);
            setdate(get_data);
        });

        $('#from_date').on('change', function() {
            // var get_data = $('#selected_period').val();
            filter_trip();
            // if ($('#selected_period').parent().parent().css('display') == 'none') {
            // } else {
            //     // setdate(get_data);
            // }
        });

        $('#to_date').on('change', function() {
            filter_trip();
        });

        $(document).ready(function() {
            $('.select2').select2();
        })

    </script>
@endsection
