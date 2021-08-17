@extends('layouts.app')
@section('title', 'Уровни поддержки')
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
                    <div class="section-block--title">@lang('global.support_levels.title')</div>
                </div>
                <div class="filter-side--right">
                    <a href="{{ route('admin.support_levels.create', app()->getLocale()) }}" title="Create New Demand Category">
                        <div class="section-top-added gogocar-arrow-button">
                            <svg class="icon icon-plus ">
                                <use xlink:href="{{ asset('static/img/svg/symbol/sprite_admin.svg#plus')}}"></use>
                            </svg>
                        </div>
                    </a>
                </div>
            </div>
            <div class="section-bottom-side--scroll">
                <table class="section-table" data-module="sticky-table" id="tblMain">
                    <thead>
                        <tr>
                            <th>
                                <div class="section-thead-checkbox__input" id="check-all">
                                    <input class="section-thead-checkbox" type="checkbox">
                                </div>
                            </th>
                            <th class="section-thead--icon" data-toggle="modal" data-target="#myModal">
                                <svg class="icon icon-settings ">
                                    <use xlink:href="{{ asset('static/img/svg/symbol/sprite_admin.svg#settings') }}"></use>
                                </svg>
                            </th>
                            <th>@lang('global.support_levels.fields.title')</th>
                            {{-- <th>@lang('global.support_levels.fields.default_answer')</th> --}}
                            <th>@lang('global.demand_categories.fields.manager')</th>
                        </tr>
                    </thead>
                    <tbody class="section-data-container">
                        @foreach($supportLevelsObjects as $supportLevels)
                        <tr class="section-data-container--item" data-entry-id="{{ $supportLevels->id }}">
                            <td>
                                <div class="section-body-checkbox__input">
                                    <input class="section-body-checkbox" type="checkbox">
                                </div>
                            </td>
                            <td class="section-tbody--icon section-tbody--show__popup">
                                <svg class="icon icon-burger ">
                                    <use xlink:href="{{ asset('static/img/svg/symbol/sprite_admin.svg#burger') }}"></use>
                                </svg>

                                <div class="section-tbody--modal--table">
                                    <a href="{{ route('admin.support_levels.show', ['locale' => app()->getLocale(), 'id' => $supportLevels->id]) }}" class="links" title="Show event">
                                        <div class="section-tbody--modal--item">
                                            <svg class="icon icon-paper ">
                                                <use xlink:href="{{ asset('static/img/svg/symbol/sprite_admin.svg#paper') }}"></use>
                                            </svg><span>@lang('global.app_view')</span>
                                        </div>
                                    </a>
                                    <a href="{{ route('admin.support_levels.edit', ['locale' => app()->getLocale(), 'id' => $supportLevels->id]) }}" class="links" title="Edit event">
                                        <div class="section-tbody--modal--item">
                                            <svg class="icon icon-pen ">
                                                <use xlink:href="{{ asset('static/img/svg/symbol/sprite_admin.svg#pen') }}"></use>
                                            </svg><span>@lang('global.app_edit')</span>
                                        </div>
                                    </a>
                                    <form method="POST" action="{!! route('admin.support_levels.destroy', ['locale' => app()->getLocale(), 'id' => $supportLevels->id]) !!}" accept-charset="UTF-8">
                                        <input name="_method" value="DELETE" type="hidden">
                                        {{ csrf_field() }}
                                        <button type="submit" title="Delete event" onclick="return confirm(&quot;Click Ok to delete event.&quot;)">
                                            <div class="section-tbody--modal--item">
                                                <svg class="icon icon-delete-red ">
                                                    <use xlink:href="{{ asset('static/img/svg/symbol/sprite_admin.svg#delete-red') }}"></use>
                                                </svg><span>@lang('global.app_delete')</span>
                                            </div>
                                    </form>
                                    </button>
                                </div>
                            </td>
                            <td>{{ $supportLevels->name }}</td>
                            <td>
                                @if ($supportLevels->manager)
                                @foreach ($supportLevels->manager as $item)
                                <span class="label label-info label-many">{{ $item->name }}</span>
                                @endforeach
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
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
<!-- .section-content-main--table-->

<section class="section3 section-content-main-mobile--table">
    <div class="section-content--main-mobile__wrap">
        <div class="section-content--main box-bg2 pb-20px">
            <div class="section-top-side box-bg-mobile2">
                <div class="section-block--title">@lang('global.support_levels.title')</div>
                <div class="filter-side--right">
                    <div class="section-top-added gogocar-arrow-button">
                        <svg class="icon icon-plus ">
                            <use xlink:href="{{ asset('static/img/svg/symbol/sprite_admin.svg#plus') }}"></use>
                        </svg>
                    </div>
                </div>
            </div>
            <div class="table-content-mobile">
                @include('admin.support_levels.table_template_mobile')
            </div>

            <div class="section-bottom-pagination--wrap">
                <!--.section-bottom--delete.gogocar-arrow-button-->
                <!--    +icon('delete')-->
                <div class="section-bottom-pagination"></div>
            </div>
        </div>
    </div>
</section>
@include('includes.admin_column_modal')
@include('includes.admin_setting_modal')
@endsection
@section('add_custom_script')
<script src="{{asset('js/bootstrap-datepicker.js')}}" type="text/javascript"></script>
{{-- <script src="{{ asset('js/plugins/datatables.min.js')}}"></script> --}}
<script src="{{ url('adminlte/js') }}/select2.full.min.js"></script>
<script src="{{ url('js/admin') }}/demandcategory.js"></script>
<script>
    window._token = '{{ csrf_token() }}';
    $(document).ready(function() {
        var window_width = $(window).width();
        if (window_width < 900) {
            $("#search_id").keyup(function() {
                fetch_data();
            });
            $("#search_title").keyup(function() {
                fetch_data();
            });
        }

        function fetch_data() {
            var id = $('#search_id').val();
            var title = $('#search_title').val();
            $.ajax({
                type: 'GET'
                , headers: {
                    'X-CSRF-TOKEN': _token
                }
                , url: "{{ route('admin.support_levels.index', app()->getLocale()) }}"
                , data: {
                    id: id
                    , name: title
                }
                , success: (data) => {
                    $('.table-content-mobile').html('');
                    $('.table-content-mobile').html(data);
                    // pagination_table();
                }
                , error: function(data) {
                }
            });
        }
    })
</script>
@endsection