<li class="personal-pay--header--item">
    <div class="personal-pay--header--item__name">Операция/Дата</div>
    <ul class="personal-pay--header--childen">
        @foreach($transactions as $item)
        <li class="personal-pay--header--childen__item">
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
        @endswitch <span class="pp-date">
            {{ date('d.m.yy', strtotime($item->created_at)) }}</span></li>
        @endforeach
    </ul>
</li>
<li class="personal-pay--header--item text-right">
    <div class="personal-pay--header--item__name">Баланс/Сумма</div>
    <ul class="personal-pay--header--childen">
        @foreach($transactions as $item)
        <li class="personal-pay--header--childen__item">
            <span class="money" data-currency-rub="{{Helper::convertCurrency($item->balance, 'UZS', 'RUB')}}" data-currency-uzs="{{$item->balance}}">
            {{ $item->balance }} UZS
            </span> 
            <span class="pp-price">
            @if($item->amount > 0){{'+'}} @endif
            <span class="money @if($item->amount > 0) pg-balence @endif" data-currency-rub="{{Helper::convertCurrency($item->amount, 'UZS', 'RUB')}}" data-currency-uzs="{{$item->amount}}">
                {{ $item->amount }} UZS
                </span></span>
        </li>
        @endforeach
    </ul>
</li>