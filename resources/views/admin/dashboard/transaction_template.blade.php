@if(count($withdraws) == 0)
    <div class="panel-body text-center">
        <h4>@lang('global.no_data').</h4>
    </div>
@else
<table class="section-table">
    <thead class="section-thead-report-pp">
        <tr>
            <th>@lang('global.transactions.fields.block')</th>
            <th>@lang('global.transactions.fields.user')</th>
            <th>@lang('global.transactions.fields.amount')</th>
            <th>@lang('global.transactions.fields.date')</th>
            <th>@lang('global.transactions.fields.status')</th>
            <th>@lang('global.transactions.fields.method')</th>
        </tr>
    </thead>
    <tbody class="section-data-container">
        
        @foreach ($withdraws as $item)
        <tr class="section-data-container--item">
            <td>
                <div class="section-body-checkbox__input__off">
                    <input class="section-body-checkbox__off" type="checkbox">
                </div>
            </td>
            <td><a class="color-yellow" href="/">{{ $item->user->name }}</a></td>
            <td>{{ $item->amount }} UZS</td>
            <td>{{date('d.m.yy',strtotime($item->created_at))}}</td>
            <td>{{ $item->status }}</td>
            <td>{{ $item->method }}</td>
        </tr>
        @endforeach
        
    </tbody>
</table>
@endif