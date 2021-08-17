@inject('request', 'Illuminate\Http\Request')
@section('title', 'SEO')
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
    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    <div class="filter-main box-bg2">
        <div class="section-top-side">
            <div class="section-block--title">@lang('global.filter_name')</div>
            <div class="filter-side--right">
                <div class="filter-settings gogocar-arrow-button">
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
                <label>@lang('global.popular_city.fields.popular_area'):</label>
                <input class="input-main" type="text" placeholder="Название...">
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 section-input-wrap pl-0">
                <label>@lang('global.popular_city.fields.title'):</label>
                <input class="input-main" type="text" placeholder="Название...">
            </div>
        </div>
    </div>
</section>
<section class="section-2 section-content-main--table">
    <div class="section-content--main__wrap box-bg2">
        <div class="section-content--main">
            <div class="section-top-side">
                <div class="section-block-title-question">
                    <div class="section-block--title">
                        @switch($request->type)
                            @case('betweencity')
                                @lang('global.common.fields.betweencity')
                                @break
                            @case('city')
                                @lang('global.common.fields.general_meta')
                                @break
                            @case('card')
                                @lang('global.common.fields.betweencity')
                                @break
                            @case('auto')
                                @lang('global.common.fields.auto')
                                @break
                            @case('destination')
                                @lang('global.common.fields.destination')
                                @break
                            @default
                                
                        @endswitch

                    </div>
                </div>
                
                    <div class="section-block-added-csv">
                        <div class="section-upper-modal">
                            <div class="section-csv-green">@lang('global.import_csv')</div>
                            <div class="section-csv-yellow">@lang('global.export_csv')</div>
                        </div>
                        <form method="POST" action="{{ route('admin.pages.import', app()->getLocale()) }}" accept-charset="UTF-8"
                            enctype="multipart/form-data" class="form-horizontal">
                            {{ csrf_field() }}
                            <div class="d-flex">
                                <div class="section-csv--wrap">
                                    <button class="section-csv-yellow upload-apply" type="submit" style="display: none; margin-left: 10px; border: 0px;">@lang('global.app_apply')</button>
                                    <div class="section-csv-green"><span id="filename1">@lang('global.import_csv')</span>
                                        <input type="file" name="file" id="file1" class="section-csv-green">
                                        <input type="hidden" name="table" value="seo_area">
                                    </div>
                                </div>
                            </div>
                        </form>
                        <form method="POST" action="{{ route('admin.pages.export', app()->getLocale()) }}" accept-charset="UTF-8"
                            enctype="multipart/form-data" class="form-horizontal">
                            {{ csrf_field() }}
                            <div class="section-csv--wrap">
                                {{-- <input type="file" name="file" id="file1" class="section-csv-green"> --}}
                                <input type="hidden" name="table" value="seo_area">
                                <input type="hidden" name="type" value="{{$request->get('type')}}">
                                <button class="section-csv-yellow" type="submit">@lang('global.export_csv')</button>
                            </div>
                        </form>
                        <div class="filter-side--right">
                            <div class="section-dotted-mobile gogocar-arrow-button">
                                <svg class="icon icon-dots ">
                                    <use xlink:href="{{ asset('static/img/svg/symbol/sprite_admin.svg#dots') }}"></use>
                                </svg>
                            </div>
                            <a href="{{ route('admin.seo_area.create', ['locale' => app()->getLocale(), 'type' => $request->get('type')]) }}" title="Create New Seo All">
                                <div class="section-top-added gogocar-arrow-button">
                                    <svg class="icon icon-plus ">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite_admin.svg#plus') }}"></use>
                                    </svg>
                                </div>
                            </a>
                            {{-- @if(isset($direction_id))
                            <a href="{{ route('admin.courses.create', ['locale' => app()->getLocale(), 'direction_id' => $direction_id]) }}" class="btn btn-add " title="Create New Courses">
                                <img src="{{asset('admin/plus.svg')}}" alt="for you">
                            </a>
                            @else
                            <a href="{{ route('admin.courses.create', app()->getLocale()) }}" class="btn btn-add " title="Create New Courses">
                                <img src="{{asset('admin/plus.svg')}}" alt="for you">
                            </a>
                            @endif --}}
                        </div>
                    </div>
            </div>
            <div class="section-bottom-side--scroll">
                @if(count($seoAreas) == 0)
                <div class="panel-body text-center">
                    <h4>@lang('global.no_data').</h4>
                </div>
                @else
                <table class="section-table" id="tblMain">
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
                            <th>@lang('global.popular_city.fields.country/city')</th>
                            <th>@lang('global.popular_city.fields.title')</th>
                            <th>@lang('global.popular_city.fields.des')</th>
                            <th>@lang('global.popular_city.fields.seo_text')</th>
                        </tr>
                    </thead>
                    <tbody class="section-data-container">
                        @foreach($seoAreas as $item)
                        <tr class="section-data-container--item">
                            <td>
                                <div class="section-body-checkbox__input">
                                    <input class="section-body-checkbox" type="checkbox" data-entry-id="{{ $item->id }}">
                                </div>
                            </td>
                            <td class="section-tbody--icon section-tbody--show__popup">
                                <svg class="icon icon-burger ">
                                    <use xlink:href="{{ asset('static/img/svg/symbol/sprite_admin.svg#burger') }}"></use>
                                </svg>
                                <div class="section-tbody--modal--table">
                                    <a href="{{ route('admin.seo_area.show', ['locale' => app()->getLocale(), 'id' => $item->id]) }}" class="links" title="Edit news">
                                        <div class="section-tbody--modal--item">
                                            <svg class="icon icon-paper ">
                                                <use xlink:href="{{ asset('static/img/svg/symbol/sprite_admin.svg#paper') }}"></use>
                                            </svg><span>@lang('global.app_view')</span>
                                        </div>
                                    </a>
                                    <a href="{{ route('admin.seo_area.edit', ['locale' => app()->getLocale(), 'id' => $item->id, 'type' => $request->type]) }}" class="links" title="Edit news">
                                        <div class="section-tbody--modal--item">
                                            <svg class="icon icon-pen ">
                                                <use xlink:href="{{ asset('static/img/svg/symbol/sprite_admin.svg#pen') }}"></use>
                                            </svg><span>@lang('global.app_edit')</span>
                                        </div>
                                    </a>
                                    <form method="POST" action="{!! route('admin.seo_area.destroy', ['locale' => app()->getLocale(), 'id' => $item->id]) !!}" accept-charset="UTF-8">
                                        <input name="_method" value="DELETE" type="hidden">
                                        {{ csrf_field() }}
                                        <input type="hidden" value="{{$request->type}}" name="type">
                                        <button type="submit" title="Delete Car" onclick="return confirm(&quot;Click Ok to delete Seo.&quot;)">
                                            <div class="section-tbody--modal--item">
                                                <svg class="icon icon-delete-red ">
                                                    <use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#delete-red')}}">
                                                    </use>
                                                </svg><span>@lang('global.app_delete')</span>
                                            </div>
                                        </button>
                                    </form>
                                </div>
                            </td>
                            <td>{{ $item->url }}</td>
                            <td>{{ $item->title }}</td>
                            <td>{{ $item->des }}</td>
                            <td>{{ $item->seo_text }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @endif
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
                <div class="section-block--title">
                    @switch($request->type)
                        @case('betweencity')
                            @lang('global.common.fields.betweencity')
                            @break
                        @case('city')
                            @lang('global.common.fields.general_meta')
                            @break
                        @case('card')
                            @lang('global.common.fields.betweencity')
                            @break
                        @case('auto')
                            @lang('global.common.fields.auto')
                            @break
                        @case('destination')
                            @lang('global.common.fields.destination')
                            @break
                        @default
                            
                    @endswitch
                </div>
                <section-block-added-csv>
                    <form method="POST" action="{{ route('admin.pages.import', app()->getLocale()) }}" accept-charset="UTF-8" enctype="multipart/form-data" class="form-horizontal">
                        {{ csrf_field() }}
                        <div class="section-upper-modal">
                            <div class="section-csv-green"><span id="filename2">@lang('global.import_csv')</span>
                                <input type="file" name="file" id="file2">
                                <input type="hidden" name="table" value="seo_area">
                            </div>
                            <button class="section-csv-yellow" type="submit">@lang('global.export_csv')</button>
                        </div>
                        <div class="section-csv--wrap">
                            <div class="section-csv-green">@lang('global.import_csv')</div>
                            <div class="section-csv-yellow">@lang('global.export_csv')</div>
                        </div>
                        <div class="filter-side--right">
                            <div class="section-dotted-mobile gogocar-arrow-button">
                                <svg class="icon icon-dots ">
                                    <use xlink:href="{{ asset('static/img/svg/symbol/sprite_admin.svg#dots') }}"></use>
                                </svg>
                            </div>
                            <div class="section-top-added gogocar-arrow-button">
                                <svg class="icon icon-plus ">
                                    <use xlink:href="{{ asset('static/img/svg/symbol/sprite_admin.svg#plus') }}"></use>
                                </svg>
                            </div>
                        </div>
                    </form>
                </section-block-added-csv>
            </div>
            <div class="section-bottom-side--mobile__list">
                <!-- Элемент мобильной таблицы-->
                @foreach($seoAreas as $item)
                <div class="section-bottom-side--mobile__item--wrap section-data-container--item">
                    <div class="section-bottom-side--mobile__item">
                        <div class="section-bottom-side--mobile__item--name">{{ $item->title }}</div>
                        <div class="section-bottom-side--mobile__item--attr">
                            <div class="section-tbody--show__popup section-top-added gogocar-arrow-button">
                                <svg class="icon icon-dots ">
                                    <use xlink:href="{{ asset('static/img/svg/symbol/sprite_admin.svg#dots') }}"></use>
                                </svg>
                                <div class="section-tbody--modal--table__mobile">
                                    <a href="{{ route('admin.seo_area.edit', ['locale' => app()->getLocale(), 'id' => $item->id]) }}" class="links" title="Show">
                                    <div class="section-tbody--modal--item">
                                        <svg class="icon icon-paper ">
                                            <use xlink:href="{{ asset('static/img/svg/symbol/sprite_admin.svg#paper') }}"></use>
                                        </svg><span>@lang('global.app_view')</span>
                                    </div>
                                    </a>
                                    <a href="{{ route('admin.seo_area.edit', ['locale' => app()->getLocale(), 'id' => $item->id, 'type' => $request->type]) }}" class="links" title="Edit">
                                    <div class="section-tbody--modal--item">
                                        <svg class="icon icon-pen ">
                                            <use xlink:href="{{ asset('static/img/svg/symbol/sprite_admin.svg#pen') }}"></use>
                                        </svg><span>@lang('global.app_edit')</span>
                                    </div>
                                    </a>
                                    <form method="POST" action="{!! route('admin.seo_area.destroy', ['locale' => app()->getLocale(), 'id' => $item->id]) !!}" accept-charset="UTF-8">
                                        <input name="_method" value="DELETE" type="hidden">
                                        {{ csrf_field() }}
                                        <input type="hidden" value="{{$request->type}}" name="type">
                                        <button type="submit" title="Delete Car" onclick="return confirm(&quot;Click Ok to delete Seo.&quot;)">
                                            <div class="section-tbody--modal--item">
                                                <svg class="icon icon-delete-red ">
                                                    <use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#delete-red')}}">
                                                    </use>
                                                </svg><span>@lang('global.app_delete')</span>
                                            </div>
                                        </button>
                                    </form>
                                </div>
                            </div>
                            <div class="section-arrow-mobile-table section-top-added gogocar-arrow-button">
                                <svg class="icon icon-arrow-down-mobile ">
                                    <use xlink:href="{{ asset('static/img/svg/symbol/sprite_admin.svg#arrow-down-mobile') }}"></use>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <ul class="section-bottom-side--mobile__item--content">
                        <li class="section-mobile-table--item">
                            <div class="section-mobile-table--item__left">@lang('global.popular_city.fields.country/city'):</div>
                            <div class="section-mobile-table--item__right">{{ $item->title }}</div>
                        </li>
                        <li class="section-mobile-table--item">
                            <div class="section-mobile-table--item__left">@lang('global.popular_city.fields.title'):</div>
                            <div class="section-mobile-table--item__right">{{ $item->title }}</div>
                        </li>
                        <li class="section-mobile-table--item">
                            <div class="section-mobile-table--item__left">@lang('global.popular_city.fields.des'):</div>
                            <div class="section-mobile-table--item__right">{{ $item->des }}</div>
                        </li>
                        <li class="section-mobile-table--item">
                            <div class="section-mobile-table--item__left">@lang('global.popular_city.fields.seo_text'):</div>
                            <div class="section-mobile-table--item__right">{{ $item->seo_text }}</div>
                        </li>
                    </ul>
                </div>
                @endforeach
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
    window.route_mass_crud_entries_destroy = '{{ route('admin.seo_area.mass_destroy', app()->getLocale()) }}';
</script>
@include('includes.admin_column_modal')
@include('includes.admin_setting_modal')
@endsection
@section('add_custom_script')
<script>
    window._token = '{{ csrf_token() }}';
    $(document).on("change", '#file1', function() {
        var filename = $('#file1').val().replace(/C:\\fakepath\\/i, '');
        $("#filename1").html(filename);
        $(".upload-apply").css("display", "flex");
    });
    $(document).on("change", '#file2', function() {
        var filename = $('#file2').val().replace(/C:\\fakepath\\/i, '');
        $("#filename2").html(filename);
    });
</script>
@endsection