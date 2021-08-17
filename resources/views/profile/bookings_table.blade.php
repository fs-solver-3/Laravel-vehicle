@if(count($bookings) > 0)
    @foreach($bookings as $item)

    @if(!is_null($item->listing) && $item->amount > 0)
    <tr class="@if($item->archive) in @else out  @endif personal-pay--header--childen__item">
        <td>
            {{-- {{ $item->created_at }} --}}
            {{ date('d.m.Y', strtotime($item->created_at)) }}
        </td>
        <td>
            {{ $item->listing->sourcecity->city }} → {{ $item->listing->destinationcity->city }}
        </td>
        <td>@lang('front.profile.pay_tab.one_way_trip')</td>
        <td class="@if($item->amount > 0) pp-price @else pg-balence @endif ">
            <span class="car-to-book--during--right money" data-currency-rub="{{Helper::convertCurrency($item->amount, 'UZS', 'RUB')}}" data-currency-uzs="{{$item->amount}}">
                {{ $item->amount }} UZS
            </span>
        </td>
    </tr>
    @endif
    @endforeach
@else
    <tr>
        <td colspan="4" class="text-center">@lang('global.no_data')</td>
    </tr>
@endif