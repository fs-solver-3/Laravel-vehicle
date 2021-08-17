@foreach($transactions as $item)

<tr class="@if($item->archive) in @else out  @endif personal-pay--header--childen__item">
    <td>
        {{-- {{ $item->created_at }} --}}
        {{ date('d.m.yy', strtotime($item->created_at)) }}
    </td>
    <td>
        @switch($item->type)
            @case('book')
                книга
                @break
            @case('withdraw')
                изымать
                @break
            @case('charged from paypal')
                взимается с PayPal
                @break
            @case('charged for booking')
                взимается за бронирование
                @break
            @default
                {{ $item->type }} 
        @endswitch
    
    </td>
    <td>
        @switch($item->state)
            @case('pending')
                В ожидании
                @break
            @case('completed')
                Завершено
                @break
            @default
                {{ $item->type }} 
        @endswitch
    </td>
    <td><span class="money" data-currency-rub="{{Helper::convertCurrency($item->balance, 'UZS', 'RUB')}}" data-currency-uzs="{{$item->balance}}">
        {{ $item->balance }} UZS
        </span></td>
    <td>
        @if($item->amount > 0)<span class="pp-price pg-balence">+</span>@endif<span class="money pp-price @if($item->amount > 0) pg-balence @endif" data-currency-rub="{{Helper::convertCurrency($item->amount, 'UZS', 'RUB')}}" data-currency-uzs="{{$item->amount}}">
           {{ $item->amount }} UZS
        </span>
    </td>
</tr>
@endforeach