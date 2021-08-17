<div class="panel panel-default">

    {{-- <div class="panel-body text-center">
        <h4>No Blogs Available.</h4>
    </div> --}}
    <div class="panel-body panel-body-support-table">
        <div class="table-responsive">

            <table class="table support_table" data-module="sticky-table">
                <thead>
                    <tr>
                        <th class="section-block--title w-th-100 padding-th-title">@lang('global.support.responsible.title')</th>
                        <th class="padding-status">
                            <div class="section-support-status status-red"></div>
                        </th>
                        <th class="padding-status">
                            <div class="section-support-status status-green"></div>
                        </th>
                        <th class="padding-status">
                            <div class="section-support-status status-gray"></div>
                        </th>
                        <th class="padding-text sup-mob-hidden">
                            @lang('global.support.responsible.open')
                        </th>
                        <th class="padding-text sup-mob-hidden">
                            @lang('global.support.responsible.total')
                        </th>
                    </tr>
                    <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($demands_by_support_filter as $key => $item)
                    <tr class="section-tbody-support">
                        <td>
                            @if(isset($item['name']))
                            {{ $item['name'] }}
                            @endif

                        </td>
                        <td>
                            @if(isset($item['client']))
                            {{ $item['client'] }}
                            @else
                            0
                            @endif

                        </td>
                        <td>
                            @if(isset($item['support']))
                            {{ $item['support'] }}
                            @else
                            0
                            @endif
                        </td>
                        <td>
                            @if(isset($item['other']))
                            {{ $item['other'] }}
                            @else
                            0
                            @endif

                        </td>
                        <td>
                            @if(isset($item['open']))
                            {{ $item['open'] }}
                            @endif

                        </td>
                        <td>
                            @if(isset($item['total']))
                            {{ $item['total'] }}
                            @endif

                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>

        </div>
    </div>

</div>


{{-- state --}}
<div class="panel panel-default">

    <div class="panel-body panel-body-support-table">
        <div class="table-responsive">

            <table class="table support_table" data-module="sticky-table">
                <thead>
                    <tr>
                        <th class="section-block--title w-th-100 padding-th-title">@lang('global.support.state')</th>

                        <th class="padding-status">
                            <div class="section-support-status status-red"></div>
                        </th>
                        <th class="padding-status">
                            <div class="section-support-status status-green"></div>
                        </th>
                        <th class="padding-status">
                            <div class="section-support-status status-gray"></div>
                        </th>
                        <th class="padding-text sup-mob-hidden">
                            @lang('global.support.responsible.open')
                        </th>
                        <th class="padding-text sup-mob-hidden">
                            @lang('global.support.responsible.total')
                        </th>
                    </tr>
                    <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($demands_by_state_filter as $key => $item)
                    <tr>
                        <td>
                            {{ $key }}
                        </td>
                        <td>
                            @if(isset($item['client']))
                            {{ $item['client'] }}
                            @else
                            0
                            @endif

                        </td>
                        <td>
                            @if(isset($item['support']))
                            {{ $item['support'] }}
                            @else
                            0
                            @endif
                        </td>
                        <td>
                            @if(isset($item['other']))
                            {{ $item['other'] }}
                            @else
                            0
                            @endif

                        </td>
                        <td>
                            @if(isset($item['open']))
                            {{ $item['open'] }}
                            @endif

                        </td>
                        <td>
                            @if(isset($item['total']))
                            {{ $item['total'] }}
                            @endif

                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>

        </div>
    </div>

</div>
{{-- difficulty --}}
<div class="panel panel-default">

    <div class="panel-body panel-body-support-table">
        <div class="table-responsive">

            <table class="table support_table" data-module="sticky-table">
                <thead>
                    <tr>
                        <th class="section-block--title w-th-100 padding-th-title">@lang('global.support.difficulty_level')</th>

                        <th class="padding-status">
                            <div class="section-support-status status-red"></div>
                        </th>
                        <th class="padding-status">
                            <div class="section-support-status status-green"></div>
                        </th>
                        <th class="padding-status">
                            <div class="section-support-status status-gray"></div>
                        </th>
                        <th class="padding-text sup-mob-hidden">
                            @lang('global.support.responsible.open')
                        </th>
                        <th class="padding-text sup-mob-hidden">
                            @lang('global.support.responsible.total')
                        </th>
                    </tr>
                    <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($demands_by_complexity_filter as $key => $item)

                    <tr>
                        <td>
                            {{ $key }}
                        </td>
                        <td>
                            @if(isset($item['client']))
                            {{ $item['client'] }}
                            @else
                            0
                            @endif

                        </td>
                        <td>
                            @if(isset($item['support']))
                            {{ $item['support'] }}
                            @else
                            0
                            @endif
                        </td>
                        <td>
                            @if(isset($item['other']))
                            {{ $item['other'] }}
                            @else
                            0
                            @endif

                        </td>
                        <td>
                            @if(isset($item['open']))
                            {{ $item['open'] }}
                            @endif

                        </td>
                        <td>
                            @if(isset($item['total']))
                            {{ $item['total'] }}
                            @endif

                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>

        </div>
    </div>

</div>
{{-- criticality--}}
<div class="panel panel-default">


    <div class="panel-body panel-body-support-table">
        <div class="table-responsive">

            <table class="table support_table" data-module="sticky-table">
                <thead>
                    <tr>
                        <th class="section-block--title w-th-100 padding-th-title">@lang('global.support.criticality')</th>
                        <th class="padding-status">
                            <div class="section-support-status status-red"></div>
                        </th>
                        <th class="padding-status">
                            <div class="section-support-status status-green"></div>
                        </th>
                        <th class="padding-status">
                            <div class="section-support-status status-gray"></div>
                        </th>
                        <th class="padding-text sup-mob-hidden">
                            @lang('global.support.responsible.open')
                        </th>
                        <th class="padding-text sup-mob-hidden">
                            @lang('global.support.responsible.total')
                        </th>
                    </tr>
                    <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($demands_by_criticality_filter as $key => $item)

                    <tr>
                        <td>
                            {{ $key }}
                        </td>
                        <td>
                            @if(isset($item['client']))
                            {{ $item['client'] }}
                            @else
                            0
                            @endif

                        </td>
                        <td>
                            @if(isset($item['support']))
                            {{ $item['support'] }}
                            @else
                            0
                            @endif
                        </td>
                        <td>
                            @if(isset($item['other']))
                            {{ $item['other'] }}
                            @else
                            0
                            @endif

                        </td>
                        <td>
                            @if(isset($item['open']))
                            {{ $item['open'] }}
                            @endif

                        </td>
                        <td>
                            @if(isset($item['total']))
                            {{ $item['total'] }}
                            @endif

                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>

        </div>
    </div>

</div>
{{-- category --}}
<div class="panel panel-default">

    <div class="panel-body panel-body-support-table">
        <div class="table-responsive">

            <table class="table support_table" data-module="sticky-table">
                <thead>
                    <tr>
                        <th class="section-block--title w-th-100 padding-th-title">@lang('global.support.fields.category')</th>
                        <th class="padding-status">
                            <div class="section-support-status status-red"></div>
                        </th>
                        <th class="padding-status">
                            <div class="section-support-status status-green"></div>
                        </th>
                        <th class="padding-status">
                            <div class="section-support-status status-gray"></div>
                        </th>
                        <th class="padding-text sup-mob-hidden">
                            @lang('global.support.responsible.open')
                        </th>
                        <th class="padding-text sup-mob-hidden">
                            @lang('global.support.responsible.total')
                        </th>
                    </tr>
                    <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($demands_by_category_filter as $key => $item)

                    <tr>
                        <td>
                            {{ $key }}
                        </td>
                        <td>
                            @if(isset($item['client']))
                            {{ $item['client'] }}
                            @else
                            0
                            @endif

                        </td>
                        <td>
                            @if(isset($item['support']))
                            {{ $item['support'] }}
                            @else
                            0
                            @endif
                        </td>
                        <td>
                            @if(isset($item['other']))
                            {{ $item['other'] }}
                            @else
                            0
                            @endif

                        </td>
                        <td>
                            @if(isset($item['open']))
                            {{ $item['open'] }}
                            @endif

                        </td>
                        <td>
                            @if(isset($item['total']))
                            {{ $item['total'] }}
                            @endif

                        </td>
                    </tr>
                    @endforeach


                </tbody>
            </table>

        </div>
    </div>

</div>
{{-- support_level --}}
<div class="panel panel-default">

    <div class="panel-body panel-body-support-table">
        <div class="table-responsive">

            <table class="table support_table" data-module="sticky-table">
                <thead>
                    <tr>
                        <th class="section-block--title w-th-100 padding-th-title">@lang('global.support.support_level')</th>

                        <th class="padding-status">
                            <div class="section-support-status status-red"></div>
                        </th>
                        <th class="padding-status">
                            <div class="section-support-status status-green"></div>
                        </th>
                        <th class="padding-status">
                            <div class="section-support-status status-gray"></div>
                        </th>
                        <th class="padding-text sup-mob-hidden">
                            @lang('global.support.responsible.open')
                        </th>
                        <th class="padding-text sup-mob-hidden">
                            @lang('global.support.responsible.total')
                        </th>
                    </tr>
                    <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($demands_by_level_filter as $key => $item)

                    <tr>
                        <td>
                            {{ $key }}
                        </td>
                        <td>
                            @if(isset($item['client']))
                            {{ $item['client'] }}
                            @else
                            0
                            @endif

                        </td>
                        <td>
                            @if(isset($item['support']))
                            {{ $item['support'] }}
                            @else
                            0
                            @endif
                        </td>
                        <td>
                            @if(isset($item['other']))
                            {{ $item['other'] }}
                            @else
                            0
                            @endif

                        </td>
                        <td>
                            @if(isset($item['open']))
                            {{ $item['open'] }}
                            @endif

                        </td>
                        <td>
                            @if(isset($item['total']))
                            {{ $item['total'] }}
                            @endif

                        </td>
                    </tr>
                    @endforeach


                </tbody>
            </table>

        </div>
    </div>

</div>